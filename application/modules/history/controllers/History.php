<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller 
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
		$this->load->view('temp_ppnpn/main',$data);	
	}
	 
	public function index()
	{ 	  
			$data['konten']="index";
			$this->_template($data);
	}
	function order(){
	        $id = $this->input->post("id");
	        if($id){
	        $this->mdl->setOrder($id);
	        }
	    	$data["data"] = $this->load->view('order',null,true);	
	    	echo json_encode($data);
	}
	
	function open(){
	    	$data["data"] = $this->load->view('open',null,true);	
	    	echo json_encode($data);
	}
	
	function selesai(){
	        return $this->mdl->selesai(); 
	}


 
}
