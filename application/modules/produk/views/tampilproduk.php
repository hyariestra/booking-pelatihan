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

							<th>Nama Produk</th>

							<th>Keterangan</th>

							<th>Harga Produk</th>

							
							<th>Aksi</th>

						</tr>

					</thead>

					<tbody>

					<?php foreach ($tampilproduk as $key => $value): ?>

						

					<!-- karena data banyak dan array , ditampilkan pakai foreach -->

						<tr>

							<td><?php echo $key+=1; ?>
								<input type="hidden" id="idtable" value="<?php echo $value['id_produk_want'] ?>" name="">
							</td>

							<td><?php echo $value['nama_produk']; ?></td>

							<td><?php echo $value['keterangan']; ?></td>

							<td><?php echo $value['harga_produk']; ?></td>
							

						

						<td>
							<button onclick="ambildata(this,'<?php echo $value['id_produk_want'] ?>')" class="btn btn-sm btn-warning" style="margin-bottom:10px;">
								<span class="glyphicon glyphicon-pencil">

								</span> Edit Data
							</button>

							<button onclick="hapusdata(this,'<?php echo $value['id_produk_want'] ?>')" class="btn btn-sm btn-danger" style="margin-bottom:10px;">
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
				<h4 class="modal-title">Tambah Data Produk</h4>  
			</div>     
			<div class="modal-body">     
				<div class="form-horizontal">   
					<form id="formTambah">   
						<div class="row"> 
							<div class="col-sm-12">     
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Nama Produk:</label>    
									<div class="col-sm-8">     
										<input class="form-control" id="namaprod" name="namaprod" value=""/>           
									</div>        
								</div>    
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Keterangan:</label>    
									<div class="col-sm-8">     
										<input class="form-control" id="keterangan" name="keterangan" value=""/>           
									</div>        
								</div>   
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Harga :</label>    
									<div class="col-sm-8">     
										<input type="number" class="form-control" id="harga" name="harga" value=""/>           
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
				<h4 class="modal-title">Ubah Data Produk</h4>  
			</div>     
			<div class="modal-body">     
				<div class="form-horizontal">   
					<form id="formUbah">   
						<div class="row"> 
							<!-- <input type="text" name="idins" id="idins" /> -->
							<div class="col-sm-12">     
								<div class="form-group">  
								<input type="hidden" class="form-control" id="ubahID" name="ubahID" value=""/> 
									<label for="Nomor" class="col-sm-3  control-label">Nama Produk</label>    
									<div class="col-sm-8">     
										<input class="form-control" id="ubahnama" name="ubahnama" value=""/>           
									</div>        
								</div>    
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Keterangan:</label>    
									<div class="col-sm-8">     
										<input class="form-control" id="ubahket" name="ubahket" value=""/>           
									</div>        
								</div>   
								<div class="form-group">   
									<label for="Nomor" class="col-sm-3  control-label">Harga :</label>    
									<div class="col-sm-8">     
										<input type="number" class="form-control" id="ubahharga" name="ubahharga" value=""/>           
									</div>        
								</div>      
							</div>   
						</div>   
					</form>   
				</div>   
			</div>   
			<div class="modal-footer">      
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button> 
				<button type="button" class="btn btn-primary" onclick="simpanubah(this,'<?php echo $value['id_produk_want'] ?>')">Simpan Data</button> 
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


	function simpanubah(obj,IDins)
	{
		idNye           = $('#ubahID').val();
		row             = $('#tabelku').find("#idtable[value='"+idNye+"']").parent().parent();
		target  = "<?php echo site_url('produk/simpanubah')?>";
		data 	= $('#formUbah').serialize();


		if($('#ubahnama').val() == '')
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
                        'Edit <input id="idtable" type="hidden" value="'+js.id_produk_want+'"/>',
                        js.nama_produk,
                        js.keterangan,
                        js.harga_produk,
                        '<td><button onclick="ambildata(this,'+ js.id_produk_want +')" class="btn btn-sm btn-warning" style="margin-bottom:10px;"><span class="glyphicon glyphicon-pencil"></span>Edit Data</button><button onclick="hapusdata(this,'+ js.id_produk_want +')" class="btn btn-sm btn-danger" style="margin-bottom:10px;"><span class="glyphicon glyphicon-trash"></span> Hapus Data</button></td>' ], row[0] );
  	 	});
		$("#xmodalubahx").modal("hide");
	}

	function simpanins()
	 {


		target  = "<?php echo site_url('produk/simpanproduk')?>";
		data 	= $('#formTambah').serialize();

		if($('#namaprod').val() == '')
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
  	 					 'Data Baru <input id="idtable" type="hidden" value="'+js.jsonval[0].id_produk_want+'"/>',
						js.jsonval[0].nama_produk,
						js.jsonval[0].keterangan,
						js.jsonval[0].harga_produk,
						'<td><button onclick="ambildata(this,'+ js.jsonval[0].id_produk_want +')" class="btn btn-sm btn-warning" style="margin-bottom:10px;"><span class="glyphicon glyphicon-pencil"></span>Edit Data</button><button onclick="hapusdata(this,'+ js.jsonval[0].id_produk_want +')" class="btn btn-sm btn-danger" style="margin-bottom:10px;"><span class="glyphicon glyphicon-trash"></span> Hapus Data</button></td>'
						] );	
  	 	$("#formTambah")[0].reset();
  	 	});
		$("#xmodalx").modal("hide");	
  	 	
	}


	function hapusdata(obj,IDins)
	{
		var idNye   = $(obj).parent().parent().find('#idtable').val();
		var row     = $('#tabelku').find('#idtable[value="'+idNye+'"]').parent().parent();
		var msg  = confirm("Apa anda yakin menghapus data ini?");

		if (msg) {
			var target = "<?php echo site_url("produk/hapusdata") ?>";

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