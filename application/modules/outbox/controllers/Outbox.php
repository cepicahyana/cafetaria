<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Outbox extends MY_Controller {

	

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
	 
	 function balas(){
	    $data["data"]=$this->load->view("balas",null,TRUE);
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
			<div title='Balas pesan' class='btn btn-outline-primary btn-sm cursor ' onclick='balas(`".$dataDB->id."`,)'><i class='icon ion-ios-share-alt'></i> Kirim Ulang</div>
			 
			</span>
			";
			$sts ="";
			 
			$nama 		= " ";
			if($dataDB->no_tujuan){
			    $sender 	= "<span class='text-black'>".$dataDB->no_tujuan."</span>";
			}else{
			    $sender     = "<b class='text-success'>Group : ".$dataDB->nama_group."</b>";
			}
			
			$selisih	= $this->tanggal->selisih(substr($dataDB->_ctime,0,10),date('Y-m-d'));
			if($selisih==0){
				$selisih = "<span class='badge btn-block btn-light text-black  '>Hari ini</span>";
			}else{
				$selisih = "<span class='badge  btn-block btn-light text-black'>". $selisih." Hari yang lalu</span>";
			}
			$pesan = $dataDB->pesan;
			if($dataDB->options)
			{
			    $ray     = json_decode($pesan,TRUE);
			 //   $title   = $ray['title'];
			    $body    = $ray['body'];
			 //   $footer  = $ray['footer'];
			    $pesan   =  $body;
			}
			$row = array();
			$row[] =  $no++;	
			 
		 	
			$row[] = $this->tanggal->hariLengkap(substr($dataDB->tgl,0,10),"/").br().substr($dataDB->tgl,10,10). " WIB";	
			$row[] = $nama.$sender;
			$row[] = $pesan.br()."<span class='badge  btn-light text-black  '>Pesan informasi</span>";
			 
            if($dataDB->sts_pesan==1){
                $sts_pesan = "<span class='badge badge-warning'>✓ Pending</span>";
            }elseif($dataDB->sts_pesan==2){
                $sts_pesan = "<span class='badge badge-info'>✓✓ Terkirim</span>";
            }elseif($dataDB->sts_pesan==3){
                $sts_pesan = "<span class='badge badge-success'> ✓✓ Dibaca</span>";
            }else{
                $sts_pesan = "<span class='badge badge-warning'>✓ Pending</span>";
            }
        
			$row[] =  $sts_pesan;
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