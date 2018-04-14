<?php 
/**
* 
*/
class M_form1 extends CI_Model
{
	
	public function getLevel($getlevel)
	{
		$sql="select * from level ";
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
}
?>