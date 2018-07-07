<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

	class User extends MY_Controller 
	{
	   	
	    public function __construct() 
	    {
	        parent::__construct();
			$this->load->helper('pengunjung_helper');
	    }
		
		public function index()
		{
			$data['pengaturan'] = $this->db->query("SELECT * FROM pengaturan")->result_array();
			$data['tampilpaket'] = $this->db->query("SELECT*FROM mst_paket LEFT JOIN mst_kat_instansi ON mst_paket.`id_kat_instansi` = mst_kat_instansi.`id_kat_instansi` WHERE ispromo = 2 ")->result_array();
			$data['profil'] = $this->db->query("SELECT * from pengaturan")->row_array();
			$data['produk'] = $this->db->query("SELECT * from produk")->result_array();
			$data['kategori'] = $this->db->query("SELECT * FROM kategori")->result_array();
			
			$data['content'] = $this->load->view("user/main", $data, true);
			
			echo $this->load->view("template", $data);

			
		}
		public function daftar()
		{
			$data['judul'] = 'halah';
			$data['propinsi'] = $this->db->query("SELECT*FROM mst_propinsi");
			$data['content'] = $this->load->view('user/signup', $data, true);
			echo $this->load->view('template', $data);
		}
		public function masuk()
		{
			$data['judul'] = 'opo to cah';
			$data['content'] = $this->load->view('user/login', $data, true);
			echo $this->load->view('template', $data);
		}

	
		public function simpandatapendaftaranx()
		{
			$email = $this->input->post('email');
			$username = $this->input->post('username');

			$this->db->where("email",$email);
			$get = $this->db->get("users");

			$same = $get->num_rows();

			if ($same) {
				$isipesan="<br><div class='alert alert-danger'>Pendaftaran gagal, Email sudah Pernah digunakan</div>";
			}else{
				$data['nama_users']=$this->input->post('nama_person');
				$data['alamat_pribadi']=$this->input->post('alamat_pribadi');
				$data['nama_bumdes']=$this->input->post('nama');
				$data['alamat']=$this->input->post('alamat');
				$data['telp']=$this->input->post('telp');
				$data['email']=$this->input->post('email');
				$data['password']=$this->input->post('password');
				$data['darimana']=$this->input->post('optradio');

				if ($this->input->post('keterangan1') <>''  OR  $this->input->post('keterangan1') <> 0) {
					$ket = $this->input->post('keterangan1');
				}elseif ($this->input->post('keterangan2') <> ''  OR $this->input->post('keterangan2') <> 0 ) {
					$ket = $this->input->post('keterangan2');
				}elseif ($this->input->post('keterangan2')<>'' OR  $this->input->post('keterangan3') <> 0 ) {
					$ket = $this->input->post('keterangan3');
				}else{

				}

				$data['keterangan']=$ket;
				
				$this->db->insert('users', $data);
				$isipesan="<br><div class='alert alert-info'>Pendaftaran sukses, gunakan akun untuk login</div>";
			}
				echo json_encode($json);
			$this->session->set_flashdata("pesan",$isipesan);
			redirect("user/daftar");
			
		}
		
			public function simpandatapendaftaran()
		{
			$email = $this->input->post('email');
			$this->db->where("email",$email);
			$get = $this->db->get("users");

			$username = $this->input->post('username');
			$this->db->where("username",$username);
			$get2 = $this->db->get("users");


			$same = $get->num_rows();
			$same2 = $get2->num_rows();

			if ($same) {
				$json['notif']='<div class="alert alert-danger">
				<strong>Peringatan! </strong>Alamat Email Sudah Pernah Didaftarkan, Silahkan Gunakan Alamat Email Lain
				</div>';
			}elseif ($same2) {
				$json['notif']='<div class="alert alert-danger">
				<strong>Peringatan! </strong>Username Sudah Pernah Didaftarkan, Silahkan Gunakan Username Lain
				</div>';
			}else{
				$data['nama_users']=$this->input->post('nama_person');
				$data['username']=$this->input->post('username');
				$data['id_propinsi']=$this->input->post('propinsi');
				$data['id_kota']=$this->input->post('kota');
				$data['alamat_pribadi']=$this->input->post('alamat_pribadi');
				$data['nama_bumdes']=$this->input->post('nama');
				$data['alamat']=$this->input->post('alamat');
				$data['telp']=$this->input->post('telp');
				$data['email']=$this->input->post('email');
				$data['datecreated'] = tanggalindo();
				$data['password']= md5($this->input->post('password'));
				$data['darimana']=$this->input->post('optradio');


				if ($this->input->post('keterangan1') <>''  OR  $this->input->post('keterangan1') <> 0) {
					$ket = $this->input->post('keterangan1');
				}elseif ($this->input->post('keterangan2') <> ''  OR $this->input->post('keterangan2') <> 0 ) {
					$ket = $this->input->post('keterangan2');
				}elseif ($this->input->post('keterangan2')<>'' OR  $this->input->post('keterangan3') <> 0 ) {
					$ket = $this->input->post('keterangan3');
				}else{
					$ket = 'Tidak Ada Keterangan';
				}


				$data['keterangan']=$ket;
				

				$this->db->insert('users', $data);
				$json['flag'] 	= TRUE;
				$json['notif']='<div class="success">
				<span class="closebtn" onclick="suksez()">&times</span> 
				<strong>Selamat! Pendaftaran Berhasil, Silahkan Gunakan Email Anda Untuk Login.</strong>
				</div><br>';
			}

				echo json_encode($json);
			
		}

		public function ubahdatauser()
		{
			$ids = $this->session->userdata('pelanggan')['id_users'];
			$telp = $this->input->post('telp');
			$alamat = $this->input->post('alamat');

			$this->db->query("UPDATE users SET alamat = '".$alamat."', telp ='".$telp."' WHERE id_users = '".$ids."'");

			$json['flag'] = TRUE;
			$json['notif'] = "<div style='padding: 10px !important;font-size:13px !important;'; class='success'>
				<span class='closebtn' onclick='suksez()'>&times</span> 
				<strong>Data Profil Berhasil Diupdate</strong>
				</div>";

			echo json_encode($json);

		}

		public function ubahpassword()
		{
			$ids = $this->session->userdata('pelanggan')['id_users'];
			$new = $this->input->post('new_pass');
			$con = $this->input->post('con_pass');
			$new = md5($new);
			$con = md5($con);

			if ($new !== $con) {
				$json['flag'] = FALSE;
				$json['notif'] = "<div style='padding: 10px !important;font-size:13px !important;'; class='alert'>
				<span class='closebtn' onclick='suksez()'>&times</span> 
				<strong>Password tidak cocok!</strong>
				</div><br>";
			}else{


					$this->db->query("UPDATE users SET password = '".$new."' WHERE id_users = '".$ids."'");

				$json['flag'] = TRUE;
				$json['notif'] = "<div style='padding: 10px !important;font-size:13px !important;'; class='success'>
				<span class='closebtn' onclick='suksez()'>&times</span> 
				<strong>Password Berhasil Diupdate</strong>
				</div><br>";
			}
			echo json_encode($json);
		}



		function login()
		{

			$inputan=$this->input->post();

			$this->load->model("M_user");

			$hasil=$this->M_user->login_pelanggan($inputan);

			if ($hasil=="sukses")
			{
				$isipesan="<br><br><div class='success'>
				<span class='closebtn' onclick='suksez()'>&times</span> 
				<strong>Login Berhasil</strong>
				</div>";
				$this->session->set_flashdata("pesan",$isipesan);
				redirect("");
			}

			else
			{
				$isipesan="<br><br><div class='alert'>
				<span class='closebtn' onclick='cuk()'>&times</span> 
				<strong>Email atau Password anda Salah, silahkan coba lagi</strong>
				</div>";
				$this->session->set_flashdata("pesan",$isipesan);
				redirect("");
			}

		}
		function logout()
		{
		

		$this->session->unset_userdata('pelanggan');
		redirect("");
		}

		function promo()
		{

			$data['instansi'] =$this->db->query("SELECT * FROM mst_kat_instansi");
			$data['program'] =$this->db->query("SELECT * FROM mst_lokasi_program where id_lokasi_program = '2' ");
			$data['tema'] =$this->db->query("SELECT * FROM mst_theme WHERE id_theme = '1' ");
			$data['produk'] =$this->db->query("SELECT * FROM mst_produk WHERE id_produk_want ='5' ");
			$data['propinsi'] = $this->db->query("SELECT * FROM mst_propinsi");
			$data['kategori'] = $this->db->query("SELECT * FROM mst_kategori_instansi");

			$callendar = $this->db->query("SELECT * FROM trx_booking");

			
			foreach ($callendar->result_array() as  $value)
			{
				$row['title'] = $value['nama_pemesan'];
				$row['namdes'] = $value['nama_bumdes'];
				$row['start'] = $value['tgl_mulai'];
				$row['end'] = $value['tgl_selesai'];
			/*	if ($value['status']=='Booking') {

					$row['color'] = '#82CF31';
				}
				elseif ($value['status']=='Pending')
				{
					$row['color'] = orange;
				}*/

				$json['call'][] = $row;
			}

			$data['kalender'] = $json;

			$data['content'] = $this->load->view("user/promo", $data, true);
			echo $this->load->view("template", $data);
		}

		 function register($id)
		{
			if ($id=='all') {
				$data['instansi'] =$this->db->query("SELECT * FROM mst_kat_instansi");
			}else{
				$data['instansi'] =$this->db->query("SELECT * FROM mst_kat_instansi WHERE id_kat_instansi = '".$id."'");
			}

			$data['program'] =$this->db->query("SELECT * FROM mst_lokasi_program");
			$data['tema'] =$this->db->query("SELECT * FROM mst_theme");
			$data['produk'] =$this->db->query("SELECT * FROM mst_produk WHERE promo = 1 ");
			$data['propinsi'] = $this->db->query("SELECT * FROM mst_propinsi");
			$data['kategori'] = $this->db->query("SELECT * FROM mst_kategori_instansi");

			$callendar = $this->db->query("SELECT * FROM trx_booking");

			
			foreach ($callendar->result_array() as  $value)
			{
				$row['title'] = $value['nama_pemesan'];
				$row['namdes'] = $value['nama_bumdes'];
				$row['start'] = $value['tgl_mulai'];
				$row['end'] = $value['tgl_selesai'];
			/*	if ($value['status']=='Booking') {

					$row['color'] = '#82CF31';
				}
				elseif ($value['status']=='Pending')
				{
					$row['color'] = orange;
				}*/

				$json['call'][] = $row;
			}

			$data['kalender'] = $json;

			$data['content'] = $this->load->view("user/register", $data, true);
			echo $this->load->view("template", $data);
		}
		
		public function registerkat($id)
		{
			$data['instansi'] =$this->db->query("SELECT * FROM mst_kat_instansi WHERE id_kat_instansi = '".$id."'");
			$data['program'] =$this->db->query("SELECT * FROM mst_lokasi_program");
			$data['tema'] =$this->db->query("SELECT * FROM mst_theme");
			$data['produk'] =$this->db->query("SELECT * FROM mst_produk");
			$data['propinsi'] = $this->db->query("SELECT * FROM mst_propinsi");
			$data['kategori'] = $this->db->query("SELECT * FROM mst_kategori_instansi");
		
			
		
			$callendar = $this->db->query("SELECT * FROM trx_booking");

			foreach ($callendar->result_array() as  $value)
			{
				$row['title'] = $value['nama_pemesan'];
				$row['start'] = $value['tgl_mulai'];
				$row['end'] = $value['tgl_selesai'];
			/*	if ($value['status']=='Booking') {

					$row['color'] = '#82CF31';
				}
				elseif ($value['status']=='Pending')
				{
					$row['color'] = orange;
				}*/

				$json['call'][] = $row;
			}

			$data['kalender'] = $json;

			$data['content'] = $this->load->view("user/registerkat", $data, true);
			echo $this->load->view("template", $data);
		}
		public function booking()
		{
			$status = $this->input->post("x");
			$seqDB = $this->db->query("SELECT * FROM trx_booking")->num_rows();
			$addons = '';
			if (isset($_POST['addons'])) {
				$addons = implode(",", $_POST['addons']);
			}


			$pattern = date("dmY").$seqDB+1;
			
			$star = date("Y-m-d", strtotime($this->input->post("tglmulai")));
			$end = date("Y-m-d", strtotime($this->input->post("tglselesai")));
			$idsession = $this->session->userdata('pelanggan')['id_users'];


			$data['no_order'] = $pattern;
			$data['nama_pemesan'] = $this->input->post("nama");
			$data['nama_bumdes'] = $this->input->post("namabumdes");
			$data['kode_propinsi'] = $this->input->post("propinsi");
			$data['kode_kota'] = $this->input->post("kota");
			$data['alamat'] = $this->input->post("alamat");
			$data['telp'] = $this->input->post("telp");
			$data['email'] = $this->input->post("email");
			$data['kategori_instansi'] = $this->input->post("instansi");
			$data['produk'] = $this->input->post("produk");
			$data['tema'] = $this->input->post("tema");
			$data['program'] = $this->input->post("program");
			$data['jml_peserta'] = $this->input->post("jmlpeserta");
			$data['tgl_mulai'] = $star."T00:00:00";
			$data['tgl_selesai'] = $end."T24:00:00";
			$data['fasilitas_tambahan'] = $addons;
			$data['keterangan_produk'] = $this->input->post("keterangan_produk");
			$data['keterangan_produk_lainnya'] = $this->input->post("keterangan_lainnya");
			$data['alamat_peserta'] = $this->input->post("alamat_peserta");
			$data['tema_lainnya'] = $this->input->post("tema_lainnya");
			$data['status'] = $this->input->post("damn");
			$data['proses'] = 'Diproses';
			$data['hari_booking'] = $this->input->post("hari");
			$data['id_users'] = $this->session->userdata('pelanggan')['id_users'];

		/*	echo "<pre>";
			echo print_r($data);
			echo "</pre>";
			return false();*/

			$this->db->insert("trx_booking", $data);



			$idpt=$this->db->insert_id();
			
			$querydet = $this->db->query("SELECT mst_kat_instansi.`nama_instansi`, mst_produk.`nama_produk`, mst_theme.`nama_theme`,
				mst_lokasi_program.nama_program,
				mst_produk.`harga_produk`, mst_kat_instansi.harga_ins, mst_lokasi_program.`harga_program`, mst_theme.`harga_theme` FROM trx_booking LEFT JOIN mst_kat_instansi ON mst_kat_instansi.`id_kat_instansi` = trx_booking.kategori_instansi 
				LEFT JOIN mst_produk ON mst_produk.`id_produk_want` = trx_booking.`produk`
				LEFT JOIN mst_theme ON mst_theme.`id_theme` = trx_booking.`tema`
				LEFT JOIN mst_lokasi_program ON  mst_lokasi_program.`id_lokasi_program` = trx_booking.`program`
				WHERE id_booking = '".$idpt."' ")->result_array();

			foreach ($querydet as $key => $value)
			 {
				$det['id_users'] = $idsession;
				$det['id_pemesanan'] = $idpt;
				$det['tanggal_pesan'] = tanggalindo();
				$det['harga_ins'] = $value['harga_ins']; 
				$det['harga_produk'] =  $value['harga_produk'];
				$det['harga_program'] =  $value['harga_program'];
				$det['harga_theme'] =  $value['harga_theme'];
				$det['det_tgl_mulai'] = $star;
				$det['det_tgl_selesai'] = $end;
				$det['det_instansi'] = $value['nama_instansi'];
				$det['det_produk'] = $value['nama_produk'];
				$det['det_tema'] = $value['nama_theme'];
				$det['det_program'] = $value['nama_program'];
		
				$this->db->insert("trx_booking_det",$det);
			}

			$json['msn'] = $pattern;
			
			echo json_encode($json);


		}
		
		public function invoice()
		{
			$no_order = $_GET['msn'];
			
			$data['booking'] = $this->db->query("SELECT * FROM trx_booking
			LEFT JOIN mst_kat_instansi ON mst_kat_instansi.id_kat_instansi = trx_booking.kategori_instansi
			LEFT JOIN mst_produk ON mst_produk.id_produk_want = trx_booking.produk
			LEFT JOIN mst_theme ON mst_theme.id_theme = trx_booking.tema
			LEFT JOIN mst_lokasi_program ON mst_lokasi_program.id_lokasi_program = trx_booking.program
			WHERE trx_booking.no_order = '".$no_order."'");
			
			$data['content'] = $this->load->view("user/resultRAB", $data, true);
			
			echo $this->load->view("template", $data);
		}

		public function congrat()
		{
			$data['title'] = 'judul';
			$data['content'] = $this->load->view('congrat', $data, true);
			echo $this->load->view('template', $data);
		}

		public function profil()
		{
			$id = $this->session->userdata('pelanggan')['id_users'];
			$data['profil'] = $this->db->query("SELECT*FROM users WHERE id_users = '".$id."' ")->row_array();
			$data['riwayat'] = $this->db->query("SELECT *, trx_booking_det.`harga_ins` AS hargainsdet, trx_booking_det.`harga_produk` AS hargaprodukdet, trx_booking_det.`harga_program` 
				AS hargaprogramdet, trx_booking_det.harga_theme AS hargathemedet
				FROM trx_booking LEFT JOIN trx_booking_det ON trx_booking.`id_booking` = trx_booking_det.`id_pemesanan` WHERE trx_booking_det.id_users = '".$id."'")->result_array();
			$data['title'] = 'halaman profile';
			$data['content'] = $this->load->view('profil', $data, TRUE);
			echo $this->load->view('template', $data);
		}
		
		public function getKab()
		{
			$kodeprop = $this->input->post("kodeprop");
			
			$kabupaten = $this->db->query("SELECT * FROM mst_kabupaten 
			WHERE mst_kabupaten.kode_propinsi = '".$kodeprop."'");
			
			foreach($kabupaten->result() as $kab)
			{
				$data['idkabupaten'] = $kab->id_kabupaten;
				$data['kodekabupaten'] = $kab->kode_kabupaten;
				$data['namakabupaten'] = $kab->nama_kabupaten;
				
				$json['kabupaten'][] = $data;
			}
			
			echo json_encode($json);
		}
		
	}

/* End of file user.php */