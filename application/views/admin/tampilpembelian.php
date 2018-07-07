

<div class="row">

	<div class="col-md-12">

		<div class="box">

			<div class="box-header">

				<h3 class="box-title"><?php echo $judul ?></h3>

			</div>

			<div class="box-body">

				<table class="table" id="tabelku">

					<thead>

						<tr>

							<th>No</th>

							<th>Kode Pembelian</th>

							<th>Nama Pelanggan</th>

							<th>Total Pembelian</th>

							<th>Status Pembelian</th>

							<th>Status Pengiriman</th>

							<th>Nomor Resi</th>

							<th>Aksi</th>

						</tr>

					</thead>

					<tbody>

					<?php foreach ($datapembelian as $key => $value): ?>

						

					<!-- karena data banyak dan array , ditampilkan pakai foreach -->

						<tr>

							<td><?php echo $key+=1; ?></td>

							<td><?php echo $value['kode_pembelian']; ?></td>

							<td><?php echo $value['nama_pelanggan']; ?></td>

							<td>Rp.<?php echo number_format($value['total_bayar']); ?></td>
							<td><?php echo $value['status_pembelian']; ?></td>
							<td><?php echo $value['status_pengiriman']; ?></td>
							<td><?php echo $value['resi_pengiriman']; ?></td>


						

						<td width="27%">

							<a href="<?php echo base_url("admin/pembelian/detail/$value[id_pembelian]") ?>" class="btn btn-info btn-sm">detail</a>

							<a href="<?php echo base_url("admin/pembayaran/detail/$value[id_pembelian]") ?>" class="btn btn-success btn-sm">Lihat Pembayaran</a>

							<a href="<?php echo base_url("admin/pembelian/resi/$value[id_pembelian]") ?>" class="btn btn-warning btn-sm">Input Resi</a>

						

						</td>

						<?php endforeach ?>

						</tr>

					</tbody>

				</table>

				

			</div>

			<div class="box-footer">

				<!-- <a href="<?php echo base_url("admin/pelanggan/tambah") ?>" class="btn btn-primary">Tambah data</a> -->

				

			</div>

			

		</div>

		

	</div>

	

</div>