<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends MY_Controller {

	

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
	 
	function reload_data(){
	    	$var["data"]=$this->load->view("reload_data",null,true);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
	}
	public function dsh()
	{
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("dsh");
		}else{
			$data['konten']="dsh";
			$this->_template($data);
		}
		
	} public function index()
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
		
	} public function set()
	{
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("set");
		}else{
			$data['konten']="set";
			$this->_template($data);
		}
		
	} 
	public function grafik()
	{
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("grafik");
		}else{
			$data['konten']="grafik";
			$this->_template($data);
		}
		
	} public function br()
	{
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("br");
		}else{
			$data['konten']="br";
			$this->_template($data);
		}
		
	} 
	function getDataAcara()
	{	$query_data="";
		$s=$this->input->get_post("search");
		if($s)
		{	$query_data[]=["id"=>$s,"text"=>$s]; 
			$this->db->like("acara",$s); 
		}
		
			$this->db->order_by("nama","asc");
			$this->db->where("id_acara",$this->mdl->id_acara());
			$this->db->select("distinct(acara) as nama");
			$query=$this->db->get("data_acara")->result();
			 
			foreach($query as $v)
			{
				$query_data[]=["id"=>$v->nama,"text"=>$v->nama];
			}
		 
	echo	  json_encode($query_data);
	}
	
	function getDataTempat()
	{	$query_data="";
		$s=$this->input->get_post("search");
		if($s)
		{	$query_data[]=["id"=>$s,"text"=>$s]; 
			$this->db->like("tempat",$s); 
		}
		
			$this->db->order_by("tempat","asc");
			$this->db->where("id_acara",$this->mdl->id_acara());
			$this->db->select("distinct(tempat) as nama");
			$query=$this->db->get("data_acara")->result();
			
			foreach($query as $v)
			{
				$query_data[]=["id"=>$v->nama,"text"=>$v->nama];
			}
		// 	header('Content-Type: application/json;charset=UTF-8');
		//	header('Access-Control-Allow-Origin: *'); 
	echo	  json_encode($query_data);
	}
	function getDataJenisKegiatan()
	{	$query_data="";
		$s=$this->input->get_post("search");
		if($s)
		{	$query_data[]=["id"=>$s,"text"=>$s]; 
			$this->db->like("jenis_kegiatan",$s); 
		}
		
			$this->db->order_by("jenis_kegiatan","asc");
			$this->db->where("id_acara",$this->mdl->id_acara());
			$this->db->select("distinct(jenis_kegiatan) as nama");
			$query=$this->db->get("data_acara")->result();
			
			foreach($query as $v)
			{
				$query_data[]=["id"=>$v->nama,"text"=>$v->nama];
			}
		// 	header('Content-Type: application/json;charset=UTF-8');
		//	header('Access-Control-Allow-Origin: *'); 
	echo	  json_encode($query_data);
	}
	
	function getDistribusi()
	{	$query_data="";
		$s=$this->input->get_post("search");
		if($s)
		{	$query_data[]=["id"=>$s,"text"=>$s]; 
			$this->db->like("distribusi",$s); 
		}
		
			$this->db->order_by("distribusi","asc");
			$this->db->where("id_acara",$this->mdl->id_acara());
			$this->db->select("distinct(distribusi) as nama");
			$query=$this->db->get("data_acara")->result();
		 
			foreach($query as $v)
			{
				$query_data[]=["id"=>$v->nama,"text"=>$v->nama];
			}
		 
	echo	  json_encode($query_data);
	}
	function pakaian_1()
	{	$query_data="";
		$s=$this->input->get_post("search");
		if($s)
		{	$query_data[]=["id"=>$s,"text"=>$s]; 
			$this->db->like("pakaian_1",$s); 
		}
		
			$this->db->order_by("pakaian_1","asc");
			$this->db->where("id_acara",$this->mdl->id_acara());
			$this->db->select("distinct(pakaian_1) as nama");
			$query=$this->db->get("data_acara")->result();
		 
			foreach($query as $v)
			{
				$query_data[]=["id"=>$v->nama,"text"=>$v->nama];
			}
		 
	echo	  json_encode($query_data);
	}
	
	function pakaian_2()
	{	$query_data="";
		$s=$this->input->get_post("search");
		if($s)
		{	$query_data[]=["id"=>$s,"text"=>$s]; 
			$this->db->like("pakaian_2",$s); 
		}
		
			$this->db->order_by("pakaian_2","asc");
			$this->db->where("id_acara",$this->mdl->id_acara());
			$this->db->select("distinct(pakaian_2) as nama");
			$query=$this->db->get("data_acara")->result();
			
			foreach($query as $v)
			{
			$query_data[]=["id"=>$v->nama,"text"=>$v->nama];
			}
		 
		echo	  json_encode($query_data);
	}
	
	function pakaian_3()
	{	$query_data="";
		$s=$this->input->get_post("search");
		if($s)
		{
			$query_data[]=["id"=>$s,"text"=>$s]; 
			$this->db->like("pakaian_3",$s); 
		}
		
			$this->db->order_by("pakaian_3","asc");
			$this->db->where("id_acara",$this->mdl->id_acara());
			$this->db->select("distinct(pakaian_3) as nama");
			$query=$this->db->get("data_acara")->result();
			
			
			foreach($query as $v)
			{
				$query_data[]=["id"=>$v->nama,"text"=>$v->nama]; 
			}
		 
	echo	  json_encode($query_data);
	}
	
	
	
	function insert()
	{
		$data=$this->mdl->insert();
		echo json_encode($data);
	}
	
	function update()
	{
		$data=$this->mdl->update();
		echo json_encode($data);
	}
	
	
	
	public function acr()
	{
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("acr");
		}else{
			$data['konten']="acr";
			$this->_template($data);
		}
		
	} 
	
	///-----------------------mitra PENILIAAN--------------------------///
	function getData()
	{
		$list = $this->mdl->get_data();
		$data = array();
		$no	  = $_POST['start'];
		$no   =	$no+1;
		 
		foreach ($list as $dataDB) {
		////
		 
		  
		  
		 
	 
		 $tombol='<div class="demo-button-groups">
                                <div  >
								<button title="edit" type="button" onclick="edit(`'.$dataDB->id.'`,`'.$dataDB->perihal.'`)" class="btn bg-blue-grey   waves-light">
									<i class="material-icons">border_color</i>   </button>
									<button title="hapus" type="button" onclick="hapus(`'.$this->encrypt->encode($dataDB->id,"key").'`,`'.$dataDB->perihal.'`)" class="btn bg-blue-grey waves-light">
									<i class="material-icons"> delete_forever</i>   </button>		
						 	
  
                                </div> 
                            </div>
							 ';
			 		
			$ks=str_replace(" "," ",$dataDB->no_surat);
			$row = array();
			 $row[] = "<span class='size'>".$no++."</span>";	
			 $row[] = $tombol;
			 $row[] = "<b>No Surat : </b> ". $ks.br()."<b class='col-deep-orange'>Kode Acara : ".$dataDB->kode."</b>"; 
			 $row[] = "<B>Acara: </b>".br().$dataDB->acara.br()."<b>Perihal:</b><br> ".$dataDB->perihal; 
			 
			 $row[] = "<B>Hari : </b>".br(). $this->tanggal->hariLengkap($dataDB->tgl,"/"). "<br><b>Pukul:</b><br> ".$dataDB->jam." s/d selesai.";
			 $row[] = $dataDB->tempat;
			  
			  
			$data[] = $row; 
			
			}
			 
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $c=$this->mdl->count(),
						"recordsFiltered" =>$c,
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);

	}
	
	
	///-----------------------mitra PENILIAAN--------------------------///
	function dataTamu()
	{
		$list = $this->mdl->_dataTamu();
		$data = array();
		$no	  = $_POST['start'];
		$no   =	$no+1;
		 $tgl=$this->m_reff->goField("data_acara","tgl","where kode='".$this->input->get_post("kode")."' ");
		foreach ($list as $dataDB) {
		////
		 if($tgl>date('Y-m-d'))
		 {
			 $kata="Belum hadir";
		 }else{
			$kata="Tidak hadir";
		 }
		  
		  $sts_ikut=$dataDB->sts_ikutserta;
		  if($sts_ikut==0)
		  {
			 $sts_i="<i class='cursor col-blue'>Belum konfirmasi</i>";
		  }elseif($sts_ikut==1)
		  {
			   $sts_i="<span class='cursor badge  bg-green'>Ya</span>";
		  }else{
			   $sts_i="<span class='cursor badge  bg-grey'>Tidak</span>";
		  }
		  $sts_h=$dataDB->sts_kehadiran;
		  if($sts_h==0)
		  {
			  if($sts_ikut!=1)
			  {
				   $sts_h="<i class=''>-</i>";
			  }else{
				 $sts_h="<span class='cursor badge  bg-grey'>".$kata."</span>";
			  }
			
		  }elseif($sts_h==1)
		  {
			   $sts_h="<span class='cursor badge  bg-green'>Hadir</span>";
		  }else{
			  if($sts_ikut!=1)
			  {
				   $sts_h="<i class=''>-</i>";
			  }else{
				  $sts_h="<span class='badge  bg-red cursor'>Diblokir</span>";
			  }
			  
		  }
		 
		 
		 
		 $tombol='<div class="demo-button-groups">
                                <div  >
								<button title="edit" type="button" onclick="edit(`'.$dataDB->id.'`,`'.$dataDB->nama.'`)" class="btn bg-blue-grey   waves-light">
									<i class="material-icons">border_color</i>   </button>
									<button title="hapus" type="button" onclick="hapus(`'.$this->encrypt->encode($dataDB->id,"key").'`,`'.$dataDB->nama.'`)" class="btn bg-pink waves-light">
									<i class="material-icons"> delete_forever</i>   </button>		
						 	
  
                                </div> 
                            </div>
							 ';
		 
		 
		 
	 	 
			$row = array();
		
			 $row[] = ' 
			 
			  <input type="checkbox" id="md_checkbox_'.$dataDB->id.'"   class="pilih filled-in chk-col-red" onclick="pilcek()"  name="hapus[]"  value="'.$dataDB->id.'" />
                                <label for="md_checkbox_'.$dataDB->id.'">&nbsp;</label> 
			 ';	
			 	$row[] = $no++;
			$row[] = ucwords(strtolower($dataDB->nama));
			$row[] = $dataDB->jabatan;
			$row[] = $this->m_reff->amankan($dataDB->alamat);
			$row[] = $dataDB->blok;
			$row[] = $sts_i;
			$row[] = $sts_h;
			//$row[] = $tombol;
			 
			  
			$data[] = $row; 
			
			}
			 
		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $c=$this->mdl->count_tamu(),
						"recordsFiltered" =>$c,
						"data" => $data,
						);
		//output to json format
		echo json_encode($output);

	}
	
	
	function editAcara()
	{
		 
			echo	$this->load->view("edit_acara");
		 
	}
	
	
	function add_tamu()
	{
		 
			echo	$this->load->view("form_add_tamu");
		 
	}function upload_peserta()
	{
		 
			echo	$this->load->view("upload_peserta");
		 
	}
	function tamu()
	{
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("tamu");
		}else{
			$data['konten']="tamu";
			$this->_template($data);
		}
		 
	}
	function get_data_peserta()
	{
		 
			echo	$this->load->view("get_data_peserta");
		 
	}
	function t()
	{
		$d='["Nama","Jabatan","pendamping "]';
			$r=json_decode($d,true);
			print_r($r);
	}
	
	function up_peserta()
	{
		$var=array();
		$var["size"]=true; 
		$var["file"]=true;
		$var["validasi"]=false; 
		$var["token"]=true; 
		 
	 
		$input=$this->input->post("f");
		$data=$this->security->xss_clean($input);
		if(isset($_FILES["file"]['tmp_name']))
		{
				$echo=$this->mdl->import_peserta("file");
				echo json_encode($echo);
			 
		}else{
				echo $var;
		}
		
	}
	
	
	function edit_peserta()
	{
		$var=array();
		$var["size"]=true; 
		$var["file"]=true;
		$var["validasi"]=false; 
		$var["token"]=true; 
		 
	 
		$input=$this->input->post("f");
		$data=$this->security->xss_clean($input);
		if(isset($_FILES["file"]['tmp_name']))
		{
				$echo=$this->mdl->edit_import_peserta("file");
				echo json_encode($echo);
			 
		}else{
				$dataray=array(  
								"_uid"=>$this->mdl->idu(),
								"_utime"=>date("Y-m-d H:i:s")
								);
							$form	=	$this->input->get_post("f");	
							$this->db->set($form);	
							$this->db->where("id",$this->input->post("id"));	
						$var=$this->db->update("file_peserta",$dataray);
						echo json_encode($var);
		}
		
	}
	
	
	  
	 
	
	function show_file_pdf()
	{ 
       $id= $this->input->get("id"); 
		$data['id']=$id; 
		ob_start();
		//include('file.html');
		$isi=$this->load->view('show_file_pdf',$data);
		$isi = ob_get_clean();

		require_once('static/html2pdf/html2pdf.class.php');
		try{
		 $html2pdf = new HTML2PDF('P',array("210","297"), 'en', true, '', array(15,10,10, 10));
		 $html2pdf->writeHTML($isi, isset($_GET['vuehtml']));
		 $html2pdf->Output('data-peserta.pdf');
		}
		catch(HTML2PDF_exception $e){
		 echo $e;
		 exit;
		}
	}
	
	function cetak_pengantar()
	{
		 
       $id= $this->input->get("id"); 
		$data['id']=$id; 
		ob_start();
		//include('file.html');
		$isi=$this->load->view('cetak_pengantar',$data);
		
		$isi = ob_get_clean();

		require_once('static/html2pdf/html2pdf.class.php');
		try{
		 $html2pdf = new HTML2PDF('P',array("210","297"), 'en', true, '', array(18,10,10, 10));
		 $html2pdf->writeHTML($isi, isset($_GET['vuehtml']));
		 $html2pdf->Output('undangan.pdf');
		}
		catch(HTML2PDF_exception $e){
		 echo $e;
		 exit;
		}
	}function cetak()
	{
		 
       $id= $this->input->get("id"); 
		$data['id']=$id; 
		ob_start();
		//include('file.html');
		$isi=$this->load->view('cetak',$data);
		
		$isi = ob_get_clean();

		require_once('static/html2pdf/html2pdf.class.php');
		try{
		 $html2pdf = new HTML2PDF('P',array("210","297"), 'en', true, '', array(18,10,10, 10));
		 $html2pdf->writeHTML($isi, isset($_GET['vuehtml']));
		 $html2pdf->Output('undangan.pdf');
		}
		catch(HTML2PDF_exception $e){
		 echo $e;
		 exit;
		}
	}
	function cetak_file()
	{
		 
       $id= $this->input->get("id"); 
		$data['id']=$id; 
		ob_start();
		//include('file.html');
		$isi=$this->load->view('cetak_file',$data);
		$isi = ob_get_clean();

		require_once('static/html2pdf/html2pdf.class.php');
		try{
		 $html2pdf = new HTML2PDF('P',array("210","297"), 'en', true, '', array(18,10,10, 10));
		 $html2pdf->writeHTML($isi, isset($_GET['vuehtml']));
		 $html2pdf->Output('data-peserta.pdf');
		}
		catch(HTML2PDF_exception $e){
		 echo $e;
		 exit;
		}
	}
	
	function show_file_xl()
	{
		 
       $this->mdl->show_file_xl();
	}
	
 function hapus_file()
	{
		 
       echo $this->mdl->hapus_file();
	}
	
  function hapus()
	{ 
       echo $this->mdl->hapus();
	}
	
  function getAgenda() {
        /////////////
	 
        $type = isset($_POST['type'])?($_POST['type']):"";
        if ($type == 'fetch') {
            $status = " AND last_cekout IS NULL ";

            $events = array();
            $fetch = $this->db->query("SELECT * FROM data_acara where id_acara='1'   ")->result();
             foreach ($fetch as $fetch) {
                $e = array();
				 $e['id_acara'] = $fetch->id_acara; 
                $e['id'] = $fetch->id; 
           $e['title'] = ucwords(strtolower(strip_tags($fetch->agenda))); 
                $e['start'] = $fetch->tgl;
                $e['end'] =  $fetch->tgl;//$this->tanggal->tambah_tgl($fetch->end,1);
				$e['backgroundColor'] =  "#49a5bf"; 
             
                $e['allDay'] = "true";

                array_push($events, $e);
            }
            echo json_encode($events);
        }else{
		 echo  $this->m_reff->page403(); return false;
		}
	  }
	   function agenda_presiden() {
        /////////////
	 
        $type = isset($_POST['type'])?($_POST['type']):"";
        if ($type == 'fetch') {
            $status = " AND last_cekout IS NULL ";

            $events = array();
            $fetch = $this->db->query("SELECT * FROM data_acara where id_acara='2'   ")->result();
             foreach ($fetch as $fetch) {
                $e = array();
				 $e['id_acara'] = $fetch->id_acara; 
                $e['id'] = $fetch->id; 
                $e['title'] = ucwords(strtolower(strip_tags($fetch->agenda))); 
                $e['start'] = $fetch->tgl;
                $e['end'] =  $fetch->tgl;//$this->tanggal->tambah_tgl($fetch->end,1);
				$e['backgroundColor'] =  "#db36a4"; 
             
                $e['allDay'] = "true";

                array_push($events, $e);
            }
            echo json_encode($events);
        }else{
		 echo  $this->m_reff->page403(); return false;
		}
	  }
	  
	   function agenda_ibn() {
        /////////////
	 
        $type = isset($_POST['type'])?($_POST['type']):"";
        if ($type == 'fetch') {
            $status = " AND last_cekout IS NULL ";

            $events = array();
            $fetch = $this->db->query("SELECT * FROM data_acara where id_acara='3'   ")->result();
             foreach ($fetch as $fetch) {
                $e = array();
				 $e['id_acara'] = $fetch->id_acara; 
                $e['id'] = $fetch->id; 
               $e['title'] = ucwords(strtolower(strip_tags($fetch->agenda))); 
                $e['start'] = $fetch->tgl;
                $e['end'] =  $fetch->tgl;//$this->tanggal->tambah_tgl($fetch->end,1);
				$e['backgroundColor'] =  "#ff920a"; 
             
                $e['allDay'] = "true";

                array_push($events, $e);
            }
            echo json_encode($events);
        }else{
		 echo  $this->m_reff->page403(); return false;
		}
	  }
	  
	    function agenda_kementerian() {
        /////////////
	 
        $type = isset($_POST['type'])?($_POST['type']):"";
        if ($type == 'fetch') {
            $status = " AND last_cekout IS NULL ";

            $events = array();
            $fetch = $this->db->query("SELECT * FROM data_acara where id_acara='4'   ")->result();
             foreach ($fetch as $fetch) {
                $e = array();
				 $e['id_acara'] = $fetch->id_acara; 
                $e['id'] = $fetch->id; 
                $e['title'] = ucwords(strtolower(strip_tags($fetch->agenda))); 
                $e['start'] = $fetch->tgl;
                $e['end'] =  $fetch->tgl;//$this->tanggal->tambah_tgl($fetch->end,1);
				$e['backgroundColor'] =  "#6d0019"; 
             
                $e['allDay'] = "true";

                array_push($events, $e);
            }
            echo json_encode($events);
        }
	  }
	  
	   function agenda_setpres() {
        /////////////
	 
        $type = isset($_POST['type'])?($_POST['type']):"";
        if ($type == 'fetch') {
            $status = " AND last_cekout IS NULL ";

            $events = array();
            $fetch = $this->db->query("SELECT * FROM data_acara where id_acara='5'   ")->result();
             foreach ($fetch as $fetch) {
                $e = array();
				 $e['id_acara'] = $fetch->id_acara; 
                $e['id'] = $fetch->id; 
                $e['title'] = ucwords(strtolower(strip_tags($fetch->agenda))); 
                $e['start'] = $fetch->tgl;
                $e['end'] =  $fetch->tgl;//$this->tanggal->tambah_tgl($fetch->end,1);
				$e['backgroundColor'] =  "#75890c"; 
             
                $e['allDay'] = "true";

                array_push($events, $e);
            }
            echo json_encode($events);
        }else{
		 echo  $this->m_reff->page403(); return false;
		}
	  }
	  
	  
	   
	function get_info()
	{
			echo	$this->load->view("get_info");
	}
	
	 function filter()
	{	$query_data="";
		$s=$this->input->get_post("search");
		if($s)
		{	 
			$this->db->like("acara",$s); 
			$this->db->or_like("perihal",$s); 
			$this->db->or_like("agenda",$s); 
		}
		 
			$this->db->order_by("tgl","des");
			$this->db->where("id_acara",$this->mdl->id_acara()); 
			$query=$this->db->get("data_acara")->result();
			
			foreach($query as $v)
			{
			$query_data[]=["id"=>$v->kode,"text"=>$v->acara." - ".$this->tanggal->ind_bulan($v->tgl," ")];
			}
		 
		echo	  json_encode($query_data);
	} function blokjs($blok)
	{	$query_data="";
		$s=$this->input->get_post("search");
		if($s)
		{	 
			$query_data[]=["id"=>$s,"text"=>$s];
			$this->db->like("blok",$s); 
		 
		}
		 
			$this->db->order_by("blok","asc");
			$this->db->where("kode_acara",$blok); 
			$this->db->select("DISTINCT(blok) as blok"); 
			$query=$this->db->get("data_peserta")->result();
			
			foreach($query as $v)
			{
			$query_data[]=["id"=>$v->blok,"text"=>$v->blok];
			}
		 
		echo	  json_encode($query_data);
	}
	function getSetting()
	{
		$this->load->view("getSetting");
	}
	
	function insert_tamu()
	{
		echo $this->mdl->insert_tamu();
	}
	function loadDashboard()
	{
		$this->load->view("loadDashboard");
	}
	 
	function export_xl()
	{
		echo $this->mdl->export_xl();
	}
	
	 
	
	 
}