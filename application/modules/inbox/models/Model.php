<?php

class Model extends CI_Model  {
    
	 
	function __construct()
    {
        parent::__construct();
    }

    function balas_cepat(){
        	$form	=	$this->input->post("f");
        	$base   =   base_url()."file_upload/chat/";
		if(isset($_FILES["file"]['tmp_name']))
			{  
				$dok 	=	"file_upload/chat";
				$file	=	$this->m_reff->upload_file("file",$dok,"auto","PDF,JPEG,JPG,PNG,DOCS,XLSX");
				 
				if($file["validasi"]!=false)
				{
				    $type=$file["type"];
				    if($type=="jpg" || $type=="jpeg" || $type=="png" ){
				        $this->db->set("type",2);
				    }else{
				           $this->db->set("type",6);
				    }
					$this->db->set("url",$base.$file["name"]);
					
				}else{
				    $var["gagal"] =  true;
				    $var["info"] = $file["info"];
				    return $var;
				}
			 
			}else{
			      $this->db->set("type",1);
			}
	    	  $this->db->set($form);
	    	  $this->db->set("tgl",date('Y-m-d H:i:s'));
		 	  $this->db->set("sts",0);
		 	  $this->db->set("device_sts",1);
		 	  $this->db->set("sender_number","6285221288210");
		 	  $this->db->set("hits",2);
		 	  $this->db->set("id_user",$this->m_reff->idu());
		      $this->db->insert("data_pesan");
		     
		     $id = $this->input->post("id");
		     $this->db->where("id",$id);
		     $this->db->set("sts",1);
		    return  $this->db->update("msg_inbox");
    }
	function save(){
		$idu	= $this->m_reff->idu();
		$form	= $this->input->post("f");
		// $msg	= $this->input->post("msg");
		// $jam	= $this->input->post("jam");
		$remin	= $this->input->post("remin");
		$tgl	= $this->tanggal->eng_($this->input->post("tgl"),"-");
		$this->db->set("id_user",$idu);
		// $this->db->set("tgl_kirim",$tgl);
		$this->db->set($form);
		$this->db->insert("data_terjadwal");

		$idpel =  $this->input->post("f[nik]");
 
		$jml = count($remin["fr"]);
		$data=array();
		for($j=0;$j<$jml;$j++){
			$fr  = isset($remin["fr"][$j])?($remin["fr"][$j]):null;
			$msg = isset($remin["msg"][$j])?($remin["msg"][$j]):null;
			$jam = isset($remin["jam"][$j])?($remin["jam"][$j]):null;
			$tgl = isset($remin["tgl"][$j])?($remin["tgl"][$j]):null;

			// $tgl_kirim = $this->tanggal->addTanggalEng(($fr),$tgl);

			if($msg){
					$data[]=
					array(
						"tgl_kirim"=>$tgl,
						"fr"=>$fr,
						"msg"=>$msg,
						"jam"=>$jam
					);
			}
		}

		foreach($data as $val){
			$this->db->set("id_user",$idu);
			$this->db->set("id_pelanggan",$idpel);
			$this->db->set($val);
			$this->db->insert("pesan_terjadwal");
		}
		return true;
	}

 
	function update(){
		$idpel    =  $this->input->post("f[nik]");
		$niklama  =  $this->input->get_post("nik");
		$id		  = $this->input->get_post("id");
		$idu	  = $this->m_reff->idu();
		$form	  = $this->input->post("f");
		
		$cek	= $this->db->get_where("data_terjadwal",array("nik"=>$idpel,"id!="=>$id))->num_rows();
		if($cek){
			$var["gagal"]=true;
			$var["info"]="Nomor Identitas sudah terdaftar!";
			return $var;
		}

		$remin	= $this->input->post("remin");
		$tgl	= $this->tanggal->eng_($this->input->post("tgl"),"-");
		$this->db->set("id_user",$idu);
		// $this->db->set("tgl_kirim",$tgl);
		$this->db->set($form);
		$this->db->where("id",$id);
		$this->db->where("id_user",$idu);
		$this->db->update("data_terjadwal");

		$this->db->where("id_user",$idu);
		$this->db->where("id_pelanggan",$idpel);
		$this->db->delete("pesan_terjadwal");

		
 
		$jml = count($remin["fr"]);
		$data=array();
		for($j=0;$j<$jml;$j++){
			$fr  = isset($remin["fr"][$j])?($remin["fr"][$j]):null;
			$msg = isset($remin["msg"][$j])?($remin["msg"][$j]):null;
			$jam = isset($remin["jam"][$j])?($remin["jam"][$j]):null;
			$tgl = isset($remin["tgl"][$j])?($remin["tgl"][$j]):null;

			// $tgl_kirim = $this->tanggal->addTanggalEng(($fr),$tgl);

			if($msg){
					$data[]=
					array(
						"tgl_kirim"=>$tgl,
						"fr"=>$fr,
						"msg"=>$msg,
						"jam"=>$jam
					);
			}
		}

		foreach($data as $val){
			$this->db->set("id_user",$idu);
			$this->db->set("id_pelanggan",$idpel);
			$this->db->set($val);
			$this->db->insert("pesan_terjadwal");
		}
		return true;
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
	 
		if(isset($_POST['search']['value'])?($_POST['search']['value']):""){
			$searchkey=$_POST['search']['value']; 
				$query=array(
				"sender_number"=>$searchkey, 				 		 		 
				"sender_name"=>$searchkey, 				 				 
				"msg"=>$searchkey, 		 
				 		 
				);
				$this->db->group_start()
                        ->or_like($query)
                ->group_end();
				
			} 
			$this->db->order_by("_ctime","desc"); 
			$query=$this->db->from("msg_inbox");
		return $query;
			 
		
		 
	}
 
	public function count()
	{				
			$this->_get_data();
		return $this->db->get()->num_rows();
	}
	 
	function cekNik(){
		$nik	=	$this->input->post("nik");
		$idu 	=	$this->m_reff->idu();
					$this->db->where("id_user",$idu);
					$this->db->where("nik",$nik);
		$db		=	$this->db->get("data_terjadwal")->row();
		$id		=	isset($db->id)?($db->id):null;
		if($id){
			return $db;
		}else{
			return null;
		}
	}

}




