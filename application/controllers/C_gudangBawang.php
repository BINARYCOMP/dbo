<?php
/**
 * 
 */
class C_gudangBawang extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_gudangBawang');
    $this->load->model('m_report');
	}

	public function index()
	{
	if (isset($_GET['message'])) {
      $message = $_GET['message'];
      if ($message == 1) {
        $message = "Data Berhasil Disimpan";
      }else{
        $message = "Data Gagal Disimpan";
      }
    }else{
      $message ="";
    }

    $dataBarangParent   = $this->m_report->getBarangParent();
    $namaParent         = $this->m_gudangBawang->getParentName();
		$namaKategori     	= $this->m_gudangBawang->getKategoriName();
		$dataGudangBawang   = $this->m_gudangBawang->getDataGudang();
		$dataRuangan      	= $this->m_gudangBawang->getRuangan();
		$data = array(
      'dataBarangParent'          => $dataBarangParent,
      'namaKategori'      => $namaKategori,
			'namaParent'      	=> $namaParent,
			'dataGudangBawang'  => $dataGudangBawang,
			'dataRuangan'		=> $dataRuangan,
			'content'         	=> 'v_gudangBawang',
			'message'         	=> $message,
			'title'             => 'Input Gudang Bawang',
		);
		$this->load->view('tampilan/v_combine',$data);
	}

  public function view_barang_jadi()
  {
    $dataBarangParent   = $this->m_report->getBarangParent();
    $namaParent         = $this->m_gudangBawang->getParentName();
    $namaKategori       = $this->m_gudangBawang->getKategoriName();
    $dataGudangBawang   = $this->m_gudangBawang->getDataGudang();
    $dataRuangan        = $this->m_gudangBawang->getRuangan();
    $data = array(
      'dataBarangParent'          => $dataBarangParent,
      'namaKategori'      => $namaKategori,
      'namaParent'        => $namaParent,
      'dataGudangBawang'  => $dataGudangBawang,
      'dataRuangan'   => $dataRuangan,
      'content'           => 'owner/v_gudangBawang',
      'title'             => 'Lihat Gudang Bawang',
    );
    $this->load->view('tampilan/v_combine',$data);
  }

	public function inputStok()
  {
    $parent     = $_POST['cmbParent'];
    $child      = $_POST['cmbChild'];
    $kategori   = $_POST['cmbKategori'];
    $uraian     = $_POST['txtUraian'];
    $masuk      = $_POST['txtMasuk'];
    $keluar     = $_POST['txtKeluar'];
    $cmbRuangan = $_POST['cmbRuangan'];
    $saldoAkhir = $_POST['txtSaldoAwal'] + $masuk - $keluar;
    $data = array(
      'GUBA_KATE_ID'  => $kategori,
      'GUBA_KELUAR'   => $keluar ,
      'GUBA_URAIAN'   => $uraian ,
      'GUBA_MASUK'    => $masuk ,
      'GUBA_BAPA_ID'  => $parent ,
      'GUBA_BACH_ID'  => $child ,
      'GUBA_SALDO'    => $saldoAkhir,
      'GUBA_RUAN_ID'  => $cmbRuangan,
      'GUBA_USER_ID'  => $_SESSION['USER_ID']
    );
    $simpanBarang = $this->m_gudangBawang->simpanBarang($data, $saldoAkhir, $child);
    echo "<script> window.location='".base_url()."c_gudangBawang?message=1' </script>";
  }

  // nama child
  public function searchChild()
  {
    $str = $_GET['q'];
    $namaChild  = $this->m_gudangBawang->getChildName($str);
    ?>
      <select required name="cmbChild" id="cmbChild" onchange="showStok();" onmousemove ="showStok();" class="form-control">
        <?php
          if ($str == 0) {
            ?>
              <option value='0' selected>== Pilih Anak Barang ==</option>
            <?php
          }else{
            ?>
              <option value='0'>== Pilih Anak Barang ==</option>
            <?php
          }
          foreach ($namaChild as $row){
            echo "<option value='".$row['BACH_ID']."'>";
            echo $row ['BACH_NAME'];
           echo "</option>";
          }
        ?>
      </select>
    <?php
  }

  public function delete($id)
  {
    $this->db->delete('gudang_bawang', array('GUBA_ID' => $id));
    redirect('C_managerial/gudang_bawang','refresh');
  }

  // cari stok
  public function searchStok()
  {
    $bapa_id = $_GET['bapaId'];
    $bach_id = $_GET['bachId'];
    $kate_id = $_GET['kateId'];
    $ruan_id = $_GET['ruanId'];

    if ($kate_id != 0) {
      if ($ruan_id != 0) {
        $stokAwal = $this->m_gudangBawang->getFirstStock($bach_id,$bapa_id,$kate_id,$ruan_id);
      }else{
        $stokAwal = $this->m_gudangBawang->getFirstStockWithoutRuangan($bach_id,$bapa_id,$kate_id);
      }
    }else{
      if ($ruan_id != 0) {
        $stokAwal = $this->m_gudangBawang->getFirstStockWithoutKategori($bach_id,$bapa_id,$ruan_id);
      }else{
        $stokAwal = $this->m_gudangBawang->getFirstStockWithoutKategoriAndRuangan($bach_id,$bapa_id,$ruan_id);
      }
    }

    if ($bapa_id == 0 || $bach_id == 0) {
      ?>
        <input type="text"  class="form-control" name="txtSaldoAwal" id="saldoAwal" required readonly value="0"> 
      <?php
    }else{
      if (empty($stokAwal[0]['GUBA_SALDO'])) {
        ?>
          <input type="text"  class="form-control" name="txtSaldoAwal" id="saldoAwal" required readonly value="0"> 
        <?php
      }else{
        ?>
          <input type="text" class="form-control"  name="txtSaldoAwal" id="saldoAwal" required readonly value="<?php echo $stokAwal[0]['GUBA_SALDO']?>">
        <?php
      }
    }
  }
  public function modalKonfirmasi()
  {
    $cmbParent     = $_GET['parent'];
    $cmbChild      = $_GET['child'];
    $cmbKategori   = $_GET['kategori'];
    $txtUraian     = $_GET['keterangan'];
    $txtMasuk      = $_GET['masuk'];
    $txtKeluar     = $_GET['keluar'];
    $txtSaldoAwal  = $_GET['awal'];
    $cmbRuangan    = $_GET['ruangan'];
    $saldoAkhir    = $txtSaldoAwal + $txtMasuk - $txtKeluar;

    $namaParentDariModel      = $this->m_gudangBawang->getParentByBapaId($cmbParent);
    $namaChildDariModel       = $this->m_gudangBawang->getChildByBachId($cmbChild);
    $namaKategoriDariModel    = $this->m_gudangBawang->getKategoriByKateId($cmbKategori);
    $namaRuanganDariModel     = $this->m_gudangBawang->getRuanganByRuanId($cmbRuangan);

    $namaParentUntukDitampilkan      = $namaParentDariModel[0]['BAPA_NAME'];
    $namaChildUntukDitampilkan       = $namaChildDariModel[0]['BACH_NAME'];
    $namaKategoriUntukDitampilkan    = $namaKategoriDariModel[0]['KATE_NAME'] = 0; 
    $nomorGudangUntukDitampilkan     = $namaRuanganDariModel[0]['RUAN_NUMBER'] = 0; 


    ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Konfirmasi Barang</h4>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tr>
              <th>Induk Barang</th>
              <th>Anak Barang</th>
              <th>Kategori</th>
              <th>Ruangan</th>
              <th>Barang Masuk</th>
              <th>Barang Keluar</th>
              <th>Saldo Akhir</th>
            </tr>
            <tr>
              <td><?php echo $namaParentUntukDitampilkan ?></td>
              <td><?php echo $namaChildUntukDitampilkan?></td>
              <td><?php echo $namaKategoriUntukDitampilkan ?></td>
              <td><?php echo $nomorGudangUntukDitampilkan ?></td>
              <td><?php echo $txtMasuk ?></td>
              <td><?php echo $txtKeluar ?></td>
              <td><?php echo $saldoAkhir ?> </td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
          <form action="<?php echo base_url()?>c_gudangBawang/inputStok" method="POST">
            <input type="hidden" name="cmbParent" value="<?php echo $cmbParent?>">
            <input type="hidden" name="cmbChild" value="<?php echo $cmbChild?>">
            <input type="hidden" name="cmbKategori" value="<?php echo $cmbKategori?>">
            <input type="hidden" name="txtMasuk" value="<?php echo $txtMasuk?>">
            <input type="hidden" name="txtKeluar" value="<?php echo $txtKeluar?>">
            <input type="hidden" name="txtUraian" value="<?php echo $txtUraian?>">
            <input type="hidden" name="txtSaldoAwal" value="<?php echo $txtSaldoAwal?>">
            <input type="hidden" name="cmbRuangan" value="<?php echo $cmbRuangan?>">
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
     $namaChild = $this->m_gudangBawang->getChildByBapaId($cmbParent);
     $data = array(
      'cmbParent' => $cmbParent ,
      'namaChild' => $namaChild 
    );
     ?>
    <!-- modal child -->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Lookup Barang Child</h4>
        </div>
        <div class="modal-body">
            <table id="gubaChild" class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no=1;
                    foreach ($namaChild as $row) {
                      ?>
                        <tr class="isi2" data-brgChild="<?php echo $row['BACH_ID']; ?>">
                          <td> <?php echo $no ?> </td>
                          <td> <?php echo $row['BACH_NAME']?> </td>
                          <td> <?php echo $row['SATU_NAME']?> </td>
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
}
