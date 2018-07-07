<style type="text/css">


.inner{
	 overflow: hidden;
  width: 400px;
}

.cc{
float: left;
margin-right: 10px;
}

.bs-callout-info {
  
    padding: 10px;
    margin: 20px 0;
    border: 1px solid  #1b809e;
    border-left-width: 5px;
    border-radius: 3px;
}

.bs-callout-info2 {
  
    padding: 10px;
    margin: 20px 0;
    border: 1px solid  #8e44ad;
    border-left-width: 5px;
    border-radius: 3px;
}
.bs-callout-info3 {
  
    padding: 10px;
    margin: 20px 0;
    border: 1px solid  #27ae60;
    border-left-width: 5px;
    border-radius: 3px;
}
.bs-callout-info4 {
  
    padding: 10px;
    margin: 20px 0;
    border: 1px solid  #e67e22;
    border-left-width: 5px;
    border-radius: 3px;
}

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
		/*overflow-y:hidden;*/
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
	ul.unlist{
		list-style-type: none;
	}
	
	.table > tbody > tr > td{
		padding:5px !important;
		margin:0px !important;
		/*text-align:center;*/
		font-size:12px;
		color:#555;
	}
	.table > tbody > tr > td.mid{
		padding:5px !important;
		margin:0px !important;
		text-align:center;
		font-size:12px;
		color:#555;
	}	
	.table > tbody > tr > td.right{
		padding:5px !important;
		margin:0px !important;
		text-align:right;
		font-size:12px;
		color:#555;
	}
</style>

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

							<th>Nama Pemesan</th>

							<th>Nama Intansi</th>

							<th>Telpon</th>
							<th>Email</th>
							<th>Kategori Instansi</th>
							<th>Produk</th>
							<th>Tema</th>
							<th>Program</th>
							<th>Status</th>
							<th>Konfirm</th>
							<th>Detail</th>

						</tr>

					</thead>

					<tbody>

					<?php foreach ($riwayat as $key => $value):

					if ($value['proses']=='Diproses') {
						$stat = '<a href="#" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon glyphicon-info-sign" aria-hidden="true"></span> Diproses</a>';
					}else{
						$stat = '<a href="#" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span> Deal</a>';
					}

					if ($value['status']=='1') {
						$choice = '<a href="#" class="btn btn-success btn-sm"><span class="glyphicon glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span> Setuju</a>';
						$button = '<a href="#" onclick="showmodalharga(this,'.$value['id_pemesanan'].')"; class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Detail</a>';

					}else if ($value['status'] == '3') {
						$choice = '<a href="#" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-scissors" aria-hidden="true"></span> Promo</a>';
						$button = '<a href="#" onclick="showmodalhargapromo(this,'.$value['id_pemesanan'].')"; class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Detail</a>';
					}else{
						$choice = '<a href="#" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon glyphicon-info-sign" aria-hidden="true"></span> Nego</a>';
						$button = '<a href="#" onclick="showmodalharga(this,'.$value['id_pemesanan'].')"; class="btn btn-info btn-sm"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Detail</a>';
					}

					 ?>
						<tr>

							<td><?php echo $key+=1; ?>
								<input type="hidden" id="idtable" value="<?php echo $value['id_booking'] ?>" name="">
							</td>

							<td><?php echo $value['nama_pemesan']; ?></td>

							<td><?php echo $value['nama_bumdes']; ?></td>

							<td><?php echo $value['telp']; ?></td>
							<td><?php echo wordwrap($value['email'], 25, "\n", true); ?></td>
							<td><?php echo $value['det_instansi']; ?></td>
							<td><?php echo $value['det_produk']; ?></td>
							<td><?php echo $value['det_tema']; ?></td>
							<td><?php echo $value['det_program']; ?></td>
							<td><?php echo $choice; ?></td>
							<td><?php echo $stat ?>
								<td>

								<?php echo $button ?>

								</td>

				
						<?php endforeach ?>

						</tr>

					</tbody>

				</table>

				
			</div>

			

			

		</div>

		

	</div>

	

</div>

