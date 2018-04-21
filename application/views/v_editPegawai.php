<div class="content-wrapper">
  <div class="row">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          <?php if(isset($title)) echo $title ?>
          <small><i class="fa fa-info"></i></small>
          <small><?php echo $_SESSION['level'] ?></small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Data Pegawai <h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 ">
                  <form action="<?php echo base_url ()?>c_pegawai/UpdateData/<?php  echo $pegawai[0]['PEGA_ID'] ?>" method="post">
                    <div class="form-group">
                        <label class=" control-label">Nama Pegawai</label>
                        <div>
                            <input class="form-control" type="text"  required="true" name="pegawai1" value="<?php echo($pegawai[0]['PEGA_NAME'])?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" control-label">Email</label>
                        <div>
                            <input class="form-control" type="text"  required="true" name="pegawai2" value="<?php echo($pegawai[0]['PEGA_EMAIL'])?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" control-label">Alamat</label>
                        <div>
                            <textarea class="form-control" type="text"  required="true" name="pegawai3"><?php echo($pegawai[0]['PEGA_ALAMAT'])?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" control-label">No Telepon</label>
                        <div>
                            <input class="form-control" type="number"  required="true" name="pegawai4" value="<?php echo($pegawai[0]['PEGA_NO_TLP'])?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" control-label">Jenis Kelamin</label>
                          <div>
                            <?php
                              if ($pegawai[0]['PEGA_JENKEL'] == "L") {
                              ?>
                                <input type="radio" name="pegawai5" checked="true" > Laki-Laki
                                <input  type="radio" name="pegawai5"> Perempuan
                              <?php
                              }
                              elseif ($pegawai[0]['PEGA_JENKEL'] == "P") {
                              ?>
                                <input type="radio" name="pegawai5"> Laki-Laki
                                <input  type="radio" name="pegawai5" checked="true"> Perempuan
                              <?php
                               } 
                              else{
                              ?>
                                <input type="radio" name="pegawai5"> Laki-Laki
                                <input  type="radio" name="pegawai5"> Perempuan
                              <?php
                              }
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" control-label">Id Agama</label>
                        <div>
                            <input class="form-control" type="text"  required="true" name="pegawai6" value="<?php echo($pegawai[0]['PEGA_AGAM_ID'])?>">
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-10">
                          <button type="reset" class="btn btn-default pull-right">Cancel</button>
                        </div>
                        <div class="col-md-2">
                          <button type="submit" class="btn btn-warning pull-right" data-toggle="modal" data-target="#modal-success2" onclick="modalKonfirmasiTakJadi()">Input Data</button>
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
        <div class="col-md-6">
          
            <!-- /.box -->
        </div> <!-- col-input -->
      </div>
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.row -->
</div>