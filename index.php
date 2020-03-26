<?php
@session_start();
include 'security.php';
include 'header.php';
?>

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li class="active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">

    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-desktop text-success border-success"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Total Barang</div>
                        <?php
                        include "koneksi.php";
                        $sql = "SELECT * FROM barang";
                        $query = mysqli_query($koneksi, $sql);
                        $count = mysqli_num_rows($query);
                        ?>
                        <div class="stat-digit"><?= $count; ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-shopping-cart-full text-primary border-primary"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Barang Makanan</div>
                        <?php
                        include "koneksi.php";
                        $sql = "SELECT * FROM barang WHERE jenis_barang = 'Makanan'";
                        $query = mysqli_query($koneksi, $sql);
                        $count = mysqli_num_rows($query);
                        ?>
                        <div class="stat-digit"><?= $count ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-shopping-cart-full text-warning border-warning"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Barang Kandang</div>
                        <?php
                        include "koneksi.php";
                        $sql = "SELECT * FROM barang WHERE jenis_barang = 'Kandang'";
                        $query = mysqli_query($koneksi, $sql);
                        $count = mysqli_num_rows($query);
                        ?>
                        <div class="stat-digit"><?= $count ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-shopping-cart-full text-danger border-danger"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Barang Aksesoris</div>
                        <?php
                        include "koneksi.php";
                        $sql = "SELECT * FROM barang WHERE jenis_barang = 'Aksesoris'";
                        $query = mysqli_query($koneksi, $sql);
                        $count = mysqli_num_rows($query);
                        ?>
                        <div class="stat-digit"><?= $count ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div> <!-- .content -->


<?php include 'footer.php'; ?>