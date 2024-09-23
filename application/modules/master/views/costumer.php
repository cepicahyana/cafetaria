<?php
$this->db->where("sender_number",$sn=$this->session->userdata("sn"));
$data = $this->db->get("device_stations")->row();
$sts = isset($data->sts)?($data->sts):null;
$file = isset($data->file_broadcast)?($data->file_broadcast):null;
$this->db->where("to",$this->session->userdata("sn"));
$jml = $this->db->get("data_pelanggan")->num_rows();
?>

<br>


					<!-- main-content-body -->
					<div class="main-content-body ">
  <div class="col-xl-12 col-md-12 col-lg-12 col-sm-12">
	 <div class="card"> 
		<div class="card-body"> 
			<div class="plan-card text-center"> <i class="fas fa-users plan-icon text-success"></i> 
			<h6 class="text-drak text-uppercase mt-2">Jumlah Pelanggan </h6>
			<h2 class="mb-2" id="jml">  <?=$jml;?> </h2> 
			 <!--<hr>-->
		<!--<button onclick="syncron()" class='  btn-info'><i class='fa fa-retweet'></i> RAPIHKAN DATA PELANGGAN</button>-->
			</div> 
		</div> 
	</div> 
</div> 

 
 <script>
	 function newSchedule(){
		 var tr1 =document.getElementById("first").innerHTML;
		 $("#new").append("<hr>"+tr1);
	 }
 </script>
					   
<div class="card">
	<div class="card-body" id="area_lod">
	<div class="table-responsivex mb-0">
											<table id="table" class="table mg-b-0 ">
												<thead>
													<tr> 
														<th class='thead' style='max-width:15px' > <input type='checkbox' id='basic_checkbox_1' class='pilihsemua filled-in chk-col-red'   value='ya'><label for='basic_checkbox_1'>  </label></th>	
														 <th style="width:100%"> Pelanggan</th> 
														 <th style="width:100%"> Berkunjung</th> 
													</tr>
												</thead>
												 
											</table>
										</div>
	</div>
</div>
   				</div>
					


 

<script>
	    const frameset = document.getElementById("first").innerHTML;
 </script>
	
