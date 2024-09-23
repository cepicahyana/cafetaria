<?php

class Model_external extends CI_Model  {
    
	 
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
				$this->db->where("nik in (select nik from data_external where kode_biro='".$this->m_reff->sanitize($kode_biro)."' )");
			 }else{
				$this->db->where("nik in (select nik from data_external where id_istana='".$this->m_reff->sanitize($this->session->id_istana)."' )");
				// $this->db->where("_cid",$this->idu());
			 }

			 $searchkey=$_POST['search']['value']; 
			 if(strlen($searchkey)>1){
					 $query=array(
					 "nama"=>$searchkey, 				 		 
					 "bagian"=>$searchkey, 				 
					 "nik"=>$searchkey, 				 				 
							   
					 );
					 $this->db->group_start()
							 ->or_like($query)
					 ->group_end();
					 
				 }	

			$this->db->order_by("id","desc");
			// $this->db->where("sts",0);
			$query=$this->db->from("data_test_external");
		return $query;
			 
		
		 
	}
	function setStsAcc(){
		$id  = $this->input->post("id");
		$sts = $this->input->post("sts");
		$this->db->set("sts_acc",$sts);
		$this->db->where("id",$id);
		return $this->db->update("data_test_external");
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
		$this->db->update("data_external");


		$this->db->where("id",$id);
		$this->db->delete("data_test_external");
		$var["token"] = $this->m_reff->getToken();
		return $var;
	}
	function insert(){
		$form 	 = $this->input->post("f");
		$jk	 = $this->input->post("jk");
		$nik	 = $this->input->post("f[nik]");
		 
		$kode_utama	 = $this->input->post("kode_test");

		 
		$kode	 = $this->generateKode();

		$cek_data	=	$this->db->get_where("data_external",array("nik"=>$nik))->row();
		$sts 		= 	isset($cek_data->hasil)?($cek_data->hasil):"";
		if(isset($cek_data)){
			if($sts!="+"){
				$tgl = $this->tanggal->eng_($this->input->post("tgl_lahir"),"-");
				
				$this->db->where("nik",$nik);
				$this->db->set("kode_test",$kode);
				$this->db->set("jk",$jk);
				$this->db->set("tgl_lahir",$tgl);
				$this->db->set("kode_biro",$this->session->kode_biro);
				$this->db->set($form);
				$this->db->update("data_external");
			}
		}else{
				$tgl = $this->tanggal->eng_($this->input->post("tgl_lahir"),"-");
				
				$this->db->set("sts_test",1);
				$this->db->set("jk",$jk);
				$this->db->set("tgl_lahir",$tgl);
				$this->db->set("kode_biro",$this->session->kode_biro);
				$this->db->set($form);
				$this->db->set("id_istana",$this->session->id_istana);
				$this->db->set("kode_biro",$this->session->kode_biro);
				$this->db->insert("data_external");
		}
		
	
		

		$this->db->set(
			array(
			"tgl"		=>	date("Y-m-d"),
			"_cid"		=>	$this->idu(),
			"_ctime"	=>	date("Y-m-d H:i:s"),
			"kode"		=>	$kode
			)
		);
		$this->db->set("sts_acc",1);
		unset($form["jk"]);
		unset($form["tempat_lahir"]);
		unset($form["tgl_lahir"]);
		unset($form["no_hp"]);
		unset($form["email"]);
		$this->db->set($form);
		if($sts=="+"){
			// $this->db->set("test_lanjutan",1);
			$this->db->set("kode_test_utama",$kode_utama);
		}
		$this->db->set("id_istana",$this->session->id_istana);
		$this->db->set("kode_biro",$this->session->kode_biro);
		$this->db->set("kode_jenis",$this->input->post("kode_jenis"));
		$this->db->set("kode_tempat",$this->input->post("kode_tempat"));
		$this->db->insert("data_test_external");
		 $var["token"] = $this->m_reff->getToken();
		return $var;
	}
   

	function update(){
		$form 	 = $this->input->post("f");
		$id		 = $this->input->post("id");

		$this->db->set("sts_acc",1);
		$this->db->set($form);
		$this->db->where("id",$id);
		$this->db->update("data_test_external");
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
		$this->db->update("data_test_external_keluarga");
		$var["token"] = $this->m_reff->getToken();
		return $var;
	}
 

	function getDataexternal(){
        $val    = $this->input->post("val");
                  $this->db->where("(nik ='".$val."')");
                  
                  $this->db->where("sts_test",0);
        return    $this->db->get("data_external")->row();
    }

	function getDataexternalEdit(){
        $val    = $this->input->post("val");
                  $this->db->where("nik",$val);
        return    $this->db->get("data_external")->row();
    }

 

	 
	function generateKode(){
		$kode = $this->m_reff->acak(13);
		$cek = $this->db->get_where("data_test_external",array("kode"=>$kode))->num_rows();
		if($cek){
			return $this->generateKode();
		}else{
			return $kode;
		}
	}

}




