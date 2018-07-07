<div class="container">
	<div class="col-md-12">
		<div class="col-md-6 pull pull-left">
			<img style="width: 150px" class="img-responsive" src="<?php echo base_url("theme/images/logobumdes-min.png") ?>">
		</div>
		<div class="col-md-6">
			<div class="phone pull pull-right">
				<strong style="padding-top: 60px" class="big">
					<i class="glyphicon glyphicon-phone-alt"></i> Telp <a href="tel:0214123456" title="Klik untuk telpon langsung">0214123456</a>
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
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img style="height: 350 !important;" src="<?php echo base_url("theme/images/slide1.jpg") ?>" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img style="height: 350 !important;" src="<?php echo base_url("theme/images/slide1.jpg") ?>" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img style="height: 350 !important;" src="<?php echo base_url("theme/images/slide1.jpg") ?>" alt="New york" style="width:100%;">
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
				<div class="col-xs-4 w3ls_banner_info_grid">
					<div class="pict">
						<img style="width:100px;" src="<?php echo base_url("assets/images/register2.png")?>" />
						<div class="texttitle">Tentukan Pelatihan Anda</div>
						<div class="texttitle-span">Anda dapat menentukan pelatihan dan dapat memilih pelatihan anda sendiri sesuai dengan kebutuhan anda. Silahkan register sekarang disini</div>
						<button type="button" onclick="registerButton()" style="background:#4ba3af; color:#fff;" class="btn btn-sm btn-act">Daftar Sekarang</button>
					</div>
				</div>

				<div class="col-xs-4 w3ls_banner_info_grid">
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
			<div class="col-md-4" style="text-align:center;">
					<img src="<?php echo base_url("theme/images/article/debt.png"); ?>" alt=" " />
					<p style="font-weight: bold; color:#49b3e8; text-align:center;">Keunggulan 1</p>
					<p style="text-align:center;">Anda dapat menjelaskan alasan kenapa orang harus menggunakan layanan Anda.</p>
			
			</div>
			<div class="col-md-4" style="text-align:center;">
				<img src="<?php echo base_url("theme/images/article/card.png"); ?>" alt=" " />
					<p style="font-weight: bold; color:#49b3e8; text-align:center;">Keunggulan 2</p>
					<p style="text-align:center;">Anda dapat menjelaskan alasan kenapa orang harus menggunakan layanan Anda.</p>
			</div>
			<div class="col-md-4" style="text-align:center;">
				<img src="<?php echo base_url("theme/images/article/star.png"); ?>" alt=" " />
					<p style="font-weight: bold; color:#49b3e8;text-align:center;">Keunggulan 3</p>
					<p style="text-align:center;">Anda dapat menjelaskan alasan kenapa orang harus menggunakan layanan Anda.</p>
			</div>
		</div>
	</div>
	
	<div class="portofW33">
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
						
						<button style="color:#fff;" class="btn btn-md"><span class="glyphicon glyphicon-ok"></span> Pesan Sekarang</button>
					</div>
				</div>
			<?php } ?>
				
			</div>
			<div class="col-md-12">
				<div class="noteforprice">*) Harga diatas bisa berubah setiap saat tanpa ada pemberitahuan sebelumnya.</div>
			</div>
		</div>
	</div>
	
	<div class="about-w3l">
		<div class="container">
			<h3 class="w3l-titles">Partner</h3>
			<div class="col-md-6 ab-right">
				<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
				
			</div>
			<div class="col-md-6 ab-left">
				<img style="margin-bottom: 10px; margin-right: 20px; width: 100px; height:40px" src="<?php echo base_url("theme/images/client/1.png"); ?>" alt=" " />
				<img style="margin-bottom: 10px; margin-right: 20px; width: 100px; height:40px" src="<?php echo base_url("theme/images/client/2.png"); ?>" alt=" " />
				<img style="margin-bottom: 10px; margin-right: 20px; width: 100px; height:40px" src="<?php echo base_url("theme/images/client/3.png"); ?>" alt=" " />
				
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
				<h3 class="w3l-titles">Our Agents</h3>
				<div id="horizontalTab">
					<ul class="col-md-2 resp-tabs-list">
						<li>
							<img src="<?php echo base_url("theme/images/tab1.jpg"); ?>" alt=" " class="img-responsive" />
						</li>
						<li>
							<img src="<?php echo base_url("theme/images/tab4.jpg"); ?>" alt=" " class="img-responsive" />
						</li>
						<li>
							<img src="<?php echo base_url("theme/images/tab3.jpg"); ?>" alt=" " class="img-responsive" />
						</li>
						<li>
							<img src="<?php echo base_url("theme/images/tab2.jpg"); ?>" alt=" " class="img-responsive" />
						</li>
					</ul>
					<div class="col-md-10 resp-tabs-container">
						<div class="tab1">
							<div class="col-md-6 team-Info-agileits">
								<h4>Ferguson Anne</h4>
								<span>Agent 1</span>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
								aliqua. Ut enim ad minim veniam, quis.Lorem ipsum dolor .</p>
								<div class="social-bnr-agileits footer-icons-agileinfo">
									<ul class="social-icons3">
										<li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
										<li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
										<li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li>
										<li><a href="#" class="fa fa-rss icon-border rss"> </a></li>

									</ul>
								</div>
							</div>
							<div class="col-md-6 team-img-w3-agile">
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="tab2">
							<div class="col-md-6 team-Info-agileits">
								<h4>Amelies Ince</h4>
								<span>Agent 2</span>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
								aliqua. Ut enim ad minim veniam, quis.Lorem ipsum dolor .</p>
								<div class="social-bnr-agileits footer-icons-agileinfo">
									<ul class="social-icons3">
										<li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
										<li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
										<li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li>
										<li><a href="#" class="fa fa-rss icon-border rss"> </a></li>

									</ul>
								</div>
							</div>
							<div class="col-md-6 team-img-w3-agile">
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="tab3">
							<div class="col-md-6 team-Info-agileits">
								<h4>Adrian Kmit</h4>
								<span>Agent 3</span>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
								aliqua. Ut enim ad minim veniam, quis.Lorem ipsum dolor .</p>
								<div class="social-bnr-agileits footer-icons-agileinfo">
									<ul class="social-icons3">
										<li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
										<li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
										<li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li>
										<li><a href="#" class="fa fa-rss icon-border rss"> </a></li>

									</ul>
								</div>
							</div>
							<div class="col-md-6 team-img-w3-agile">
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="tab4">
							<div class="col-md-6 team-Info-agileits">
								<h4>Charles Jkin</h4>
								<span>Agent 4</span>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
								aliqua. Ut enim ad minim veniam, quis.Lorem ipsum dolor .</p>
								<div class="social-bnr-agileits footer-icons-agileinfo">
									<ul class="social-icons3">
										<li><a href="#" class="fa fa-facebook icon-border facebook"> </a></li>
										<li><a href="#" class="fa fa-twitter icon-border twitter"> </a></li>
										<li><a href="#" class="fa fa-google-plus icon-border googleplus"> </a></li>
										<li><a href="#" class="fa fa-rss icon-border rss"> </a></li>

									</ul>
								</div>
							</div>
							<div class="col-md-6 team-img-w3-agile">
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
					<div class="clearfix"> </div>
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
			var target = "<?php echo site_url("user/register")?>";
			
			window.open(target, "_blank");
		}
	</script>
	
	