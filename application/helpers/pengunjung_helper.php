<?php 



function panggil_file($namafile)

{

	//mengakses core dari codeingiter

	$ci =& get_instance();

	return $ci->load->view($namafile);

}

//utk dapat data kota

 function api_provinsi()
{
	   $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
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

 //$response data berbentuk json

  //echo $response



//agar bisa dpakaii harus di konvert ke array

		$data=json_decode($response,TRUE);

  //hanya ambil data kota

		$datakota=$data['rajaongkir']['results'];

		
		return $datakota;



	}

}

function api_kota()

{

	$curl = curl_init();



	curl_setopt_array($curl, array(

		CURLOPT_URL => "http://api.rajaongkir.com/starter/city?id=&province=",

		CURLOPT_RETURNTRANSFER => true,

		CURLOPT_ENCODING => "",

		CURLOPT_MAXREDIRS => 10,

		CURLOPT_TIMEOUT => 30,

		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

		CURLOPT_CUSTOMREQUEST => "GET",

		CURLOPT_HTTPHEADER => array(

			"key: 177cab2b890e9d7ff020ebe0f63b5612"
			//"key: 66b26d12b4ffcf3e2fc36200a15a0621"
			//"key: 264d2a655ff5ec40c919036fe1948cc7"

			),

		));



	$response = curl_exec($curl);

	$err = curl_error($curl);



	curl_close($curl);



	if ($err) {

		echo "cURL Error #:" . $err;

	} else {

 //$response data berbentuk json

  //echo $response



//agar bisa dpakaii harus di konvert ke array

		$data=json_decode($response,TRUE);

  //hanya ambil data kota

		$datakota=$data['rajaongkir']['results'];

		



		return $datakota;



	}



}





//dpt paket dan biaya

function api_ongkir($kotaasal,$kotatujuan,$beratbelanja,$ekspedisi)

{

	$curl = curl_init();




	curl_setopt_array($curl, array(

		CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",

		CURLOPT_RETURNTRANSFER => true,

		CURLOPT_ENCODING => "",

		CURLOPT_MAXREDIRS => 10,

		CURLOPT_TIMEOUT => 30,

		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

		CURLOPT_CUSTOMREQUEST => "POST",

		CURLOPT_POSTFIELDS => "origin=$kotaasal&destination=$kotatujuan&weight=$beratbelanja&courier=$ekspedisi",

		CURLOPT_HTTPHEADER => array(

			"content-type: application/x-www-form-urlencoded",

			"key: 177cab2b890e9d7ff020ebe0f63b5612"

			),

		));



	$response = curl_exec($curl);

	$err = curl_error($curl);


	

	curl_close($curl);





		return $response;

		

		  

	

}




function tampil_pengaturan($namakolom)

{

	$ci =& get_instance();

	$ci->db->where("kolom",$namakolom);

	$ambil=$ci->db->get("pengaturan");

	$pecah=$ambil->row_array();

	return $pecah['isi'];

}

function tampil_halaman($kolom)

{

	$ci =& get_instance();

	$ci->db->where("judul",$kolom);

	$ambil=$ci->db->get("halamanstatis");

	$pecah=$ambil->row_array();

	return $pecah['judul'];

}

function tanggalindo()
{
		$date = new DateTime("now", new DateTimeZone('Asia/Jakarta') );
		$tgl =  $date->format('Y-m-d H:i:s');


		return $tgl;
}

function tampil_halamanstatis()

	{

		$ci =& get_instance();

		$ambil=$ci->db->get("halamanstatis");

		$pecahdata=$ambil->result_array();

		return $pecahdata;

	}



function tampil_keranjang()

	{

		$ci =& get_instance();

		//mendapatkan session dulu

		$keranjang=$ci->session->userdata("keranjang");

		//jika keranjangan ada

		if ($keranjang) {

			

		//memperulangakn array keranjang dgn foreach unt dp id_produk dn jml

			foreach ($keranjang as $id_produk => $jumlahyangdibeli) 

			{

		//amobil data produk

				$ci->db->where("id_produk",$id_produk);

				$ambil=$ci->db->get("produk");

				$pecah= $ambil->row_array();

			//masuk jumlah yang dibeli ke data produk 

				$pecah['jumlah']=$jumlahyangdibeli;

				$pecah['subtotal']=$pecah['harga_produk']*$jumlahyangdibeli;

			//simpan data prduk dan jumlah yang dibeli dalam array

				$arraybesar[]=$pecah;



			}

		//mengebalikan nilai ke controller 

			return $arraybesar;

		}

		else

		{

			return array();

			

		}

	}



?>