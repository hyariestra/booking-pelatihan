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

							<th>Nama Paket</th>

							<th>Nama Kategori</th>

							<th>Fasiltas Paket</th>
							<th>Jumlah Hari</th>
							<th>Keterangan</th>
							<th>Harga Paket</th>
							<th>Promo</th>
							
							
							<th>Aksi</th>

						</tr>

					</thead>

					<tbody>

					<?php foreach ($tampilpaket as $key => $value): 
					if ($value['ispromo']==1) {
						$redeyesblackdragon = 'Tidak Aktif';
					}else{
						$redeyesblackdragon = 'Aftif';
					}

					 ?>
					<!-- karena data banyak dan array , ditampilkan pakai foreach -->
						<tr>

							<td><?php echo $key+=1; ?>
								<input type="hidden" id="idtable" value="<?php echo $value['id_paket'] ?>" name="">
							</td>
							<td><?php echo $value['nama_paket']; ?></td>

							<td><a title="<?php echo $value['nama_instansi'] ?>" href="#"><?php echo $value['nama_alias'] ?></a></td>

							<td><?php echo $value['fasilitas_paket']; ?></td>
							<td><?php echo $value['jumlah_hari']; ?> Hari</td>
						
							<td>
								<ul>
									<?php 

									$fasilitas = explode(',', $value['id_personil']);
									foreach ($fasilitas as $key => $val) {
										$query = $this->db->query("SELECT*FROM mst_personil WHERE id_personil = '".$val."' ");
										

										?>

										<li><?php echo $query->first_row()->keterangan; ?></li>	
										<?php } ?>
										
										
									</ul>
								</td>
							<td><?php echo $value['harga_paket']; ?></td>
							<td><?php echo $redeyesblackdragon ?></td>
							

						<td>
							<button onclick="ambilins(this,'<?php echo $value['id_paket'] ?>')" class="btn btn-sm btn-warning" style="margin-bottom:10px;">
								<span class="glyphicon glyphicon-pencil">

								</span> Edit Data
							</button>

							<button onclick="hapusins(this,'<?php echo $value['id_paket'] ?>')" class="btn btn-sm btn-danger" style="margin-bottom:10px;">
								<span class="glyphicon glyphicon-trash">

								</span> Hapus Data
							</button>
							

						</td>

						<?php endforeach ?>

						</tr>

					</tbody>

				</table>

				
			</div>

			<div class="box-footer">

				<button onclick="tambahins()" class="btn btn-sm btn-success" style="margin-bottom:10px;">
				<span class="glyphicon glyphicon-plus-sign">
				
			</span> Tambah Data
			</button>

				

			</div>

			

		</div>

		

	</div>

	

</div>


