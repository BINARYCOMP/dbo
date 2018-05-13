<?php
/**
* 
*/
class M_barangParent extends CI_Model
{
	
function view()
	{
		$sql = "select * from barang_parent";
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;

	}
	public function Insert($data)
	{
		
		$this->db->insert('barang_parent',$data);
	}
	public function Update($data)
	{
		$sql="select * from barang_parent where BAPA_ID =".$data;
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function UpdateData($id, $data)
	{
		$this->db->where('BAPA_ID', $id);
		$this->db->update('barang_parent', $data);
	}
	public function delete($id)
	{
		$this->db->where('BAPA_ID', $id);
		$this->db->delete('barang_parent');
	}

}
?>
