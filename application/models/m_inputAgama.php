<?php

/**
* 
*/
class M_inputAgama extends CI_Model
{
	
	function tampil_data()
	{
		return $this->db->get('agama');
	}
	function input_data($data, $table)
	{
		$this->db->insert('agama', $data);
	}
}
?>