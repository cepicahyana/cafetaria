

<?php
$id =  $this->input->post("id_order");
$db = $this->db->get_where("tm_order",array("id_order"=>$id))->row();
$sn = isset($db->id_user)?($db->id_user):null;
$hp_pelanggan = isset($db->hp_pelanggan)?($db->hp_pelanggan):null;

$new[null]="--- pilih ---";
$this->db->order_by("nama","asc");
$datamenu = $this->db->get_where("daftar_menu",array("sn"=>$sn))->result();
$newMenu="";
foreach($datamenu as $m){
    // $new[$m->id] = $m->nama;
    $newMenu.='<option value="'.$m->nama.'">'.$m->nama.'</option>';
}

// $menu=form_dropdown("menu",$new,"","class='form-control' onchange='setMenu(`".$id."`,this.value)'");
 ?>

<div class="modal-content" id="area_kasep">  
	<div class="modal-header">  <h5 class="modal-titles" id="defaultModalLabel"><b> detail order</b></h5>
		<button type="button" class="close" aria-label="Close" data-dismiss="modal">
			<span aria-hidden="true">×</span>
		</button>
	</div>


	<div class="modal-body" >
No meja : <input type="text" onchange="setvalue(`<?=$id;?>`,this.value,'no_meja')" class="form-control" value="<?php echo isset($db->no_meja)?($db->no_meja):null?>"> 
Nama pelanggan : <input type="text" onchange="setvalue(`<?=$id;?>`,this.value,'nama_pelanggan')" class="form-control" value="<?php echo isset($db->nama_pelanggan)?($db->nama_pelanggan):null?>"> <br/>
 
<table width="100%">
    <tr>
        <td>Tambah Menu baru</td>
        <td>
            
<input list="options" onchange='setMenu(`<?=$id;?>`,this.value)' name="menu" placeholder='ketik menu...' class='form-control' >
<datalist id="options">
 <?=$newMenu;?>
</datalist>    
            
            
        </td>
    </tr>
</table> 
 <table width="100%" class="entry2">
               <thead class="bg-mint-dark">
                   <th class="bg-mint-dark">No</th> <th  class="bg-mint-dark">Item</th>  <th  class="bg-mint-dark">Qty</th>  <th  class="bg-mint-dark">Total</th> <th  class="bg-mint-dark">Hapus</th>
               </thead>
       <?php
       $data = $this->db->get_where("tm_list_order",array("id_session_order"=>$id))->result(); $no=1; $jmlHarga=0;
       foreach($data as $val){
           $jml=[];
           $jml[0]="0";
           for($i=1;$i<=20;$i++){
               $jml[$i]=$i;
               
           }
           $jml[$val->qty]=$val->qty;
           $nama = $this->m_reff->goField("daftar_menu","nama","where id='".$val->kode_barang."'");
           $qty = form_dropdown("qty",$jml,$val->qty,"style='width:45px' onchange='updateQty(`".$val->id."`,this.value)'");
           echo '<tr>
           <td>'.$no++.'</td>
           <td>'.$nama.'</td>
           <td>'.$qty.'</td>
           <td class="text-black"> '.number_format($val->harga_satuan*$val->qty,0,",",".").'</td> 
           <td><button onclick="updateQty(`'.$val->id.'`,0)" class="btn btn-xs btn-danger">X</button></td>
       </tr>';
       $jmlHarga = ($val->qty*$val->harga_satuan)+$jmlHarga;
       }
       
       if(!$jmlHarga){
           echo "<tr><td colspan='5'><i>Anda belum melakukan pemesanan...</i></td></tr>";
       }
       ?>
       <tr><td colspan="3" align="right" class="bg-dark-light">Total belanja</td><td colspan="2" class="bg-dark-light"> <?=number_format($jmlHarga,0,",",".")?></td></tr>
           </table>
           
 Catatan : <br>
 <textarea  onchange="setvalue(`<?=$id;?>`,this.value,'catatan_pesanan')" class="form-control"><?=isset($db->catatan_pesanan)?($db->catatan_pesanan):null?></textarea>
 
           
      <?php if($jmlHarga){ ?>
        <!--<div class="row me-3 ms-3 mt-3">-->
            
        <!--    <div class="col-12" align="center">-->
        <!--        <a href="javascript:checkout()"   data-menu="menu-confirm" class="btn btn-sm  border-green2-dark button-s shadow-l rounded-s text-uppercase font-900 bg-green2-dark"><i class="fa fa-shopping-cart"></i> checkout</a>-->
        <!--    </div>-->
        <!--</div>-->
        <?php } ?>
     
		  

	</div>
</div>


<script>
function setvalue(id_order,value,field){
 	loading("area_kasep");
		$.ajax({
		 url:"<?=base_url()?>master/set_value",
		 data:"id_order="+id_order+"&value="+value+"&field="+field,
		 method:"POST",
		 dataType:"JSON",
		    beforeSend: function() {
            },
    		 success: function(data)
      		{		unblock("area_kasep");  order('<?=date('Y-m-d');?>');
    		}     
        });
}
function setMenu(id_order,id_menu){
    var hp_pelanggan = "<?=$hp_pelanggan;?>";
   loading("area_kasep");
		$.ajax({
		 url:"<?=base_url()?>master/setMenu",
		 data:"id_order="+id_order+"&id_menu="+id_menu+"&hp_pelanggan="+hp_pelanggan,
		 method:"POST",
		 dataType:"JSON",
		    beforeSend: function() {

            },
    		 success: function(data)
      		{	
    				unblock("area_kasep");
    			 $("#order2").html(data["data"]);
    			 perubahan('<?=$id;?>');
    			 order('<?=date('Y-m-d');?>');
    		}     
        });
}


    function updateQty(id,qty){
    	loading("area_kasep");
		$.ajax({
		 url:"<?=base_url()?>daftar_menu/update_qty",
		 data:"id="+id+"&qty="+qty+"&ido="+<?=$id;?>,
		 method:"POST",
		 dataType:"JSON",
		    beforeSend: function() {
            },
    		 success: function(data)
      		{		unblock("area_kasep");
    			 $("#order2").html(data["data"]);
    			 perubahan('<?=$id;?>');  order('<?=date('Y-m-d');?>');

    		}     
        });
}
</script>
 