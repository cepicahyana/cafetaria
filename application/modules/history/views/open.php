 
        <div class="card-body">
             <center><h4><i class="fa fa-shopping-cart"></i> Detail order</h4></center>
 <table width="100%" class="entry2">
               <thead class="bg-mint-dark">
                   <th class="bg-mint-dark">No</th> <th  class="bg-mint-dark">Item</th>  <th  class="bg-mint-dark">Qty</th>  <th  class="bg-mint-dark">Total</th>
               </thead>
       <?php
       $id = $this->input->post("id");
       $data = $this->mdl->getListOrder($id); $no=1; $jmlHarga=0;
       foreach($data as $val){
             
           $nama = $this->m_reff->goField("daftar_menu","nama","where id='".$val->kode_barang."'");
           $qty =$val->qty;
           echo '<tr>
           <td>'.$no++.'</td>
           <td>'.$nama.'</td>
           <td>'.$qty.'</td>
           <td class="text-success">Rp '.number_format($val->harga_satuan*$val->qty,0,",",".").'</td> 
       </tr>';
       $jmlHarga = ($val->qty*$val->harga_satuan)+$jmlHarga;
       }
       
       if(!$jmlHarga){
           echo "<tr><td colspan='5'><i>Anda belum melakukan pemesanan...</i></td></tr>";
       }
       ?>
       <tr><td colspan="3" align="right" class="bg-dark-light">Total belanja</td><td class="bg-dark-light">Rp <?=number_format($jmlHarga,0,",",".")?></td></tr>
          <tr><td colspan="4"><i><?php echo $this->m_reff->goField("tm_order","catatan_pesanan","where id_order='".$val->id_session_order."'")?></i></td></tr>
           </table>
       
           </div>    