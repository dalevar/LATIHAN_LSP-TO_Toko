<?php
include 'resource/data/dataList.php'; 
session_start(); //inisiasi session untuk menyimpan data pengguna yang login 

// Periksa apakah pengguna telah login, jika tidak, redirect ke halaman login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Siqhtyl - Home</title>
    <link rel="stylesheet" href="resource/css/bootstrap.min.css">
    <link rel="stylesheet" href="resource/css/style.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg border-bottom sticky-top" style="background-color: #F0F0F0;">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="resource/img/logo.png" alt="Logo" width="75">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="#">Home</a>
                    <a class="nav-link" href="#">Transaction</a>
                    <a class="nav-link" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <!-- Banner -->
    <section class="banner" id="home" style="padding-bottom: 10em;">
        <div class="container" style=" padding-top: 5em;">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="mt-5">Siqhtyl Clinic Skincare, <br> convenient and affordable way to access high-quality healthcare.</h1>
                    <p class="mt-3" style="color: #550f11;">Patients can see a doctor from the comfort of their own home, and the clinic's prices are transparent and upfront.</p>
                    <a href="#content" class="btn btn-primary-custom mt-3 px-4 shadow">Show Me Now</a>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="resource/img/hero.png" alt="Banner" class="rounded 
                    img-fluid mt-5">
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner -->

    <!-- Content -->
    <section class="content" id="content">
        <div class="container">
            <h3 class="mb-4 fw-medium">Skincare Clinic Siqhtyl </h3>
            <div class="list_room">
                <div class="row">
                    <?php foreach ($data as $key => $value) : ?>
                        <div class="col-lg-3 mb-3">
                            <img src="resource/img/<?= $value['gambar']; ?>" alt="<?= $value['nama']; ?>" class="img-fluid mb-2 h-75">
                            <h5><?= $value['nama']; ?></h5>
                            <p><?= $value['deskripsi']; ?></p>
                            <p class="fw-medium">Rp. <?= number_format($value['harga'], 0, ',', '.'); ?></p>
                            <a href="pembayaran.php?id=<?= $value['id'] ?>" class="btn btn-primary-custom-sm shadow">Check out</a>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </section>
    <!-- End Content -->

    <!-- Story -->
    <!-- <section class="story" id="story">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <img src="resource/img/story.jpg" alt="story" class="img-fluid">
                </div>
                <div class="col-lg-8">
                    <h4>Safety Riding, Happy Ride</h4>
                    <h3>What a great ride with safety riding and <br /> Happy riding with partners ...</h3>

                    <a href="#" class="btn btn-primary-custom px-4 mt-5 shadow">Read Their Story</a>

                </div>
            </div>
        </div>
    </section> -->
    <!-- End Story -->

    <!-- Footer -->
    <?php include 'components/partials/footer.php'; ?>
    <!-- End Footer -->

    <script src="resource/js/bootstrap.bundle.min.js"></script>
</body>

</html>