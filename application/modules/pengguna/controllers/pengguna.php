<?php 

/**
* 
*/
class pengguna extends MY_Controller
{

	
	function login()
	{
		//skrip login
		
		$data['judul']="Login Admin";
		//taruh di view login.php
		$this->load->view("login",$data);
	}
	
	function loginx()
	{
		$inputan=$this->input->post();
		$this->load->model("M_pengguna");
		if ($inputan)
		 {
			$hasil=$this->M_pengguna->login_pengguna($inputan);
			if ($hasil=="sukses") 
			{
				$isipesan="<br><div class='alert alert-info'>Login sukses</div>";
			$this->session->set_flashdata("pesan",$isipesan);
			/*$_SESSION['ses_admin']="admin";
			$_SESSION['ses_kcfinder']=array();
			$_SESSION['ses_kcfinder']['disabled'] = false;
			$_SESSION['ses_kcfinder']['uploadURL'] = "../content_upload";*/
			$this->admin();
				redirect("admin/");
			}
			else
			{
				$isipesan="<br><div class='alert alert-danger'>Username atau Password salah!</div>";
			$this->session->set_flashdata("pesan",$isipesan);
				redirect("pengguna/login");
			}
		}

	}


	function admin()
	{
		$session=isset($_SESSION['ses_admin']) ? $_SESSION['ses_admin']:'';
		if($session==""){
			$this->login();
		}
		else { redirect("admin/"); }
	}
	
	function logout()
	{
		$this->session->unset_userdata("pengguna");
		redirect("pengguna/login");
	}
	function validasitrial()
	{
		$data['judul']="Login Admin";
		//taruh di view login.php
		$this->load->view("admin/tampilvalidasi",$data);

	}
}

 ?>