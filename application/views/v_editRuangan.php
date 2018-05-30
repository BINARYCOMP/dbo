<!-- Main content -->
<div class="content">
  <div class="row">
    <div class="col-md-6">
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Data Ruangan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12 ">
              <form action="<?php echo base_url ()?>c_ruangan/UpdateData/<?php  echo $ruangan[0]['RUAN_ID'] ?>" method="post">
                <div class="form-group">
                    <label class=" control-label">Nomor Ruangan</label>
                    <div>
                        <input class="form-control" type="text"  required="true" name="iName" value="<?php echo($ruangan[0]['RUAN_NUMBER'])?>">
                    </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-10">
                      <button type="reset" class="btn btn-default pull-right">Cancel</button>
                    </div>
                    <div class="col-md-2">
                      <button type="submit" class="btn btn-info pull-right" data-toggle="modal" data-target="#modal-success2">Input Data</button>
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