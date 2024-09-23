
 <div class="col-md-12 areahapus">
	 <label>
		 <input type="checkbox" value="ya" name="checkall" class="toggle pilihsemua"  onclick="pilihsemua(this.value)">
		 <span style="margin-left:10px"> Pilih semua </span>
	</label>

	<button onclick="hapus_terpilih('<?=$this->m_reff->post('id');?>')" class="btnhapus btn btn-danger" style="float:right;margin-top:-15px">Hapus</button>
</div>	  

<?php
$this->db->order_by("_ctime","desc");
$this->db->where("id_artikel",$this->m_reff->post("id"));
$data = $this->db->get("data_media")->result();
$path = $this->m_reff->pengaturan(5);
$base = base_url().$path;
$i=0; $p="";  

foreach($data as $post){
	$p.=$base."/".$post->path.",";	
}

$p = $this->m_reff->clearkoma($p);



	foreach($data as $post){
		$i++;
		if($post->jenis_media=="image"){
					$img = $base."/".$post->path;
	  	// 			$img = $this->konversi->img($img); 
					echo '<div class=" col-md-3">
					<div class="card-body card">
					<input onclick="pilcek()" type="checkbox" name="pilih" value="'.$post->id.'" 
					class="toggle pilih pull-right" style="margin-top:-8px;float:right">
						<img  style="margin-top:6px" width="100%" src="'.$img.'"  onclick="show(`'.$base."/".$post->path.'`,`'.$p.'`)">
						<span class="btn-group" style="margin-top:5px">
						<button class="btn btn-sm btn-info" onclick="hapus_media("'.$post->id.'")">Hapus</button>
						</span>
						</div>
					</div>';
		}elseif($post->jenis_media=="video"){

			echo '<div class=" col-md-3">
					<div class="card-body card">
					<input onclick="pilcek()" type="checkbox" name="pilih" value="'.$post->id.'" 
					class="toggle pilih pull-right" style="margin-top:-8px;float:right">
					<video width="320" height="240" disable onclick="show(`'.$base."/".$post->path.'`,`'.$p.'`)">
  <source src="'.$base."/".$post->path.'" type="video/mp4">
Your browser does not support the video tag.
</video>
						 <span class="btn-group" style="margin-top:5px">
						<button class="btn btn-sm btn-info" onclick="hapus_media("'.$post->id.'")">Hapus</button>
						 </span>
						</div>
					</div>';

		}else{
		    if(strpos($post->path,".pdf")!==false){
		        $img = base_url()."assets/img/pdf.png";
		    }elseif(strpos($post->path,".xl")!==false){
		        $img = base_url()."assets/img/xl.png";
		    }elseif(strpos($post->path,".doc")!==false){
		        $img = base_url()."assets/img/word.png";
		    }else{
		        $img = base_url()."assets/img/file.png";
		    }
		 	         
					echo '<div class=" col-md-3">
					<div class="card-body card">
					<input onclick="pilcek()" type="checkbox" name="pilih" value="'.$post->id.'" 
					class="toggle pilih pull-right" style="margin-top:-8px;float:right">
					<a href="'.$base."/".$post->path.'"  target="_blank">	<img  style="margin-top:6px" width="100%" src="'.$img.'"></a>
						<span class="btn-group" style="margin-top:5px">
						<button class="btn btn-sm btn-info" onclick="hapus_media("'.$post->id.'")">Hapus</button>
						</span>
						</div>
					</div>';
		}
 
   }


?>
 

 
<?php
if($i>0){
	echo "<script>  $('.areahapus').show(); </script>";
}else{
	echo "<script>  $('.areahapus').hide(); </script>";
}?>



<script type="text/javascript"> 

	function pilihsemua(val){
		if(val=="ya") {
				$(".pilih").prop("checked", "checked");
				$(".pilihsemua").val("no");
				$(".btnhapus").show();
		} else {
				$(".pilih").removeAttr("checked");
				$(".pilih").prop("checked", false);
				$(".pilihsemua").val("ya");
				$(".btnhapus").hide();
		}
	}


	$(".btnhapus").hide();

  	function hapus_terpilih(id){
		var vessel = []; var jml=0;
	      $.each($("input[name='pilih']:checked"), function(){          
	          vessel.push($(this).val()); jml++;
	      });
		swal({
			title: 'Hapus ?',
			text: jml+' terpilih',
			type: 'warning',
			buttons: {
				cancel: {
					visible: true,
					text: 'batal',
					className: 'btn btn-danger'
				},
				confirm: {
					text: 'Ya',
					className: 'btn btn-success'
				}
			}
		}).then((willDelete) => {
			if (willDelete) {
				swal(jml+" telah dihapus", {
					icon: "success",
					buttons: {
						confirm: {
							className: 'btn btn-success'
						}
					}
				});

			

				var url = "<?php echo base_url()?>broadcast/hapus_media";
				var param = {"<?php echo $this->m_reff->tokenName()?>": token,id: id,obj:vessel};
				$.ajax({
					type: "POST",
					dataType: "json",
					data: param,
					url: url,
					success: function(val) {
						token = val['token'];
						loadUpload();
					}
				});
			}
		});


	
	  }

	  function pilcek(){
		var vessel = [];  var i=0;
	      $.each($("input[name='pilih']:checked"), function(){          
	          vessel.push($(this).val()); 
			  i++;
	      });
		  
		  if(i>0){
			$(".btnhapus").show();
		  }else{
			$(".btnhapus").hide();
		  }
	  }
	 
	</script>