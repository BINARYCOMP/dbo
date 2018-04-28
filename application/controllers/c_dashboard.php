<?php

/**
*
*/
class C_dashboard extends CI_Controller
{		
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_dashboard');
	}

	public function index(){
		if ($_SESSION['level'] == 'OWNER' || $_SESSION['level'] == 'MANAGERIAL' || $_SESSION['level'] == 'SUPER ADMIN' ) {
			$view = 'tampilan/v_content';
		}else if ($_SESSION['level'] == 'ADMIN') {
			$view = 'tampilan/v_content_admin';
		}else if ($_SESSION['level'] == 'KEUANGAN') {
			$view = 'tampilan/v_content_keuangan';
		}else{
			$view = 'tampilan/index';
		}
		$data = array(
			'content' => $view	
		);
			$this->load->view('tampilan/v_combine',$data);
	}
}

 ?>
