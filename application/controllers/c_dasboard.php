<?php 

/**
* 
*/
class C_dasboard extends CI_Controllwe
{
	
	public function index(){
		$data = array(
			'content' => 'v_content', 
		);
		$this->load->view('v_gabungan',$data);
	}
}

 ?>