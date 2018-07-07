<style type="text/css">


.inner{
	 overflow: hidden;
  width: 400px;
}

.btnExport{
	padding: 5px 5px 5px 5px;
}

.cc{
float: left;
margin-right: 10px;
}

.bs-callout-info {
  
    padding: 10px;
    margin: 20px 0;
    border: 1px solid  #1b809e;
    border-left-width: 5px;
    border-radius: 3px;
}

.bs-callout-info2 {
  
    padding: 10px;
    margin: 20px 0;
    border: 1px solid  #8e44ad;
    border-left-width: 5px;
    border-radius: 3px;
}
.bs-callout-info3 {
  
    padding: 10px;
    margin: 20px 0;
    border: 1px solid  #27ae60;
    border-left-width: 5px;
    border-radius: 3px;
}
.bs-callout-info4 {
  
    padding: 10px;
    margin: 20px 0;
    border: 1px solid  #e67e22;
    border-left-width: 5px;
    border-radius: 3px;
}

	.boxinvoice{
		background:#fff;
		padding:20px;
		box-shadow:0px 0px 15px #ccc;
	}
	
	.kopinvoice{
		font-size:13px;
	}
	
	.bodyinvoice{
		margin:20px 0px;
		/*overflow-y:hidden;*/
	}
	
	.bodyoverflow{
		width:120%;
	}
	
	.table>tbody>tr>td.right{
		
		text-align:right;
		
	}
	ul.unlist{
		list-style-type: none;
	}
	


</style>
<?php //echo "asdsd";exit(); 

$startDay = "01";
$startMonth = date("m");
$startYear = date("Y");

$startDate = $startDay."-".$startMonth."-".$startYear;
$startDate = date("d-m-Y", strtotime($startDate));

$endDay = date("t");
$endMonth = date("m");
$endYear = date("Y");

$endDate = $endDay."-".$endMonth."-".$endYear;
$endDate = date("d-m-Y", strtotime($endDate));
?>
<div class="row">

	<div class="col-md-12">

		<div class="box">

			<div class="box-header">
				<div class="row">
					
					<div class="col-md-6">
						<h3 class="box-title"><?php echo $judul ?></h3>

					</div>

					<div class="col-md-3">
					 <input type="text" class="daterange form-control" value="<?php echo $startDate?> s/d <?php echo $endDate?>" id="datarange" name="datarange"/>
					</div>
					<div class="col-md-3">
						<button type="button" onclick="exportData()" class="btnExport btn btn-xs btn-primary">
							<span class="glyphicon glyphicon-export" aria-hidden="true"></span>
							Export Excel
						</button>
					</div>

				</div>

			</div>

			<div class="box-body">
				

				
				<table class="table" id="tabelku">

					<thead>

						<tr>

							<th>No</th>

							<th>Kode Pembelian</th>

							<th>Nama Buyer</th>
							<th>Telp Penerima</th>

							<th>Total Pembelian</th>
							<th>Status Pengiriman</th>
							<th>Nomor Resi</th>
							<th>Tanggal Pembelian</th>
							<th>Detail</th>

						</tr>

					</thead>

					<tbody>

						<?php foreach ($penjualan as $key => $value):
/*
					if ($value['proses']=='Diproses') {
						$stat = '<a href="#" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon glyphicon-info-sign" aria-hidden="true"></span> Diproses</a>';
					}else{
						$stat = '<a href="#" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Deal</a>';
					}

					if ($value['status']=='1') {
						$choice = '<a href="#" class="btn btn-success btn-sm"><span class="glyphicon glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span> Setuju</a>';
					}else{
						$choice = '<a href="#" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon glyphicon-info-sign" aria-hidden="true"></span> Nego</a>';
					}
*/
					?>
					<tr>

						<td><?php echo $key+=1; ?>
							<input type="hidden" id="idtable" value="<?php echo $value['id_pembelian'] ?>" name="">
						</td>

						<td><?php echo $value['kode_pembelian']; ?></td>

						<td><?php echo $value['nama_penerima']; ?></td>

						<td><?php echo $value['telp_penerima']; ?></td>
						<!-- 	<td><?php echo wordwrap($value['email'], 25, "\n", true); ?></td> -->
						<td><?php echo number_format($value['total_bayar']); ?></td>
						<td><?php echo $value['status_pengiriman']; ?></td>
						<td><?php echo $value['resi_pengiriman']; ?></td>
						<td><?php echo date("d-m-Y", strtotime($value['tanggal_pembelian']));
						?></td>

						<td>

							<a href="#"  data-toggle="modal" data-target="#modalharga" onclick="showmodalpembelian(this,'<?php echo $value['id_pembelian']; ?>')"; class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Detail</a>

						</td>


					<?php endforeach ?>

				</tr>

			</tbody>

		</table>


	</div>
