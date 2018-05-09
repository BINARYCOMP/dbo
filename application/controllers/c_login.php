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
		$this->load->library("phpmailer_library");
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
			$_SESSION['USER_ID']	= $datalogin[0]['USER_ID'];
			header('location:'.base_url().'c_dashboard');
		}else{
			header('Location:' .base_url().'c_login');
		}
	}
	public function forgotPassword()
	{
        $objMail = $this->phpmailer_library->load();
        $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "kresnaaji28@gmail.com";
        $mail->Password = "Rizkiani2315";
        $mail->SetFrom("kresnaaji28@gmail.com");
        $mail->Subject = "Test";
        $mail->Body = "hello";
        $mail->AddAddress("kreskiani23@gmail.com");

         if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
         } else {
            echo "Message has been sent";
         }

	}
	public function logout()
	{
		session_destroy();
		header('Location:' .base_url().'c_login');
	}
}
	?>