  <div class="content">
    <div class="row">
      <?php 
        if ($_SESSION['level'] == 'ADMIN BAWANG' || $_SESSION['level'] == 'ADMIN CIMUNING' || $_SESSION['level'] == 'OWNER' || $_SESSION['level'] == 'SUPER ADMIN') {
      ?>
          <div class="col-md-12">
            <div class="box box-info">
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
                                <option>== Pilih Anak Inventaris ==</option>
                              </select> 
                            </span>
                            <div class="input-group-btn">
                              <button type="button" class="btn btn-info">Search</button>
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
                            <input  type="radio" id="rbtKondisiBuruk" name="rbtKondisi" value="Buruk"> Buruk
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
                            <button type="button" class="btn btn-info pull-right" data-toggle="modal" data-target="#modal-success" onclick="modalInventaris()" >Input Data</button>
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
      <?php 
        } 
      ?>

      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Data Inventaris</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table class="table" id="lookup">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Induk Inventaris</th>
                  <th>Anak Inventaris</th>
                  <th>Qty</th>
                  <th>Kondisi</th>
                  <th>Keterangan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($dataInventaris as $row) {
                    ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $row['INPA_NAME']?></td>
                        <td><?php echo $row['INCH_NAME']?></td>
                        <td><?php echo $row['INCH_QTY']?></td>
                        <td><?php echo $row['INVE_KEADAAN']?></td>
                        <td><?php echo $row['INVE_KETERANGAN']?></td>
                      </tr>
                    <?php
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

<div class="modal modal-success fade" id="modal-success">
  <div class="modal-dialog" id="modalInventaris"> 


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
   function modalInventaris() {
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
        alert('Silahkan pilih kondisi barang');
        return;
      }

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("modalInventaris").innerHTML = this.responseText;
      }
    };

    xhttp.open("GET","<?php echo base_url()?>c_inventaris/modalInventaris?parent="+parent+"&child="+child+"&keterangan="+keterangan+"&qty="+qty+"&kondisi="+kondisi,true);
    xhttp.send()
      
     
    // }catch(err){
    //   console.trace(err.message);
    // }
  }
</script>

<!-- modal -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width:800px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Lookup Inventaris</h4>
            </div>
            <div class="modal-body">
                <table id="lookup" class="table table-bordered table-hover table-striped">
                    <thead>
                      <tr>
                        <th>Id Barang</th>
                        <th>Nama Barang</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $no = 1;
                      foreach ($dataParent as $row) {
                        ?>
                          <tr class="isi" data-brgParent="<?php echo $row['INPA_ID']; ?>">
                            <!-- <td><?php echo $no ?></td> -->
                            <td><?php echo $row['INPA_ID']?></td>
                            <td><?php echo $row['INPA_NAME']?></td>
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
</script>