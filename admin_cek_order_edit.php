<?php
include "template/connect.php";
session_start();

$order_id = $_POST['order_id'];
$order_status = $_POST['status'];
echo $order_id;
echo $order_status;
$query_order = mysqli_query($konek, "UPDATE orders SET order_status = '$order_status' WHERE order_id = '$order_id'");


echo "<script>alert('Berhasil Edit Status Pengiriman!')</script>";
echo "<script>location='admin_cek_order.php'</script>";
