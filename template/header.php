<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark shadow">
    <div class="container">
        <a class="navbar-brand" href="index.php">Mirota Kampus</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <ul class="navbar-nav ">
                <li class="nav-item">
                    <?php
                    if (isset($_SESSION['id'])) {
                        $query_saldo = mysqli_query($konek, "SELECT saldo FROM customers where username = '" . $_SESSION['id'] . "' ");
                        $saldo = mysqli_fetch_assoc($query_saldo);
                        ?>
                        <a class="nav-link" href="saldo_pengisian.php">Saldo : <?php echo $saldo['saldo'] ?> </a>
                    <?php
                    }
                    ?>

                </li>
                <li class="nav-item">
                    <?php if (isset($_SESSION['id'])) : ?>
                        <?php
                            if (!isset($_SESSION['jumlah_cart'])) {
                                ?><a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i>Cart (0)</a>
                        <?php
                            } else {
                                // echo "<pre>";
                                // print_r($_SESSION['jumlah_cart']);
                                // echo "</pre>";
                                ?>
                            <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i>Cart (<?php echo $_SESSION['jumlah_cart']; ?>)</a>
                        <?php
                            }
                            ?>
                    <?php endif; ?>
                </li>
                <?php
                if (!isset($_SESSION['id']) && !isset($_SESSION['admin'])) {
                    ?>

                    <li class="nav-item">
                        <a href="login.php" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="customer_register.php" class="nav-link">Register</a>
                    </li>
                <?php } ?>

                <?php if (isset($_SESSION['admin'])) {
                    ?>

                    <li class="nav-item">
                        <a href="admin_data.php" class="nav-link">Data</a>
                    </li>
                    <li class="nav-item">
                        <a href="admin_tambah_produk.php" class="nav-link">Tambah Produk</a>
                    </li>
                    <li class="nav-item">
                        <a href="admin_cek_order.php" class="nav-link">Pengiriman</a>
                    </li>

                <?php } ?>

                <?php if (isset($_SESSION['id']) || isset($_SESSION['admin'])) : ?>
                    <li class="nav-item dropdown">
                        <?php if (isset($_SESSION['admin'])) : ?>
                            <a href="#" class="nav-link dropdown-toggle" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown-2">
                                <a href="profile.php" class="dropdown-item">Profile</a>
                            <?php else : ?>
                                <a href="#" class="nav-link dropdown-toggle" id="dropdown-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">User</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown-2">
                                    <a href="profile.php" class="dropdown-item">Profile</a>
                                    <a href="order.php" class="dropdown-item">Orders</a>
                                <?php endif; ?>

                                <?php
                                    if (isset($_SESSION['id'])) {
                                        ?>
                                    <a href="saldo_pengisian.php" class="dropdown-item">Isi Saldo</a>
                                <?php  }

                                    if (isset($_SESSION['id']) || isset($_SESSION['admin'])) {
                                        ?>
                                    <a href="logout.php" class="dropdown-item">Logout</a>
                                <?php } ?>
                                </div>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>