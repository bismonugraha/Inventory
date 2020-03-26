<?php
session_start();
include 'koneksi.php';
$username = $_POST['username'];
$pass = $_POST['password'];


$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username' and password = '$pass'");
$data = mysqli_fetch_array($sql);
$cek = mysqli_num_rows($sql);
if ($cek > 0) {
    $_SESSION['Admin'] = $data['id_user'];
    $_SESSION['level'] = $data['level'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['nama_lengkap'] = $data['nama_lengkap'];
    $_SESSION['image'] = $data['image'];
    echo "<script>window.location='" . ('index.php') . "';</script>";
} else {
    $_SESSION['message'] = 'Username atau Password salah!';
    $_SESSION['msg_type'] = "danger";
    echo "<script>window.location='" . ('login.php') . "';</script>";
}
