	<table class="table" id="tabelku">
					<thead>
						<tr>
							<th>No</th>
							<th>Kode Pembelian</th>
							<th>Nama Pelanggan</th>
							<th>Total Pembelian</th>
							<th>Status Pembelian</th>
					
						</tr>
					</thead>
					<tbody>


					<?php $totalsemua=0; ?>


					<?php foreach ($laporan as $key => $value): ?>
						<?php $totalsemua+=$value['total_bayar']; ?>
					<!-- karena data banyak dan array , ditampilkan pakai foreach -->
						<tr>
							<td><?php echo $key+=1; ?></td>
							<td><?php echo $value['kode_pembelian']; ?></td>
							<td><?php echo $value['nama_pelanggan']; ?></td>
							<td><?php echo $value['total_bayar']; ?></td>
							<td><?php echo $value['status_pembelian']; ?></td>
						
						
						<?php endforeach ?>
						</tr>
						<td colspan="3">Total Semua</td>
						<td><?php echo $totalsemua; ?></td>
					</tbody>
				</table>