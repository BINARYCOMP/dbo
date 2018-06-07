<?php
/**
* 
*/
class C_inventarisChild extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_inventarisChild');
	}

	public function index()
	{
		$inventarisChild 	=$this->m_inventarisChild->view();
		$inventarisParent	=$this->m_inventarisChild->viewParent();
		$data = array(
			'title'				=> 'Inventaris Child',
			'content' 			=> 'v_inventarisChild',
			'inventaris_child' 	=> $inventarisChild,
			'inventaris_parent'	=> $inventarisParent,
			'menu'         		=> 'Inventaris Child'
		);
		$this->load->view('tampilan/v_combine',$data);

	}
	public function save()
	{
		$nama 		= $_POST['txtNama'];
		$parent		= $_POST['txtParent'];
		$keterangan = $_POST['cmbKategori'];
		$data = array(
			'INCH_NAME' 	=> $nama ,
			'INCH_INPA_ID' 	=> $parent ,
			'INCH_KETERANGAN' 	=> $keterangan ,
			);
		$child=$this->m_inventarisChild->Insert($data);
		 redirect('c_inventarisChild');
	}
	public function FormUpdate($id){
		$child=$this->m_inventarisChild->Update($id);
		$inventarisParent	=$this->m_inventarisChild->getParentByKeterangan($child[0]['INCH_KETERANGAN']);
		$data = array(
			'title'				=> 'Inventaris Child',
			'content' 			=> 'v_editinventarisChild',
			'inventarisChild' 	=> $child,
			'inventaris_parent'	=> $inventarisParent,
			'menu'         		=> 'Inventaris Child'
		);
		$this->load->view('tampilan/v_combine',$data);
	}
	public function UpdateData($id)
	{
		$nama 		= $_POST['txtnama'];
		$parent		= $_POST['txtParent'];
		$jumlah 	= $_POST['txtqty'];
		$data = array(
			'INCH_NAME' 	=> $nama ,
			'INCH_INPA_ID' 	=> $parent ,
			'INCH_QTY' 		=> $jumlah ,
			);
		$child=$this->m_inventarisChild->UpdateData($id, $data);
		redirect('C_inventarisChild');

	}
	public function delete($id)
	{
		$this->db->delete('inventaris_child', array('INCH_ID' => $id));
		redirect('c_inventarisChild');
	}
	public function show_parent()
	{
		$keterangan = $this->input->post('keterangan');
		$dataInventaris 	= $this->m_inventarisChild->getInventarisParentNameByKeterangan($keterangan);
		foreach ($dataInventaris as $row) {
			?>
			<option value="<?=$row['INPA_ID']?>"><?=$row['INPA_NAME']?></option>
			<?php
		}
	}
	public function modal_parent()
	{
		$keterangan = $this->input->post('keterangan');
		$dataInventaris 	= $this->m_inventarisChild->getInventarisParentNameByKeterangan($keterangan);
		$no = 1; 
		foreach ($dataInventaris as $row) {
		?>
			<tr class="search" data-invenParent="<?php echo $row['INPA_ID']; ?>">
				<td><?php echo $no; ?></td>
				<td><?php echo $row['INPA_NAME']?></td>
			</tr>
		<?php
		$no++;
      }
	}
}
?>
