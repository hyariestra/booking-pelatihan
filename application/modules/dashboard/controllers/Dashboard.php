<?php 

/**

* 

*/

class Dashboard extends MY_Controller

{

	private $filename = "import_data"; // Kita tentukan nama filenya

	function __construct()

	{

		parent::__construct();

		 $this->load->model('M_admin');



		if (!$this->session->userdata("pengguna"))

		 {

			redirect("pengguna/login");

		}

	}

	function index()

	{

		$data['judul']="selamat datang"; 

		$this->load->model("M_admin");

		$data['admin']=$this->M_admin->tampil_admin();

		/*$penjualan = $this->db->query("SELECT *, sum(jumlah_beli) AS total FROM pembelian_detail group by id_produk order by total DESC ");
		foreach ($penjualan->result_array() as $value)
		 {
			$row['name'] = $value['nama_beli'];
			$row['y'] = (int)$value['total'];
			//var_dump($value);
			if (isset($value[0]['total']))
			 {
			$row['slice'] = true;
			$row['selected'] = true;
			}

			$json['selling'][] = $row;
		}*/
		

		//$data['penjualan'] = ($penjualan->num_rows() > 0) ? (int)$penjualan->first_row()->total : 0;

		$graph = $this->db->query("SELECT*FROM grafik_narasumber WHERE kategori = 1 GROUP BY  name ");
		foreach ($graph->result_array() as $value)
		{


			$row['name'] = $value['name'];
			$row['data'] = [ (int)$value['nilai1'],(int)$value['nilai2'] ];
			//$row['data2'] =   $value['nilai2'];

			//var_dump($value);
		

		/*	$json['grafik'][] = $row;*/
			$data['grafik'][] = $row;
		}


		
		$this->themeadmin->tampilkan("dashboard",$data);



	}


	public function listsurvey()
	{
		$data['judul'] = 'Halaman List Survey';
		$this->themeadmin->tampilkan("listsurvey",$data);
	}

	public function form()
	{
		 $this->load->model('M_admin');
    $data = array(); // Buat variabel $data sebagai array
    
    if(isset($_POST['preview']))
    { // Jika user menekan tombol Preview pada form
      // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
    	$upload = $this->M_admin->upload_file($this->filename);

    	if($upload['result'] == "success")
      { // Jika proses upload sukses
        // Load plugin PHPExcel nya
      	include APPPATH.'third_party/PHPExcel/PHPExcel.php';

      	$excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
        
        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
        $data['sheet'] = $sheet; 
    }
    else
      { // Jika proses upload gagal
        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
    }
}

$this->load->view('form', $data);
}

public function import(){
    // Load plugin PHPExcel nya
	include APPPATH.'third_party/PHPExcel/PHPExcel.php';

	$excelreader = new PHPExcel_Reader_Excel2007();
    $loadexcel = $excelreader->load('excel/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
    $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
    
    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
    $data = [];
    
    $numrow = 1;
    foreach($sheet as $row){
      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
    	if($numrow > 1){
        // Kita push (add) array data ke variabel data
    		array_push($data, [
          'nis'=>$row['A'], // Insert data nis dari kolom A di excel
          'nama'=>$row['B'], // Insert data nama dari kolom B di excel
          'jenis_kelamin'=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
          'alamat'=>$row['D'], // Insert data alamat dari kolom D di excel
      ]);
    	}

      $numrow++; // Tambah 1 setiap kali looping
  }
    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
  $this->M_admin->insert_multiple($data);

    redirect("Siswa"); // Redirect ke halaman awal (ke controller siswa fungsi index)
}



}





 ?>