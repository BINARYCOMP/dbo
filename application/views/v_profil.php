<!DOCTYPE html>
   <html>
   <head>
     <title></title>
   </head>
   <body>
   <div class="col-md-6">
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Account Profile</h3>
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
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Password</th>
            <th style="text-align: center">Ganti Password</th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $no = 1;
          foreach ($Account as $row) {
            ?>
              <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $row['PEGA_NAME']?></td>
                <td><?php echo $row['PEGA_EMAIL']?></td>
                <td><?php echo $row['PEGA_ALAMAT']?></td>
                <td><?php echo $row['PEGA_NO_TLP']?></td>
                <td><?php echo $row['PEGA_JENKEL']?></td>
                <td><?php echo $row['AGAM_NAME']?></td>
                <td>*******</td>
                <td>
                  <a href="<?php echo base_url()?>c_profil/UpdatePassword/<?php echo $row['PEGA_ID']?>">Ganti</a>
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
    </div>
   </body>
   </html>