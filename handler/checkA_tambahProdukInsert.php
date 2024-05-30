<?php
session_start();
include "connection.php";

$namaProduk = $_POST["nama"];
$kategori = $_POST["kategori"];
$deskripsiProduk = $_POST["deskripsi"];
$hargaProduk = $_POST["harga"];
$foto = $_FILES["photo"]["name"];
$tmp_foto = $_FILES["photo"]["tmp_name"];

move_uploaded_file($tmp_foto, "../assets/uploads/product/" . $foto);

$querySet = "INSERT INTO produk SET nama_produk = '$namaProduk', id_kategori = '$kategori', deskripsi_produk = '$deskripsiProduk', harga_produk = '$hargaProduk', gambar_produk = '$foto'";
$result = mysqli_query($mydb, $querySet);

if ($result) {
    header("Location: ../routes/product_admin.php?pesan=berhasiltambah");
} else {
    die("Error: " . mysqli_error($mydb));
}
