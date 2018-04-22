<?php
/**
 * 
 */
class M_report extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getBarangParent()
	{
		$sql 	= "SELECT * FROM gudang_jadi, barang_parent WHERE GUJA_BAPA_ID = BAPA_ID ";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getBarangChildByBapaId($id)
	{
		$sql 	= "SELECT * FROM  barang_child, satuan WHERE BACH_SATU_ID = SATU_ID AND BACH_BAPA_ID =".$id;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
}