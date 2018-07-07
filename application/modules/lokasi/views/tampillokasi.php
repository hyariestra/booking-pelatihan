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

							<th>Nama Program</th>

							<th>Keterangan Program</th>

							<th>Paket Harga</th>

							
							<th>Aksi</th>

						</tr>

					</thead>

					<tbody>

					<?php foreach ($tampillokasi as $key => $value): ?>

						

					<!-- karena data banyak dan array , ditampilkan pakai foreach -->

						<tr>

							<td><?php echo $key+=1; ?>
								<input type="hidden" id="idtable" value="<?php echo $value['id_lokasi_program'] ?>" name="">
							</td>

							<td><?php echo $value['nama_program']; ?></td>

							<td><?php echo $value['keterangan_program']; ?></td>

							<td><?php echo $value['harga_program']; ?></td>
							

						

						<td>
							<button onclick="ambildatalokasi(this,'<?php echo $value['id_lokasi_program'] ?>')" class="btn btn-sm btn-warning" style="margin-bottom:10px;">
								<span class="glyphicon glyphicon-pencil">

								</span> Edit Data
							</button>

							<button onclick="hapuslok(this,'<?php echo $value['id_lokasi_program'] ?>')" class="btn btn-sm btn-danger" style="margin-bottom:10px;">
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
				<h4 class="modal-title">Tambah Data Lokasi Program</h4>  
			</div>     
			<div class="modal-body">     
				<div class="form-horizontal">   
					<form id="formTambah">   
						<div class="row"> 
							<div class="col-sm-12">     
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Nama Program:</label>    
									<div class="col-sm-8">     
										<input class="form-control" id="namaprog" name="namaprog" value=""/>           
									</div>        
								</div>    
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Keterangan:</label>    
									<div class="col-sm-8">     
										<input class="form-control" id="ketprog" name="ketprog" value=""/>           
									</div>        
								</div>   
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Harga :</label>    
									<div class="col-sm-8">     
										<input type="number" class="form-control" id="hargaprog" name="hargaprog" value=""/>           
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
								<input type="hidden" class="form-control" id="ubahIDlok" name="ubahIDlok" value=""/> 
									<label for="Nomor" class="col-sm-3  control-label">Nama Program/Lokasi:</label>    
									<div class="col-sm-8">     
										<input class="form-control" id="ubahnamalok" name="ubahnamalok" value=""/>           
									</div>        
								</div>    
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Keterangan:</label>    
									<div class="col-sm-8">     
										<input class="form-control" id="ubahketlok" name="ubahketlok" value=""/>           
									</div>        
								</div>   
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Harga :</label>    
									<div class="col-sm-8">     
										<input type="number" class="form-control" id="ubahhargalok" name="ubahhargalok" value=""/>           
									</div>        
								</div>      
							</div>   
						</div>   
					</form>   
				</div>   
			</div>   
			<div class="modal-footer">      
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
				<button type="button" class="btn btn-primary" onclick="simpanubahlok(this,'<?php echo $value['id_lokasi_program'] ?>')">Simpan Data</button> 
			</div>  
		</div><!-- /.modal-content -->  
	</div><!-- /.modal-dialog -->
</div>




<script type="text/javascript">

	function tambahins()
	 {

		 $("#xmodalx").modal("show"); 
	}

	function reload_table()
	{
  location.reload();
}

	function ambildatalokasi(obj,IDins)
	{

		
		var target		= "<?php echo site_url("lokasi/getdatalokasi")?>";
		data		= {
			idx : IDins
		}
		

		$('#alertMessage').remove();

		$.post(target, data, function(e){

			var json = $.parseJSON(e);
	    	// console.log(json); return false;

	    	$('#ubahIDlok').val(json.ins.id_lokasi_program);
	    	$('#ubahnamalok').val(json.ins.nama_program);
	    	$('#ubahketlok').val(json.ins.keterangan_program);
	    	$('#ubahhargalok').val(json.ins.harga_program);

	    	$("#xmodalubahx").modal("show");
	    });

	}


	function simpanubahlok(obj,IDins)
	{
		idNye           = $('#ubahIDlok').val();
		row             = $('#tabelku').find("#idtable[value='"+idNye+"']").parent().parent();
		target  = "<?php echo site_url('lokasi/simpanubahlok')?>";
		data 	= $('#formUbah').serialize();


		if($('#ubahnamalok').val() == '')
		{
			alert('masih ada data yang kosong');
			return false;
		}

		$.post(target,data,function(e){
			var js 	= $.parseJSON(e);
  	 		console.log(idNye);

  	 		if(js.flag)
  	 		{
  	 			
  	 			alert('Data berhasil dirubah...');
  	 		}
  	 		else
  	 		{
  	 			alert('gagal');
  	 		}

  	  $('#tabelku').dataTable().fnUpdate( [
                        'Edit <input id="idtable" type="hidden" value="'+js.id_lokasi_program+'"/>',
                        js.nama_program,
                        js.keterangan_program,
                        js.harga_program,
                        '<td><button onclick="ambildatalokasi(this,'+ js.id_lokasi_program +')" class="btn btn-sm btn-warning" style="margin-bottom:10px;"><span class="glyphicon glyphicon-pencil"></span>Edit Data</button><button onclick="hapuslok(this,'+ js.id_lokasi_program +')" class="btn btn-sm btn-danger" style="margin-bottom:10px;"><span class="glyphicon glyphicon-trash"></span> Hapus Data</button></td>' ], row[0] );
  	 	});
		$("#xmodalubahx").modal("hide");
	}

	function simpanins()
	 {


		target  = "<?php echo site_url('lokasi/simpanlokasi')?>";
		data 	= $('#formTambah').serialize();

		if($('#namaprog').val() == '')
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

  	 	$('#tabelku').dataTable().fnAddData( [
  	 					 'Data Baru <input id="idtable" type="hidden" value="'+js.jsonval[0].id_lokasi_program+'"/>',
						js.jsonval[0].nama_program,
						js.jsonval[0].keterangan_program,
						js.jsonval[0].harga_program,
						'<td><button onclick="ambildatalokasi(this,'+ js.jsonval[0].id_lokasi_program +')" class="btn btn-sm btn-warning" style="margin-bottom:10px;"><span class="glyphicon glyphicon-pencil"></span>Edit Data</button><button onclick="hapuslok(this,'+ js.jsonval[0].id_lokasi_program +')" class="btn btn-sm btn-danger" style="margin-bottom:10px;"><span class="glyphicon glyphicon-trash"></span> Hapus Data</button></td>'
						] );	
  	 	$("#formTambah")[0].reset();
  	 	});
		$("#xmodalx").modal("hide");	
  	 	
	}


function hapuslok(obj,IDins)
	{
		var idNye   = $(obj).parent().parent().find('#idtable').val();
		var row     = $('#tabelku').find('#idtable[value="'+idNye+'"]').parent().parent();
		var msg  = confirm("Apa anda yakin menghapus data ini?");

		if (msg) {
			var target = "<?php echo site_url("lokasi/hapuslok") ?>";

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


	
</script>