<?php 

/**
* 
*/
class M_satuan extends CI_model
{
	
	function view()
	{
		$sql = "select * from satuan";
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function Insert($data)
	{
		$this->db->insert('satuan',$data);
	}
	public function Update($data)
	{
		$sql="select * from satuan where SATU_ID =".$data;
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function UpdateData($id, $data)
	{
		$this->db->where('SATU_ID', $id);
		$this->db->update('satuan', $data);
	}
	public function delete($id)
	{
		$this->db->where('SATU_ID', $id);
		$this->db->delete('satuan');
	}
}
 ?>
