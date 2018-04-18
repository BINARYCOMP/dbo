<?php
/**
* 
*/
class M_inventarisParent extends CI_Model
{
	
function view()
	{
		$sql = "select * from inventaris_parent";
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;

	}
	public function Insert($data)
	{
		$this->db->insert('inventaris_parent',$data);
	}
	public function viewBy($data)
	{
		$sql="select * from inventaris_parent where INPA_ID =".$data;
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function UpdateData($id, $data)
	{
		$this->db->where('INPA_ID', $id);
		$this->db->update('inventaris_parent', $data);
	}
	public function delete($id)
	{
		$this->db->where('INPA_ID', $id);
		$this->db->delete('inventaris_parent');
	}

}
?>