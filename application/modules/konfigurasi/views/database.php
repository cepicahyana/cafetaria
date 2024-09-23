  	<script>							 
									 
 function readURL(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result);
      $('.image img').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function() {
  readURL(this);
});
</script>


 <div class="page-header">
		<div class="page-block">
			<div class="row align-items-center">
				<div class="col-md-12">
					<div class="page-header-title">
						<h5 class="m-b-10">Konfigurasi</h5>
					</div>
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a   href="#"><i class="fa fa-database"></i></a></li>
						<li class="breadcrumb-item"><a href="#">Database</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
          
                <!-- Task Info -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                         
                        <div class="body">
                           <!----->
				 <div  >
                        <div >
                            <div class="card-body row ">
                               <table id='table' class="entry black table-bordered" style=" width:100%">
								 
								<tr>
								<td>1</td>
								<td>Nama Database</td>
								<td>
								
								 <input type="text" id="val_11" name="val_11" onchange='save_(`11`,`val_11`)' 
								 class="form-control" value="<?php echo $this->m_reff->pengaturan(11);?>"/>
								
								</td>
								</tr>
								
								
									<tr>
								<td>2</td>
								<td>Download Full Table Database</td>
								<td>
								<form action="<?php echo base_url();?>konfigurasi/backupdb" method="post">
							<div  class='row'>	
                               <!--  <div class="col-md-8">   <select required="" data-actions-box="true" multiple name="tabel[]" class="form-control select" data-live-search="true" data-selected-text-format="count">
						                                     
									  <?php
                                        $nama="Tables_in_".$this->m_reff->pengaturan(11);
										 $tabel=$this->db->query("show tables")->result();
                                           foreach ($tabel as $baris) {  ?>
                                            <option value="<?php echo $baris->$nama; ?>"><?php echo $baris->$nama; ?></option>
                                        <?php } ?>
                                    </select></div>-->
									 
                                    <div class="col-md-12">
                                    <button style='margin-top:5px' type="submit"  class="waves-effect btn-sm  btn btn-primary" >Download database</button>
                                    </div>
                               </div>
                                </form>
								</td>
								</tr>


								 
							 <tr>
								<td>3</td>
								<td>Restore Database</td>
								<td>
								  <?php echo form_open_multipart('konfigurasi/restore');?>
							 
							<div  class='row'>	
                               <div class="col-md-8">
								  
										 <input type="file" accept=".sql" name="datafile" id="datafile" required class="form-control"/> 
								 </div> 
                                    <div class="col-md-4">
                                    <button   style='margin-top:7px' type="submit"  class="waves-effect btn-sm btn btn-primary" >Upload</button>
                                    </div>
                                    
                               </div>
                                </form>
								</td>
								</tr>
							 
                            
							 <tr>
								<td>4</td>
								<td>Hapus data </td>
								<td >
								<div class='row'>
										<div class='col-md-8'>
									  <select id="tahun" name='tahun' class="custom-select"   >
									 <?php 
									 $tahun=date('Y')-6;
									 for($i=$tahun;$i<=(date('Y')-2);$i++){
										 if($i==date('Y'))
										 {
											  echo "<option selected value='".$i."'>Tahun ".$i."</option>";
										 }else{
										 echo "<option value='".$this->m_reff->encrypt($i)."'>Tahun ".$i."</option>";
										 }
									 }?>
									 </select> 
									 </div>
									 <div class="col-md-4">
										<button   style='margin-top:7px' type="submit"  onclick="hapusDB()" class="waves-effect btn-sm btn btn-danger" >hapus</button>
									 </div>
							 </div>
								</td>
								</tr>

								 
							</table>
							<br>
							</div>						
						</div>						
					</div>	
                           <!----->
                        </div>
                    </div>
                </div>
 
                <!-- #END# Task Info -->
				
 
  
	
 

 <?php
   $notif=$this->session->flashdata("msg");
 if($notif){
	 echo "<script>alert('".$notif."')</script>";
 }
 ?>
 
 
<script>
  

 function hapusDB()
	{	
	var token  = "<?php echo $this->m_reff->encrypt(date('Hi'))?>";		
	 var tahun = $("[name='tahun']").val();
		  swal({
                title: "Hapus ?",
                text:"pastikan data sudah di backup terlebih dahulu",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
				 
			    $.post("<?php echo base_url()?>konfigurasi/hapusTahun",{tahun:tahun,token:token},function(data){
		 	    window.location.href="";
			});  
			
			
                   
                } else {
                    return false;
                }
            });
		 
		  
		 
	}
 



 function save_(idpengaturan,idkonten)
	 {	 
	 var idkonten=$("[name='"+idkonten+"']").val();
		 $.ajax({
		 url:"<?php echo base_url()?>konfigurasi/save_",
		 data: "idpengaturan="+idpengaturan+"&idkonten="+idkonten,
		 method:"POST",
		 success: function(data)
            {	 
				 notif(" Tersimpan! ");
            }
		});
	 }
	function download_acara(id)
	{
		window.location.href="<?php echo base_url()?>konfigurasi/download_acara?id="+id;
	}
	
	
</script>

 