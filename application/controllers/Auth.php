<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
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


class Auth extends REST_Controller {

 public function __construct()
 {
  parent::__construct();
  $this->load->model('model_auth','model');
  $this->load->model('m_reff');
  date_default_timezone_set('Asia/Jakarta');
 }

function indexxxx_get()
{
	  $baselink		=	"https://kios.apersi.org/auth";
	  $google_client = new Google_Client();
	  $ClientID		     = $this->m_reff->pengaturan(22);
	  $SecretKey	     = $this->m_reff->pengaturan(23);
	  $google_client->setClientId($ClientID); //Define your ClientID

	  $google_client->setClientSecret($SecretKey); //Define your Client Secret Key

	  $google_client->setRedirectUri("http://tai.suarakerempugan.com/auth"); //Define your Redirect Uri

	  $google_client->addScope('email');

	  $google_client->addScope('profile');
	  $code = $this->get("code");
	  if($code)
	  {
	   $token = $google_client->fetchAccessTokenWithAuthCode($code);

	   if(!isset($token["error"]))
	   {
				$google_client->setAccessToken($token['access_token']);

				$this->session->set_userdata('access_token', $token['access_token']);

				$google_service = new Google_Service_Oauth2($google_client);

				$data = $google_service->userinfo->get();
				 
				$current_datetime = date('Y-m-d H:i:s');

				if($this->model->Is_already_register($data['id']))
				{
						 //update data
						 $data_user = array(
						
						  'id' => $data['id'],
						   'nama_depan'  => $data['given_name'],
						   'nama_belakang'=> $data['family_name'],
						  'email'  => $data['email'],
						  'jk'  => $data['gender'],
						  'poto' => $data['picture'],  
						  'last_login'  => $current_datetime
						 );

						 $this->model->Update_user_data($data_user, $data['id']);
						 
						 redirect($baselink."?sts=up&userID=".$data['id']
						 ."&nama_depan=".$data['given_name']."&nama_belakang=".$data['family_name'].
						 "&email=".$data['email']."&jk=".$data['gender']."&poto=".$data['picture'].
						 "&source=google&level=costumer&last_login=".$current_datetime);
				}
				else
				{
						 //insert data
						 $data_user = array(
						 
						 'id' => $data['id'],
						 'nama_depan'  => $data['given_name'],
						   'nama_belakang'=> $data['family_name'],
						 'jk'  => $data['gender'],
						  'email'  => $data['email'],
						  'poto' => $data['picture'],
					       'reg'  => $current_datetime,
							'last_login'  => $current_datetime
						 );

						 $this->model->Insert_user_data($data_user);
						 	 redirect($baselink."?sts=in&userID=".$data['id']
						 ."&nama_depan=".$data['given_name']."&nama_belakang=".$data['family_name'].
						 "&email=".$data['email']."&jk=".$data['gender']."&poto=".$data['picture'].
						 "&source=google&level=costumer&last_login=".$current_datetime);
				}
		 
	   }
  }else{
				$link=$google_client->createAuthUrl();
   
			return	$this->response([ 
                    'status' => $this->session->userdata('access_token'),
                    'data' => $link
                ], REST_Controller::HTTP_OK); 
	  
  }
   
   
 }


function index_post()
{
				 $data			=	$this->post(); 
				 $provider_id	=	$data[0];
				 $data			=	json_decode($provider_id,TRUE);  
				 $email			=	$data["email"]; 
				 $id			=	$data["provider_id"]; 
				 $current_datetime=date("Y-m-d H:i:s");
				if($this->model->Is_already_register($email))
				{
						 //update data
						 $data_user = array(
						 
						   'nama'  => $data['name'],
						   'login_type'=> $data['provider'],
						  'email'  => $data['email'], 
						  'poto' => $data['provider_pic'],  
						  'token_id' => $data['token'],  
						  'last_login'  => $current_datetime
						 ); 
						 $this->model->Update_user_data($data_user, $email);
						 $sts="login";
						 $poto=$data['provider_pic'];
						 
				}
				else
				{
						 //insert data
						 $data_user = array( 
						   'id' => $data['provider_id'],
						   'nama'  => $data['name'],
						   'login_type'=> $data['provider'],
						  'email'  => $data['email'], 
						  'poto' => $data['provider_pic'],  
						   'token_id' => $data['token'],  
						  'last_login'  => $current_datetime
						 );
						$this->model->Insert_user_data($data_user);
						  $sts="signup";
						  	 $poto=$data['provider_pic'];
				}
		 
	    
   
			return	$this->response([ 
                    'status' =>true,
                    'poto'=>$poto,
					'data'=>$data_user,
					'id'=>$id,
					'type'=>$sts
                    
                ], REST_Controller::HTTP_OK); 
	  
  }
   
   


function identifylogin_get()
{
	$email		=	$this->get("email");
	$userID		=	$this->get("userID");
	$cekUser	=	$this->model->cekUser($email,$userID);
	if(isset($cekUser->id)){
	return			$this->response([ 
                    'status' => true,
                    'data' => $cekUser
                ], REST_Controller::HTTP_OK); 
	}else{
	return	$this->response([ 
                    'status' => false,
                    'data' => ""
                ], REST_Controller::HTTP_OK); 
	}
}
 


 function logout()
 {
  $this->session->unset_userdata('access_token');

  $this->session->unset_userdata('user_data');

  redirect('auth/login');
 }
 
}
?>
