<?php 

/**
* 
*/
class M_excel_pegawai extends CI_Model
{
	public function getPegawai(){
		$sql="select pegawai.PEGA_NAME, pegawai.PEGA_EMAIL, pegawai.PEGA_ALAMAT, pegawai.PEGA_NO_TLP, pegawai.PEGA_JENKEL, agama.AGAM_NAME from pegawai inner join agama on pegawai.PEGA_AGAM_ID = agama.AGAM_ID";
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}

}

 ?>