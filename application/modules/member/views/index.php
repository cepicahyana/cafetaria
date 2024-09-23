	<!-- breadcrumb -->
	<div class="breadcrumb-header justify-content-between">
						<div>
							<h4 class="content-title mb-2"><i class="fa fa-home"></i> Home</h4>
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Konektivitas layanan</a></li>
									<!-- <li class="breadcrumb-item active" aria-current="page">Project</li> -->
								</ol>
							</nav> 
						</div>
		<div class="d-flex my-auto">
			<div class=" d-flex right-page">
				<div>
					    <?php
					    $array["1"]   = "Hari ini";
					    $array["2"] = "Kemarin";
					    $array["7"] = "7 hari terakhir";
					    $array["30"] = "30 hari terakhir";
					    for($i=0;$i<=5;$i++){
					        $tahun = date('Y')-$i;
					        $array[$tahun] = "Tahun ". $tahun;
					    }
					    echo form_dropdown("tahun",$array,date('Y'),"class='form-control' onchange='reload_data(this.value)' ");
					    ?>
				</div>
			</div>
		</div>
					</div>
					<!-- /breadcrumb -->
<script>
    reload_data();
    function reload_data(){
        var tahun = $("[name='tahun']").val();
        var url   = "<?=base_url();?>member/reload_data";
		var param = {ci_csrf_token:token,tahun:tahun};
		loading("reload_data");
				$.ajax({
						type: "POST",dataType: "json",data: param, url: url,
						success: function(val){
							 $("#reload_data").html(val["data"]);
							token=val['token'];
							unblock("reload_data");
						}
				});	
	 }
    
</script>

					<!-- main-content-body -->
					<div class="main-content-body" id="reload_data">
					    <br><br><br><br><br><br><br><br><br><br><br>
					</div>
 
 
		
					