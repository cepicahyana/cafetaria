	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
						<div>
							<h4 class="content-title mb-2"><i class="fa fa-mobile-alt"></i> Device setting</h4>
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Pengaturan perangkat yang digunakan</a></li>
									<!-- <li class="breadcrumb-item active" aria-current="page">Project</li> -->
								</ol>
							</nav>
						</div>
					 
					</div>
					<!-- /breadcrumb -->


					<!-- main-content-body -->
					<div class="main-content-body ">
<center>
 
	<div class="col-md-12s row">
		
<!-- <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12">
	 <div class="card"> 
		<div class="card-body"> 
			<div class="plan-card text-center"> <i class="fas fa-thumbs-up plan-icon text-success"></i> 
			<h6 class="text-drak text-uppercase mt-2">Status  </h6>
			<h2 class="mb-2 text-success">connect</h2> 
			<span class="cursor">  <button class="btn-secondary btn btn-sm">scan ulang QR Code</button> </span> 
				 <hr>
				 jika nomor pengiriman anda akan diganti atau mengalami kendala
				 dalam pengiriman pesan silahkan scan ulang QR Code.
			</div> 
		</div> 
	</div> 
</div> -->
 
<div class="col-xl-12 col-md-6 col-lg-6 col-sm-6">
	 <div class="card" id="loading"> 
		<div class="card-body text-left"> 
			
		<div class="form-group "> <div class="row"> 

		<div class="col-md-12">
			<div id="data_perangkat"></div>
			
			</div>


<!--
			<div class="col-md-12"> <label class="form-label mt-1 text-black">No WA yang digunakan untuk pengiriman :</label> </div> 
			<div class="col-md-12 row">
			 
			<div class="col-lg-6 mg-t-20 mg-lg-t-0" onclick="setSender(1)"> <div class="input-group"> <div class="input-group-prepend"> <div class="input-group-text"> 
				<label class="rdiobox wd-16 mg-b-0"><input <?php echo $dev1;?>  id="kontak" name="sender" type="radio"><span></span></label> </div> </div>
			<label class="form-control"  for="kontak" > Menggunakan nomor pribadi </label></div>
			<br><b>Avaliable fiture :</b><br>
			&#x2713; All fitures available
 
			</div>

			<div class="col-lg-6 mg-t-20 mg-lg-t-0" onclick="setSender(2)"> <div class="input-group"> <div class="input-group-prepend"> <div class="input-group-text"> 
				<label class="rdiobox wd-16 mg-b-0"><input  <?php echo $dev2;?> id="customs" name="sender" type="radio"><span></span></label> </div> </div>
			<label class="form-control"  for="customs" > Menggunakan nomor dari konekwa.com  </label></div>
			<br><b>Avaliable fiture :</b>
			<ul style="margin-left:-39px;margin-top:0px;list-style:none">
				<li> &#x2717; <strike> Auto replay message </strike></li>
			    <li> &#x2717; <strike> Inbox (Pesan masuk)</strike></li>
			 
			</ul>
		 
			</div>
 
			</div> -->
		</div> 
		</div>

<!--
		<div class="form-group" id="inputWa"> <div class="row"> 
			<div class="col-md-3"> <label class="form-label mt-1" for="wakonek">No WA yang digunakan
				sebagai pengiriman
			</label> </div> 
			<div class="col-md-6">
			 <input type="text" id="wakonek" name="waself" class="form-control" placeholder="no wa" value=""> 
			</div> 
			<div class="col-md-3">
			 <button class="btn-secondary btn" onclick="scanQr()"><i class="fa fa-save"></i> SAVE & SCAN QR</button>
			</div> 
		</div> 
		</div>
-->

	

		 


		</div> 
	</div> 
</div>

 
 
	</div>
</center>
<!--
<div class=" ">
	 <div class="card"> 
		<div class="card-body"> 
			<div class="plan-card text-justify"> 
				<b class="text-justify">Penting:</b><br>

				Jika menggunakan nomor pengiriman dari konekwa.com anda tidak perlu menyediakan nomor whatsapp
				atau perangkat yang harus standby ditempat anda karena nomor yang akan digunakan 
				adalah nomor random yang disediakan oleh konekwa.com yang dipergunakan juga
				untuk pelanggan kami yang lain, selain dari pada itu terdapat beberapa fiture yang tidak tersedia
				jika mengguanakan nomor pengiriman dari konekwa.com seperti fiture auto replay dan inbox (pesan masuk).<br>
				<br>
				Gunakan nomor pengiriman pribadi untuk layanan yang lebih propesional, selain dapat mengakses semua fiture
				dengan menyediakan nomor pribadi layanan whatsapp anda akan lebih stabil tanpa terganggu trafik dari 
				pelanggan kami yang lain karena nomor yang anda gunakan merupakan nomor yang anda siapkan.
				<hr>
				<b>Persyaratan menggunakan nomor wa dari konekwa.com :</b><br>
				Dilarang mengirim pesan untuk hal negatif seperti penipuan, perjudian dan tindakan yang melanggar
				hukum dan norma yang berlaku serta <a href="">menyetuji ketentuan dan kebijakan dari konekwa.com</a>  lainnya.
				 <hr>
				<b>Persyaratan menggunakan nomor wa pribadi:</b><br>
				Cara kerja ini mirip seperti <i>whatsapp web</i> yang harus scan QRCODE yang kami sediakan, selama
				anda menggunakan layanan konekwa.com whatsapp anda harus online, kelancaran pengiriman pesan 
				tergantung dari whatsapp diperangkat anda.
			</div> 
		</div> 
	</div> 
