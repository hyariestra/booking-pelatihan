<?php 

//buat controller produk

/**

* 

*/

class product extends MY_Controller

{

	function __construct()

	{

		parent::__construct();
		$this->load->model('m_kategori');

		$this->load->model('m_produk');

		//jika blm login, maka di redirect ke pengguna/login untk login

		//jk tdk ada session pengguna, maka dilarikan ke login\

		if (!$this->session->userdata("pengguna"))

		 {

			redirect("pengguna/login");

		}

	}

	

	function tampil()

	{

			

		$data['judul']="Data Produk";

		//1. mengambil data ke model

			//a. memanggil model m_produk.php

		$this->load->model('m_produk');

			//b. memanggil fungsi tampil_produk() dari model m_produk.php dan disimpan di dataproduk

		$data['dataproduk']= $this->m_produk->tampil_produk();



		//2. menaruh di library themeadmin fungsi tampilkan dgn namafile tampilproduk.php

		$this->themeadmin->tampilkan('tampilprod',$data);

	}



	function tambah()

	{

		$this->load->model('m_kategori');

		$data['kategori']=$this->m_kategori->tampil_kategori();

		$this->load->model("m_produk");

		$datainputan=$this->input->post();



		if ($datainputan) 

		{

			$this->m_produk->simpan_produk($datainputan);

			redirect('product/tampil');

		}

		$data['judul']="Tambah produk";

		$this->themeadmin->tampilkan("tambahproduk",$data);



	}	

	function hapus($id)

	{

		$this->load->model('m_produk');

		$this->m_produk->hapus_produk($id);

		redirect('product/tampil');

	}

	function hapusprodukz()

	{

		$idx = $this->input->post('idx');
		$idy = $this->input->post('idy');

		$this->db->query("UPDATE produk SET ".$idx." = '' WHERE id_produk = '".$idy."' ");
		
		$data['flag'] = TRUE;

		echo json_encode($data);
	}

	function ubah($id)

	{

		$inputan=$this->input->post();

		if ($inputan)

		 {

			$this->m_produk->ubah_produk($inputan,$id);

			redirect('product/tampil');

		}

		$data['judul']="Ubah Produk";

		$data['produk']=$this->m_produk->ambil_produk($id);

		$data['kategori']=$this->m_kategori->tampil_kategori($id);

		$this->themeadmin->tampilkan("ubahproduk",$data);

	}

}









 ?>