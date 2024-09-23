<?php
class Model extends CI_Model
{

    
	public function __construct() {
        parent::__construct();
    }
	
	function insert(){
	    $form = $this->input->post("f");
	    $this->db->set($form);
	    $this->db->set("to",$this->session->userdata("sender_number"));
	    $this->db->set("hp",$this->session->userdata("hp"));
	     $this->db->set("nama",$this->session->userdata("nama"));
	     $this->db->set("sts",1);
	     $this->db->set("tgl",date('Y-m-d H:i:s'));
	    return $this->db->insert("data_survei");
	}
     function cekResto($resto){
    	$this->db->where("sender_name",$resto);
    	return $this->db->get("device_stations")->row();
     }
    function getMenu($jenis){
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
    function update_qty(){
          $id    =   $this->input->post("id");
        $qty    =   $this->input->post("qty");
        if($qty==0){
             $this->db->where("id",$id);
        return $this->db->delete("tm_list_order");
        }
      
        $this->db->set("qty",$qty);
        $this->db->where("id",$id);
        return $this->db->update("tm_list_order");
    }
    function selesai(){
        
        $this->db->select("sum(harga_satuan*qty) as jml,sum(qty) as qty");
        $this->db->where("id_session_order",$this->session->userdata("id_order"));
        $db = $this->db->get("tm_list_order")->row();
        $jml = isset($db->jml)?($db->jml):null;
        $qty = isset($db->qty)?($db->qty):null;
        
        $this->db->set("catatan_pesanan",$this->input->post("cat"));
        $this->db->set("sts",1);
        $this->db->set("harga_final",$jml);
        $this->db->set("qty",$qty);
        $this->db->where("id_order",$this->session->userdata("id_order"));
        $this->db->update("tm_order");
        return $this->session->unset_userdata("id_order");
    }
}
//End of file data_param.php