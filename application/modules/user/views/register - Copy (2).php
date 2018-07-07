<style>
/*#show-me{
    height: 0;
    overflow: hidden;
   -moz-animation: slide 1s ease 0.1s forwards;
   -webkit-animation: slide 1s ease 0.1s forwards;
   -o-animation: slide 1s ease 0.1s forwards;
   -ms-animation: slide 1s ease 0.1s forwards;
    animation: slide 1s ease 0.1s forwards;
}*/

	table{counter-reset:section;}
 	.count:before
 	{
 		counter-increment:section;
 		content:counter(section);
 	}
	.boxinvoice{
		background:#fff;
		padding:20px;
		box-shadow:0px 0px 15px #ccc;
	}
	
	.kopinvoice{
		font-size:13px;
	}
	
	.bodyinvoice{
		margin:20px 0px;
		/*overflow-y:hidden;*/
	}
	
	.bodyoverflow{
		width:120%;
	}
	
	.table > tbody > tr > th{
		padding:0px !important;
		margin:0px !important;
		text-align:center;
		font-size:12px;
		color:#555;
	}
	ul.unlist{
		list-style-type: none;
	}
	
	.table > tbody > tr > td{
		padding:5px !important;
		margin:0px !important;
		/*text-align:center;*/
		font-size:12px;
		color:#555;
	}
	.table > tbody > tr > td.mid{
		padding:5px !important;
		margin:0px !important;
		text-align:center;
		font-size:12px;
		color:#555;
	}
	
	.td-note{
		background:#ffbf61;
	}
	
	.td-stats{
		background:#8cf749;
	}
