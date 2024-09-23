<?php

class Model extends CI_Model  {
    
	 
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
				$this->db->where("nik in (select nik from data_pegawai where kode_biro='".$this->m_reff->sanitize($kode_biro)."' )");
			 }else{
				$this->db->where("nik in (select nik from data_pegawai where id_istana='".$this->m_reff->sanitize($this->session->id_istana)."' )");
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
			$query=$this->db->from("data_test");
		return $query;
			 
		
		 
	}
	function setStsAcc(){
		$id  = $this->input->post("id");
		$sts = $this->input->post("sts");
		$this->db->set("sts_acc",$sts);
		$this->db->where("id",$id);
		return $this->db->update("data_test");
	}
	function setStsAccFam(){
		$id  = $this->input->post("id");
		$sts = $this->input->post("sts");
		$this->db->set("sts_acc",$sts);
		$this->db->where("id",$id);
		return $this->db->update("data_test_keluarga");
	}
	function get_data_family()
	{
		 $this->_get_data_family();
		if($this->input->post("length")!=-1) 
		$this->db->limit($this->input->post("length"),$this->input->post("start"));
	 	return $this->db->get()->result();
		 
	}
	function _get_data_family()
	{
	 	    $nip = $this->session->userdata("nip");    
			$this->db->order_by("id","desc");
			// $this->db->where("sts",0);
			$kode_biro = $this->session->kode_biro;
			$id_istana = $this->session->id_istana;
			if($kode_biro){
				$this->db->where("nip_pegawai in (select nip from data_pegawai where kode_biro='".$kode_biro."' )");
			}else{
				$this->db->where("nip_pegawai in (select nip from data_pegawai where id_istana='".$id_istana."' )");
			   
			} 
			$searchkey=$_POST['search']['value']; 
			if(strlen($searchkey)>1){
					$query=array(
					"nama"=>$searchkey, 				 		 
					"nip_pegawai"=>$searchkey, 				 
					"nik"=>$searchkey, 				 				 
							  
					);
					$this->db->group_start()
							->or_like($query)
					->group_end();
					
				}	

			$query=$this->db->from("data_test_keluarga");
		return $query;
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
	function hapus_family(){
		$id     = $this->input->post("id");
		$nip    = $this->input->post("nip");
		$kode   = $this->input->post("kode");

		// $this->db->where("kode_test",$kode);
		$this->db->set("sts_test",0);
		$this->db->update("data_keluarga");


		$this->db->where("nip_pegawai",$nip);
		$this->db->where("id",$id);
		$this->db->delete("data_test_keluarga");
		$var["token"] = $this->m_reff->getToken();
		return $var;
	}
	function hapus(){
		$id    = $this->input->post("id");
		$nip   = $this->input->post("nip");
		$kode   = $this->input->post("kode");

		// $this->db->where("kode_test",$kode);
		$this->db->where("nip",$nip);
		$this->db->set("sts_test",0);
		$this->db->update("data_pegawai");


		$this->db->where("id",$id);
		$this->db->delete("data_test");
		$var["token"] = $this->m_reff->getToken();
		return $var;
	}
	function insert(){
		$form 	 = $this->input->post("f");
		$nik	 = $this->input->post("f[nik]");
		$cek		 = $this->input->post("hasil_test");
		$kode_utama	 = $this->input->post("kode_test");
		$jenis_pegawai	 = $this->input->post("jenis_pegawai");

		 
		$kode	 = $this->generateKode();

		
		
		if($cek!="+"){
			$this->db->set("sts_test",1);
			$this->db->where("nik",$nik);
			$this->db->set("kode_test",$kode);
			$this->db->update("data_pegawai");
		}else{
			$this->db->set("sts_test",1);
			$this->db->where("nik",$nik);
			$this->db->update("data_pegawai");
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
		$this->db->set($form);
		if($cek=="+"){
			// $this->db->set("test_lanjutan",1);
			$this->db->set("kode_test_utama",$kode_utama);
		}
		$this->db->set("id_istana",$this->session->id_istana);
		$this->db->set("kode_biro",$this->session->kode_biro);
		$this->db->set("jenis_pegawai",$jenis_pegawai);
		$this->db->insert("data_test");
		 $var["token"] = $this->m_reff->getToken();
		return $var;
	}


	function insert_family(){
		$form 	 = $this->input->post("f");
		$nik	 = $this->input->post("f[nik]");
		$id_hub  = $this->input->post("id_hubungan");
		$jk	     = $this->input->post("jk");
  
		$kode	 = $this->generateKodeFamily();

				   $this->db->where("nip_pegawai",$this->m_reff->nip());
				   $this->db->where("nik",$nik);
		$cek 	 = $this->db->get("data_keluarga")->row();
		$cek_test     = isset($cek->sts_test)?($cek->sts_test):0;
		$ava     = isset($cek->id)?($cek->id):0;
		$hasil_tes = isset($cek->hasil_test)?($cek->hasil_test):null;
		$kode_utama = isset($cek->kode_test)?($cek->kode_test):null;

		if($cek_test){
			$var["gagal"] = true;
			$var["info"]  = "Gagal! ".$form['nama']. " sedang diajukan untuk tes.";
			$var["token"] = $this->m_reff->getToken();
			return $var;
		}

		$tgl = $this->tanggal->eng_($this->input->post("tgl_lahir"));
		
		$this->db->set("id_istana",$this->session->userdata("id_istana"));
		$this->db->set("kode_biro",$this->session->userdata("kode_biro"));
		if(!$ava){ // jika data keluarga tidak ada maka ditambahkan
			$this->db->set("tgl_lahir",$tgl);
			$this->db->set("nip_pegawai",$this->m_reff->nip());
			$this->db->set($form);
			$this->db->set("id_hubungan",$id_hub);
			$this->db->set("jk",$jk);
			$this->db->set("kode_test",$kode);
			$this->db->set("sts_test",1);
			$this->db->insert("data_keluarga");
		}else{
			$this->db->set("jk",$jk);
			$this->db->set("id_hubungan",$id_hub);
			$this->db->set("tgl_lahir",$tgl);
			$this->db->set("sts_test",1);
			$this->db->set($form);
			$this->db->where("id",$ava);
			$this->db->update("data_keluarga");
		}

		 if($this->session->sts_akun){
			$sts_acc=1;
		 }else{
			 $sts_acc=0;
		 }

		$this->db->set(
			array(
			"tgl"		=>	date("Y-m-d"),
			"_cid"		=>	$this->idu(),
			"_ctime"	=>	date("Y-m-d H:i:s"),
			"kode"		=>	$kode,
			"nip_pegawai"	=> $this->m_reff->nip(),
			"kode_tempat"	=> $this->input->post("kode_tempat"),
			"kode_jenis"	=> $this->input->post("kode_jenis"),
			"nama"	=> $this->input->post("f[nama]"),
			"jk"	=> $this->input->post("jk"),
			"nik"	=> $this->input->post("f[nik]"),
			"id_hubungan"	=> $id_hub,
			"sts_acc"		=> $sts_acc
			)
		);

		if($hasil_tes=="+"){
			$this->db->set("kode_test_utama",$kode_utama);
		}
		$this->db->insert("data_test_keluarga");
		$var["token"] = $this->m_reff->getToken();
		return $var;
	}


	function update(){
		$form 	 = $this->input->post("f");
		$id		 = $this->input->post("id");

		$this->db->set("sts_acc",1);
		$this->db->set($form);
		$this->db->where("id",$id);
		$this->db->update("data_test");
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
		$this->db->update("data_test_keluarga");
		$var["token"] = $this->m_reff->getToken();
		return $var;
	}
 

	function getDataKeluargaEdit(){
        $nik    = $this->input->post("val");
                  $this->db->or_where("nik",$nik);
        return    $this->db->get("data_keluarga")->row();
    }
	function getDataPegawaiEdit(){
        $val    = $this->input->post("val");
                  $this->db->or_where("nip",$val);
        return    $this->db->get("data_pegawai")->row();
    }

	function getDataPegawai(){
        $val    = $this->input->post("val");
                  $this->db->where("(nik ='".$val."' or nip ='".$val."')");
                  
                  $this->db->where("sts_test",0);
        return    $this->db->get("data_pegawai")->row();
    }

	function generateKodeFamily(){
		$kode = $this->m_reff->acak(11);
		$cek = $this->db->get_where("data_test_keluarga",array("kode"=>$kode))->num_rows();
		if($cek){
			return $this->generateKodeFamily();
		}else{
			return $kode;
		}
	}
	
	function generateKode(){
		$kode = $this->m_reff->acak(10);
		$cek = $this->db->get_where("data_test",array("kode"=>$kode))->num_rows();
		if($cek){
			return $this->generateKode();
		}else{
			return $kode;
		}
	}

}




