<?php
session_start();
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
    $foto = "user.png";
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

        .navbar {
            font-family: "Poppins";
            box-shadow: 0px 1px 2px rgb(47, 46, 46);

        }

        .nav-list a:hover {
            color: var(--hijauMuda);
        }


        .bg-body-primary {
            background-color: var(--hijauGelap);
        }

        .bg-body-primary a {
            color: white;
        }

        .form-control {
            height: 30px;
        }

        .btn.btn-outline-secondary {
            height: 30px;
        }

        /* Login */
        .containerLogin {
            width: 100%;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .profilePhoto {
            border-radius: 30px;
            object-fit: cover;
        }

        .headerProfile {
            height: 60px;
        }

        .customFooter {
            background-color: #006900;
            color: white;
            padding: 2px 0;
        }

        .carousel-Wrapper {
            margin: 20px 100px 20px 100px;
            height: 25vh;
        }

        .customCarousel {
            height: 25vh;
            width: calc(100vw - 217px);
        }


        .containerHome {
            width: 100%;
            height: 100vh;
            background-color: white;
        }

        .contentHome {
            padding: 20px 100px 0px 100px;
            display: flex;
            justify-content: space-between;
        }

        .topPicture {
            position: relative;
            display: inline-block;
        }

        .topPicture::before {
            font-family: "Poppins";
            content: "Lip Balm";
            font-weight: 600;
            position: absolute;
            border-radius: 2px;
            bottom: 100px;
            left: 0px;
            padding: 1px 10px;
            font-size: 18px;
            width: fit-content;
            background-color: rgb(123, 222, 255);
            color: black;
        }

        .topPicture img {
            width: 475px;
            height: 475px;
            object-fit: cover;
        }

        .topPicture figcaption {
            width: 475px;
        }

        .topPicture figcaption a {
            font-size: 22px;
            font-weight: bold;
            text-decoration: none;
            color: #333333;
        }

        .datatopPic {
            display: flex;
            padding-left: 0 !important;
        }

        .datatopPic li {
            list-style-type: none;
            display: flex;
            align-items: center;
            margin-right: 15px;
            font-size: 10px;
        }

        .datatopPic li img {
            margin-right: 3px;
        }

        .recentTop {
            display: flex;
            justify-content: space-between;
            color: #606060;
        }

        .recentTop a {
            text-decoration: none;
            color: initial;
            color: #606060;
        }

        .recentTop li {
            text-decoration: none;
            color: black;
        }

        .newsContent {
            width: calc(100% - 500px);
        }

        .newsContent ul li {
            list-style-type: none;
            font-size: 18px;
            font-weight: 600;
        }

        .recentNewsSmall a {
            color: black;
        }

        #allrecentnews {
            border-bottom: 3px solid transparent;
            transition: border-bottom 0.3s ease, color 0.3s ease;
        }

        #allrecentnews:hover {
            color: black;
            border-bottom: 3px solid black;
        }

        .recentNewsSmall li {
            display: flex;
            margin-bottom: 10px;
        }

        .recentNewsSmall li a,
        .recentNewsSmall li span {
            margin-left: 15px;
            text-decoration: none;
        }

        .recentNewsSmall li span {
            font-weight: initial;
            font-size: 12px;
            display: flex;
            align-items: center;
        }

        .newsContent .recentNewsSmall li .konteks {
            font-weight: initial;
            text-decoration: none;
            font-weight: 600;
            font-size: 12px;
            width: fit-content;
            padding: 1px 10px;
            border-radius: 2px;
        }

        .recentNewsSmall li .sports {
            background-color: rgb(255, 130, 85);
        }

        .recentNewsSmall li .business {
            background-color: rgb(175, 255, 46);
        }

        .recentNewsSmall li .technology {
            background-color: rgb(123, 222, 255);
        }

        .recentNewsSmall li .lifestyle {
            background-color: rgb(206, 102, 255);
        }

        .recentNewsSmall li img {
            width: 190px;
            height: 125px;
            aspect-ratio: 190/125;
        }

        #mataRecentTop {
            width: 10px;
            height: 10px;
            margin-left: 10px;
            margin-right: 5px;
        }

        .recentNewsSmall li div {
            display: flex;
            flex-direction: column;
        }

        .wrapper-mainRumah {
            height: auto;
        }

        .figureNewsKecil {
            margin-bottom: 0 !important;
        }

        .articleWrapper {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin: 20px 100px 20px 100px;
        }

        .customFigureHome1 {
            justify-content: space-between;
        }

        .customFigureHome1 img {
            width: 475px;
            height: 350px;
            object-fit: cover;
        }

        .content-Article1 {
            width: calc(100vw - 217px);
        }

        .figCustom {
            text-align: justify;
            flex-direction: column;
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

        .h1Editable a:hover {
            color: white;
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
    </style>
</head>

<body>
    <header class="headerProfile">
        <nav class="navbar bg-body-primary navbar-expand-lg navbar-light fixed-top">
            <div class="container-fluid">
                <div class="h1Editable">
                    <a class="navbar-brand"><img class="me-3 mb-1" src="assets/pictures/logoLB.png" alt="Logonya" width="40px" style="object-fit: cover;">Natify AloeVera</a>
                </div>
                <div class="nav-list d-flex justify-content-center align-items-center navbarContainer">
                    <a href="rumah.php" class="navbar-brand active">Home</a>
                    <a href="routes/product.php" class="navbar-brand">Product</a>
                    <a href="routes/cart.php" class="navbar-brand">Cart</a>
                    <a href="routes/about.php" class="navbar-brand">Forum</a>
                    <div class="dropdown">
                        <a href="routes/profile.php" class="navbar-brand"> <img class="profilePhoto rounded-circle" src="assets/uploads/users/<?php echo $foto ?>" alt="Profile Photo" width="30px" height="30px"></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="routes/profile.php">Profil Saya</a>
                            <a class="dropdown-item" href="routes/pesanan_saya.php">Pesanan Saya</a>
                            <a class="dropdown-item" href="handler/logout.php">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main class="wrapper-mainRumah">
        <div class="carousel-Wrapper">
            <div id="carouselExampleIndicators" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/pictures/promo1.jpg" class="d-block customCarousel" alt="Carousel">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/pictures/promo2.jpg" class="d-block customCarousel" alt="Carousel">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/pictures/promo3.webp" class="d-block customCarousel" alt="Carousel">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="articleWrapper">
            <div class="mx-auto text-center">
                <h1 class="d-block mb-3">Natify AloeVera</h1>
                <div class="content-Article1">
                    <figure class="d-flex customFigureHome1">
                        <img class="me-5" src="assets/home/lidahbuayaHome1.jpeg" alt="Aloe Vera Image" class="img-fluid">
                        <figcaption style="width: calc(100% - 500px);" class="d-flex figCustom">
                            <h5>Natural Beautify Aloe Vera</h5>
                            <p>Welcome to Natify AloeVera! Aloe vera telah dikenal secara luas karena sifat penyembuhan alaminya yang luar biasa. Kandungan gel dalam daun aloe vera kaya akan nutrisi, vitamin, dan antioksidan yang dapat memberikan kelembapan optimal untuk kulit, membantu mengurangi peradangan, dan mendukung regenerasi sel-sel kulit.
                                <br>Keunggulan produk kami terletak pada pemanfaatan potensi aloe vera ini untuk menciptakan solusi perawatan kulit alami yang menyegarkan dan memberikan kelembutan tahan lama. Temukan manfaat sejati dari keajaiban aloe vera melalui rangkaian produk kami yang inovatif, dirancang untuk memberikan pengalaman perawatan kulit yang istimewa.
                            </p>
                            <h5>Kenapa Aloe Vera?</h5>
                            <p>Aloe vera secara alami mengandung banyak kelembapan, membantu menjaga kulit tetap terhidrasi.
                                Merupakan agen peremajaan kulit yang membantu mengurangi garis halus dan kerutan, memberikan kulit tampilan yang lebih muda.
                            </p>
                        </figcaption>
                    </figure>
                </div>
            </div>
            <div class="mx-auto text-center">
                <h1 class="d-block mb-3">Manfaat Aloe Vera (Lidah Buaya)</h1>
                <div class="content-Article1">
                    <figure class="d-flex customFigureHome1">
                        <figcaption style="width: calc(100% - 500px);" class="d-flex figCustom">
                            <h5>Keanggunan Alami dan Organik</h5>
                            <a>Natify Aloevera menggunakan aloe vera sebagai bahan dasar, yang dikenal karena sifat alami penyembuhnya.
                                Tidak mengandung bahan kimia berbahaya atau zat sintetis, sehingga cocok untuk semua jenis kulit, bahkan yang sensitif sekalipun.</a>
                            <hr>
                            <h5>Antiinflamasi dan Menenangkan</h5>
                            <a>Aloe vera terkenal karena sifat antiinflamasi yang dapat membantu meredakan kemerahan dan peradangan pada kulit.
                                Cocok untuk kulit yang teriritasi atau terbakar sinar matahari, memberikan efek menenangkan.</a>
                            <hr>
                            <h5>Aroma Alami dan Aroma Terapi</h5>
                            <a>memberikan pengalaman relaksasi dan aroma terapi untuk setiap tetes Natify AloeVera.</a>
                            <hr>
                        </figcaption>
                        <img class="ms-5" src="assets/home/lidahbuayaHome2.jpg" alt="Aloe Vera Image" class="img-fluid">
                    </figure>
                </div>
            </div>
        </div>
        <section class="containerHome" id="home">
            <div class="contentHome">
                <article class="trendContent">
                    <figure class="topPicture">
                        <img src="assets/home/news.png" alt="Picture">
                        <figcaption> <a href="">Ungkap Keajaiban Aloe Vera dalam Setiap Tetes Produk Natify!</a>
                        </figcaption>
                    </figure>
                    <ul class="datatopPic">
                        <li>AloeVista Vignettes</li>
                        <li>18 September 2023</li>
                        <li><img src="assets/icons/eye.png" alt="View" width="10px" height="10px">28445 Viewers</li>
                        <li><img src="assets/icons/share.png" alt="Shares" width="10px" height="10px">Shares</li>
                    </ul>
                </article>
                <article class="newsContent">
                    <ul class="recentTop">
                        <li>Recent News</li>
                        <li><a id="allrecentnews" href="">All Recent News</a></li>
                    </ul>
                    <ul class="recentNewsSmall">
                        <li>
                            <img src="assets/home/news2.jpg" alt="Sepak Bola">
                            <div>
                                <a class="konteks sports" href="">Lotion</a>
                                <a href="">Perawatan Kulit Revolusioner: Aloe Vera Murni untuk Tampil Cantik Alami</a>
                                <span>By NatureNectar<figure class="figureNewsKecil"><img id="mataRecentTop" src="assets/icons/eye.png" alt="Mata">27743
                                        Viewers</figure></span>
                            </div>
                        </li>
                        <li>
                            <img src="assets/home/news3.jpg" alt="Bisnis">
                            <div>
                                <a class="konteks business" href="">Gel</a>
                                <a href="">"Perawatan Kulit Revolusioner: Aloe Vera Murni untuk Tampil Cantik Alami"</a>
                                <span>By ZenBotanics<figure class="figureNewsKecil"><img id="mataRecentTop" src="assets/icons/eye.png" alt="Mata">13281
                                        Viewers</figure></span>
                            </div>
                        </li>
                        <li>
                            <img src="assets/home/news4.jpg" alt="clothes">
                            <div>
                                <a class="konteks lifestyle" href="">Sampoo</a>
                                <a href="">Rahasia Kecantikan Terungkap: Aloe Vera, Keajaiban alami untuk Rambut</a>
                                <span>By Galang<figure class="figureNewsKecil"><img id="mataRecentTop" src="assets/icons/eye.png" alt="Mata">9425
                                        Viewers</figure></span>
                            </div>
                        </li>
                        <li>
                            <img src="assets/home/news5.jpg" alt="matrics">
                            <div>
                                <a class="konteks technology" href="">Lip Balm</a>
                                <a href="">Merayakan Tahun Pertama: Perjalanan Sukses Produk Natify Aloe Vera </a>
                                <span>By CelestialSap <figure class="figureNewsKecil"><img id="mataRecentTop" src="assets/icons/eye.png" alt="Mata">7340
                                        Viewers</figure></span>
                            </div>
                        </li>
                    </ul>
                </article>
            </div>
        </section>
    </main>
    <footer class="d-flex justify-content-center customFooter">
        <a>&copy; By Kelompok 2. All Rights Reserved.</a>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        $(document).ready(function() {
            setInterval(function() {
                $('.carousel').carousel('next');
            }, 3000);
        });
    </script>
</body>

</html>