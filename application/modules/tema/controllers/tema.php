<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class tema extends MY_Controller {

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
		$data['tampiltema'] = $this->db->query("SELECT * FROM mst_theme")->result_array();
		$data['judul'] = 'Halaman Master Tema';
		$this->themeadmin->tampilkan('tampiltema',$data);

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

	function hapusdata()
	{
		$id = $this->input->post('idx');
		$this->db->where('id_theme', $id);
		$this->db->delete('mst_theme');

		$data['flag'] = TRUE;

		echo json_encode($data);
	}

	public function simpantema()
		{
			
			/*print_r($_POST);
			exit();*/
			$data['nama_theme'] = $this->input->post('namanya');
			$data['keterangan_theme'] = $this->input->post('keterangan');
			$data['harga_theme'] = $this->input->post('harga');
	
			$this->db->insert("mst_theme", $data);
			$data['flag'] 	= TRUE;

			$query = $this->db->query("SELECT * FROM mst_theme ORDER BY id_theme DESC");

			foreach ($query->result() as  $value) {
				$row['id_theme'] = $value->id_theme;
				$row['nama_theme'] = $value->nama_theme;
				$row['keterangan_theme'] = $value->keterangan_theme;
				$row['harga_theme'] = $value->harga_theme;
				
				
				$data['jsonval'][] = $row;
			}
			
			echo json_encode($data);
		}

}

/* End of file Lokasi.php */
/* Location: ./application/controllers/admin/Lokasi.php */