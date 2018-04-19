<?php
/**
 * 
 */
class M_inventaris extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getParent()
	{
		$sql = "select * from inventaris_parent";
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getChild()
	{
		$sql = "select * from inventaris_child";
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getChildById($id)
	{
		$sql = "select * from inventaris_child where INCH_ID = ".$id;
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getChildByInpaId($id)
	{
		$sql = "select * from inventaris_child where INCH_INPA_ID = ".$id;
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getInventarisById($id)
	{
		$sql = "select * from inventaris,inventaris_parent,inventaris_child WHERE INVE_INPA_ID = INPA_ID AND INVE_INCH_ID = INCH_ID AND INVE_ID = ".$id;
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getInventaris()
	{
		$sql = "select * from inventaris,inventaris_parent,inventaris_child WHERE INVE_INPA_ID = INPA_ID AND INVE_INCH_ID = INCH_ID";
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function setInventaris($data, $dataChild)
	{
		$sql = "update inventaris_child set INCH_QTY ='".$dataChild['qty']."' where INCH_ID = '".$dataChild['INCH_ID']."'";
		$query=$this->db->query($sql);
		$this->db->insert('inventaris', $data);
	}
}