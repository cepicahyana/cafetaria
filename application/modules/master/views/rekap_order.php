<?php
$sn = $this->session->userdata("sn");
$this->db->where("sender_number",$sn);
$data = $this->db->get("device_stations")->row();
$price_order = $data->price_order;
$price_access = $data->price_access;


?>
<!-- main-content-body --><br>
					<div class="main-content-body ">
<center>
 
	<div class="col-md-12s row">

 <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12">
	 <div class="card"> 
		<div class="card-body"> 
		 		<div class="alert alert-info">DATA ORDER HARI INI</div>
		 		<div id="order_rekap">
		
		         </div> 
		         <br>
		   <div class="alert alert-info">Klik nama pelanggan untuk melihat detail order</div>
		</div> 
		      
	</div> 
</div> 
 
  
	</div>
</center>
 
 

					 
						<!-- /row -->
					</div>
		 
		 
		 <script>
		 order();
		      function order(){
        var url   = "<?=base_url();?>master/getRekapOrder";
									var param = {ci_csrf_token:token};
									loading("order_rekap");
											$.ajax({
													type: "POST",dataType: "json",data: param, url: url,
													success: function(val){ 
														token=val['token'];
														 $("#order_rekap").html(val['data']);
													 unblock("order_rekap");
													}
											});	
    }
    function setSts(id,sts){
        var url   = "<?=base_url();?>master/setOrderRekap";
									var param = {ci_csrf_token:token,id:id,sts:sts};
											$.ajax({
													type: "POST",dataType: "json",data: param, url: url,
													success: function(val){ 
														token=val['token'];
														order();
													}
											});	
    }
    function showOrder(id,nama){
        $("#mdl_modal_tambah").modal();
       var url   = "<?=base_url();?>master/detail_order";
        var param = {ci_csrf_token:token,id:id,nama:nama};
        $.ajax({
          type: "POST",dataType: "json",data: param, url: url,
          success: function(val){
          $("#viewAdd_pic").html(val['data']);
          token=val['token'];
        }
      });   
    }
		 </script>
		 
		  <div class="modal effect-flip-vertical" id="mdl_modal_tambah" style="z-index:1500" role="dialog">
		<div class="modal-dialog modal-lg" id="area_modal_tambah" role="document">

			<div class="modal-content">
			 
			<div id="viewAdd_pic"></div>
			</div>
		</div>
	</div><!-- /.modal-dialog -->
</div>
</div>			