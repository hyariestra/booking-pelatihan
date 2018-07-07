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

							<th>Nama Produk</th>

							<th>Kode Produk</th>

							<th>Kategori</th>

							<th>Aksi</th>

						</tr>

					</thead>

					<tbody>

					<?php foreach ($dataproduk as $key => $value): ?>

						

					<!-- karena data banyak dan array , ditampilkan pakai foreach -->

						<tr>

							<td><?php echo $key+=1; ?></td>

							<td><?php echo $value['nama_produk']; ?></td>

							<td><?php echo $value['kode_produk']; ?></td>

							<td><?php echo $value['nama_kategori']; ?></td>

						

						<td>

							<!-- <a href="<?php echo base_url("product/detail/$value[id_produk]") ?>" class="btn btn-info btn-sm">detail</a> -->

							<a href="<?php echo base_url("product/ubah/$value[id_produk]") ?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> ubah</a>

							<a href="<?php echo base_url("product/hapus/$value[id_produk]") ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> hapus</a>

						</td>

						<?php endforeach ?>

						</tr>

					</tbody>

				</table>

				

			</div>

			<div class="box-footer">

				<a href="<?php echo base_url("product/tambah") ?>" class="btn btn-primary">Tambah data</a>

				

			</div>

			

		</div>

		

	</div>

	

</div>