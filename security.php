<?php
include('koneksi.php');

if (!(@$_SESSION['username'])) {
    echo "<script>window.location='" . ('login.php') . "';</script>";
}
