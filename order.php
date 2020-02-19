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
        header("location:login.php?login_user=belum_login");
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
                            <a href="orders.php">Orders</a>
                        </li>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <table class="table table-hover bg-white">
                        <thead>
                            <tr align="center">
                                <th>Order id</th>
                                <th>Waktu Pembelian</th>
                                <th>Banyak Order</th>
                                <th>Total Harga</th>
                                <th>Tujuan Order</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                        $query = mysqli_query($konek, "SELECT * FROM customers WHERE username = '" . $_SESSION['id'] . "' ");
                        $data2 = mysqli_fetch_assoc($query);
                        $id = $data2['customer_id'];
                        $query2 = mysqli_query($konek, "SELECT * FROM orders WHERE customer_id = '$id' ");

                        while ($data_history = mysqli_fetch_array($query2)) {

                            ?>
                            <tbody>
                                <tr>
                                    <td align="center"> <?php echo $data_history['order_id']; ?> </td>
                                    <td align="center"><?php echo $data_history['order_date']; ?></td>
                                    <td align="center"><?php echo $data_history['order_quantity']; ?></td>
                                    <td align="center"><?php echo $data_history['order_total_price']; ?></td>
                                    <td align="center"><?php echo $data_history['order_address']; ?></td>
                                    <td align="center">
                                        <?php if ($data_history['order_status'] == "Belum dikirim") { ?>
                                            <span class="badge badge-pill badge-warning text-white"><?php echo $data_history['order_status'] ?> </span>
                                        <?php } else { ?>
                                            <span class="badge badge-pill badge-success"><?php echo $data_history['order_status'] ?> </span>
                                        <?php } ?>
                                    </td>
                                    <td align="center">
                                        <a class="btn btn-primary" href="order_details.php?id=<?php echo $data_history['order_id']; ?>">Detail</a>
                                    </td>
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

    <script src="assets/libs/jquery/jquery-3.4.1.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>