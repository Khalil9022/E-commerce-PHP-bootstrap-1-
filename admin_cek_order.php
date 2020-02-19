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
        <h5>Pengiriman Barang Yang Belum Dikirim</h5>
        <div class="row">
            <div class="col-md-9 ">
                <div class="card">
                    <table class="table table-hover bg-white">
                        <thead>
                            <tr align="center">
                                <th>Order id</th>
                                <th>Pembeli</th>
                                <th>Waktu Pembelian</th>
                                <th>Banyak Order</th>
                                <th>Total Harga</th>
                                <th>Tujuan Order</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <?php
                        $query_order = mysqli_query($konek, "SELECT * FROM orders o 
                                                    INNER JOIN customers c ON c.customer_id = o.customer_id WHERE order_status = 'Belum dikirim'");
                        $a = 0;
                        while ($data_order = mysqli_fetch_array($query_order)) {
                            ?>

                            <tbody>
                                <form action="admin_cek_order_edit.php" method="POST">
                                    <tr>
                                        <td align="center"> <?php echo $data_order['order_id']; ?> </td>
                                        <td align="center"> <?php echo $data_order['username']; ?> </td>
                                        <td align="center"><?php echo $data_order['order_date']; ?></td>
                                        <td align="center"><?php echo $data_order['order_quantity']; ?></td>
                                        <td align="center"><?php echo $data_order['order_total_price']; ?></td>
                                        <td align="center"><?php echo $data_order['order_address']; ?></td>
                                        <td align="center">
                                            <select name="status" class="custom-select">
                                                <option value="Belum dikirim" require_once>Belum Dikirim</option>
                                                <option value="Dikirim" require_once>Dikirim</option>
                                            </select>
                                        </td>
                                        <td> <input type="submit" value="Edit" class="btn btn-outline-primary"> </td>
                                        <input type="hidden" name="order_id" value="<?php echo $data_order['order_id'] ?>">
                                    </tr>
                                </form>
                            </tbody>

                        <?php $a++;
                        }
                        ?>
                    </table>
                </div>
            </div>
            <div class="col-md-3 float-right">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                Pencarian
                            </div>
                            <div class="card-body">
                                <form action="">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="nilai" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" name="search">Cari</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header bg-muted">
                                Kategori
                            </div>
                            <div class="list-group">
                                <a href="index.php" class="list-group-item list-group-item-action">
                                    Semua Category
                                </a>
                                <?php
                                $query_kategori = mysqli_query($konek, "SELECT * FROM kategori");
                                while ($data_kategori = mysqli_fetch_array($query_kategori)) {
                                    ?>
                                    <a href="index.php?kategori_id=<?php echo $data_kategori['kategori_id'] ?>" class="list-group-item list-group-item-action"><?php echo $data_kategori['kategori_nama']; ?></a>
                                <?php
                                }
                                ?>
                            </div>

                            </ul>
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