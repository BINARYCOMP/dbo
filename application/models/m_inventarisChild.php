<?php
/**
* 
*/
class M_inventarisChild extends CI_Model
{
	
function view()
	{
		$sql = "select * from inventaris_child,inventaris_parent where INCH_INPA_ID = INPA_ID ";
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;

	}
	public function Insert($data)
	{
		$this->db->insert('inventaris_child',$data);
	}
	public function Update($data)
	{
		$sql="select * from inventaris_child where INCH_ID =".$data;
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function UpdateData($id, $data)
	{
		$this->db->where('INCH_ID', $id);
		$this->db->update('inventaris_child', $data);
	}
	public function delete($id)
	{
		$this->db->where('INCH_ID', $id);
		$this->db->delete('inventaris_child');
	}

}
?>