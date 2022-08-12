<header class="header">
    <div class="flex">
        <a href="index.php" class="logo">LOGO</a>

        <nav class="navbar">
            <a href="admin.php">Masukan Prouduk</a>
            <a href="products.php">Lihat Produk</a>
            <a href="laporan.php">Laporan</a>
        </nav>
        <?php
        include 'config.php';
        $select_rows = mysqli_query($conn, "SELECT * FROM cart") or die('query gagal');
        $row_count = mysqli_num_rows($select_rows);
        ?>

        <a href="cart.php" class="cart">Keranjang <span><?php echo $row_count ?></span></a>

        <div id="menu-btn" class="fas fa-bars"></div>
    </div>
</header>