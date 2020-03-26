<?php

//koneksi database
include '../../koneksi.php';

//menangkap data yang dikirim dari form
$kode_barang    = $_POST['kode_barang'];
$nama_barang    = $_POST['nama_barang'];
$jenis_barang   = $_POST['jenis_barang'];
$stok           = $_POST['stok'];

//menginput data ke databse
$sql = mysqli_query($koneksi, "INSERT INTO barang VALUES('$kode_barang','$nama_barang','$jenis_barang','$stok')");

if ($sql) {
    $_SESSION['message'] = "Data berhasil ditambahkan!";
    $_SESSION['msg_type'] = "primary";
    echo "<script>window.location='" . ('../../barang.php') . "';</script>";
} else {
    echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
}
