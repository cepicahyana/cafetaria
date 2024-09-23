<?php
class Model extends CI_Model
{

    
	public function __construct() {
        parent::__construct();
    }
	
	
     function cekResto($resto){
    	$this->db->where("link_name",$resto);
    	return $this->db->get("device_stations")->row();
     }
    function getMenu($jenis,$kat=null){
            //   if($kat){
                   $this->db->where("kategory",$kat);
            //   }
               $this->db->order_by("no","asc");
               $this->db->where("jenis",$jenis);
        	   $this->db->where("sn",$this->session->userdata("sender_number"));
    	return $this->db->get("daftar_menu")->result();
    }
       function getKategoryMenu($jenis){
               $this->db->order_by("kategory","asc");
               $this->db->group_by("kategory");
               $this->db->where("jenis",$jenis);
        	   $this->db->where("sn",$this->session->userdata("sender_number"));
    	return $this->db->get("daftar_menu")->result();
    }
    function getSpecial(){
               $this->db->where("special",1);
        	   $this->db->where("sn",$this->session->userdata("sender_number"));
    	return $this->db->get("daftar_menu")->result();
    }
    function setOrder($id){
   
         $this->db->where("id",$id);
   $db = $this->db->get("daftar_menu")->row();
   $id_barang = isset($db->id)?($db->id):null;
    $harga = isset($db->harga)?($db->harga):null;
    $nama = isset($db->nama)?($db->nama):null;
   if(!$id_barang){ return false;}
        // $this->db->where("hp_pelanggan",$this->session->userdata("hp"));
        // $this->db->where("sn",$this->session->userdata("serial_number"));
        // $this->db->where("sts",0);
        // $cek =  $this->db->get("tm_order")->row();
        $cek = $this->session->userdata("id_order");
        if(!$cek){
            $id_order = $this->session->set_userdata("id_order",$s=date('YmdHis'));
            $data=array(
            "id_order" => $s,
            "id_user"  => $this->session->userdata("sender_number"),
            "qty"  => 1,
            "entry"  => date('Y-m-d H:i:s'),
            "nama_pelanggan"=>$this->session->userdata("nama"),
            "hp_pelanggan"=>$this->session->userdata("hp")
            );
            $this->db->set($data);
            $this->db->insert("tm_order");
            
            
            ///baru
             $data=array(
                        "id_session_order" => $s,
                        "id_user"  => $this->session->userdata("sender_number"),
                        "qty"  =>(1),
                        "harga_satuan"  => $harga,
                        "nama_barang"  => $nama,
                        "entry"  => date('Y-m-d H:i:s'),
                        "kode_barang"=>$id_barang,
                          "hp_pelanggan"=>$this->session->userdata("hp")
                        );
                        $this->db->set($data);
                        return $this->db->insert("tm_list_order");
                        
                        
        }else{
            
            
            $id_order = $this->session->userdata("id_order");
            $data=array(
            "id_session_order" => $id_order,
            "kode_barang"=>$id_barang
            );
            $this->db->where($data);
            $cek = $this->db->get("tm_list_order")->row();
            if(isset($cek)){
                
                //update
                        $data=array(
                        "qty"  =>($cek->qty+1),
                        );
                        $this->db->set($data);
                        $this->db->where("id",$cek->id);
                        return $this->db->update("tm_list_order");
                            
            }else{
                //insert
                  $data=array(
                        "id_session_order" => $id_order,
                        "id_user"  => $this->session->userdata("sender_number"),
                        "qty"  =>(1),
                        "harga_satuan"  => $harga,
                        "nama_barang"  => $nama,
                        "entry"  => date('Y-m-d H:i:s'),
                        "kode_barang"=>$id_barang,
                          "hp_pelanggan"=>$this->session->userdata("hp")
                        );
                        $this->db->set($data);
                        return $this->db->insert("tm_list_order");
            }
            

            
        }
    }
   
