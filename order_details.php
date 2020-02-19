<?php
include "template/connect.php";
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Mirota Kampus Online Shop</title>

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
    include "template/query_index.php";
    if (!isset($_SESSION['id']) && !isset($_SESSION['admin'])) {
        header("location:index.php?login_user=belum_login");
    }
    ?>

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-header">
                        Menu
                    </div>
                    <div class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="profile.php">Profile</a>
                        </li>
                        <li class="list-group-item">
                            <a href="order.php">Orders</a>
                        </li>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <table class="table table-hover bg-white">
                        <thead>
                            <tr align="center">
                                <th>No</th>
                                <th>Nama Product</th>
                                <th>Jumlah Pembelian</th>
                                <th>Harga / Satuan</th>
                            </tr>
                        </thead>
                        <?php

                        $order_id = $_GET['id'];
                        $query2 = mysqli_query($konek, "SELECT o.* , p.product_name FROM order_details o 
                                    INNER JOIN product p ON o.product_id = p.product_id WHERE o.order_id = '$order_id' ");
                        $a = 0;

                        while ($data_order_details = mysqli_fetch_array($query2)) {
                            $a++;
                            ?>
                            <tbody>
                                <tr align="center">
                                    <td><?php echo $a ?></td>
                                    <td><?php echo $data_order_details['product_name']; ?></td>
                                    <td><?php echo $data_order_details['order_quantity']; ?></td>
                                    <td><?php echo $data_order_details['order_price']; ?></td>
                                </tr>
                            </tbody>

                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>