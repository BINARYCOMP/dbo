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
    <div style="color: red;""><?php $this->load->library('form_validation');
    echo validation_errors();?></div>

    <section class="content">
    <div class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Input Pegawai</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-12 ">
                  <form action="<?php echo base_url(). 'C_pegawai/Tambah'; ?>" method="POST">
                    <div class="form-group">
                        <label class=" control-label">Nama</label>
                        <div>
                          <span id="qty">
                            <input class="form-control" type="text" name="I_nama" value="<?php echo set_value('I_nama'); ?>">  
                          </span>
                        </div>
                        <label class=" control-label">Email</label>
                        <div>
                          <span id="qty">
                            <input class="form-control" type="Email" name="I_email" value="<?php echo set_value('I_email'); ?>">  
                          </span>
                        </div>
                        <label class=" control-label">Alamat</label>
                        <div>
                          <span id="qty">
                            <textarea class="form-control" name="I_alamat"><?php echo set_value('I_alamat'); ?></textarea></td>  
                          </span>
                        </div>
                        <label class=" control-label">Telepon</label>
                        <div>
                          <span id="qty">
                            <input class="form-control" type="text" name="I_no_tlp" value="<?php echo set_value('I_no_tlp'); ?>">  
                          </span>
                        </div>
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
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-10">
                          <button type="reset" class="btn btn-default pull-right">Cancel</button>
                        </div>
                        <div class="col-md-2">
                          <button type="submit" name="submit" class="btn btn-warning pull-right" data-toggle="modal" data-target="#modal-success2" onclick="modalKonfirmasiTakJadi()" >Input Data</button>
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
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>No Hp</th>
                <th>Jenis Kelamin</th>
                <th style="text-align: center" colspan="2">Action </th>
              </tr>
            </thead>
            <tbody>
              <?php
              if( ! empty($pegawai)){
                foreach($pegawai as $data){
                  echo "<tr>
                  <td>".$data->PEGA_NAME."</td>
                  <td>".$data->PEGA_EMAIL."</td>
                  <td>".$data->PEGA_ALAMAT."</td>
                  <td>".$data->PEGA_NO_TLP."</td>
                  <td>".$data->PEGA_JENKEL."</td>
                  <td><a href='".base_url("c_pegawai/ubah/".$data->PEGA_ID)."'>Ubah</a></td>
                  <td><a href='".base_url("c_pegawai/hapus/".$data->PEGA_ID)."'>Hapus</a></td>
                  </tr>";
                }
              }else{
                echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
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


<html>
  <head>
    <title>CRUD Codeigniter</title>
  </head>
  <body>
    <h1>Form Tambah Pegawai</h1>
    <hr>
    <div style="color: red;""><?php $this->load->library('form_validation');
    echo validation_errors();?></div>

   <form action="<?php echo base_url(). 'C_pegawai/Tambah'; ?>" method="post">
      <table cellpadding="8">
        <tr>
          <td>Nama</td>
          <td><input type="text" name="I_nama" value="<?php echo set_value('I_nama'); ?>"></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><input type="Email" name="I_email" value="<?php echo set_value('I_email'); ?>"></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td><textarea name="I_alamat"><?php echo set_value('I_alamat'); ?></textarea></td>
        </tr>
        <tr>
          <td>Telepon</td>
          <td><input type="text" name="I_no_tlp" value="<?php echo set_value('I_no_tlp'); ?>"></td>
        </tr>
         <tr>
          <td>Jenis Kelamin</td>
          <td>
          <input type="radio" name="I_jenis_kelamin" value="Laki-laki" <?php echo set_radio('jeniskelamin', 'Laki-laki'); ?>> Laki-laki
          <input type="radio" name="I_jenis_kelamin" value="Perempuan" <?php echo set_radio('jeniskelamin', 'Perempuan'); ?>> Perempuan
          </td>
        </tr>
      </table>
      <hr>
      <input type="submit" name="submit" value="Simpan">
    </form>

    <h1>Data Pegawai</h1>
    <hr>
    <table border="1" cellpadding="7">
      <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Alamat</th>
        <th>No Hp</th>
        <th>Jenis Kelamin</th>
        <th colspan="2">Aksi</th>
      </tr>
      <?php
      if( ! empty($pegawai)){
        foreach($pegawai as $data){
          echo "<tr>
          <td>".$data->PEGA_NAME."</td>
          <td>".$data->PEGA_EMAIL."</td>
          <td>".$data->PEGA_ALAMAT."</td>
          <td>".$data->PEGA_NO_TLP."</td>
          <td>".$data->PEGA_JENKEL."</td>
          <td><a href='".base_url("c_pegawai/ubah/".$data->PEGA_ID)."'>Ubah</a></td>
          <td><a href='".base_url("c_pegawai/hapus/".$data->PEGA_ID)."'>Hapus</a></td>
          </tr>";
        }
      }else{
        echo "<tr><td align='center' colspan='7'>Data Tidak Ada</td></tr>";
      }
      ?>
    </table>
  </body>
</html>