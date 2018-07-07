<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class booking extends MY_Controller {

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
	
	$data['riwayat'] = $this->db->query("SELECT *, trx_booking_det.`harga_ins` AS hargainsdet, trx_booking_det.`harga_produk` AS hargaprodukdet, trx_booking_det.`harga_program` 
			AS hargaprogramdet, trx_booking_det.harga_theme AS hargathemedet
			FROM trx_booking LEFT JOIN trx_booking_det ON trx_booking.`id_booking` = trx_booking_det.id_pemesanan ORDER BY id_detail DESC ")->result_array();
		$data['judul'] = 'Halaman Master Personil';
		$data['instansi'] = $this->db->query("SELECT * FROM mst_kat_instansi")->result_array();
		$this->themeadmin->tampilkan('tampilbooking',$data);

	}
	function rubahstatus()
	{
		$idb = $this->input->post('idb');

		$this->db->query("UPDATE trx_booking SET proses = 'Deal' WHERE id_booking = '".$idb."' ");

		$data['flag'] = TRUE;

		echo json_encode($data);

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


		$querypromo = $this->db->query("SELECT id_personil, keterangan, satuan, jenis,tipe,hari, ".$code." FROM mst_personil WHERE jenis= 5 ");

		foreach ($querypromo->result() as $key => $value) 
		{
			$row['id_personil'] = $value->id_personil;
			$row['keterangan'] = $value->keterangan;
			$row['satuan'] = $value->satuan;
			$row['harga'] = $value->$code;

			$data['promo'][] = $row;
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

		$data['attr'] = $data;

		echo json_encode($data);

	}

 	function simpanlive()
 	{
 		$field = $_POST['field'];
 		$value = $_POST['value'];
 		$editid = $_POST['id'];

 		$value = str_replace([':', '\\', '/', '*','.',','], '', $value);

		$query = $this->db->query("UPDATE mst_personil SET ".$field."='".$value."' WHERE id_personil=".$editid." ");
	}

	public function changes()
	{
		$value= $this->input->post('id');
		
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

		$query = $this->db->query("SELECT jenis, keterangan,satuan,".$code." FROM mst_personil WHERE jenis <> 3 group by jenis ");
		$jenis='';

		foreach ($query->result() as $keyheader => $value) {
			if ($value->jenis==1)
			 {
			 	$jenis = 'Personal';
			}elseif ($value->jenis == 2) {
				$jenis = 'Non Personal';
			}else {
				$jenis = 'Tambahan';
			}
			$header['jenis']  = $jenis;
			$header['id_jenis']  = $value->jenis;
			$header['indexheader'] = $keyheader;

			$json['header'][]=$header;

			$query2 =$this->db->query("SELECT id_personil,jenis, keterangan,satuan,".$code." FROM mst_personil WHERE jenis = '".$value->jenis."' ");

			foreach ($query2->result() as $val) {
				$body['id_personil']  = $val->id_personil;
				$body['jenis']  = $jenis;
				$body['id_jenis']  = $value->jenis;
				$body['keterangan'] = $val->keterangan; 
				$body['satuan'] = $val->satuan; 
				$body['duit'] = number_format($val->$code).',00' ; 
				$body['duittot'] = $val->$code; 

				$json['body'][$keyheader][]=$body;


			}
		}

		
		echo json_encode($json);


	}


	public function simpanubah()
	{
			$IDins= $this->input->post('ubahID');
			$data['nama_theme'] = $this->input->post('ubahnama');
			$data['keterangan_theme'] = $this->input->post('ubahket');
			$data['harga_theme'] = $this->input->post('ubahharga');

			$this->db->where("id_theme",$IDins);
			$this->db->update('mst_theme', $data);

			$data['id_theme']=$IDins;
			$data['flag'] = TRUE;
			
			$query = $this->db->query("SELECT * FROM mst_theme WHERE id_theme = '".$IDins."' ")->row();

			$data['id_theme'] = $query->id_theme;
			$data['nama_theme'] = $query->nama_theme;
			$data['keterangan_theme'] = $query->keterangan_theme;
			$data['harga_theme'] = $query->harga_theme;

			
			echo json_encode($data);
	}

	function getdata()
		{
			$idx 	= $this->input->post('idx');

			$data['ins'] 	= $this->db->query("SELECT * FROM mst_theme WHERE id_theme = ".$idx." ")->row_array();
			echo json_encode($data);
		}

		function gettanggal()
		{
			$star = date("Y-m-d", strtotime($this->input->post("tglmulai")));

			$this->db->where("tgl_mulai",$star);
			$get = $this->db->get('trx_booking');

			$sama = $get->num_rows();

			if ($sama) {
				$json['notif'] = "cok podo";
			}else{
				$json['notif'] = "bedo";
				$json['flag'] = TRUE;
			}
			echo json_encode($json);
		}


function gethargaadd()
{
	$value = $this->input->post('kode');
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

	$id = $this->input->post('id');
	$query =$this->db->query('SELECT *, '.$code.' FROM mst_personil WHERE id_personil = "'.$id.'" ')->first_row();

	$data['id_personil'] = $query->id_personil;
	$data['keterangan'] = $query->keterangan;
	$data['satuan'] = $query->satuan;
	$data['harga'] = $query->$code;

	echo json_encode($data);
}
		
	

	function hapusdata()
	{
		$id = $this->input->post('idx');
		$this->db->where('id_theme', $id);
		$this->db->delete('mst_theme');

		$data['flag'] = TRUE;

		echo json_encode($data);
	}


	function gettambahan()
	{
		$value= $this->input->post('nilai');
		
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

	$query = $this->db->query("SELECT id_personil, jenis, keterangan,satuan,".$code." FROM mst_personil WHERE tipe='2'");
$html= "";
		foreach ($query->result() as $value) {
		$html.= '<div class="col-md-6">
			<div style="padding: 0;margin: 0;" class="checkbox">
				<label class="spanlabel">';

					
			$html.='<input onclick="addon(this);" class="'.$value->id_personil.'" value="'.$value->id_personil.'" type="checkbox" name="addons[]">'.$value->keterangan.'</label>
				</div>
			</div>';
				}



	echo $html;
	}

}

/* End of file Lokasi.php */
/* Location: ./application/controllers/admin/Lokasi.php */