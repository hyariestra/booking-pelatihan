<!-- data pelanggan ada di var $pelanggan -->
<div class="row">
	<div class="col-md-12">
		<div class="box">
			<div class="box-header">
				<h3 class="box-title"><?php echo $judul ?></h3>
					<form method="post">
						<div class="box-body">
							<div class="form-group">
								<label>Kode Voucher</label>
								<input type="text" name="kode_voucher" class="form-control" value="<?php echo $voucher['kode_voucher']; ?>"></input>
							</div>
						<div class="form-group">
								<label>Nominal Potongan Voucher</label>
								<input type="text" name="nominal_voucher" class="form-control" value="<?php echo $voucher['nominal_voucher']; ?>"></input>
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