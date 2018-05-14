<?php
/**
* 
*/
class M_barangChildCimuning extends CI_Model
{
	
	public function view()
	{
		$sql = "SELECT * from barang_cimuning_child inner join satuan on BACC_SATU_ID = SATU_ID  ";
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;

	}
	public function getBarangParent()
	{
		$sql = "select * from barang_parent";
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;

	}
	public function getSatuan()
	{
		$sql = "select * from satuan";
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;

	}
	public function Insert($data)
	{
		
		$this->db->insert('barang_cimuning_child',$data);
	}
	public function Update($data)
	{
		$sql="select * from barang_cimuning_child where BACC_ID =".$data;
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function UpdateData($id, $data)
	{
		$this->db->where('BACC_ID', $id);
		$this->db->update('barang_cimuning_child', $data);
	}
	public function delete($id)
	{
		$this->db->where('BACC_ID', $id);
		$this->db->delete('barang_cimuning_child');
	}

}
?>
