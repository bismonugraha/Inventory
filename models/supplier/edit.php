<?php

//koneksi database
include '../../koneksi.php';

//menangkap data yang dikirim dari form
$id_supplier      = $_POST['id_supplier'];
$nama_supplier    = $_POST['nama_supplier'];
$alamat           = $_POST['alamat'];
$no_telp          = $_POST['no_telp'];


//menginput data ke databse
$sql = mysqli_query($koneksi, "UPDATE supplier SET nama_supplier = '$nama_supplier',alamat = '$alamat', no_telp = '$no_telp' WHERE id_supplier = '$id_supplier'");

if ($sql) {
    $_SESSION['message'] = "Data berhasil diubah!";
    $_SESSION['msg_type'] = "primary";
    echo "<script>window.location='" . ('../../supplier.php') . "';</script>";
} else {
    echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
}