<div class="modal" id="modalharga" tabindex="-1" role="dialog">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Table RAB</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="boxinvoice">
				<div class="kopinvoice">
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-3">
								<span class="spantextinvoice">Tema</span> 
							</div>
							<input type="hidden" id="id_book" name="book_id">
							<div class="col-md-1">
								<span>:</span>
							</div>
							<div class="col-md-7">
								<span id="info2_tema" class="spantextinvoice"><div id="temejson">-</div></span> 
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<span class="spantextinvoice">Program</span> 
							</div>
							<div class="col-md-1">
								<span>:</span>
							</div>
							<div class="col-md-7">
								<span id="info2_program" class="spantextinvoice"><div id="programjson">-</div></span> 
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<span class="spantextinvoice">Jumlah peserta</span> 
							</div>
							<div class="col-md-1">
								<span>:</span>
							</div>
							<div class="col-md-7">
								<span id="info2_jmlpeserta" class="spantextinvoice"><div id="jumlahjson"></div></span> 
								
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<span class="spantextinvoice">Jumlah Hari</span> 
							</div>
							<div class="col-md-1">
								:
							</div>
							<div class="col-md-7">
								<span id="info2_lamapelatihan" class="spantextinvoice">
									<div class="inner">
										<div class="cc" id="harijson"></div>
										<div class="dd"></div>
										<div class="cc" id="tanggaljson"></div>
									</div>

								 </span> 
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<span class="spantextinvoice">Periode  </span> 
							</div>
							<div class="col-md-1">
								<span>:</span>
							</div>
							<div class="col-md-7">
								<span class="spantextinvoice">14-03-2018 sd 16-03-2018</span> 
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-3">
								<span class="spantextinvoice">Instansi </span> 
							</div>
							<div class="col-md-1">
								<span>:</span>
							</div>
							<div class="col-md-7">
								<span  id="info2_namabumdes" class="spantextinvoice"><div id="instansijson"></div></span> 
								
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<span class="spantextinvoice">Kategori </span> 
							</div>
							<div class="col-md-1">
								<span>:</span>
							</div>
							<div class="col-md-7">
								<span id="info2_namabumdes" class="spantextinvoice"><div id="instansine"></div></span> 
								
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<span class="spantextinvoice">Kabupaten</span> 
							</div>
							<div class="col-md-1">
								<span>:</span>
							</div>
							<div class="col-md-7">
								<span class="spantextinvoice">Sleman, Yogyakarta</span> 
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<span class="spantextinvoice">Pusat  </span> 
							</div>
							<div class="col-md-1">
								<span>:</span>
							</div>
							<div class="col-md-7">
								<span class="spantextinvoice">Yogyakarta</span> 
							</div>
						</div>
					</div>
				</div>
				<div style="clear:both;"></div>
				<div class="bodyinvoice">
					<div class="bodyoverflow">
						<table id="tblinvoice" class="table table-bordered" style="width:84% !important;">
							<tr>
								<th style="vertical-align:middle;" rowspan="2">No</th>
								<th style="vertical-align:middle;" rowspan="2">Rincian Keterangan</th>
								<th style="vertical-align:middle;" rowspan="2">Orang</th>
								<th style="vertical-align:middle;" rowspan="2">Hari</th>
								<th style="vertical-align:middle;" rowspan="2">Volume</th>
								<th style="vertical-align:middle;" rowspan="2">Satuan</th>
								<th style="vertical-align:middle;" colspan="1">Harga Satuan (Rp.)</th>
								<th style="vertical-align:middle;" colspan="1">Jumlah (Rp.)</th>
							</tr>


							<tbody id="tableins">
								<tr style="background:#2091c9;">
									<td></td>
									<td colspan="7" style="text-align:left;color:#fff;">Table Masih Kosong, Anda Belum Memilih Paket</td>
								</tr>
							</tbody>

						</table>
					</div>
					<div class="foot-note">
						<button type="button" onclick="tog(this)"; class="btn btn-info"><span class="glyphicon glyphicon-resize-full" aria-hidden="true"></span> Lihat Keterangan</button>
					</div>
					<div id="note">
						<div id="ketproduk">
							<div class="bs-callout-info" id="callout-alerts-no-default"> 
								<p><b>Keterangan Produk Yang Diinginkan</b></p>
								<div id="ketprodukwant">-</div>
							</div>
						</div>
						<div id="ketproduklainnya">
							<div class="bs-callout-info2" id="callout-alerts-no-default"> 
								<p><b>Keterangan Produk Lainnya</b></p>
								<div id="ketprodukwantlainnya">-</div>
							</div>
						</div>
						<div id="temalainnya">
							<div class="bs-callout-info3" id="callout-alerts-no-default"> 
								<p><b>Keterangan Tema Lainnya</b></p>
								<div id="keterangantemalainnya">-</div>
							</div>
						</div>
						<div id="alamatpeserta">
							<div class="bs-callout-info4" id="callout-alerts-no-default"> 
								<p><b>Alamat Lokasi Pemesanan </b></p>
								<div id="lokasipemesanan">-</div>
							</div>
						</div>
					</div>
				</div>
				<div style="clear:both;"></div>
			</div>
			<div class="modal-footer">
				<button type="button" onclick="rubahstatus(this)"; class="btn btn-success"><span class="glyphicon glyphicon-send" aria-hidden="true"></span> Rubah Status Ke Deal</button>
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

