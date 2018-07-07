<?php 

/**

* 

*/

class Themeadmin

{

	//1.buat konstruct (fungsi otomatis berjalan)

	function __construct()

	{

		//menjadi library themeadmin buatan kita seperti biatan CI

		$this->ci =& get_instance();

	}

	//tampilkan dlm arti menaruh data serta nama file di konten tengah2 index admin

	function tampilkan($namafile, $datanya)

	{

		//mengambil file serta data yang dikirimkan controller

		$data['konten'] = $this->ci->load->view($namafile, $datanya, TRUE);



		//menaruh di index.php admin di folder admin

		$this->ci->load->view('admin/index',$data);



	}

}







 ?>