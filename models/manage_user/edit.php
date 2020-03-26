<?php
include '../../koneksi.php';

$id_user        = $_POST['id_user'];
$username       = $_POST['username'];
$nama_lengkap   = $_POST['nama_lengkap'];
$pass           = $_POST['password'];
$target         = "../../upload/";
$nama_gambar    = $_FILES['image']['name'];
$sumber         = $_FILES['image']['tmp_name'];


if ($nama_gambar != "") {
    move_uploaded_file($sumber, $target . $nama_gambar);
    $sql = mysqli_query($koneksi, "UPDATE user SET username = '$username', nama_lengkap = '$nama_lengkap', 
    password = '$pass', image = '$nama_gambar' WHERE id_user = '$id_user'");
    if ($sql) {
        $_SESSION['message'] = "Data berhasil ditambahkan!";
        $_SESSION['msg_type'] = "primary";
        echo "<script>window.location='" . ('../../manage_user.php') . "';</script>";
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
} else {
    move_uploaded_file($sumber, $target . $nama_gambar);
    $sql = mysqli_query($koneksi, "UPDATE user SET username = '$username', nama_lengkap = '$nama_lengkap', 
    password = '$pass' WHERE id_user = '$id_user'");
    if ($sql) {
        $_SESSION['message'] = "Data berhasil ditambahkan!";
        $_SESSION['msg_type'] = "primary";
        echo "<script>window.location='" . ('../../manage_user.php') . "';</script>";
    } else {
        echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
    }
}
