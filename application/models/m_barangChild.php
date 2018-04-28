<?php
/**
* 
*/
class M_barangChild extends CI_Model
{
	
	public function view()
	{
		$sql = "select * from barang_child inner join satuan on barang_child.BACH_SATU_ID = satuan.SATU_ID inner join barang_parent on barang_child.BACH_BAPA_ID=barang_parent.BAPA_ID ";
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
		
		$this->db->insert('barang_child',$data);
	}
	public function Update($data)
	{
		$sql="select * from barang_child where BACH_ID =".$data;
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function UpdateData($id, $data)
	{
		$this->db->where('BACH_ID', $id);
		$this->db->update('barang_child', $data);
	}
	public function delete($id)
	{
		$this->db->where('BACH_ID', $id);
		$this->db->delete('barang_child');
	}

}
?>