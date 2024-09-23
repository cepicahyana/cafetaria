<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends ci_Model
{
	
	public function __construct() {
        parent::__construct();
		//$this->m_konfig->validasi_session("super");

     	}
    var $url = "https://api-backend.konekwa.com/";
	public function restartDevice($userID,$sender)
	{
        $this->db->set("sts",100);
        $this->db->set("qr",null);
        $this->db->set("session",null);
        $this->db->where("sender_number",$sender);
        $this->db->where("id_user",$this->m_reff->idu());
        $this->db->update("device_stations");

        $msg = "restartDevice::".$sender."::".$userID;
        return $this->kirim($msg);
    }




    private function kirim($msg)
    { return false;
            $data = [
                'phone' => "085221288210",
                'message' => $msg,
            ];
       
        $curl = curl_init();
        $token =  "123";
        curl_setopt($curl, CURLOPT_HTTPHEADER,
            array(
                "Authorization:".$token,
            )
        );
        curl_setopt($curl, CURLOPT_URL, $this->url."api/kirim_bulan");
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data)); 
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($curl);
        curl_close($curl); 
        return $result;
    }

}
?>