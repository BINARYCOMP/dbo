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
		$data = array(
			'dataBarangParent' 	=> $dataBarangParent,
			'content' 			=> 'v_report',
			'title'				=> 'Laporan',
			'menu'         		=> 'Report'
		);
		$this->load->view('tampilan/v_combine',$data);
	}
}