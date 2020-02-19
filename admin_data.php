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
            <div class="col-md-9 ">
                <table class="table table-hover bg-white">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Brand_name</th>
                            <th>Product_name</th>
                            <th>Product_price</th>
                            <th>Quantity</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php
                    $query = mysqli_query($konek, $searching);
                    $a = 0;
                    $nomor = 0;
                    while ($data = mysqli_fetch_array($query)) {
                        $a = 1;
                        $nomor++;
                        ?>
                        <tbody>
                            <tr>
                                <td><?php echo $nomor; ?></td>
                                <td><?php echo $data['kategori_nama'] ?></td>
                                <td><?php echo $data['product_name'] ?></td>
                                <td><?php echo $data['product_price'] ?></td>
                                <td><?php echo $data['product_quantity'] ?></td>
                                <td>
                                    <a class="btn btn-outline-primary" href="admin_isi_edit.php?id=<?php echo $data['product_id'];  ?>">
                                        EDIT
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    <?php }
                    if ($a != 1) {
                        echo "<script>alert('Produk Telah Dihapus!')</script>";
                        echo "<script>location='index.php'</script>";
                    }
                    ?>

                </table>
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
                                <a href="admin_data.php" class="list-group-item list-group-item-action">
                                    Semua Category
                                </a>
                                <?php
                                $query_kategori = mysqli_query($konek, "SELECT * FROM kategori");
                                while ($data_kategori = mysqli_fetch_array($query_kategori)) {
                                    ?>
                                    <a href="admin_data.php?kategori_id=<?php echo $data_kategori['kategori_id'] ?>" class="list-group-item list-group-item-action"><?php echo $data_kategori['kategori_nama']; ?></a>
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