<?php

@include "config.php";

if (isset($_POST['add_to_cart'])) {
    $prod_name = $_POST['product_name'];
    $prod_price = $_POST['product_price'];
    $prod_image = $_POST['product_image'];
    $prod_quantity = 1;

    $select_cart = mysqli_query($conn, "SELECT * FROM cart WHERE name = '$prod_name'");

    if (mysqli_num_rows($select_cart) > 0) {
        $message[] = 'Produk sudah ada didalam keranjang';
    } else {
        $insert_prod = mysqli_query($conn, "INSERT INTO cart (name, price, image, quantity) VALUES ('$prod_name','$prod_price','$prod_image','$prod_quantity')");
        $message[] = 'Produk berhasil ditambahkan ke keranjang';
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


    <?php

    if (isset($message)) {
        foreach ($message as $message) {
            echo '<div class="message"><span>' . $message . '</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
        };
    };

    ?>
    <?php include "header.php" ?>

    <div class="container">
        <section class="products">
            <h1 class="heading">Produk Terbaru</h1>
            <div class="box-container">

                <?php

                $select_product = mysqli_query($conn, "SELECT * FROM products");
                if (mysqli_num_rows($select_product) > 0) {
                    while ($fetch_prod = mysqli_fetch_assoc($select_product)) { ?>
                        <form action="" method="post">
                            <div class="box">
                                <img src="img/<?php echo $fetch_prod['image']; ?>" alt="">
                                <h3><?php echo $fetch_prod['name']; ?></h3>
                                <div class="price">Rp. <?php echo $fetch_prod['price']; ?></div>
                                <input type="hidden" name="product_name" value="<?php echo $fetch_prod['name']; ?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_prod['price']; ?>">
                                <input type="hidden" name="product_image" value="<?php echo $fetch_prod['image']; ?>">
                                <input type="submit" value="tambah ke keranjang" class="btn" name="add_to_cart">
                            </div>
                        </form>
                <?php
                    }
                }
                ?>

            </div>
        </section>

        <script src="js/script.js"></script>
    </div>
</body>

</html>