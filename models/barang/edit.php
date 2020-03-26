<?php

//koneksi database
include '../../koneksi.php';

//menangkap data yang dikirim dari form
$kode_barang    = $_POST['kode_barang'];
$nama_barang    = $_POST['nama_barang'];
$jenis_barang   = $_POST['jenis_barang'];
$stok           = $_POST['stok'];

//menginput data ke databse
$sql = mysqli_query($koneksi, "UPDATE barang SET nama_barang = '$nama_barang',jenis_barang = '$jenis_barang', stok = '$stok' WHERE kode_barang = '$kode_barang'");

if ($sql) {
    $_SESSION['message'] = "Data berhasil diubah!";
    $_SESSION['msg_type'] = "primary";
    echo "<script>window.location='" . ('../../barang.php') . "';</script>";
} else {
    echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
}
