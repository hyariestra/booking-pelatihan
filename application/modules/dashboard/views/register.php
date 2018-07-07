<style>
	.wizardbox{
		
		box-shadow :1px 1px 15px #ccc;
		padding:0px 20px 10px 20px;
		background:#fff;
	}
	
	.spanlabel{
		font-size:13px;
		color:#999;
	}
	
	.spanrequired{
		color:#999;
		font-size:12px;
	}
	
	.rightbox{
		background:#fff;
		padding:10px;
	}
	
	.headerright{
		border-bottom:2px dotted #2091c9;
		padding:5px 0px;
	}
	
	.header-righttitle{
		font-size:14px;
		color:#999;
	}
	
	.labelspanradio{
		color:#000;
		font-size:14px;
	}
	
	.boxform{
		border-top: 2px dotted #2091c9;
		margin: 10px 0px 0px 0px !important;
		padding: 10px 0px 0px 0px !important;
	}
	
	.spantextatribute{
		color:#999;
		font-size:14px;
		padding:10px 0px;
	}
	
	.spantextlistattr
	{
		font-size:12px;
	}
	
	.nb{
		font-size:12px;
		color:#999;
	}
	
	.number{
		background: #2091c9;
		border-radius: 10px;
		padding: 2px 5px;
		color: #fff;
		font-size: 10px;
		font-weight: bold;
	}
	
	.pricebox{
		color: #fff;
		padding: 10px;
		background: #2091c9;
	}
</style>

