<?php 

/**
* 
*/
class M_excel_pegawai extends CI_Model
{

	  public function view()
	  {
	  	$this->db->select('pegawai.PEGA_NAME, pegawai.PEGA_EMAIL, pegawai.PEGA_ALAMAT, pegawai.PEGA_NO_TLP, pegawai.PEGA_JENKEL, agama.AGAM_NAME');
	  	$this->db->from('pegawai');
	  	$this->db->join('agama','pegawai.PEGA_AGAM_ID = agama.AGAM_ID');
	  	$query=$this->db->get();
		return $query->result();
		
	  }

}

 ?>