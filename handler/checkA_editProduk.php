
<?php
session_start();

if (isset($_GET['id'])) {
    $id_prod = $_GET['id'];
    $koneksi = new mysqli("localhost", "root", "", "project_akhir_web");

    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    $select_query = "SELECT * FROM produk WHERE id_produk = '$id_prod'";
    $result = $koneksi->query($select_query);

    $check = mysqli_num_rows($result);

    if ($check > 0) {
        $dataLogin = mysqli_fetch_assoc($result);

        $_SESSION["data_edit"] = $dataLogin;
        $_SESSION["status"] = "Login Berhasil!";
        header("location: ../routes/product_admin.php?pesan=edit");
    } else {
        die('Error: ' . $select_query . '<br>' . $koneksi->error);
    }
} else {
    die("ID tidak didapatkan!");
}
