<?php

$koneksi = mysqli_connect("localhost", "root", "", "inventory_pethshop");

//check koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi ke database gagal : " . mysqli_connect_error();
}
