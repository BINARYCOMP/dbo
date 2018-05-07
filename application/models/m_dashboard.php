<?php
/**
 * 
 */
class m_dashboard extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getReportStock($month)
	{
		$year = date('Y');
		$sql = "
		SELECT SUM(GUJA_MASUK) as 'masuk', SUM(GUJA_KELUAR) as 'keluar' FROM gudang_jadi WHERE
		YEAR(GUJA_TIMESTAMP) = ".$year." AND MONTH(GUJA_TIMESTAMP) = ".$month."
		";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getReportStockSetengahJadi($month)
	{
		$year = date('Y');
		$sql = "
		SELECT SUM(GUTA_MASUK) as 'masuk', SUM(GUTA_KELUAR) as 'keluar' FROM gudang_tak_jadi WHERE
		YEAR(GUTA_TIMESTAMP) = ".$year." AND MONTH(GUTA_TIMESTAMP) = ".$month."
		";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getReportKeuangan($month)
	{
		$year = date('Y');
		$sql = "
		SELECT SUM(KEUA_MASUK) as 'masuk', SUM(KEUA_KELUAR) as 'keluar' FROM keuangan WHERE
		YEAR(KEUA_TANGGAL) = ".$year." AND MONTH(KEUA_TANGGAL) = ".$month."
		";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
}