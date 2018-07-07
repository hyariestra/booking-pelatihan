<?php 

/**
* 
*/
class M_pengaturan extends CI_model
{
	
	function tampil_pengaturan()
	{
		$ambil=$this->db->get("pengaturan");
		$pecahdata=$ambil->result_array();
		return $pecahdata;
	}
	
	function simpan_pengaturan($datainputan)
	{
		$datapeng=elements(array('kolom','isi'),$datainputan,"-");

		$this->db->insert('pengaturan',$datapeng);
	}
	function hapus_pengaturan($id)
	{
		$this->db->where('id_pengaturan',$id);
		$this->db->delete('pengaturan');
	}
	function ambil_pengaturan($id)
	{
		$hasil=$this->db->get_where('pengaturan',array('id_pengaturan'=>$id));
		$pecah=$hasil->row_array();
		return $pecah;
	}
	function ubah_pengaturan($inputan,$id)
	{
		$datapeng=elements(array('kolom','isi'),
			$inputan,"-");

		$this->db->where('id_pengaturan',$id);
		$this->db->update('pengaturan',$datapeng);
	}


}

 ?>