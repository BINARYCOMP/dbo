<?php 
/**
* 
*/
class M_profil extends CI_Model
{
	
	function getInfoAccount()
	{
	    $sql = "select * from pegawai,user,agama where PEGA_ID=USER_DAPE_ID AND PEGA_AGAM_ID=AGAM_ID AND USER_ID=".$_SESSION['USER_ID'];
	    $query=$this->db->query($sql);
	    $return = $query->result_array();
	  	return $return;
	}
	public function getAgama()
	{
      $sql    ="select * from agama";
      $query  =$this->db->query($sql);
      $return = $query->result_array();
      return $return;
    }
    public function getPassword()
	{
		$sql = "select * from user where USER_ID=".$_SESSION['USER_ID'];
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function Update($data)
	{
		$this->db->where('USER_ID', $_SESSION['USER_ID']);
		$this->db->update('user', $data);
	}
}
?>