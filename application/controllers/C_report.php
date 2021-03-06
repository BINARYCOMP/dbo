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
	public static function format($timestamp = '', $date_format = 'd F Y', $suffix = '')
	{
		$real = $timestamp;
	    if($timestamp == NULL)
	      return '-';
	 
	    if($timestamp == '1970-01-01' || $timestamp == '0000-00-00' || $timestamp == '-25200')
	      return '-';
	 
	 
	    if (trim ($timestamp) == '')
	    {
	            $timestamp = time ();
	    }
	    elseif (!ctype_digit ($timestamp))
	    {
	        $timestamp = strtotime ($timestamp);
	    }
	    # remove S (st,nd,rd,th) there are no such things in indonesia :p
	    $date_format = preg_replace ("/S/", "", $date_format);
	    $pattern = array (
	        '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
	        '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
	        '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
	        '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
	        '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
	        '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
	        '/April/','/June/','/July/','/August/','/September/','/October/',
	        '/November/','/December/',
	    );
	    $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
	        'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
	        'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
	        'Januari','Februari','Maret','April','Juni','Juli','Agustus','September',
	        'Oktober','November','Desember',
	    );
	    $date = date ($date_format, $timestamp);
	    $date = preg_replace ($pattern, $replace, $date);
	    $date = "{$date} {$suffix}";
	    return $date; 
	}

	public function index()
	{
		$dataBarangParent 					= $this->m_report->getBarangParent();
		$dataBarangJadiCimuning				= $this->m_report->getBarangJadiCimuning();
		$dataMaterialCimuningParent 		= $this->m_report->getMaterialCimuningParent();
		$dataMaterialBawangParent	 		= $this->m_report->getMaterialBawangParent();
		$dataKeuangan 						= $this->m_report->getKeuangan();
		$dataInventarisParent				= $this->m_report->getInventarisParent();
		$dataInventarisParentCimuning		= $this->m_report->getInventarisParentCimuning();
		$dataInventarisParentBawang			= $this->m_report->getInventarisParentBawang();
		$dataRuangan 						= $this->m_report->getRuangan();
		$data = array(
			'dataBarangParent' 					=> $dataBarangParent,
			'dataBarangJadiCimuning'			=> $dataBarangJadiCimuning,
			'dataMaterialCimuningParent' 		=> $dataMaterialCimuningParent,
			'dataMaterialBawangParent' 			=> $dataMaterialBawangParent,
			'dataKeuangan' 						=> $dataKeuangan,
			'dataInventarisParent'				=> $dataInventarisParent,
			'dataInventarisParentCimuning'		=> $dataInventarisParentCimuning,
			'dataInventarisParentBawang'		=> $dataInventarisParentBawang,
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
			'id' 				=> $id,
			'content' 			=> 'v_report_detailBarang',
			'title'				=> 'Detail '.$dataBarang[0]['BAPA_NAME'],
			'menu'         		=> 'Report'
		);
		$this->load->view('tampilan/v_combine',$data);	
	}
	public function filterBarang($id)
	{
		$bulan 			= $_POST['bulan'];
		$tahun 			= $_POST['tahun'];
		$dataBarang		= $this->m_report->getBarangChildByBapaId($id);
		$data = array(
			'dataBarang' 		=> $dataBarang,
			'id' 				=> $id,
			'bulan'				=> $bulan,
			'tahun'				=> $tahun,
			'content' 			=> 'v_report_detailBarangFilter',
			'title'				=> 'Detail '.$dataBarang[0]['BAPA_NAME'],
			'menu'         		=> 'Report'
		);
		$this->load->view('tampilan/v_combine',$data);	
	}
	public function detailBarangCimuning($id)
	{
		$dataBarang		= $this->m_report->getBarangDetailCimuningByBaccId2($id);
		$data = array(
			'dataBarang' 		=> $dataBarang,
			'id' 				=> $id,
			'content' 			=> 'v_report_detailBarangCimuning',
			'title'				=> 'Detail '.$dataBarang[0]['BACC_NAME'],
			'menu'         		=> 'Report'
		);
		$this->load->view('tampilan/v_combine',$data);	
	}
	public function filterBarangCimuning($id)
	{
		$bulan 			= $_POST['bulan'];
		$tahun 			= $_POST['tahun'];
		$dataBarang		= $this->m_report->getBarangDetailCimuningByBaccId2($id);
		$data = array(
			'dataBarang' 		=> $dataBarang,
			'id' 				=> $id,
			'bulan'				=> $bulan,
			'tahun'				=> $tahun,
			'content' 			=> 'v_report_detailBarangCimuningFilter',
			'title'				=> 'Detail '.$dataBarang[0]['BACC_NAME'],
			'menu'         		=> 'Report'
		);
		$this->load->view('tampilan/v_combine',$data);	
	}
	public function detailBarangCimuningSetengahJadi($id)
	{
		$dataBarang		= $this->m_report->getBarangDetailSetengahJadiCimuningByBaccId($id);
		if (empty($dataBarang[0]['BACC_NAME'])) {
			echo "<script> alert('Data Barang Tidak ada'); window.location ='".base_url()."c_report' </script>";
		}else{
			$data = array(
				'dataBarang' 		=> $dataBarang,
				'id' 				=> $id,
				'content' 			=> 'v_report_detailBarangCimuningSetengahJadi',
				'title'				=> 'Detail '.$dataBarang[0]['BACC_NAME'],
				'menu'         		=> 'Report'
			);
			$this->load->view('tampilan/v_combine',$data);	
		}
	}
	
	public function filterBarangCimuningSetengahJadi($id)
	{
		$bulan 			= $_POST['bulan'];
		$tahun 			= $_POST['tahun'];
		$dataBarang		= $this->m_report->getBarangDetailSetengahJadiCimuningByBaccId($id);
		if (empty($dataBarang[0]['BACC_NAME'])) {
			echo "<script> alert('Data Barang Tidak ada'); window.location ='".base_url()."c_report' </script>";
		}else{
			$data = array(
				'dataBarang' 		=> $dataBarang,
				'id' 				=> $id,
				'bulan'				=> $bulan,
				'tahun'				=> $tahun,
				'content' 			=> 'v_report_detailBarangCimuningSetengahJadiFilter',
				'title'				=> 'Detail '.$dataBarang[0]['BACC_NAME'],
				'menu'         		=> 'Report'
			);
			$this->load->view('tampilan/v_combine',$data);	
		}
	}
	
	public function detailMaterial($id)
	{
		$dataBarang		= $this->m_report->getMaterialChildByMpbaId($id);
		$data = array(
			'dataBarang' 		=> $dataBarang,
			'id' 				=> $id,
			'content' 			=> 'v_report_detailMaterialBawang',
			'title'				=> 'Detail '.$dataBarang[0]['MPBA_NAME'],
			'menu'         		=> 'Report'
		);
		$this->load->view('tampilan/v_combine',$data);	
	}

	public function filterMaterialBawang($id)
	{
		$bulan 			= $_POST['bulan'];
		$tahun 			= $_POST['tahun'];
		$dataBarang		= $this->m_report->getMaterialChildByMpbaId($id);
		$data = array(
			'dataBarang' 		=> $dataBarang,
			'id' 				=> $id,
			'bulan'				=> $bulan,
			'tahun'				=> $tahun,
			'content' 			=> 'v_report_detailMaterialBawangFilter',
			'title'				=> 'Detail '.$dataBarang[0]['MPBA_NAME'],
			'menu'         		=> 'Report'
		);
		$this->load->view('tampilan/v_combine',$data);	
	}

	public function detailMaterialCimuning($id)
	{
		$dataBarang		= $this->m_report->getMaterialChildByMpciId($id);
		$data = array(
			'dataBarang' 		=> $dataBarang,
			'id' 				=> $id,
			'content' 			=> 'v_report_detailMaterialCimuning',
			'title'				=> 'Detail '.$dataBarang[0]['MPCI_NAME'],
			'menu'         		=> 'Report'
		);
		$this->load->view('tampilan/v_combine',$data);	
	}

	public function filterMaterialCimuning($id)
	{
		$bulan 			= $_POST['bulan'];
		$tahun 			= $_POST['tahun'];
		$dataBarang		= $this->m_report->getMaterialChildByMpciId($id);
		$data = array(
			'dataBarang' 		=> $dataBarang,
			'id' 				=> $id,
			'bulan'				=> $bulan,
			'tahun'				=> $tahun,
			'content' 			=> 'v_report_detailMaterialCimuningFilter',
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
