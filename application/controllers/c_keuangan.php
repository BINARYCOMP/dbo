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
	}

	public function index()
	{
		$keuangan=$this->m_keuangan->view();
		$data = array(
			'content' => 'v_keuangan',
			'keuangan' => $keuangan
		);
		$this->load->view('tampilan/v_combine',$data);
	}
	public function simpan()
	{
		$tanggal	= $_POST['dtmTanggal'];
		$uraian 	= $_POST['txtUraian'];
		$debet 		= $_POST['txtDebet'];
		$kredit 	= $_POST['txtKredit'];
		$saldo		= $_POST['txtSaldo'] + $debet - $kredit;

		$data = array(
			'KEUA_TANGGAL' 	=>$tanggal,
			'KEUA_RINCIAN' 	=>$uraian,
			'KEUA_MASUK'	=>$debet,
			'KEUA_KELUAR' 	=>$kredit,
			'KEUA_SALDO' 	=>$saldo  
			);
		$Insert=$this->m_keuangan->Insert($data);
		redirect('c_keuangan');
	}
	public function formUpdate($id){
		$FormUpdate=$this->m_keuangan->FormUpdate($id);
		$data = array(
			'keuangan' => $FormUpdate,   
			'content'=> 'v_editKeuangan'
			);
		$this->load->view('tampilan/v_combine',$data);
	}
	public function update($id)
	{
		$tanggal	= $_POST['dtmTanggal'];
		$uraian 	= $_POST['txtUraian'];
		$debet 		= $_POST['txtDebet'];
		$kredit 	= $_POST['txtKredit'];
		$saldo 		= $_POST['txtSaldo'] + $debet - $kredit;

		$data = array(
			'KEUA_TANGGAL' 	=>$tanggal,
			'KEUA_RINCIAN' 	=>$uraian,
			'KEUA_MASUK'	=>$debet,
			'KEUA_KELUAR' 	=>$kredit,
			'KEUA_SALDO'	=>$saldo   
			);

		$parent=$this->m_keuangan->Update($id, $data);
		redirect('c_keuangan');
	}
	public function delete($id)
	{
		$this->db->delete('keuangan', array('KEUA_ID' => $id));
		redirect('c_keuangan');
	}
}