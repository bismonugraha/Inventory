<?php

//koneksi database
include '../../koneksi.php';

//menangkap data yang dikirim dari form
$kode_barang    = $_POST['kode_barang'];

//menginput data ke databse
$sql = mysqli_query($koneksi, "DELETE FROM barang WHERE kode_barang = '$kode_barang'");

if ($sql) {
    $_SESSION['message'] = "Data berhasil dihapus!";
    $_SESSION['msg_type'] = "primary";
    echo "<script>window.location='" . ('../../barang.php') . "';</script>";
} else {
    echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
}
