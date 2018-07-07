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
							
							<th>Nama</th>

							<th>Asal Instansi</th>

							<th>Jabatan</th>

							<th>No Telp</th>

							<th>Alamat Email</th>

						</tr>

					</thead>

					<tbody>

					<?php foreach ($tampilpaketsatu as $key => $value): ?>

						

					<!-- karena data banyak dan array , ditampilkan pakai foreach -->

						<tr>

							<td><?php echo $key+=1; ?></td>

							<td><?php echo $value['nama']; ?></td>

							<td><?php echo $value['asal_instansi']; ?></td>

							<td><?php echo $value['jabatan']; ?></td>
							<td><?php echo $value['no_telp']; ?></td>
							<td><?php echo $value['email']; ?></td>

						

						<td>

							<!-- <a href="<?php echo base_url("admin/produk/detail/$value[id_produk]") ?>" class="btn btn-info btn-sm">detail</a> -->

							<a href="<?php echo base_url("admin/produk/ubah/$value[id_paket_satu]") ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> ubah</a>

							<a href="<?php echo base_url("admin/produk/hapus/$value[id_paket_satu]") ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> hapus</a>

						</td>

						<?php endforeach ?>

						</tr>

					</tbody>

				</table>

				

			</div>

			<div class="box-footer">

				<a href="<?php echo base_url("admin/produk/tambah") ?>" class="btn btn-primary">Tambah data</a>

				

			</div>

			

		</div>

		

	</div>

	

</div>