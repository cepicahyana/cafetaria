<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends MY_Controller {

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
	
	function report_view(){
	    $grafik = $this->input->post("grafik");
	    if($grafik<=5){
	        $var["data"]=$this->load->view("table",NULL,TRUE);
	    }else{
	        $var["data"]=$this->load->view("grafik",NULL,TRUE);
	    }
	    	
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
	}
	 	public function input()
	{
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			$var["data"]=$this->load->view("index",NULL,TRUE);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
		}else{
			$data['konten']="input";
			$this->_template($data);
		}
		
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
		
		    $row[] = $this->tanggal->hariLengkap($dataDB->tgl,"/");
		$row[] = number_format($dataDB->total, 1, ",", ".");
			$row[] = '<button class="btn btn-light" onclick="editData(`'.$dataDB->id.'`)" title="Edit"><i class="fe fe-edit menu-icon"></i></button>&nbsp;&nbsp;<button class="btn btn-danger" onclick="hapus(`'.$dataDB->id.'`,`'.$dataDB->tgl.'`)" title="Hapus"><i class="fe fe-trash-2 menu-icon"></i></button>';

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



	function getData_report()
	{
		if(!$this->input->post("draw")){echo $this->m_reff->page403(); return false;}
		$list = $this->mdl->get_data_report();
		$data = array();
		$no = $this->input->post("start");
		$no =$no+1;

		foreach ($list as $dataDB) {
		  
			$row = array();
			$row[] = $no++;
			
			 if ($this->input->post("grafik") == "2") {
                $row[] = $this->tanggal->hariLengkap($dataDB->tgl,"/");
            }else {
                $row[] = $dataDB->tgl;
            }
            
            
		    
		          $row[] = number_format($dataDB->total, 1, ",", ".");
		 
			//add html for action
			$data[] = $row;
		}
			 
		$output = array(
			"draw" => $this->input->post("draw"),
			"recordsTotal" => $c=$this->mdl->count_report(),
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