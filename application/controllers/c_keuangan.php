<?php
/**
 * 
 */
class C_keuangan extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'content' => 'v_keuangan',
		);
		$this->load->view('tampilan/v_combine',$data);
	}
	public function simpan()
	{
		$tanggal 	= $_POST['dtmTanggal'];
		$uraian 	= $_POST['txtUraian'];
		$debet 		= $_POST['txtDebet'];
		$kredit 	= $_POST['txtKredit'];

		// model simpan
		
	}
}