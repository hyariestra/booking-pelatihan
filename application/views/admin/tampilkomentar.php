<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title">Data Komentar</h3>
			</div>
			<div class="box-body">
				<table class="table" id="tabelku">
					<thead>
						<tr>
							<th>No</th>
							<th>nama</th>
							<th>Produk</th>
							<th>Status</th>
							<th>isi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($komentar as $key => $value): ?>
						
					<!-- karena data banyak dan array , ditampilkan pakai foreach -->
						<tr>
							<td><?php echo $key+=1; ?></td>
							<td><?php echo $value['nama_pelanggan']; ?></td>
							<td><?php echo $value['nama_produk']; ?></td>
							<td><?php echo $value['status_komentar']; ?></td>
							<td><?php echo $value['isi_komentar']; ?></td>
						<td>
							<a href="<?php echo base_url("admin/komentar/balas/$value[id_komentar]") ?>" class="btn btn-info">Balas</a>
							<a href="<?php echo base_url("admin/komentar/publikasi/$value[id_komentar]") ?>" class="btn btn-warning">Publish</a>
							<a href="<?php echo base_url("admin/komentar/hapus/$value[id_komentar]") ?>" class="btn btn-danger">Hapus</a>
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