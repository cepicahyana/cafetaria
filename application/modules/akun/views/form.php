<?php
$get_controller = $this->router->fetch_class();
$id = $this->input->post('id') ?? '' ;
$q = $this->mdl->getById($id)->row();
$nama_lengkap = $q->owner ?? '';
$nama_cs = $q->nama_cs ?? '';
$jk = $q->jk ?? '';
$sts_akun = $q->sts_akun ?? '';
$telp = $q->telp ?? '';
$poto = $q->poto ?? '';
$username=$q->username ?? '';
$password=$q->password ?? '';
$action_url = ('' !== $id) ? '/update_data' : '/insert_data' ;
$required = ('' !== $id) ? '' : 'required' ;

if($poto!=''){
	$img=''.base_url().'file_upload/foto/'.$poto.'';
}else{
	$img=''.base_url().'file_upload/foto/no-image.png';
}
?>
<div class="modal-content">
    <div class="modal-header">  <h5 class="modal-titles" id="defaultModalLabel"><b>Kontak Group</b></h5>
		<button type="button" class="close" aria-label="Close" data-dismiss="modal">
	    	<span aria-hidden="true">×</span>
		</button>
	</div>


	<div class="modal-body">
		<form  action="javascript:submitForm('modal')" id="modal" url="<?php echo site_url($get_controller.$action_url)?>"  method="post" enctype="multipart/form-data">
			<input type="hidden" id="formToken" name="<?php echo $this->m_reff->tokenName()?>" value="<?php echo $this->m_reff->getToken()?>">
			<?php echo form_hidden('id', $id);?>
            <?php echo form_hidden('poto_b', $poto);?>
            <?php echo form_hidden('username_b', $username);?>
			<div class="form-group ">
				<div class="row">
					<div class="col-md-3">
						<label class="form-label" for="nama">Nama Lengkap</label>
					</div>
					<div class="col-md-9">
						<input name="f[owner]"  type="text" class="form-control" value="<?= set_value('owner', $nama_lengkap);?>" autofocus required>
					</div>
				</div>
			</div>
			<div class="form-group ">
				<div class="row">
					<div class="col-md-3">
						<label class="form-label" for="nama">Nama CS</label>
					</div>
					<div class="col-md-9">
						<input name="f[nama_cs]"  type="text" class="form-control" value="<?= set_value('nama_cs', $nama_cs);?>" required>
					</div>
				</div>
			</div>
			<div class="form-group ">
			    <div class="row">
				<div class="col-md-3">
					<label class="form-label" for="nama">Jenis Kelamin</label>
				</div>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-5"> <label class="rdiobox"><input value="Laki-laki" name="f[jk]" type="radio" <?php if($jk=="Laki-laki"){ echo "checked";}?>> <span>Laki-laki</span></label> </div>
						<div class="col-md-5"> <label class="rdiobox"><input value="Perempuan" name="f[jk]" type="radio" <?php if($jk=="Perempuan"){ echo "checked";}?>> <span>Perempuan</span></label> </div>
					</div>
				</div>
				</div>
			</div>
			<div class="form-group ">
			    <div class="row">
				<div class="col-md-3">
					<label class="form-label" for="nama">Status Akun</label>
				</div>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-5"> <label class="rdiobox"><input value="aktif" name="f[sts_akun]" type="radio" <?php if($sts_akun=="aktif"){ echo "checked";}?>> <span>Aktif</span></label> </div>
						<div class="col-md-5"> <label class="rdiobox"><input value="nonaktif" name="f[sts_akun]" type="radio" <?php if($sts_akun=="nonaktif"){ echo "checked";}?>> <span>Non Aktif</span></label> </div>
					</div>
				</div>
				</div>
			</div>
			<div class="form-group ">
				<div class="row">
					<div class="col-md-3">
						<label class="form-label" for="hp">Nomor WA</label>
					</div>
					<div class="col-md-9">
						<input name="f[telp]" type="text" class="form-control" value="<?= set_value('telp', $telp);?>" required>
					</div>
				</div>
			</div>
			<div class="form-group ">
				<div class="row">
					<div class="col-md-3">
						<label class="form-label" for="hp">Foto</label>
					</div>
					<div class="col-md-9">
						<input name="poto" type="file" class="form-control" id="imgUpload">
						<img width="50%" height="auto" id="PreviewImg" src="<?= $img ?>">
					</div>
				</div>
			</div>
			<div class="form-group ">
				<div class="row">
					<div class="col-md-3">
						<label class="form-label" for="hp">Username</label>
					</div>
					<div class="col-md-9">
						<input name="f[username]" type="text" class="form-control" value="<?= set_value('username', $username);?>" required>
					</div>
				</div>
			</div>
			<div class="form-group ">
				<div class="row">
					<div class="col-md-3">
						<label class="form-label" for="hp">Password</label>
					</div>
					<div class="col-md-9">
						<input name="password" type="password" class="form-control" placeholder="(hanya di isi untuk password baru)" <?= $required ?>>
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