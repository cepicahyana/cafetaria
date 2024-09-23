<style>
.scroll {
  height: 500px;
  overflow: scroll;
}
</style>
<?php
$sn = $this->input->post("sn");
$nm = $this->input->post("nm");
$idu  = $this->session->userdata("id");
$no_tujuan = $sn;
 
  
$chat = $this->db->query("select * FROM v_percakapan WHERE (sender_number='".$sn."' OR sender_name='".$sn."') and date(_ctime)>='2023-03-29' ORDER BY _ctime asc")->result();

$dp = $this->db->get_where("admin",array("id_admin"=>44))->row();
$foto =  isset($dp->poto)?($dp->poto):"";
$foto_cs = base_url()."file_upload/foto/".$foto;
$nama_cs = isset($dp->owner)?($dp->owner):"";

?>
	<div class="card">
					<a class="main-header-arrow" href="" id="ChatBodyHide"><i
							class="icon ion-md-arrow-back"></i></a>
					<div class="main-content-body main-content-body-chat">
						<div class="main-chat-header">
							<div class="main-img-user"><img alt="" src="<?php echo base_url();?>plug/img/cowok.png"> </div>
							<div class="main-chat-msg-name">
								<h6>
								    <?=$nm;?></h6>
								    <!--<small>Last seen: 2 minutes ago</small>-->
							</div>
						 
						</div><!-- main-chat-header -->
						<div class="main-chat-body" id="ChatBody">
							<div class="content-inner scroll" id="scroll">
								<!--<label class="main-chat-time"><span>3 days ago</span></label>-->
								
								
							<?php
							foreach($chat as $val){
							     if($val->file){
	            $file='<div class="main-msg-wrapper pd-0"><img alt="" class="wd-100 ht-100"
						src="'.base_url().$val->file.'"> </div>
						';
	        }else{
	            $file='';
	        }
	        
	        
							    if($val->inbox=="outbox"){
							    echo '<div class="media">
									<div class="main-img-user online"><img alt=""
											src="../../plug/img/cowok.png"> </div>
									<div class="media-body">
										<div class="main-msg-wrapper">
											'.$val->msg.'
										</div>
										'.$file.'
										<div>
											<span>'.$this->tanggal->hariLengkapJam($val->_ctime).'</span> <a href=""><i
													class="icon ion-android-more-horizontal"></i></a>
										</div>
									</div>
								</div>';
								}else{

    
								echo '<div class="media flex-row-reverse">
									<div class="main-img-user online"><img alt=""
											src="'.$foto_cs.'"> </div>
									<div class="media-body">
									'.$file.'
										<div class="main-msg-wrapper">
											'.$val->msg.'
										</div>
											
										<div>
											<span>'.$this->tanggal->hariLengkapJam($val->_ctime).'</span> <a href=""><i
													class="icon ion-android-more-horizontal"></i></a>
										</div>
									</div>
								</div>';
								
								}
							}
							?>
							
							<div id="newMsg"></div>
							<!--	<div class="media flex-row-reverse">
							<!--		<div class="main-img-user online"><img alt=""-->
							<!--				src="../../assets/img/faces/9.jpg"> </div>-->
							<!--		<div class="media-body">-->
							<!--			<div class="main-msg-wrapper">-->
							<!--				Nulla consequat massa quis enim. Donec pede justo, fringilla vel...-->
							<!--			</div>-->
							<!--			<div class="main-msg-wrapper">-->
							<!--				rhoncus ut, imperdiet a, venenatis vitae, justo...-->
							<!--			</div>-->
							<!--			<div class="main-msg-wrapper pd-0"><img alt="" class="wd-100 ht-100"-->
							<!--					src="../../assets/img/ecommerce/01.jpg"> </div>-->
							<!--			<div>-->
							<!--				<span>9:48 am</span> <a href=""><i-->
							<!--						class="icon ion-android-more-horizontal"></i></a>-->
							<!--			</div>-->
							<!--		</div>-->
							<!--	</div>-->
								
								
							 
								
							   
							</div>
						</div>
					</div>
					<!--<div class="main-chat-footer">-->
					<!--	<nav class="nav">-->
					<!--		<a class="nav-link" data-toggle="tooltip" href="" title="Add Photo"><i-->
					<!--				class="fas fa-camera"></i></a> <a class="nav-link" data-toggle="tooltip"-->
					<!--			href="" title="Attach a File"><i class="fas fa-paperclip"></i></a> <a-->
					<!--			class="nav-link" data-toggle="tooltip" href="" title="Add Emoticons"><i-->
					<!--				class="far fa-smile"></i></a> <a class="nav-link" href=""><i-->
					<!--				class="fas fa-ellipsis-v"></i></a>-->
					<!--	</nav><input class="form-control" placeholder="Type your message here..." type="text" id="kirim">-->
					<!--	<a class="main-msg-send" href=""><i class="far fa-paper-plane"></i></a>-->
					<!--</div>-->
				</div>
				
<script>
var objDiv = document.getElementById("scroll");
objDiv.scrollTop = objDiv.scrollHeight;
</script>