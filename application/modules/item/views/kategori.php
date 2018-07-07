<style type="text/css">
.price h3, .top-rates h3, .brand-w3l h3 {
	text-align: center;
	font-size: 20px;
	padding: .2em;
	background: #f19e1f;
	color: #fff;
	margin-bottom: .5em;
}
ul{
	list-style: none;
	margin-left: 10px;
}

li.likategori{
	border-bottom:  1px solid #82929d;
}
.thumbnail:hover
{
	position: relative; 
	top: -5px;
}
.btn
{
	padding: 2px 5px 2px 5px;
}



</style>
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="brand-w3l">
				<h3>Kategori Produk</h3>
				<ul>
					<?php foreach ($kategori as $key => $value) {  ?>
					<li class="likategori">
						<a href="<?php echo base_url("item/kategori/$value[id_kategori]"); ?>"><?php echo  $value['nama_kategori'] ?></a>
					</li>
					<?php } ?>
					
				</ul>
			</div>
		</div>
		<div class="col-md-9">
			<div class="row">
			<?php 
			foreach ($kategoriproduk as $key => $value) { ?>
			<div class="col-md-3">
				<div class="thumbnail">
					<img title="<?php echo $value['nama_produk'] ?>" src="<?php echo base_url("assets/foto_produk/$value[gambar_produk1]"); ?>" alt="...">

					<div class="caption">
						<h3 style="font-size: 14px;"><?php echo $value['nama_produk'] ?></h3>
						<p>Rp. <?php echo number_format($value['harga_produk'], "2", ",", "."); ?></p>
						<a style="margin-left: 0%;" href="<?php echo base_url("detail/$value[nama_permalink]") ?>">
							<button style="color:#fff;" class="btn btn-md"><span style="color:#8bc34a;" class="glyphicon glyphicon-shopping-cart"></span> Pesan Sekarang</button>
						</a>
					</div>
				</div>
			</div>
  					<?php } ?>
			</div>
		</div>
	</div>
</div>

