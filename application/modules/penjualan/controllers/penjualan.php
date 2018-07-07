<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penjualan extends MY_Controller {

		function __construct()

	{

		parent::__construct();

	
		if (!$this->session->userdata("pengguna"))

		 {

			redirect("pengguna/login");

		}

	}


	public function tampil()
	{
	
	$data['penjualan'] = $this->db->query("SELECT	* FROM pembelian LEFT JOIN pembelian_detail ON pembelian.`id_pembelian` = pembelian_detail.id_pembelian GROUP BY pembelian_detail.`id_pembelian`")->result_array();
		$data['judul'] = 'Halaman penjualan';
		$this->themeadmin->tampilkan('tampilpenjualan',$data);

	}

	public function getdetail()
	{
		$id = $this->input->post('idx');

		$query = $this->db->query("SELECT * FROM pembelian LEFT JOIN pembelian_detail ON pembelian.`id_pembelian` = pembelian_detail.id_pembelian WHERE pembelian.id_pembelian = '".$id."' ");


		$newdate =  date("d-m-Y", strtotime($query->first_row()->tanggal_pembelian));
		$subtotalz = $query->first_row()->harga_beli*$query->first_row()->jmlproduk;

	

		$data['id_pembelian'] = $query->first_row()->id_pembelian;
		$data['kode'] = $query->first_row()->kode_pembelian;
		$data['tanggal'] = $newdate;
		$data['biaya_pengiriman'] =  number_format($query->first_row()->biaya_pengiriman, "2", ",", ".");
		$data['total_bayar'] = number_format($query->first_row()->total_bayar, "2", ",", ".");
		$data['alamat_pengiriman'] = $query->first_row()->alamat_pengiriman;
		$data['alamat_pelanggan'] = $query->first_row()->alamat_pelanggan;
		$data['ekspedisi'] = $query->first_row()->ekspedisi;
		$data['paket_ekspedisi'] = $query->first_row()->paket_ekspedisi;
		$data['waktu_tempuh'] = $query->first_row()->waktu_tempuh;
		$data['jmlproduk'] = $query->first_row()->jmlproduk;
		$data['catatan'] = $query->first_row()->catatan;
		$data['nama_penerima'] = $query->first_row()->nama_penerima;
		$data['telp_penerima'] = $query->first_row()->telp_penerima;
		$data['produk'] = 'Kaos Bumdes';
		$data['subtotal'] = number_format($subtotalz, "2", ",", ".");
		$data['hargaproduksatuan'] = number_format($query->first_row()->harga_beli, "2", ",", ".");

		foreach ($query->result() as $key => $value) 
		{

			$data['ukuran'] = $value->ukuran;
			$data['jumlahdet'] = $value->jumlahdet;

			$data['sizeNweight'][] = $data;

		}
	


		echo json_encode($data);


	}

	function laporanpenjualan($start, $end)
	{	
		require(APPPATH .'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH .'third_party/PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$objPHPExcel = new PHPExcel();

		$objPHPExcel->getProperties()->setCreator("");
		$objPHPExcel->getProperties()->setLastModifiedBy("");
		$objPHPExcel->getProperties()->setTitle("");
		$objPHPExcel->getProperties()->setSubject("");
		$objPHPExcel->getProperties()->setDescription("");

		$objPHPExcel->setActiveSheetIndex(0);

		$objPHPExcel->setActiveSheetIndex()->setCellValue('A1','No');
		$objPHPExcel->setActiveSheetIndex()->setCellValue('B1','Nama');
		$objPHPExcel->setActiveSheetIndex()->setCellValue('C1','Ukuran');
		$objPHPExcel->setActiveSheetIndex()->setCellValue('D1','Jumlah');
		$objPHPExcel->setActiveSheetIndex()->setCellValue('E1','Alamat');
		$objPHPExcel->setActiveSheetIndex()->setCellValue('F1','No Hp');
		$objPHPExcel->setActiveSheetIndex()->setCellValue('G1','harga Kaos');
		$objPHPExcel->setActiveSheetIndex()->setCellValue('H1','Ongkir');
		$objPHPExcel->setActiveSheetIndex()->setCellValue('I1','Total Harga');
		$objPHPExcel->setActiveSheetIndex()->setCellValue('J1','Jasa Pengiriman');
		$objPHPExcel->setActiveSheetIndex()->setCellValue('K1','Status Pembayaran');
		$objPHPExcel->setActiveSheetIndex()->setCellValue('L1','Status Pengiriman');
		
		$row=2;

		$startDate = date("Y-m-d",strtotime($start));
		$endDate = date("Y-m-d", strtotime($end));

		$data['report'] = $this->db->query("SELECT	* FROM pembelian
			LEFT JOIN pembelian_detail ON pembelian.`id_pembelian` = pembelian_detail.id_pembelian
			WHERE tanggal_pembelian >= '".$startDate."' AND tanggal_pembelian <= '".$endDate."' ")->result_array();

		foreach ($report as $key => $value) 
		{
			$objPHPExcel->setActiveSheetIndex()->setCellValue('A'.$row,$value->ukuran);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('B'.$row,$value->nama_penerima);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('C'.$row,$value->ukuran);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('D'.$row,$value->jumlahdet);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('E'.$row,$value->alamat_pelanggan);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('F'.$row,$value->telp_penerima);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('G'.$row,$value->total_pembelian);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('H'.$row,$value->biaya_pengiriman);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('I'.$row,$value->total_bayar);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('J'.$row,$value->ekspedisi);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('K'.$row,$value->ukuran);
			$objPHPExcel->setActiveSheetIndex()->setCellValue('L'.$row,$value->ukuran);
			
			$row++;
		}

		$filename = "report.xlsx";

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'" ');
		header('Cache-Control: max-age=0');


		$writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$writer->save('php://output');
		exit;

	}

	function laporanpenjualantrue($start, $end)
	{	
	
		$startDate = date("Y-m-d",strtotime($start));
		$endDate = date("Y-m-d", strtotime($end));

		$data['report'] = $this->db->query("SELECT	* FROM pembelian
			LEFT JOIN pembelian_detail ON pembelian.`id_pembelian` = pembelian_detail.id_pembelian
			WHERE tanggal_pembelian >= '".$startDate."' AND tanggal_pembelian <= '".$endDate."' ")->result_array();
		/*$filename ="exportLaporanPenjualan.pdf";*/
		$contents = $this->load->view("penjualan/reportlaporanpenjualan",$data);
		/*header("Content-type:application/pdf");
		header("Content-Disposition:attachment;filename=downloaded.pdf");*/
		//header('Content-Disposition: attachment; filename='.$filename);
		echo $contents;
	}


	function dettable()
	{


		$id = $this->input->post('idx');

		$query = $this->db->query("SELECT* FROM trx_booking_det 
			LEFT JOIN trx_booking ON trx_booking_det.`id_pemesanan` = trx_booking.`id_booking`
			LEFT JOIN mst_personil ON mst_personil.id_personil = trx_booking.kategori_instansi
			 WHERE trx_booking_det.`id_pemesanan` = '".$id."' ")->first_row();

		$tgl_selesai = str_replace('T24:00:00', '', $query->tgl_selesai);
		$dateakhir = DateTime::createFromFormat("Y-m-d", $tgl_selesai);
		$akhir = $dateakhir->format("d");
		$dates=date_create($tgl_selesai);
		$dateakhir= date_format($dates,"d-m-Y");

		$tgl_mulai = str_replace('T00:00:00', '', $query->tgl_mulai);
		$dateawal = DateTime::createFromFormat("Y-m-d", $tgl_mulai);
		$awal = $dateawal->format("d");
		$datem=date_create($tgl_mulai);
		$dateawal= date_format($datem,"d-m-Y");


		$hari = $query->hari_booking;

		$value = $query->kategori_instansi;

			$code ="";

		if ($value == 1) {
			$code = 'a';
		}elseif ($value == 2) {
			$code = 'b';
		}elseif ($value ==3 ) {
			$code = 'c';
		}elseif ($value ==4 ) {
			$code = 'g';
		}elseif ($value ==5) {
			$code = 'f';
		}elseif ($value ==6) {
			$code = 'm';
		}else{
			echo "buh";
		}


		$querygetharga =  $this->db->query("SELECT id_personil, keterangan, satuan, jenis,tipe,hari, ".$code ." FROM mst_personil WHERE jenis= 1 ");

		foreach ($querygetharga->result() as $key => $value) 
		{
			$row['id_personil'] = $value->id_personil;
			$row['keterangan'] = $value->keterangan;
			$row['satuan'] = $value->satuan;
			$row['harga'] = $value->$code;

			$data['personal'][] = $row;
		}

		if ($hari == 1 ) {
			$days = 'AND hari =1 OR hari =  2 ';
		}elseif ($hari == 2) {
			$days = 'AND hari = 1 OR hari =  2';
		}else{
			$days = 'AND hari >=1';
		}


		$querygetharganon =  $this->db->query("SELECT id_personil, keterangan, satuan, jenis,tipe,hari, ".$code ." FROM mst_personil WHERE jenis= 2 ".$days." ");

		foreach ($querygetharganon->result() as $key => $value) 
		{
			$row['id_personil'] = $value->id_personil;
			$row['keterangan'] = $value->keterangan;
			$row['satuan'] = $value->satuan;
			$row['harga'] = $value->$code;
			$row['hari'] = $hari;

			$data['nonpersonal'][] = $row;
		}

		if ($query->fasilitas_tambahan=='')
		 {
			$row['id_personil'] =   '';
			$row['keterangan'] = '';
			$row['satuan'] = '';
			$row['harga'] = '';
			$row['hari'] ='';

			$data['tambahan'][] = $row;
		}else{


			$querybaru = $this->db->query("SELECT*FROM mst_personil WHERE id_personil IN (".$query->fasilitas_tambahan.")");
		
		foreach ($querybaru->result() as $key => $idtambahan) {  
			
			$row['id_personil'] =   $idtambahan->id_personil;
			$row['keterangan'] = $idtambahan->keterangan;
			$row['satuan'] = $idtambahan->satuan;
			$row['harga'] = $idtambahan->a;
			$row['hari'] = $hari;

		
			$data['tambahan'][] = $row;

		}

	}

		$data['id_detail'] = $query->id_detail;
		$data['id_booking'] = $query->id_booking;
		$data['dettema'] = $query->det_tema;
		$data['detprogram'] = $query->det_program;
		$data['detproduk'] = $query->det_produk;
		$data['detinstansi'] = $query->nama_bumdes;
		$data['kategoriins'] = $query->det_instansi;
		$data['jmlpeserta'] = $query->jml_peserta;

		$data['ketproduk'] = $query->keterangan_produk;
		$data['ketproduklainnya'] = $query->keterangan_produk_lainnya;
		$data['temalainnya'] = $query->tema_lainnya;
		$data['alamatpeserta'] = $query->alamat_peserta;
		$data['hari'] = $hari;
		$data['dateakhir'] = $dateawal." ".'sd'." ".$dateakhir;

		echo json_encode($data);

	}


}

/* End of file Lokasi.php */
/* Location: ./application/controllers/admin/Lokasi.php */