<?php 
$get_controller = $this->router->fetch_class();
$str_controller = str_replace("_", " ", $get_controller);
$group_id = $this->uri->segment(3, 0);
$dgroup = $this->mdl->getById($group_id)->row();
?>
		<!-- breadcrumb -->
		<div class="breadcrumb-header justify-content-between">
		<div>
			<h4 class="content-title mb-2"> DATA REPORT</h4>
			<!-- <nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Input data keluarga yang akan ditest</a></li>
					<li class="breadcrumb-item active" aria-current="page">Project</li>
				</ol>
			</nav> -->
		</div>
		<div class="d-flex my-auto">
			<div class=" d-flex right-page">
				<div>
				    
				   <input type="text" id="reportrange" onchange="report_view()" class="cursor" style="margin-left:-350px;width:200px">
				</div>
				
				<div>
                            <select name="grafik"  onchange="report_view()" style="height:30px;" class='cursor form-control' required='required' >
                                <!--<option value="1">Tabel - Detail</option>-->
                                <option value="2">Tabel - Perhari</option>
                                <option value="3">Tabel - Perminggu</option>
                                <option value="4">Tabel - Perbulan</option>
                                <option value="5">Tabel - Pertahun</option>

                                <!--<option value="6">Grafik - Detail</option>-->
                                <option value="7">Grafik - Perhari</option>
                                <option value="8">Grafik - Perminggu</option>
                                <option value="9">Grafik - Perbulan</option>
                                <option value="10">Grafik - Pertahun</option>
                            </select>
                        </div>
				
				
			</div>
		</div>
	</div>
	<!-- /breadcrumb -->


	<!-- main-content-body -->
	<div class="main-content-body">
		<!-- row -->
		<div class="row row-sm " id="area_lod">
			<div class="col-md-12 col-xl-12">
				<div class="card overflow-hidden review-project">
					<div class="card-body">
						<!-- <div class="d-flex justify-content-between">
							<h4 class="card-title mg-b-10">RIWAYAT TEST ANGGOTA KELUARGA PEGAWAI</h4>
							<i class="mdi mdi-dots-horizontal text-gray"></i>
						</div> -->

						<div class="table-responsive mb-0" id="report_view">
							<table id="table"
								class="table table-hover table-bordered mb-0 text-md-nowrap text-lg-nowrap text-xl-nowrap table-striped ">
								<thead>
									<tr>
					
										<th>TANGGAL</th>
										<th>TOTAL PENJUALAN</th>
									 
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /row -->



		<script type="text/javascript">
		
		setTimeout(function(){ report_view(); }, 200);
function report_view(){
    var range = $("#reportrange").val();
       var grafik = $("[name='grafik']").val();
    	$("#mdl_modal").modal();
				var url =
					"<?php echo site_url($get_controller."/report_view");?>";
				var param = {
					range: range,
					grafik:grafik,
					<?php echo $this->m_reff->tokenName()?>: token
				};
				$.ajax({
					type: "POST",
					dataType: "json",
					data: param,
					url: url,
					success: function(val) {
						token = val['token'];
					
						$("#report_view").html(val['data']);
					}
				});
}	




$('#reportrange').daterangepicker({
    "showDropdowns": true,
    "autoApply": true,
    ranges: {
       'Hari ini': [moment(), moment()],
                                        'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                                        '7 hari terakhir': [moment().subtract(6, 'days'), moment()],
                                        '30 hari terakhir': [moment().subtract(30, 'days'), moment()],
                                        'Bulan ini': [moment().startOf('month'), moment().endOf('month')],
                                        'Bulan kemarin': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                                 
    },
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
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
            "November",
            "December"
        ],
        "firstDay": 1
    },
    "alwaysShowCalendars": true,
     "startDate":moment().subtract(30, 'days'),
    "endDate": moment()
}, function(start, end, label) {
});

 
		 
		</script>
		
		
		
		
		
 