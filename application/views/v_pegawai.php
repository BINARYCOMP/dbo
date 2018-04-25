<!-- Main content -->
<div class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Input pegawai</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12 ">
              <form action="<?php echo base_url(). 'c_pegawai/form'; ?>" method="POST">
                <div class="form-group">
                    <label class=" control-label">Nama</label>
                    <div>
                      <input class="form-control" type="text" placeholder="Masukkan Nama" name="pegawai1" required placeholder="0"> 
                    </div>
                    </div>  
                <div class="form-group">
                    <label class=" control-label">Email</label>
                    <div>
                      <input class="form-control" type="text" placeholder="Masukkan Email @" name="pegawai2" required placeholder="0">  
                    </div>
                  </div>
                <div class="form-group">
                    <label class=" control-label">Alamat</label>
                    <div>
                      <textarea name="pegawai3" class="form-control" id="pegawai3" rows="3" placeholder="Masukkan Alamat" required></textarea>
                    </div>
                  </div>
                <div class="form-group">
                    <label class=" control-label">No Telepon</label>
                    <div>
                      <input class="form-control" type="Number" placeholder="Masukkan No Telepon" name="pegawai4" required placeholder="0"> 
                    </div>
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <div class="row">
                    <div class="col-md-2">
                      <input  type="radio" name="pegawai5"> Laki-Laki
                    </div>
                    <div class="col-md-10">
                      <input  type="radio" name="pegawai5"> Perempuan
                    </div>
                  </div>
                </div>
                <div class="form-group">
                    <label class=" control-label">AGAMA</label>
                    <div>
                        <!-- /btn-group -->
                        <select name="pegawai6" class="form-control">
                          <option value="0">== Pilih Agama ==</option>
                          <?php  
                            foreach ($agamaId as $row){
                              echo "<option value='".$row['AGAM_ID']."'>";
                              echo $row ['AGAM_NAME'];
                             echo "</option>";
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
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Data Pegawai</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
      <table class="table table-bordered table-hover table-striped" id="lookup">
        <thead>
          <tr>
            <th>No.</th>
            <th>Id Pegawai</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Jenis Kelamin</th>
            <th>Id Agama</th>
            <th style="text-align: center" colspan="2">Action </th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $no = 1;
          foreach ($pegawai as $row) {
            ?>
              <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $row['PEGA_ID']?></td>
                <td><?php echo $row['PEGA_NAME']?></td>
                <td><?php echo $row['PEGA_EMAIL']?></td>
                <td><?php echo $row['PEGA_ALAMAT']?></td>
                <td><?php echo $row['PEGA_NO_TLP']?></td>
                <td><?php echo $row['PEGA_JENKEL']?></td>
                <td><?php echo $row['AGAM_NAME']?></td>
                <td>
                  <a href="<?php echo base_url()?>c_pegawai/FormUpdate/<?php echo $row['PEGA_ID']?>">Edit</a>
                </td>
                <td>
                  <a href="<?php echo base_url()?>c_pegawai/delete/<?php echo $row['PEGA_ID']?>" onclick= "return confirm('Are you sure?')">Delete</a>
                </td>
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
<!-- /.content -->