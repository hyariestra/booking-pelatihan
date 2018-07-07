<!-- data pelanggan ada di var $pelanggan -->
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
							<th>Email</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($pelanggan as $key => $value): ?>
						
					<!-- karena data banyak dan array , ditampilkan pakai foreach -->
						<tr>
							<td><?php echo $key+=1; ?></td>
							<td><?php echo $value['nama_pelanggan']; ?></td>
							<td><?php echo $value['email_pelanggan']; ?></td>
						
						<td>
							<a href="<?php echo base_url("admin/pelanggan/detail/$value[id_pelanggan]") ?>" class="btn btn-info btn-sm">detail</a>
							<!-- <a href="<?php echo base_url("admin/pelanggan/ubah/$value[id_pelanggan]") ?>" class="btn btn-warning btn-sm">ubah</a> -->
							<a href="<?php echo base_url("admin/pelanggan/hapus/$value[id_pelanggan]") ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger btn-sm">hapus</a>
						</td>
						<?php endforeach ?>
						</tr>
					</tbody>
				</table>
				
			</div>
			<div class="box-footer">
				<a href="<?php echo base_url("admin/pelanggan/tambah") ?>" class="btn btn-primary">Tambah data</a>
				
			</div>
			
		</div>
		
	</div>
	
</div>