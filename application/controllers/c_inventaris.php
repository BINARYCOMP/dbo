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
	      <select required name="cmbChild" onchange="showQty(this.value)" onmousemove="showQty(this.value)">
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
	        <input type="text" name="txtQty" id="qtyAwal" required readonly placeholder="0"> 
	      <?php
	    }else{
	    	$qtyAwal 	= $data[0]['INCH_QTY'];
	      ?>
	        <input type="text" name="txtQty" id="qtyAwal" required readonly value="<?php echo $qtyAwal ?>"> 
	      <?php
	    }
	}
}