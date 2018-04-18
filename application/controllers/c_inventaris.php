<?php
/**
 * 
 */
class C_inventaris extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$data = array(
			'content' => 'v_inventaris' , 
		);
		$this->load->view('tampilan/v_combine', $data);
	}
	public function simpan()
	{
		$parent 	= $_POST['txtIndukInventaris'];
		$child 		= $_POST['txtAnakInventaris'];
		$qty 		= $_POST['txtQty'];
		$kondisi 	= $_POST['rbtKondisi'];
		$keterangan	= $_POST['txtKeterangan'];

		// $data = array(
		// 	'' => , 
		// );
	}
}