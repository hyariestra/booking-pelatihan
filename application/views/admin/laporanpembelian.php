<div class="box">
	<div class="box-body">
		<form method="post" action="<?php echo base_url("admin/pembelian/cetaklaporan") ?>">
			<div class="form-group">
				<label>Tanggal Mulai</label>
				<input type="date" class="form-control" name="tanggal_m">
			</div>
			<div class="form-group">
				<label>Tanggal Selesai</label>
				<input type="date" class="form-control" name="tanggal_s">
			</div>
			<div class="form-group">
				<label>Status Pembelian</label>
				<select class="form-control" name="status_pembelian">
					<option value="">Pilih Satu</option>
					<option value="lunas">Lunas</option>
					<option value="Sudah konfirmasi">Sudah Konfirmasi</option>
					<option value="belum lunas">Belum lunas</option>
					
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Cek Laporan</button>
		</form>
	</div>
</div>