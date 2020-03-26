<?php

//koneksi database
include '../../koneksi.php';

//menangkap data yang dikirim dari form
$id_barang_masuk    = $_POST['id_barang_masuk'];

//menginput data ke databse
$sql = mysqli_query($koneksi, "DELETE FROM barang_masuk WHERE id_barang_masuk = '$id_barang_masuk'");

if ($sql) {
    $_SESSION['message'] = "Data berhasil dihapus!";
    $_SESSION['msg_type'] = "primary";
    echo "<script>window.location='" . ('../../barang_masuk.php') . "';</script>";
} else {
    echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
}
