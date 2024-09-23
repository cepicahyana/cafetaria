 <table class="entry" width="100%">
		     <thead>
		         <th>No Meja</th>
		         <th>Nama</th>
		         <th>Order</th>
		         <th>Sts bayar</th>
		     </thead>
		     <?php
		     $this->db->where("id_user",$this->session->userdata("sn"));
		     $this->db->where("DATE(entry)",date('Y-m-d'));
		     $this->db->where("sts>",0);
		     $this->db->order_by("tanda","asc");
		     $this->db->order_by("no_meja","asc");
		     $this->db->order_by("nama_pelanggan","asc");
		      $db = $this->db->get("tm_order")->result();
		      foreach($db as $v){
		          if($v->tanda==1){
		              $sts = "<button onclick='setSts(`".$v->id."`,`0`)' class='btn btn-sm btn-success'>Sudah</button>";
		          }else{
		               $sts = "<button onclick='setSts(`".$v->id."`,`1`)'  class='btn btn-sm btn-light'>Belum</button>";
		          }
		         echo "<tr>
		         <td>".$v->no_meja."</td>
		         <td><span class='text-primary' onclick='showOrder(`".$v->id_order."`,`".$v->nama_pelanggan."`)'>".$v->nama_pelanggan."</span></td>
		         <td>".number_format($v->harga_final,0,",",".")."</td>
		         <td>".$sts."</td>
		         </tr>";
		     }
		     ?>
		     <tr>
		         
		     </tr>
		 </table>