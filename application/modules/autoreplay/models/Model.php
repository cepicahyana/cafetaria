<?php

class Model extends CI_Model  {
    

 
 	function __construct()
    {
        parent::__construct();
    }
	function idu()
	{
		return $this->session->userdata("id");
	}
	 
	function getData()
	{
		 $this->_getData();
		if($this->input->post("length")!=-1) 
		$this->db->limit($this->input->post("length"),$this->input->post("start"));
	 	return $this->db->get()->result();
		 
	}
	function hapus(){
	    $this->db->where("id",$this->input->post("id"));
	    return $this->db->delete("auto_replay");
	}
	function _getData()
	{
		if(isset($_POST['search']['value'])){
			$searchkey=$_POST['search']['value']; 
				$query=array(
				"keyword"=>$searchkey, 
				"replay" =>$searchkey
								 
				 		 
				);
				$this->db->group_start()
                        ->or_like($query)
                ->group_end();
				
			}	
			
			
			$this->db->order_by("id","desc");
			$query=$this->db->from("auto_replay");
		return $query;
		 
	}
	
	public function count()
	{				
			$this->_getData();
		return $this->db->get()->num_rows();
	}
	
	function update_autoreplay_5(){
	  $form	=	$this->input->post("f");
	 	
		$title  =   $this->input->post("title");
		$body   =   $this->input->post("body");
		$footer =   $this->input->post("footer");
		
		$replay = array("title"=>$title,"body"=>$body,"footer"=>$footer);
		$replay = json_encode($replay);
		
		$descripsi   =  $this->input->post("desc[]");
		$listopsi   =  $this->input->post("opsi[]");
		$i=0;   $listing=[];
		foreach($listopsi as $v){
		    if($v){
		        $desc = isset($descripsi[$i])?($descripsi[$i]):null;
		        if($desc){
		             $listing[]=array("title"=>$v,"description"=>$desc);
		        }else{
		             $listing[]=array("title"=>$v);
		        }
		    }
		    $i++;
		}
		
		$list["title"]="List menu pilihan";
		$list["rows"]=$listing;
		
		$list = json_encode(array($list));
		$this->db->set("jenis_pesan",5);
		$this->db->set("options",$list);
		$this->db->set("replay",$replay);
		$this->db->set($form);  
		$this->db->where("id",$this->input->post("id"));
		return $this->db->update("auto_replay");
	}
	
	function insert_list(){
	     $form	=	$this->input->post("f");
	 	
		$title  =   $this->input->post("title");
		$body   =   $this->input->post("body");
		$footer =   $this->input->post("footer");
		
		$replay = array("title"=>$title,"body"=>$body,"footer"=>$footer);
		$replay = json_encode($replay);
		
		$descripsi   =  $this->input->post("desc[]");
		$listopsi   =  $this->input->post("opsi[]");
		$i=0;   $listing=[];
		foreach($listopsi as $v){
		    if($v){
		        $desc = isset($descripsi[$i])?($descripsi[$i]):null;
		        if($desc){
		             $listing[]=array("title"=>$v,"description"=>$desc);
		        }else{
		             $listing[]=array("title"=>$v);
		        }
		    }
		    $i++;
		}
		
		$list["title"]="List menu pilihan";
		$list["rows"]=$listing;
		
		$list = json_encode(array($list));
		$this->db->set("jenis_pesan",5);
		$this->db->set("options",$list);
		$this->db->set("replay",$replay);
		$this->db->set($form);  
		return $this->db->insert("auto_replay");
	}
  function insert_button(){
        $form	=	$this->input->post("f");
		$tmb1   =   $this->input->post("btn1");  	$url1   =   $this->input->post("url1");  if(strpos($url1,"http")!==FALSE){ $type1 = "url";}else{ $type1="number";}
		$tmb2   =   $this->input->post("btn2");     $url2   =   $this->input->post("url2");  if(strpos($url2,"http")!==FALSE){ $type2 = "url";}else{ $type2="number";}
		$tmb3   =   $this->input->post("btn3");     $url3   =   $this->input->post("url3");  if(strpos($url3,"http")!==FALSE){ $type3 = "url";}else{ $type3="number";}
		
		$title  =   $this->input->post("title");
		$body   =   $this->input->post("body");
		$footer =   $this->input->post("footer");
		
		
		
		$descripsi   =  $this->input->post("desc[]");
		$listopsi   =  $this->input->post("btn[]");
		$i=0;   $listing=[];
		foreach($listopsi as $v){
		    if($v){
		        $desc = isset($descripsi[$i])?($descripsi[$i]):null;
		        if(strpos($desc,"http")!==FALSE){ $type = "url";}else{ $type="number";}
		        if($desc){
		             $listing[]=array("body"=>$v,$type=>$desc);
		        }else{
		             $listing[]=array("body"=>$v);
		        }
		    }
		    $i++;
		}
		
		
		
		
		$replay = array("title"=>$title,"body"=>$body,"footer"=>$footer);
		$replay = json_encode($replay);
		
		 
		
		$tbl = json_encode($listing);
		
		$this->db->set("jenis_pesan",4);
		$this->db->set("options",$tbl);
		$this->db->set("replay",$replay);
		$this->db->set($form);  
		return $this->db->insert("auto_replay");
  }
  
