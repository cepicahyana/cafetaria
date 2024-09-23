<?php
$sn = $this->session->userdata("sn");
$this->db->where("sender_number",$sn);
$data = $this->db->get("device_stations")->row();
$price_order = $data->price_order;
$price_access = $data->price_access;


?>
<!-- main-content-body --><br>
					<div class="main-content-body ">
<center>
 
	<div class="col-md-12s row">

 <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12">
	 <div class="card"> 
		<div class="card-body"> 
		 		<div class="alert alert-info">REPORT 20 HARI TERAKHIR</div>
		 <table class="entry" width="100%">
		     <thead>
		         <th>Tanggal</th>
		         <th>Diakses</th>
		         <th>Order</th>
		         <th>Credit</th>
		     </thead>
		     <?php
		     for($i=20;$i>0;$i--){
		         $tgl = $this->tanggal->minTgl($i,date('Y-m-d'));
		         $tgl2 = $this->tanggal->eng($tgl,"-");
		         if($tgl2==date('Y-m-d')){
		             $t = "<span class='text-primary'>Hari ini</span>";
		         }else{
		             $t = $this->tanggal->hariLengkap($tgl2,"/");
		         }
		         if($a=$this->mdl->diakses($tgl2)){
		             $diakses = $this->mdl->diakses($tgl2)." Orang";
		         }else{
		             $diakses = "-";
		         }
		         
		         if($o=$this->mdl->diorder($tgl2)){
		             $diorder = $this->mdl->diorder($tgl2)." Order";
		         }else{
		             $diorder = "-";
		         }
		         
		         
		         if($o){
		             $credit = $price_order;
		         }elseif($a){
		             $credit = $price_access;
		         }else{
		             $credit = "-";
		         }
		         
		         echo "<tr>
		         <td>".$t."</td>
		         <td>".$diakses."</td>
		         <td>".$diorder."</td>
		         <td>".$credit."</td>
		         </tr>";
		     }
		     ?>
		     <tr>
		         
		     </tr>
		 </table>
		 
		 
		 
		 
		 
		 
		 
		 
		</div> 
	</div> 
</div> 
 
  
	</div>
</center>
 
 

					 
						<!-- /row -->
					</div>
		 