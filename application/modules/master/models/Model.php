<?php
class Model extends CI_Model  {
    
	 
	function __construct()
    {
        parent::__construct();
    }
 
 function setMenu(){
   $id_order = $this->input->post("id_order"); 
   $nama_menu = $this->input->post("id_menu"); 
   $hp_pelanggan = $this->input->post("hp_pelanggan"); 
   $this->db->where("nama",$nama_menu);
   $this->db->where("sn",$this->session->userdata("sn"));
   $db = $this->db->get("daftar_menu")->row();
   $id_barang = isset($db->id)?($db->id):null;
    $harga = isset($db->harga)?($db->harga):null;
    $nama = isset($db->nama)?($db->nama):null;
   if(!$id_barang){ return false;}
          
            
            $data=array(
            "id_session_order" => $id_order,
            "kode_barang"=>$id_barang
            );
            $this->db->where($data);
            $cek = $this->db->get("tm_list_order")->row();
            if(isset($cek)){
                
                //update
                        $data=array(
                        "qty"  =>($cek->qty+1),
                        );
                        $this->db->set($data);
                        $this->db->where("id",$cek->id);
                          $this->db->update("tm_list_order");
                            
            }else{
                //insert
                  $data=array(
                        "id_session_order" => $id_order,
                        "id_user"  => $this->session->userdata("sn"),
                        "qty"  =>(1),
                        "harga_satuan"  => $harga,
                        "nama_barang"  => $nama,
                        "entry"  => date('Y-m-d H:i:s'),
                        "kode_barang"=>$id_barang,
                        "hp_pelanggan"=>$hp_pelanggan
                        );
                        $this->db->set($data);
                          $this->db->insert("tm_list_order");
            }
         
         
            $this->db->select("sum(harga_satuan*qty) as jml,sum(qty) as qty");
            $this->db->where("id_session_order",$id_order);
            $db = $this->db->get("tm_list_order")->row();
            $jml = isset($db->jml)?($db->jml):null;
            $qty = isset($db->qty)?($db->qty):null;
             
          
            $this->db->set("harga_final",$jml);
            $this->db->set("qty",$qty);
            $this->db->where("id_order",$id_order);
            return $this->db->update("tm_order");
         
         
         
         
 }
    function set_value(){
           $this->db->set($this->input->post("field"),$this->input->post("value")); 
        $this->db->where("id_order",$this->input->post("id_order")); 
        return $this->db->update("tm_order");
    }
    function diakses($tgl){
        $sn = $this->session->userdata("sn");
        $this->db->where("to",$sn); 
        $this->db->where("DATE(_ctime)",$tgl);
        $this->db->group_by("sender_number");
        return $this->db->get("msg_inbox")->num_rows();
    }
    function setOrderRekap(){
        // $this->db->where("id_user",$this->session->userdata("sn")); 
        $this->db->set("tanda",$this->input->post("sts")); 
        $this->db->where("id",$this->input->post("id")); 
        return $this->db->update("tm_order");
    }
    function insert_menu(){
        $set=$this->input->post("f[]");
        $this->db->set($set); 
        $this->db->set("sn",$this->session->userdata("sn"));
        return $this->db->insert("daftar_menu");
    }
     function update_menu(){
        $set=$this->input->post("f[]");
        $this->db->set($set); 
        $id = $this->input->post("id");
        $this->db->where("id",$id); 
        return $this->db->update("daftar_menu");
    }
    function diorder($tgl){
        $sn = $this->session->userdata("sn");
        $this->db->where("id_user",$sn);
         $this->db->where("sts>",1);
        $this->db->where("DATE(entry)",$tgl);
        return $this->db->get("tm_order")->num_rows();
    }
    function order_selesai(){
        $id = $this->input->post("id");
        $this->db->where("id_user",$this->session->userdata("sn"));
        $this->db->where("id",$id);
        $this->db->set("sts",3);
        $this->db->set("deliv",date('Y-m-d H:i:s'));
        return $this->db->update("tm_order");
    }
    function order_sesuai(){
         $id = $this->input->post("id");
        $this->db->where("id_user",$this->session->userdata("sn"));
        $this->db->where("id",$id);
        $this->db->set("sts",2);
        $this->db->set("deliv",date('Y-m-d H:i:s'));
        return $this->db->update("tm_order");
    }
    function order_delete(){
          $id = $this->input->post("id");
        $this->db->where("id_user",$this->session->userdata("sn"));
        $this->db->where("id",$id);
        $this->db->set("del",1);
        return $this->db->update("tm_order");
    }
    function delete_menu(){
           $id = $this->input->post("id");
        $this->db->where("sn",$this->session->userdata("sn"));
        $this->db->where("id",$id);
        return $this->db->delete("daftar_menu");
    }
	function insert(){
		$s  = $this->input->post("sender_number");
		$hp = $this->m_reff->hp($s);

		$cek = $this->db->get_where("device_stations",array("sender_number"=>$hp))->num_rows();
		if($cek){
			$var["gagal"] = true;
			$var["info"] = "Nomor sudah terdaftar!";
			return $var;
		}
		if($this->input->post("sts")==5){
			$this->db->set("session",null);
		}
		$this->db->set("key",$this->m_reff->acak(20));
		$this->db->set("sender_number",$hp);
		$this->db->set("id_user",$this->m_reff->idu());
		$this->db->set("package",$p=$this->input->post("package"));
		$this->db->set("sts",$p=$this->input->post("sts"));
		$this->db->set("sender_name",$p=$this->input->post("sender_name"));
		$this->db->set("id_user",$this->m_reff->idu());
		$this->db->insert("device_stations");
		return $this->newInvoice($p,$s);
	}
	function delete_ghalery(){
	    $file = $this->input->post("file");
	    $this->db->set("foto".$this->input->post("id"),null);
	    $sn  = $this->session->userdata("sn");
	    
	    $filename="file_upload/".$sn."/".$file;
		if (file_exists($filename)) {
			unlink($filename); 
		}  
	    
		$this->db->where("sender_number",$sn);
	    return $this->db->update("device_stations");
	}
	
