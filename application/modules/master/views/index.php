<?php
$this->db->where("sender_number",$this->session->userdata("sn"));
$data = $this->db->get("device_stations")->row();
$sts = isset($data->sts)?($data->sts):null;
$qr = base_url().'device/imgQR?id='.$data->id;
$link = '<span class="cursor">  <span class="btn-light btn btn-sm">Jika whatsapp terputus silahkan scan ulang pada link dibawah ini :<br> <a class="text-black" href="'.$qr.'">'.$qr.'</a></span> </span> ';
if($sts==0){
    $info_sts = "Disconnect";
    $icon ="text-danger";
}elseif($sts==1){
    $info_sts = "Connect";
    $link="Saat ini perangkat anda terhubung dengan baik";
       $icon ="text-success";
}elseif($sts==2){
    $info_sts= "Scan";     $icon ="text-danger";
}else{
    $info_sts= "Connecting";
        $link="Saat ini perangkat anda terhubung dengan baik";
            $icon ="text-secondary";
}
$total = $data->jml_hari*$data->price_order;
?>
 <br>

					<!-- main-content-body -->
					<div class="main-content-body ">
<center>
 
	<div class="col-md-12s row">
		
 <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12">
	 <div class="card"> 
		<div class="card-body"> 
			<div class="plan-card text-center"> <i class="fas fa-thumbs-up plan-icon text-success"></i> 
			<h6 class="text-drak text-uppercase mt-2">Status </h6>
			<h2 class="mb-2 <?=$icon;?>"><?=$info_sts;?></h2> 
			 <hr>
			<?=$link;?>
				
				  
			</div> 
		</div> 
	</div> 
</div> 
 
<div class="col-xl-12 col-md-6 col-lg-6 col-sm-6">
	 <div class="card" id="loading"> 
		<div class="card-body text-left"> 
			
		<div class="form-group "> <div class="row"> 

		<div class="col-md-12">
		    <center>
		        Sisa credit anda :<br>
        		     <h3> Rp <?=number_format($data->credit,0,",",".");?></h3> 
		</center>
		  
			
			</div> 
		</div> 
		</div>

  

		 


		</div> 
	</div> 
</div>

 
 
	</div>
</center>
 
<div class=" ">
	 <div class="card"> 
		<div class="card-body"> 
			<div class="plan-card text-justify"> 
				<b class="text-justify">Ketentuan:</b><br>
				<ul  style="margin-left:-30px">
				    <li>
				               Credit anda   berkurang Rp <?=number_format($data->price_order,0,",",".");?>/hari jika pelanggan anda menggunakan fiture ORDER.
				    </li>
				     <li>
				               Credit anda   berkurang Rp <?=number_format($data->price_access,0,",",".");?>/hari jika dalam satu hari hanya mengakses layanan RESTOBOT tanpa menggunakan fiture ORDER.
				    </li>
				    <li>
				        Credit anda tidak akan berkurang jika Toko anda tutup atau layanan RESTOBOT tidak digunakan oleh pelanggan anda.
				    </li>
				</ul>
       
			</div> 
		</div> 
	</div> 
</div>

					 
						<!-- /row -->
					</div>
		 