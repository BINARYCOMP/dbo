<?php

/**
* 
*/
class C_excel_keuangan extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_excel_keuangan');
	}

	public function index()
	{	
		$data = array(
			'title'=>'Cetak Keuangan',
			'content' => 'v_excel_keuangan',
			'keuangan' => $this->m_excel_keuangan->view()
		);
		$this->load->view('tampilan/v_combine',$data);
	}

	public function export()
	{
		date_default_timezone_set("Asia/Bangkok");
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Data Keuangan (".date("l jS \of F Y h:i:s A").").xls");

		$data['keuangan'] = $this->m_excel_keuangan->view();
		$this->load->view('export/export_excel_keuangan', $data);
	}

}

 ?>