<?php
/**
 * 
 */
class C_report extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_report');
	}

	public function index()
	{
		$dataBarangParent 	= $this->m_report->getBarangParent();
		$dataKeuangan 		= $this->m_report->getKeuangan();
		$data = array(
			'dataBarangParent' 	=> $dataBarangParent,
			'dataKeuangan' 		=> $dataKeuangan,
			'content' 			=> 'v_report',
			'title'				=> 'Laporan',
			'menu'         		=> 'Report'
		);
		$this->load->view('tampilan/v_combine',$data);
	}

	public function detailBarang($id)
	{
		$dataBarang		= $this->m_report->getBarangChildByBapaId($id);
		$data = array(
			'dataBarang' 		=> $dataBarang,
			'content' 			=> 'v_report_detail',
			'title'				=> 'Detail '.$dataBarang[0]['BAPA_NAME'],
			'menu'         		=> 'Report'
		);
		$this->load->view('tampilan/v_combine',$data);	
	}
}