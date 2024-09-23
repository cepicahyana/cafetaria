


					<!-- breadcrumb -->
					<div class="breadcrumb-header justify-content-between">
						<div>
							<h4 class="content-title mb-2 "><i class="fe fe-bar-chart-2"></i> Autoreplay</h4>
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Proses Autoreplay</a></li>
									<!-- <li class="breadcrumb-item active" aria-current="page">Project</li> -->
								</ol>
							</nav>
						</div>
<!--						<div class="col-md-3">-->
<!--	<select id="id_device" class="form-control text-black" style="color:black" onchange="reload_table()">-->
<!--	<option  value="1">Tes 1 </option>-->
<!--	<option  value="2">Tes 2 </option>-->
<!--	<option  value="3">Tes 3 </option>-->
<!--	<option  value="4">Tes 4 </option>-->
<!--	</select>-->
 

<!--</div>-->
					</div>
					<!-- /breadcrumb -->

				
<!-- breadcrumb -->
 
<div class="card">

	<div class="row card-body" style='padding-top:10px;padding-bottom:20px'>

		<div class="col-md-12" id="area_lod">

			<table id='table' width="100%" class="tabel black table-striped table-bordered table-hover dataTable">
				<thead>
					<tr>
					<th class='thead ' style='max-width:25px' >
				No
 					 </th>	
				 
						<!--<th class='thead' >Keyword </th> -->
						<th class='thead'  >Keyword & Pesan Balasan </th> 
						<th class='thead'  >Penulisan </th> 
						<th class='thead'  >Status </th> 
						<th class='thead'  >jenis pesan </th> 
						<th class='thead' width="80px">Aksi</th>  
						    
					</tr>	 
				</thead>
			</table>
		</div>
	</div>

</div>	


<!-- #END# Task Info -->


<script type="text/javascript">
	function Delete(id,akun){

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

				var url   = "<?php echo site_url("autoreplay/hapus");?>";
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

	

      var save_method; //for save method string
      var table;
      var  dataTable = $('#table').DataTable({ 
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

        "serverSide": true,
        "responsive": true,
        "searching": true,
        "lengthMenu":
        [[10 ,20,30,50], 
        [10 ,20,30,50], ], 
        dom: 'Blfrtip',
        buttons: [
           // 'copy', 'csv', 'excel', 'pdf', 'print'
           {
           	text: ' Refresh  ',
           	action: function ( e, dt, node, config ) {
           		reload_table();
           	},className: 'btn  btn-secondary  '
           },
           
          
		{
			  text: '<i class="fa fa-indent"></i> Text ',
                action: function ( e, dt, node, config ) {
                   add();
                },className: 'btn   btn-primary  '
                }, 
                	{
			  text: '<i class="fa fa-stop"></i> Tombol ',
                action: function ( e, dt, node, config ) {
                   button();
                },className: 'btn   btn-primary  '
                }, 
                	{
			  text: '<i class="fa fa-list"></i> List menu',
                action: function ( e, dt, node, config ) {
                   list();
                },className: 'btn   btn-primary  '
                }, 
     


        ],
        
        // Load data for the table's content from an Ajax source
        "ajax": {
        	"url": "<?php echo site_url('autoreplay/getData');?>",
        	"type": "POST",
        	"data": function ( data ) {
        		data.<?php echo $this->m_reff->tokenName()?>=token;
        		data.id_device=$("#id_device").val();
        		// data.isolasi=$("#isolasi").val();
        	},
        	beforeSend: function() {
        		loading("area_lod");
        	},
        	complete: function(data) {
        		token=data.responseJSON.token;
        		unblock('area_lod');
				$("#md_checkbox").prop("checked", false);
			   document.getElementById("pilihsemua").checked = false;
			   $(".pilihsemua").val("ya");
        	},

        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [ 0,-1,-2,-3,-4,-5,-6], //last column
          "orderable": false, //set not orderable
        },
        ],

      });
      function reload_table()
      {
      	dataTable.ajax.reload(null,false);	
      };

	function detail(kode){
					   var url   = "<?php echo site_url("monkes/detailKondisi");?>";
					   var param = {kode:kode,<?php echo $this->m_reff->tokenName()?>:token};
					   $("#mdl_modal").modal();
					   $.ajax({
							   type: "POST",dataType: "json",data: param, url: url,
							   success: function(val){
								   token=val['token'];
								   $("#isi").html(val["data"]);
								
						
							   }
					   });	
	}
    
	function ajukanTes(id,kode){
					   var url   = "<?php echo site_url("monkes/ajukanUlang");?>";
					   var param = {id:id,kode:kode,<?php echo $this->m_reff->tokenName()?>:token};
					   $("#mdl_modal").modal();
					   $.ajax({
							   type: "POST",dataType: "json",data: param, url: url,
							   success: function(val){
								   token=val['token'];
								   $("#isi").html(val["data"]);
								
						
							   }
					   });	
	}
    </script>

