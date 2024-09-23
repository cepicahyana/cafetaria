<?php
$sn = $this->session->userdata("sn");

$this->db->where("sender_number",$sn);
$data = $this->db->get("device_stations")->row();
$peserta = $this->input->post("peserta");
 $jml = count(explode(",",$peserta));
$sts = isset($data->sts)?($data->sts):null;
$file = isset($data->file_broadcast)?($data->file_broadcast):null;
$this->db->where("to",$this->session->userdata("sn"));
$jml = $this->db->get("data_pelanggan")->num_rows();

if($data->file_broadcast){
    $src =base_url()."file_upload/".$sn."/".$file;
}else{
    $src = base_url()."null.png";
}
?>
  
  
<!--<div class="alert alert-info"><?=$jml-1;?> data kontak yang dipilih</div>-->
   
<div class="k_wa">
Konten Whatsapp :<br>
<textarea class='form-control' style='min-height:200px' id="val_26" name="wa" onchange="save_(`26`,this.value)"><?=$data->broadcast?></textarea>
<br>
 <img alt="" id='blah' style='max-height:80px;' src='<?php echo $src;?>'>
		       <?php
		       if($file){
		           echo "<br><a id='hps' style='color:red' href='javascript:del()'>&times; Hapus gambar</a>";
		           $info = "Ubah gambar (optional)";
		       }else{
		           $info = "Upload gambar (optional)";
		       }
		       ?>
 <input type="file" class="form-control" id="imgInp"  name="file" >
 </div>
<div class="alert alert-light">
Parameter : <br>
<code>{nama} = nama peserta
</code>
</div>



         
	 <hr>
		   <b>Kirim ke nomor uji coba dulu:</b><br>
		   <input type="text" placeholder="input nomor uji coba" style="width:100%" name="nomor"><br><br>
		 
	


 <script>
 function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });
		
		
    var   i_bad=0;
    $("#badge").val(0);
    function badges(){
       
         if(i_bad){
            i_bad=0;
       
          $("#badge").val(0);
        }else{
            i_bad=1;
             $("#badge").val(1);
        }
    }
</script>

<script>
$(".k_email").hide();
    var i_mail=0;
    function emails(){
     
        if(i_mail){
            i_mail=0;
            $(".k_email").hide();
        }else{
            i_mail=1;
            $(".k_email").show();
        }
    }
</script>



<script>
    var i_wa=1;
    function whatsapp(){
        if(i_wa){
            i_wa=0;
            $(".k_wa").hide();
        }else{
            i_wa=1;
            $(".k_wa").show();
        }
    }
    </script>
    
    
<input type="hidden"   name="peserta" value="<?=$this->input->post("peserta") ?>">
 