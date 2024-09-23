<?php 
$this->db->where("id_cs",null);
$this->db->or_where("id_cs",$this->m_reff->idu());
$datapesan = $this->db->get("session_cs");
$jml = $datapesan->num_rows();
?>

	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
						<div>
							<h4 class="content-title mb-2"><i class="fa fa-envelope"></i> Live chat</h4>
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Orang-orang yang ingin terhubung dengan anda</a></li>
									<!-- <li class="breadcrumb-item active" aria-current="page">Project</li> -->
								</ol>
							</nav>
						</div>
					 
					</div>
	<!-- main-content-body -->
	<div class="main-content-body">

		<div id="area_lod">
			
		<!-- row -->
		<div class="row row-sm main-content-app mb-4">
			<div class="col-xl-4 col-lg-5">
				<div class="card" id="listChat">
				
				</div>
			</div>
			<div class="col-xl-8 col-lg-7" id="htmlchat">
			
			</div>
		</div>
		<!-- row -->

		</div>
	</div>



		<script type="text/javascript">
			var save_method; //for save method string
			var table;
			var dataTable = $('#table').DataTable({
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
					"url": "<?php echo site_url('cs/getData');?>",
					"type": "POST",
					"data": function(data) {
						//data.group = '<.?= $group_id?>';
						data. <?php echo $this->m_reff->tokenName()?> =
						token;

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


			function addData() {
				var url =
					"<?php echo site_url("cs/form_data");?>";
				var param = {
					<?php echo $this->m_reff->tokenName()?>: token
				};
				$.ajax({
					type: "POST",
					dataType: "json",
					data: param,
					url: url,
					success: function(val) {
						token = val['token'];
						$("#mdl_modal").modal();
						$("#isi").html(val['data']);
					}
				});
			}

setInterval(function () {
    listChat();
}, 10000);
    listChat();
function listChat(){
    	var url =
					"<?php echo site_url("cs/listChat");?>";
				var param = {
					<?php echo $this->m_reff->tokenName()?>: token
				};
				$.ajax({
					type: "POST",
					dataType: "json",
					data: param,
					url: url,
					success: function(val) {
						token = val['token'];
						$("#listChat").html(val['data']);
					}
				});
}


			function editData(id) {
				var url =
					"<?php echo site_url("cs/form_data");?>";
				var param = {
					id: id,
					<?php echo $this->m_reff->tokenName()?>: token
				};
				$.ajax({
					type: "POST",
					dataType: "json",
					data: param,
					url: url,
					success: function(val) {
						token = val['token'];
						$("#mdl_modal").modal();
						$("#isi").html(val['data']);
					}
				});
			}

			function tangkap(id, akun) {
				// swal({
				// 	title: 'Mulai percakapan ?',
				// 	text: akun,
				// 	type: 'warning',
				// 	buttons: {
				// 		cancel: {
				// 			visible: true,
				// 			text: 'batal',
				// 			className: 'btn btn-danger'
				// 		},
				// 		confirm: {
				// 			text: 'Ya',
				// 			className: 'btn btn-success'
				// 		}
				// 	}
				// }).then((willDelete) => {
				// 	if (willDelete) {
				// 		swal("data " + akun + " telah dihapus", {
				// 			icon: "success",
				// 			buttons: {
				// 				confirm: {
				// 					className: 'btn btn-success'
				// 				}
				// 			}
				// 		});

						var url =
							"<?php echo site_url("cs/get_pesan");?>";
						var param = {
							kode: id,
							nama : akun,
							<?php echo $this->m_reff->tokenName()?>: token
						};
						loading("htmlchat");
						$("#htmlchat").html("<br>  <p class='text-white alert alert-warning'><b>Mohon tunggu, sedang memuat pesan .....</b></p><br><br>");
						$.ajax({
							type: "POST",
							dataType: "json",
							data: param,
							url: url,
							success: function(val) {
								token = val['token'];
								  listChat();
								$("#htmlchat").html(val['data']);
								unblock("htmlchat");
							}
						});
				// 	}
				// });
			};
		</script>

		<script type="text/javascript">
// 			function broadcast_group_kontak() {
// 				var checkbox_value = "";
// 				var i = 0;
// 				$("[name='pilih[]']").each(function() {
// 					var ischecked = $(this).is(":checked");
// 					if (ischecked) {
// 						checkbox_value += $(this).val() + ",";
// 						i++;
// 					}
// 				});

// 				var url =
// 					"<?php echo site_url($get_controller."/form_broadcast_group_kontak");?>";
// 				var param = {
// 					data: checkbox_value,
// 					<?php echo $this->m_reff->tokenName()?>: token
// 				};
// 				$.ajax({
// 					type: "POST",
// 					dataType: "json",
// 					data: param,
// 					url: url,
// 					success: function(val) {
// 						token = val['token'];
// 						$("#mdl_modal").modal();
// 						$("#isi").html(val['data']);
// 					}
// 				});
// 			}

			$(document).ready(function() {
				$('#selectall').click(function() {
					$('.selectedId').prop('checked', this.checked);
				});

				$('.selectedId').change(function() {
					var check = ($('.selectedId').filter(":checked").length == $('.selectedId').length);
					$('#selectall').prop("checked", check);
				});
			});
		</script>

		<div class="modal effect-super-scaled" id="mdl_modal" style="z-index:1500" role="dialog">
			<div class="modal-dialog modal-md" id="area_modal" role="document">
				<div id="isi"></div>
			</div>
			</form>
		</div><!-- /.modal-dialog -->