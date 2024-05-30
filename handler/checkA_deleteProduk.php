<?php
session_start();

include("connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $kueri = "DELETE FROM produk WHERE id_produk = '$id'";
    $query = mysqli_query($mydb, $kueri);

    if ($query) {
        header("Location: ../routes/product_admin.php?pesan=hapusProduk");
    } else {
        echo "Hapus Product gagal";
    }
} else {
    echo "ID not set in POST data.";
}
