<?php 

/**
* 
*/
class M_kategori extends CI_model
{
	
	function view()
	{
		$sql	= "select * from kategori";
		$query 	= $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function Insert($data)
	{
		$this->db->insert('kategori',$data);
	}
	public function Update($data)
	{
		$sql	= "select * from kategori where KATE_ID =".$data;
		$query	= $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function UpdateData($id, $data)
	{
		$this->db->where('KATE_ID', $id);
		$this->db->update('kategori', $data);
	}
	public function delete($id)
	{
		$this->db->where('KATE_ID', $id);
		$this->db->delete('kategori');
	}
}

 ?>