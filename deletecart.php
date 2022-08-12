<?php
@include "config.php";

mysqli_query($conn, "DELETE FROM `cart`");
header("location:products.php");
