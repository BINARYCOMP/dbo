<?php
/**
 *
 */
class C_gudangTakJadi extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_gudangTakJadi');
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

      $namaParent           = $this->m_gudangTakJadi->getParentName();
      $dataGudangTakJadi    = $this->m_gudangTakJadi->getDataGudang();
      $namaKategori         = $this->m_gudangJadi->getKategoriName();
      $data = array(
        'namaKategori'      => $namaKategori,
        'namaParent'        => $namaParent,
        'dataGudangTakJadi' => $dataGudangTakJadi,
        'content'           => 'v_gudangTakJadi',
        'message'           => $message,
      );
      $this->load->view('tampilan/v_combine',$data);
  }
  public function inputStok()
  {
    $parent     = $_POST['cmbParent'];
    $child      = $_POST['cmbChildTakJadi'];
    $kategori   = $_POST['cmbKategori'];
    $uraian     = $_POST['txtUraian'];
    $masuk      = $_POST['txtMasuk'];
    $keluar     = $_POST['txtKeluar'];
    $saldoAkhir = $_POST['txtSaldoAwalTakJadi'] + $masuk - $keluar;
    $data = array(
      'GUTA_KATE_ID'  => $kategori,
      'GUTA_KELUAR'   => $keluar ,
      'GUTA_URAIAN'   => $uraian ,
      'GUTA_MASUK'    => $masuk ,
      'GUTA_BAPA_ID'  => $parent ,
      'GUTA_BACH_ID'  => $child ,
      'GUTA_SALDO'    => $saldoAkhir
    );
    $simpanBarang = $this->m_gudangTakJadi->simpanBarang($data, $saldoAkhir, $child);
    echo "<script> window.location='".base_url()."c_stok?message=1' </script>";
  }

  // nama child
  public function searchChild()
  {
    $str = $_GET['q'];
    $namaChild  = $this->m_gudangTakJadi->getChildName($str);
    ?>
      <select name="cmbChildTakJadi" id="cmbChildTakJadi" onchange="showStokTakJadi(this.value);"  onmousemove ="showStokTakJadi(this.value);" class="form-control">
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

  // cari stok
  public function searchStok()
  {
    $str = $_GET['q'];
    $stokAwal = $this->m_gudangTakJadi->getFirstStock($str);
     if ($str == 0) {
      ?>
        <input type="text" name="txtSaldoAwalTakJadi" id="saldoAwalTakJadi" required readonly placeholder="0" class="form-control"> 
      <?php
    }else{
      ?>
        <input type="text" name="txtSaldoAwalTakJadi" id="saldoAwalTakJadi" required readonly value="<?php echo $stokAwal[0]['BACH_GUTA_TOTAL'] ?>" class="form-control"> 
      <?php
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
              <th>Kategori</th>
              <th>Barang Masuk</th>
              <th>Barang Keluar</th>
              <th>Saldo Akhir</th>
            </tr>
            <tr>
              <td><?php echo $cmbParent ?></td>
              <td><?php echo $cmbChild ?></td>
              <td><?php echo $cmbKategori ?></td>
              <td><?php echo $txtMasuk ?></td>
              <td><?php echo $txtKeluar ?></td>
              <td><?php echo $saldoAkhir ?> </td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
          <form action="<?php echo base_url()?>c_gudangTakJadi/inputStok" method="POST">
            <input type="hidden" name="cmbParent" value="<?php echo $cmbParent?>">
            <input type="hidden" name="cmbChildTakJadi" value="<?php echo $cmbChild?>">
            <input type="hidden" name="cmbKategori" value="<?php echo $cmbKategori?>">
            <input type="hidden" name="txtMasuk" value="<?php echo $txtMasuk?>">
            <input type="hidden" name="txtKeluar" value="<?php echo $txtKeluar?>">
            <input type="hidden" name="txtUraian" value="<?php echo $txtUraian?>">
            <input type="hidden" name="txtSaldoAwalTakJadi" value="<?php echo $txtSaldoAwal?>">
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
     $namaChild = $this->m_gudangTakJadi->getChildByBapaId($cmbParent);
     $data = array(
      'cmbParent' => $cmbParent ,
      'namaChild' => $namaChild 
    );
     $this->load->view('modal/v_modalChildGudangTakJadi', $data);
  } 

}
