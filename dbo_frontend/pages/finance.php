<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Finance</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../asset1/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../asset1/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../asset1/bower_components/Ionicons/css/ionicons.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="../asset1/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="../asset1/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../asset1/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="../asset1/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="../asset1/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../asset1/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../asset1/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">

  <header class="main-header" >
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="dashboard.php" class="navbar-brand"><b>CORPORATE</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

          <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <!-- Stock -->
                <li>
                  <a href="stock.php">
                    <i class="fa fa-industry"></i>
                    Stock
                  </a>
                </li>
                <!-- Keuangan -->
                <li class="active">
                  <a href="finance.php">
                    <i class="fa fa-balance-scale"></i>
                    Finance
                  </a>
                </li>
                <!-- Report -->
                <li >
                  <a href="report.php">
                    <i class="fa fa-bar-chart-o"></i>
                    Report
                  </a>
                </li>

                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                  <!-- Menu Toggle Button -->
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!-- The user image in the navbar-->
                    <img src="../asset1/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs">Krena Aji Hidayat</span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- The user image in the menu -->
                    <li class="user-header">
                      <img src="../asset1/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                      <p>
                        Kresna Aji Hidayat - <span> Admin </span>
                        <small>Member since Nov. 2012</small>
                      </p>
                    </li>

                    <!-- Menu Footer-->
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="dashboard.php" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div class="pull-right">
                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                      </div>
                    </li>
                  </ul>
                </li>

              </ul>
            </div>
            <!-- /.navbar-custom-menu -->
          </div>
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>


  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div>
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
            Finance
          <small><i class="fa fa-info"></i></small>
          <small>Admin</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Finance</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Finance Input</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-md-12 ">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label>Date</label>

                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepicker">
                          </div>
                          <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                            <label class="control-label">Debet</label>
                            <div class="">
                              <input type="text" class="form-control" name="" value="">
                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Kredit</label>
                        <div class="">
                          <input type="text" class="form-control" name="" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Saldo</label>
                        <div class="">
                          <input type="text" class="form-control" name="" value="">
                        </div>
                    </div>

                    <div class="form-group">
                      <label>Uraian</label>
                      <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                    </div>

                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-11">
                          <button type="submit" class="btn btn-default pull-right">Cancel</button>
                        </div>
                        <div class="col-md-1">
                          <button type="submit" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-primary" >Input Data</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.col -->

                </div>
                <!-- /.row -->

                <div class="modal modal-primary fade" id="modal-primary">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Finance Input</h4>
                      </div>
                      <div class="modal-body">
                        <h4>Date </h4>
                        <h4>Debet  </h4>
                        <h4>Kredit  </h4>
                        <h4>Saldo </h4>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-outline">Save changes</button>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
                the plugin.
              </div>
            </div>  <!-- /Main content -->


        <!-- SELECT2 EXAMPLE -->
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title"><span class="text-center">Finance Report</span></h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Uraian</th>
                <th>Debet</th>
                <th>Kredit</th>
                <th>Saldo</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td>1</td>
                <td>12/01/2018</td>
                <td>Pembelian Bahan Material</td>
                <td>Rp. 60.000</td>
                <td>Rp. 30.000</td>
                <td>Rp. 1.000.000</td>
              </tr>
              <tr>
                <td>2</td>
                <td>22/04/2018</td>
                <td>Pembelian Bahan Utama baju</td>
                <td>Rp. 20.000</td>
                <td>Rp. 70.000</td>
                <td>Rp. 1.300.000</td>
              </tr>
              <tr>
                <td>3</td>
                <td>14/06/2018</td>
                <td>Pembelian Bahan Utama Sepatu</td>
                <td>Rp. 29.000</td>
                <td>Rp. 30.000</td>
                <td>Rp. 1.900.000</td>
              </tr>
              <tr>
                <td>4</td>
                <td>04/06/2018</td>
                <td>Pembelian Servis Peralatan</td>
                <td>Rp. 78.000</td>
                <td>Rp. 30.000</td>
                <td>Rp. 1.700.000</td>
              </tr>
              <tr>
                <td>5</td>
                <td>10/07/2018</td>
                <td>Pembelian Mesin Produksi</td>
                <td>Rp. 58.000</td>
                <td>Rp. 20.000</td>
                <td>Rp. 1.100.000</td>
              </tr>
              <tr>
                <td>6</td>
                <td>12/01/2018</td>
                <td>Pembelian Bahan Material</td>
                <td>Rp. 60.000</td>
                <td>Rp. 30.000</td>
                <td>Rp. 1.000.000</td>
              </tr>
              <tr>
                <td>7</td>
                <td>22/04/2018</td>
                <td>Pembelian Bahan Utama baju</td>
                <td>Rp. 20.000</td>
                <td>Rp. 70.000</td>
                <td>Rp. 1.300.000</td>
              </tr>
              <tr>
                <td>8</td>
                <td>14/06/2018</td>
                <td>Pembelian Bahan Utama Sepatu</td>
                <td>Rp. 29.000</td>
                <td>Rp. 30.000</td>
                <td>Rp. 1.900.000</td>
              </tr>
              <tr>
                <td>9</td>
                <td>04/06/2018</td>
                <td>Pembelian Servis Peralatan</td>
                <td>Rp. 78.000</td>
                <td>Rp. 30.000</td>
                <td>Rp. 1.700.000</td>
              </tr>
              <tr>
                <td>10</td>
                <td>10/07/2018</td>
                <td>Pembelian Mesin Produksi</td>
                <td>Rp. 58.000</td>
                <td>Rp. 20.000</td>
                <td>Rp. 1.100.000</td>
              </tr>
              <tr>
                <td>11</td>
                <td>12/01/2018</td>
                <td>Pembelian Bahan Material</td>
                <td>Rp. 60.000</td>
                <td>Rp. 30.000</td>
                <td>Rp. 1.000.000</td>
              </tr>
              <tr>
                <td>12</td>
                <td>22/04/2018</td>
                <td>Pembelian Bahan Utama baju</td>
                <td>Rp. 20.000</td>
                <td>Rp. 70.000</td>
                <td>Rp. 1.300.000</td>
              </tr>
              <tr>
                <td>13</td>
                <td>14/06/2018</td>
                <td>Pembelian Bahan Utama Sepatu</td>
                <td>Rp. 29.000</td>
                <td>Rp. 30.000</td>
                <td>Rp. 1.900.000</td>
              </tr>
              <tr>
                <td>14</td>
                <td>04/06/2018</td>
                <td>Pembelian Servis Peralatan</td>
                <td>Rp. 78.000</td>
                <td>Rp. 30.000</td>
                <td>Rp. 1.700.000</td>
              </tr>
              <tr>
                <td>15</td>
                <td>10/07/2018</td>
                <td>Pembelian Mesin Produksi</td>
                <td>Rp. 58.000</td>
                <td>Rp. 20.000</td>
                <td>Rp. 1.100.000</td>
              </tr>
              <tr>
                <td>16</td>
                <td>12/01/2018</td>
                <td>Pembelian Bahan Material</td>
                <td>Rp. 60.000</td>
                <td>Rp. 30.000</td>
                <td>Rp. 1.000.000</td>
              </tr>
              <tr>
                <td>17</td>
                <td>22/04/2018</td>
                <td>Pembelian Bahan Utama baju</td>
                <td>Rp. 20.000</td>
                <td>Rp. 70.000</td>
                <td>Rp. 1.300.000</td>
              </tr>
              <tr>
                <td>18</td>
                <td>14/06/2018</td>
                <td>Pembelian Bahan Utama Sepatu</td>
                <td>Rp. 29.000</td>
                <td>Rp. 30.000</td>
                <td>Rp. 1.900.000</td>
              </tr>
              <tr>
                <td>19</td>
                <td>04/06/2018</td>
                <td>Pembelian Servis Peralatan</td>
                <td>Rp. 78.000</td>
                <td>Rp. 30.000</td>
                <td>Rp. 1.700.000</td>
              </tr>
              <tr>
                <td>20</td>
                <td>10/07/2018</td>
                <td>Pembelian Mesin Produksi</td>
                <td>Rp. 58.000</td>
                <td>Rp. 20.000</td>
                <td>Rp. 1.100.000</td>
              </tr>
            </tbody>
          </table>
        </div>

          <!-- /.box-body -->
          <div class="box-footer">
            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
            the plugin.
          </div>

        </div>
        <!-- /.box -->

      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class=" pull-right">
        <strong>Copyright &copy; BINARY CORPORATE 2018.</strong> All rights
        reserved.
      </div>
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../asset1/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../asset1/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../asset1/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../asset1/plugins/input-mask/jquery.inputmask.js"></script>
<script src="../asset1/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="../asset1/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="../asset1/bower_components/moment/min/moment.min.js"></script>
<script src="../asset1/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="../asset1/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
<!-- DataTables -->
<script src="../asset1/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../asset1/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- bootstrap time picker -->
<script src="../asset1/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll -->
<script src="../asset1/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="../asset1/plugins/iCheck/icheck.min.js"></script>
<!-- bootstrap datepicker -->
<script src="../asset1/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- FastClick -->
<script src="../asset1/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../asset1/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../asset1/dist/js/demo.js"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
</body>
</html>
