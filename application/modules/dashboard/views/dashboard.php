<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

<br>
<div id="container2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>



<script type="text/javascript">
    var dataG = <?php echo json_encode($grafik); ?>;

    //console.log(dataG);
    var sales = [ 
              { "name"  : "Niza Wibyana Tito, M.Kom, M.M", "data" : [85.00,90.00] },
              { "name"  : "Hadianti Basti Putri, S.E", "data" : [90.00,95.00] }
             
 
            ]
    console.log(sales);

      var sell = [
                 { "name": "Kesesuaian Materi dengan Kebutuhan","y": 95.00 },
                 { "name": "Durasi waktu pelatihan","y": 75.00 },
                 { "name": "Tempat pelaksanaan dan fasilitas pelatihan","y": 90.00 },
                 { "name": "Tingkat respon panitia ","y": 95.00 },
            ]



console.log(sell);
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Kuisioner Pelatihan Persiapan Penerapan BLUD Dinkes Musi Rawas 3-4 July'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: ['Penguasaan dan Penyampaian materi', 
                    'Interaksi dengan peserta',
                   ],

        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: ''
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} %</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
         series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}%'
            }
        },
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: sales

});
//console.log(series);
</script>

<script type="text/javascript">
    
// Create the chart
Highcharts.chart('container2', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
            text: ''
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
            borderWidth: 0,
            dataLabels: {
                enabled: true,
                format: '{point.y:.1f}%'
            }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [
        {
            "name": "Browsers",
            "colorByPoint": true,
            "data": sell
        }
    ],
});

</script>



<!-- 	<div class="box">
		
		<?php echo $judul ?> 
		<?php echo $this->session->userdata("pengguna")['nama']; ?>
		<div id="container" style="min-width: 510px; height: 400px; margin: 0 auto">

		</div>
	</div>
 -->




<!-- <script type="text/javascript">
	$(document).ready(function(){
	
	
	var penjualan = <?php echo json_encode($penjualan); ?>;
	console.log(penjualan);

	
	
	//==================== THEME =====================//
 Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Data Penjualan Produk'
        },
    /*    tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },*/
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: penjualan.selling
        }]
    });
});


	
</script> -->	
