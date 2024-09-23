<?php
$id = $this->input->post("id");
$data = $this->db->get_where("auto_replay",array("id"=>$id))->row();
$keyword = $data->keyword ?? '';
$replay = $data->replay ?? '';
$typo = $data->typo ?? '';
$sts = $data->sts ?? '';
$jenis = $data->jenis_pesan??'';
$option = $data->options??'';
$replay = $data->replay??'';
$replay = json_decode($replay,true);
$judul = isset($replay["title"])?($replay["title"]):null;
$body = isset($replay["body"])?($replay["body"]):null;
$footer = isset($replay["footer"])?($replay["footer"]):null;
?>

<div class="modal-content">  
	<div class="modal-header">  <h5 class="modal-titles" id="defaultModalLabel"><b>Edit Autoreplay</b></h5>
		<button type="button" class="close" aria-label="Close" data-dismiss="modal">
			<span aria-hidden="true">×</span>
		</button>
	</div>


	<div class="modal-body" >

		<form  action="javascript:submitForm('modal_edit')" id="modal_edit" url="<?php echo base_url()?>autoreplay/update_autoreplay"  method="post" enctype="multipart/form-data">
			<input type="hidden" id="formToken" name="<?php echo $this->m_reff->tokenName()?>" value="<?php echo $this->m_reff->getToken()?>">
			<input type="hidden" value="<?php echo $data->id?>" name="id">
			<input type="hidden" value="<?php echo $jenis?>" name="jenis">
			<div class=" pd-sm-20 "  >

               

                <div class="row row-xs align-items-center mg-b-20">
					<div class="col-md-12">
						<label class="form-labels mg-b-0">Keyword </label> <i>(Pisahkan dengan tanda koma)</i>
					</div>
					<div class="col-md-12 mg-t-5 mg-md-t-0">
						<textarea class="form-control" required name='f[keyword]' value="" placeholder="contoh : informasi bansos, info bansos, tentang bansos" rows="3"><?=$keyword ?></textarea>
					</div>
				</div>
				
				   <b>Pesan balasan</b>
				<div class="row row-xs align-items-center mg-b-20">
					<div class="col-md-12">
						<label class="form-labeld mg-b-0">Judul</label>
					</div>
					<div class="col-md-12 mg-t-5 mb-2">
						<input type="text" class="form-control" value="<?=$judul;?>" required  placeholder="pesan balasan ..." name='title' rows="3" > 
					</div>
				</div>
				<div class="row row-xs align-items-center mg-b-20">
					<div class="col-md-12">
						<label class="form-labeld mg-b-0">Isi informasi</label>
					</div>
					<div class="col-md-12 mg-t-5 mb-2">
						<textarea class="form-control" required  placeholder="pesan balasan ..." name='body' rows="3" ><?=$body;?></textarea>
					</div>
				</div>
					<div class="row row-xs align-items-center mg-b-20">
					<div class="col-md-12">
						<label class="form-labeld mg-b-0">  Informasi tambahan dibawah chat </label>
					</div>
					<div class="col-md-12 mg-t-5 mb-2">
						<input type="text" class="form-control" required value="<?=$footer;?>"  placeholder="pesan balasan ..." name='footer' rows="3" ></textarea>
					</div>
				</div>

				<!--<div class="row row-xs align-items-center mg-b-20">-->
				<!--	<div class="col-md-12">-->
				<!--		<label class="form-labeld mg-b-0">Autoreplay </label>-->
				<!--	</div>-->
				<!--	<div class="col-md-12 mg-t-5 mg-md-t-0">-->
				<!--		<textarea class="form-control" required  placeholder="pesan balasan ..." name='f[replay]' rows="3" style="min-height:250px"><?=$replay ?></textarea>-->
				<!--	</div>-->
				<!--</div>-->
				
				<?php
				if($jenis<=2){?>
				 <div class="row row-xs align-items-center mg-b-20">
					<div class="col-md-4">
						<label class="form-label mg-b-0">Lampiran file / gambar </label><i> (opsional)</i>
					</div>
					<div class="col-md-8 mg-t-5 mg-md-t-0">
						<input type="file" class="form-control"   name='file'  placeholder="keyword" rows="3">
					</div>
				</div>
				<?php } ?>
				
				
					<?php
					
				if($jenis==5){
				    echo '<div class="row row-xs align-items-center mg-b-20">
					<div class="col-md-4">
						<label class="form-label mg-b-0"> <b>List menu pilihan</b> </label> 
					</div>';
				    $option = json_decode($option,true);
				    $option = isset($option[0]["rows"])?($option[0]["rows"]):null;
				     
				    $i=1; $t=10;
				    foreach($option as $key=>$val)
				    {
				          $title = $val['title'];
				          $desc = isset($val['description'])?($val['description']):null;
				        echo '<div class="col-md-12 mb-2 row">
					    <div class="col-md-2">Pilihan ke '.$i.' :</div>
					    <div class="col-md-4"><input type="text" name="opsi[]" class="form-control" value="'.$title.'"></div>
					    <div class="col-md-2">Deskripsi:</div>
					    <div class="col-md-4"><input class="form-control" type="text" name="desc[]" value="'.$desc.'"> </div>
					</div>';
					$i++;
				    }
				    
				  
				    $sisa = $t-$i;
				    for($j=0;$sisa>=$j;$j++){
				   
				        echo '<div class="col-md-12 mb-2 row">
					    <div class="col-md-2">Pilihan ke '.$i.' :</div>
					    <div class="col-md-4"><input type="text" name="opsi[]" class="form-control"  ></div>
					    <div class="col-md-2">Deskripsi:</div>
					    <div class="col-md-4"><input class="form-control" type="text" name="desc[]"  > </div>
					</div>';
						$i++;
				    }
				      echo '</div>';
				}?>
				
			 	<div class="row row-xs align-items-center ">
						<div class="col-md-4">
						<label class="form-label mg-b-0">Penulisan keyword</label>
					</div>
					<div class="col-md-8 mg-t-5 mg-md-t-0">
					 
					 		<div class="row mg-t-10">
					 		    	<div class="col-lg-6 mg-t-20 mg-lg-t-0"> 
                				<label class="rdiobox">
                				    <input  name="f[typo]" value="0"  <?php if($typo==0){ echo "checked";}?>  name="rdio" type="radio"> <span>Bebas</span>
                				</label> 
                				</div>
        					     <div class="col-lg-6"> 
        					     <label class="rdiobox"><input name="f[typo]" value="1" <?php if($typo==1){ echo "checked";}?> type="radio"> <span>Harus sama persis</span></label> 
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
        					     <label class="rdiobox"><input <?php if($sts==1){ echo "checked";}?>  name="f[sts]" value="1" type="radio"> <span>Aktif</span></label> 
        					     </div> 
                				<div class="col-lg-6 mg-t-20 mg-lg-t-0"> 
                				<label class="rdiobox">
                				    <input  name="f[sts]" value="0" <?php if($sts==0){ echo "checked";}?>   name="rdio" type="radio"> <span>Non-aktif</span>
                				</label> 
                				</div>
				    </div>
					 
					</div>
				</div>

<hr>

				<button  onclick="submitForm('modal_edit')"
				class="float-right btn btn-primary pd-x-30 mg-r-5 mg-t-5"><i class='fa fa-save'></i> Simpan</button>

			</div>   
			<!-- /row -->
		</form>

	</div>
</div>
 