<?php
/**
 * 
 */
class C_inventarisCimuning extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_inventarisCimuning');
	}

	public function index()
	{
		$getParent 		= $this->m_inventarisCimuning->getParent();
		$getChild 		= $this->m_inventarisCimuning->getChild();
		$getinventarisCimuning 	= $this->m_inventarisCimuning->getinventarisCimuning();
		$data = array(
			'content' 		=> 'v_inventarisCimuning' , 
			'dataParent' 	=> $getParent ,
			'dataChild' 	=> $getChild ,
			'title'			=> 'inventarisCimuning', 
			'datainventarisCimuning' => $getinventarisCimuning,
			'menu'         	=> 'inventarisCimuning'
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
			'INCI_INCH_ID' 		=> $child , 
			'INCI_INPA_ID' 		=> $parent ,
			'INCI_KETERANGAN' 	=> $keterangan , 
			'INCI_KEADAAN' 		=> $kondisi 
		);
		$dataChild = array(
			'INCH_QTY' => $qty , 
			'INCH_ID' => $child 
		);
		$setinventarisCimuning = $this->m_inventarisCimuning->setinventarisCimuning($data,$dataChild);
		redirect('c_inventarisCimuning','refresh');
	}
	public function searchChild()
	{
		$str = $_GET['q'];
	    $namaChild  = $this->m_inventarisCimuning->getChildByInpaId($str);
	    ?>
	      <select required name="cmbChild" id="cmbChild" class="form-control" onchange="showQty(this.value);" onmousemove="showQty(this.value);">
	        <?php
	          if ($str == 0) {
	            ?>
	              <option value='0' selected>== Pilih Anak inventarisCimuning ==</option>
	            <?php
	          }else{
	            ?>
	              <option value='0'>== Pilih Anak inventarisCimuning ==</option>
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
	    $data 		= $this->m_inventarisCimuning->getChildById($str);
	    if ($str == 0) {
	      ?>
	        <input type="text" name="txtQty" id="txtQty" class="form-control" required readonly placeholder="0"> 
	      <?php
	    }else{
	    	$qtyAwal 	= $data[0]['INCH_QTY'];
	      ?>
	        <input type="text" name="txtQty" id="txtQty" class="form-control" required value="<?php echo $qtyAwal ?>"> 
	      <?php
	    }
	}
	public function modalinventarisCimuning()
	{
		$cmbParent 		= $_GET['parent'];
		$cmbChild 		= $_GET['child'];
		$txtQty 		= $_GET['qty'];
		$rbtKondisi 	= $_GET['kondisi'];
		$txtKeterangan	= $_GET['keterangan'];

		?>
		  <div class="modal-content">
		    <div class="modal-header">
		      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		        <span aria-hidden="true">&times;</span></button>
		      <h4 class="modal-title">Input inventarisCimuning</h4>
		    </div>
		    <div class="modal-body">
		      <table class="table">
		        <tr>
		          <th>Induk Barang</th>
		          <th>Anak Barang</th>
		          <th>Qty</th>
		          <th>Kondisi</th>
		          <th>Keterangan</th>
		        </tr>
		        <tr>
		          <td><?php echo $cmbParent ?></td>
		          <td><?php echo $cmbChild ?></td>
		          <td><?php echo $txtQty ?></td>
		          <td><?php echo $rbtKondisi ?></td>
		          <td><?php echo $txtKeterangan ?></td>
		        </tr>
		      </table>
		    </div>
		    <div class="modal-footer">
		      <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
		      <form action="<?php echo base_url()?>c_inventarisCimuning/save" method="POST">
		        <input type="hidden" name="cmbParent" value="<?php echo $cmbParent?>">
		        <input type="hidden" name="cmbChild" value="<?php echo $cmbChild?>">
		        <input type="hidden" name="txtQty" value="<?php echo $txtQty?>">
		        <input type="hidden" name="rbtKondisi" value="<?php echo $rbtKondisi?>">
		        <input type="hidden" name="txtKeterangan" value="<?php echo $txtKeterangan?>">
		        <input type="submit" class="btn btn-outline" value="Simpan">
		      </form>
		    </div>
		  </div>
		  <!-- /.modal-content -->
		<?php
	}
}