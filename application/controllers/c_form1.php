<?php
/**
* 
*/
class C_form1 extends CI_Controller
{
	function __construct(){
			parent::__construct();
			$this->load->model('m_form1');
		}
	public function index()
	{
		
		$dataLevel=$this->m_form1->getLevel();
		$dataUser=$this->m_form1->getUser();
		$data = array(
			'dataLevel' =>$dataLevel,
			'dataUser' =>$dataUser );

		

		$this->load->view('v_form1', $data);


		
		
	}
	public function FormRegister()
	{
		$idpegawai = $_POST['txtidpegawai'];
		$username = $_POST['txtusername'];
		$password = $_POST['txtpassword'];
		$level = $_POST['level'];

		$data = array(
			'USER_DAPE_ID' =>$idpegawai ,
			'USER_NAME' =>$username ,
			'USER_PASSWORD' =>$password ,
			'USER_LEVE_ID' =>$level   
			);
		$dataLevel=$this->m_form1->Insert($data);
		
	}
}