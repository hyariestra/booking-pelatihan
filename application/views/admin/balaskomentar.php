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
						<label>Komentar</label>
						<textarea class="form-control" readonly=""><?php echo $komentar['isi_komentar']; ?></textarea>
					</div>
					<div class="form-group">
						<label>Balas</label>
						<textarea class="form-control" name="balas_komentar"></textarea>
					</div>
				</div>

				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Balas</button>
				</div>
			</form>
		</div>
	</div>
</div>
