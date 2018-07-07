<?php include 'header.php'; ?>

<?php //echo "asdsd";exit(); 

$startDay = "01";
$startMonth = date("m");
$startYear = date("Y");

$startDate = $startDay."-".$startMonth."-".$startYear;
$startDate = date("d-m-Y", strtotime($startDate));

$endDay = date("t");
$endMonth = date("m");
$endYear = date("Y");

$endDate = $endDay."-".$endMonth."-".$endYear;
$endDate = date("d-m-Y", strtotime($endDate));
?>

<style type="text/css">

	 label{
            color: black !important;
        }

 .affix {
      top: 20px;
      z-index: 9999 !important;
  }

#show-me{
    height: 0;
    overflow: hidden;
   -moz-animation: slide 1s ease 0.1s forwards;
   -webkit-animation: slide 1s ease 0.1s forwards;
   -o-animation: slide 1s ease 0.1s forwards;
   -ms-animation: slide 1s ease 0.1s forwards;
    animation: slide 1s ease 0.1s forwards;
}


@-moz-keyframes slide 
{
from {height: 0;}
to {height: 300px;}
}

@-webkit-keyframes slide 
{
from {height: 0;}
to {height: 300px;}
}

@-o-keyframes slide 
{
from {background: red;}
to {background: yellow;}
}

@-ms-keyframes slide 
{
from {height: 0;}
to {height: 300px;}
}

@keyframes slide
{
from {height: 0;}
to {height: 300px;}
}



</style>