</div>
</div>

</div>

<div class="modal" id="modalharga" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Rincian Pembelian</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			
				<section class="invoice">

          <!-- title row -->

          <div class="row">

            <div class="col-xs-12">

              <h2 class="page-header">

                <i class="fa fa-globe"></i> Bumdes.id


                <small class="pull-right"><div id="tgljson">-</div></small>

              </h2>

            </div><!-- /.col -->

          </div>

          <!-- info row -->

          <div class="row invoice-info">

    <div class="col-sm-4 invoice-col">

      Dari

      <address>

        <strong><?php echo tampil_pengaturan("nama_usaha"); ?></strong><br>

        Alamat : <?php echo tampil_pengaturan("alamat_usaha") ?><br>

        Email : <?php echo tampil_pengaturan("email_usaha"); ?><br>

        Telepon : <?php echo tampil_pengaturan("telepon_usaha"); ?>

      </address>

    </div><!-- /.col -->

    <div class="col-sm-4 invoice-col">

      Kepada

      <address>

      	<strong>
      		<div id="penerimajson">-</div>
      	</strong>
      	
      	<div id="pengirimanjson">-</div> 
      	
      	<div id="alamatjson">-</div>
      	
      	<div id="telpjson">-</div>

  
      </address>

    </div><!-- /.col -->

    <div class="col-sm-4 invoice-col">

      Paket Pengiriman


      <address>

      	<strong>
      		<div id="ekspedisijson">-</div>
      	</strong>
      	
      	<div id="paketekspedisijson">-</div> 
      	
      	<div id="waktujson">-</div>
      	
      
  
      </address>

    </div>


    <!-- /.col -->

  </div><!-- /.row -->



          <!-- Table row -->

          <div class="row">

            <div class="col-xs-12 table-responsive">

              <table class="table table-striped">

                <thead>

                  <tr>

                    <th>No</th>

                    <th>Nama Produk</th>

                    <th>Jumlah</th>

                    <th>Harga</th>

                    <th>Subtotal</th>

                  </tr>

                </thead>

                <tbody>

            <tr>

                  	<td>1</td>

                    <td><div id="produkjson">Kaos Bumdes</div> </td>

                    <td><div id="jmlprodukjson">-</div></td>

                    <td><div id="hargaproduk">-</div></td>

                    <td><div id="subtotaljson">-</div> </td>

                  </tr>
                  

                </tbody>

              </table>

            </div><!-- /.col -->

          </div><!-- /.row -->

          <div class="row">
