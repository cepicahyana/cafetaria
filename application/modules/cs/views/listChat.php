<?php 
// $this->db->where("id_cs",null);
$this->db->where("id_cs",$this->m_reff->idu());
$datapesan = $this->db->get("session_cs");

$this->db->where("id_cs",null);
$jml = $this->db->get("session_cs")->num_rows();
?>


	<div class="main-content-left main-content-left-chat">
					    <div class="main-chat-contacts-wrapper">
					        <label class="main-content-label" style="margin-bottom:0px"><a class="btn btn-info" href="javascript:ambilchat()"><i class="far fa-envelope"></i> </class>Pesan Baru (<?=$jml;?>)</a></label>
					        <label class="main-content-label" style="margin-bottom:0px"><a class="btn btn-light" href="#"><i class="far fa-clock"></i> Riwayat (5)</a></label>
                        </div>
						<nav class="nav main-nav-line main-nav-line-chat">
							<a class="nav-link active" data-toggle="tab" href="">Sedang berlangsung (0)</a> 
							<a class="nav-link" data-toggle="tab" href="">Selesai (10)</a> 
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
					
<script>
    function ambilchat(){
    	swal({
					title: ' Ambil percakapan ?',
					text: '1 percakapan akan tersedia untuk anda',
					type: 'warning',
					buttons: {
						cancel: {
							visible: true,
							text: 'batal',
							className: 'btn btn-danger'
						},
						confirm: {
							text: 'Ya',
							className: 'btn btn-success'
						}
					}
				}).then((willDelete) => {
					if (willDelete) {
				// 		swal("percakapan telah selesai", {
				// 			icon: "success",
				// 			buttons: {
				// 				confirm: {
				// 					className: 'btn btn-success'
				// 				}
				// 			}
				// 		});

						var url =
							"<?php echo site_url("cs/getChat");?>";
						var param = {
					
						
							<?php echo $this->m_reff->tokenName()?>: token
						};
						loading("htmlchat");
						$("#htmlchat").html("<br>  <p class='text-white alert alert-warning'><b>Mohon tunggu, sedang memuat pesan .....</b></p><br><br>");
						$.ajax({
							type: "POST",
							dataType: "json",
							data: param,
							url: url,
							success: function(val) {
								token = val['token'];
								  listChat();
								$("#htmlchat").html(val['data']);
								unblock("htmlchat");
							}
						});
					}
				});
}
</script>					