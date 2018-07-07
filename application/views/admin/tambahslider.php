<!-- data pelanggan ada di var $pelanggan -->
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><?php echo $judul ?></h3>
			</div>

			<form method="post" enctype="multipart/form-data">
				<div class="box-body">
					<div class="form-group">
						<label>Judul Slider</label>
						<input type="text" name="judul_slider" class="form-control"></input>
					</div>
					<div class="form-group">
						<label>Isi</label>
						<input type="text" name="isi" class="form-control"></input>
					</div>
					<div class="form-group">
						<label>Gambar slider</label>
						<input type="file" name="gambar_slider" class="form-control"></input>
					</div>
				</div>

				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
</div>
