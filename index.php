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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-body">
                                <?php
                                if (isset($_GET['kategori_id'])) {
                                ?> Kategori : <strong><?php echo $kategori['kategori_nama']; ?></strong> <?php
                                                                                                        } else { ?>
                                    Kategori : <strong>Semua Kategori</strong>
                                <?php } ?>
                                <span class="float-right">
                                    Urutkan Harga : <a href="index.php?urut=termurah" class="badge badge-primary">Termurah</a> | <a href="index.php?urut=termahal" class="badge badge-primary">Termahal</a>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <?php

                $query_isi = mysqli_query($konek, $searching);
                $a = 1;
                while ($data = mysqli_fetch_assoc($query_isi)) {

                    if ($a % 2 == 1 && $a != 1) {
                    ?>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <img src="img/<?= $data['img'] ?>" alt="" class="card-img-top" height="315px">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $data['product_name']
                                                        ?></h5>
                                <p class="card-text"><strong>Rp. <?php echo $data['product_price']
                                                                    ?>,00</strong></p>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                <a href="index.php?kategori_id=<?php echo $data['kategori_id']; ?>" class="badge badge-primary"><i class="fas fa-tags"> <?php echo $data['kategori_nama'];
                                                                                                                                                        ?></i></a>
                            </div>

                            <div class="card-footer">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <a href="customer_produk_detail.php?id=<?php echo $data['product_id'];
                                                                                ?>" class="btn btn-primary">Info</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
            } else {
                ?>
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <img src="img/<?= $data['img'] ?>" alt="" class="card-img-top" height="315px" ">
                            <div class=" card-body">
                            <h5 class="card-title"><?php echo $data['product_name']; ?></h5>
                            <p class="card-text"><strong>Rp. <?php echo $data['product_price']; ?>,00</strong></p>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                            <a href="index.php?kategori_id=<?php echo $data['kategori_id'] ?>" class="badge badge-primary"><i class="fas fa-tags"> <?php echo $data['kategori_nama']; ?></i></a>
                        </div>

                        <div class="card-footer">
                            <form action="">
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <a href="customer_produk_detail.php?id=<?php echo $data['product_id'];  ?>" class="btn btn-primary">Info</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        <?php
                }
            $a++;
                }
        ?>
            </div>
            <?php
                for ($i = 1; $i <= $total_page; $i++) {
            ?>

                <a href="?halaman=<?= $i ?>" class="btn btn-primary"><?= $i ?></a>

            <?php
                                                                                                                                                }
            ?>
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

                            <?php $query_kategori = mysqli_query($konek, "SELECT * FROM kategori");
                                                                                                                                                while ($data_kategori = mysqli_fetch_array($query_kategori)) { ?>
                                <a href="index.php?kategori_id=<?php echo $data_kategori['kategori_id'] ?>" class="list-group-item list-group-item-action"><?php echo $data_kategori['kategori_nama']; ?></a>
                            <?php }
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