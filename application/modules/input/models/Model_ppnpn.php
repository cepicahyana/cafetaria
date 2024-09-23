<?php

class Model_ppnpn extends CI_Model  {
    
	 
	function __construct()
    {
        parent::__construct();
    }
	function get_data()
	{
		 $this->_get_data();
		if($this->input->post("length")!=-1) 
		$this->db->limit($this->input->post("length"),$this->input->post("start"));
	 	return $this->db->get()->result();
		 
	}
	function _get_data()
	{
	 	     $kode_biro = $this->session->kode_biro;
			 if($kode_biro){
				$this->db->where("nip in (select nip from data_ppnpn where kode_biro='".$this->m_reff->sanitize($kode_biro)."' )");
			 }else{
				$this->db->where("nip in (select nip from data_ppnpn where id_istana='".$this->m_reff->sanitize($this->session->id_istana)."' )");
				// $this->db->where("_cid",$this->idu());
			 }

			 $searchkey=$_POST['search']['value']; 
			 if(strlen($searchkey)>1){
					 $query=array(
					 "nama"=>$searchkey, 				 		 
					 "nip"=>$searchkey, 				 
					 "nik"=>$searchkey, 				 				 
							   
					 );
					 $this->db->group_start()
							 ->or_like($query)
					 ->group_end();
					 
				 }	

			$this->db->order_by("id","desc");
			// $this->db->where("sts",0);
			$query=$this->db->from("data_test_ppnpn");
		return $query;
			 
		
		 
	}
	function setStsAcc(){
		$id  = $this->input->post("id");
		$sts = $this->input->post("sts");
		$this->db->set("sts_acc",$sts);
		$this->db->where("id",$id);
		return $this->db->update("data_test_ppnpn");
	}
 
	 
	function nip(){
		return $this->m_reff->nip();
	}
	function idu(){
		return $this->session->userdata("id");
	}
	public function count()
	{				
			$this->_get_data();
		return $this->db->get()->num_rows();
	}
	 
	function hapus(){
		$id    = $this->input->post("id");
		$nik   = $this->input->post("nik");
		$kode   = $this->input->post("kode");

		// $this->db->where("kode_test",$kode);
		$this->db->where("nik",$nik);
		$this->db->set("sts_test",0);
		$this->db->update("data_ppnpn");


		$this->db->where("id",$id);
		$this->db->delete("data_test_ppnpn");
		$var["token"] = $this->m_reff->getToken();
		return $var;
	}
	function insert(){
		$form 	 = $this->input->post("f");
		$nik	 = $this->input->post("f[nik]");
		$cek		 = $this->input->post("hasil_test");
		$kode_utama	 = $this->input->post("kode_test");

		 
		$kode	 = $this->generateKode();

		
		
		if($cek!="+"){
			$this->db->where("nik",$nik);
			$this->db->set("kode_test",$kode);
			$this->db->update("data_ppnpn");
		}
		

		$this->db->set(
			array(
			"tgl"		=>	date("Y-m-d"),
			"_cid"		=>	$this->idu(),
			"_ctime"	=>	date("Y-m-d H:i:s"),
			"kode"		=>	$kode
			)
		);
		$this->db->set("id_istana",$this->session->id_istana);
		$this->db->set("kode_biro",$this->session->kode_biro);
		$this->db->set("sts_acc",1);
		$this->db->set($form);
		if($cek=="+"){
			// $this->db->set("test_lanjutan",1);
			$this->db->set("kode_test_utama",$kode_utama);
		}
		$this->db->insert("data_test_ppnpn");
		 $var["token"] = $this->m_reff->getToken();
		return $var;
	}
   

	function update(){
		$form 	 = $this->input->post("f");
		$id		 = $this->input->post("id");

		$this->db->set("sts_acc",1);
		$this->db->set($form);
		$this->db->where("id",$id);
		$this->db->update("data_test_ppnpn");
		$var["token"] = $this->m_reff->getToken();
		return $var;
	}

	function update_family(){
		$form 	 = $this->input->post("f");
		$id		 = $this->input->post("id");

			if($this->session->userdata("level")=="pic"){
				$this->db->set("sts_acc",1);
		   }else{
			$this->db->set("sts_acc",0);
		   }

	
		$this->db->set($form);
		$this->db->where("id",$id);
		$this->db->update("data_test_ppnpn_keluarga");
		$var["token"] = $this->m_reff->getToken();
		return $var;
	}
 

	function getDataPpnpn(){
        $val    = $this->input->post("val");
                  $this->db->where("(nik ='".$val."')");
                  
                  $this->db->where("sts_test",0);
        return    $this->db->get("data_ppnpn")->row();
    }

	function getDataPpnpnEdit(){
        $val    = $this->input->post("val");
                  $this->db->where("nik",$val);
        return    $this->db->get("data_ppnpn")->row();
    }

 

 
	function generateKode(){
		$kode = $this->m_reff->acak(12);
		$cek = $this->db->get_where("data_test_ppnpn",array("kode"=>$kode))->num_rows();
		if($cek){
			return $this->generateKode();
		}else{
			return $kode;
		}
	}

}




