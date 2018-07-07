<!-- data pelanggan ada di var $pelanggan -->

<div class="row">

	<div class="col-md-12">

		<div class="box">

			<div class="box-header">

				<h3 class="box-title"><?php echo $judul ?></h3>

			</div>

			<div class="box-body">

				<table class="table">

					<thead>

						<tr>

							<th>No</th>

							<th>Kolom</th>

							<th>Isi</th>

							<th>Aksi</th>

						</tr>

					</thead>

					<tbody>

					<?php foreach ($pengaturan as $key => $value): ?>

						

					<!-- karena data banyak dan array , ditampilkan pakai foreach -->

						<tr>

							<td><?php echo $key+=1; ?></td>

							<td><?php echo $value['kolom']; ?></td>

							<td><?php echo $value['isi']; ?></td>



							<td>

								<!-- <a href="<?php echo base_url("admin/pengaturan/detail/$value[id_pengaturan]") ?>" class="btn btn-info btn-sm">detail</a> -->

							<a href="<?php echo base_url("pengaturan/ubah/$value[id_pengaturan]") ?>" class="btn btn-warning btn-sm">ubah</a>

							</td>

						</tr>

						<?php endforeach ?>



					</tbody>

				</table>

				

			</div>

			<div class="box-footer">

				<a href="<?php echo base_url("admin/pengaturan/tambah") ?>" class="btn btn-primary">Tambah data</a>

				

			</div>

			

		</div>

		

	</div>

	

</div>