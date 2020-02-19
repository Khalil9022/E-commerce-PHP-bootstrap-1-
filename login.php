<?php
include "template/connect.php";
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Login</title>

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


    if (isset($_GET['login_user'])) {
        if ($_GET['login_user'] == "gagal") {
            echo "<script>alert('Gagal Login! id atau password salah!')</script>";
        } else if ($_GET['login_user'] == "logout") {
            echo "<script>alert('Berhasil Logout!')</script>";
        } else if ($_GET['login_user'] == "belum_login") {
            echo "<script>alert('Anda harus login terlebih dahulu!')</script>";
        }
    }
    ?>

    <main role="main" class="container">

        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <form method="POST" action="login_proses.php">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="type" class="form-control" name="id" required autofocus>
                                <small class="form-text text-danger">Username Wajib Diisi</small>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password" required>
                                <small class="form-text text-danger">Password Wajib Diisi</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="assets/libs/jquery/jquery-3.4.1.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>