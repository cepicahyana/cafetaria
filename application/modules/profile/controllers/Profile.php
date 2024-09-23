<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {

	

	function __construct()
	{
		parent::__construct();	
		$this->m_konfig->validasi_global();
		$this->load->model("Model","mdl");
		date_default_timezone_set('Asia/Jakarta');
	}
	 
	function _template($data)
	{
	$this->load->view('temp_main/main',$data);	
	}
	 
	 
	public function index()
	{	
		// $this->m_konfig->validasi_session(array("admin","pic"));
		$level=strtolower($this->session->userdata("level"));
		if($level=="pic"){
			$index="pic";
			$data['data']=$this->mdl->dataProfilePic();
		}elseif($level=="dokter"){
			$index="dokter";
			$data['data']=$this->mdl->dataProfileDok();
		}else{
			$data['data']=$this->mdl->dataProfile();
			$index="index";
		}
		
		 
		$ajax=$this->input->get_post("ajax");
	
		if($ajax=="yes")
		{
			$var["data"]=$this->load->view($index,$data,TRUE);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
		}else{
			$data['konten']=$index;
			$this->_template($data);
		}
		
	}
	public function pegawai()
	{	
		$this->m_konfig->validasi_session(array("pegawai"));
		
		 
		$index="pegawai";
		 
		$ajax=$this->input->get_post("ajax");
 
		if($ajax=="yes")
		{
			$var["data"]=$this->load->view($index,NULL,TRUE);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
		}else{
			$data['konten']=$index;
			$this->_template($data);
		}
		
	}
	public function rs()
	{	
		 
		$this->m_konfig->validasi_session(array("rs"));
		$index="rs";
		$ajax=$this->input->get_post("ajax");
 
		if($ajax=="yes")
		{
			$var["data"]=$this->load->view($index,NULL,TRUE);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
		}else{
			$data['konten']=$index;
			$this->_template($data);
		}
		
	}
	public function data()
	{	
		 $this->m_konfig->validasi_session(array("panitia","admin"));
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
		echo	$this->load->view("profile_panitia");
		}else{
			$data['konten']="profile_panitia";
			$this->_template($data);
		}
	}
	 function update_pegawai()
	{
	 
	//$this->m_konfig->log("Data Pegawai","update data akun (pengguna) ",$this->session->userdata("id"));
	$data=$this->mdl->updatePegawai();
	echo json_encode($data);
	}
	 function update_rs()
	{
	  
	$data=$this->mdl->updateRs();
	echo json_encode($data);
	}

 
	function update()
	{
	$this->m_konfig->validasi_global();

	$level=strtolower($this->session->userdata("level"));
		if($level=="dokter"){
			$data=$this->mdl->update_dokter();
		}else{
			$data=$this->mdl->update();
		}
		$data["data"] = $data;
		$data["token"] = $this->m_reff->getToken();
	echo json_encode($data);
	}

 
	 


	function insert()
	{
	 $this->m_konfig->validasi_session(array("pusat","admin"));
	$this->m_konfig->log("admin","update data akun (pengguna) ",$this->session->userdata("id"));
	$data=$this->mdl->insert();
	echo json_encode($data);
	}
	
	 
	 
}