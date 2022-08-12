<?php

@include 'config.php';

// menyimpan data ke database
if (isset($_POST['add_product'])) {
    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];
    $p_image = $_FILES['p_image']['name'];
    $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
    $p_image_folder = 'img/' . $p_image;

    $insert = mysqli_query($conn, "INSERT INTO `products`(name,price,image) VALUES ('$p_name','$p_price','$p_image')") or die("query gagal");

    if ($insert) {
        move_uploaded_file($p_image_tmp_name, $p_image_folder);
        $message[] = 'Produk Berhasil disimapan';
    } else {
        $message[] = 'Produk Gagal disimpan';
    }
};

//menghapus data
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM `products` WHERE id = $delete_id") or die("query gagal");
    if ($delete_query) {
        header("Location:admin.php");
        $message[] = 'Produk berhasil di hapus';
    } else {
        header("Location:admin.php");
        $message[] = 'Produk Gagal di hapus';
    };
};

// update data
if (isset($_POST['update_product'])) {
    $update_p_id = $_POST['update_p_id'];
    $update_p_name = $_POST['update_p_name'];
    $update_p_price = $_POST['update_p_price'];
    $update_p_image = $_FILES['update_p_image']['name'];
    $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
    $update_p_image_folder = 'uploaded_img/' . $update_p_image;

    $update_query = mysqli_query($conn, "UPDATE `products` SET name = '$update_p_name', price = '$update_p_price', image = '$update_p_image' WHERE id = '$update_p_id'");

    if ($update_query) {
        move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
        $message[] = 'Produk Berhasil di Update';
        header("Location:admin.php");
    } else {
        $message[] = 'Produk Gagal di Update';
        header("location:admin.php");
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
    <title>Admin</title>
</head>

<body>
    <?php include "header.php" ?>
    <div class="container">
        <section>

            <form action="" method="post" class="add-product-form" enctype="multipart/form-data">
                <h3>Masukan Produk Baru</h3>
                <input type="text" name="p_name" placeholder="masukan nama produk" class="box" required>
                <input type="number" name="p_price" min="0" placeholder="masukan harga prouduk" class="box" required>
                <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
                <input type="submit" value="Masukan Produk" name="add_product" class="btn">
            </form>
        </section>

        <section class="display-product-table">
            <table>
                <thead>
                    <th>Gambar Produk</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php

                    $select_product = mysqli_query($conn, "SELECT * FROM `products`");
                    if (mysqli_num_rows($select_product) > 0) {
                        while ($row = mysqli_fetch_assoc($select_product)) { ?>
                            <tr>
                                <td><img src="img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['price']; ?></td>
                                <td>
                                    <a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Yakin mau di hapus ? ');"><i class="fas fa-trash"></i>delete</a>
                                    <a href="admin.php?edit=<?php echo $row['id']; ?>" class="option-btn"><i class="fas fa-edit"></i>Update</a>
                                </td>
                            </tr>
                    <?php
                        };
                    } else {
                        echo "<div class='empty'>tidak ada produk yang di input</div>";
                    }
                    ?>
                </tbody>
            </table>
        </section>

        <!-- modal untuk edit/update barang -->
        <section class="edit-form-container">

            <?php
            if (isset($_GET['edit'])) {
                $edit_id = $_GET['edit'];
                $edit_query = mysqli_query($conn, "SELECT * FROM `products` WHERE id = $edit_id");
                if (mysqli_num_rows($edit_query) > 0) {
                    while ($fetch_edit = mysqli_fetch_assoc($edit_query)) {  ?>
                        <form action="" method="post" enctype="multipart/form-data">
                            <img src="img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
                            <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
                            <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
                            <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
                            <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
                            <input type="submit" value="update the prodcut" name="update_product" class="btn">
                            <input type="reset" value="cancel" id="close-edit" class="option-btn">
                        </form>
            <?php
                    };
                };
                echo "<script>document.querySelector('.edit-form-container').style.display='flex';</script>";
            };
            ?>
        </section>
    </div>
    <script src="js/script.js"></script>
</body>

</html>