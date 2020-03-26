<?php

//koneksi database
include '../../koneksi.php';

//menangkap data yang dikirim dari form
$id_supplier    = $_POST['id_supplier'];

//menginput data ke databse
$sql = mysqli_query($koneksi, "DELETE FROM supplier WHERE id_supplier = '$id_supplier'");

if ($sql) {
    $_SESSION['message'] = "Data berhasil dihapus!";
    $_SESSION['msg_type'] = "primary";
    echo "<script>window.location='" . ('../../supplier.php') . "';</script>";
} else {
    echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
}
