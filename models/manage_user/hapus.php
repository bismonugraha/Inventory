<?php

//koneksi database
include '../../koneksi.php';

//menangkap data yang dikirim dari form
$id_user    = $_POST['id_user'];

//menginput data ke databse
$sql = mysqli_query($koneksi, "DELETE FROM user WHERE id_user = '$id_user'");

if ($sql) {
    $_SESSION['message'] = "Data berhasil dihapus!";
    $_SESSION['msg_type'] = "primary";
    echo "<script>window.location='" . ('../../manage_user.php') . "';</script>";
} else {
    echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
}
