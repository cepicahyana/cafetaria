<?php
$get_controller = $this->router->fetch_class();
$id = $this->input->post('id') ?? '' ;
$q = $this->mdl->getById($id)->row();
$sender_name = $q->sender_name ?? '';
$sender_number = $q->sender_number ?? '';
$kode = $q->kode ?? '';
$credit = $q->credit ?? '';
$owner = $q->owner ?? '';
$hp_owner = $q->hp_owner ?? '';
$price_access = $q->price_access ?? '';
$price_order = $q->price_order ?? '';
$alamat = $q->alamat ?? '';
 
$action_url = ('' !== $id) ? '/update_data' : '/insert_data' ;
$required = ('' !== $id) ? '' : 'required' ;

 
?>
<div class="modal-content">
    <div class="modal-header">  <h5 class="modal-titles" id="defaultModalLabel"><b>Data pelanggan</b></h5>
		<button type="button" class="close" aria-label="Close" data-dismiss="modal">
	    	<span aria-hidden="true">×</span>
		</button>
	</div>


	<div class="modal-body">
		<form  action="javascript:submitForm('modal')" id="modal" url="<?php echo site_url($get_controller.$action_url)?>"  method="post" enctype="multipart/form-data">
			<input type="hidden" id="formToken" name="<?php echo $this->m_reff->tokenName()?>" value="<?php echo $this->m_reff->getToken()?>">
			<?php echo form_hidden('id', $id);?>
			<?php echo form_hidden('sn', $sender_number);?>
             
			<div class="form-group ">
				<div class="row">
					<div class="col-md-3">
						<label class="form-label" for="nama">RESTO</label>
					</div>
					<div class="col-md-9">
						<input name="f[sender_name]"  type="text" class="form-control" value="<?= $sender_name;?>" autofocus required>
					</div>
				</div>
			</div>
				<div class="form-group ">
				<div class="row">
					<div class="col-md-3">
						<label class="form-label" for="nama">ALAMAT</label>
					</div>
					<div class="col-md-9">
						<input name="f[alamat]"  type="text" class="form-control" value="<?= $alamat;?>" autofocus required>
					</div>
				</div>
			</div>
				<div class="form-group ">
				<div class="row">
					<div class="col-md-3">
						<label class="form-label" for="nama">KODE</label>
					</div>
					<div class="col-md-9">
						<input name="f[kode]"  type="text" class="form-control" value="<?= $kode;?>" autofocus required>
					</div>
				</div>
			</div>
		 	<div class="form-group ">
				<div class="row">
					<div class="col-md-3">
						<label class="form-label" for="nama">WA</label>
					</div>
					<div class="col-md-9">
						<input name="f[sender_number]"  type="text" class="form-control" value="<?= $sender_number;?>" autofocus required>
					</div>
				</div>
			</div>
			
	<div class="form-group ">
				<div class="row">
					<div class="col-md-3">
						<label class="form-label" for="nama">CREDIT</label>
					</div>
					<div class="col-md-9">
						<input name="f[credit]"  type="text" class="form-control" value="<?= $credit;?>" autofocus required>
					</div>
				</div>
			</div>
			
			<div class="form-group ">
				<div class="row">
					<div class="col-md-3">
						<label class="form-label" for="nama">OWNER</label>
					</div>
					<div class="col-md-9">
						<input name="f[owner]"  type="text" class="form-control" value="<?= $owner;?>" autofocus required>
					</div>
				</div>
			</div>
				<div class="form-group ">
				<div class="row">
					<div class="col-md-3">
						<label class="form-label" for="nama">HP OWNER</label>
					</div>
					<div class="col-md-9">
						<input name="f[hp_owner]"  type="text" class="form-control" value="<?= $hp_owner;?>" autofocus required>
					</div>
				</div>
			</div>
			
				<div class="form-group ">
				<div class="row">
					<div class="col-md-3">
						<label class="form-label" for="nama">PRICE ACCESS</label>
					</div>
					<div class="col-md-9">
						<input name="f[price_access]"  type="text" class="form-control" value="<?= $price_access;?>" autofocus required>
					</div>
				</div>
			</div>
			
				<div class="form-group ">
				<div class="row">
					<div class="col-md-3">
						<label class="form-label" for="nama">PROCE ORDER</label>
					</div>
					<div class="col-md-9">
						<input name="f[price_order]"  type="text" class="form-control" value="<?= $price_order;?>" autofocus required>
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
