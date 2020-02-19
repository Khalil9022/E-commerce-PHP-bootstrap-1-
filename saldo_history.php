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

    ?>

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-9">
                <h3>Pengisian Saldo</h3>

                <div class="card">
                    <div class="card-body">
                        <table class="table table-hover bg-white">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pengisian Saldo</th>
                                    <th>Waktu Pengisian</th>
                                    <th>Jam Pengisian</th>
                                </tr>
                            </thead>
                            <?php
                            $query_customer = mysqli_query($konek, "SELECT * FROM customers WHERE username = '" . $_SESSION['id'] . "' ");
                            $data_customer = mysqli_fetch_assoc($query_customer);
                            $cid = $data_customer['customer_id'];
                            $query_saldo = mysqli_query($konek, "SELECT * FROM pengisian_saldo WHERE customer_id = '$cid' ");

                            $a = 1;
                            while ($data_saldo = mysqli_fetch_array($query_saldo)) {

                                ?>
                                <tbody>
                                    <tr>
                                        <td> <?php echo $a++ ?> </td>
                                        <td><?php echo $data_saldo['saldo_pengisian'] ?></td>
                                        <td><?php echo $data_saldo['waktu_pengisian'] ?></td>
                                        <td><?php echo $data_saldo['jam'] ?></td>
                                    </tr>
                                </tbody>

                            <?php
                            } ?>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-3 float-right">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                Action
                            </div>
                            <div class="list-group">
                                <a href="saldo_pengisian.php" class="list-group-item list-group-item-action   ">
                                    Pengisian Saldo
                                </a>
                                <a href="saldo_history.php" class="list-group-item list-group-item-action active ">
                                    History Pengisian
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script src="assets/libs/jquery/jquery-3.4.1.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>