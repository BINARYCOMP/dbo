<?php
/**
 * 
 */
class C_inventaris_bawang extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_inventaris_bawang');
		$this->load->model('m_inventaris');
		$this->load->model('m_report');
	}

	public function index()
	{
		$dataInventarisParentBawang			= $this->m_report->getInventarisParentBawang();
		$getParent 		= $this->m_inventaris_bawang->getParent();
		$getChild 		= $this->m_inventaris_bawang->getChild();
		$getInventaris 	= $this->m_inventaris_bawang->getInventaris();
		$data = array(
			'dataInventarisParentBawang'		=> $dataInventarisParentBawang,
			'content' 		=> 'v_inventarisBawang' , 
			'dataParent' 	=> $getParent ,
			'dataChild' 	=> $getChild ,
			'title'			=> 'Inventaris', 
			'dataInventaris' => $getInventaris,
			'menu'         	=> 'Inventaris'
		);
		$this->load->view('tampilan/v_combine', $data);
	}
	public function form_update($id)
	{
		$dataInventarisParentBawang			= $this->m_report->getInventarisParentBawang();
		$getParent 		= $this->m_inventaris_bawang->getParent();
		$getChild 		= $this->m_inventaris_bawang->getChild();
		$getInventaris 	= $this->m_inventaris->getInventarisByIdEdit($id);
		$data = array(
			'dataInventarisParentBawang'		=> $dataInventarisParentBawang,
			'content' 		=> 'v_inventarisBawangEdit' , 
			'dataParent' 	=> $getParent ,
			'dataChild' 	=> $getChild ,
			'title'			=> 'Inventaris', 
			'inve' 			=> $getInventaris,
			'menu'         	=> 'Inventaris'
		);
		$this->load->view('tampilan/v_combine', $data);
	}
	public function view_inventaris()
	{
		$dataInventarisParentBawang			= $this->m_report->getInventarisParentBawang();
		$getParent 							= $this->m_inventaris_bawang->getParent();
		$getChild 							= $this->m_inventaris_bawang->getChild();
		$getInventaris 						= $this->m_inventaris_bawang->getInventaris();
		$data = array(
			'dataInventarisParentBawang'		=> $dataInventarisParentBawang,
			'dataParent' 						=> $getParent ,
			'dataChild' 						=> $getChild ,
			'dataInventaris' 					=> $getInventaris,
			'content' 							=> 'owner/v_inventarisBawang.php' , 
			'title'								=> 'Lihat Inventaris Bawang', 
			'menu'         						=> 'Inventaris'
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
			'INVE_QTY' 			=> $qty ,
			'INVE_USER_ID'  	=> $_SESSION['USER_ID'],
			'INVE_TANGGAL'  	=> date('Y-m-d')
		);
		$setInventaris = $this->m_inventaris_bawang->setInventaris($data);
		redirect('c_inventaris_bawang','refresh');
	}
	public function update($id)
	{
		$parent 	= $_POST['cmbParent'];
		$child 		= $_POST['cmbChild'];
		$qty 		= $_POST['txtQty'];
		$kondisi 	= $_POST['rbtKondisi'];
		$keterangan	= $_POST['txtKeterangan'];
		$tanggal 	= $_POST['input_tanggal'];
		$data = array(
			'INVE_INCH_ID' 		=> $child , 
			'INVE_INPA_ID' 		=> $parent ,
			'INVE_KETERANGAN' 	=> $keterangan , 
			'INVE_KEADAAN' 		=> $kondisi,
			'INVE_QTY' 			=> $qty ,
			'INVE_USER_ID'  	=> $_SESSION['USER_ID'],
			'INVE_TANGGAL'  	=> $tanggal
		);
		$this->db->where('INVE_ID',$id);
		$this->db->update('inventaris', $data);
		redirect('c_report','refresh');
	}
	public function searchChild()
	{
		$str = $_GET['q'];
	    $namaChild  = $this->m_inventaris_bawang->getChildByInpaId($str);
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
	          	if (isset($_GET['EDIT'])) {
		          	if ($row['INCH_ID'] == $_GET['EDIT']) {
			            echo "<option value='".$row['INCH_ID']."' selected>";
			            echo $row ['INCH_NAME'];
			           	echo "</option>";
		          	}else{
		          		echo "<option value='".$row['INCH_ID']."'>";
			            echo $row ['INCH_NAME'];
			           	echo "</option>";
		          	}
	          	}else{
		          		echo "<option value='".$row['INCH_ID']."'>";
			            echo $row ['INCH_NAME'];
			           	echo "</option>";
		          	}
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
	    		$data 		= $this->m_inventaris_bawang->getLastStokWithoutChild($parent);
	    		if (isset($data[0]['INVE_QTY'])) {
	    			$qtyAwal 	= $data[0]['INVE_QTY'];
	    		}else{
	    			$qtyAwal 	= 0;
	    		}
				?>
					<input type="text" name="txtQty" id="txtQty" class="form-control" required value="<?php echo $qtyAwal ?>"> 
				<?php
	    	}else{
	    		$data 		= $this->m_inventaris_bawang->getLastStok($parent, $child);
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

		$cmbParentName 	= '-';
		$cmbParenttId	= '0';
		$cmbChildName 	= '-';
		$cmbChildId		= '0';
		if ($cmbParent != 0) {
			$cmbParent 	= $this->m_inventaris->getInventarisParentByInpaId($cmbParent,'BAWANG');
			$cmbParentName 	= $cmbParent[0]['INPA_NAME'];
			$cmbParentId	= $cmbParent[0]['INPA_ID'];
		}

		if ($cmbChild != 0) {
			$cmbChild 		= $this->m_inventaris->getInventarisChildByInchId($cmbChild,'BAWANG');
			$cmbChildName 	= $cmbChild[0]['INCH_NAME'];
			$cmbChildId		= $cmbChild[0]['INCH_ID'];
		}

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
		          <td><?php echo $cmbParentName ?></td>
		          <td><?php echo $cmbChildName ?></td>
		          <td><?php echo $txtQty ?></td>
		          <td><?php echo $rbtKondisi ?></td>
		          <td><?php echo $txtKeterangan ?></td>
		        </tr>
		      </table>
		    </div>
		    <div class="modal-footer">
		      <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
		      <form action="<?php echo base_url()?>c_inventaris_bawang/save" method="POST">
		        <input type="hidden" name="cmbParent" value="<?php echo $cmbParentId?>">
		        <input type="hidden" name="cmbChild" value="<?php echo $cmbChildId?>">
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

	public function modalInventarisEdit($id)
	{
		$cmbParent 		= $_GET['parent'];
		$cmbChild 		= $_GET['child'];
		$txtQty 		= $_GET['qty'];
		$rbtKondisi 	= $_GET['kondisi'];
		$txtKeterangan	= $_GET['keterangan'];
		$tanggal 		= $_GET['tanggal'];
		$cmbParentName 	= '-';
		$cmbParenttId	= '0';
		$cmbChildName 	= '-';
		$cmbChildId		= '0';
		if ($cmbParent != 0) {
			$cmbParent 	= $this->m_inventaris->getInventarisParentByInpaId($cmbParent,'BAWANG');
			$cmbParentName 	= $cmbParent[0]['INPA_NAME'];
			$cmbParentId	= $cmbParent[0]['INPA_ID'];
		}

		if ($cmbChild != 0) {
			$cmbChild 		= $this->m_inventaris->getInventarisChildByInchId($cmbChild,'BAWANG');
			$cmbChildName 	= $cmbChild[0]['INCH_NAME'];
			$cmbChildId		= $cmbChild[0]['INCH_ID'];
		}

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
		          <td><?php echo $cmbParentName ?></td>
		          <td><?php echo $cmbChildName ?></td>
		          <td><?php echo $txtQty ?></td>
		          <td><?php echo $rbtKondisi ?></td>
		          <td><?php echo $txtKeterangan ?></td>
		        </tr>
		      </table>
		    </div>
		    <div class="modal-footer">
		      <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
		      <form action="<?php echo base_url()?>c_inventaris_bawang/update/<?=$id?>" method="POST">
		        <input type="hidden" name="cmbParent" value="<?php echo $cmbParentId?>">
		        <input type="hidden" name="cmbChild" value="<?php echo $cmbChildId?>">
		        <input type="hidden" name="txtQty" value="<?php echo $txtQty?>">
		        <input type="hidden" name="rbtKondisi" value="<?php echo $rbtKondisi?>">
		        <input type="hidden" name="txtKeterangan" value="<?php echo $txtKeterangan?>">
		        <input type="hidden" name="input_tanggal" value="<?php echo $tanggal?>">
		        <input type="submit" class="btn btn-outline" value="Update">
		      </form>
		    </div>
		  </div>
		  <!-- /.modal-content -->
		<?php
	}
	public function modalChild()
	{
	    $cmbParent = $_GET['parent'];
	    $namaChild = $this->m_inventaris_bawang->getChildByInpaId($cmbParent);
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
		redirect('c_report','refresh');
	}
}
