<?php

class Model extends CI_Model  {
    
	 
	function __construct()
    {
        parent::__construct();
    }
	function setDevice(){
		$sts		=	$this->input->post("sts");
		$idu		=	$this->m_reff->idu();
		$this->db->set("device_from",$sts);
		$this->db->where("id",$idu);
		return $this->db->update("data_member");
	}
	function device_delete(){
		$id		=	$this->input->post("id");
		$idu	=	$this->m_reff->idu();
		$this->db->where("id",$id);
		$this->db->where("id_user",$idu);
		return $this->db->delete("device_stations");
	}
	function insert(){
		$s  = $this->input->post("sender_number");
		$hp = $this->m_reff->hp($s);

		$cek = $this->db->get_where("device_stations",array("sender_number"=>$hp))->num_rows();
		if($cek){
			$var["gagal"] = true;
			$var["info"] = "Nomor sudah terdaftar!";
			return $var;
		}
		if($this->input->post("sts")==5){
			$this->db->set("session",null);
		}
		$this->db->set("key",$this->m_reff->acak(20));
		$this->db->set("sender_number",$hp);
		$this->db->set("id_user",$this->m_reff->idu());
		$this->db->set("package",$p=$this->input->post("package"));
		$this->db->set("sts",$p=$this->input->post("sts"));
		$this->db->set("sender_name",$p=$this->input->post("sender_name"));
		$this->db->set("id_user",$this->m_reff->idu());
		$this->db->insert("device_stations");
		return $this->newInvoice($p,$s);
	}
	function update(){
		$s  = $this->input->post("sender_number");
		$hp = $this->m_reff->hp($s);

		$cek = $this->db->get_where("device_stations",array("sender_number"=>$hp,"id!="=>$this->input->post("id")))->num_rows();
		if($cek){
			$var["gagal"] = true;
			$var["info"] = "Nomor sudah terdaftar!";
			return $var;
		}
		if($sts=$this->input->post("sts")==5 or $hp!=$this->input->post("last_number")){
			$this->db->set("session",null);
			
		}
		$this->db->set("sts",$this->input->post("sts"));
		$this->db->set("sender_number",$hp);
 
	  
		
		$this->db->set("sender_name",$p=$this->input->post("sender_name"));
		$this->db->where("id",$this->input->post("id"));
		$this->db->where("id_user",$this->m_reff->idu());
		$this->db->update("device_stations");
		return $this->newInvoice($p,$s);
	}

	function newInvoice($p,$s){
		return false;
	}
 
}




