<?php 
if (!empty($status)) header('location:acces_denied.php');
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
	public function Index()
	{
		$agamaId	=$this->m_profil->getAgama();
		$Account 	=$this->m_profil->getInfoAccount();
		$data = array(
			'Account'	=>$Account,
			'agamaId'	=>$agamaId, 
			'content'	=>'v_profil',
			'title' 	=>'Account',
      		'menu'      =>'Profil Account'
		);
		$this->load->view('tampilan/v_combine', $data);
	}
	public function Password()
	{
		$this->load->view('v_editPassword');
	}
	
}

 ?>