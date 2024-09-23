<?php 
$this->db->where("id_cs",null);
$this->db->or_where("id_cs",$this->m_reff->idu());
$datapesan = $this->db->get("session_cs");
$jml = $datapesan->num_rows();
?>


	<div class="main-content-left main-content-left-chat">
					    <div class="main-chat-contacts-wrapper">
					        <label class="main-content-label" style="margin-bottom:0px"><a class="btn btn-info" href="#"><i class="far fa-envelope"></i> </class>Pesan Masuk (<?=$jml;?>)</a></label>
					        <label class="main-content-label" style="margin-bottom:0px"><a class="btn btn-light" href="#"><i class="far fa-clock"></i> History</a></label>
                        </div>
						<nav class="nav main-nav-line main-nav-line-chat">
							<a class="nav-link active" data-toggle="tab" href="javascript:listChat()">Recent Chat (0)</a> 
							<a class="nav-link" data-toggle="tab" href="javascript:listChat()">Histori Hari ini (10)</a> 
						</nav>
						<div class="main-chat-list" id="ChatList">
						    
						    
						   <?php
						   foreach($datapesan->result() as $val){
						   $sn = str_replace("@c.us","",$val->sender_number);
						   $intro = $val->intro;
						   if($val->id_cs){
						       $new=false;
						   }else{
						       $new="new";
						   }
						   ?>
							<div onclick="tangkap('<?=$val->kode;?>','<?=$val->sender_name. " (".$sn.")";?>')" class="media <?=$new;?>">
								<div class="main-img-user online">
									<img alt="" src="../plug/img/cowok.png"> <span><i class='fa fa-envelope'></i></span>
								</div>
								<div class="media-body">
									<div class="media-contact-name">
										<span><?=$val->sender_name. " (".$sn.")";?></span> <span><?php echo $this->tanggal->selisih_waktu($val->_ctime);?></span>
									</div>
									<p><?=$intro;?></p>
								</div>
							</div>
							 <?php } ?>
						 
						 
						 
						 
						</div><!-- main-chat-list -->
					</div>