<?php

//koneksi database
include '../../koneksi.php';

//menangkap data yang dikirim dari form
$tanggal        = $_POST['tanggal'];
$kode_barang    = $_POST['kode_barang'];
$id_supplier    = $_POST['id_supplier'];
$jumlah_masuk   = $_POST['jml_masuk'];

$selSto = mysqli_query($koneksi, "SELECT * FROM barang WHERE kode_barang = '$kode_barang'");
$sto = mysqli_fetch_array($selSto);
$stok = $sto['stok'];

$sisa = $stok + $jumlah_masuk;

// menginput data ke databse
$sql = mysqli_query($koneksi, "INSERT INTO barang_masuk VALUES('','$tanggal','$kode_barang','$id_supplier','$jumlah_masuk')");

if ($sql) {

    $upstok = mysqli_query($koneksi, "UPDATE barang SET stok='$sisa' WHERE kode_barang = '$kode_barang'");

    $_SESSION['message'] = "Data berhasil ditambahkan!";
    $_SESSION['msg_type'] = "primary";
    echo "<script>window.location='" . ('../../barang_masuk.php') . "';</script>";
} else {
    echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
}
