<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Percakapan extends MY_Controller {

	

	function __construct()
	{
		parent::__construct();	
		$this->m_konfig->validasi_session(array("member"));
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
			$var["data"]=$this->load->view("index",null,true);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
		}else{
			$data['konten']="index";
			$this->_template($data);
		}
		
	} 
	 
	  
	  
	
	
	function insert()
	{
		$data=$this->mdl->insert();
		echo json_encode($data);
	}
	
	function save(){
		$data=$this->mdl->save();
		echo json_encode($data);
	}
	function update(){
		$data=$this->mdl->update();
		echo json_encode($data);
	}
	 
	function cekNik(){
		$data["data"]=$this->mdl->cekNik();
		$data["token"]=$this->m_reff->getToken();
		echo json_encode($data);
	}
	function getTerjadwal(){
		$data["data"]=$this->load->view("getTerjadwal",null,TRUE);
		$data["token"]=$this->m_reff->getToken();
		echo json_encode($data);
	}
	 
	 function detail(){
	    $data["data"]=$this->load->view("detail",null,TRUE);
		$data["token"]=$this->m_reff->getToken();
		echo json_encode($data);
	 }
	 
	 function balas_cepat(){
	    $data["data"]=$this->mdl->balas_cepat();
		$data["token"]=$this->m_reff->getToken();
		echo json_encode($data);
	 }
	
	function getData()
	{
		$list = $this->mdl->get_data();
		$data = array();
		$no = $this->input->post("start");
			if(!$this->input->post("draw")){ echo $this->m_reff->page403(); return false;}
		$no =$no+1;
		foreach ($list as $dataDB) {
		////
			$btn   =  "<span class='btn-icon-list'>
			<div title='Balas pesan' class='btn btn-primary btn-sm cursor ' onclick='info(`".$dataDB->sender_number."`,`".$dataDB->sender_name."`)'><i class='icon ion-md-chatboxes'></i> Lihat percakapan</div>
			 
			</span>
			";
			$sts ="";
			 
			$nama 		= $dataDB->sender_name;
	        $sender 	= "<span class='text-black'>".$dataDB->sender_number."</span>";
			 
			
			$selisih	= $this->tanggal->selisih(substr($dataDB->_ctime,0,10),date('Y-m-d'));
			if($selisih==0){
				$selisih = "<span class='badge btn-block btn-light text-black  '>Hari ini</span>";
			}else{
				$selisih = "<span class='badge  btn-block btn-light text-black'>". $selisih." Hari yang lalu</span>";
			}
			$pesan = $dataDB->msg; 
			$row = array();
			$row[] =  $no++;	
			 
		 	
			$row[] = $this->tanggal->hariLengkap(substr($dataDB->_ctime,0,10),"/").br().substr($dataDB->_ctime,10,10). " WIB";	
			$row[] = $nama."<br/><span class='color-light'>".$sender."</span>";
			$row[] = $pesan; 
			$row[] =  $btn;	
			 
		  
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
 

}