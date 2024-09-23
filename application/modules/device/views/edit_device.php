
<?php
$this->db->where("id",$this->input->post("id"));
// $this->db->where("id_user",$this->m_reff->idu());
$data = $this->db->get("device_stations")->row();
if($data->sts!=5){
    $sts1="checked";
    $sts2="";
}else{
    $sts1="";
    $sts2="checked";
}
?>
<div class="modal-content" id='area_sender'>  
                         <div class="modal-header">  <h5 class="modal-titles text-success" id="defaultModalLabel"><b> Edit number </b></h5>
						<button type="button" class="close" aria-label="Close"  >
                        <span aria-hidden="true"  data-dismiss="modal">×</span>
						</button>
                    </div>

<form  id='sender' action="javascript:submitForm('sender')" method="post" 
url="<?php echo base_url()?>device/update">  
<input type="hidden" name="id" value="<?=$data->id;?>"/>
<input type="hidden" name="last_number" value="<?=$data->sender_number;?>"/>
                        <div class="modal-body" >

                                        <div class="col-md-12">
                                        </div>
                                        Sender number : <i class="float-right"> ( Nomor pengirim )</i>
                                        <input value="<?=$data->sender_number?>" autocomplete="off" type="text" required name="sender_number" onkeydown="return nomor(this, event);" class='form-control'>
                                        
                                        Sender Name : <i class="float-right">( Penamaan nomor )</i>
                                        <input  value="<?=$data->sender_name?>" autocomplete="off" type="text" required name="sender_name"  class='form-control'>
                                        
</br>
Status  : <i class="float-right"> </i>
 <div class="col-md-12 row">
                                   
                                        <div class="col-lg-3 mg-t-20 mg-lg-t-0"> <label class="rdiobox">
                                            <input <?=$sts1;?> value="0" name="sts" type="radio"> <span>Active</span></label> </div> 

                                        <div class="col-lg-6 mg-t-20 mg-lg-t-0"> <label class="rdiobox">
                                            <input <?=$sts2;?> value="5"  name="sts" type="radio"> <span>Non-aktif</span></label> </div> 
</div>
                                        </br>
                                         
                                      <center>
                                      <button onclick="submitForm('sender')" class="btn btn-primary">
                                      <i class='las la-save' style='font-size:20px'></i>    
                                      SIMPAN</button>
                                    </center>
                        </div>
    </form>                    
</div>
