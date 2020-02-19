<?php
include "template/connect.php";
session_start();
$username = $_SESSION['id'];
$date = date('Y-m-d');
$jam = date("H:i:s");
$waktu = $date . " / " . $jam;
$jumlah_cart = $_SESSION['jumlah_cart'];
$totalharga = $_SESSION['total_harga'];

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";


// query customer
$query_customer = mysqli_query($konek, "SELECT * FROM customers WHERE username = '$username' ");
$data_customer = mysqli_fetch_assoc($query_customer);
$customer_id = $data_customer['customer_id'];
$customer_address = $data_customer['address'];
$ongkir = $_GET['harga'];
$saldo = $data_customer['saldo'];
$total_harga_semua = $totalharga + $ongkir;
$saldo_saat_ini = $saldo - $total_harga_semua;
$status = "Belum dikirim";
$courier_id = $_GET['courier_id'];


$query_hasil = mysqli_query($konek, "UPDATE customers SET saldo =  $saldo_saat_ini  WHERE username = '$username'");

//  memasukkan kedalam tabel order
$query_input_order = mysqli_query($konek, "INSERT INTO 
                            orders(order_id , customer_id , courier_id , order_date , order_quantity , order_address , order_total_price , order_status) 
                            VALUES ('','$customer_id' ,'$courier_id', '$waktu' , '$jumlah_cart' , '$customer_address' , '$total_harga_semua' , '$status')");

// mengambil order id
$order_id = mysqli_insert_id($konek);

//  memasukkan kedalam tabel order detail
foreach ($_SESSION['keranjang'] as $product_id => $jumlah) {
    $query_product = mysqli_query($konek, "SELECT * FROM product WHERE product_id = '$product_id'");
    $data_product = mysqli_fetch_assoc($query_product);
    $harga = $data_product['product_price'];
    $product_id = $data_product['product_id'];

    $quantity_product = $data_product['product_quantity'];
    $kurang_quantity = $quantity_product - $jumlah;

    $kurangan_quantity_product = mysqli_query($konek, "UPDATE product SET product_quantity = $kurang_quantity WHERE product_id = '$product_id'");

    $query_input_order_details = mysqli_query($konek, "INSERT INTO order_details VALUES ( '$order_id' , '$product_id' , '$jumlah' , '$harga' )");
}

//unset session keranjang
unset($_SESSION['jumlah_cart']);
unset($_SESSION['keranjang']);

echo "<script>alert('Berhasil membeli barang!')</script>";
echo "<script>location='index.php'</script>";

// $quert_input_order_detail 
