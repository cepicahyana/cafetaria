<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Broadcast extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->m_konfig->validasi_session(array("member"));
		$this->load->model("model", "mdl");
		date_default_timezone_set('Asia/Jakarta');
	}

	function _template($data)
	{
		$this->load->view('temp_main/main', $data);
	}
    function upload(){
		$id = $this->m_reff->post("id");
		if ($id) {
            // $countfiles = count($_FILES['files']['name']);
			$this->m_reff->dir($id);
			// if(isset($_FILES["foto"]['tmp_name']))
			// {   	$pullpath="dp";
			// 	$before="";//$this->m_reff->goField("data_kartu","foto","where id='".$id."'");
			// 	$file=$this->m_reff->upload_file("foto",$pullpath,"foto","all","20000000",$before);
			// 	if($file["validasi"]!=false)
			// 	{
			// 		$opsi1="file_upload/".$pullpath."/".$file["name"]; 
			// 		$this->db->set("foto",$opsi1);
			// 	}			 
			// }

			
            // for ($i = 0; $i < $countfiles; $i++) {
                if(isset($_FILES["files"]['tmp_name'])){
						$form = 'files';
					  	$pullpath=$this->m_reff->pengaturan(5)."/".$id;
						$before="";//$this->m_reff->goField("data_kartu","foto","where id='".$id."'");
						$file=$this->m_reff->upload_file($form,$pullpath,"","jpg,jpeg,png,gif,mp4,pdf,xlsx,docx","200000000");
						if($file["validasi"]!=false)
						{
							$size  	   = $_FILES[$form]['size'];
							$nama_file =$file["name"]; 
							$this->db->set("nama_file",$nama_file);
							$this->db->set("path",$id."/".$nama_file);
							$this->db->set("path_thumbnail",$id."/thumbnail/".$nama_file);
							$this->db->set("size",$size);
							$this->db->set("jenis_media",$file['jenis']);
							$this->db->set("id_artikel",$this->input->post("id"));
							$this->db->insert('data_media');
							 
						}	
						$var["result"] = $file;
					 
                }
            // }
		
        }
        // error_reporting(E_ALL | E_STRICT);
        // $this->load->library("UploadHandler");
		$var["token"] = $this->m_reff->getToken();
		echo json_encode($var);
		 
    }
	function post(){
		$ajax = $this->input->post("ajax");
		if ($ajax == "yes") {
			$var["data"] = $this->load->view("post", null, true);
			$var["token"] = $this->m_reff->getToken();
			echo json_encode($var);
		} else {
			$data['konten'] = "post";
			$this->_template($data);
		}
	}
	public function index()
	{
		$level = $this->session->userdata("level");
		$ajax = $this->input->post("ajax");
		if ($level == "admin") {
			if ($ajax == "yes") {
				$var["data"] = $this->load->view("index", null, true);
				$var["token"] = $this->m_reff->getToken();
				echo json_encode($var);
			} else {
				$data['konten'] = "index";
				$this->_template($data);
			}
		} else {
			if ($ajax == "yes") {
				$var["data"] = $this->load->view("index_view", null, true);
				$var["token"] = $this->m_reff->getToken();
				echo json_encode($var);
			} else {
				$data['konten'] = "index_view";
				$this->_template($data);
			}
		}
	}
	function open(){
		$ajax  = $this->input->post("ajax");
		$id	   = $this->input->get("id");
		$id	   = $this->m_reff->decrypt($id);
		
		$this->db->where("id",$id);
		$db = $this->db->get("data_broadcast")->row();
		$type = isset($db->type)?($db->type):1;
		if($type==1){
		    $post = "post";
		}elseif($type==2){
		     $post = "post_button";
		}else{
		     $post = "post_list";
		}
		
		$param["id"] = $id; 	
		$ajax = $this->input->post("ajax");
		if ($ajax == "yes") {
			$var["data"] = $this->load->view($post, $param, true);
			$var["token"] = $this->m_reff->getToken();
			echo json_encode($var);
		} else {
			$data['id'] = $id;
			$data['konten'] = $post;
			$this->_template($data);
		}

	}
	function updateTombol(){
	     	$this->mdl->updateTombol();
			$var["token"] = $this->m_reff->getToken();
			echo json_encode($var);
	}
	function updatePost(){
		 	$this->mdl->updatePost();
			$var["token"] = $this->m_reff->getToken();
			echo json_encode($var);
	}
	function updatePostTgl(){
		 	$this->mdl->updatePostTgl();
			$var["token"] = $this->m_reff->getToken();
			echo json_encode($var);
	}

	function new_post(){
		$this->db->set("tanggal",date('Y-m-d'));
		$this->db->set("judul_berita","pesan baru");
		$this->db->insert("data_broadcast");
		echo "
		<br><center>Mohon tunggu...</center>
		";
		$param = $this->m_reff->ai('data_broadcast')-1;
		$param = $this->m_reff->encrypt($param);
		redirect("broadcast/open/?id=".($param));
	}
	
	function new_post_button(){
	        $this->db->set("type",2);
	    	$this->db->set("tanggal",date('Y-m-d'));
    		$this->db->set("judul_berita","pesan baru");
    		$this->db->insert("data_broadcast");
    		echo "
    		<br><center>Mohon tunggu...</center>
    		";
    		$param = $this->m_reff->ai('data_broadcast')-1;
    		$param = $this->m_reff->encrypt($param);
    		redirect("broadcast/open/?id=".($param));
	}

	
	function getData_view()
	{
	    $this->db->where("judul_berita","pesan baru");
	    $this->db->where("artikel",NULL);
	    $this->db->delete("data_broadcast");
		$level = $this->session->userdata("level");
		$list = $this->mdl->get_data_view();
		$data = array();
		$no = $this->input->post("start");
		if (!$this->input->post("draw")) {
			echo $this->m_reff->page403();
			return false;
		}
		$no = $no + 1;
		foreach ($list as $v) {
			$tombol = "
			<a  href='".base_url()."broadcast/open?id=".$this->m_reff->encrypt($v->id)."'class='btn btn-info'><i class='fas fa-paper-plane'></i> Open</a>
			<button class='btn btn-danger' onclick='hapus(`".$v->id."`,`".$v->judul_berita."`)'><i class='fas fa-trash-alt'></i> Delete</button>
			";

			$jmlMedia = "Photo : ".$this->mdl->jmlPhoto($v->id).br();
			$jmlMedia.= "Video : ".$this->mdl->jmlVideo($v->id);

			if($v->tgl_broadcast){
				$broadcast_time =  "<a href='javascript:detail(`".$v->id."`)'>".$v->tgl_broadcast."</a>";
			}else{
				$broadcast_time =  "<i>Belum dikirim</i>";
			}

			$row = array();
			$row[] =  $no++;
			$row[] =  $this->tanggal->ind($v->tanggal,"/");
			$row[] =  $v->judul_berita;
	 
		 
			$row[] =  $jmlMedia;
			$row[] =  $broadcast_time;
			$row[] =  $tombol;
			$data[] = $row;
		}

		$output = array(
			"draw" => $this->input->post("draw"),
			"recordsTotal" => $c = $this->mdl->count_view(),
			"recordsFiltered" => $c,
			"data" => $data,
			"token" => $this->m_reff->getToken()
		);
		//output to json format
		echo json_encode($output);
	}

function loadUpload(){
	$data["token"] = $this->m_reff->getToken();
	$data["data"] = $this->load->view("loadUpload",null,true);
	echo json_encode($data);
}
function try_broadcast(){
	$data["token"] = $this->m_reff->getToken();
	$data["data"] = $this->load->view("broadcast",null,true);
	echo json_encode($data);
}

function hapus_media(){
	$data["token"] = $this->m_reff->getToken();
	$this->mdl->hapus_media();
	echo json_encode($data);
}
function hapus(){
	$data["token"] = $this->m_reff->getToken();
	$this->mdl->hapus();
	echo json_encode($data);
}

function show(){
	$data["token"] = $this->m_reff->getToken();
	$data["data"] = $this->load->view("show",null,true);
	echo json_encode($data);
}
	 
function delimage(){
	$this->mdl->delimage();
	$data["token"] = $this->m_reff->getToken();
	echo json_encode($data);
}
function send(){
	$this->mdl->send();
	$data["token"] = $this->m_reff->getToken();
	echo json_encode($data);
}



}
