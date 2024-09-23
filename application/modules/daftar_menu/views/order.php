<?php
if(!$this->session->userdata("id_order")){
    return false;
}?>
        <div class="card-body">
             <center><h4><i class="fa fa-shopping-cart"></i> Data order</h4></center>
 <table width="100%" class="entry2">
               <thead class="bg-mint-dark">
                   <th class="bg-mint-dark">No</th> <th  class="bg-mint-dark">Item</th>  <th  class="bg-mint-dark">Qty</th>  <th  class="bg-mint-dark">Total</th> <th  class="bg-mint-dark">Hapus</th>
               </thead>
       <?php
       $data = $this->mdl->getListOrder(); $no=1; $jmlHarga=0;
       foreach($data as $val){
           $jml=[];
           $jml[0]="0";
           for($i=1;$i<=10;$i++){
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
      <?php if($jmlHarga){ ?>
        <div class="row me-3 ms-3 mt-3">
            
            <div class="col-12" align="center">
                <a href="javascript:checkout()"   data-menu="menu-confirm" class="btn btn-sm  border-green2-dark button-s shadow-l rounded-s text-uppercase font-900 bg-green2-dark"><i class="fa fa-shopping-cart"></i> checkout</a>
            </div>
        </div>
        <?php } ?>
            
  </div>         