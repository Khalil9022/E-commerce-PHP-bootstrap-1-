<?php
$konek = mysqli_connect("localhost", "root", "", "toko_mirota");

if ($konek->connect_error) {
    die('koneksi gagal : ' . $connect->connect_error);
}
