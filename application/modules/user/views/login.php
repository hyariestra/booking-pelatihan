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

			if($('#nama').val() == '')
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

	</script>