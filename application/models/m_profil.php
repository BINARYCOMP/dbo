<?php 
/**
* 
*/
class M_profil extends CI_Model
{
	
	function getInfoAccount()
	{
	    $sql = "select * from pegawai,user where PEGA_ID=USER_DAPE_ID AND USER_ID=".$_SESSION['USER_ID'];
	    $query=$this->db->query($sql);
	    $return = $query->result_array();
	  	return $return;
	}
	function Update($data)
	{
	    $sql="select * from pegawai where PEGA_ID =".$_SESSION['USER_ID'];
	    $query=$this->db->query($sql);
	    $return = $query->result_array();
	    return $return;
  	}
  	public function GetVerifPassowrd($password)
	{
		$sql = "select * from user,pegawai where USER_DAPE_ID = PEGA_ID AND USER_PASSWORD = '$password'";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
}
 ?>