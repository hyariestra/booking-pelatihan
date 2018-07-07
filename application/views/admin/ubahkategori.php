<!-- data pelanggan ada di var $pelanggan -->
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><?php echo $judul ?></h3>
					<form method="post" enctype="multipart/form-data">
						<div class="box-body">
							<div class="form-group">
								<label>Nama Kategori</label>
								<input type="text" name="nama_kategori" class="form-control" value="<?php echo $kategori['nama_kategori']; ?>"></input>
							</div>

							

						
					
					</div>
					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				
			</div>
			
		</div>
		
	</div>
	
</div>