<style>
    .entry3 tr{
        border-bottom:green dashed 1px;
        font-weight:bold;
    }
    .entry3 tr td{
        padding-bottom:8px;
        padding-top:8px;
        color:black;
    }
</style>
<?php
 $f5 =  base_url()."file_upload/".$this->session->userdata("sender_number")."/".$this->m_reff->resto()->foto5;
  $f1 =  base_url()."file_upload/".$this->session->userdata("sender_number")."/".$this->m_reff->resto()->foto1;
   $f2 =  base_url()."file_upload/".$this->session->userdata("sender_number")."/".$this->m_reff->resto()->foto2;
    $f3 =  base_url()."file_upload/".$this->session->userdata("sender_number")."/".$this->m_reff->resto()->foto3;
     $f4 =  base_url()."file_upload/".$this->session->userdata("sender_number")."/".$this->m_reff->resto()->foto4;
?>
 
      
<?php
 $img =  base_url()."file_upload/".$this->session->userdata("sender_number")."/".$this->session->userdata("foto1");
?>
 
<div data-card-height="90" class="card card-style bg-29 mb-0 rounded-s" style="height: 90px;">
                    <div class="card-center">
                    
                            <h4 class="text-center color-white text-uppercase">Survei kepuasan</h4>
                          <center class='text-white'>Kritik & Saran</center>
                   
                    </div>
                    <div class="card-overlay rounded-s bg-black opacity-70"></div>
                </div>
       <br/>
       
       

<div class="card card-style pb-0" style="background-color:#F0F8FF">
    <div class="card-body" id="conten_survei">
  <form action="javascript:kirim('survei')" id="survei" url="<?php echo base_url()?>saran/insert" method="post">
  Bagaimana pengalaman kakak saat berkunjung ?<br>
  <?php
    $data=[];
  $data[null] = "--- pilih ---";
  $data["Menyenangkan"] = "Menyenangkan";
  $data["Biasa aja"]    = "Biasa saja";
  $data["Tidak menyengkan"] = "Tidak menyengkan";
  echo form_dropdown("f[pengalaman]",$data,"","id='pengalaman' class='form-control' required");
  ?>
   
   <br>
  Bagaimana pelayananya ?<br>
  <?php
    $data=[];
$data[null] = "--- pilih ---";
  $data["Bagus"] = "Bagus";
  $data["Biasa aja"]    = "Biasa saja";
  $data["Buruk"] = "Buruk";
  echo form_dropdown("f[pelayanan]",$data,"","id='pelayanan' class='form-control' required");
  ?>
  
  <br>
  Bagaimana kecepatan penyajian makanannya ?<br>
  <?php
    $data=[];
$data[null] = "--- pilih ---";
  $data["Cepat"] = "Cepat";
  $data["Biasa aja"] = "Biasa aja";
  $data["Lambat"] = "Lambat";
  echo form_dropdown("f[penyajian]",$data,"","id='penyajian' class='form-control' required");
  ?>
  
   <br>
  Bagaimana makanan/minumanya ?<br>
  <?php 
  $data=[];
$data[null] = "--- pilih ---";
  $data["Enak"] = "Enak";
  $data["Biasa aja"] = "Biasa aja";
  $data["Tidak enak"] = "Tidak enak";
  echo form_dropdown("f[makanan]",$data,"","id='makanan' class='form-control' required");
  ?>
  
  
   <br>
  Bagaimana tempatnya ?<br>
  <?php
    $data=[];
$data[null] = "--- pilih ---";
  $data["Nyaman"] = "Nyaman";
  $data["Biasa aja"] = "Biasa aja";
  $data["Tidak nyaman"] = "Tidak nyaman";
  echo form_dropdown("f[tempat]",$data,"","id='tempat' class='form-control' required");
  ?>
   
    <br>
  Kritik & Saran<br>
   <textarea class="form-control" id="ks" name="f[ks]"></textarea>
  <br>
  <button class="btn btn-m bg-mint-dark btn-block border-mint-dark"  >Kirim </button>
  </form>
  
</div>
</div>


<script>
    function kirim(id){
        var pengalaman = $("[name='f[pengalaman]']").val();
        var pelayanan = $("[name='f[pelayanan]']").val();
        var penyajian = $("[name='f[penyajian]']").val();
         var makanan = $("[name='f[makanan]']").val();
          var tempat = $("[name='f[tempat]']").val();
          var ks = $("[name='f[ks]']").val();
          if(!ks){
              document. getElementById("ks"). focus(); return false;
          }
          
          if(!pengalaman){
              document. getElementById("pengalaman"). focus(); return false;
          }
          if(!pelayanan){
              document. getElementById("pelayanan"). focus(); return false;
          }
        //   if(!penyajian){
        //       document. getElementById("penyajian"). focus(); return false;
        //   }
        //   if(!makanan){
        //       document. getElementById("makanan"). focus(); return false;
        //   }
          if(!tempat){
              document. getElementById("tempat"). focus(); return false;
          }
          
        var form = $("#"+id);
		var link = $(form).attr("url");
	 
		$.ajax({
		 url:link,
		 data: $(form).serialize(),
		 method:"POST",
		 dataType:"JSON",
		    beforeSend: function() {

            },
    		 success: function(data)
      		{	
    		 
    		 $("#conten_survei").html("<center><b>Terimakasih 🙏</b><br>Masukan kakak sangat berarti buat kami 😊</center>");
    		 
    		}     
        });
    }
</script>







 