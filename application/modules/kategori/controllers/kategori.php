<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kategori extends MY_Controller {



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
		$data['tampilkategori'] = $this->db->query("SELECT * FROM kategori")->result_array();
		$data['judul'] = 'Halaman Master kategori';
		$this->themeadmin->tampilkan('tampilkategori',$data);

	}

	public function simpanubah()
	{
			$IDins= $this->input->post('ubahID');
			$data['nama_kategori'] = $this->input->post('ubahnama');
		
			$this->db->where("id_kategori",$IDins);
			$this->db->update('kategori', $data);

			$data['id_kategori']=$IDins;
			$data['flag'] = TRUE;
			
			$query = $this->db->query("SELECT * FROM kategori WHERE id_kategori = '".$IDins."' ")->row();

			$data['id_kategori'] = $query->id_kategori;
			$data['nama_kategori'] = $query->nama_kategori;
			
			echo json_encode($data);
	}

	function getdata()
		{
			$idx 	= $this->input->post('idx');

			$data['ins'] 	= $this->db->query("SELECT * FROM kategori WHERE id_kategori = ".$idx." ")->row_array();
			echo json_encode($data);
		}

		function hapusdata()
		{
			$id = $this->input->post('idx');

			$hit = $this->db->query("SELECT * FROM produk WHERE id_kategori = '".$id."' ");

			$num = $hit->num_rows();

			if ($num) {
				$data['flag'] = FALSE;
			}else{
				$this->db->where('id_kategori', $id);
				$this->db->delete('kategori');

				$data['flag'] = TRUE;
			}



			echo json_encode($data);
		}

	public function simpankategori()
		{
			
			/*print_r($_POST);
			exit();*/
			$data['nama_kategori'] = $this->input->post('namakategori');
			
	
			$this->db->insert("kategori", $data);
			$data['flag'] 	= TRUE;

			$data['kats'] = $this->db->query("SELECT * FROM kategori ORDER BY id_kategori DESC")->row_array();

	
			echo json_encode($data);
		}

}

/* End of file Lokasi.php */
/* Location: ./application/controllers/admin/Lokasi.php */