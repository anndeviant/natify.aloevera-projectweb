<?php

session_start();

// $harga = $_POST["pembayaran"];
if (isset($_SESSION['userUpdate'])) {
    $user_data = $_SESSION['userUpdate'];
    $id_user = $user_data['id_user'];
} else if (isset($_SESSION['userData'])) {
    $user_data = $_SESSION['userData'];
    $id_user = $user_data['id_user'];
} else {
    header("location: ../login.php?pesan=belum_login");
    exit();
}

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $jumlahProduk = $_POST['jumlahProduk'];
    $uang = $_POST['pembayaran'];
    $total = $jumlahProduk * $uang;
    $koneksi = new mysqli("localhost", "root", "", "project_akhir_web");

    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    $insert_query = "INSERT INTO histori (id_user, id_produk, jumlah_produk) VALUES ('$id_user', '$product_id', '$jumlahProduk')";

    if ($koneksi->query($insert_query) === TRUE) {
        $_SESSION["id_user"] = $id_user;
        $_SESSION["produk"] = $product_id;
        if ($uang >= $total) {
            header("Location: ../routes/product.php?pesan=berhasilBeli");
        } else if ($uang < $total) {
            header("Location: ../routes/product.php?pesan=uangKurang");
        }
    } else {
        echo "Error: " . $insert_query . "<br>" . $koneksi->error;
    }
} else {
    die("Gagal mendapatkan id!");
}
