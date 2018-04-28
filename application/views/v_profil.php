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
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th style="text-align: center">Action </th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $no = 1;
          foreach ($pegawai as $row) {
            ?>
              <tr>
                <td><?php echo $no ?></td>
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
    </div>