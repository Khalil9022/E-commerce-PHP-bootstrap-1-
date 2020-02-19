<?php
include "template/connect.php";
session_start();

$query_saldo = mysqli_query($konek, "SELECT * From customers WHERE username = '" . $_SESSION['id'] . "'");
$data_customer = mysqli_fetch_assoc($query_saldo);
$saldo = $_GET['saldo'];
$total_saldo = $saldo + $data_customer['saldo'];
$CustomerID = $data_customer['customer_id'];
$date = date('Y-m-d');
$jam = date("H:i:s");
$query_update_customer_data = mysqli_query($konek, "UPDATE customers SET saldo =  $total_saldo  WHERE customer_id = '$CustomerID'");

$query_insert_saldo = mysqli_query($konek, "INSERT INTO pengisian_saldo (customer_id, saldo_pengisian, waktu_pengisian, jam) 
                            VALUES ('$CustomerID', '$saldo', '$date' , '$jam') ");
echo "<script>alert('Pengisian Berhasil!')</script>";
echo "<script>location='saldo_pengisian.php'</script>";
