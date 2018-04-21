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
                        <div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class=" control-label">Nama</label>
                        <div>
                          <input class="form-control" type="text" placeholder="Masukkan Nama" name="pegawai1" required placeholder="0"> 
                        </div>  
                    <div class="form-group">
                        <label class=" control-label">Email</label>
                        <div>
                          <input class="form-control" type="text" placeholder="Masukkan Email @" name="pegawai2" required placeholder="0">  
                        </div>
                    <div class="form-group">
                        <label class=" control-label">Alamat</label>
                        <div>
                          <textarea name="pegawai3" class="form-control" id="pegawai3" rows="3" placeholder="Masukkan Alamat" required></textarea>
                        </div>
                    <div class="form-group">
                        <label class=" control-label">No Telepon</label>
                        <div>
                          <input class="form-control" type="Number" placeholder="Masukkan No Telepon" name="pegawai4" required placeholder="0"> 
                        </div>
<<<<<<< HEAD
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
                        <label class=" control-label">AGAMA ID</label>
                        <div>
                          <input class="form-control" type="Number" placeholder="Pilih ID" name="pegawai6" required placeholder="0"> 
=======
                        <label class=" control-label">Jenis Kelamin</label>
                        <div class="form-group" >
                          <span id="qty">
                            
                            <div class="col-md-2">
                              <input  type="radio" name="I_jenis_kelamin" value="Laki-Laki" <?php echo set_radio('jeniskelamin', 'Laki-laki'); ?>> Pria
                            </div>
                            <div class="col-md-">
                              <input  type="radio" name="I_jenis_kelamin" value="Perempuan" <?php echo set_radio('jeniskelamin', 'Perempuan'); ?>> Wanita
                            </div>
                            
                          </span>
>>>>>>> b30bea2dfbe0ca9642b3e45d8040ebdfe23bfd12
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-10">
                          <button type="reset" class="btn btn-default pull-right">Cancel</button>
                        </div>
                        <div class="col-md-2">
<<<<<<< HEAD
                          <button type="submit" class="btn btn-warning pull-right" data-toggle="modal" data-target="#modal-success2" onclick="modalKonfirmasiTakJadi()">Input Data</button>
=======
                          <button type="submit" name="submit" class="btn btn-warning pull-right" data-toggle="modal" data-target="#modal-success2" onclick="modalKonfirmasiTakJadi()" >Input Data</button>
>>>>>>> b30bea2dfbe0ca9642b3e45d8040ebdfe23bfd12
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
              <h3 class="box-title">Data pegawai</h3>

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
                    <td><?php echo $row['PEGA_AGAM_ID']?></td>
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.row -->
</div>
<!-- /.content-wrapper -->
