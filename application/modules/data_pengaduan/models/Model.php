<?php
class Model extends CI_Model  {
    
	 
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
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

		$sts = $this->input->post('sts');
		if ($sts===0) {
			$this->db->where('sts', 0);
		}elseif($sts) {
			$this->db->where('sts', $sts);
		}
		
       
		if (strlen(isset($_POST['search']['value'])?($_POST['search']['value']):null)>1) {
					$searchkey = $_POST['search']['value'];
					$searchkey = $this->m_reff->sanitize($searchkey);
					$query=array(
					    "nama"=>$searchkey,
						"outlet"=>$searchkey,
						"alamat"=>$searchkey
					);
					$this->db->group_start()
							->or_like($query)
					->group_end();
					
				}	

			$this->db->order_by("id", "desc");
			$query=$this->db->from("data_aduan");
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

	function insert(){
		$form 	 = $this->input->post("f");
		$datainputan=$this->security->xss_clean($form);
		$password = md5($this->input->post("password"));
		$username = $this->input->post("f[username]");
		
		$this->db->where("username",$username);
		$this->db->where("level","18");
		$cek=$this->db->get("admin")->num_rows();
		if($cek)
		{
			$var['gagal']=false;
			$var['info']="Not allowed, username already exists.";
			return $var;
		}
		//fungsi untuk upload
		$img=$this->m_reff->upload_file("poto","file_upload/foto/","file","JPG,JPEG,PNG","1000000",null);
		if ($img!=null) {
			if ($img['validasi']==true) {
				$this->db->set("poto", $img['name']);
			}
		} 
		$this->db->set($datainputan);
		$this->db->set('level', '18');
		$this->db->set('password', $password);
		$this->db->insert("admin");
		
// 		$this->m_reff->log("insert kontak group");

		$var["token"] = $this->m_reff->getToken();
		return $var;
	}

	function update(){
		$form 	 = $this->input->post("f");
		$datainputan=$this->security->xss_clean($form);
	    $this->db->set($datainputan);
		$this->db->where("id",$this->input->post("id"));
		return $this->db->update("data_aduan"); 
	}

	function hapus(){
		    $id    = $this->input->post("id");
            $id = $this->m_reff->clearkomaray($id);
			$this->db->where_in("id",$id);
			return $this->db->delete("data_aduan");
			 
	}
 

}




