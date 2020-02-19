<?php
include "template/connect.php";
session_start();
$id = $_POST['id'];
$password = $_POST['password'];

if ($id == "admin") {
    $query_admin = mysqli_query($konek, "SELECT * FROM admin WHERE admin_username = '$id' and password = '$password'") or die(mysqli_error($query));
    $cek = mysqli_num_rows($query_admin);
    if ($cek > 0) {
        $_SESSION['admin'] = $id;
        header("location:index.php");
    } else {
        header("location:login.php?login_user=gagal");
    }
} else {
    $query_customer = mysqli_query($konek, "SELECT * FROM customers WHERE username = '$id' and password = '$password'") or die(mysqli_error($query));

    $cek = mysqli_num_rows($query_customer);

    if ($cek > 0) {
        $_SESSION['id'] = $id;
        header("location:index.php");
    } else {
        header("location:login.php?login_user=gagal");
    }
}
