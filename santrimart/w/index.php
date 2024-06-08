<?php include "inc/koneksi.php";
$a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_toko")); ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="o">
    <meta http-equiv="refresh" content="360">
    <title>.: <?php echo $a['nm_toko']; ?> :.</title>
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

    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/swiper.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <style>
    .swiper {
        width: 100%;
        height: 100%;
    }

	.onsale-section {
	  position: absolute;
	  top: -2px;
	  right: 4px;
	}

	.onsale-section:after {
	  position: absolute;
	  content: '';
	  display: block;
	  width: 2px;
	  height: 0;
	  border-left: 25px solid transparent;
	  border-right: 25px solid transparent;
	  border-top: 30px solid #6ec5d5;
	}

	.onsale {
	  position: relative;
	  display: inline-block;
	  text-align: center;
	  color: #fff;
	  background: #6ec5d5;
	  font-size: 14px;
	  line-height: 1;
	  padding: 15px 8px 4px;	  
	  width: 50px;
	  text-transform: uppercase
	}
    
    .horizontal-menu .content .content-wrapper {
        max-width: 1600px;
        margin: 0 auto;
    }

	</style>
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 2-columns navbar-floating footer-static ecommerce-application" data-open="hover" data-menu="horizontal-menu" data-col="2-columns"
    style="background:<?php echo $a['background']; ?>">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center"
        style="background:<?php echo $a['headerfooter']; ?>">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item"><a class="navbar-brand" href="../">
                        <img src="img/toko/<?php echo $a['logo']; ?>" width="75" />
                    </a></li>
            </ul>
        </div>
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                    class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="fa-solid fa-ellipsis-vertical"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons">
                            <li class="nav-item d-none d-lg-block text-bold-700"><a href="#login"
                                    class="btn btn-dark mt-1 mb-1 font-small-3"> <?php echo $a['nm_toko']; ?> </a></li>
                        </ul>
                    </div>
                    <ul class="nav navbar-nav float-right">
                        <li class="nav-item nav"><a href="#" class="btn btn-dark mt-1 mb-1 font-small-3"><i class="fab fa-google-play"></i> Download App!</a></li>
                        <li class="dropdown dropdown-user nav-item"><a
                                class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav"></div>
                                <i class="fa-solid fa-user-lock fa-2x pt-1 d-lg-none"></i>
                                <span class="d-xl-block d-none"><img class="round"
                                        src="img/toko/<?php echo $a['logo']; ?>" height="40" width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right w-25">
                                <a class="dropdown-item" href="aut/login.php"><i class="fas fa-user-lock"></i>
                                    Login!</a>
                                <a class="dropdown-item" href="aut/daftar.php"><i class="fas fa-user-plus"></i>
                                    Register!</a>
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
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border"
            role="navigation" data-menu="menu-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="../">
                            <img src="img/toko/<?php echo $a['logo']; ?>" height="30" />
                        </a></li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i
                                class="feather icon-x d-block d-xl-none font-medium-4 dark toggle-icon"></i><i
                                class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary"
                                data-ticon="icon-disc"></i></a></li>
                </ul>
            </div>
            <!-- Horizontal menu content-->
            <div class="navbar-container main-menu-content" data-menu="menu-container">
                <ul class="nav navbar-nav justify-content-center" id="main-menu-navigation" data-menu="menu-navigation">
                    <li class="nav-item"><a class="nav-link" href="#home"><i class="fas fa-store-alt"></i> Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#member"><i class="fas fa-wallet"></i> Member</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#diskon"><i class="fas fa-portrait"></i> Diskon</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#akses"><i class="fas fa-user-lock"></i> Akses APP!</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact_us"><i class="fas fa-headset"></i> Contact Us</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content pt-0 pl-0 pr-0">
      <div class="content-wrapper pt-0 mt-0" id="member"> 
        <div class="card bg-transparent shadow-none">           
           <div class="content-body">                 
                                  
                     <div class="col-lg-12 col-md-12 col-sm-12 pr-0 pl-0">
                        <div class="card pt-3 mt-3">
                              <div id="carousel-example-caption" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                  <li data-target="#carousel-example-caption" data-slide-to="0" class="active"></li>
                                  <li data-target="#carousel-example-caption" data-slide-to="1"></li>
                                </ol>
                                  <div class="carousel-inner" role="listbox">
                                    <?php $ketQuery = "SELECT * FROM `tabel_slide` ORDER BY id_slide DESC";
                                          $executeSat = mysqli_query($koneksi, $ketQuery);
                                          $i = 0;
                                          while ($m = mysqli_fetch_array($executeSat)) {
                                          if ($i == 0) { ?>
                                        <div class="carousel-item active">
                                            <img class="img-fluid rounded-0"
                                                src="img/iklan/<?php echo $m['gbr_slide'] ?>">
                                        </div>
                                        <?php } else { ?>
                                        <div class="carousel-item">
                                            <img class="img-fluid rounded-0"
                                                src="img/iklan/<?php echo $m['gbr_slide'] ?>">
                                        </div>
                                        <?php }  $i++; } ?>
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
        <!-- END: Content-->

        <div class="content-wrapper pt-0 mt-0" id="member">
            <div class="card">
                <div class="content-body">
                    <!-- centered-slides swiper option-1 start -->
                    <section id="component-swiper-centered-slides">
                        <div class="card bg-transparent shadow-none">
                            <div class="divider">
                                <div class="divider-text">
                                    <h5 class="mb-1 display-5 pt-1 text-uppercase">Cek Produk disini</h5>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">

                                                                       
                                    <h1 id="judul_produk" class="ml-2"></h1>
                                    <input type="text" id="nama-toko" hidden value="<?php echo $a['nm_toko']; ?>">
                                    <div id="produk"></div>
                                    <div id="all-produk">
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
                               <div class="swiper-slide rounded swiper-shadow">
                                <div class="card">
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
                                            <img src="img/icon/cod.png" class="item-img p-1 float-right" width="150"><hr>
                                            <a href="#" class="font-medium-3 text-dark text-bold-500"><sup>Rp.</sup><?php echo number_format($produk['hrg_jual'], 2, ",", "."); ?></a>
                                        	<p class="item-company"><?php echo $produk['nm_barang']; ?></span></p>
                                            	<span>Stok Akan Habis</span>
                                                 <div class="progress progress-bar-danger mt-1 mb-0">
                                                   <div class="progress-bar" role="progressbar" style="width:80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                            <div class="d-flex justify-content-between mt-2">
                                                <div class="float-left"> 
                                                  <div class="d-flex text-left">
                                                    <!--p class="badge badge-sm badge-info rounded">by <?php echo $a['nm_toko']; ?></p-->
                                                 </div>                                        
                                                </div>
                                                <div class="float-right">                                                
                                                    <div class="d-flex text-center">
                                                     <a href="aut/login.php" class="btn btn-sm btn-danger rounded-0 mb-1 font-small-1">
                                                     <i class="fas fa-shopping-bag"></i> BUY </a>          
                                                    </div>  
                                                </div>                           
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>  
<!--------------------------------------------------SCRIPT---------------------------------------->
                                    <?php   } ?>        
                                            
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- centered-slides swiper option-1 ends -->


                </div>
            </div>
        </div>


       


        <div class="content-wrapper pt-0 mt-0" id="akses">
            <div class="card">
                <div class="content-body">
                    <div class="row justify-content-center">
                        <div class="col-md-12 text-center">
                            <div class="divider">
                                <div class="divider-text">
                                    <h3 class="mb-3 display-5 pt-0 text-uppercase">Akses APP!</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-6">
                                    <div class="card bg-gradient-warning">
                                        <div class="card-header d-flex flex-column align-content-center pb-0">
                                            <div class="avatar bg-rgba-primary p-0 m-0">
                                                <div class="avatar-content">
                                                    <i class="fa fa-shopping-bag fa-3x text-dark"></i>
                                                </div>
                                            </div>
                                            <h4 class="text-bold-300 mt-1 mb-25">E-Commerce</h4>
                                            <p class="mb-0 font-small-1">Belanja dan Jual Produk Kebutuhan Anda Sekarang</p>
                                        </div>
                                        <div class="card-content text-center">
                                            <a href="page/" class="btn btn-primary round">LOGIN</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-6">
                                    <div class="card bg-gradient-success">
                                        <div class="card-header d-flex flex-column align-content-center pb-0">
                                            <div class="avatar bg-rgba-danger p-0 m-0">
                                                <div class="avatar-content">
                                                    <i class="fas fa-cash-register fa-3x text-dark"></i>
                                                </div>
                                            </div>
                                            <h4 class="text-bold-300 mt-1 mb-25">iPOS</h4>
                                            <p class="mb-0 font-small-1">Kelola pesanan dan produk anda</p>
                                        </div>
                                        <div class="card-content text-center">
                                            <a href="page/" class="btn btn-danger round">LOGIN</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="content-wrapper pt-0 mt-0" id="contact_us">
            <div class="card">
                <div class="content-body">
                    <!-- KONTAK -->
                    <section>
                        <div class="row justify-content-center">
                            <div class="col-md-12 text-center">
                                <div class="divider">
                                    <div class="divider-text">
                                        <h3 class="mb-3 display-5 pt-2 text-uppercase">Bagikan Pengalaman Anda!</h3>
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
                                            <form method="post" action="aksi/aksi_daftar.php">
                                                <fieldset
                                                    class="form-group position-relative has-icon-left input-divider-left">
                                                    <input type="text" class="form-control" id="iconLeft3"
                                                        placeholder="Nama">
                                                    <div class="form-control-position"><i class="fa fa-user-o"></i>
                                                    </div>
                                                </fieldset>
                                                <fieldset
                                                    class="form-group position-relative has-icon-left input-divider-left">
                                                    <input type="text" class="form-control" id="iconLeft3"
                                                        placeholder="No.Telepon/Whatsapp">
                                                    <div class="form-control-position"><i class="fa fa-whatsapp"></i>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="form-label-group">
                                                    <textarea class="form-control" id="label-textarea" rows="3"
                                                        placeholder="Tulis Pengalaman Anda">
                         </textarea>
                                                    <label for="label-textarea">Tulis Pengalaman Anda</label>
                                                </fieldset>
                                                <button type="submit" class="btn btn-danger float-right">Kirim</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-12">
                                <div class="card bg-gradient-warning">
                                    <div class="card-header">
                                        <h4 class="badge badge-danger">Kata Mereka</h4>
                                    </div>

                                    <div class="card-content">
                                        <div class="card-body">
                                            <div id="testi" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner" role="listbox">
                                                    <?php
                                                    $ketQuery = "SELECT * FROM tabel_comment";
                                                    $executeSat = mysqli_query($koneksi, $ketQuery);
                                                    while ($m = mysqli_fetch_array($executeSat)) {
                                                        // print_r($m)
                                                    ?>
                                                    <!---------------------------------------------SCRIPT----------------------------->
                                                    <div class="carousel-item active text-center">
                                                        <div class="avatar mb-3">
                                                            <img src="img/comment/1.jpg" width="100" height="100">
                                                            <span class="avatar-status-busy"></span>
                                                        </div>
                                                        <div class="divider">
                                                            <div class="divider-text">
                                                                <!-- <h3>Username</h3> -->
                                                                <h3><?php echo $m['nama'] ?></h3>

                                                            </div>
                                                        </div>
                                                        <div class="text-dark position-bottom-0 pb-0">
                                                            <p><i class="fa fa-quote-left font-large-1"></i> Sangat
                                                                bagus akang</p>
                                                        </div>
                                                    </div>

                                                    <!---------------------------------------------SCRIPT----------------------------->
                                                    <!---------------------------------------------SCRIPT----------------------------->
                                                    <div class="carousel-item  text-center">
                                                        <div class="avatar mb-3">
                                                            <img src="img/comment/2.jpg" width="100" height="100">
                                                            <span class="avatar-status-busy"></span>
                                                        </div>
                                                        <div class="divider">
                                                            <div class="divider-text">
                                                                <h3><?php echo $m['nama'] ?></h3>
                                                            </div>
                                                        </div>
                                                        <div class="text-dark position-bottom-0 pb-0">
                                                            <p><i class="fa fa-quote-left font-large-1"></i> Sangat
                                                                bagus akang</p>
                                                        </div>
                                                    </div>

                                                    <?php } ?>

                                                    <!---------------------------------------------SCRIPT----------------------------->
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#testi" role="button"
                                                data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#testi" role="button"
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
            </div>
        </div>
    </div>
    </section>
    <!-- KONTAK -->
    </div>
    </div>
    </div>




    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN: Footer-->
    <footer class="footer footer-static fixed-footer d-xl-none"
        style="background:<?php echo $a['headerfooter']; ?>;position:fixed;bottom:0;width:100%;z-index:100">
        <div class="row mt-0 pt-0">
            <div class="col-3 text-center"><a href="index.php?menu=ipos" style="color:<?php echo $a['tombol']; ?>"><i
                        class="fas fa-cash-register font-medium-1"></i></a></div>
            <div class="col-3 text-center"><a href="index.php?menu=streaming"
                    style="color:<?php echo $a['tombol']; ?>"><i class="fas fa-video font-medium-1"></i></a></div>
            <div class="col-3 text-center"><a href="index.php?menu=order"
                    style="color:<?php echo $a['tombol']; ?>"><span
                        class="badge badge-pill badge-info font-small-2">1</span><i
                        class="fas fa-receipt font-medium-1"></i></a></div>
            <div class="col-3 text-center"><a href="index.php?menu=profile" style="color:<?php echo $a['tombol']; ?>"><i
                        class="fas fa-user-edit font-medium-1"></i></a></div>
        </div>
    </footer>
    <!-- END: Footer-->
    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light d-xl-block d-none"
        style="background:<?php echo $a['headerfooter']; ?>">
        <p class="clearfix blue-grey lighten-2 mb-0">
            <span class="float-md-left d-block d-md-inline-block mt-25">&copy; <?php echo date('Y') ?> Developer by
                <a class="text-bold-800 grey darken-2" href="#" target="_blank"><?php echo $a['nm_toko']; ?></a>
            </span><span class="float-md-right d-none d-md-block"><img src="img/toko/<?php echo $a['logo']; ?>"
                    class="img-border box-shadow-1" width="40"></span>
            <!--button class="btn btn-icon scroll-top" type="button"></button-->
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
    <script src="app-assets/vendors/js/calendar/fullcalendar.js"></script>
    <script src="app-assets/vendors/js/calendar/fullcalendar.min.js"></script>
    <script src="app-assets/vendors/js/calendar/extensions/daygrid.min.js"></script>
    <script src="app-assets/vendors/js/calendar/extensions/timegrid.min.js"></script>
    <!-- <script src="app-assets/vendors/js/calendar/extensions/interactions.min.js"></script> -->
    <!-- <script src="app-assets/js/scripts/extensions/fullcalendar.js"></script> -->
    <script src="app-assets/vendors/js/pagination/jquery.bootpag.min.js"></script>
    <script src="app-assets/vendors/js/pagination/jquery.twbsPagination.min.js"></script>
    <script src="app-assets/js/scripts/pagination/pagination.js"></script>

    <script src="app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
    <script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="app-assets/js/scripts/forms/wizard-steps.js"></script>
    <!-- END: Page JS-->
    <script src="app-assets/vendors/js/coming-soon/jquery.countdown.min.js"></script>
    <script src="app-assets/js/scripts/pages/coming-soon.js"></script>

    <script src="app-assets/vendors/js/extensions/swiper.min.js"></script>
    <script src="app-assets/js/scripts/extensions/swiper.js"></script>

    <script type="text/javascript">
    function pilihKategori(kd_kategori, nm_kategori) {
        var produk = document.getElementById('produk');
        $('#all-produk').remove();
        $('#judul_produk').val(nm_kategori);
        nm_toko = $('#nama-toko').val();
        $.ajax({
            type: "GET",
            url: 'aksi/produk_kategori.php?key=' + kd_kategori + '&nama_toko=' + nm_toko,
            dataType: "html",
            async: false,
            success: function(text) {
                produk.innerHTML = text;
            }
        });
    }
    </script>

</body>
<!-- END: Body-->

</html>