		function delete_fotmenu(){
	    $file = $this->input->post("file");
	    
	    $sn  = $this->session->userdata("sn");
	    
	    $filename="file_upload/".$sn."/".$file;
		if (file_exists($filename)) {
			unlink($filename); 
		}  
	    $id = $this->input->post("id");
	    if($id==1){
	        $this->db->set("foto_menu",null);
	    }
	    if($id==2){
	        $this->db->set("foto_menu2",null);
	    }
		$this->db->where("sender_number",$sn);
	    return $this->db->update("device_stations");
	}
	function del_media(){
	    $sn  = $this->session->userdata("sn");
	    $this->db->where("sender_number",$sn);
	    $file =  $this->db->get("device_stations")->row();
	    $file = isset($file->file_broadcast)?($file->file_broadcast):"ccc.cc";
	     
	    $filename="file_upload/".$sn."/".$file;
		if (file_exists($filename)) {
			unlink($filename); 
		} 
	    
	    
	    $this->db->where("sender_number",$sn);
		$this->db->set("file_broadcast",null);
	    return $this->db->update("device_stations");
	}
// 	function delete_fotmenu(){
// 	    $file = $this->input->post("file");
// 	    $this->db->set("foto_menu",null);
// 	    $sn  = $this->session->userdata("sn");
	    
// 	    $filename="file_upload/".$sn."/".$file;
// 		if (file_exists($filename)) {
// 			unlink($filename); 
// 		}  
	    
// 		$this->db->where("sender_number",$sn);
// 	    return $this->db->update("device_stations");
// 	}
	function update(){
	    
		$sn  = $this->session->userdata("sn");
		$ln = $this->input->post("link_name");
		$cek = $this->db->get_where("device_stations",array("sender_number!="=>$sn,"link_name"=>$ln))->num_rows();
		$jam = $this->input->post("jam");
		$jam = json_encode($jam);
		
		$notif = $this->input->post("n");
		$notif = json_encode($notif);
		$form = $this->input->post("f");
		
		      $this->db->where("sender_number",$sn);
		$db = $this->db->get("device_stations")->row();
		$this->db->set("sender_name",$this->input->post("sender_name"));
		$this->db->set("map",$this->input->post("map"));
		$this->db->set("jam_op",$jam);
		$this->db->set("notif_order",$notif);
		$this->db->set($form);
	    $this->db->set("story",$this->input->post("story"));
	    if(isset($_FILES["menu"]['tmp_name']))
			{
			    $dir=$this->m_reff->direktori($sn);
			    $before = isset($db->foto_menu)?($db->foto_menu):null;
				$file=$this->m_reff->upload_file("menu",$dir,"fotmen_","JPG,JPEG,PNG","3000000",$before);
				if($file["validasi"]!=false)
				{
					$this->db->set("foto_menu",$file["name"]);
				}else{
				    $var["gagal"] = true;
				    $var["info"]  = $file["info"];
				    return $var;
				}
 
		}
		
		
		  if(isset($_FILES["menu2"]['tmp_name']))
			{
			    $dir=$this->m_reff->direktori($sn);
			    $before = isset($db->foto_menu2)?($db->foto_menu2):null;
				$file=$this->m_reff->upload_file("menu2",$dir,"fotmen2_","JPG,JPEG,PNG","3000000",$before);
				if($file["validasi"]!=false)
				{
					$this->db->set("foto_menu2",$file["name"]);
				}else{
				    $var["gagal"] = true;
				    $var["info"]  = $file["info"];
				    return $var;
				}
 
		}
		
		
// 		else{
// 		            $var["gagal"] = true;
// 				    $var["info"]  = "Mohon upload foto menu";
// 				    return $var;
// 		}
		
		if(isset($_FILES["foto1"]['tmp_name']))
			{
			    $dir=$this->m_reff->direktori($sn);
			    $before = isset($db->foto1)?($db->foto1):null;
				$file=$this->m_reff->upload_file("foto1",$dir,"g1_","JPG,JPEG,PNG","3000000",$before);
				if($file["validasi"]!=false)
				{
					$this->db->set("foto1",$file["name"]);
				}else{
				    $var["gagal"] = true;
				    $var["info"]  = $file["info"];
				    return $var;
				}
 
		}
		function getOrder(){
		    
		}
		
		if(isset($_FILES["foto2"]['tmp_name']))
			{
			    $dir=$this->m_reff->direktori($sn);
			    $before = isset($db->foto2)?($db->foto2):null;
				$file=$this->m_reff->upload_file("foto2",$dir,"g2_","JPG,JPEG,PNG","3000000",$before);
				if($file["validasi"]!=false)
				{
					$this->db->set("foto2",$file["name"]);
				}else{
				    $var["gagal"] = true;
				    $var["info"]  = $file["info"];
				    return $var;
				}
 
		}
		
		if(isset($_FILES["foto3"]['tmp_name']))
			{
			    $dir=$this->m_reff->direktori($sn);
			    $before = isset($db->foto3)?($db->foto3):null;
				$file=$this->m_reff->upload_file("foto3",$dir,"g3_","JPG,JPEG,PNG","3000000",$before);
				if($file["validasi"]!=false)
				{
					$this->db->set("foto3",$file["name"]);
				}else{
				    $var["gagal"] = true;
				    $var["info"]  = $file["info"];
				    return $var;
				}
 
		}
		
		if(isset($_FILES["foto4"]['tmp_name']))
			{
			    $dir=$this->m_reff->direktori($sn);
			    $before = isset($db->foto4)?($db->foto4):null;
				$file=$this->m_reff->upload_file("foto4",$dir,"g4_","JPG,JPEG,PNG","3000000",$before);
				if($file["validasi"]!=false)
				{
					$this->db->set("foto4",$file["name"]);
				}else{
				    $var["gagal"] = true;
				    $var["info"]  = $file["info"];
				    return $var;
				}
 
		}
	    
	    
		if($cek){
		     $var["gagal"] = true;
				    $var["info"]  = "Silahkan cari link name yang lain";
				    return $var;
		}else{
		    $this->db->set("link_name",$ln);
		}
		
	    $this->db->set("menu_promo",$this->input->post("menu_promo"));
	    $this->db->set("info",$this->input->post("info"));
	     $this->db->set("best_seller",$this->input->post("best_seller"));
		$this->db->where("sender_number",$sn);
		$this->db->update("device_stations");
		return true;
	}
	
	
	function get_data_cos(){
		 $this->_get_data_cos();
		if($this->input->post("length")!=-1) 
		$this->db->limit($this->input->post("length"),$this->input->post("start"));
	 	return $this->db->get()->result();
	}
		function _get_data_cos()
	{ 
	 
		if(isset($_POST['search']['value'])?($_POST['search']['value']):""){
			$searchkey=$_POST['search']['value']; 
				$query=array(
				"nama"=>$searchkey, 				 		 		 
				"hp"=>$searchkey 				 				 
			 		 
				 		 
				);
				$this->db->group_start()
                        ->or_like($query)
                ->group_end();
				
			} 
				$this->db->where("to",$this->session->userdata("sn"));
			$this->db->order_by("upd","asc"); 
			$query=$this->db->from("data_pelanggan");
		return $query;
	}
		public function count_cos()
	{				
			$this->_get_data_cos();
		return $this->db->get()->num_rows();
	}
	function get_data_survei(){
	     $this->_get_data_survei();
		if($this->input->post("length")!=-1) 
		$this->db->limit($this->input->post("length"),$this->input->post("start"));
	 	return $this->db->get()->result();
	}	
	
