 
    <style>
 #container {
 background-color:"white";
   background-size:cover;
}
    </style>




<?php
    $grafik = $this->input->post("grafik");
	$tgl=$this->input->post("range");
	$awal=$this->tanggal->range_1($tgl);
	$akhir=$this->tanggal->range_2($tgl);
	
	$this->mdl->_get_data_report();
	$db=$this->db->get()->result();
	$tgldb="";$list="";$desc="";$gal="";
	foreach($db as $datax)
	{
	////
	 
	if($grafik=="7"){
	$gal=$this->tanggal->ind(substr($datax->tgl,0,10),"/"); $desc="Grafik Perhari";}
	
	if($grafik=="8"){
	$gal=$datax->tgl; $desc="Grafik Perminggu";}
	
	if($grafik=="9"){
	$_tgl_=explode("-",$datax->tgl);  $gal=$this->konversi->bulan($_tgl_[0])."-".$_tgl_[1]; $desc="Grafik Perbulan";}
	
	if($grafik=="10"){
	$gal=$datax->tgl;  $desc="Grafik Pertahun"; }
	//////
	
	$tgldb.="'".$gal."',";
	$list.=$datax->total.",";
	}
	
	
?>

 


<div id="container" style="min-width: 100%; height: 400px; margin: 0 auto;background-color:white"></div>
 


		<script type="text/javascript">

Highcharts.chart('container', {
      
    chart: {
        // events: {
        //         load: function () {
        //             var ch = this;
        //             setTimeout(function(){
        //                 ch.exportChart();
        //             },1);
        //         }
        //     },
        backgroundColor:"white",
     polar: true,
        type: 'area',
        spacingBottom: 30,

        
    },
     
//   exporting: {
//       buttons: {
//         contextButton: {
//           symbol: null,
//           menuItems: null,
//           text: 'Download',
//           onclick: function() {
//             this.exportChart({
//               type: 'image/png'
//             });
//           }
//         }
//       }
//     },
      
    title: {
        text: 'Total <?php echo number_format($this->mdl->total($tgl),0,",",".");?>'
    },
    subtitle: {
        text: ' Tanggal: <?php echo $tgl;?>',
        floating: true,
        align: 'right',
        verticalAlign: 'bottom',
        y: 15
    },
    
    xAxis: {
        categories: [<?php echo $tgldb; ?>]
    },
    yAxis: {
        title: {
              text: ''
        },
        labels: {
            formatter: function () {
                return this.value;
            }
        }
    },
    tooltip: {
        formatter: function () {
            return '<b>' + this.series.name + '</b><br/>' +
                this.x + ': ' + this.y;
        }
    },
   	
    credits: {
        enabled: false
    },
      plotOptions: {
        series: {
            dataLabels: {
                enabled: true,
                borderRadius: 2,
                y: -10,
                shape: 'callout',
                color:"black",
                  
            }
        }
    },
  
    series: [ {
        name: "<?php echo $desc; ?>",
        data: [<?php echo  $list; ?>],
        color: '#1c56ff',
        fillOpacity: 0.2,
    },
     ]
});


 
		</script>
		
		