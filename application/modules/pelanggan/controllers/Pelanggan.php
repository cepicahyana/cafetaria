<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pelanggan extends MY_Controller {

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
		 
			$row = array();
			$row[] = '<input type="checkbox" class="selectedId" name="pilih[]" value="'.$dataDB->id.'" />';
			$row[] = $this->tanggal->ind(substr($dataDB->_ctime,0,10),"/");
			$row[] = "<a href='".base_url()."master/setting?id=".$dataDB->kode."'>".$dataDB->sender_name."</a>";
			$row[] = $dataDB->alamat;
			$row[] = $dataDB->kode;
			$row[] = $dataDB->sender_number;
			$row[] =  $this->m_reff->device_sts($dataDB->sts);
			$row[] = number_format($dataDB->credit,0,",",".");;
			$row[] = $dataDB->owner.br().$dataDB->hp_owner;
			$row[] = number_format($dataDB->price_access,0,",",".");
			$row[] = number_format($dataDB->price_order,0,",",".");
		 
			$row[] = '<button class="btn btn-light" onclick="editData(`'.$dataDB->id.'`)" title="Edit"><i class="fe fe-edit menu-icon"></i></button>&nbsp;&nbsp;<button class="btn btn-danger" onclick="hapus(`'.$dataDB->id.'`,`'.$dataDB->sender_name.'`)" title="Hapus"><i class="fe fe-trash-2 menu-icon"></i></button>';

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