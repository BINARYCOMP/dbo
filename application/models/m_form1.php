<?php 
/**
* 
*/
class M_form1 extends CI_Model
{
	
	public function getLevel()
	{
		$sql="select * from level ";
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;

	}
	
		public function getUser()
	{
		$sql="select * from user ";
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;

	}


		public function Insert($data)
	{
		$this->db->insert('user',$data);
	}
	public function viewData($id){
		var_dump($id);	
		$sql="select * from user where USER_ID =".$id;
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function UpdateData($data,$id){
		$this->db->where('USER_LEVE_ID', $id);
		$this->db->update('user', $data);
	}

}
?>