</style>
<style>
	
	.fc-day-grid-event .fc-time
	{
		display: none;
	}
	.fc-head-container
	{
		font-size: 80%;
	}
	.fc-day-number
	{
		font-size: 80%;
	}
	.fc-center h2{
		font-size: 150%;
	}
	.fc-toolbar.fc-header-toolbar
	{
		font-size: 90%;
	}
	.fc-day-grid-event .fc-content
	{
		font-size: 85%;
	}


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
		padding:5px 0px;
	}
	
	.spantextlistattr
	{
		font-size:12px;
	}
	
	.nb{
		font-size:12px;
		color:#f75400;
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
		background: #f75400;
	}
	
	.spanadditional{
		color:#999;
		border-top:2px dotted #2091c9;
		padding:10px 0px;
	}
	
	.boxaddtional{
		border-bottom:2px dotted #2091c9;
		padding-bottom:10px;
		margin-bottom:10px;
	}
	
	.sw-theme-dots .sw-toolbar{
		padding:0px;
	}
	
	.sw-btn-next, .sw-btn-prev{
		background:#2091c9;
		color:#fff;
		padding:5px;
	}
	
	.sw-btn-next{
		float:right !important;
	}
	
	.sw-btn-group{
		width:100% !important;
		margin:0px;
	}
	
	.backdropOverlay{
		position:fixed;
		z-index:9999;
		background:#00000096;
		height:100%;
		width:100%;
	}
	
	.boxbtnfinish{
		display:none;
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
								<span class="spanlabel"><span style="color:red;font-weight:bold;">*</span> Nama Pemesan</span>
								<div id="form-step-1" role="form" data-toggle="validator">
									<div class="form-group">
										<input value="<?php $sess = $this->session->userdata('pelanggan'); echo $sess['nama_users'] ?>" onblur="getValueByAttr(this)" type="text" class="form-control" name="nama" id="nama" >
										<span class="spanrequired">harus diisi berdasarkan nama pemesan</span>
									</div>
								</div>
								
								<span class="spanlabel"><span style="color:red;font-weight:bold;">*</span> Nama Bumdes</span>
								<div id="form-step-0" role="form" data-toggle="validator">
									<div class="form-group">
										<input value="<?php echo $sess['nama_bumdes'] ?>"  onblur="getValueByAttr(this)" type="text" class="form-control" name="namabumdes" id="namabumdes" >
										<span class="spanrequired">harus diisi berdasarkan nama bumdes</span>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<span class="spanlabel"><span style="color:red;font-weight:bold;">*</span> Provinsi</span>
										<div id="form-step-0" role="form" data-toggle="validator">
											<div class="form-group">
												<select id="kabs" name="propinsi" onchange="getKab(this)" class="form-control">
													<option value="">:: Silahkan Pilih Provinsi ::</option>
													<?php
														foreach($propinsi->result() as $prop)
														{
													?>
														<option <?php if ($this->session->userdata('pelanggan')['id_propinsi']==$prop->kode_propinsi){echo"selected";} {
														} ?> value="<?php echo $prop->kode_propinsi?>"><?php echo $prop->nama_propinsi?></option>
													<?php
														}
													?>
												</select>
												<span class="spanrequired">harus diisi berdasarkan propinsi bumdes</span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<span class="spanlabel"><span style="color:red;font-weight:bold;">*</span> Kota</span>
										<div id="form-step-0" role="form" data-toggle="validator">
											<div class="form-group">
												<select name="kota" class="form-control">
													<option value="">:: Silahkan Pilih Kota ::</option>
												</select>
												<span class="spanrequired">harus diisi berdasarkan kota bumdes</span>
											</div>
										</div>
									</div>
								</div>

								<span class="spanlabel">Alamat</span>
								<div id="form-step-0" role="form" data-toggle="validator">
									<div class="form-group">
										
									  <textarea class="form-control" name="alamat" id="alamat" rows="3" ><?php echo $sess['alamat'] ?> </textarea>
										
									</div>
								</div>

								

								<div class="row">
									<div class="col-md-6">
										<span class="spanlabel"><span style="color:red;font-weight:bold;">*</span> No. Telepon</span>
										<div id="form-step-0" role="form" data-toggle="validator">
											<div class="form-group">
												<input id="telpz" value="<?php echo $sess['telp'] ?>" onblur="getValueByAttr(this)" type="text" class="form-control" name="telp" >
												<span class="spanrequired">No. telepon yang dapat dihubungi</span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<span class="spanlabel">Alamat Email</span>
										<div id="form-step-0" role="form" data-toggle="validator">
											<div class="form-group">

												<input value="<?php echo $sess['email'] ?>" type="email" class="form-control" name="email" id="email"  >
											</div>
										</div>
									</div>
								</div>
								<!--<button type="button" class="btn btn-primary" onclick="simpandata()">Save changes</button>-->
							</div>
							
						</div>
						
						<div id="step-2">
						
								<div class="row">
								<div class="col-md-6">
									<span class="spanlabel"><span style="color:red;font-weight:bold;">*</span> Jumlah Peserta</span>
									<div id="form-step-0" role="form" data-toggle="validator">
										<div class="form-group">
											<input onblur="getValueRadio(this);getValueByAttr(this);" type="number" min="1" value="1" style="width:25%;"  class="form-control" name="jmlpeserta" id="jmlpeserta"  >
											<span class="spanrequired">Jumlah peserta mempengaruhi harga</span>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<label class="control-label">&nbsp;</label>
									
								</div>
								<div class="col-md-12">
								
										 <div style="border-style: solid;  border:1px solid #2ea2c5;" id='calendar'></div>
									
								</div>

								<div class="col-md-4">
									<span class="spanlabel"><span style="color:red;font-weight:bold;">*</span> Tanggal Mulai </span>
									<div id="form-step-0" role="form" data-toggle="validator">
										<div class="form-group">
											<input type="text" value="<?php echo date("d-m-Y")?>" role="tanggal" class="form-control" readonly name="tglmulai" id="tglmulai"  >
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<span class="spanlabel"><span style="color:red;font-weight:bold;">*</span> Tanggal Selesai </span>
									<div id="form-step-0" role="form" data-toggle="validator">
										<div class="form-group">
											<input onblur="getvaldate(this);" type="text" role="tanggal" class="form-control" readonly name="tglselesai" id="tglselesai"  >
											
										</div>
									</div>
								</div>
								
								
							</div>
						</div>
						<div id="step-3">
							<span class="spanlabel"><span style="color:red;font-weight:bold;">*</span> Kategori Instansi</span>
							<div id="form-step-0" role="form" data-toggle="validator">
							
								<?php 

								foreach ($instansi->result_array() as $key => $value) {
								
								
								?>
								<div style="" class="col-md-6">
										<div style="padding: 0;margin: 0;" class="radio">
											<label class="spanlabel">
												<input  onchange="gettable(this);gettambahan(this);" onclick="getValueRadio(this);" type="radio" value="<?php echo $value['id_kat_instansi'] ?>#<?php echo $value['harga_ins'] ?>" name="instansi"><?php echo $value['nama_instansi'] ?></label>

											</div>
										</div>
						
							 	<?php } ?>
							</div>
							
							<br>
							<br>
							<span class="spanlabel"><span style="color:red;font-weight:bold;">*</span> Produk yang Diinginkan</span>
							<div id="form-step-0" role="form" data-toggle="validator">

								<div class="col-md-12">
									
									<?php 
									foreach ($produk->result_array() as $key => $value) {


										?>
										<div class="radio">
											<label class="spanlabel"><input onclick="getValueRadio(this); show<?php echo $value['id_produk_want']?>();" type="radio" value="<?php echo $value['id_produk_want'] ?>#<?php echo $value['harga_produk'] ?>" name="produk"><?php echo $value['nama_produk'] ?></label>
										</div>



										<?php } ?>

									</div>
									<input type="hidden" name="damn" id="you">
									<div id="show-me">
										<textarea placeholder="masukan keterangan.." class="form-control" name="keterangan_produk" rows="5" id="comment"></textarea>

									</div>
									<div id="show-lainnya">
										<textarea placeholder="masukan keterangan lainnya.." class="form-control" name="keterangan_lainnya" rows="5" id="lainnya"></textarea>

									</div>
									<div class="col-md-12">
										<span class="nb"><b>Note :</b> Produk di sesuikan dengan produk pelatihan yang akan dilaksanakan</span></div>

								</div>	
							<div class="row">
								<div class="col-md-12">
									<span class="spanlabel"><span style="color:red;font-weight:bold;">*</span> Tema yang Diinginkan</span>
									<div id="form-step-0" role="form" data-toggle="validator">
									
										<div class="col-md-6">
													
											<?php 
											foreach ($tema->result_array() as $key => $value) {  ?>

											<div class="radio">
											  <label class="spanlabel">
											  	<input onclick="getValueRadio(this)" type="radio"  value="<?php echo $value['id_theme'] ?>#<?php echo $value['harga_theme'] ?>" name="tema"><?php echo $value['nama_theme'] ?></label>
											</div>
											<?php } ?>

										</div>
										<div class="col-md-12">
											<span class="nb"><b>Note :</b> Tema di sesuikan dengan produk pelatihan yang akan dilaksanakan</span>
										</div>
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-12">
									<span class="spanlabel"><span style="color:red;font-weight:bold;">*</span> Program</span>
									<div id="form-step-0" role="form" data-toggle="validator">
										<div class="col-md-12">
											<?php  
											foreach ($program->result_array() as $key => $value) {
												

												?>
												<div class="radio">
													<label class="spanlabel">
														<input onclick="openthedor(this);getValueRadio(this)" type="radio" value="<?php echo $value['id_lokasi_program'] ?>#<?php echo $value['harga_program'] ?>" name="program"><?php echo $value['nama_program']; ?>
													</label>
												</div>
												<?php } ?>

											</div>
											<div id="show-prog">
												<textarea placeholder="masukan alamat yang diusulkan..." class="form-control" name="alamat_peserta" rows="5" id="alamat_peserta"></textarea>

											</div>
										
										<div class="col-md-12">
											<span class="nb"><b>Note :</b> Pilih program sesuai dengan tema dan produk yang telah dipilih sebelumnya.</span>
										</div>
									</div>
								</div>
							</div>
							
							<div class="boxaddtional">
								<div class="spanadditional">
									<span>Tambahan fasilitas</span>
								</div>
								<div id="getadditional">
								</div>
								<span class="nb" style="font-weight:bold;">* Penambahan fasilitas akan mempengaruhi harga</span>
							</div>
							<div class="row" style="background:#eee;color:#555;margin:0px;">
								<div class="col-md-9">
									<div class="checkbox">
									  <label class="spanlabel">
									  	<input type="checkbox" id="tugel" name="term">pemesanan terdapat <b style="color:#2091c9">syarat dan ketentuan</b> yang berlaku</label>
									</div>
								</div>
								<div class="col-md-3">
									<button disabled="" id="disbutt" type="button" onclick="showmodalharga()" style="color:#fff;" class="btn btn-sm pull pull-right">
										<span style="color:#fff;" class="glyphicon glyphicon-save"></span> Cetak Data RAB
									</button>
								</div>
						<!-- 	<div class="col-md-9">
									<div class="checkbox">
									  <label class="spanlabel"><input type="checkbox" name="term">pemsanan terdapat <b style="color:#2091c9">syarat dan ketentuan</b> yang berlaku</label>
									</div>
								</div>
								<div class="col-md-3">
									<button type="button" onclick="cetakRAB()" style="color:#fff;" class="btn btn-sm pull pull-right">
										<span style="color:#fff;" class="glyphicon glyphicon-save"></span> Cetak Data RAB
									</button>
								</div> -->
							</div>


						</div>
					</div>
					
					<span class="nb" ><b>Note :</b> kolom yang bertanda (*) harus diisi</span>
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
						</div>
						<div class="col-md-6">
							<div class="spantextlistattr"><span style="color:#8bc34a;" class="glyphicon glyphicon-ok"></span> Sertifikat Pelatihan</div>
							<div class="spantextlistattr"><span style="color:#8bc34a;" class="glyphicon glyphicon-ok"></span> Aplikasi SAAB</div>
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
							<div id="info_nama" class="spantextlistattr">-</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 pull pull-left">
							<div class="spantextlistattr">Nama Bumdes</div>
						</div>
						<div class="col-md-6 pull pull-right">
							<div id="info_namabumdes" class="spantextlistattr">-</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 pull pull-left">
							<div class="spantextlistattr">No. Telp</div>
						</div>
						<div class="col-md-6 pull pull-right">
							<div id="info_telp" class="spantextlistattr">-</div>
						</div>
					</div>
				</div>
				
				<div class="spantextatribute">
					<div style="margin-bottom:5px;">
						<span class="number">2</span> Informasi Pelaksanaan :
					</div>
					<div class="row">
						<div class="col-md-6 pull pull-left">
							<div class="spantextlistattr">Jumlah Orang</div>
						</div>
						<div class="col-md-6 pull pull-right">
							<div id="info_jmlpeserta" style="float:left;margin-right:5px;padding-top:3px;" class="spantextlistattr">1</div> 
							<span>Orang</span>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 pull pull-left">
							<div class="spantextlistattr">Lama Pelatihan </div>
						</div>
						<div class="col-md-6 pull pull-right">
							<div id="info_lamapelatihan" class="spantextlistattr">-</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 pull pull-left">
							<div class="spantextlistattr">Tanggal Mulai</div>
						</div>
						<div class="col-md-6 pull pull-right">
							<div id="tglmulaispan" class="spantextlistattr">-</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 pull pull-left">
							<div class="spantextlistattr">Tanggal Selesai</div>
						</div>
						<div class="col-md-6 pull pull-right">
							<div id="tglselesaispan" class="spantextlistattr">-</div>
						</div>
					</div>
				</div>

				<div class="spantextatribute">
					<div style="margin-bottom:5px;">
						<span class="number">3</span> Informasi Pelatihan :
					</div>
					<div class="row">
						<div class="col-md-6 pull pull-left">
							<div class="spantextlistattr">Kategori Instansi</div>
						</div>
						<div class="col-md-6 pull pull-right">
							<div id="info_instansi" class="spantextlistattr">-</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 pull pull-left">
							<div class="spantextlistattr">Produk </div>
						</div>
						<div class="col-md-6 pull pull-right">
							<div id="info_produk" class="spantextlistattr">-</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 pull pull-left">
							<div class="spantextlistattr">Tema Pelatihan</div>
						</div>
						<div class="col-md-6 pull pull-right">
							<div id="info_tema" class="spantextlistattr">-</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 pull pull-left">
							<div class="spantextlistattr">Program Pelatihan</div>
						</div>
						<div class="col-md-6 pull pull-right">
							<div id="info_program" class="spantextlistattr">-</div>
						</div>
					</div>
				</div>
				
				
				
				<div class="spantextatribute">
					<div style="margin-bottom:5px;">
						<span class="number">4</span> Fasilitas Tambahan :
					</div>
					<div class="row" id="addonfasilitas">
						
					</div>
				</div>
				
				<div class="pricebox">
					<div class="row">
						<div class="col-md-6 pull pull-left">
							<span class="">Total Biaya</span>
						</div>
						<div class="col-md-6 pull pull-right">
							<span class="totalspan">
								<div id="duit"><small>Rp.</small>0.00,-</div>
							</span>
						</div>
					</div>
				</div>
				
				<div class="boxbtnfinish">
					<div class="row">
						<div class="col-md-6">
							<button onclick="simpandata()" style="width:100%;" type="button" class="btn btn-success">
								<span style="color:#fff;" class="glyphicon glyphicon-save"></span>
								Simpan Data
							</button>
						</div>
						<div class="col-md-6">
							<button style="width:100%" onclick="ubahdata()" type="button" class="btn btn-warning">
								<span style="color:#fff;" class="glyphicon glyphicon-pencil"></span>
								Ubah Data
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="boxloading" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Laporan RBA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="modalharga" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Table RAB</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="boxinvoice">
				<div class="kopinvoice">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-3">
								<span class="spantextinvoice">Tema</span> 
							</div>
							<div class="col-md-1">
								<span>:</span>
							</div>
							<div class="col-md-7">
								<span id="info2_tema" class="spantextinvoice"></span> 
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<span class="spantextinvoice">Program</span> 
							</div>
							<div class="col-md-1">
								<span>:</span>
							</div>
							<div class="col-md-7">
								<span id="info2_program" class="spantextinvoice"></span> 
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<span class="spantextinvoice">Jumlah peserta</span> 
							</div>
							<div class="col-md-1">
								<span>:</span>
							</div>
							<div class="col-md-7">
								<span id="info2_jmlpeserta" class="spantextinvoice"></span> 
								<span>Orang</span>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<span class="spantextinvoice">Jumlah Hari</span> 
							</div>
							<div class="col-md-1">
								:
							</div>
							<div class="col-md-7">
								<span id="info2_lamapelatihan" class="spantextinvoice"></span> 
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<span class="spantextinvoice">Periode  </span> 
							</div>
							<div class="col-md-1">
								<span>:</span>
							</div>
							<div class="col-md-7">
								<span class="spantextinvoice">Sistem pemesanan</span> 
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-3">
								<span class="spantextinvoice">Bumdes </span> 
							</div>
							<div class="col-md-1">
								<span>:</span>
							</div>
							<div class="col-md-7">
								<span  id="info2_namabumdes" class="spantextinvoice"> </span> 
								
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<span class="spantextinvoice">Kabupaten</span> 
							</div>
							<div class="col-md-1">
								<span>:</span>
							</div>
							<div class="col-md-7">
								<span class="spantextinvoice">Sleman, Yogyakarta</span> 
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<span class="spantextinvoice">Pusat  </span> 
							</div>
							<div class="col-md-1">
								<span>:</span>
							</div>
							<div class="col-md-7">
								<span class="spantextinvoice">Yogyakarta</span> 
							</div>
						</div>
					</div>
				</div>
				<div style="clear:both;"></div>
					<div class="bodyinvoice">
						<div class="bodyoverflow">
							<table id="tblinvoice" class="table table-bordered" style="width:84% !important;">
								<tr>
									<th style="vertical-align:middle;" rowspan="2">No</th>
									<th style="vertical-align:middle;" rowspan="2">Rincian Keterangan</th>
									<th style="vertical-align:middle;" rowspan="2">Orang</th>
									<th style="vertical-align:middle;" rowspan="2">Hari</th>
									<th style="vertical-align:middle;" rowspan="2">Volume</th>
									<th style="vertical-align:middle;" rowspan="2">Satuan</th>
									<th style="vertical-align:middle;" colspan="1">Harga Satuan (Rp.)</th>
									<th style="vertical-align:middle;" colspan="1">Jumlah (Rp.)</th>
								</tr>
								
								
								<tbody id="tableins">
									<tr style="background:#2091c9;">
										<td></td>
										<td colspan="18" style="text-align:left;color:#fff;">Table Masih Kosong, Anda Belum Memilih Paket</td>
									</tr>
								</tbody>
							</table>
						</div>
						<div class="foot-note">
							<ul class="unlist" >
								<li>
									<div>
										
										<span style="font-size:12px; color:#f75400; letter-spacing:0px !important;"><strong>*Note:</strong> Harga yang tertera dari RAB diatas belum termasuk harga tambahan yang dipilih</span>
									</div>
								</li>
								
							</ul>
						</div>
					</div>
				<div style="clear:both;"></div>
			</div>
      <div class="modal-footer">
        <button onclick="simpandata(this)" value="1" type="button" class="btn btn-success">Setuju</button>
        <button onclick="simpandata(this)" value="2" type="button" class="btn btn-danger">Nego</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
      </div>
    </div>
  </div>
</div>

<?php
function tanggal_sekarang($time=FALSE)
{
    date_default_timezone_set('Asia/Jakarta');
    $str_format='';
    if($time==FALSE)
    {
        $str_format= date("Y-m-d");
    }else{
        $str_format= date("Y-m-d H:i:s");
    }
    return $str_format;
}
?>

<script type="text/javascript">
	
	var   diffDays;

	$(document).ready(function(){

		 var kalender = <?php echo json_encode($kalender); ?>;
		var nowTemp = new Date();
		var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
    		 console.log(kalender.call);
		
		var checkin = $('#tglmulai').datepicker({
		  "format" : "dd-mm-yyyy",
		  onRender: function(date) {
			return date.valueOf() < now.valueOf() ? 'disabled' : '';
		  }
		}).on('changeDate', function(ev) {
		  if (ev.date.valueOf() > checkout.date.valueOf()) {
			var newDate = new Date(ev.date)
			newDate.setDate(newDate.getDate() + 3);
			checkout.setValue(newDate);
		  }
		  checkin.hide();
		  $('#tglselesai')[0].focus();
		}).data('datepicker');
		
		var checkout = $('#tglselesai').datepicker({
		  "format" : "dd-mm-yyyy",
		  onRender: function(date) {
			return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
		  }
		}).on('changeDate', function(ev) {
		  checkout.hide();
		  getLamaHari(ev);
		}).data('datepicker');

			$("#show-me").hide();
			$("#show-lainnya").hide();
			$("#show-prog").hide();
	 
	 		getKab()
	 		{
	 			var v = $("#kabs option:selected").val();
	 			console.log(v);
	 			var target = "<?php echo site_url("user/getKab")?>";
	 			data = {
	 				kodeprop : v
	 			}
			
		$("select[name='kota']").html("");
			
		$.post(target, data, function(e){
			
			var json = $.parseJSON(e);
			
			$.each(json.kabupaten, function(i, v){
				//console.log(v.kodekabupaten);
				
				$("select[name='kota']").append("<option value='"+v.kodekabupaten+"'>"+v.namakabupaten+"</option>");
			});
			
		});

	 		}

			gettable();
			gettambahan();
			getValueRadio();
			getValueByAttr()
			{
				var a = document.getElementById("namabumdes").value;
				var x = document.getElementById("nama").value;
				var telp = document.getElementById("telpz").value;
				$("#info_namabumdes").html(a);
				$("#info2_namabumdes").html(a);
				$("#info_nama").html(x);
				$("#info_telp").html(telp);
			
			}

     var initialLocaleCode = 'id';
     $('#calendar').fullCalendar({
       header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month'
        /*,agendaWeek,agendaDay,listWeek'*/
    },
    defaultDate: '<?=tanggal_sekarang();?>',
    locale: initialLocaleCode,
			navLinks: true, // can click day/week names to navigate views
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: 
            kalender.call,
            eventRender: function(event, element) {
              $(element).tooltip({title: event.title});             
          }

      });


	});
	
	$('#tugel').click(function () {
    //check if checkbox is checked
    if ($(this).is(':checked')) {
        
        $('#disbutt').removeAttr('disabled'); //enable input
        
    } else {
        $('#disbutt').attr('disabled', true); //disable input
    }
});

	function getLamaHari(obj)
	{
		
		
		var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
		
		var firstDate = $("#tglmulai").val();
			firstDate = firstDate.split("-");
			firstday	  = firstDate[0];
			firstmonth	  = firstDate[1];
			firstyear	  = firstDate[2];
			
		var firstTgl = firstmonth+"/"+firstday+"/"+firstyear;
			firstTgl = new Date(firstTgl);
		
		
		var secondDate = $("#tglselesai").val();
			secondDate = secondDate.split("-");
			secondday	  = secondDate[0];
			secondmonth	  = secondDate[1];
			secondyear	  = secondDate[2];
		
		var secondDate = secondmonth+"/"+secondday+"/"+secondyear;
			secondTgl = new Date(secondDate);
			
		var diffDays = Math.round(Math.round((secondTgl.getTime() - firstTgl.getTime()) / (oneDay)));
		$("#info_lamapelatihan").text(diffDays+" Hari");
		$("#info2_lamapelatihan").text(diffDays+" Hari");
		$("#info3_lamapelatihan").text(diffDays+" Hari");
		
		var days = ["Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu"];
		
		var textFirstSpan = days[firstTgl.getDay()]+" ,"+ $("#tglmulai").val();
		var textSecondSpan = days[secondTgl.getDay()]+" ,"+ $("#tglselesai").val();
		
		$("#tglmulaispan").text(textFirstSpan);
		$("#tglselesaispan").text(textSecondSpan);
		
		//console.log(days[firstTgl.getDay()]);
	}
	
	function ubahdata()
	{
		$(".backdropOverlay").remove();
		
		$(".rightbox").css({
			"position" : "inherit",
			"z-index" : "0",
			"border"	: "0px dotted #f75400",
			"width"		: "100%",
			"margin-top" : "0"
		});
		
		$(".boxbtnfinish").css({
			"display" : "none"
		});
	}
	
	function simpandata(obj)
	{
		 var x = $(obj).val();
		  $('#you').val(x);

		console.log(x);


		$("button").prop("disabled","disabled");
		
		var target = "<?php echo site_url("user/booking")?>";
			data = $("#myForm").serialize()+ x;
			
		$.post(target, data, function(e){
			/*console.log(e);
			return false;*/
			var json = $.parseJSON(e);
			
			//window.location = "<?php echo site_url("user/invoice")?>?msn="+json.msn;
			window.location = "<?php echo site_url("user/congrat")?>?msn="+json.msn;
		});
	}
	
	function showmodalharga()
	{
		$("#modalharga").modal("show");
	}


	function cetakRAB()
	{
		var checks = $("input[name='term']").is(":checked");
		
		if(!checks)
		{
			$("#boxloading").modal("show");
			
			return false;
		}
		
		$(".banner-main").prepend("<div class='backdropOverlay'></div>");
		
		$(".rightbox").css({
			"position" : "fixed",
			"z-index" : "99999",
			"border"	: "2px dotted #f75400",
			"width"		: "24%",
			"margin-top" : "-2%"
		});
		
		$(".boxbtnfinish").css({
			"display" : "block"
		});
		
	}
	
	function getValueByAttr(obj)
	{
		var attribute = $(obj).attr("name");
			x = $(obj).val();
		
		$("#info_"+attribute).text(x);
		$("#info2_"+attribute).text(x);
		$("#info3_"+attribute).text(x);
	}
	
	function getValueRadio(obj)
	{
		var kategori = $("input[name='instansi']:checked").val();
		kategori = (kategori==undefined)?'0#0': kategori
		var produk = $("input[name='produk']:checked").val();
		produk = (produk==undefined)?'0#0': produk
		var tema = $("input[name='tema']:checked").val();
		tema = (tema==undefined)?'0#0': tema
		var program = $("input[name='program']:checked").val();
		program = (program==undefined)?'0#0': program
		
		produk = produk.split("#");
		tema = tema.split("#");
		program = program.split("#");
		kategori = kategori.split("#");
	
		one	  = produk[1];
		two	  = tema[1];
		three = program[1];
		kategori = kategori[1];

		
	
		var four = (eval(one)+eval(two)+eval(three)+eval(kategori))*$("input[name='jmlpeserta']").val();
		var fournominal = format1(four, ""); 
		
		document.getElementById("duit").innerHTML ='Rp'+' '+fournominal



		var attribute = $(obj).attr("name");
			textObj = $(obj).parent().text();
			
			x = $(obj).val();
			
		$("#info_"+attribute).text(textObj);
		$("#info2_"+attribute).text(textObj);
		$("#info3_"+attribute).text(textObj);
		$("#info4_"+attribute).text(textObj);
		
	}

	/*$("input[name='produk']").click(function () {
		$('#show-me').css('display', ($(this).val() === '1' )||($(this).val() === '3' )  ? 'block':'none');
	});
	*/
	function addon(obj)
	{


	
		var selected = $(obj).is(":checked");
		var idx = $(obj).val();
		var idsplit = idx.split('#');
	
	
		if(selected)
		{
			var text = $(obj).parent().text();
			var row = "<div id='addon_fasilitas_"+idsplit[0]+"' class='col-md-6 pull pull-left'><div class='spantextlistattr'><span style='color:#8bc34a' class='glyphicon glyphicon-ok'></span> "+text+"</div></div>";
			$("#addonfasilitas").append(row);
			addrowtableaddon(obj);
		}
		else
		{
			$("#addon_fasilitas_"+idsplit[0]).remove();
			deleteRow(idsplit[0]);
		}
	}


	function deleteRow(obj)
	{
		var table = $('#tableins').find('tr');
		$.each(table,function(i,v){
			var td = $(this).find('td:eq(0)').find('input[value="'+obj+'"]');
			$(td).parent().parent().remove();
		});
	}


	function addrowtableaddon(obj) 
	{
		var selected = $(obj).is(":checked");
		var idx = $(obj).val();
		var idsplit = idx.split('#');
		var text = $(obj).parent().text();
		var target = "<?php echo site_url('personil/gethargaadd'); ?>";
		var kode = $('input[name="instansi"]:checked').val();
		var data = {
				id : idx,
				kode : kode
		}

		$.post(target,data,function(e){

			console.log(e);

			var json = $.parseJSON(e);
			var id_personil = json.id_personil;
			var keterangan = json.keterangan;
			var satuan = json.satuan;
			var harga = json.harga;
			var Seq = eval(i) + eval(1);
			var people = $("input[name='jmlpeserta']").val();
			var lamane = $("#info_lamapelatihan").text(); 

			var table = document.getElementById('tableins');
			var rowbody = table.insertRow();
			var Seq = '<input type="hidden" name="idp" value="'+id_personil+'">  ';
			var colbody0 = rowbody.insertCell(0);  
			var colbody1 = rowbody.insertCell(1);  
			var colbody2 = rowbody.insertCell(2);  
			var colbody3 = rowbody.insertCell(3);  
			var colbody4 = rowbody.insertCell(4);  
			var colbody5 = rowbody.insertCell(5);  
			var colbody6 = rowbody.insertCell(6);  
			var colbody7 = rowbody.insertCell(7);  

			colbody0.className = 'count';
			colbody0.innerHTML = Seq; 
			colbody1.innerHTML = keterangan; 
			colbody2.innerHTML = people;
			colbody3.innerHTML = lamane; 
			colbody4.innerHTML = people; 
			colbody5.innerHTML = satuan; 
			colbody6.innerHTML = harga; 
			colbody7.innerHTML = ''; 
		});



		//console.log(text);
	}


	function format1(n, currency) {
    return currency + " " + n.toFixed(2).replace(/./g, function(c, i, a) {
        return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
    });
}

