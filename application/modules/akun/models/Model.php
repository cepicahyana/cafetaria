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

		// $group_id = $this->input->post('group');
		// if ($group_id) {
		// 	$this->db->where('id_group', $group_id);
		// }
		
        $this->db->where('level', '18');
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
		$id		 = $this->input->post("id");
		$password = md5($this->input->post("password"));
		$username = $this->input->post("f[username]");
		$poto		 = $this->input->post("poto");
		$poto_b		 = $this->input->post("poto_b");
		$username_b  = $this->input->post("username_b");
		
		
		$this->db->where("username!=",$username_b);
		$this->db->where('username',$username);
		$this->db->where("level","18");
		$cek=$this->db->get("admin")->num_rows();
		if($cek)
		{
			$var['gagal']=false;
			$var['info']="Not allowed, Username already exists.";
			return $var;
		}
		
        //fungsi untuk upload
        if($poto){
		$img=$this->m_reff->upload_file("poto","file_upload/foto/","file","JPG,JPEG,PNG","1000000",$poto_b);
		if ($img!=null) {
			if ($img['validasi']==true) {
				$this->db->set("poto", $img['name']);
			}
		} }
		$this->db->set($datainputan);
		if($password){
		    $this->db->set('password', $password);
		}
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




