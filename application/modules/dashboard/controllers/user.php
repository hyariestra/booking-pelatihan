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
			
			$data['kategori'] = $this->db->query("SELECT * FROM mst_kategori_instansi");
			$data['content'] = $this->load->view("user/register", $data, true);
			
			echo $this->load->view("template", $data);
		}
		
	}

/* End of file user.php */