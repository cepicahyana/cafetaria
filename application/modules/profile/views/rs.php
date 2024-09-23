<style>
    .upload {
        border: #DCDCDC dashed 1px;
    }
</style>

<?php 
$this->db->where("id",$this->session->userdata("id"));
$data = $this->db->get("tm_rs")->row();
//$jkl=$jkp=""; if($data->jk=="l"){ $jkl="checked";}else{ $jkp="checked";}

?>

		 
 	 	<!-- breadcrumb -->
          <div class="breadcrumb-header justify-content-between">
						<div>
							<h4 class="content-title mb-2">Data profile</h4>
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Data profile</a></li>
									<li class="breadcrumb-item active" aria-current="page">update</li>
								</ol>
							</nav>
						</div>
	 </div>
 
   
    <div>
        <div  id="area_formSubmit">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Profile</h5>
                </div>
                <div class="card-body">
                    <form id="formSubmit" action="javascript:submitForm('formSubmit')" method="post" url="<?php echo site_url('profile/update_rs');?>" enctype="multipart/form-data">
                    <input type="hidden" id="formToken" name="<?php echo $this->m_reff->tokenName()?>" value="<?php echo $this->m_reff->getToken()?>">
    
                    <div class="row">
                      
                            <div class="col-md-6">
                                <div class="form-group fill">
                                    <label for="">Nama  </label>
                                    <input type="text" class="form-control" name="f[nama]" value="<?php echo $data->nama;?>">
                                </div>
                                
                                <div class="form-group fill">
                                    <label for="">Telp</label>
                                    <input type="text" class="form-control" name="f[telp]" value="<?php echo $data->telp;?>" required>
                                </div> 
                                <div class="form-group fill">
                                    <label for="">Email</label>
                                    <input type="text" class="form-control" name="f[email]" value="<?php echo $data->email;?>" required>
                                </div> 
								<div class="form-group fill">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control" name="f[username]" value="<?php echo $data->username;?>" required>
                                </div>
                                 
                                <div class="form-group fill">
                                    <label for="">Password Baru</label>
                                     <input type="password" class="form-control" name="password" value="">
                                </div>

								<div class="form-group fill">
                                    <label for="">Ketik ulang password </label>
                                     <input type="password" class="form-control" name="cpassword" value="">
                                </div>
                           


                            <div class="row justify-content-between btn-page">
                            <div class="col-sm-12">
                                <span class="pull-right" id="msg"></span>
                            </div>
                            <div class="col-sm-12 text-md-right">
                                <button onclick="submitForm('formSubmit')" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                            </div>

                        </div>
                        </div>
                        
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


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
		function reload_table()
		{
		}
    </script>