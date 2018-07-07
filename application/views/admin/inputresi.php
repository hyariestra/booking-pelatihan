<?php 

//jika belum/tidak ada pembayaran 

if (!$pembelian):



echo "<div class='alert alert-danger'>Belum ada pembayaran untuk pembelian ini</div>";

else:

?>

<div class="row">

	<div class="col-md-9">

		<div class="box">

			<div class="box-header">

				<h3 class="box-title">Input Resi dan Setting Status Pengiriman</h3>

			</div>

			<div class="box-body">
				<form id="azz" method="post" enctype="multipart/form-data">

					<input type="hidden" value="<?php echo $pembelian['id_pembelian'] ?>" name="idresi">
					<div class="form-group">

						<label>Status Pengiriman</label>

						<select onchange="selectstatus()" id="grup" class="form-control" name="resix">
							<?php if ($pembelian['status_pengiriman']=='Pending'): ?>
							<option selected value="Pending">Pending</option>
							<option >Dikirim</option>
							<?php endif ?>

							<?php if ($pembelian['status_pengiriman']=='Dikirim'): ?>
							<option>Pending</option>
							<option selected value="Dikirim">Dikirim</option>
							<?php endif ?>

						</select>

					</div>

					<div class="form-group">

						<label>Nomor Resi </label>

						<input value="<?php echo $pembelian['resi_pengiriman']; ?>" readonly type="text" id="resirubah" name="nomor_resi" class="form-control">

					</div>

					<div class="box-footer">

					<button type="button" class="btn btn-primary" onclick="ubah()">Save changes</button>

					</div>
				</form>
			</div>


		</div>

	</div>


</div>



<?php endif ?>

<script type="text/javascript">
	

$(document).ready(function(){

	
	
			var val = $("#grup").val();
		if(val == 'Dikirim')
		{
			$("#resirubah").attr('readonly', false);
		}
		
		
	});


	function selectstatus()
	{

		var val = $("#grup").val();
		if(val == 'Pending')
		{
			$("#resirubah").attr('readonly', true);
		}
		else if(val == 'Dikirim')
		{
			$("#resirubah").attr('readonly', false);
			$("#resirubah").attr("");
		}
			
	
	}

function ubah() {
	var target = "<?php echo site_url("admin/pembelian/resiubah")?>/";
		data = $("#azz").serialize();
			
			
	  	 	$.post(target,data,function(e){
	  	 		var js 	= $.parseJSON(e);
	  	 		//console.log(e);

	  	 		if(js.flag)
	  	 		{
	  	 			alert('Data Berhasil Diupdate..');
	  	 		}
	  	 		else
	  	 		{
	  	 			alert('gagal :(' );
	  	 		}
		 history.go(-1);
	   		});
}

</script>