$(document).ready(function(){
	$('#note').hide();
});

	function tambahins()
	 {

		 $("#xmodalx").modal("show"); 
	}

	function reload_table()
	{
  location.reload();
}

	function ambildata(obj,IDins)
	{

		
		var target		= "<?php echo site_url("produk/getdata")?>";
		data		= {
			idx : IDins
		}

		$('#alertMessage').remove();

		$.post(target, data, function(e){

			var json = $.parseJSON(e);
	    	// console.log(json); return false;

	    	$('#ubahID').val(json.ins.id_produk_want);
	    	$('#ubahnama').val(json.ins.nama_produk);
	    	$('#ubahket').val(json.ins.keterangan);
	    	$('#ubahharga').val(json.ins.harga_produk);

	    	$("#xmodalubahx").modal("show");
	    });

	}


	function format2(n, currency) {
    return currency + " " + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,");
}

	

function rubahstatus()
{
	var id = $('#id_book').val();
	var pesan = confirm('Apa Anda Yakin Merubah Status Pemesan?');
	if (pesan) {
		var target = "<?php echo site_url('booking/rubahstatus');  ?>";

		data = {
			idb : id
		}

		$.post(target,data,function(e)
		{
			var js = $.parseJSON(e);
			if (js.flag) {
				alert('Status Berhasil diubah');
			}else{
				alert('Status gagal diubah');
			}
			 location.reload();
		});
	}

	
}

