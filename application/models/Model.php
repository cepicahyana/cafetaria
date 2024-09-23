<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	 
	class Model extends CI_Model {

        // function updateMessageStatus(){
        //     $from = $this->input->post("from");
        //     $to   = $this->input->post("to");
        //     $ack   = $this->input->post("ack");
        // }
        // function getLinkGroup(){
        //         $data          = $this->input->post("data");
        //         $sender_number = $this->input->post("sender_number");
        //         $data          = json_decode($data,TRUE);
        //         foreach($data as $key=>$val){
                    
        //         }
        //         $this->db->where("sender_number");
        //         $this->db->get("device_station")->row();
        //         return $db->link_updategroup():
        // }
        
        function sent_survei(){
           $tgl = date('Y-m-d');
           
           
          
        //   foreach($data as $val){
            //   $sn = $val->sender_number;
            //   $this->db->where("id_user",$sn);
               $this->db->where("DATE(entry)",$tgl); 
               $this->db->group_by("hp_pelanggan");
               $this->db->group_by("id_user");
               $dt = $this->db->get("tm_order")->result();
               $n=0;
               foreach($dt as $v){ 
                   $n++;
                   $this->db->where("sender_number",$v->id_user);
                   $val = $this->db->get("device_stations")->row();
                //   $option = '[{"id":"survei1","text":"Menyenangkan"},{"id":"survei1","text":"Biasa aja"},{"id":"survei1","text":"Tidak sesuai ekspektasi"}]';
                   
                //   $msg = '{"body":"Terimakasih ya sudah berkunjung di 📍'.$val->sender_name.', mau tau dong kak pengalaman kakak saat berkunjung ke 📍'.$val->sender_name.' gimana ?","title":"Hai kak '.$v->sender_name.'","footer":"survei kepuasan"}';
                   $msg = 'Halo kak '.$v->nama_pelanggan.' 👋
Terimakasih ya sudah berkunjung di 📍'.$val->sender_name.', mau tau dong kak pengalaman kakak saat berkunjung ke 📍'.$val->sender_name.' gimana ?
Boleh kirim kritik & sarannya kak 🙏';
                   
                   
                   
                    $this->db->set("hits",2);
                    $this->db->set("sender_number",$this->sender($v->id_user));
                    // $this->db->set("options",$option);
                    $this->db->set("judul_pesan","SURVEI KEPUASAN");
                    $this->db->set("type",1);
                    $this->db->set("pesan",$msg);
                    $this->db->set("no_tujuan",$v->hp_pelanggan);
                    $this->db->insert("data_pesan");
                    
                     $this->db->set("to",$this->sender($v->id_user));
                     $this->db->set("nama",$v->nama_pelanggan);
                     $this->db->set("hp",$this->sender($v->hp_pelanggan));
                     $this->db->set("tgl",date('Y-m-d H:i:s'));
                     $this->db->set("sts",0);
                     $this->db->set("saran",null);
                       $this->db->insert("kritik_saran");
                 
                 
               }
        //   }
           return $n;
       }
        function i_session_cs($data,$nama){
            $this->db->set("_ctime",date('Y-m-d H:i:s'));
            $this->db->set("sender_number",$data);
             $this->db->set("sender_name",$nama);
             $this->db->set("kode",date('YmdHis').$this->m_reff->acak(5));
            return $this->db->insert("session_cs");
        }
        function d_session_cs($data){
            $this->db->where("sender_number",$data);
            return $this->db->delete("session_cs");
        }
         function g_session_cs($data){
            $this->db->where("sender_number",$data);
            $db = $this->db->get("session_cs")->row();
            return isset($db->hits)?($db->hits):null;
        }
        function id_session_cs($data){
            $this->db->where("sender_number",$data);
            $db = $this->db->get("session_cs")->row();
            return isset($db->kode)?($db->kode):null;
        }
        function u_session_cs($data,$msgi){
            $this->db->set("hits",2);
            $this->db->set("intro",$msgi);
            $this->db->where("sender_number",$data);
            return $this->db->update("session_cs");
        }
        
        function u_session_cs_3($data,$msgi){ //pesan ke 3
            $this->db->set("hits",3);
            $this->db->set("intro",$msgi);
            $this->db->where("sender_number",$data);
            return $this->db->update("session_cs");
        }
        
        
        function g_session_aduan($data){
            $this->db->where("sender_number",$data);
            $db = $this->db->get("session_aduan")->row();
            return isset($db->hits)?($db->hits):null;
        }
         function i_session_aduan($data){
            $this->db->set("_ctime",date('Y-m-d H:i:s'));
            $this->db->set("sender_number",$data);
            return $this->db->insert("session_aduan");
        }
        
        function cek_aduan($sender){
            $this->db->where("hits",1);
            $this->db->where("sender_number",$sender);
            return $this->db->get("session_aduan")->row();
        }
        
        function cek_antrian($sender){
            $this->db->where("hp",$this->sender($sender));
            $this->db->where("no_antrian",null);
            // $this->db->where("date(tgl)",date('Y-m-d'));
            return $this->db->get("data_antrian")->row();
        }
        
        function sendbyPhone(){
            $base        = base_url()."file_upload/autoreplay/";
            $asli        = strtoupper(trim($this->input->post("msg")));
            $pesan       = preg_replace('/[^A-Za-z0-9]/', ' ', $asli);
         
            $pesan_real  = trim($this->input->post("msg"));

            $to          = $this->input->post("to");
             $sender      = $this->input->post("sender");
            $type        = $this->input->post("type");
            $mimetype    = $this->input->post("mimetype");
            $fileData    = $this->input->post("file");
            $msgId       = $this->input->post("msgId");
            $ack = $this->input->post("ack");
            ///spesial
             
                $sts_pesan = $ack;
           
            $this->db->where("(pesan='".$pesan_real."' and no_tujuan='".$this->m_reff->converthp($to)."' and date(_ctime)='".date('Y-m-d')."')");
            $this->db->or_where("msg_id",$msgId);
            $cek = $this->db->get("data_pesan")->num_rows();
            if(!$cek){
            $this->db->set("msg_id",$msgId);
            $this->db->set("sts",1);
            $this->db->set("sts_pesan",$sts_pesan);
            $this->db->set("no_tujuan",str_replace("@c.us","",$to));
            $this->db->set("sender_number","DMT");
            $this->db->set("hits",3);
            $this->db->set("device_sts",1);
                if($type=="image"){ //image
                    $file = $this->konvertImg($fileData,str_replace("@c.us","",$sender));
                    $this->db->set("type",2);
                    $this->db->set("url",$file);
                }else{
                    $this->db->set("type",1);
                }
                 
                $this->db->set("_ctime",date('Y-m-d H:i:s'));
                // $this->db->set("sender_number",str_replace("@c.us","",$sender));
                $this->db->set("pesan",trim($this->input->post("msg")));
                return $this->db->insert("data_pesan");
                
            }else{
                $this->db->set("sts_pesan",$sts_pesan);
                $this->db->where("msg_id",$msgId);
                return $this->db->update("data_pesan");
            }
           
           
         
        }
        function saveOutbox(){
            return false;
            $nama        = $this->input->post("nama");
            $sender      = $this->input->post("sender");
            $type        = $this->input->post("type");
            $mimetype    = $this->input->post("mimetype");
            $fileData    = $this->input->post("file");
            $to          = $this->input->post("to");
             if($type=="image"){ //image
                $file = $this->konvertImg($fileData,str_replace("@c.us","",$sender));
                $this->db->set("hits",2);
                $this->db->set("url",$file);
            }else{
                $this->db->set("hits",1); 
            }
                $this->db->set("_ctime",date('Y-m-d H:i:s'));
                $this->db->set("sender_number",str_replace("@c.us","",$sender));
                $this->db->set("judul_pesan","on mobile");
                $this->db->set("no_tujuan",str_replace("@c.us","",$to));
                $this->db->set("pesan",trim($this->input->post("msg")));
                $this->db->set("sts",1);
                $this->db->set("hits",3);
                $this->db->set("_ctime",date('Y-m-d H:i:s'));
                $this->db->set("sts_pesan",2);
               return $this->db->insert("data_pesan");
                  
            
            
        }
        function postReplay(){
            error_reporting(0);
            
            //  $var["replay"] = '{"body":"Sedang maintenance","title":"INFORMASI 😎","footer":"trouble"}';
            //               $var["jenis_pesan"] = 4;
            //         $var["options"] = '[{"text":"Kembali"}]';
                
            //               $var["status"] = true;
            //               return $var;
                           
        //     $listing[]=array("id"=>"Daftar menu","title"=>"Daftar menu","description"=>"");
        //      $list["title"]="eee";
        // 		$list["rows"]=$listing;
        // 		$list = json_encode(array($list));
        	 
        		
                 
        //         $var["replay"] = '{"title":"dd","body":"Silahkan pilih jadwal","footer":"d"}';
        //         $var["jenis_pesan"] = 5;
        //         $var["options"] = $list;
        //         $var["status"] = true;
        //         return $var;
                
            $cs               = strtoupper($this->m_reff->pengaturan(1));
            $aduan            = strtoupper($this->m_reff->pengaturan(6));
            $antrian          = trim(strtoupper($this->m_reff->pengaturan(9)));
            
            $base        = base_url()."file_upload/autoreplay/";
            $asli        = strtoupper(trim($this->input->post("msg")));
            $pesan       = str_replace("?","",$asli);
            
            $pesan_real  = trim($this->input->post("msg"));

            $btn         = $this->input->post("btn");
            if(!$btn){
                 $btn = $this->input->post("list");
            }
           
            $nama =$nama_pelanggan       = $this->input->post("nama");
            $sender      = $this->input->post("sender");
            $type        = $this->input->post("type");
            $mimetype    = $this->input->post("mimetype");
            $fileData    = $this->input->post("file");
            $to          = $this->input->post("to");
                           $this->db->where("sender_number",$this->sender($to));
            $client      = $this->db->get("device_stations")->row();
            $jam_op = isset($client->jam_op)?($client->jam_op):null;
            $jam_op = json_decode($jam_op,TRUE);
             $open  = isset($jam_op[date('N')]['open'])?($jam_op[date('N')]['open']):null; 
            $close = isset($jam_op[date('N')]['close'])?($jam_op[date('N')]['close']):null;
            $time = date('H:i');
            $resto = isset($client->sender_name)?($client->sender_name):null;
            
            
            
            $nomor_telepon = $this->sender($sender); // nomor telepon dengan awalan "6285"
            //if (substr($nomor_telepon, 0, 3) === "628") { // periksa apakah nomor telepon diawali dengan "6285"
              $sender_real = "08" . substr($nomor_telepon, 3,20); // ubah awalan menjadi "085"
            
            if(1==1){
                    $intro = "Halo ini adalah kontak notifikasi aplikasi simarka";//$this->m_reff->gpt($this->input->post("msg"));
                     $var["replay"] = $intro;
                     $var["status"] = true;
                     return $var;
            }

            $cek_saran = $this->db->get_where("kritik_saran",["sts"=>0,"hp"=>$nomor_telepon])->row();
            if(isset($cek_saran->id)){
                     $this->db->where("id",$cek_saran->id);
                     $this->db->set("sts",1);
                     $this->db->set("saran",$pesan_real);
                       $this->db->update("kritik_saran");
                     
                
                 $var["replay"] = "Terimakasih atas masukannya kak!, kami akan senantiasa memperbaikinya😊
Kami tunggu kehadirannya kembali ya ka di 📍 *$resto* 🙏";
                 $var["jenis_pesan"] = 1;
                 $var["status"] = true; 
                return $var;
            }
            
            
            if($btn=="story"){
                $story = $client->story; 
                $story = str_replace("\n","\\n",$story);
                $story = str_replace("\r","\\n",$story);
                           $intro = $story;
                           if($client->foto1){
                            $var["img"] = isset($client->foto1)?(base_url()."file_upload/".$this->sender($to)."/".$client->foto1):null;
                           }
                           $var["replay"] = '{"body":"'.$story.'","title":"'.$client->sender_name.'","footer":"story"}';
                           $var["jenis_pesan"] = 4;
                        
                if($sender_real==$client->hp_owner){
                       $var["options"] = '[{"id":"ig","text":"Instagram","url":"'.$client->ig.'"},{"text":"Location","url":"'.$client->map.'"},{"id":"ks","text":"Kritik & Saran"},{"text":"Kembali"}]';
                }else{
                       $var["options"] = '[{"id":"ig","text":"Instagram","url":"'.$client->ig.'"},{"text":"Location","url":"'.$client->map.'"},{"id":"ks","text":"Kritik & Saran"},{"text":"Kembali"}]';
                }
                           $var["status"] = true;
                           return $var;
            }
             
            if($btn=="info"){
                           $story = isset($client->info)?($client->info):"__"; 
                           $story = str_replace("\n","",$story);
                           $story = str_replace("\r","\\n",$story);
                           $intro = $story;
                           $var["replay"] = '{"body":"'.$intro.'","title":"INFORMASI 😎","footer":"'.$client->sender_name.'"}';
                           $var["jenis_pesan"] = 4;
                    $var["options"] = '[{"text":"Kembali"}]';
                
                           $var["status"] = true;
                           return $var;
            }
            
            
             if($btn=="survei1"){
                 $this->db->set("to",$this->sender($to));
                  $this->db->set("nama",$nama);
                 $this->db->set("hp",$this->sender($sender));
                 $this->db->set("tgl",date('Y-m-d H:i:s'));
                 $this->db->set("sts",0);
                 $this->db->set("pengalaman",$pesan_real);
                 $this->db->insert("data_survei");
                        
                           $intro = "Kalau pelayanan 📍".$client->sender_name." gimana kak?";
                           $var["replay"] = '{"body":"'.$intro.'","title":"Makasih responya kak!","footer":"'.$client->sender_name.'"}';
                           $var["jenis_pesan"] = 4;
                           $var["options"] = '[{"id":"survei2","text":"Bagus"},{"id":"survei2","text":"Biasa aja"},{"id":"survei2","text":"Buruk"}]';
                           $var["status"] = true;
                           return $var;
            }
            
            if($btn=="survei2"){
                 $this->db->where("to",$this->sender($to));
                 $this->db->where("hp",$this->sender($sender));
                // $this->db->where("tgl",date('Y-m-d H:i:s'));
                 $this->db->where("sts",0);
                 $this->db->set("pelayanan",$pesan_real);
                 $this->db->update("data_survei");
                        
                           $intro = "Kecepatan penyajian makanan/minuman di 📍".$client->sender_name." gimana kak?";
                           $var["replay"] = '{"body":"'.$intro.'","title":"Makasih responya kak!","footer":"'.$client->sender_name.'"}';
                           $var["jenis_pesan"] = 4;
                           $var["options"] = '[{"id":"survei3","text":"Cepat"},{"id":"survei3","text":"Normal"},{"id":"survei3","text":"Lambat"}]';
                           $var["status"] = true;
                           return $var;
            }
            if($btn=="survei3"){
                 $this->db->where("to",$this->sender($to));
                 $this->db->where("hp",$this->sender($sender));
                // $this->db->where("tgl",date('Y-m-d H:i:s'));
                 $this->db->where("sts",0);
                 $this->db->set("penyajian",$pesan_real);
                 $this->db->update("data_survei");
                        
                           $intro = "Untuk rasa makanan/minuman 📍".$client->sender_name." gimana kak ?";
                           $var["replay"] = '{"body":"'.$intro.'","title":"Makasih responya kak!","footer":"'.$client->sender_name.'"}';
                           $var["jenis_pesan"] = 4;
                           $var["options"] = '[{"id":"survei4","text":"Enak"},{"id":"survei4","text":"Biasa aja"},{"id":"survei4","text":"Tidak enak"}]';
                           $var["status"] = true;
                           return $var;
            }
            
            if($btn=="survei4"){
                 $this->db->where("to",$this->sender($to));
                 $this->db->where("hp",$this->sender($sender));
                // $this->db->where("tgl",date('Y-m-d H:i:s'));
                 $this->db->where("sts",0);
                 $this->db->set("makanan",$pesan_real);
                 $this->db->update("data_survei");
                        
                           $intro = "Untuk tempat 📍".$client->sender_name." gimana kak?";
                           $var["replay"] = '{"body":"'.$intro.'","title":"Makasih responya kak!","footer":"'.$client->sender_name.'"}';
                           $var["jenis_pesan"] = 4;
                           $var["options"] = '[{"id":"survei5","text":"nyaman"},{"id":"survei5","text":"Biasa aja"},{"id":"survei5","text":"Buruk"}]';
                           $var["status"] = true;
                           return $var;
            }
            if($btn=="survei5"){
                 $this->db->where("to",$this->sender($to));
                 $this->db->where("hp",$this->sender($sender));
                // $this->db->where("tgl",date('Y-m-d H:i:s'));
                 $this->db->set("sts",1);
                 $this->db->where("sts",0);
                 $this->db->set("tempat",$pesan_real);
                 $this->db->update("data_survei");
                        
                           $intro = "Terimakasih kak $nama sudah membantu kami menjadi lebih baik, jika ada kritik & saran boleh kak 😊 Kami tunggu kunjungan kak $nama kembali di 📍$client->sender_name 🙏";
                           $var["replay"] = '{"body":"'.$intro.'","title":"Survei pelanggan","footer":"'.$client->sender_name.'"}';
                           $var["jenis_pesan"] = 4;
                           $var["options"] = '[{"id":"ks","text":"Kritik & Saran"}]';
                           $var["status"] = true;
                           return $var;
            }
            
            
            
            if(!$open){
                $info_tutup = $client->info_tutup;
                if(!$info_tutup){
                     $info_tutup           = "\nMohon maaf hari ini kami libur dulu ya kak 🙂";
                }else{
                 $info_tutup = str_replace("\n","\n",$info_tutup);
                 $info_tutup = str_replace("\r","\n",$info_tutup);
                }
                
                 $var["replay"] = "Hai kak $nama 👋 $info_tutup";
                 $var["jenis_pesan"] = 1;
                //  $var["options"] = '[{"id":"ig","text":"Instagram","url":"'.$client->ig.'"},{"id":"info","text":"🤩 Info menarik"},{"id":"story","text":"🤠 Story '.$client->sender_name.'"}]';
                 $var["status"] = true;return $var;
                     
              
            }
            
            if($time<$open || $time>$close){
                
                 $info_tutup = "Hai kak $nama 👋\nJam operasional kami hari ini pukul ".$open." sampai dengan pukul ".$close." WIB 😊";
                 $var["replay"] = $info_tutup;//'{"title":"Hai kak '.$nama.'!!","body":"'.$info_tutup.'","footer":"'.$client->sender_name.'"}';
                 $var["jenis_pesan"] = 1;
                //  $var["options"] = '[{"id":"ig","text":"Instagram","url":"'.$client->ig.'"},{"id":"info","text":"🤩 Info menarik"},{"id":"story","text":"🤠 Story '.$client->sender_name.'"}]';
                 $var["status"] = true;return $var;
            }
            
            
            /// get nomor antrian
            $tgl = date('Y-m-d');
             
                   
                  
            
            
            
            //// cek aduan
            $cek = $this->cek_aduan($sender);
            if(isset($cek->id) and $pesan!=$aduan){
                ///cek nama
                $nama = isset($cek->nama)?($cek->nama):null;
                if($nama==null){
                    $this->db->set("nama","---");
                    $this->db->where("sender_number",$sender);
                    $this->db->where("hits",1);
                    $this->db->update("session_aduan");
                     $intro           = "Nama anda :";
                     $var["replay"]  = $intro;
                     $var["status"] = true;
                     return $var;
                }elseif($nama=="---"){
                     $this->db->set("nama",$pesan_real);
                     $this->db->set("alamat","---");
                     $this->db->where("sender_number",$sender);
                     $this->db->where("hits",1);
                     $this->db->update("session_aduan");
                     $intro           = "Alamat :";
                     $var["replay"]  = $intro;
                     $var["status"] = true;
                     return $var;
                }
                
                
               
                 
                
                 /// cek pengaduan
                $aduan = isset($cek->aduan)?($cek->aduan):null;
                if($aduan==null){
                    $this->db->set("aduan","---");
                    $this->db->where("sender_number",$sender);
                    $this->db->where("hits",1);
                    $this->db->update("session_aduan");
                     $intro           = "Ketik pengaduan anda :";
                     $var["replay"]  = $intro;
                     $var["status"] = true;
                     return $var;
                }elseif($aduan=="---"){
                     $this->db->where("hits",1);
                     $this->db->set("aduan",$pesan_real);
                     $this->db->set("hits",0);
                     $this->db->where("sender_number",$sender);
                     $this->db->update("session_aduan");
                     $intro         = "Terimakasih! Pengaduan anda akan segera kami tindak lanjuti.";
                     $var["replay"] = $intro;
                     $var["status"] = true;
                     $this->migrasikan_aduan();
                     return $var;
                }
                
                
            }elseif(isset($cek->id) and $pesan==$aduan){
                
                $nama = isset($cek->nama)?($cek->nama):null;
                if($nama==null or $nama=="---"){
                     $intro           = "Nama anda :";
                     $var["replay"]  = $intro;
                     $var["status"] = true;
                     return $var;
                } 
                
                 
                /// cek pengaduan
                $aduan = isset($cek->aduan)?($cek->aduan):null;
                if($aduan==null){
                     $intro           = "Ketik pengaduan anda :";
                     $var["replay"]  = $intro;
                     $var["status"] = true;
                     return $var;
                } 
                     
                     
            }elseif(isset($cek->id) and $pesan==$cs){
                 $intro           = "Anda masih terhubung dengan pesan aduan, silahkan jawab pertanyaan sebelumnya:";
                     $var["replay"]  = $intro;
                     $var["status"] = true;
                     return $var;
            }//end cek aduan
            
            
            
            
            
             if($aduan==$pesan){
                     $this->db->set("nama","---");
                     $this->db->set("hits",1);
                     $this->db->set("sender_number",$sender);
                     $this->db->insert("session_aduan");
                     
                     $intro           = "Nama anda :";
                     $var["replay"]  = $intro;
                     $var["status"] = true;
                     return $var;
            }
            
             
       
            
            
            
            if($btn=="order"){
 
                           $intro = "Hai kak, mau order sekarang ? ";
                           $var["replay"] = '{"body":"'.$intro.'","title":"Konfirmasi","footer":"'.$client->sender_name.'"}';
                          // $var["img"] = isset($client->foto_menu)?(base_url()."file_upload/".$this->sender($to)."/".$client->foto_menu):null;
                           $var["jenis_pesan"] = 4;
                           $var["options"] = '[{"id":"order_now","text":"🛒 Order sekarang"}]';
                         //   $var["options"] = '[{"id":"order_now","text":"🛒 Order sekarang"},{"id":"menu","text":"🍽 Lihat daftar menu"}]';
                           $var["status"] = true;
                           return $var;
            }
            
            $this->db->where("saran",null);  
            $this->db->where("hp",$this->sender($sender));
            $this->db->where("to",$this->sender($to));
            $cek = $this->db->get("kritik_saran")->num_rows();
            if($cek){
                    $this->db->set("saran",$pesan_real);
                    $this->db->where("hp",$this->sender($sender));
                    $this->db->where("to",$this->sender($to));
                    $this->db->limit(1);
                     $this->db->order_by("id","desc");
                    $this->db->update("kritik_saran");
                           $intro = "Terimakasih atas masukannya kak!, kami akan senantiasa memperbaikinya😊";
                           $var["replay"] = $intro;
                           $var["status"] = true;
                           return $var;
            }
            if($btn=="ks"){
              
                $this->db->where("saran",null);  
                $this->db->set("nama",$nama);
                $this->db->set("hp",$this->sender($sender));
                $this->db->set("to",$this->sender($to));
                $this->db->insert("kritik_saran");
                           $intro = "Hi Kak!!\nSilahkan sampaikan keluhan atau sarannya.\nkami akan dengan senang hati mendengarnya😊 ";
                           $var["replay"] = $intro;
                           $var["status"] = true;
                           return $var;
            }
            
            if($btn=="menu"){
                $this->db->where("sts",0);
                $this->db->where("hp",$this->sender($sender));
                $this->db->delete("data_order");
                    
                           $intro = "Hai kak, mau order sekarang ? ";
                           $var["replay"] = '{"body":"'.$intro.'","title":"Konfirmasi","footer":"'.$client->sender_name.'"}';
                           $var["img"] = isset($client->foto_menu)?(base_url()."file_upload/".$this->sender($to)."/".$client->foto_menu):null;
                           $var["jenis_pesan"] = 4;
                           $var["options"] = '[{"id":"order_now","text":"🛒 Order sekarang"},{"id":"menu","text":"🍽 Lihat daftar menu"}]';
                           $var["status"] = true;
                           return $var;
            }
            
           
            
            if($btn=="order_now"){
                $this->db->where("sts",0);
                $this->db->where("hp",$this->sender($sender));
                $this->db->delete("data_order");
                
                $this->db->set("sts",0);
                $this->db->set("hp",$this->sender($sender));
                $this->db->set("to",$this->sender($to));
                $this->db->set("sender_name",$nama);
                $this->db->set("tgl",date('Y-m-d H:i:s'));
                $this->db->set("order","---");
                $this->db->insert("data_order");
                $contoh_order = $client->contoh_order;
              //  $contoh_order = str_replace("\n","\\n",$contoh_order);
            //    $contoh_order = str_replace("\r","\\n",$contoh_order);
                          $intro = "Halo kak, Silahkan mau pesan apa? Langsung ketik aja...\n\n*Contoh :*\n".$contoh_order;
                          $img= isset($client->foto_menu)?(base_url()."file_upload/".$this->sender($to)."/".$client->foto_menu):null;
                          $var["replay"]      = $intro;
                          $var["jenis_pesan"] = 1;
                        //  $var["file"]        = $img;
                          $var["status"]      = true;
                           return $var;
            }
            
            if($btn=="sudah_sesuai"){
                $this->db->set("sts",2);
                 $this->db->set("fix_order_time",date('Y-m-d H:i:s'));
                $this->db->where("hp",$this->sender($sender));
                $this->db->where("sts",1);
                $this->db->update("data_order");
                
               
                
                           $intro = "Terimakasih pesanan kakak akan segera diproses, mohon tunggu ya 😊 ";
                           $var["replay"] = '{"body":"'.$intro.'","title":"Pesanan diproses","footer":"'.$client->sender_name.'"}';
                           $var["jenis_pesan"] = 4;
                           $var["options"] = '[{"id":"order_now","text":"🛒 Order lagi"},{"text":"Menu utama"}]';
                           $var["status"] = true;
                           return $var;
            }
            
              if($btn=="order_ulang"){
                $this->db->where("sts",1);
                $this->db->where("hp",$this->sender($sender));
                $this->db->delete("data_order");
                
                           $intro = "Oke kak! Pesanannya sudah dibatalkan, apakah mau order ulang ? ";
                           $var["replay"] = '{"body":"'.$intro.'","title":"Pesanan dibatalkan","footer":"'.$client->sender_name.'"}';
                           $var["jenis_pesan"] = 4;
                           $var["options"] = '[{"id":"order_now","text":"🛒 Order ulang"},{"text":"Tidak"}]';
                           $var["status"] = true;
                           return $var;
            }
             
             
             
            
            
                $this->db->where("sts",0);
                $this->db->where("hp",$this->sender($sender));
                $db = $this->db->get("data_order")->row();
                $meja = isset($db->no_meja)?($db->no_meja):null;
                $nama = isset($db->nama)?($db->nama):null;
                $order = isset($db->order)?($db->order):null;
                if(isset($db->id)){
                    if($order=="---"){
                         $this->db->set("order",$pesan_real);
                         $this->db->set("no_meja","---");
                         $this->db->where("sts",0);
                         $this->db->where("hp",$this->sender($sender));
                         $this->db->update("data_order");
                         
                          $intro = "Oke siap kak!\nDuduk dinomor meja berapa ?";
                          $var["replay"]      = $intro;
                          $var["status"]      = true;
                          return $var;
                    }
                    
                    
                    
                    if(!$meja){
        
                         $this->db->set("no_meja","---");
                         $this->db->where("sts",0);
                         $this->db->where("hp",$this->sender($sender));
                         $this->db->update("data_order");
                         
                          $intro = "Duduk dinomor meja berapa kak ?";
                          $var["replay"]      = $intro;
                          $var["status"]      = true;
                          return $var;
                    }
                    if($meja=="---"){
                         $this->db->set("no_meja",$pesan_real);
                         $this->db->set("nama","---");
                         $this->db->where("sts",0);
                         $this->db->where("hp",$this->sender($sender));
                         $this->db->update("data_order");
                         
                         
                         
                          $intro = "Pesanan atas nama siapa kak ?";
                          $var["replay"]      = $intro;
                          $var["status"]      = true;
                          return $var;
                    }
                     if($nama=="---"){
                         $this->db->set("nama",$pesan_real);
                         $this->db->set("sts",1);
                         $this->db->where("hp",$this->sender($sender));
                         $this->db->limit(1);
                         $this->db->order_by("tgl","desc");
                         $this->db->update("data_order");
                         $this->sent_notif_order($client,$this->sender($sender));
                          $this->db->order_by("tgl","desc");
                          $this->db->limit(1);
                          $this->db->where("sts",1);
                          $this->db->where("hp",$this->sender($sender));
                          $db = $this->db->get("data_order")->row();
                          $nama    = isset($db->nama)?($db->nama):null;
                          $no_meja = isset($db->no_meja)?($db->no_meja):null;
                          $order = isset($db->order)?($db->order):null;
                          
                 $order = str_replace("\n","\\n",$order);
                 $order = str_replace("\r","\\n",$order);
                 $var["replay"] = '{"title":"KONFIRMASI PESANAN","body":"Berikut data pesanan kakak\nAtas nama : *'.$nama.'*\nNo meja : *'.$no_meja.'*\n\n*Order:*\n'.$order.'\n\n*Apakah pesanan sudah sesuai kak?*","footer":"'.$client->sender_name.'"}';
                 $var["jenis_pesan"] = 4;
                 $var["options"] = '[{"id":"sudah_sesuai","text":"Iya! Sudah sesuai ✅"},{"id":"order_ulang","text":"Tidak sesuai/order ulang 👎"}]';
                 $var["status"] = true;
                  return $var;
                    }
                     
                }
            
            
            
           
           
             
                 $sambutan = $client->sambutan;
                 $sambutan = str_replace("\n","\\n",$sambutan);
                 $sambutan = str_replace("\r","\\n",$sambutan);
              $add="";
              if($this->sender($sender)==$this->sender($to) || substr($this->sender($client->hp_owner),-8)==substr($this->sender($sender),-8)){
                  $add.="
Login admin : ".base_url()."master/order?id=".$client->kode;
                   $add.='

Untuk order bisa langsung *hubungi pelayan kami* atau bisa melalui link dibawah ini: 

👇 Order:
'.base_url()."daftar_menu?resto=". $client->link_name."&me=".$this->sender($sender);
              }else{
                  $add='
Untuk order bisa langsung *hubungi pelayan kami* atau bisa melalui link dibawah ini:

👇 Order:
'.base_url()."daftar_menu?resto=". $client->link_name."&me=".$this->sender($sender);
              }
              
              
if(!$client->order){
    $add="";
}              
               $pesan_replays   = 'Hai kak '.$nama_pelanggan.' 👋
Selamat datang di 📍'.$client->sender_name.' !!
'.$sambutan."
".$add;

// $var["replay"] = "Hai kak $nama_pelanggan 👋
// Mohon tunggu sebentar ya...";//$pesan_replays;

$file1 = isset($client->foto_menu)?(base_url()."file_upload/".$this->sender($to)."/".$client->foto_menu):null;
$file2 = isset($client->foto_menu2)?(base_url()."file_upload/".$this->sender($to)."/".$client->foto_menu2):null;

                // if($this->sender($sender)=="6285221288210" || $this->sender($sender)=="085221288210"){
                 //   $this->kirim_gambar($file1,$this->sender($sender),$pesan_replays,$this->sender($to));
                  //  $this->kirim_gambar($file2,$this->sender($sender),"",$this->sender($to));
                // }
                
                $this->save_pelanggan($this->sender($sender),$this->sender($to),$nama_pelanggan);

                 $var["file"] = $file1;
                 $var["file2"] = $file2;
                 $var["jenis_pesan"] = 2;
                 $this->simpan_replay();
                 $cek = strpos($client->notif_order,$sender_real);
                   if($cek!==false){
                        $var["options"] = '[{"id":"Setting profile","text":"Login","url":"'.base_url().'/master/setting?id='.$this->m_reff->encrypt($this->sender($to)).'"},{"id":"order","text":"🛒 Order"},{"id":"info","text":"🤩 Info menarik"},{"id":"story","text":"🤠 Story '.$client->sender_name.'"}]';
                   }else{
                        $var["options"] = '[{"id":"order","text":"🛒 Order"},{"id":"info","text":"🤩 Info menarik"},{"id":"story","text":"🤠 Story '.$client->sender_name.'"}]';
                   }
                //    $var["replay"] = '{"body":"s","title":"'.$client->sender_name.'","footer":"story"}';
                // $var["options"] = '[{"id":"ig","text":"Instagram","url":"'.$client->ig.'"},{"id":"order","text":"🛒 Order"},{"id":"info","text":"🤩 Info menarik"},{"id":"story","text":"🤠 Story '.$client->sender_name.'"}]';
                 $var["status"] = true;
                //{"text":"Setting profile","url":"'.base_url().'/master/setting?id='.$this->m_reff->encrypt($this->sender($to)).'"}
                
                    //   $intro = $this->m_reff->gpt($this->input->post("msg"));
                      $var["replay"] = $pesan_replays;
                     $var["status"] = true;
                    
                     return $var; 
        } //ujung
        
         function list_menu($db){
	       $promo = isset($db->menu_promo)?($db->menu_promo):null;
	
		   //$listing[]=array("id"=>"Daftar menu","title"=>"Daftar menu","description"=>"");
		   $listing[]=array("id"=>"Order","title"=>"Order","description"=>"");
		   $listing[]=array("id"=>"Best seller","title"=>"Best seller","description"=>"");
		   if($promo){
		       $listing[]=array("id"=>"Promo","title"=>"Promo","description"=>"");
		   }
		   $listing[]=array("id"=>"ghalery","title"=>"Ghalery","description"=>"");
		   
		   $listing[]=array("id"=>"ks","title"=>"Kritik & Saran","description"=>"");
		   
		   
		$list["title"]="Menu pilihan";
		$list["rows"]=$listing;
		$list = json_encode(array($list));
		return $list;
        }
        
    function save_pelanggan($cos,$to,$nama){
        $this->db->set("upd",date('Y-m-d H:i:s'));
        $this->db->set("nama",$nama);
        $this->db->set("to",$to);
        $this->db->set("hp",$cos);
        return $this->db->insert("data_pelanggan");
    }    
    function sender($sender){
        return str_replace("@c.us","",$sender);
    }
    function sent_notif_order($client,$sender){
       $to  = isset($client->sender_number)?($client->sender_number):null;
       $notif = isset($client->notif_order)?($client->notif_order):null;
       if(!$notif){ return false;}
       $notif = json_decode($notif,true);
       
       $this->db->where("to",$to);
       $this->db->where("hp",$sender);
       $this->db->order_by("id","desc");
       $this->db->limit(1);
       $o = $this->db->get("data_order")->row();
       $order = isset($o->order)?($o->order):null;
       $no_meja = isset($o->no_meja)?($o->no_meja):null;
       $nama = isset($o->nama)?($o->nama):null;
       $time = isset($o->tgl)?($o->tgl):null; 
       
         $order = str_replace("\n","\\n",$order);
         $order = str_replace("\r","\\n",$order);
       
        foreach($notif as $key=>$val){
    
         $option = '[{"text":"Cek Order","url":"'.base_url().'/master/order?id='.$this->m_reff->encrypt($this->sender($to)).'"}]';
$msg = "*ORDER MASUK*\\nMeja: ".$no_meja."\\nNama: ".$nama."\\n\\n*Order:*\\n".$order."\\n\\n🕐 _".$time." WIB_";  

$msg = '{"body":"'.$msg.'","title":"","footer":"'.$client->sender_name.'"}';
      //  $this->db->set("pesan",$msg);
       // $this->db->set("judul_pesan","notif order");
        //$this->db->set("no_tujuan",$val);
       // $this->db->set("sender_number",$to);
       // $this->db->set("type",1);
       // $this->db->set("hits","web");
        
        if(strlen($val)>5 and strlen($to)>5){
                    $this->db->set("hits",2);
                    $this->db->set("sender_number",$to);
                    $this->db->set("options",$option);
                    $this->db->set("judul_pesan","Notif order");
                    $this->db->set("type",5);
                    $this->db->set("pesan",$msg);
                    $this->db->set("no_tujuan",$val);
                    $this->db->insert("data_pesan");
                    

        }
        
        } return true;
    }
    function cek_registrasi_poli($sender){
        $this->db->where("sender_number",str_replace("@c.us","",$sender));
        $this->db->order_by("id","desc");
        $this->db->where("replay",1);
        $this->db->limit(1);
        $db = $this->db->get("msg_inbox")->row();
        return isset($db->msg)?($db->msg):null;
    }
     
    function cek_jadwal_hari_poli($poli){
        $hari_ini = date('N');
        $this->db->where("poli",$poli);
        $this->db->order_by("id_hari","ASC"); 
         $this->db->order_by("jam_mulai","ASC");
        $db = $this->db->get("v_jadwal")->result();
        $listing =[]; $i=0;
        foreach($db as $v){
            $i=1;
                $id_hari = $v->id_hari;
                
              $nama_hari = array(
                1 => 'Monday',
                2 => 'Tuesday',
                3 => 'Wednesday',
                4 => 'Thursday',
                5 => 'Friday',
                6 => 'Saturday',
                7 => 'Sunday'
            );
                
               $tanggal_hari = date('Y-m-d', strtotime("next $nama_hari[$id_hari]")); // Mengambil tanggal pada hari Senin
               $tanggal_tujuan = $this->tanggal->hariLengkap($tanggal_hari,"/");
            if($id_hari==$hari_ini){
            $listing[]=array("tgl"=>date('Y-m-d'),"title"=>"Hari ini"." - ","description"=>"Jam Praktik Pukul : ".substr($v->jam_mulai,0,5). " sd ".substr($v->jam_akhir,0,5)." WIB");
                }
            $listing[]=array("tgl"=>$tanggal_hari,"title"=>$tanggal_tujuan." - ".$v->dokter,"description"=>"Jam Praktik Pukul : ".substr($v->jam_mulai,0,5). " sd ".substr($v->jam_akhir,0,5)." WIB");
        }
        
        
        if($i){
               
               foreach ($listing as $key => $row)
                {
                    $data[$key] = $row['tgl'];
                }
                array_multisort($listing, SORT_ASC, $listing);
               
               
                $list["title"]=$poli;
        		$list["rows"]=$listing;
        		$list = json_encode(array($list));
        	 
        		
                $nama_rs = $this->m_reff->pengaturan(8);
                $var["replay"] = '{"title":"'.$poli.'","body":"Silahkan pilih jadwal","footer":"'.$nama_rs.'"}';
                $var["jenis_pesan"] = 5;
                $var["options"] = $list;
                $var["status"] = true;
                return $var;
        }else{
            return $this->f_list_poli();
        }
                
    }
    
    
    
    function cek_jadwal_hari_dokter($dokter){
        $hari_ini = date('N');
        $this->db->where("dokter",$dokter);
        $this->db->order_by("id_hari","ASC"); 
         $this->db->order_by("jam_mulai","ASC");
        $db = $this->db->get("v_jadwal")->result();
        $listing =[]; $i=0;
        foreach($db as $v){
            $i=1;
                $id_hari = $v->id_hari;
                
              $nama_hari = array(
                1 => 'Monday',
                2 => 'Tuesday',
                3 => 'Wednesday',
                4 => 'Thursday',
                5 => 'Friday',
                6 => 'Saturday',
                7 => 'Sunday'
            );
                
               $tanggal_hari = date('Y-m-d', strtotime("next $nama_hari[$id_hari]")); // Mengambil tanggal pada hari Senin
               $tanggal_tujuan = $this->tanggal->hariLengkap($tanggal_hari,"/");
            if($id_hari==$hari_ini){
                         $listing[]=array("tgl"=>date('Y-m-d'),"title"=>"Hari ini"." - ".$v->dokter." - ".$v->poli,"description"=>"Pukul : ".substr($v->jam_mulai,0,5). " sd ".substr($v->jam_akhir,0,5)." WIB");
                }
            $listing[]=array("tgl"=>$tanggal_hari,"title"=>$tanggal_tujuan." - ".$v->poli,"description"=>"Pukul : ".substr($v->jam_mulai,0,5). " sd ".substr($v->jam_akhir,0,5)." WIB");
        }
        
        
        if($i){
               
               foreach ($listing as $key => $row)
                {
                    $data[$key] = $row['tgl'];
                }
                array_multisort($listing, SORT_ASC, $listing);
               
               
                $list["title"]=$dokter."  - ".$v->spesialis;
        		$list["rows"]=$listing;
        		$list = json_encode(array($list));
        	 
        		
                $nama_rs = $this->m_reff->pengaturan(8);
                $var["replay"] = '{"title":"'.$dokter.'","body":"Silahkan pilih jadwal","footer":"'.$nama_rs.'"}';
                $var["jenis_pesan"] = 5;
                $var["options"] = $list;
                $var["status"] = true;
                return $var;
        }else{
            return $this->f_list_dokter();
        }
    }
    
    
    
    function cek_poli_pilihan($sender){
        $this->db->order_by("id","desc");
        $this->db->where("replay",1);
        $this->db->where("sender_number",str_replace("@c.us","",$sender));
        $db = $this->db->get("msg_inbox")->row();
        return isset($db->msg)?($db->msg):null;
    }
    function cek_dokter_pilihan($sender){
        $this->db->order_by("id","desc");
        $this->db->where("replay",3);
        $this->db->where("sender_number",str_replace("@c.us","",$sender));
        $this->db->limit(1);
        $db = $this->db->get("msg_inbox")->row();
        $msg = isset($db->msg)?($db->msg):null;
            $pecah=explode("\n",$msg);
            return $nama_dokter = isset($pecah[0])?($pecah[0]):null; 
         //   $pecah=explode("\n",$nama_dokter);
           //return $nama_dokter = isset($pecah[0])?($pecah[0]):null;
        
    }
    function simpan_replay($replay=0){
          $pesan_real  = trim($this->input->post("msg"));

            
            $nama        = $this->input->post("nama");
            $sender      = $this->input->post("sender");
            $type        = $this->input->post("type");
            $mimetype    = $this->input->post("mimetype");
            $fileData    = $this->input->post("file");
            $prom        = $this->input->post("to");
            
        if($type=="image"){ //image
                    $file = $this->konvertImg($fileData,str_replace("@c.us","",$sender));
                    $this->db->set("jenis_pesan",2);
                    $this->db->set("file",$file);
                }
                $this->db->set("_ctime",date('Y-m-d H:i:s'));
                $this->db->set("sender_number",str_replace("@c.us","",$sender));
                $this->db->set("sender_name",$nama);
                $this->db->set("msg",trim($this->input->post("msg")));
                $this->db->set("replay",$replay);
                $this->db->set("to",$this->sender($prom));
                return $this->db->insert("msg_inbox");
    }     
           
         
        function konvertImg($imageData,$number){
            $imageData  = base64_decode($imageData);
            $photo      = imagecreatefromstring($imageData);
            $new_dir    = "file_upload/inbox/".$number."_".date('YMDHis');
            imagepng($photo,$new_dir.'.png');
            return $new_dir.".png";
        }
        
        
		function updateStatusOffDevice(){
		    $sender_number = $this->input->get_post("sender_number");
		    if($sender_number){
		        $this->db->where("sender_number",$sender_number);
		    }
			$this->db->set("sts", 0);
			$this->db->update("device_stations");
			
			$this->db->set("device_sts", 0);
			return $this->db->update("data_pesan");
		}
		function getCekKey(){
			$key = $this->input->post("key");
			$this->db->where("key", $key);
			return $this->db->get("device_stations")->row();
		}
		function getMasaAktif(){
			$ma = date("Y-m-d");
			$this->db->where("due_date >", $ma);
			return $this->db->get("device_stations")->row();
		}
// 			function send_group($key){
// 		    $group     = $this->input->post("group"); 
// 			$pesan     = $this->input->post("msg"); 
// 			$this->db->set("tgl",date("Y-m-d H:i:s"));
// 			$this->db->set("hits",1);
// 			$this->db->set("sts",0);
// 			$this->db->set("type",3);
// 			$this->db->set("pesan",$pesan);
// 			$this->db->set("id_user",$key->id_user);
// 			$this->db->set("sender_number",$key->sender_number);
// 			$this->db->set("nama_group",$group);
// 			$this->db->insert("data_pesan");
// 			$var["params"] = $this->input->post();
// 			$var["status"] = "Delivered!";
// 			return $var; 		
// 		}
			function send_group($key){
		    $group     = $this->input->post("group"); 
			$pesan     = $this->input->post("msg"); 
			$url       = $this->input->post("media");
			
			 
                $format=null;
                if($url){
                    $ex = explode(".",$url);
                    $jml = count($ex);
                    $format = isset($ex[$jml-1])?($ex[$jml-1]):null;
                    $format = strtolower($format);
                }
                
                if($format=="pdf" or $format=="docsx" or $format=="xlsx"){
                    // unset($this->input->post('media'));
                    unset($_POST['media']);
                    $this->send_group($key);
                }
			
			
			
			
			$this->db->set("tgl",date("Y-m-d H:i:s"));
			$this->db->set("hits",1);
			$this->db->set("sts",0);
			if($url){
			$this->db->set("type",4);
			}else{
			$this->db->set("type",3);
			}
			$this->db->set("url",$url);
			$this->db->set("pesan",$pesan);
			$this->db->set("id_user",$key->id_user);
			$this->db->set("device_sts",$key->sts);
			$this->db->set("sender_number",$key->sender_number);
			$this->db->set("nama_group",$group);
			$this->db->insert("data_pesan");
			$var["params"] = $this->input->post();
			$var["status"] = "Delivered!";
			return $var; 		
		}
		
		
			function send($key){
		    $phone = $this->input->post("phone");
			$phone = $this->m_reff->hp($phone);
			$pesan     = $this->input->post("msg"); 
			$url       = $this->input->post("media");
			
			 
                $format=null;
                if($url){
                    $ex = explode(".",$url);
                    $jml = count($ex);
                    $format = isset($ex[$jml-1])?($ex[$jml-1]):null;
                    $format = strtolower($format);
                }
                
                if($format=="pdf" or $format=="docsx" or $format=="xlsx"){
                    // unset($this->input->post('media'));
                    unset($_POST['media']);
                    $this->send($key);
                }
			
			
			
			
			$this->db->set("tgl",date("Y-m-d H:i:s"));
			$this->db->set("hits",1);
			$this->db->set("sts",0);
			if($url){
			$this->db->set("type",2);
			}else{
			$this->db->set("type",1);
			}
			$this->db->set("url",$url);
			$this->db->set("pesan",$pesan);
			$this->db->set("id_user",$key->id_user);
			$this->db->set("device_sts",$key->sts);
			$this->db->set("sender_number",$key->sender_number);
			$this->db->set("no_tujuan",$phone);
			$this->db->insert("data_pesan");
			$var["params"] = $this->input->post();
			$var["status"] = "Delivered!";
			return $var; 		
		}

		function send_text($key){
			$no_tujuan = $this->input->post("phone");
			$no_tujuan = $this->m_reff->hp($no_tujuan);
			$pesan     = $this->input->post("msg"); 
			$this->db->set("tgl",date("Y-m-d H:i:s"));
			$this->db->set("hits",1);
			$this->db->set("sts",0);
			$this->db->set("type",1);
			$this->db->set("no_tujuan",$no_tujuan);
			$this->db->set("pesan",$pesan);
			$this->db->set("id_user",$key->id_user);
			$this->db->set("device_sts",$key->sts);
			$this->db->set("sender_number",$key->sender_number);
			$this->db->insert("data_pesan");
			$var["params"] = $this->input->post();
			$var["status"] = "Delivered!";
			return $var; 		
		}
		function kirim_gambar($url,$no_tujuan,$pesan,$sender_number){
		    $this->db->set("tgl",date("Y-m-d H:i:s"));
			$this->db->set("hits",1);
			$this->db->set("sts",0);
			$this->db->set("type",2);
			$this->db->set("url",$url);
			$this->db->set("no_tujuan",$no_tujuan);
			$this->db->set("pesan",$pesan);
			$this->db->set("device_sts",1);
			$this->db->set("sender_number",$sender_number);
			return $this->db->insert("data_pesan");
		}
		function kirim_teks($no_tujuan,$pesan,$sender_number){
		    $this->db->set("tgl",date("Y-m-d H:i:s"));
			$this->db->set("hits",1);
			$this->db->set("sts",0);
			$this->db->set("type",2);
			$this->db->set("no_tujuan",$no_tujuan);
			$this->db->set("pesan",$pesan);
			$this->db->set("device_sts",1);
			$this->db->set("sender_number",$sender_number);
			return $this->db->insert("data_pesan");
		}
		function send_image($key){
			$no_tujuan = $this->input->post("phone");
			$no_tujuan = $this->m_reff->hp($no_tujuan);
			$pesan     = $this->input->post("msg"); 
			$url       = $this->input->post("url"); 
			$this->db->set("tgl",date("Y-m-d H:i:s"));
			$this->db->set("hits",1);
			$this->db->set("sts",0);
			$this->db->set("type",2);
			$this->db->set("url",$url);
			$this->db->set("no_tujuan",$no_tujuan);
			$this->db->set("pesan",$pesan);
			$this->db->set("id_user",$key->id_user);
			$this->db->set("device_sts",$key->sts);
			$this->db->set("sender_number",$key->sender_number);
			$this->db->insert("data_pesan");
			$var["params"] = $this->input->post();
			$var["status"] = "Delivered!";
			return $var; 
		}
		function send_file($key){
			$no_tujuan = $this->input->post("phone");
			$no_tujuan = $this->m_reff->hp($no_tujuan);
			$pesan     = $this->input->post("msg"); 
			$url       = $this->input->post("url"); 
			$this->db->set("tgl",date("Y-m-d H:i:s"));
			$this->db->set("hits",1);
			$this->db->set("sts",0);
			$this->db->set("type",2);
			$this->db->set("url",$url);
			$this->db->set("no_tujuan",$no_tujuan);
			$this->db->set("pesan",$pesan);
			$this->db->set("id_user",$key->id_user);
			$this->db->set("device_sts",$key->sts);
			$this->db->set("sender_number",$key->sender_number);
			$this->db->insert("data_pesan");
			$var["params"] = $this->input->post();
			$var["status"] = "Delivered!";
			return $var; 		
		}
		function getDataMessage(){ 
			$this->db->where("sts",0);
// 			$this->db->where("device_sts",1);
			$this->db->limit(5);
			$db = $this->db->get("data_pesan")->result();
			$var=array();
			$i=1;
			$id ="";
		
			foreach($db as $val){
			    	if($val->url){
        			    $ex = explode("/",$val->url);
        			    $jml =  count($ex);
        			    $nama_file=isset($ex[$jml-1])?($ex[$jml-1]):"";
        			}else{
        			    $nama_file="";
        			}
			
				$var[] = array(
				"sender_number" => $val->sender_number,
				"no_tujuan" => $val->no_tujuan,
				"msg"   => $val->pesan,
				"url"   => $val->url,
				"nama_file" => $nama_file,
				"group" => $val->nama_group,
				"type"  => $val->type,
				"id"    => $val->id,
				"options" =>$val->options
				);
				$id.=$val->id.",";
				$i++;
			}
			
		
			$dataID = $this->m_reff->clearkomaray($id); 
			$this->db->set("sts",1);
			$this->db->where_in("id",$dataID);
			$this->db->update("data_pesan");
			
			$data["data"]=$var;
			$data["dataID"]=$id;
			return $data;
		}
		
		function updateStatusMessage(){
			$data   = $this->input->post("data");
			$data   = json_decode($data,TRUE);
		    foreach($data as $key=>$val){
		        $ack = $val['ack'];
		        $no = $val['to'];
		        $no = str_replace("@c.us","",$no);
		  
		        if(substr(trim($no), 0, 2)=='62'){
						$no = '0'.substr(trim($no), 2);
				}
		        
		        $this->db->set("sts_pesan",$ack);
		    	$this->db->where("no_tujuan",$no);
		    	$pesan = '"body":"hai cep"';
		    	$this->db->where("(pesan='".$val['msg']."' or pesan like '%".$pesan."%' )");
		    	if($ack==1){
		    	    $this->db->where("sts_pesan",0);
		    	}elseif($ack==2){
		    	    $this->db->where("sts_pesan<=",2);
		    	}elseif($ack==3){
		    	    $this->db->where("sts_pesan",2);
		    	}
		        $this->db->update("data_pesan");
		        
		        
		        if($ack==1){
		          //  $this->db->insert("msg_outbox");
		        }
		        
		        
		    }
		    return true;
		}	
		function setQr(){
			$qr   = $this->input->get_post("qr"); 
			$sender_number   = $this->input->get_post("sender_number"); 
			$this->db->where("sender_number",$sender_number);
			$this->db->set("qr",$qr); 
			return $this->db->update("device_stations");
		}	
		function addsender_number(){
			$sender_number   = $this->input->get("sender_number");  
			$this->db->set("sender_number",$sender_number); 
			return $this->db->insert("device_stations");
		}
		function setDeviceStatus(){
			$sender_number   = $this->input->get_post("sender_number");  
			$sts	    = $this->input->get_post("sts");  
			$session    = $this->input->get_post("session");  
			$qr         =   $this->input->get_post("qr");  
			if($session){
				$this->db->set("session",$session); 
			}
			if($qr){
			    	$this->db->set("qr",$qr); 
			}
			$this->db->set("sts",$sts); 
			$this->db->set("updated",date('Y-m-d H:i:s')); 
			$this->db->where("sender_number",$sender_number); 
		    $this->db->update("device_stations");
			 
			    $this->db->set("device_sts",1); 
		    	$this->db->where("sender_number",$sender_number); 
		return   $this->db->update("data_pesan");
		 
			
		}

		function delSessionsFile(){
				$this->db->where("sender_number",$this->input->post("sender_number"));
				$this->db->set("session",null);
				return $this->db->update("device_stations");
		}
		function addSessionsFile(){
			if($this->input->post("id")){
				$this->db->set("sender_number",$this->input->post("sender_number"));
				$this->db->set("sts",$this->input->post("sts"));
				return $this->db->insert("device_stations");
			} return false;
		}

		function setSessionsFile(){
		 
			if($this->input->get_post("sts")){
				$this->db->set("sts",$this->input->get_post("sts"));
			}
			$this->db->set("sender_number",$this->input->get_post("sender_number"));
			return $this->db->update("device_stations");
		}
 
		function getSessionsFile(){
			// $this->db->set("value",$this->input->post("session"));
			$single_number = $this->input->get_post("single_number");
			$to = $this->input->get_post("to");
			$to = str_replace("@c.us","",$to);
			if($to){
			 //   if($single_number){
			 //       $this->db->where("sender_number",$single_number);
			 //   }
				$this->db->set("session",null);
				$this->db->set("sts",0);
				$this->db->where("sender_number",$to);
				$this->db->update("device_stations");
			}
			 //if($single_number){
			 //       $this->db->where("sender_number",$single_number);
			 //   }
			$this->db->set("sts!=",5);
			$this->db->where("session IS NOT NULL");
			$db =  $this->db->get("device_stations")->result_array();
			return $db;
		}
 
		function cekInstruksi(){
			return $this->db->get("pesan_instruksi")->result_array();
		}
		function hapusInstruksi_get(){

			$this->db->where("id",$this->input->post("id"));
			$this->db->delete("pesan_instruksi");
		}
		function getSessionNull(){
			// $this->db->set("value",$this->input->post("session"));
			$to = $this->input->get_post("to");
			$to = str_replace("@c.us","",$to);
			if($to){
			$this->db->where("sender_number",$to);	
			}
	  	
			$this->db->where("sts!=",5);
			$this->db->where("(session IS NULL or session = '')");
			$db =  $this->db->get("device_stations")->result_array();
			return $db;
		}
		function createSession(){
			// $this->db->set("value",$this->input->post("session"));
			$id   = $this->input->get_post("sender_number");
			$desc = $this->input->get_post("desc");
			$this->db->where("sender_number",$id);
			$cek = $this->db->get("device_stations")->num_rows();
			if(!$cek){
				 $this->db->set("sender_number",$id);
				  $this->db->set("sender_name",$desc);
				 $this->db->set("updated",date('Y-m-d H:i:s'));
			return	 $this->db->insert("device_stations");
			 
			} else{
			     $this->db->where("sender_number",$id);
				 $this->db->set("updated",date('Y-m-d H:i:s'));
			return	 $this->db->update("device_stations");
			}
		}
		
			function _createSession(){
			// $this->db->set("value",$this->input->post("session"));
			$id   = $this->input->get_post("sender_number");
			$this->db->where("sender_number",$id);
			$cek = $this->db->get("device_stations")->row();
			if(isset($cek->session)?($cek->session):""){
				// $this->db->where("sender_number",$id);
				// $this->db->update("device_stations");
				return $cek->session;
			}else{
				return false;
				 
			}
		}
		
		function migrasikan_aduan(){
		    $this->db->where("hits",0);
		    $data = $this->db->get("session_aduan")->result_array();
		    foreach($data as $val){
		        $no = sprintf("%05d", $val["id"]);
		        unset($val["id"]);
		        $this->db->set("nomor_aduan",$no);
		        $this->db->set($val);
		        $this->db->insert("data_aduan");
		    }
		    $this->db->where("hits",0);
		    $this->db->delete("session_aduan");
		    return true;
		}
		
		
		
    function _get_data_report($tgl,$grafik){
         
        $tgl1 = $this->tanggal->range_1($tgl);
        $tgl2 = $this->tanggal->range_2($tgl);
        
        if ($tgl1) {
           $this->db->where("tgl>='".$tgl1 . "' AND tgl<='" . $tgl2 . "'");
        }
         if ($grafik == "2" or $grafik == "7") {
            $this->db->group_by("SUBSTRING(tgl,1,10)");
            $this->db->select("SUM(total) as total,tgl");
        }
        if ($grafik == "3" or $grafik == "8") {
            $this->db->group_by("YEARWEEK(SUBSTRING(tgl,1,10))");
            $this->db->select("CONCAT('minggu ke:',WEEK(tgl),'-',YEAR(tgl)) AS tgl,SUM(total) as total");
        }
        if ($grafik == "4" or $grafik == "9") {
            $this->db->group_by("MONTH(SUBSTRING(tgl,1,10))");
            $this->db->select("CONCAT(MONTH(tgl),'-',YEAR(tgl)) AS tgl,SUM(total) as total");
        }
        if ($grafik == "5" or $grafik == "10") {
            
             $this->db->group_by("YEAR(SUBSTRING(tgl,1,10))");
             $this->db->select("YEAR(tgl) AS tgl,SUM(total) as total");
        }
        
	  
		if (strlen(isset($_POST['search']['value'])?($_POST['search']['value']):null)>1) {
					$searchkey = $_POST['search']['value'];
					$searchkey = $this->m_reff->sanitize($searchkey);
					$query=array(
					    "total"=>$searchkey,
						"tgl"=>$searchkey 
						 
					);
					$this->db->group_start()
							->or_like($query)
					->group_end();
					
				}	

			$this->db->order_by("tgl", "asc");
			$query=$this->db->from("data_penjualan");
		return $query;
    }
    	function total($range){
	       $tgl = $range;
        $tgl1 = $this->tanggal->range_1($tgl);
        $tgl2 = $this->tanggal->range_2($tgl);
        $this->db->where("tgl>='".$tgl1 . "' AND tgl<='" . $tgl2 . "'");
	    $this->db->select("SUM(total) as total");
	    $db = $this->db->get("data_penjualan")->row();
	    return isset($db->total)?($db->total):0;
	}
	
	 function generate_grafik($grafik=7,$range=null){

    if($range==null){
        if($grafik==7){
                $awal=$this->tanggal->minTglEng(30,date('Y-m-d'));
            	$awal=$this->tanggal->ind($awal,"/");
        }elseif($grafik==8){
                $awal=$this->tanggal->minTglEng(60,date('Y-m-d'));
            	$awal=$this->tanggal->ind($awal,"/");
        }elseif($grafik==9){
                $awal=$this->tanggal->minTglEng(360,date('Y-m-d'));
            	$awal=$this->tanggal->ind($awal,"/");
        }elseif($grafik==10){
                $awal=$this->tanggal->minTglEng(2000,date('Y-m-d'));
            	$awal=$this->tanggal->ind($awal,"/");
        }else{
                $awal=$this->tanggal->minTglEng(30,date('Y-m-d'));
            	$awal=$this->tanggal->ind($awal,"/");
        }
       	
    	$akhir=date('d/m/Y');
     	$range = $awal." - ".$akhir;
    }else{
        	$awal=$this->tanggal->range_1($range);
	    $akhir=$this->tanggal->range_2($range);
	    
    };
	
	$this->_get_data_report($range,$grafik);
	$db=$this->db->get()->result();
	$tgldb="";$list="";$desc="";$gal=""; $lisrray=array(); $tgldbray=array();
	foreach($db as $datax)
	{
	////
	 
	if($grafik=="7"){
	$gal=$this->tanggal->ind(substr($datax->tgl,0,10),"/"); $desc="Grafik Perhari";}
	
	if($grafik=="8"){
	$gal=$datax->tgl; $desc="Grafik Perminggu";}
	
	if($grafik=="9"){
	$_tgl_=explode("-",$datax->tgl);  $gal=$this->konversi->bulan($_tgl_[0])."-".$_tgl_[1]; $desc="Grafik Perbulan";}
	
	if($grafik=="10"){
	$gal=$datax->tgl;  $desc="Grafik Pertahun"; }
	//////
	
	$tgldb.="'".$gal."', ";
 	$list.=$datax->total.", ";
 	$lisrray[]=(int)$datax->total;
 	$tgldbray[]=$gal;
	}
	
 
 
	                 
                    /**
                     * PHP script to create image exports using the Highcharts Export Server
                     */
                    $type = 'png'; // Can be png, jpeg or pdf
                    // Chart options
                    $options = [
                        // 'chart'=> [
                        //     'backgroundColor'=>'white', 
                        //         'type'=> 'column',
                        //     ],
                        
                        'series' => [[
                            'name'=>$range,
        'data'=>$lisrray,
        'type' => 'area'
    ]],
                        
                        
                        
                        'title'=> [
                         'text'=>'Total penjualan '.number_format($this->total($range),0,",",".").' '
                            ],
                            
                        'subtitle'=> [
                        'text'=> '   '.$desc.'',
                        'floating'=> true,
                        'align'=> 'right',
                        'verticalAlign'=> 'bottom',
                        'y'=> 15
                    ],    
                    
                    
                    
                    'xAxis'=> [
                        'categories'=> $tgldbray,  
                    ],
                    
        'yAxis'=> [
        'title'=> [
              'text'=> 'Jumlah'
        ],
         
        ],
                        'plotOptions'=> [
                            'series'=> [
                                'dataLabels'=> [
                                    'enabled'=> true,
                                    'borderRadius'=> 2,
                                    'y'=> -10,
                                    'shape'=> 'callout',
                                    'color'=>'black',
                                      
                                ]
                            ]
                        ],
                        
                          'credits'=> [
                        'enabled'=> false
                    ]
    
                    ];
                    
                    
                    
                    $arr = [
                        'type' => $type,
                        'width' => 1600,
                        'infile' => $options
                    ];
                   
                    $data = json_encode($arr);
                    $curlProcess = curl_init();
                    curl_setopt( $curlProcess, CURLOPT_URL, 'https://export.highcharts.com/' );
                    curl_setopt(
                        $curlProcess,
                        CURLOPT_HTTPHEADER,
                        array(
                            'Content-Type: application/json',
                            'Content-Length: ' . strlen( $data ), 'Accept: application/json'
                        )
                    );
                    curl_setopt( $curlProcess, CURLOPT_HEADER, 0 );
                    curl_setopt( $curlProcess, CURLOPT_TIMEOUT, 30 );
                    curl_setopt( $curlProcess, CURLOPT_POST, 1 );
                    curl_setopt( $curlProcess, CURLOPT_POSTFIELDS, $data );
                    curl_setopt( $curlProcess, CURLOPT_RETURNTRANSFER, TRUE );
                    $content = curl_exec( $curlProcess );
                    curl_close( $curlProcess );
                    return file_put_contents("chart.$type", $content);
                     
    }
    function kata_antrian($nomor,$cek){
         $intro= 'Nomor antrian anda : *'.sprintf("%03d", $nomor).'*
- '.ucwords(strtolower($cek->poli)).'
- '.$cek->dokter.'
*Hari:*
- '.$this->tanggal->hariLengkapJam($cek->tgl).'
*Jam Praktik:*
- '.$cek->jam.'
----------------------------------------------------
Pasien : _'.$cek->nama.'_
NIK : _'.$cek->nik.'_
Alamat : _'.$cek->alamat.'_

_Silahkan tunjukan bukti pendaftaran ini pada saat kunjungan ditanggal yang telah ditentukan diatas. Terimakasih_'
;
                          $this->m_reff->qr($cek->id,$this->m_reff->encrypt($cek->id));
                          $var["replay"]       = $intro;
                          $var["jenis_pesan"] = 2;
                          $var["file"]        = base_url()."qr/".$cek->id.".png";
                          $var["status"]      = true;
                          $var["options"]     = "";//isset($val['options'])?($val['options']):null;
                          return $var;
        
    }
   
 
	}
?>