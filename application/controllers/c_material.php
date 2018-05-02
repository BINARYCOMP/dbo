<?php
/**
 *
 */
class C_material extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_material');
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

      $namaParent       = $this->m_material->getParentName();
      $datamaterial     = $this->m_material->getDataGudang();
      $namaKategori     = $this->m_material->getKategoriName();
      $data = array(
        'dataKategori'    => $namaKategori,
        'dataParent'      => $namaParent,
        'datamaterial'    => $datamaterial,
        'message'         => $message,
        'content'         => 'v_material',
        'title'           => 'Input Material',
        'menu'            => 'Input Material'
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
    $saldoAkhir = $_POST['txtSaldoAwal'] + $masuk - $keluar;
    $data = array(
      'GUJA_KATE_ID'  => $kategori,
      'GUJA_KELUAR'   => $keluar ,
      'GUJA_URAIAN'   => $uraian ,
      'GUJA_MASUK'    => $masuk ,
      'GUJA_BAPA_ID'  => $parent ,
      'GUJA_BACH_ID'  => $child ,
      'GUJA_SALDO'    => $saldoAkhir
    );
    $simpanMaterial = $this->m_material->simpanMaterial($data, $saldoAkhir, $child);
    echo "<script> window.location='".base_url()."c_stok?message=1' </script>";
  }

  // nama child
  public function searchChild()
  {
    $str = $_GET['q'];
    $namaChild  = $this->m_material->getChildName($str);
    ?>
      <select required name="cmbChild" id="cmbChild" onchange="showStok();" onmousemove ="showStok();" class="form-control">
        <?php
          if ($str == 0) {
            ?>
              <option value='0' selected>== Pilih Anak Material ==</option>
            <?php
          }else{
            ?>
              <option value='0'>== Pilih Anak Material ==</option>
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
    $bapa_id = $_GET['bapaId'];
    $bach_id = $_GET['bachId'];
    $kate_id = $_GET['kateId'];
    $stokAwal = $this->m_material->getFirstStock($bapa_id,$bach_id,$kate_id);
    if ($bapa_id == 0 || $bach_id == 0 || $kate_id == 0) {
      ?>
        <input type="text"  class="form-control" name="txtSaldoAwal" id="saldoAwal" required readonly placeholder="0"> 
      <?php
    }else{
      ?>
        <input type="text" class="form-control"  name="txtSaldoAwal" id="saldoAwal" required readonly value="<?php echo $stokAwal[0]['GUJA_SALDO'] ?>"> 
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
          <h4 class="modal-title">Input Material Setengah Jadi</h4>
        </div>
        <div class="modal-body">
          <table class="table">
            <tr>
              <th>Induk Material</th>
              <th>Anak Material</th>
              <th>Kategori</th>
              <th>Material Masuk</th>
              <th>Material Keluar</th>
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
          <form action="<?php echo base_url()?>c_material/inputStok" method="POST">
            <input type="hidden" name="cmbParent" value="<?php echo $cmbParent?>">
            <input type="hidden" name="cmbChild" value="<?php echo $cmbChild?>">
            <input type="hidden" name="cmbKategori" value="<?php echo $cmbKategori?>">
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

  public function modalChild()
   {
     $cmbParent = $_GET['parent'];
     $namaChild = $this->m_material->getChildByBapaId($cmbParent);
     $data = array(
      'cmbParent' => $cmbParent ,
      'namaChild' => $namaChild 
    );
     $this->load->view('modal/v_modalChildmaterial', $data);
  } 
}