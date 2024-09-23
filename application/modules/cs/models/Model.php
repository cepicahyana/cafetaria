<?php
class Model extends CI_Model  {
    
	 
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}
	function getChat(){
	     $id =$this->idu();
	     $this->db->set("id_cs",$id);
	     $this->db->limit(1);
	     $this->db->where("id_cs",null);
	     $this->db->order_by("id","asc");
	     return $this->db->update("session_cs");
	}
	function getNewMsg(){
	    $this->db->where("hits",0);
	    $this->db->where("id_cs",null);
	    $this->db->where("kode",$this->input->post("kode"));
	    $data = $this->db->get("pesan_cs")->result();
	    $pesan = "";$id=null;
	    foreach($data as $val){
	        $id.=$val->id.",";
	        if($val->file){
	            $file='<div class="main-msg-wrapper pd-0"><img alt="" class="wd-100 ht-100"
						src="'.base_url().$val->file.'"> </div>
						<div>';
	        }else{
	            $file='';
	        }
	        $pesan.= '<div class="media">
									<div class="main-img-user online"><img alt=""
											src="../../plug/img/cowok.png"> </div>
									<div class="media-body">
									'.$file.'
										<div class="main-msg-wrapper">
											'.$val->msg.'
										</div>
										<div>
											<span>'.substr($val->_ctime,10,6).'</span> <a href=""><i
													class="icon ion-android-more-horizontal"></i></a>
										</div>
									</div>
								</div>';
	    }
	     $id.="00";
	     $this->db->set("hits",1);
	     $this->db->where("id in ($id)");
	     $this->db->where("kode",$this->input->post("kode"));
	     $this->db->update("pesan_cs");
	    if(!$pesan){ return false; }
	    return $pesan;
	}
	function simpan_pesan(){
	    $this->db->set("id_cs",$this->idu());
	    $this->db->set("msg",$msg=$this->input->post("msg"));
	    $this->db->set("kode",$this->input->post("kode"));
	    $this->db->insert("pesan_cs");
	    
	    $this->db->set("no_tujuan",$this->input->post("no_tujuan"));
	    $this->db->set("type",1);
	    $this->db->set("pesan",$msg);
	    $this->db->set("id_user",$this->idu());
	    $this->db->set("tgl",date('Y-m-d H:i:s'));
	    $this->db->insert("data_pesan");
	    
	    $foto_cs = $this->input->post("foto_cs");
	    	return '<div class="media flex-row-reverse">
									<div class="main-img-user online"><img alt=""
											src="'.$foto_cs.'"> </div>
									<div class="media-body">
										<div class="main-msg-wrapper">
											'.$msg.'
										</div>
										<div>
											<span>'.substr(date('Y-m-d H:i:s'),10,6).'</span> <a href=""><i
													class="icon ion-android-more-horizontal"></i></a>
										</div>
									</div>
								</div>';
	    
	}
	function idu(){
		return $this->session->userdata("id");
	}
	function getById($id)
	{
		return $this->db->get_where('admin', ['id_admin'=>$id]);
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
	 	//$nip = $this->session->userdata("nip");
		// $this->db->where("sts",0);
		/*$pic = $this->session->pic;
		if($pic){
			$this->db->where("nip_pegawai in (select nip from data_pegawai where kode_biro='".$this->m_reff->sanitize($pic)."' )");
		}else{
			$this->db->where("_cid",$this->idu());
		}*/

		// $group_id = $this->input->post('group');
		// if ($group_id) {
		// 	$this->db->where('id_group', $group_id);
		// }

		if (strlen(isset($_POST['search']['value'])?($_POST['search']['value']):null)>1) {
					$searchkey = $_POST['search']['value'];
					$searchkey = $this->m_reff->sanitize($searchkey);
					$query=array(
					    "owner"=>$searchkey,
						"nama_cs"=>$searchkey,
						"telp"=>$searchkey
					);
					$this->db->group_start()
							->or_like($query)
					->group_end();
					
				}	

			$this->db->order_by("id_admin", "asc");
			$query=$this->db->from("admin");
		return $query;
	}
	public function count()
	{
		$this->_get_data();
		return $this->db->get()->num_rows();
	}
	function countData($id)
	{
		return $this->db->get('admin')->num_rows();
	}

    function end_chat(){
                $sn = $this->input->post("sn");
                $nama =  $this->input->post("nama");
                $this->db->set("_ctime",date('Y-m-d H:i:s'));
                $this->db->set("sender_number",str_replace("@c.us","",$sn));
                $this->db->set("sender_name",$nama);
                $this->db->set("msg",$this->m_reff->pengaturan(7));
                $this->db->insert("msg_inbox");
                
                
            $key =  $this->m_reff->getCekKey();    
            $this->db->set("tgl",date("Y-m-d H:i:s"));
			$this->db->set("hits",2);
			$this->db->set("sts",0);
			$this->db->set("type",1);
			$this->db->set("no_tujuan",$sn);
			$this->db->set("pesan",$this->m_reff->pengaturan(7));
			$this->db->set("id_user",$key->id_user);
			$this->db->set("device_sts",$key->sts);
			$this->db->set("sender_number",$key->sender_number);
			$this->db->insert("data_pesan");
           
        $kode = $this->input->post("kode");
        $this->db->where("kode",$kode);
        return $this->db->delete("session_cs");
    }
	function insert(){
		$form 	 = $this->input->post("f");
		//fungsi untuk upload
		$img=$this->m_reff->upload_file("poto","file_upload/foto/","file","JPG,JPEG,PNG","1000000",null);
		if ($img!=null) {
			if ($img['validasi']==true) {
				$this->db->set("poto", $img['name']);
			}
		} 
		$this->db->set($form);
		//$this->db->set('last', date('Y-m-d H:i:s'));
		$this->db->insert("admin");
		
// 		$this->m_reff->log("insert kontak group");

		$var["token"] = $this->m_reff->getToken();
		return $var;
	}

	function update(){
		$form 	 = $this->input->post("f");
		$id		 = $this->input->post("id");
		$poto_b		 = $this->input->post("poto_b");
        //fungsi untuk upload
		$img=$this->m_reff->upload_file("poto","file_upload/foto/","file","JPG,JPEG,PNG","1000000",$poto_b);
		if ($img!=null) {
			if ($img['validasi']==true) {
				$this->db->set("poto", $img['name']);
			}
		} 
		$this->db->set($form);
		//$this->db->set('last', date('Y-m-d H:i:s'));
		$this->db->where("id_admin",$id);
		$this->db->update("admin");

// 		$this->m_reff->log("update kontak group");

		$var["token"] = $this->m_reff->getToken();
		return $var;
	}

	function hapus(){
		$id    = $this->input->post("id");

// 		$this->m_reff->log("delete kontak group");
        $this->db->where("id_admin",$id);
		$del=$this->db->get("admin")->row();
		$image=$del->poto??'';
		if($image!=null){
			$structure = './file_upload/foto/'.$image.'';
			if(file_exists($structure)){
				unlink($structure);
			}
		}
		if($del)
		{
			$this->db->where("id_admin",$id);
			$this->db->delete("admin");
			$var['table']=true;
		}
		return    $var;
	}
 

}




