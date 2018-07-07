<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class item extends MY_Controller {


	  public function __construct() 
	    {
	        parent::__construct();
			$this->load->helper('pengunjung_helper');
			$this->load->model("m_produk");
	    }


	  function getongkos()
	  {
	  	
	/*  	echo "<pre>";
	  	echo print_r($_POST);
	  	echo "</pre>";
	  	exit();*/
			$tujuan = $this->input->post("id_kota");
			$ekspedisi = $this->input->post("jasaekspedisi");
			$jumlah = $this->input->post("jumlah");
			$berat = $this->input->post("berat");
	
			$beratbelanja=$berat*$jumlah;
		
			$data['ongkos'] = api_ongkir("501",$tujuan,$beratbelanja,$ekspedisi);


			echo $data['ongkos'];
			//echo $data;
	  }

	  public function cal()
	  {

			$data['content'] = $this->load->view("cal", true);
			echo $this->load->view("template",$data);
	  }

			
		function simpanpembelian()
		{		
			$idsession = $this->session->userdata('pelanggan')['id_users'];
			if (isset($idsession))
			 {
				$sess = $idsession;
			}else{
				$sess = '0';
			}

			$code = $this->input->post("kode_pembelian");
			$data['id_pelanggan'] = $sess;
			$data['nama_penerima'] = $this->input->post("namapenerima");
			$data['telp_penerima'] = $this->input->post("telppenerima");
			$data['kode_pembelian'] = $this->input->post("kode_pembelian");
			$data['tanggal_pembelian'] = tanggalindo();
			$data['total_pembelian'] = $this->input->post("totalhargabarang");
			$data['biaya_pengiriman'] = $this->input->post("etd");
			$data['total_bayar'] = $this->input->post("subtotalz");
			$data['alamat_pengiriman'] = $this->input->post("address");
			$data['alamat_pelanggan'] = $this->input->post("alamatdetail");
			$data['ekspedisi'] = $this->input->post("ekspedisi");
			$data['paket_ekspedisi'] = $this->input->post("paketekspedisi");
			$data['waktu_tempuh'] = $this->input->post("ongkir");
			$data['status_pembelian'] = 'Belum Lunas';
			$data['jmlproduk'] = $this->input->post("idjumlah");
			$data['catatan'] = $this->input->post("catatan");
			$data['status_pengiriman'] = 'Pending';

			$this->db->insert("pembelian", $data);


			
			$idpt=$this->db->insert_id();
			$idproduk = $this->input->post('idproduk');
			$namaproduk = $this->input->post('namaproduk');
			$hargasatuan = $this->input->post('hargasatuan');
			$berat = $this->input->post('berat');
			$ukuran = $this->input->post('ukuran');
			$jumlahdet = $this->input->post('jumlahdet');

			foreach ($ukuran as $keyA => $valueA)
			{
				foreach ($jumlahdet as $keyB => $valueB)
				{


					if ($keyA == $keyB)
					{
						

						$detail['id_pembelian'] = $idpt;
						$detail['id_produk'] =$idproduk;
						$detail['nama_beli'] = $namaproduk;
						$detail['harga_beli'] = $hargasatuan;
						$detail['berat_beli'] = $berat;
						$detail['ukuran'] = $valueA;
						$detail['jumlahdet'] = $valueB;

						$this->db->insert("pembelian_detail", $detail);
						$json['kode'] = $code;
					}

				}
			}

			
			echo json_encode($json);
			
		}		

	public function success()
		{
			$data['title'] = 'judul';
			$data['content'] = $this->load->view('congrat', $data, true);
			echo $this->load->view('template', $data);
		}


	public function detail($id)
		{
		


			$query=$this->db->query("select id_pembelian from pembelian");

			$max=$query->num_rows()+1;

			$menus = ('PEM-'.$max);

			$data['kd_pem'] = $menus;

			$data['kota'] = api_kota();
			$data['judul'] = 'judul';
			$data['detail']=$this->m_produk->ambil_produk($id);
			$data['content'] = $this->load->view("item/main",$data, true);
			
			echo $this->load->view("template", $data);

			
		}

		public function allitem()
		{
			$data['semua'] = $this->db->query("SELECT * FROM produk")->result();
			$data['kategori'] = $this->m_produk->getkategori();
			$data['produk'] = $this->db->query("SELECT * FROM produk")->result_array();

			$data['content'] = $this->load->view("item/allitem",$data, true);
			echo $this->load->view("template",$data);
		}

		function cekongkir()
		{

			$asal = $_POST['asal'];
			$id_kabupaten = $_POST['kab_id'];
			$kurir = $_POST['kurir'];
			$berat = $_POST['berat'];

			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => "origin=".$asal."&destination=".$id_kabupaten."&weight=".$berat."&courier=".$kurir."",
				CURLOPT_HTTPHEADER => array(
					"content-type: application/x-www-form-urlencoded",
					"key: 264d2a655ff5ec40c919036fe1948cc7"
				),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				echo $response;
			}

		}

		function datakabupaten()
		{
			$provinsi_id = $_GET['prov_id'];

			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$provinsi_id",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
				CURLOPT_HTTPHEADER => array(
					"key: 264d2a655ff5ec40c919036fe1948cc7"
				),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
  //echo $response;
			}

			$data = json_decode($response, true);
			for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
				echo "<option value='".$data['rajaongkir']['results'][$i]['city_id']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
			}


		}	

	function checkout()
	{
		// jika belum login, maka di redirect ke index atau utama

		$data['judul'] = "Check out";
	
		$data['kota'] = api_kota();

		// jika view mengirimkan id_kota, maka disimpan di variabel kotatujuan
		if($this->input->post("id_kota"))
		{
			$data['kotatujuan'] = $this->input->post("id_kota");
		}
		else
		{
			$data['kotatujuan'] = "";//klo view gak ngirim kotatujuan=0
		}

		// jika view mengirimkan jasaekspedisi, mka disimpan di variabel jasaekspedisi
		if($this->input->post("jasaekspedisi"))
		{
			$data['jasaekspedisi'] = $this->input->post("jasaekspedisi");
		}
		else
		{
			$data['jasaekspedisi'] = "";
		}

		// mendapatkan beratbelanja dari model M_keranjang fungsi tampil_keranjang
		$data['beratbelanja']=1000;
		

		$data['ongkos'] = api_ongkir("501",$data['kotatujuan'],$data['beratbelanja'],$data['jasaekspedisi']);
		

		$pak = $this->input->post("paket");
		if (isset($pak) AND $pak!="") 
		{
			$data['paket'] = $this->input->post('paket');
		}
		else
		{
			$data['paket'] = "";
		}

		// ngurusin potongan/diskon
		// jika kode kupon diinput
			$data['content'] = $this->load->view("item/checkout",$data, true);
			
			echo $this->load->view("template", $data);


		

		}
		
	function getdata()
		{
			$idx 	= $this->input->post('idx');

			$data['ins'] 	= $this->db->query("SELECT * FROM mst_produk WHERE id_produk_want = ".$idx." ")->row_array();
			echo json_encode($data);
		}

	function kategori($idp)
		{
			$data['kategoriproduk'] = $this->db->query("SELECT * FROM produk LEFT JOIN kategori ON produk.id_kategori = kategori.id_kategori WHERE produk.id_kategori = '".$idp."' ")->result_array();

			$data['kategori'] = $this->m_produk->getkategori();
			$data['content'] = $this->load->view("item/kategori",$data, true);
			echo $this->load->view("template", $data);

		}




}

/* End of file Lokasi.php */
/* Location: ./application/controllers/admin/Lokasi.php */