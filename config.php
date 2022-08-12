<?php

$conn = mysqli_connect("localhost", "root", "", "app1-shop");

if (!$conn) {
    die("Koneksi Database Gagal : " . mysqli_connect_error());
}
