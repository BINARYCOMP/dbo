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
		$akun 	=$this->m_profil->getInfoAccount();
		$data = array(
			'Account'	=>$akun,
			'agamaId'	=>$agamaId, 
			'content'	=>'v_profil',
			'title' 	=>'Account',
      		'menu'      =>'Profil Account'
		);
		$this->load->view('tampilan/v_combine', $data);
	}
	public function formGantiPassword($Password)
	{
		$password 		=$this->m_profil->getPassword();
		$data = array(
			'Password'	=>$password,
			'content'	=>'v_editPassword',
			'title' 	=>'Account',
      		'menu'      =>'Ganti Password'
		);
		$this->load->view('tampilan/v_combine',$data);
	}
	public function GantiPassword($id)
	{
		$password 			= $_POST['Password'];
		$data = array(
			'USER_PASSWORD' =>$password
			);
	}
		$this->m_profil->UpdatePassword($id, $data);
		redirect('C_profil');
}

 ?>