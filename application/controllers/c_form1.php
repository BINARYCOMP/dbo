<?php
/**
* 
*/
class C_form1 extends CI_Controller
{
	function __construct(){
			parent::__construct();
			
		}
	public function index()
	{
		
		$this->load->view('v_form1');
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
		var_dump($data);
	}
}