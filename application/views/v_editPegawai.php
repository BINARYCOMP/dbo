<!-- Main content -->
<div class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Data Pegawai</h3>

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
                        <input class="form-control" type="text"  required="true" name="iName" value="<?php echo($pegawai[0]['PEGA_NAME'])?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class=" control-label">Email</label>
                    <div>
                        <input class="form-control" type="text"  required="true" name="iEmail" value="<?php echo($pegawai[0]['PEGA_EMAIL'])?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class=" control-label">Alamat</label>
                    <div>
                        <textarea class="form-control" type="text"  required="true" name="iAlamat"><?php echo($pegawai[0]['PEGA_ALAMAT'])?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class=" control-label">No Telepon</label>
                    <div>
                        <input class="form-control" type="number"  required="true" name="iNoTelpon" value="<?php echo($pegawai[0]['PEGA_NO_TLP'])?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class=" control-label">Jenis Kelamin</label>
                      <div>
                        <?php
                          if ($pegawai[0]['PEGA_JENKEL'] == "L") {
                          ?>
                            <input type="radio" name="iJenisKelamin" checked="true" value="L" > Laki-Laki
                            <input  type="radio" name="iJenisKelamin" value="P"> Perempuan
                          <?php
                          }
                          elseif ($pegawai[0]['PEGA_JENKEL'] == "P") {
                          ?>
                            <input type="radio" name="iJenisKelamin" value="L"> Laki-Laki
                            <input  type="radio" name="iJenisKelamin" checked="true" value="P"> Perempuan
                          <?php
                           } 
                          else{
                          ?>
                            <input type="radio" name="iJenisKelamin" value="L"> Laki-Laki
                            <input  type="radio" name="iJenisKelamin" value="P"> Perempuan
                          <?php
                          }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class=" control-label">Agama</label>
                    <div>
                        <!-- /btn-group -->
                        <select name="iAgamaId" class="form-control">
                          <option value="0">== Pilih Agama ==</option>
                          <?php  
                            foreach ($agamaId as $row){
                              if ($row['AGAM_ID'] == $pegawai[0]['PEGA_AGAM_ID']){
                                ?>
                                <option value="<?php echo $row['AGAM_ID'] ?>" selected><?php echo $row['AGAM_NAME']?></option>
                                <?php
                              } else {                               
                                ?>
                                <option value="<?php echo $row['AGAM_ID'] ?>" ><?php echo $row['AGAM_NAME']?></option>
                                <?php
                              }
                              
                            }
                          ?>
                        </select> 
                    </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-10">
                      <button type="reset" class="btn btn-default pull-right">Cancel</button>
                    </div>
                    <div class="col-md-2">
                      <button type="submit" class="btn btn-info pull-right" data-toggle="modal" data-target="#modal-success2" onclick="modalKonfirmasiTakJadi()">Input Data</button>
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
<!-- /.content -->