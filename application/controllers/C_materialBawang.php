<?php
/**
 *
 */
class C_materialBawang extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('m_materialBawang');
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

      $namaParent       = $this->m_materialBawang->getParentName();
      $datamaterial     = $this->m_materialBawang->getDataGudang();
      $dataRuangan      = $this->m_materialBawang->getRuangan();
      $data = array(
        'dataParent'      => $namaParent,
        'datamaterial'    => $datamaterial,
        'dataRuangan'     => $dataRuangan,
        'message'         => $message,
        'content'         => 'v_materialBawang',
        'title'           => 'Input Material Bawang',
        'menu'            => 'Input Material'
      );
      $this->load->view('tampilan/v_combine',$data);
  }
  public function inputStok()
  {
    $parent     = $_POST['cmbParent'];
    $child      = $_POST['cmbChild'];
    $uraian     = $_POST['txtUraian'];
    $cmbRuangan     = $_POST['cmbRuangan'];
    $masuk      = $_POST['txtMasuk'];
    $keluar     = $_POST['txtKeluar'];
    $saldoAkhir = $_POST['txtSaldoAwal'] + $masuk - $keluar;
    $data = array(
      'MABA_KELUAR'   => $keluar ,
      'MABA_URAIAN'   => $uraian ,
      'MABA_MASUK'    => $masuk ,
      'MABA_MPBA_ID'  => $parent ,
      'MABA_RUAN_ID'  => $cmbRuangan,
      'MABA_MCBA_ID'  => $child ,
      'MABA_SALDO'    => $saldoAkhir
    );
    $simpanBarang = $this->m_materialBawang->simpanBarang($data, $saldoAkhir, $child);
    echo "<script> window.location='".base_url()."C_materialBawang' </script>";
  }
    public function delete($id)
  {
    $this->db->delete('material_bawang', array('MABA_ID' => $id));
    redirect('C_materialBawang');
  }

  // nama child
  public function searchChild()
  {
    $str = $_GET['q'];
    $namaChild  = $this->m_materialBawang->getChildName($str);
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
            echo "<option value='".$row['MCBA_ID']."'>";
            echo $row ['MCBA_NAME'];
           echo "</option>";
          }
        ?>
      </select>
    <?php
  }

  // cari stok
  public function searchStok()
  {
    ?>
    <script type="text/javascript">alert("masuk");</script>
    <?php
    $mpbaId = $_GET['mpbaId'];
    $mcbaId = $_GET['mcbaId'];
    $stokAwal = $this->m_materialBawang->getFirstStock($mcbaId,$mpbaId);

    if ($mpbaId == 0 || $mcbaId == 0 ) {
      ?>
        <input type="text"  class="form-control" name="txtSaldoAwal" id="saldoAwal" required readonly placeholder="0" value="0"> 
      <?php
    }else{
      if (isset($stokAwal[0]['MABA_SALDO'])) {
        ?>
          <input type="text" class="form-control"  name="txtSaldoAwal" id="saldoAwal" required readonly value="<?php echo $stokAwal[0]['MABA_SALDO'] ?>"> 
        <?php
      }else{
        ?>
          <input type="text" class="form-control"  name="txtSaldoAwal" id="saldoAwal" required readonly value="<?php echo '0' ?>"> 
        <?php
      }
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
    $cmbRuangan    = $_GET['ruangan'];
    $saldoAkhir    = $txtSaldoAwal + intval($txtMasuk) - intval($txtKeluar);

    $namaParentDariModel      = $this->m_materialBawang->getParentBympbaId($cmbParent);
    $namaChildDariModel       = $this->m_materialBawang->getChildBymcbaId($cmbChild);
    $namaRuanganDariModel     = $this->m_materialBawang->getRuanganByRuanId($cmbRuangan);

    $namaParentUntukDitampilkan = 0;
    $namaChildUntukDitampilkan = 0;
    $nomorGudangUntukDitampilkan  = 0;

      if (!empty($namaParentDariModel[0]['MPBA_NAME'])) {
      $namaParentUntukDitampilkan      = $namaParentDariModel[0]['MPBA_NAME'];
    }
      if (!empty($namaChildDariModel[0]['MCBA_NAME'])) {
      $namaChildUntukDitampilkan       = $namaChildDariModel[0]['MCBA_NAME'] ;
    } 
      if (!empty($namaRuanganDariModel[0]['RUAN_NUMBER'])) {
      $nomorGudangUntukDitampilkan     = $namaRuanganDariModel[0]['RUAN_NUMBER'];
    }
    ?>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Input Material Setengah Jadi</h4>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tr>
              <th>Induk Material</th>
              <th>Anak Material</th>
              <th>Ruangan</th>
              <th>Material Masuk</th>
              <th>Material Keluar</th>
              <th>Saldo Akhir</th>
            </tr>
            <tr>
              <td><?php echo $namaParentUntukDitampilkan  ?></td>
              <td><?php echo $namaChildUntukDitampilkan ?></td>
              <td><?php echo $nomorGudangUntukDitampilkan ?></td>
              <td><?php echo intval($txtMasuk) ?></td>
              <td><?php echo intval($txtKeluar) ?></td>
              <td><?php echo $saldoAkhir ?> </td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
          <form action="<?php echo base_url()?>C_materialBawang/inputStok" method="POST">
            <input type="hidden" name="cmbParent" value="<?php echo $cmbParent?>">
            <input type="hidden" name="cmbChild" value="<?php echo $cmbChild?>">
            <input type="hidden" name="txtMasuk" value="<?php echo $txtMasuk?>">
            <input type="hidden" name="txtKeluar" value="<?php echo $txtKeluar?>">
            <input type="hidden" name="txtUraian" value="<?php echo $txtUraian?>">
            <input type="hidden" name="cmbRuangan" value="<?php echo $cmbRuangan?>">
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
    $namaChild = $this->m_materialBawang->getChildBympbaId($cmbParent);
    if (is_array($namaChild) || is_object($namaChild)){
      $no=1;
      foreach ($namaChild as $row) {
        ?>
          <tr style="cursor: pointer;" class="isi2" data-brgChild="<?php echo $row['MCBA_ID']; ?>">
            <td> <?php echo $no ?> </td>
            <td> <?php echo $row['MCBA_NAME']?> </td>
            <td> <?php echo $row['SATU_NAME']?> </td>
          </tr>
        <?php
        $no++;
      }
    }
  } 
}
