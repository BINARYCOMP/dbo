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
		

		$getlevel="";
		$dataLevel=$this->m_form1->getLevel($getlevel);
		$data = array(
			'dataLevel' =>$dataLevel );

		$this->load->view('v_form1', $data);
		
	}
	public function FormRegister()
	{
		$email = $_POST['txtemail'];
		$username = $_POST['txtusername'];
		$password = $_POST['txtpassword'];
		$level = $_POST['level'];

		$data = array(
			'email' =>$email ,
			'username' =>$username ,
			'password' =>$password ,
			'level' =>$level   
			);
		
	}
}