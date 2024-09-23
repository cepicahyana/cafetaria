<?php
$get_controller = $this->router->fetch_class();
?>
<div class="modal-content">
    <div class="modal-header">  <h5 class="modal-titles" id="defaultModalLabel"><b>Group Broadcast</b></h5>
		<button type="button" class="close" aria-label="Close" data-dismiss="modal">
	    	<span aria-hidden="true">×</span>
		</button>
	</div>


	<div class="modal-body">
		<form  action="javascript:submitForm('modal')" id="modal" url="<?php echo site_url($get_controller.'/insert_data')?>"  method="post">
			<input type="hidden" id="formToken" name="<?php echo $this->m_reff->tokenName()?>" value="<?php echo $this->m_reff->getToken()?>">
			<h6 class="card-titles ">Jenis Group</h6>
			<div class="row">
				
				<div class="col-md-5"> <label class="rdiobox"><input onclick="jenis(0)" checked value="0" name="f[jenis]" type="radio"> <span>Group Whatsapp</span></label> </div>
				<div class="col-md-6"> <label class="rdiobox"><input onclick="jenis(1)" value="1" name="f[jenis]" type="radio"> <span>Group kontak</span></label> </div>
			</div>
			<br>
			<div class="form-group kd">
				<h6 class="card-titles ">Kode Group</h6>
				<div class="pos-relative -mt-2">
					<input type="text" name="f[kode]"   autocomplete="off" class='form-control'>
				</div> 
			</div>
			<div class="form-group">
				<h6 class="card-titles ">Nama Group</h6>
				<div class="pos-relative -mt-2">
					<input type="text" name="f[nama]" autocomplete="off" class='form-control'>
				</div> 
			</div>
			
<br>
			<div class="col-lg-12 p-1">
				<center>
					<button class="btn btn-success button_save" onclick="submitForm('modal')"><i class="fa fa-save"></i> simpan</button>
				</center>
			</div>
		</form>
	</div>
</div>


<script>
function jenis(val){
if(val==0){
	$(".kd").show();
}else{
	$(".kd").hide();
}
}
</script>