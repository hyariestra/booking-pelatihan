<style type="text/css">
	p.dosen{
		font-family: MuseoSans, sans-serif;
		color: #4c4949;
		text-align: justify;;
			}
	.righty{
		margin-right: 20px;
	}
	.nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
		color: #fff;
		background-color: #337ab7;
		border-bottom: 2px solid #f75400;
	}
	.nav-pills > li > a {
    border-radius: 0px;
}
	.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.container:hover .image {
  opacity: 0.3;
}

.container:hover .middle {
  opacity: 1;
}

.text {
  background-color: #4CAF50;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}

</style>

<div class="container">
	<div class="col-md-12">
		<div class="col-md-6 pull pull-left">
			<img style="width: 150px" class="img-responsive" src="<?php echo base_url("theme/images/logobumdes-min.png") ?>">
		</div>
		<div class="col-md-6">
			<div class="phone pull pull-right">
				<strong style="padding-top: 60px" class="big">
					<i class="glyphicon glyphicon-phone-alt"></i> Telp <a href="tel:0214123456" title="Klik untuk telpon langsung"><?php echo tampil_pengaturanz("telepon_usaha") ?></a>
				</strong>
				<div>
					Informasi lebih lanjut?	<a href="#kontak" class="pop">
						<button class="xxx" style="color: white; padding:5px 10px 5px;font-size:80%;margin-left:5px">Kontak Kami</button>
					</a>
				</div>
			</div>

		</div>
	</div>
</div>	

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img style="height: 350 !important;" src="<?php echo base_url("theme/images/slider/bahan1.png") ?>" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img style="height: 350 !important;" src="<?php echo base_url("theme/images/slider/bahan2.png") ?>" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img style="height: 350 !important;" src="<?php echo base_url("theme/images/slider/bahan3.png") ?>" alt="New york" style="width:100%;">
      </div>
      <div class="item">
        <img style="height: 350 !important;" src="<?php echo base_url("theme/images/slider/bahan4.png") ?>" alt="New york" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  
<div class="w3ls_banner_info_grids2">
	<div class="boxbackover">
		<div class="headertextoption">
			<h4 style="font-size:24px;">Silahkan pilih menu dibawah ini</h4>
			<span style="font-size:14px">Menu yang disajikan sesuai kebutuhan anda saat ini.</span>
		</div>
		<div class="container col-container">
			<div class="col-md-12">

				<div class="col-md-6 w3ls_banner_info_grid">
					<div class="pict">
						<img style="width:100px;" src="<?php echo base_url("assets/images/register2.png")?>" />
						<div class="texttitle">Tentukan Pelatihan Anda</div>
						<div class="texttitle-span">Anda dapat menentukan pelatihan dan dapat memilih pelatihan anda sendiri sesuai dengan kebutuhan anda. Silahkan register sekarang disini</div>
						<button type="button" onclick="registerButton()" style="background:#4ba3af; color:#fff;" class="btn btn-sm btn-act">Daftar Sekarang</button>
					</div>
				</div>

				<div class="col-md-6 w3ls_banner_info_grid">
					<div class="pict">
						<img style="width:100px;" src="<?php echo base_url("assets/images/circle.png")?>" />
						<div class="texttitle">Booking Kode SAAB</div>
						<div class="texttitle-span">Aktifkan kode booking anda dan daftarkan bumdes anda untuk menggunakan aplikasi SAAB secara online dan GRATIS tidak dipungut biaya</div>
						<button type="button" onclick="activedCode()" style="background:#4ba3af; color:#fff;" class="btn btn-sm btn-act">Aktifkan Kode Booking</button>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
	<div class="container" style="margin-bottom:30px;">
		<div class="col-md-12">
				<h3 class="w3l-titles" style="margin-bottom:20px;">Mengapa Bumdes.id?</h3>
			<div class="col-md-offset-1 col-md-2" style="text-align:center;">
					<img src="<?php echo base_url("theme/images/ikon/1.png"); ?>" alt=" " />
					<p style="font-weight: bold; color:#49b3e8; text-align:center;">Pendampingan</p>
					<p style="text-align:center;">Bumdes.id siap membantu pendampingan pendirian Bumdes, penguatan manajemen Bumdes dan Pengembangan Bumdes</p>
			
			</div>
			<div class="col-md-2" style="text-align:center;">
				<img src="<?php echo base_url("theme/images/ikon/2.png"); ?>" alt=" " />
					<p style="font-weight: bold; color:#49b3e8; text-align:center;">Narasumber</p>
					<p style="text-align:center;">Narasumber Ahli dari berbagai bidang yang mengkolaborasikan antara konsep/teori dengan praktik dilapangan</p>
			</div>
			<div class="col-md-2" style="text-align:center;">
				<img src="<?php echo base_url("theme/images/ikon/3.png"); ?>" alt=" " />
					<p style="font-weight: bold; color:#49b3e8;text-align:center;">Layanan</p>
					<p style="text-align:center;">Layanan Konsultasi pendampingan,pendirian, penguatan dan perkembangan Bumdes yang berkelanjutan (free)</p>
			</div>
			<div class="col-md-2" style="text-align:center;">
				<img src="<?php echo base_url("theme/images/ikon/4.png"); ?>" alt=" " />
					<p style="font-weight: bold; color:#49b3e8;text-align:center;">Pelatihan</p>
					<p style="text-align:center;">Sistem pelatihan yang tidak membosankan (game) dengan metode andragogy (pelatihan dengan pendekatan orang dewasa)</p>
			</div>
			<div class="col-md-2" style="text-align:center;">
				<img src="<?php echo base_url("theme/images/ikon/5.png"); ?>" alt=" " />
					<p style="font-weight: bold; color:#49b3e8;text-align:center;">Sistem</p>
					<p style="text-align:center;">Sistem Jaringan Bumdes terbaik yang sudah mengintegrasikan koneksi ke seluruh indonesia</p>
			</div>
		</div>
	</div>
	
		<h3 class="w3l-titles">Promo</h3>
	<section class="center slider">
		<?php foreach ($tampilpaket as $key => $value) {
			
		 ?>
			<div class="col-md-3 paket">
			<div class="headerpaket paket">
				<div class="headerpaket-text"><?php echo $value['nama_paket'] ?></div>
				<div class="headerpaket-price">
					<span class="spantext-rp">Rp.</span><span class="spantext-nominal"><?php echo  number_format($value['harga_paket']); ?></span>
				</div>
				<div class="headerpaket-foot">
					<?php echo $value['fasilitas_paket'] ?>
				</div>
			</div>
			<div style="border:2px solid #eee; height: 250px;" class="bodypaket">
				<span class="spanheader-listpaket">Fasilitas Pelatihan</span>
				<ul class="listpaket">
					<?php 

					$fasilitas = explode(',', $value['id_personil']);
					foreach ($fasilitas as $key => $val) {
						$query = $this->db->query("SELECT*FROM mst_personil WHERE id_personil = '".$val."' ");


						?>

						<li><?php echo $query->first_row()->keterangan; ?></li>	

						<?php } ?>
					</ul>

				<a href="<?php echo base_url("user/promo"); ?>"><button style="color:#fff;" class="btn btn-md"><span style="color:#8bc34a;" class="glyphicon glyphicon-ok"></span>  Pesan Sekarang</button></a>
			</div>

		</div>
		<?php } ?>
   
 
  </section>


  <div class="about-w3l">
  	<div class="container">
  		<h3 style="margin-bottom: 20px !important;" class="w3l-titles">Produk Bumdes.id</h3>
  		<ul class="nav nav-pills">
  			<li class="active">
  				<a  style="padding:10px 30px 10px 30px" data-toggle="pill" href="#menu1">Pakaian</a>
  			</li>
  			<!-- <li><a style="padding:10px 30px 10px 30px" data-toggle="pill" href="#menu1">Menu 1</a></li>
  				
  			<li><a style="padding:10px 30px 10px 30px" data-toggle="pill" href="#menu2">Menu 2</a></li>
  			<li><a style="padding:10px 30px 10px 30px" data-toggle="pill" href="#menu3">Menu 3</a></li>  -->
  		</ul>
  		<div class="tab-content">
  			<div id="menu1" class="tab-pane fade in active">
  				
  				<?php foreach ($produk as $key => $value) { ?>

  					<div class="col-md-3">
  						
  						<div  class="thumbnail">
  							<img src="<?php echo base_url("assets/foto_produk/$value[gambar_produk1]"); ?>" alt="...">

  							<div class="caption">
  								<h3 style="font-size: 14px;"><?php echo $value['nama_produk']; ?></h3>
  								<p>Rp. <?php echo number_format($value['harga_produk'], "2", ",", "."); ?></p>
  							<a style="margin-left: 15%;" href="<?php echo base_url("item/detail/$value[id_produk] "); ?>"><button style="color:#fff;" class="btn btn-md"><span style="color:#8bc34a;" class="glyphicon glyphicon-ok"></span> Pesan Sekarang</button></a>
  							</div>
  						</div>
  					</div>
  					
  					<?php } ?>

  			</div>
  			<div id="menu2" class="tab-pane fade">
  				<h3>Menu 1</h3>
  				<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
  			</div>
  			<div id="menu2" class="tab-pane fade">
  				<h3>Menu 2</h3>
  				<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
  			</div>
  			<div id="menu3" class="tab-pane fade">
  				<h3>Menu 3</h3>
  				<p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
  			</div>
  		</div>
  	</div>
  </div>


	<!-- <div class="portofW33">
		<div class="container" style="border-bottom:2px dotted #2091c9; padding:0px 0px 20px 0px;">
			<h3 class="w3l-titles">Paket Pelatihan</h3>
			<div class="col-md-12">
			<?php 
			for($i = 1;	$i<=4;	$i++)
			{
				$active = ($i == 3) ? "actived" : "";
			?>
				<div class="col-md-3 paket <?php echo $active?>">
					<div class="headerpaket">
						<div class="headerpaket-text">Personal</div>
						<div class="headerpaket-price">
							<span class="spantext-rp">Rp.</span><span class="spantext-nominal">800</span>
						</div>
						<div class="headerpaket-foot">
							Harga /orang selama 3hari
						</div>
					</div>
					<div class="bodypaket">
						<span class="spanheader-listpaket">Fasilitas Pelatihan</span>
						<ul class="listpaket">
							<li>Materi penjelasan tentang BumDes</li>
							<li>Modul pelatihan BumDes</li>
							<li>Software aplikasi SAAB</li>
							<li>Sertifikat pelatihan</li>
						</ul>
						
						<button style="color:#fff;" class="btn btn-md"><span style="color:#8bc34a;" class="glyphicon glyphicon-ok"></span> Pesan Sekarang</button>
					</div>
				</div>
			<?php } ?>
				
			</div>
			<div class="col-md-12">
				<div class="noteforprice">*) Harga diatas bisa berubah setiap saat tanpa ada pemberitahuan sebelumnya.</div>
			</div>
		</div>
	</div> -->
	
	<div class="about-w3l">
		<div class="container">
			<h3 class="w3l-titles">Partner</h3>
			<div style="margin-bottom: 40px;" class="col-md-10 col-md-offset-1 ab-left">
				<img  title="Bumdes.id" style="margin-bottom: 10px; margin-right: 20px; width: 100px; height:70px" src="<?php echo base_url("theme/images/partner/1.png"); ?>" alt=" " />
				<img title="PT Syncore Indonesia"  style="margin-bottom: 10px; margin-right: 20px; width: 100px; height:40px" src="<?php echo base_url("theme/images/partner/2.png"); ?>" alt=" " />
				<img title="Sekolah Manajemen Bumdes"  style="margin-bottom: 10px; margin-right: 20px; width: 100px; height:70px" src="<?php echo base_url("theme/images/partner/3.jpg"); ?>" alt=" " />
				<img title="Kabupaten Bantul"  style="margin-bottom: 10px; margin-right: 20px; width: 100px; height:100px" src="<?php echo base_url("theme/images/partner/4.png"); ?>" alt=" " />
				<img title="Bumdes Mahardika"  style="margin-bottom: 10px; margin-right: 20px; width: 100px; height:100px" src="<?php echo base_url("theme/images/partner/5.png"); ?>" alt=" " />
			
				<img title="Bumdes Mahardika"  style="margin-bottom: 10px; margin-right: 20px; width: 100px; height:100px" src="<?php echo base_url("theme/images/partner/7.jpeg"); ?>" alt=" " />
				<img title="Sri Martani Makmur"  style="margin-bottom: 10px; margin-right: 20px; width: 120px; height:100px" src="<?php echo base_url("theme/images/partner/6.jpeg"); ?>" alt=" " />
			</div>
		</div>
	</div>


	

		<!-- <div class="portofW33">
			<div class="container">
				<h3 class="w3l-titles">Mengapa Bumdes.id?</h3>
				<div class="col-md-12">
					<div class="col-md-offset-2 col-md-10">
						<div class="col-md-3">
							<img src="<?php echo base_url("theme/images/article/debt.png"); ?>" alt=" " />
						</div>
						<div class="col-md-7">
							<div class="btitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							</div>
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</div>
					</div>

					<div class="col-md-offset-2 col-md-10">
						<div class="col-md-7">
							<div class="btitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							</div>
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</div>
						<div class="col-md-3">
							<img src="<?php echo base_url("theme/images/article/card.png"); ?>" alt=" " />
						</div>
					</div>

					<div class="col-md-offset-2 col-md-10">
						<div class="col-md-3">
							<img src="<?php echo base_url("theme/images/article/star.png"); ?>" alt=" " />
						</div>
						<div class="col-md-7">
							<div class="btitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							</div>
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</div>
						
					</div>

					<div class="col-md-offset-2 col-md-10">
						
						<div class="col-md-7">
							<div class="btitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							</div>
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</div>
						<div class="col-md-3">
							<img src="<?php echo base_url("theme/images/article/percentage.png"); ?>" alt=" " />
						</div>
						
					</div>
				</div>
			</div>
		</div> -->

	<!-- //about -->
	<!-- advantages -->
	<!-- <div class="two-grids">
		<div class="container">
			<h3 class="w3l-titles">Advantages</h3>
			<p class="w3layouts_dummy_para">Custom Designed with the Latest Technologies</p>
			<div class="col-md-6 w3_two_grid_right">
				<div class="w3_two_grid_right1">
					<div class="col-xs-3 w3_two_grid_right_grid">
						<div class="w3_two_grid_right_grid1">
							<i class="fa fa-hourglass-o" aria-hidden="true"></i>
						</div>
					</div>
					<div class="col-xs-9 w3_two_grid_right_gridr">
						<h4>Home Managers</h4>
						<p>Suspendisse bibendum ex sit amet tellus finibus ultrices.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="w3_two_grid_right1">
					<div class="col-xs-3 w3_two_grid_right_grid">
						<div class="w3_two_grid_right_grid1">
							<i class="fa fa-clone" aria-hidden="true"></i>
						</div>
					</div>
					<div class="col-xs-9 w3_two_grid_right_gridr">
						<h4>Special Deals</h4>
						<p>Suspendisse bibendum ex sit amet tellus finibus ultrices.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="w3_two_grid_right1">
					<div class="col-xs-3 w3_two_grid_right_grid">
						<div class="w3_two_grid_right_grid1">
							<i class="fa fa-external-link" aria-hidden="true"></i>
						</div>
					</div>
					<div class="col-xs-9 w3_two_grid_right_gridr">
						<h4>Residential</h4>
						<p>Suspendisse bibendum ex sit amet tellus finibus ultrices.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="col-md-6 w3_two_grid_right">
				<div class="w3_two_grid_right1">
					<div class="col-xs-3 w3_two_grid_right_grid">
						<div class="w3_two_grid_right_grid1">
							<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
						</div>
					</div>
					<div class="col-xs-9 w3_two_grid_right_gridr">
						<h4>Ideal Layout</h4>
						<p>Suspendisse bibendum ex sit amet tellus finibus ultrices.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="w3_two_grid_right1">
					<div class="col-xs-3 w3_two_grid_right_grid">
						<div class="w3_two_grid_right_grid1">
							<i class="fa fa-check-square-o" aria-hidden="true"></i>
						</div>
					</div>
					<div class="col-xs-9 w3_two_grid_right_gridr">
						<h4>Custom Designed</h4>
						<p>Suspendisse bibendum ex sit amet tellus finibus ultrices.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="w3_two_grid_right1">
					<div class="col-xs-3 w3_two_grid_right_grid">
						<div class="w3_two_grid_right_grid1">
							<i class="fa fa-square-o" aria-hidden="true"></i>
						</div>
					</div>
					<div class="col-xs-9 w3_two_grid_right_gridr">
						<h4>Best House</h4>
						<p>Suspendisse bibendum ex sit amet tellus finibus ultrices.</p>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div> -->
	<!-- //advantages -->
	<!-- team -->
	<div class="team" id="team">
		<div class="container">
			<div class="w3-agileits-team-title">
				<h3 class="w3l-titles">Our Consultant</h3>
				<div id="horizontalTab">
					<div class="col-md-12">
						<div class="col-md-6">
							<img class="righty" style=" border-radius: 50%;"  src="<?php echo base_url("theme/images/pemateri120px/tab1.jpg"); ?>" alt=" " align="left" class="img-responsive" />


							<div class="left">
								<h4>Rudy Suryanto, SE.,M.Acc.,Ak.CA</h4>
								<p class="dosen">Dosen FE UMY, Sekretaris KKMB (Konsultan Keuangan Mitra Bank) DIY, Konsultan Syncore Consulting, Penggagas Sekolah Manajemen Bumdes dan Bumdes.id</p>
								<p style="text-align: justify;">Rudy Suryanto, sebelumnya adalah Senior Auditor di PricewaterhouseCooper & Ernst & Young, kemudian melanjutkan S2 di Master of Accounting in University of Melbourne, dan saat ini adalah dosen di UMY, Kepala Business and Accounting Innovation Center (BAIC), Sekretaris Asosiasi Konsultan Keuangan Mitra Bank DIY dan Senior Partner di Syncore Consulting & System, serta penggagas Bumdes.id dan Sekolah Manajemen Bumdes</p>
							</div>
						</div>
						<div class="col-md-6">
							<img class="righty" style=" border-radius: 50%;"  src="<?php echo base_url("theme/images/pemateri120px/tab2.jpg"); ?>" alt=" " align="left" class="img-responsive" />
							<div class="lefy">
								<h4>Wahyudi Anggoro Hadi</h4>
								<p class="dosen">Kepala Desa Panggungharjo, Penasehat BUMDesa Panggunglestari</p>
								<p>Wahyudi Anggoro Hadi, merupakan Kepala Desa Panggungharjo Sewon Bantul, beliau merupakan Kepala Desa terbaik Nasional 2015 sekaligus menjadi Penasehat Bumdes Panggung Lestari yang merupakan salah satu Bumdes Percontohan Nasional.</p>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>
					<br>
					<div class="col-md-12">
						<div class="col-md-6">
							<img class="righty" style=" border-radius: 50%;"  src="<?php echo base_url("theme/images/pemateri120px/tab5.jpg"); ?>" alt=" " align="left" class="img-responsive" />
							<div class="lefy">
								<h4>Yanni Setiadiningrat</h4>
								<p class="dosen">Yanni Setiadi merupakan Sekretaris Desa Ponggok atau yang lebih dikenal dengan Carik e Ponggok. Beliau merupakan pembicara yang handal dan berpengalaman dalam hal teknis Bumdes terbukti Bumdes Tirta Mandiri desa Ponggok pada tahun 2017 mencapai omset 13 M.</p>
							</div>
						</div>
						<div class="col-md-6">
							<img class="righty" style=" border-radius: 50%;"  src="<?php echo base_url("theme/images/pemateri120px/tab4.jpg"); ?>" alt=" " align="left" class="img-responsive" />
							<div class="lefy">
								<h4>Azfa Mutiara Ahmad Pabulo, SE, MEK</h4>

								<p>Sekretaris Direktur Linkage Syariah Consulting, Konsultan Pengembangan UMKM, Founder BMT Subulussalam dan Absindodiy.net, Assesor Bekraf</p>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>
					<br>
					<div class="col-md-12">
						<div class="col-md-6">
							<img class="righty" style=" border-radius: 50%;"  src="<?php echo base_url("theme/images/pemateri120px/tab5.jpg"); ?>" alt=" " align="left" class="img-responsive" />

							<div class="left">
								<h4>Drs. Cahyo Binarto, M.M</h4>
								<p class="dosen">Direktur Eksekutif Sekolah Manajemen Bumdes</p>
								<p style="text-align: justify;">Cahyo Binarto, merupakan expert dalam bidang bisnis dan manajemen, beliau memiliki pengalaman yang luas dalam hal berbisnis dan mengembangkan usaha dari tahap mendirikan sampai dengan mengembangkan.</p>
							</div>
						</div>
						<div class="col-md-6">
							<img class="righty" style=" border-radius: 50%;"  src="<?php echo base_url("theme/images/pemateri120px/tab6.jpg"); ?>" alt=" " align="left" class="img-responsive" />
							<div class="lefy">
								<h4>Agung Hartanto, S.Kom</h4>
								<p class="dosen">Manajer Marketing dan Pengembangan Networking Sekolah Manajemen Bumdes</p>
								<p>Agung Hartanto S.Kom merupakan manajer marketing dan pemgembangan networking Sekolah Manajemen Bumdes Beliau berpengalaman dalam hal maeketing, pernah bekerja sebagai - Computer science degree - IT manager - Property Marketing Consultant - Marketing Communication Consultant - Property Developer - Enterpreneur.</p>
							</div>
						</div>
						<br>
					</div>


				</div>
			</div>
		</div>
	</div>


	<!-- //team -->
	<!-- stats -->
	<!-- <div class="stats">
		<div class="wthree_stat">
			<div class="container">
				<div class="wthree_stat_right">
					<ul>
						<li>
							<div class="wthree_stat_right1">
								<i class="fa fa-users" aria-hidden="true"></i>
								<h4>Happy clients</h4>
								<p class="counter">1200</p>
							</div>
						</li>
						<li>
							<div class="wthree_stat_right1">
								<i class="fa fa-trophy" aria-hidden="true"></i>
								<h4>Awards</h4>
								<p class="counter">800</p>
							</div>
						</li>
						<li>
							<div class="wthree_stat_right1">
								<i class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></i>
								<h4>Agencies</h4>
								<p class="counter">500</p>
							</div>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div> -->
	<!-- //stats -->
	<!-- newsletter -->
	<!-- <div class="w3layouts_newsletter">
		<div class="container">
			<div class="w3layouts_newsletter_left">
				<h3>Subscribe to our newsletter</h3>
			</div>
			<div class="w3layouts_newsletter_right">
				<form action="#" method="post">
					<input type="email" name="Email" placeholder="Email..." required="">
					<input type="submit" value="Subscribe">
				</form>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div> -->
	<!-- //newsletter -->
	<!-- footer -->
	<script type="text/javascript">
	
	
		function registerButton()
		{
			var target = "<?php echo site_url("user/register/all")?>";
			
			window.open(target, "_blank");
		}
	</script>
	
	