<?php
$this->db->where("id",$id);
$data = $this->db->get("data_broadcast")->row();
if(!isset($data)){
return $this->m_reff->page403();
}

?>
<!-- breadcrumb -->
<div class="breadcrumb-header  ">
    <div class="col-md-12">
 
		
    <button onclick="broadcast()" type="button" style="float:right" class=" btn btn-warning">
              <i class="glyphicon glyphicon-upload"></i>
              <span>  Broadcast</span>
            </button>
            <h4 class="content-title mb-2">Pesan baru</h4>
	 </div>
 
</div>

	<div class="row">
 
	<div class="col-md-7">
		<div class="card card-body" id="area_lod">
             <div class="row row-xs align-items-center "> 
                <div class="col-md-2"> 
                  <label class="form-label mg-b-0 text-black">Judul informasi</label> 
                </div> 
                <div class="col-md-12 mg-t-5 mg-md-t-0"> 
                 <input class="form-control" onchange="updatePost(this.value,'judul_berita')" type="text" value="<?=$data->judul_berita;?>">
                </div> 
            </div>
             
            <div class="row row-xs align-items-center "> 
                <div class="col-md-2 align-top"> 
                  <label class="form-label mg-b-0 text-black">Isi pesan</label> 
                </div> 
                <div class="col-md-12 mg-t-5 mg-md-t-0"> 
                <textarea class='form-control' onchange="updatePost(this.value,'artikel')" style="min-height:200px"><?=$data->artikel;?></textarea>
                </div> 
            </div>
		</div>
	</div>
 
	
 
		<div class="col-md-5">
	 <div class="card card-body">
	        <div> 
                <div class="col-md-12"> 
                  <label class="form-label mg-b-0 text-black">Lampirkan File / Photo</label> 
                </div> 
                <div class="col-md-10 mg-t-5 mg-md-t-0"> 
                 <div class="main-toggle main-toggle-success  on"><span></span></div>
                </div> 
                <hr/>
            </div>
            
             <div> 
                <div class="col-md-12"> 
                  <label class="form-label mg-b-0 text-black">Tambahkan Tombol</label> 
                </div> 
                <div class="col-md-10 mg-t-5 mg-md-t-0"> 
                 <div class="main-toggle main-toggle-success  "><span></span></div>
                </div> 
                <div class="col-md-12"> 
                 <table width="100%">
                     <tr>
                         <td>
                             <input class="form-control form-control-sm " placeholder="Tombol 1" type="text">
                         </td>
                         <td>
                             <input class="form-control form-control-sm " placeholder="Url/Number" type="text">
                         </td> 
                     </tr>
                     
                      <tr>
                         <td>
                             <input class="form-control form-control-sm " placeholder="Tombol 2" type="text">
                         </td>
                         <td>
                             <input class="form-control form-control-sm " placeholder="Url/Number" type="text">
                         </td> 
                     </tr>
                     
                      <tr>
                         <td>
                             <input class="form-control form-control-sm " placeholder="Tombol 3" type="text">
                         </td>
                         <td>
                             <input class="form-control form-control-sm " placeholder="Url/Number" type="text">
                         </td> 
                     </tr>
                 </table>
                </div>
                <hr/>
            </div>
            
            
             <div> 
                <div class="col-md-12"> 
                  <label class="form-label mg-b-0 text-black">Tambahkan List menu</label> 
                </div> 
                <div class="col-md-10 mg-t-5 mg-md-t-0"> 
                 <div class="main-toggle main-toggle-success  "><span></span></div>
                </div> 
                <hr/>
            </div>
            
            
           </div>  
	</div>
 
