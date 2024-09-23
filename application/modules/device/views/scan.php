<div class="modal-content">  
                         <div class="modal-header">  <h5 class="modal-titles text-success" id="defaultModalLabel"><b> SCAN WHATSAPP WEB </b></h5>
						<button type="button" class="close" aria-label="Close"  >
                        <span aria-hidden="true" onclick="close_scan()">×</span>
						</button>
                    </div>


                        <div class="modal-body" >
                        <iframe src="<?php echo base_url()?>device/imgQr?id=<?php echo $this->input->post("id")?>" width="300" height="450" frameBorder="0"></iframe>
                    
                        </div>
</div>