function show1()
{
	  $("#show-me").hide( "slow");
	   $("#show-lainnya").hide( "slow");
	  $("#comment").val('');
	  $("#lainnya").val('');
}
function show2()
{
	  $("#show-me").hide( "slow");
	   $("#show-lainnya").hide( "slow");
	  $("#comment").val('');
	  $("#lainnya").val('');
}
function show3()
{
	  $("#show-me").show( "slow");
	  $("#show-lainnya").hide( "slow");
	  $("#lainnya").val('');
}
function show4()
{
	  $("#comment").val('');
	  $("#show-me").hide("slow");
	  $("#show-lainnya").show( "slow");
}

function gettambahan(obj)
{

	var idx = $(obj).val();
	

	var target = "<?php echo base_url("personil/gettambahan") ?>"
	data = {
    		nilai : idx
    	}
    	$.post(target, data, function(e){
    		console.log(e);

    		$("#getadditional").html(e);
    	});
}

	function gettable(obj)
	{
		var attribute = $(obj).attr("name");
			textObj = $(obj).parent().text();
			
			x = $(obj).val();

		
		var target = "<?php echo base_url("personil/changes") ?>";
		var data = {
			id : x
		}

		$.post(target, data, function(e)
		{
			var json = $.parseJSON(e);
			//console.log(json);

			changetab(json);
		});
	}

	function getvaldate(obj)
	{

		var date = document.getElementById("tglmulai").value;
		var date2 = document.getElementById("tglselesai").value;
	
		var target = "<?php echo base_url("personil/gettanggal") ?>"
		var data = {
			 date : date
		}
		$.post(target, data,function(e){
			var json = $.parseJSON(e);

			//$('#notif').html();
			/*console.log(date);
			console.log(date2);*/
			//console.log(diffDays);
			//console.log(json.notif);
		});


			}

	function changetab(json) 
	{

		var oneDay = 24*60*60*1000; // hours*minutes*seconds*milliseconds
		
		var firstDate = $("#tglmulai").val();
			firstDate = firstDate.split("-");
			firstday	  = firstDate[0];
			firstmonth	  = firstDate[1];
			firstyear	  = firstDate[2];
			
		var firstTgl = firstmonth+"/"+firstday+"/"+firstyear;
			firstTgl = new Date(firstTgl);
		
		
		var secondDate = $("#tglselesai").val();
			secondDate = secondDate.split("-");
			secondday	  = secondDate[0];
			secondmonth	  = secondDate[1];
			secondyear	  = secondDate[2];
		
		var secondDate = secondmonth+"/"+secondday+"/"+secondyear;
			secondTgl = new Date(secondDate);
			
		var diffDays = Math.round(Math.round((secondTgl.getTime() - firstTgl.getTime()) / (oneDay)));

		var table = document.getElementById("tableins");
		
		table.innerHTML = '';
		
		

		for(i = 0; i < json.header.length; i++)
		{
			var row = table.insertRow();


			var jenis = json.header[i].jenis;
			var id_jenis = json.header[i].id_jenis;
		

			var Col0 	= row.insertCell(0);
			var Col1 	= row.insertCell(1);

			Col1.colSpan = 7;
			Col1.style.background='#2091c9';
			Col0.style.background='#2091c9';
			Col1.style.color='white';

			Col0.innerHTML = '';
			Col1.innerHTML = '<input type="hidden" value="'+id_jenis+'">'+ jenis;
			Col1.className  = 'mid';

			//tablebody

			for(x = 0; x < json.body[i].length; x++)
			{
			var sesi = eval(4);
			var rowbody = table.insertRow();
			var Seq = eval(x) + eval(1);
			var Seq2 = eval(i) + eval(1);
			var colbody0 = rowbody.insertCell(0);  
			var colbody1 = rowbody.insertCell(1);  
			var colbody2 = rowbody.insertCell(2);  
			var colbody3 = rowbody.insertCell(3);  
			var colbody4 = rowbody.insertCell(4);  
			var colbody5 = rowbody.insertCell(5);  
			var colbody6 = rowbody.insertCell(6);  
			var colbody7 = rowbody.insertCell(7);  

		/*	colbody6.style.background='#ffbf61';
			colbody7.style.background='#8cf749';	*/

			var vol = eval(diffDays)*sesi;
			var jenis = json.body[i][x].jenis;
			var id_personil = json.body[i][x].id_personil;
			var keterangan = json.body[i][x].keterangan;
			var satuan = json.body[i][x].satuan;
			var duit = json.body[i][x].duit;
			var duitHit = json.body[i][x].duittot;
			var duittotal = json.body[i][x].duittot*vol;
			var people = $("input[name='jmlpeserta']").val();
			var lamane = $("#info_lamapelatihan").text(); 
			
			if (id_personil == 1) {
				var orang = '';
				var hari = '';
				var volum = vol;
				var summoney = volum*duitHit;
			} else if (id_personil == 2) {
				var orang = '';
				var hari = '';
				var volum = 1;
				var summoney = volum*duitHit;
			} else if (id_personil == 3) {
				var orang = '';
				var hari = '';
				var volum = 2;
				var summoney = volum*duitHit;
			}else {
				var orang = people;
				var volum = people;
				var hari = lamane;
				var summoney = volum*duitHit;
			}


			colbody0.innerHTML = Seq; 
			colbody1.innerHTML = keterangan; 
			colbody2.innerHTML = orang;
			colbody3.innerHTML = hari; 
			colbody4.innerHTML = volum; 
			colbody5.innerHTML = satuan; 
			colbody6.innerHTML = duit; 
			colbody7.innerHTML = format1(summoney, ""); 
			}
		}

			var row = table.insertRow();


			var jenis = 'Tambahan';
			
			var Col0 	= row.insertCell(0);
			var Col1 	= row.insertCell(1);

			Col1.colSpan = 7;
			Col1.style.background='#2091c9';
			Col0.style.background='#2091c9';
			Col1.style.color='white';

			Col0.innerHTML = '';
			Col1.innerHTML = jenis;
			Col1.className  = 'mid';

	}

	function openthedor(obj) 
	{
		var nilai = $("input[name='program']:checked").val();
		nilai = (nilai==undefined)?'0#0': nilai
		//console.log(nilai);

		nilaisplit = nilai.split("#");
	
		nilaisplit = nilaisplit[0];
		console.log(nilaisplit);
		if (nilaisplit == 1 ) {
			$("#show-prog").show("slow");
			
		}else{
			$("#show-prog").hide("slow");
			 $("#alamat_peserta").val('');
		}

	}



	function getKab(obj)
	{
		var target = "<?php echo site_url("user/getKab")?>";
			data = {
				kodeprop : $(obj).val()
			}
			
		$("select[name='kota']").html("");
			
		$.post(target, data, function(e){
			
			var json = $.parseJSON(e);
			
			$.each(json.kabupaten, function(i, v){
				//console.log(v.kodekabupaten);
				
				$("select[name='kota']").append("<option value='"+v.kodekabupaten+"'>"+v.namakabupaten+"</option>");
			});
			
		});
	}


</script>