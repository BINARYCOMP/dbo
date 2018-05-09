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
		$dataBarangParent 					= $this->m_report->getBarangParent();
		$dataBarangParentCimuning			= $this->m_report->getBarangParentCimuning();
		$dataMaterialCimuningParent 		= $this->m_report->getMaterialCimuningParent();
		$dataMaterialBawangParent	 		= $this->m_report->getMaterialBawangParent();
		$dataKeuangan 						= $this->m_report->getKeuangan();
		$dataInventarisParent				= $this->m_report->getInventarisParent();
		$dataInventarisParentCimuning		= $this->m_report->getInventarisParentCimuning();
		$dataRuangan 						= $this->m_report->getRuangan();
		$data = array(
			'dataBarangParent' 					=> $dataBarangParent,
			'dataBarangParentCimuning'			=> $dataBarangParentCimuning,
			'dataMaterialCimuningParent' 		=> $dataMaterialCimuningParent,
			'dataMaterialBawangParent' 			=> $dataMaterialBawangParent,
			'dataKeuangan' 						=> $dataKeuangan,
			'dataInventarisParent'				=> $dataInventarisParent,
			'dataInventarisParentCimuning'		=> $dataInventarisParentCimuning,
			'dataRuangan'						=> $dataRuangan,
			'content' 							=> 'v_report',
			'title'								=> 'Laporan',
			'menu'         						=> 'Report'
		);
		$this->load->view('tampilan/v_combine',$data);
	}

	public function detailBarang($id)
	{
		$dataBarang		= $this->m_report->getBarangChildByBapaId($id);
		$data = array(
			'dataBarang' 		=> $dataBarang,
			'content' 			=> 'v_report_detailBarang',
			'title'				=> 'Detail '.$dataBarang[0]['BAPA_NAME'],
			'menu'         		=> 'Report'
		);
		$this->load->view('tampilan/v_combine',$data);	
	}
	public function detailMaterial($id)
	{
		$dataBarang		= $this->m_report->getMaterialChildByMpbaId($id);
		$data = array(
			'dataBarang' 		=> $dataBarang,
			'content' 			=> 'v_report_detailMaterialBawang',
			'title'				=> 'Detail '.$dataBarang[0]['MPBA_NAME'],
			'menu'         		=> 'Report'
		);
		$this->load->view('tampilan/v_combine',$data);	
	}

		public function detailInventaris($id)
	{
		$dataInventaris		= $this->m_report->getInventarisChildByInpaId($id);
		$data = array(
			'dataInventaris' 		=> $dataInventaris,
			'content' 			=> 'v_report_detailInventaris',
			'title'				=> 'Detail '.$dataInventaris[0]['INPA_NAME'],
			'menu'         		=> 'Report'
		);
		$this->load->view('tampilan/v_combine',$data);	
	}

		public function exportBarangBawang()
	{
		date_default_timezone_set("Asia/Bangkok");
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Laporan Barang [ Gudang Bawang ] 	 (".date("l jS \of F Y h:i:s A").").xls");

		$data['barang_parent'] = $this->m_report->getBarangParent();

		
		$dataBarangParent 					= $this->m_report->getBarangParent();
		$dataBarangParentCimuning			= $this->m_report->getBarangParentCimuning();
		$dataMaterialCimuningParent 		= $this->m_report->getMaterialCimuningParent();
		$dataMaterialBawangParent	 		= $this->m_report->getMaterialBawangParent();
		$dataKeuangan 						= $this->m_report->getKeuangan();
		$dataInventarisParent				= $this->m_report->getInventarisParent();
		$dataInventarisParentCimuning		= $this->m_report->getInventarisParentCimuning();
		$dataRuangan 						= $this->m_report->getRuangan();
		$data = array(
			'dataBarangParent' 					=> $dataBarangParent,
			'dataBarangParentCimuning'			=> $dataBarangParentCimuning,
			'dataMaterialCimuningParent' 		=> $dataMaterialCimuningParent,
			'dataMaterialBawangParent' 			=> $dataMaterialBawangParent,
			'dataKeuangan' 						=> $dataKeuangan,
			'dataInventarisParent'				=> $dataInventarisParent,
			'dataInventarisParentCimuning'		=> $dataInventarisParentCimuning,
			'dataRuangan'						=> $dataRuangan
		);
		$this->load->view('export/export_xlsBarangBawang', $data);
	}
}