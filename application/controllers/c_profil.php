<?php 
/**
* 
*/
class C_profil extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_profil');
	}
	function Index()
	{
		$Account=$this->m_profil->getInfoAccount();
		$data = array(
			'Account'	=>$Account,
			'content'	=>'v_profil',
			'title' 	=>'Account',
      		'menu'      =>'Profil Account'
		);
		$this->load->view('tampilan/v_combine', $data);
	}
	function UpdatePassword($Account)
	{
		$Account=$this->m_profil->Update($Account);
		$data = array(
			'Account' 	=>$Account,
			'title'		=>'Ganti Password',
			'content' 	=>'v_editPassword',
      		'menu'      =>'Ganti Password'
			);
		$this->load->view('tampilan/v_combine',$data);
	}
}

 ?>