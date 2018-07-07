<!-- data pelanggan ada di var $pelanggan -->
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><?php echo $judul ?></h3>
					<form method="post">
						<div class="box-body">
							<div class="form-group">
								<label>Nama Pelanggan</label>
								<input type="text" name="nama_pelanggan" class="form-control" value="<?php echo $pelanggan['nama_pelanggan']; ?>"></input>
							</div>
						<div class="form-group">
								<label>Email Pelanggan</label>
								<input type="email" name="email_pelanggan" class="form-control" value="<?php echo $pelanggan['email_pelanggan']; ?>"></input>
							</div>
						<div class="form-group">
								<label>Password Pelanggan</label>
								<input type="password" name="password_pelanggan" class="form-control" value="<?php echo $pelanggan['password_pelanggan']; ?>"></input>
							</div>
						<div class="form-group">
								<label>Telepon Pelanggan</label>
								<input type="text" name="telepon_pelanggan" class="form-control" value="<?php echo $pelanggan['telepon_pelanggan']; ?>"></input>
							</div>
						<div class="form-group">
								<label>Alamat Pelanggan</label>
								<textarea name="alamat_pelanggan" class="form-control" id="editorku"><?php echo $pelanggan['alamat_pelanggan']; ?></textarea>
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