<?php
$this->db->where("id",$id);
$data = $this->db->get("data_broadcast")->row();
if(!isset($data)){
return $this->m_reff->page403();
}
if(!isset($data)){
return $this->m_reff->page403();
}
$ops = isset($data->options)?($data->options):null;
$ops = json_decode($ops,true);
 
$desc1=$desc2=$desc3=null; 
 
$btn1       = isset($ops[0]['body'])?($ops[0]['body']):null;            
$url1       = isset($ops[0]['url'])?($ops[0]['url']):null;
$number1    = isset($ops[0]['number'])?($ops[0]['number']):null;
if($url1){    $desc1 = $url1;    }           if($number1){    $desc1 = $number1;    }


$btn2       = isset($ops[1]['body'])?($ops[1]['body']):null;            
$url2       = isset($ops[1]['url'])?($ops[1]['url']):null;
$number2    = isset($ops[1]['number'])?($ops[1]['number']):null;
if($url2){    $desc2 = $url2;    }           if($number2){    $desc2 = $number2;    }


$btn3       = isset($ops[2]['body'])?($ops[2]['body']):null;            
$url3       = isset($ops[2]['url'])?($ops[2]['url']):null;
$number3    = isset($ops[2]['number'])?($ops[2]['number']):null;
if($url3){    $desc3 = $url3;    }           if($number3){    $desc3 = $number3;    }
 

?>
<!-- breadcrumb -->
<div class="breadcrumb-header  ">
    <div class="col-md-12">
 
		
    <button onclick="broadcast()" type="button" style="float:right" class=" btn btn-warning">
              <i class="glyphicon glyphicon-upload"></i>
              <span>  <i class="fa fa-paper-plane"></i> Broadcast</span>
            </button>
            <h4 class="content-title mb-2">Pesan teks dan Tombol</h4>
            <span class='text-white'>Pesan teks dan dapat menyisipkan tombol panggilan telp dan link url</span>
	 </div>
 
</div>


<div class="card">
	<div class="row card-body">
		<div class="col-md-12" id="area_lod">
             <div class="row row-xs align-items-center mg-b-20"> 
                <div class="col-md-2"> 
                  <label class="form-label mg-b-0 text-black">Judul informasi</label> 
                </div> 
                <div class="col-md-10 mg-t-5 mg-md-t-0"> 
                 <input class="form-control" onchange="updatePost(this.value,'judul_berita')" type="text" value="<?=$data->judul_berita;?>">
                </div> 
            </div>
             
            <div class="row row-xs align-items-center mg-b-20"> 
                <div class="col-md-2 align-top"> 
                  <label class="form-label mg-b-0 text-black">Isi pesan</label> 
                </div> 
                <div class="col-md-10 mg-t-5 mg-md-t-0"> 
                <textarea class='form-control' onchange="updatePost(this.value,'artikel')" style="min-height:200px"><?=$data->artikel;?></textarea>
                </div> 
            </div>
            
            
            <div class="row row-xs align-items-center mg-b-20">
					<div class="col-md-4">
						<label class="form-label mg-b-0"> <b>Tombol</b> </label> 
					</div>
					<div class="col-md-12 mb-2 row">
					    <div class="col-md-2">Tombol ke 1 :</div>
					    <div class="col-md-4"><input type="text" name="btn1" value="<?php echo $btn1;?>" class="form-control" onchange="updateTombol('options')"></div>
					    <div class="col-md-2">Url / Number :</div>
					    <div class="col-md-4"><input class="form-control" value="<?php echo $desc1;?>" type="text" name="desc1"   onchange="updateTombol('options')"> </div>
					   
					</div>
					
					<div class="col-md-12  mb-2 row">
					    <div class="col-md-2">Tombol ke 2 :</div>
					    <div class="col-md-4"><input type="text" name="btn2" class="form-control" value="<?php echo $btn2;?>" onchange="updateTombol('options')"></div>
					    <div class="col-md-2">Url / Number :</div>
					    <div class="col-md-4"><input class="form-control" type="text" name="desc2" value="<?php echo $desc2;?>"  onchange="updateTombol('options')"> </div>
					</div>
					
					<div class="col-md-12   mg-md-t-0 row">
					    <div class="col-md-2">Tombol ke 3 :</div>
					    <div class="col-md-4"><input type="text" name="btn3" class="form-control" value="<?php echo $btn3;?>" onchange="updateTombol('options')"></div>
					    <div class="col-md-2">Url / Number :</div>
					    <div class="col-md-4"><input class="form-control" type="text" name="desc3" value="<?php echo $desc3;?>"  onchange="updateTombol('options')"> </div>
					   
					</div>
				</div>
            
            
            
            
            
            
            
            
            
            
            
		</div>
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
        
          function updateTombol(field) {
            var btn1 = $("[name='btn1']").val();
            var btn2 = $("[name='btn2']").val();
            var btn3 = $("[name='btn3']").val();
            
            var desc1 = $("[name='desc1']").val();
            var desc2 = $("[name='desc2']").val();
            var desc3 = $("[name='desc3']").val();
            
            var id = "<?=$id?>";
            $.ajax({
                url: '<?= base_url() ?>broadcast/updateTombol',
                type: 'POST',
                dataType: 'json',
                data: {
                    field:field,id:id,<?php echo $this->m_reff->tokenName()?>:token,btn1:btn1,btn2:btn2,btn3:btn3,desc1:desc1,desc2:desc2,desc3:desc3
                },
                success: function(res) {
                    Swal.fire('Berhasil disimpan');
                }
            });
        }
        
function broadcast(){
  var id = "<?php echo $id?>";
    $("#mdl_broadcast").modal("show");
    $.ajax({
                url: '<?= base_url() ?>broadcast/try_broadcast',
                type: 'POST',
                dataType: 'json',
                data: {
                  id:id,<?php echo $this->m_reff->tokenName()?>:token
                },
                success: function(val) {
                  $("#isiModal").html(val["data"]);
                  token = val['token'];
                }
            });
}
</script>


<div class="modal effect-super-scaled" id="mdl_broadcast" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" id="area_modal_edit" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-titles" id="defaultModalLabel"><b>Kirim broadcast </b></h5>
          <button type="button" class="close" aria-label="Close" data-dismiss="modal">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <div id="isiModal"></div>
        </div>
      </div>
    </div>
  </div><!-- /.modal-dialog --> 



