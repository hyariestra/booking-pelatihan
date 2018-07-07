<style>
	.boxinvoice{
		background:#fff;
		padding:20px;
		box-shadow:0px 0px 15px #ccc;
	}
	
	.kopinvoice{
		font-size:13px;
	}
	
	.bodyinvoice{
		margin:20px 0px;
		overflow-y:hidden;
	}
	
	.bodyoverflow{
		width:120%;
	}
	
	.table > tbody > tr > th{
		padding:0px !important;
		margin:0px !important;
		text-align:center;
		font-size:12px;
		color:#555;
	}
	
	.table > tbody > tr > td{
		padding:5px !important;
		margin:0px !important;
		text-align:center;
		font-size:12px;
		color:#555;
	}
	
	.td-note{
		background:#ffbf61;
	}
	
	.td-stats{
		background:#8cf749;
	}
</style>

<div class="container" style="padding:90px 0px 40px 0px !important;">
	<div class="row">
		<div class="col-md-12">
			<div class="boxinvoice">
				<div class="kopinvoice">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-3">
								<span class="spantextinvoice">Tema</span> 
							</div>
							<div class="col-md-8">
								<span class="spantextinvoice">: <?php echo $booking->first_row()->nama_theme?></span> 
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<span class="spantextinvoice">Program</span> 
							</div>
							<div class="col-md-8">
								<span class="spantextinvoice">: <?php echo $booking->first_row()->nama_produk?></span> 
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<span class="spantextinvoice">Jumlah peserta</span> 
							</div>
							<div class="col-md-8">
								<span class="spantextinvoice">: <?php echo $booking->first_row()->jml_peserta?> orang</span> 
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<span class="spantextinvoice">Jumlah Hari</span> 
							</div>
							<div class="col-md-8">
								<?php
									$CheckIn = date("Y-m-d", strtotime($booking->first_row()->tgl_mulai));
									$CheckOut = date("Y-m-d", strtotime($booking->first_row()->tgl_selesai));
									
									$CheckInX = explode("-", $CheckIn);
									$CheckOutX =  explode("-", $CheckOut);
									$date1 =  mktime(0, 0, 0, $CheckInX[1],$CheckInX[2],$CheckInX[0]);
									$date2 =  mktime(0, 0, 0, $CheckOutX[1],$CheckOutX[2],$CheckOutX[0]);
									$interval =($date2 - $date1)/(3600*24);
									
								?>
								<span class="spantextinvoice">: <?php echo $interval?> hari <?php if($interval >= 3){echo "(include dengan kunjungan hari ke 3)";} ?></span> 
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<span class="spantextinvoice">Periode  </span> 
							</div>
							<div class="col-md-8">
								<span class="spantextinvoice">: Sistem pemesanan</span> 
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-3">
								<span class="spantextinvoice">Bumdes</span> 
							</div>
							<div class="col-md-8">
								<span class="spantextinvoice">: <?php echo $booking->first_row()->nama_bumdes?></span> 
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<span class="spantextinvoice">Kabupaten</span> 
							</div>
							<div class="col-md-8">
								<span class="spantextinvoice">: Sleman, Yogyakarta</span> 
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<span class="spantextinvoice">Pusat  </span> 
							</div>
							<div class="col-md-8">
								<span class="spantextinvoice">: Yogyakarta</span> 
							</div>
						</div>
					</div>
				</div>
				<div style="clear:both;"></div>
					<div class="bodyinvoice">
						<div class="bodyoverflow">
							<table id="tblinvoice" class="table table-bordered" style="width:120% !important;">
								<tr>
									<th style="vertical-align:middle;" rowspan="2">No</th>
									<th style="vertical-align:middle;" rowspan="2">Rincian Keterangan</th>
									<th style="vertical-align:middle;" rowspan="2">Orang</th>
									<th style="vertical-align:middle;" rowspan="2">Hari</th>
									<th style="vertical-align:middle;" rowspan="2">Volume</th>
									<th style="vertical-align:middle;" rowspan="2">Satuan</th>
									<th style="vertical-align:middle;" colspan="6">Harga Satuan (Rp.)</th>
									<th style="vertical-align:middle;" colspan="6">Jumlah (Rp.)</th>
								</tr>
								<tr>
									<th>Academic</th>
									<th>Business</th>
									<th>Company</th>
									<th>Goverment</th>
									<th>Media</th>
									<th>Finance</th>
									<th>Academic</th>
									<th>Business</th>
									<th>Company</th>
									<th>Goverment</th>
									<th>Media</th>
									<th>Finance</th>
								</tr>
								<tbody>
									<tr style="background:#2091c9;">
										<td></td>
										<td colspan="18" style="text-align:left;color:#fff;">Personal</td>
									</tr>
								<?php for($i=1; $i<=3; $i++){ ?>
									<tr>
										<td>1</td>
										<td>Narasumber (FC)</td>
										<td>1</td>
										<td>8</td>
										<td>Sesi</td>
										<td>pcs</td>
										<td class="td-note">1,400,000</td>
										<td class="td-note">1,400,000</td>
										<td class="td-note">1,400,000</td>
										<td class="td-note">1,400,000</td>
										<td class="td-note">1,400,000</td>
										<td class="td-note">1,400,000</td>
										<td class="td-stats">1,400,000</td>
										<td class="td-stats">1,400,000</td>
										<td class="td-stats">1,400,000</td>
										<td class="td-stats">1,400,000</td>
										<td class="td-stats">1,400,000</td>
										<td class="td-stats">1,400,000</td>
									</tr>
								<?php } ?>
								<tr style="background:#2091c9;">
									<td></td>
									<td colspan="18" style="text-align:left;color:#fff;">Non Personil</td>
								</tr>
								<?php for($i=1; $i<=3; $i++){ ?>
									<tr>
										<td>1</td>
										<td>Narasumber (FC)</td>
										<td>1</td>
										<td>8</td>
										<td>Sesi</td>
										<td>pcs</td>
										<td class="td-note">1,400,000</td>
										<td class="td-note">1,400,000</td>
										<td class="td-note">1,400,000</td>
										<td class="td-note">1,400,000</td>
										<td class="td-note">1,400,000</td>
										<td class="td-note">1,400,000</td>
										<td class="td-stats">1,400,000</td>
										<td class="td-stats">1,400,000</td>
										<td class="td-stats">1,400,000</td>
										<td class="td-stats">1,400,000</td>
										<td class="td-stats">1,400,000</td>
										<td class="td-stats">1,400,000</td>
									</tr>
								<?php } ?>
								<tr style="background:#2091c9;">
									<td></td>
									<td colspan="18" style="text-align:left;color:#fff;">Additional</td>
								</tr>
								<?php for($i=1; $i<=3; $i++){ ?>
									<tr>
										<td>1</td>
										<td>Narasumber (FC)</td>
										<td>1</td>
										<td>8</td>
										<td>Sesi</td>
										<td>pcs</td>
										<td class="td-note">1,400,000</td>
										<td class="td-note">1,400,000</td>
										<td class="td-note">1,400,000</td>
										<td class="td-note">1,400,000</td>
										<td class="td-note">1,400,000</td>
										<td class="td-note">1,400,000</td>
										<td class="td-stats">1,400,000</td>
										<td class="td-stats">1,400,000</td>
										<td class="td-stats">1,400,000</td>
										<td class="td-stats">1,400,000</td>
										<td class="td-stats">1,400,000</td>
										<td class="td-stats">1,400,000</td>
									</tr>
								<?php } ?>
									<tr>
											<td colspan="12" style="font-weight:bold;"> TOTAL BIAYA</td>
											<td class="td-stats">1,400,000</td>
											<td class="td-stats">1,400,000</td>
											<td class="td-stats">1,400,000</td>
											<td class="td-stats">1,400,000</td>
											<td class="td-stats">1,400,000</td>
											<td class="td-stats">1,400,000</td>
										</tr>
								</tbody>
							</table>
						</div>
						<div class="foot-note">
							<ul>
								<li>
									<div>
										<div style="background:#ffbf61;height:10px; width:30px;"></div> 
										<span style="font-size:12px; color:#555; letter-spacing:0px !important;">Harga Standart</span>
									</div>
								</li>
								<li>
									<div>
										<div style="background:#8cf749;height:10px; width:30px;"></div> 
										<span style="font-size:12px; color:#555; letter-spacing:0px !important;">Harga Booking</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
				<div style="clear:both;"></div>
			</div>
		</div>
		
	</div>
</div>
