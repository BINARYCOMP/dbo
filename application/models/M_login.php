<?php
/**
* 
*/
class M_login extends CI_Model
{
	
	public function getlogin($username, $password)
	{
		$sql = "select * from user,level where USER_LEVE_ID = LEVE_ID AND USER_NAME = '$username' and USER_PASSWORD = '$password'";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
}
