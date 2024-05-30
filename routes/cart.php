<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "project_akhir_web");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

if (isset($_SESSION['userUpdate'])) {
    $user_data = $_SESSION['userUpdate'];

    $id_user = $user_data['id_user'];
    $password = $user_data['password'];
    $username = $user_data['username'];
    $alamat = $user_data['alamat_user'];
    $nomorHp = $user_data['no_hp'];
    $emailUser = $user_data['email'];
    $foto = $user_data['gambar'];
} else if (isset($_SESSION['userData'])) {
    $user_data = $_SESSION['userData'];

    $id_user = $user_data['id_user'];
    $password = $user_data['password'];
    $username = $user_data['username'];
    $alamat = $user_data['alamat_user'];
    $nomorHp = $user_data['no_hp'];
    $emailUser = $user_data['email'];
    $foto = $user_data['gambar'];
} else if (isset($_SESSION['adminData'])) {
    $user_data = $_SESSION['adminData'];

    $id_user = $user_data['id_admin'];
    $password = $user_data['password'];
    $username = $user_data['username'];
    $alamat = $user_data['alamat_admin'];
    $nomorHp = $user_data['no_hp'];
    $emailUser = $user_data['email'];
    $foto = $user_data['gambar'];
} else {
    header("location: ../login.php?pesan=belum_login");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>AloeVera</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat:wght@500&family=Poppins:wght@200;300&family=Salsa&display=swap');

        :root {
            --hijauGelap: #006900;
            --hijauMuda: #00FF00;
        }

        body {
            width: 100%;
            height: 100vh;
            background-color: #F5F5F5;
        }

        /* Home Page */
        .navbar {
            font-family: "Poppins";
            box-shadow: 0px 1px 2px rgb(47, 46, 46);
        }

        .navbar-brand:hover {
            color: white;
        }

        .nav-list a:hover {

            color: var(--hijauMuda);
        }

        .bg-body-primary {
            background-color: var(--hijauGelap);
        }

        .bg-body-primary .h1Editable a {
            color: white;
        }

        .navbarContainer .navbar-brand {
            color: white;
        }

        .navbarContainer .active {
            color: initial;
            color: #00FF00 !important;
        }

        .form-control {
            height: 30px;
        }

        .btn.btn-outline-secondary {
            height: 30px;
        }

        .wrapperProfile {
            min-height: 100vh;
            padding-top: 80px;
        }

        .customFooter {
            background-color: #006900;
            color: white;
            padding: 2px 0;
        }

        .profilePhoto {
            object-fit: cover;
        }

        .card {
            height: 100%;
            display: flex;
            flex-direction: row;
            box-shadow: 2px 2px 5px #888888;
        }

        .card img {
            object-fit: cover;
            width: 150px;
            height: 150px;
        }

        .card-body {
            flex: 1;
        }

        .containerProduct {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .wrapperProduct {
            width: 80vw;
        }

        .kategori-buttons a {
            width: max-content;
            height: max-content;
        }

        .customLetakKategori {
            position: absolute;
            background-color: #00FF00;
            color: black;
            padding: 0px 10px 0px 10px;
            border-radius: 20px;
            font-size: 14px;
            top: 270px;
            left: 10px;
        }

        .customImgCart a img {
            width: 22px;
            height: 22px;
        }

        .customButtonDark {
            padding: initial;
            padding: 5px;
        }

        .popupCart {
            background-color: rgba(0, 0, 0, 0.3);
            width: 100%;
            height: 100%;
            position: fixed;
            display: grid;
            place-items: center;
            z-index: 999;
        }

        .flexxPopup {
            display: flex;
            flex-direction: column;
        }

        .confirmBuying {
            width: 80vw;
            padding: 20px;
            background-color: white;
        }

        .pembayaran {
            width: calc(80vw - 40px);
            display: flex;
        }

        .dropdown-menu {
            margin-top: 0;
            display: none;
            position: absolute;
        }

        .dropdown-menu a {
            color: black;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
            top: 27px;
            left: calc(100% - 180px);
        }
    </style>
</head>

<body>
    <header class="headerProfile">
        <nav class="navbar bg-body-primary navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">
                <div class="h1Editable">
                    <a class="navbar-brand"><img class="me-3 mb-1" src="../assets/pictures/logoLB.png" alt="Logonya" width="40px">Natify AloeVera</a>
                </div>
                <div class="nav-list d-flex justify-content-center align-items-center navbarContainer">
                    <a href="../rumah.php" class="navbar-brand">Home</a>
                    <a href="product.php" class="navbar-brand">Product</a>
                    <a href="cart.php" class="navbar-brand active">Cart</a>
                    <a href="about.php" class="navbar-brand">Forum</a>
                    <div class="dropdown">
                        <a href="profile.php" class="navbar-brand"> <img class="profilePhoto rounded-circle" src="../assets/uploads/users/<?php echo $foto ?>" alt="Profile Photo" width="30px" height="30px"></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="profile.php">Profil Saya</a>
                            <a class="dropdown-item" href="pesanan_saya.php">Pesanan Saya</a>
                            <a class="dropdown-item" href="../handler/logout.php">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <?php
    if (isset($_SESSION['data_produk'])) {
        $data_produk = $_SESSION['data_produk'];

        $id_produk = $data_produk['id_produk'];
        $nama_produk = $data_produk['nama_produk'];
        $id_kategori = $data_produk['id_kategori'];

        $kategori_query = "SELECT nama_kategori FROM kategori WHERE id_kategori = '$id_kategori'";
        $kategori_result = $koneksi->query($kategori_query);

        if ($kategori_result->num_rows > 0) {
            $kategori_data = $kategori_result->fetch_assoc();
            $nama_kategori = $kategori_data['nama_kategori'];
        } else {
            $nama_kategori = "Tidak ada dalam database!";
        }

        $deskripsi_produk = $data_produk['deskripsi_produk'];
        $harga_produk = $data_produk['harga_produk'];
        $gambar_produk = $data_produk['gambar_produk'];
    }

    if (isset($_GET["pesan"])) {
        if ($_GET["pesan"] == "hapus") {
            echo '
            <div class="popupCart">
                <div class="alert alert-success mb-4 flexxPopup" role="alert">
                    <p class="mb-3">Produk dalam keranjang berhasil dihapus!</p>
                    <a href="cart.php" class="btn btn-success">Oke</a>
                </div>
            </div>';
        } else if ($_GET["pesan"] == "berhasilBeli") {
            echo '
            <div class="popupCart">
                <div class="alert alert-success mb-4 flexxPopup" role="alert">
                    <p class="mb-3 mx-auto">Produk berhasil dibeli!</p>
                    <div class="d-flex mx-auto">
                        <a href="cart.php" class="btn btn-success me-3">Oke</a>
                        <a href="pesanan_saya.php" class="btn btn-primary">Pesanan Saya</a>
                    </div>
                </div>
            </div>';
        } else if ($_GET["pesan"] == "buyingCart") {
            echo '
                <div class="popupCart">
                    <div class="confirmBuying">
                        <div class="d-flex justify-content-between">
                            <h2 class="mb-3">Detail Produk</h2>
                            <a href="cart.php" class="btn btn-danger mb-3 pe-3 ps-3">X</a>
                        </div>
                        <table class="table table-bordered">
                            <tr>
                                <td><img src="../assets/uploads/product/' . $gambar_produk . '" alt="' . $nama_produk . '" style="max-width: 300px;"></td>
                                <td>
                                    <h4>' . $nama_produk . '</h4>
                                    <a>Kategori: ' . $nama_kategori . '</a> <br>
                                    <a>Deskripsi: ' . $deskripsi_produk . '</a>
                                </td>
                            </tr>
                            <tr>
                                <th>Harga</th>
                                <td>Rp' . $harga_produk . '</td>
                            </tr>
                        </table>
                        <div class="pembayaran">
                            <form action="../handler/check_toHistoriCart.php?id=' . $id_produk . '" class="d-flex ms-auto align-items-center" method="post">
                                <label for="bayar" class="form-label m-0 me-2">Pembayaran</label>
                                <input type="text" class="form-control me-3" name="pembayaran" placeholder="Nominal" required>
                                <input type="number" class="form-control me-3" name="jumlahProduk" placeholder="Jumlah Produk" required >
                                <button type="submit" class="btn btn-success">Buy</button>
                            </form>
                        </div>
                    </div>
                </div>';
        }
    }
    ?>
    <main class="wrapperProfile">
        <div class="containerProduct">
            <div class="wrapperProduct">
                <h2>Keranjang</h2>
                <hr>
                <div class="m-0">
                    <?php

                    $keranjang_query = "SELECT * FROM keranjang where id_user = '$id_user'";
                    $keranjang_result = $koneksi->query($keranjang_query);

                    if ($keranjang_result->num_rows > 0) {
                        while ($keranjang_row = $keranjang_result->fetch_assoc()) {
                            $id_produk_in_keranjang = $keranjang_row['id_produk'];

                            $produk_query = "SELECT * FROM produk WHERE id_produk = '$id_produk_in_keranjang'";
                            $produk_result = $koneksi->query($produk_query);

                            if ($produk_result->num_rows > 0) {
                                while ($produk_row = $produk_result->fetch_assoc()) {
                                    $id_kategori = $produk_row['id_kategori'];

                                    // Query untuk mengambil nama kategori berdasarkan id_kategori
                                    $kategori_query = "SELECT nama_kategori FROM kategori WHERE id_kategori = '$id_kategori'";
                                    $kategori_result = $koneksi->query($kategori_query);

                                    if ($kategori_result->num_rows > 0) {
                                        $kategori_data = $kategori_result->fetch_assoc();
                                        $nama_kategori = $kategori_data['nama_kategori'];
                                    } else {
                                        $nama_kategori = "Tidak ada dalam database!";
                                    }
                    ?>
                                    <div class="row-md-3 mb-3">
                                        <div class="card">
                                            <img src="../assets/uploads/product/<?php echo $produk_row['gambar_produk']; ?>" class="card-img-top" alt="<?php echo $produk_row['nama_produk']; ?>">
                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title"><?php echo $produk_row['nama_produk']; ?></h5>
                                                <p class="card-text m-0">Harga: Rp<?php echo $produk_row['harga_produk']; ?></p>
                                                <p class="card-text m-0">Kategori: <?php echo $nama_kategori; ?></p>
                                                <div class="mt-auto d-flex ms-auto customImgCart">
                                                    <a href="../handler/check_buyingCart.php?id=<?php echo $produk_row['id_produk'] ?>" class="btn btn-primary me-3">Details & Buy</a>
                                                    <a href="../handler/check_hapusCart.php?id=<?php echo $produk_row['id_produk'] ?>" class="btn btn-danger pe-2 ps-2 customButtonDark">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    <?php
                                }
                            }
                        }
                    } else {
                        echo '<div style="height: 75vh; display: flex; align-items: center; padding: 0 !important; margin: 0 !important"><div class="alert alert-warning" role="alert" style="width: 80vw; margin-bottom: 0 !important">Keranjang kosong!</div></div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </main>
    <footer class="d-flex justify-content-center customFooter">
        <a>&copy; By Kelompok 2. All Rights Reserved.</a>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>