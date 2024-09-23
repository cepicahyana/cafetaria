<?php
$opr = $this->session->pic;
?>
<div class="sticky">
				<div class="horizontal-main hor-menu clearfix side-header">
					<div class="horizontal-mainwrapper container clearfix">
						<!--Nav-->
						<nav class="horizontalMenu clearfix">
							<ul class="horizontalMenu-list">
								<li aria-haspopup="true"><a href="<?php echo base_url()?>member" class="menuclick"><i class="fe fe-airplay  menu-icon"></i> Dashboard</a></li>
								
								
								<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="icon ion-md-chatboxes"></i> Messages&nbsp;<i class="fe fe-chevron-down horizontal-icon"></i></a> 
                                <ul class="sub-menu">
                                <li aria-haspopup="true"><a class="menuclick" href="<?php echo base_url();?>broadcast" class="slide-item">Send messages</a></li>
                                <li aria-haspopup="true"><a class="menuclick" href="<?php echo base_url();?>inbox" class="slide-item">Inbox (Pesan masuk)</a></li>
                              	<li aria-haspopup="true"><a class="menuclick" href="<?php echo base_url();?>outbox" class="slide-item">Outbox (Pesan keluar)</a></li>
                              	    	<li aria-haspopup="true"><a class="menuclick" href="<?php echo base_url();?>percakapan" class="slide-item">Percakapan</a></li>
                                 </ul>
								</li>

 <li aria-haspopup="true"><a href="<?php echo base_url()?>group" class="menuclick"><i class="fa fa-book"></i> Group &nbsp; </a></li>
								
								<!--<li aria-haspopup="true"><a href="<?php echo site_url('pesan')?>" class="slide-item menuclick"><i class="icon ion-md-alarm"></i> Reminder</a></li>-->
								<li aria-haspopup="true"><a href="<?php echo site_url('autoreplay')?>" class="slide-item menuclick"><i class="icon ion-ios-share-alt"></i> Auto replay</a></li>
								<li aria-haspopup="true"><a href="<?php echo site_url('device')?>" class="slide-item menuclick"><i class="fa fa-mobile-alt"></i> Device settings</a></li>
								<li aria-haspopup="true"><a href="<?php echo site_url('pelanggan')?>" class="slide-item menuclick"><i class="fa fa-users"></i> Pelanggan</a></li>
							 
                          
							    <li aria-haspopup="true"><a href="<?php echo base_url()?>data_pengaduan" class="menuclick"><i class="fa fa-book"></i> Data pengaduan</a></li>
							      <li aria-haspopup="true"><a href="<?php echo base_url()?>cs" class="menuclick"><i class="fa fa-envelope"></i> Live chat</a></li>
                               </ul>
           					  </ul>
						</nav>
						<!--Nav-->
					</div>
				</div>
			</div>
			<!--Horizontal-main -->