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
		return $this->db->get_where('data_penjualan', ['id'=>$id]);
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
					    "total"=>$searchkey,
						"tgl"=>$searchkey 
						 
					);
					$this->db->group_start()
							->or_like($query)
					->group_end();
					
				}	

			$this->db->order_by("id", "desc");
			$query=$this->db->from("data_penjualan");
		return $query;
	}
	public function count()
	{
		$this->_get_data();
		return $this->db->get()->num_rows();
	}
	
	
	
		function get_data_report()
	{
		$this->_get_data_report();
		if($this->input->post("length")!=-1) 
		$this->db->limit($this->input->post("length"),$this->input->post("start"));
	 	return $this->db->get()->result();
		 
	}
	function total(){
	       $tgl = $this->input->post("range");
        $tgl1 = $this->tanggal->range_1($tgl);
        $tgl2 = $this->tanggal->range_2($tgl);
        $this->db->where("tgl>='".$tgl1 . "' AND tgl<='" . $tgl2 . "'");
	    $this->db->select("SUM(total) as total");
	    $db = $this->db->get("data_penjualan")->row();
	    return isset($db->total)?($db->total):0;
	}
	function _get_data_report()
	{
	    
	    $tgl = $this->input->post("range");
        $grafik = $this->input->post("grafik");
        $tgl1 = $this->tanggal->range_1($tgl);
        $tgl2 = $this->tanggal->range_2($tgl);
        
        if ($tgl1) {
           $this->db->where("tgl>='".$tgl1 . "' AND tgl<='" . $tgl2 . "'");
        }
         if ($grafik == "2" or $grafik == "7") {
            $this->db->group_by("SUBSTRING(tgl,1,10)");
            $this->db->select("SUM(total) as total,tgl");
        }
        if ($grafik == "3" or $grafik == "8") {
            $this->db->group_by("YEARWEEK(SUBSTRING(tgl,1,10))");
            $this->db->select("CONCAT('minggu ke:',WEEK(tgl),'-',YEAR(tgl)) AS tgl,SUM(total) as total");
        }
        if ($grafik == "4" or $grafik == "9") {
            $this->db->group_by("MONTH(SUBSTRING(tgl,1,10))");
            $this->db->select("CONCAT(MONTH(tgl),'-',YEAR(tgl)) AS tgl,SUM(total) as total");
        }
        if ($grafik == "5" or $grafik == "10") {
            
             $this->db->group_by("YEAR(SUBSTRING(tgl,1,10))");
             $this->db->select("YEAR(tgl) AS tgl,SUM(total) as total");
        }
        
	  
		if (strlen(isset($_POST['search']['value'])?($_POST['search']['value']):null)>1) {
					$searchkey = $_POST['search']['value'];
					$searchkey = $this->m_reff->sanitize($searchkey);
					$query=array(
					    "total"=>$searchkey,
						"tgl"=>$searchkey 
						 
					);
					$this->db->group_start()
							->or_like($query)
					->group_end();
					
				}	

			$this->db->order_by("tgl", "asc");
			$query=$this->db->from("data_penjualan");
		return $query;
	}
		public function count_report()
	{
		$this->_get_data_report();
		return $this->db->get()->num_rows();
	}
	
	
	
	
	
	function countData($id)
	{
		return $this->db->get('data_penjualan')->num_rows();
	}

	function insert(){
		$form 	 = $this->input->post("f");
		$datainputan=$this->security->xss_clean($form);
	  
		$this->db->set($datainputan);
		$this->db->set('tgl', $this->tanggal->eng_($this->input->post("tgl"),"-"));
		$this->db->insert("data_penjualan");
 
		$var["token"] = $this->m_reff->getToken();
		return $var;
	}

	function update(){
	 $form 	 = $this->input->post("f");
		$datainputan=$this->security->xss_clean($form);
	  
		$this->db->set($datainputan);
		$this->db->set('tgl', $this->tanggal->eng_($this->input->post("tgl"),"-"));
		$this->db->where("id",$this->input->post("id"));
		$this->db->update("data_penjualan");
 
		$var["token"] = $this->m_reff->getToken();
		return $var;
	}

	function hapus(){
		$id    = $this->input->post("id");

// 		$this->m_reff->log("delete kontak group");
        $this->db->where("id",$id);
		$del=$this->db->get("data_penjualan")->row();
		$image=$del->poto??'';
		if($image!=null){
			$structure = './file_upload/foto/'.$image.'';
			if(file_exists($structure)){
				unlink($structure);
			}
		}
		if($del)
		{
			$this->db->where("id",$id);
			$this->db->delete("data_penjualan");
			$var['table']=true;
		}
		return    $var;
	}
 

}




