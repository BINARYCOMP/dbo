<?php

/**
* 
*/
class C_excel_pegawai extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_excel_pegawai');
	}

	public function index()
	{
		$data = $this->m_excel_pegawai->getPegawai();
		$this->load->view('v_excel_pegawai',$data);
	}

	public function export()
	{
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Data_Pegawai.xls");

		$data = $this->m_excel_pegawai->getPegawai();
		$this->load->view('export_excel_pegawai', $data);
	}
}

 ?>