	function _get_data_survei()
	{ 
	 
		if(isset($_POST['search']['value'])?($_POST['search']['value']):""){
			$searchkey=$_POST['search']['value']; 
				$query=array(
				"nama"=>$searchkey, 				 		 		 
				"hp"=>$searchkey, 				 				 
				"saran"=>$searchkey, 		 
				 		 
				);
				$this->db->group_start()
                        ->or_like($query)
                ->group_end();
				
			} 
// 			$this->db->where("pelayanan!=","0");
			$this->db->where("to",$this->session->userdata("sn"));
			$this->db->order_by("id","desc"); 
			$query=$this->db->from("data_survei");
		return $query;
			 
		
		 
	}
 
	public function count_survei()
	{				
			$this->_get_data_survei();
		return $this->db->get()->num_rows();
	}

	
	
	
	
	function get_data_saran()
	{
		 $this->_get_data_saran();
		if($this->input->post("length")!=-1) 
		$this->db->limit($this->input->post("length"),$this->input->post("start"));
	 	return $this->db->get()->result();
		 
	}
	function _get_data_saran()
	{ 
	  	if(isset($_POST['search']['value'])?($_POST['search']['value']):""){
			$searchkey=$_POST['search']['value']; 
				$query=array(
				"nama"=>$searchkey, 				 		 		 
				"hp"=>$searchkey, 				 				 
				"saran"=>$searchkey, 		 
				 		 
				);
				$this->db->group_start()
                        ->or_like($query)
                ->group_end();
				
			} 
				$this->db->where("to",$this->session->userdata("sn"));
			 $this->db->where("saran!=",NULL);
			$this->db->order_by("id","desc"); 
			$query=$this->db->from("kritik_saran");
		return $query;
 	}
 
