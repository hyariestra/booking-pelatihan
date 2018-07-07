<style type="text/css">

@import "font-awesome.min.css";

@import "font-awesome-ie7.min.css";


.radio label
{
	font-size: 14px;
}


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

.landingpage{
	position:relative;
    background-image: url(../assets/images/bgtop.jpg);
	height:850px;
	width:100%;
}

.backover{
	background:#31a2dac7;
	height:100%;
	width:100%;
	position:absolute;
	z-index:9;
}


.boxlogin{
	top: 10%;
	border-radius:5px;
    position: absolute;
    z-index: 99;
    width: 70%;
	padding:10px 0px;
    border: 1px solid #fff;
    left: 14%;
	background:#fff;
	box-shadow:2px 2px 15px #000;
}


.form-group{
	position:relative; 
	padding:0px 10px;
	margin-bottom:10px;
}

.notifyspanlabel{
	position: absolute;
    background: #2091c9;
    color: #fff;
    top: 1px;
    padding: 4px 10px;
    font-size: 14px;
    right: 0px;
}

.form-control{
	height:30px;
}

.arrow-left {
    width: 0;
    height: 0;
    border-top: 15px solid transparent;
    border-bottom: 15px solid transparent;
    border-right: 15px solid #2091c9;
    position: absolute;
    left: -15px;
    top: -1px;
}

.spanrequired{
	font-size:12px;
	color:#333;
}

.headerlogin{
	text-align:center;
	margin-bottom:25px;
	font-size:14px;
	color:#555;
	padding-bottom:5px;
	border-bottom:1px dashed #f75400;
}

.headerlabel{
    font-size: 15px;
    color: #fff;
	padding:5px;
	background:#f75400;
}
.btn-orange{
	background:#f75400;
	color:#fff;
}

.btn-orange:hover{
	background:#2091c9;
	color:#fff;
}
</style>

