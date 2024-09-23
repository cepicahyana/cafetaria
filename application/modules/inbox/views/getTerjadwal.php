<?php
$nik    =   $this->input->post("nik");
$idu    =   $this->m_reff->idu();

            $this->db->where("id_pelanggan",$nik);
            $this->db->where("id_user",$idu);
$dt     =   $this->db->get("pesan_terjadwal")->result();
foreach($dt as $val){ ?>

<div class="alert-primary alert">
							<table width="100%" class="entry3 mt-3"  >
								<tr id="tr1">
									 
								<td width="240px">
								<div class="input-group "> 
									<div class="input-group-prepend"> 
										<span class="input-group-text text-black" style="color:black">Kirim setiap</span> 
									</div>
									<input value="1"  value="<?= $val->fr;?>" style="width:20px;color:black" name="remin[fr][]" class="form-control" type="number"> 
									<div class="input-group-append"> <span class="input-group-text" style="color:black">Hari</span> </div>
								</div>
								</td> <td class="pl-5" align="right"> Tanggal mulai berlaku : <input name="remin[tgl][]" size="20" type="text" id="tgl" value="<?php echo $val->tgl_kirim?>"></td>
								</td> <td class="pl-5" align="right"> Waktu kirim : <input value="<?= $val->jam;?>"  name="remin[jam][]" size="10" type="text" id="time" value="08:00"></td>
								</tr>
								<tr id="tr2">
								 
								<td colspan="3">
								<p class="mt-2">
								Isi pesan : <span class='float-right text-primary cursor' onclick='getTemp()'><i class="fa fa-book"></i> Template pesan</span>	
								<textarea name="remin[msg][]" class="form-control" style="min-height:120px"><?= $val->msg;?></textarea></p>
								</td>
								</tr>
						</table>
					</div>
<?php } ?>
