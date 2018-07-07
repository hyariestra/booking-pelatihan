<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed');

	class User extends MY_Controller 
	{
	   	
	    public function __construct() 
	    {
	        parent::__construct();
			
	    }
		
		public function index()
		{
			
			$data['content'] = $this->load->view("user/main", "", true);
			
			echo $this->load->view("template", $data);
		}
		
		public function register()
		{
			$data['instansi'] =$this->db->query("SELECT * FROM mst_kat_instansi");
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

			$data['content'] = $this->load->view("user/register", $data, true);
			echo $this->load->view("template", $data);
		}
		
		public function booking()
		{
			$status = $this->input->post("x");
			$seqDB = $this->db->query("SELECT * FROM trx_booking")->num_rows();
			$addons = implode(",", $_POST['addons']);
			
			$pattern = date("dmY").$seqDB+1;
			
			$star = date("Y-m-d", strtotime($this->input->post("tglmulai")));
			$end = date("Y-m-d", strtotime($this->input->post("tglselesai")));


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
			$data['status'] = $this->input->post("damn");

		/*	echo "<pre>";
			echo print_r($data);
			echo "</pre>";
			return false();*/


			$this->db->insert("trx_booking", $data);
			
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