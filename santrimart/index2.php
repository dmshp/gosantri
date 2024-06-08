<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <?php include "w/inc/koneksi.php";
    $a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_toko"));
    $color = $a['tombol'] ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta http-equiv="refresh" content="1200">
    <title>.:<?=$a['nm_toko'] ?>:.</title>
    <link rel="apple-touch-icon" href="w/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="w/logo.png">
    <link href="w/app-assets/font/css/fontawesome.min.css" rel="stylesheet" type="text/css">
    <link href="w/app-assets/font/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="w/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/vendors/css/extensions/shepherd-theme-default.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="w/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="w/app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/css/pages/card-analytics.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/css/plugins/tour/tour.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/vendors/css/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/vendors/css/extensions/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/css/pages/app-ecommerce-shop.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/css/pages/users.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/css/pages/app-user.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/css/plugins/forms/validation/form-validation.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/vendors/css/calendars/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/vendors/css/calendars/extensions/daygrid.min.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/vendors/css/calendars/extensions/timegrid.min.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/css/plugins/calendars/fullcalendar.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/vendors/css/file-uploaders/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css"
        href="w/app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/css/plugins/file-uploaders/dropzone.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/css/pages/data-list-view.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/css/plugins/forms/wizard.css">
    <link rel="stylesheet" type="text/css" href="w/app-assets/css/pages/coming-soon.css">
    <!-- END: Page CSS-->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <!-- BEGIN: Custom CSS-->
    <style>
    .swiper {
        width: 100%;
        height: 100%;
    }

    .onsale-section {
        position: absolute;
        top: 20px;
        right: 20px;
    }

    .onsale-section:after {
        position: absolute;
        content: '';
        display: block;
        width: 2px;
        height: 2;
        border-left: 25px solid transparent;
        border-right: 25px solid transparent;
        border-top: 30px solid <?=$color ?>;
    }

    .onsale {
        position: relative;
        display: inline-block;
        text-align: center;
        color: #fff;
        background: <?=$color ?>;
        font-size: 14px;
        line-height: 1;
        padding: 15px 8px 4px;
        width: 50px;
        text-transform: uppercase
    }

    .btn, .fc .fc-button {
        display: inline-block;
        font-weight: 400;
        /* color: #b7b1b1; */
        color: #ffffff;
        text-align: center;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-color: transparent;
        border: 0 solid transparent;
        padding: 0.9rem 2rem;
        font-size: 1rem;
        border-radius: 0.42rem;
        -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .horizontal-menu .header-navbar.navbar-horizontal ul#main-menu-navigation > li:hover > a {
        background: #F8F8F8;
        border-radius: 4px;
        color: #feb500 !important;
    }

    .header-navbar[class*='bg-'] .navbar-nav .nav-item > a i:hover, .header-navbar[class*='bg-'] .navbar-nav:hover .nav-item > a:hover span:hover {
        color: #feb500 !important;
    }
    </style>
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->


