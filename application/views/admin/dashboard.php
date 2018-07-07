
	<div class="box">
		
		<?php echo $judul ?> 
		<?php echo $this->session->userdata("pengguna")['nama']; ?>
		<div id="container" style="min-width: 510px; height: 400px; margin: 0 auto">

		</div>
	</div>





<script type="text/javascript">
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


	
</script>	
