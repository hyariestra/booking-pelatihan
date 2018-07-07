<section class="judulbar">

	<div class="container">

		<div class="row">

			<div class="col-md-8">

				<h1><?php echo $judul ?></h1>

			</div>

			<div class="col-md-4"></div>

		</div>

	</div>

</section>


<section class="checkout">
	<div class="container">
		<form method="post">

			<div class="row">

				<div class="col-md-4">

					<div class="form-group">

					

						<label>Kota</label>

						<select data-live-search="true" class="form-control selectpicker" name="id_kota" onchange="submit()" >

							<option value="">Pilih Kota</option>

							<?php foreach ($kota as $key => $value): ?>

								<option value="<?php echo $value['city_id']; ?>" <?php if($value['city_id']==$kotatujuan){echo "selected";} ?>   >

									<?php echo $value['city_id']; ?> 

									<?php echo $value['type']; ?> 

									<?php echo $value['city_name']; ?>, 

									<?php echo $value['province']; ?> 

									<?php echo $value['postal_code']; ?>

								</option>

							<?php endforeach; ?>

						</select>

					</div>

				</div>

				<div class="col-md-4">

					<div class="form-group">

						<label>Ekspedisi</label>

						<select class="form-control" name="jasaekspedisi" onchange="submit();">

							<option value="">Pilih Jasa ekspedisi</option>

							<option value="tiki" <?php if($jasaekspedisi=="tiki"){echo "selected";} ?> >TIKI</option>

							<option value="pos" <?php if($jasaekspedisi=="pos"){echo "selected";} ?> >POS Indonesia</option>

							<option value="jne" <?php if($jasaekspedisi=="jne"){echo "selected";} ?> >JNE</option>

						</select>

					</div>

				</div>



				<div class="col-md-4">

					<div class="form-group">

						<label>Paket Ekspedisi</label>

						<select class="form-control" name="paket" onchange="submit()">

							<option value="">Pilih Paket</option>

							<?php foreach ($ongkos['paketongkir'] as $kekey => $value): ?>

							<option value="<?php echo $kekey; ?>" <?php if($paket==$kekey && $paket!=""){echo "selected";} ?> ><?php echo $value['service'] ?>

							</option>

							<?php endforeach ?>

						</select>

					</div>

				</div>

			</div>

			<a onclick="keterangan()" class="btn btn-sm btn-warning  pull pull-right" style="margin-bottom:10px;"><span class="glyphicon glyphicon-list-alt">
			</span> Penjelasan Paket Pengiriman
			</a>


		





		<h3>Diskon/Potongan</h3>

		



		



			

			

			<button class="btn btn-primary" name="selesai" type="submit" value="selesai">Selesai Belanja</button>

		</form>

<br>

<br>

	</div>

</section>








</body>
</html>






