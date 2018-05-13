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
		$data = array(
			'content' => 'v_excel_pegawai',
			'pegawai' => $this->m_excel_pegawai->view()
		);
		$this->load->view('tampilan/v_combine',$data);
	}

	public function export()
	{
		date_default_timezone_set("Asia/Bangkok");
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Data Pegawai (".date("l jS \of F Y h:i:s A").").xls");

		$data['pegawai'] = $this->m_excel_pegawai->view();
		$this->load->view('export/export_excel_pegawai', $data);
	}
}

 ?>
