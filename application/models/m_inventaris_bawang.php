<?php
/**
 * 
 */
class M_inventaris_bawang extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getParent()
	{
		$sql = "select * from inventaris_parent where INPA_KETERANGAN = 'BAWANG'";
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getParentById($id)
	{
		$sql = "select * from inventaris_parent where INPA_KETERANGAN = 'BAWANG' AND  INPA_ID = ".$id;
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
		$sql = "select * from inventaris_child where INCH_KETERANGAN = 'BAWANG' AND  INCH_ID = ".$id;
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getLastStok($parent,$child)
	{
		$sql = "select * from inventaris, inventaris_child, inventaris_parent where inve_inch_id = inch_id and inve_inpa_id = inpa_id and inpa_id ='".$parent."' and inch_id = '".$child."'";
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getLastStokWithoutChild($parent,$child)
	{
		$sql = "select * from inventaris, inventaris_parent where inve_inpa_id = inpa_id and inpa_id ='".$parent."'";
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getChildByInpaId($id)
	{
		$sql = "select * from inventaris_child where INCH_KETERANGAN ='BAWANG' AND INCH_INPA_ID = ".$id;
		var_dump($sql);
		exit();
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getChildJoinByInpaId($id)
	{
		$sql = "select * from inventaris_child, inventaris where INCH_KETERANGAN = 'BAWANG' AND  INCH_ID = INVE_INCH_ID AND INCH_INPA_ID = ".$id;
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getInventarisById($id)
	{
		$sql = "select * from inventaris,inventaris_parent,inventaris_child where INVE_INPA_ID = INPA_ID AND INVE_INCH_ID = INCH_ID AND INVE_ID = ".$id;
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getInventarisByInchId($id)
	{
		$sql = "select * from inventaris where INVE_INCH_ID = ".$id;
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getInventaris()
	{
		$sql = "select * from inventaris_parent,inventaris,inventaris_child where INPA_KETERANGAN = 'BAWANG' AND INCH_KETERANGAN = 'BAWANG' AND  INPA_ID = INVE_INPA_ID AND INVE_INCH_ID = INCH_ID order by INVE_ID ";
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function setInventaris($data)
	{
		$this->db->insert('inventaris', $data);
	}
}
