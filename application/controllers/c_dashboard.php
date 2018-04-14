<?php

/**
*
*/
class C_dashboard extends CI_Controller
{

	public function index(){
		$data = array(
			'content' => 'tampilan/v_content',
		);
		$this->load->view('tampilan/v_combine',$data);
	}
}

 ?>