	public function count()
	{				
			$this->_get_data_saran();
		return $this->db->get()->num_rows();
	}





	
	
	function get_data_menu()
	{
		 $this->_get_data_menu();
		if($this->input->post("length")!=-1) 
		$this->db->limit($this->input->post("length"),$this->input->post("start"));
	 	return $this->db->get()->result();
		 
	}
	function _get_data_menu()
	{ 
	 
		if(isset($_POST['search']['value'])?($_POST['search']['value']):""){
			$searchkey=$_POST['search']['value']; 
				$query=array(
				"nama"=>$searchkey 
				);
				$this->db->group_start()
                        ->or_like($query)
                ->group_end();
				
			} 
				$this->db->where("sn",$this->session->userdata("sn"));
			$this->db->order_by("jenis","asc");
			$this->db->order_by("kategory","asc");
			$this->db->order_by("no","asc");
			
			$query=$this->db->from("daftar_menu");
		return $query;
			 
		
		 
	}
 
	public function count_menu()
	{				
			$this->_get_data_menu();
		return $this->db->get()->num_rows();
	}



    function syncron(){
        $db=$this->db->query("SELECT COUNT(*) as jml, hp FROM data_pelanggan where data_pelanggan.to='".$this->session->userdata('sn')."' GROUP BY hp HAVING COUNT(hp) > 1 ")->result();
       
        foreach($db as $v)
        {
            $this->db->limit(($v->jml-1));
            $this->db->where("hp",$v->hp);
            $this->db->delete("data_pelanggan");
        } 
        
        $this->db->where("to",$this->session->userdata('sn'));
        return $this->db->get("data_pelanggan")->num_rows();
        
        // $sn = $this->session->userdata("sn");
        // $this->db->where("sender_number",$sn);
        // $db = $this->db->get("device_stations")->row();
        // $tgl = isset($db->tgl_syncron)?($db->tgl_syncron):null;
        
        // $this->db->set("tgl_syncron",date('Y-m-d H:i:s'));
        // $this->db->where("sender_number",$sn);
        // $this->db->update("device_stations");
      
        // $this->db->where("to",$sn);
        // $this->db->where("_ctime>='$tgl'");
        // $this->db->group_by("sender_number");
        // $db = $this->db->get("msg_inbox")->result();
        // $n=0;
        // foreach($db as $val){ 
        //      $nama = $val->sender_name;
        //      $hp   = $val->sender_number;
        //      $this->db->set("to",str_replace("@c.us","",$sn));
        //      $this->db->set("hp",$hp);
        //      $this->db->set("nama",$nama);
        //      $this->db->set("upd",date('Y-m-d H:i:s'));
        //      $cek = $this->cek_no($hp,str_replace("@c.us","",$sn));
        //      if($hp and $cek==0){
        //          $n++;
        //         $this->db->insert("data_pelanggan");
        //      }
        // }
        // return $n;
    }
    function cek_no($hp,$to){
         $this->db->where("to",$to);
          $this->db->where("hp",$hp);
         return $this->db->get("data_pelanggan")->num_rows();
    }
    
