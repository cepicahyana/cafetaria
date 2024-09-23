<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar_menu extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();	
	
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
	  
        // 	  if($this->input->get("resto")){
                    	    $resto = "nuansa-resto-and-cafe";// $this->input->get("resto");
                    	   // $resto = str_replace("-"," ",$resto);
                    	    $me    = "085221288210";//$this->input->get("me");
                    	    $cek   = $this->mdl->cekResto($resto);
                    	    $cek = json_encode($cek);
                    	    $cek = json_decode($cek,TRUE);
                    	    if(!isset($cek)){
                    	        echo "<i>Hai kak! pastikan kamu scan qrcodenya ya... </i>"; return false;
                    	    }
                    	    $nama = "cepi";//$this->m_reff->goField("data_pelanggan","nama","where hp='".$me."'");
                    	   if(!$nama){
                    	        echo "<i>Hai kak! pastikan kamu scan qrcodenya ya.... </i>"; return false;
                    	    }
                    	        $this->session->set_userdata("id_order",null);
                    	        
                    	        $this->session->set_userdata("hp",$me); 
                    	        $this->session->set_userdata("level","pelanggan");
                    	        $this->session->set_userdata("nama",$nama); 
                    	        $this->session->set_userdata($cek);  
        // 	  }
			$data['konten']="index";
			$this->_template($data);
		  
	}
	function order(){
	   $this->m_konfig->validasi_session(array("pelanggan","resto"));
	        $id = $this->input->post("id");
	        if($id){
	        $this->mdl->setOrder($id);
	        }
	        $dim = $this->mdl->getTotalItem();
	        $data["total"] = "Rp. ".number_format($dim["total"],0,",",".");
	        $data["item"] = $dim["item"];
	    	$data["data"] = $this->load->view('order',null,true);	
	    	echo json_encode($data);
	}
	
	function update_qty(){
	    $this->m_konfig->validasi_session(array("pelanggan","resto"));
	         $this->mdl->update_qty();
	    	$data["data"] = $this->load->view('order',null,true);	
	    	
	    	$dim = $this->mdl->getTotalItem();
	        $data["total"] = "Rp. ".number_format($dim["total"],0,",",".");
	        $data["item"] = $dim["item"];
	         
	    	echo json_encode($data);
	}
	
	function selesai(){
	         $data = $this->session->userdata("id_order");
	         $this->m_konfig->validasi_session(array("pelanggan"));
	         $this->mdl->selesai(); 
	         echo json_encode($data);
	}


 
}
