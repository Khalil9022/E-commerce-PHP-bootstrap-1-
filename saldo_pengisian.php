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
                    <?php
                    if (!isset($_POST['pengisian'])) {
                        ?>
                        <div class="card-body">
                            <span>Pilih Penambahan Saldo :
                                <form action="" method="POST">
                                    <select name="pengisian" class="custom-select">
                                        <option selected value="">Open this select menu</option>
                                        <option value="5000" require_once>Rp. 5000,00</option>
                                        <option value="10000" require_once>Rp. 10000,00</option>
                                        <option value="20000" require_once>Rp. 20000,00</option>
                                        <option value="50000" require_once>Rp. 50000,00</option>
                                        <option value="100000" require_once>Rp. 100000,00</option>
                                    </select>
                                    <input type="submit" class="btn btn-primary" value="submit">
                                </form>
                            </span>
                        </div>
                    <?php } ?>
                    <div class="card-body">
                        <?php
                        if (isset($_POST['pengisian'])) {
                            if ($_POST['pengisian'] == "") {
                                echo "<script>alert('Silahkan Pilih Berapa Banyak Pengisian saldo terlebih dahulu!')</script>";
                                echo "<script>location='saldo_pengisian.php'</script>";
                            }
                            $cid = $_SESSION['id'];
                            $saldo_pengisian = $_POST['pengisian'];
                            $query_customer = mysqli_query($konek, "SELECT * FROM customers WHERE username = '$cid'");
                            $data_customer = mysqli_fetch_assoc($query_customer);
                            ?>

                            <p>Nama : <?php echo $data_customer['first_name'] . " " . $data_customer['last_name']; ?></p>
                            <p>Saldo Awal : <?php echo $data_customer['saldo']; ?></p>
                            <p>Penambahan : <?php echo $saldo_pengisian; ?></p>
                            <p>Total Saldo : <?php echo $data_customer['saldo'] + $saldo_pengisian; ?></p>
                            <p>Apakah anda yakin ? </p>
                            <a href="saldo_pengisian_proses.php?saldo=<?php echo $saldo_pengisian; ?>" class="btn btn-primary">OK </a>
                            <a href="saldo_pengisian.php" class="btn btn-secondary">Cancel</a>

                        <?php
                        }
                        ?>
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
                                <a href="saldo_pengisian.php" class="list-group-item list-group-item-action active  ">
                                    Pengisian Saldo
                                </a>
                                <a href="saldo_history.php" class="list-group-item list-group-item-action  ">
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