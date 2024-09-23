<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saran extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();	
	$this->m_konfig->validasi_session(array("pelanggan"));
		$this->load->model("model","mdl");
		date_default_timezone_set('Asia/Jakarta');
		 
		 
			 
	}
	 
	function _template($data)
	{
		// $this->m_reff->cekKelengkapan();
		$this->load->view('temp_ppnpn/main',$data);	
	}
	 
	public function index()
	{ 	 
	     
        	    if($this->input->get("resto")){
                    	      $resto = str_replace("-"," ",$resto);
                    	    $me    = $this->input->get("me");
                    	    $cek   = $this->mdl->cekResto($resto);
                    	    $cek = json_encode($cek);
                    	    $cek = json_decode($cek,TRUE);
                    	    if(!isset($cek)){
                    	        echo "<i>Hai kak! pastikan kamu scan qrcodenya ya... </i>"; return false;
                    	    }
                    	        $nama = $this->m_reff->goField("data_pelanggan","nama","where hp='".$me."'");
                    	        $this->session->set_userdata("hp",$me); 
                    	        $this->session->set_userdata("level","pelanggan");
                    	        $this->session->set_userdata("nama",$nama); 
                    	        $this->session->set_userdata($cek);  
        	  }
        	  
			$data['konten']="index";
			$this->_template($data);
		  
	}
	
	function insert(){
	    $data = $this->mdl->insert();
	    echo json_encode($data);
	}
 


 
}
