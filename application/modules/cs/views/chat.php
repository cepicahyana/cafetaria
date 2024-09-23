<style>
.scroll {
  height: 500px;
  overflow: scroll;
}
</style>
<?php
$kode = $this->input->post("kode");
$nama = $this->input->post("nama");
$idu = $this->session->userdata("id");


$this->db->where("kode",$kode);
$session = $this->db->get("session_cs")->row();
$id_cs = isset($session->id_cs)?($session->id_cs):null;
$no_tujuan = isset($session->sender_number)?($session->sender_number):null;
$no_tujuan = str_replace("@c.us","",$no_tujuan);
if($id_cs!=$idu and $id_cs!=null){
    echo "Sedang ditanggapi oleh cs lain...";
    return false;
}

$this->db->set("id_cs",$this->session->userdata("id"));
$this->db->where("kode",$kode);
$this->db->update("session_cs");



$this->db->order_by("id","asc");
$this->db->where("kode",$kode);
$chat = $this->db->get("pesan_cs")->result();


$dp = $this->db->get_where("admin",array("id_admin"=>$id_cs))->row();
$foto =  isset($dp->poto)?($dp->poto):"";
$foto_cs = base_url()."file_upload/foto/".$foto;
$nama_cs = isset($dp->owner)?($dp->owner):"";

?>
	<div class="card">
					<a class="main-header-arrow" href="" id="ChatBodyHide"><i
							class="icon ion-md-arrow-back"></i></a>
					<div class="main-content-body main-content-body-chat">
						<div class="main-chat-header">
							<div class="main-img-user"><img alt="" src="../../assets/img/faces/9.jpg"> </div>
							<div class="main-chat-msg-name">
								<h6>
								    <?=$nama;?></h6>
								    <!--<small>Last seen: 2 minutes ago</small>-->
							</div>
							<nav class="nav">
								<a class="nav-link" data-toggle="tooltip" href="" title="Teruskan" style="display:block">
								    <i class="fas fa-share-square fa-sm"></i>
								</a> 
								<a class="nav-link" data-toggle="tooltip" href="" title="Blokir" style="display:block">
								    <i class="fas fa-phone-slash"></i>
								</a> 
								<a class="nav-link" data-toggle="tooltip" href="javascript:endchat(`<?=$kode;?>`,`<?=$nama;?>`,`<?=$no_tujuan;?>`)" title="Selesai" style="display:block">
								    <i class="fas fa-check"></i>
								</a>
							</nav>
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
	        
	        
							    if(!$val->id_cs){
							    echo '<div class="media">
									<div class="main-img-user online"><img alt=""
											src="../../plug/img/cowok.png"> </div>
									<div class="media-body">
										<div class="main-msg-wrapper">
											'.$val->msg.'
										</div>
										'.$file.'
										<div>
											<span>'.substr($val->_ctime,10,6).'</span> <a href=""><i
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
											<span>'.substr($val->_ctime,10,6).'</span> <a href=""><i
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
					<div class="main-chat-footer">
						<nav class="nav">
							<a class="nav-link" data-toggle="tooltip" href="" title="Add Photo"><i
									class="fas fa-camera"></i></a> <a class="nav-link" data-toggle="tooltip"
								href="" title="Attach a File"><i class="fas fa-paperclip"></i></a> <a
								class="nav-link" data-toggle="tooltip" href="" title="Add Emoticons"><i
									class="far fa-smile"></i></a> <a class="nav-link" href=""><i
									class="fas fa-ellipsis-v"></i></a>
						</nav><input class="form-control" placeholder="Type your message here..." type="text" id="kirim">
						<a class="main-msg-send" href=""><i class="far fa-paper-plane"></i></a>
					</div>
				</div>
				
				<script>
			var objDiv = document.getElementById("scroll");
            objDiv.scrollTop = objDiv.scrollHeight;

setTimeout(function(){ 
      document.getElementById("kirim").focus();
}, 500);
    
var input = document.getElementById("kirim");
input.addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
    event.preventDefault();
    save_chat();
  }
});

function save_chat(){
                        var msg = $("#kirim").val();
                        if(msg==''){
                            return false;
                        } $("#kirim").val('');
                        
                        var url ="<?php echo site_url("cs/simpan_pesan");?>";
						var param = {
							kode: "<?=$kode;?>",
							msg : msg,
							no_tujuan:"<?=$no_tujuan?>",
							foto_cs : "<?=$foto_cs;?>",
							<?php echo $this->m_reff->tokenName()?>: token
						};
    	$.ajax({
							type: "POST",
							dataType: "json",
							data: param,
							url: url,
							success: function(val) {
								token = val['token'];
								// $("#newMsg").html(val['token']+"<div id='newMsg'></div>");
								var div = document.getElementById('newMsg');
                                div.innerHTML += val['data'];
                                
                                var objDiv = document.getElementById("scroll");
                                objDiv.scrollTop = objDiv.scrollHeight;
							}
						});
}

setInterval(function () {  getNewMsg(); }, 5000);
function getNewMsg(){
                       
                        var url ="<?php echo site_url("cs/getNewMsg");?>";
						var param = {
							kode: "<?=$kode;?>",
							<?php echo $this->m_reff->tokenName()?>: token
						};
    	$.ajax({
							type: "POST",
							dataType: "json",
							data: param,
							url: url,
							success: function(val) {
								token = val['token'];
								if(val['data']==false){
								    return false;
								}
								var div = document.getElementById('newMsg');
                                div.innerHTML += val['data'];
                                
                                var objDiv = document.getElementById("scroll");
                                objDiv.scrollTop = objDiv.scrollHeight;
							}
						});
}


function endchat(id,akun,sn){
    	swal({
					title: 'Akhiri percakapan ?',
					text: akun,
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
						swal("percakapan telah selesai", {
							icon: "success",
							buttons: {
								confirm: {
									className: 'btn btn-success'
								}
							}
						});

						var url =
							"<?php echo site_url("cs/end_chat");?>";
						var param = {
							kode: id,
							sn:sn,
							nama : akun,
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