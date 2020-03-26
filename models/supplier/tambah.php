<?php

//koneksi database
include '../../koneksi.php';

//menangkap data yang dikirim dari form
$nama_supplier    = $_POST['nama_supplier'];
$alamat           = $_POST['alamat'];
$no_telp          = $_POST['no_telp'];

//menginput data ke databse
$sql = mysqli_query($koneksi, "INSERT INTO supplier VALUES('','$nama_supplier','$alamat','$no_telp')");

if ($sql) {
    $_SESSION['message'] = "Data berhasil ditambahkan!";
    $_SESSION['msg_type'] = "primary";
    echo "<script>window.location='" . ('../../supplier.php') . "';</script>";
} else {
    echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
}
