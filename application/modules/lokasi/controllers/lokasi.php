<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lokasi extends MY_Controller {

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
		$data['tampillokasi'] = $this->db->query("SELECT * FROM mst_lokasi_program")->result_array();
		$data['judul'] = 'Halaman Master Lokasi';
		$this->themeadmin->tampilkan('tampillokasi',$data);

	}

	public function simpanubahlok()
	{
			$IDins= $this->input->post('ubahIDlok');
			$data['nama_program'] = $this->input->post('ubahnamalok');
			$data['keterangan_program'] = $this->input->post('ubahketlok');
			$data['harga_program'] = $this->input->post('ubahhargalok');

			$this->db->where("id_lokasi_program",$IDins);
			$this->db->update('mst_lokasi_program', $data);

			$data['id_lokasi_program']=$IDins;
			$data['flag'] = TRUE;
			
			$lokasi = $this->db->query("SELECT * FROM mst_lokasi_program WHERE id_lokasi_program = '".$IDins."' ")->row();

			$data['id_lokasi_program'] = $lokasi->id_lokasi_program;
			$data['nama_program'] = $lokasi->nama_program;
			$data['keterangan_program'] = $lokasi->keterangan_program;
			$data['harga_program'] = $lokasi->harga_program;

			
			echo json_encode($data);
	}

	function getdatalokasi()
		{
			$idx 	= $this->input->post('idx');

			$data['ins'] 	= $this->db->query("SELECT * FROM mst_lokasi_program WHERE id_lokasi_program = ".$idx." ")->row_array();
			echo json_encode($data);
		}

	function hapuslok()
	{
		$id = $this->input->post('idx');
		$this->db->where('id_lokasi_program', $id);
		$this->db->delete('mst_lokasi_program');

		$data['flag'] = TRUE;

		echo json_encode($data);
	}

	public function simpanlokasi()
		{
			
			/*print_r($_POST);
			exit();*/
			$data['nama_program'] = $this->input->post('namaprog');
			$data['keterangan_program'] = $this->input->post('ketprog');
			$data['harga_program'] = $this->input->post('hargaprog');
	
			$this->db->insert("mst_lokasi_program", $data);
			$data['flag'] 	= TRUE;

			$lokasi = $this->db->query("SELECT * FROM mst_lokasi_program ORDER BY id_lokasi_program DESC");

			foreach ($lokasi->result() as  $value) {
				$datalok['id_lokasi_program'] = $value->id_lokasi_program;
				$datalok['nama_program'] = $value->nama_program;
				$datalok['keterangan_program'] = $value->keterangan_program;
				$datalok['harga_program'] = $value->harga_program;
				
				
				$data['jsonval'][] = $datalok;
			}
			
			echo json_encode($data);
		}

}

/* End of file Lokasi.php */
/* Location: ./application/controllers/admin/Lokasi.php */