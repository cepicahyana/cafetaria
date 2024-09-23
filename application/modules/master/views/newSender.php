<div class="modal-content" id='area_sender'>  
                         <div class="modal-header">  <h5 class="modal-titles text-success" id="defaultModalLabel"><b> New number </b></h5>
						<button type="button" class="close" aria-label="Close"  >
                        <span aria-hidden="true"  data-dismiss="modal">×</span>
						</button>
                    </div>

<form  id='sender' action="javascript:submitForm('sender')" method="post" 
url="<?php echo base_url()?>device/insert">  
                        <div class="modal-body" >

                                        <div class="col-md-12">
                                        </div>
                                        Sender number : <i class="float-right"> ( Nomor yang akan digunakan )</i>
                                        <input autocomplete="off" type="text" required name="sender_number" onkeydown="return nomor(this, event);" class='form-control'>
                                        
                                        Sender Name : <i class="float-right">( Penamaan nomor )</i>
                                        <input autocomplete="off" type="text" required name="sender_name"  class='form-control'>
                                        
</br>
                                        Package: <a target="_blank" href="#" class="float-right">Lihat detail layanan</a>
                                      <?php
                                      $db = $this->db->get("data_paket")->result();
                                      $dt[null]="==== Pilih paket layanan ====";
                                      foreach($db as $val){
                                        $dt[$val->id] = $val->alias;
                                      }
                                      echo form_dropdown("package",$dt,null,"required class='cursor form-control'");
                                      ?>
                                      <br>
                                      <center>
                                      <button onclick="submitForm('sender')" class="btn btn-primary">
                                      <i class='las la-shopping-cart' style='font-size:20px'></i>    
                                      ORDER</button>
                                    </center>
                        </div>
    </form>                    
</div>
