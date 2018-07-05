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

	public function getMonth()
	{
		$month = date('m');
		return $month;
	}
	public function getYear()
	{
		$year = date('Y');
		return $year;
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
	public function getBarangJadiCimuningPerKategoriByBaccId($id)
	{
		$sql = "SELECT * FROM gudang_jadi , barang_cimuning_child, kategori WHERE GUJA_BACC_ID = BACC_ID AND GUJA_KATE_ID = KATE_ID AND BACC_ID = ".$id." GROUP BY KATE_ID";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getBarangTakJadiCimuningPerKategoriByBaccId($id)
	{
		$sql = "SELECT * FROM gudang_tak_jadi , barang_cimuning_child, kategori WHERE GUTA_BACC_ID = BACC_ID AND GUTA_KATE_ID = KATE_ID AND BACC_ID = ".$id." GROUP BY KATE_ID";
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
		$sql 	= "SELECT * FROM keuangan, perusahaan ,  user,pegawai WHERE USER_ID = KEUA_USER_ID AND USER_DAPE_ID = PEGA_ID AND KEUA_PERU_ID = PERU_ID";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getKeuanganFilter($awal,$akhir,$month,$year)
	{
		$sql 	= "SELECT * FROM keuangan, perusahaan, user,pegawai WHERE USER_ID = KEUA_USER_ID AND USER_DAPE_ID = PEGA_ID AND ( DAY(KEUA_TANGGAL) BETWEEN ".$awal." AND ".$akhir." ) AND  MONTH(KEUA_TANGGAL) = '".$month."' AND YEAR(KEUA_TANGGAL) = '".$year."' AND KEUA_PERU_ID = PERU_ID";
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
		$sql 	= "SELECT * FROM  barang_parent, barang_child, satuan WHERE BACH_SATU_ID = SATU_ID AND BACH_BAPA_ID = BAPA_ID AND BACH_BAPA_ID =".$id;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getBarangChildPerKategoriByBachId($id)
	{
		$sql 	= "SELECT * FROM gudang_bawang , barang_child, kategori WHERE GUBA_BACH_ID = BACH_ID AND GUBA_KATE_ID = KATE_ID AND BACH_ID =".$id." GROUP BY KATE_ID";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getBarangDetailCimuningByBaccId($id)
	{
		$sql 	= "SELECT * FROM gudang_jadi, barang_cimuning_child, satuan , user,pegawai WHERE USER_ID = GUJA_USER_ID AND USER_ID = GUJA_USER_ID AND USER_DAPE_ID = PEGA_ID AND  GUJA_BACC_ID = BACC_ID AND BACC_SATU_ID = SATU_ID AND GUJA_BACC_ID =".$id." AND MONTH(GUJA_TANGGAL) =".date('m')." AND YEAR(GUJA_TANGGAL) = ".date('Y');
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getBarangDetailCimuningByBaccId2($id)
	{
		$sql 	= "SELECT * FROM gudang_jadi, barang_cimuning_child WHERE   GUJA_BACC_ID = BACC_ID AND GUJA_BACC_ID =".$id;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getBarangDetailCimuningByBaccIdLimit($id)
	{
		$sql 	= "SELECT * FROM gudang_jadi, barang_cimuning_child, satuan WHERE  GUJA_BACC_ID = BACC_ID AND BACC_SATU_ID = SATU_ID AND GUJA_BACC_ID =".$id." LIMIT 1";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getBarangDetailCimuningByBaccIdFilter($id,$awal, $akhir, $month,$year)
	{
		$sql 	= "SELECT * FROM  gudang_jadi, barang_cimuning_child, satuan, user,pegawai WHERE USER_ID = GUJA_USER_ID AND USER_ID = GUJA_USER_ID AND USER_DAPE_ID = PEGA_ID AND ( DAY(GUJA_TANGGAL) BETWEEN ".$awal." AND ".$akhir." ) AND  MONTH(GUJA_TANGGAL) = '".$month."' AND YEAR(GUJA_TANGGAL) = '".$year."' AND GUJA_BACC_ID = BACC_ID AND BACC_SATU_ID = SATU_ID AND BACC_ID =".$id;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getBarangDetailSetengahJadiCimuningByBaccId($id)
	{
		$sql 	= "SELECT * FROM  gudang_tak_jadi, barang_cimuning_child, satuan, user,pegawai WHERE USER_ID = GUTA_USER_ID AND USER_DAPE_ID = PEGA_ID AND GUTA_BACC_ID = BACC_ID AND BACC_SATU_ID = SATU_ID AND BACC_ID =".$id." AND MONTH(GUTA_TANGGAL) =".date('m')." AND YEAR(GUTA_TANGGAL) = ".date('Y');
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getBarangDetailSetengahJadiCimuningByBaccIdFilter($id,$awal, $akhir, $month,$year)
	{
		$sql 	= "SELECT * FROM  gudang_tak_jadi, barang_cimuning_child, satuan , user,pegawai WHERE USER_DAPE_ID = PEGA_ID AND USER_ID = GUTA_USER_ID AND ( DAY(GUTA_TANGGAL) BETWEEN ".$awal." AND ".$akhir." ) AND MONTH(GUTA_TANGGAL) = '".$month."' AND YEAR(GUTA_TANGGAL) = '".$year."' AND GUTA_BACC_ID = BACC_ID AND BACC_SATU_ID = SATU_ID AND BACC_ID =".$id;
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
		$sql 	= "SELECT * FROM  gudang_bawang, user,pegawai, barang_parent, barang_child, satuan WHERE USER_ID = GUBA_USER_ID AND USER_DAPE_ID = PEGA_ID AND  GUBA_BACH_ID = BACH_ID AND GUBA_BAPA_ID = BAPA_ID AND BACH_SATU_ID = SATU_ID AND BACH_ID =".$id." AND MONTH(GUBA_TANGGAL) =".date('m')." AND YEAR(GUBA_TANGGAL) = ".date('Y')." ORDER BY GUBA_ID ASC";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getBarangJadiByChildIdFilter($id,$awal, $akhir,  $month, $year)
	{
		$sql 	= "SELECT * FROM  gudang_bawang, barang_parent, barang_child, satuan , user,pegawai WHERE USER_DAPE_ID = PEGA_ID AND USER_ID = GUBA_USER_ID AND ( DAY(GUBA_TANGGAL) BETWEEN ".$awal." AND ".$akhir." ) AND MONTH(GUBA_TANGGAL) = '".$month."' AND YEAR(GUBA_TANGGAL) = '".$year."' AND GUBA_BACH_ID = BACH_ID AND GUBA_BAPA_ID = BAPA_ID AND BACH_SATU_ID = SATU_ID AND BACH_ID =".$id;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getMaterialBawangByMcbaId($id)
	{
		$sql 	= "SELECT * FROM  material_bawang, material_parent_bawang, material_child_bawang, satuan , user,pegawai WHERE USER_DAPE_ID = PEGA_ID AND USER_ID = MABA_USER_ID AND MABA_MCBA_ID = MCBA_ID AND MABA_MPBA_ID = MPBA_ID AND MCBA_SATU_ID = SATU_ID AND MCBA_ID =".$id." AND MONTH(MABA_TANGGAL) =".date('m')." AND YEAR(MABA_TANGGAL) = ".date('Y');
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getMaterialBawangByMcbaIdFilter($id,$awal, $akhir, $month,$year)
	{
		$sql 	= "SELECT * FROM  material_bawang, material_parent_bawang, material_child_bawang, satuan, user,pegawai WHERE USER_DAPE_ID = PEGA_ID AND USER_ID = MABA_USER_ID AND ( DAY(MABA_TANGGAL) BETWEEN ".$awal." AND ".$akhir." ) AND MONTH(MABA_TANGGAL) = '".$month."' AND YEAR(MABA_TANGGAL) = '".$year."' AND MABA_MCBA_ID = MCBA_ID AND MABA_MPBA_ID = MPBA_ID AND MCBA_SATU_ID = SATU_ID AND MCBA_ID =".$id;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getMaterialCimuningByMcciId($id)
	{
		$sql 	= "SELECT * FROM  material_cimuning, material_parent_cimuning, material_child_cimuning, satuan ,user,pegawai WHERE USER_DAPE_ID = PEGA_ID AND MACI_USER_ID = USER_ID AND MACI_MCCI_ID = MCCI_ID AND MACI_MPCI_ID = MPCI_ID AND MCCI_SATU_ID = SATU_ID AND MCCI_ID =".$id." AND MONTH(MACI_TANGGAL) =".date('m')." AND YEAR(MACI_TANGGAL) = ".date('Y');
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getMaterialCimuningByMcciIdFilter($id,$awal, $akhir, $month,$year)
	{
		$sql 	= "SELECT * FROM  material_cimuning, material_parent_cimuning, material_child_cimuning, satuan , user,pegawai WHERE USER_DAPE_ID = PEGA_ID AND USER_ID = MACI_USER_ID AND ( DAY(MACI_TANGGAL) BETWEEN ".$awal." AND ".$akhir." ) AND MONTH(MACI_TANGGAL) = '".$month."' AND YEAR(MACI_TANGGAL) = '".$year."' AND MACI_MCCI_ID = MCCI_ID AND MACI_MPCI_ID = MPCI_ID AND MCCI_SATU_ID = SATU_ID AND MCCI_ID =".$id;
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
		$sql 	= "SELECT sum(INVE_QTY) as 'Total' FROM inventaris, inventaris_child WHERE INVE_INCH_ID = INCH_ID AND INCH_INPA_ID =".$id." AND INCH_KETERANGAN='CIMUNING' AND MONTH(INVE_TANGGAL) = '".date('m')."' AND YEAR(INVE_TANGGAL) =".date('Y');
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getTotalQtyBawangByInpaId($id)
	{
		$sql 	= "SELECT sum(INVE_QTY) as 'Total' FROM inventaris, inventaris_child WHERE INVE_INCH_ID = INCH_ID AND INCH_INPA_ID =".$id." AND INCH_KETERANGAN='BAWANG' AND MONTH(INVE_TANGGAL) = '".date('m')."' AND YEAR(INVE_TANGGAL) =".date('Y');
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
	public function getInventarisParentBawang()
	{
		$sql 	= "SELECT * FROM inventaris_parent WHERE inpa_keterangan ='Bawang'";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getInventarisParentFilter($awal, $akhir, $bulan, $tahun, $keterangan)
	{
		$sql 	= "SELECT * FROM inventaris_parent WHERE inpa_keterangan ='".$keterangan."' ";
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
		$sql 	= "SELECT * FROM  inventaris_parent, inventaris_child, inventaris, user,pegawai WHERE USER_ID = INVE_USER_ID AND USER_DAPE_ID = PEGA_ID AND INCH_INPA_ID = INPA_ID AND INVE_INCH_ID = INCH_ID AND INVE_INPA_ID = INPA_ID AND INPA_ID =".$id." AND INPA_KETERANGAN ='Cimuning' AND INCH_KETERANGAN = 'Cimuning' AND MONTH(INVE_TANGGAL) =".date('m')." AND YEAR(INVE_TANGGAL) = ".date('Y');
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getInventarisChildGudangByInpaId($id, $keterangan,$awal, $akhir, $bulan, $tahun)
	{
		$sql 	= "SELECT * FROM  inventaris_parent, inventaris_child, inventaris, user,pegawai WHERE USER_ID = INVE_USER_ID AND USER_DAPE_ID = PEGA_ID AND INCH_INPA_ID = INPA_ID AND INVE_INCH_ID = INCH_ID AND INVE_INPA_ID = INPA_ID AND INPA_ID =".$id." AND INPA_KETERANGAN ='".$keterangan."' AND INCH_KETERANGAN = '".$keterangan."' AND  ( DAY(INVE_TANGGAL) BETWEEN ".$awal." AND ".$akhir." ) AND  MONTH(INVE_TANGGAL) = '".$bulan."' AND YEAR(INVE_TANGGAL) = '".$tahun."'";
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
	public function getInventarisChildBawangByInpaId($id)
	{
		$sql 	= "SELECT * FROM  inventaris_parent, inventaris_child, inventaris , user,pegawai WHERE USER_ID = INVE_USER_ID AND USER_DAPE_ID = PEGA_ID AND INCH_INPA_ID = INPA_ID AND INVE_INCH_ID = INCH_ID AND INVE_INPA_ID = INPA_ID AND INPA_ID =".$id." AND INPA_KETERANGAN ='BAWANG' AND INCH_KETERANGAN = 'BAWANG' AND MONTH(INVE_TANGGAL) =".date('m')." AND YEAR(INVE_TANGGAL) = ".date('Y');
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}

	public function getInventarisByChildId($id)
	{
		$sql 	= "SELECT * FROM  inventaris, inventaris_parent, inventaris_child user,pegawai WHERE USER_ID = INVE_USER_ID AND USER_DAPE_ID = PEGA_ID AND INVE_INCH_ID = INCH_ID AND INVE_INPA_ID = INPA_ID AND INCH_ID =".$id;
		$query = $this->db->query($sql);
		$return = $query->result_array();
		return $return;
	}
}
