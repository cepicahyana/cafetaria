<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Autoreplay extends MY_Controller {

	

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
	function ajukan_tes(){
		$var = $this->mdl->ajukan_tes();
		echo json_encode($var);
	}

	function hapus(){
		$var["data"]=$this->mdl->hapus();
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}

	function ajukanUlangKeluarga(){
		$var["data"]=$this->load->view("ajukanUlangKeluarga",null,true);
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
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
	    
	  public function keluarga()
	{
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			$var["data"]=$this->load->view("keluarga",null,true);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
		}else{
			$data['konten']="keluarga";
			$this->_template($data);
		}
		
	}   
	
	function detailKondisi(){
		$data["kode"]=$this->input->post("kode");
		 $var["data"]=$this->load->view("detailKondisi",$data,true);
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}
	function detailKondisiKeluarga(){
		$data["kode"]=$this->input->post("kode");
		$var["data"]=$this->load->view("detailKondisiKeluarga",$data,true);
		$var["token"]=$this->m_reff->getToken();
		echo  json_encode($var);
	}
	  
	function getData()
	{
		$list = $this->mdl->getData();
		$data = array();
		$no = $this->input->post("start");
		
		if(!$this->input->post("draw")){ echo $this->m_reff->page403(); return false;}
		$no =$no+1;
		foreach ($list as $dataDB) {
         ////

			
			$tombol='<div aria-label="Basic example" class="btn-group" role="group">
			<button onclick="edit(`'.$dataDB->id.'`,`'.$dataDB->jenis_pesan.'`)" class="btn btn-sm btn-secondary pd-x-25 active" type="button">Ubah</button>
			<button onclick="Delete(`'.$dataDB->id.'`,`'.$dataDB->keyword.'`)" class="btn btn-sm btn-light pd-x-25 active" type="button">Hapus</button> 
			 </div>';
     if($dataDB->typo==0){
        $typo = "<span class='badge badge-primary'>bebas</span>";
    }else{
        $typo = "<span class='badge badge-warning'>persis</span>";
    }
    
      if($dataDB->sts==0){ $sts ="<span class='badge badge-danger'>non-aktif</span>"; }else{$sts =  "<span class='badge badge-success'>aktif</span>";}
      if($dataDB->jenis_pesan==1){
          $jp = "<span class='badge badge-light' style='color:black'>Teks</span>";
      }elseif($dataDB->jenis_pesan==2){
          $jp = "<a target='_blank' href='".base_url()."file_upload/autoreplay/".$dataDB->file."' class='badge badge-secondary'>Teks+Gambar</a>";
      }elseif($dataDB->jenis_pesan==4){
          $jp = "<a target='_blank' class='badge badge-primary text-white'>Tombol</a>";
      }elseif($dataDB->jenis_pesan==5){
          $jp = "<a target='_blank' class='badge badge-primary  text-white'>List menu</a>";
      }else{
          $jp = "<a  target='_blank'  href='".base_url()."file_upload/autoreplay/".$dataDB->file."' class='badge badge-info'>Teks+file</a>";
      }
      
		$row = array();
			$row[] =  $no++;	
// 			$row[] = $dataDB->id_user;
// 			$row[] = $dataDB->keyword;
if($dataDB->jenis_pesan>=4){
    $ops = $dataDB->options;
    $opsi = json_decode($ops,true);
    if($dataDB->jenis_pesan==5){
        $opsi=$opsi[0]["rows"];
    }
    $ops = null;
    foreach($opsi as $key=>$val){
        if(isset($val["body"])){
            $isi = $val["body"];
        }else{
            $isi = $val["title"];
        }
        $ops.="<button class='btn btn-light btn-sm btn-mini'>".$isi."</button>&nbsp;";
    }
    
    
    $pb = $dataDB->replay;
    $js = json_decode($pb,TRUE);
    $pb = "<br><b>Judul : </b>".$js['title'];
    $pb.= "<br><b>Isi informasi : </b>".$js['body'];
    $pb.= "<br><b>Footer : </b>".$js['footer'];
    	$row[] = "<i class='text-success'>keyword :</i> ".$dataDB->keyword."<hr> <i class='text-success'>Pesan balasan :</i> ".$pb.br()."
    	<i class='text-success'>Pilihan : </i> ".$ops;
}else{
    	$row[] = "<i class='text-success'>keyword :</i> ".$dataDB->keyword."<hr> <i class='text-success'>Pesan balasan :</i> ".$dataDB->replay;
}
		
			$row[] = $typo;
			$row[] = $sts;
			$row[] = $jp;
			$row[] = $tombol;

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

    function viewAdd_list(){
        $var["data"]=$this->load->view("viewAdd_list","",true);
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
    }
	function viewAdd_autoreplay(){
		$var["data"]=$this->load->view("viewAdd_autoreplay","",true);
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}
	
	function viewAdd_button(){
	    $var["data"]=$this->load->view("viewAdd_button","",true);
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}
	function viewEdit_autoreplay(){
	    $jenis = $this->input->get_post("jenis");
	    if($jenis==5)
	    {
	        $var["data"]=$this->load->view("viewEdit_list",NULL,TRUE);
	    }elseif($jenis==4)
	    {
	        $var["data"]=$this->load->view("viewEdit_button",NULL,TRUE);
	    }else{
	             $var["data"]=$this->load->view("viewEdit_replay",NULL,TRUE);
	    }
		
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}
	function insert_autoreplay(){
		$var["data"]= $this->mdl->insert();
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}
	function insert_button(){
	    	$var["data"]= $this->mdl->insert_button();
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}
	function insert_list(){
	     $var["data"]= $this->mdl->insert_list();
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}
	function update_autoreplay(){
	    $jenis = $this->input->post("jenis");
	    if($jenis==5){
	            $var["data"]= $this->mdl->update_autoreplay_5();
	    }elseif($jenis==4){
	            $var["data"]= $this->mdl->update_autoreplay_4();
	    }else{
	            $var["data"]= $this->mdl->update_autoreplay();
	    }
	
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}

}