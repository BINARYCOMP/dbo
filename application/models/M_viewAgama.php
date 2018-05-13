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
	public function Update($data)
	{
		$sql="select * from agama where AGAM_ID =".$data;
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function UpdateData($id, $data)
	{
		$this->db->where('AGAM_ID', $id);
		$this->db->update('agama', $data);
	}
	public function delete($id)
	{
		$this->db->where('AGAM_ID', $id);
		$this->db->delete('agama');
	}

}
?>
