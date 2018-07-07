<?php 

/**
* 
*/
class pendaftar extends MY_Controller
{
	
	function __construct()

	{

		parent::__construct();

		//if we dont login, so back to login page 

		if (!$this->session->userdata("pengguna"))

		 {

			redirect("pengguna/login");

		}
		$this->load->helper('pengunjung_helper');


	}

	public function tampil()
	{
		$data['tampilpaketsatu']= $this->db->query("SELECT*FROM users order by id_users desc")->result_array();

		$data['judul'] = 'Data Seluruh Users';
		$this->themeadmin->tampilkan('tampilpendaftar',$data);
		//$this->load->view('admin/tampilpendaftar', $data);
	}

		public function simpanpendaftaran()
		{
			/*print_r($_POST);
			exit();
			*/
			$datePost = $this->input->post("daterange");



			$date = explode(" - ", $datePost);

			$startDate = date("Y-m-d",strtotime($date[0]));
			$endDate = date("Y-m-d", strtotime($date[1]));

			$data['nama'] = $this->input->post('namapendaf');
			$data['alamat'] = $this->input->post('alamatpendaf');
			$data['asal_instansi'] = $this->input->post('instansi');
			$data['id_kat_instansi'] = $this->input->post('optradio');
			$data['jabatan'] = $this->input->post('jabatan');
			$data['no_telp'] = $this->input->post('telp');
			$data['email'] = $this->input->post('emailpendaf');
			$data['id_produk_want'] = $this->input->post('optradio2');
			$data['id_theme'] = $this->input->post('optradio3');
			$data['id_lokasi_program'] = $this->input->post('optradio4');
			$data['jml_peserta'] = $this->input->post('peserta');
			$data['jml_lama_pelatihan'] = $this->input->post('optradio5');
			$data['startdate'] = $startDate;
			$data['enddate'] = $endDate;
			$data['datecreated'] = tanggalindo();
			
			$this->db->insert('paket_satu', $data);
			$data['flag'] = TRUE;
			echo json_encode($data);
		}

		public function changepaketins()
		{
			$nilai = $this->input->post("id");

			$query = $this->db->query("SELECT*FROM mst_kat_instansi WHERE id_kat_instansi = '".$nilai."'");
			foreach ($query->result() as $val)
			 {
			$data['id_kat_instansi'] = $val->id_kat_instansi;
			$data['nama_instansi'] = $val->nama_instansi;
			$data['nama_alias'] = $val->nama_alias;
			$data['harga_ins'] = $val->harga_ins;
			
			$json['ins'][] = $data;
			}

			echo json_encode($json);

		}

}

 ?>