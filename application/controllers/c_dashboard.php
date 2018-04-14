<?php

/**
*
*/
class C_dasboard extends CI_Controller
{

	public function index(){
		$data = array(
			'content' => 'tampilan/v_content',
		);
		$this->load->view('v_combine',$data);
	}
}

 ?>
