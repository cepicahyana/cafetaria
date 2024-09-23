<?php
header('Access-Control-Allow-Origin: *');

if($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
	header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');
    exit;
}


use Restserver\Libraries\REST_Controller;
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';
class Api extends REST_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("model","mdl");
		$this->load->library("tanggal");
		date_default_timezone_set('Asia/Jakarta');
	}
 
	function setDeviceStatus_get(){
			  $this->mdl->setDeviceStatus(); 
              $this->response([
                    'status' => 200,
                    'data' => $this->input->get("sts"), 
                ], REST_Controller::HTTP_OK);  
	}
	function cekInstruksi_get(){
			  $cek = $this->mdl->cekInstruksi(); 
              $this->response([
                    'status' => 200,
                    'data' => $cek, 
                ], REST_Controller::HTTP_OK);  
	}
	function hapusInstruksi_get(){
			  $cek = $this->mdl->hapusInstruksi_get(); 
              $this->response([
                    'status' => 200,
                    'data' => $cek, 
                ], REST_Controller::HTTP_OK);  
	}
	function setQr_get(){
			  $this->mdl->setQr(); 
              $this->response([
                    'status' => 200,
                    'data' => $this->input->get("qr"), 
                ], REST_Controller::HTTP_OK);  
	}
	function addDeviceID_get(){
			  $this->mdl->addDeviceID(); 
              $this->response([
                    'status' => 200,
                    'data' => $this->input->get("deviceID"), 
                ], REST_Controller::HTTP_OK);  
	}
	
	function getDataMessage_get(){
			$db	=	$this->mdl->getDataMessage();
			if(isset($db))
            {
               
              $this->response([
                    'status' => 200,
                    'data' => $db["data"],
                    'dataID' => $db["dataID"]
                ], REST_Controller::HTTP_OK); 
            }
	}
	function updateStatusMessage_get(){
			$db	  =	$this->mdl->updateStatusMessage();
		//	$data = $this->input->get("dataID");
			  
              $this->response([
                    'status' => 200, 
                    'data'   => $db
                ], REST_Controller::HTTP_OK); 
           
	}
	function send_text_post()
	{ 
			
			if(!$this->input->post("nomor") or !$this->input->post("pesan"))
			{
				  $this->response([
                    'status' => 400,
                    'message' => "params not found"
                ], REST_Controller::HTTP_BAD_REQUEST);  
			}
			
			$db	=	$this->mdl->send_text();
			if(isset($db))
            {
               
              $this->response([
                    'status' => 200,
                    'data' => $db
                ], REST_Controller::HTTP_OK); 
            }
            else
            {
              
                $this->response([
                    'status' => FALSE,
                    'message' => 'no data were found'
                ], REST_Controller::HTTP_NOT_FOUND);  
            }
        
	}
	function setSessionsFile_get(){
        $db	=	$this->mdl->setSessionsFile();
        $this->response([
            'status' => 200,
            'data' => $db,
        ], REST_Controller::HTTP_OK); 
    }
	 
	function getSessionsFile_post(){
        $db	=	$this->mdl->getSessionsFile();
        $this->response([
            'status' => 200,
            'data' => $db,
        ], REST_Controller::HTTP_OK); 
    }
	 
	function getSessionNull_post(){
        $db	=	$this->mdl->getSessionNull();
        $this->response([
            'status' => 200,
            'data' => $db,
        ], REST_Controller::HTTP_OK); 
    }
	 
	function createSession_get(){
        $db	=	$this->mdl->createSession();
        $this->response([
            'status' => 200,
            'data' => $db,
        ], REST_Controller::HTTP_OK); 
    }
	function delSessionsFile_post(){
        $db	=	$this->mdl->delSessionsFile();
        $this->response([
            'status' => 200,
            'data' => $db,
        ], REST_Controller::HTTP_OK); 
    }
	function addSessionsFile_post(){
        $db	=	$this->mdl->addSessionsFile();
        $this->response([
            'status' => 200,
            'data' => $db,
        ], REST_Controller::HTTP_OK); 
    }
	 
}
