<?php
$id =  $this->input->post("id");
$data = $this->db->get_where("daftar_menu",array("id"=>$id))->row();

$nama = $data->nama ?? '';
$harga = $data->harga ?? '';
$jenis = $data->jenis ?? '';
$sts = $data->sts ?? '';
$special = $data->special ?? '';
$kategory = $data->kategory ?? '';
$no = $data->no ?? '';
if(!$id){
    $link = "insert_menu"; $text="Tambah";
}else{
    $link = "update_menu"; $text="Update";
}
?>

<div class="modal-content">  
	<div class="modal-header">  <h5 class="modal-titles" id="defaultModalLabel"><b><?=$text;?> </b></h5>
		<button type="button" class="close" aria-label="Close" data-dismiss="modal">
			<span aria-hidden="true">×</span>
		</button>
	</div>


	<div class="modal-body" >

		<form  action="javascript:submitForm('modal_tambah')" id="modal_tambah" url="<?php echo base_url()?>master/<?=$link;?>"  method="post" enctype="multipart/form-data">
			<input type="hidden" value="<?php echo $id?>" name="id">
			<input type="hidden" id="formToken" name="<?php echo $this->m_reff->tokenName()?>" value="<?php echo $this->m_reff->getToken()?>">
			
			<div class=" pd-sm-20 "  >
			    
			    <div class="row row-xs align-items-center mg-b-20">
					<div class="col-md-4">
						<label class="form-label mg-b-0">Nomor urut </label>
					</div>
					<div class="col-md-8 mg-t-5 mg-md-t-0">
						<input class="form-control"   name='f[no]'  type="text" value="<?= $no; ?>">
					</div>
				</div>
				
			<div class="row row-xs align-items-center mg-b-20">
					<div class="col-md-4">
						<label class="form-label mg-b-0">Nama menu</label>
					</div>
					<div class="col-md-8 mg-t-5 mg-md-t-0">
						<input class="form-control"   name='f[nama]'   type="text" value="<?= $nama; ?>">
					</div>
				</div>

			 
                <div class="row row-xs align-items-center mg-b-20">
					<div class="col-md-4">
						<label class="form-label mg-b-0">Harga </label>
					</div>
					<div class="col-md-8 mg-t-5 mg-md-t-0">
						<input class="form-control"   name='f[harga]'  type="text" value="<?= $harga; ?>">
					</div>
				</div>
				
				<div class="row row-xs align-items-center mg-b-20">
					<div class="col-md-4">
						<label class="form-label mg-b-0">Katagory </label>
					</div>
					<div class="col-md-8 mg-t-5 mg-md-t-0">
						<input class="form-control"   name='f[kategory]'  placeholder="contoh : Appetizer" type="text" value="<?= $kategory; ?>">
					</div>
				</div>
				

				<div class="row row-xs align-items-center mg-b-20">
					<div class="col-md-4">
						<label class="form-label mg-b-0">jenis </label>
					</div>
					<div class="col-md-3 mg-t-5 mg-md-t-0">
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="f[jenis]" id="exampleRadios1" value="1" <?php if($jenis=='1'){ ?> checked=checked <?php } ?>>
						  <label class="form-check-label" for="exampleRadios1">
						   Makanan
						  </label>
						</div>
					</div>
					<div class="col-md-2 mg-t-5 mg-md-t-0">
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="f[jenis]" id="exampleRadios2" value="2" <?php if($jenis=='2'){ ?> checked=checked <?php } ?>>
						  <label class="form-check-label" for="exampleRadios2">
						    Minuman
						  </label>
						</div>
					</div>
				</div>


	<div class="row row-xs align-items-center mg-b-20">
					<div class="col-md-4">
						<label class="form-label mg-b-0">Status ketersediaan </label>
					</div>
					<div class="col-md-3 mg-t-5 mg-md-t-0">
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="f[sts]" id="exampleRadios3" value="1" <?php if($sts=='1'){ ?> checked=checked <?php } ?>>
						  <label class="form-check-label" for="exampleRadios3">
						   Tersedia
						  </label>
						</div>
					</div>
					<div class="col-md-2 mg-t-5 mg-md-t-0">
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="f[sts]" id="exampleRadios4" value="0" <?php if($sts=='0'){ ?> checked=checked <?php } ?>>
						  <label class="form-check-label" for="exampleRadios4">
						    Tidak tersedia
						  </label>
						</div>
					</div>
				</div>
				
				
	<div class="row row-xs align-items-center mg-b-20">
					<div class="col-md-4">
						<label class="form-label mg-b-0">Spesial menu </label>
					</div>
					<div class="col-md-3 mg-t-5 mg-md-t-0">
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="f[special]" id="exampleRadios5" value="1" <?php if($special=='1'){ ?> checked=checked <?php } ?>>
						  <label class="form-check-label" for="exampleRadios5">
						   Ya
						  </label>
						</div>
					</div>
					<div class="col-md-2 mg-t-5 mg-md-t-0">
						<div class="form-check">
						  <input class="form-check-input" type="radio" name="f[special]" id="exampleRadios6" value="0" <?php if($special=='0'){ ?> checked=checked <?php } ?>>
						  <label class="form-check-label" for="exampleRadios6">
						    Tidak
						  </label>
						</div>
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
 