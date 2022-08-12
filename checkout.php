<?php
@include "config.php";



if (isset($_POST['order_btn'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $alamat = $_POST['alamat'];

    $cart_query = mysqli_query($conn, "SELECT * FROM cart");
    $price_total = 0;
    if (mysqli_num_rows($cart_query) > 0) {
        while ($product_item = mysqli_fetch_assoc($cart_query)) {
            $product_name[] = $product_item['name'] . '(' . $product_item['quantity'] . ')';
            $product_price = $product_item['price'] * $product_item['quantity'];
            $price_total += $product_price;
        }
    }

    $total_product = implode(', ', $product_name);
    $detail_query = mysqli_query($conn, "INSERT INTO `order` (name, number, email,method,alamat,tanggal,total_products,total_price) VALUES('$name','$number','$email','$method','$alamat',NOW(),'$total_product','$price_total')") or die('queri salah');

    if ($cart_query && $detail_query) {
        echo "
        <div class='order-message-container'>
        <div class='message-container'>
            <h3>Terima Kasih Sudah Belanja di Toko Kami</h3>
            <div class='order-detail'>
                <span>" . $total_product . "</span>
                <span class=''total> total : Rp. " . $price_total . "</span>
            </div>
            <div class='customer-details'>
                <p>Nama : <span>" . $name . "</span></p>
                <p>No Hp : <span>" . $number . "</span></p>
                <p>Email : <span>" . $email . "</span></p>
                <p>Alamat : <span>" . $alamat . "</span></p>
                <p>Metode Pembayaran : <span>" . $method . "</span></p>
            </div>
            <a href='deletecart.php?' class='btn'>Lanjut Berbelanja</a>
        </div>
        </div>
        
        ";
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <?php include "header.php"; ?>

    <div class="container">
        <section class="checkout-form">
            <h1 class="heading">Lengkapi Pesanan</h1>
            <form action="" method="POST">
                <div class="display-order">

                    <?php
                    $select_cart = mysqli_query($conn, "SELECT * FROM cart");
                    $total = 0;
                    $grand_total = 0;
                    if (mysqli_num_rows($select_cart) > 0) {
                        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                            $total_price = $fetch_cart['price'] * $fetch_cart['quantity'];
                            $grand_total = $total += $total_price;
                    ?>

                            <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>

                    <?php
                        }
                    } else {
                        echo "<div class='display-order'><span>Keranjang Kosong !</span></div>";
                    }
                    ?>

                    <span class="grand-total">total harga : Rp. <?= $grand_total; ?></span>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>Nama Kamu</span>
                        <input type="text" placeholder="Masukan nama kamu" name="name" required>
                    </div>
                    <div class="inputBox">
                        <span>No Telfon</span>
                        <input type="number" placeholder="Masukan no Hp" name="number" required>
                    </div>
                    <div class="inputBox">
                        <span>Email</span>
                        <input type="email" placeholder="Masukan email kamu" name="email" required>
                    </div>
                    <div class="inputBox">
                        <span>Metode Pembayaran</span>
                        <select name="method" id="">
                            <option value="cash on delivery">Cash On Delivery (COD)</option>
                            <option value="credit cart">Kartu Kredit</option>
                            <option value="cash">Cash</option>
                        </select>
                    </div>
                    <div class="inputBox">
                        <span>Alamat</span>
                        <input type="text" placeholder="Alamat" name="alamat" required>
                    </div>
                </div>
                <input type="submit" value="Bayar Sekarang" name="order_btn" class="btn">
            </form>
        </section>
    </div>
    <script src="js/script.js"></script>
</body>

</html>