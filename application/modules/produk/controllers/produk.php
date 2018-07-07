<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class produk extends MY_Controller {

	public function tampil()
	{
		$data['tampilproduk'] = $this->db->query("SELECT * FROM mst_produk")->result_array();
		$data['judul'] = 'Halaman Master Produk';
		$this->themeadmin->tampilkan('tampilproduk',$data);

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