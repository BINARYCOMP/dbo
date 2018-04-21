  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Input Inventaris</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-12 ">
                <form action="<?php echo base_url()?>c_inventaris/save" method="POST">
                  <div class="form-group">
                    <label class="control-label">Parent</label>
                    <div class="input-group">
                      <!-- /btn-group -->
                      <select class="form-control" name="cmbParent" id="cmbParent" onchange="showChild(this.value)" onclick="showChild(this.value)">
                        <option>=== Pilih Induk Inventaris ===</option>
                        <?php
                          foreach ($dataParent as $row) {
                            echo "<option value ='".$row['INPA_ID']."'> ".$row['INPA_NAME']." </option>";
                          }
                        ?>
                      </select>
                      <div class="input-group-btn">
                        <button type="button" class="btn btn-warning ">Search</button>
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                      <label class="control-label">Child</label>
                      <div class="input-group">
                        <!-- /btn-group -->
                        <span name="cmbChild" id="txtChild">
                          <select class="form-control">
                            <option>== Pilih Anak Inventaris ==</option>
                          </select> 
                        </span>
                        <div class="input-group-btn">
                          <button type="button" class="btn btn-warning">Search</button>
                        </div>
                      </div>
                  </div>

                  <div class="form-group">
                      <label class=" control-label">Qty</label>
                      <div>
                        <span id="qty">
                          <input class="form-control" type="number" id="txtQty" placeholder="Qty .." name="txtQty" required placeholder="0">  
                        </span>
                      </div>
                  </div>

                  <div class="form-group">
                    <label>Kondisi</label>
                    <div class="row">
                      <div class="col-md-2">
                        <input  type="radio" id="rbtKondisiBaik" name="rbtKondisi" value="Baik"> Baik
                      </div>
                      <div class="col-md-10">
                        <input  type="radio" id="rbtKondisiRusak" name="rbtKondisi" value="Rusak"> Rusak
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                      <label class=" control-label">Keterangan</label>
                      <div>
                        <textarea name="txtKeterangan" class="form-control" id="txtKeterangan" rows="3" placeholder="Keterangan barang.." pla></textarea>
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-10">
                        <button type="reset" class="btn btn-default pull-right">Cancel</button>
                      </div>
                      <div class="col-md-2">
                        <button type="button" class="btn btn-warning pull-right" data-toggle="modal" data-target="#modal-success2" onclick="modalInvetaris()" >Input Data</button>
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
        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Data Inventaris</h3>

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
                  <th>Nama Barang</th>
                  <th>Qty</th>
                  <th>Kondisi</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($dataParent as $row) {
                    ?>
                      <tr>
                        <td><?php echo $no ?></td>
                        <td colspan="3"><?php echo $row['INPA_NAME']?></td>
                      </tr>
                    <?php
                    $getChildbyInpaId = $this->m_inventaris->getChildJoinByInpaId($row['INPA_ID']);
                    foreach ($getChildbyInpaId as $rowChild) {
                        ?>
                          <tr>
                            <td></td>
                            <td><?php echo $rowChild['INCH_NAME'] ?></td>
                            <td><?php echo $rowChild['INCH_QTY'] ?></td>
                            <td><?php echo $rowChild['INVE_KEADAAN'] ?></td>
                            <td><?php echo $rowChild['INVE_KETERANGAN'] ?></td>
                          </tr>
                        <?php
                    }
                  $no++;
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
          <!-- /.box -->
      </div> <!-- col-input -->
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
    xhttp.open("GET", "<?php echo base_url()?>c_inventaris/searchChild?q="+str, true);
    xhttp.send();   
  }
  function showQty(str) {
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("qty").innerHTML = this.responseText;
      }
    };
    xhttp.open("GET", "<?php echo base_url()?>c_inventaris/searchQty?q="+str, true);
    xhttp.send();   
  }
   function modalInvetaris() {
    var xhttp;
    var parent,child,keterangan,masuk,qty,kondisi;
    try{
      parent      = document.getElementById('cmbParent').value;
      child       = document.getElementById('cmbChild').value;
      keterangan  = document.getElementById('txtKeterangan').value;
      qty         = document.getElementById('txtQty').value;
      if (document.getElementById('rbtKondisiBaik').checked) {
        kondisi = document.getElementById('rbtKondisiBaik').value;
      }else if (document.getElementById('rbtKondisiBuruk').checked) {
        kondisi = document.getElementById('rbtKondisiBuruk').value;
      }else{
        alert('Silahkan pilih kondisi barang');
        return;
      }
      
     
    }catch(err){
      console.trace(err.message);
    }
  }
</script>