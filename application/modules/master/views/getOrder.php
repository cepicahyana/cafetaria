<?php
$tgl =$this->input->post("tgl");
$this->db->where("DATE(entry)",$tgl);
$this->db->where("id_user",$this->session->userdata("sn"));
//$this->db->order_by("id","asc");
$this->db->order_by("sts","asc");
$this->db->where("del","0");
$this->db->where("sts!=",0);
$data = $this->db->get("tm_order");
if(!isset($data->row()->id)){
    echo "<div class='alert alert-secondary'> Data order tidak tersedia! </div> "; return false;
}
if(date('Y-m-d')==$tgl){
    $hari ="Hari ini";
}else{
    $hari = $this->tanggal->hariLengkap($tgl,"/");
}


foreach($data->result() as $val){
    
    $this->db->where("id_session_order",$val->id_order);
    $db = $this->db->get("tm_list_order")->result();
    $detail="";
    foreach($db as $v){
          $detail.= $v->nama_barang." (".$v->qty.")".br();
        }
        $detail.=br().'"'.$val->catatan_pesanan.'"';
        
         $tombol = ""; $hapus = "";
            if($val->sts==0){
               $sts = "<span class='badge bg-secondary text-white'> Start (Pelanggan akan memesan)</span>";
               $hapus = "<span  onclick='hapus(`".$val->id."`,`".$val->no_meja."`,`".$tgl."`)' style='float:right;text-align:right;font-size:10px;color:red'>&times; Hapus</span>";
            } elseif($val->sts==1){
                      $hapus = "<span  onclick='hapus(`".$val->id."`,`".$val->no_meja."`,`".$tgl."`)' style='float:right;text-align:right;font-size:10px;color:red'>&times; Hapus</span>";
                 $sts = "<span class='badge bg-success text-white'>Konfirmasi Order (mohon dikonfirmasi)</span>";
                 $tombol= "<span class='btn-group'>
                 <button class='btn btn-info' onclick='perubahan(`".$val->id_order."`,`".$val->no_meja."`,`".$tgl."`)'><i class='fa fa-paper-plane'></i> klik disini jika ada perubahan order</button>
                 <button class='btn btn-warning' onclick='konfirm(`".$val->id."`,`".$val->no_meja."`,`".$tgl."`)'><i class='fa fa-paper-plane'></i> klik disini jika order sudah sesuai</button>
                 </span>"; 
             
            
                
            } elseif($val->sts==2){
                    //   $hapus = "<span  onclick='hapus(`".$val->id."`,`".$val->no_meja."`,`".$tgl."`)' style='float:right;text-align:right;font-size:10px;color:red'>&times; Hapus</span>";
                 $sts = "<span class='badge bg-warning text-black'>Fix Order (mohon segera diproses)</span>";
                 $tombol = "<button class='btn btn-success' onclick='selesai(`".$val->id."`,`".$val->no_meja."`,`".$tgl."`)'><i class='fa fa-paper-plane'></i> klik disini jika order selesai diproses</button>"; 
            }else{
                       $sts = "<span class='badge bg-light text-black'>Pesanan sudah diselesaikan dengan durasi ".$this->tanggal->selisih_waktu($val->fix_order_time,$val->deliv)."</span>";
                $tombol = "";
            }
            echo "
            <div class='card alert alert-secondary'> $hapus
            Meja nomor : $val->no_meja - $val->nama_pelanggan<br>
            Total Harga : Rp ".number_format($val->harga_final,0,",",".")."
            <span class='alert-secondary'><pre>".str_replace('/\n/g','<br>',$detail)."</pre></span>
            Status : $sts
            <span> <i class='fa fa-clock'></i>  Jam ".substr($val->entry,10,6)." WIB (".$this->tanggal->selisih_waktu($val->entry)." yang lalu)</span>
            $tombol
            </div>";


}
?>