   function update_autoreplay_4(){
        $form	=	$this->input->post("f");
		$tmb1   =   $this->input->post("btn1");  	$url1   =   $this->input->post("url1");  if(strpos($url1,"http")!==FALSE){ $type1 = "url";}else{ $type1="number";}
		$tmb2   =   $this->input->post("btn2");     $url2   =   $this->input->post("url2");  if(strpos($url2,"http")!==FALSE){ $type2 = "url";}else{ $type2="number";}
		$tmb3   =   $this->input->post("btn3");     $url3   =   $this->input->post("url3");  if(strpos($url3,"http")!==FALSE){ $type3 = "url";}else{ $type3="number";}
		
		$title  =   $this->input->post("title");
		$body   =   $this->input->post("body");
		$footer =   $this->input->post("footer");
		
		
		
		$descripsi   =  $this->input->post("desc[]");
		$listopsi   =  $this->input->post("btn[]");
		$i=0;   $listing=[];
		foreach($listopsi as $v){
		    if($v){
		        $desc = isset($descripsi[$i])?($descripsi[$i]):null;
		        if(strpos($desc,"http")!==FALSE){ $type = "url";}else{ $type="number";}
		        if($desc){
		             $listing[]=array("body"=>$v,$type=>$desc);
		        }else{
		             $listing[]=array("body"=>$v);
		        }
		    }
		    $i++;
		}
		
		
		
		
		$replay = array("title"=>$title,"body"=>$body,"footer"=>$footer);
		$replay = json_encode($replay);
		
		 
		
		$tbl = json_encode($listing);
		
		$this->db->set("jenis_pesan",4);
		$this->db->set("options",$tbl);
		$this->db->set("replay",$replay);
		$this->db->set($form);  
			$this->db->where("id",$this->input->post("id"));
		return $this->db->update("auto_replay");
  }
function insert(){ 
		$form	=	$this->input->post("f");
		if(isset($_FILES["file"]['tmp_name']))
			{  
				$dok 	=	"file_upload/autoreplay";
				$file	=	$this->m_reff->upload_file("file",$dok,"auto","PDF,JPEG,JPG,PNG,DOCS,XLSX");
				 
				if($file["validasi"]!=false)
				{
				    $type=$file["type"];
				    if($type=="jpg" || $type=="jpeg" || $type=="png" ){
				        $this->db->set("jenis_pesan",2);
				    }else{
				          $this->db->set("jenis_pesan",3);
				    }
					$this->db->set("file",$file["name"]);
					
				}else{
				    $var["gagal"] =  true;
				    $var["info"] = $file["info"];
				    return $var;
				}
			 
			}else{
			      $this->db->set("jenis_pesan",1);
			}
		$this->db->set($form);
		return $this->db->insert("auto_replay");
	}
	
	function update_autoreplay(){
	    	$form	=	$this->input->post("f");
	    	if(isset($_FILES["file"]['tmp_name']))
			{
				$dok 	=	"file_upload/autoreplay";
				$file	=	$this->m_reff->upload_file("file",$dok,"auto","PDF,JPEG,JPG,PNG,DOCS,XLSX");
				 
				if($file["validasi"]!=false)
				{
				    $type=$file["type"];
				    if($type=="jpg" || $type=="jpeg" || $type=="png" ){
				        $this->db->set("jenis_pesan",2);
				    }else{
				          $this->db->set("jenis_pesan",3);
				    }
					$this->db->set("file",$file["name"]);
					
				}else{
				    $var["gagal"] =  true;
				    $var["info"] = $file["info"];
				    return $var;
				}
			 
			} 
		$this->db->set($form);
		$this->db->where("id",$this->input->post("id"));
		return $this->db->update("auto_replay");
	}
}