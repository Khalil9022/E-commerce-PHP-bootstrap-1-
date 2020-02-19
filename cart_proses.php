<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location:login.php?login_user=belum_login");
}
$id_produk = $_GET['id'];
$quantity = $_GET['quantity'];

//jika sudah ada produk di keranjang,,, maka keranjangnya +1 
if (isset($_SESSION['keranjang'][$id_produk])) {
    $_SESSION['keranjang'][$id_produk] += $quantity;
}

//jika belum ada produk di keranjang,,, maka keranjangnya dianggap 1 

else {
    $_SESSION['keranjang'][$id_produk] = $quantity;
}



echo "<script>alert('Item telah dimasukan ke dalam keranjang')</script>";
echo "<script>location='cart.php'</script>";
