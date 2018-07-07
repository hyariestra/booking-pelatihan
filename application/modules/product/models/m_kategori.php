<?php 



/**

* 

*/

class m_kategori extends CI_model

{

	

	function tampil_kategori()

	{

		// fungsi ini bertugas mengambil data ke tbl kategori, lalu mengirimkan ke controller

		// 1. ambil data

		$ambil=$this->db->get("kategori");



		// 2. memecah data ke array karena datanya banyak

		$pecahdata = $ambil->result_array();



		// 3. mengirim data ke controller

		return $pecahdata;

	}
	function tampil_kategori_motor()
	{
		$ambil = $this->db->query("SELECT*FROM kategori WHERE nama_kategori LIKE '%monel%'");
		$pecahdata = $ambil->result_array();
		return $pecahdata;

	}
	function tampil_kategori_mobil()
	{
		$ambil = $this->db->query("SELECT*FROM kategori WHERE nama_kategori LIKE '%mobil%'");
		$pecahdata = $ambil->result_array();
		return $pecahdata;

	}
	function tampil_kategori_akses()
	{
		$ambil = $this->db->query("SELECT*FROM kategori WHERE nama_kategori LIKE '%aksesoris%'");
		$pecahdata = $ambil->result_array();
		return $pecahdata;

	}


	function simpan_kategori($datainputan)

	{



		//foto

		//pengaturan upload mengatur lokasi gambat kategori akan disimpan

		$config['upload_path']  = './assets/foto_kategori/';



		//pengaturan tipe file yg boleh diupload 

		$config['allowed_types'] = 'gif|jpg|png';



		//mengenalkan pengaturan upload kita ke library upload nya CI

		$this->upload->initialize($config);



		//tindakan upload gambar bserta proportinya (ukuran, tipe, dll)

		$this->upload->do_upload('gambar_kategori');



		//menyimpan data gambar yang di upload beserta propertinya (ukuran, tipe)

		$gambarterupload=$this->upload->data();



		//mengambil nama file saja untuk disimpan di tabel kategori

		$datainputan['gambar_kategori']=$gambarterupload['file_name'];





		//menyiapkan array yg mau disimpan ke table kategori

		$datakat=elements(array('nama_kategori','gambar_kategori'),

			$datainputan,"-");



		//menyimpan ke tabel kategori 

		$this->db->insert('kategori',$datakat);

	}

	function hapus_kategori($id)

	{

		//mengambil data kategori yang id_kategorinya adalah $id

		$datayangmaudihapus = $this->ambil_kategori($id);



		//mendapat namafile dari gambar_kategori yang mau di hapus

		$gambaryangmaudihapus = $datayangmaudihapus['gambar_kategori'];



		//menghapus gambar_kategori dari folder assets/foto_kategori/namafile.jpg

		unlink("./assets/foto_kategori/$gambaryangmaudihapus");





		//menghapus data kategori dari tabel

		$this->db->where('id_kategori',$id);

		$this->db->delete('kategori');

	}



	function ambil_kategori($id)

	{

		// mengambil data 1 kategori yg id_kategori nya ada di url

		//select*from kategori where id_kategori='$id'

		$hasil=$this->db->get_where('kategori',array('id_kategori'=>$id));

		//mecah ke array 1 data kategori

		$pecah = $hasil->row_array();

		//mengembalikan nilai karena mau menampilkan di tempat lain

		return $pecah;

	}

	function ubah_kategori($inputan,$id)

		{



			$config['upload_path']  = './assets/foto_kategori/';

			$config['allowed_types'] = 'gif|jpg|png';

			$this->upload->initialize($config);

			

			$mengupload=$this->upload->do_upload('gambar_kategori');



			if ($mengupload)

			 {

				$gambarterupload=$this->upload->data();

				$inputan['gambar_kategori']=$gambarterupload['file_name'];

				$datakat=elements(array('nama_kategori','gambar_kategori'),

				$inputan,"-");

			}

			

			else

			{

				$datakat=elements(array('nama_kategori'),

			$inputan,"-");

			}



			



			$this->db->where('id_kategori',$id);

			$this->db->update('kategori',$datakat);

		}	





}



?>