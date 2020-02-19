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
    <title>Profile</title>

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

    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        $query_customer =  mysqli_query($konek, "SELECT * FROM customers where username = '" . $_SESSION['id'] . "'");
        $data = mysqli_fetch_assoc($query_customer);
    } else if ($_SESSION['admin']) {
        $query_admin =  mysqli_query($konek, "SELECT * FROM admin where admin_username = '" . $_SESSION['admin'] . "'");
        $data = mysqli_fetch_assoc($query_admin);
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
                        <?php if (isset($_SESSION['id'])) : ?>
                            <li class="list-group-item">
                                <a href="order.php">Orders</a>
                            </li>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="https://placehold.co/150x200" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <p>Nama : <?php echo $data['first_name'] . " " . $data['last_name']; ?></p>
                                <p>Email : <?php echo $data['email_id']; ?></p>
                                <?php if (isset($_SESSION['id'])) : ?>
                                    <p>Address : <?php echo $data['address']; ?></p>
                                    <a href="profil_update.php?id=<?php echo $id ?>" class="btn btn-primary">Edit</a>
                                <?php endif; ?>
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