<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Device extends MY_Controller {

	

	function __construct()
	{
		parent::__construct();	
	
		$this->load->model("model","mdl");
		date_default_timezone_set('Asia/Jakarta');
	 
	}
	
	function _template($data)
	{
	    	$this->m_konfig->validasi_session(array("member"));
	$this->load->view('temp_main/main',$data);	
	}
	 
	 public function index()
	{
	    	$this->m_konfig->validasi_session(array("member"));
		$dev	=	$this->m_reff->goField("data_member","device_from","where id='".$this->m_reff->idu()."'");
		if($dev==1){
			$dev1 = "checked";
			$dev2 = "";
		}else{
			$dev1 = "";
			$dev2 = "checked";
		}

		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{	$var["dev1"]=$dev1;
			$var["dev2"]=$dev2;

			$var["data"]=$this->load->view("index",$var,true);
			$var["token"]=$this->m_reff->getToken();
		
			echo json_encode($var);
		}else{
			$data["dev1"]=$dev1;
			$data["dev2"]=$dev2;
			$data['konten']="index";
			$this->_template($data);
		}
		
	}  
	function setDevice(){
	    	$this->m_konfig->validasi_session(array("member"));
		$var["data"]=$this->mdl->setDevice();
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	 }
	
	function scan(){
	    	$this->m_konfig->validasi_session(array("member"));
		$var["data"]=$this->load->view("scan",null,true);
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	 }
	
	function data_perangkat(){
	    	$this->m_konfig->validasi_session(array("member"));
		$var["data"]=$this->load->view("data_perangkat",null,true);
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	 }

	 function imgQr(){
		$this->load->view("frame");
	}
	
	function device_delete(){
	    	$this->m_konfig->validasi_session(array("member"));
		$var["data"]=$this->mdl->device_delete();
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}
	
	function newSender(){
	    	$this->m_konfig->validasi_session(array("member"));
		$var["data"]=$this->load->view("newSender",null,true);
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}
	function edit_device(){
	    	$this->m_konfig->validasi_session(array("member"));
		$var["data"]=$this->load->view("edit_device",null,true);
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}
	function insert(){
	    	$this->m_konfig->validasi_session(array("member"));
		$var["data"]=$this->mdl->insert();
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}
	function update(){
	    	$this->m_konfig->validasi_session(array("member"));
		$var["data"]=$this->mdl->update();
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}
	function rescan(){
	    	$this->m_konfig->validasi_session(array("member"));
		 $id = $this->m_reff->decrypt($this->input->get("id"));
		 if(!$id){
			 $this->m_reff->page403();
		 }
		 $sender	=	$this->input->get("sender");
		   $this->backend->restartDevice($this->m_reff->idu(),$sender);
		   redirect("device/imgQr?id=".$id);
	}
	 
}