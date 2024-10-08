<?php $con=new konfig(); ?>
 

  
	 <!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
		<meta name="Author" content="Spruko Technologies Private Limited">
		<meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>

		<!-- Title -->
		<title> Monitong covid</title>

		<!--- Favicon --->
		<link rel="icon" href="<?php echo base_url()?>assets/img/brand/favicon.png" type="image/x-icon"/>

		<!--- Icons css --->
		<link href="<?php echo base_url()?>assets/css/icons.css" rel="stylesheet">

		<!--- Right-sidemenu css --->
		<link href="<?php echo base_url()?>assets/plugins/sidebar/sidebar.css" rel="stylesheet">

		<!--- Custom Scroll bar --->
		<link href="<?php echo base_url()?>assets/plugins/mscrollbar/jquery.mCustomScrollbar.css" rel="stylesheet"/>

		<!--- Style css --->
		<link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
		<link href="<?php echo base_url()?>assets/css/skin-modes.css" rel="stylesheet">

		<!--- Animations css --->
		<link href="<?php echo base_url()?>assets/css/animate.css" rel="stylesheet">

	</head>
	<body class="main-body bg-light">

		<!-- Loader -->
		<div id="global-loader">
			<img src="<?php echo base_url()?>assets/img/loaders/loader-4.svg" class="loader-img" alt="Loader">
                </div>
		<!-- /Loader -->

	<!-- page -->
	<div class="page">

		<!-- main-signin-wrapper -->
		<div class="my-auto page page-h">
			<div class="main-signin-wrapper">
				<div class="main-card-signin d-md-flex wd-100p">
				<div class="wd-md-50p login d-none d-md-block page-signin-style p-5 text-white" >
					<div class="my-auto authentication-pages">
						<div>
							<img src="<?php echo base_url()?>assets/img/brand/logo-white.png" class=" m-0 mb-4" alt="logo">
							<h5 class="mb-4">Responsive Modern Dashboard &amp; Admin Template</h5>
							<p class="mb-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							<a href="index.html" class="btn btn-success">Learn More</a>
				                </div>
			                </div>
		                </div>

								
				<div class="p-5 wd-md-50p">
					<div class="main-signin-header">
						<h2>Welcome back!</h2>
						<h4>Please sign in to continue</h4>
						<form id="formlogin" method="POST" action="javascript:login()">	
							<input type="hidden" id="token" name="<?php echo $this->security->get_csrf_token_name()?>"	
							value="<?php echo $this->security->get_csrf_hash();?>">
							<div class="form-group">
								<label>Username</label><input class="form-control"  type="text" name="username" >
					                </div>
							<div class="form-group">
								<label>Password</label> <input class="form-control" type="password" name="password">
					                </div>
									<div id="msg"></div>
									<button class="btn btn-main-primary btn-block">Sign In</button>
						</form>
			                </div>
					<div class="main-signin-footer mt-3 mg-t-5">
						<p><a href="">Forgot password?</a></p>
						<p>Don't have an account? <a href="page-signup.html">Create an Account</a></p>
			                </div>
		                </div>
</form>

	                </div>
	                </div>
                </div>
		<!-- /main-signin-wrapper -->
	</div>
		<!-- End page -->

		<!--- JQuery min js --->
		<script src="<?php echo base_url()?>assets/plugins/jquery/jquery.min.js"></script>

		<!--- Bootstrap Bundle js --->
		<script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!--- Ionicons js --->
		<script src="<?php echo base_url()?>assets/plugins/ionicons/ionicons.js"></script>

		<!--- Moment js --->
		<script src="<?php echo base_url()?>assets/plugins/moment/moment.js"></script>

		<!--- Eva-icons js --->
		<script src="<?php echo base_url()?>assets/js/eva-icons.min.js"></script>

		<!--- Rating js --->
		<script src="<?php echo base_url()?>assets/plugins/rating/jquery.rating-stars.js"></script>
		<script src="<?php echo base_url()?>assets/plugins/rating/jquery.barrating.js"></script>

		<!--- Index js --->
		<script src="<?php echo base_url()?>assets/js/script.js"></script>

		<!--- Custom js --->
		<script src="<?php echo base_url()?>assets/js/custom.js"></script>

	</body>
</html>



<script>
  
  
  function login()
 {
 
 $('#msg').html("<img src='<?php echo base_url();?>plug/img/load.gif'> Please wait...");
	 $.ajax({
	 url:"<?php echo base_url();?>login/cekLogin",
	 type: "POST",
	 data: $('#formlogin').serialize(),
	 dataType: "JSON",
	  success: function(data)
			 {
				var token = data["token"];
				$("#token").val(token);
				//if success close modal and reload ajax table
				if(data["upass"]==false){
				   $('#msg').html("<i class='col-red'></i> Username/Password Salah!"); return false;
				}
				
				if(data["captca"]==false){
				  $('#msg').html("<i class='fa fa-warning'></i> Nomor yang anda masukan tidak sama");  return false;
				}
				
				
				if(data["validasi"]==true){
				 $('#msg').html('  Berhasil !! Mohon tunggu....'); 
				  
					 window.location.href="<?php echo base_url();?>"+data["direct"]; 
				}else{
					 window.location.href="<?php echo base_url();?>login/logout"; 
				}
				
				  
				
				
			 },
			 error: function (jqXHR, textStatus, errorThrown)
			 {
				 alert('Try Again!');
			 }
	 });
  
 }
 
  </script>
 
 