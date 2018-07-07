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
					<?php foreach ($halamanstatis as $key => $value): ?>
						
					<!-- karena data banyak dan array , ditampilkan pakai foreach -->
						<tr>
							<td><?php echo $key+=1; ?></td>
							<td><?php echo $value['judul']; ?></td>


							<td><?php echo mb_substr($value['isi'],3,10); ?>.....</td>

							<td>
							<a href="<?php echo base_url("admin/halamanstatis/ubah/$value[id_halaman]") ?>" class="btn btn-warning btn-sm">ubah</a>
							</td>
						</tr>
						<?php endforeach ?>

					</tbody>
				</table>
				
			</div>
			<div class="box-footer">
				<a href="<?php echo base_url("admin/halamanstatis/tambah") ?>" class="btn btn-primary">Tambah data</a>
				
			</div>
		</div>
		
	</div>
	
</div>