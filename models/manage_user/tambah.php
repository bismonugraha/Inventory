<?php
include '../../koneksi.php';

$username       = $_POST['username'];
$nama_lengkap   = $_POST['nama_lengkap'];
$pass           = $_POST['password'];
$target         = "../../upload/";
$nama_gambar    = $_FILES['image']['name'];
$sumber         = $_FILES['image']['tmp_name'];

move_uploaded_file($sumber, $target . $nama_gambar);
$sql = mysqli_query($koneksi, "INSERT INTO user VALUES('','$username','$nama_lengkap','$pass','$nama_gambar')");
if ($sql) {
    $_SESSION['message'] = "Data berhasil ditambahkan!";
    $_SESSION['msg_type'] = "primary";
    echo "<script>window.location='" . ('../../manage_user.php') . "';</script>";
} else {
    echo "ERROR, tidak berhasil" . mysqli_error($koneksi);
}