<div class="container">
	<div class="col-md-9">
		<div class="paket">
			<form action="#" id="myForm" role="form" data-toggle="validator" method="post" accept-charset="utf-8">
                    
        <!-- SmartWizard html -->
        <div id="smartwizard">
            <ul>
                <li><a href="#step-1">Step 1<br /><small>Email Address</small></a></li>
                <li><a href="#step-2">Step 2<br /><small>Name</small></a></li>
                <li><a href="#step-3">Step 3<br /><small>Address</small></a></li>
                <li><a href="#step-4">Step 4<br /><small>Terms and Conditions</small></a></li>
            </ul>
            
            <div>
                <div id="step-1">
                	<div class="kontak">
                		

                		<h3>Nama</h3>
                		<div id="form-step-1" role="form" data-toggle="validator">
                			<div class="form-group">
                				
                				<input type="text" class="form-control" name="name" id="email" placeholder="Write your name" required>
                				<div class="help-block with-errors"></div>
                			</div>
                		</div>

                		<h3>Alamat</h3>
                		<div id="form-step-0" role="form" data-toggle="validator">
                			<div class="form-group">
                				
                			  <textarea class="form-control" name="address" id="address" rows="3" placeholder="Write your address..." required></textarea>
                				<div class="help-block with-errors"></div>
                			</div>
                		</div>

                		<h3>Asal Instansi</h3>
                		<div id="form-step-0" role="form" data-toggle="validator">
                			<div class="form-group">
                				
                				  <input type="text" class="form-control" name="name" id="email" placeholder="Write your name" required>
                				<div class="help-block with-errors"></div>
                			</div>
                		</div>

                		<h3>Kategori Instansi</h3>
                		<div id="form-step-0" role="form" data-toggle="validator">
                			<div class="form-group">
                				<label class="radio-inline">
                					<input type="radio" name="optradio">Option 1</label>
                				<label class="radio-inline">
                					<input type="radio" name="optradio">Option 2</label>
                				<label class="radio-inline">
                					<input type="radio" name="optradio">Option 3</label>
                							<div class="help-block with-errors"></div>
                			</div>
                		</div>

                		<h3>Jabatan</h3>
                		<div id="form-step-0" role="form" data-toggle="validator">
                			<div class="form-group">
                				
                				  <input type="text" class="form-control" name="name" id="email" placeholder="Write your name" required>
                				<div class="help-block with-errors"></div>
                			</div>
                		</div>

                		<h3>No Telephone</h3>
                		<div id="form-step-0" role="form" data-toggle="validator">
                			<div class="form-group">
                				
                				  <input type="text" class="form-control" name="name" id="email" placeholder="Write your name" required>
                				<div class="help-block with-errors"></div>
                			</div>
                		</div>

                		<h3>Alamat Email</h3>
                		<div id="form-step-0" role="form" data-toggle="validator">
                			<div class="form-group">

                				<input type="email" class="form-control" name="email" id="email" placeholder="Write your email address" required>
                				<div class="help-block with-errors"></div>
                			</div>
                		</div>

                			<h3>Produk yang Diinginkan</h3>

                			<div id="form-step-0" role="form" data-toggle="validator">
                				<div class="form-group">
                					<div class="radio">
                						<label><input type="radio" value="a" name="optradio2">Pelatihan/Workshop/Training</label>
                					</div>
                					<div class="radio">
                						<label><input type="radio" name="optradio2">Aplikasi Akuntansi Bumdes</label>
                					</div>
                					<div class="radio ">
                						<label><input type="radio" value="a" name="optradio2">Keduanya</label>
                					</div>

                				</div>
                			</div>

                			<div style="display: none;" id="show-me">

                				<h3>Tema yang Diinginkan</h3>
                				<div id="form-step-0" role="form" data-toggle="validator">
                					<div class="form-group">
                						<div class="radio">
                							<label><input type="radio" name="optradio3">Pelatihan Pembentukan Bumdes</label>
                						</div>
                						<div class="radio">
                							<label><input type="radio" name="optradio3">Pelatihan Penguatan Bumdes</label>
                						</div>
                						<div class="radio ">
                							<label><input type="radio" name="optradio3">Pelatihan Sistem Aplikasi Bumdes</label>
                						</div>

                					</div>
                				</div>

                				<h3>Program</h3>
                				<div id="form-step-0" role="form" data-toggle="validator">
                					<div class="form-group">
                						<div class="radio">
                							<label><input type="radio" name="optradio4">Lokasi Peserta (In House)</label>
                						</div>
                						<div class="radio">
                							<label><input type="radio" name="optradio4">Di Kantor Pusat Bumdes.id Regular</label>
                						</div>

                					</div>
                				</div>

                				<h3>Jumlah Peserta</h3>
                				<div id="form-step-0" role="form" data-toggle="validator">
                					<div class="form-group">

                						<input type="number" class="form-control" name="peserta" id="email" placeholder="jumlah peserta pelatihan" required>
                						<div class="help-block with-errors"></div>
                					</div>
                				</div>



                				<!-- div show me -->
                			</div>


                		<h3>Jumlah Lama Pelatihan</h3>
                		<div id="form-step-0" role="form" data-toggle="validator">
                			<div class="form-group">
                				<label class="radio-inline">
                					<input type="radio" name="optradio5">1 hari</label>
                				<label class="radio-inline">
                					<input type="radio" name="optradio5">2 hari</label>
                				<label class="radio-inline">
                					<input type="radio" name="optradio5">3 hari</label>
                							<div class="help-block with-errors"></div>
                			</div>
                		</div>


                		<h3>Tanggal Pelatihan yang Diinginkan</h3>
                		<div id="form-step-0" role="form" data-toggle="validator">
                			<div class="form-group">
                				<input class="form-control" type="text" name="daterange" value="<?php echo $startDate?> s/d <?php echo $endDate?>" />
                			</div>
                		</div>



        					<!-- - -->
                	</div>
                    
                </div>
                <div id="step-2">
                    <h2>Your Name</h2>
                    <div id="form-step-1" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" name="name" id="email" placeholder="Write your name" required>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div id="step-3">
                    <h2>Your Address</h2>
                    <div id="form-step-2" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea class="form-control" name="address" id="address" rows="3" placeholder="Write your address..." required></textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                </div>
                <div id="step-4" class="">
                    <h2>Terms and Conditions</h2>
                    <p>
                        Terms and conditions: Keep your smile :) 
                    </p>
                    <div id="form-step-3" role="form" data-toggle="validator">
                        <div class="form-group">
                            <label for="terms">I agree with the T&C</label>
                            <input type="checkbox" id="terms" data-error="Please accept the Terms and Conditions" required>  
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
        
        </form>
		</div>
	</div>

	<div class="col-md-3">
		<div id="sidebar">
			<div class="sidebar__inner">
				<div class="paket">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
				</div>
			</div>
		</div>
	</div>
	
</div>

<?php include 'footer.php'; ?>