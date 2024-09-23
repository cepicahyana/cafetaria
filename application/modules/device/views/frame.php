
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script> -->
	<!-- <script src="<?php echo base_url()?>assets/js/fancywebsocket.js"></script> -->

<style>
  
.button-1 {
  background-color: #EA4C89;
  border-radius: 8px;
  border-style: none;
  box-sizing: border-box;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: "Haas Grot Text R Web", "Helvetica Neue", Helvetica, Arial, sans-serif;
  font-size: 14px;
  font-weight: 500;
  height: 40px;
  line-height: 20px;
  list-style: none;
  margin: 0;
  outline: none;
  padding: 10px 16px;
  position: relative;
  text-align: center;
  text-decoration: none;
  transition: color 100ms;
  vertical-align: baseline;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-1:hover,
.button-1:focus {
  background-color: #F082AC;
}
</style>

<?php
 $img = $this->db->get_where("device_stations",array(
    // "id_user"=>$this->m_reff->idu(),
      "id"=>$this->input->get_post("id")
 ))->row();


 if($img->sts==0){
     echo "<div style='margin-left:-5px;text-align:justify;background-color:#FAEBD7;padding:10px;width:220px;border-radius:10px' > Tidak terhubung, sambungkan sekarang ?</div>";
    echo "<br><br> <a href='".base_url()."device/rescan?id=".$this->m_reff->encrypt($img->id)."&sender=".$img->sender_number."' class='button-1' style='width:80%' > Sambungkan</a>";
    }
 elseif($img->sts==1){
     echo "<br><br><br><br>
   <div style='color:green;font-wight:bold'>  success!!<br>Status perangkat anda saat ini telah terhubung.<br><br></div>  "; 
     echo "<br><br><br>
     <br><br><br>
     <br><br><br>  <a href='".base_url()."device/rescan?id=".$this->m_reff->encrypt($img->id)."&sender=".$img->sender_number."' class='button-1' style='width:80%' > Scan ulang ?</a>";
   
 } elseif($img->sts==2){
  $qr=str_replace("[removed]","data:image/png;base64,",$img->qr);
  echo "<div style='margin-left:-5px;text-align:justify;background-color:#F0F8FF;padding:10px;width:220px;border-radius:10px' >";
    echo "<img width='220px' src='".$qr."'></img>";
 
    echo '<br><br> Silahkan buka whatsapp anda kemudian tautkan perangkat,
    Sama seperti  mengkoneksikan whatsapp web ke komputer.<hr>
   Mohon tunggu maksimal 3 menit setelah berhasil scan.';
   echo '</div>';

 }elseif($img->sts==3){

  echo "<div style='margin-left:-5px;text-align:justify;background-color:#F0F8FF;padding:10px;width:220px;border-radius:10px' >";
    echo ' Sedang menghubungkan...';
   echo '</div>';

 }elseif($img->sts==4){

  echo "<div style='margin-left:-5px;text-align:justify;background-color:#F0F8FF;padding:10px;width:220px;border-radius:10px' >";
    echo ' Restarting...';
   echo '</div>';

 }elseif($img->sts==5){

  echo "<div style='margin-left:-5px;text-align:justify;background-color:#F0F8FF;padding:10px;width:220px;border-radius:10px' >";
    echo ' Status : dinonaktifkan';
   echo '</div>';

 }elseif($img->sts==100){
  echo "<div style='margin-left:-5px;text-align:justify;background-color:#FAEBD7;padding:10px;width:220px;border-radius:10px' >
  Mohon tetap dihalaman ini, sistem sedang mengkoneksikan whatsapp anda...</div>";

 }
 ?>
 <script>setInterval(function(){ window.location.href='' }, 2000); </script>
 <!--
 <script>
		$(document).ready(function() {
			var socket = io();
console.log(socket);
			// Ketika button tambah diklik
			$('.add-client-btn').click(function() {
				var clientId = $('#client-id').val();
				var clientDescription = $('#client-description').val();
				var template = $('.client').first().clone()
										   .removeClass('hide')
										   .addClass(clientId);
				template.find('.title').html(clientId);
				template.find('.description').html(clientDescription);
				$('.client-container').append(template);

				socket.emit('create-session', {
					id: clientId,
					description: clientDescription
				});
			});

			socket.on('init', function(data) {
				$('.client-container .client').not(':first').remove();
				console.log(data);
				for (var i = 0; i < data.length; i++) {
					var session = data[i];

					var clientId = session.id;
					var clientDescription = session.description;
					var template = $('.client').first().clone()
											   .removeClass('hide')
											   .addClass(clientId);
					template.find('.title').html(clientId);
					template.find('.description').html(clientDescription);
					$('.client-container').append(template);

					if (session.ready) {
						$(`.client.${session.id} .logs`).append($('<li>').text('Whatsapp is ready!'));
					} else {
						$(`.client.${session.id} .logs`).append($('<li>').text('Connecting...'));
					}
				}
			});

			socket.on('remove-session', function(id) {
				$(`.client.${id}`).remove();
			});

			socket.on('message', function(data) {
				$(`.client.${data.id} .logs`).append($('<li>').text(data.text));
			});

			socket.on('qr', function(data) {
				$(`.client.${data.id} #qrcode`).attr('src', data.src);
				$(`.client.${data.id} #qrcode`).show();
			});

			socket.on('ready', function(data) {
				$(`.client.${data.id} #qrcode`).hide();
			});

			socket.on('authenticated', function(data) {
				$(`.client.${data.id} #qrcode`).hide();
			});
		});
	</script>-->