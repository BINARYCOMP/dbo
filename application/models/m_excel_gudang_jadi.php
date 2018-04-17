<?php 

/**
* 
*/
class M_excel_gudang_jadi extends CI_Model
{
	
	public function view()
	{
		$this->db->select('barang_parent.*,barang_child.*,satuan.*');
		$this->db->from('barang_parent');
		$this->db->join('barang_child','barang_parent.BAPA_BACH_ID = barang_child.BACH_ID');
		$this->db->join('satuan','barang_child.BACH_SATU_ID = satuan.SATU_ID');
		$query=$this->db->get();
		return $query->result();
	}
}

 ?>