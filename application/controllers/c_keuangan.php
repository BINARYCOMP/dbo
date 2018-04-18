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
		$uraian 	= $_POST['txtUraian'];
		$debet 		= $_POST['txtDebet'];
		$kredit 	= $_POST['txtKredit'];

		$data = array(
			'KEUA_RINCIAN' 	=>$uraian ,
			'KEUA_MASUK'	=>$debet ,
			'KEUA_KELUAR' 	=>$kredit   
			);
		$dataLevel=$this->m_form1->Insert($data);

		// model simpan
		
	}
}