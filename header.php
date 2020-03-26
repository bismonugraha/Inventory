<?php
@session_start();
include 'koneksi.php'
?>
<!doctype html>

<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Inventory Peth-Shop</title>
    <meta name="description" content="Sistem Inventory Peth-Shop">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="images/Logo2@2x.png">

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css">


    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/custom – 1.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/Logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Data Barang</h3><!-- /.menu-title -->
                    <li>
                        <a href="barang.php"> <i class="menu-icon fa fa-laptop"></i>Data Barang</a>
                    </li>
                    <li>
                        <a href="supplier.php"> <i class="menu-icon fa fa-truck"></i>Data Supplier</a>
                    </li>
                    <li>
                        <a href="barang_masuk.php"> <i class="menu-icon fa fa-plus-square"></i>Barang Masuk</a>
                    </li>
                    <li>
                        <a href="barang_keluar.php"> <i class="menu-icon fa fa-minus-square"></i>Barang Keluar</a>
                    </li>

                    <h3 class="menu-title">Laporan</h3><!-- /.menu-title -->
                    <li>
                        <a href="laporan_barang_masuk.php"> <i class="menu-icon fa fa-archive"></i>Laporan Barang Masuk</a>
                    </li>
                    <li>
                        <a href="laporan_barang_keluar.php"> <i class="menu-icon fa fa-archive"></i>Laporan Barang Keluar</a>
                    </li>
                    <li>
                        <a href="laporan_stok_barang.php"> <i class="menu-icon fa fa-archive"></i>Laporan Stok Barang</a>
                    </li>
                    <h3 class="menu-title"></h3><!-- /.menu-title -->
                    <li>
                        <a href="manage_user.php"> <i class="menu-icon fa fa-users"></i>Management Users </a>
                    </li>

                    <div class="modal fade" id="smallmodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <form action="logout.php" method="post">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="smallmodalLabel">LOGOUT</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>
                                            Apakah anda yakin ingin keluar?
                                        </p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Yakin!</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="upload/<?= $_SESSION['image']; ?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> <?= $_SESSION['nama_lengkap']; ?></a>

                            <a class="nav-link" href="#" data-toggle="modal" data-target="#smallmodal">
                                <i class="fa fa-power-off"></i> Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->