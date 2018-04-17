<?php 

class C_GUDANG_SU extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('m_GUDANG_SU');
	}
	public function index()
	{
		$this->load->view('v_GUDANG_SU');
	}
	public function formCreate()
	{
		$id_brg = $_POST['numidbarang'];
		$deposit = $_POST['numdeposit'];
		$withdraw = $_POST['numwithdraw'];
		

		$data = array(
			'GUJA_ID' =>$id_brg ,
			'GUJA_MASUK' =>$deposit ,
			'GUJA_KELUAR' =>$withdraw 
			);
		$dataLevel=$this->m_GUDANG_SU->Insert($data);
	}
}
 ?>