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
	public function getBarangJadiCimuning()
	{
		$sql 	= "SELECT * FROM barang_cimuning_child, satuan WHERE BACC_SATU_ID = SATU_ID ";
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
	public function getBarangChildByBapaIdFilter($id, $month, $year)
	{
		$sql 	= "SELECT * FROM  barang_parent, barang_child, satuan WHERE BAPA_ BACH_BAPA_ID = BAPA_ID AND BACH_SATU_ID = SATU_ID AND BACH_BAPA_ID =".$id;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}

	public function getBarangDetailCimuningByBaccId($id)
	{
		$sql 	= "SELECT * FROM  gudang_jadi, barang_cimuning_child, satuan WHERE GUJA_BACC_ID = BACC_ID AND BACC_SATU_ID = SATU_ID AND BACC_ID =".$id;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getBarangDetailSetengahJadiCimuningByBaccId($id)
	{
		$sql 	= "SELECT * FROM  gudang_tak_jadi, barang_cimuning_child, satuan WHERE GUTA_BACC_ID = BACC_ID AND BACC_SATU_ID = SATU_ID AND BACC_ID =".$id;
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
	public function getMaterialChildByMpciId($id)
	{
		$sql 	= "SELECT * FROM  material_parent_cimuning, material_child_cimuning, satuan WHERE MCCI_MPCI_ID = MPCI_ID AND MCCI_SATU_ID = SATU_ID AND MCCI_MPCI_ID =".$id;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getTotalByRuangan($bapaId, $bachId, $ruanId)
	{
		$sql 	= "SELECT SUM(GUBA_MASUK) as 'TOTAL_RUANGAN' FROM  gudang_bawang WHERE GUBA_BAPA_ID = ".$bapaId." AND GUBA_BACH_ID = ".$bachId." AND GUBA_RUAN_ID = ".$ruanId."";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		$TOTAL_RUANGAN = $return[0]['TOTAL_RUANGAN'];
		$sql 	= "SELECT SUM(GUBA_KELUAR) as 'TOTAL_RUANGAN' FROM  gudang_bawang WHERE GUBA_BAPA_ID = ".$bapaId." AND GUBA_BACH_ID = ".$bachId." AND GUBA_RUAN_ID = ".$ruanId."";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		$TOTAL_RUANGAN = $TOTAL_RUANGAN-$return[0]['TOTAL_RUANGAN'];
		return $TOTAL_RUANGAN;	
	}
	public function getTotalCimuningByRuangan($BaccId, $ruanId)
	{
		$sql 	= "SELECT SUM(GUJA_MASUK) as 'TOTAL_RUANGAN' FROM  gudang_jadi WHERE GUJA_BACC_ID = ".$BaccId." AND GUJA_RUAN_ID = ".$ruanId;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		$TOTAL_RUANGAN = $return[0]['TOTAL_RUANGAN'];
		$sql 	= "SELECT SUM(GUJA_KELUAR) as 'TOTAL_RUANGAN' FROM  gudang_jadi WHERE GUJA_BACC_ID = ".$BaccId." AND GUJA_RUAN_ID = ".$ruanId;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		$TOTAL_RUANGAN = $TOTAL_RUANGAN-$return[0]['TOTAL_RUANGAN'];
		return $TOTAL_RUANGAN;	
	}
	public function getTotalSetengahJadiCimuningByRuangan($BaccId, $ruanId)
	{
		$sql 	= "SELECT SUM(GUTA_MASUK) as 'TOTAL_RUANGAN' FROM  gudang_tak_jadi WHERE GUTA_BACC_ID = ".$BaccId." AND GUTA_RUAN_ID = ".$ruanId;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		$TOTAL_RUANGAN = $return[0]['TOTAL_RUANGAN'];
		$sql 	= "SELECT SUM(GUTA_KELUAR) as 'TOTAL_RUANGAN' FROM  gudang_tak_jadi WHERE GUTA_BACC_ID = ".$BaccId." AND GUTA_RUAN_ID = ".$ruanId;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		$TOTAL_RUANGAN = $TOTAL_RUANGAN-$return[0]['TOTAL_RUANGAN'];
		return $TOTAL_RUANGAN;
	}
	public function getTotalMaterialBawangByRuangan($mpbaId, $mcbaId, $ruanId)
	{
		$sql 	= "SELECT SUM(MABA_MASUK) as 'TOTAL_RUANGAN' FROM  material_bawang WHERE MABA_MPBA_ID = ".$mpbaId." AND MABA_MCBA_ID = ".$mcbaId." AND MABA_RUAN_ID = ".$ruanId;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		$TOTAL_RUANGAN = $return[0]['TOTAL_RUANGAN'];
		$sql 	= "SELECT SUM(MABA_KELUAR) as 'TOTAL_RUANGAN' FROM  material_bawang WHERE MABA_MPBA_ID = ".$mpbaId." AND MABA_MCBA_ID = ".$mcbaId." AND MABA_RUAN_ID = ".$ruanId;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		$TOTAL_RUANGAN = $TOTAL_RUANGAN-$return[0]['TOTAL_RUANGAN'];
		return $TOTAL_RUANGAN;	
	}
	public function getTotalMaterialCimuningByRuangan($mpbaId, $mcbaId, $ruanId)
	{
		$sql 	= "SELECT SUM(MACI_MASUK) as 'TOTAL_RUANGAN' FROM  material_cimuning WHERE MACI_MPCI_ID = ".$mpbaId." AND MACI_MCCI_ID = ".$mcbaId." AND MACI_RUAN_ID = ".$ruanId;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		$TOTAL_RUANGAN = $return[0]['TOTAL_RUANGAN'];
		$sql 	= "SELECT SUM(MACI_KELUAR) as 'TOTAL_RUANGAN' FROM  material_cimuning WHERE MACI_MPCI_ID = ".$mpbaId." AND MACI_MCCI_ID = ".$mcbaId." AND MACI_RUAN_ID = ".$ruanId;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		$TOTAL_RUANGAN = $TOTAL_RUANGAN-$return[0]['TOTAL_RUANGAN'];
		return $TOTAL_RUANGAN;
	}
	public function getTotalSaldo($bapaId, $bachId)
	{
		$sql 	= "SELECT SUM(GUBA_MASUK) as 'MASUK', SUM(GUBA_KELUAR) as 'KELUAR' FROM  gudang_bawang WHERE GUBA_BAPA_ID = ".$bapaId." AND GUBA_BACH_ID = ".$bachId;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		$return = $return[0]['MASUK'] - $return[0]['KELUAR'];
		$return = array(
			'TOTAL' => $return);
		return $return;	
	}
	public function getTotalSaldoCimuning($baccId)
	{
		$sql 	= "SELECT SUM(GUJA_MASUK) as 'MASUK', SUM(GUJA_KELUAR) as 'KELUAR' FROM  gudang_jadi WHERE GUJA_BACC_ID = ".$baccId;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		$return = $return[0]['MASUK'] - $return[0]['KELUAR'];
		$return = array(
			'TOTAL' => $return);
		return $return;	
	}
	public function getTotalSaldoSetengahJadiCimuning($baccId)
	{
		$sql 	= "SELECT SUM(GUTA_MASUK) as 'MASUK', SUM(GUTA_KELUAR) as 'KELUAR' FROM  gudang_tak_jadi WHERE GUTA_BACC_ID = ".$baccId;
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
	public function getTotalSaldoMaterialCimuning($mpbaId, $mcbaId)
	{
		$sql 	= "SELECT SUM(MACI_MASUK) as 'MASUK', SUM(MACI_KELUAR) as 'KELUAR' FROM  material_cimuning WHERE MACI_MPCI_ID = ".$mpbaId." AND MACI_MCCI_ID = ".$mcbaId;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		$return = $return[0]['MASUK'] - $return[0]['KELUAR'];
		$return = array(
			'TOTAL' => $return);
		return $return;	
	}
	public function getBarangJadiByChildId($id)
	{
		$sql 	= "SELECT * FROM  gudang_bawang, barang_parent, barang_child, satuan WHERE GUBA_BACH_ID = BACH_ID AND GUBA_BAPA_ID = BAPA_ID AND BACH_SATU_ID = SATU_ID AND BACH_ID =".$id;
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
	public function getMaterialCimuningByMcciId($id)
	{
		$sql 	= "SELECT * FROM  material_cimuning, material_parent_cimuning, material_child_cimuning, satuan WHERE MACI_MCCI_ID = MCCI_ID AND MACI_MPCI_ID = MPCI_ID AND MCCI_SATU_ID = SATU_ID AND MCCI_ID =".$id;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getStokByKateId($id,$bachId)
	{
		$sql 	= "SELECT * FROM kategori, gudang_bawang, barang_child, barang_parent WHERE 
					GUBA_BACH_ID = BACH_ID AND
					GUBA_BAPA_ID = BAPA_ID AND
					GUBA_KATE_ID = KATE_ID AND
					GUBA_KATE_ID = ".$id." AND
					GUBA_BACH_ID = ".$bachId;
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
		$sql 	= "SELECT sum(INVE_QTY) as 'Total' FROM  inventaris_child WHERE INCH_INPA_ID =".$id." AND INCH_KETERANGAN='Bawang'";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getTotalQtyCimuningByInpaId($id)
	{
		$sql 	= "SELECT sum(INVE_QTY) as 'Total' FROM inventaris, inventaris_child WHERE INVE_INCH_ID = INCH_ID AND INCH_INPA_ID =".$id." AND INCH_KETERANGAN='Cimuning'";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getKategoriByBachId($id)
	{
		$sql	= "SELECT * FROM gudang_bawang, kategori WHERE GUBA_KATE_ID = kate_id AND GUBA_BACH_ID = ".$id." GROUP BY kate_id";
		$query 	= $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getKategoriByBaccId($id)
	{
		$sql	= "SELECT * FROM gudang_jadi, kategori WHERE GUJA_KATE_ID = KATE_ID AND GUJA_BACC_ID = ".$id." GROUP BY KATE_ID";
		$query 	= $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getKategoriSetengahJadiByBaccId($id)
	{
		$sql	= "SELECT * FROM gudang_tak_jadi, kategori WHERE GUTA_KATE_ID = KATE_ID AND GUTA_BACC_ID = ".$id." GROUP BY KATE_ID";
		$query 	= $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getLastStok($bapa_id,$bach_id, $kate_id)
	{
		$sql="SELECT * from gudang_bawang, barang_parent, barang_child, kategori where guba_bach_id = bach_id and guba_bapa_id = bapa_id and guba_kate_id = kate_id and  guba_bach_id = ".$bach_id." and guba_bapa_id = ".$bapa_id." and guba_kate_id = ".$kate_id." group by guba_id desc limit 1";
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
