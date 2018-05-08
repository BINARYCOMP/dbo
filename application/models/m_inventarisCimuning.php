<?php
/**
 * 
 */
class M_inventarisCimuning extends CI_Model
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
	public function getParentById($id)
	{
		$sql = "select * from inventaris_parent where INPA_ID = ".$id;
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
	public function getChildJoinByInpaId($id)
	{
		$sql = "select * from inventaris_child, inventaris_cimuning where INCH_ID = INCI_INCH_ID AND INCH_INPA_ID = ".$id;
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getinventarisCimuningById($id)
	{
		$sql = "select * from inventaris_cimuning,inventaris_parent,inventaris_child where INCI_INPA_ID = INPA_ID AND INCI_INCH_ID = INCH_ID AND INCI_ID = ".$id;
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getinventarisCimuningByInchId($id)
	{
		$sql = "select * from inventaris_cimuning where INCI_INCH_ID = ".$id;
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getinventarisCimuning()
	{
		$sql = "select * from inventaris_parent,inventaris_cimuning,inventaris_child where  INPA_ID = INCI_INPA_ID AND INCI_INCH_ID = INCH_ID order by INCI_ID ";
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function setinventarisCimuning($data, $dataChild)
	{
		$sql = "update inventaris_child set INCH_QTY ='".$dataChild['INCH_QTY']."' where INCH_ID = '".$dataChild['INCH_ID']."'";
		$query=$this->db->query($sql);
		$this->db->insert('inventaris_cimuning', $data);
	}
}