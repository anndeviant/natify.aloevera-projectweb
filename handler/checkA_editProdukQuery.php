<?php
session_start();
include "connection.php";

$id_produk = $_GET["id"];
$namaProduk = $_POST["nama"];
$kategori = $_POST["kategori"];
$deskripsiProduk = $_POST["deskripsi"];
$hargaProduk = $_POST["harga"];
$foto = $_FILES["photo"]["name"];
$tmp_foto = $_FILES["photo"]["tmp_name"];

move_uploaded_file($tmp_foto, "../assets/uploads/product/" . $foto);

$querySet = "UPDATE produk 
             SET nama_produk = '$namaProduk', id_kategori = '$kategori', deskripsi_produk = '$deskripsiProduk', harga_produk = '$hargaProduk', gambar_produk = '$foto'
             WHERE id_produk = '$id_produk'";

$result = mysqli_query($mydb, $querySet);

if ($result) {
    header("Location: ../routes/product_admin.php?pesan=berhasiledit");
} else {
    die("Error: " . mysqli_error($mydb));
}
