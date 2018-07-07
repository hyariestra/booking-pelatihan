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




  public function view(){
    return $this->db->get('grafik_narasumber')->result(); // Tampilkan semua data yang ada di tabel siswa
  }
  
  // Fungsi untuk melakukan proses upload file
  public function upload_file($filename){
    $this->load->library('upload'); // Load librari upload
    
    $config['upload_path'] = './excel/';
    $config['allowed_types'] = 'xlsx';
    $config['max_size']  = '2048';
    $config['overwrite'] = true;
    $config['file_name'] = $filename;
  
    $this->upload->initialize($config); // Load konfigurasi uploadnya
    if($this->upload->do_upload('file')){ // Lakukan upload dan Cek jika proses upload berhasil
      // Jika berhasil :
      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
      return $return;
    }else{
      // Jika gagal :
      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
      return $return;
    }
  }
  
  // Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
  public function insert_multiple($data){
    $this->db->insert_batch('grafik_narasumber', $data);
  }

}

 ?>