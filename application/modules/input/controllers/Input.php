<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Input extends MY_Controller {

	

	function __construct()
	{
		parent::__construct();	
		$this->m_konfig->validasi_session(array("pic"));
		$this->load->model("model","mdl");
		$this->load->model("model_ppnpn","ppnpn");
		$this->load->model("model_external","external");
		date_default_timezone_set('Asia/Jakarta');
	 
	}
	
	function _template($data)
	{
	$this->load->view('temp_main/main',$data);	
	}
	public function external()
	{
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			$var["data"]=$this->load->view("external",null,true);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
		}else{
			$data['konten']="external";
			$this->_template($data);
		}
		
	}   
	public function ppnpn()
	{
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			$var["data"]=$this->load->view("ppnpn",null,true);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
		}else{
			$data['konten']="ppnpn";
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
	  public function family()
	{
		$ajax=$this->input->get_post("ajax");
		if($ajax=="yes")
		{
			$var["data"]=$this->load->view("family",NULL,TRUE);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
		}else{
			$data['konten']="family";
			$this->_template($data);
		}
		
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
		$db	=	$this->db->get_where("data_pegawai",array("nik"=>$dataDB->nik))->row();

		if($dataDB->konfirm_rs){
			$tombol = "<a class='text-primary' href='".site_url("download")."?f=".$this->m_reff->encrypt("hasil/".$dataDB->file)."'> <i class='fa fa-download' ></i> Download hasil</a>
			";
		}else{
		$tombol='<div aria-label="Basic example" class="btn-groupss" role="group">
		<button onclick="edit(`'.$dataDB->id.'`,`'.$dataDB->nama.'`)" class="btn btn-sm btn-secondary pd-x-25 active" type="button">Edit</button> 
		<button onclick="hapus(`'.$dataDB->id.'`,`'.$dataDB->nip.'`,`'.$dataDB->nama.'`,`'.$dataDB->kode.'`)" class="btn btn-sm btn-danger pd-x-25" type="button">Hapus</button> 
	   </div>';
		}

			
	 if($dataDB->sts_acc==0){
			$acc =  '	<button onclick="edit(`'.$dataDB->id.'`,`1`,`'.$dataDB->nama.'`)" class="btn btn-sm btn-secondary pd-x-25 active" type="button">Belum disetujui</button> ';
	 }else{
		 if($dataDB->hasil){
			$acc = '	<button disabled class="btn btn-sm btn-success pd-x-25 active" type="button">Disetujui</button> ';
		 }else{
			$acc = '	<button onclick="edit(`'.$dataDB->id.'`,`0`,`'.$dataDB->nama.'`)" class="btn btn-sm btn-success pd-x-25 active" type="button">Disetujui</button> ';
		 }
	 }	


	  if($dataDB->hasil=="+"){
		  $hasil = "<span class='badge badge-danger'>positif +</span>";
	  }elseif($dataDB->hasil=="-"){
		  $hasil = "<span class='badge badge-success'>negatif -</span>";
	  }else{
		$hasil = "<span class='badge badge-info'>".$dataDB->hasil."</span>";
	  }
		 
		    $jenis_pegawai = $this->m_reff->jenis_pegawai($dataDB->jenis_pegawai);
			$row = array();
			// $row[] =  $no++;	
			$row[] = $this->tanggal->hariLengkap3($dataDB->tgl,"/");
			$row[] = $acc;
			$row[] = $dataDB->nama.br()."<i>".$jenis_pegawai."</i>";;
			$row[] = $db->jabatan;
			$row[] = $this->m_reff->goField("tr_jenis_test","nama","where kode='".$dataDB->kode_jenis."'");
			$row[] = $this->m_reff->goField("tm_rs","nama","where kode='".$dataDB->kode_tempat."'");
			$row[] = $hasil;
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
 

	 function setStsAcc(){
		    $this->mdl->setStsAcc();
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
	 }

	 function setStsAccFam(){
		    $this->mdl->setStsAccFam();
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
	 }

	 function viewAddFamily(){
		    $var["data"]=$this->load->view("viewAddFamily",NULL,TRUE);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
	 }
	 function viewAddExternal(){
		    $var["data"]=$this->load->view("viewAddExternal",NULL,TRUE);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
	 }

	 function viewAdd(){
		    $var["data"]=$this->load->view("viewAdd",NULL,TRUE);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
	 }
	 function viewAddppnpn(){
		    $var["data"]=$this->load->view("viewAddPpnpn",NULL,TRUE);
			$var["token"]=$this->m_reff->getToken();
			echo json_encode($var);
	 }
	 
	 function viewEditFamily(){
		 $var["data"]=$this->load->view("viewEditFamily",NULL,TRUE);
		 $var["token"]=$this->m_reff->getToken();
		 echo json_encode($var);
	 }
	 function viewEdit(){
		 $var["data"]=$this->load->view("viewEdit",NULL,TRUE);
		 $var["token"]=$this->m_reff->getToken();
		 echo json_encode($var);
	 }
	 function viewEditPpnpn(){
		 $var["data"]=$this->load->view("viewEditPpnpn",NULL,TRUE);
		 $var["token"]=$this->m_reff->getToken();
		 echo json_encode($var);
	 }
	 function viewEditExternal(){
		 $var["data"]=$this->load->view("viewEditExternal",NULL,TRUE);
		 $var["token"]=$this->m_reff->getToken();
		 echo json_encode($var);
	 }
	 
	 function insert_family(){
		$dt = $this->mdl->insert_family();
		echo json_encode($dt);
	 }
	 function insert_ppnpn(){
		$dt = $this->ppnpn->insert();
		echo json_encode($dt);
	 }

	 function insert_external(){
		$dt = $this->external->insert();
		echo json_encode($dt);
	 }


	 function insert(){
		$dt = $this->mdl->insert();
		echo json_encode($dt);
	 }
	 
	 function update(){
		$dt = $this->mdl->update();
		echo json_encode($dt);
	 }
	 
	 
	 function update_ppnpn(){
		$dt = $this->ppnpn->update();
		echo json_encode($dt);
	 }
	 
	 function update_external(){
		$dt = $this->external->update();
		echo json_encode($dt);
	 }
	 
	 function update_family(){
		$dt = $this->mdl->update_family();
		echo json_encode($dt);
	 }
	 function hapus(){
		$dt = $this->mdl->hapus();
		echo json_encode($dt);
	 }
	 function hapus_family(){
		$dt = $this->mdl->hapus_family();
		echo json_encode($dt);
	 }
	 function hapus_external(){
		$dt = $this->external->hapus();
		echo json_encode($dt);
	 }
	 function hapus_ppnpn(){
		$dt = $this->ppnpn->hapus();
		echo json_encode($dt);
	 }


	 function getDataPegawai(){
        $data = $this->mdl->getDataPegawai();
        if(!$data){
            $isi= "<br><div style='width:100%' class='alert alert-danger mg-b-0' role='alert'> <button aria-label='Close' class='close' data-dismiss='alert' type='button'> <span aria-hidden='true'>×</span> </button> 
              Data tidak ditemukan atau sudah ditambahkan!</div>";
        }else{
            $isi ='
			<input type="hidden" name="f[nama]" value="'.$data->nama.'"> 

			<input type="hidden" name="f[nik]" value="'.$data->nik.'"> 
			<input type="hidden" name="hasil_test" value="'.$data->hasil_test.'"> 
			<input type="hidden" name="kode_test" value="'.$data->kode_test.'"> 
			<input type="hidden" name="jenis_pegawai" value="'.$data->jenis_pegawai.'"> 
            ';
            $isi.='<br><table class="entry" width="100%">
            <tr>
            <td>Nama </td> <td>'.$data->nama.'</td>
            </tr>
           
            <tr>
            <td>Biro </td> <td>'.$data->biro.'</td>
            </tr>
            <tr>
            <td>Bagian </td> <td>'.$data->bagian.'</td>
            </tr>
            <tr>
            <td>Jabatan </td> <td>'.$data->jabatan.'</td>
            </tr>
            <tr>
            <td>No Hp </td> <td>'.$data->no_hp.'</td>
            </tr>
            <tr>
            <td>Email </td> <td>'.$data->email.'</td>
            </tr>
			<tr>
            <td>Jenis pegawai </td> <td>'.$this->m_reff->jenis_pegawai($data->jenis_pegawai).'</td>
            </tr>
            </table>';


        }

		$var["data"]=$isi;
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);

    }
	 function dataPpnpn(){
        $data = $this->ppnpn->getDataPpnpn();
        if(!$data){
            $isi= "<br><div style='width:100%' class='alert alert-danger mg-b-0' role='alert'> <button aria-label='Close' class='close' data-dismiss='alert' type='button'> <span aria-hidden='true'>×</span> </button> 
              Data tidak ditemukan atau sudah ditambahkan!</div>";
        }else{
            $isi ='
			<input type="hidden" name="f[nama]" value="'.$data->nama.'"> 
			<input type="hidden" name="f[nip]" value="'.$data->nip.'"> 
			<input type="hidden" name="f[nik]" value="'.$data->nik.'"> 
			<input type="hidden" name="hasil_test" value="'.$data->hasil_test.'"> 
			<input type="hidden" name="kode_test" value="'.$data->kode_test.'"> 
            ';
            $isi.='<br><table class="entry" width="100%">
            <tr>
            <td>Nama </td> <td>'.$data->nama.'</td>
            </tr>
           
            <tr>
            <td>Biro </td> <td>'.$data->biro.'</td>
            </tr>
            <tr>
            <td>Bagian </td> <td>'.$data->bagian.'</td>
            </tr>
            <tr>
            <td>Jabatan </td> <td>'.$data->jabatan.'</td>
            </tr>
            <tr>
            <td>No Hp </td> <td>'.$data->no_hp.'</td>
            </tr>
            <tr>
            <td>Email </td> <td>'.$data->email.'</td>
            </tr>
            </table>';


        }

		$var["data"]=$isi;
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);

    }
	 function getDataPegawaiEdit(){
        $data = $this->mdl->getDataPegawaiEdit();
        if(!$data){
            $isi =  "<div style='width:100%' class='alert alert-danger mg-b-0' role='alert'> <button aria-label='Close' class='close' data-dismiss='alert' type='button'> <span aria-hidden='true'>×</span> </button> 
              Data tidak ditemukan!</div>";
        }else{
         
            $isi = '<table class="entry" width="100%">
            <tr>
            <td>Nama </td> <td>'.$data->nama.'</td>
            </tr>
           
            <tr>
            <td>Biro </td> <td>'.$data->biro.'</td>
            </tr>
            <tr>
            <td>Bagian </td> <td>'.$data->bagian.'</td>
            </tr>
            <tr>
            <td>Jabatan </td> <td>'.$data->jabatan.'</td>
            </tr>
            <tr>
            <td>No Hp </td> <td>'.$data->no_hp.'</td>
            </tr>
            <tr>
            <td>Email </td> <td>'.$data->email.'</td>
            </tr>
            <tr>
            <td>Jenis pegawai </td> <td>'.$this->m_reff->jenis_pegawai($data->jenis_pegawai).'</td>
            </tr>
            </table>';


        }
		$var["data"]=$isi;
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
    }


	 function getDataPpnpnEdit(){
        $data = $this->ppnpn->getDataPpnpnEdit();
        if(!$data){
            $isi =  "<div style='width:100%' class='alert alert-danger mg-b-0' role='alert'> <button aria-label='Close' class='close' data-dismiss='alert' type='button'> <span aria-hidden='true'>×</span> </button> 
              Data tidak ditemukan!</div>";
        }else{
         
            $isi = '<table class="entry" width="100%">
            <tr>
            <td>Nama </td> <td>'.$data->nama.'</td>
            </tr>
           
            <tr>
            <td>Biro </td> <td>'.$data->biro.'</td>
            </tr>
            <tr>
            <td>Bagian </td> <td>'.$data->bagian.'</td>
            </tr>
            <tr>
            <td>Jabatan </td> <td>'.$data->jabatan.'</td>
            </tr>
            <tr>
            <td>No Hp </td> <td>'.$data->no_hp.'</td>
            </tr>
            <tr>
            <td>Email </td> <td>'.$data->email.'</td>
            </tr>
            </table>';


        }
		$var["data"]=$isi;
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
    }




	 function getDataKeluargaEdit(){
        $data = $this->mdl->getDataKeluargaEdit();
		$nip = $this->input->post("nip");
		$peg = $this->db->get_where("data_pegawai",array("nip"=>$nip))->row();
		$nama_peg = isset($peg->nama)?($peg->nama):"";
		$nama_peg = isset($peg->nama)?($peg->nama):"";
		$id_hub   = isset($data->id_hubungan)?($data->id_hubungan):"";
		$jk		  = isset($data->jk)?($data->jk):"";

		$hub = $this->m_reff->goField("tr_hubungan","nama_".$jk,"where id='".$id_hub."'");
        if(!$data){
            $isi =  "<div style='width:100%' class='alert alert-danger mg-b-0' role='alert'> <button aria-label='Close' class='close' data-dismiss='alert' type='button'> <span aria-hidden='true'>×</span> </button> 
              Data tidak ditemukan!</div>";
        }else{
         
            $isi = '<table class="entry" width="100%">
            <tr>
            <td>Nama </td> <td>'.$data->nama.'</td>
            </tr>
           
            <tr>
            <td>Keluarga dari </td> <td>'.$nama_peg.'</td>
            </tr>
            <tr>
            <td>Hubungan keluarga </td> <td>'.$hub.'</td>
            </tr>
             
            </table>';


        }
		$var["data"]=$isi;
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);
    }






	  
	function getDataFamily()
	{
		$list = $this->mdl->get_data_family();
		$data = array();
		$no = $this->input->post("start");
			if(!$this->input->post("draw")){ echo $this->m_reff->page403(); return false;}
		$no =$no+1;

		foreach ($list as $dataDB) {
		////
		// $db	=	$this->db->get_where("data_pegawai",array("nip"=>$dataDB->nip_pegawai))->row();

		if($dataDB->konfirm_rs){
			$tombol = "<a class='text-primary' href='".site_url("download")."?f=".$this->m_reff->encrypt("hasil/".$dataDB->file)."'> <i class='fa fa-download' ></i> Download hasil</a>
			";
		}else{
		$tombol='<div aria-label="Basic example" class="btn-groupss" role="group">
		<button onclick="edit(`'.$dataDB->id.'`,`'.$dataDB->nama.'`)" class="btn btn-sm btn-secondary pd-x-25 active" type="button">Edit</button> 
		<button onclick="hapus(`'.$dataDB->id.'`,`'.$dataDB->nip_pegawai.'`,`'.$dataDB->nama.'`,`'.$dataDB->kode.'`,)" class="btn btn-sm btn-danger pd-x-25" type="button">Hapus</button> 
	   </div>';
		}

			


	  if($dataDB->hasil=="+"){
		  $hasil = "<span class='badge badge-danger'>positif +</span>";
	  }elseif($dataDB->hasil=="-"){
		  $hasil = "<span class='badge badge-success'>negatif -</span>";
	  }else{
		$hasil = "<span class='badge badge-info'>belum keluar</span>";
	  }
		 

	  if($this->session->userdata("level")=="pic"){
		  $btnedit = 'onclick="edit(`'.$dataDB->id.'`,`1`,`'.$dataDB->nama.'`)" ';
	  }else{
		  $btnedit = $this->session->pic;
	  }
	  

 if($dataDB->sts_acc==0){
		$acc =  '	<button '.$btnedit.' class="btn btn-sm btn-secondary pd-x-25 active" type="button">Belum disetujui</button> ';
 }else{
	 if($dataDB->hasil){
		$acc = '	<button disabled class="btn btn-sm btn-success pd-x-25 active" type="button">  Disetujui</button> ';
	 }else{
		$acc = '	<button  '.$btnedit.' class="btn btn-sm btn-success pd-x-25 active" type="button">  Disetujui</button> ';
	 }
 }	
		    
			$row = array();
			// $row[] =  $no++;	
			$row[] = $this->tanggal->hariLengkap3($dataDB->tgl,"/");
			$row[] = $acc;
			$row[] = $dataDB->nama;
			$row[] = $this->m_reff->goField("data_pegawai","nama","where nip='".$dataDB->nip_pegawai."'").br().
			$this->m_reff->goField("data_pegawai","jabatan","where nip='".$dataDB->nip_pegawai."'");
			$row[] = $this->m_reff->goField("tr_hubungan","nama_".$dataDB->jk,"where id='".$dataDB->id_hubungan."'");
			$row[] = $this->m_reff->goField("tr_jenis_test","nama","where kode='".$dataDB->kode_jenis."'");
			$row[] = $this->m_reff->goField("tm_rs","nama","where kode='".$dataDB->kode_tempat."'");
			$row[] = $hasil;
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
 
	  
	function getDataExternal()
	{
		$list = $this->external->get_data();
		$data = array();
		$no = $this->input->post("start");
			if(!$this->input->post("draw")){ echo $this->m_reff->page403(); return false;}
		$no =$no+1;

		foreach ($list as $dataDB) {
		////
		// $db	=	$this->db->get_where("data_pegawai",array("nip"=>$dataDB->nip_pegawai))->row();

		if($dataDB->konfirm_rs){
			$tombol = "<a class='text-primary' href='".site_url("download")."?f=".$this->m_reff->encrypt("hasil/".$dataDB->file)."'> <i class='fa fa-download' ></i> Download hasil</a>
			";
		}else{
		$tombol='<div aria-label="Basic example" class="btn-groupss" role="group">
		<button onclick="edit(`'.$dataDB->id.'`,`'.$dataDB->nama.'`)" class="btn btn-sm btn-secondary pd-x-25 active" type="button">Edit</button> 
		<button onclick="hapus(`'.$dataDB->id.'`,`'.$dataDB->nik.'`,`'.$dataDB->nama.'`,`'.$dataDB->kode.'`,)" class="btn btn-sm btn-danger pd-x-25" type="button">Hapus</button> 
	   </div>';
		}

			


	  if($dataDB->hasil=="+"){
		  $hasil = "<span class='badge badge-danger'>positif +</span>";
	  }elseif($dataDB->hasil=="-"){
		  $hasil = "<span class='badge badge-success'>negatif -</span>";
	  }else{
		$hasil = "<span class='badge badge-info'>belum keluar</span>";
	  }
		 

	  if($this->session->userdata("level")=="pic"){
		  $btnedit = 'onclick="edit(`'.$dataDB->id.'`,`1`,`'.$dataDB->nama.'`)" ';
	  }else{
		  $btnedit = $this->session->pic;
	  }
	  

 if($dataDB->sts_acc==0){
		$acc =  '	<button '.$btnedit.' class="btn btn-sm btn-secondary pd-x-25 active" type="button">Belum disetujui</button> ';
 }else{
	 if($dataDB->hasil){
		$acc = '	<button disabled class="btn btn-sm btn-success pd-x-25 active" type="button">Disetujui</button> ';
	 }else{
		$acc = '	<button  '.$btnedit.' class="btn btn-sm btn-success pd-x-25 active" type="button">Disetujui</button> ';
	 }
 }	
		    
			$row = array();
			// $row[] =  $no++;	
			$row[] = $this->tanggal->hariLengkap3($dataDB->tgl,"/");
			// $row[] = $acc;
			$row[] = $dataDB->nama;
			$row[] = $dataDB->nik;
			$row[] = $dataDB->ket;
			$row[] = $this->m_reff->goField("tr_jenis_test","nama","where kode='".$dataDB->kode_jenis."'");
			$row[] = $this->m_reff->goField("tm_rs","nama","where kode='".$dataDB->kode_tempat."'");
			$row[] = $hasil;
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
 
	function getDataKeluarga(){
		$nik = $this->input->post("val");
		$this->db->where("nik",$nik);
		// $this->db->where("nip_pegawai",$this->m_reff->nip());
		$val = $this->db->get("data_keluarga")->row();
		$nip_pegawai  = isset($val->nip_pegawai)?($val->nip_pegawai):"";

	

		if(!isset($val)){
			$var["token"]=$this->m_reff->getToken();
			$var["status"]=false;
			$var["info"]=false;
			echo json_encode($var);
		}else{
			if($nip_pegawai!=$this->m_reff->nip()){
				$var["status"]=false;
				$var["info"]="<b class='text-black'>Salah memasukan NIK</b>";
				$var["token"]=$this->m_reff->getToken();
				echo json_encode($var);
				return false;
			};
			
			if($val->sts_test==1){ // sedang di test
				$var["status"]=false;
				$var["info"]="<b class='text-black'>Gagal ditambahkan! <br>atas nama ".$val->nama." sudah diajukan untuk tes.</span>";
				$var["token"]=$this->m_reff->getToken();
				echo json_encode($var);
			}else{
				$var["status"]=true;
				$var["tgl_lahir"]=$this->tanggal->ind($val->tgl_lahir,"/");
				$var["data"]=$val;
				$var["token"]=$this->m_reff->getToken();
				echo json_encode($var);
			}
			
		}
	}
 
	function dataExternal(){
		$nik = $this->input->post("val");
		$this->db->where("nik",$nik);
		// $this->db->where("nip_pegawai",$this->m_reff->nip());
		$val = $this->db->get("data_external")->row();
		$nik  = isset($val->nik)?($val->nik):"";

	

		if(!isset($val)){
			$var["token"]=$this->m_reff->getToken();
			$var["status"]=false;
			$var["info"]=false;
			echo json_encode($var);
		}else{
			// if($nik!=$this->m_reff->nip()){
			// 	$var["status"]=false;
			// 	$var["info"]="<b class='text-black'>Salah memasukan NIK</b>";
			// 	$var["token"]=$this->m_reff->getToken();
			// 	echo json_encode($var);
			// 	return false;
			// };
			
			if($val->sts_test==1){ // sedang di test
				$var["status"]=false;
				$var["info"]="<b class='text-black'>Gagal ditambahkan! <br>atas nama ".$val->nama." sudah diajukan untuk tes.</span>";
				$var["token"]=$this->m_reff->getToken();
				echo json_encode($var);
			}else{
				$var["status"]=true;
				//$var["tgl_lahir"]=$this->tanggal->ind($val->tgl_lahir,"/");
				$var["data"]=$val;
				$var["token"]=$this->m_reff->getToken();
				echo json_encode($var);
			}
			
		}
	}




	function getDataPegawaiUntukKeluarga(){
        $data = $this->mdl->getDataPegawai();
        if(!$data){
            $isi= "<br><div style='width:100%' class='alert alert-danger mg-b-0' role='alert'> <button aria-label='Close' class='close' data-dismiss='alert' type='button'> <span aria-hidden='true'>×</span> </button> 
              Data tidak ditemukan !</div>";
        }else{
            $isi ='
			
            ';
            $isi.='<br><div class="alert alert-info">
			<b>Data pegawai:</b><table class="entry" width="100%">
            <tr>
            <td>Nama </td> <td>'.$data->nama.'</td>
            </tr>
           
            <tr>
            <td>Biro </td> <td>'.$data->biro.'</td>
            </tr>
            <tr>
            <td>Bagian </td> <td>'.$data->bagian.'</td>
            </tr>
            <tr>
            <td>Jabatan </td> <td>'.$data->jabatan.'</td>
            </tr>
            <tr>
            <td>No Hp </td> <td>'.$data->no_hp.'</td>
            </tr>
            <tr>
            <td>Email </td> <td>'.$data->email.'</td>
            </tr>
            </table></div><hr>';


        }

		$var["data"]=$isi;
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);

    }







	function getDataExternalEdit(){
        $data = $this->external->getDataexternalEdit();
        if(!$data){
            $isi= "<br><div style='width:100%' class='alert alert-danger mg-b-0' role='alert'> <button aria-label='Close' class='close' data-dismiss='alert' type='button'> <span aria-hidden='true'>×</span> </button> 
              Data tidak ditemukan !</div>";
        }else{
            $isi ='
			
            ';
            $isi.='<br><div class="alert alert-info">
			<b>Data pegawai:</b><table class="entry" width="100%">
            <tr>
            <td>Nama </td> <td>'.$data->nama.'</td>
            </tr>
           
            <tr>
            <td>ket </td> <td>'.$data->ket.'</td>
            </tr>
            
            <tr>
            <td>No Hp </td> <td>'.$data->no_hp.'</td>
            </tr>
            <tr>
            <td>Email </td> <td>'.$data->email.'</td>
            </tr>
            </table></div><hr>';


        }

		$var["data"]=$isi;
		$var["token"]=$this->m_reff->getToken();
		echo json_encode($var);

    }







	function getDataPpnpn()
	{
		$list = $this->ppnpn->get_data();
		$data = array();
		$no = $this->input->post("start");
			if(!$this->input->post("draw")){ echo $this->m_reff->page403(); return false;}
		$no =$no+1;
		foreach ($list as $dataDB) {
		////
		$db	=	$this->db->get_where("data_ppnpn",array("nik"=>$dataDB->nik))->row();

		if($dataDB->konfirm_rs){
			$tombol = "<a class='text-primary' href='".site_url("download")."?f=".$this->m_reff->encrypt("hasil/".$dataDB->file)."'> <i class='fa fa-download' ></i> Download hasil</a>
			";
		}else{
		$tombol='<div aria-label="Basic example" class="btn-groupss" role="group">
		<button onclick="edit(`'.$dataDB->id.'`,`'.$dataDB->nama.'`)" class="btn btn-sm btn-secondary pd-x-25 active" type="button">Edit</button> 
		<button onclick="hapus(`'.$dataDB->id.'`,`'.$dataDB->nik.'`,`'.$dataDB->nama.'`,`'.$dataDB->kode.'`)" class="btn btn-sm btn-danger pd-x-25" type="button">Hapus</button> 
	   </div>';
		}

			
	 if($dataDB->sts_acc==0){
			$acc =  '	<button onclick="edit(`'.$dataDB->id.'`,`1`,`'.$dataDB->nama.'`)" class="btn btn-sm btn-secondary pd-x-25 active" type="button">Belum disetujui</button> ';
	 }else{
		 if($dataDB->hasil){
			$acc = '	<button disabled class="btn btn-sm btn-success pd-x-25 active" type="button">Disetujui</button> ';
		 }else{
			$acc = '	<button onclick="edit(`'.$dataDB->id.'`,`0`,`'.$dataDB->nama.'`)" class="btn btn-sm btn-success pd-x-25 active" type="button">Disetujui</button> ';
		 }
	 }	


	  if($dataDB->hasil=="+"){
		  $hasil = "<span class='badge badge-danger'>positif +</span>";
	  }elseif($dataDB->hasil=="-"){
		  $hasil = "<span class='badge badge-success'>negatif -</span>";
	  }else{
		$hasil = "<span class='badge badge-info'>".$dataDB->hasil."</span>";
	  }
		 
		    
			$row = array();
			// $row[] =  $no++;	
			$row[] = $this->tanggal->hariLengkap3($dataDB->tgl,"/");
			// $row[] = $acc;
			$row[] = $dataDB->nama;
			$row[] = $db->jabatan;
			$row[] = $this->m_reff->goField("tr_jenis_test","nama","where kode='".$dataDB->kode_jenis."'");
			$row[] = $this->m_reff->goField("tm_rs","nama","where kode='".$dataDB->kode_tempat."'");
			$row[] = $hasil;
			$row[] = $tombol;
			 
		  
			$data[] = $row; 
			
			}
			 
		$output = array(
						"draw" => $this->input->post("draw"),
						"recordsTotal" => $c=$this->ppnpn->count(),
						"recordsFiltered" =>$c,
						"data" => $data,
						"token"=>$this->m_reff->getToken()
						);
		//output to json format
		echo json_encode($output);

	}
 
}