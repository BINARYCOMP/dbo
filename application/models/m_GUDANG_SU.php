<?php 
	class M_GUDANG_SU extends CI_Model
{
	
	public function Insert($data)
	{
		$this->db->insert('gudang_jadi',$data);
	}
}
 ?>