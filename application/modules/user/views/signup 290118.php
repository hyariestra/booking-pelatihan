<style type="text/css">
@import "font-awesome.min.css";
@import "font-awesome-ie7.min.css";




/* Custom page header */
.header {
  border-bottom: 1px solid #e5e5e5;
}
.invalid {
    color: red;
}
	.backDropOverlay {
			font-size:10px;
			position: absolute;
			top: 0px;
			height: 100px;
			z-index: 500;
			border: 1px solid black;
			background-color: black;
			width: 100%;
			height: 2000px;
			opacity: 0.6;
			text-align: center;
		}
		.backDropOverlay > div {
			margin: 20% auto;
			font-weight: bold;
			font-size: 1.6em;
			background-color: white;
			width: 145px;
			padding: 5px;
			border-radius: 3px;
			moz-border-radius: 3px;
			webkit-border-radius: 3px;
			o-border-radius: 3px;
		}
		.backDropOverlay > div > span {
			margin-left: 10px;
		}
		.backDropOverlay > div > img {
			width: 30px;
			height: 30px;
		}

.invalid:before {
    position: relative;
    left: -3px;
    content: "✖";
}
.valid {
    color: green;
}

.valid:before {
    position: relative;
    left: -3px;
    content: "✔";
}


/* Make the masthead heading the same height as the navigation */
.header h3 {
  padding-bottom: 19px;
  margin-top: 0;
  margin-bottom: 0;
  line-height: 40px;
}

.container-narrow > hr {
  margin: 30px 0;
}

/* Main marketing message and sign up button */
.jumbotron {
  text-align: center;
  border-bottom: 1px solid #e5e5e5;
}
.jumbotron .btn {
  padding: 14px 24px;
  font-size: 21px;
}

/* Supporting marketing content */
.marketing {
  margin: 40px 0;
}
.marketing p + h4 {
  margin-top: 28px;
}
label{
	color: #523333;
}


</style>
<div class="container">
	<br>
    <h1 class="well">Halaman Pendaftaran</h1>
    	<div style="margin-bottom: 10px;" id="notif" class="col-md-12"></div>
  	<div class="col-lg-12 well">
	<div class="row">
					<form id="myForm" role="form" data-toggle="validator" accept-charset="utf-8">
					<div class="col-sm-12">
						<div class="row">
							
							<div class="col-sm-6 form-group">
								<label>Nama Lengkap</label>
								<input id="nama_person" name="nama_person" type="text" placeholder="isikan nama anda.." class="form-control">
								<span style="font-size: 12px;"><i>*Nama Lengkap Wajib Diisi</i></span>
							</div>

							<div class="col-sm-6 form-group">
								<label>Nama Instansi</label>
								<input id="nama" name="nama" type="text" placeholder="isikan nama instansi anda.." class="form-control">
							</div>

							<div class="col-sm-12 form-group">
								<label>Username</label>
								<input id="username" name="username" type="text" placeholder="isikan username anda.." class="form-control">
								<span style="font-size: 12px;"><i>*Username Wajib Diisi, digunakan Untuk Login</i></span>
							</div>
							
						</div>	
						<div class="form-group">
							<label>Alamat</label>
							<textarea name="alamat_pribadi" placeholder="isikan alamat pribadi anda.." rows="3" class="form-control"></textarea>
						</div>				
						<div class="row">
									<div class="col-md-6">
										<span class="spanlabel"><span style="color:red;font-weight:bold;"><label>Provinsi</label>
										<div id="form-step-0" role="form" data-toggle="validator">
											<div class="form-group">
												<select style="font-weight: 300!important" name="propinsi" onchange="getKab(this)" class="form-control">
													<option  value="">:: Silahkan Pilih Provinsi ::</option>
													<?php
														foreach($propinsi->result() as $prop)
														{
													?>
														<option value="<?php echo $prop->kode_propinsi?>"><?php echo $prop->nama_propinsi?></option>
													<?php
														}
													?>
												</select>
												<span style="font-weight: 300;color: black; font-size: 12px;"><i>*Provinsi Wajib Diisi sesuai provinsi intansi</i></span>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<span class="spanlabel"><span style="color:red;font-weight:bold;"><label>Kota</label>
										<div id="form-step-0" role="form" data-toggle="validator">
											<div class="form-group">
												<select style="font-weight: 300 !important" name="kota" class="form-control">
													<option value="">:: Silahkan Pilih Kota ::</option>
												</select>
												<span style="font-weight: 300; color: black; font-size: 12px;"><i>*Kota Wajib Diisi sesuai kota intansi</i></span>
											</div>
										</div>
									</div>
								</div>

						<div class="form-group">
							<label>Alamat Instansi</label>
							<textarea name="alamat" placeholder="isikan alamat instansi anda.." rows="3" class="form-control"></textarea>
						</div>	
					<div class="row">	
					<div class="col-sm-6 form-group">
						<label>Nomor Telepon</label>
						<input id="telp" type="text" name="telp" placeholder="Masukan Nomor Telepon Anda.." class="form-control">
						<span style="font-size: 12px;"><i>*Nomor Telepon Wajib Diisi</i></span>
					</div>		
					<div class="col-sm-6 form-group">
						<label>Alamat Email</label>
						<input name="email" type="text" placeholder="Masukan Alamat Email Anda.. " class="form-control">
						<span style="font-size: 12px;"><i>*Alamat Email digunakan Untuk Login</i></span>
					</div>	
				</div>

					<div class="row">
						
						<div class="col-sm-6 form-group">
							<label>Password</label>
							<input name="password" placeholder="Masukan Password Anda.." name="password" id="password" type="password" class="form-control"  onkeyup='check();' />
						</div>
						<div class="col-sm-6 form-group">
							<label>Konfirmasi Password</label>
							 <input placeholder="Masukan Ulang Password Anda.." type="password" name="" id="confirm_password"  onkeyup='check();' class="form-control" /> 
						</div>
						 
					</div>
					<div class="row">
						<div class="col-sm-6">
							 <span id='message'></span>
						</div>
					</div>
					<br>
					<button style="border-radius: 0px; font-size: 13px;" onclick="simpandata(this)" disabled="" id="disbutt" type="button" class="btn btn-lg btn-info">Simpan Data</button>					
					</div>
				</form> 
				</div>
	</div>
	</div>

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

	function simpandata(obj)
	{

		//$("button").prop("disabled","disabled");
		
		var target = "<?php echo site_url("user/simpandatapendaftaran")?>";
			data = $("#myForm").serialize();

			if($('#nama').val() == '' || $('#username').val() == '' || $('#telp').val() == '' )
			{
				alert('masih ada data yang kosong');
				return false;
			}


			
				$("body").append("<div style='position:fixed !important;' class='backDropOverlay' id='backDropOverlay'><div><img src='<?php echo base_url('assets/images/loading.gif') ?>'/><span>Loading..</span></div></div>");

		$.post(target, data, function(e){
			
			var json = $.parseJSON(e);

			if(json.flag)
  	 		{
  	 			
  	 			$("#myForm")[0].reset();
  	 			$("#myForm").remove();
  	 			$(".well").remove();
  	 			  $(window).scrollTop(0);

  	 		}
  	 		else
  	 		{
  	 			  $(window).scrollTop(0);
  	 		}


		$('#notif').html(json.notif);
		$("#backDropOverlay").remove();
			
		});
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