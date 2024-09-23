<?php

class Model extends CI_Model  {
    
    var $data_broadcast="data_broadcast";
   
 	function __construct()
    {
        parent::__construct();
    }
	function idu()
	{
		return $this->session->userdata("id");
	}
	 
    function updateTombol(){
        $btn1 = $this->input->post("btn1");
        $btn2 = $this->input->post("btn2");
        $btn3 = $this->input->post("btn3");
        
        $desc1 = $this->input->post("desc1");
        $desc2 = $this->input->post("desc2");
        $desc3 = $this->input->post("desc3");
        
        
        
        if($btn1){
            if(!$desc1){
                 $listing[]  =   array("body"=>$btn1);
            }else{
                if(strpos($desc1,"http")!==FALSE){ $type = "url";}else{ $type="number";}
                 $listing[]  =   array("body"=>$btn1,$type=>$desc1);
            }
        }
        
        if($btn2){
            if(!$desc2){
                 $listing[]  =   array("body"=>$btn2);
            }else{
                if(strpos($desc2,"http")!==FALSE){ $type = "url";}else{ $type="number";}
                 $listing[]  =   array("body"=>$btn2,$type=>$desc2);
            }
        }
        
        if($btn3){
            if(!$desc3){
                 $listing[]  =   array("body"=>$btn3);
            }else{
                if(strpos($desc3,"http")!==FALSE){ $type = "url";}else{ $type="number";}
                 $listing[]  =   array("body"=>$btn3,$type=>$desc3);
            }
        }
            
        $tbl        =   json_encode($listing);
       
       $this->db->set("options",$tbl);
       $this->db->where("id",$this->input->post("id"));
       return $this->db->update("data_broadcast");
    }

	function get_data()
	{
		$this->_get_data();
		if($this->input->post("length")!=-1) 
		$this->db->limit($this->input->post("length"),$this->input->post("start"));
	 	return $this->db->get()->result();
	}
	function _get_data()
	{
		if(isset($_POST['search']['value'])){
			$searchkey=$_POST['search']['value']; 
				$query=array(
				"kegiatan"=>$searchkey, 
				"mak_panjang"=>$searchkey, 
				"kode"=>$searchkey, 				 	 
				);
				$this->db->group_start()
                ->or_like($query)
                ->group_end();
			}	
			$pic = $this->input->post("pic");
			if($pic){
			    $this->db->where("_cid",$pic);
			}
            $this->db->where("tahun",$this->input->post("tahun"));
			$this->db->order_by("id","desc");
			$query=$this->db->from($this->data_broadcast);
		return $query;
	}
	public function count()
	{				
		$this->_get_data();
		return $this->db->get()->num_rows();
	}


    function get_data_view()
	{
		 $this->_get_data_view();
		if($this->input->post("length")!=-1) 
		$this->db->limit($this->input->post("length"),$this->input->post("start"));
	 	return $this->db->get()->result();
		 
	}
	function _get_data_view()
	{
	 
			$tahun = $this->m_reff->post("tahun");
			if($tahun){
				$this->db->where("substr(tanggal,1,4)",$tahun);
			}

		if (strlen(isset($_POST['search']['value'])?($_POST['search']['value']):null)>1) {
			$searchkey = $_POST['search']['value'];
			$searchkey = $this->m_reff->sanitize($searchkey);
			
			$query=array(
			"judul_berita"=>$searchkey, 				 					 				 
			);
			$this->db->group_start()
					->or_like($query)
			->group_end();
			
		}
			$this->db->order_by("id","desc");
			$query=$this->db->from("data_broadcast");
		return $query;
	}
	public function count_view()
	{				
		$this->_get_data_view();
		return $this->db->get()->num_rows();
	}

