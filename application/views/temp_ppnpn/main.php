<!DOCTYPE HTML>
<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title><?=$this->m_reff->nama_resto();?></title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>mobile/styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>mobile/fonts/css/fontawesome-all.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>plug/css/addclass.css"> 
<!-- <link rel="manifest" href="<?php echo base_url()?>mobile/_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js"> -->
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url()?>plug/img/food.png">
<link rel="icon" href="<?php echo base_url()?>plug/img/food.png" type="image/png" sizes="16x16">
  <script type="text/javascript" src="<?php echo base_url()?>mobile/scripts/jquery.js"></script> 
	<script src="<?php echo base_url()?>plug/blokui.js"></script>
	<script src="<?php echo base_url()?>plug/js/angular_mobile.js"></script>
	
	
<script>
	var token;
function loading(){
	return '<br/><div class="d-flex justify-content-center"><div class="spinner-border color-blue2-dark" style="border-width: 7px;" role="status"><span class="sr-only">.</span></div> &nbsp;&nbsp;Mohon tunggu ...</div>';
	}
	
	
	var	token  = "<?php echo $this->m_reff->getToken()?>";
function submit(id)
{		
		var form = $("#"+id);
		var link = $(form).attr("url");
	 
		$.ajax({
		 url:link,
		 data: $(form).serialize(),
		 method:"POST",
		 dataType:"JSON",
		 beforeSend: function() {
               loading_block("area_"+id);
            },
		 success: function(data)
  		{ 	
			console.log(data);
					token = data["token"];
					$("#formToken").val(data["token"]);   
					unblock("area_"+id); 	
					if(data["gagal"]==true)
					{	   
							invalid(data["info"])
							 
					}else if(data["data"]?.gagal==true)
					{	   
						invalid(data["data"].info)
					}else{
						success("Berhasil disimpan!");
						reload_table();
					}  		
				}
		});     
};	

</script>

</head>
<body class="theme-light" data-highlight="mint">
	<input type="hidden" id="formToken" value="<?php echo $this->m_reff->getToken()?>">
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
<div id="page">
<!--
<div class="header header-fixed header-auto-show header-logo-app">
<a href="<?php echo base_url()?>mobile/index.html" class="header-title">AZURES</a>
<a href="<?php echo base_url()?>mobile/#" data-menu="menu-main" class="header-icon header-icon-1"><i class="fas fa-bars"></i></a>
<a href="<?php echo base_url()?>mobile/#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-dark"><i class="fas fa-sun"></i></a>
<a href="<?php echo base_url()?>mobile/#" data-toggle-theme class="header-icon header-icon-2 show-on-theme-light"><i class="fas fa-moon"></i></a>
<a href="<?php echo base_url()?>mobile/#" data-menu="menu-highlights" class="header-icon header-icon-3"><i class="fas fa-brush"></i></a>
</div>-->
<?php echo $this->load->view("temp_ppnpn/menu");?>
<div class="page-content">

<div class="page-title page-title-large">
<h2 data-username="<?php echo $this->m_reff->nama_depan()?>" class="sadow text-white sadow"><i class='fa fa-store'></i> <?php echo $this->m_reff->nama_resto()?></h2>
<!--<a style="margin-top:-41px" href="<?php echo base_url()?>up" data-menu="menu-main" class="bg-fade-gray1-dark shadow-xl preload-img" data-src="<?php echo $this->m_reff->dp_ppnpn()?>"></a>-->
</div>
<div class="card header-card shape-rounded" data-card-height="210">
<div class="card-overlay bg-highlight opacity-95"></div>
<div class="card-overlay dark-mode-tint"></div>
<div class="card-bg preload-img" data-src="<?php echo $this->m_reff->dp()?> "></div>
</div>

<?php 
$this->load->view($konten);
?>

<!--
<div class="footer">
<?php // echo $this->load->view("temp_ppnpn/menu_footer.php");?>
</div>
-->
 
</div>

<div id="menu-share" class="menu menu-box-bottom menu-box-detached rounded-m"   data-menu-height="420" data-menu-effect="menu-over">
<?php echo $this->load->view("temp_ppnpn/menu_share.php");?>
</div>

<?php echo $this->load->view("temp_ppnpn/menu_color.php");?>
 
<div id="menu-main" class="menu menu-box-right menu-box-detached rounded-m" data-menu-width="260"   data-menu-active="nav-welcome" data-menu-effect="menu-over">
<?php echo $this->load->view("temp_ppnpn/menu_main.php");?>
</div>

<script>
function success(msg){
$("#menu-success-1").showMenu();
$("#success_message").html(msg);
}
function invalid(msg){
$("#menu-warning-1").showMenu();
$("#info_err").html(msg);
}
</script>

<div id="menu-success-1" class="menu menu-box-modal rounded-m " data-menu-height="270" data-menu-width="310" style="display: block; width: 310px; height: 300px;">
        <h1 class="text-center mt-3 pt-1"><i class="fa fa-3x fa-check-circle color-green-dark shadow-xl rounded-circle"></i></h1>
        <h1 class="text-center mt-3 font-700">success</h1>
        <p class="boxed-text-l" id="success_message"> 
        </p>
        <a href="#" class="close-menu btn btn-m btn-center-m button-s shadow-l rounded-s text-uppercase font-900 bg-green-light">OK</a>
    </div>


<div id="menu-warning-1" class="menu menu-box-bottom menu-box-detached rounded-m" data-menu-height="305" data-menu-effect="menu-over" style="height: 305px; display: block;">
<h1 class="text-center mt-4"><i class="fa fa-3x fa-times color-red2-dark"></i></h1>
<h1 class="text-center mt-3 text-uppercase font-700">Gagal!</h1>
<p class="boxed-text-l" id="info_err">
</p>
<a href="#" class="close-menu btn btn-m btn-center-m button-s shadow-l rounded-s text-uppercase font-900 bg-red1-light">Go Back</a>
</div>
 
<script type="text/javascript" src="<?php echo base_url()?>mobile/scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>mobile/scripts/custom.js"></script>
</body>
</html>

 


