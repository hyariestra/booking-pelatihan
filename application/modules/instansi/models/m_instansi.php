<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_instansi extends CI_Model {

	
function tampil_instansi()
	{
		$query  = $this->db->query("SELECT * FROM mst_kat_instansi");
		return $query;
	}
}

/* End of file m_instansi.php */
/* Location: ./application/modules/instansi/models/m_instansi.php */