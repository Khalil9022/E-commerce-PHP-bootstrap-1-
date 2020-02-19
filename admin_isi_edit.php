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
    if (empty($_SESSION['admin'])) {
        header("location:login.php?login_user=belum_login");
    }

    if (isset($_POST['submit'])) {
        $pid = $_GET['id'];
        $produk = $_POST['produk'];
        $harga = $_POST['harga'];
        $jumlah = $_POST['jumlah'];
        $kategori = $_POST['kategori'];
        if (isset($_FILES)) {
            $namaFile = $_FILES['img']['name'];
            $ukuranFile = $_FILES['img']['size'];
            $error = $_FILES['img']['error'];
            $tmpName = $_FILES['img']['tmp_name'];

            // cek apakah yang di upload adalah gambar
            $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
            $ekstensiGambar = explode('.', $namaFile);
            $ekstensiGambar = strtolower(end($ekstensiGambar));

            // lolos pengecekan, gambar siap di upload
            // generate nama gambar baru
            $namaFileBaru = uniqid();
            $namaFileBaru .= '.';
            $namaFileBaru .= $ekstensiGambar;
            move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
        } else {
            $namaFile = 'default.png';
        }


        $update = mysqli_query($konek, "UPDATE product SET product_name = '$produk',
                                                    product_price = '$harga',
                                                    product_quantity = '$jumlah' ,
                                                    kategori_id = '$kategori',
                                                    img = '$namaFileBaru'
                                                    WHERE product_id = '$pid'");

        echo "<script>alert('Produk Telah Berhasil Di edit!')</script>";
        echo "<script>location='admin_data.php'</script>";
    }
    $pid = $_GET['id'];
    $query_edit = mysqli_query($konek, "SELECT * FROM product WHERE product_id = '$pid'");
    $data_edit = mysqli_fetch_assoc($query_edit);
    ?>


    <main role="main" class="container">
        <div class="row">
            <div class="col-md-9 ">
                <form method="POST" enctype="multipart/form-data">
                    <div class="card" style="width: 40rem;">
                        <div class="card-body">
                            <h4>EDIT BARANG</h4>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Nama Produk</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $data_edit['product_name']; ?>" name="produk">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Harga Produk</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" value="<?php echo $data_edit['product_price']; ?>" name="harga">
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Jumlah Produk</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" value="<?php echo $data_edit['product_quantity']; ?>" name="jumlah">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Kategori :</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="kategori">
                                    <?php
                                    $query_kategori = mysqli_query($konek, "SELECT * FROM kategori");
                                    while ($data_kategori = mysqli_fetch_array($query_kategori)) {
                                        ?>

                                        <option value="<?php echo $data_kategori['kategori_id'] ?>"><?php echo $data_kategori['kategori_nama'] ?></option>

                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="img">Image : </label>
                                <input type="file" class="form-control" name="img">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Confirm</button>

                        </div>
                    </div>
                </form>
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