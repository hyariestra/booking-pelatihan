<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<style type="text/css">
		table {
    border-collapse: collapse;
}

 table{counter-reset:section;}
    .count:before
    {
    	counter-increment:section;
    	content:counter(section);
    }

table, th, td {
    border: 1px solid black;
}
	</style>
<table>
	<tr>
		<th>No</th>
		<th>Nama</th>
		<th>Ukuran</th>
		<th>Jumlah</th>
		<th>Alamat</th>
		<th>No Hp</th>
		<th>harga Kaos</th>
		<th>Ongkir</th>
		<th>Total Harga</th>
		<th>Jasa Pengiriman</th>
		<th>Status Pembayaran</th>
		<th>Status Pengiriman</th>
	</tr>	


<?php 
 $no=1;
 $array = 1;
 $display = '';
/* 	echo '<pre>';
 	print_r ($report);
		echo '<pre>';
exit();*/
 for ($i = 0; $i < count($report); $i++)

  { 
  

 	$num = $this->db->query("SELECT * FROM pembelian_detail WHERE id_pembelian ='".$report[$i]['id_pembelian']."' ")->num_rows();
 	


 	/*echo '<pre>';
 	echo ($key);
		echo '<pre>';
*/
  	?>

	 <tr>
	 	<td class="count" style="display: <?php echo $display; ?>" rowspan="<?php echo $num ?>"></td>
	 	<td style="display: <?php echo $display; ?>" rowspan="<?php echo $num ?>" ><?php echo $report[$i]['nama_penerima'] ?></td>

	 	<td ><?php echo $report[$i]['ukuran']; ?></td>
	 	<td><?php echo $report[$i]['jumlahdet']; ?></td>

	 	<td><?php echo $report[$i]['alamat_pelanggan']; ?></td>
	 	<td><?php echo $report[$i]['telp_penerima']; ?></td>
	 	<td><?php echo $report[$i]['total_pembelian']; ?></td>
	 	<td><?php echo $report[$i]['biaya_pengiriman']; ?></td>
	 	<td><?php echo $report[$i]['total_bayar']; ?></td>
	 	<td><?php echo $report[$i]['ekspedisi'].' '.$report[$i]['paket_ekspedisi']; ?></td>
	 	<td></td>
	 	<td></td>
	 </tr>

<?php
	if ($report[$i]['id_pembelian']==@$report[$array]['id_pembelian']) {
  		$display = 'none';
  	}else
  	{
  		$display = '';
  	}
 $no++;
 $array++;
 
 }
  ?>

</table>
</body>
</html>