<!-- <?php
session_start();

if ($_SESSION['akses']!='') {
    
    header('location: w/page/?menu=home');
} else {

?> -->
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <?php include "inc/koneksi.php";
    $a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_toko"));
    $color = $a['tombol'] ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta http-equiv="refresh" content="1200">
    <title>.: <?=$a['nm_toko'] ?> :.</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="logo.png">
    <link href="app-assets/font/css/fontawesome.min.css" rel="stylesheet" type="text/css">
    <link href="app-assets/font/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/shepherd-theme-default.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/card-analytics.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/tour/tour.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/app-ecommerce-shop.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/users.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/app-user.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/validation/form-validation.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/calendars/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/calendars/extensions/daygrid.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/calendars/extensions/timegrid.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/calendars/fullcalendar.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/file-uploaders/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css"
        href="app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/file-uploaders/dropzone.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/data-list-view.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/forms/wizard.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/coming-soon.css">
    <!-- END: Page CSS-->
    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" /> -->
    <link rel="stylesheet" type="text/css" href="assets/css/swiper-bundle.min.css">
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
        background: #f8f8f88c;
        border-radius: 4px;
        color: #feb500 !important;
    }

    .header-navbar[class*='bg-'] .navbar-nav .nav-item > a i:hover, .header-navbar[class*='bg-'] .navbar-nav:hover .nav-item > a:hover span:hover {
        color: #feb500 !important;
    }

    .pt-4, .py-4 {
        padding-top: 2rem !important;
    }

    .bg-gradient-white {
        color: #FFFFFF;
        background-image: -webkit-linear-gradient(60deg, #FFFFFF, rgba(255, 255, 255, 0.5));
        background-image: linear-gradient(30deg, #FFFFFF, rgba(255, 255, 255, 0.5));
        background-repeat: repeat-x;
        border-radius: 15px;
    }

    .slide-produk {
        background-color: #ffffff;
        box-shadow: 0px 3px 10px 0px;
        padding: 10px;
        border-radius: 5px;
    }

    .badge.badge-info {
        background-color: #00CFE8;
        padding: 6px;
    }

    .display-4 {
        font-size: 2rem;
        font-weight: 550;
        line-height: 1.2;
        color: #011e38;
    }

    .onsale {
        position: relative;
        display: inline-block;
        text-align: center;
        color: #fff;
        background: #FF9F43;
        font-size: 14px;
        line-height: 1;
        padding: 15px 8px 4px;
        width: 50px;
        border-radius: 0 7px 0 0;
        text-transform: uppercase;
    }

    .text-header {
        text-align: left; 
        padding: 10px; 
        border-radius: 5px; 
        margin-left: 20px; 
        margin-top: 15px; 
        font-weight: 750; 
        background-color: #ffae00; 
        color: #ffffff;
    }

    .card-kontak {
        border: 3px dashed #ff9f43;
        margin: 20px;
        border-radius: 10px;
    }

    .font-small-2 {
        font-size: 1.0rem !important;
    }


    .horizontal-menu .content .content-wrapper {
        max-width: 1600px;
        margin: 0 auto;
    }

    .swiper-button-next, .swiper-button-prev {
        opacity: .2;
    }

    .swiper-button-next:hover, .swiper-button-prev:hover {
        opacity: 1;
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
                        <img src="img/toko/<?= $a['logo'] ?>" width="50" />
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
                                <a class="dropdown-item" href="aut/login.php"><i class="fas fa-user-lock"></i> Login!</a>
                                <a class="dropdown-item" href="aut/daftar.php"><i class="fas fa-user-plus"></i> Register!</a>
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
                            <img src="img/toko/<?= $a['logo'] ?>" width="100" />
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
    
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top pt-2">
                        <div class="col-12">
                            <h3 class="content-header-title float-left mb-0 text-dark text-capitalize" style="padding-top:.3rem">
                                Produk terbaru
                            </h3>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?menu=home" class="text-dark">Produk</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#" class="text-dark">All</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-detached content-right">
                <div class="content-body">
                    <!-- Ecommerce Content Section Starts -->
                    <section id="ecommerce-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="ecommerce-header-items">
                                    <div class="result-toggler">
                                        <button class="navbar-toggler shop-sidebar-toggler" type="button"
                                            data-toggle="collapse">
                                            <span class="navbar-toggler-icon d-block d-lg-none"><i
                                                    class="feather icon-menu"></i></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Ecommerce Content Section Starts -->

                    <!-- background Overlay when sidebar is shown  starts-->
                    <div class="shop-content-overlay"></div>
                    <!-- background Overlay when sidebar is shown  ends-->

                    <!-- Ecommerce Search Bar Starts -->
                    <!-- <section id="ecommerce-searchbar">
                        <div class="row mt-1">
                            <div class="col-sm-12">
                                <fieldset class="form-group position-relative">
                                    ?php
                                        if (isset($_GET['search'])) {
                                            $search         = $_GET['search'];
                                            $data_search    = mysqli_query($koneksi, "SELECT * FROM tabel_barang,tabel_barang_gambar,tabel_stok_toko WHERE tabel_barang.nm_barang LIKE '%.$search.%' AND tabel_barang.kd_barang = tabel_barang_gambar.id_brg AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang AND tabel_barang.kd_kategori = '$kd_kategori'");
                                            echo 'string';

                                        }
                                    ?
                                    <input type="text" class="form-control search-product" id="iconLeft5"
                                        placeholder="Search here" name="search">
                                    <div class="form-control-position">
                                        <i class="feather icon-search"></i>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </section> -->
                    <!-- Ecommerce Search Bar Ends -->

                    <!-- Ecommerce Products Starts -->
                    <section id="basic-examples" style="margin-top: 50px;">
                        <div class="row match-height">
                            <?php

                            $batas = 6;
                            $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
                            $previous = $halaman - 1;
                            $next = $halaman + 1;

                            if(isset($_GET['kd_kategori']) && !isset($_GET['pricerange'])) {
                            
                                $query_barang = "SELECT * FROM tabel_barang,tabel_barang_gambar,tabel_stok_toko 
                                                WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg 
                                                AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang
                                                AND tabel_barang.kd_kategori = $kd_kategori
                                                ";

                                $query_barang_2 = "SELECT * FROM tabel_barang,tabel_barang_gambar,tabel_stok_toko 
                                                WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg 
                                                AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang
                                                AND tabel_barang.kd_kategori = $kd_kategori
                                                limit $halaman_awal, $batas";
                            
                            } elseif(!isset($_GET['kd_kategori']) && isset($_GET['pricerange'])) {
                                
                                $n = explode("-", $_GET['pricerange']);
                                $n1 = $n[0];
                                $n2 = $n[1]; 

                                $query_barang = "SELECT * FROM tabel_barang,tabel_barang_gambar,tabel_stok_toko 
                                                WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg 
                                                AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang
                                                AND tabel_barang.hrg_jual BETWEEN $n1 AND $n2";

                                $query_barang_2 = "SELECT * FROM tabel_barang,tabel_barang_gambar,tabel_stok_toko 
                                                WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg 
                                                AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang
                                                AND tabel_barang.hrg_jual BETWEEN $n1 AND $n2 limit $halaman_awal, $batas";

                            } elseif (isset($_GET['kd_kategori']) && isset($_GET['pricerange'])) {

                                $n = explode("-", $_GET['pricerange']);
                                $n1 = $n[0];
                                $n2 = $n[1]; 

                                $query_barang = "SELECT * FROM tabel_barang,tabel_barang_gambar,tabel_stok_toko 
                                                WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg 
                                                AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang
                                                AND tabel_barang.hrg_jual BETWEEN $n1 AND $n2 AND tabel_barang.kd_kategori = $kd_kategori";

                                $query_barang_2 = "SELECT * FROM tabel_barang,tabel_barang_gambar,tabel_stok_toko 
                                                WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg 
                                                AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang
                                                AND tabel_barang.hrg_jual BETWEEN $n1 AND $n2 AND tabel_barang.kd_kategori = $kd_kategori limit $halaman_awal, $batas";

                            } else {

                                $query_barang = "SELECT * FROM tabel_barang,tabel_barang_gambar,tabel_stok_toko 
                                                WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg 
                                                AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang";

                                $query_barang_2 = "SELECT * FROM tabel_barang,tabel_barang_gambar,tabel_stok_toko 
                                                WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg 
                                                AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang
                                                limit $halaman_awal, $batas";

                            }

                            $data = mysqli_query($koneksi, $query_barang);
                            $jumlah_data = mysqli_num_rows($data);
                            $total_halaman = ceil($jumlah_data / $batas);

                            $data_barang = mysqli_query($koneksi, $query_barang_2);
                            $nomor = $halaman_awal + 1;
                            
                            while ($d = mysqli_fetch_array($data_barang)) {
                                // print_r($d);
                                $gambars = $d['gambar'];
                                $gambars = explode(",", $gambars);
                                $harga = $d['hrg_jual'];

                            ?>
                            <div class="col-xl-4 col-md-6 col-sm-12 col-6">
                                <div class="card">
                                    <div class="card-content">
                                        <input type="hidden" name="kd_toko" id="kd_toko" value="<?php echo $d['kd_toko']; ?> ">
                                        <img class="card-img-top img-fluid" width="20px" height="50%"
                                            src="img/produk/<?php echo $gambars[0]; ?>" />
                                        <div class="card-img-overlay overflow-hidden">
                                            <h4 class="card-title mt-0 pt-0">
                                                <!--<img src="w/img/logo.png" class="img-left float-left" width="35">-->
                                                <?php 
                                                if ($d['diskon'] != null) { 
                                                    $diskon = ($d['hrg_jual']*$d['diskon'])/100;
                                                    $harga = $harga - $diskon;
                                                ?>
                                                <div class="product-image">
                                                  <span class="onsale-section">
                                                  <span class="onsale"><?php echo $d['diskon']; ?>%<br>OFF</span></span>
                                                </div> 
                                                <?php } else {  ?>  
                                                <?php  } ?> 
                                            </h4>
                                        </div> 
                                        <div class="card-body text-center">
                                            <h5><?php echo $d['nm_barang']; ?></h5>
                                            <div class="divider">
                                                <div class="divider-text">
                                                    <h3 class="font-medium-1 bg-info p-1">
                                                        <?php 
                                                        if ($d['diskon'] != null) { 
                                                            echo "<span class='price-normal'><sup>Rp.</sup>".$d['hrg_jual']."</span>&nbsp; ";
                                                        }?>
                                                        <strong><sup>Rp.</sup><?php echo number_format($harga, 0, ",", "."); ?></strong>
                                                    </h3>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <div class="float-left">
                                                    <i class="far fa-heart text-warning mr-50"></i> 4.9
                                                </div>
                                                <div class="float-right">
                                                    <i class="fas fa-boxes text-info mr-50"></i> <?php echo $d['stok']; ?>
                                                </div>
                                            </div>
                                            <div class="btn-group d-xl-block d-none justify-content-between mt-2 m-0 p-0">
                                                <a href="detail_produk.php?kd_barang=<?php echo $d['kd_barang']; ?>"
                                                    class="btn btn-info rounded-0"><i class="far fa-eye"></i> Cek Detail</a>
                                                <a onclick="add_keranjang(`<?php echo $d['stok'] ?>`,`<?php echo $d['kd_barang']; ?>`)" class="btn btn-warning rounded-0"><i class="fas fa-shopping-cart"></i> Beli</a>
                                            </div>
                                            <div class="card-btns d-xl-none justify-content-between mt-2 float-right">
                                                <a href="page/index.php?menu=detail&kd_barang=<?php echo $d['kd_barang']; ?>"
                                                    class="btn btn-info btn-icon rounded-0"><i class="far fa-eye"></i></a>
                                                <a href="index.php?menu=checkout&kd_barang=<?php echo $d['kd_barang']; ?>"
                                                    class="btn btn-warning btn-icon rounded-0"><i
                                                        class="fas fa-shopping-cart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </section>
                    <!-- Ecommerce Products Ends -->

                    <!-- Ecommerce Pagination Starts -->
                    <section id="ecommerce-pagination" class="pb-5">
                        <div class="row">
                            <div class="col-sm-12">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center mt-2">
                                        <li class="page-item prev-item"><a class="page-link" 
                                            <?php if ($halaman > 1) {
                                            echo "href='index.php?menu=list&halaman=$previous'";
                                            } ?>></a></li>
                                        <?php for ($x = 1; $x <= $total_halaman; $x++) { ?>
                                        <li class="page-item active"><a class="page-link mr-1"
                                                href="index.php?menu=list&halaman=<?php echo $x ?>"><?php echo $x; ?></a>
                                        </li>
                                        <?php  } ?>
                                        <li class="page-item next-item"><a class="page-link mr-5" <?php if ($halaman < $total_halaman) {
                                                echo "href='index.php?menu=list&halaman=$next'";
                                            } ?>></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </section>
                    <!-- Ecommerce Pagination Ends -->

                </div>
            </div>
            <div class="sidebar-detached sidebar-left">
                <div class="sidebar">
                    <!-- Ecommerce Sidebar Starts -->
                    <div class="sidebar-shop" id="ecommerce-sidebar-toggler">
                        <div class="row">
                            <div class="col-sm-12">
                                <h6 class="filter-heading d-none d-lg-block">Filter pencarian</h6>
                            </div>
                        </div>
                        <span class="sidebar-close-icon d-block d-md-none">
                            <i class="feather icon-x"></i>
                        </span>
                        <div class="card">
                            <div class="card-body">
                                <div class="multi-range-price">
                                    <div class="multi-range-title pb-75">
                                        <h6 class="filter-title mb-0">Harga</h6>
                                    </div>
                                    <?php $price = isset($_GET['pricerange']) ? $_GET['pricerange'] : ""; ?>
                                    <input type="text" id="pricerange" value="<?= $price ?>">
                                    <ul class="list-unstyled price-range" id="price-range">
                                        <li onClick="filterproduk('price','')">
                                            <span class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio" name="price-range" value="all" <?= ($price == '' ? "checked" : "") ?>>
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="ml-50">All</span>
                                            </span>
                                        </li>
                                        <li onClick="filterproduk('price','0-50000')">
                                            <span class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio" name="price-range" value="false" <?= ($price == '0-50000' ? "checked" : "") ?>>
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="ml-50"> &lt;=IDR 50.000</span>
                                            </span>
                                        </li>
                                        <li onClick="filterproduk('price','50000-100000')">
                                            <span class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio" name="price-range" value="false" <?= ($price == '50000-100000' ? "checked" : "") ?>>
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="ml-50">IDR 50.000 - IDR 100.000</span>
                                            </span>
                                        </li>
                                        <li onClick="filterproduk('price','100000-200000')">
                                            <span class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio" name="price-range" value="false" <?= ($price == '100000-200000' ? "checked" : "") ?>>
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="ml-50">IDR 100.000 - IDR 200.000</span>
                                            </span>
                                        </li>
                                        <li onClick="filterproduk('price','200000-999999999')">
                                            <span class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio" name="price-range" value="false" <?= ($price == '200000-999999999' ? "checked" : "") ?>>
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="ml-50">&gt;= IDR 200.000</span>
                                            </span>
                                        </li>

                                    </ul>
                                </div>
                                <!-- /Price Filter -->
                                <hr>

                                <!-- Categories Starts -->
                                <div id="product-categories">
                                    <input type="hidden" id="kdkategori" value="<?= $_GET['kd_kategori'] ?>">
                                    <?php $kat = isset($_GET['kd_kategori']) ? $_GET['kd_kategori'] : ""; ?>
                                    <div class="product-category-title">
                                        <h6 class="filter-title mb-1">Kategori</h6>
                                    </div>
                                    <ul class="list-unstyled categories-list">
                                        <li onClick="filterproduk('kategori','')">
                                            <span class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio" name="category-filter" value="all" <?= ($kat == "" ? "checked" : "") ?>>
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="ml-50">All</span>
                                            </span>
                                        </li>
                                        <?php error_reporting(0);
                                        $ketQuery = "SELECT * FROM tabel_kategori_barang ORDER BY nm_kategori ASC";
                                        $executeSat = mysqli_query($koneksi, $ketQuery);
                                        while ($k = mysqli_fetch_array($executeSat)) { ?>
                                        <li onClick="filterproduk('kategori','<?php echo $k['kd_kategori'];?>')">
                                            <span class="vs-radio-con vs-radio-primary py-25">
                                                <input type="radio" name="category-filter" value="false" <?= ($kat == $k['kd_kategori'] ? "checked" : "") ?>>
                                                <span class="vs-radio">
                                                    <span class="vs-radio--border"></span>
                                                    <span class="vs-radio--circle"></span>
                                                </span>
                                                <span class="ml-50"><?php echo $k['nm_kategori']; ?></span>
                                            </span>
                                        </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <!-- Categories Ends -->
                                <hr>
                                
                                <hr>
                                <!-- Clear Filters Starts -->
                                <div id="clear-filters">
                                    <button class="btn btn-block btn-primary" onClick="clearfilter()">CLEAR ALL FILTERS</button>
                                </div>
                                <!-- Clear Filters Ends -->
                            </div>
                        </div>
                    </div>
                    <!-- Ecommerce Sidebar Ends -->
                </div>
            </div>
            
        </div>
    </div>
    

    <div class=" sidenav-overlay">
    </div>
    <div class="drag-target"></div>
    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light" style="background:<?php echo $a['headerfooter']; ?>">
        <p class="clearfix blue-grey lighten-2 mb-0">
            <span class="float-md-left d-block d-md-inline-block mt-25">copyright &copy;
                <?php echo date('Y') ?> ||
                <a class="text-bold-800 grey darken-2" href="#" target="_blank"><?=$a['nm_toko'] ?> ||</a>
                All rights Reserved
            </span>
            <span class="float-md-right d-none d-md-block"><?=$a['nm_toko'] ?> 
                <img src="<?=$a['logo'] ?>" width="30" />
            </span>
            <!-- <button class="btn btn-warning btn-icon scroll-top" type="button">
                <i class="feather icon-arrow-up"></i>
            </button> -->
        </p>
    </footer>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="app-assets/vendors/js/extensions/tether.min.js"></script>
    <script src="app-assets/vendors/js/extensions/shepherd.min.js"></script>
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/core/app-menu.js"></script>
    <script src="app-assets/js/core/app.js"></script>
    <script src="app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->
    <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/pages/dashboard-analytics.js"></script>
    <script src="app-assets/js/scripts/modal/components-modal.js"></script>

    <script src="app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="app-assets/js/scripts/forms/select/form-select2.js"></script>

    <script src="app-assets/js/scripts/extensions/sweet-alerts.js"></script>
    <script src="app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="app-assets/vendors/js/extensions/polyfill.min.js"></script>

    <script src="app-assets/js/scripts/pages/app-ecommerce-details.js"></script>
    <!-- <script src="app-assets/js/scripts/forms/number-input.js"></script> -->
    <script src="app-assets/js/scripts/pages/app-ecommerce-shop.js"></script>

    <script src="app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="app-assets/js/scripts/datatables/datatable.js"></script>
    <script src="app-assets/vendors/js/extensions/dropzone.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/dataTables.select.min.js"></script>
    <script src="app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    <script src="app-assets/js/scripts/ui/data-list-view.js"></script>
    <script src="app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="app-assets/js/scripts/pages/app-user.js"></script>
    <script src="app-assets/js/scripts/navs/navs.js"></script>
    <script src="app-assets/vendors/js/extensions/moment.min.js"></script>
    <script src="app-assets/vendors/js/calendar/fullcalendar.min.js"></script>
    <script src="app-assets/vendors/js/calendar/extensions/daygrid.min.js"></script>
    <script src="app-assets/vendors/js/calendar/extensions/timegrid.min.js"></script>
    <script src="app-assets/vendors/js/calendar/extensions/interactions.min.js"></script>
    <!-- <script src="app-assets/js/scripts/extensions/fullcalendar.min.js"></script> -->
    <script src="app-assets/vendors/js/pagination/jquery.bootpag.min.js"></script>
    <script src="app-assets/vendors/js/pagination/jquery.twbsPagination.min.js"></script>
    <script src="app-assets/js/scripts/pagination/pagination.js"></script>


    <!-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js"></script> -->

    <script src="app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
    <script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="app-assets/js/scripts/forms/wizard-steps.js"></script>
    <!-- END: Page JS-->
    <script src="app-assets/vendors/js/coming-soon/jquery.countdown.min.js"></script>
    <script src="app-assets/js/scripts/pages/coming-soon.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script src="app-assets/js/jquery3.6.0.min.js"></script>
    <script src="app-assets/js/sweetalert2@11.js"></script>
    <script>

        function add_keranjang(stok, kdbarang) {

            if (stok <= 0) {

                // alert('stok habis')
                setTimeout(function() {
                    Swal.fire({
                        icon: "warning",
                        tittle: "INFORMASI!",
                        text: "Item ini stocknya habis.",
                    }).then(function() {
                        // window.location = "../page/index.php?menu=delivery_member";
                    });
                }, 1);

            } else {

                $i = kdbarang

                $.ajax({
                    type: "POST",
                    url: "./aksi/add_keranjang.php",
                    data: {

                        kd_barang: $i,
                        id_user: $("#id_user").val(),
                        kd_toko: $("#kd_toko").val()

                    },

                    success: function(data) {

                        // alert("Barang sudah ditambahkan ke Keranjang");
                        window.location.href = "./page/index.php?menu=checkout";

                    }
                });
            }
        }

        function clearfilter() {

            location.href='detail_flashsale.php';  

        }

        function filterproduk(keterangan,id){
            var idkategori = $("#kdkategori").val();
            var pricerange = $("#pricerange").val();

            // alert(idkategori + ' - ' + pricerange);

            var text1 = '';
            var text2 = '';

            if (idkategori!='') {
                text1 = '?kd_kategori='+idkategori;
            }

            if (pricerange!='') {
                text2 = '?pricerange='+pricerange;
            } 


            if (keterangan=='price') {
                if (id=='') {

                    location.href='detail_flashsale.php?'+text1;  
                
                } else {
                
                    location.href='detail_flashsale.php?'+text1+'&pricerange='+id;   
                }
            
            } else if (keterangan=='kategori') {
                if (id=='') {

                    location.href='detail_flashsale.php?'+text2;  
                
                } else {

                    location.href='detail_flashsale.php?kd_kategori='+id+text2;  
                }

            }
        }

        $(document).ready(function() {


        });

    </script>
</body>
<!-- END: Body-->

</html>
<?php } ?>