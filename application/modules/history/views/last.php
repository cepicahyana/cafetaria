 
        <div class="card-body"><br>
             <center><span class="text-primary"> <b>Terimakasih, Pesanan anda segera kami proses 😊 </b></span></center>
 <table width="100%" class="entry2">
               <thead class="bg-mint-dark">
                   <th class="bg-mint-dark">No</th> <th  class="bg-mint-dark">Item</th>  <th  class="bg-mint-dark">Qty</th>  <th  class="bg-mint-dark">Total</th>
               </thead>
       <?php
 
       $data = $this->mdl->getLastOrder(); $no=1; $jmlHarga=0;
       $last = "";
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
       $last = isset($val->id_session_order)?($val->id_session_order):null;
       }
       
       if(!$jmlHarga){
           echo "<tr><td colspan='5'><i>Anda belum melakukan pemesanan...</i></td></tr>";
       }
       ?>
       <tr><td colspan="3" align="right" class="bg-dark-light">Total belanja</td><td class="bg-dark-light">Rp <?=number_format($jmlHarga,0,",",".")?></td></tr>
       <tr><td colspan="4"><i><?php echo $this->m_reff->goField("tm_order","catatan_pesanan","where id_order='".$last."'")?></i></td></tr>
           </table>
       
           </div>    