<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once('vendor/autoload.php');

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class M_reff extends ci_Model
{
	
	public function __construct() {
		parent::__construct();
		$this->load->library('email');
	}
	
	function nama_resto(){
	    return $this->session->userdata("sender_name");
	}
	function resto(){
	    $this->db->where("sender_number",$this->session->userdata("sender_number"));
	    return $this->db->get("device_stations")->row();
	}
	function nama_depan(){
	    echo "cepi";
	}
	
		function dp_ppnpn(){
	    echo "cepi";
	}
		function dp(){
	    echo "cepi";
	}
		function nama(){
	    echo "cepi";
	}
	
	function gpt($prompt){
	     $dTemperature = 0.9;
                $iMaxTokens = 150;
                $top_p = 1;
                $frequency_penalty = 0.0;
                $presence_penalty = 0.6;
                $OPENAI_API_KEY = "";
                $sModel = "text-davinci-003";
                // $prompt = "aku mau tanya yg lain?";
                $ch = curl_init();
                $headers  = [
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization: Bearer '.$OPENAI_API_KEY.''
                ];
                $postData = [
                    'model' => $sModel,
                    'prompt' => str_replace('"', '', $prompt),
                    'temperature' => $dTemperature,
                    'max_tokens' => $iMaxTokens,
                    'top_p' => $top_p,
                    'frequency_penalty' => $frequency_penalty,
                    'presence_penalty' => $presence_penalty,
                    'stop' => '[" Human:", " AI:"]',
                ];
                 
                 
                curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/completions');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData)); 
                 
                $result = curl_exec($ch);
                $decoded_json = json_decode($result, true);
                 return json_encode($decoded_json);
                return isset($decoded_json['choices'][0]['text'])?($decoded_json['choices'][0]['text']):"_maaf terjadi masalah pada robot kami silahkan coba lagi_";

	}
		function getCekKey(){

			return $this->db->get("device_stations")->row();
		}
		
	function converthp($no){
	    $hp  = str_replace("@c.us","",$no);
	    if(substr($no,0,2)=="62"){
	        return    "0".substr($hp,2,15);
	    }else{
	        return    $hp;
	    }
	    
	}
	function dir($kode)
	 {	 
		$filename=$this->m_reff->pengaturan(5);
		if (!file_exists($filename)) {
			mkdir($this->m_reff->pengaturan(5), 0777); 
		}  
		
		$filename=$this->m_reff->pengaturan(5)."/".$kode;
		if (!file_exists($filename)) {
			mkdir($this->m_reff->pengaturan(5)."/".$kode, 0777); 
		}

// 		$filename=$this->m_reff->pengaturan(5)."/".$kode."/thumbnail";
// 		if (!file_exists($filename)) {
// 			mkdir($this->m_reff->pengaturan(5)."/".$kode."/thumbnail", 0777); 
// 		}
		
		// $filename=$this->m_reff->pengaturan(25)."/files/".$tahun."/".$kode;
		// if (!file_exists($filename)) {
		// 	mkdir($this->m_reff->pengaturan(25)."/files/".$tahun."/".$kode, 0777); 
		// 	mkdir($this->m_reff->pengaturan(25)."/files/".$tahun."/".$kode."/qr", 0777); 
		// 	mkdir($this->m_reff->pengaturan(25)."/files/".$tahun."/".$kode."/file", 0777); 
		// 	mkdir($this->m_reff->pengaturan(25)."/files/".$tahun."/".$kode."/bahan", 0777);  
		// 	mkdir($this->m_reff->pengaturan(25)."/files/".$tahun."/".$kode."/ttd", 0777);  
		// }  
	 }
	function post($param){
		$param = $this->input->post($param);
		return $this->sanitize($param);
	}
  
	function generateKode(){
		$kode = $this->m_reff->acak(10);
		$cek = $this->db->get_where("data_test",array("kode"=>$kode))->num_rows();
		if($cek){
			return $this->generateKode();
		}else{
			return $kode;
		}
	}
	function pic_jk(){
		$cek = $this->db->get_where("tm_pic",array("id"=>$this->session->userdata("id")))->row();
		return isset($cek->jk)?($cek->jk):"l";
	}
	 
	function sanitize($string){
		$string = strip_tags($string);
		return $this->security->xss_clean($string);
	}
	function getToken(){
		return $this->security->get_csrf_hash();
	}
	function jenis_pegawai($i){
		if($i==1){
			return "PNS";
		}elseif($i==2){
			return "PPNPN";
		
		}elseif($i==3){
			return "Petugas taman";
		
		}elseif($i==4){
			return "Cleaning service";
		}else{
			return "-";
		}
	}
	function area(){
		if($this->session->kode_biro){
			echo $this->m_reff->goField("tm_biro","nama","where id='".$this->session->kode_biro."' ");
		}
	}
	function notifikasi($id,$field){
		$this->db->where("id",$id);
		$db = $this->db->get("notifikasi")->row();
		return isset($db->$field)?($db->$field):"";

	}
	function jpegawai(){
		$id = $this->session->userdata("id");
		$this->db->where("id",$id);
		$db = $this->db->get("data_pegawai")->row();
		return $db->jenis_pegawai;
	}
	function peg_id_istana(){
		$id = $this->session->userdata("id");
		$db=$this->db->where("id",$id);
		$db = $this->db->get("data_pegawai")->row();
		return $db->id_istana;
	}
	function peg_kode_biro(){
		$id = $this->session->userdata("id");
		$this->db->where("id",$id);
		$db = $this->db->get("data_pegawai")->row();
		return $db->kode_biro;
	}
	function tokenName(){
		return $this->security->get_csrf_token_name();
	}
	function getDataBiroPositif(){ // nama biro, jml positif
		$q='SELECT biro,count(*) as jml from data_pegawai where hasil_test="+" group by biro order by jml desc';
		return $this->db->query($q)->result();
	}
	function data_pegawai($input){
		$this->db->where("nip",$input);
		$this->db->or_where("nik",$input);
		return $this->db->get("data_pegawai")->row();
	}
	function getDataPegawai($id){
		$this->db->where("id",$id);
		return $this->db->get("data_pegawai")->row();
	}
 
	function nip(){
		$id = $this->session->userdata("id");
		$this->db->where("id",$id);
		$d=$this->db->get("data_pegawai")->row();
		return isset($d->nip)?($d->nip):"";
	}
	function nik(){
		$id = $this->session->userdata("id");
		$this->db->where("id",$id);
		$d=$this->db->get("data_pegawai")->row();
		return isset($d->nik)?($d->nik):"";
	}
	function ai($table){
	    $db=$this->db->query("SHOW TABLE STATUS LIKE '".$table."'")->row();
	    return isset($db->Auto_increment)?($db->Auto_increment):0;
	}
	function peg_jk($id=null){
		if(!$id){
			$id = $this->session->userdata("id");
		}
		
		$this->db->where("id",$id);
		$d=$this->db->get("data_pegawai")->row();
		return isset($d->jk)?($d->jk):"l";
	}
	function akun_opr(){ // kode biro pic
		$id = $this->session->userdata("id");
		$this->db->where("id",$id);
		$d=$this->db->get("data_pegawai")->row();
		return isset($d->akun_opr)?($d->akun_opr):"";
	}
	function mobile()
	{
		$useragent=$_SERVER['HTTP_USER_AGENT'];
		if(preg_match('/(android|bb\d+|meego).+mobile|Android|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4)))
			{ return true;}else{ return false; }

	}
	function dbPegawai()
	{
		$nip	=	$this->session->userdata("nip");
		$this->db->where("niplama",$nip);
		return 		$this->db->get("pegawai")->row();
	}
	function totalMateri($kode)
	{
		$this->db->where("kode_acara",$kode);
		return $this->db->get("data_file")->num_rows();
	}
	function totalTamuBefore($kode,$hadir=null)
	{
		if($hadir){
			$this->db->where("sts_ikutserta",$hadir);
		}
		$this->db->where("hapus",0);
		$this->db->where("kode_acara",$kode);
		return $this->db->get("data_peserta")->num_rows();
	}
	function totalTamuBeforeRakor($kode,$hadir=null)
	{
		if($hadir){
	   //      $this->db->where("sts_ikutserta",$hadir);
		}else{
		// $this->db->where_in("sts_ikutserta",array(2));
		}
	    //  $this->db->where("hapus",0);
		$this->db->where("qr=qr_utama");
		$this->db->where("kode_acara",$kode);
		$this->db->select("SUM(jml_und) as jml");
		return $this->db->get("data_peserta")->row()->jml;
	}
	function totalTamu($kode,$hadir=null)
	{
		if($hadir){
			$this->db->where("sts_kehadiran",$hadir);
		}
		$this->db->where_in("sts_ikutserta",array(2));
		$this->db->where("kode_acara",$kode);
		$this->db->where("hapus",0);
		$this->db->where("j_kehadiran",1);
		return $this->db->get("data_peserta")->num_rows();
	}function totalTamuVicon($kode,$hadir=null)
	{
		if($hadir){
			$this->db->where("sts_kehadiran",$hadir);
		}
		$this->db->where_in("sts_ikutserta",array(2));
		$this->db->where("kode_acara",$kode);
		$this->db->where("hapus",0);
		$this->db->where("nama is not null");
		$this->db->where("j_kehadiran",2);
		return $this->db->get("data_peserta")->num_rows();
	}
	function totalTamuAkanHadir($kode,$hadir=null)
	{
		if($hadir){
			$this->db->where("sts_kehadiran",$hadir);
		}
		$this->db->where_in("sts_ikutserta",array(2));
		$this->db->where("kode_acara",$kode);
		$this->db->where("j_kehadiran",1);
		$this->db->where("hapus",0);
		$this->db->where("nama is not null");
		return $this->db->get("data_peserta")->num_rows();
	}
	function totalTamuAkanHadirVicon($kode,$hadir=null)
	{
		if($hadir){
			$this->db->where("sts_kehadiran",$hadir);
		}
		$this->db->where("nama is not null");
	  // $this->db->where_in("sts_ikutserta",array(2));
		$this->db->where("j_kehadiran",2);
		$this->db->where("kode_acara",$kode);
		$this->db->where("hapus",0);
		return $this->db->get("data_peserta")->num_rows();
	}
	
	function idu()
	{
		return $this->session->userdata("id");
	}
	
	function poto_akun()
	{
		$jk=$this->goField("data_pegawai","jk","where id='".$this->idu()."'");
		if($jk=="l")
		{
			return base_url()."plug/img/l.png";
		}else{
			return base_url()."plug/img/p.png";
		}
	}

	function dataProfilePegawai()
	{
		return $this->db->get_where("data_pegawai",array("id"=>$this->idu()))->row();
	}

	function dataProfileAdmin()
	{
		return $this->db->get_where("admin",array("id_admin"=>$this->idu()))->row();
	}
	function dataRs($id){
		$this->db->where("kode",$id);
		return $this->db->get("tm_rs")->row();
	}
	function goField($tbl,$select,$where=null)
	{
		$select=$this->sanitize($select);
		if($where)
		{	
			//$where = addslashes($where);
			$where=$this->sanitize($where);
			$where=str_replace("where","",$where);
			$where=str_replace("'''","'\''",$where);  
			$this->db->where($where);
		}
		$this->db->select($select); 
		$data=$this->db->get($tbl)->row(); 
		return isset($data->$select)?($data->$select):"";
	}
	function goField2($tbl,$select,$where=null)
	{
		$data=$this->db->query("SELECT $select from $tbl $where ")->row();
		return isset($data->val)?($data->val):"";
	}
	
	function goResult($tbl,$select,$where=null)
	{
		return $data=$this->db->query("SELECT $select from $tbl $where ");  
	}
	function jk($id)
	{
		if($id=="l")
		{
			return "Laki-laki";
		}elseif($id=="p")
		{
			return "Perempuan";
		}
	}

	function tgl_pergantian()
	{
		$data=$this->db->query("select * from tr_tahun_ajaran where sts=1")->row();
		return isset($data->tgl_pindah)?($data->tgl_pindah):"";
	}	

	function zipz($nama_file,$dir,$file)
	{
		$error=true;
		/* nama zipfile yang akan dibuat */
		$zipname = $nama_file.".zip";
		/* proses membuat zip file */
		$zip = new ZipArchive;
		$zip->open($zipname, ZipArchive::CREATE);

          //  foreach ($file as $value) {
		$zip->addFile($dir.$file,$file);
        //    }
		$zip->close();
		/* preses pembuatan zip file selesai disini */

		/* download file jika eksis*/
		if(file_exists($zipname)){
			header('Content-Type: application/zip');
			header('Content-disposition: attachment; 
				filename="'.$zipname.'"');
			header('Content-Length: ' . filesize($zipname));
			readfile($zipname);
			unlink($zipname);

		} else{
			$error = "Proses mengkompresi file gagal  ";
            } //end of if file_exist
            
            return $error;
            
        }

        function zip($zip_file,$dir,$data)
        {


            // Get real path for our folder
        	$rootPath = realpath($dir);

            // Initialize archive object
        	$zip = new ZipArchive();
        	$zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE);

            // Create recursive directory iterator
        	/** @var SplFileInfo[] $files */
        	$files = new RecursiveIteratorIterator(
        		new RecursiveDirectoryIterator($rootPath),
        		RecursiveIteratorIterator::LEAVES_ONLY
        	);

        	foreach ($files as $name => $file)
        	{
                // Skip directories (they would be added automatically)
        		if (!$file->isDir())
        		{
                    // Get real and relative path for current file
        			$filePath = $file->getRealPath();
        			$relativePath = substr($filePath, strlen($rootPath) + 1);

                    // Add current file to archive
        			$polder=substr($relativePath,0,6);
        			if (in_array($polder, $data)) {
        				$zip->addFile($filePath, $relativePath);
        			}  



        		}
        	}

            // Zip archive will be created only after closing object
        	$zip->close();


        	header('Content-Description: File Transfer');
        	header('Content-Type: application/octet-stream');
        	header('Content-Disposition: attachment; filename='.basename($zip_file));
        	header('Content-Transfer-Encoding: binary');
        	header('Expires: 0');
        	header('Cache-Control: must-revalidate');
        	header('Pragma: public');
        	header('Content-Length: ' . filesize($zip_file));
        	readfile($zip_file);


        }

        function setToken()
        {
        	$code=substr(str_shuffle("123aYbCdEfGhIj0K0opqrStUvwXyZ4567809"),0,25); $this->session->set_userdata("token",$code); 
        	echo '<input type="hidden" name="token" value="'.$this->session->userdata("token").'">';
        }
        function cekToken()
        {
        	$token_post=$this->input->post("token");
        	$token_server=$this->session->userdata("token");

        	if($token_post==$token_server)
        	{
        		return true;
        	}else{
        		return false;
        	}

        }
	function hapussemua($src){ //nama folder
		if(file_exists($src)){
			$dir = opendir($src);
			while(false !== ( $file = readdir($dir)) ) {
				if (( $file != '.' ) && ( $file != '..' )) {
					$full = $src . '/' . $file;
					if ( is_dir($full) ) {
						hapussemua($full);
					}
					else {
						unlink($full);
					}
				}
			}
			closedir($dir);
			rmdir($src);
		}
	}
	function hapus_file($nama_file) //full path
	{
		$filename = $nama_file;

		if (file_exists($filename)) {
			unlink($nama_file);
		}  
		return true;
	}
	function hapus_materi($ray)
	{
		foreach($ray as $val)
		{
			$qr=$this->m_reff->goField("data_peserta","qr","where id='".$val."' ");
			$this->db->where("kode_qr",$qr);
			$this->db->delete("data_file"); 
		}
		return true;
		
	}
	







	function allowedfile($tempfile, $destpath) {
		$ALLOWED_FILEEXT = array('pdf', 'doc', 'docx' ,'jpeg', 'jpg','png','xls','xlsx','zip','rar','mp4' );
		$ALLOWED_MIME = array(
			'image/jpeg',
			'image/png',
			'video/mp4',
			'application/xlsx', 
			'application/zip', 
			'application/rar', 
			'application/pdf', 
			'application/msword', 
			'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
			'application/vnd.openxmlformats-officedocument.presentationml.presentation', 
			'application/vnd.openxmlformats-officedocument.wordprocessingml.document');

		$file_ext = pathinfo($destpath, PATHINFO_EXTENSION);
		$file_mime = mime_content_type($tempfile);
		$valid_extn = in_array($file_ext, $ALLOWED_FILEEXT);
		$valid_mime = in_array($file_mime, $ALLOWED_MIME);
		$allowed_file = $valid_extn && $valid_mime;
		return $allowed_file;
	}	
	
	
	function upload_file($form,$dok,$nama_file_awal, $type_file_yg_diizinkan,$sizeFile="3000000",$before_file=null)
	{		
	    
		$var=array();
		$var["size"]=true; 
		$var["file"]=true;
		$var["validasi"]=false; 
		$nama_file_awal=preg_replace('/[^A-Za-z0-9\ ]/', "",$nama_file_awal);
		$nama_file_awal=str_replace(' ', "-",$nama_file_awal);
		$nama=$nama_file_awal."___".date("dmYHis");
		$lokasi_file = $_FILES[$form]['tmp_name'];
		$tipe_file   = $_FILES[$form]['type'];
		$nama_file   = $_FILES[$form]['name'];
		$size  	   = $_FILES[$form]['size'];

		$type_file_yg_diupload =substr(strrchr($nama_file, '.'), 1);
		$nama=$nama.".".$type_file_yg_diupload;
		$target_path = $dok."/".$nama;

		$extention=$type_file_yg_diupload;
		$var["maxsize"]=substr($sizeFile,0,-6); 

		$mime_content_type	= $this->allowedfile($lokasi_file, $nama_file);
		$var['type'] = $extention;
		$pos = strpos(strtoupper($type_file_yg_diizinkan), strtoupper($extention));
		if (!$mime_content_type or $pos===false) {
			$var["validasi"]=false;
			$var["info"]="Type file tidak diizinkan.";
			return $var;
		}


		$maxsize =$sizeFile;
		if($size>=$maxsize)
		{
			$var["size"]=false; 
			$var["validasi"]=false;
			$var["info"]="Kapasitas file terlalu besar untuk diupload";
			return $var;
		}else{
			if($before_file!=null)
			{
				$filename=$dok."/".$before_file;
				if (file_exists($filename)) {
					unlink($filename);
				} 
			}				

                $jenis = preg_match("'^(.*)\.(gif|jpe?g|png)$'i", $nama, $ext); 
				$jenis = strtolower(isset($ext[2])?($ext[2]):null);
				if($jenis=='jpg' or $jenis=='jpeg' or $jenis=='png' or $jenis=='gif'){
					$var["jenis"]="image";
				}elseif($jenis=='mp4' or $jenis=='mov'){
					$var["jenis"]="video";
				}else{
				    $var["jenis"]="file";
				}

			$var["validasi"]=true;
			if (!empty($lokasi_file)) {
			    	$target_path = $dok."/".$nama;
			    //	$this->saveThumbnail($target_path, $lokasi_file, $nama, 500, 500);
				 move_uploaded_file($lokasi_file,$target_path);
			}
			$var["name"]=$nama;
		}
		return $var;
	}
	
	function saveThumbnail($saveToDir, $imagePath, $imageName, $max_x, $max_y) {
		preg_match("'^(.*)\.(gif|jpe?g|png)$'i", $imageName, $ext);
		switch (strtolower($ext[2])) {
			case 'jpg' :
			case 'jpeg': $im   = imagecreatefromjpeg($imagePath);
						 break;
			case 'gif' : $im   = imagecreatefromgif($imagePath);
						 break;
			case 'png' : $im   = imagecreatefrompng($imagePath);
						 break;
			default    : $stop = true;
						 break;
		}
	   
		 if (!isset($stop)) {
			$x = imagesx($im);
			$y = imagesy($im);
	   
			if (($max_x/$max_y) < ($x/$y)) {
				$save = imagecreatetruecolor($x/($x/$max_x), $y/($x/$max_x));
			}
			else {
				$save = imagecreatetruecolor($x/($y/$max_y), $y/($y/$max_y));
			}
			imagecopyresized($save, $im, 0, 0, 0, 0, imagesx($save), imagesy($save), $x, $y);
		   
			// imagegif($save, "{$saveToDir}");
			imagepng($save, "{$saveToDir}");
			imagedestroy($im);
			imagedestroy($save);
		}
	}
		 




	function pengaturan($id)
	{
		$return=$this->db->get_where("pengaturan",array("id"=>$id))->row();
		return $return->val;
	}
	
	function deleteElement($element,  &$array){
		$index = array_search($element, $array);
		if($index !== false){
			unset($array[$index]);
		}
	}
	
	function  getCode()
	{
		$kode=substr(str_shuffle("123456789ABCDEFGHIJKLMNPQRSTUVWXYZ"),0,5);
		$cek=$this->db->get_where("data_acara",array("kode"=>$kode))->num_rows();
		if($cek)
		{
			return $this->getCode();
		}else{
			return $kode;
		}
	}

	function  getCodeTamu($kode)
	{
		$c=$this->m_reff->goField("data_acara","count_peserta","where kode='".$kode."' ");
		if(!$c){ $c=1;}else{ $c=$c+1;}
		$c=sprintf("%03s",$c);

		$this->db->where("kode",$kode);
		$this->db->set("count_peserta",$c);
		$this->db->update("data_acara");		
		$acak=substr(str_shuffle("ABCDEFGHIJKLMNPQRSTUVWXYZ"),0,2);
		return $kode."-".$acak.$c;
		

	}
	function hapus_qr($qr)
	{
		$pecah=explode("-",$qr); 
		echo $filename="qr/".$qr.".png";
		if (file_exists($filename)) {
			unlink($filename);  
		}  
	}
	
	function targetPath($kode,$polder)
	{
		$this->db->select("YEAR(tgl) as tahun");	
		$db=$this->db->get_where("data_acara",array("kode"=>$kode))->row();
		$thn=isset($db->tahun)?($db->tahun):"";
		return $this->m_reff->pengaturan(25)."/files/".$thn."/".$kode."/".$polder;
	}
	
	function direktori($sn)
	{	 
		$filename="file_upload";
		if (!file_exists($filename)) {
			mkdir("/file_upload", 0777); 
		}  
		
		$filename="file_upload/".$sn;
		if (!file_exists($filename)) {
			mkdir("file_upload/".$sn, 0777); 
		}  
		return "file_upload/".$sn;
	}


	function qr($id,$data=null)
	{	
	    if(!$data){$data=$id;}
// 		$tahun	=	$this->m_reff->goField2("data_acara","YEAR(tgl) as val","where kode='".$kode_acara."' "); 
// 		$filename=$this->m_reff->pengaturan(25);
// 		$this->direktori($tahun,$kode_acara);  
		if($id){
			$this->load->library('ciqrcode');
			$params['data'] = $data;
			$params['level'] = 'H';
			$params['size'] = 10;
			$params['savename'] = "qr/".$id.".png";
			return	$this->ciqrcode->generate($params);
		}
	}
	function amankan2($car)
	{	  
		$car	= 	trim($car);
		$car	=	str_replace("<p>","<br>- ",$car);
		$car	=	str_replace("</p>","",$car);
		$br	=	substr($car,0,4);

		if($br=="<br>"){
			$car=trim(substr($car,4));
		}

		$car	= 	trim($car);


		$end4	=	trim(substr(trim($car),-4)); 
		$end5	=	trim(substr(trim($car),-5)); 
		$end6	=	trim(substr(trim($car),-6)); 

		if(strpos($end4,"<br>")!==false){
			$j=strlen($car);
			$car=substr($car,0,($j-4));
		}elseif(strpos($end5,"<br>")!==false){
			$j=strlen($car);
			$car=substr($car,0,($j-5));
		}elseif(strpos($end6,"<br>")!==false){
			$j=strlen($car);
			$car=substr($car,0,($j-6));
		}


		return trim($car);
	} function amankan($car)
	{	  
		$car	= 	trim($car);
		$car	=	str_replace("<p>","<br>",$car);
		$car	=	str_replace("</p>","",$car);
		$br	=	substr($car,0,4);

		if($br=="<br>"){
			$car=trim(substr($car,4));
		}

		$car	= 	trim($car);


		$end4	=	trim(substr(trim($car),-4)); 
		$end5	=	trim(substr(trim($car),-5)); 
		$end6	=	trim(substr(trim($car),-6)); 

		if(strpos($end4,"<br>")!==false){
			$j=strlen($car);
			$car=substr($car,0,($j-4));
		}elseif(strpos($end5,"<br>")!==false){
			$j=strlen($car);
			$car=substr($car,0,($j-5));
		}elseif(strpos($end6,"<br>")!==false){
			$j=strlen($car);
			$car=substr($car,0,($j-6));
		}


		return trim($car);
	}
	function gocara($id, $field)
	{
		$this->db->select($field);
		$this->db->where("id",$id);
		$db=$this->db->get("tr_jenis_undangan")->row();
		return isset($db->$field)?($db->$field):"";
	}
	function clearkoma($data)
	{
		if(substr($data,0,1)==",")
		{
			$data=substr($data,1);
		}
		
		if(substr($data,-1)==",")
		{
			$data=substr($data,0,-1);
		}
		
		
		
		return $data;
	}
	
	
	function clearkomaray($data)
	{
		$data=$this->clearkoma($data);
		return explode(",",$data);
	}
	function configEmail()
	{	 
		$user=$this->pengaturan(20);
		$pass=$this->pengaturan(21);
		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.googlemail.com',
			'smtp_port' => 465,
			'smtp_user' => $user,
			'smtp_pass' => $pass,
			'mailtype'  => 'html',
			'charset'   => 'iso-8859-1',
			'wordwrap'  => TRUE,
		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->set_header('MIME-Version', '1.0; charset=utf-8');
		$this->email->set_header('Content-type', 'text/html');

	}
	
	public function kirimEmail($data)
	// public function kirimEmail($femail,$fsubject,$fmessage,$path=null,$namaFile=null,$delfile=null)
	{  	
		//$var["sts"]="ok";
		//	return $var;

	$femail		=	isset($data["email"])?($data["email"]):null;
	$fsubject	=	isset($data["subject"])?($data["subject"]):null;
	$fmessage	=	isset($data["msg"])?($data["msg"]):null;
	$path		=	isset($data["path"])?($data["path"]):null;
	$namaFile	=	isset($data["namaFile"])?($data["namaFile"]):null;

	$fsubject	=	str_replace("<br>"," ",$fsubject);
	$fsubject	=	str_replace("<br/>"," ",$fsubject);
	$fsubject	=	strip_tags($fsubject); 
	$fsubject	=	str_replace("&nbsp;"," ",$fsubject);
	$fsubject	=	strtolower($fsubject);
	$jml		=	strlen($fsubject);
	if($jml>34)
	{
		$fsubject=substr($fsubject,0,34)."...";
	} 

	try {
		$connection = new AMQPStreamConnection(AMQP_HOST, AMQP_PORT, AMQP_USER, AMQP_PASSWORD);
		$channel = $connection->channel();

		$channel->queue_declare(AMQP_QUEUE_NAME, false, true, false, false);

		if($path){
			$path=DOWNLOAD_URL . $this->m_reff->encrypt($path);
		}

		$dataArray = array(
			'from' => $this->pengaturan(19),
			'to' => $femail,
			'subject' => $fsubject,
			'file_url' => $path,
			'file_name' => $namaFile,
			'body' => $fmessage		        
		);

		$data = json_encode($dataArray, JSON_UNESCAPED_SLASHES);

		$msg = new AMQPMessage(
			$data,
			array('delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT)
		);

		$channel->basic_publish($msg, '', AMQP_QUEUE_NAME);

		$channel->close();
		$connection->close();
	} catch (Exception $e) {
		$var["sts"]="Fail: " . $e->getMessage();
		return $var;		
	}

	$var["sts"]="ok";
	return $var;
}



/*	public function kirimEmail($femail,$fsubject,$fmessage,$path=null,$namaFile=null,$delfile=null)
	{   
	    return $this->sendEmail($femail,$fsubject,$fmessage,$path,$namaFile,$delfile);
	    
	}
		
	function sendEmail($femail,$fsubject,$fmessage,$path,$namaFile,$delfile){
	    $user=$this->pengaturan(20);
		$pass=$this->pengaturan(21);
		$from=$this->pengaturan(19);
		$host=$this->pengaturan(5);
		$port=$this->pengaturan(8);
		$smptScure=$this->pengaturan(9);
        $this->load->library('PHPMailer_load'); //Load Library PHPMailer
        $mail = $this->phpmailer_load->load(); // Mendefinisikan Variabel Mail
       
       
        $mail->setFrom($from, $fsubject); // Sumber email
        $mail->addAddress($femail,$fsubject); // Masukkan alamat email dari variabel $email
        $mail->Subject = $fsubject; // Subjek Email
        $mail->msgHtml($fmessage); // Isi email dengan format HTML
        $mail->isHTML(true);
     	if(file_exists($path)){
          $mail->addAttachment($path,$namaFile);
     	}  
       
       
       
        $mail->CharSet  = "UTF-8";
        $mail->Host = $host; // Host dari server SMTP
       // $mail->isSMTP();  // Mengirim menggunakan protokol SMTP
        $mail->Port = $port;
        $mail->SMTPAuth = true; // Autentikasi SMTP
        $mail->Username = $user;
        $mail->Password = $pass;
        $mail->SMTPSecure = $smptScure;
         $mail->SMTPOptions      = array(
                                        ''.$smptScure.'' => array(
                                            'verify_peer' => false,
                                            'verify_peer_name' => false,
                                            'allow_self_signed' => true
                                        )
                                    );
       
        
        if (!$mail->send()) {
                    $var["sts"]="Mailer Error: " . $mail->ErrorInfo;
                  
                } else {
                   $var["sts"]="ok";
                    if($path && file_exists($path) && $delfile){
                        unlink($path);
                    }
                } // Kirim email dengan cek kondisi
                
       
       
       
                  return $var;
              }*/


              function kirimWa($phone,$msg,$dok=null)
              {
              	if($dok){
              		$link  =  $this->pengaturan(10);
              		$data = [
              			'phone' => $phone,
              			'caption' => $msg,
              			'document' =>$dok,
              		];
              	}else{
              		$link  =  $this->pengaturan(3);
              		$data = [
              			'phone' => $phone,
              			'message' => $msg,
              		];
              	}

              	$curl = curl_init();
              	$token =  $this->pengaturan(4);



              	curl_setopt($curl, CURLOPT_HTTPHEADER,
              		array(
              			"Authorization:".$token,
              		)
              	);
              	curl_setopt($curl, CURLOPT_URL, $link);
              	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
              	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
              	curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data)); 
              	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
              	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
              	$result = curl_exec($curl);
              	curl_close($curl); 
              	return $result;

              }

              function kirimSms($phone,$msg)
              {
              	return false;  
              	$curl = curl_init();
              	$token =  $this->tm_pengaturan(12);
              	$link  =  $this->tm_pengaturan(11);
              	$data = [
              		'phone' => $phone,
              		'message' => $msg,
              	];

              	curl_setopt($curl, CURLOPT_HTTPHEADER,
              		array(
              			"Authorization: $token",
              		)
              	);
              	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
              	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
              	curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
              	curl_setopt($curl, CURLOPT_URL, $link);
              	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
              	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
              	$result = curl_exec($curl);
              	curl_close($curl); 
              	return $result;

              }
              function convert_wa($isi)
              {
              	$rep=str_replace("<strong>","_*",$isi);
              	$rep=str_replace("</strong>","*_",$rep);
              	$rep=str_replace("<br />","&#92;",$rep);
              	$rep=str_replace("<br/>","&#92;",$rep);
              	$rep=strip_tags($rep);
              	return $rep;
              }

              function isiWAPolos($data,$data_acara,$isi=null)
              {
              	$base_url		=	$this->m_reff->pengaturan(1); 	

              	$nama			=	isset($data->nama)?($data->nama):"";
              	$jabatan		=	isset($data->jabatan)?($data->jabatan):"";
              	$instansi		=	isset($data->instansi)?($data->instansi):"";
              	$hp				=	isset($data->hp)?($data->hp):"";
              	$email			=	isset($data->email)?($data->email):"";
              	$qr_utama		=	isset($data->qr_utama)?($data->qr_utama):"";
              	$link_join		=	isset($data->link_join)?($data->link_join):"Belum tersedia.";


              	$agenda				=	isset($data_acara->agenda)?($data_acara->agenda):"";
              	$tempat				=	isset($data_acara->tempat)?($data_acara->tempat):"";
              	$tgl_pelaksanaan	=	isset($data_acara->tgl)?($data_acara->tgl):"";
              	$tgl_pelaksanaan	=	$this->tanggal->hariLengkap3($tgl_pelaksanaan);
              	$jam_pelaksanaan	=	isset($data_acara->jam)?($data_acara->jam):"";
              	$jam_pelaksanaan	=	isset($data_acara->jam)?($data_acara->jam):"";

              	$isi				=	$this->m_reff->convert_wa($isi); 
              	$isi				=	str_replace("{nama}",$nama,$isi);
              	$isi				=	str_replace("{jabatan}",$jabatan,$isi);
              	$isi				=	str_replace("{agenda}",$agenda,$isi);
              	$isi				=	str_replace("{instansi}",$instansi,$isi);
              	$isi				=	str_replace("{hp}",$hp,$isi);
              	$isi				=	str_replace("{email}",$email,$isi);
              	$isi				=	str_replace("{tempat}",$tempat,$isi);
              	$isi				=	str_replace("{tgl}",$tgl_pelaksanaan,$isi);
              	$isi				=	str_replace("{jam}",$jam_pelaksanaan,$isi);
              	$link 				=   $base_url."/confirm?id=".$qr_utama;
              	$isi				=	str_replace("{link}",$link,$isi); 
              	$isi				=	str_replace("{link_join}",$link_join,$isi); 

              	return $isi;
              }
              function isiWA($data,$kode,$type=null)
              {
              	$base_url		=	$this->m_reff->pengaturan(1); 	
              	$type			=	str_replace("email","wa",$type);
              	$nama			=	isset($data->nama)?($data->nama):"";
              	$jabatan		=	isset($data->jabatan)?($data->jabatan):"";
              	$instansi		=	isset($data->instansi)?($data->instansi):"";
              	$hp				=	isset($data->hp)?($data->hp):"";
              	$email			=	isset($data->email)?($data->email):"";
              	$qr_utama		=	isset($data->qr_utama)?($data->qr_utama):"";
              	$link_join		=	isset($data->link_join)?($data->link_join):"Belum tersedia.";
              	$data_acara			=	$this->db->get_where("data_acara",array("kode"=>$kode))->row();
              	$agenda				=	isset($data_acara->agenda)?($data_acara->agenda):"";
              	$tempat				=	isset($data_acara->tempat)?($data_acara->tempat):"";
              	$tgl_pelaksanaan	=	isset($data_acara->tgl)?($data_acara->tgl):"";
              	$tgl_pelaksanaan	=	$this->tanggal->hariLengkap3($tgl_pelaksanaan);
              	$jam_pelaksanaan	=	isset($data_acara->jam)?($data_acara->jam):"";
              	$jam_pelaksanaan	=	isset($data_acara->jam)?($data_acara->jam):"";

              	$isi				=	$this->m_reff->convert_wa(isset($data_acara->$type)?($data_acara->$type):""); 
              	$isi				=	str_replace("{nama}",$nama,$isi);
              	$isi				=	str_replace("{jabatan}",$jabatan,$isi);
              	$isi				=	str_replace("{agenda}",$agenda,$isi);
              	$isi				=	str_replace("{instansi}",$instansi,$isi);
              	$isi				=	str_replace("{hp}",$hp,$isi);
              	$isi				=	str_replace("{email}",$email,$isi);
              	$isi				=	str_replace("{tempat}",$tempat,$isi);
              	$isi				=	str_replace("{tgl}",$tgl_pelaksanaan,$isi);
              	$isi				=	str_replace("{jam}",$jam_pelaksanaan,$isi);
              	$link 				=   $base_url."/confirm?id=".$qr_utama;
              	$isi				=	str_replace("{link}",$link,$isi); 
              	$isi				=	str_replace("{link_join}",$link_join,$isi); 

              	return $isi;
              }

              function isiEmail($data,$kode,$type=null)
              {
              	$base_url		=	$this->m_reff->pengaturan(1); 
              	$nama			=	isset($data->nama)?($data->nama):"";
              	$jabatan		=	isset($data->jabatan)?($data->jabatan):"";
              	$instansi		=	isset($data->instansi)?($data->instansi):"";
              	$hp				=	isset($data->hp)?($data->hp):"";
              	$email			=	isset($data->email)?($data->email):"";
              	$qr_utama		=	isset($data->qr_utama)?($data->qr_utama):"";
              	$link_join		=	isset($data->link_join)?($data->link_join):"#tidak_tersedia!";

              	$data_acara			=	$this->db->get_where("data_acara",array("kode"=>$kode))->row();
              	$agenda				=	isset($data_acara->agenda)?($data_acara->agenda):"";
              	$tempat				=	isset($data_acara->tempat)?($data_acara->tempat):"";
              	$tgl_pelaksanaan	=	isset($data_acara->tgl)?($data_acara->tgl):"";
              	$tgl_pelaksanaan	=	$this->tanggal->hariLengkap3($tgl_pelaksanaan);
              	$jam_pelaksanaan	=	isset($data_acara->jam)?($data_acara->jam):"";
              	$isi				=	isset($data_acara->$type)?($data_acara->$type):"";
              	$isi				=	str_replace("&nbsp;"," ",$isi);

              	$isi	=	str_replace("(link)","<a href='".$link_join."'>",$isi);
              	$isi	=	str_replace("(unlink)","</a>",$isi);
              	$isi=str_replace("{link_join}","<a href='".$link_join."'>".$link_join."</a>",$isi);
              	$isi=str_replace("{nama}",$nama,$isi);
              	$isi=str_replace("{jabatan}",$jabatan,$isi);
              	$isi=str_replace("{agenda}",$agenda,$isi);
              	$isi=str_replace("{instansi}",$instansi,$isi);
              	$isi=str_replace("{hp}",$hp,$isi);
              	$isi=str_replace("{email}",$email,$isi);
              	$isi=str_replace("{tempat}",$tempat,$isi);
              	$isi=str_replace("{tgl}",$tgl_pelaksanaan,$isi);
              	$isi=str_replace("{jam}",$jam_pelaksanaan,$isi);
              	$link =  "<a href='".$base_url."/confirm?id=".$qr_utama."'>Klik disini</a>";
              	$isi=str_replace("{link}",$link,$isi); 
              	$namatombol="KONFIRMASI KEHADIRAN";
              	$isi=$this->m_konfig->templateEmailConfirm($isi,$qr_utama,$namatombol);
              	return $isi;
              }

              function isiEmailBanner($data,$kode,$isi,$data_acara)
              {



              	$base_url		=	$this->m_reff->pengaturan(1); 
              	$nama			=	isset($data->nama)?($data->nama):"";
              	$jabatan		=	isset($data->jabatan)?($data->jabatan):"";
              	$instansi		=	isset($data->instansi)?($data->instansi):"";
              	$hp				=	isset($data->hp)?($data->hp):"";
              	$email			=	isset($data->email)?($data->email):"";
              	$qr_utama		=	isset($data->qr_utama)?($data->qr_utama):"";
              	$link_join		=	isset($data->link_join)?($data->link_join):"#tidak_tersedia!";

	//$data_acara			=	$this->db->get_where("data_acara",array("kode"=>$kode))->row();
              	$agenda				=	isset($data_acara->agenda)?($data_acara->agenda):"";
              	$tempat				=	isset($data_acara->tempat)?($data_acara->tempat):"";
              	$tgl_pelaksanaan	=	isset($data_acara->tgl)?($data_acara->tgl):"";
              	$tgl_pelaksanaan	=	$this->tanggal->hariLengkap3($tgl_pelaksanaan);
              	$jam_pelaksanaan	=	isset($data_acara->jam)?($data_acara->jam):"";
              	$banner				=	isset($data_acara->banner_email)?($data_acara->banner_email):"";

              	if($banner){
              		$dok 	=	$this->m_reff->targetPath($kode,"file");
              		$src	=	$this->konversi->img(realpath($dok."/".$banner));
              		$banner	=	' <img src="'.$src.'"/> <br> ';
              	}


	 // $isi				=	isset($data_acara->$type)?($data_acara->$type):"";


              	$isi	=	str_replace("(link)","<a href='".$link_join."'>",$isi);
              	$isi	=	str_replace("(unlink)","</a>",$isi);
              	$isi=str_replace("{link_join}","<a href='".$link_join."'>".$link_join."</a>",$isi);
              	$isi=str_replace("{nama}",$nama,$isi);
              	$isi=str_replace("{jabatan}",$jabatan,$isi);
              	$isi=str_replace("{agenda}",$agenda,$isi);
              	$isi=str_replace("{instansi}",$instansi,$isi);
              	$isi=str_replace("{hp}",$hp,$isi);
              	$isi=str_replace("{email}",$email,$isi);
              	$isi=str_replace("{tempat}",$tempat,$isi);
              	$isi=str_replace("{tgl}",$tgl_pelaksanaan,$isi);
              	$isi=str_replace("{jam}",$jam_pelaksanaan,$isi);
              	$link =  "<a href='".$base_url."/confirm?id=".$qr_utama."'>Klik disini</a>";
              	$isi=str_replace("{link}",$link,$isi); 
	  // $namatombol="KONFIRMASI KEHADIRAN";
	  // $isi=$this->m_konfig->templateEmailConfirm($isi,$qr_utama,$namatombol);
              	return $banner.$isi;
              }

              function isiEmailPolos($data,$kode,$isi,$data_acara)
              {

              	$base_url		=	$this->m_reff->pengaturan(1); 
              	$nama			=	isset($data->nama)?($data->nama):"";
              	$jabatan		=	isset($data->jabatan)?($data->jabatan):"";
              	$instansi		=	isset($data->instansi)?($data->instansi):"";
              	$hp				=	isset($data->hp)?($data->hp):"";
              	$email			=	isset($data->email)?($data->email):"";
              	$qr_utama		=	isset($data->qr_utama)?($data->qr_utama):"";
              	$link_join		=	isset($data->link_join)?($data->link_join):"#tidak_tersedia!";


              	$agenda				=	isset($data_acara->agenda)?($data_acara->agenda):"";
              	$tempat				=	isset($data_acara->tempat)?($data_acara->tempat):"";
              	$tgl_pelaksanaan	=	isset($data_acara->tgl)?($data_acara->tgl):"";
              	$tgl_pelaksanaan	=	$this->tanggal->hariLengkap3($tgl_pelaksanaan);
              	$jam_pelaksanaan	=	isset($data_acara->jam)?($data_acara->jam):"";


              	$isi	=	str_replace("(link)","<a href='".$link_join."'>",$isi);
              	$isi	=	str_replace("(unlink)","</a>",$isi);
              	$isi=str_replace("{link_join}","<a href='".$link_join."'>".$link_join."</a>",$isi);
              	$isi=str_replace("{nama}",$nama,$isi);
              	$isi=str_replace("{jabatan}",$jabatan,$isi);
              	$isi=str_replace("{agenda}",$agenda,$isi);
              	$isi=str_replace("{instansi}",$instansi,$isi);
              	$isi=str_replace("{hp}",$hp,$isi);
              	$isi=str_replace("{email}",$email,$isi);
              	$isi=str_replace("{tempat}",$tempat,$isi);
              	$isi=str_replace("{tgl}",$tgl_pelaksanaan,$isi);
              	$isi=str_replace("{jam}",$jam_pelaksanaan,$isi);
              	$link =  "<a href='".$base_url."/confirm?id=".$qr_utama."'>Klik disini</a>";
              	$isi=str_replace("{link}",$link,$isi); 

              	return $isi;
              }

              function isiEmailGlobal($data,$kode,$isi)
              {
              	$base_url		=	$this->m_reff->pengaturan(1); 
              	$nama			=	isset($data->nama)?($data->nama):"";
              	$jabatan		=	isset($data->jabatan)?($data->jabatan):"";
              	$instansi		=	isset($data->instansi)?($data->instansi):"";
              	$hp				=	isset($data->hp)?($data->hp):"";
              	$email			=	isset($data->email)?($data->email):"";
              	$qr_utama		=	isset($data->qr_utama)?($data->qr_utama):"";
              	$link_join		=	isset($data->link_join)?($data->link_join):"javascript:alert('terjadi kesalahan mohon hubungi panitia penyelenggara')";

              	$data_acara			=	$this->db->get_where("data_acara",array("kode"=>$kode))->row();
              	$agenda				=	isset($data_acara->agenda)?($data_acara->agenda):"";
              	$tempat				=	isset($data_acara->tempat)?($data_acara->tempat):"";
              	$tgl_pelaksanaan	=	isset($data_acara->tgl)?($data_acara->tgl):"";
              	$tgl_pelaksanaan	=	$this->tanggal->hariLengkap3($tgl_pelaksanaan);
              	$jam_pelaksanaan	=	isset($data_acara->jam)?($data_acara->jam):"";
	//$isi				=	isset($data_acara->$type)?($data_acara->$type):"";

              	$isi	=	str_replace("(link)","<a href='".$link_join."'>",$isi);
              	$isi	=	str_replace("(unlink)","</a>",$isi);
              	$isi=str_replace("{nama}",$nama,$isi);
              	$isi=str_replace("{jabatan}",$jabatan,$isi);
              	$isi=str_replace("{agenda}",$agenda,$isi);
              	$isi=str_replace("{instansi}",$instansi,$isi);
              	$isi=str_replace("{hp}",$hp,$isi);
              	$isi=str_replace("{email}",$email,$isi);
              	$isi=str_replace("{tempat}",$tempat,$isi);
              	$isi=str_replace("{tgl}",$tgl_pelaksanaan,$isi);
              	$isi=str_replace("{jam}",$jam_pelaksanaan,$isi);
              	$link =  "<a href='".$base_url."/confirm?id=".$qr_utama."'>Klik disini</a>";
              	$isi=str_replace("{link}",$link,$isi);
              	$namatombol="KONFIRMASI KEHADIRAN";
              	$isi=$this->m_konfig->templateEmailConfirm($isi,$qr_utama,$namatombol);
              	return $isi;
              }


              function encrypt($string)
              { 

              	$string = $this->encryption->encrypt($string); 
              	$string=str_replace("+",".",$string);
              	$string=str_replace("=","-",$string);
              	$string=str_replace("/","~",$string); 
              	return $string;
              }


              function decrypt($string)
              {
              	$string=str_replace(".","+",$string);
              	$string=str_replace("-","=",$string);
              	$string=str_replace("~","/",$string); 
              	$ret = $this->encryption->decrypt($string); 
              	return $ret;
              }
              function page403()
              {
              	$this->load->view("403.html");
              }function page404()
              {
              	$this->load->view("404.html");
              }function page405()
              {
              	$this->load->view("405.html");
              }

              function insertKontak($form=null,$poto=null)
              {
              	$id_group	=	$this->m_reff->goField("data_group","id","where LOWER(nama)='lainnya'");
              	if(isset($id_group))
              	{
              		$nama		=	isset($form['nama'])?($form['nama']):"";
              		$jabatan	=	isset($form['jabatan'])?($form['jabatan']):"";
              		$instansi	=	isset($form['instansi'])?($form['instansi']):"";
              		$hp			=	isset($form['hp'])?($form['hp']):"";
              		$email		=	isset($form['email'])?($form['email']):"";


					//	$this->db->where("id_group",$id_group);
              		$query=array( 
              			"hp"=>$hp, 
              			"email"=>$email
              		);
              		$this->db->group_start()
              		->or_like($query)
              		->group_end();
              		$cek		=	$this->db->get("data_kontak")->row();

              		if($poto){
              			$this->db->set("poto",$poto);
              		}

              		$this->db->set("nama",$nama);
              		$this->db->set("jabatan",$jabatan);
              		$this->db->set("instansi",$instansi);
              		$this->db->set("hp",$hp);
              		$this->db->set("email",$email);


              		if($cek)
              		{							
				 //  $this->db->where("id",$cek->id);
              			$this->db->where("hp",$hp);
              			$this->db->where("email",$email);
              			return $this->db->update("data_kontak");
              		}else{
              			$this->db->set("id_group",$id_group);
              			return $this->db->insert("data_kontak");
              		}


              	}	return true;

              }


              function get_id_zoom_akun($meetingId)
              {
              	$this->db->where("kode",$meetingId);
              	$return	 =	$this->db->get("zoom_room")->row();
              	return isset($return->id_akun)?($return->id_akun):"";
              }
              function zoom_event($meetingId)
              {
              	$this->db->where("kode",$meetingId);
              	return	 $this->db->get("zoom_room")->row();
              }
              function zoom_akun($id_akun)
              {
              	$this->db->where("id",$id_akun);
              	return	 $this->db->get("zoom_akun")->row();
              }
              function clearhasray($data)
              {

              	$data=$this->clearhas($data);
              	return explode("|",$data);
              }
              function clearhas($data)
              {
              	if(substr($data,0,1)=="|")
              	{
              		$data=substr($data,1);
              	}

              	if(substr($data,-1)=="|")
              	{
              		$data=substr($data,0,-1);
              	}


              	$data=str_replace("||","|",$data);
              	return $data;
              }

              function acak($jml=2)
              {
              	$karakter = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
              	$shuffle  = substr(str_shuffle($karakter),0,$jml);
              	return $shuffle;
              }

            
              function download($path)
              {
              	$path=$this->encrypt($path);
              	redirect("welcome/getAttachment/".$path);
              }

			  function device_sts($sts){
				switch ($sts) {
					case 0:
					  return "<span class='text-danger'>Disconnect</span>";
					  break;
					case 1:
					  return "<span class='text-success'>Connect</span>";
					  break;
					case 2:
						return "<span class='text-danger'>Scan please!</span>";
					  break;
					case 3:
						return "<span class='text-info'>Connecting...</span>";
					  break;
					case 4:
						return "<span class='text-info'>Starting...</span>";
					  break;
					case 5:
						return "<span class='text-danger'>non-active</span>";
					  break;
					default:
					  return "<span class='text-danger'>Unknow</span>";
				  }
			  }

			  function hp($nohp) {
				  $hp = $nohp;
				$nohp = trim($nohp);
				// kadang ada penulisan no hp 0811 239 345
				$nohp = str_replace(" ","",$nohp);
				// kadang ada penulisan no hp (0274) 778787
				$nohp = str_replace("(","",$nohp);
				// kadang ada penulisan no hp (0274) 778787
				$nohp = str_replace(")","",$nohp);
				// kadang ada penulisan no hp 0811.239.345
				$nohp = str_replace(".","",$nohp);
			
				// cek apakah no hp mengandung karakter + dan 0-9
				if(!preg_match('/[^+0-9]/',trim($nohp))){
					// cek apakah no hp karakter 1-3 adalah +62
					if(substr(trim($nohp), 0, 2)=='62'){
						$hp = trim($nohp);
					}
					// cek apakah no hp karakter 1 adalah 0
					elseif(substr(trim($nohp), 0, 1)=='0'){
						$hp = '62'.substr(trim($nohp), 1);
					}
				}
				return $hp;
			}
 
	}

	?>