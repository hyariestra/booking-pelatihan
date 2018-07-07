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

							<th>Nama Kategori Instansi</th>

							<th>Nama Alias</th>

							<th>Harga</th>

							
							<th>Aksi</th>

						</tr>

					</thead>

					<tbody>

					<?php foreach ($tampilinstansi as $key => $value): ?>

						

					<!-- karena data banyak dan array , ditampilkan pakai foreach -->

						<tr>

							<td><?php echo $key+=1; ?></td>

							<td><?php echo $value['nama_instansi']; ?></td>

							<td><?php echo $value['nama_alias']; ?></td>

							<td><?php echo $value['harga_ins']; ?></td>
							

						

						<td>
							<button onclick="ambilins(this,'<?php echo $value['id_kat_instansi'] ?>')" class="btn btn-sm btn-warning" style="margin-bottom:10px;">
								<span class="glyphicon glyphicon-pencil">

								</span> Edit Data
							</button>

							<!-- <button onclick="hapusins(this,'<?php echo $value['id_kat_instansi'] ?>')" class="btn btn-sm btn-danger" style="margin-bottom:10px;">
								<span class="glyphicon glyphicon-trash">

								</span> Hapus Data
							</button> -->
							

						</td>

						<?php endforeach ?>

						</tr>

					</tbody>

				</table>

				
			</div>

			<!-- <div class="box-footer">

				<button onclick="tambahins()" class="btn btn-sm btn-success" style="margin-bottom:10px;">
				<span class="glyphicon glyphicon-plus-sign">
				
			</span> Tambah Data
			</button>

				

			</div> -->

			

		</div>

		

	</div>

	

</div>


<div class="modal fade" id="xmodalx"> 
	<div class="modal-dialog">
		<div class="modal-content">  
			<div class="modal-header">     
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>       
				<h4 class="modal-title">Tambah Data Kategori Instansi</h4>  
			</div>     
			<div class="modal-body">     
				<div class="form-horizontal">   
					<form id="formTambah">   
						<div class="row"> 
							<div class="col-sm-12">     
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Nama Instansi:</label>    
									<div class="col-sm-8">     
										<input class="form-control" id="namains" name="namains" value=""/>           
									</div>        
								</div>    
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Nama Alias:</label>    
									<div class="col-sm-8">     
										<input class="form-control" id="namaalias" name="namaalias" value=""/>           
									</div>        
								</div>   
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Harga :</label>    
									<div class="col-sm-8">     
										<input type="number" class="form-control" id="hargains" name="hargains" value=""/>           
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
							<!-- <input type="text" name="idins" id="idins" /> -->
							<div class="col-sm-12">     
								<div class="form-group">  
								<input type="hidden" class="form-control" id="ubahIDins" name="ubahIDins" value=""/> 
									<label for="Nomor" class="col-sm-3  control-label">Nama Instansi:</label>    
									<div class="col-sm-8">     
										<input class="form-control" id="ubahnamains" name="ubahnamains" value=""/>           
									</div>        
								</div>    
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Nama Alias:</label>    
									<div class="col-sm-8">     
										<input class="form-control" id="ubahnamaalias" name="ubahnamaalias" value=""/>           
									</div>        
								</div>   
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Harga :</label>    
									<div class="col-sm-8">     
										<input type="number" class="form-control" id="ubahhargains" name="ubahhargains" value=""/>           
									</div>        
								</div>      
							</div>   
						</div>   
					</form>   
				</div>   
			</div>   
			<div class="modal-footer">      
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
				<button type="button" class="btn btn-primary" onclick="simpanubahins(this,'<?php echo $value['id_kat_instansi'] ?>')">Simpan Data</button> 
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

		
		var target		= "<?php echo site_url("instansi/getdatains")?>";
		data		= {
			idx : IDins
		}

		$('#alertMessage').remove();

		$.post(target, data, function(e){

			var json = $.parseJSON(e);

	    	// console.log(json); return false;

	    	$('#ubahIDins').val(json.ins.id_kat_instansi);
	    	$('#ubahnamains').val(json.ins.nama_instansi);
	    	$('#ubahnamaalias').val(json.ins.nama_alias);
	    	$('#ubahhargains').val(json.ins.harga_ins);

	    	$("#xmodalubahx").modal("show");
	    });

	}


	function simpanubahins(obj,IDins)
	{


		target  = "<?php echo site_url('instansi/simpanubahins')?>";
		data 	= $('#formUbah').serialize();

		if($('#ubahnamains').val() == '')
		{
			alert('masih ada data yang kosong');
			return false;
		}

		$.post(target,data,function(e){
			var js 	= $.parseJSON(e);
  	 		//console.log(e);

  	 		if(js.flag)
  	 		{
  	 			
  	 			alert('Data berhasil disimpan...');
  	 		}
  	 		else
  	 		{
  	 			alert('gagal');
  	 		}

  	 		$('html, body').css('overflow-y','auto');
  	 	});
		$("#xmodalubahx").modal("hide");	
		location.reload();
	}

	function simpanins()
	 {

	 	

		target  = "<?php echo site_url('instansi/simpanins')?>";
		data 	= $('#formTambah').serialize();

		if($('#namains').val() == '')
		{
			alert('masih ada data yang kosong');
			return false;
		}

		$.post(target,data,function(e){
			var js 	= $.parseJSON(e);
  	 	console.log(js.jsoninstansi);

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
						js.jsoninstansi[0].nama_instansi,
						js.jsoninstansi[0].nama_alias,
						js.jsoninstansi[0].harga_ins,
						'<td><button onclick="ambilins(this,'+ js.jsoninstansi[0].id_kat_instansi +')" class="btn btn-sm btn-warning" style="margin-bottom:10px;"><span class="glyphicon glyphicon-pencil"></span> Edit Data</button><button onclick="hapusins(this,'+ js.jsoninstansi[0].id_kat_instansi +')" class="btn btn-sm btn-danger" style="margin-bottom:10px;"><span class="glyphicon glyphicon-trash"></span> Hapus Data</button></td>'
						] );	
  	 	$("#formTambah")[0].reset();
  	 	});
		$("#xmodalx").modal("hide");	 
  	 	
	}



function hapusins(obj,IDins)
	{
		var msg  = confirm("Apa anda yakin menghapus data ini?");

		if (msg) {
			var target = "<?php echo site_url("instansi/hapusins") ?>";

			data = {
				idx : IDins
			}
			$.post(target,data,function(e)
			{
				var js = $.parseJSON(e);
				if (js.flag) {
					alert('Data Berhasil di hapus');
				}else{
					alert('Data gagal dihapus, Kelompok Masih memiliki Mahasiswa');
				}
				location.reload();
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