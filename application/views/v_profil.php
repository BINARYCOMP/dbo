<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-warning">
        <div class="box-header with-border">
          <h3 class="box-title">Account Profile</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Upload Foto Profil</th>
              </tr>
            </thead>
            <tbody>
              <form action="<?php echo base_url()?>c_profil/upload/" method="post" enctype="multipart/form-data">
              <?php 
              $no = 1;
                ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $Account[0]['PEGA_NAME']?></td>
                    <td><?php echo $Account[0]['PEGA_EMAIL']?></td>
                    <td><?php echo $Account[0]['PEGA_ALAMAT']?></td>
                    <td><?php echo $Account[0]['PEGA_NO_TLP']?></td>
                    <td><?php echo $Account[0]['PEGA_JENKEL']?></td>
                    <td><?php echo $Account[0]['AGAM_NAME']?></td>
                    <td>
                      <input type="file" name="fileToUpload" id="fileToUpload">
                      <br>
                      <input type="submit" class="btn btn-warning" value="Upload Image" name="submit">
                    </td>
                  </tr>
              </form>
            </tbody>
          </table>
          <div class="box-footer">
              <a href="<?php echo base_url()?>c_profil/formGantiPassword/<?php echo $Account[0]['PEGA_ID']?>" class="btn btn-warning">Ubah Kata Sandi</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>