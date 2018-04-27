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
		$sql 	= "SELECT * FROM barang_parent ";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getKeuangan()
	{
		$sql 	= "SELECT * FROM keuangan";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getBarangChildByBapaId($id)
	{
		$sql 	= "SELECT * FROM  barang_parent, barang_child, satuan WHERE BACH_BAPA_ID = BAPA_ID AND BACH_SATU_ID = SATU_ID AND BACH_BAPA_ID =".$id;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getBarangJadiByChildId($id)
	{
		$sql 	= "SELECT * FROM  gudang_jadi, barang_parent, barang_child, satuan WHERE GUJA_BACH_ID = BACH_ID AND GUJA_BAPA_ID = BAPA_ID AND BACH_SATU_ID = SATU_ID AND BACH_ID =".$id;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getTotalSaldoByBachId($id)
	{
		$sql 	= "SELECT sum(BACH_GUJA_ID) as 'Total' FROM  barang_child WHERE BACH_ID =".$id;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}



		public function getInventarisParent()
	{
		$sql 	= "SELECT * FROM inventaris_parent ";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}

		public function getInventarisChildByInpaId($id)
	{
		$sql 	= "SELECT * FROM  inventaris_parent, inventaris_child, inventaris WHERE INCH_INPA_ID = INPA_ID AND INVE_INCH_ID = INCH_ID AND INVE_INPA_ID = INPA_ID AND INPA_ID =".$id;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}

		public function getInventarisByChildId($id)
	{
		$sql 	= "SELECT * FROM  inventaris, inventaris_parent, inventaris_child WHERE INVE_INCH_ID = INCH_ID AND INVE_INPA_ID = INPA_ID AND INCH_ID =".$id;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
}