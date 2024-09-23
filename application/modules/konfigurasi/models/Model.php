<?php

class Model extends CI_Model  {
    
	var $tbl="admin";
 
 	function __construct()
    {
        parent::__construct();
    }
	function idu()
	{
		return $this->session->userdata("id");
	}
	
	 
	function save_($idp,$val)
	{
		$this->db->set("val",$val);
		$this->db->where("id",$idp);
	return $this->db->update("pengaturan");
	}
	
	function hapusTahun()
	{	
		$token	=	$this->input->post("token");
		$token	=	$this->m_reff->decrypt($token);
		
		$tahun	=	$this->input->post("tahun");
		$tahun	=	$this->m_reff->decrypt($tahun);
		
		if($token!=date('Hi'))
		{
			$this->session->set_flashdata("msg","Token  error!");
			return false;
		}
		$this->session->set_flashdata("msg","Data tahun ".$tahun." berhasil dihapus!");
		 
		$this->db->where("YEAR(_ctime)",$tahun);
		$this->db->delete("data_peserta");
		
		$this->db->where("YEAR(tgl)",$tahun);
		$this->db->delete("data_acara");
		
		
		$this->db->where("YEAR(_ctime)",$tahun);
		return $this->db->delete("data_file");
		 
	}
	
	
	 
	 
}