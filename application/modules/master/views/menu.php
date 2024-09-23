<br>


					<!-- main-content-body -->
					<div class="main-content-body ">
 
 
 <script>
	 function newSchedule(){
		 var tr1 =document.getElementById("first").innerHTML;
		 $("#new").append("<hr>"+tr1);
	 }
 </script>
					   
<div class="card">
	<div class="card-body" id="area_lod">
	<div class="table-responsive mb-0">
											<table id="table" class="table mg-b-0 ">
												<thead>
													<tr> 
													<th > No</th> 
													<th style="min-width:150px"> Menu</th>
													<th > Harga</th>
													<th > Jenis</th>
													<th > Status</th>
													<th > Edit</th>
													<th > Hapus</th>
													</tr>
													
												</thead>
												 
											</table>
										</div>
	</div>
</div>
 
 

					 
						<!-- /row -->
					</div>
					



					
<script>
$('#tgl').daterangepicker({
    "singleDatePicker": true,
    "showDropdowns": true,
    "autoApply": true,
    "locale": {
        "format": "DD/MM/YYYY",
        "separator": " - ",
        "applyLabel": "Apply",
        "cancelLabel": "Cancel",
        "fromLabel": "From",
        "toLabel": "To",
        "customRangeLabel": "Custom",
        "weekLabel": "W",
        "daysOfWeek": [
            "Min",
            "Sen",
            "Sel",
            "Rab",
            "Kam",
            "Jum",
            "Sab"
        ],
        "monthNames": [
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Augustus",
            "September",
            "Oktober",
            "November",
            "Desember"
        ],
        "firstDay": 1
    }
});
</script>





<script>
	    const frameset = document.getElementById("first").innerHTML;
 </script>
	
<script type="text/javascript">
  var mode = "add";
  var save_method; //for save method string
  var table;
  var  dataTable = $('#table').DataTable({ 
		"paging": true,
        "processing": false, //Feature control the processing indicator.
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
		 "searching": true,
		 "ordering":false,
		 "lengthMenu":
		 [[10 ,20,30], 
		 [10 ,20,30], ], 
	  dom: 'Blfrtip',
		buttons: [
           // 'copy', 'csv', 'excel', 'pdf', 'print'
	 
		{
			  text: 'Refresh ',
                action: function ( e, dt, node, config ) {
                   reload_table();
                },className: 'btn   btn-light  '
                }, 
                	{
			  text: 'Tambah ',
                action: function ( e, dt, node, config ) {
                   tambahBarang();
                },className: 'btn   btn-primary  '
                }, 
	 
					 
					 
        ],
        
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('master/getDataMenu');?>",
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
            },
			
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [ 0], //last column
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
 
	function edit(id=null){
	    $("#mdl_modal_tambah").modal();
        var url   = "<?php echo site_url("master/form_edit_menu");?>";
        var param = {<?php echo $this->m_reff->tokenName()?>:token,id:id};
        $.ajax({
          type: "POST",dataType: "json",data: param, url: url,
          success: function(val){
          $("#viewAdd_pic").html(val['data']);
          token=val['token'];
        }
      });   
	}
	
	function tambahBarang(id=null){
	    $("#mdl_modal_tambah").modal();
        var url   = "<?php echo site_url("master/form_edit_menu");?>";
        var param = {<?php echo $this->m_reff->tokenName()?>:token,id:id};
        $.ajax({
          type: "POST",dataType: "json",data: param, url: url,
          success: function(val){
          $("#viewAdd_pic").html(val['data']);
          token=val['token'];
        }
      });   
	}
	
	
	function hapus(id,nama){
							swal({
								  text: 'Menu '+nama+' akan dihapus ?',
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
									var url   = "<?=base_url();?>master/delete_menu";
									var param = {id:id,ci_csrf_token:token};
									
											$.ajax({
													type: "POST",dataType: "json",data: param, url: url,
													success: function(val){ 
														token=val['token'];
														swal_notif("success!");
													 
													}
											});	
								
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