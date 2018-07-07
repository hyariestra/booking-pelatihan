<?php 
/**
* 
*/
class M_admin extends CI_model
{
	function ambil_admin($id)
	{
		// mengambil data 1 kategori yg id_kategori nya ada di url
		//select*from kategori where id_kategori='$id'
		$hasil=$this->db->get_where('admin',array('id_admin'=>$id));
		//mecah ke array 1 data kategori
		$pecah = $hasil->row_array();
		//mengembalikan nilai karena mau menampilkan di tempat lain
		return $pecah;
	}
	
	function tampil_admin()
	{
		$ambil=$this->db->get("admin");
		$pecahdata=$ambil->result_array();
		return $pecahdata;
	}
	function ubah_admin($inputan,$id)
	{

		if ($_POST['password'])
		 {
		 	$inputan['password']=sha1(md5($inputan['password']));
		$dataadm=elements(array('email','password','nama'),
			$inputan,"-");
		
		}
		else
		{

		$dataadm=elements(array('email','nama'),
			$inputan,"-");
		}


		$this->db->where('id_admin',$id);
		$this->db->update('admin',$dataadm);
	}
}


 ?>