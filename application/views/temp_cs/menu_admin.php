
 
<div class="sticky">
				<div class="horizontal-main hor-menu clearfix side-header">
					<div class="horizontal-mainwrapper container clearfix">
						<!--Nav-->
						<nav class="horizontalMenu clearfix">
							<ul class="horizontalMenu-list">
								<li aria-haspopup="true"><a href="<?php echo base_url()?>dashboard" class="menuclick"><i class="fe fe-airplay  menu-icon"></i> Dashboard</a></li>
								<li aria-haspopup="true"><a href="#"><i class="fe fe-bar-chart-2"></i> Monitoring kesehatan </a>
								<ul class="sub-menu">

								<li aria-haspopup="true"><a href="<?php echo base_url()?>monkes" class="menuclick"> Pegawai</a></li>
								<li aria-haspopup="true"><a href="<?php echo base_url()?>monkes/keluarga" class="menuclick"> Keluarga</a></li>
							 
								</ul></li>
								
								<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="icon ion-ios-stats "></i> Monitoring biro </a>
									<ul class="sub-menu">
                                        <?php
                                        $data = $this->db->get("tm_biro")->result();
                                        foreach($data as $val){
echo '	<li aria-haspopup="true"><a href="'.base_url().'monbiro?id='.$val->id.'" class="slide-item">'.$val->nama.'</a></li>';
                                        }
                                        ?>
										 
									</ul>
								</li>
                                <li aria-haspopup="true"><a href="widgets.html" class=""><i class="fas fa-envelope-open-text"></i> Pesan informasi</a></li>
							<!--	<li aria-haspopup="true"><a href="#" class="sub-icon"><i class="fe fe-compass"></i> Pages <i class="fe fe-chevron-down horizontal-icon"></i></a>
									<ul class="sub-menu">
										<li aria-haspopup="true"><a href="profile.html" class="slide-item">Profile</a></li>
										<li aria-haspopup="true"><a href="editprofile.html" class="slide-item">Edit-profile</a></li>
										<li aria-haspopup="true" class="sub-menu-sub"><a href="#">Mail <span class="badge badge-pink side-badge">5</span></a>
											<ul class="sub-menu">
												<li aria-haspopup="true"><a href="mail.html" class="slide-item">Mail-inbox</a></li>
												<li aria-haspopup="true"><a href="mail-compose.html" class="slide-item">Mail-compose</a></li>
												<li aria-haspopup="true"><a href="mail-read.html" class="slide-item">Mail-read</a></li>
												<li aria-haspopup="true"><a href="mail-settings.html" class="slide-item">Mail-settings</a></li>
												<li aria-haspopup="true"><a href="chat.html" class="slide-item">Chat</a></li>

											</ul>
										</li>
										<li aria-haspopup="true" class="sub-menu-sub"><a href="#">Forms <span class="badge badge-info side-badge">6</span></a>
											<ul class="sub-menu">
												<li aria-haspopup="true"><a href="form-elements.html" class="slide-item">Form Elements</a></li>
												<li aria-haspopup="true"><a href="form-advanced.html" class="slide-item">Advanced Forms</a></li>
												<li aria-haspopup="true"><a href="form-layouts.html" class="slide-item">Form Layouts</a></li>
												<li aria-haspopup="true"><a href="form-validation.html" class="slide-item">Form Validation</a></li>
												<li aria-haspopup="true"><a href="form-wizards.html" class="slide-item">Form Wizards</a></li>
												<li aria-haspopup="true"><a href="form-editor.html" class="slide-item">WYSIWYG Editor</a></li>
											</ul>
										</li>
										<li aria-haspopup="true"><a href="invoice.html" class="slide-item">Invoice</a></li>
										<li aria-haspopup="true"><a href="todotask.html" class="slide-item">Todotask</a></li>
										<li aria-haspopup="true"><a href="pricing.html" class="slide-item">Pricing</a></li>
										<li aria-haspopup="true"><a href="gallery.html" class="slide-item">Gallery</a></li>
										<li aria-haspopup="true"><a href="faq.html" class="slide-item">Faqs</a></li>
										<li aria-haspopup="true"><a href="empty.html" class="slide-item">Empty Page</a></li>
									</ul>
								</li>-->
								</li>
							 
							</ul>
						</nav>
						<!--Nav-->
					</div>
				</div>
			</div>
			<!--Horizontal-main -->