<?php
$flash = $this->session->flashdata("gagal");
if($flash){
    echo "<script>notif($flash)</script>";
}
$this->db->where("sender_number",$sn=$this->session->userdata("sn"));
$data = $this->db->get("device_stations")->row();
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
 <br>

					<!-- main-content-body -->
					<div class="main-content-body ">
<center>
 
	<div class="col-md-12s row">
		
 <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12">
	 <div class="card"> 
		<div class="card-body"> 
			<div class="plan-card text-center"> <i class="fas fa-users plan-icon text-success"></i> 
			<h6 class="text-drak text-uppercase mt-2">Jumlah Pelanggan </h6>
			<h2 class="mb-2" id="jml">  <?=$jml;?> </h2> 
			 <hr>
		<button onclick="syncron()" class='  btn-info'><i class='fa fa-retweet'></i> PERBAHARUI DATA PELANGGAN</button>
			</div> 
		</div> 
	</div> 
</div> 
 
<div class="col-xl-12 col-md-6 col-lg-6 col-sm-6" id="area_form">
	 <div class="card" id="loading"> 
		<div class="card-body text-left"> 
			
		<div class="form-group "> <div class="row"> 

		<div class="col-md-12" id="area_form">
	
		       <b>Konten pesan whatsapp</b> (Dengan menyertakan kode <b>{nama}</b> didalam pesan maka kode tersebut otomatis menjadi <b>nama pelanggan</b> ketika di broadcast )
		       <textarea name="msg" class="form-control" style="min-height:140px" onchange="set(this.value)"><?=$data->broadcast;?></textarea>
		  
		       <img alt="" id='blah' style='max-height:80px;' src='<?php echo $src;?>'>
		       <?php
		       if($file){
		           echo "<br><a style='color:red' href='".base_url()."master/del_file_broadcast'>&times; Hapus gambar</a>";
		           $info = "Ubah gambar (optional)";
		       }else{
		           $info = "Upload gambar (optional)";
		       }
		       ?>
		       <br>
		        
                 <?=$info;?> <br>
                 <!--<form  id='form' action="javascript:submitF('form')" method="post" url="<?php echo base_url()?>master/sent">  -->
                 <!--<input type="file" id="imgInp" name="file" accept=".jpg, .jpeg, .png">-->
                 <!--</form>-->
                 
                 <form   action="<?php echo base_url()?>master/save_upload" method="post" enctype="multipart/form-data">
                 <input type="file"  name="file"  onchange="this.form.submit()" accept=".jpg, .jpeg, .png"/>
                 </form>
                 
               
                 
                 
		  <br>
		   <b>Input nomor uji kirim sebelum broadcast:</b><br>
		   <input type="text" placeholder="input nomor uji kirim" name="nomor"><br><br>
			<button class="btn btn-primary" onclick="sent()"><i class="fa fa-paper-plane"></i> Kirim </button>
	
			</div> 
		</div> 
		</div>

  

		 


		</div> 
	</div> 
</div>

 
 
	</div>
</center>
  
	</div>
	
	
<script>
// document.getElementById("imgInp").onchange = function() {
//     document.getElementById("form").submit();
// }

    function set(val){
        var url   = "<?php echo site_url("master/set_broadcast");?>";
        var param = {<?php echo $this->m_reff->tokenName()?>:token,val:val};
        loading();
        $.ajax({
          type: "POST",dataType: "json",data: param, url: url,
          success: function(val){
               unblock();
          	token=val['token']; 
      }   
	});
	
    }
	
	 function kirim(){
	     var no = $("[name='nomor']").val();
        var url   = "<?php echo site_url("master/kirim");?>";
        var param = {<?php echo $this->m_reff->tokenName()?>:token,no:no};
        loading();
        $.ajax({
          type: "POST",dataType: "json",data: param, url: url,
          success: function(val){
               unblock();
          	token=val['token'];
          	var jml=val['data'];
          	var total = jml + <?=$jml?>;
          	$("#jml").html(total);
        	swal_notif(jml+" pesan berhasil dikirim! ");
        }
      });   
	}
	 function syncron(){
        var url   = "<?php echo site_url("master/syncron");?>";
        var param = {<?php echo $this->m_reff->tokenName()?>:token};
        loading();
        $.ajax({
          type: "POST",dataType: "json",data: param, url: url,
          success: function(val){
               unblock();
          	token=val['token'];
          	var jml=val['data'];
          	var total = jml + <?=$jml?>;
          	$("#jml").html(total);
        	swal_notif(jml+" data berhasil ditambahkan! ");
        }
      });   
	}
	
	
</script>	
	
	
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
		
		
function submitF(id){
    					////
						 loading("area_"+id);
									
		var form = $("#"+id);
		var link = $(form).attr("url");
	 
		$(form).ajaxForm({
		 url:link,
		 data: $(form).serialize(),
		 method:"POST",
		 dataType:"JSON",
		 beforeSend: function() {
               loading("area_"+id);
            },
		 success: function(data)
				{ 	   
					token = data["token"];
					$("#formToken").val(data["token"]);
					unblock("area_"+id); 	
					if(data["data"]["gagal"]==true)
					{	  
							notif("<font color='black'>"+data["data"]["info"]+"</font>");
					} else{
					  $("#"+id)[0].reset();
		
					  swal("success", {
						icon: "success",
						buttons : {
							confirm : {
								className: 'btn btn-success'
							}
						}
					});
					  
					}
					 			
				}
		});     
}

function sent(id)
{
    var no = $("[name='nomor']").val();
    if(no){
        var msg = "Pesan ini akan dikirim hanya kepada nomor uji kirim saja karena anda mengisi nomor uji kirim,Kosongkan nomor uji kirim jika akan memulai broadcast keselluruh pelanggan anda.";
        var tit = "Uji kirim ke "+no + " ?";
    }else{
        var tit = "Kirim kesemua pelanggan ?";
        var msg = "Pesan ini akan dikirim keseluruh pelanggan anda.";
    }
    	swal({
								  title: tit,
								  text:msg,
								  type: 'warning',
								  buttons:{
									  cancel: {
										  visible: true,
										  text : 'cancel',
										  className: 'btn btn-dark'
									  },        			
									  confirm: {
										  text : 'Yes',
										  className : 'btn btn-danger'
									  }
								  }
							  }).then((willDelete) => {
								  if (willDelete) {
									////
						 			kirim();
									///
								  }
								  });
								  
								  
	
};



    </script>
		 