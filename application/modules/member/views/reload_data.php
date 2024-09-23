<center>
<div class="col-md-12s row">
<?php
// $this->db->where("id_user",1);
$val = $this->db->get("device_stations")->row();
$sts = $this->m_reff->device_sts($val->sts);
$tahun = $this->input->post("tahun");
$jml_chat_inbox = $this->mdl->jml_chat_inbox($tahun);
$jml_org_inbox = $this->mdl->jml_org_inbox($tahun);
$jml_pengaduan = $this->mdl->jml_pengaduan($tahun);
$jml_aduan_norespon = $this->mdl->jml_aduan_norespon($tahun);
$jml_live_chat = $this->mdl->jml_live_chat($tahun);
$jml_live_chat_norespon = $this->mdl->jml_live_chat_norespon($tahun);
$jml_live = $this->mdl->jml_live($tahun);
?>
<div class="col-xl-3 col-md-6 col-lg-6 col-sm-6">
	 <div class="card"> 
		<div class="card-body"> 
			<div class="plan-card text-center"> <i class="fas fa-plug plan-icon text-success"></i> 
			<h6 class="text-drak text-uppercase mt-2">Status perangkat</h6>
			<h2 class="mb-2 text-success"><?=$sts;?></h2> <br/>
		<a href="./device">	<span class="badge badge-primary cursor"> Pengaturan </span> </a>
				 
			</div> 
		</div> 
	</div> 
</div>

<div class="col-xl-3 col-md-6 col-lg-6 col-sm-6">
	 <div class="card"> 
		<div class="card-body"> 
			<div class="plan-card text-center"> <i class="fas typcn typcn-calendar-outline plan-icon text-success"></i> 
			<h6 class="text-drak text-uppercase mt-2">PESAN MASUK</h6>
			<h2 class="mb-2 text-success"><?=$jml_org_inbox;?> Orang</h2> 
			<span>( <?=number_format($jml_chat_inbox,0,",",".");?> chat   )</span><br/>
		<a href="./inbox">	<span class="badge badge-primary cursor"> Open</span> </a>
				 
			</div> 
		</div> 
	</div> 
</div>

<div class="col-xl-3 col-md-6 col-lg-6 col-sm-6">
	 <div class="card"> 
		<div class="card-body"> 
			<div class="plan-card text-center"> <i class="fas typcn typcn-shopping-cart plan-icon text-success"></i> 
			<h6 class="text-drak text-uppercase mt-2">Pengaduan pelanggan</h6>
			<h2 class="mb-2 text-success"><?=$jml_pengaduan;?> Data</h2> 
			<span>( <?=number_format($jml_aduan_norespon,0,",",".");?> belum ditangani   )</span><br/>
			<span class="badge badge-primary cursor"> Open</span> 
				 
			</div> 
		</div> 
	</div> 
</div>

 

<div class="col-xl-3 col-md-6 col-lg-6 col-sm-6">
	 <div class="card"> 
		<div class="card-body"> 
			<div class="plan-card text-center"> <i class="fas fa-hospital plan-icon text-success"></i> 
			<h6 class="text-drak text-uppercase mt-2">Menghubungi CS </h6>
			<h2 class="mb-2 text-success"><?=$jml_live_chat;?> </h2> 
			<?php
			if($jml_live){?>
				<span>( <?=number_format($jml_live,0,",",".");?> sedang berlangsung   )</span><br/>
			<?php }else{ echo "<br>"; }
			if($jml_live_chat_norespon){?>			<span>( <?=number_format($jml_live_chat_norespon,0,",",".");?> belum ditanggapi   )</span><br/> <?php } ?>
			<span class="badge badge-primary cursor"> Open</span> 
				 
			</div> 
		</div> 
	</div> 
</div>
 
 
	</div>
</center>

<div id="grafik">
    
</div>


<div class=" ">
	 <div class="card"> 
		<div class="card-body"> 
			<div class="plan-card text-justify"> 
				<b class="text-justify">Diclaimer:</b><br>
				Privasi dan Kebijakan
Sistem aplikasi konekwa.com ini tidak berafiliasi dengan WhatsApp. 
WhatsApp adalah merk yang terdaftar oleh WhatsApp Inc. 
Software Warranty yang mengikat pada sistem aplikasi ini terbatas pada modul untuk pengolahan data 
yang diterima dan dikirim melalui aplikasi konekwa.com.
<br/><br/>
Kebijakan yang telah dan atau akan diterbitkan oleh WhatsApp Inc selaku pemegang merk dagang WhatsApp yang mana dapat menyebabkan
 sistem ini tidak dapat bekerja bukanlah bagian dari layanan garansi ini. 
 Kebijakan yang dimaksud dapat berhubungan dengan akses penggunaan aplikasi WhatsApp, fitur aplikasi WhatsApp, 
spesifikasi perangkat pendukung,
 dan kebijakan lainnya yang merupakan hak sepenuhnya dari WhatsApp Inc selaku pemilik merk dagang.
			</div> 
		</div> 
	</div> 
</div>

					 
						<!-- /row -->
					</div>
					
					
<?php

$date = date('Y-m-d');
$dt_keluhan="";
for($i=30;$i>=0;$i--){
       $tgl = $this->tanggal->minTglEng($i,$date).br();
      $this->db->select("count(*) as jml");
      $this->db->where("SUBSTR(_ctime,1,10)",$tgl);
      $jml = $this->db->get("data_aduan")->num_rows();
      $dt_keluhan.= "{ name: '".$tgl."', y: ".$jml." },";
}


       
?>


<script>
Highcharts.chart('grafik', {
    chart: {
        type: 'spline'
    },
    title: {
        text: 'PENGUNJUNG'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah'
        },
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: '<b>total:{point.y}</b>'
    },
    series: [{
        name: 'Population',
        data:[
            <?=$dt_keluhan;?>
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
</script>			
</center>