    function insert(){
        $form   = $this->input->post("f");
        $year = $this->input->post("f[tahun]");
        $genkode    = $this->generateKode($year);
        if(!is_dir('file_upload/'.$year.''))
        {
            mkdir('file_upload/'.$year.'',0777,TRUE);
        }
        if(!is_dir('file_upload/'.$year.'/'.$genkode.''))
        {
            mkdir('file_upload/'.$year.'/'.$genkode.'',0777,TRUE);
        }
        $this->db->set(
			array(
			"_cid"		=>	$this->idu(),
			"_ctime"	=>	date("Y-m-d H:i:s"),
			"kode"		=>	$genkode,
            "status_berkas"		=>	1
			)
		);
        $this->db->set($form);
        $this->db->insert($this->data_broadcast);
        $var["token"]=$this->m_reff->getToken();
        return $var;
    }
    function update(){
        $form   = $this->input->post("f");
        $id     = $this->input->post("id"); 
        $this->db->where("id",$id);
        $this->db->set($form);
        $this->db->update($this->data_broadcast);
        
        $this->db->set("mak_panjang",$this->input->post("f[mak_panjang]"));
        $this->db->where("kode_kegiatan",$this->input->post("f[kode]"));
        $this->db->update("data_rabdetail");
        
        $var["token"]=$this->m_reff->getToken();
        return $var;
    }
    
    
    
 
	function updatePost(){
		$this->db->set($this->input->post("field"),$this->input->post("val"));
		$this->db->where("id",$this->input->post("id"));
		return $this->db->update("data_broadcast");
	}
	function updatePostTgl(){
		$this->db->set("tanggal",$this->tanggal->eng_($this->input->post("val"),"-"));
		$this->db->where("id",$this->input->post("id"));
		return $this->db->update("data_broadcast");
	}
	function jmlPhoto($id){
		$this->db->where("jenis_media","image");
		$this->db->where("id_artikel",$id);
		return $this->db->get("data_media")->num_rows();
	}
	function jmlVideo($id){
		$this->db->where("jenis_media","video");
		$this->db->where("id_artikel",$id);
		return $this->db->get("data_media")->num_rows();
	}
	function hapus(){
		$id = $this->m_reff->post("id");
		$path = $this->m_reff->pengaturan(5)."/".$id;
		$this->m_reff->hapussemua($path);

		$this->db->where("id_artikel",$id);
		$this->db->delete("data_media");

		$this->db->where("id",$id);
		return $this->db->delete("data_broadcast");

	}
	function hapus_media(){
		$real = $this->m_reff->pengaturan(5);
		$this->db->where_in("id",$this->input->post("obj"));
		$this->db->where("id_artikel",$this->m_reff->post("id"));
		$data = $this->db->get("data_media")->result();
		foreach($data as $v){
			$id_artikel 		= $v->id_artikel;
			$path				= $v->path;
			$path_thumbnail		= $v->path_thumbnail;

			if(file_exists($real."/".$path)){
				unlink($real."/".$path);
			}
			if(file_exists($real."/".$path_thumbnail)){
				unlink($real."/".$path_thumbnail);
			}

			$this->db->where("id",$v->id);
			$this->db->delete("data_media");
		}
	}

	function delimage(){
		$img =  $this->m_reff->post("img");
		$base = base_url().$this->m_reff->pengaturan(5)."/";
		$path = str_replace($base,"",$img);
		$this->db->where("path",$path);
		return $this->db->delete("data_media");
	}

