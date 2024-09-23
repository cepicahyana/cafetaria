
<?php
$get_controller = $this->router->fetch_class();
 $omzet="Total Penjualan";
 $grafik = $this->input->post("grafik");
	if($grafik=="1")
	{
       
	$title="Tanggal";	
	}elseif($grafik=="2")
        {
       
	$title="Tanggal";
        }elseif($grafik=="3")
	{
             
	$title="Minggu";
	}elseif($grafik=="4")
	{
            
	$title="Bulan";
	}else
	{
            
	$title="Tahun";
	}?>

<form action="#"  method="post">
<table id="tables" 	class="table table-hover table-bordered mb-0 text-md-nowrap text-lg-nowrap text-xl-nowrap table-striped ">
        <thead style='text-align:left'>			
        <th class='thead' axis="string" width='15px'>No</th> 
        <th class='thead' axis="date" width='170px'> <?php echo $title; ?></th>
        <th class='thead' width='110px'>&nbsp;<i class="icon-shopping-cart "></i> Total Penjualan</th>
        </thead>
    </table>
</form>


 
<script type="text/javascript">
	var save_method; //for save method string
			var table;
			var dataTable = $('#tables').DataTable({
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
				"ordering": false,
				"lengthMenu": [
					[10, 30, 50, 100],
					[10, 30, 50, 100],
				],
				dom: 'Blfrtip',
				// Buttons with Dropdown
				buttons: [{
						text: '',
						action: function(e, dt, node, config) {
							reload_table();
						},
						className: 'btn btn-light ti-reload '
					},
					// {
					// 	text: ' Kirim Broadcast ',
					// 	action: function(e, dt, node, config) {
					// 		broadcast_group_kontak();
					// 	},
					// 	className: 'btn btn-success '
					// },
				],

				// Load data for the table's content from an Ajax source
				"ajax": {
					"url": "<?php echo site_url($get_controller.'/getData_report');?>",
					"type": "POST",
					"data": function(data) {
						data.grafik = '<?= $grafik?>';
						data.range = '<?= $this->input->post("range")?>';
						data.<?php echo $this->m_reff->tokenName()?> =token;

					},
					beforeSend: function() {
						loading("area_lod");
					},
					complete: function(data) {
						token = data.responseJSON.token;
						unblock('area_lod');
						$("#md_checkbox").attr("checked", false);
						$(".pilihsemua").val("ya");
					},

				},

				//Set column definition initialisation properties.
				"columnDefs": [{
					"targets": [0, -1], //last column
					"orderable": false, //set not orderable
				}, ],

			});

			function reload_table() {
				dataTable.ajax.reload(null, false);
			};

</script>