<div class="modal fade" id="xmodalx"> 
	<div class="modal-dialog">
		<div class="modal-content">  
			<div class="modal-header">     
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>       
				<h4 class="modal-title">Tambah Data Paket</h4>  
			</div>     
			<div class="modal-body">     
				<div class="form-horizontal">   
					<form id="formTambah">   
						<div class="row"> 
							<div class="col-sm-12">     
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Nama Paket:</label>    
									<div class="col-sm-8">     
										<input class="form-control" id="namapaket" name="namapaket" value=""/>           
									</div>        
								</div>    
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Kategori Instansi:</label>   
									<div class="col-md-8">
										<select class="form-control" name="id_kategori">

											<option value="">Pilih Kategori</option>

											<?php foreach ($kategori as $key => $value): ?>

												<option value="<?php echo $value['id_kat_instansi']; ?>"><?php echo $value['nama_alias']; ?>/<?php echo $value['nama_instansi']; ?></option>



											<?php endforeach ?>

										</select>    
									</div>    
								</div>   

								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Produk Yang Diinginkan:</label>   
									<div class="col-md-8">
										<select class="form-control" name="id_kategori">

											<option value="">Pilih produk</option>

											<?php foreach ($produk as $key => $value): ?>

												<option value="<?php echo $value['id_produk_want']; ?>"><?php echo $value['nama_produk']; ?></option>



											<?php endforeach ?>

										</select>    
									</div>    
								</div>


								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Jumlah Hari Paket :</label>    
									<div class="col-sm-8">     
										<input type="number" class="form-control" id="jmlhari" name="jmlhari" value=""/>           
									</div>        
								</div> 
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Keterangan :</label>    
										<!-- use id="editorku if u want use ckeditor" -->
									<div class="col-sm-8">     
									<textarea name="keterangan" class="form-control" id=""></textarea>        
									</div>        
								</div>    
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Harga Paket :</label>    
									<div class="col-sm-8">     
										<input type="number" class="form-control" id="hargapaket" name="hargapaket" value=""/>           
									</div>        
								</div> 
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Harga Paket :</label>    
									<div class="col-md-6">
									<?php foreach ($tambahan as $key => $value): ?>
										<div style="padding: 0;margin: 0;" class="checkbox">
											<label class="spanlabel">
												<input class="" value="<?php echo $value['id_personil'] ?>" type="checkbox" name="addons[]"><?php echo $value['keterangan'] ?>
											</label>
										</div>
									<?php endforeach ?>
									</div>        
								</div>
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Promo :</label>    
									<div class="col-sm-8">     
										<select class="form-control" name="ispromo">
											<option value="1">Tidak Aktif</option>
											<option value="2">Aktif</option>
										</select>         
									</div>        
								</div>
								<div class="form-group">
									<div class="col-sm-3">
										
									</div>
									<div class="col-sm-8">
										<small><i style="color: red;">*jika status aktif, maka akan ditampilkan di halaman depan</i></small>
										
									</div>
								</div>
							</div>   
						</div>   
					</form>   
				</div>   
			</div>   
			<div class="modal-footer">      
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
				<button type="button" class="btn btn-primary" onclick="simpanins()">Simpan Data</button> 
			</div>  
		</div><!-- /.modal-content -->  
	</div><!-- /.modal-dialog -->
</div>

<div class="modal fade" id="xmodalubahx"> 
	<div class="modal-dialog">
		<div class="modal-content">  
			<div class="modal-header">     
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>       
				<h4 class="modal-title">Ubah Data Kategori Instansi</h4>  
			</div>     
			<div class="modal-body">     
				<div class="form-horizontal">   
					<form id="formUbah">   
						<div class="row"> 
							<div class="col-sm-12">     
								<div class="form-group"> 
								<input type="hidden" class="form-control" id="ubahIDpaket" name="ubahIDpaket" value=""/>   
									<label for="Nomor" class="col-sm-3  control-label">Nama Paket:</label>    
									<div class="col-sm-8">     
										<input class="form-control" id="ubahnamapaket" name="ubahnamapaket" value=""/>           
									</div>        
								</div>    
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Kategori Instansi:</label>   
									<div class="col-md-8">
										<select class="form-control" id="ubahid_kategori" name="ubahid_kategori">

											<option value="">Pilih Kategori</option>

											<?php foreach ($kategori as $key => $value): ?>

												<option value="<?php echo $value['id_kat_instansi']; ?>"><?php echo $value['nama_alias']; ?>/<?php echo $value['nama_instansi']; ?></option>



											<?php endforeach ?>

										</select>    
									</div>    
								</div>   
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Jumlah Hari Paket :</label>    
									<div class="col-sm-8">     
										<input type="number" class="form-control" id="ubahjmlhari" name="ubahjmlhari" value=""/>           
									</div>        
								</div> 
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Fasilitas Paket :</label>    
										<!-- use id="editorku if u want use ckeditor" -->
									<div class="col-sm-8">     
									<textarea name="ubahketerangan" class="form-control" id="ubahketerangan"></textarea>        
									</div>        
								</div>    
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Harga Paket :</label>    
									<div class="col-sm-8">     
										<input type="number" class="form-control" id="ubahhargapaket" name="ubahhargapaket" value=""/>           
									</div>        
								</div> 
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Harga Paket :</label>    
									<div class="col-md-6">
									<?php foreach ($tambahan as $key => $value): ?>
										<div style="padding: 0;margin: 0;" class="checkbox">
											<label class="spanlabel">
												<input class="" value="<?php echo $value['id_personil'] ?>" type="checkbox" name="addonsEdit[]"><?php echo $value['keterangan'] ?>
											</label>
										</div>
									<?php endforeach ?>
									</div>        
								</div>
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Promo :</label>    
									<div class="col-sm-8">     
										<select class="form-control" id="ispromoID" name="ubahispromo">
											<option value="1">Tidak Aktif</option>
											<option value="2">Aktif</option>
										</select>         
									</div>        
								</div>
								<div class="form-group">
									<div class="col-sm-3">
										
									</div>
									<div class="col-sm-8">
										<small><i style="color: red;">*jika status aktif, maka akan ditampilkan di halaman depan</i></small>
										
									</div>
								</div>
							</div>   
						</div>   
					</form>   
				</div>   
			</div>   
			<div class="modal-footer">      
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
				<button type="button" class="btn btn-primary" onclick="simpanubahins(this,'<?php echo $value['id_personil'] ?>')">Simpan Data</button> 
			</div>  
		</div><!-- /.modal-content -->  
	</div><!-- /.modal-dialog -->
