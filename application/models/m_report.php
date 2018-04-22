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
	public function getBarangParent()
	{
		$sql 	= "SELECT * FROM gudang_jadi, barang_parent, barang_child WHERE GUJA_BAPA_ID = BAPA_ID ";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
}