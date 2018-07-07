<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class instansi extends MY_Controller {


	function __construct()

	{

		parent::__construct();

		//if we dont login, so back to login page 

		if (!$this->session->userdata("pengguna"))

		 {

			redirect("pengguna/login");

		}
		$this->load->helper('pengunjung_helper');
		$this->load->model('m_instansi');


	}

	public function tampil()
	{

		//$data['tampilinstansi'] = $this->db->query("SELECT * FROM mst_kat_instansi")->result_array();
		$data['tampilinstansi'] = $this->m_instansi->tampil_instansi()->result_array();
		$data['judul'] = 'Halaman Master Instansi';
		$this->themeadmin->tampilkan('tampilinstansi',$data);

	}
	public function simpanins()
		{
			
			/*print_r($_POST);
			exit();*/
			$data['nama_instansi'] = $this->input->post('namains');
			$data['nama_alias'] = $this->input->post('namaalias');
			$data['harga_ins'] = $this->input->post('hargains');
	
			$this->db->insert("mst_kat_instansi", $data);
			$data['flag'] 	= TRUE;

			$ins = $this->db->query("SELECT * FROM mst_kat_instansi ORDER BY id_kat_instansi DESC");

			foreach ($ins->result() as  $value) {
				$datains['id_kat_instansi'] = $value->id_kat_instansi;
				$datains['nama_instansi'] = $value->nama_instansi;
				$datains['nama_alias'] = $value->nama_alias;
				$datains['harga_ins'] = $value->harga_ins;
				
				
				$data['jsoninstansi'][] = $datains;
			}

			echo json_encode($data);
		}

		function simpanubahins()
		{

			
			$IDins= $this->input->post('ubahIDins');
			$data['nama_instansi'] = $this->input->post('ubahnamains');
			$data['nama_alias'] = $this->input->post('ubahnamaalias');
			$data['harga_ins'] = $this->input->post('ubahhargains');

			$this->db->where("id_kat_instansi",$IDins);
			$this->db->update('mst_kat_instansi', $data);

			$data['id_kat_instansi']=$IDins;
			$data['flag'] = TRUE;
			echo json_encode($data);
		}

	function getdatains()
		{
			$idx 	= $this->input->post('idx');

			$data['ins'] 	= $this->db->query("SELECT * FROM mst_kat_instansi WHERE id_kat_instansi = ".$idx." ")->row_array();
			echo json_encode($data);
		}
	function hapusins()
	{
			$id = $this->input->post('idx');
			$this->db->where('id_kat_instansi', $id);
			$this->db->delete('mst_kat_instansi');

			$data['flag'] = TRUE;

			echo json_encode($data);
	}
}



/* End of file Instansi.php */
/* Location: ./application/controllers/admin/Instansi.php */