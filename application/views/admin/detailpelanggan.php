<div class="row">
	<div class="col-md-4">
		<div class="box">
			<div class="box-body">
				<ul class="list-group">
					<li class="list-group-item">Nama : <?php echo $pelanggan['nama_pelanggan'];?></li>
					<li class="list-group-item">Email : <?php echo $pelanggan['email_pelanggan']; ?></li>
					<li class="list-group-item">Telepone : <?php echo $pelanggan['telepon_pelanggan']; ?></li>
					<li class="list-group-item">Alamat : <?php echo $pelanggan['alamat_pelanggan']; ?></li>
				</ul>
			</div>
			<!-- <div class="box-footer">
				<a href="" class="btn btn-primary">Ubah</a>
			</div> -->
			
		</div>
		
	</div>
	<div class="col-md-8">
		<div class="box">
			<div class="box-body"> 
				<table class="table" id="tabelku">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal</th>
							<th>Total Pembelian</th>
							<th>Status</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php foreach ($riwayat as $key => $value): 
						$tanggal1=$value['tanggal_pembelian']
						?>
							<tr>
								<td><?php echo $key+=1; ?></td>
								<td><?php echo tgl_indo($tanggal1) ?></td>
								<td>Rp.<?php echo number_format($value['total_pembelian']); ?></td>
								<td><?php echo $value['status_pembelian']; ?></td>
								<td>
								<a href="<?php echo base_url("admin/pembelian/detail/$value[id_pembelian]"); ?>" class="btn btn-info">Detail</a>
								</td>
							</tr>
						<?php endforeach ?>

					</tbody>
				</table>

			</div>
		</div>
		
	</div>
	
</div>