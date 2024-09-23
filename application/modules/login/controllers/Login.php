<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller {

	

	function __construct()
	{
		parent::__construct();	
			$this->load->model('M_login','mdl');
		date_default_timezone_set('Asia/Jakarta');
	}
	function sescaptcha($captcha)
	{
	$this->session->set_userdata(array("captcha"=>$captcha));
	}
	 function captcha()
	{
	$captcha=substr(str_shuffle("123456789"),0,5); // string yg akan diacak membentuk captcha 0-z dan sebanyak 6 karakter
	$this->sescaptcha($captcha);
	$gambar=ImageCreate(50,25); // ukuran kotak width=60 dan height=20
	$wk=ImageColorAllocate($gambar, 255, 255, 255); // membuat warna kotak -> Navajo White
	$wt=ImageColorAllocate($gambar, 71, 153, 153); // membuat warna tulisan -> Putih
	ImageFilledRectangle($gambar, 190, 776, 50, 120, $wk);
	ImageString($gambar, 10, 1, 3, $captcha, $wt);
	return ImageJPEG($gambar);
	}
	function _template($data)
	{
			$this->load->view('temp_login/main',$data);
	}
	function cek()
	{
	   echo sprintf("%05s", 4341);
	}
	public function logout()
	{
		 $this->session->sess_destroy();
		$this->load->view("logout");
		 redirect("login");
		
	}
	public function index()
	{	 
	return $this->load->view("index");
	return false;
			     // $nip	= "pandu.pandang"; $this->session->set_userdata("nip",$nip); 
				  $nip	=  $this->session->userdata("nip");
				if(!$nip){	redirect("login/logout"); 		}
				$this->db->where("nip",$nip);
				$this->db->where("nip IS NOT NULL");
				$this->db->where("nip!=''");
				$this->db->where("sts_aktivasi","enable");
				$cek=$this->db->get("admin")->row();
				if(!$cek)
				{
					echo $this->m_reff->page405();	return false;
				}
				
				
				$id_level	=	isset($cek->level)?($cek->level):"";
				$id			=	isset($cek->id_admin)?($cek->id_admin):"";
				

								$this->db->where("id_level",$id_level);
				$get		=	$this->db->get("main_level")->row();
				
				$nama_level	=	isset($get->nama)?($get->nama):"";
				$direct		=	isset($get->direct)?($get->direct):"";
				
				if($get){	
						/* simpan sesssion */
						$this->session->set_userdata("level",$nama_level);
						$this->session->set_userdata("id",$id);
					 	redirect($direct);
				}else{
						/* level not found */
						echo $this->m_reff->page405();	return false;
				}
					
	
	
	}
	 
	public function login_acara()
	{	//$level=$this->session->userdata("id");
		//if($level){ redirect(""); };
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			echo	$this->load->view("login_acara");
		}else{
		 
			$data['konten']="login_acara";
			$this->_template($data);
		}
	}
	
	function goEvent()
	{
		$kode	=	$this->input->get("kode");
		$cek	=	$this->mdl->goEvent($kode);
		if($cek){
			redirect("myevent");
		}else{
			redirect("login/login_acara");
		}
	}
	
	function cekLogin()
	{
	$hasil=$this->mdl->cekLogin();
	echo json_encode($hasil);
	}function cekAcara()
	{
	$hasil=$this->mdl->cekAcara();
	echo json_encode($hasil);
	}
	
	public function add_data()
	{
		$data=$this->mdl->add();
		echo json_encode($data);
	}
	
	function ressetaja($hp,$tbl,$id)
	{
	        	$kode=substr(str_shuffle("123456789"),0,5); // string yg akan  
	        	$this->db->where("id",$id);
	           	$data=$this->db->get($tbl)->row();
				 $pass= substr($data->alias,2,100);
				 $pass=substr($pass,0,-2);
				$pesan="[SMK BK SUBANG]: Username :".$data->username." , Password :".$pass ;
				$modem="";$source="resset_password";
     return     $this->sms->_kirimSms($hp,$pesan,$modem,$id,$source);
	    
	}
	
	function resset()
	{
	    
	    $hp=$this->input->get_post("hp");
		$hp=trim($hp);
		$hp=substr($hp,1,9);
		
		$cek_siswa=$this->db->query("select * from data_siswa where hp like '%".$hp."%' ");
	    $cek_ortu=$this->db->query("select * from data_ortu where hp_ibu like '%".$hp."%' or hp_ayah like '%".$hp."%' ");
	    $cek_guru=$this->db->query("select * from data_pegawai where hp like '%".$hp."%' ");
	    
	    if($cek_siswa->num_rows()==1)
	    {
	        $db=$cek_siswa->row();
	        $r=$this->ressetaja($db->hp,"data_siswa",$db->id);
	        echo "<center>Data Akun anda telah kami kirim via SMS ke nomor ".$db->hp.", mohon periksa Kotak masuk anda.</center>"; 
	    }elseif($cek_ortu->num_rows()==1)
	    {
	        $db=$cek_ortu->row();
	        $r=$this->ressetaja($db->hp_ibu,"data_ortu",$db->id);
	         echo "<center>Data Akun anda telah kami kirim via SMS ke nomor ".$db->hp_ibu.", mohon periksa Kotak masuk anda.</center>"; 
	    }elseif($cek_guru->num_rows()==1)
	    {
	        $db=$cek_guru->row();
	        $r=$this->ressetaja($db->hp,"data_pegawai",$db->id);
	       echo "<center>Data Akun anda telah kami kirim via SMS ke nomor ".$db->hp.", mohon periksa Kotak masuk anda.</center>"; 
	    }else{
	        echo "No.Hp anda tidak cocok! silahkan hubungi CS kami.";
	    }
	     
	}
  
}