<div class="modal effect-flip-vertical" id="mdl_modal_edit" style="z-index:1500" role="dialog">
                <div class="modal-dialog modal-lg" id="area_modal_edit" role="document">
				 <div id="viewEdit_autoreplay"></div>
				</div>
				
   </div>

   <div class="modal effect-flip-vertical" id="mdl_modal_tambah" style="z-index:1500" role="dialog">
		<div class="modal-dialog modal-lg" id="area_modal" role="document">

			<div class="modal-content">
			 
			<div id="viewAdd_pic"></div>
			</div>
		</div>
	</div><!-- /.modal-dialog -->

    <script type="text/javascript">
	$(".btnhapus").hide();
  	$(".pilihsemua").click(function(){
	
		if($(".pilihsemua").val()=="ya") {
		$(".pilih").prop("checked", "checked");
		$(".pilihsemua").val("no");
		  $(".btnhapus").show();
		} else {
		$(".pilih").prop("checked", false);
		$(".pilihsemua").val("ya");
		  $(".btnhapus").hide();
		}
	
	});
	
	function pilcek(){
		$(".btnhapus").show();
		$(".pilihsemua").val("ya");
		$(".pilihsemua").prop("checked", false);
	};

	function ceklis()
			{	
				 var i=0;
				 $("[name='pilih[]']").each(function () {
					var ischecked = $(this).is(":checked");
					if (ischecked) { 
						i++;
					};  
				}); 
				if(i==0)
					{
						return "false";
					}else{
						return "true";
					}
			}
		 


	</script>
	    <script>

      function add()
      {
        var url   = "<?php echo site_url("autoreplay/viewAdd_autoreplay");?>";
        var param = {<?php echo $this->m_reff->tokenName()?>:token};
        $.ajax({
         type: "POST",dataType: "json",data: param, url: url,
         success: function(val){
          $("#mdl_modal_tambah").modal();
          $("#viewAdd_pic").html(val['data']);
          token=val['token'];
        }
      });   
      }

    function button(){
            var url   = "<?php echo site_url("autoreplay/viewAdd_button");?>";
            var param = {<?php echo $this->m_reff->tokenName()?>:token};
            $.ajax({
             type: "POST",dataType: "json",data: param, url: url,
             success: function(val){
              $("#mdl_modal_tambah").modal();
              $("#viewAdd_pic").html(val['data']);
              token=val['token'];
            }
          });   
      }

function list(){
     var url   = "<?php echo site_url("autoreplay/viewAdd_list");?>";
      var param = {<?php echo $this->m_reff->tokenName()?>:token};
            $.ajax({
             type: "POST",dataType: "json",data: param, url: url,
             success: function(val){
              $("#mdl_modal_tambah").modal();
              $("#viewAdd_pic").html(val['data']);
              token=val['token'];
            }
          });  
}
    
      function edit(id,jenis)
      {	 
        var url   = "<?php echo site_url("autoreplay/viewEdit_autoreplay");?>";
        var param = {<?php echo $this->m_reff->tokenName()?>:token,id:id,jenis:jenis};
        $.ajax({
         type: "POST",dataType: "json",data: param, url: url,
         success: function(val){
          $("#mdl_modal_edit").modal();
          $("#viewEdit_autoreplay").html(val['data']);
          token=val['token'];
        }
      }); 
      }

    </script>
