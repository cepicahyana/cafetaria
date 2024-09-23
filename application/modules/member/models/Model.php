<?php

class Model extends CI_Model  {
    
	 
	function __construct()
    {
        parent::__construct();
    }


	function jml_chat_inbox($tahun){
		 
		 if($tahun<100){ //7 hari kemarin
	    	 $tgl = date("Y-m-d");
	    	 $tgl = $this->tanggal->minTglEng($tahun,$tgl);
		     $this->db->where("SUBSTR(_ctime,1,10)>=",$tgl);
		     $jml1 = $this->db->get("inbox_autoreplay")->num_rows();
		     
		     $this->db->where("SUBSTR(_ctime,1,10)>=",$tgl);
		     $jml2 = $this->db->get("msg_inbox")->num_rows();
		     return $jml1+$jml2;
		 }else{
		     $this->db->where("SUBSTR(_ctime,1,4)",$tahun);
		     $jml1 = $this->db->get("inbox_autoreplay")->num_rows();
		     
		     $this->db->where("SUBSTR(_ctime,1,4)",$tahun);
		     $jml2 = $this->db->get("msg_inbox")->num_rows();
		     return $jml1+$jml2;
		 }
	}
	
	function jml_live_chat($tahun){
	    if($tahun<100){ //7 hari kemarin
	    	 $tgl = date("Y-m-d");
	    	 $tgl = $this->tanggal->minTglEng($tahun,$tgl);
		     $this->db->where("SUBSTR(_ctime,1,10)>=",$tgl);
		     $this->db->select("DISTINCT(kode)");
		     $this->db->where("id_cs",null);
		     return $this->db->get("pesan_cs")->num_rows();
		 }else{
		     $this->db->select("DISTINCT(kode)");
		     $this->db->where("id_cs",null);
		     $this->db->where("SUBSTR(_ctime,1,4)",$tahun);
		     return $this->db->get("pesan_cs")->num_rows();
		 }
	}
		function jml_live_chat_norespon($tahun){
	    if($tahun<100){ //7 hari kemarin
	    	 $tgl = date("Y-m-d");
	    	 $tgl = $this->tanggal->minTglEng($tahun,$tgl);
		     $this->db->where("SUBSTR(_ctime,1,10)>=",$tgl);
		      $this->db->where("id_cs",null);
		     return $this->db->get("session_cs")->num_rows();
		 }else{
		      $this->db->where("id_cs",null);
		     $this->db->where("SUBSTR(_ctime,1,4)",$tahun);
		     return $this->db->get("session_cs")->num_rows();
		 }
	}
	function jml_live($tahun){
	    if($tahun<100){ //7 hari kemarin
	    	 $tgl = date("Y-m-d");
	    	 $tgl = $this->tanggal->minTglEng($tahun,$tgl);
		     $this->db->where("SUBSTR(_ctime,1,10)>=",$tgl);
		      $this->db->where("id_cs !=",null);
		     return $this->db->get("session_cs")->num_rows();
		 }else{
		      $this->db->where("id_cs !=",null);
		     $this->db->where("SUBSTR(_ctime,1,4)",$tahun);
		     return $this->db->get("session_cs")->num_rows();
		 }
	}
	function jml_aduan_norespon($tahun){
	    if($tahun<100){ //7 hari kemarin
	    	 $tgl = date("Y-m-d");
	    	 $tgl = $this->tanggal->minTglEng($tahun,$tgl);
		     $this->db->where("SUBSTR(_ctime,1,10)>=",$tgl);
		     $this->db->where("sts",0);
		     return $this->db->get("data_aduan")->num_rows();
		 }else{
		     $this->db->where("sts",0);
		     $this->db->where("SUBSTR(_ctime,1,4)",$tahun);
		     return $this->db->get("data_aduan")->num_rows();
		 }
	}
	function jml_pengaduan($tahun){
	    if($tahun<100){ //7 hari kemarin
	    	 $tgl = date("Y-m-d");
	    	 $tgl = $this->tanggal->minTglEng($tahun,$tgl);
		     $this->db->where("SUBSTR(_ctime,1,10)>=",$tgl);
		     return $this->db->get("data_aduan")->num_rows();
		 }else{
		     $this->db->where("SUBSTR(_ctime,1,4)",$tahun);
		     return $this->db->get("data_aduan")->num_rows();
		 }
	}
	
		function jml_org_inbox($tahun){
		 
		 if($tahun<100){ //7 hari kemarin
	    	 $tgl = date("Y-m-d");
	    	 $tgl = $this->tanggal->minTglEng($tahun,$tgl);
		      $this->db->where("SUBSTR(_ctime,1,10)>=",$tgl);
		     $this->db->select("DISTINCT(sender_number)");
		     $jml1 = $this->db->get("inbox_autoreplay")->num_rows();
		     
		      $this->db->where("SUBSTR(_ctime,1,10)>=",$tgl);
		      $this->db->select("DISTINCT(sender_number)");
		     $jml2 = $this->db->get("msg_inbox")->num_rows();
		     return $jml1+$jml2;
		 }else{
		     $this->db->where("SUBSTR(_ctime,1,4)",$tahun);
		      $this->db->select("DISTINCT(sender_number)");
		     $jml1 = $this->db->get("inbox_autoreplay")->num_rows();
		     
		     $this->db->where("SUBSTR(_ctime,1,4)",$tahun);
		      $this->db->select("DISTINCT(sender_number)");
		     $jml2 = $this->db->get("msg_inbox")->num_rows();
		     return $jml1+$jml2;
		 }
	}
 
}




