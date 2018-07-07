<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class personil extends MY_Controller {



	public function tampil()
	{
		if (!$this->session->userdata('pengguna')) {
			redirect('pengguna/login');
		}

		$data['tampilpersonil1'] = $this->db->query("SELECT * FROM mst_personil where jenis = '1'")->result_array();
		$data['tampilpersonil2'] = $this->db->query("SELECT * FROM mst_personil where jenis = '2'")->result_array();
		$data['tampilpersonil3'] = $this->db->query("SELECT * FROM mst_personil where jenis = '3'")->result_array();
		$data['tampillokasi'] = $this->db->query("SELECT * FROM mst_lokasi_program")->result_array();
		$data['judul'] = 'Halaman Master Personil';
		$data['instansi'] = $this->db->query("SELECT * FROM mst_kat_instansi")->result_array();
		$this->themeadmin->tampilkan('tampilpersonil',$data);

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

		$query = $this->db->query("SELECT jenis, keterangan,satuan,".$code." FROM mst_personil WHERE jenis <> 3  AND jenis <> 2 GROUP BY jenis");
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
				$body['duit'] = number_format($val->$code); 
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


function getharganon()
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

		if ($id == 1) {
			$delimeter = 'hari = 1 OR hari =  2';
		}elseif ($id == 2) {
			$delimeter = 'hari = 1 OR hari =  2';
		}elseif ($id == 3) {
			$delimeter = 'hari >=  1';
		}else{
			$delimeter = 'hari >= 4';
		}


	$query =$this->db->query('SELECT *, '.$code.' FROM mst_personil WHERE  '.$delimeter.'  ORDER  BY id_personil DESC ');

	foreach ($query->result() as $key => $value) 
	{

	$data['id_personil'] = $value->id_personil;
	$data['keterangan'] = $value->keterangan;
	$data['satuan'] =	 $value->satuan;
	$data['harga'] = 	$value->$code;
		
	$json['non'][] = $data;

	}


	echo json_encode($json);
}
		
	

	function hapusdata()
	{
		$id = $this->input->post('idx');
		$this->db->where('id_theme', $id);
		$this->db->delete('mst_theme');

		$data['flag'] = TRUE;

		echo json_encode($data);
	}

	public function promo()
	{
		$value= $this->input->post('idp');

		$query = $this->db->query("SELECT * FROM mst_personil WHERE jenis = '".$value."' ");

		foreach ($query->result() as $key => $valuepromo)
		 {
			$data['id_personil'] = $valuepromo->id_personil;
			$data['keterangan'] = $valuepromo->keterangan;
			$data['satuan'] =	 $valuepromo->satuan;
			$data['harga'] = 	$valuepromo->a;

			$json['promo'][] = $data;
		}

		$idadd = $this->input->post('idadd');

		if ($idadd=='0#0') {
			$data['id_personil'] = '0';
			$data['keterangan'] = 'Tidak Ada Tambahan';
			$data['satuan'] =	 'Tidak Ada Satuan';
			$data['harga'] = 	'0';

			$json['add'][] = $data;
		}else{



			$queryadd = $this->db->query("SELECT id_personil, jenis, keterangan,satuan, a FROM mst_personil WHERE id_personil IN (".$idadd.")");

			foreach ($queryadd->result() as $key => $valueadd)
			{
				$data['id_personil'] = $valueadd->id_personil;
				$data['keterangan'] = $valueadd->keterangan;
				$data['satuan'] =	 $valueadd->satuan;
				$data['harga'] = 	$valueadd->a;

				$json['add'][] = $data;
			}
		}



		echo json_encode($json);
	}


	public function getkabeh()
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

		$querypersonnil = $this->db->query("SELECT id_personil, jenis, keterangan,satuan, ".$code." FROM mst_personil WHERE jenis = 1");
		$jenis='';
		
		foreach ($querypersonnil->result() as $key => $value) 
		{
			$row['id_personil'] = $value->id_personil;
			$row['keterangan'] = $value->keterangan;
			$row['satuan'] = $value->satuan;
			$row['harga'] = $value->$code;

			$json['personal'][] = $row;
		}

		$id = $this->input->post('idp');

		if ($id == 1) {
			$delimeter = 'hari = 1 OR hari =  2';
		}elseif ($id == 2) {
			$delimeter = 'hari = 1 OR hari =  2';
		}elseif ($id == 3) {
			$delimeter = 'hari >=  1';
		}else{
			$delimeter = 'hari >= 4';
		}


		$query =$this->db->query('SELECT *, '.$code.' FROM mst_personil WHERE  '.$delimeter.'  ORDER  BY id_personil ASC ');

		foreach ($query->result() as $key => $valuep) 
		{

			$data['id_personil'] = $valuep->id_personil;
			$data['keterangan'] = $valuep->keterangan;
			$data['satuan'] =	 $valuep->satuan;
			$data['harga'] = 	$valuep->$code;

			$json['non'][] = $data;

		}


		$idadd = $this->input->post('idadd');

		if ($idadd=='0#0') {
			$data['id_personil'] = '0';
			$data['keterangan'] = 'Tidak Ada Tambahan';
			$data['satuan'] =	 'Tidak Ada Satuan';
			$data['harga'] = 	'0';

			$json['add'][] = $data;
		}else{



		$queryadd = $this->db->query("SELECT id_personil, jenis, keterangan,satuan, a FROM mst_personil WHERE id_personil IN (".$idadd.")");

		foreach ($queryadd->result() as $key => $valueadd)
		 {
			$data['id_personil'] = $valueadd->id_personil;
			$data['keterangan'] = $valueadd->keterangan;
			$data['satuan'] =	 $valueadd->satuan;
			$data['harga'] = 	$valueadd->a;

			$json['add'][] = $data;
		}
}



		echo json_encode($json);
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

	$query = $this->db->query("SELECT id_personil, jenis, keterangan,satuan,".$code." FROM mst_personil WHERE tipe='2' AND id_personil = '10' ");
$html= "";
		foreach ($query->result() as $value) {
		$html.= '<div class="col-md-6">
			<div style="padding: 0;margin: 0;" class="checkbox">
				<label class="spanlabel">';

					
			$html.='<input onclick="addon(this);gettableall(this);" class="'.$value->id_personil.'" value="'.$value->id_personil.'" type="checkbox" name="addons[]">'.$value->keterangan.'</label>
				</div>
			</div>';
				}



	echo $html;
	}

}

/* End of file Lokasi.php */
/* Location: ./application/controllers/admin/Lokasi.php */