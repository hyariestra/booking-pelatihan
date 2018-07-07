<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class promo extends MY_Controller {

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
		$data['tampilpromo'] = $this->db->query("SELECT*FROM mst_promo LEFT JOIN mst_kat_instansi ON mst_promo.`id_kat_instansi` = mst_kat_instansi.`id_kat_instansi`")->result_array();
		$data['tampilinstansi'] = $this->m_instansi->tampil_instansi()->result_array();
		
		$data['judul'] = 'Halaman Master Promo';
		$this->themeadmin->tampilkan('tampilpromo',$data);

	}

	public function simpanubah()
	{
			$IDins= $this->input->post('ubahID');
			$data['nama_produk'] = $this->input->post('ubahnama');
			$data['keterangan'] = $this->input->post('ubahket');
			$data['harga_produk'] = $this->input->post('ubahharga');

			$this->db->where("id_produk_want",$IDins);
			$this->db->update('mst_produk', $data);

			$data['id_produk_want']=$IDins;
			$data['flag'] = TRUE;
			
			$query = $this->db->query("SELECT * FROM mst_produk WHERE id_produk_want = '".$IDins."' ")->row();

			$data['id_produk_want'] = $query->id_produk_want;
			$data['nama_produk'] = $query->nama_produk;
			$data['keterangan'] = $query->keterangan;
			$data['harga_produk'] = $query->harga_produk;

			
			echo json_encode($data);
	}

	function getdata()
		{
			$idx 	= $this->input->post('idx');

			$data['ins'] 	= $this->db->query("SELECT * FROM mst_produk WHERE id_produk_want = ".$idx." ")->row_array();
			echo json_encode($data);
		}

	function hapusdata()
	{
		$id = $this->input->post('idx');
		$this->db->where('id_produk_want', $id);
		$this->db->delete('mst_produk');

		$data['flag'] = TRUE;

		echo json_encode($data);
	}

	public function simpanproduk()
		{
			
			/*print_r($_POST);
			exit();*/
			$data['nama_produk'] = $this->input->post('namaprod');
			$data['keterangan'] = $this->input->post('keterangan');
			$data['harga_produk'] = $this->input->post('harga');
	
			$this->db->insert("mst_produk", $data);
			$data['flag'] 	= TRUE;

			$produk = $this->db->query("SELECT * FROM mst_produk ORDER BY id_produk_want DESC");

			foreach ($produk->result() as  $value) {
				$row['id_produk_want'] = $value->id_produk_want;
				$row['nama_produk'] = $value->nama_produk;
				$row['keterangan'] = $value->keterangan;
				$row['harga_produk'] = $value->harga_produk;
				
				
				$data['jsonval'][] = $row;
			}
			
			echo json_encode($data);
		}

}

/* End of file Lokasi.php */
/* Location: ./application/controllers/admin/Lokasi.php */