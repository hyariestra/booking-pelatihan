<div class="row">

	<div class="col-md-12">

		<div class="box">

			<div class="box-header">

				<h3 class="box-title"><?php echo $judul ?></h3>

			</div>

			<div class="box-body">
				
					
				
				<style type="text/css">
				

.container{
    margin: 0 auto;
}


.edit{
    width: 100%;
    height: 25px;
}
.editMode{
    /*border: 1px solid black;*/
 
}

 thead{
 	text-align: center;
 }


.txtedit{
    display: none;
    width: 99%;
    height: 30px;
}

/* Table Layout */




.tg .tg-wsnc{background-color:#66b8e7;text-align: center;}
.tg .tg-v7c1{background-color:#66b8e7;vertical-align:top;text-align: center;}
.tg .tg-hxtd{background-color:#96fffb;vertical-align:top}
.tg .tg-yw4l{vertical-align:top}
</style>
<div style="overflow-x:auto;">
<table class="tg table table-bordered table-striped">
	<thead>
		<tr>
			<th class="tg-wsnc" rowspan="2">No</th>
			<th class="tg-wsnc" rowspan="2">Rincian Keterangan Personil</th>
			<th class="tg-wsnc" rowspan="2">Satuan</th>
			<th class="tg-v7c1" colspan="6">Harga Satuan (Rp)</th>
		</tr>

		<tr>
			<?php foreach ($instansi as $key => $value) {

				?>
				<td class="tg-hxtd"><?php echo $value['nama_instansi'] ?></td>
				<?php } ?>
			</tr>
			<tr style="background:#2091c9;">
				<td></td>
				<td colspan="8" style="text-align:left;color:#fff;">Personal</td>
			</tr>
		</thead>
		<tbody>

			<?php foreach ($tampilpersonil1 as $key => $value): ?>
				<tr>

					<td><?php echo $key+=1; ?>
						<input type="hidden" id="idtable" value="<?php echo $value['id_personil'] ?>" name="">
					</td>

					<td>
						<div contentEditable='true' class='edit' id='keterangan_<?php echo $value['id_personil']; ?>'> <?php echo $value['keterangan']; ?>

						</div>
					</td>

					<td> <div contentEditable='true' class='edit' id='satuan_<?php echo $value['id_personil']; ?>'> <?php echo $value['satuan']; ?></div> </td>
					<td>
						<div onkeyup='formatNumber(this)' contentEditable='true' class='edit'  id='a_<?php echo $value['id_personil']; ?>'><?php echo $value['a']; ?></div>
					</td>
					<td>
						<div contentEditable='true' class='edit' id='b_<?php echo $value['id_personil']; ?>'><?php echo number_format($value['b']); ?>
						</div>
					</td>
					<td>
						<div contentEditable='true' class='edit' id='c_<?php echo $value['id_personil']; ?>'><?php echo number_format($value['c']); ?></div>
					</td>
					<td>
						<div contentEditable='true' class='edit' id='g_<?php echo $value['id_personil']; ?>'><?php echo number_format($value['g']); ?></div>
					</td>
					<td>
						<div contentEditable='true' class='edit' id='f_<?php echo $value['id_personil']; ?>'><?php echo number_format($value['f']); ?></div>
					</td>
					<td>
						<div contentEditable='true' class='edit' id='m_<?php echo $value['id_personil']; ?>'><?php echo number_format($value['m']); ?></div>
					</td>
					

				</tr>
				<?php endforeach ?>

			<tr style="background:#2091c9;">
				<td></td>
				<td colspan="8" style="text-align:left;color:#fff;">Non Personal</td>
			</tr>
			<?php foreach ($tampilpersonil2 as $key => $value): ?>
				<tr>

					<td><?php echo $key+=1; ?>
						<input type="hidden" id="idtable" value="<?php echo $value['id_personil'] ?>" name="">
					</td>

					<td>
						<div contentEditable='true' class='edit' id='keterangan_<?php echo $value['id_personil']; ?>'> <?php echo $value['keterangan']; ?>

						</div>
					</td>

					<td> <div contentEditable='true' class='edit' id='satuan_<?php echo $value['id_personil']; ?>'> <?php echo $value['satuan']; ?></div> </td>
					<td>
						<div onkeyup='formatNumber(this)' contentEditable='true' class='edit'  id='a_<?php echo $value['id_personil']; ?>'><?php echo $value['a']; ?></div>
					</td>
					<td>
						<div contentEditable='true' class='edit' id='b_<?php echo $value['id_personil']; ?>'><?php echo number_format($value['b']); ?>
						</div>
					</td>
					<td>
						<div contentEditable='true' class='edit' id='c_<?php echo $value['id_personil']; ?>'><?php echo number_format($value['c']); ?></div>
					</td>
					<td>
						<div contentEditable='true' class='edit' id='g_<?php echo $value['id_personil']; ?>'><?php echo number_format($value['g']); ?></div>
					</td>
					<td>
						<div contentEditable='true' class='edit' id='f_<?php echo $value['id_personil']; ?>'><?php echo number_format($value['f']); ?></div>
					</td>
					<td>
						<div contentEditable='true' class='edit' id='m_<?php echo $value['id_personil']; ?>'><?php echo number_format($value['m']); ?></div>
					</td>
					

				</tr>
				<?php endforeach ?>

				<tr style="background:#2091c9;">
					<td></td>
					<td colspan="8" style="text-align:left;color:#fff;">Additional</td>
				</tr>
					<?php foreach ($tampilpersonil3 as $key => $value): ?>
				<tr>

					<td><?php echo $key+=1; ?>
						<input type="hidden" id="idtable" value="<?php echo $value['id_personil'] ?>" name="">
					</td>

					<td>
						<div contentEditable='true' class='edit' id='keterangan_<?php echo $value['id_personil']; ?>'> <?php echo $value['keterangan']; ?>

						</div>
					</td>

					<td> <div contentEditable='true' class='edit' id='satuan_<?php echo $value['id_personil']; ?>'> <?php echo $value['satuan']; ?></div> </td>
					<td>
						<div contentEditable='true' class='edit'  id='a_<?php echo $value['id_personil']; ?>'><?php echo number_format($value['a']); ?></div>
					</td>
					<td>
						<div contentEditable='true' class='edit' id='b_<?php echo $value['id_personil']; ?>'><?php echo number_format($value['b']); ?>
						</div>
					</td>
					<td>
						<div contentEditable='true' class='edit' id='c_<?php echo $value['id_personil']; ?>'><?php echo number_format($value['c']); ?></div>
					</td>
					<td>
						<div contentEditable='true' class='edit' id='g_<?php echo $value['id_personil']; ?>'><?php echo number_format($value['g']); ?></div>
					</td>
					<td>
						<div contentEditable='true' class='edit' id='f_<?php echo $value['id_personil']; ?>'><?php echo number_format($value['f']); ?></div>
					</td>
					<td>
						<div contentEditable='true' class='edit' id='m_<?php echo $value['id_personil']; ?>'><?php echo number_format($value['m']); ?></div>
					</td>
					

				</tr>
				<?php endforeach ?>


		</tbody>

	</table>
</div>
				
			</div>

			

			

		</div>

		

	</div>

	

</div>









<script type="text/javascript">


	function ambildata(obj,IDins)
	{

		
		var target		= "<?php echo site_url("tema/getdata")?>";
		data		= {
			idx : IDins
		}

		$('#alertMessage').remove();

		$.post(target, data, function(e){

			var json = $.parseJSON(e);
	    	// console.log(json); return false;

	    	$('#ubahID').val(json.ins.id_theme);
	    	$('#ubahnama').val(json.ins.nama_theme);
	    	$('#ubahket').val(json.ins.keterangan_theme);
	    	$('#ubahharga').val(json.ins.harga_theme);

	    	$("#xmodalubahx").modal("show");
	    });

	}

	function formatNumber(objSource) 
{
	a = $(objSource).val();
	//b = a.replace(/[^\d]/g, "");
	b = a.replace(/[^0-9,'.']/g,"");
	b = b.replace(/,/ig,"");

	c = "";
	strLength = b.length;
	j = 0;
	for (i = strLength; i > 0; i--) {
		j = j + 1;
		if (((j % 3) == 1) && (j != 1)) {
			c = b.substr(i - 1, 1) + "," + c;
		} else {
			c = b.substr(i - 1, 1) + c;
		}
	}
	$(objSource).val(c);
}

	
</script>

<script type="text/javascript">

     $(document).ready(function(){
           CKEDITOR.disableAutoInline = true;
           //CKEDITOR.inline( 'div2');

             // Add Class
    $('.edit').click(function(){
        $(this).addClass('editMode');
    
    });

    // Save data
    $(".edit").focusout(function(){
    	$(this).removeClass("editMode");

    	var id = this.id;
    	var split_id = id.split("_");
    	var field_name = split_id[0];
    	var edit_id = split_id[1];

    	var value = $(this).text();
    	console.log(value);
    	$.ajax({
    		url: '<?php echo site_url("personil/simpanlive") ?>',
    		type: 'post',
    		data: { field:field_name, value:value, id:edit_id },
    		success:function(response){
    			console.log('Save successfully');               
    		}
    	});

    });

           });  
</script>