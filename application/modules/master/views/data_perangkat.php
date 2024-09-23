<?php
$this->db->order_by("id","desc");
// $this->db->where("id_user",$this->m_reff->idu());
$data = $this->db->get("device_stations")->result();
?>

<b>Perangkat anda:</b>
<!--<button class="float-right btn btn-primary btn-sm" style="margin-top:-10px" onclick="newSender()">-->
<!--<i class='las la-plus-circle' style='font-size:20px'></i>  -->
<!--Add new number</button>-->
				<table class="table table-bordered table-striped table-hover" width="100%">
					<thead class='bg-blue'>
						<th  style='color:black' width="40px">No</th>
						<th style='color:black'>Sender Name</th>
						<th style='color:black'>Sender number</th>
						
						<th  style='color:black'>  conection</th>
						<th  style='color:black'>Package</th>
						 
						<th  style='color:black'>Status</th>
						<th  style='color:black'>#</th>
						<th  style='color:black'>EDIT | HAPUS</th>
					</thead>
                    <?php
                    $no = 1;
                    foreach($data as $val){
						if($val->sts!=5){
							$aktifasi = "<span class='text-success'>Active</span>";
						}else{
							$aktifasi = "<span class='text-danger'>non-active</span>";
						}
                      $sts = $this->m_reff->device_sts($val->sts);
echo "
<tr>
<td>".$no++."</td>
<td>".$val->sender_name."</td>
<td>".$val->sender_number."</td>

<td>".$sts."</td>
<td >".$this->m_reff->goField("data_paket","nama_paket","where id='".$val->package."'")."</td>
<td width='100px'>".$aktifasi."</td>
<td width='300px'>
<button  onclick='scan(`".$val->id."`,`".$val->sender_number."`)' class='btn btn-sm bg-dark text-white'> 
<i class='las la-qrcode' style='font-size:20px'></i> 
Scan
</button>

<button class='btn btn-sm bg-info text-white'> 
<i class='las la-info-circle' style='font-size:20px'></i> 
API
</button>
<button class='btn btn-sm bg-primary text-white'> 
<i class='las la-shopping-cart' style='font-size:20px'></i>
Order package
</button>
</td>

<td width='150px'>

<button title='hapus' onclick='edit_device(`".$val->id."`,`".$val->sender_number."`)' class='btn btn-sm bg-dark text-white'> 
<i class='las la-edit' style='font-size:20px'></i> Edit
</button>

<button title='hapus' onclick='hapus_device(`".$val->id."`,`".$val->sender_number."`)' class='btn btn-sm bg-danger text-white'> 
<i class='las la-trash' style='font-size:20px'></i> 
</button>

</td>

</tr>
";
                    }
                    ?>
				</table>