<?php
$get_controller = $this->router->fetch_class();
$id = $this->input->post('id') ?? '' ;
$q = $this->mdl->getById($id)->row();
$tgl = $q->tgl ?? '';
$total = $q->total ?? ''; 
$action_url = ('' !== $id) ? '/update_data' : '/insert_data' ;
$required = ('' !== $id) ? '' : 'required' ;
?>
<div class="modal-content">
    <div class="modal-header">  <h5 class="modal-titles" id="defaultModalLabel"><b>Report</b></h5>
		<button type="button" class="close" aria-label="Close" data-dismiss="modal">
	    	<span aria-hidden="true">×</span>
		</button>
	</div>


	<div class="modal-body">
		<form  action="javascript:submitForm('modal')" id="modal" url="<?php echo site_url($get_controller.$action_url)?>"  method="post" enctype="multipart/form-data">
			<input type="hidden" id="formToken" name="<?php echo $this->m_reff->tokenName()?>" value="<?php echo $this->m_reff->getToken()?>">
			<?php echo form_hidden('id', $id);?>
			<div class="form-group ">
				<div class="row">
					<div class="col-md-3">
						<label class="form-label" for="nama">Tanggal</label>
					</div>
					<div class="col-md-9">
						<input name="tgl" id='tgl' type="text" class="form-control" value="<?= set_value('tgl', $this->tanggal->ind($tgl,"-"));?>" autofocus required>
					</div>
				</div>
			</div>
			<div class="form-group ">
				<div class="row">
					<div class="col-md-3">
						<label class="form-label" for="nama">Total penjualan</label>
					</div>
					<div class="col-md-9">
						<input name="f[total]"  type="text" class="form-control" value="<?= set_value('total', $total);?>" required>
					</div>
				</div>
			</div>
		 

			<div class="col-lg-12 p-1">
				<center>
					<button class="btn btn-success button_save" onclick="submitForm('modal')"><i class="fa fa-save"></i> simpan</button>
				</center>
			</div>
		</form>
	</div>
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
     
}, function(start, end, label) {
});
</script>