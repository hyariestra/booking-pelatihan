<style type="text/css">
#loading-img {
    background: url(http://preloaders.net/preloaders/360/Velocity.gif) center center no-repeat;
    height: 100%;
    z-index: 20;
}

.overlay {
    background: #e9e9e9;
    display: none;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    opacity: 0.5;
}
.invalid {
    color: red;
    font-size: 13px;
    font-family: sans-serif;
}
.invalid:before {
    position: relative;
    left: -3px;
    content: "✖";
}
.valid {
    color: green;
    font-size: 13px;
    font-family: sans-serif;
}

.valid:before {
    position: relative;
    left: -3px;
    content: "✔";
}


	.labelku{
		color: #333;
		font-size: 13px;
		font-family: sans-serif;
	}
	input.form-control
	{
		    border-radius: 0px !important;
		    width: 70% !important;
	}
	textarea.form-control
	{
		    border-radius: 0px !important;
		    width: 78% !important;
	}
	.btn-primary
	{
		border-radius: 0px;
	}
</style>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="col-md-3">
				<div style="background-color: white" class="menues">
					<ul class="nav nav-pills nav-stacked">
						<li class="active"><a data-toggle="tab" href="#menu1">Akun Saya</a></li>
						<li><a data-toggle="tab" href="#menu2">Ubah Password</a></li>
						<li><a data-toggle="tab" href="#menu3">Riwayat Pemesanan</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md-9">
				<div style="background-color: white;padding:15px 20px 20px 20px;" class="tab-content">
					<div id="menu1" class="tab-pane fade in active">
						<h3>Profilku</h3>
						<p>Profilku
						Kelola informasi profil Anda untuk mengontrol, melindungi dan mengamankan akun</p>
						<hr>
						
						<div id="notif"></div>
						<br>
						<div class="box">
							<form  id="ubahprofil" class="form-horizontal">
								<div class="form-group">
									<label for="inputEmail" class="labelku control-label col-xs-2">Nama Instansi </label>
									<div class="col-xs-10">
										<input readonly="" value="<?php echo $profil['nama_bumdes'] ?>" type="email" class="form-control" id="inputEmail" placeholder="Email">
									</div>
								</div>
								<div class="form-group">
									<label for="inputEmail" class="labelku control-label col-xs-2">Email</label>
									<div class="col-xs-10">
										<input value="<?php echo $profil['email']; ?>"  readonly="" type="email" class="form-control" id="inputEmail" placeholder="Email">
									</div>
								</div>
								<div class="form-group">
									<label  for="inputPassword" class="labelku control-label col-xs-2">Telepon</label>
									<div class="col-xs-10">
										<input name="telp" value="<?php echo $profil['telp']; ?>" type="text" class="form-control" id="telp" placeholder="Telepon">
									</div>
								</div>
								<div class="form-group">
										<label for="inputaddres" class="labelku control-label col-xs-2">Alamat Instansi</label>
									<div class="col-xs-9">
										<textarea name="alamat" rows="3" class="form-control" id="postalAddress" placeholder="alamat..." required><?php echo $profil['alamat'] ?></textarea>
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-xs-offset-2 col-xs-10">
										<button onclick="simpandata(this)" type="button" class="btn btn-primary">Simpan</button>
									</div>
								</div>
							</form>
						</div>

					</div>
					
					<div id="menu2" class="tab-pane fade">
						<h3>Ubah Password</h3>
						<p>Untuk keamanan akun Anda, mohon untuk tidak menyebarkan password Anda ke orang lain.</p>
						<hr>
						<div id="notifpass"></div>
						<div class="box">
							<form id="ubahpass" class="form-horizontal">
								
								<div class="form-group">
									<label for="inputEmail" class="labelku control-label col-xs-2">Password Baru</label>
									<div class="col-xs-10">
										<input onkeyup="check();" value="" type="password" name="new_pass" class="form-control" id="password" placeholder="Password Baru">
									</div>
								</div>
								<div class="form-group">
									<label for="inputPassword" class="labelku control-label col-xs-2">Konfirmasi Password</label>
									<div class="col-xs-10">
										<input onkeyup="check();" name="con_pass" value="" type="password" class="form-control" id="confirm_password" placeholder="Konfirmasi Password">
									</div>
								</div>
								<div class="form-group">
									<label for="inputPassword" class="labelku control-label col-xs-2"></label>
									<div class="col-xs-10">
										 <span id='message'></span>
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-xs-offset-2 col-xs-10">
										<button onclick="ubahpass()" disabled="" id="disbutt" type="button" class="btn btn-primary">Ubah Password</button>
									
									</div>
								</div>
							</form>
						</div>
					</div>
					<div id="menu3" class="tab-pane fade">
						<h3>Riwayat Pemesanan</h3>
						<table class="table">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Pemesan</th>
									<th>Tanggal Pemesanan</th>
									<th>Kategori Yang Dipilih</th>
									<th>Produk Yang Dipilih</th>
									<th>Tema Yang Dipilih</th>
									<th>Program Yang Dipilih</th>
									<th>Status Pemesanan</th>
									
								</tr>
							</thead>
							<tbody>
								<?php foreach ($riwayat as $key => $value) {  ?>
								<tr>
									<td><?php echo $key+=1; ?></td>
									<td><?php echo $value['nama_pemesan']; ?></td>
									<td><?php echo  date("d-m-Y", strtotime($value['tanggal_pesan'])); ?></td>
									<td><?php echo $value['det_instansi'] ?></td>
									<td><?php echo $value['det_produk'] ?></td>
									<td><?php echo $value['det_tema'] ?></td>
									<td><?php echo $value['det_program'] ?></td>
									<td><?php echo $value['proses'] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<br>

<script type="text/javascript">
	var check = function() {
			if (document.getElementById('password').value ==
				document.getElementById('confirm_password').value) {
				document.getElementById('message').style.color = 'green';
			document.getElementById('message').className = "valid";
			document.getElementById('message').style.fontWeight = 'bold';
			document.getElementById('message').innerHTML = 'Password Sesuai';
           $('#disbutt').removeAttr('disabled'); //enable input
       } else {
       	document.getElementById('message').style.color = 'red';
       	document.getElementById('message').style.fontWeight = 'bold';
       	document.getElementById('message').className = "invalid";
       	document.getElementById('message').innerHTML = 'Password Tidak Sesuai';
       	$('#disbutt').attr('disabled', true);

       }
   }
  function simpandata()
  {
     $(".overlay").show();
  	var target = "<?php echo base_url("user/ubahdatauser") ?>";
  	data = $("#ubahprofil").serialize();


  	$.post(target,data, function(e){

  		var json = $.parseJSON(e);

  		$("#notif").html(json.notif);
  		$(".overlay").html();

  	});

  }

  function ubahpass()
  {
  	var target = "<?php echo base_url("user/ubahpassword"); ?>"
  	data  = $("#ubahpass").serialize();
  	$.post(target,data, function(e){

  		var json = $.parseJSON(e);

  			if(json.flag)
  	 		{
  	 			
  	 			$("#ubahpass")[0].reset();
  	 		}
  	 		else
  	 		{
  	 			$("#ubahpass")[0].reset();
  	 		}


  		$("#notifpass").html(json.notif);
  		$("backDropOverlay").remove();

  	});
  }

</script>

