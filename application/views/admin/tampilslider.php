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
							<th>Judul Slide</th>
							<th>Gambar</th>
							<th>Aksi</th>
							
						</tr>
					</thead>
					<tbody>
					<?php foreach ($slider as $key => $value): ?>
						
					<!-- karena data banyak dan array , ditampilkan pakai foreach -->
						<tr>
							<td><?php echo $key+=1; ?></td>
							<td><?php echo $value['judul_slider']; ?></td>
							<td><?php echo $value['gambar_slider']; ?></td>
						<td>
							<!-- <a href="<?php echo base_url("admin/slider/detail/$value[id_slider]") ?>" class="btn btn-info btn-sm">detail</a> -->
							<a href="<?php echo base_url("admin/slider/ubah/$value[id_slider]") ?>" class="btn btn-warning btn-sm">ubah</a>
							<a href="<?php echo base_url("admin/slider/hapus/$value[id_slider]") ?>" class="btn btn-danger btn-sm">hapus</a>
						</td>
						</tr>
						<?php endforeach ?>

					</tbody>
				</table>
				
			</div>
			<div class="box-footer">
				<a href="<?php echo base_url("admin/slider/tambah") ?>" class="btn btn-primary">Tambah data</a>
				
			</div>
			
		</div>
		
	</div>
	
</div>