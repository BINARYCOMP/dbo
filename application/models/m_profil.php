<?php 
/**
* 
*/
class M_profil extends CI_Model
{
	
	function getInfoAccount()
	{
	    $sql = "select * from pegawai,user where pegawai.PEGA_ID=".$_SESSION['USER_ID'];
	    $query=$this->db->query($sql);
	    $return = $query->result_array();
	  	return $return;
	}
	function UpdatePassword($data)
	{
	    $sql="select * from pegawai where PEGA_ID =".$_SESSION['USER_ID'];
	    $query=$this->db->query($sql);
	    $return = $query->result_array();
	    return $return;
  	}
}
 ?>