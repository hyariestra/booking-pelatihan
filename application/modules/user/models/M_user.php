<?php 



/**

* 

*/

class M_user extends CI_model

{

	
	function login_pelanggan($inputan)

	{

		$inputan['password_pelanggan']=md5($inputan['password_pelanggan']);

	

		$email=$inputan['email_pelanggan'];

		

		$pass=$inputan['password_pelanggan'];



	
		$this->db->where("email",$email);
		$this->db->or_where('username', $email);

		$this->db->where("password",$pass);

		$cek=$this->db->get("users");



	

		$hitung=$cek->num_rows();

	

		if ($hitung > 0)

		 {
		 	$pecah=$cek->row_array();

		 	$this->session->set_userdata("pelanggan",$pecah);

		 	return "sukses";

		}

		else

		 {

		 return"gagal";

		}

	}





}



?>