</div>

 <script>
     function addTombol(){
         
     }
 </script>
  
   <link
      rel="stylesheet"
      href="<?php echo base_url() ?>assets/uploader/css/bootsrap36.css"
 
    /> 
 
     
  <body>
    <div class="container">
      
   
      <!-- The file upload form used as target for the file upload widget -->
      <form
        id="fileupload"
        method="POST"
        enctype="multipart/form-data"
      >

       <input type="hidden" name="id" value="<?=$id?>">
        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
        <div class="row fileupload-buttonbar">
          <div class="col-lg-12">
            <!-- The fileinput-button span is used to style the file input field as button -->
            <label>   <span class="btn btn-success fileinput-button" style="max-height:40px">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Add files...</span>
              <input style="display:none"  onchange="brows()" type="file"   name="files" multiple />
              </span>    </label>
            
             

            <button type="submit" class="btn btn-primary start">
              <i class="glyphicon glyphicon-upload"></i>
              <span>start upload</span>
            </button>
            <button type="reset" class="btn btn-warning cancel" onclick="cancel()">
              <i class="glyphicon glyphicon-ban-circle"></i>
              <span>Cancel upload</span>
            </button>
            <label>
            
            <!-- The global file processing state -->
            <span class="fileupload-process"></span>
          </div>
          <!-- The global progress state -->
          <div class="col-lg-12 fileupload-progress fade">
            <!-- The global progress bar -->
            <div
              class="progress progress-striped active"
              role="progressbar"
              aria-valuemin="0"
              aria-valuemax="100"
            >
              <div
                class="progress-bar progress-bar-success"
                style="width: 0%;"
              ></div>
            </div>
            <!-- The extended global progress state -->
            <div class="progress-extended">&nbsp;</div>
          </div>
        </div>
        <!-- The table listing the files available for upload/download -->
        <table role="presentation" class="table table-striped">
          <tbody class="files"></tbody>
        </table>
      </form>
     
    </div>
    <!-- The blueimp Gallery widget -->
    <div
      id="blueimp-gallery"
      class="blueimp-gallery blueimp-gallery-controls"
      aria-label="image gallery"
      aria-modal="true"
      role="dialog"
      data-filter=":even"
    >
      <div class="slides" aria-live="polite"></div>
      <h3 class="title"></h3>
      <a
        class="prev"
        aria-controls="blueimp-gallery"
        aria-label="previous slide"
        aria-keyshortcuts="ArrowLeft"
      ></a>
      <a
        class="next"
        aria-controls="blueimp-gallery"
        aria-label="next slide"
        aria-keyshortcuts="ArrowRight"
      ></a>
      <a
        class="close"
        aria-controls="blueimp-gallery"
        aria-label="close"
        aria-keyshortcuts="Escape"
      ></a>
      <a
        class="play-pause"
        aria-controls="blueimp-gallery"
        aria-label="play slideshow"
        aria-keyshortcuts="Space"
        aria-pressed="false"
        role="button"
      ></a>
      <ol class="indicator"></ol>
    </div>
    <!-- The template to display files available for upload -->
    <!-- <td>
                  <p class="size">Processing...</p>
                  <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
              </td> -->
    <script id="template-upload" type="text/x-tmpl">
      {% for (var i=0, file; file=o.files[i]; i++) { %}
          <tr class="template-upload fade{%=o.options.loadImageFileTypes.test(file.type)?' image':''%}">
              <td>
                  <span class="preview"></span>
              </td>
              <td>
                  <p class="name">{%=file.name%}</p>
                  <strong class="error text-danger"></strong>
              </td>
             
              <td>
                  {% if (!o.options.autoUpload && o.options.edit && o.options.loadImageFileTypes.test(file.type)) { %}
                    <button class="btn btn-success edit" data-index="{%=i%}" >
                        <i class="glyphicon glyphicon-edit"></i>
                        <span>Edit</span>
                    </button>
                  {% } %}
                  {% if (!i && !o.options.autoUpload) { %}
                      <span class="start" disabled style="display:none">
                          
                       </span>
                  {% } %}
                  {% if (!i) { %}
                      <button class="btn btn-warning cancel" style="margin-top:15px">
                          <i class="glyphicon glyphicon-ban-circle"></i>
                          <b>Cancel</b>
                      </button>
                  {% } %}
              </td>
          </tr>
      {% } %}
    </script>
    <!-- The template to display files available for download -->
    <script id="template-download" type="text/x-tmpl">
      {% for (var i=0, file; file=o.files[i]; i++) { %}
          
      {% } %}
    </script>
  
    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script src="<?php echo base_url() ?>assets/uploader/js/vendor/jquery.ui.widget.js"></script>
    <!-- The Templates plugin is included to render the upload/download listings -->
    <script src="https://blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
    <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
    <script src="https://blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
    <!-- The Canvas to Blob plugin is included for image resizing functionality -->
    <script src="https://blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
    <!-- blueimp Gallery script -->
    <script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="<?php echo base_url() ?>assets/uploader/js/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="<?php echo base_url() ?>assets/uploader/js/jquery.fileupload.js"></script>
    <!-- The File Upload processing plugin -->
    <script src="<?php echo base_url() ?>assets/uploader/js/jquery.fileupload-process.js"></script>
    <!-- The File Upload image preview & resize plugin -->
    <script src="<?php echo base_url() ?>assets/uploader/js/jquery.fileupload-image.js"></script>
    <!-- The File Upload audio preview plugin -->
    <script src="<?php echo base_url() ?>assets/uploader/js/jquery.fileupload-audio.js"></script>
    <!-- The File Upload video preview plugin -->
    <script src="<?php echo base_url() ?>assets/uploader/js/jquery.fileupload-video.js"></script>
    <!-- The File Upload validation plugin -->
    <script src="<?php echo base_url() ?>assets/uploader/js/jquery.fileupload-validate.js"></script>
    <!-- The File Upload user interface plugin -->
    <script src="<?php echo base_url() ?>assets/uploader/js/jquery.fileupload-ui.js"></script>
     
    <script>

 $(".cancel").hide();
 $(".start").hide();
