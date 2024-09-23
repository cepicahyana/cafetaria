<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resto extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();	

		$this->load->model("model","mdl");
		date_default_timezone_set('Asia/Jakarta');
		 
		 
			 
	}
	 
	function _template($data)
	{
	    $this->m_konfig->validasi_session(array("pelanggan"));
		// $this->m_reff->cekKelengkapan();
		$this->load->view('temp_ppnpn/main',$data);	
	}
	 
	public function index()
	{ 	 
	     $resto = $this->input->get("id");  
	    if($resto){
	        $cek = $this->db->get_where("device_stations",array("link_name"=>$resto))->row();
	        $sn = isset($cek->sender_number)?($cek->sender_number):null;
	        if(!$sn){
	            redirect();
	        }
	        echo $link = "https://wa.me/$sn?text=Daftar+menu";
	       redirect($link);
	    }
	     
			$data['konten']="index";
			$this->_template($data);
		  
	}
 
    


 
}
