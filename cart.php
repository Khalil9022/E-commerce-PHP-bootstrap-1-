<?php
include "template/connect.php";
session_start();

$query_customer = mysqli_query($konek, "SELECT * FROM customers where username = '" . $_SESSION['id'] . "'");
$data_customer = mysqli_fetch_assoc($query_customer);
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Cart</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/navbar-fixed/">

    <!-- Bootstrap core CSS -->
    <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="assets/libs/fontawesome/css/all.min.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
    <?php
    include "template/header.php";

    if (!isset($_SESSION['id']) && !isset($_SESSION['admin'])) {

        header("location:login.php?login_user=belum_login");
    }

    if (empty($_SESSION['keranjang']) || !isset($_SESSION['keranjang'])) {
        echo "<script>alert('Tidak ada item dalam keranjang')</script>";
        echo "<script>location='index.php'</script>";
    }

    // metode hapus
    if (isset($_GET['hapus_id'])) {
        $hapus_id =  $_GET['hapus_id'];
        unset($_SESSION['keranjang'][$hapus_id]);
        echo "<script>alert('Item telah dihapus dalam keranjang')</script>";
        echo "<script>location='cart.php'</script>";
    }

    ?>

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header">
                        Cart
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Produk</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-center">Subtotal</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $totalharga = 0;
                                $a = 0;
                                foreach ($_SESSION['keranjang'] as $product_id => $jumlah) {
                                    $a++;
                                    $query = mysqli_query($konek, " SELECT * FROM product WHERE product_id = '$product_id' ");
                                    $data = mysqli_fetch_assoc($query);
                                    $subharga = $jumlah * $data['product_price'];

                                    $totalharga += $subharga;
                                    ?>
                                    <tr>
                                        <td>
                                            <p><img src="https://placehold.co/50x50" alt=""><strong><?php echo $data['product_name']; ?></strong>
                                            </p>
                                        </td>
                                        <td class="text-center">Rp <?php echo $data['product_price']; ?>,00</td>
                                        <td class="text-center">
                                            <?php echo $jumlah ?>

                                        </td>
                                        <td class="text-center">Rp <?php echo $subharga; ?>,00</td>
                                        <td>
                                            <a href="cart.php?hapus_id=<?php echo $product_id; ?>" class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php }
                                $_SESSION['jumlah_cart'] = $a;
                                $_SESSION['total_harga'] = $totalharga;
                                ?>
                                <tr>
                                    <td colspan="3"><strong>Total : </strong></td>
                                    <td class="text-center"><strong>Rp<?php echo $totalharga; ?>,--</strong></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>


                        <form method="POST" action="cart_pay.php">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Pengirim :</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="pengirim">
                                    <option value="1">JNE-Reguler</option>
                                    <option value="2">JNE-EXPRESS</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Nama Kota :</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="kota">
                                    <option value="1">magelang</option>
                                    <option value="2">solo</option>
                                    <option value="3">klaten</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <p>Alamat Lengkap</p>
                                <input type="text" name="alamat" placeholder="alamat" required value="<?= $data_customer['address'] ?>">
                            </div>

                            <!-- melakukan tindakan -->
                            <input type="hidden" name="id" value="<?php echo $data["product_id"]; ?>">


                            <input type="submit" value="Pembayaran" class="btn btn-success float-right">
                            <a href="index.php" class="btn btn-warning text-white"><i class="fas fa-angle-left"></i>
                                Kembali Belanja </a>

                        </form>
                    </div>
                </div>
            </div>
    </main>

    <script src="assets/libs/jquery/jquery-3.4.1.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>