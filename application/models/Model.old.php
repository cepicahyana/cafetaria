<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	 
	class Model extends CI_Model {

   
		function send_text(){
			$no_tujuan = $this->input->post("nomor");
			$pesan  = $this->input->post("pesan"); 
			$this->db->set("tgl",date("Y-m-d H:i:s"));
			$this->db->set("sts",1);
			$this->db->set("type",1);
			$this->db->set("no_tujuan",$no_tujuan);
			$this->db->set("pesan",$pesan.date("hisYmd"));
			$this->db->insert("data_pesan");
			return $this->input->post();
		}
		
		function getDataMessage(){ 
			$this->db->where("sts",1);
			$this->db->limit(50);
			$db = $this->db->get("data_pesan")->result();
			$var=array();
			$i=1;
			$id ="";
			foreach($db as $val){
				$var[] = array(
				"nomor" => $val->no_tujuan,
				"pesan" => $val->pesan,
				"id"    => $val->id
				);
				$id.=$val->id.",";
				$i++;
			}
			$data["data"]=$var;
			$data["dataID"]=$id;
			return $data;
		}
		
		function updateStatusMessage(){
			$data   = $this->input->get("dataID");
			$dataID = $this->m_reff->clearkomaray($data); 
			$this->db->set("sts",2);
			$this->db->where_in("id",$dataID);
			return $this->db->update("data_pesan");
		}	
		function setQr(){
			$qr   = $this->input->get("qr"); 
			$sender_number   = $this->input->get("sender_number"); 
			$this->db->where("sender_number",$sender_number);
			$this->db->set("qr",$qr); 
			return $this->db->update("device_stations");
		}	
		function addsender_number(){
			$sender_number   = $this->input->get("sender_number");  
			$this->db->set("sender_number",$sender_number); 
			return $this->db->insert("device_stations");
		}
		function setDeviceStatus(){
			$sender_number   = $this->input->get_post("sender_number");  
			$sts	    = $this->input->get_post("sts");  
			$session    = $this->input->get_post("session");  
			if($session){
				$this->db->set("session",$session); 
			}
			$this->db->set("sts",$sts); 
			$this->db->set("updated",date('Y-m-d H:i:s')); 
			$this->db->where("sender_number",$sender_number); 
			return $this->db->update("device_stations");
		}

		function delSessionsFile(){
				$this->db->where("sender_number",$this->input->post("sender_number"));
				$this->db->set("session",null);
				return $this->db->update("device_stations");
		}
		function addSessionsFile(){
			if($this->input->post("id")){
				$this->db->set("sender_number",$this->input->post("sender_number"));
				$this->db->set("sts",$this->input->post("sts"));
				return $this->db->insert("device_stations");
			} return false;
		}

		function setSessionsFile(){
		 
			if($this->input->get_post("sts")){
				$this->db->set("sts",$this->input->get_post("sts"));
			}
			$this->db->set("sender_number",$this->input->get_post("sender_number"));
			return $this->db->update("device_stations");
		}
 
		function getSessionsFile(){
			// $this->db->set("value",$this->input->post("session"));
			$to = $this->input->get_post("to");
			$to = str_replace("@c.us","",$to);
			if($to){
				$this->db->set("session",null);
				$this->db->set("sts",0);
				$this->db->where("sender_number",$to);
				$this->db->update("device_stations");
			}
			$this->db->se("sts!=",5);
			$this->db->where("session IS NOT NULL");
			$db =  $this->db->get("device_stations")->result_array();
			return $db;
		}
 
		function cekInstruksi(){
			return $this->db->get("pesan_instruksi")->result_array();
		}
		function hapusInstruksi_get(){

			$this->db->where("id",$this->input->post("id"));
			$this->db->delete("pesan_instruksi");
		}
		function getSessionNull(){
			// $this->db->set("value",$this->input->post("session"));
			$to = $this->input->get_post("to");
			$to = str_replace("@c.us","",$to);
			if($to){
			$this->db->where("sender_number",$to);	
			}
	  	
			$this->db->where("sts!=",5);
			$this->db->where("(session IS NULL or session = '')");
			$db =  $this->db->get("device_stations")->result_array();
			return $db;
		}
		function createSession(){
			// $this->db->set("value",$this->input->post("session"));
			$id   = $this->input->get_post("sender_number");
			$this->db->where("sender_number",$id);
			$cek = $this->db->get("device_stations")->row();
			if(isset($cek->session)?($cek->session):""){
				// $this->db->where("sender_number",$id);
				// $this->db->update("device_stations");
				return $cek->session;
			}else{
				return false;
				 
			}
		}
 
	}
?>