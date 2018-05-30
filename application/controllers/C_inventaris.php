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
			'dataChild' 	=> $getChild ,
			'title'			=> 'Inventaris', 
			'dataInventaris' => $getInventaris,
			'menu'         	=> 'Inventaris'
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
			'INVE_KEADAAN' 		=> $kondisi,
			'INVE_QTY' 			=> $qty 
		);
		$setInventaris = $this->m_inventaris->setInventaris($data);
		redirect('c_inventaris','refresh');
	}
	public function searchChild()
	{
		$str = $_GET['q'];
	    $namaChild  = $this->m_inventaris->getChildByInpaId($str);
	    ?>
	      <select required name="cmbChild" id="cmbChild" class="form-control" onchange="showQty();" onmousemove="showQty();">
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
		$parent 	= $_GET['parent'];
		$child 		= $_GET['child'];

	    if ($child == 0 && $parent == 0) {
	      ?>
	        <input type="text" name="txtQty" id="txtQty" class="form-control" required readonly placeholder="0"> 
	      <?php
	    }else{
	    	if ($child == 0) {
	    		$data 		= $this->m_inventaris->getLastStokWithoutChild($parent);
	    		if (isset($data[0]['INVE_QTY'])) {
	    			$qtyAwal 	= $data[0]['INVE_QTY'];
	    		}else{
	    			$qtyAwal 	= 0;
	    		}
				?>
					<input type="text" name="txtQty" id="txtQty" class="form-control" required value="<?php echo $qtyAwal ?>"> 
				<?php
	    	}else{
	    		$data 		= $this->m_inventaris->getLastStok($parent, $child);
	    		if (isset($data[0]['INVE_QTY'])) {
	    			$qtyAwal 	= $data[0]['INVE_QTY'];
	    		}else{
	    			$qtyAwal 	= 0;
	    		}
	    		?>
					<input type="text" name="txtQty" id="txtQty" class="form-control" required value="<?php echo $qtyAwal ?>"> 
				<?php
	    	}
	    }
	}
	public function modalInventaris()
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
		      <h4 class="modal-title">Input Inventaris</h4>
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
		      <form action="<?php echo base_url()?>c_inventaris/save" method="POST">
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
	public function modalChild()
	{
	    $cmbParent = $_GET['parent'];
	    $namaChild = $this->m_inventaris->getChildByInpaId($cmbParent);
	    $data = array(
		     'cmbParent' => $cmbParent ,
		     'namaChild' => $namaChild 
		);
	    ?>
	    <!-- modal child -->
	    <div class="modal-content">
	        <div class="modal-header">
	            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	            <h4 class="modal-title" id="myModalLabel">Lookup Anak Inventaris</h4>
	        </div>
	        <div class="modal-body">
	            <table id="inveChild" class="table table-bordered table-hover table-striped">
	                <thead>
	                  <tr>
	                    <th>No.</th>
	                    <th>Nama Anak Inventaris</th>
	                  </tr>
	                </thead>
	                <tbody>
	                  <?php
	                    $no=1;
	                    foreach ($namaChild as $row) {
	                      ?>
	                        <tr class="isi2" data-brgChild="<?php echo $row['INCH_ID']; ?>">
	                          <td> <?php echo $no ?> </td>
	                          <td> <?php echo $row['INCH_NAME']?> </td>
	                        </tr>
	                      <?php
	                      $no++;
	                    }
	                  ?>
	                </tbody>
	            </table>  
	        </div>
	    </div>
	    <?php
	} 
	public function delete($id)
	{
		$this->db->delete('inventaris', array('INVE_ID' => $id));
		redirect('c_managerial/inventaris','refresh');
	}
}
