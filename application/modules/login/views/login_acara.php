<?php $con=new konfig(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 <title>  <?php echo $con->konfigurasi(2); ?> </title>
    <!-- Favicon-->

 <link rel="icon" href="<?php echo base_url()?>/plug/img/logo.png" type="image/x-icon">
    <!-- Google Fonts -->
	<link href="<?php echo base_url()?>plug/link_online/css.css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url()?>plug/link_online/css2.css?family=Material+Icons" rel="stylesheet" type="text/css">
	

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url();?>new/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="<?php echo base_url();?>new/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="<?php echo base_url();?>new/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="<?php echo base_url();?>new/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>new/css/add.css" rel="stylesheet">
	
</head>


   


 


<?php $con=new konfig(); ?>


<body class="login-page bg-pink">
    <div class="bg-pink">
        <div class="logo col-orange bg-pink">
            
             <br>
             <br>
             <br>
          </center>
        </div>
        <div class="card " style='max-width:94%;margin-left:10px'>
            <div class="body "  >
			
                <form id="formlogin" method="POST" action="javascript:login()">
                    <div class="msg col-deep-orange"><center>Input Kode Acara</center></div>
					<br>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">keyboard</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="kode" placeholder="Kode acara" required autofocus>
                        </div>
                    </div>
                    
				<!--	 <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">transfer_within_a_station</i>
                        </span>
                        <div class="form-line">
                            <input type="text"   class="form-control" name="gate" placeholder="Pintu masuk"   autofocus>
                        </div>
                    </div>
                    --->
					
                    <div class="row">
                        <div id="msg" class="col-xs-12 p-t-5">
						
						</div>
						 
						
						<div class="col-xs-12">
                            <button class="btn btn-block bg-indigo waves-effect" type="submit">
							
                                    <i class="material-icons">verified_user</i>
                                    <span>MASUK </span>
                                
							</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20" style="margin-top:-30px">
                        
                      
					<div class="col-xs-12 col-md-12 col-teal"><center>
                            <a href="<?php echo base_url()?>login/logout" class='col-teal'><u>=== Logout ===</u></a>
							</center>
                        </div> 
                    </div>
                </form>
            </div>
        </div> 
 
    </div>
	
</body>
 
 <script> 
 function login()
{

$('#msg').html("<img src='<?php echo base_url();?>plug/img/load.gif'> Please wait...");
	$.ajax({
	url:"<?php echo base_url();?>login/cekAcara",
	type: "POST",
    data: $('#formlogin').serialize(),
	dataType: "JSON",
	 success: function(data)
            {
			
               
			   
			   if(data["validasi"]==true){
				$('#msg').html('<i class="material-icons col-green">done_all</i> <span style="font-size:12px;position:absolute;margin-top:4px"> &nbsp;Berhasil !! Mohon tunggu....</span>'); 
				 
				    window.location.href="<?php echo base_url();?>myevent"; 
			   }else{
			      $('#msg').html('<i class="material-icons col-red">close</i> <span style="font-size:12px;position:absolute;margin-top:4px"> &nbsp;Gagal !! Kode tidak ditemukan...</span>'); 
				  
			   } 
            } 
	});
 
}

  
</script>

 	 
 	 
            