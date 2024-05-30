<?php
session_start();

include("connection.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $kueri = "DELETE FROM komentar WHERE id_komentar = '$id'";
    $query = mysqli_query($mydb, $kueri);

    if ($query) {
        header("Location: ../routes/about.php?pesan=hapus");
    } else {
        echo "Hapus Komentar gagal";
    }
} else {
    echo "ID not set in POST data.";
}
