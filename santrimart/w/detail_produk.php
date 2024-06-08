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
    <!-- js rating -->
    <link rel="stylesheet" type="text/css" href="app-assets/rating/css/star-rating-svg.css">
    <!-- BEGIN: Custom CSS-->

    <?php 
        // error_reporting(0);
        $idUser = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : '';
        $akses  = isset($_SESSION['akses']) ? $_SESSION['akses'] : '';

        // var_dump($idUser);
        // var_dump($akses); die();
     ?>  
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
    .border-bottom-dark {
        border-bottom: 1px solid #717274 !important;
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
                                <?php echo $akses; ?>
                            </h3>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?menu=produk" class="text-dark">Produk</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#" class="text-dark">Details</a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
               <div class="form-group breadcrum-right"></div>
            </div>
          </div>
         <?php 
            // error_reporting(0);
            $kd_barang = $_GET['kd_barang'];
            $jumlah_comment = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(comment) FROM tabel_comment_barang"));
            $jml_rating = mysqli_fetch_array(mysqli_query($koneksi, "SELECT case when rating is null then '0' else ROUND(AVG(rating),1) end as averageRating FROM tabel_ulasan_barang WHERE kd_barang='$kd_barang';")); // var_dump($jml_rating['averageRating']); die();
            $ketQuery = "SELECT * FROM tabel_barang,tabel_barang_gambar,tabel_stok_toko WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang AND tabel_barang.kd_barang = '$kd_barang' ";
            $executeSat = mysqli_query($koneksi, $ketQuery);
            while ($d = mysqli_fetch_array($executeSat)) {
                
                $stok = $d['stok'];
                $fotoProduk =  explode(",", $d['gambar']);
                $nm_barang = $d['nm_barang'];
                $harga = $d['hrg_jual'];
            ?>
            <div class="content-body">
                <!-- app ecommerce details start -->
                <section class="app-ecommerce-details">
                    <div class="card ">
                        <div class="card-body">
                          <div class="row mb-5 mt-2">
                            <div class="col-12 col-md-5 d-flex justify-content-center mb-2 mb-md-0">
                              <div class="">
                                 <img src="img/produk/<?php echo $fotoProduk[0]; ?>" class="img-fluid">
                             </div>
                             <div class="card-img-overlay overflow-hidden" style="margin-right: 10px;">
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
                           </div>
                         <div class="col-12 col-md-6">
                            <input type="hidden" name="nama_barang" id="nama_barang" value="<?php echo strtoupper($d['nm_barang']); ?> [<?php echo strtoupper($d['kd_barang']); ?>]" readonly>
                            <h1><strong><?php echo $d['nm_barang']; ?></strong></h1>
                                <p class="text-dark">by <?php echo $judul; ?></p>
                                    <div class="ecommerce-details-price d-flex flex-wrap">
                                        <p class="text-primary display-4 mr-1 mb-0">
                                            <?php 
                                            if ($d['diskon'] != null) { 
                                                echo "<span class='price-normal detail'><sup>Rp.</sup>".$d['hrg_jual']."</span>&nbsp; ";
                                            }?>
                                            <strong><sup>Rp.</sup><?php echo number_format($harga, 0, ",", "."); ?></strong>
                                        </p>
                                        <div class="rating"></div> &nbsp;
                                        <span class="ml-50 text-dark font-medium-1">
                                            <?php echo $jml_rating['averageRating']?> ratings
                                        </span>
                                    </div>
                                    <hr>
                                    <p><?php echo $d['deskripsi']; ?></p>
                                    <p class="font-weight-bold mb-25"> <i class="fas fa-truck-moving mr-50 font-medium-2"></i>
                                        Pengiriman
                                    </p>
                                    <hr>
                                    <p>Available - <span class="text-success">In stock</span></p>
                                    <input type="hidden" name="id_user" id="id_user" value="<?= $idUser ?>" readonly>
                                    <input type="hidden" name="id_merchant" id="id_merchant" value="<?php echo $d['kd_merchant'] ?>" readonly>
                                    <input type="hidden" name="kd_barang" id="kd_barang" value="<?php echo $d['kd_barang']; ?>" readonly>
                                    <input type="hidden" name="nm_barang" id="nm_barang" value="<?php echo $d['nm_barang']; ?>" readonly>
                                    <input type="hidden" name="kd_toko" id="kd_toko" value="<?= $d['kd_toko'] ?>" readonly>
                                    <input type="hidden" name="jml_rating" id="jml_rating" value="<?php echo $jml_rating['averageRating']?>" readonly>
                                    <div class="row">
                                        <div class="btn-group">
                                            <a title="Bayar sekarang juga." onclick="add_keranjang(`<?php echo $stok ?>`,`<?php echo $d['kd_barang'] ?>`,`<?php echo $d['kd_toko'] ?>`,`<?php echo $idUser ?>`)"
                                                class=" btn btn-info rounded-0">
                                                <i class="fas fa-luggage-cart"></i> BUY
                                            </a>
                                        <?php if ($akses == 'member') {?>
                                            <a title="Chat sekarang juga." onClick="chat_merchant()" href="single_chat.php?id=<?php echo $d['kd_merchant'] ?>" class="btn btn-info rounded-0 ml-1">
                                                <i class="far fa-comment-dots"></i> CHAT
                                            </a>
                                        <?php } else { ?>
                                            <a title="Harus login dahulu" href="" disabled class="btn btn-secondary rounded-0 ml-1">
                                                <i class="far fa-comment-dots"></i> CHAT
                                            </a>
                                        <?php } ?>
                                        </div>
                                    </div>
                                    <div class="divider">
                                        <div class="divider-text">
                                           <h3 class="font-medium-1 text-uppercase"><i class="fas fa-share-alt"></i> Share</h3>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <?php 
                                            $url2    = "http://localhost/santrimart/w/detail_produk.php?kd_barang=".$kd_barang;
                                            $url     = "https://santrimart.co.id/w/detail_produk.php?kd_barang=".$kd_barang;
                                            $message = strtoupper($nm_barang) .", Hanya Rp. ".$harga . ", Ayo buruan cek sekarang juga";
                                        ?>

                                        <div class="btn-group justify-content-center" style="margin-left: 20px;">
                                            <a href="https://facebook.com/sharer/sharer.php?u=<?php echo urlencode($url . $message) ?>" class="mr-1 text-info" target="_blank" title="Share on Facebook">
                                                <i class="fab fa-facebook-square fa-2x"></i>
                                            </a>
                                            <a href="https://twitter.com/intent/tweet/?text=<?php echo urlencode($message) ?>&amp;url=<?php echo urlencode($url) ?>" class="mr-1 text-info" target="_blank" title="Share on Twitter">
                                                <i class="fab fa-twitter-square fa-2x"></i>
                                            </a>
                                            <!-- <a href="" class="mr-1 text-info" target="_blank">
                                                <i class="fab fa-instagram-square fa-2x"></i>
                                            </a> -->
                                            <a href="https://api.whatsapp.com/send?phone=&text=<?php echo urlencode($message) ?>%20<?php echo urlencode($url) ?>" class="mr-1 text-info" target="_blank" title="Share on WhatApp">
                                                <i class="fab fa-whatsapp-square fa-2x"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="divider">
                                        <div class="divider-text">
                                            <h3 class="font-medium-1 text-uppercase">Ulasan</h3>
                                        </div>
                                        <?php error_reporting(0);
                                            $kd_barang = $_GET['kd_barang'];
                                            $query_ulasan = "SELECT a.id, a.no_faktur_pembelian, c.nm_user, a.kd_barang, a.rating, a.keterangan FROM tabel_ulasan_barang a
                                                INNER JOIN tabel_pembelian b ON a.no_faktur_pembelian = b.no_faktur_pembelian
                                                INNER JOIN tabel_member c ON b.id_user = c.id_user WHERE a.kd_barang = '$kd_barang' ";
                                            $hasil = mysqli_query($koneksi, $query_ulasan);
                                            while ($ulas = mysqli_fetch_array($hasil)) {
                                        ?>
                                        <div class="d-flex justify-content-start align-items-center mb-1 border-bottom-dark">
                                            <input type="hidden" name="jml_rating_det" id="jml_rating_det" readonly value="<?php echo $ulas['rating'] ?>">
                                            <div class="user-page-info ml-1">
                                                <h5 style="text-align: start"><?php echo substr($ulas['nm_user'],0,2) ?>***</h5>
                                                <p><?php echo $ulas['keterangan'] ?></p>
                                            </div>
                                            <div class="ml-auto cursor-pointer">
                                                <div class="rating-detil"></div>
                                            </div>
                                        </div>

                                        <?php } ?>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-start align-items-center mb-1">
                                                <div class="avatar mr-1">
                                                    <img src="img/toko/<?php echo $a['logo']; ?>" height="45" width="45">
                                                </div>
                                                <div class="user-page-info">
                                                    <h6 class="mb-0"><?php echo $judul; ?></h6>
                                                </div>
                                            </div>
                                           <div class="d-flex justify-content-start align-items-center mb-1">
                                                <div class="d-flex align-items-center">
                                                    <i class="feather icon-heart font-medium-2 mr-50"></i>
                                                    <!-- <span>276</span> -->
                                                </div>
                                                <p class="ml-auto d-flex align-items-center"> Total Kometar &nbsp;
                                                    <i class="feather icon-message-square font-medium-2 mr-50"></i><?php echo $jumlah_comment[0] ?>
                                                </p>
                                            </div>
                                            <?php if ($akses == 'member') {?>
                                            <fieldset class="form-label-group mt-3 mb-50">
                                                <textarea class="form-control" id="comment" rows="3"
                                                    placeholder="Add Comment"></textarea>
                                                <label for="label-textarea2">Add Comment</label>
                                            </fieldset>
                                            <button type="button" class="btn btn-info rounded-0 mt-1 waves-effect waves-light mb-4"
                                                onclick="add_comment(`<?php echo $d['kd_barang'] ?>`,`<?php echo $idUser ?>`)">Post Comment
                                            </button>
                                            <?php } ?>
                                            <p for="label-textarea2 mt-6">Komentar Dari Pelanggan</p>
                                            <?php error_reporting(0);
                                                $kd_barang = $_GET['kd_barang'];
                                                $query_comment = "SELECT * FROM tabel_comment_barang, tabel_member WHERE id_member=id_user and id_brg = '$kd_barang' ";
                                                $hasil = mysqli_query($koneksi, $query_comment);
                                                while ($comment = mysqli_fetch_array($hasil)) {
                                                    if ($comment['foto']!='') {
                                                        $images = $comment['foto'];
                                                    } else {
                                                        $images = 'user.jpg';
                                                    }
                                            ?>
                                            <div class="d-flex justify-content-start align-items-center mb-1 border-bottom-dark">
                                                <div class="avatar mr-50">
                                                    <img src="img/user/<?php echo $images; ?>" height="30" width="30">
                                                </div>
                                                <div class="user-page-info ml-1">
                                                    <h5 class=""><?php echo substr($comment['nm_user'],0,2) ?>***</h5>
                                                    <p><?php echo $comment['comment'] ?></p>
                                                </div>
                                                <div class="ml-auto cursor-pointer">
                                                    <i class="feather icon-heart mr-50"></i>
                                                    <i class="feather icon-message-square"></i>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>







                        <div class="card-body">
                            <div class="divider">
                                <div class="divider-text">
                                    <h3 class="font-large-1 text-uppercase">Produk Lainnya</h3>
                                </div>
                            </div>
                            <div class="swiper-responsive-breakpoints swiper-container">
                                <div id="produk_lain" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner" role="listbox">
                                        <div class="carousel-item active">
                                            <div class="row mt-1 pr-0 pl-0">   
                                               <?php
                                                $query = "SELECT * FROM `tabel_barang` INNER JOIN tabel_barang_gambar INNER JOIN tabel_stok_toko WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang";

                                                $result = mysqli_query($koneksi, $query);
                                                while ($produk = mysqli_fetch_array($result)) {
                                                    $gambars = $produk['gambar'];
                                                    $gambars = explode(",", $gambars);
                                                    $stok = $produk['stok'];
                                                ?>



                                                <!--------------------------------------------------SCRIPT---------------------------------------->

                                  <div class="col-lg-3 col-md-6 col-sm-12 col-6"> 
                                  <a href="index.php?menu=detail&kd_barang=<?php echo $produk['kd_barang']; ?>">
                                   <div class="swiper-slide rounded swiper-shadow">
                                    <div class="card p-1">
                                        <div class="card-content">
                                            <img class="card-img img-fluid" src="img/produk/<?php echo $gambars[0]; ?>" style="max-height:200px">

                                            <div class="card-img-overlay overflow-hidden">
                                                <h4 class="card-title mt-0 pt-0">
                                                    <!--<img src="w/img/logo.png" class="img-left float-left" width="35">-->
                                                    <?php if ($produk['diskon'] != null) { ?>
                                                    <div class="product-image">
                                                      <span class="onsale-section">
                                                      <span class="onsale"><?php echo $produk['diskon']; ?>%<br>OFF</span></span>
                                                    </div> 
                                                    <?php } else {  ?>  
                                                    <?php  } ?> 
                                                </h4>
                                                </div> 
                                                <img src="img/icon/cod.png" class="item-img p-1 float-right" width="150">
                                                <a href="#" class="font-medium-3 text-dark text-bold-500 text-decoration-none"><sup>Rp.</sup><?php echo number_format($produk['hrg_jual'], 2, ",", "."); ?></a>
                                                <p class="item-company"><?php echo $produk['nm_barang']; ?></span></p>
                                                    <span class="font-small-2">
                                                    <?php if ($stok == 0) { 
                                                    echo "Stok Habis"; } else if ($stok < 50) { 
                                                    echo "Stok Akan Habis"; } else if ($stok > 50) {
                                                    echo "Stok Masih Banyak";  } ?></span>
                                                  <?php if ($stok >= 250) { ?>
                                                  <div class="progress progress-bar-primary mt-1 mb-0">
                                                     <div class="progress-bar" role="progressbar" style="width:90%" aria-valuenow="80"aria-valuemin="0" aria-valuemax="100"></div></div>
                                                 <?php } else if ($stok < 250 && $stok >= 50) { ?>
                                                    <div class="progress progress-bar-warning mt-1 mb-0">
                                                       <div class="progress-bar" role="progressbar" style="width:50%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div></div>
                                                 <?php } else if ($stok < 50 && $stok > 0) { ?>                                                <div class="progress progress-bar-danger mt-1 mb-0">
                                                      <div class="progress-bar" role="progressbar" style="width:30%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div></div>
                                                 <?php } else { ?>
                                                    <div class="progress progress-bar-secondary mt-1 mb-0">
                                                       <div class=" progress-bar" role="progressbar" style="width:100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div></div>
                                                <?php } ?>
                                                <div class="d-flex justify-content-between mt-2">
                                                    <div class="float-left"> 
                                                      <div class="d-flex text-left">
                                                        <p class="badge badge-sm badge-info rounded">by <?php echo $a['nm_toko']; ?></p>

                                                     </div> 
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                  </div>  

        <!--------------------------------------------------SCRIPT---------------------------------------->


                                                <?php } ?>
                                            </div>
                                        </div>







                                        <div class="carousel-item">



                                            <div class="row">
                                                <?php

                                                $query = "SELECT * FROM `tabel_barang` INNER JOIN tabel_barang_gambar INNER JOIN tabel_stok_toko WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang";

                                                $result = mysqli_query($koneksi, $query);
                                                while ($produk = mysqli_fetch_array($result)) {
                                                    $gambars = $produk['gambar'];
                                                    $gambars = explode(",", $gambars);
                                                ?>



                                                <!--------------------------------------------------SCRIPT---------------------------------------->

                                  <div class="col-lg-3 col-md-6 col-sm-12 col-6"> 
                                  <a href="index.php?menu=detail&kd_barang=<?php echo $produk['kd_barang']; ?>">
                                   <div class="swiper-slide rounded swiper-shadow">
                                    <div class="card p-1">
                                        <div class="card-content">
                                            <img class="card-img img-fluid" src="img/produk/<?php echo $gambars[0]; ?>" style="max-height:200px">

                                            <div class="card-img-overlay overflow-hidden">
                                                <h4 class="card-title mt-0 pt-0">
                                                    <!--<img src="w/img/logo.png" class="img-left float-left" width="35">-->
                                                    <?php if ($produk['diskon'] != null) { ?>
                                                    <div class="product-image">
                                                      <span class="onsale-section">
                                                      <span class="onsale"><?php echo $produk['diskon']; ?>%<br>OFF</span></span>
                                                    </div> 
                                                    <?php } else {  ?>  
                                                    <?php  } ?> 
                                                </h4>
                                                </div> 
                                                <img src="img/icon/cod.png" class="item-img p-1 float-right" width="150">
                                                <a href="#" class="font-medium-3 text-dark text-bold-500 text-decoration-none"><sup>Rp.</sup><?php echo number_format($produk['hrg_jual'], 2, ",", "."); ?></a>
                                                <p class="item-company"><?php echo $produk['nm_barang']; ?></span></p>
                                                    <span class="font-small-2">
                                                    <?php if ($stok == 0) { 
                                                    echo "Stok Habis"; } else if ($stok < 50) { 
                                                    echo "Stok Akan Habis"; } else if ($stok > 50) {
                                                    echo "Stok Masih Banyak";  } ?></span>
                                                  <?php if ($stok >= 250) { ?>
                                                  <div class="progress progress-bar-primary mt-1 mb-0">
                                                     <div class="progress-bar" role="progressbar" style="width:90%" aria-valuenow="80"aria-valuemin="0" aria-valuemax="100"></div></div>
                                                 <?php } else if ($stok < 250 && $stok >= 50) { ?>
                                                    <div class="progress progress-bar-warning mt-1 mb-0">
                                                       <div class="progress-bar" role="progressbar" style="width:50%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div></div>
                                                 <?php } else if ($stok < 50 && $stok > 0) { ?>                                                <div class="progress progress-bar-danger mt-1 mb-0">
                                                      <div class="progress-bar" role="progressbar" style="width:30%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div></div>
                                                 <?php } else { ?>
                                                    <div class="progress progress-bar-secondary mt-1 mb-0">
                                                       <div class=" progress-bar" role="progressbar" style="width:100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div></div>
                                                <?php } ?>
                                                <div class="d-flex justify-content-between mt-2">
                                                    <div class="float-left"> 
                                                      <div class="d-flex text-left">
                                                        <p class="badge badge-sm badge-info rounded">by <?php echo $a['nm_toko']; ?></p>

                                                     </div> 
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                  </div>  

        <!--------------------------------------------------SCRIPT---------------------------------------->

                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#produk_lain" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#produk_lain" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                </section>
                <!-- app ecommerce details end -->
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

    <script src="app-assets/vendors/rating/jquery.star-rating-svg.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.2.4.min.js"></script>


    <!-- <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js"></script> -->

    <script src="app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
    <script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="app-assets/js/scripts/forms/wizard-steps.js"></script>
    <!-- END: Page JS-->
    <script src="app-assets/vendors/js/coming-soon/jquery.countdown.min.js"></script>
    <script src="app-assets/js/scripts/pages/coming-soon.js"></script>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="app-assets/js/jquery3.6.0.min.js"></script>
    <script src="app-assets/js/sweetalert2@11.js"></script>
    <script>

        $(document).ready(function() {

            var jml_rating = $('#jml_rating').val();
            $('.rating-detil').starRating({
                initialRating: jml_rating,
                strokeColor: '#894A00',
                strokeWidth: 10,
                starSize: 20
            });

        })

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

        
    </script>
</body>
<!-- END: Body-->

</html>
<?php } ?>