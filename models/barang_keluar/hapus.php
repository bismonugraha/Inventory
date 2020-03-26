<?php

//koneksi database
include '../../koneksi.php';

//menangkap data yang dikirim dari form
$id_barang_keluar    = $_POST['id_barang_keluar'];

//menginput data ke databse
$sql = mysqli_query($koneksi, "DELETE FROM barang_keluar WHERE id_barang_keluar = '$id_barang_keluar'");

if ($sql) {
    $_SESSION['message'] = "Data berhasil dihapus!";
    $_SESSION['msg_type'] = "primary";
    echo "<script>window.location='" . ('../../barang_keluar.php') . "';</script>";
} else {
    echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
}
