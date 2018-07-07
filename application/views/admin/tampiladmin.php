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
							<th>Email</th>
							
							<th>Nama</th>
							<th>Aksi</th>
							
						</tr>
					</thead>
					<tbody>
					<?php foreach ($admin as $key => $value): ?>
						
					<!-- karena data banyak dan array , ditampilkan pakai foreach -->
						<tr>
							<td><?php echo $value['email']; ?></td>
							
							<td><?php echo $value['nama']; ?></td>
						<td>
							<a href="<?php echo base_url("admin/admin/ubah/$value[id_admin]") ?>" class="btn btn-warning btn-sm">ubah</a>
						</td>
						</tr>
						<?php endforeach ?>

					</tbody>
				</table>
				
			</div>
			
		</div>
		
	</div>
	
</div>