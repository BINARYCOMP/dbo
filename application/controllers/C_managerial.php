<?php
/**
 * 
 */
class C_managerial extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_report');
	}

	public function index()
	{
		$dataBarangParent 					= $this->m_report->getBarangParent();
		$dataBarangJadiCimuning				= $this->m_report->getBarangJadiCimuning();
		$dataRuangan 						= $this->m_report->getRuangan();
		$data = array(
			'dataBarangParent' 					=> $dataBarangParent,
			'dataBarangJadiCimuning'			=> $dataBarangJadiCimuning,
			'dataRuangan'						=> $dataRuangan,
			'content' 							=> 'v_managerial_view_gudang_cimuning',
			'title'								=> 'Laporan',
			'menu'         						=> 'Stok'
		);
		$this->load->view('tampilan/v_combine',$data);
	}

	public function material_cimuning()
	{
		$dataMaterialCimuningParent 		= $this->m_report->getMaterialCimuningParent();
		$dataRuangan 						= $this->m_report->getRuangan();
		$data = array(
			'dataMaterialCimuningParent' 		=> $dataMaterialCimuningParent,
			'dataRuangan'						=> $dataRuangan,
			'content' 							=> 'v_managerial_view_material_cimuning',
			'title'								=> 'Laporan',
			'menu'         						=> 'Stok'
		);
		$this->load->view('tampilan/v_combine',$data);	
	}
	public function gudang_bawang()
	{
		$dataBarangParent 					= $this->m_report->getBarangParent();
		$dataRuangan 						= $this->m_report->getRuangan();
		$data = array(
			'dataBarangParent' 					=> $dataBarangParent,
			'dataRuangan'						=> $dataRuangan,
			'content' 							=> 'v_managerial_view_gudang_bawang',
			'title'								=> 'Laporan',
			'menu'         						=> 'Stok'
		);
		$this->load->view('tampilan/v_combine',$data);	
	}
	public function material_bawang()
	{
		$dataMaterialBawangParent	 		= $this->m_report->getMaterialBawangParent();
		$dataRuangan 						= $this->m_report->getRuangan();
		$data = array(
			'dataMaterialBawangParent' 			=> $dataMaterialBawangParent,
			'dataRuangan'						=> $dataRuangan,
			'content' 							=> 'v_managerial_view_material_bawang',
			'title'								=> 'Laporan',
			'menu'         						=> 'Report'
		);
		$this->load->view('tampilan/v_combine',$data);
	}
	public function inventaris()
	{
		$dataInventarisParent				= $this->m_report->getInventarisParent();
		$dataInventarisParentCimuning		= $this->m_report->getInventarisParentCimuning();
		$dataRuangan 						= $this->m_report->getRuangan();
		$data = array(
			'dataInventarisParent'				=> $dataInventarisParent,
			'dataInventarisParentCimuning'		=> $dataInventarisParentCimuning,
			'dataRuangan'						=> $dataRuangan,
			'content' 							=> 'v_managerial_view_inventaris',
			'title'								=> 'Laporan',
			'menu'         						=> 'Report'
		);
		$this->load->view('tampilan/v_combine',$data);	
	}
	public function detailMaterialCimuning($id)
	{
		$dataBarang		= $this->m_report->getMaterialChildByMpciId($id);
		$data = array(
			'dataBarang' 		=> $dataBarang,
			'content' 			=> 'v_report_detailMaterialCimuning',
			'title'				=> 'Detail '.$dataBarang[0]['MPCI_NAME'],
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
		header("Content-Disposition: attachment; filename=Laporan Barang [ Gudang Bawang ] (".date("l jS \of F Y h:i:s A").").xls");

		$data['barang_parent'] = $this->m_report->getBarangParent();


		$dataBarangParent 					= $this->m_report->getBarangParent();
		$dataRuangan 						= $this->m_report->getRuangan();
		$data = array(
			'dataBarangParent' 					=> $dataBarangParent,
			'dataRuangan'						=> $dataRuangan
		);
		$this->load->view('export/export_xlsBarangBawang', $data);
	}

		public function exportBarangCimuning()
	{
		date_default_timezone_set("Asia/Bangkok");
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Laporan Barang [ Gudang Cimuning ] (".date("l jS \of F Y h:i:s A").").xls");

		$data['barang_cimuning_parent'] = $this->m_report->getBarangParentCimuning();


		$dataBarangParentCimuning			= $this->m_report->getBarangParentCimuning();
		$dataRuangan 						= $this->m_report->getRuangan();
		$data = array(
			'dataBarangParentCimuning'			=> $dataBarangParentCimuning,
			'dataRuangan'						=> $dataRuangan
		);
		$this->load->view('export/export_xlsBarangCimuning', $data);
	}

	public function exportMaterialBawang()
	{
		date_default_timezone_set("Asia/Bangkok");
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Laporan Material [ Gudang Bawang ] (".date("l jS \of F Y h:i:s A").").xls");

		$data['material_parent_bawang'] = $this->m_report->getMaterialBawangParent();


		$dataMaterialBawangParent	 		= $this->m_report->getMaterialBawangParent();
		$dataRuangan 						= $this->m_report->getRuangan();
		$data = array(
			'dataMaterialBawangParent' 			=> $dataMaterialBawangParent,
			'dataRuangan'						=> $dataRuangan
		);
		$this->load->view('export/export_xlsMaterialBawang', $data);
	}

		public function exportKeuangan()
	{
		date_default_timezone_set("Asia/Bangkok");
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Laporan Keuangan (".date("l jS \of F Y h:i:s A").").xls");

		$data['keuangan'] = $this->m_report->getKeuangan();


		$dataKeuangan 						= $this->m_report->getKeuangan();
		$data = array(
			'dataKeuangan' 						=> $dataKeuangan
		);
		$this->load->view('export/export_xlsKeuangan', $data);
	}
}
