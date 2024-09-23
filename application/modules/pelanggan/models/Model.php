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
		return $this->db->get_where('device_stations', ['id'=>$id]);
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
	 	 
		 
		if (strlen(isset($_POST['search']['value'])?($_POST['search']['value']):null)>1) {
					$searchkey = $_POST['search']['value'];
					$searchkey = $this->m_reff->sanitize($searchkey);
					$query=array(
					    "sender_name"=>$searchkey,
						"sender_number"=>$searchkey,
						"owner"=>$searchkey
					);
					$this->db->group_start()
							->or_like($query)
					->group_end();
					
				}	

			$this->db->order_by("id", "asc");
			$query=$this->db->from("device_stations");
		return $query;
	}
	public function count()
	{
		$this->_get_data();
		return $this->db->get()->num_rows();
	}
	function countData($id)
	{
		return $this->db->get('device_stations')->num_rows();
	}

	function insert(){
		$form 	 = $this->input->post("f");
		$datainputan=$this->security->xss_clean($form);
		$this->db->set($datainputan);
		$this->db->insert("device_stations");
		$var["token"] = $this->m_reff->getToken(); 
		return $var;
	}

	function update(){
		$form 	 = $this->input->post("f");
		$datainputan=$this->security->xss_clean($form);
		$id		 = $this->input->post("id");
		$hp_lama = $this->input->post("sn");
		$hp_baru = $this->input->post("f[sender_number]");
		
	  	$this->db->set($datainputan);
        
		$this->db->where("id",$id);
		$this->db->update("device_stations");

        
        $this->db->where("sn",$hp_lama);
        $this->db->set("sn",$hp_baru);
        $this->db->update("daftar_menu");
        //-----------------------------//
         $this->db->where("to",$hp_lama);
        $this->db->set("to",$hp_baru);
        $this->db->update("data_pelanggan");
        //-----------------------------//
        //-----------------------------//
         $this->db->where("sender_number",$hp_lama);
        $this->db->set("sender_number",$hp_baru);
        $this->db->update("data_pesan");
        //-----------------------------//
         $this->db->where("to",$hp_lama);
        $this->db->set("to",$hp_baru);
        $this->db->update("kritik_saran");
        //-----------------------------//
          $this->db->where("to",$hp_lama);
        $this->db->set("to",$hp_baru);
        $this->db->update("msg_inbox");
        //-----------------------------//
        $this->db->where("id_user",$hp_lama);
        $this->db->set("id_user",$hp_baru);
        $this->db->update("tm_order");
        //-----------------------------//

		$var["token"] = $this->m_reff->getToken();
		return $var;
	}

	function hapus(){
		$id    = $this->input->post("id");

// 		$this->m_reff->log("delete kontak group");
        $this->db->where("id",$id);
		$del=$this->db->get("device_stations")->row();
		$image=$del->poto??'';
		$hp_lama=$del->sender_number??'';
		if($image!=null){
			$structure = './file_upload/foto/'.$image.'';
			if(file_exists($structure)){
				unlink($structure);
			}
		}
		if($del)
		{
		     
        $this->db->where("sn",$hp_lama);
        $this->db->delete("daftar_menu");
        //-----------------------------//
         $this->db->where("to",$hp_lama);
        $this->db->delete("data_pelanggan");
        //-----------------------------//

        //-----------------------------//
         $this->db->where("sender_number",$hp_lama);
        $this->db->delete("data_pesan");
        //-----------------------------//
         $this->db->where("to",$hp_lama);
        $this->db->delete("kritik_saran");
        //-----------------------------//
          $this->db->where("to",$hp_lama);
        $this->db->delete("msg_inbox");
        //-----------------------------//
        $this->db->where("id_user",$hp_lama);
        $this->db->delete("tm_order");
        //-----------------------------//
        
			$this->db->where("id",$id);
			$this->db->delete("device_stations");
			$var['table']=true;
		}
		return    $var;
	}
 

}