function brows(){
  $(".cancel").show();
  $(".start").show();
}
function cancel(){
  $(".cancel").hide();
 $(".start").hide();
}
$(function () {
  'use strict';

  // Initialize the jQuery File Upload widget:
  $('#fileupload').fileupload({
    // Uncomment the following to send cross-domain cookies:
    //xhrFields: {withCredentials: true},
    url: '<?php echo base_url()?>broadcast/upload',
    success: function(val) {
					loadUpload();
          cancel();
					}
  });

  // Enable iframe cross-domain access via redirect option:
  $('#fileupload').fileupload(
    'option',
    'redirect',
    window.location.href.replace(/\/[^/]*$/, '/cors/result.html?%s')
  );

  if (window.location.hostname === 'blueimp.github.io') {
    // Demo settings:
    $('#fileupload').fileupload('option', {
      url: '//jquery-file-upload.appspot.com/',
      // Enable image resizing, except for Android and Opera,
      // which actually support image resizing, but fail to
      // send Blob objects via XHR requests:
      disableImageResize: /Android(?!.*Chrome)|Opera/.test(
        window.navigator.userAgent
      ),
      maxFileSize: 999000,
      acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i
    });
    // Upload server status check for browsers with CORS support:
    if ($.support.cors) {
      $.ajax({
        url: '//jquery-file-upload.appspot.com/',
        type: 'HEAD'
      }).fail(function () {
        $('<div class="alert alert-danger"></div>')
          .text('Upload server currently unavailable - ' + new Date())
          .appendTo('#fileupload');
      });
    }
  } else {
    // Load existing files:
    $('#fileupload').addClass('fileupload-processing');
    $.ajax({
      // Uncomment the following to send cross-domain cookies:
      //xhrFields: {withCredentials: true},
      url: $('#fileupload').fileupload('option', 'url'),
      dataType: 'json',
      context: $('#fileupload')[0]
    })
      .always(function () {
        $(this).removeClass('fileupload-processing');
      })
      .done(function (result) {
        $(this)
          .fileupload('option', 'done')
          // eslint-disable-next-line new-cap
          .call(this, $.Event('done'), { result: result });
      });
  }
});
    </script>


<script>
setTimeout(() => {
    loadUpload();
}, 500);

 function loadUpload(){
  var id = "<?=$id?>";
    var url   = "<?php echo site_url("broadcast/loadUpload");?>";
		var param = {<?php echo $this->m_reff->tokenName()?>:token,id:id};
		$.ajax({
			type: "POST",dataType: "json",data: param, url: url,
			success: function(val){
				$("#loadUpload").html(val['data']);
				token=val['token'];
        cancel();
			}
		});	
 }


 function updatePost(val,field) {
            var id = "<?=$id?>";
            $.ajax({
                url: '<?= base_url() ?>broadcast/updatePost',
                type: 'POST',
                dataType: 'json',
                data: {
                    val: val,field:field,id:id,<?php echo $this->m_reff->tokenName()?>:token
                },
                success: function(res) {
                    Swal.fire('Berhasil disimpan');
                }
            });
        }
 function updatePostTgl(val) {
            var id = "<?=$id?>";
            $.ajax({
                url: '<?= base_url() ?>broadcast/updatePostTgl',
                type: 'POST',
                dataType: 'json',
                data: {
                    val: val,id:id,<?php echo $this->m_reff->tokenName()?>:token
                },
                success: function(res) {
                    Swal.fire('Berhasil disimpan');
                }
            });
        }
</script>
<div id="loadUpload" class="row"></div>




<script>
  function show(img,fullimg){
    $("#mdl_image").modal("show");
    $.ajax({
                url: '<?= base_url() ?>broadcast/show',
                type: 'POST',
                dataType: 'json',
                data: {
                  img:img,fullimg:fullimg,<?php echo $this->m_reff->tokenName()?>:token
                },
                success: function(val) {
                  $("#ghalery").html(val["data"]);
                  token = val['token'];
                }
            });
  }
  </script>

    
 


  <div class="modal effect-super-scaled" id="mdl_image" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered" id="area_modal_edit" role="document">
      
    
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-titles" id="defaultModalLabel"><b>Preview </b></h5>
          <button type="button" class="close" aria-label="Close" data-dismiss="modal">
            <span aria-hidden="true">×</span>
          </button>
        </div>


        <div class="modal-body">
        <div id="ghalery"></div>
        </div>
      </div>


  
    </div>
  </div><!-- /.modal-dialog --> 




 
  

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


function broadcast(){
  var id = "<?php echo $id?>";
$("#mdl_broadcast").modal("show");
    $.ajax({
                url: '<?= base_url() ?>broadcast/try_broadcast',
                type: 'POST',
                dataType: 'json',
                data: {
                  id:id,<?php echo $this->m_reff->tokenName()?>:token
                },
                success: function(val) {
                  $("#isiModal").html(val["data"]);
                  token = val['token'];
                }
            });
}
</script>


<div class="modal effect-super-scaled" id="mdl_broadcast" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md" id="area_modal_edit" role="document">
    <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-titles" id="defaultModalLabel"><b>Kirim broadcast </b></h5>
          <button type="button" class="close" aria-label="Close" data-dismiss="modal">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        <div id="isiModal"></div>
        </div>
      </div>
    </div>
  </div><!-- /.modal-dialog --> 



