  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Input Material</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12 ">
                <form action="<?php echo base_url()?>c_Material/save" method="POST">
                  <div class="form-group">
                    <label class="control-label">Parent</label>
                    <div class="input-group">
                      <!-- /btn-group -->
                      <select class="form-control" name="cmbParent" id="cmbParent" onchange="showChild(this.value)">
                        <option>=== Pilih Induk Material ===</option>
                        <?php
                          foreach ($dataParent as $row) {
                            echo "<option value ='".$row['BAPA_ID']."'> ".$row['BAPA_NAME']." </option>";
                          }
                        ?>
                      </select>
                      <div class="input-group-btn">
                        <button type="button" class="btn btn-info " data-toggle="modal" data-target="#myModal">Search</button>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                      <label class="control-label">Child</label>
                      <div class="input-group">
                        <!-- /btn-group -->
                        <span name="cmbChild" id="txtChild">
                          <select class="form-control">
                            <option>== Pilih Anak Material ==</option>
                          </select> 
                        </span>
                        <div class="input-group-btn">
                          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal" onclick="modalChildJadi()" >Search</button>
                        </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class=" control-label">Masuk</label>
                      <div>
                          <input class="form-control" type="number" id="masuk" onkeyup ="showSaldo(this.value)" placeholder="Material Masuk" name="txtMasuk" required >  
                      </div>
                  </div>

                  <div class="form-group">
                      <label class=" control-label">Keluar</label>
                      <div>
                          <input class="form-control" type="number" id="keluar" onkeyup ="showSaldo(this.value)" placeholder="Material Masuk" name="txtMasuk" required >  
                      </div>
                  </div>


                  <div class="form-group">
                      <label class=" control-label">Keterangan</label>
                      <div>
                        <textarea name="txtKeterangan" class="form-control" id="txtKeterangan" rows="3" placeholder="Keterangan Material.." pla></textarea>
                      </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-md-6">
                        <label class=" control-label">Saldo Awal</label>
                        <div id="stok">
                            <input class="form-control" type="number" id="saldoAwal" placeholder="Saldo Awal" name="txtMasuk" required >  
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <label class=" control-label">Saldo Akhir</label>
                        <div>
                            <input class="form-control" type="number" id="saldoAkhir" placeholder="Saldo Akhir" name="txtMasuk" required >  
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-10">
                        <button type="reset" class="btn btn-default pull-right">Cancel</button>
                      </div>
                      <div class="col-md-2">
                        <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#modal-success" onclick="modalMaterial()" >Input Data</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
        </div>
          <!-- /.box -->
      </div> <!-- col-input -->
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Data Material</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table" id="example1">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Material</th>
                  <th>Qty</th>
                  <th>Kondisi</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                      <tr>
                        <td></td>
                        <td colspan="3"></td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
              </tbody>
            </table>
          </div>
        </div>
          <!-- /.box -->
      </div> <!-- col-input -->
    </div>
  </div>

<div class="modal fade" id="modal">
  <div class="modal-dialog"> 
    <!-- modal child -->
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="myModalLabel">Lookup Barang Child</h4>
          </div>
          <div class="modal-body">
              <table id="gujaChild" class="table table-bordered table-hover table-striped">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Nama Barang</th>
                      <th>Total Barang</th>
                      <th>Satuan</th>
                    </tr>
                  </thead>
                  <tbody id="modalChild">
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                  </tbody>
              </table>  
          </div>
      </div>
  </div>
</div>



<!-- SCRIPT -->
<!-- javascript child -->
<script>
  function showChild(str) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtChild").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "<?php echo base_url()?>c_Material/searchChild?q="+str, true);
    xhttp.send();   
  }
  function showStok() {
    var xhttp;
    var mcbaId = document.getElementById('cmbChild').value;
    var mpbaId = document.getElementById('cmbParent').value;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("stok").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "<?php echo base_url()?>c_Material/searchStok?mpbaId="+mpbaId+"&mcbaId="+mcbaId, true);
    xhttp.send();   
  }
   function modalMaterial() {
    var xhttp;
    var parent,child,keterangan,qty,kondisi;
    // try{
      parent      = document.getElementById('cmbParent').value;
      child       = document.getElementById('cmbChild').value;
      keterangan  = document.getElementById('txtKeterangan').value;
      qty         = document.getElementById('txtQty').value;

      if (document.getElementById('rbtKondisiBaik').checked) {
        kondisi = document.getElementById('rbtKondisiBaik').value;
      }else if (document.getElementById('rbtKondisiBuruk').checked) {
        kondisi = document.getElementById('rbtKondisiBuruk').value;
      }else{
        alert('Silahkan pilih kondisi Material');
        return;
      }

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("modalMaterial").innerHTML = this.responseText;
      }
    };

    xhttp.open("GET","<?php echo base_url()?>c_Material/modalMaterial?parent="+parent+"&child="+child+"&keterangan="+keterangan+"&qty="+qty+"&kondisi="+kondisi,true);
    xhttp.send()
      
     
    // }catch(err){
    //   console.trace(err.message);
    // }
  }
</script>

<!-- javascript saldo Akhir -->
<script type="text/javascript">
  function showSaldo(){
    var saldoAwal = parseInt(document.getElementById("saldoAwal").value);
    var brgKeluar = parseInt(document.getElementById("keluar").value);
    var brgMasuk  = parseInt(document.getElementById("masuk").value);
    if (isNaN(parseInt(brgKeluar))) {
      brgKeluar = 0;
    }
    if (isNaN(parseInt(brgMasuk))) {
      brgMasuk = 0;
    }
    var saldoAkhir;
    saldoAkhir = saldoAwal + brgMasuk - brgKeluar;

    document.getElementById("saldoAkhir").value = saldoAkhir;
  }
</script>

<!-- modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:800px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Lookup Material</h4>
            </div>
            <div class="modal-body">
                <table id="lookup" class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th>Id Material</th>
                        <th>Nama Material</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      foreach ($dataParent as $row) {
                        ?>
                          <tr class="isi" data-brgParent="<?php echo $row['BAPA_ID']; ?>">
                            <!-- <td><?php echo $no ?></td> -->
                            <td><?php echo $row['BAPA_ID']?></td>
                            <td><?php echo $row['BAPA_NAME']?></td>
                          </tr>
                        <?php
                        $no++;
                      }
                      ?>
                    </tbody>
                </table>  
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

//            jika dipilih, kode obat akan masuk ke input dan modal di tutup
    $(document).on('click', '.isi', function (e) {
        // alert("test");
        document.getElementById("cmbParent").value = $(this).attr('data-brgParent');
        $('#myModal').modal('hide');
        showChild($(this).attr('data-brgParent'));
    });

    $(function () {
        $("#lookup").dataTable();
        $("#gujaChild").dataTable();
    });

    //child jadi
    function modalChildJadi() {
      var xhttp;
      var parent;
      parent    = document.getElementById('cmbParent').value;

      xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("modalChild").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "<?php echo base_url()?>c_material/modalChild?parent="+parent, true);
      xhttp.send();
    }
</script>