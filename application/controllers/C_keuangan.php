<?php
/**
 * 
 */
class C_keuangan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_keuangan');
		$this->load->model('m_report');
	}

	public function index()
	{
		$keuangan=$this->m_keuangan->view();
		$getSaldoAkhir = $this->m_keuangan->getSaldoAkhir();
		if ($getSaldoAkhir == null) {
			$getSaldoAkhir = 0;
		}else{
			$getSaldoAkhir = $getSaldoAkhir[0]['KEUA_MASUK'];
		}
		$saldo = 0;
		foreach ($keuangan as $row) {
			$rumus 		= $row['KEUA_MASUK'] - $row['KEUA_KELUAR'];
			$pajak 		= $rumus * $row['KEUA_PAJAK'];
			$hasil 		= $rumus - $pajak;
			$subTotal   = $hasil;
		 	$saldo 		= $saldo + $subTotal;
		}
		$getSaldoAkhir = $saldo;
		$dataPerusahaan 	= $this->m_keuangan->getPerusahaan();
		$data = array(
			'keuangan' 		=> $keuangan,
			'saldoAkhir'	=> $getSaldoAkhir,
			'dataPerusahaan'=> $dataPerusahaan,
			'title'			=> 'Keuangan',
			'content' 		=> 'v_keuangan',
			'menu'         	=> 'Keuangan'
		);
		$this->load->view('tampilan/v_combine',$data);
	}

	public function view_keuangan()
	{
		$keuangan=$this->m_keuangan->view();
		$getSaldoAkhir = $this->m_keuangan->getSaldoAkhir();
		if ($getSaldoAkhir == null) {
			$getSaldoAkhir = 0;
		}else{
			$getSaldoAkhir = $getSaldoAkhir[0]['KEUA_SALDO'];
		}
		$dataKeuangan 						= $this->m_report->getKeuangan();
		$data = array(
			'dataKeuangan'	=> $dataKeuangan,
			'keuangan' 		=> $keuangan,
			'saldoAkhir'	=> $getSaldoAkhir,
			'title'			=> 'Keuangan',
			'content' 		=> 'owner/v_keuangan',
			'menu'         	=> 'Keuangan'
		);
		$this->load->view('tampilan/v_combine',$data);
	}
	public function simpan()
	{
		$tanggal	= date('Y-m-d');
		$vendor 	= $_POST['txtPerusahaan'];
		$uraian 	= $_POST['txtUraian'];
		$debet 		= $_POST['txtDebet'];
		$kredit 	= $_POST['txtKredit'];
		$pajak 		= $_POST['cmbPajak'];
		$saldo		= $_POST['txtSaldoAkhirAsli'];

		$rumus 		= $debet - $kredit;
		$pajak 		= $rumus * $pajak;
		$hasil 		= $rumus - $pajak;
		$subSaldo   = $hasil;

		$data = array(
			'KEUA_TANGGAL' 	=>$tanggal,
			'KEUA_RINCIAN' 	=>$uraian,
			'KEUA_MASUK'	=>$debet,
			'KEUA_KELUAR' 	=>$kredit,
			'KEUA_SALDO' 	=>$saldo,
			'KEUA_SUBSALDO'	=>$subSaldo,
			'KEUA_PAJAK' 	=>$_POST['cmbPajak'],
			'KEUA_PERU_ID'	=>$vendor,			
			'KEUA_USER_ID'  => $_SESSION['USER_ID']
			);
		$Insert=$this->m_keuangan->Insert($data);
		redirect('c_keuangan');
	}
	public function update_form($id){
		$FormUpdate=$this->m_keuangan->FormUpdate($id);
		$data = array(
			'keuangan' 	=> $FormUpdate,  
			'id' 		=> $id, 
			'title'		=> 'Edit Keuangan',
			'content'	=> 'v_editKeuangan',
			'menu'      => 'Keuangan'
			);
		$this->load->view('tampilan/v_combine',$data);
	}
	public function update($id)
	{
		$tanggal	= $_POST['inputTanggal'];
		$uraian 	= $_POST['txtUraian'];
		$debet 		= $_POST['txtDebet'];
		$kredit 	= $_POST['txtKredit'];
		$vendor 	= $_POST['txtPerusahaan'];
		$pajak 		= $_POST['cmbPajak'];

		$data = array(
			'KEUA_RINCIAN' 	=>$uraian,
			'KEUA_TANGGAL'	=>$tanggal,
			'KEUA_MASUK'	=>$debet,
			'KEUA_KELUAR' 	=>$kredit,
			'KEUA_PERU_ID'	=>$vendor,
			'KEUA_PAJAK'	=>$pajak
			);

		$this->m_keuangan->Update($id, $data);
		redirect('c_keuangan');
	}
	public function delete($id)
	{
		$this->db->delete('keuangan', array('KEUA_ID' => $id));
		redirect('c_keuangan');
	}
	public function getPerusahaan()
	{
		
	}
}