function showmodalhargapromo(obj,IDB)
	{
		$('#note').hide();
		var target = "<?php echo site_url('booking/dettable'); ?>";
		var ket = '<div style="color:#e74c3c;" id="kkk"><i>*Tidak Ada Keterangan<i></div>';
		data = {
			idx : IDB
		}

		$.post(target,data, function(e){
			var json = $.parseJSON(e);

			$('#temejson').html(json.attr.dettema);
			$('#programjson').html(json.attr.detprogram);
			$('#instansijson').html(json.attr.detinstansi);
			$('#jumlahjson').html(json.attr.jmlpeserta+' Orang');
			$('#harijson').html(json.attr.hari+' Hari');
			$('#tanggaljson').html(json.attr.dateakhir);
			$('#id_book').val(json.attr.id_booking);
			$('#instansine').html(json.attr.kategoriins);

			$('#ketprodukwant').html(json.attr.ketproduk = (json.attr.ketproduk=='')?ket: json.attr.ketproduk);
		$('#ketprodukwantlainnya').html(json.attr.ketproduklainnya = (json.attr.ketproduklainnya=='')?ket:json.attr.ketproduklainnya);

		$('#keterangantemalainnya').html(json.attr.temalainnya = (json.attr.temalainnya=='')?ket: json.attr.temalainnya);
		$('#lokasipemesanan').html(json.attr.alamatpeserta = (json.attr.alamatpeserta=='')?ket: json.attr.alamatpeserta);

			console.log(json);
			changetabpromo(json);
		});

		$("#modalharga").modal("show");
	}

	function showmodalharga(obj,IDB)
	{
		$('#note').hide();
		var target = "<?php echo site_url('booking/dettable'); ?>";
		var ket = '<div style="color:#e74c3c;" id="kkk"><i>*Tidak Ada Keterangan<i></div>';
		data = {
			idx : IDB
		}

		$.post(target,data, function(e){
			var json = $.parseJSON(e);

			$('#temejson').html(json.dettema);
			$('#programjson').html(json.detprogram);
			$('#instansijson').html(json.detinstansi);
			$('#jumlahjson').html(json.jmlpeserta+' Orang');
			$('#harijson').html(json.hari+' Hari');
			$('#tanggaljson').html(json.dateakhir);
			$('#id_book').val(json.id_booking);
			$('#instansine').html(json.kategoriins);

			$('#ketprodukwant').html(json.ketproduk = (json.ketproduk=='')?ket: json.ketproduk);
		$('#ketprodukwantlainnya').html(json.ketproduklainnya = (json.ketproduklainnya=='')?ket:json.ketproduklainnya);

		$('#keterangantemalainnya').html(json.temalainnya = (json.temalainnya=='')?ket: json.temalainnya);
		$('#lokasipemesanan').html(json.alamatpeserta = (json.alamatpeserta=='')?ket: json.alamatpeserta);

			//console.log(json);
			changetab(json);
		});

		$("#modalharga").modal("show");
	}

	function tog()
	{
		 $("#note").toggle("slow");
	}

	function changetabpromo(json)
	{
		var table = document.getElementById("tableins");

		table.innerHTML = '';

		var Promo = table.insertRow()

		var jenis = 'Promo'; 

		var Col0 = Promo.insertCell(0);
		var Col1 = Promo.insertCell(1);

		Col1.colSpan = 7;
		Col1.style.background='#2091c9';
		Col0.style.background='#2091c9';
		Col1.style.color='white';

		Col0.innerHTML = '';
		Col1.innerHTML = jenis;
		Col1.className  = 'mid';

		for(p = 0; p < json.promo.length; p++)
		{
			var bodyPromo = table.insertRow();
			var Seq = eval(p)+eval(1);
			var id_personil = json.promo[p].id_personil;
			var keterangan = json.promo[p].keterangan;
			var satuan = json.promo[p].satuan;
			var harga = json.promo[p].harga;
			var jml = json.jmlpeserta;
			var hari = json.hari;

			var totharga = jml*harga; 

		var Col0 	= bodyPromo.insertCell(0);
		var Col1 	= bodyPromo.insertCell(1);
		var Col2 	= bodyPromo.insertCell(2);
		var Col3 	= bodyPromo.insertCell(3);
		var Col4 	= bodyPromo.insertCell(4);
		var Col5 	= bodyPromo.insertCell(5);
		var Col6 	= bodyPromo.insertCell(6);
		var Col7 	= bodyPromo.insertCell(7);

		Col6.className  = 'right';
		Col7.className  = 'right';
		Col0.innerHTML = '<input type="hidden" name="idp" value="'+id_personil+'">'+Seq ;
		Col1.innerHTML = keterangan;
		Col2.innerHTML  = jml;
		Col3.innerHTML  = hari;
		Col4.innerHTML  = jml;
		Col5.innerHTML  = satuan;
		Col6.innerHTML  = format2(eval(harga),"");
		Col7.innerHTML  = format2(eval(totharga),"");

		}

		var tambahan = table.insertRow()

		var jenis = 'Tambahan';

		var Col0 	= tambahan.insertCell(0);
		var Col1 	= tambahan.insertCell(1);

		Col1.colSpan = 7;
		Col1.style.background='#2091c9';
		Col0.style.background='#2091c9';
		Col1.style.color='white';

		Col0.innerHTML = '';
		Col1.innerHTML = jenis;
		Col1.className  = 'mid';

		for (y =0; y < json.tambahan.length; y++ )
		{
			var bodyTambahan = table.insertRow()
			var Seq = eval(y)+eval(1);
			var id_personil = json.tambahan[y].id_personil;
			var keterangan = json.tambahan[y].keterangan;
			var satuan = json.tambahan[y].satuan;
			var harga = json.tambahan[y].harga;
			var hari = json.hari;



			var Col0 	= bodyTambahan.insertCell(0);
			var Col1 	= bodyTambahan.insertCell(1);
			var Col2 	= bodyTambahan.insertCell(2);
			var Col3 	= bodyTambahan.insertCell(3);
			var Col4 	= bodyTambahan.insertCell(4);
			var Col5 	= bodyTambahan.insertCell(5);
			var Col6 	= bodyTambahan.insertCell(6);
			var Col7 	= bodyTambahan.insertCell(7);

			Col6.className = 'right';
			Col7.className = 'right';
			Col0.innerHTML =  (json.tambahan[y].id_personil=='')?'':'<input type="hidden" name="idp" value="'+id_personil+'">'+Seq;
			Col1.innerHTML =  (json.tambahan[y].keterangan=='')?'':keterangan;
			Col2.innerHTML  = (json.tambahan[y].id_personil=='')?'':jml;
			Col3.innerHTML  = (json.tambahan[y].id_personil=='')?'':'1';
			Col4.innerHTML  = (json.tambahan[y].id_personil=='')?'':jml;
			Col5.innerHTML  = (json.tambahan[y].satuan=='')?'':satuan;
			Col6.innerHTML  = (json.tambahan[y].id_personil=='')?'':format2(eval(harga),""); 
			Col7.innerHTML  = (json.tambahan[y].id_personil=='')?'':format2(eval(harga*jml),""); 	 
		
		}

		var colJumlah = table.insertRow();

		var jenis = 'Total';

		var Coljum0 = colJumlah.insertCell(0);
		var Coljum1 = colJumlah.insertCell(1);

		Coljum0.innerHTML = jenis;
		Coljum0.style.fontWeight = 'bold';
		Coljum0.colSpan = 7;

		
		var table = $('#tableins').find('tr');
		var total=0;
		$.each(table,function(i,v){
			var jumlah = $(this).find('td:eq(7)').text();
			var jumlah = jumlah.replace(/,|\.00/g,'');
			var jum = (jumlah == "")? 0:jumlah;
			total +=+ parseInt(jum);
			console.log(jumlah);
		});
		Coljum1.className = 'right';
		Coljum1.colSpan = 1;
		Coljum1.innerHTML = format2(eval(total),"");


	}

	function changetab(json)
	{
		console.log(json.tambahan);
		var table = document.getElementById("tableins");
		
		table.innerHTML = '';
		
		var Personal = table.insertRow()

		var jenis = 'Personal';

		var Col0 	= Personal.insertCell(0);
		var Col1 	= Personal.insertCell(1);

		Col1.colSpan = 7;
		Col1.style.background='#2091c9';
		Col0.style.background='#2091c9';
		Col1.style.color='white';

		Col0.innerHTML = '';
		Col1.innerHTML = jenis;
		Col1.className  = 'mid';



		for(i = 0; i < json.personal.length; i++)
		{
		var bodyPersonal = table.insertRow()
			var Seq = eval(i)+eval(1);
			var id_personil = json.personal[i].id_personil;
			var keterangan = json.personal[i].keterangan;
			var satuan = json.personal[i].satuan;
			var harga = json.personal[i].harga;
			var jml = json.jmlpeserta;
			var hari = json.hari;
			if (id_personil==1)
			 {
				var vol = eval(hari)*eval(4);	
			}else if(id_personil==2){
				var vol = '1';
			}else{
				var vol = '2';
			}
			var totharga = vol*harga;
		

		var Col0 	= bodyPersonal.insertCell(0);
		var Col1 	= bodyPersonal.insertCell(1);
		var Col2 	= bodyPersonal.insertCell(2);
		var Col3 	= bodyPersonal.insertCell(3);
		var Col4 	= bodyPersonal.insertCell(4);
		var Col5 	= bodyPersonal.insertCell(5);
		var Col6 	= bodyPersonal.insertCell(6);
		var Col7 	= bodyPersonal.insertCell(7);
	
		Col6.className  = 'right';
		Col7.className  = 'right';
		Col0.innerHTML = '<input type="hidden" name="idp" value="'+id_personil+'">'+Seq ;
		Col1.innerHTML = keterangan;
		Col2.innerHTML  = '';
		Col3.innerHTML  = '';
		Col4.innerHTML  = vol;
		Col5.innerHTML  = satuan;
		Col6.innerHTML  = format2(eval(harga),"");
		Col7.innerHTML  = format2(eval(totharga),"");

	}
	
		
		var NonPersonil = table.insertRow()

		var jenis = 'Non Personil';

		var Col0 	= NonPersonil.insertCell(0);
		var Col1 	= NonPersonil.insertCell(1);

		Col1.colSpan = 7;
		Col1.style.background='#2091c9';
		Col0.style.background='#2091c9';
		Col1.style.color='white';

		Col0.innerHTML = '';
		Col1.innerHTML = jenis;
		Col1.className  = 'mid';


		for(x = 0; x < json.nonpersonal.length; x++) {
			var bodyNonPersonal = table.insertRow()
			var Seq = eval(x)+eval(1);
			var id_personil = json.nonpersonal[x].id_personil;
			var keterangan = json.nonpersonal[x].keterangan;
			var satuan = json.nonpersonal[x].satuan;
			var harga = json.nonpersonal[x].harga;
			var hari = json.hari;
		
				if (hari==1) {
			var hari =1;
		}else if(hari >= 3){
			var hari = hari - 1;
		}


			if(id_personil==4){
				var hari = '1';
			}else if(id_personil==5){
				var hari = hari;
			}else if(id_personil==6){
				var hari = '1';
			}else if(id_personil==7){
				var hari = '1';
			}else if(id_personil==8){
				var hari ='1';
			}else if(id_personil==9){
				var hari = hari;
			}else {
				var hari = '';
			}

			if (id_personil==5) {
				var volNon = eval(hari)*eval(jml);
			}else if(id_personil==9) {
				var volNon = eval(hari)*eval(jml);
			}else if(id_personil==4){
				var volNon = eval(hari)*eval(jml);
			}else{
				var volNon = eval(hari)*eval(jml);
			}

			var totharga = vol*harga;


			var Col0 	= bodyNonPersonal.insertCell(0);
			var Col1 	= bodyNonPersonal.insertCell(1);
			var Col2 	= bodyNonPersonal.insertCell(2);
			var Col3 	= bodyNonPersonal.insertCell(3);
			var Col4 	= bodyNonPersonal.insertCell(4);
			var Col5 	= bodyNonPersonal.insertCell(5);
			var Col6 	= bodyNonPersonal.insertCell(6);
			var Col7 	= bodyNonPersonal.insertCell(7);

			Col6.className = 'right';
			Col7.className = 'right';
			Col0.innerHTML = '<input type="hidden" name="idp" value="'+id_personil+'">'+Seq ;
			Col1.innerHTML = keterangan;
			Col2.innerHTML  = jml;
			Col3.innerHTML  = hari;
			Col4.innerHTML  = volNon;
			Col5.innerHTML  = satuan;
			Col6.innerHTML  = format2(eval(harga),"");
			Col7.innerHTML  = format2(eval(volNon*harga),"");

			}

		var tambahan = table.insertRow()

		var jenis = 'Tambahan';

		var Col0 	= tambahan.insertCell(0);
		var Col1 	= tambahan.insertCell(1);

		Col1.colSpan = 7;
		Col1.style.background='#2091c9';
		Col0.style.background='#2091c9';
		Col1.style.color='white';

		Col0.innerHTML = '';
		Col1.innerHTML = jenis;
		Col1.className  = 'mid';

		for (y =0; y < json.tambahan.length; y++ )
		{
			var bodyTambahan = table.insertRow()
			var Seq = eval(y)+eval(1);
			var id_personil = json.tambahan[y].id_personil;
			var keterangan = json.tambahan[y].keterangan;
			var satuan = json.tambahan[y].satuan;
			var harga = json.tambahan[y].harga;
			var hari = json.hari;



			var Col0 	= bodyTambahan.insertCell(0);
			var Col1 	= bodyTambahan.insertCell(1);
			var Col2 	= bodyTambahan.insertCell(2);
			var Col3 	= bodyTambahan.insertCell(3);
			var Col4 	= bodyTambahan.insertCell(4);
			var Col5 	= bodyTambahan.insertCell(5);
			var Col6 	= bodyTambahan.insertCell(6);
			var Col7 	= bodyTambahan.insertCell(7);

			Col6.className = 'right';
			Col7.className = 'right';
			Col0.innerHTML =  (json.tambahan[y].id_personil=='')?'':'<input type="hidden" name="idp" value="'+id_personil+'">'+Seq;
			Col1.innerHTML =  (json.tambahan[y].keterangan=='')?'':keterangan;
			Col2.innerHTML  = (json.tambahan[y].id_personil=='')?'':jml;
			Col3.innerHTML  = '1';
			Col4.innerHTML  = (json.tambahan[y].id_personil=='')?'':jml;
			Col5.innerHTML  = (json.tambahan[y].satuan=='')?'':satuan;
			Col6.innerHTML  = (json.tambahan[y].id_personil=='')?'':format2(eval(harga),""); 
			Col7.innerHTML  = (json.tambahan[y].id_personil=='')?'':format2(eval(harga*jml),""); 	 
		
		}

		var colJumlah = table.insertRow();

		var jenis = 'Total';

		var Coljum0 = colJumlah.insertCell(0);
		var Coljum1 = colJumlah.insertCell(1);

		Coljum0.innerHTML = jenis;
		Coljum0.style.fontWeight = 'bold';
		Coljum0.colSpan = 7;

		
		var table = $('#tableins').find('tr');
		var total=0;
		$.each(table,function(i,v){
			var jumlah = $(this).find('td:eq(7)').text();
			var jumlah = jumlah.replace(/,|\.00/g,'');
			var jum = (jumlah == "")? 0:jumlah;
			total +=+ parseInt(jum);
			console.log(jumlah);
		});
		Coljum1.className = 'right';
		Coljum1.colSpan = 1;
		Coljum1.innerHTML = format2(eval(total),"");


	}

	

</script>