    function del_file_broadcast(){
        $sn = $this->session->userdata("sn");
        $this->db->where("sender_number",$sn);
        $db = $this->db->get("device_stations")->row();
        $file = isset($db->file_broadcast)?($db->file_broadcast):"xxx.xx";
        $filename="file_upload/".$sn."/".$file;
		if (file_exists($filename)) {
			unlink($filename); 
		}  
		        	$this->db->set("file_broadcast",null);
					$this->db->where("sender_number",$sn);
                    $this->db->update("device_stations");
		return true;
    }
    function set_broadcast(){
        $sn = $this->session->userdata("sn");
        $this->db->where("sender_number",$sn);
        $this->db->set("broadcast",$this->input->post("val"));
        return $this->db->update("device_stations");
    }
    function sent2(){
        
         $sn = $this->session->userdata("sn");
        $this->db->where("sender_number",$sn);
        $db = $this->db->get("device_stations")->row();
        
          $msg = $this->m_reff->sanitize($this->input->post("wa"));
     	$sn  = $this->session->userdata("sn");
	    if(isset($_FILES["file"]['tmp_name']))
			{
			    $dir=$this->m_reff->direktori($sn);
			    $before = isset($db->file_broadcast)?($db->file_broadcast):null;
				$file=$this->m_reff->upload_file("file",$dir,"broad_","JPG,JPEG,PNG","3000000",$before);
				if($file["validasi"]!=false)
				{
				    
					$this->db->set("file_broadcast",$file["name"]);
					  
				}else{
				    $var["gagal"] = true;
				    $var["info"]  = $file["info"];
				    return $var;
				}
 
		} 
		
		
		            $this->db->set("broadcast",$msg);
					$this->db->where("sender_number",$sn);
                    $this->db->update("device_stations");
                    
		
		 
	    $sn = $this->session->userdata("sn");
        $this->db->where("sender_number",$sn);
        $db = $this->db->get("device_stations")->row();
        $msg = isset($db->broadcast)?($db->broadcast):null;
        
        $media = isset($db->file_broadcast)?($db->file_broadcast):"xx.xx"; 
        $cek = "file_upload/".$sn."/".$media;
        if (file_exists($cek) and strlen($db->file_broadcast)>3) { 
            $media = base_url()."file_upload/".$sn."/".$media;
            $type=2;
            $this->db->set("url",$media);
        }else
        {
            $type=1;
        }
    
       
        $uji = $this->input->post("nomor");
        if($uji){
             $this->db->set("hits",2);
                $this->db->set("sender_number",$sn);
            $this->db->set("judul_pesan","Uji coba");
            $this->db->set("type",$type);
            $this->db->set("pesan",$msg);
            $this->db->set("no_tujuan",$uji);
            $this->db->insert("data_pesan");
            $var["info"]  = "Berhasil dikirim ke nomor uji coba";
	    	return $var;
        }else{
            $peserta = $this->input->post("peserta");
            $get = $this->m_reff->clearkomaray($peserta);
            $n = 0;
            foreach($get as $v){
                
                if($v){
                        $this->db->set("hits",2);
                $this->db->set("sender_number",$sn);
                    $this->db->set("judul_pesan","Broadcast");
                    $this->db->set("type",$type);
                    $this->db->set("pesan",$msg);
                    $this->db->set("no_tujuan",$v);
                    $this->db->insert("data_pesan");
                    $n++;
                }
            }
        $var["info"]  = "Berhasil dikirim ke ".$n." Data pelanggan" ;
		return $var;
        }
         
	
         
         
         
    }
    function kirim(){
        $uji = $this->input->post("no");
          $msg = $this->m_reff->sanitize($this->input->post("msg"));
         $sn = $this->session->userdata("sn");
        $this->db->where("sender_number",$sn);
        $db = $this->db->get("device_stations")->row();
        $msg = isset($db->broadcast)?($db->broadcast):null; 
        $media = isset($db->file_broadcast)?($db->file_broadcast):"xx.xx"; 
        $cek = "file_upload/".$sn."/".$media;
        if (file_exists($cek) and strlen($db->file_broadcast)>3) { 
            $media = base_url()."file_upload/".$sn."/".$media;
            $type=2;
            $this->db->set("url",$media);
        }else
        {
            $type=1;
        }
        $this->db->set("sender_number",$sn);
        $this->db->set("hits",2);
        if($uji){
            
            $this->db->set("judul_pesan","Uji coba");
            $this->db->set("type",$type);
            $this->db->set("pesan",str_replace("{nama}","ARVI",$msg));
            $this->db->set("no_tujuan",$uji);
            $this->db->insert("data_pesan");
            return 1;
        }else{
            $this->db->where("to",$sn);
            $get = $this->db->get("data_pelanggan")->result();
            $n = 0;
            foreach($get as $v){
                $this->db->set("judul_pesan","Broadcast");
                $this->db->set("type",$type);
                $this->db->set("pesan",str_replace("{nama}",$v->nama,$msg));
                $this->db->set("no_tujuan",$v->hp);
                $this->db->insert("data_pesan");
                $n++;
            }
            return $n;
        }
         
         
    }
    function save_upload(){
        $msg = $this->m_reff->sanitize($this->input->post("msg"));
         $sn = $this->session->userdata("sn");
        $this->db->where("sender_number",$sn);
        $db = $this->db->get("device_stations")->row();
        
     	$sn  = $this->session->userdata("sn");
	    if(isset($_FILES["file"]['tmp_name']))
			{
			    $dir=$this->m_reff->direktori($sn);
			    $before = isset($db->file_broadcast)?($db->file_broadcast):null;
				$file=$this->m_reff->upload_file("file",$dir,"broad_","JPG,JPEG,PNG","3000000",$before);
				if($file["validasi"]!=false)
				{
					$this->db->set("file_broadcast",$file["name"]);
					$this->db->where("sender_number",$sn);
                    $this->db->update("device_stations");
                    $var["gagal"] = false;
                    return $var;
				   
				}else{
				    $var["gagal"] = true;
				    $var["info"]  = $file["info"];
				    return $var;
				}
 
		}else{
		    $var["gagal"] = true;
		    $var["info"]  = "gagal! Silahkan upload file lain";
			return $var;
		}
 
	
		 
    }
	 
 
}




