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

							<select class="form-control" name="id_kategori">

								<option value="">Pilih Kategori</option>

								<?php foreach ($kategori as $key => $value): ?>

								<option value="<?php echo $value['id_kategori']; ?>"><?php echo $value['nama_kategori']; ?></option>

									

								<?php endforeach ?>

							</select>

						</div>

						<div class="form-group">

							<label>Nama Produk</label>

							<input type="text" name="nama_produk" class="form-control">

						</div>

						<div class="form-group">

							<label>Kode Produk</label>

							<input type="text" name="kode_produk" class="form-control">

						</div>

						<div class="form-group">

							<label>Stok</label>

							<input type="text" name="stok_produk" class="form-control">

						</div>

						<div class="form-group">

							<label>Berat</label>

							<input type="text" name="berat_produk" class="form-control">

						</div>

						<div class="form-group">

							<label>Harga</label>

							<input type="text" name="harga_produk" class="form-control">

						</div>

						<div class="form-group">

							<label>Deskripsi</label>

							<textarea name="keterangan_produk" class="form-control" id="editorku"></textarea>

						</div>

						<div class="form-group">

							<label>Gambar
								
								
							</label>
							<div class="container1">
								<!-- <div>
									<button type="button" class="btn btn-sm btn-success add_form_field">
										<span class="glyphicon glyphicon-plus-sign"></span>
									</button>
								</div> -->
								<div class="col-md-12">
									<div class="col-md-10"><input type="file" name="gambar_produk[]" class="form-control"></div>
									<div class="col-md-1">
										<button type="button" class="btn btn-sm btn-success add_form_field">
										<span class="glyphicon glyphicon-plus-sign"></span>
									</button>
									</div>
									<div class="col-md-1">
										<a href="#" class="delete">Delete</a>
									</div>
								</div>
							</div>

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



<script>
$(document).ready(function() {
    var max_fields      = 4;
    var wrapper         = $(".container1");
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
</script>