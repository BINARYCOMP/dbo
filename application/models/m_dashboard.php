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
	public function getReportKeuangan($month)
	{
		$year = date('Y');
		$sql = "
		SELECT SUM(KEUA_MASUK) as 'masuk', SUM(KEUA_KELUAR) as 'keluar' FROM keuangan WHERE
		YEAR(KEUA_TIMESTAMP) = ".$year." AND MONTH(KEUA_TIMESTAMP) = ".$month."
		";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
}