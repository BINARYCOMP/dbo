<!-- Main content -->
<div class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Input ruangan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12 ">
              <form action="<?php echo base_url(). 'c_ruangan/form'; ?>" method="POST">
                <div class="form-group">
                    <label class=" control-label">Nomor Ruangan</label>
                    <div>
                      <input class="form-control" type="text" placeholder="Masukkan Nomor Ruangan" name="iName" required placeholder="0"> 
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
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Data Ruangan</h3>
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
            <th>Nomor Ruangan</th>
            <th style="text-align: center">Action </th>
          </tr>
        </thead>
        <tbody>
          <?php 
          $no = 1;
          foreach ($ruangan as $row) {
            ?>
              <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $row['RUAN_NUMBER']?></td>
                <td>
                  <a href="<?php echo base_url()?>c_ruangan/FormUpdate/<?php echo $row['RUAN_ID']?>">Edit</a>
                </td>
                <td>
                  <a href="<?php echo base_url()?>c_ruangan/delete/<?php echo $row['RUAN_ID']?>" onclick= "return confirm('Are you sure?')">Delete</a>
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