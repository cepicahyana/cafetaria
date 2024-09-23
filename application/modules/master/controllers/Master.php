<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master extends CI_Controller {

	

	function __construct()
	{
		parent::__construct();	

		$this->load->model("model","mdl");
		date_default_timezone_set('Asia/Jakarta');
	 
	}
	
	function _template($data)
	{
	     
	$this->load->view('temp_master/main',$data);	
	}
	 

	 public function index()
	{
	   $this->m_konfig->validasi_session(array("resto"));
		$dev	=	$this->m_reff->goField("data_member","device_from","where id='".$this->m_reff->idu()."'");
		if($dev==1){
			$dev1 = "checked";
			$dev2 = "";
		}else{
			$dev1 = "";
			$dev2 = "checked";
		}

		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{	$var["dev1"]=$dev1;
			$var["dev2"]=$dev2;

			$var["data"]=$this->load->view("index",$var,true);
			$var["token"]=$this->m_reff->getToken();
		
			echo json_encode($var);
			
			
		}else{
			$data["dev1"]=$dev1;
			$data["dev2"]=$dev2;
			$data['konten']="index";
			$this->_template($data);
		}
		
	}  
 
    function setOrderRekap(){
             $var["data"]=$this->mdl->setOrderRekap();
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
    }
    function detail_order(){
          $var["data"]=$this->load->view("detail_order",null,true);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
    }
    function getRekapOrder(){
         $var["data"]=$this->load->view("getRekapOrder",null,true);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
    }
	function form_edit_menu(){
	        $var["data"]=$this->load->view("form_edit_menu",null,true);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
	}
	function costumer(){
	    $this->mdl->syncron();
	    $ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{	
			$var["data"]=$this->load->view("costumer",null,true);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
		}else{
	    	$data["token"]=$this->m_reff->getToken();
			$data['konten']="costumer";
			$this->_template($data);
		}
	    
	 }
	 
	 	function ks(){
	    $ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{	
			$var["data"]=$this->load->view("ks",null,true);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
		}else{
	    	$data["token"]=$this->m_reff->getToken();
			$data['konten']="ks";
			$this->_template($data);
		}
	    
	 }
	 
	 
	 	function menu(){
	    $ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{	
			$var["data"]=$this->load->view("menu",null,true);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
		}else{
	    	$data["token"]=$this->m_reff->getToken();
			$data['konten']="menu";
			$this->_template($data);
		}
	    
	 }
	 	function kami(){
	    $ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{	
			$var["data"]=$this->load->view("kami",null,true);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
		}else{
	    	$data["token"]=$this->m_reff->getToken();
			$data['konten']="kami";
			$this->_template($data);
		}
	    
	 }
	function setting(){
	    $ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{	
			$var["data"]=$this->load->view("setting",null,true);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
		}else{
	    	$data["token"]=$this->m_reff->getToken();
			$data['konten']="setting";
			$this->_template($data);
		}
	    
	 }
	 
	 	function order(){
// 	 	$this->m_konfig->validasi_session(array("resto"));
	    $ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{	
			$var["data"]=$this->load->view("order",null,true);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
		}else{
	    	$data["token"]=$this->m_reff->getToken();
			$data['konten']="order";
			$this->_template($data);
		}
	    
	 }
	 
	 	function broadcast(){
	 	$this->m_konfig->validasi_session(array("resto"));
	    $ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{	
			$var["data"]=$this->load->view("broadcast",null,true);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
		}else{
	    	$data["token"]=$this->m_reff->getToken();
			$data['konten']="broadcast";
			$this->_template($data);
		}
	    
	 }
	 
	 function survei(){
	 	$this->m_konfig->validasi_session(array("resto"));
	    $ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{	
			$var["data"]=$this->load->view("survei",null,true);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
		}else{
	    	$data["token"]=$this->m_reff->getToken();
			$data['konten']="survei";
			$this->_template($data);
		}
	    
	 }
	 
	 function report(){
	     $this->m_konfig->validasi_session(array("resto"));
	    $ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{	
			$var["data"]=$this->load->view("report",null,true);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
		}else{
	    	$data["token"]=$this->m_reff->getToken();
			$data['konten']="report";
			$this->_template($data);
		}
	 }
	 function rekap_order(){
	     $this->m_konfig->validasi_session(array("resto"));
	    $ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{	
			$var["data"]=$this->load->view("rekap_order",null,true);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
		}else{
	    	$data["token"]=$this->m_reff->getToken();
			$data['konten']="rekap_order";
			$this->_template($data);
		}
	 }
	 function del_media(){
	      $var["data"]=$this->mdl->del_media();
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
	 }
	 function order_selesai(){
	       $var["data"]=$this->mdl->order_selesai();
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
	 }
	  function order_sesuai(){
	       $var["data"]=$this->mdl->order_sesuai();
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
	 }
	 	 function order_delete(){
	       $var["data"]=$this->mdl->order_delete();
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
	 }
	 function set_broadcast(){
	      $var["data"]=$this->mdl->set_broadcast();
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
	 }
	 function sent2(){
	      $var["data"]=$this->mdl->sent2();
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
	 }
	 function getOrder(){
	      $var["data"]=$this->load->view("getOrder",null,true);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
	 }
	 function syncron(){
	      $var["data"]=$this->mdl->syncron();
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
	 }
	function set_value(){
	    	$var["data"]=$this->mdl->set_value();
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}
	function setMenu(){
	    	$var["data"]=$this->mdl->setMenu();
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}
	function update(){
		$var["data"]=$this->mdl->update();
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	 }
	 function perubahan_order(){
	   $var["data"]=$this->load->view("perubahan_order",null,true);
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	 }

	 function imgQr(){
		$this->load->view("frame");
	}
	
	function delete_ghalery(){ 
		$var["data"]=$this->mdl->delete_ghalery();
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}
	function delete_fotmenu(){ 
		$var["data"]=$this->mdl->delete_fotmenu();
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}
	
    function isi_broadcast(){
        $var["data"]=$this->load->view("isi_broadcast",null,true);
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
    }
	function insert(){
	    	$this->m_konfig->validasi_session(array("resto"));
		$var["data"]=$this->mdl->insert();
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}
    function del_file_broadcast(){
        	$this->mdl->del_file_broadcast();
		redirect("master/broadcast");
    }
 	function save_upload(){
	    $db = $this->mdl->save_upload();
	 	$g = isset($db["gagal"])?($db["gagal"]):null;
	 	$i = isset($db["info"])?($db["info"]):null;
		if($g){
		    $this->session->set_flashdata("gagal",$i);
		}
		redirect("master/broadcast");
	}
	function kirim(){
	    	$this->m_konfig->validasi_session(array("resto"));
		$var["data"]=$this->mdl->kirim();
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}
	function getDataSurvei(){
	    	$list = $this->mdl->get_data_survei();
		$data = array();
		$no = $this->input->post("start");
			if(!$this->input->post("draw")){ echo $this->m_reff->page403(); return false;}
		$no =$no+1;
		foreach ($list as $v) {
		 
			$row = array();
		
			$row[] =  " 
			<i style='color:teal;font-size:10px'><i class='fa fa-user'></i> $v->nama  - $v->hp</i> <br>
			<i style='color:teal;font-size:10px'><i class='fa fa-clock'></i> ".$v->tgl." (".$this->tanggal->selisih_waktu($v->tgl)." yang lalu) </i>"; 
		
			$row[]= $v->pelayanan;
				$row[]= $v->pengalaman;
					$row[]= $v->penyajian;
						$row[]= $v->tempat;
							$row[]= $v->makanan;
							$row[]= $v->ks;
				$data[] = $row; 
			
			}
			 
		$output = array(
						"draw" => $this->input->post("draw"),
						"recordsTotal" => $c=$this->mdl->count_survei(),
						"recordsFiltered" =>$c,
						"data" => $data,
						"token"=>$this->m_reff->getToken()
						); 
		echo json_encode($output);
	}
	function getDataSaran()
	{
		$list = $this->mdl->get_data_saran();
		$data = array();
		$no = $this->input->post("start");
			if(!$this->input->post("draw")){ echo $this->m_reff->page403(); return false;}
		$no =$no+1;
		foreach ($list as $v) {
		 
			$row = array();
			$row[] =  " <span>".$v->saran."</span> <br>
			<i style='color:teal;font-size:10px'><i class='fa fa-user'></i> $v->nama  - $v->hp</i> <br>
			<i style='color:teal;font-size:10px'><i class='fa fa-clock'></i> ".$v->tgl." (".$this->tanggal->selisih_waktu($v->tgl)." yang lalu) </i>"; 
			$data[] = $row; 
			
			}
			 
		$output = array(
						"draw" => $this->input->post("draw"),
						"recordsTotal" => $c=$this->mdl->count(),
						"recordsFiltered" =>$c,
						"data" => $data,
						"token"=>$this->m_reff->getToken()
						); 
		echo json_encode($output);

	}
	function delete_menu(){
	    $var["data"]=$this->mdl->delete_menu();
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}
	function insert_menu(){
	    
	     $var["data"]=$this->mdl->insert_menu();
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}
	function update_menu(){
	    
	     $var["data"]=$this->mdl->update_menu();
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
	}
	function getDataMenu()
	{
		$list = $this->mdl->get_data_menu();
		$data = array();
		$no = $this->input->post("start");
			if(!$this->input->post("draw")){ echo $this->m_reff->page403(); return false;}
		$no =$no+1;
		foreach ($list as $v) {
		 if($v->jenis==1){
		     $jenis="<span class='text-primary'>Makanan</span>";
		 }else{
		     $jenis="<span class='text-info'>Minuman</span>";
		 }
		 
		 if($v->special==1){
		     $nama= $v->nama." <i class='fa fa-heart text-danger'></i>";
		 }else{
		     $nama=$v->nama;
		 }
		 
		 if($v->sts==1){
		     $sts= "<span class='text-success'>Tersedia</span>";
		 }else{
		     $sts="<span class='text-danger'>Tidak tersedia</span>";
		 }
		 
		 if($v->kategory){
		     $kategory="<br><i class='text-info'>".$v->kategory."</i>";
		 }else{
		      $kategory="";
		 }
			$row = array();
			$row[] =  " <span>".$no++."</span>";
			$row[] =  " <span>".$v->no." - ".$nama.$kategory."</span>";
			$row[] =  " <span>".$v->harga."</span>";
			$row[] =  " <span>".$jenis."</span>";
			$row[] =  " <span>".$sts."</span>";
		    $row[] =  " <span> <button onclick='edit(`".$v->id."`,`".$v->nama."`)' class='btn btn-sm btn-primary'>Edit</button>  </span>";
		    $row[] =  " <span>   <button onclick='hapus(`".$v->id."`,`".$v->nama."`)' class='btn btn-sm btn-danger'>Hapus</button></span>";
		
			$data[] = $row; 
			
			}
			 
		$output = array(
						"draw" => $this->input->post("draw"),
						"recordsTotal" => $c=$this->mdl->count_menu(),
						"recordsFiltered" =>$c,
						"data" => $data,
						"token"=>$this->m_reff->getToken()
						); 
		echo json_encode($output);

	}
 
 
 	function getDataCos()
	{
		$list = $this->mdl->get_data_cos();
		$data = array();
		$no = $this->input->post("start");
			if(!$this->input->post("draw")){ echo $this->m_reff->page403(); return false;}
		$no =$no+1;
		foreach ($list as $v) {
		 
			$row = array();
			$row[] = "<input type='checkbox' id='basic_checkbox_".$v->id."' onclick='pilcek()' class='filled-in pilih chk-col-red' name='pilih[]' value='".$v->hp."'><label for='basic_checkbox_".$v->id."'> </label>";
			$row[] = $v->nama." / ".$v->hp; 
			$row[] = $this->tanggal->selisih_waktu(substr($v->upd,0,10)). "Yang lalu";
			$data[] = $row; 
			
			}
			 
		$output = array(
						"draw" => $this->input->post("draw"),
						"recordsTotal" => $c=$this->mdl->count_cos(),
						"recordsFiltered" =>$c,
						"data" => $data,
						"token"=>$this->m_reff->getToken()
						); 
		echo json_encode($output);

	}
 
	 
}