<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Data_pengaduan extends MY_Controller {

	function __construct()
	{
		parent::__construct();	
		$this->m_konfig->validasi_session(array("member","admin"));
		$this->load->model("model","mdl");
		date_default_timezone_set('Asia/Jakarta');
	}
	
	function _template($data)
	{
		$this->load->view('temp_main/main',$data);	
	}
	 
	public function index()
	{
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			$var["data"]=$this->load->view("index",NULL,TRUE);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
		}else{
			$data['konten']="index";
			$this->_template($data);
		}
		
	}
	function getData()
	{
		if(!$this->input->post("draw")){echo $this->m_reff->page403(); return false;}
		$list = $this->mdl->get_data();
		$data = array();
		$no = $this->input->post("start");
		$no =$no+1;

		foreach ($list as $dataDB) {
		 
		 if($dataDB->sts==0){
		     $sts = "<span class='badge badge-danger'>Open</span>";
		 }elseif($dataDB->sts==1){
		     $sts = "<span class='badge badge-primary'>Close</span>";
		 }else{
		     $sts = "<span class='badge badge-warning'>Waiting</span>";
		 }
		 if($dataDB->penanganan){
		     $penanganan = $dataDB->penanganan;
		 }else{
		     $penanganan = "<button class='btn btn-sm btn-light' onclick='editData(`".$dataDB->id."`)'  >Belum ditangani</button>";
		 }
			$row = array();
			$row[] = '<input type="checkbox" class="selectedId" name="pilih[]" value="'.$dataDB->id.'" />';
			$row[] = $no++;
		
			$row[] = $this->tanggal->hariLengkapJam($dataDB->_ctime,"-").br()."<span class='text-success'>".$this->tanggal->selisih_waktu($dataDB->_ctime)." yang lalu</span>";
				$row[] = $dataDB->nama." (".str_replace("@c.us","",$dataDB->sender_number).")".br()."<i class='text-warning'>".$dataDB->alamat."</i>";
			$row[] = $dataDB->jenis_usaha;
			$row[] = $dataDB->outlet;
			$row[] = $dataDB->aduan;
				$row[] = $penanganan;
			$row[] = $sts;
			$row[] = '<button class="btn btn-light" onclick="editData(`'.$dataDB->id.'`)" title="Edit"><i class="fe fe-edit menu-icon"></i></button>';

			//add html for action
			$data[] = $row;
		}
			 
		$output = array(
			"draw" => $this->input->post("draw"),
			"recordsTotal" => $c=$this->mdl->count(),
			"recordsFiltered" =>$c,
			"data" => $data,
			"token"=>$this->m_reff->getToken()
		);
		//output to json format
		echo json_encode($output);
	}

    function update(){
        $var["data"]=$this->mdl->update();
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
    }
	function form_data(){
		$f=$this->input->post();
		if(!$f){ return $this->m_reff->page403();}

		$var["data"]=$this->load->view("form",NULL,TRUE);
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}
	function insert_data(){
		$f=$this->input->post('f');
		if(!$f){ return $this->m_reff->page403();}

		$dt = $this->mdl->insert();
		$var["data"]=$dt;
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}

	function update_data(){
		$f=$this->input->post('f');
		if(!$f){ return $this->m_reff->page403();}

		$dt = $this->mdl->update();
		$var["data"]=$dt;
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}

	function hapus_data(){
		$id = $this->input->post('id');
		if(!$id){ return $this->m_reff->page403();}

		$dt = $this->mdl->hapus();
		$var["data"]=$dt;
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}



}