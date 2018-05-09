<?php
/**
 * 
 */
class M_report extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function getBarangParent()
	{
		$sql 	= "SELECT * FROM barang_parent ";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getBarangParentCimuning()
	{
		$sql 	= "SELECT * FROM barang_cimuning_parent ";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getMaterialCimuningParent()
	{
		$sql 	= "SELECT * FROM material_parent_cimuning ";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getMaterialBawangParent()
	{
		$sql 	= "SELECT * FROM material_parent_bawang ";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getKeuangan()
	{
		$sql 	= "SELECT * FROM keuangan";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getRuangan()
	{
		$sql 	= "SELECT * FROM ruangan";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getBarangChildByBapaId($id)
	{
		$sql 	= "SELECT * FROM  barang_parent, barang_child, satuan WHERE BACH_BAPA_ID = BAPA_ID AND BACH_SATU_ID = SATU_ID AND BACH_BAPA_ID =".$id;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getBarangChildCimuningByBacpId($id)
	{
		$sql 	= "SELECT * FROM  barang_cimuning_parent, barang_cimuning_child, satuan WHERE BACC_BACP_ID = BACP_ID AND BACC_SATU_ID = SATU_ID AND BACC_BACP_ID =".$id;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getMaterialChildByMpbaId($id)
	{
		$sql 	= "SELECT * FROM  material_parent_bawang, material_child_bawang, satuan WHERE MCBA_MPBA_ID = MPBA_ID AND MCBA_SATU_ID = SATU_ID AND MCBA_MPBA_ID =".$id;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getTotalByRuangan($bapaId, $bachId, $ruanId)
	{
		$sql 	= "SELECT SUM(GUJA_MASUK) as 'TOTAL_RUANGAN' FROM  gudang_jadi WHERE GUJA_BAPA_ID = ".$bapaId." AND GUJA_BACH_ID = ".$bachId." AND GUJA_RUAN_ID = ".$ruanId;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;	
	}
	public function getTotalMaterialBawangByRuangan($mpbaId, $mcbaId, $ruanId)
	{
		$sql 	= "SELECT SUM(MABA_MASUK) as 'TOTAL_RUANGAN' FROM  material_bawang WHERE MABA_MPBA_ID = ".$mpbaId." AND MABA_MCBA_ID = ".$mcbaId." AND MABA_RUAN_ID = ".$ruanId;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;	
	}
	public function getTotalSaldo($bapaId, $bachId)
	{
		$sql 	= "SELECT SUM(GUJA_MASUK) as 'MASUK', SUM(GUJA_KELUAR) as 'KELUAR' FROM  gudang_jadi WHERE GUJA_BAPA_ID = ".$bapaId." AND GUJA_BACH_ID = ".$bachId;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		$return = $return[0]['MASUK'] - $return[0]['KELUAR'];
		$return = array(
			'TOTAL' => $return);
		return $return;	
	}
	public function getTotalSaldoMaterialBawang($mpbaId, $mcbaId)
	{
		$sql 	= "SELECT SUM(MABA_MASUK) as 'MASUK', SUM(MABA_KELUAR) as 'KELUAR' FROM  material_bawang WHERE MABA_MPBA_ID = ".$mpbaId." AND MABA_MCBA_ID = ".$mcbaId;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		$return = $return[0]['MASUK'] - $return[0]['KELUAR'];
		$return = array(
			'TOTAL' => $return);
		return $return;	
	}
	public function getBarangJadiByChildId($id)
	{
		$sql 	= "SELECT * FROM  gudang_jadi, barang_parent, barang_child, satuan WHERE GUJA_BACH_ID = BACH_ID AND GUJA_BAPA_ID = BAPA_ID AND BACH_SATU_ID = SATU_ID AND BACH_ID =".$id;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getMaterialBawangByMcbaId($id)
	{
		$sql 	= "SELECT * FROM  material_bawang, material_parent_bawang, material_child_bawang, satuan WHERE MABA_MCBA_ID = MCBA_ID AND MABA_MPBA_ID = MPBA_ID AND MCBA_SATU_ID = SATU_ID AND MCBA_ID =".$id;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getStokByKateId($id,$bachId)
	{
		$sql 	= "SELECT * FROM kategori, gudang_jadi, barang_child, barang_parent WHERE 
					GUJA_BACH_ID = BACH_ID AND
					GUJA_BAPA_ID = BAPA_ID AND
					GUJA_KATE_ID = KATE_ID AND
					GUJA_KATE_ID = ".$id." AND
					GUJA_BACH_ID = ".$bachId;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getTotalSaldoByBachId($id)
	{
		$sql 	= "SELECT sum(BACH_GUJA_ID) as 'Total' FROM  barang_child WHERE BACH_ID =".$id;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getTotalQtyByInpaId($id)
	{
		$sql 	= "SELECT sum(INCH_QTY) as 'Total' FROM  inventaris_child WHERE INCH_INPA_ID =".$id." AND INCH_KETERANGAN='Bawang'";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getTotalQtyCimuningByInpaId($id)
	{
		$sql 	= "SELECT sum(INCH_QTY) as 'Total' FROM  inventaris_child WHERE INCH_INPA_ID =".$id." AND INCH_KETERANGAN='Cimuning'";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getKategoriByBachId($id)
	{
		$sql	= "SELECT * FROM gudang_jadi, kategori WHERE guja_kate_id = kate_id AND GUJA_BACH_ID = ".$id." GROUP BY kate_id";
		$query 	= $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getLastStok($bapa_id,$bach_id, $kate_id)
	{
		$sql="SELECT * from gudang_jadi, barang_parent, barang_child, kategori where guja_bach_id = bach_id and guja_bapa_id = bapa_id and guja_kate_id = kate_id and  guja_bach_id = ".$bach_id." and guja_bapa_id = ".$bapa_id." and guja_kate_id = ".$kate_id." group by guja_id desc limit 1";
		$query=$this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getInventarisParent()
	{
		$sql 	= "SELECT * FROM inventaris_parent WHERE inpa_keterangan ='Bawang'";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getInventarisParentCimuning()
	{
		$sql 	= "SELECT * FROM inventaris_parent WHERE inpa_keterangan ='Cimuning'";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}

	public function getInventarisChildByInpaId($id)
	{
		$sql 	= "SELECT * FROM  inventaris_parent, inventaris_child, inventaris WHERE INCH_INPA_ID = INPA_ID AND INVE_INCH_ID = INCH_ID AND INVE_INPA_ID = INPA_ID AND INPA_ID =".$id." AND INPA_KETERANGAN ='Bawang' AND INCH_KETERANGAN ='Bawang'";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}

	public function getInventarisChildCimuningByInpaId($id)
	{
		$sql 	= "SELECT * FROM  inventaris_parent, inventaris_child, inventaris WHERE INCH_INPA_ID = INPA_ID AND INVE_INCH_ID = INCH_ID AND INVE_INPA_ID = INPA_ID AND INPA_ID =".$id." AND INPA_KETERANGAN ='Cimuning' AND INCH_KETERANGAN = 'Cimuning'";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}

	public function getInventarisByChildId($id)
	{
		$sql 	= "SELECT * FROM  inventaris, inventaris_parent, inventaris_child WHERE INVE_INCH_ID = INCH_ID AND INVE_INPA_ID = INPA_ID AND INCH_ID =".$id;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
}