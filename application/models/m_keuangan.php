<?php
/**
 * 
 */
class M_keuangan extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function simpan($id)
	{
		$this->db->insert('Table', $object);
	}
}