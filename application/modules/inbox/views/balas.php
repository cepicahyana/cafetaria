<?php
error_reporting(0);
$id      = $this->input->post("id");
$this->db->where("id",$id);
$data = $this->db->get("msg_inbox")->row();

?>

<div class="modal-content">  
	<div class="modal-header">  <h5 class="modal-titles" id="defaultModalLabel"><b>Balas Pesan</b></h5>
		<button type="button" class="close" aria-label="Close" data-dismiss="modal">
			<span aria-hidden="true">×</span>
		</button>
	</div>


	<div class="modal-body" >

		<form  action="javascript:submitForm('modal_tambah')" id="modal_tambah" url="<?php echo base_url()?>inbox/balas_cepat"  method="post" enctype="multipart/form-data">
			<input type="hidden" id="formToken" name="<?php echo $this->m_reff->tokenName()?>" value="<?php echo $this->m_reff->getToken()?>">
			<input type="hidden" value="<?php echo $data->id?>" name="id">
			<input type="hidden" value="<?php echo $data->id?>" name="f[sender_number]">
			<input type="hidden" value="<?php echo $data->sender_number?>" name="f[no_tujuan]">
			<div class=" "  >

               

                <div class="row row-xs align-items-center mg-b-20">
					<div class="col-md-12">
						<label class="form-labels mg-b-0">Pesan kiriman : </label> 
					</div>
					<div class="col-md-12 mg-t-5 mg-md-t-0 alert alert-info">
				<?php echo  $data->msg; ?>
					</div>
				</div>

				<div class="row row-xs align-items-center mg-b-20">
					<div class="col-md-12">
						<label class="form-labeld mg-b-0">Pesan balasan :  </label>
					</div>
					<div class="col-md-12 mg-t-5 mg-md-t-0">
						<textarea id="mytext" class="form-control" required  placeholder="pesan balasan ..." name='f[pesan]' rows="3" style="min-height:180px">_*Pertanyaan anda:*_
_<?=$data->msg ?>_

_*Balasan*_
</textarea>
					</div>
				</div>
				 <div class="row row-xs align-items-center mg-b-20">
					<div class="col-md-4">
						<label class="form-label mg-b-0">Lampiran file / gambar </label><i> (opsional)</i>
					</div>
					<div class="col-md-8 mg-t-5 mg-md-t-0">
						<input type="file" class="form-control"   name='file'  placeholder="keyword" rows="3">
					</div>
				</div>
				
			  
			 

<hr>

				<button  onclick="submitForm('modal_tambah')"
				class="float-right btn btn-primary pd-x-30 mg-r-5 mg-t-5"><i class='fa fa-save'></i> Simpan</button>

			</div>   
			<!-- /row -->
		</form>

	</div>
</div>

<script>
    setTimeout(() => {
       document.getElementById("mytext").focus();
     }, 500);
    
</script>
 
 