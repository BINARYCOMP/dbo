<?php
/**
* 
*/
class M_viewAgama extends CI_Model
{
	
function view()
	{
		$sql = "select * from agama";
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;

	}
	public function Insert($data)
	{
		
		$this->db->insert('agama',$data);
	}
}
?>