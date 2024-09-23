 
<script src="<?php echo base_url()?>plug/bootstrap-datepicker/bootstrap-datepicker.js"></script>

<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
	<div>
		<h4 class="content-title mb-2">Data Kegiatan</h4>
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo site_url('dashboard')?>" class="menuclick">Dashboard</a></li>
				<li class="breadcrumb-item active" aria-current="page">Data Kegiatan</li>
			</ol>
		</nav>
			</div>
			 <div class="col-md-6 row">
		<!--	 <div class="col-md-6">
					<span class="d-block">
						<span class="label text-white ">Pilih jenis artikel </span>
					</span>
					<span class="value ">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="typcn typcn-th-list-outline tx-24 lh--9 op-6"></i>
								</div>
							</div>
					 
						$db=$this->db->get("tm_kategori")->result();
						$ray=array();
						$ray[null] = "---- pilih ----";
						foreach($db as $val){
							$ray[$val->id] = $val->nama;
						}
						echo form_dropdown("jenis_artikel",$ray,null,"id='jenis_artikel' class='form-control' onchange='reload_table()' ");
						?>
						</div>
					</span>
		</div>
			 <div class="col-md-12">

					<span class="d-block">
						<span class="label text-white ">Pilih Tahun </span>
					</span>
					<span class="value ">
						<div class="input-group">
							<div class="input-group-prepend">
								<div class="input-group-text">
									<i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
								</div>
							</div>
							<input onchange="reload_table()" id="datepickerYear_" class="form-control" placeholder="YYYY" type="text" value="<?php echo date('Y') ?>">
						</div>
					</span>
		</div>--->
		</div>

</div>

<div class="card">
	
	<div class="row card-body" style='padding-top:10px;padding-bottom:20px'>

		<div class="col-md-12" id="area_lod">
			<div class="table-responsive">
			    <div>
			        
			    
			<table id='table' width="100%" class="table">
				<thead>
					<tr>
						<th class='thead text-left' width='15px'>&nbsp;No</th>
						<th class='thead text-left' > Tanggal</th> 
						<th class='thead text-left'>Judul Pesan</th>  
						<th class='thead text-left'  width='100px' >Media</th>
						<th class='thead text-left'  width='100px' >Tgl broadcast</th>
						<th class='thead text-left'  width='200px'>Option </th>	   
					</tr>	 
				</thead>
			</table>
			</div>
			</div>
		</div>
	</div>
	
</div>	



<!-- #END# Task Info -->

<!-- <input type="hidden" id="getToken" value="<.?php echo $this->m_reff->getToken()?>"> -->
<script type="text/javascript">
	var save_method; //for save method string
    var table;
    //  token = $("#getToken").val();
    var  dataTable = $('#table').DataTable({ 
         "scrollX": true,
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
        "lengthMenu":
        [[10 ,20,30,50], 
        [10 ,20,30,50], ], 
        dom: 'Blfrtip',
        buttons: [
           // 'copy', 'csv', 'excel', 'pdf', 'print'
		// {
        //    	text: ' Refresh  ',
        //    	action: function ( e, dt, node, config ) {
        //    		reload_table();
        //    	},className: 'btn  btn-secondary btn-sm mt-2'
        // },
           
		{
           	text: ' Refresh  ',
           	action: function ( e, dt, node, config ) {
           		reload_table();
           	},className: 'btn  btn-outline-light '
        },

        {
        	text: '<i class="fa fa-indent"></i> Pesan  Text ',
        	action: function ( e, dt, node, config ) {
        		window.location.href="<?php echo base_url()?>broadcast/new_post";
        	},className: 'btn   btn-info   ' 
        }, 
        
        {
			  text: '<i class="fa fa-stop"></i> Pesan Tombol ',
                action: function ( e, dt, node, config ) {
                	window.location.href="<?php echo base_url()?>broadcast/new_post_button";
                },className: 'btn   btn-info  '
                }, 
                 
        
        ],
        
        // Load data for the table's content from an Ajax source
        "ajax": {
        	"url": "<?php echo site_url('broadcast/getData_view');?>",
        	"type": "POST",
        	"data": function ( data ) {
        		data.<?php echo $this->m_reff->tokenName()?>=token;
        			data.tahun=$("#datepickerYear_").val();
        			data.jenis_artikel=$("#jenis_artikel").val();
        	},
        	beforeSend: function() {
        		loading("area_lod");
        	},
        	complete: function(data) {
        		token=data.responseJSON.token;
        		unblock('area_lod');
        	},
			// success:function(data){
				
            // }
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [ 0,-1,-2,-3,-4,-5,-6 ], //last column
          "orderable": false, //set not orderable
      },
      ],
      
  });
function reload_table()
{
	dataTable.ajax.reload(null,false);	
};
    
</script>





<script>
	
	function add()
	{
		var url   = "<?php echo site_url("broadcast/viewAdd");?>";
		var param = {<?php echo $this->m_reff->tokenName()?>:token};
		$.ajax({
			type: "POST",dataType: "json",data: param, url: url,
			success: function(val){
				$("#mdl_modal_edit").modal();
				$("#editan").html(val['data']);
				token=val['token'];
			}
		});			 
	}

	function edit(id)
	{	 
		var url   = "<?php echo site_url("broadcast/viewEdit");?>";
		var param = {<?php echo $this->m_reff->tokenName()?>:token,id:id};
		$.ajax({
			type: "POST",dataType: "json",data: param, url: url,
			success: function(val){
				$("#mdl_modal_edit").modal();
				$("#editan").html(val['data']);
				token=val['token'];
			}
		});		

	}

	function hapus(id,akun){
		swal({
			title: 'Hapus ?',
			text: akun,
			type: 'warning',
			buttons:{
				cancel: {
					visible: true,
					text : 'batal',
					className: 'btn btn-danger'
				},        			
				confirm: {
					text : 'Ya',
					className : 'btn btn-success'
				}
			}
		}).then((willDelete) => {
			if (willDelete) {
				swal("data "+akun+" telah dihapus", {
					icon: "success",
					buttons : {
						confirm : {
							className: 'btn btn-success'
						}
					}
				});
				var url   = "<?php echo site_url("broadcast/hapus");?>";
				var param = {<?php echo $this->m_reff->tokenName()?>:token,id:id};
				$.ajax({
					type: "POST",dataType: "json",data: param, url: url,
					success: function(val){
						token=val['token'];
						reload_table();
					}
				});		
			}  
		});
	};
	
</script>




<div class="modal effect-super-scaled" id="mdl_modal_edit" tabindex="-1" role="dialog">
	<div class="modal-dialog" id="area_modal_edit" role="document">
		<div id="editan"></div>
	</div>
</div><!-- /.modal-dialog --> 


<script>
$('#datepickerYear_').datepicker({
	format: "yyyy",
    viewMode: "years", 
    minViewMode: "years",
	changeYear:true,
    yearRange: "-100:+0",
	autoclose: true
});
</script>