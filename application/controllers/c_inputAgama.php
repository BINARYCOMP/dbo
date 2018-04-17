<?php

/**
* 
*/
class C_inputAgama extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_inputAgama');
	}
	function index()
	{
		$data['agama'] = $this->m_inputAgama->tampil_data()->result();
		$this->load->view('v_inputAgama', $data);
	}
	function tambah()
	{
		$this->load->view('v_inputAgama');
	}
	function tambah_aksi()
	{
		$agama = $this->input->post('agama');
		$agamaId = $this->input->post('agamaId');

		$data = array(
			'AGAM_NAME' => $agama, 
			'AGAM_ID' => $agamaId
			);
		$this->m_inputAgama->input_data($data, 'agama');
		 redirect('C_inputAgama/index');
	}
}
?>