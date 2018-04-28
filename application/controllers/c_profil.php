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
			'content'	=>'v_pegawai',
			'title' 	=>'Pegawai',
      		'menu'      =>'Input Pegawai'
		);
	}
}

 ?>