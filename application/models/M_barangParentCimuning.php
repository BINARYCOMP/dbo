<?php
/**
* 
*/
class M_barangParentCimuning extends CI_Model
{
	
function view()
	{
		$sql = "select * from barang_cimuning_parent";
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;

	}
	public function Insert($data)
	{
		
		$this->db->insert('barang_cimuning_parent',$data);
	}
	public function Update($data)
	{
		$sql="select * from barang_cimuning_parent where BACP_ID =".$data;
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function UpdateData($id, $data)
	{
		$this->db->where('BACP_ID', $id);
		$this->db->update('barang_cimuning_parent', $data);
	}
	public function delete($id)
	{
		$this->db->where('BACP_ID', $id);
		$this->db->delete('barang_cimuning_parent');
	}

}
?>
