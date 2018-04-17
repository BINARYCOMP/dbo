<?php
/**
* 
*/
class C_viewAgama extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_viewAgama');
	}

	public function index()
	{
	$agama=$this->m_viewAgama->view();
		$data = array(
			'agama' =>$agama);
		$this->load->view('v_viewAgama', $data);

	}
	public function form()
	{
		$agama = $_POST['txtagama'];


		$data = array(
			'AGAM_NAME' =>$agama , 
			);
		$agama=$this->m_viewAgama->Insert($data);
		 redirect('c_viewAgama/index');
	}

}
?>