<div class="container" style="padding:90px 0px 40px 0px !important; width:77%;">
	<div class="col-md-8">
		<div class="wizardbox">
			<form  id="myForm" role="form" data-toggle="validator" accept-charset="utf-8">
						
				<!-- SmartWizard html -->
				<div id="smartwizard">
					<ul>
						<li><a href="#step-1">Step 1<br /><small>Informasi Diri</small></a></li>
						<li><a href="#step-2">Step 2<br /><small>Informasi Pelatihan</small></a></li>
						<li><a href="#step-3">Step 3<br /><small>Informasi Pelaksanaan</small></a></li>
					</ul>
					
					<div class="boxform">
						<div id="step-1">
							<div class="kontak">
								<span class="spanlabel"><span style="color:red;font-weight:bold;">*</span> Nama Pemasan</span>
								<div id="form-step-1" role="form" data-toggle="validator">
									<div class="form-group">
										<input type="text" class="form-control" name="nama" id="nama" >
										<span class="spanrequired">harus diisi berdasarkan nama pemesan</span>
									</div>
								</div>
								
								<span class="spanlabel"><span style="color:red;font-weight:bold;">*</span> Nama Bumdes</span>
								<div id="form-step-0" role="form" data-toggle="validator">
									<div class="form-group">
										<input type="text" class="form-control" name="instansi" id="ins" >
										<span class="spanrequired">harus diisi berdasarkan nama bumdes</span>
									</div>
								</div>

								<span class="spanlabel">Alamat</span>
								<div id="form-step-0" role="form" data-toggle="validator">
									<div class="form-group">
										
									  <textarea class="form-control" name="alamatpendaf" id="address" rows="3" ></textarea>
										
									</div>
								</div>

								

								<div class="row">
									<div class="col-md-6">
										<span class="spanlabel"><span style="color:red;font-weight:bold;">*</span> No. Telepon</span>
										<div id="form-step-0" role="form" data-toggle="validator">
											<div class="form-group">
												<input type="text" class="form-control" name="telp" >
												<span class="spanrequired">No. telepon yang dapat dihubungi</span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<span class="spanlabel">Alamat Email</span>
										<div id="form-step-0" role="form" data-toggle="validator">
											<div class="form-group">

												<input type="email" class="form-control" name="emailpendaf" id="email"  >
											</div>
										</div>
									</div>
								</div>
								<!--<button type="button" class="btn btn-primary" onclick="simpandata()">Save changes</button>-->
							</div>
							
						</div>
						
						<div id="step-2">
						
							<span class="spanlabel"><span style="color:red;font-weight:bold;">*</span> Kategori Instansi</span>
							<div id="form-step-0" role="form" data-toggle="validator">
							
								<div class="col-md-6">
									
									<div class="radio">
									  <label class="spanlabel"><input type="radio" name="instansi">Accademic</label>
									</div>
									<div class="radio">
									  <label class="spanlabel"><input type="radio" name="instansi">Business</label>
									</div>
									<div class="radio">
									  <label class="spanlabel"><input type="radio" name="instansi">Comunity</label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="radio">
									  <label class="spanlabel"><input type="radio" name="instansi">Goverment</label>
									</div>
									<div class="radio">
									  <label class="spanlabel"><input type="radio" name="instansi">Financial</label>
									</div>
									<div class="radio">
									  <label class="spanlabel"><input type="radio" name="instansi">Media</label>
									</div>
								</div>
							</div>
							
							<span class="spanlabel"><span style="color:red;font-weight:bold;">*</span> Produk yang Diinginkan</span>
							<div id="form-step-0" role="form" data-toggle="validator">
							
								<div class="col-md-12">
									
									<div class="radio">
									  <label class="spanlabel"><input type="radio" name="produk">Produk 1</label>
									</div>
									<div class="radio">
									  <label class="spanlabel"><input type="radio" name="produk">Produk 2</label>
									</div>
									<div class="radio">
									  <label class="spanlabel"><input type="radio" name="produk">Produk 3</label>
									</div>
								</div>
								
							</div>	
							<div class="row">
								<div class="col-md-12">
									<span class="spanlabel"><span style="color:red;font-weight:bold;">*</span> Tema yang Diinginkan</span>
									<div id="form-step-0" role="form" data-toggle="validator">
									
										<div class="col-md-6">
											
											<div class="radio">
											  <label class="spanlabel"><input type="radio" name="tema">Tema 1</label>
											</div>
											<div class="radio">
											  <label class="spanlabel"><input type="radio" name="tema">Tema 2</label>
											</div>
											<div class="radio">
											  <label class="spanlabel"><input type="radio" name="tema">Tema 3</label>
											</div>
										</div>
										<div class="col-md-6">
											<span class="nb"><b>Note :</b> Tema di sesuikan dengan produk pelatihan yang akan dilaksanakan</span>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<span class="spanlabel"><span style="color:red;font-weight:bold;">*</span> Program</span>
									<div id="form-step-0" role="form" data-toggle="validator">
									
										<div class="col-md-6">
											
											<div class="radio">
											  <label class="spanlabel"><input type="radio" name="program">Program 1</label>
											</div>
											<div class="radio">
											  <label class="spanlabel"><input type="radio" name="program">Program 2</label>
											</div>
											<div class="radio">
											  <label class="spanlabel"><input type="radio" name="program">Program 3</label>
											</div>
										</div>
										
										<div class="col-md-6">
											<span class="nb"><b>Note :</b> Pilih program sesuai dengan tema dan produk yang telah dipilih sebelumnya.</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="step-3">
							<div class="row">
								<div class="col-md-6">
									<span class="spanlabel"><span style="color:red;font-weight:bold;">*</span> Jumlah Peserta</span>
									<div id="form-step-0" role="form" data-toggle="validator">
										<div class="form-group">
											<input type="number" min="1" value="1" style="width:25%;"  class="form-control" name="jmlpeserta" id="jmlpeserta"  >
											<span class="spanrequired">Jumlah peserta mempengaruhi harga</span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<span class="spanlabel"><span style="color:red;font-weight:bold;">*</span> Tanggal Mulai </span>
									<div id="form-step-0" role="form" data-toggle="validator">
										<div class="form-group">
											<input type="text" class="form-control" readonly name="tglmulai" id="tglmulai"  >
											
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<span class="spanlabel"><span style="color:red;font-weight:bold;">*</span> Tanggal Selesai </span>
									<div id="form-step-0" role="form" data-toggle="validator">
										<div class="form-group">
											<input type="text" class="form-control" readonly name="tglselesai" id="tglselesai"  >
											
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="step-4" class="">
							<h2>Terms and Conditions</h2>
							<p>
								Terms and conditions: Keep your smile :) 
							</p>
							<!-- <div id="form-step-3" role="form" data-toggle="validator">
								<div class="form-group">
									<label for="terms">I agree with the T&C</label>
									<input type="checkbox" id="terms" data-error="Please accept the Terms and Conditions" required>  
									<div class="help-block with-errors"></div>
								</div>
							</div> -->
							
							
						</div>
					</div>
					
					<span class="nb"><b>Note :</b> kolom yang bertanda (*) harus diisi</span>
				</div>
			</form>
		</div>
		
		
	</div>
	
	<div class="col-md-4">
		<div class="rightbox">
			<div class="headerright">
				<span class="header-righttitle">Pemesanan Detail</span>
			</div>
			<div class="bodyright">
				<div class="spantextatribute">
					<div style="margin-bottom:5px;">Fasilitas pelatihan :</div>
					<div class="row">
						<div class="col-md-6">
							<div class="spantextlistattr"><span style="color:#8bc34a;" class="glyphicon glyphicon-ok"></span> Materi Bumdes</div>
							<div class="spantextlistattr"><span style="color:#8bc34a;" class="glyphicon glyphicon-ok"></span> Modul Pelatihan</div>
							<div class="spantextlistattr"><span style="color:#8bc34a;" class="glyphicon glyphicon-ok"></span> Ruang AC</div>
						</div>
						<div class="col-md-6">
							<div class="spantextlistattr"><span style="color:#8bc34a;" class="glyphicon glyphicon-ok"></span> Sertifikat Pelatihan</div>
							<div class="spantextlistattr"><span style="color:#8bc34a;" class="glyphicon glyphicon-ok"></span> Aplikasi SAAB</div>
							<div class="spantextlistattr"><span style="color:#8bc34a;" class="glyphicon glyphicon-ok"></span> Wifi</div>
						</div>
					</div>
				</div>
				
				<div class="spantextatribute">
					<div style="margin-bottom:5px;">
						<span class="number">1</span> Informasi Pemesan :
					</div>
					<div class="row">
						<div class="col-md-6 pull pull-left">
							<div class="spantextlistattr">Pemesanan atas nama</div>
						</div>
						<div class="col-md-6 pull pull-right">
							<div class="spantextlistattr">Ryzvianto Harya Prakasa</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 pull pull-left">
							<div class="spantextlistattr">Nama Bumdes</div>
						</div>
						<div class="col-md-6 pull pull-right">
							<div class="spantextlistattr">Syncore Indonesia</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 pull pull-left">
							<div class="spantextlistattr">No. Telp</div>
						</div>
						<div class="col-md-6 pull pull-right">
							<div class="spantextlistattr">085867480223</div>
						</div>
					</div>
				</div>
				
				<div class="spantextatribute">
					<div style="margin-bottom:5px;">
						<span class="number">2</span> Informasi Pelatihan :
					</div>
					<div class="row">
						<div class="col-md-6 pull pull-left">
							<div class="spantextlistattr">Kategori Instansi</div>
						</div>
						<div class="col-md-6 pull pull-right">
							<div class="spantextlistattr">Accademic</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 pull pull-left">
							<div class="spantextlistattr">Produk </div>
						</div>
						<div class="col-md-6 pull pull-right">
							<div class="spantextlistattr">Produk 1</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 pull pull-left">
							<div class="spantextlistattr">Tema Pelatihan</div>
						</div>
						<div class="col-md-6 pull pull-right">
							<div class="spantextlistattr">Pembentukan Bumdes</div>
						</div>
					</div>
				</div>
				
				<div class="spantextatribute">
					<div style="margin-bottom:5px;">
						<span class="number">3</span> Informasi Pelaksanaan :
					</div>
					<div class="row">
						<div class="col-md-6 pull pull-left">
							<div class="spantextlistattr">Jumlah Orang</div>
						</div>
						<div class="col-md-6 pull pull-right">
							<div class="spantextlistattr">2 orang</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 pull pull-left">
							<div class="spantextlistattr">Lama Pelatihan </div>
						</div>
						<div class="col-md-6 pull pull-right">
							<div class="spantextlistattr">3 Hari</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 pull pull-left">
							<div class="spantextlistattr">Tanggal Mulai</div>
						</div>
						<div class="col-md-6 pull pull-right">
							<div class="spantextlistattr">Senin, 19-Jan-2012</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 pull pull-left">
							<div class="spantextlistattr">Tanggal Selesai</div>
						</div>
						<div class="col-md-6 pull pull-right">
							<div class="spantextlistattr">rabu, 9-01-2012</div>
						</div>
					</div>
				</div>
				
				<div class="pricebox">
					<div class="row">
						<div class="col-md-6 pull pull-left">
							<span class="">Total Biaya</span>
						</div>
						<div class="col-md-6 pull pull-right">
							<span class=""><small>Rp.</small>2.000.000</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	
</div>