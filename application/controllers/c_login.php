<?php
if (!empty($status)) header('location:acces_denied.php');
/**
* 
*/
class C_login extends CI_controller
{
	
	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
	}
	public function index()
	{
		$this->load->view('v_login');
	}
	public function login()
	{


		$username 	= $_POST["username"];
		$password 	= md5($_POST ["password"]);

		$datalogin 	= $this->m_login->getlogin($username, $password);

		$dbLevel	= $datalogin[0]["LEVE_NAME"];
		$dbUsername = $datalogin[0]["USER_NAME"];
		$dbPassword = $datalogin[0]["USER_PASSWORD"];
		$since 		= $datalogin[0]['USER_TIMESTAMP'];
		if ($username == $dbUsername && $password == $dbPassword) {
			$_SESSION['level'] 		= $dbLevel;
			$_SESSION['username'] 	= $dbUsername;
			$_SESSION['since'] 		= $since;
			header('location:'.base_url().'c_dashboard');
		}else{
			header('Location:' .base_url().'c_login');
		}
	}
	public function logout()
	{
		session_destroy();
		header('Location:' .base_url().'c_login');
	}
}
	?>