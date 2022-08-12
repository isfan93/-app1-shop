<?php @include "config.php"; ?>
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

    <style>
        .input-box input {
            background-color: white;
            max-width: 50rem;
            border-radius: .5rem;
            text-align: center;
            padding: 1.5rem;
            margin: 0 auto;
            margin-bottom: 2rem;
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .1);
            border: .1rem solid #999;
            flex: 1 1 40rem;
            font-size: 20px;
            color: black;
        }

        .flex {
            font-size: 15px;
        }

        .btn-lap {
            color: white;
            background-color: #3d5286;
            display: block;
            width: 150%;
            text-align: center;
            font-size: 1.7rem;
            padding: 1.2rem 3rem;
            border-radius: .5rem;
            cursor: pointer;
            margin: 0 auto;
            text-align: center;
        }

        .btn-l {
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <?php include "header.php";
    ?>
    <div class="container">
        <!-- <section class="checkout-form">
            <h3 class="heading">Rekap Laporan</h3>
            <form action="" method="post">
                <div class="display-laporan">
                    <div class="flex">
                        <div class="input-box">
                            <span>Dari </span>
                            <input id="tgl1" name="tgl1" type="date" placeholder="Masukan nama kamu" name="name" required>
                        </div>
                        <div class="input-box">
                            <span>Hingga </span>
                            <input id="tgl2" name="tgl2" type="date" placeholder="Masukan nama kamu" name="name" required>
                        </div>
                        <div class="btn-l">
                            <input class="btn-lap" type="submit" value="Cari" name="submit">
                        </div>
                    </div>
                </div>
            </form>

        </section> -->
        <div class="container">
            <section class="shopping-cart">
                <h1 class="heading">Semua Penjualan</h1>
                <table>
                    <input type="text">
                    <thead>
                        <th>Nama</th>
                        <th>No Hp</th>
                        <th>Alamat</th>
                        <th>Metode Pembayaran</th>
                        <th>Tanggal</th>
                        <th>Pembelian</th>
                        <th>Total Bayar</th>
                    </thead>
                    <tbody>

                        <?php
                        $select_cart = mysqli_query($conn, "SELECT * FROM `order`");
                        $grand_total = 000;
                        if (mysqli_num_rows($select_cart) > 0) {
                            while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {    ?>

                                <tr>
                                    <td><?php echo $fetch_cart['name']; ?></td>
                                    <td><?= $fetch_cart['number']; ?></td>
                                    <td><?= $fetch_cart['alamat']; ?></td>
                                    <td><?= $fetch_cart['method']; ?></td>
                                    <td><?= date("d M Y", strtotime($fetch_cart['tanggal'])); ?></td>
                                    <td><?= $fetch_cart['total_products']; ?></td>
                                    <td>Rp. <?php echo number_format($fetch_cart['total_price']);  ?></td>
                                </tr>

                        <?php

                            };
                        };
                        ?>
                        <?php
                        $count = mysqli_query($conn, "SELECT count(name), sum(total_price) FROM `order`");
                        list($name, $total) = mysqli_fetch_array($count);
                        ?>
                        <tr class="table-bottom">
                            <!-- <td><a href="products.php" class="option-btn" style="margin-top: 0">Lanjut Belanja</a></td> -->
                            <td colspan="6">Total </td>
                            <td>Rp. <?php echo number_format($total); ?></td>
                            <!-- <td><a href="cart.php?delete_all" onclick="return confirm('Yakin Hapus semua ? ');" class="delete-btn"><i class="fas fa-trash"></i>Hapus Semua</a></td> -->
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</body>

</html>