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

        $query = mysqli_query($konek, "SELECT p.* , k.* FROM product p INNER JOIN kategori k ON p.kategori_id = k.kategori_id 
                                    WHERE p.product_id = '" . $_GET['id'] . "'");
        $data = mysqli_fetch_assoc($query);

        //contoh navbar besar 
        include "template/header.php";
        ?>

     <!-- detail produk  -->
     <div class="container">
         <span>
             <a href="index.php">Mirota </a> >
             <a href="customer_produk_detail.php?id=<?php echo $data['product_id'] ?>"> <?php echo $data['product_name'] ?> </a>
         </span>
         <div class="row">
             <div class="col">
                 <table class="table table-hover bg-white">

                     <tr>
                         <td>ID Produk</td>
                         <td>:</td>
                         <td> <?php echo $data['product_id'] ?> </td>
                     </tr>
                     <tr>
                         <td>Nama Produk</td>
                         <td>:</td>
                         <td><?php echo $data['product_name'] ?></td>
                     </tr>
                     <tr>
                         <td>Kategori</td>
                         <td>:</td>
                         <td><?php echo $data['kategori_nama'] ?></td>
                     </tr>
                     <tr>
                         <td>Harga</td>
                         <td>:</td>
                         <td>Rp.<?php echo $data['product_price'] ?>,00</td>
                     </tr>
                     <tr>
                         <td>Stok</td>
                         <td>:</td>
                         <td><?php echo $data['product_quantity'] ?></td>

                     </tr>

                 </table>
                 <?php if (isset($_SESSION['id'])) : ?>
                     <form method="GET" action="cart_proses.php">
                         <input type="text" name="quantity" class="form-control" value="1">
                         <input type="hidden" name="id" value="<?php echo $data["product_id"]; ?>">
                         <input type="submit" style="margin-top:5px;" class="btn btn-success" value="Add to Cart">
                     </form>
                 <?php endif; ?>
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
     </div>
     </main>

     <script src="assets/libs/jquery/jquery-3.4.1.min.js"></script>
     <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
 </body>

 </html>