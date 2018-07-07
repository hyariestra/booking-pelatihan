<!-- data pelanggan ada di var $pelanggan -->
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><?php echo $judul ?></h3>
				<form method="post" enctype="multipart/form-data">
					<div class="box-body">
						<div class="form-group">
							<label>email</label>
							<input type="text" name="email" class="form-control" value="<?php echo $admin['email']; ?>"></input>
							<label>password</label>
							<input type="text" name="password" class="form-control" value=""></input>
							<label>nama</label>
							<input type="text" name="nama" class="form-control" value="<?php echo $admin['nama']; ?>"></input>
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