
<div class="modal-content">  
	<div class="modal-header">  <h5 class="modal-titles" id="defaultModalLabel"><b>Add Autoreplay</b></h5>
		<button type="button" class="close" aria-label="Close" data-dismiss="modal">
			<span aria-hidden="true">×</span>
		</button>
	</div>


	<div class="modal-body" >

		<form  action="javascript:submitForm('modal_tambah')" id="modal_tambah" url="<?php echo base_url()?>autoreplay/insert_button"  method="post" enctype="multipart/form-data">
			<input type="hidden" id="formToken" name="<?php echo $this->m_reff->tokenName()?>" value="<?php echo $this->m_reff->getToken()?>">
			
			<di  >

               

                <div class="row row-xs align-items-center mg-b-20">
					<div class="col-md-12">
						<label class="form-labels mg-b-0">Keyword </label> <i>(Pisahkan dengan tanda koma)</i>
					</div>
					<div class="col-md-12 mg-t-5 mg-md-t-0">
						<textarea class="form-control" required name='f[keyword]'  placeholder="contoh : informasi bansos, info bansos, tentang bansos" rows="3"></textarea>
					</div>
				</div>
                <b>Pesan balasan</b>
				<div class="row row-xs align-items-center mg-b-20">
					<div class="col-md-12">
						<label class="form-labeld mg-b-0">Judul</label>
					</div>
					<div class="col-md-12 mg-t-5 mg-md-t-0">
						<input type="text" class="form-control" required  placeholder="pesan balasan ..." name='title' rows="3" > 
					</div>
				</div>
				<div class="row row-xs align-items-center mg-b-20">
					<div class="col-md-12">
						<label class="form-labeld mg-b-0">Isi informasi</label>
					</div>
					<div class="col-md-12 mg-t-5 mg-md-t-0">
						<textarea class="form-control" required  placeholder="pesan balasan ..." name='body' rows="3" ></textarea>
					</div>
				</div>
					<div class="row row-xs align-items-center mg-b-20">
					<div class="col-md-12">
						<label class="form-labeld mg-b-0">  Informasi tambahan dibawah chat </label>
					</div>
					<div class="col-md-12 mg-t-5 mg-md-t-0">
						<input type="text" class="form-control" required  placeholder="pesan balasan ..." name='footer' rows="3" ></textarea>
					</div>
				</div>
				
				 <div class="row row-xs align-items-center mg-b-20">
					<div class="col-md-4">
						<label class="form-label mg-b-0"> <b>Tombol</b> </label> 
					</div>
					<div class="col-md-12 mb-2 row">
					    <div class="col-md-2">Tombol ke 1 :</div>
					    <div class="col-md-4"><input type="text" name="btn[]" class="form-control"></div>
					    <div class="col-md-2">Url / Number :</div>
					    <div class="col-md-4"><input class="form-control" type="text" name="desc[]"> </div>
					   
					</div>
					
					<div class="col-md-12  mb-2 row">
					    <div class="col-md-2">Tombol ke 2 :</div>
					    <div class="col-md-4"><input type="text" name="btn[]" class="form-control"></div>
					    <div class="col-md-2">Url / Number :</div>
					    <div class="col-md-4"><input class="form-control" type="text" name="desc[]"> </div>
					   
					</div>
					
					<div class="col-md-12   mg-md-t-0 row">
					    <div class="col-md-2">Tombol ke 3 :</div>
					    <div class="col-md-4"><input type="text" name="btn[]" class="form-control"></div>
					    <div class="col-md-2">Url / Number :</div>
					    <div class="col-md-4"><input class="form-control" type="text" name="desc[]"> </div>
					   
					</div>
				</div>
				
			 	<div class="row row-xs align-items-center ">
						<div class="col-md-4">
						<label class="form-label mg-b-0">Penulisan keyword</label>
					</div>
					<div class="col-md-8 mg-t-5 mg-md-t-0">
					 
					 		<div class="row mg-t-10">
					 		    	<div class="col-lg-6 mg-t-20 mg-lg-t-0"> 
                				<label class="rdiobox">
                				    <input checked=""  name="f[typo]" value="0"  name="rdio" type="radio"> <span>Bebas</span>
                				</label> 
                				</div>
        					     <div class="col-lg-6"> 
        					     <label class="rdiobox"><input name="f[typo]" value="1" type="radio"> <span>Harus sama persis</span></label> 
        					     </div> 
                			
				    </div>
					 
					</div>
				</div>
				
					<div class="row row-xs align-items-center  ">
						<div class="col-md-4">
						<label class="form-label mg-b-0">Status </label>
					</div>
					<div class="col-md-8 mg-t-5 mg-md-t-0">
					 
					 		<div class="row mg-t-10">
        					     <div class="col-lg-6"> 
        					     <label class="rdiobox"><input checked=""  name="f[sts]" value="1" type="radio"> <span>Aktif</span></label> 
        					     </div> 
                				<div class="col-lg-6 mg-t-20 mg-lg-t-0"> 
                				<label class="rdiobox">
                				    <input  name="f[sts]" value="0"  name="rdio" type="radio"> <span>Non-aktif</span>
                				</label> 
                				</div>
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
 
 
 <script>
      function updatePost(val,field) {
            var id = "<?=$id?>";
            $.ajax({
                url: '<?= base_url() ?>broadcast/updatePost',
                type: 'POST',
                dataType: 'json',
                data: {
                    val: val,field:field,id:id,<?php echo $this->m_reff->tokenName()?>:token
                },
                success: function(res) {
                    Swal.fire('Berhasil disimpan');
                }
            });
        }
 </script>