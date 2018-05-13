<?php 

/**
* 
*/
class M_excel_gudang_jadi extends CI_Model
{
	
	public function view()
	{
		$this->db->select('barang_parent.*');
		$this->db->from('barang_parent');
		$query=$this->db->get();
		return $query->result();
	}
	public function view2($data)
	{
		$this->db->select('barang_parent.*,barang_child.*,satuan.*');
		$this->db->from('barang_parent');
		$this->db->join('barang_child','barang_parent.BAPA_ID = barang_child.BACH_BAPA_ID');
		$this->db->join('satuan','barang_child.BACH_SATU_ID = satuan.SATU_ID');
		$this->db->where('BACH_BAPA_ID ='.$data);
		$query=$this->db->get();
		return $query->result();
	}
}

 ?>
