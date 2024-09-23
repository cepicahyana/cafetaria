<?php
 $level = $this->session->userdata("level");
if($level=="admin"){
    $dp = $this->db->get_where("admin",array("id_admin"=>$this->session->userdata("id")))->row();
    $foto = isset($dp->poto)?($dp->poto):"";
    $nama_pengguna = isset($dp->owner)?($dp->owner):"";
}elseif($level=="member"){
    $dp = $this->db->get_where("data_member",array("id"=>$this->session->userdata("id")))->row();
    $foto = isset($dp->poto)?($dp->poto):"dp.png";
    $nama_pengguna = isset($dp->nama)?($dp->nama):"";
}
?>

 
 
 <div class="main-header nav nav-item hor-header ">        
        
   
					<div class="container">
						<div class="main-header-left ">
							<a class="animated-arrow hor-toggle horizontal-navtoggle"><span></span></a><!-- sidebar-toggle-->
							<a class="header-brand  hor-toggle horizontal-navtoggle" >
							<div class="logo-white sadow" style="color:#FFFF00;margin-top:20px;font-size:17px;font-weight:bold">
							<i class="fas fa-robot sadow" style="font-size:25px;color:#FFFF00"></i> RestoBot </div>
								<img src="<?php echo base_url()?>assets/img/brand/logo.png" class="logo-default">
								<div class="icon-white" style="color:white;margin-top:20px;font-size:16px;font-weight:bold"> RestoBot </div>
								<img src="<?php echo base_url()?>assets/img/brand/favicon.png" class="icon-default">
							</a>
							<div class="main-header-center">
                           
							</div>
						</div>

						<!-- search -->
						<div class="main-header-right">
							 
								 
						</div>
					</div>
				</div>