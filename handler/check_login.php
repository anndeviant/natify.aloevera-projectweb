<?php
session_start();

include "connection.php";

// Ambil data form
$username = $_GET["username"];
$password = $_GET["password"];

// Check kondisi database dengan form di kedua tabel
$login_proses_user = mysqli_query($mydb, "SELECT * FROM data_user WHERE username = '$username' AND password = '$password'");
$login_proses_admin = mysqli_query($mydb, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");

$check_user = mysqli_num_rows($login_proses_user);
$check_admin = mysqli_num_rows($login_proses_admin);

if ($check_user > 0) {
    $dataLogin = mysqli_fetch_assoc($login_proses_user);
    $_SESSION["userData"] = $dataLogin;
    $_SESSION["status"] = "Login Berhasil!";
    header("location:../rumah.php");
} elseif ($check_admin > 0) {
    $dataLogin = mysqli_fetch_assoc($login_proses_admin);
    $_SESSION["adminData"] = $dataLogin;
    $_SESSION["status"] = "Login Berhasil!";
    header("location:../rumah.php");
} elseif (empty($username) && empty($password)) {
    header("Location: ../login.php?pesan=belum_login");
    exit;
} else {
    header("location: ../login.php?pesan=gagal");
}
