<?php
session_start();
include "template/connect.php";
error_reporting(0);
$pengirim = $_POST['pengirim'];
$kota = $_POST['kota'];
$alamat = $_POST['alamat'];
$total_harga = $_SESSION['total_harga'];


$query_total = mysqli_query($konek, " SELECT c.*,cd.*,k.* FROM courier c
                                INNER JOIN courier_detail cd ON c.courier_id = cd.courier_id
                                INNER JOIN kota k ON k.kota_id = cd.kota_id
                                WHERE c.courier_id = '$pengirim' AND k.kota_id = '$kota' ");

$data_courier = mysqli_fetch_assoc($query_total);

$harga_keseluruhan = $_SESSION['total_harga'] + $data_courier['harga_kirim'];

$query_customer = mysqli_query($konek, " SELECT * FROM customers WHERE username = '" . $_SESSION['id'] . "'");
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

    if (empty($_SESSION['id'])) {
        header("location:index.php?login_user=belum_login");
    }
    if (isset($_POST['action'])) {
        $uang_saku = $data_customer['saldo'];
        // echo $_SESSION['total_harga'] . "<br>";
        // echo $data_courier['harga_kirim'] . "<br>";

        // echo $uang_saku . "<br>";
        // echo $harga_keseluruhan;
        // die();
        if ($uang_saku < $harga_keseluruhan) {
            echo "<script>alert('Tidak Cukup Uang!')</script>";
            echo "<script>location='cart.php'</script>";
        } else {
            header("location:cart_buy.php?courier_id=" . $data_courier['courier_id'] . "&harga=" . $data_courier['harga_kirim'] . "");
        }
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

                        <!-- detail produk  -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td>Pengirim</td>
                                    <td><?php echo $data_courier['courier_nama']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tujuan (kota)</td>
                                    <td><?php echo $data_courier['kota_nama'] ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><?php echo $alamat ?></td>
                                </tr>
                                <tr>
                                    <td>Estimasi Waktu</td>
                                    <td><?php echo $data_courier['courier_waktu'] ?></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="3" class="text-center"><strong> Rincian Harga </strong></td>
                                </tr>
                                <tr>
                                    <td>Harga Barang</td>
                                    <td><?php echo $total_harga; ?></td>
                                </tr>
                                <tr>
                                    <td>Harga Ongkir</td>
                                    <td><?php echo $data_courier['harga_kirim'] ?></td>
                                </tr>
                                <tr>
                                    <td>Harga Total</td>
                                    <td><?php echo $harga_keseluruhan; ?></td>
                                </tr>
                                <tr>
                                    <td>saldo</td>
                                    <td><?php echo $data_customer['saldo'] ?></td>
                                </tr>
                            </tbody>

                        </table>
                        <form action="cart_pay.php" method="POST">
                            <input type="hidden" name="action">
                            <input type="hidden" name="kota" value="<?php echo $kota ?>">
                            <input type="hidden" name="pengirim" value="<?php echo $pengirim ?>">
                            <button class="btn btn-success float-right">Beli</button>
                        </form>
                        <a href="cart.php" class="btn btn-warning text-white"><i class="fas fa-angle-left"></i>
                            Ke cart </a>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <script src="assets/libs/jquery/jquery-3.4.1.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>