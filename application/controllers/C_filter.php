<?php
/**
* 
*/
class C_filter extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_report','report');
	}

	public function index()
	{
		
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
	    return $date."".date(" ( h:i:s a )", strtotime($real)); 
	}

	public function gudang_bawang($id)
	{
		$awal 			= $this->input->post('awal');
		$akhir 			= $this->input->post('akhir');
		$bulan 			= $this->input->post('bulan');
		$tahun 			= $this->input->post('tahun');
		$dataBarang		= $this->report->getBarangChildByBapaId($id);
		$bach 			= 'BACH';
		$variable 		= 'GUBA';
		$d_parent		= 'BAPA';
		$dataKategori 	= 'getKategoriByBachId';
		$datanyaChild 	= 'getBarangJadiByChildIdFilter';

		$data = array(
			'awal' 		=> $awal ,
			'akhir' 	=> $akhir, 
			'bulan' 	=> $bulan,
			'tahun' 	=> $tahun,
			'datanya' 	=> $dataBarang,
			'bach' 		=> $bach,
			'd_parent'	=> $d_parent,
			'variable' 	=> $variable,
			'model1' 	=> $dataKategori,
			'model2' 	=> $datanyaChild,
			'title'		=> 'Detail '.$dataBarang[0]['BAPA_NAME'],
			'menu'      => 'Report'
		);
		$this->load->view('v_filter',$data);
	}

	public function gudang_cimuning_jadi($id)
	{
		$awal 			= $this->input->post('awal');
		$akhir 			= $this->input->post('akhir');
		$bulan 			= $this->input->post('bulan');
		$tahun 			= $this->input->post('tahun');
		$dataBarang		= $this->report->getBarangDetailCimuningByBaccIdLimit($id);
		$bach 			= 'BACC';
		$variable 		= 'GUJA';
		$d_parent 		= 'BACC';
		$dataKategori 	= 'getKategoriByBaccId';
		$datanyaChild 	= 'getBarangDetailCimuningByBaccIdFilter';

		$data = array(
			'awal' 		=> $awal ,
			'akhir' 	=> $akhir, 
			'bulan' 	=> $bulan,
			'tahun' 	=> $tahun,
			'variable' 	=> $variable,
			'd_parent'	=> $d_parent,
			'datanya' 	=> $dataBarang,
			'bach' 		=> $bach,
			'model1' 	=> $dataKategori,
			'model2' 	=> $datanyaChild,
			'title'		=> 'Detail '.$dataBarang[0]['BACC_NAME'],
			'menu'      => 'Report'
		);
		$this->load->view('v_filter',$data);
	}

	public function gudang_cimuning_sJadi($id)
	{
		$awal 			= $this->input->post('awal');
		$akhir 			= $this->input->post('akhir');
		$bulan 			= $this->input->post('bulan');
		$tahun 			= $this->input->post('tahun');
		$dataBarang		= $this->report->getBarangDetailCimuningByBaccId($id);
		$bach 			= 'BACC';
		$variable 		= 'GUTA';
		$d_parent 		= 'BACC';
		$dataKategori 	= 'getKategoriSetengahJadiByBaccId';
		$datanyaChild 	= 'getBarangDetailSetengahJadiCimuningByBaccIdFilter';
		
		$data = array(
			'awal' 		=> $awal ,
			'akhir' 	=> $akhir, 
			'bulan' 	=> $bulan,
			'tahun' 	=> $tahun,
			'variable' 	=> $variable,
			'd_parent'	=> $d_parent,
			'datanya' 	=> $dataBarang,
			'bach' 		=> $bach,
			'model1' 	=> $dataKategori,
			'model2' 	=> $datanyaChild,
			'title'		=> 'Detail '.$dataBarang[0]['BACC_NAME'],
			'menu'      => 'Report'
		);
		$this->load->view('v_filter',$data);
	}

	public function material_bawang($id)
	{
		$awal 			= $this->input->post('awal');
		$akhir 			= $this->input->post('akhir');
		$bulan 			= $this->input->post('bulan');
		$tahun 			= $this->input->post('tahun');
		$dataBarang		= $this->report->getMaterialChildByMpbaId($id);
		$bach 			= 'MCBA';
		$variable 		= 'MABA';
		$d_parent 		= 'MPBA';
		$dataKategori 	= '0';
		$datanyaChild 	= 'getMaterialBawangByMcbaIdFilter';
		
		$data = array(
			'awal' 		=> $awal ,
			'akhir' 	=> $akhir, 
			'bulan' 	=> $bulan,
			'tahun' 	=> $tahun,
			'variable' 	=> $variable,
			'd_parent'	=> $d_parent,
			'datanya' 	=> $dataBarang,
			'bach' 		=> $bach,
			'model1' 	=> $dataKategori,
			'model2' 	=> $datanyaChild,
			'title'		=> 'Detail '.$dataBarang[0]['MPBA_NAME'],
			'menu'      => 'Report'
		);
		$this->load->view('v_filter',$data);
	}

	public function material_cimuning($id)
	{
		$awal 			= $this->input->post('awal');
		$akhir 			= $this->input->post('akhir');
		$bulan 			= $this->input->post('bulan');
		$tahun 			= $this->input->post('tahun');
		$dataBarang		= $this->report->getMaterialChildByMpciId($id);
		$bach 			= 'MCCI';
		$variable 		= 'MACI';
		$d_parent 		= 'MPCI';
		$dataKategori 	= '0';
		$datanyaChild 	= 'getMaterialCimuningByMcciIdFilter';
		
		$data = array(
			'awal' 		=> $awal ,
			'akhir' 	=> $akhir, 
			'bulan' 	=> $bulan,
			'tahun' 	=> $tahun,
			'variable' 	=> $variable,
			'd_parent'	=> $d_parent,
			'datanya' 	=> $dataBarang,
			'bach' 		=> $bach,
			'model1' 	=> $dataKategori,
			'model2' 	=> $datanyaChild,
			'title'		=> 'Detail '.$dataBarang[0]['MPCI_NAME'],
			'menu'      => 'Report'
		);
		$this->load->view('v_filter',$data);
	}
}