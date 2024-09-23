<?php
$sn=$this->input->get("id");
$this->db->where("kode",$sn);
$db=$this->db->get("device_stations")->row();
$kode=isset($db->kode)?($db->kode):null;
$sn=isset($db->sender_number)?($db->sender_number):null;
// $sn=$this->m_reff->decrypt($sn);
if($sn){
    $this->session->set_userdata("sn",$sn);
    $this->session->set_userdata("level","resto");
}elseif(!$this->session->userdata("sn")){
      echo "<i>Data not found atau anda belum memperpanjang layanan</i>";
    return false;
}
?><div class="main-content-body ">
<center><br>
	<div class="col-md-12s row">
 
<div class="col-xl-12 col-md-12 col-lg-12 col-sm-12">
	 <div class="cards" id="loading"> 
	  <div class="card-body text-left"> 
	   <div class="form-group "> 
	   <div class="row"> 
		<div class="col-md-12">
		    <span class="btns btn-groups btn-blocks">
		        <button class='btn btn-light'  onclick="order('<?php echo $this->tanggal->minTglEng(3,date('Y-m-d'))?>')">2 Hari lalu</button>
		        <button  class='btn btn-light'  onclick="order('<?php echo $this->tanggal->minTglEng(2,date('Y-m-d'))?>')">Kemarin</button>
		        <button  class='btn btn-light' onclick="order('<?php echo date('Y-m-d')?>')">Hari ini</button>
		    </span><br><br>
		    
		        <div id="order">Mohon tunggu...</div>
 
		    
        </div>
        </div>
        </div>
         </div>
          </div>
           </div>
        </div>
        </div>
        
        
        
        
<script>
order('<?=date('Y-m-d')?>');
    function order(tgl){
        var url   = "<?=base_url();?>master/getOrder";
									var param = {tgl:tgl,ci_csrf_token:token};
									$("#order").html("Mohon tunggu...");
											$.ajax({
													type: "POST",dataType: "json",data: param, url: url,
													success: function(val){ 
														token=val['token'];
														 $("#order").html(val['data']);
													 
													}
											});	
    }
    
    function konfirm(id,meja,tgl){
        	swal({
								  text: 'Pesanan sudah sesuai ?',
								  title: 'Confirm!',
								  type: 'warning',
								  buttons:{
									  cancel: {
										  visible: true,
										  text : 'cancel',
										  className: 'btn btn-dark'
									  },        			
									  confirm: {
										  text : 'Yes',
										  className : 'btn btn-danger'
									  }
								  }
							  }).then((willDelete) => {
								  if (willDelete) {
									var url   = "<?=base_url();?>master/order_sesuai";
									var param = {id:id,ci_csrf_token:token};
									
											$.ajax({
													type: "POST",dataType: "json",data: param, url: url,
													success: function(val){ 
														token=val['token'];
												// 		swal_notif("success!");
														order(tgl);
													}
											});	
								
								  }
								  });
    }
     
     function selesai(id,meja,tgl){
							swal({
								  text: 'Pesanan untuk meja '+meja+' sudah selesai ?',
								  title: 'Confirm!',
								  type: 'warning',
								  buttons:{
									  cancel: {
										  visible: true,
										  text : 'cancel',
										  className: 'btn btn-dark'
									  },        			
									  confirm: {
										  text : 'Yes',
										  className : 'btn btn-danger'
									  }
								  }
							  }).then((willDelete) => {
								  if (willDelete) {
									var url   = "<?=base_url();?>master/order_selesai";
									var param = {id:id,ci_csrf_token:token};
									
											$.ajax({
													type: "POST",dataType: "json",data: param, url: url,
													success: function(val){ 
														token=val['token'];
														swal_notif("success!");
														order(tgl);
													}
											});	
								
								  }
								  });
	 }
	   function hapus(id,meja,tgl){
							swal({
								  text: 'Pesanan untuk meja '+meja+' akan dihapus ?',
								  title: 'Confirm!',
								  type: 'warning',
								  buttons:{
									  cancel: {
										  visible: true,
										  text : 'cancel',
										  className: 'btn btn-dark'
									  },        			
									  confirm: {
										  text : 'Yes',
										  className : 'btn btn-danger'
									  }
								  }
							  }).then((willDelete) => {
								  if (willDelete) {
									var url   = "<?=base_url();?>master/order_delete";
									var param = {id:id,ci_csrf_token:token};
									
											$.ajax({
													type: "POST",dataType: "json",data: param, url: url,
													success: function(val){ 
														token=val['token'];
														swal_notif("success!");
														order(tgl);
													}
											});	
								
								  }
								  });
	 }
function perubahan(id_order){ 
          $("#mdl_modal_tambah").modal("show");
									var url   = "<?=base_url();?>master/perubahan_order";
									var param = {id_order:id_order,ci_csrf_token:token};
											$.ajax({
													type: "POST",dataType: "json",data: param, url: url,
													success: function(val){ 
														token=val['token'];
														 $("#viewAdd_pic").html(val['data']);
													}
											});	 
    }
</script>    


<div class="modal effect-flip-vertical" id="mdl_modal_tambah" style="z-index:1500" role="dialog">
		<div class="modal-dialog modal-md" id="area_modal_tambah" role="document">

			<div class="modal-content">
			 
			<div id="viewAdd_pic"></div>
			</div>
		</div>
	</div><!-- /.modal-dialog -->
</div>
</div>			