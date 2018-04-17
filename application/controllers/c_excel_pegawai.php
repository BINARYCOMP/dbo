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
		$data['pegawai'] = $this->m_excel_pegawai->view();
		$this->load->view('v_excel_pegawai',$data);
	}

	public function export()
	{
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Data_Pegawai.xls");

		$data['pegawai'] = $this->m_excel_pegawai->view();
		$this->load->view('export_excel_pegawai', $data);
	}
}

 ?>