<script type="text/javascript">
 function syncron(){
        var url   = "<?php echo site_url("master/syncron");?>";
        var param = {<?php echo $this->m_reff->tokenName()?>:token};
        loading();
        $.ajax({
          type: "POST",dataType: "json",data: param, url: url,
          success: function(val){
               unblock();
        //   	token=val['token'];
          	var jml=val['data'];
           
            $("#jml").html(jml);
        	swal_notif(" success! ");
        	reload_table();
        }
      });   
	}
	
	
  var mode = "add";
  var save_method; //for save method string
  var table;
  var  dataTable = $('#table').DataTable({ 
		"paging": true,
        "processing": false, //Feature control the processing indicator.
        "ordering":false,
		"language": {
					 "sSearch": "Pencarian",
					 "processing": ' <span class="sr-only dataTables_processing">Loading...</span> <br><b style="color:black;background:white">Proses menampilkan data<br> Mohon Menunggu..</b>',
						  "oPaginate": {
							"sFirst": "Hal Pertama",
							"sLast": "Hal Terakhir",
							 "sNext": "Selanjutnya",
							 "sPrevious": "Sebelumnya"
							 },
						"sInfo": "Total :  _TOTAL_ , Halaman (_START_ - _END_)",
						 "sInfoEmpty": "Tidak ada data yang di tampilkan",
						   "sZeroRecords": "Data tidak tersedia",
						  "lengthMenu": "Tampil _MENU_ Baris",  
				    },
					 
					 
        "serverSide": true, //Feature control DataTables' server-side processing mode.
		 "responsive": false,
		 "searching": false,
		 "lengthMenu":
		 [[10 ,20,30], 
		 [10 ,20,30], ], 
	  dom: 'Blfrtip',
		buttons: [
           // 'copy', 'csv', 'excel', 'pdf', 'print'
	 
		{
			  text: ' Refresh ',
                action: function ( e, dt, node, config ) {
                   reload_table();
                },className: 'btn btn-light '
                },{ text: ' Broadcast ',
                action: function ( e, dt, node, config ) {
                   broadcast_view();
                },className: 'btn   btn-light fa fa-paper-plane '
                }, 
	 
					 
					 
        ],
        
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('master/getDataCos');?>",
            "type": "POST",
			"data": function ( data ) {
				data.<?php echo $this->m_reff->tokenName()?>=token;
		 },
		   beforeSend: function() {
               loading("area_lod");
            },
			complete: function(data) {
			  token=data.responseJSON.token;
              unblock('area_lod');
              	$(".pilih").prop("checked", false);
		        $(".pilihsemua").val("ya");
		        	$(".pilihsemua").prop("checked", false);
            },
			
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [ 0,-1], //last column
          "orderable": false, //set not orderable
        },
        ],
	
      });

	
	function reload_table()
	{
		 dataTable.ajax.reload(null,false);	
		 document.getElementById("batal").click();
		 mode ="add";
	};
 
	function balas(id,sn){
	    $("#mdl_modal_tambah").modal();
        var url   = "<?php echo site_url("outbox/balas");?>";
        var param = {<?php echo $this->m_reff->tokenName()?>:token,id:id};
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
	
	
	
	
	
	
    <script type="text/javascript">
//     function hapus_cek()
// 	{	var h = ceklis();  
// 				if(h!="true")
// 				{
// 					notif("Silahkan pilih data tamu terlebih dahulu");
// 					return false;
// 				} 
// 		alertify.confirm("<center>Hapus data terpilh?</center>",function(){
				
// 				 var checkbox_value = "";
// 				$("[name='hapus[]']").each(function () {
// 					var ischecked = $(this).is(":checked");
// 					if (ischecked) {
// 						checkbox_value += $(this).val() + ",";
// 					}
// 				});
			  
// 			   var kode=$("[name='filter']").val();
// 			    $.post("<?php echo site_url("/hapus_cek"); ?>",{kode:kode,id:checkbox_value},function(data){
// 		 	    reload_table();
// 			});  
// 		}); 
// 	}
    
    
 
  	$(".pilihsemua").click(function(){
 
		if($(".pilihsemua").val()=="ya") {
		$(".pilih").prop("checked", "checked");
		$(".pilihsemua").val("no");
		 
		} else {
		$(".pilih").prop("checked", false);
		$(".pilihsemua").val("ya");
  
		}
	
	});
	
	function pilcek(){
	 
		$(".pilihsemua").prop("checked", false);
		$(".pilihsemua").val("ya");
		 
	};
		function ceklis()
			{	 var i=0;
				 $("[name='pilih[]']").each(function () {
					var ischecked = $(this).is(":checked");
					if (ischecked) { 
						i++;
					};  
				}); 
				if(i==0)
					{
						return "false";
					}else{
						return "true";
					}
			}
	</script>
	
	

<script>
    function broadcast_view(){
        var checkbox_value = "";
				$("[name='pilih[]']").each(function () {
					var ischecked = $(this).is(":checked");
					if (ischecked) {
						checkbox_value += $(this).val() + ",";
					}
				});
				 $("#isi").html("Loading...");
         $("#mdl_formBroadcast").modal();
        var url   = "<?php echo site_url("master/isi_broadcast");?>";
        var param = {<?php echo $this->m_reff->tokenName()?>:token,peserta:checkbox_value};
        $.ajax({
          type: "POST",dataType: "json",data: param, url: url,
          success: function(val){
          $("#isi").html(val['data']);
          token=val['token'];
        }
      });   
      
      
    }
    
    function del(){
	    $("#hps").hide();
	    $("#blah").hide();
	     var url   = "<?php echo site_url("master/del_media");?>";
        var param = {<?php echo $this->m_reff->tokenName()?>:token};
        $.ajax({
          type: "POST",dataType: "json",data: param, url: url,
          success: function(val){ 
        	swal_notif("Success! ");
        }
      });   
	}
</script>





   <!-- Modal -->
<div class="modal fade" id="mdl_formBroadcast" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" id="area_formBroadcast">
        <div class="modal-content modal-lg">
		<form id="formBroadcast" url="<?php echo base_url()?>master/sent2" action="javascript:submitF('formBroadcast')" method="post"  >
                
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title col-teal">
                   Broadcast
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
            <div class="col-md-12 body" id="isi">    
   	  	 
            </div>
            </div>
            <div class="row clearfix"></div>
            <div class="modal-footer">
			  <div id="inf" class="text-success"></div>
              <button onclick="submitF('formBroadcast')"  class="pull-right waves-effect btn   btn-primary">  Kirim sekarang</button>
                         
                        </div>
            </form>
        
		</div>
    </div>
</div>


<script>
    	
function submitF(id){
    					////
						 loading("area_"+id);
									
		var form = $("#"+id);
		var link = $(form).attr("url");
	 
		$(form).ajaxForm({
		 url:link,
		 data: $(form).serialize(),
		 method:"POST",
		 dataType:"JSON",
		 beforeSend: function() {
               loading("area_"+id);
            },
		 success: function(data)
				{ 	   
				    
					token = data["token"];
		 
					unblock("area_"+id); 	
					if(data["data"]["gagal"]==true)
					{	  
							notif("<font color='black'>"+data["data"]["info"]+"</font>");
							console.log("gagal");
					} else{
					    console.log("success"); 
				        $("#inf").html(data.data["info"]);
					 	 
					  
					}
					 			
				}
		});     
}

</script>
	 

	