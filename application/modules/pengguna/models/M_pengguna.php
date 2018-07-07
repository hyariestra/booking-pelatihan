<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

/**

* 

*/

class M_pengguna extends CI_Model

{

	

	function login_pengguna($inputan)

	{

		$em = $inputan['email'];

		$pass = md5($inputan['password']);

		$this->db->where("email",$em);

		$this->db->where("password",$pass);

		$cek = $this->db->get("admin");



		$hitung = $cek->num_rows(); 



		

		if ($hitung > 0)

		 {

			$ambil=$cek->row_array(); 
			$this->session->set_userdata("pengguna",$ambil); 
			return "sukses";

		}

		

		else

		{

			return "gagal";

		}



	}

}





 ?>