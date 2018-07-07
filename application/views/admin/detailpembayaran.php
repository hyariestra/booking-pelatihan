<?php 

//jika belum/tidak ada pembayaran 

if (!$pembayaran):



echo "<div class='alert alert-danger'>Belum ada pembayaran untuk pembelian ini</div>";

else:

?>

<div class="row">

	<div class="col-md-6">

		<div class="box">

			<div class="box-header">

				<h3 class="box-title">Data Pembayaran</h3>

			</div>

			<div class="box-body">

				<table class="table table-striped table-hover">

					<tr>

						<td>Nama Pembayaran</td>

						<td>: <?php echo $pembayaran['nama_pembayaran']; ?></td>

					</tr>

					<tr>

						<td>Bank Pembayaran</td>

						<td>:<?php echo $pembayaran['bank_pembayaran']; ?></td>

					</tr>

					<tr>

						<td>Jumlah Pembayaran</td>

						<td>:<?php echo $pembayaran['jumlah_pembayaran']; ?></td>

					</tr>

					<tr>

						<td>Tanggal Pembayaran</td>

						<td>:<?php echo $pembayaran['tanggal_pembayaran']; ?></td>

					</tr>

				</table>

			</div>

			<div class="box-footer">

				<a href="<?php echo base_url("admin/pembayaran/terima/$pembayaran[id_pembelian]") ?>" class="btn btn-primary btn-sm">Terima Pembayaran</a>

			</div>

		</div>

	</div>

	<div class="col-md-6">

		<div class="box">

			<div class="box-header">

				<h3 class="box-title">Bukti Pembayaran</h3>

			</div>

			<div class="box-body"><img src="<?php echo base_url("assets/foto_pembayaran/$pembayaran[bukti_pembayaran]") ?>"></div>

		</div>

	</div>

</div>











<?php endif ?>