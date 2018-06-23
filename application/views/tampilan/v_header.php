<?php
date_default_timezone_set('Asia/Bangkok');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Database Online | <?php if(isset($title)) echo $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/dbo/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/dbo/assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/dbo/assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/dbo/assets/dist/css/dataTables.bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.bootstrap.min.css">
  <!-- <link rel="stylesheet" href="/dbo/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="/dbo/assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/dbo/assets/dist/css/skins/_all-skins.min.css">

  <!-- Grafik -->
  <!-- Morris charts -->
  <link rel="stylesheet" href="/dbo/assets/bower_components/morris.js/morris.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>

    .autocomplete {
  /*the container must be positioned relative:*/
      position: relative;
      
      }
    .autocomplete-items {
      position: absolute;
      border: 1px solid #d4d4d4;
      border-bottom: none;
      border-top: none;
      z-index: 99;
      /*position the autocomplete items to be the same width as the container:*/
      top: 100%;
      left: 0;
      right: 0;
    }
    .autocomplete-items div {
      padding: 10px;
      cursor: pointer;
      background-color: #fff; 
      border-bottom: 1px solid #d4d4d4; 
    }
    .autocomplete-items div:hover {
      /*when hovering an item:*/
      background-color: #e9e9e9; 
    }
    .autocomplete-active {
      /*when navigating through the items using the arrow keys:*/
      background-color: DodgerBlue !important; 
      color: #ffffff; 
    }

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
    /*tambahan*/
    .right{
      text-align: right !important;
    }
    .center{
      text-align: center !important;
    }
    .left{
      text-align: left !important;
    }

    thead tr th{
      text-align: center !important; 
    }
    thead tr td{
      text-align: center !important; 
    }
  </style>

  <!-- jquery -->
  <script src="/dbo/assets/dist/js/jquery-1.11.2.min.js"></script>
  <script src="/dbo/assets/dist/js/adminlte.min.js"></script>
 
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">

  <header class="main-header" >
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo base_url()?>" class="navbar-brand"><b>Database Online</b></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>


      <div class="collapse navbar-collapse pull-right" id="navbar-collapse">
        <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <?php
                  if ($_SESSION['level'] == 'ADMIN BAWANG') {
                    ?>
                      <li class="<?php if(isset($menu)) if($menu == 'Stok') echo 'active'?>">
                        <a class="dropdown-toggle" style="cursor: pointer;" type="button" data-toggle="dropdown">
                          <i class="fa fa-industry"></i>
                          Gudang
                          <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li class="dropdown-header">Gudang Bawang</li>
                            <li><a href="<?php echo base_url()?>c_gudangBawang">Input Stok Barang</a></li>
                            <li><a href="<?php echo base_url()?>c_materialBawang">Input Stok Material</a></li>
                          </ul>
                      </li>
                      <li class="<?php if(isset($menu)) if($menu == 'Inventaris') echo 'active'?>" >
                        <a href="<?php echo base_url()?>c_inventaris_bawang">
                          <i class="glyphicon glyphicon-list-alt"></i>
                          Inventaris
                        </a>
                      </li>
                    <?php
                  }else if ($_SESSION['level'] == 'ADMIN CIMUNING') {
                    ?>
                      <li class="<?php if(isset($menu)) if($menu == 'Stok') echo 'active'?>">
                        <a class="dropdown-toggle" style="cursor: pointer;" type="button" data-toggle="dropdown">
                          <i class="fa fa-industry"></i>
                          Gudang
                          <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li class="dropdown-header">Gudang Cimuning</li>
                            <li><a href="<?php echo base_url()?>c_gudangJadi">Input Barang Jadi</a></li>
                            <li><a href="<?php echo base_url()?>c_gudangTakJadi">Input Barang Setengah Jadi</a></li>
                            <li><a href="<?php echo base_url()?>c_materialCimuning">Input Stok Material</a></li>
                          </ul>
                      </li>
                      <li class="<?php if(isset($menu)) if($menu == 'Inventaris') echo 'active'?>" >
                        <a href="<?php echo base_url()?>c_inventaris">
                          <i class="glyphicon glyphicon-list-alt"></i>
                          Inventaris
                        </a>
                      </li>
                    <?php
                  }else if ($_SESSION['level'] == 'KEUANGAN') {
                    ?>
                    <!-- Keuangan -->
                    <li class="<?php if(isset($menu)) if($menu == 'Keuangan') echo 'active'?>" >
                      <a href="<?php echo base_url()?>c_keuangan">
                        <i class="fa fa-balance-scale"></i>
                        Keuangan
                      </a>
                    </li>
                    <!-- Stock -->
                    <li class="<?php if(isset($menu)) if($menu == 'Gudang') echo 'active'?>" >
                      <a href="<?php echo base_url()?>c_stok">
                        <i class="fa fa-industry"></i>
                        View Gudang
                      </a>
                    </li>
                    <?php
                  }else if ($_SESSION['level'] == 'MANAGERIAL') {
                    ?>
                      <li class="<?php if(isset($menu)) if($menu == 'Stok') echo 'active'?>">
                        <a class="dropdown-toggle" style="cursor: pointer;" type="button" data-toggle="dropdown">
                          <i class="fa fa-industry"></i>
                          Gudang
                          <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li class="dropdown-header">Gudang Cimuning</li>
                            <li><a href="<?php echo base_url()?>c_gudangJadi/view_barang_jadi">Lihat Barang Jadi</a></li>
                            <li><a href="<?php echo base_url()?>c_gudangTakJadi/view_setengah_jadi">Lihat Barang Setengah Jadi</a></li>
                            <li><a href="<?php echo base_url()?>c_materialCimuning/view_material">Lihat Material</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Gudang Bawang</li>
                            <li><a href="<?php echo base_url()?>c_gudangBawang/view_barang_jadi">Lihat Barang</a></li>
                            <li><a href="<?php echo base_url()?>c_materialBawang/view_material">Lihat Material</a></li>
                          </ul>
                      </li>
                      <!-- Inventaris -->
                      <li class="<?php if(isset($menu)) if($menu == 'Inventaris') echo 'active'?>">
                        <a class="dropdown-toggle" style="cursor: pointer;" type="button" data-toggle="dropdown">
                          <i class="glyphicon glyphicon-list-alt"></i>
                          Inventaris
                          <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url()?>c_inventaris/view_inventaris">Lihat Inventaris Cimuning</a></li>
                            <li><a href="<?php echo base_url()?>c_inventaris_bawang/view_inventaris">Lihat Inventaris Bawang</a></li>
                          </ul>
                      </li>
                      <!-- Keuangan -->
                      <li class="<?php if(isset($menu)) if($menu == 'Keuangan') echo 'active'?>" >
                        <a href="<?php echo base_url()?>c_keuangan/view_keuangan">
                          <i class="fa fa-balance-scale"></i>
                          Lihat Keuangan
                        </a>
                      </li>
                      <!-- Report -->
                      <li class="<?php if(isset($menu)) if($menu == 'Report') echo 'active'?>">
                        <a href="<?php echo base_url()?>c_report">
                          <i class="fa fa-bar-chart-o"></i>
                          Report
                        </a>
                      </li>
                    <?php
                  }else if ($_SESSION['level'] == 'OWNER') {
                    ?>
                      <li class="<?php if(isset($menu)) if($menu == 'Stok') echo 'active'?>">
                        <a class="dropdown-toggle" style="cursor: pointer;" type="button" data-toggle="dropdown">
                          <i class="fa fa-industry"></i>
                          Gudang
                          <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li class="dropdown-header">Gudang Cimuning</li>
                            <li><a href="<?php echo base_url()?>c_gudangJadi/view_barang_jadi">Lihat Barang Jadi</a></li>
                            <li><a href="<?php echo base_url()?>c_gudangTakJadi/view_setengah_jadi">Lihat Barang Setengah Jadi</a></li>
                            <li><a href="<?php echo base_url()?>c_materialCimuning/view_material">Lihat Material</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Gudang Bawang</li>
                            <li><a href="<?php echo base_url()?>c_gudangBawang/view_barang_jadi">Lihat Barang</a></li>
                            <li><a href="<?php echo base_url()?>c_materialBawang/view_material">Lihat Material</a></li>
                          </ul>
                      </li>

                      <!-- Inventaris -->
                      <li class="<?php if(isset($menu)) if($menu == 'Inventaris') echo 'active'?>">
                        <a class="dropdown-toggle" style="cursor: pointer;" type="button" data-toggle="dropdown">
                          <i class="glyphicon glyphicon-list-alt"></i>
                          Inventaris
                          <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url()?>c_inventaris/view_inventaris">Lihat Inventaris Cimuning</a></li>
                            <li><a href="<?php echo base_url()?>c_inventaris_bawang/view_inventaris">Lihat Inventaris Bawang</a></li>
                          </ul>
                      </li>

                      <!-- Keuangan -->
                      <li class="<?php if(isset($menu)) if($menu == 'Keuangan') echo 'active'?>" >
                        <a href="<?php echo base_url()?>c_keuangan/view_keuangan">
                          <i class="fa fa-balance-scale"></i>
                          Lihat Keuangan
                        </a>
                      </li>
                      <!-- Report -->
                      <li class="<?php if(isset($menu)) if($menu == 'Report') echo 'active'?>">
                        <a href="<?php echo base_url()?>c_report">
                          <i class="fa fa-bar-chart-o"></i>
                          Report
                        </a>
                      </li>
                    <?php
                  }else if ($_SESSION['level'] == 'SUPER ADMIN') {
                    ?>
                       <li class="<?php if(isset($menu)) if($menu == 'Stok') echo 'active'?>">
                        <a class="dropdown-toggle" style="cursor: pointer;" type="button" data-toggle="dropdown">
                          <i class="fa fa-industry"></i>
                          Gudang
                          <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li class="dropdown-header">Gudang Cimuning</li>
                            <li><a href="<?php echo base_url()?>c_gudangJadi">Input Barang Jadi</a></li>
                            <li><a href="<?php echo base_url()?>c_gudangTakJadi">Input Barang Setengah Jadi</a></li>
                            <li><a href="<?php echo base_url()?>c_materialCimuning">Input Material</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Gudang Bawang</li>
                            <li><a href="<?php echo base_url()?>c_gudangBawang">Input Barang Jadi</a></li>
                            <li><a href="<?php echo base_url()?>c_materialBawang">Input Material</a></li>
                          </ul>
                      </li>

                      <!-- Inventaris -->
                      <li class="<?php if(isset($menu)) if($menu == 'Inventaris') echo 'active'?>">
                        <a class="dropdown-toggle" style="cursor: pointer;" type="button" data-toggle="dropdown">
                          <i class="glyphicon glyphicon-list-alt"></i>
                          Inventaris
                          <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url()?>c_inventaris">Input Inventaris Cimuning</a></li>
                            <li><a href="<?php echo base_url()?>c_inventaris_bawang">Input Inventaris Bawang</a></li>
                            <li><a href="<?php echo base_url()?>c_inventarisParent">Input Inventaris Parent</a></li>
                            <li><a href="<?php echo base_url()?>c_inventarisChild">Input Inventaris Child</a></li>
                          </ul>
                      </li>

                      <!-- Keuangan -->
                      <li class="<?php if(isset($menu)) if($menu == 'Keuangan') echo 'active'?>" >
                        <a href="<?php echo base_url()?>c_keuangan">
                          <i class="fa fa-balance-scale"></i>
                          Keuangan
                        </a>
                      </li>
                      <!-- Report -->
                      <li class="<?php if(isset($menu)) if($menu == 'Report') echo 'active'?>">
                        <a href="<?php echo base_url()?>c_report">
                          <i class="fa fa-bar-chart-o"></i>
                          Report
                        </a>
                      </li>
                      <!-- Super User -->
                      <li class="dropdown <?php if(isset($menu)) if($menu == 'Barang Parent' || $menu == 'Barang Child' || $menu == 'Input User' || $menu == 'Input Agama' ||  $menu == 'Input Level' ||  $menu == 'Input Satuan' ||  $menu == 'Input Pegawai'  ) echo 'active'?>">
                          <a class="dropdown-toggle" style="cursor: pointer;" type="button" data-toggle="dropdown">System
                          <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li class="dropdown-header">Barang</li>
                            <li><a href="<?php echo base_url()?>c_barangParent">Input Barang Parent</a></li>
                            <li><a href="<?php echo base_url()?>c_barangChild">Input Barang Child</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Barang Cimuning</li>
                            <li><a href="<?php echo base_url()?>c_barangChildCimuning">Input Barang</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Material Cimuning</li>
                            <li><a href="<?php echo base_url()?>c_materialParentCimuning">Material Parent</a></li>
                            <li><a href="<?php echo base_url()?>c_materialChildCimuning">Material Child</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Material Bawang</li>
                            <li><a href="<?php echo base_url()?>c_materialParentBawang">Material Parent</a></li>
                            <li><a href="<?php echo base_url()?>c_materialBawangChild">Material Child</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Owner</li>
                            <li><a href="<?php echo base_url()?>c_form1">Input User</a></li>
                            <li><a href="<?php echo base_url()?>c_pegawai">Input Pegawai</a></li>
                            <li><a href="<?php echo base_url()?>c_ruangan">Input Ruangan</a></li>
                            <li><a href="<?php echo base_url()?>c_satuan">Input Satuan</a></li>
                            <li><a href="<?php echo base_url()?>c_kategori">Input Kategori</a></li>
                            <li><a href="<?php echo base_url()?>c_level">Input Level</a></li>
                            <li><a href="<?php echo base_url()?>c_viewAgama">Input Agama</a></li>
                          </ul>
                      </li>
                    <?php
                  }
                ?>
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                  <!-- Menu Toggle Button -->
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!-- The user image in the navbar-->
                    <?php 
                      $dataUser =$this->m_form1->viewData($_SESSION['USER_ID']);
                    ?>
                    <img src="<?php echo base_url().$dataUser[0]['USER_PICTURE'] ?>" class="user-image" alt="User Image">
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs"><?php echo $_SESSION['username']?></span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- The user image in the menu -->
                    <li class="user-header">

                      <img src="<?php echo base_url().$dataUser[0]['USER_PICTURE'] ?>" class="img-circle" alt="User Image">

                      <p>
                        <?php echo $_SESSION['username']?> - <span> <?php echo $_SESSION['level'] ?> </span>
                        <small>Member since <?php echo date("M, Y", strtotime( $_SESSION['since']));?></small>
                      </p>
                    </li>

                    <!-- Menu Footer-->
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="<?php echo base_url()?>c_profil" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div class="pull-right">
                        <a href="<?php echo base_url()?>c_login/logout" class="btn btn-default btn-flat">Sign out</a>
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
