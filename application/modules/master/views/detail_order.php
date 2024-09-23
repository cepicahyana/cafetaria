<?php
$id =  $this->input->post("id");
$data = $this->db->get_where("tm_list_order",array("id_session_order"=>$id))->result();
?>

<div class="modal-content">  
	<div class="modal-header">  <h5 class="modal-titles" id="defaultModalLabel"><b><?=$this->input->post("nama");?> </b></h5>
		<button type="button" class="close" aria-label="Close" data-dismiss="modal">
			<span aria-hidden="true">×</span>
		</button>
	</div>


	<div class="modal-body" >
	    <table class="entry" width="100%">
	        <thead>
	            <th>Item</th>
	            <th>Qty</th>
	            <th>Total harga</th>
	        </thead>

<?php
$jml=0;
foreach($data as $val){
   echo "<tr>

      <td>".$val->nama_barang."</td>
         <td>".$val->qty."</td>
      <td>".number_format($val->harga_satuan*$val->qty,0,",",".")."</td>
   </tr>"; 
   $jml=($val->harga_satuan*$val->qty)+$jml;
}
?>
<tr>
    <td class='bg-light' colspan="2" align="right"><b>Total</b></td>
    <td class='bg-light'><b><?=number_format($jml,0,",",".");?></b></td>
</tr>
	 	    </table>

	</div>
</div>
 