</div>




<script type="text/javascript">
	function tambahins()
	 {

		 $("#xmodalx").modal("show"); 
	}

	function ambilins(obj,IDins)
	{

/*
$("input[name='addonsEdit[]']");
				for (x = 0; x < $("input[name='addonsEdit[]']").length; x++ )
				{
					var idcek = $("input[name='addonsEdit[]']").eq(x).val();
			//console.log($("input[name='addonsEdit[]']").eq(x).val());
				if (idcek==v) {
					console.log(true);
					$("input[name='addonsEdit[]'][value='"+idcek+"']").prop("checked",true);
				}else{
					console.log(false);
				}

				}*/
		$("input[name='addonsEdit[]']").prop("checked",false);
		var target		= "<?php echo site_url("paket/getdatains")?>";
		data		= {
			idx : IDins
		}

		$('#alertMessage').remove();

		$.post(target, data, function(e){

			var json = $.parseJSON(e);
			var id_personil = json.ins.id_personil;
			id_personilsplit = id_personil.split(',');
			
			$.each(id_personilsplit,function(i,v){
				$("input[name='addonsEdit[]'][value='"+v+"']").prop("checked",true);
			});

	    	//return false;

	    	$('#ubahIDpaket').val(json.ins.id_paket);
	    	$('#ubahid_kategori').val(json.ins.id_kat_instansi);
	    	$('#ubahnamapaket').val(json.ins.nama_paket);
	    	$('#ubahketerangan').val(json.ins.fasilitas_paket);
	    	$('#ubahjmlhari').val(json.ins.jumlah_hari);
	    	$('#ubahhargapaket').val(json.ins.harga_paket);
	    	$('#ispromoID').val(json.ins.ispromo);
	    	

	    	$("#xmodalubahx").modal("show");
	    });

	}


	function simpanubahins(obj,IDins)
	{

		idNye           = $('#ubahIDpaket').val();
		row             = $('#tabelku').find("#idtable[value='"+idNye+"']").parent().parent();
		target  = "<?php echo site_url('paket/simpanubahins')?>";
		data 	= $('#formUbah').serialize();

		if($('#ubahnamapaket').val() == '')
		{
			alert('masih ada data yang kosong');
			return false;
		}

		$.post(target,data,function(e){
			var js 	= $.parseJSON(e);
  	 		console.log(e);
  	 		//return false;
  	 		if(js.flag)
  	 		{
  	 			
  	 			alert('Data berhasil disimpan...');
  	 		}
  	 		else
  	 		{
  	 			alert('gagal');
  	 		}


		 $('#tabelku').dataTable().fnUpdate( [
                       'Edit <input id="idtable" type="hidden" value="'+ js.id_paket +'"/>',
                        js.nama_paket,
                      '<a title="'+ js.nama_instansi +'" href="#">'+ js.nama_alias +'</a>',
                        js.fasilitas_paket,
                        js.jumlah_hari+ 'Hari',
                       '<ul><li>'+ js.fasilitas +'</li></ul>',
                        js.harga_paket,
                        js.status,
                        '<td><button onclick="ambilins(this,'+ js.id_paket +')" class="btn btn-sm btn-warning" style="margin-bottom:10px;"><span class="glyphicon glyphicon-pencil"></span>Edit Data</button><button onclick="hapusins(this,'+ js.id_paket +')" class="btn btn-sm btn-danger" style="margin-bottom:10px;"><span class="glyphicon glyphicon-trash"></span> Hapus Data</button></td>' ], row[0] );
  	 	});
		$("#xmodalubahx").modal("hide");	
		
	}

	function simpanins()
	 {

	 	

		target  = "<?php echo site_url('paket/simpanins')?>";
		data 	= $('#formTambah').serialize();

		if($('#namapaket').val() == '')
		{
			alert('masih ada data yang kosong');
			return false;
		}

		$.post(target,data,function(e){
			var js 	= $.parseJSON(e);
  	 	console.log(js.jsonvalue);

  	 		if(js.flag)
  	 		{
  	 			
  	 			alert('Data berhasil disimpan...');
  	 		}
  	 		else
  	 		{
  	 			alert('gagal');
  	 		}

  	 	$('#tabelku').dataTable().fnAddData( [
  	 					'Data Baru',
						js.jsonvalue[0].nama_paket,
						'<a title="'+ js.jsonvalue[0].nama_instansi +'" href="#">'+ js.jsonvalue[0].nama_alias +'</a>',
						js.jsonvalue[0].fasilitas_paket,
						js.jsonvalue[0].jumlah_hari,
						'<ul><li>'+js.jsonvalue[0].fasilitas+'</li></ul>',
						js.jsonvalue[0].harga_paket,
						js.jsonvalue[0].status,
						'<td><button onclick="ambilins(this,'+ js.jsonvalue[0].id_paket +')" class="btn btn-sm btn-warning" style="margin-bottom:10px;"><span class="glyphicon glyphicon-pencil"></span> Edit Data</button><button onclick="hapusins(this,'+ js.jsonvalue[0].id_paket +')" class="btn btn-sm btn-danger" style="margin-bottom:10px;"><span class="glyphicon glyphicon-trash"></span> Hapus Data</button></td>'
						] );	
  	 	$("#formTambah")[0].reset();
  	 	});
		$("#xmodalx").modal("hide");	 
  	 	
	}



function hapusins(obj,IDins)
	{
		var idNye   = $(obj).parent().parent().find('#idtable').val();
		var row     = $('#tabelku').find('#idtable[value="'+idNye+'"]').parent().parent();
		var msg  = confirm("Apa anda yakin menghapus data ini?");

		if (msg) {
			var target = "<?php echo site_url("paket/hapusins") ?>";

			data = {
				idx : IDins
			}
			$.post(target,data,function(e)
			{
				var js = $.parseJSON(e);
				if (js.flag) {
					alert('Data Berhasil di hapus');
				}else{
					alert('Data gagal dihapus');
				}
				$('#tabelku').dataTable().fnDeleteRow(row[0], null, true);
			});
		}
	}

	function resetForm($form) {
		$form.find('input:text, input:password, input:file, select, textarea').val('');
		$form.find('input:radio, input:checkbox')
		$form.find('innerHTML').val('')
		.removeAttr('checked').removeAttr('selected');
	}
	


	
</script>