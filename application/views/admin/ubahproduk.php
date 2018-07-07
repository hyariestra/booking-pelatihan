<style type="text/css">
.container1 input[type=text] {
	padding:5px 0px;
	margin:5px 5px 5px 0px;
}




input{
	border: 1px solid #1c97f3;
	width: 260px;
	height: 40px;
	margin-bottom:14px;
}

.delete{
	background-color: #fd1200;
	border: none;
	color: white;
	padding: 5px 15px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 14px;
	margin: 4px 2px;
	cursor: pointer;
}
</style>

<div class="row">

	<div class="col-md-12">

		<div class="box">

			<div class="box-header">

				<h3 class="box-title"><?php echo $judul ?></h3>

				<form method="post" enctype="multipart/form-data">

					<div class="box-body">

						<div class="form-group">

							<label>Kategori</label>

							<br>
								<div class="col-md-11">
									<input type="text" value="<?php echo $produk['nama_kategori'] ?>" disabled="" id="kategoris" name="kategoris" class="form-control">
									<input type="hidden" value="<?php echo $produk['id_kategori'] ?>"  class="form-control" id="id_kategorinama" name="id_kategori"/>
								</div>
								
									<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-success">
										<span class="glyphicon glyphicon-plus-sign"></span>
									</button>
									
								

									

						</div>

						<div class="form-group">

							<label>Nama Produk</label>

							<input type="text" name="nama_produk" class="form-control" value="<?php echo $produk['nama_produk']; ?>">

						</div>

						<div class="form-group">

							<label>Kode Produk</label>

							<input type="text" name="kode_produk" class="form-control" value="<?php echo $produk['kode_produk']; ?>">

						</div>

						<div class="form-group">

							<label>Stok</label>

							<input type="text" name="stok_produk" class="form-control" value="<?php echo $produk['stok_produk']; ?>">

						</div>

						<div class="form-group">

							<label>Berat</label>

							<input type="text" name="berat_produk" class="form-control" value="<?php echo $produk['berat_produk']; ?>">

						</div>

						<div class="form-group">

							<label>Harga</label>

							<input type="text" name="harga_produk" class="form-control" value="<?php echo $produk['harga_produk']; ?>"> 

						</div>

						<div class="form-group">

							<label>Deskripsi</label>

							<textarea name="keterangan_produk" class="form-control" id="editorku"><?php echo $produk['keterangan_produk']; ?></textarea>

						</div>
						

						<?php 
						for($i = 1;	$i<=4;	$i++)
						{
							?>

							<?php if ($produk[gambar_produk.$i]==''): ?>

								<div class="container1">
									<div class="row">
										<div class="col-md-12">

											<label>Gambar</label>

										</div>

									</div>
									<div class="form-group">
										<img src="<?php echo base_url("assets/foto_produk/noimage.jpeg") ?>" width="200">
									</div>

									<div class="form-group">


										<div class="col-md-11">
											<input type="file" name="gambar_produk<?php echo $i?>" class="form-control">
										</div>
										


									</div>

								</div>

							<?php else: ?>
								
								<div class="container1">
									<div class="row">
										<div class="col-md-12">

											<label>Gambar</label>

										</div>

									</div>
									<div class="form-group">
										<img src="<?php echo base_url("assets/foto_produk/".$produk[gambar_produk.$i]) ?>" width="200">
									</div>

									<div class="form-group">


										<div class="col-md-11">
											<input type="file" name="gambar_produk<?php echo $i?>" class="form-control">
										</div>
										<div class="col-md-1">
											<!-- <button onclick="" class="delete">Delete</button> -->
											<button onclick="hapusproduk(this,'gambar_produk<?php echo $i?>',<?php echo $produk[id_produk] ?>)" class="delete" type="button">
									Delete
								</button>
										</div>


									</div>

								</div>

							<?php endif ?>

							<?php } ?>

						</div>
						<div class="lure">
						</div>

						<div class="box-footer">

							<button type="submit" class="btn btn-primary">Simpan</button>

						</div>

					</form>



				</div>



			</div>



		</div>



	</div>

<div class="modal fade" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Kategori</h4>
			</div>
			<div class="modal-body">
				<table class="table" id="tabelku">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Kategori</th>
							<th>Pilih</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($kategori as $key => $value) { ?>
						<tr>
							<td><?php echo $key+=1; ?><input type="hidden" value="<?php echo $value['id_kategori'] ?>"></td>
							<td><?php echo $value['nama_kategori']; ?></td>
							<td>
								<button onclick="chosecategory(this)" type="button" data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-success">
									<span class="glyphicon glyphicon-plus-sign"></span>
								</button>
							</td>
						</tr>
						<?php } ?>
					</tbody>

				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<script>
	$(document).ready(function() {
		var max_fields      = 4;
		var wrapper         = $(".lure");
		var add_button      = $(".add_form_field");


		var x = 1;
		$(add_button).click(function(e){
			e.preventDefault();
			if(x < max_fields){
				x++;
            $(wrapper).append('<div class="col-md-12"><div class="col-md-10"><input type="file" name="gambar_produk[]" class="form-control"></div><div class="col-md-1"><button type="button" class="btn btn-sm btn-success add_form_field"><span class="glyphicon glyphicon-plus-sign"></span></button></div><div class="col-md-1"><a href="#" class="delete">Delete</a></div></div>'); //add input box
        }
        else
        {
        	
        	alert('Gambar Melebihi Batas')
        }
    });

		$(wrapper).on("click",".delete", function(e){
			e.preventDefault(); $(this).parent().parent().remove(); x--;
		})
	});
	function chosecategory(obj)
	{
		var idpelanggan = $(obj).parent().parent().find("td").eq(0).find("input:first").val();
		namapelanggan = $(obj).parent().parent().find("td").eq(1).text();

		$("#kategoris").val(namapelanggan);
		$("#id_kategorinama").val(idpelanggan);

		$("#myModal").modal("remove");
	}

	function hapusproduk(obj,idgambar,idproduk)
	{	
		var msg = confirm("Apa anda yakin menghapus data ini?");

	

		if (msg) {
			var target = "<?php echo site_url("admin/produk/hapusprodukz") ?>";

			data = {
				idx : idgambar,
				idy : idproduk
			}
			console.log(data);

			$.post(target,data,function(e)
			{
				var js = $.parseJSON(e);
				if (js.flag) {
					alert('Data Berhasil di hapus');
				}else{
					alert('Gagal');
				}
					 location.reload();
			});
		}
	}

	
</script>