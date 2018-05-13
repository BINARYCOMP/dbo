<?php
/**
* 
*/
class M_materialParentBawang extends CI_Model
{
	
function view()
	{
		$sql = "select * from material_parent_bawang";
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;

	}
	public function Insert($data)
	{
		
		$this->db->insert('material_parent_bawang',$data);
	}
	public function Update($data)
	{
		$sql="select * from material_parent_bawang where MPBA_ID =".$data;
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function UpdateData($id, $data)
	{
		$this->db->where('MPBA_ID', $id);
		$this->db->update('material_parent_bawang', $data);
	}
	public function delete($id)
	{
		$this->db->where('MPBA_ID', $id);
		$this->db->delete('material_parent_bawang');
	}

}
?>
