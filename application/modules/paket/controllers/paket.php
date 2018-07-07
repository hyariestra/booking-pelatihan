<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class paket extends MY_Controller {


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

		$data['tampilpaket'] = $this->db->query("SELECT*FROM mst_paket LEFT JOIN mst_kat_instansi ON mst_paket.`id_kat_instansi` = mst_kat_instansi.`id_kat_instansi` ")->result_array();
		

		$data['kategori'] = $this->db->query("SELECT*FROM mst_kat_instansi")->result_array();
		$data['produk'] = $this->db->query("SELECT*FROM mst_produk")->result_array();
		$data['tambahan'] = $this->db->query("SELECT*from mst_personil")->result_array();
		$data['judul'] = 'Halaman Master Paket';
		$this->themeadmin->tampilkan('tampilpaket',$data);

	}
	public function simpanins()
		{
			/*print_r($_POST);
			exit()*/;
			$addons = implode(",", $_POST['addons']);
			$data['nama_paket'] = $this->input->post('namapaket');
			$data['id_kat_instansi'] = $this->input->post('id_kategori');
			$data['jumlah_hari'] = $this->input->post('jmlhari');
			$data['fasilitas_paket'] = $this->input->post('keterangan');
			$data['harga_paket'] = $this->input->post('hargapaket');
			$data['ispromo'] = $this->input->post('ispromo');
			$data['id_personil'] = $addons;
	
	
			$this->db->insert("mst_paket", $data);
			$data['flag'] 	= TRUE;

			$ins = $this->db->query("SELECT * FROM mst_paket LEFT JOIN mst_kat_instansi ON mst_paket.`id_kat_instansi` = mst_kat_instansi.`id_kat_instansi` ORDER BY mst_paket.`id_paket` DESC")->row();

				$idp=  explode(',', $ins->id_personil);

				foreach ($idp as $key => $word) {
				
				$light = $this->db->query("SELECT * FROM mst_personil WHERE id_personil = '".$word."'  ");	

				}
				$datains['id_paket'] = $ins->id_paket;
				$datains['id_kat_instansi'] = $ins->id_kat_instansi;
				$datains['nama_paket'] = $ins->nama_paket;
				$datains['nama_alias'] = $ins->nama_alias;
				$datains['nama_instansi'] = $ins->nama_instansi;
				$datains['fasilitas_paket'] = $ins->fasilitas_paket;
				$datains['jumlah_hari'] = $ins->jumlah_hari;
				$datains['harga_paket'] = $ins->harga_paket;
				$datains['status'] = 	($ins->ispromo==1)?'Tidak Aktif': 'Aktif';
				$datains['fasilitas'] = $light->first_row()->keterangan;

				$data['jsonvalue'][] = $datains;
				echo json_encode($data);
		}

		function simpanubahins()
		{

		/*	echo "<pre>";
			print_r($_POST);
			echo "<pre>";
			exit();*/

			$IDins= $this->input->post('ubahIDpaket');
			$addons = implode(",", $_POST['addonsEdit']);
			$data['id_kat_instansi'] = $this->input->post('ubahid_kategori');
			$data['nama_paket'] = $this->input->post('ubahnamapaket');
			$data['fasilitas_paket'] = $this->input->post('ubahketerangan');
			$data['jumlah_hari'] = $this->input->post('ubahjmlhari');
			$data['harga_paket'] = $this->input->post('ubahhargapaket');
			$data['ispromo'] = $this->input->post('ubahispromo');
			$data['id_personil'] = $addons;

			$this->db->where("id_paket",$IDins);
			$this->db->update('mst_paket', $data);

			$data['id_paket']=$IDins;
			$data['flag'] = TRUE;

			$paket =$this->db->query("SELECT * FROM mst_paket LEFT JOIN mst_kat_instansi ON mst_paket.`id_kat_instansi` = mst_kat_instansi.`id_kat_instansi` WHERE mst_paket.`id_paket` = '".$IDins."' ")->row();

			$haha = explode(',', $paket->id_personil);

			foreach ($haha as $key => $value) {
				
			$idp = $this->db->query("SELECT*FROM mst_personil WHERE id_personil = '".$value."' ");

			}

			$data['id_paket'] = $paket->id_paket;
			$data['nama_paket'] = $paket->nama_paket;
			$data['nama_alias'] = $paket->nama_alias;
			$data['nama_instansi'] = $paket->nama_instansi;
			$data['fasilitas_paket'] = $paket->fasilitas_paket;
			$data['jumlah_hari'] = $paket->jumlah_hari;
			$data['harga_paket'] = $paket->harga_paket;
			$data['status'] = ($paket->ispromo==1)?'Tidak Aftif':'Aktif';
			$data['fasilitas'] = $idp->first_row()->keterangan;


			echo json_encode($data);
		}

	function getdatains()
		{
			$idx 	= $this->input->post('idx');

			$data['ins'] 	= $this->db->query("SELECT * FROM mst_paket LEFT JOIN mst_kat_instansi ON mst_paket.`id_kat_instansi` = mst_kat_instansi.`id_kat_instansi` WHERE mst_paket.`id_paket` = ".$idx." ")->row_array();


			

			echo json_encode($data);
		}
	function hapusins()
	{
			$id = $this->input->post('idx');
			$this->db->where('id_paket', $id);
			$this->db->delete('mst_paket');

			$data['flag'] = TRUE;

			echo json_encode($data);
	}
}



/* End of file Instansi.php */
/* Location: ./application/controllers/admin/Instansi.php */