    function getListOrder(){
        $this->db->where("id_session_order",$this->session->userdata("id_order"));
        return $this->db->get("tm_list_order")->result();
    }
    // function getTotal(){
    //     $this->db->select("SUM(qty*harga_satuan) as jml");
    //     $this->db->where("id_session_order",$this->session->userdata("id_order"));
    //     $db =  $this->db->get("tm_list_order")->row();
    //     return isset($db->jml)?($db->jml):null;
    // }
    function getTotalItem(){
        $this->db->select("SUM(qty) as item,SUM(qty*harga_satuan) as total");
        $this->db->where("id_session_order",$this->session->userdata("id_order"));
        $db =  $this->db->get("tm_list_order")->row();
        $a["total"] = isset($db->total)?($db->total):null;
         $a["item"] = isset($db->item)?($db->item):null;
         return $a;
    }
    function update_qty(){
        $ido    =   $this->input->post("ido");
        $id    =   $this->input->post("id");
        $qty    =   $this->input->post("qty");
        if($qty==0){
             $this->db->where("id",$id);
          $this->db->delete("tm_list_order");
        }else{
              $this->db->set("qty",$qty);
                $this->db->where("id",$id);
                $this->db->update("tm_list_order");
        }
      
      
        
        if($ido){
            $this->db->select("sum(harga_satuan*qty) as jml,sum(qty) as qty");
            $this->db->where("id_session_order",$ido);
            $db = $this->db->get("tm_list_order")->row();
            $jml = isset($db->jml)?($db->jml):null;
            $qty = isset($db->qty)?($db->qty):null;
             
          
            $this->db->set("harga_final",$jml);
            $this->db->set("qty",$qty);
            $this->db->where("id_order",$ido);
            return $this->db->update("tm_order");
        }else{
            return true;
        }
        
        
        
    }
    function selesai(){
        
        
        
        
        $this->db->select("sum(harga_satuan*qty) as jml,sum(qty) as qty");
        $this->db->where("id_session_order",$this->session->userdata("id_order"));
        $db = $this->db->get("tm_list_order")->row();
        $jml = isset($db->jml)?($db->jml):null;
        $qty = isset($db->qty)?($db->qty):null;
        
        $this->db->set("no_meja",$no_meja=$this->input->post("no_meja"));
        $this->db->set("nama_pelanggan",$nama_pelanggan=$this->input->post("nama"));
        $this->db->set("catatan_pesanan",$c=$this->input->post("cat"));
        $this->db->set("sts",1);
        $this->db->set("harga_final",$jml);
        $this->db->set("qty",$qty);
        $this->db->where("id_order",$ido=$this->session->userdata("id_order"));
        $this->db->set("fix_order_time",date('Y-m-d H:i:s'));
        $this->db->update("tm_order");
        $this->session->unset_userdata("id_order");
        $this->kirim_notif_pelanggan($ido,$nama_pelanggan,$no_meja,$c);
        $this->sent_notif_order($ido,$no_meja,$nama_pelanggan,$c);
        $this->session->set_userdata("nama_pelanggan",$nama_pelanggan);
        return true;
    }
    
    function kirim_notif_pelanggan($ido,$nama_pelanggan,$no_meja,$c){
        $this->db->where("id_session_order",$ido);
        $db = $this->db->get("tm_list_order")->result();
        $detail="";$t=0;
        foreach($db as $val){
           
            $detail.="(".$val->qty.") ".$val->nama_barang." - ".($val->qty*$val->harga_satuan)."\n";
            $t=($val->qty*$val->harga_satuan)+$t;
        }
        $detail.="*Total :* Rp ".number_format($t,0,",",".")."\n\n";
        $detail.="*Pesanan atas nama :* ".$nama_pelanggan."\n";
        $detail.="*Nomor meja :* ".$no_meja."\n";
        $detail.="*Catatan pesanan:* ".$c."\n";
        $detail.="\n_Jika ada kekeliruan mohon hubungi pelayan kami ya kak_ 😊";
                           $intro = "📍 *".$this->session->userdata("sender_name")."*\nTerimakasih pesanan kakak akan segera diproses, mohon tunggu ya 😊\ndan berikut detail pesanan kakak :\n\n".$detail;
                           $this->db->set("hits",2);
                           $this->db->set("type",1);
                           $this->db->set("pesan",$intro);
                           $this->db->set("no_tujuan",$this->session->userdata("hp"));
                           $this->db->set("sender_number",$this->session->userdata("sender_number"));
                           $this->db->set("judul_pesan","order by app");
                           $this->db->insert("data_pesan");
    }
    function sent_notif_order($ido,$no_meja,$nama,$c){
       $client=$this->session->userdata();
       $sender=$this->session->userdata("hp");
       $to  = isset($client['sender_number'])?($client['sender_number']):null;
       $notif = isset($client['notif_order'])?($client['notif_order']):null;
       if(!$notif){ return false;}
       $notif = json_decode($notif,true);
      
      
        $this->db->where("id_session_order",$ido);
        $db = $this->db->get("tm_list_order")->result();
        $detail="";$t=0;
        foreach($db as $val){
           
            $detail.="(".$val->qty.") ".$val->nama_barang." - ".($val->qty*$val->harga_satuan)."\n";
            $t=($val->qty*$val->harga_satuan)+$t;
        }
        $detail.="*Total :* ".number_format($t,0,",",".")."\n";
        $detail.="*Catatan pesanan:* ".$c."\n";
       
       
       
       
       $time = date('d-m-Y H:i:s');
       
         $detail = str_replace("\n","\n",$detail);
         $detail = str_replace("\r","\n",$detail);
       
        foreach($notif as $key=>$val){
    
        //  $option = '[{"text":"Cek Order","url":"'.base_url().'/master/order?id='.$this->m_reff->encrypt($to).'"}]';
// $msg = "*ORDER MASUK*\\nMeja: ".$no_meja."\\nNama: ".$nama."\\n\\n*Order:*\\n".$detail."\\n\\n🕐 _".$time." WIB_";  

// $msg = '{"body":"'.$msg.'","title":"","footer":"'.$client['sender_name'].'"}';
        
$msg ="*ORDER MASUK*\nMeja: ".$no_meja."\nNama: ".$nama."\n\n*Order:*\n".$detail."\n🕐 _".$time." WIB_\nCek order:\n".base_url()."master/order?id=".$this->m_reff->resto()->kode;  

        if(strlen($val)>5 and strlen($to)>5){
                    $this->db->set("hits",2);
                    $this->db->set("sender_number",$to);
                    // $this->db->set("options",$option);
                    $this->db->set("judul_pesan","Notif order");
                    $this->db->set("type",1);
                    $this->db->set("pesan",$msg);
                    $this->db->set("no_tujuan",$val);
                    $this->db->insert("data_pesan"); 
        }
        
        } return true;
    }
}
//End of file data_param.php