<body class="horizontal-layout horizontal-menu 2-columns navbar-floating footer-static ecommerce-application "
    data-open="hover" data-menu="horizontal-menu" data-col="2-columns">
    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center"
        style="background:<?php echo $a['headerfooter']; ?>">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item">
                    <a class="navbar-brand mt-0" href="../">
                            <img src="w/img/toko/<?= $a['logo'] ?>" width="50" />
                    </a>
                </li>
            </ul>
        </div>
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto">
                                <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#">
                                    <i class="ficon feather icon-menu"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">
                            <li class="nav-item d-none d-lg-block text-bold-700">
                                <a href="#login" class="btn"><?= $a['nm_toko'] ?></a>
                            </li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        <li class="nav-item nav">
                            <a href="#login" class="btn bg-gradient-primary mt-1 mb-1 font-small-3">
                                <i class="fab fa-google-play"></i> 
                                Download App!
                            </a>
                        </li>
                        <li class="dropdown dropdown-user nav-item"><a
                                class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav"><span class="user-name text-bold-300">Access</span><span
                                        class="user-status text-bold-600">Now!</span></div><span><i
                                        class="fas fa-user-alt fa-2x"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="w/aut/login.php"><i class="fas fa-user-lock"></i> Login!</a>
                                <a class="dropdown-item" href="w/aut/daftar.php"><i class="fas fa-user-plus"></i> Register!</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <div class="horizontal-menu-wrapper">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-without-dd-arrow shadow-none menu-border bg-dark"
            role="navigation" data-menu="menu-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto">
                        <a class="navbar-brand" href="../">
                            <img src="w/img/toko/<?= $a['logo'] ?>" width="100" />
                        </a>
                    </li>
                    <li class="nav-item nav-toggle">
                        <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                            <i class="feather icon-x d-block d-xl-none font-medium-4 dark toggle-icon"></i>
                            <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                                data-ticon="icon-disc">
                            </i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Horizontal menu content-->
            <div class="navbar-container main-menu-content" data-menu="menu-container">
                <ul class="nav navbar-nav justify-content-center" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">
                            <i class="fas fa-store-alt"></i> 
                            Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#download">
                            <i class="fas fa-mobile"></i> 
                            Memulai
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#dasyat">
                            <i class="fas fa-shopping-cart"></i>
                            Dasyat
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#berbagi">
                            <i class="fas fa-share-alt"></i>
                            Sharing!
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#hubungi">
                            <i class="fas fa-headset"></i> 
                            Hubungi kita
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END: Main Menu-->

    <?php
    $judul  = $a['nm_toko'];
    $ket    = $a['ket_toko'];
    $jargon = $a['jargon_toko'];
    // print_r($ExplodeKonten);
    ?>
    <!-- BEGIN: Content-->
    <div class="app-content content pt-0">
        <!-- BEGIN: Main Content -->
        <div class="card-content text-white" id="home">
            <div class="card-body text-center" style="background-image:url(w/img/background.png)">
                <div class="row pl-1 pr-1 pt-5 mt-3">
                    <div class="col-lg-3 col-md-12 col-sm-12">
                        <div class="bg-gradient-white p-1" style="height:100%">
                            <!--<h2 class="pt-4 display-4 text-left"><img src="w/img/logo-h.png" width="70%"></h2>-->
                            <h2 class="pt-4 display-4 text-left px-1"><?= $judul ?></h2>
                            <p class="text-justify font-medium-2">
                                <ul class="list-group-flush text-left text-dark px-1">
                                    <li class="list-group-item bg-transparent px-0">
                                        <h5 class="font-small-2">
                                            <?= $ket ?> 
                                            <strong><?= $a['nm_toko'] ?></strong>
                                            <blockquote class="font-medium-3 mt-2"><?= $jargon ?></blockquote>
                                        </h5>
                                    </li>
                                </ul>

                                <div class="btn-group">
                                    <a href="#" type="button" class="btn bg-gradient-primary mb-1 text-white" target="_blank">
                                        <i class="fab fa-google-play"></i> 
                                        Download
                                    </a>
                                    <a href="#" type="button" class="btn bg-gradient-primary mb-1 text-white" target="_blank">
                                        <i class="fas fa-shopping-cart"></i> 
                                        Marketplace
                                    </a>
                                </div>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-12 col-sm-12">
                        <div class="card pt-0 mt-2 shadow-none" style="background:none">
                            <div id="carousel-example-caption" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-caption" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-caption" data-slide-to="1"></li>
                                </ol>
                                <div class="carousel-inner shadow-none" role="listbox">
                                    <div class="carousel-item active">
                                        <img class="img-fluid rounded" src="w/img/iklan/slide-index-1.png">
                                    </div>

                                    <div class="carousel-item">
                                        <img class="img-fluid rounded" src="w/img/iklan/slide-index-2.png">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carousel-example-caption" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-example-caption" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Main Content -->

        <!-- BEGIN: Discount & Tutorial -->
        <div class="content-wrapper">
            <div class="card" style="margin-top:30.8px">
                <section id="download">
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center">
                            <div class="divider">
                                <div class="divider-text">
                                    <h3 class="display-5 text-uppercase border-info p-1">Siapkan pengalaman kamu</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="card ml-1">
                                <div class="card-content text-center">
                                    <div id="carousel-contoh" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-contoh" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-contoh" data-slide-to="1"></li>
                                        </ol>
                                        <div class="carousel-inner" role="listbox">
                                            <div class="carousel-item active">
                                                <img class="img-fluid rounded" src="w/img/iklan/slide-2.png">
                                            </div>

                                            <div class="carousel-item">
                                                <img class="img-fluid rounded" src="w/img/iklan/slide-3.jpg">
                                            </div>
                                        </div>
                                        <a class="carousel-control-prev" href="#carousel-contoh" role="button"
                                            data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-contoh" role="button"
                                            data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php 
                        $ExplodeKetentuan   = explode(".", $a['tutor']);
                        $lengthKetentuan    = count($ExplodeKetentuan) 
                        ?>
                        <div class="col-lg-6 col-md-6 col-12">
                            <div class="card">
                                <div class="card-header d-flex flex-column align-items-start py-0">
                                    <div class="avatar bg-rgba-primary p-50" style="margin:0; margin-left:80px">
                                        <div class="avatar-content">
                                            <a href="#" target="_blank">
                                                <i class="fab fa-google-play text-primary font-medium-5"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <h2 class="text-bold-700 mt-1 mb-25" style="padding-left:17.5px">Download APP</h2>
                                    <ul class="list-group-flush text-left text-dark pl-0">
                                        <?php for ($i = 0; $i < $lengthKetentuan; $i++) { ?>
                                            <li class="list-group-item bg-transparent font-small-4">
                                                <?= $ExplodeKetentuan[$i] ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- END: Discount & Tutorial -->

        <!-- BEGIN: Items -->
        <div class="content-wrapper">
            <div class="card">
                <section id="dasyat">
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center">
                            <div class="divider">
                                <div class="divider-text">
                                    <h3 class="display-5 text-uppercase border-info p-1">Ambil diskonnya</h3>
                                </div>
                            </div>

                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <?php $query = "SELECT * FROM `tabel_barang` INNER JOIN tabel_barang_gambar INNER JOIN tabel_stok_toko WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang";
                                    $result = mysqli_query($koneksi, $query);
                                    while ($produk = mysqli_fetch_array($result)) {
                                        $gambars    = $produk['gambar'];
                                        $gambars    = explode(",", $gambars);
                                        $kdToko     = $produk['kd_toko'];
                                        $stok       = $produk['stok'];
                                        $kd_barang  = $produk['kd_barang'];
                                        $toko       = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_toko WHERE kd_toko = $kdToko"));
                                    ?>
                                    <!-- Slides -->
                                    <div class="swiper-slide">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-content">
                                                    <img class="card-img img-fluid"
                                                        src="w/img/produk/<?php echo $gambars[0]; ?>"
                                                        style="width:480px !important;">
                                                    <div class="card-img-overlay overflow-hidden">
                                                        <h4 class="card-title mt-0 pt-0">
                                                            <!--<img src="../img/logo.png" class="img-left float-left" width="35">-->
                                                            <?php if ($produk['diskon'] != null) { ?>
                                                            <div class="product-image">
                                                                <span class="onsale-section">
                                                                    <span
                                                                        class="onsale"><?php echo $produk['diskon']; ?>%<br>OFF
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <?php }   ?>
                                                        </h4>
                                                    </div>
                                                    <img src="w/img/icon/cod.png" class="item-img p-1 float-right"
                                                        width="125">
                                                    <hr>
                                                    <a href="#"
                                                        class="font-medium-3 text-dark text-bold-500 text-decoration-none">
                                                        <sup>Rp.</sup><?php echo number_format($produk['hrg_jual'], 2, ",", "."); ?></a>
                                                    <p class="item-company">
                                                        <?php echo $produk['nm_barang']; ?></span></p>
                                                    <span class="font-small-2">
                                                        <?php if ($stok == 0) {
                                                                echo "Stok Habis";
                                                            } else if ($stok < 50) {
                                                                echo "Stok Akan Habis";
                                                            } else if ($stok > 50) {
                                                                echo "Stok Masih Banyak";
                                                            } ?></span>
                                                    <?php if ($stok >= 250) { ?>
                                                    <div class="progress progress-bar-primary mt-1 mb-0">
                                                        <div class="progress-bar" role="progressbar" style="width:90%"
                                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <?php } else if ($stok < 250 && $stok >= 50) { ?>
                                                    <div class="progress progress-bar-warning mt-1 mb-0">
                                                        <div class="progress-bar" role="progressbar" style="width:50%"
                                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <?php } else if ($stok < 50 && $stok > 0) { ?> <div
                                                        class="progress progress-bar-danger mt-1 mb-0">
                                                        <div class="progress-bar" role="progressbar" style="width:30%"
                                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <?php } else { ?>
                                                    <div class="progress progress-bar-secondary mt-1 mb-0">
                                                        <div class=" progress-bar" role="progressbar" style="width:100%"
                                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                    <div class="d-flex justify-content-between mt-2 ">
                                                        <div class="float-left">
                                                            <div class="d-flex text-left">
                                                                <p class="badge badge-sm badge-info rounded">
                                                                    by&nbsp<?php echo $toko['nm_toko'] ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="float-right">
                                                            <div class="d-flex text-center">
                                                                <button
                                                                    class="btn btn-sm btn-danger rounded-0 mb-1 font-small-1"
                                                                    name="submit" id="submit"
                                                                    onclick="add_keranjang(`<?php echo $stok ?>`,`<?php echo $kd_barang ?>`)"><i
                                                                        class="fas fa-shopping-cart"></i>
                                                                    BUY</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php } ?>

                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>

                            </div>
                        </div>

                    </div>
            </div>
            </section>
        </div>
        <!-- END: Items -->

        <!-- BEGIN: Items ------------------------------------ PRODUK TERLARIS ------------------ -->
        <div class="content-wrapper">
            <div class="card">
                <section id="dasyat">
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center">
                            <div class="divider">
                                <div class="divider-text">
                                    <h3 class="display-5 text-uppercase border-info p-1">Paling Dicari</h3>
                                </div>
                            </div>

                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <?php 
                                    // $query = "SELECT * FROM `tabel_barang` INNER JOIN tabel_barang_gambar INNER JOIN tabel_stok_toko WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang";
                                    $query = "SELECT a.kd_barang, a.nm_barang, if(isnull(c.gambar)=1,'no_image.jpg,kososng,kosong',c.gambar) as gambar, 
                                                if(isnull(b.kd_toko)=1,'123',b.kd_toko) as kd_toko, if(isnull(d.stok)=1 ,0, d.stok) as stok ,b.hrg_jual, b.diskon, count(a.kd_barang)jml, sum(a.jumlah)tot 
                                            FROM tabel_rinci_penjualan a
                                            LEFT JOIN tabel_barang b on a.kd_barang = b.kd_barang
                                            LEFT JOIN tabel_barang_gambar c on a.kd_barang=c.id_brg
                                            LEFT JOIN tabel_stok_toko d on a.kd_barang = d.kd_barang and b.kd_toko = d.kd_toko
                                            WHERE a.stts = 'FINISH' and a.kd_barang<>''
                                            GROUP BY a.kd_barang, a.nm_barang, c.gambar, b.kd_toko, d.stok
                                            ORDER BY 3 desc";
                                    $result = mysqli_query($koneksi, $query);
                                    // var_dump($result); die();
                                    while ($produk = mysqli_fetch_array($result)) {
                                        $gambars    = $produk['gambar'];
                                        $gambars    = explode(",", $gambars);
                                        $kdToko     = $produk['kd_toko'];
                                        $stok       = $produk['stok'];
                                        $kd_barang  = $produk['kd_barang'];
                                        $toko       = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_toko WHERE kd_toko = $kdToko"));
                                    ?>
                                    <!-- Slides -->
                                    <div class="swiper-slide" style="width: 300 px !important;">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-content">
                                                    <img class="card-img img-fluid"
                                                        src="w/img/produk/<?php echo $gambars[0]; ?>"
                                                        style="width:200px !important;">
                                                    <div class="card-img-overlay overflow-hidden">
                                                        <h4 class="card-title mt-0 pt-0">
                                                            <!-- <img src="../img/logo.png" class="img-left float-left" width="35"> -->
                                                            <?php if ($produk['diskon'] != null) { ?>
                                                            <div class="product-image">
                                                                <span class="onsale-section">
                                                                    <span
                                                                        class="onsale"><?php echo $produk['diskon']; ?>%<br>OFF
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <?php }   ?>
                                                        </h4>
                                                    </div>
                                                    <img src="w/img/icon/cod.png" class="item-img p-1 float-right"
                                                        width="125">
                                                    <hr>
                                                    <a href="#"
                                                        class="font-medium-3 text-dark text-bold-500 text-decoration-none">
                                                        <sup>Rp.</sup><?php echo number_format($produk['hrg_jual'], 2, ",", "."); ?></a>
                                                    <p class="item-company">
                                                        <?php echo $produk['nm_barang']; ?></span></p>
                                                    <span class="font-small-2">
                                                        <?php if ($stok == 0) {
                                                                echo "Stok Habis";
                                                            } else if ($stok < 50) {
                                                                echo "Stok Akan Habis";
                                                            } else if ($stok > 50) {
                                                                echo "Stok Masih Banyak";
                                                            } ?></span>
                                                    <?php if ($stok >= 250) { ?>
                                                    <div class="progress progress-bar-primary mt-1 mb-0">
                                                        <div class="progress-bar" role="progressbar" style="width:90%"
                                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <?php } else if ($stok < 250 && $stok >= 50) { ?>
                                                    <div class="progress progress-bar-warning mt-1 mb-0">
                                                        <div class="progress-bar" role="progressbar" style="width:50%"
                                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <?php } else if ($stok < 50 && $stok > 0) { ?> <div
                                                        class="progress progress-bar-danger mt-1 mb-0">
                                                        <div class="progress-bar" role="progressbar" style="width:30%"
                                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <?php } else { ?>
                                                    <div class="progress progress-bar-secondary mt-1 mb-0">
                                                        <div class=" progress-bar" role="progressbar" style="width:100%"
                                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                    <div class="d-flex justify-content-between mt-2 ">
                                                        <div class="float-left">
                                                            <div class="d-flex text-left">
                                                                <p class="badge badge-sm badge-info rounded">
                                                                    by&nbsp<?php echo $toko['nm_toko'] ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="float-right">
                                                            <div class="d-flex text-center">
                                                                <button
                                                                    class="btn btn-sm btn-danger rounded-0 mb-1 font-small-1"
                                                                    name="submit" id="submit"
                                                                    onclick="add_keranjang(`<?php echo $stok ?>`,`<?php echo $kd_barang ?>`)"><i
                                                                        class="fas fa-shopping-cart"></i>
                                                                    BUY</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php } ?>

                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>

                            </div>
                        </div>

                    </div>
            </div>
            </section>
        </div>
        <!-- END: Items -->

        <!-- BEGIN: Items ------------------------------------ PRODUK RATING TERTINGGI ------------------ -->
        <div class="content-wrapper">
            <div class="card">
                <section id="dasyat">
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center">
                            <div class="divider">
                                <div class="divider-text">
                                    <h3 class="display-5 text-uppercase border-info p-1">Review Tertinggi</h3>
                                </div>
                            </div>

                            <div class="swiper">
                                <div class="swiper-wrapper">
                                    <?php 
                                    // $query = "SELECT * FROM `tabel_barang` INNER JOIN tabel_barang_gambar INNER JOIN tabel_stok_toko WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang";
                                    $query = "SELECT a.kd_barang, a.nm_barang, if(isnull(c.gambar)=1,'no_image.jpg,kososng,kosong',c.gambar) as gambar, 
                                                if(isnull(b.kd_toko)=1,'123',b.kd_toko) as kd_toko, if(isnull(d.stok)=1 ,0, d.stok) as stok ,b.hrg_jual, b.diskon, count(a.kd_barang)jml, sum(a.jumlah)tot 
                                            FROM tabel_rinci_penjualan a
                                            LEFT JOIN tabel_barang b on a.kd_barang = b.kd_barang
                                            LEFT JOIN tabel_barang_gambar c on a.kd_barang=c.id_brg
                                            LEFT JOIN tabel_stok_toko d on a.kd_barang = d.kd_barang and b.kd_toko = d.kd_toko
                                            WHERE a.stts = 'FINISH' and a.kd_barang<>''
                                            GROUP BY a.kd_barang, a.nm_barang, c.gambar, b.kd_toko, d.stok
                                            ORDER BY 3 desc";
                                    $result = mysqli_query($koneksi, $query);
                                    // var_dump($result); die();
                                    while ($produk = mysqli_fetch_array($result)) {
                                        $gambars    = $produk['gambar'];
                                        $gambars    = explode(",", $gambars);
                                        $kdToko     = $produk['kd_toko'];
                                        $stok       = $produk['stok'];
                                        $kd_barang  = $produk['kd_barang'];
                                        $toko       = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_toko WHERE kd_toko = $kdToko"));
                                    ?>
                                    <!-- Slides -->
                                    <div class="swiper-slide" style="width: 300 px !important;">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-content">
                                                    <img class="card-img img-fluid"
                                                        src="w/img/produk/<?php echo $gambars[0]; ?>"
                                                        style="width:200px !important;">
                                                    <div class="card-img-overlay overflow-hidden">
                                                        <h4 class="card-title mt-0 pt-0">
                                                            <!-- <img src="../img/logo.png" class="img-left float-left" width="35"> -->
                                                            <?php if ($produk['diskon'] != null) { ?>
                                                            <div class="product-image">
                                                                <span class="onsale-section">
                                                                    <span
                                                                        class="onsale"><?php echo $produk['diskon']; ?>%<br>OFF
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <?php }   ?>
                                                        </h4>
                                                    </div>
                                                    <img src="w/img/icon/cod.png" class="item-img p-1 float-right"
                                                        width="125">
                                                    <hr>
                                                    <a href="#"
                                                        class="font-medium-3 text-dark text-bold-500 text-decoration-none">
                                                        <sup>Rp.</sup><?php echo number_format($produk['hrg_jual'], 2, ",", "."); ?></a>
                                                    <p class="item-company">
                                                        <?php echo $produk['nm_barang']; ?></span></p>
                                                    <span class="font-small-2">
                                                        <?php if ($stok == 0) {
                                                                echo "Stok Habis";
                                                            } else if ($stok < 50) {
                                                                echo "Stok Akan Habis";
                                                            } else if ($stok > 50) {
                                                                echo "Stok Masih Banyak";
                                                            } ?></span>
                                                    <?php if ($stok >= 250) { ?>
                                                    <div class="progress progress-bar-primary mt-1 mb-0">
                                                        <div class="progress-bar" role="progressbar" style="width:90%"
                                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <?php } else if ($stok < 250 && $stok >= 50) { ?>
                                                    <div class="progress progress-bar-warning mt-1 mb-0">
                                                        <div class="progress-bar" role="progressbar" style="width:50%"
                                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <?php } else if ($stok < 50 && $stok > 0) { ?> <div
                                                        class="progress progress-bar-danger mt-1 mb-0">
                                                        <div class="progress-bar" role="progressbar" style="width:30%"
                                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <?php } else { ?>
                                                    <div class="progress progress-bar-secondary mt-1 mb-0">
                                                        <div class=" progress-bar" role="progressbar" style="width:100%"
                                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                    <div class="d-flex justify-content-between mt-2 ">
                                                        <div class="float-left">
                                                            <div class="d-flex text-left">
                                                                <p class="badge badge-sm badge-info rounded">
                                                                    by&nbsp<?php echo $toko['nm_toko'] ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="float-right">
                                                            <div class="d-flex text-center">
                                                                <button
                                                                    class="btn btn-sm btn-danger rounded-0 mb-1 font-small-1"
                                                                    name="submit" id="submit"
                                                                    onclick="add_keranjang(`<?php echo $stok ?>`,`<?php echo $kd_barang ?>`)"><i
                                                                        class="fas fa-shopping-cart"></i>
                                                                    BUY</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php } ?>

                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>

                            </div>
                        </div>

                    </div>
            </div>
            </section>
        </div>
        <!-- END: Items -->
        
        <!-- BEGIN: Contributor -->
        <?php 
        $query_member = "SELECT * FROM `tabel_member`";
        $result_member = mysqli_query($koneksi, $query_member);
        $jmlMember = 0;
        $jmlMerchant = 0;
		$jmlKurir = 0;
        while ($member = mysqli_fetch_array($result_member)) {
            if ($member['akses'] == 'member') {
                $jmlMember++;
            }
            if ($member['akses'] == 'merchant') {
                $jmlMerchant++;
            }
			if ($member['akses'] == 'kurir') {
                $jmlKurir++;
            }
        }
        ?>
        <div class="content-wrapper">
            <div class="card">
                <section id="berbagi">
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center">
                            <div class="divider">
                                <div class="divider-text">
                                    <h3 class="display-5 text-uppercase border-info p-1">Kontributor kami</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xl-4 col-md-4 col-sm-6 col-4">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-success p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="fas fa-id-card-alt fa-3x text-success font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="counter text-bold-700"><?= $jmlMerchant ?></h2>
                                        <p class="mb-0 line-ellipsis">Merchant</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-4 col-md-4 col-sm-6 col-4">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-success p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="fas fa-address-card fa-3x text-success font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="counter text-bold-700"><?= $jmlMember ?></h2>
                                        <p class="mb-0 line-ellipsis">Member</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-xl-4 col-md-4 col-sm-6 col-4">
                            <div class="card text-center">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="avatar bg-rgba-success p-50 m-0 mb-1">
                                            <div class="avatar-content">
                                                <i class="fas fa-truck fa-3x text-success font-medium-5"></i>
                                            </div>
                                        </div>
                                        <h2 class="counter text-bold-700"><?= $jmlKurir ?></h2>
                                        <p class="mb-0 line-ellipsis">Courier </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- END: Contributor -->

        <!-- BEGIN: Comments -->
        <div class="content-wrapper">
            <div class="card">
                <section id="hubungi">
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center">
                            <div class="divider">
                                <div class="divider-text">
                                    <h3 class="display-5 text-uppercase border-info p-1">Bagikan pengalaman</h3>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-7 col-md-7 col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="badge badge-danger">Ceritakan disini</h4>
                                        <form method="post" action="w/aksi/add_comment.php" enctype="multipart/form-data">
                                            <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                <input type="text" class="form-control" id="iconLeft3" name="nama"
                                                    placeholder="Nama">
                                                <div class="form-control-position"><i class="fa fa-user-o"></i></div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left input-divider-left">
                                                <input type="tel" class="form-control" id="iconLeft3" name="noTelp"
                                                    placeholder="No.Telepon/ Whatsapp">
                                                <div class="form-control-position"><i class="fa fa-whatsapp"></i></div>
                                            </fieldset>
                                            <div class="form-group mt-2 mb-3">
                                                <label for="foto">Tambah foto anda</label>
                                                <input type="file" class="form-control" id="foto" name="image" value="" />
                                            </div>
                                            <fieldset class="form-label-group">
                                                <textarea class="form-control" id="label-textarea" rows="3" name="story"
                                                    placeholder="Tulis Pengalaman Anda">
                                                </textarea>
                                                <label for="label-textarea">Tulis Pengalaman Anda</label>
                                            </fieldset>
                                            <div class="form-group">
                                                <p>Captcha :</p><img src="w/aksi/captcha.php" alt="gambar" />
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" name="kode" value="" placeholder="kode captcha"
                                                    maxlength="6" />
                                            </div>

                                            <button type="submit" name="submit"
                                                class="btn btn-danger float-right">Kirim</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-12 p-2">
                            <div class="card bg-gradient-warning">
                                <div class="card-header">
                                    <h4 class="badge badge-danger">Kata Mereka</h4>
                                </div>

                                <div class="swiper swiper2">
                                    <div class="swiper-wrapper">
                                        <?php $query_komen = "SELECT * FROM `tabel_comment`";
                                        $result_komen = mysqli_query($koneksi, $query_komen);
                                        while ($komen = mysqli_fetch_array($result_komen)) {
                                            // print_r($komen);
                                        ?>
                                        <!-- Slides -->
                                        <div class="swiper-slide p-5">
                                            <div class="card">
                                                <div class="card-body ">
                                                    <div class=" card-content">
                                                        <img class="card-img img-fluid rounded-circle mx-auto d-block"
                                                            src="w/img/comment/<?= $komen['photo'] ?>"
                                                            style="border-radius:50%; width:150px">

                                                        <div class="divider">
                                                            <div class="divider-text">
                                                                <h3><?= $komen['nama'] ?></h3>
                                                            </div>
                                                        </div>
                                                        <div class="text-dark position-bottom-0 text-center pb-0">
                                                            <p>
                                                                <i class="fa fa-quote-left font-large-1"></i>
                                                                <?= $komen['story'] ?>
                                                            </p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <?php } ?>

                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- END: Comments -->

        <!-- BEGIN: Contact -->
        <div class="content-wrapper">
            <div class="card">
                <section>
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center">
                            <div class="divider">
                                <div class="divider-text">
                                    <h3 class="display-5 text-uppercase border-info p-1">Hubungi kami</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    // print_r($_SESSION); 
                    $kdtoko = $a['kd_toko'];
                    $queri_toko =  "SELECT * FROM tabel_medsos_toko,tabel_toko WHERE tabel_medsos_toko.id_toko = $kdtoko AND tabel_toko.kd_toko = $kdtoko";
                    $result_toko = mysqli_query($koneksi, $queri_toko);
                    while ($toko1 = mysqli_fetch_array($result_toko)) {
                        // }
                        // print_r($toko1);
                    ?>
                    <div class="row">
                        <!-- column  -->
                        <div class="col-md-12 p-5 text-center">
                            <h3 class="display-5">Layanan Konsumen : 0<?=substr($a['tlp_toko'],2,15) ?><br> <?=$a['nm_toko'] ?></h3>
                            <a href="https://www.facebook.com/<?= $toko1['facebook'] ?>" target="_blank"
                                class="btn btn-icon btn-icon rounded-circle btn-warning mr-1 mb-1">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="https://www.instagram.com/<?= $toko1['instagram'] ?>" target="_blank"
                                class="btn btn-icon btn-icon rounded-circle btn-warning mr-1 mb-1">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://twitter.com/<?= $toko1['twitter'] ?>" target="_blank"
                                class="btn btn-icon btn-icon rounded-circle btn-warning mr-1 mb-1">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <!-- <a href="#" class="btn btn-icon btn-icon rounded-circle btn-warning mr-1 mb-1"><i
                                    class="fab fa-youtube"></i></a> -->
                            <a href="https://www.tiktok.com/@<?= $toko1['tiktok'] ?>" target="_blank"
                                class="btn btn-icon btn-icon rounded-circle btn-warning mr-1 mb-1">
                                <i class="fab fa-tiktok"></i>
                            </a>
                            <!-- https://api.whatsapp.com/send?phone= -->
                            <a href="https://wa.me/<?= $toko1['tlp_toko'] ?>?text=Halo!%20Saya%20ingin%20bertanya" target="_blank"
                                type="button" class="btn btn-icon btn-icon rounded-circle btn-warning mr-1 mb-1">
                                <i  class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                        <!-- column  -->
                        <?php } ?>
                    </div>
                </section>
            </div>
        </div>
        <!-- END: Contact -->
    </div>
    <!-- END: Content-->

    <div class=" sidenav-overlay">
    </div>
    <div class="drag-target"></div>
    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light" style="background:<?php echo $a['headerfooter']; ?>">
        <p class="clearfix blue-grey lighten-2 mb-0">
            <span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy;
                <?php echo date('Y') ?>
                <a class="text-bold-800 grey darken-2" href="#" target="_blank"><?=$a['nm_toko'] ?>,</a>
                All rights Reserved
            </span>
            <span class="float-md-right d-none d-md-block"><?=$a['nm_toko'] ?> 
                <img src="w/<?=$a['logo'] ?>" width="30" />
            </span>
            <!-- <button class="btn btn-warning btn-icon scroll-top" type="button">
                <i class="feather icon-arrow-up"></i>
            </button> -->
        </p>
    </footer>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <script src="w/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="w/app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="w/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="w/app-assets/vendors/js/extensions/tether.min.js"></script>
    <script src="w/app-assets/vendors/js/extensions/shepherd.min.js"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <script src="w/app-assets/js/core/app-menu.js"></script>
    <script src="w/app-assets/js/core/app.js"></script>
    <script src="w/app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->
    <!-- BEGIN: Page JS-->
    <script src="w/app-assets/js/scripts/pages/dashboard-analytics.js"></script>
    <script src="w/app-assets/js/scripts/modal/components-modal.js"></script>

    <script src="w/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="w/app-assets/js/scripts/forms/select/form-select2.js"></script>

    <script src="w/app-assets/js/scripts/extensions/sweet-alerts.js"></script>
    <script src="w/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="w/app-assets/vendors/js/extensions/polyfill.min.js"></script>

    <script src="w/app-assets/js/scripts/pages/app-ecommerce-details.js"></script>
    <!-- <script src="w/app-assets/js/scripts/forms/number-input.js"></script> -->
    <script src="w/app-assets/js/scripts/pages/app-ecommerce-shop.js"></script>

    <script src="w/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="w/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="w/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="w/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="w/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="w/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="w/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="w/app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="w/app-assets/js/scripts/datatables/datatable.js"></script>
    <script src="w/app-assets/vendors/js/extensions/dropzone.min.js"></script>
    <script src="w/app-assets/vendors/js/tables/datatable/dataTables.select.min.js"></script>
    <script src="w/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    <script src="w/app-assets/js/scripts/ui/data-list-view.js"></script>
    <script src="w/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="w/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="w/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="w/app-assets/js/scripts/pages/app-user.js"></script>
    <script src="w/app-assets/js/scripts/navs/navs.js"></script>
    <script src="w/app-assets/vendors/js/extensions/moment.min.js"></script>
    <script src="w/app-assets/vendors/js/calendar/fullcalendar.min.js"></script>
    <script src="w/app-assets/vendors/js/calendar/extensions/daygrid.min.js"></script>
    <script src="w/app-assets/vendors/js/calendar/extensions/timegrid.min.js"></script>
    <script src="w/app-assets/vendors/js/calendar/extensions/interactions.min.js"></script>
    <script src="w/app-assets/js/scripts/extensions/fullcalendar.js"></script>
    <script src="w/app-assets/vendors/js/pagination/jquery.bootpag.min.js"></script>
    <script src="w/app-assets/vendors/js/pagination/jquery.twbsPagination.min.js"></script>
    <script src="w/app-assets/js/scripts/pagination/pagination.js"></script>

    <script src="w/app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
    <script src="w/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="w/app-assets/js/scripts/forms/wizard-steps.js"></script>
    <!-- END: Page JS-->
    <script src="w/app-assets/vendors/js/coming-soon/jquery.countdown.min.js"></script>
    <script src="w/app-assets/js/scripts/pages/coming-soon.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script>
    $(document).ready(function() {

        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            slidesPerView: 1,
            // spaceBetween: 10,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                // when window width is <= 499px
                320: {
                    slidesPerView: 1,
                    spaceBetweenSlides: 10
                },
                // when window width is <= 999px
                999: {
                    slidesPerView: 4,
                    spaceBetweenSlides: 50
                }
            },

            // And if we need scrollbar

        });

        const swiper2 = new Swiper('.swiper2', {
            // Optional parameters
            direction: 'horizontal',
            loop: true,
            slidesPerView: 1,
            // spaceBetween: 10,

            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                // when window width is <= 499px
                320: {
                    slidesPerView: 1,
                    spaceBetweenSlides: 10
                },
                // when window width is <= 999px
                999: {
                    slidesPerView: 1,
                    spaceBetweenSlides: 20
                }
            },

            // And if we need scrollbar

        });
        $('.counter').each(function() {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 4000,
                easing: 'swing',
                step: function(now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });

    });
    </script>
</body>
<!-- END: Body-->

</html>