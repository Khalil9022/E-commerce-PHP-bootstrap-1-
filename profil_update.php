<?php
include "template/connect.php"
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Register</title>

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
    session_start();
    $id = $_SESSION['id'];
    require "template/header.php";
    $query_customer = mysqli_query($konek, "SELECT * FROM customers WHERE username = '$id'");
    $data_customer = mysqli_fetch_assoc($query_customer);
    // proses daftar

    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        $cid = $data_customer['customer_id'];
        if ($password != $password2) {
            echo "<script>alert('Wrong password')</script>";
            echo "<script>location='profil_update.php'</script>";
        } else {
            $query = mysqli_query($konek, "UPDATE customers SET username = '$username',
                                            first_name = '$first_name' , 
                                            last_name = '$last_name' ,
                                            password = '$password' ,
                                            email_id = '$email' , 
                                            address = '$address' 
                                            WHERE customer_id = '$cid' ");

            echo "<script>alert('Succes!')</script>";
            echo "<script>location='profile.php'</script>";
        }
    }

    ?>

    <main role="main" class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header">Register</div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="formGroupExampleInput">Username</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" value="<?php echo $data_customer['username']; ?>" name="username" required autofocus>
                                <small class="form-text text-danger">Nama Wajib Diisi</small>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">First_name</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" value="<?php echo $data_customer['first_name']; ?>" name="first_name" required>
                                <small class="form-text text-danger">Wajib Diisi</small>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Last_name</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" value="<?php echo $data_customer['last_name']; ?>" name="last_name" required>
                                <small class="form-text text-danger">Wajib Diisi</small>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Password</label>
                                <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="Input Password" name="password" required>
                                <small class="form-text text-danger">Wajib Diisi</small>
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Reenter Password</label>
                                <input type="password" class="form-control" id="formGroupExampleInput2" placeholder="reenter password" name="password2" required>
                                <small class="form-text text-danger">Wajib Diisi</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Email</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" value="<?php echo $data_customer['email_id']; ?>" name="email" required>
                                <small class="form-text text-danger">Wajib Diisi</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Address</label>
                                <input type="text" class="form-control" id="formGroupExampleInput2" value="<?php echo $data_customer['address']; ?>" name="address">
                                <small class="form-text text-danger">Wajib Diisi</small>
                            </div>
                            <input type="submit" name="submit" value="Register" class="btn btn-primary">
                            <input type="reset" name="reset" value="Clear" class="btn btn-primary">

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