<div class="containers">
	<div class="landingpage">
		<div class="backover"></div>
		<div class="boxlogin">
			<div id="notif"></div>
			<form id="myForm" class="form-horizontal">
				
				<div class="col-md-12">
					<div style="width:50%; border-bottom:1px dashed #555; padding-bottom:10px; font-size:14px; margin-bottom:15px;"><i>Silahkan masukan informasi data instansi anda dengan lengkap agar mempermudah dalam membaca informasi instansi</i></div>
					<div style="margin-bottom:10px;">
						<span class="headerlabel">1. Informasi Instansi Anda</span>
					</div>
					<div class="row">
						<div class="col-md-6 boxleft">
							
							<div class="form-group">
								<input type="text" id="nama_person" name="nama_person" class="form-control" />
								<span class="notifyspanlabel"><div class="arrow-left"></div> Nama Lengkap</span>
								<span class="spanrequired"><i>*Nama Lengkap Wajib Diisi</i></span>
							</div>
							<div class="form-group">
								<input type="text" name="alamat" class="form-control" />
								<span class="notifyspanlabel"><div class="arrow-left"></div> Alamat Instansi</span>
							</div>

						</div>
						<div class="col-md-6 boxright">
							
							<div class="form-group">
								<input type="text" id="jabatan" name="jabatan" class="form-control" />
								<span class="notifyspanlabel"><div class="arrow-left"></div> Jabatan</span>
								<span style="visibility: hidden;" class="spanrequired"><i>*Nama Lengkap Wajib Diisi</i></span>
							</div>
							<div class="form-group">
								<input type="text" id="nama" name="nama" class="form-control" />
								<span class="notifyspanlabel"><div class="arrow-left"></div> Nama Instansi</span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 boxleft">
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
								<span class="spanrequired"><i>*Provinsi Wajib Diisi sesuai provinsi intansi</i></span>
							</div>
						
						</div>
						<div class="col-md-6 boxright">
							<div class="form-group">
								<select style="font-weight: 300 !important" name="kota" class="form-control">

									<option value="">:: Silahkan Pilih Kota ::</option>

								</select>
								<span class="spanrequired"><i>*Kota Wajib Diisi sesuai kota intansi</i></span>
							</div>
						</div>
					</div>
					<div class="row">
						
						
						<div class="col-md-6 boxright">
							<div class="form-group">
								<input type="text"  name="alamat_pribadi" class="form-control" />
								<span class="notifyspanlabel"><div class="arrow-left"></div> Alamat Pribadi</span>
								<span class="spanrequired"><i>*Diisi Alamat Pribadi anda</i></span>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6 boxleft">
							<div class="form-group">
								<input type="text" name="email" class="form-control" />
								<span class="notifyspanlabel"><div class="arrow-left"></div> Alamat Email</span>
								<span class="spanrequired"><i>*Email Wajib Diisi</i></span>
							</div>
						
						</div>
						<div class="col-md-6 boxright">
							<div class="form-group">
								<input type="text" name="telp" id="telp" class="form-control" />
								<span class="notifyspanlabel"><div class="arrow-left"></div> Nomor HP (WA)</span>
								<span class="spanrequired"><i>*Nomor HP (WA) Wajib Diisi</i></span>
							</div>
						</div>
					</div>
					

					<div style="margin-bottom:10px;">
						<span class="headerlabel">2. Dari mana anda tau bumdes.id?</span>
					</div>

					<div class="row">
						<div class="col-md-6 boxleft">
							<div class="form-group">
								<div class="radio">
									<label><input type="radio" value="Google" name="optradio"> Google</label>
								</div>
								<div class="radio">
									<label><input type="radio" value="Facebook" name="optradio"> Facebook</label>
								</div>
								<div class="radio">
									<label><input type="radio" value="Youtube" name="optradio"> Youtube</label>
								</div>
								<div class="radio">
									<label><input type="radio" value="Media Online" onclick="openchoice1(this)" name="optradio"> Media Online</label>
									<input placeholder="sebutkan media online apa" style="margin-left: 20px;" type="text" id="idopen1" class="form-control" name="keterangan1">
								</div>
								<div class="radio">
									<label><input type="radio" value="Surat Kabar" onclick="openchoice2(this)" name="optradio">Surat Kabar</label>
									<input placeholder="sebutkan surat kabar apa" style="margin-left: 20px;" type="text" id="idopen2" class="form-control" name="keterangan2">
								</div>
								<div class="radio">
									<label><input type="radio" value="Dari Teman" name="optradio">Dari Teman</label>
								</div>
								<div class="radio">
									<label><input type="radio" value="Lain-lain" onclick="openchoice3(this)" name="optradio">Lain-lain</label>
									<input placeholder="sebutkan" style="margin-left: 20px;" type="text" id="idopen3" class="form-control" name="keterangan3">
								</div>

								
							</div>
						
						</div>
					</div>

					
					<div style="margin-bottom:10px;">
						<span class="headerlabel">2. Data User Akun</span>
					</div>
					
					<div class="row">
						<div class="col-md-6 boxleft">
							<div class="form-group">
								<input type="text" name="username" id="username" class="form-control" />
								<span class="notifyspanlabel"><div class="arrow-left"></div> Username</span>
								<span class="spanrequired"><i>*Username Tidak boleh mengandung spasi</i></span>
							</div>
						
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6 boxleft">
							<div class="form-group">
								<input type="text" name="password" id="password" class="form-control" />
								<span class="notifyspanlabel"><div class="arrow-left"></div> Password</span>
								<span class="spanrequired"><i>*password harus diisi untuk login akun</i></span>
							</div>
						
						</div>
						<div class="col-md-6 boxright">
							<div class="form-group">
								<input type="text" id="confirm_password" onkeyup="check()" class="form-control" />
								<span class="notifyspanlabel"><div class="arrow-left"></div> Konfirm password</span>
								<span class="spanrequired"><i>*Konfirm password harus sama dengan password yang anda buat.</i></span>
							</div>
						</div>
					</div>
					
					<hr>
					<div class="row">
						<div class="col-md-6 boxleft">
							<div class="spanrequired" style="color:red;">
							<b>Catatan:</b> 
							<div>1. Silahkan cek kembali inputan yang telah anda inputkan.</div>
							<div>2. Tanda berupa (*) adalah inputan yang harus diisi.</div>
							</div>
						
						</div>
						<div class="col-md-6 boxright">
							<button type="button" onclick="simpandata(this)" class="btn btn-sm btn-orange">
								<span style="color:#fff;" class="glyphicon glyphicon-save"></span>
								Simpan informasi data anda
							</button>
						</div>
					</div>
				</div>
			</form>
			<div style="clear:both;"></div>
		</div>
	</div>
</div>

<script type="text/javascript">

	$(document).ready(function(){
		$('#idopen1').hide();
		$('#idopen2').hide();
		$('#idopen3').hide();
	});


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

  function openchoice1(obj) 
  {
  	$('#idopen1').show("slow");
  	$('#idopen2').hide("slow");
	$('#idopen3').hide("slow");
  	$('#idopen1').val("");
 
  }

    function openchoice2(obj) 
  {
  	$('#idopen2').show("slow");
  	$('#idopen1').hide("slow");
  	$('#idopen3').hide("slow");
  	$('#idopen2').val("");
  
  }

    function openchoice3(obj) 
  {
  	$('#idopen3').show("slow");
  	$('#idopen2').hide("slow");
  	$('#idopen1').hide("slow");
  	$('#idopen3').val("");

  }

  $("input#username").on({
  keydown: function(e) {
    if (e.which === 32)
      return false;
  },
  change: function() {
    this.value = this.value.replace(/\s/g, "");
  }
});



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
