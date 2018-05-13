<?php 

/**
* 
*/
class C_excel_gudang_tak_jadi extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_excel_gudang_tak_jadi');
	}

	public function index()
	{
		$data = array(
			'content' => 'v_excel_gudang_tak_jadi',
			'barang_parent' => $this->m_excel_gudang_tak_jadi->view()
		);
		$this->load->view('tampilan/v_combine',$data);
	}

	public function export()
	{
		date_default_timezone_set("Asia/Bangkok");
		header("Content-type: application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename=Data Gudang Tak Jadi (".date("l jS \of F Y h:i:s A").").xls");

		$data['barang_parent'] = $this->m_excel_gudang_tak_jadi->view();
		$this->load->view('export/export_excel_gudang_tak_jadi', $data);
	}
}

 ?>
