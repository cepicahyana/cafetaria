
<?php
$db = $this->db->get_where("data_group",array("jenis"=>0))->result();
$wa="";
foreach($db as $val){
$wa.= "<option value='".$val->nama."'>".$val->nama."</option>";
}
 

$db = $this->db->get_where("data_group",array("jenis"=>1))->result();
 $gr="";
foreach($db as $val){
$gr.= "<option value='".$val->id."'>".$val->nama."</option>";
}
 
?>
<div id="loadbro">
<form id="kirim_broadcast" action="javascript:kirim_broadcast()">
<input type="hidden" name="id" value="<?=$this->m_reff->post("id");?>">
<input type="hidden" name="<?=$this->m_reff->tokenName();?>" value="<?=$this->m_reff->getToken();?>">
<b class='text-success'>Pilih group whatsapp:</b>
<select id="wa" name="wa[]" class="form-control select1" multiple>
    <?=$wa;?>
</select>

<br><br>
<b>Pilih group kontak:</b>
<select id="kontak" name="kontak[]" class="form-control select1" multiple>
    <?=$gr;?>
</select>
<br><br>
<b>Input Nomor : </b>
<input id="nomor" type="text" class="form-control" name="nomor" placeholder="contoh: 081234,0821345,...">
<br><br>
<div id="hasilAdd"></div>
<!-- <br><br> -->

<!-- <div class="progress">
	<div class="progress-bar progress-bar-lg bg-success" id="progress"   >
		<div class="bar"></div >
		<div class="percent">0%</div >
	</div>
</div>
 

<br><br> -->
<center>
<button class="btn btn-primary" onclick="kirim_broadcast()">Kirim</button>
</center>
<div id="statusToGet"></div>
<script>
$('.select1').SumoSelect({  selectAll: true,search: true, searchText: 'Enter here.'});
 </script>
</form>
</div>

<script>
	  	
 $('.progress-bar').hide();
function kirim_broadcast() {
 

  let text = "Kirim sekarang ? ";
  if (confirm(text) == true) {
				var nomor     = $("[name='nomor']").val();
				var wa     = $("[name='wa']").val();
                var kontak = $("[name='kontak']").val();
			 
	var progress = $('.progress-bar');
	var bar = $('.bar');
    var percent = $('.percent');
    var status = $('#statusToGet');
  
  
$('#kirim_broadcast').ajaxForm({
     url:'<?php echo base_url()?>broadcast/send',
     type: 'post',
	 dataType:"JSON",
     data:$("#kirim_broadcast").serialize,
	 beforeSend: function() {
		 loading("loadbro");
		 $('.progress-bar').show();
            status.empty();
            var percentVal = '0%';
            bar.width(percentVal);
            progress.width(percentVal);
            percent.html(percentVal);
			// document.getElementById("progress").style.width = percentVal;
        },
        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            bar.width(percentVal);
			 progress.width(percentVal);
            percent.html(percentVal);
			alert(percent);
        },
	 
     
     success: function(data) {
		token = data["token"];
		unblock("loadbro");
    //    if(data["gagal"]==true)
	//    {	 $('.progress-bar').hide();
	// 	     $("#hasilAdd").html("<div class='alert alert-danger text-black   b'> Berhasil dikirim</div>"); 
			 	 
	//    }else{
	   
	    // $("#hasilAdd").html("Berhasil dikirim."); 
		
    // setTimeout(function(){   }, 1100);
			 notif("<span style='color:black'>Berhasil dikirim</span>");
	//    }
	    // csrfHash=data.csrf; 
	      
	    
     },
    });    






  }
  
}

function kirim_broadcast_(){
 
    var id = "<?=$this->m_reff->post("id");?>";
		swal({
			title: 'Kirim sekarang ?',
			text: '',
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
				swal("Berhasil dikirim", {
					icon: "success",
					buttons : {
						confirm : {
							className: 'btn btn-success'
						}
					}
				});
                var wa     = $("[name='wa']").val();
                var kontak = $("[name='kontak']").val();
				var url   = "<?php echo site_url("broadcast/send");?>";
				var param = {<?php echo $this->m_reff->tokenName()?>:token,id:id,wa:wa,kontak:kontak};
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
