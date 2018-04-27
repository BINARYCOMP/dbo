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
		$data = array(
			'content' => 'tampilan/v_content'	
		);
		$this->load->view('tampilan/v_combine',$data);
	}
}

 ?>
