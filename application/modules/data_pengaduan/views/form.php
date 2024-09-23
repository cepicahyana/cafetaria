<?php
$id = $this->input->post("id");
$this->db->where("id",$id);
$data = $this->db->get("data_aduan")->row();
$sts = $data->sts;
  $penanganan=$data->penanganan;
?>
<div class="modal-content">
    <div class="modal-header">  <h5 class="modal-titles" id="defaultModalLabel"><b>Update</b></h5>
		<button type="button" class="close" aria-label="Close" data-dismiss="modal">
	    	<span aria-hidden="true">×</span>
		</button>
	</div>


	<div class="modal-body">
		<form  action="javascript:submitForm('modal')" id="modal" url="<?php echo site_url("data_pengaduan/update")?>"  method="post" enctype="multipart/form-data">
			<input type="hidden" id="formToken" name="<?php echo $this->m_reff->tokenName()?>" value="<?php echo $this->m_reff->getToken()?>">
			<?php echo form_hidden('id', $id);?> 
		 
		 <div class="form-group ">
			    <div class="row">
				 
				<div class="col-md-12 alert alert-info">
					 <center>
					    <b>Pengaduan : </b><br>
						 <?=$data->aduan;?>
						 </center>
					 
				</div>
				</div>
			</div>
			
			<div class="form-group ">
			    <div class="row">
				<div class="col-md-3">
					<label class="form-label" for="nama">Status aduan</label>
				</div>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-3"> <label class="rdiobox"><input value="0" name="f[sts]" type="radio" <?php if($sts=="0"){ echo "checked";}?>> <span>Open</span></label> </div>
						<div class="col-md-3"> <label class="rdiobox"><input value="1" name="f[sts]" type="radio" <?php if($sts=="1"){ echo "checked";}?>> <span>Close</span></label> </div>
						<div class="col-md-3"> <label class="rdiobox"><input value="2" name="f[sts]" type="radio" <?php if($sts=="2"){ echo "checked";}?>> <span>Hold</span></label> </div>
				
					</div>
				</div>
				</div>
			</div>
			 
			<div class="form-group ">
				<div class="row">
					<div class="col-md-12">
						<label class="form-label" for="hp">Tindak lanjut / Penanganan</label>
					</div>
					<div class="col-md-12">
						<textarea class="form-control" name="f[penanganan]"><?=$penanganan;?></textarea>
					</div>
				</div>
			</div>
			 

			<div class="col-lg-12 p-1">
				<center>
					<button class="btn btn-success button_save" onclick="submitForm('modal')"><i class="fa fa-save"></i> simpan</button>
				</center>
			</div>
		</form>
	</div>
</div>

<script>
$('#imgUpload').on('change',function(e){
	var ol =  e.target;
	var extension = $('#imgUpload').val().split('.').pop().toLowerCase();
	if(extension != ''){
		if(jQuery.inArray(extension, ['png','jpg','jpeg']) == -1)
		{
			alert("Image File must be .png / .jpg");
			imgUpload.value = "";
			return false;
		}
	}
	const [file] = ol.files;
	const siz = ol.files[0].size;
	if (siz>1000000) {
		alert("Not allowed!, file size max 1 MB");
		imgUpload.value = "";
		PreviewImg.src = "";
		return false;
	}
	if (file) {
		PreviewImg.src = URL.createObjectURL(file)
	}
});
</script>