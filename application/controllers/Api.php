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
	function sent_survei_get(){
	      $replay =   $this->mdl->sent_survei(); 
              $this->response([
                    'status' => 200,
                    'data' => $replay
                ], REST_Controller::HTTP_OK);  
	}
	function gpt_get(){
	    
                
                 
                $dTemperature = 0.9;
                $iMaxTokens = 150;
                $top_p = 1;
                $frequency_penalty = 0.0;
                $presence_penalty = 0.6;
                $OPENAI_API_KEY = "";
                $sModel = "text-davinci-003";
                $prompt = "aku mau tanya yg lain?";
                $ch = curl_init();
                $headers  = [
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization: Bearer '.$OPENAI_API_KEY.''
                ];
                $postData = [
                    'model' => $sModel,
                    'prompt' => str_replace('"', '', $prompt),
                    'temperature' => $dTemperature,
                    'max_tokens' => $iMaxTokens,
                    'top_p' => $top_p,
                    'frequency_penalty' => $frequency_penalty,
                    'presence_penalty' => $presence_penalty,
                    'stop' => '[" Human:", " AI:"]',
                ];
                 
                 
                curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/completions');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData)); 
                 
                $result = curl_exec($ch);
                $decoded_json = json_decode($result, true);
                 
                print_r($decoded_json['choices'][0]['text']);

 

	}
	function postReplay_post(){
	        $replay =   $this->mdl->postReplay(); 
              $this->response([
                    'status' => 200,
                    'data' => $replay
                ], REST_Controller::HTTP_OK);  
	}
	function sendbyPhone_post(){
	        $replay =   $this->mdl->sendbyPhone(); 
              $this->response([
                    'status' => 200,
                    'data' => $replay
                ], REST_Controller::HTTP_OK);  
	}
    function send_img_post(){
        $this->response([
              'status' => 200,
              'data' =>"", 
          ], REST_Controller::HTTP_OK);    
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
	function setQr_post(){
			  $this->mdl->setQr(); 
              $this->response([
                    'status' => 200,
                    'data' => $this->input->get_post("sender_number"), 
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
	function updateStatusMessage_post(){
			$db	  =	$this->mdl->updateStatusMessage();
		//	$data = $this->input->get("dataID");
			  
              $this->response([
                    'status' => 201, 
                    'data'   => $db
                ], REST_Controller::HTTP_OK); 
           
	}
		function saveOutbox_post(){
			$db	  =	$this->mdl->saveOutbox();
		//	$data = $this->input->get("dataID");
			  
              $this->response([
                    'status' => 201, 
                    'data'   => $db
                ], REST_Controller::HTTP_OK); 
           
	}
// 	function updateMessageStatus(){
// 	    	  $db	  =	$this->mdl->updateMessageStatus();
//               $this->response([
//                     'status' => 200, 
//                     'data'   => $db
//                 ], REST_Controller::HTTP_OK); 
// 	}
    // function getLinkGroup_post(){
    //     $data = $this->input->post("data");
    //     $sender_number = $this->input->post("sender_number");
    //     if(!$data or !$sender_number)
    //     {
    //         return    $this->response([
    //             'status' => 400,
    //             'message' => "params not complete!"
    //         ], REST_Controller::HTTP_BAD_REQUEST);  
    //     }
    //     $db	  =	$this->mdl->getLinkGroup();
    //     return    $this->response([
    //                             'status' => 200,
    //                             'link' => $db
    //                         ], REST_Controller::HTTP_OK); 
       
    // }
		function send_group_post() // send teks
	{ 
        if(!$this->input->post("group") )
        {
            return    $this->response([
                'status' => 400,
                'message' => "params not complete!"
            ], REST_Controller::HTTP_BAD_REQUEST);  
        }
       
         $cekKey = $this->mdl->getCekKey();
         if($cekKey != null){

                    $cekMasaAktif = $this->mdl->getMasaAktif();
                    if($cekMasaAktif != null){
                            $db	=	$this->mdl->send_group($cekKey);
                            
                         return   $this->response([
                                    'status' => 200,
                                    'data' => $db
                                ], REST_Controller::HTTP_OK); 
                            
                        } else{
                        return    $this->response([
                                'status' => FALSE,
                                'message' => 'Payment Pending'
                            ], REST_Controller::HTTP_NOT_FOUND); 
                        }
                    
            
        }else{
            return    $this->response([
                'status' => FALSE,
                'message' => 'key not found'
            ], REST_Controller::HTTP_NOT_FOUND); 
        }

       
	}
	
	function send_post() // send teks
	{ 
        if(!$this->input->post() )
        {
            return    $this->response([
                'status' => 400,
                'message' => "params not complete!"
            ], REST_Controller::HTTP_BAD_REQUEST);  
        }
       
         $cekKey = $this->mdl->getCekKey();
         if($cekKey != null){

                    $cekMasaAktif = true;//$this->mdl->getMasaAktif();
                    if($cekMasaAktif != null){
                            $db	=	$this->mdl->send($cekKey);
                            
                         return   $this->response([
                                    'status' => 200,
                                    'data' => $db
                                ], REST_Controller::HTTP_OK); 
                            
                        } else{
                        return    $this->response([
                                'status' => FALSE,
                                'message' => 'Payment Pending'
                            ], REST_Controller::HTTP_NOT_FOUND); 
                        }
                    
            
        }else{
            return    $this->response([
                'status' => FALSE,
                'message' => 'key not found'
            ], REST_Controller::HTTP_NOT_FOUND); 
        }

       
	}
	
	function send_text_post()
	{ 
        if(!$this->input->post("phone") or !$this->input->post("msg"))
        {
            return    $this->response([
                'status' => 400,
                'message' => "params not complete!"
            ], REST_Controller::HTTP_BAD_REQUEST);  
        }

         $cekKey = $this->mdl->getCekKey();
         if($cekKey != null){

                    $cekMasaAktif = $this->mdl->getMasaAktif();
                    if($cekMasaAktif == null){
                            $db	=	$this->mdl->send_text($cekKey);
                            
                         return   $this->response([
                                    'status' => 200,
                                    'data' => $db
                                ], REST_Controller::HTTP_OK); 
                            
                        } else{
                        return    $this->response([
                                'status' => FALSE,
                                'message' => 'Payment Pending'
                            ], REST_Controller::HTTP_NOT_FOUND); 
                        }
                    
            
        }else{
            return    $this->response([
                'status' => FALSE,
                'message' => 'key not found'
            ], REST_Controller::HTTP_NOT_FOUND); 
        }

       
	}
    function send_image_post(){
        if(!$this->input->post("phone") or !$this->input->post("msg") or  !$this->input->post("url"))
        {
            return    $this->response([
                'status' => 400,
                'message' => "params not complete"
            ], REST_Controller::HTTP_BAD_REQUEST);  
        }

         $cekKey = $this->mdl->getCekKey();
         if($cekKey != null){

                    $cekMasaAktif = $this->mdl->getMasaAktif();
                    if($cekMasaAktif != null){
                            $db	=	$this->mdl->send_image($cekKey);
                            
                         return   $this->response([
                                    'status' => 200,
                                    'data' => $db
                                ], REST_Controller::HTTP_OK); 
                            
                        } else{
                        return    $this->response([
                                'status' => FALSE,
                                'message' => 'Payment Pending'
                            ], REST_Controller::HTTP_NOT_FOUND); 
                        }
                    
            
        }else{
            return    $this->response([
                'status' => FALSE,
                'message' => 'key not found'
            ], REST_Controller::HTTP_NOT_FOUND); 
        }

       
    }
    function send_file_post(){
        if(!$this->input->post("phone") or !$this->input->post("msg") or  !$this->input->post("url"))
        {
            return    $this->response([
                'status' => 400,
                'message' => "params not complete"
            ], REST_Controller::HTTP_BAD_REQUEST);  
        }

         $cekKey = $this->mdl->getCekKey();
         if($cekKey != null){

                    $cekMasaAktif = $this->mdl->getMasaAktif();
                    if($cekMasaAktif != null){
                            $db	=	$this->mdl->send_file($cekKey);
                            
                         return   $this->response([
                                    'status' => 200,
                                    'data' => $db
                                ], REST_Controller::HTTP_OK); 
                            
                        } else{
                        return    $this->response([
                                'status' => FALSE,
                                'message' => 'Payment Pending'
                            ], REST_Controller::HTTP_NOT_FOUND); 
                        }
                    
            
        }else{
            return    $this->response([
                'status' => FALSE,
                'message' => 'key not found'
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
	 
	function createSession_post(){
        $db	=	$this->mdl->createSession();
        $this->response([
            'status' => 200,
            'data' => $db,
        ], REST_Controller::HTTP_OK); 
    }
    function updateStatusOffDevice_get(){
          $db	=	$this->mdl->updateStatusOffDevice();
        $this->response([
            'status' => 200,
            'data' => "All device off!",
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