</div>-->

					 
						<!-- /row -->
					</div>
					
 <script>
	
	 <?php
	 if($dev1=="checked"){
		echo '$("#inputWa").show()';
	 }else{
		echo '$("#inputWa").hide()';
	 }?>
	 	 
	 function setSender(sts){
		 if(sts==1){
			 $("#inputWa").show();
		 }else{
			$("#inputWa").hide();
		 }
		var url   = "<?php echo site_url("device/setDevice");?>";
		var param = {sts:sts,<?php echo $this->m_reff->tokenName()?>:token};
		loading("loading");
				$.ajax({
						type: "POST",dataType: "json",data: param, url: url,
						success: function(val){
							swal("success", {
									icon: "success",
									buttons : {
										confirm : {
											className: 'btn btn-success'
										}
									}
								});
							token=val['token'];
							unblock("loading");
						}
				});	
	 }

	 function hapus_device(id,device){
							swal({
								  title: 'Penting !',
								  text: 'Dengan menghapus sender '+device+' maka data inbox,outbox,autoreplay serta sisa paket layanan untuk sender '+device+' akan terhapus, lanjutkan menghapus ?',
								  type: 'warning',
								  buttons:{
									  cancel: {
										  visible: true,
										  text : 'cancel',
										  className: 'btn btn-dark'
									  },        			
									  confirm: {
										  text : 'Yes',
										  className : 'btn btn-danger'
									  }
								  }
							  }).then((willDelete) => {
								  if (willDelete) {
									var url   = "<?php echo site_url("device/device_delete");?>";
									var param = {id:id,<?php echo $this->m_reff->tokenName()?>:token};
									loading("data_perangkat");
											$.ajax({
													type: "POST",dataType: "json",data: param, url: url,
													success: function(val){
														data_perangkat();
														token=val['token'];
														swal_notif("success!");
														unblock("data_perangkat");
													}
											});	
								
								  }
								  });
	 }
		 

	 function scan(id){
		 var wa = $("[name='waself']").val();
		 $("#mdl_modal").modal({backdrop: 'static', keyboard: false});
		 var url   = "<?php echo site_url("device/scan");?>";
		var param = {id:id,<?php echo $this->m_reff->tokenName()?>:token};
		loading("area_modal");
				$.ajax({
						type: "POST",dataType: "json",data: param, url: url,
						success: function(val){
							 $("#isi_qr").html(val["data"]);
							token=val['token'];
							unblock("area_modal");
						}
				});	
	 }
	 data_perangkat();
	 function data_perangkat(){
		var url   = "<?php echo site_url("device/data_perangkat");?>";
		var param = {<?php echo $this->m_reff->tokenName()?>:token};
		loading("data_perangkat");
				$.ajax({
						type: "POST",dataType: "json",data: param, url: url,
						success: function(val){
							 $("#data_perangkat").html(val["data"]);
							token=val['token'];
							unblock("data_perangkat");
						}
				});	
	 }

	 function newSender(){ 
		$("#mdl_sender").modal();
		var url   = "<?php echo site_url("device/newSender");?>";
		var param = {<?php echo $this->m_reff->tokenName()?>:token};
		loading("area_form");
				$.ajax({
						type: "POST",dataType: "json",data: param, url: url,
						success: function(val){
							 $("#data_form").html(val["data"]);
							token=val['token'];
							unblock("area_form");
						
						
						}
				});	
	 }
	 function edit_device(id){ 
		$("#mdl_sender").modal();
		var url   = "<?php echo site_url("device/edit_device");?>";
		var param = {id:id,<?php echo $this->m_reff->tokenName()?>:token};
		loading("area_form");
				$.ajax({
						type: "POST",dataType: "json",data: param, url: url,
						success: function(val){
							 $("#data_form").html(val["data"]);
							token=val['token'];
							unblock("area_form");
						
						
						}
				});	
	 }
	 function reload_table(){
		data_perangkat();
	 }
 
</script>

<script>
    function close_scan(){
       window.location.href="";
    }
    </script>
<div class="modal effect-flip-vertical" id="mdl_modal" style="z-index:1500" role="dialog">
                <div class="modal-dialog modal-sm" id="area_modal" role="document">
				 <div id="isi_qr"></div>
				</div>
				 
   </div> 




   <div class="modal effect-flip-vertical" id="mdl_sender" style="z-index:1500" role="dialog">
                <div class="modal-dialog modal-md" id="area_form" role="document">
				 <div id="data_form"></div>
				</div>
				 
   </div> 