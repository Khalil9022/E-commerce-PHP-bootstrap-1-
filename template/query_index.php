 <?php
        $konek = mysqli_connect("localhost", "root", "", "toko_mirota");
        $perpage = 4;
        $page = isset($_GET["halaman"]) ? (int) $_GET["halaman"] : 1;
        $start = ($page > 1) ? ($page * $perpage) - $perpage : 0;

        $result = mysqli_query($konek, "SELECT p.img, p.product_id, p.product_name, p.product_price , p.product_quantity , k.kategori_nama , k.kategori_id
            FROM product p INNER JOIN kategori k ON p.kategori_id = k.kategori_id");
        $total = mysqli_num_rows($result);
        $total_page = ceil($total/$perpage);

    if (isset($_GET['search'])) {
        $nilai_search = $_GET['nilai'];
        $searching = "SELECT p.img, p.product_id, p.product_name, p.product_price , p.product_quantity , k.kategori_nama , k.kategori_id
 FROM product p INNER JOIN kategori k ON p.kategori_id = k.kategori_id WHERE p.product_name LIKE '$nilai_search%' LIMIT $start, $page";
    } else {
        $searching = "SELECT p.img, p.product_id, p.product_name, p.product_price , p.product_quantity , k.kategori_nama , k.kategori_id
 FROM product p INNER JOIN kategori k ON p.kategori_id = k.kategori_id  LIMIT $start, $perpage";
    }

    if (isset($_GET['kategori_id'])) {
        $kid = $_GET['kategori_id'];
        $query_kategori = mysqli_query($konek, "SELECT * FROM kategori WHERE kategori_id = '$kid'");
        $kategori = mysqli_fetch_assoc($query_kategori);

        $searching = "SELECT p.img, p.product_id, p.product_name, p.product_price , p.product_quantity , k.kategori_nama , k.kategori_id
 FROM product p INNER JOIN kategori k ON p.kategori_id = k.kategori_id WHERE k.kategori_id = '$kid' LIMIT $start, $page";
    }

    if (isset($_GET['urut'])) {
        if ($_GET['urut'] == "termurah") {
            $searching = "SELECT p.img, p.product_id, p.product_name, p.product_price , p.product_quantity , k.kategori_nama , k.kategori_id
 FROM product p INNER JOIN kategori k ON p.kategori_id = k.kategori_id ORDER BY p.product_price ASC LIMIT $start, $page";
        } else {
            $searching = "SELECT p.img, p.product_id, p.product_name, p.product_price , p.product_quantity , k.kategori_nama , k.kategori_id
 FROM product p INNER JOIN kategori k ON p.kategori_id = k.kategori_id ORDER BY p.product_price DESC LIMIT $start, $page";
        }
    }
    ?>