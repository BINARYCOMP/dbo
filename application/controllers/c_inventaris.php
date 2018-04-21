<?php
/**
 * 
 */
class C_inventaris extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_inventaris');
	}

	public function index()
	{
		$getParent 		= $this->m_inventaris->getParent();
		$getChild 		= $this->m_inventaris->getChild();
		$getInventaris 	= $this->m_inventaris->getInventaris();
		$data = array(
			'content' 		=> 'v_inventaris' , 
			'dataParent' 	=> $getParent ,
			'dataChild' 		=> $getChild , 
			'dataInventaris' => $getInventaris
		);
		$this->load->view('tampilan/v_combine', $data);
	}
	public function save()
	{
		$parent 	= $_POST['cmbParent'];
		$child 		= $_POST['cmbChild'];
		$qty 		= $_POST['txtQty'];
		$kondisi 	= $_POST['rbtKondisi'];
		$keterangan	= $_POST['txtKeterangan'];

		$data = array(
			'INVE_INCH_ID' 		=> $child , 
			'INVE_INPA_ID' 		=> $parent ,
			'INVE_KETERANGAN' 	=> $keterangan ,  
			'INVE_KEADAAN' 		=> $kondisi 
		);
		$dataChild = array(
			'qty' => $qty , 
			'INCH_ID' => $child 
		);
		$this->m_inventaris->setInventaris($data,$dataChild);
		redirect('c_inventaris','refresh');
	}
	public function searchChild()
	{
		$str = $_GET['q'];
	    $namaChild  = $this->m_inventaris->getChildByInpaId($str);
	    ?>
	      <select required name="cmbChild" id="cmbChild" class="form-control" onchange="showQty(this.value)" onmousemove="showQty(this.value)">
	        <?php
	          if ($str == 0) {
	            ?>
	              <option value='0' selected>== Pilih Anak Inventaris ==</option>
	            <?php
	          }else{
	            ?>
	              <option value='0'>== Pilih Anak Inventaris ==</option>
	            <?php
	          }
	          foreach ($namaChild as $row){
	            echo "<option value='".$row['INCH_ID']."'>";
	            echo $row ['INCH_NAME'];
	           echo "</option>";
	          }
	        ?>
	      </select>
	    <?php
	}
	public function searchQty()
	{
		$str 		= $_GET['q'];
	    $data 		= $this->m_inventaris->getChildById($str);
	    if ($str == 0) {
	      ?>
	        <input type="text" name="txtQty" id="qtyAwal" id="txtQty" class="form-control" required readonly placeholder="0"> 
	      <?php
	    }else{
	    	$qtyAwal 	= $data[0]['INCH_QTY'];
	      ?>
	        <input type="text" name="txtQty" id="qtyAwal" id="txtQty" class="form-control" required value="<?php echo $qtyAwal ?>"> 
	      <?php
	    }
	}
	public function modalKonfirmasi()
	{
		$cmbParent     = $_GET['parent'];
		$cmbChild      = $_GET['child'];
		$txtUraian     = $_GET['keterangan'];
		$txtMasuk      = $_GET['masuk'];
		$txtKeluar     = $_GET['keluar'];
		$txtSaldoAwal  = $_GET['awal'];
		$saldoAkhir    = $txtSaldoAwal + $txtMasuk - $txtKeluar;

		?>
		  <div class="modal-content">
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		        <span aria-hidden="true">&times;</span></button>
		      <h4 class="modal-title">Input Barang Setengah Jadi</h4>
		    </div>
		    <div class="modal-body">
		      <table class="table">
		        <tr>
		          <th>Induk Barang</th>
		          <th>Anak Barang</th>
		          <th>Barang Masuk</th>
		          <th>Barang Keluar</th>
		          <th>Saldo Akhir</th>
		        </tr>
		        <tr>
		          <td><?php echo $cmbParent ?></td>
		          <td><?php echo $cmbChild ?></td>
		          <td><?php echo $txtMasuk ?></td>
		          <td><?php echo $txtKeluar ?></td>
		          <td><?php echo $saldoAkhir ?> </td>
		        </tr>
		      </table>
		    </div>
		    <div class="modal-footer">
		      <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
		      <form action="<?php echo base_url()?>c_gudangJadi/inputStok" method="POST">
		        <input type="hidden" name="cmbParent" value="<?php echo $cmbParent?>">
		        <input type="hidden" name="cmbChild" value="<?php echo $cmbChild?>">
		        <input type="hidden" name="txtMasuk" value="<?php echo $txtMasuk?>">
		        <input type="hidden" name="txtKeluar" value="<?php echo $txtKeluar?>">
		        <input type="hidden" name="txtUraian" value="<?php echo $txtUraian?>">
		        <input type="hidden" name="txtSaldoAwal" value="<?php echo $txtSaldoAwal?>">
		        <input type="submit" class="btn btn-outline" value="Simpan">
		      </form>
		    </div>
		  </div>
		  <!-- /.modal-content -->
		<?php
	}
}