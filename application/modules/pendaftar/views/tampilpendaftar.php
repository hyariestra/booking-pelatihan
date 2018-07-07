<div class="row">

	<div class="col-md-12">

		<div class="box">

			<div class="box-header">

				<h3 class="box-title"><?php echo $judul ?></h3>

			</div>

			<div class="box-body">

				<table class="table" id="tabelku">

					<thead>

						<tr>

							<th>No</th>
							
							<th>Nama</th>
							<th>Username</th>

							<th>Asal Instansi</th>

							<th>No Telp</th>

							<th>Alamat Email</th>

						</tr>

					</thead>

					<tbody>

					<?php foreach ($tampilpaketsatu as $key => $value): ?>

						

					<!-- karena data banyak dan array , ditampilkan pakai foreach -->

						<tr>

							<td><?php echo $key+=1; ?></td>

							<td><?php echo $value['nama_users']; ?></td>
							<td><?php echo $value['username']; ?></td>

							<td><?php echo $value['nama_bumdes']; ?></td>

							<td><?php echo $value['telp']; ?></td>
							<td><?php echo $value['email']; ?></td>

						

						

						<?php endforeach ?>

						</tr>

					</tbody>

				</table>

				

			</div>
	
		</div>

		

	</div>

	

</div>