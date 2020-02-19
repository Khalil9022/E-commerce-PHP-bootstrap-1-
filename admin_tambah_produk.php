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

        if (isset($_POST['submit'])) {
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
                $namaFileBaru = 'default.png';
            }


            // end
            $query = mysqli_query($konek, "INSERT INTO product (product_id,kategori_id, product_name, product_price, product_quantity, img) 
                    VALUES ('', '$kategori', '$produk', '$harga', '$jumlah', '$namaFileBaru')");
            echo "<script>alert('Berhasil menambahkan barang!')</script>";
            echo "<script>location='index.php'</script>";
        }
        ?>

     <main role="main" class="container">
         <div class="row">
             <div class="col-md-9 ">
                 <form method="POST" enctype="multipart/form-data">
                     <div class="card" style="width: 40rem;">
                         <div class="card-body">
                             <h4>TAMBAH BARANG</h4>
                             <div class="form-group">
                                 <label for="formGroupExampleInput">Nama Produk</label>
                                 <input type="text" class="form-control" id="formGroupExampleInput" name="produk">
                             </div>
                             <div class="form-group">
                                 <label for="formGroupExampleInput2">Harga Produk</label>
                                 <input type="text" class="form-control" id="formGroupExampleInput2" name="harga">
                             </div>
                             <div class="form-group">
                                 <label for="formGroupExampleInput2">Jumlah Produk</label>
                                 <input type="text" class="form-control" id="formGroupExampleInput2" name="jumlah">
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