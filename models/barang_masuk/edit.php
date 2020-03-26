<?php

//koneksi database
include '../../koneksi.php';

//menangkap data yang dikirim dari form
$id_barang_masuk = $_POST['id_barang_masuk'];
$tanggal        = $_POST['tanggal'];
$kode_barang    = $_POST['kode_barang'];
$id_supplier    = $_POST['id_supplier'];
$jumlah_masuk   = $_POST['jml_masuk'];

$selSto = mysqli_query($koneksi, "SELECT * FROM barang WHERE kode_barang = '$kode_barang'");
$sto = mysqli_fetch_array($selSto);
$stok = $sto['stok'];
$sisa = $stok + $jumlah_masuk;

// menginput data ke databse
$sql = mysqli_query($koneksi, "UPDATE barang_masuk SET tanggal = '$tanggal', kode_barang = '$kode_barang', 
id_supplier = '$id_supplier', jumlah_masuk = '$jumlah_masuk' WHERE id_barang_masuk = '$id_barang_masuk'");

if ($sql) {
    $upstok = mysqli_query($koneksi, "UPDATE barang SET stok='$sisa' WHERE kode_barang = '$kode_barang'");

    $_SESSION['message'] = "Data berhasil ditambahkan!";
    $_SESSION['msg_type'] = "primary";
    echo "<script>window.location='" . ('../../barang_masuk.php') . "';</script>";
} else {
    echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
}