<!-- 
            accepted payments column -->

            <!-- <div class="col-xs-6">

              <p class="lead">Payment Methods:</p>

              <img src="../../dist/img/credit/visa.png" alt="Visa">

              <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">

              <img src="../../dist/img/credit/american-express.png" alt="American Express">

              <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">

                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.

              </p>

            </div> --><!-- /.col -->

            <div class="col-xs-6">

             <!--  <p class="lead">Amount Due 2/22/2014</p> -->

              <div class="table-responsive">

                <table class="table">

                  <tr>

                    <th style="width:50%">Total Belanja:</th>

                    <td class="right"><div id="subtotaljson2">-</div></td>

                  </tr>

                  <tr>

                    <th>Total Ongkos Kirim:</th>

                    <td class="right"><div id="ongkirjson"></div></td>

                  </tr>

                  <tr>

                    <th>Total Bayar</th>

                    <td class="right"><div id="totalbayarjson"></div></td>

                  </tr>

                </table>

              </div>

            </div><!-- /.col -->


            <div class="col-md-6">
            	<b>Detail Pemesanan:</b>
            </div>
            <div id="ukuranjson" class="col-md-1">
            	-
            </div>
            <div id="jumlahdetjson" class="col-md-1">
            	-
            </div>

          </div><!-- /.row -->



          <!-- this row will not appear when printing -->

          <!-- <div class="row no-print">

            <div class="col-xs-12">

              <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>

              <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>

              <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>

            </div>

          </div> -->

        </section>
			
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function(){
		$(".daterange").daterangepicker();
		$('#note').hide();
	});


	function format2(n, currency) {
		return currency + " " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
	}

	function exportData()
	{
		var tgl = $("#datarange").val().split(" s/d ");
		start = tgl[0];
		end = tgl[1];
	
		//console.log(id);
		var target = "<?php echo site_url("penjualan/laporanpenjualan")?>/"+start+"/"+end;
		
		window.open(target);
		
	}


	function showmodalpembelian(obh,IDB)
	{
		var target = "<?php echo site_url('penjualan/getdetail'); ?>";
		var data = {
			idx : IDB
		}

		$.post(target,data, function(e){
			var json = $.parseJSON(e);
			console.log(json);
			$("#tgljson").html(json.tanggal);
			$("#penerimajson").html(json.nama_penerima);
			$("#pengirimanjson").html(json.alamat_pengiriman);
			$("#alamatjson").html(json.alamat_pelanggan);
			$("#telpjson").html(json.telp_penerima);
			$("#produkjson").html(json.produk);
			$("#jmlprodukjson").html(json.jmlproduk);
			$("#hargajson").html(json.total);
			$("#subtotaljson").html(json.subtotal);
			$("#subtotaljson2").html(json.subtotal);
			$("#ongkirjson").html(json.biaya_pengiriman);
			$("#totalbayarjson").html(json.total_bayar);
			$("#hargaproduk").html(json.hargaproduksatuan);
			/*$("#notejson").html(json.catatan);*/
			$("#ekspedisijson").html(json.ekspedisi);
			$("#paketekspedisijson").html(json.paket_ekspedisi);
			$("#waktujson").html(json.waktu_tempuh);

			var ukuran = '';
			var jumlahdet = '';

			for (y = 0; y < json.sizeNweight.length; y++)
			{
				ukuran+=json.sizeNweight[y].ukuran+'<br>';
				jumlahdet+=json.sizeNweight[y].jumlahdet+'<br>';
				
				console.log(json.sizeNweight[y].ukuran);
				console.log(json.sizeNweight[y].jumlahdet);
			}

				$("#ukuranjson").html(ukuran);
				$("#jumlahdetjson").html(jumlahdet);




		});
	}

	function showmodalharga(obj,IDB)
	{
		$('#note').hide();
		var target = "<?php echo site_url('booking/dettable'); ?>";
		var ket = '<div style="color:#e74c3c;" id="kkk"><i>*Tidak Ada Keterangan<i></div>';
		data = {
			idx : IDB
		}

		$.post(target,data, function(e){
			var json = $.parseJSON(e);

			$('#temejson').html(json.dettema);
			$('#programjson').html(json.detprogram);
			$('#instansijson').html(json.detinstansi);
			$('#jumlahjson').html(json.jmlpeserta+' Orang');
			$('#harijson').html(json.hari+' Hari');
			$('#tanggaljson').html(json.dateakhir);
			$('#id_book').val(json.id_booking);
			$('#instansine').html(json.kategoriins);

			$('#ketprodukwant').html(json.ketproduk = (json.ketproduk=='')?ket: json.ketproduk);
			$('#ketprodukwantlainnya').html(json.ketproduklainnya = (json.ketproduklainnya=='')?ket:json.ketproduklainnya);

			$('#keterangantemalainnya').html(json.temalainnya = (json.temalainnya=='')?ket: json.temalainnya);
			$('#lokasipemesanan').html(json.alamatpeserta = (json.alamatpeserta=='')?ket: json.alamatpeserta);

			console.log(json);
			changetab(json);
		});

		$("#modalharga").modal("show");
	}



	

</script>