	function send(){
		$nomor = $this->input->post("nomor");
		$id = $this->input->post("id");
		$path = base_url().$this->m_reff->pengaturan(5)."/";

		$this->db->where("id",$id);
		$db 	 = $this->db->get("data_broadcast")->row();
		$msg     = isset($db->artikel)?($db->artikel):null;
		$type    = isset($db->type)?($db->type):null;
		$options  = isset($db->options)?($db->options):null;
		$type_pesan = 1; //text
		if($type==2){
		    	$msg = array("title"=>null,"body"=>$msg,"footer"=>null);
	        	$msg = json_encode($msg);
	        	$type_pesan = 5; //tombol
		}
		
		$waname = $this->input->post("wa");
		if($waname){

						foreach($waname as $wa){
							$data = array(
							    	"nama_group" => $wa,
							    	"pesan" => $msg,
									"url" => null,
            						"hits" =>2,
            						"id_user"=>$this->idu(),
            						"type"=>3, //wagroup
            						"options"=>$options
							);
				// 			$this->m_reff->kirimWag($data);
			    	$this->db->set($data);
					$this->db->insert("data_pesan");
						
										$this->db->where("id_artikel",$id);
										$db 	 = $this->db->get("data_media")->result();
										foreach($db as $media){
											$data = array(
												"nama_group" => $wa,
												"pesan" => null,
												"url" => $path.$media->path, 
                        						"hits" =>2,
                        						"id_user"=>$this->idu(),
                        						"type"=>4 ///wagroup media
											);
									    	$this->db->set($data);
					                        $this->db->insert("data_pesan");
										}
											

						}
		}
		///////// kirim kontak group /////////
		$kontak = $this->input->post("kontak");
		if($kontak){ 
						foreach($kontak as $kontakID){
						 
							$dataKontak = $this->db->get_where("data_kontak",array("id_group"=>$kontakID))->result();
							foreach($dataKontak as $val){
								
										$phone = $val->no_hp;
										$data = array(
											    "no_tujuan" => $phone,
											    "pesan"   => $msg,
										    	"url" => null, 
                        						"hits" =>2,
                        						"id_user"=>$this->idu(),
                        						"type"=>$type_pesan,
                        						"options" =>$options
										);
									    	$this->db->set($data);
					                        $this->db->insert("data_pesan");
								// 		$this->m_reff->kirimWa($data);
						
										$this->db->where("id_artikel",$id);
										$db 	 = $this->db->get("data_media")->result();
										foreach($db as $media){
											$data = array(
												"no_tujuan" => $phone,
												"pesan" => null,
												"url" => $path.$media->path,
                        						"hits" =>2,
                        						"id_user"=>$this->idu(),
                        						"type"=>2 //bermedia
											);
								// 			$this->m_reff->kirimWa($data);
								        	$this->db->set($data);
					                        $this->db->insert("data_pesan");
										}

						}


					}
		}
 		///////// kirim nomor /////////
		if($nomor){
			 
				$this->db->where("id",$id);
				$db 	 = $this->db->get("data_broadcast")->row();
				$msg     = isset($db->artikel)?($db->artikel):null;
				$type    = isset($db->type)?($db->type):null;
            		$options  = isset($db->options)?($db->options):null;
            		$type_pesan = 1;
            		if($type==2){
            		    	$msg = array("title"=>null,"body"=>$msg,"footer"=>null);
            	        	$msg = json_encode($msg);
            	        	$type_pesan=5;
            		}
		
		
				$ray = $this->m_reff->clearkomaray($nomor);
				if(count($ray)>0){
				foreach($ray as $wa){
					$data = array(
						"no_tujuan" => $wa,
						"pesan"   => $msg,
						"url" => null,
						"hits" =>2,
						"id_user"=>$this->idu(),
						"type"=>$type_pesan,
						"options"=>$options
					);
				// 	$this->m_reff->kirimWa($data);
					$this->db->set($data);
					$this->db->insert("data_pesan");
				
								$this->db->where("id_artikel",$id);
								$db 	 = $this->db->get("data_media")->result();
								foreach($db as $media){
									$data = array(
										"no_tujuan" => $wa,
										"pesan" => null,
										"hits" =>2,
										"url" => $path.$media->path,
										"id_user"=>$this->idu(),
										"type"=>2 //media
									);
								// 	$this->m_reff->kirimWa($data);
										$this->db->set($data);
				                    	$this->db->insert("data_pesan");
								}
		
				}
			}else{
							$data = array(
								"no_tujuan" => $nomor,
								"pesan"   => $msg,
								"url" => null,
								"hits" =>2,
								"type"=>$type_pesan,
								"options"=>$options,
								"id_user"=>$this->idu(),
							);
				// 			$this->m_reff->kirimWa($data);
			                        	$this->db->set($data);
				                    	$this->db->insert("data_pesan");
			
							$this->db->where("id_artikel",$id);
							$db 	 = $this->db->get("data_media")->result();
							foreach($db as $media){
								$data = array(
									"no_tujuan" => $nomor,
									"pesan" => null,
										"hits" =>2,
										"url" => $path.$media->path,
										"id_user"=>$this->idu(),
										"type"=>2 //media
								);
								$this->db->set($data);
				                $this->db->insert("data_pesan");
							}


			}
		

			}
		 
		if($this->input->post("wa")){
			$kirim_group  	= implode(",",$this->input->post("wa"));
			$this->db->set("kirim_group",$kirim_group);
		}

		if($this->input->post("kontak")){
			$kirim_kontak 	= implode(",",$this->input->post("kontak"));
			$this->db->set("kirim_kontak",$kirim_kontak);
		}
		
		$tgl_broadcast	= date("Y-m-d H:i:s");
		$this->db->where("id",$id);
		
		
		$kirim_nomor  	= $this->input->post("nomor");
		$this->db->set("kirim_nomor",$kirim_nomor);
		$this->db->set("tgl_broadcast",$tgl_broadcast);
		return $this->db->update("data_broadcast");

		
	}

    
    
}