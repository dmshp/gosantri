<?php 
include "../inc/koneksi.php";
session_start();
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
} else {
}
// $kode_toko = $_SESSION['kd_toko'];
// var_dump($_SESSION);
// die;
?>
 
<?php
$a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM `tabel_toko`"));
$background		= $a['background'];
$headerfooter	= $a['headerfooter'];
$tombol			  = $a['tombol'];
$logo       	= $a['logo'];
$toko			    = $a['nm_toko'];
$kd_toko		  = $a['kd_toko'];
$almt_toko		= $a['almt_toko'];
$tlp_toko		  = $a['tlp_toko'];
$latlng_toko	= $a['latitude'] . "," . $a['longitude'];
?>

<?php $user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_member WHERE nm_user = '$_SESSION[nm_user]'"));
$foto       = $user['foto'];
?>

<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">

<!-- BEGIN: Head-->



<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="<?php echo $toko; ?>">
    <meta name="keywords" content="<?php echo $toko; ?>">
    <meta name="author" content="<?php echo $toko; ?>">
    <meta http-equiv="refresh" content="1200">
    <title>.: <?php echo $toko; ?> :.</title>
    <link rel="apple-touch-icon" href="../app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="../img/<?php echo $logo; ?>">
    <link href="../app-assets/font/css/fontawesome.min.css" rel="stylesheet" type="text/css">
    <link href="../app-assets/font/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/extensions/shepherd-theme-default.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/editors/quill/katex.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/editors/quill/quill.snow.css">

    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core-new/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core-new/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/semi-dark-layout.css">
    <!-- BEGIN: Page CSS-->

    <link rel="stylesheet" type="text/css" href="../app-assets/css/core-new/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core-new/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/card-analytics.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/plugins/tour/tour.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/extensions/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/app-ecommerce-shop.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/users.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/app-user.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/plugins/forms/validation/form-validation.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/calendars/fullcalendar.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/calendars/extensions/daygrid.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/calendars/extensions/timegrid.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/plugins/calendars/fullcalendar.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/file-uploaders/dropzone.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/tables/datatable/extensions/dataTables.checkboxes.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/plugins/file-uploaders/dropzone.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/data-list-view.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/plugins/forms/wizard.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/invoice.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap-colorpicker.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/plugins/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/extensions/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/plugins/extensions/swiper.css">
		<link rel="stylesheet" type="text/css" href="../app-assets/css/pages/app-email.css">
		<link rel="stylesheet" type="text/css" href="../app-assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/rating/css/star-rating-svg.css">
    <!-- <link rel="stylesheet" type="text/css" href="../app-assets/star/star-rating.min.css"> -->
    <!-- BEGIN: Custom CSS-->

    

    <!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"

        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"-->

    <!-- END: Custom CSS-->
    <style type="text/css">
    .image-container {
      width: 90%;
      margin: 0 auto 30px auto;
    }
    .image-container img {
      display: block;
      position: relative;
      max-width: 100%;
      max-height: 400px;
      margin: auto;
    }
    figcaption .figcaptio-image {
      margin: 20px 0 30px 0;
      text-align: center;
      color: #fff;
    }
    .input-image {
      display: none;
    }
    .label-images {
      display: block;
      position: relative;
      background-color: #1c72fd;
      color: #000;
      font-size: 12px;
      text-align: center;
      width: 150px;
      padding: 2px 0;
      border-radius: 19px;
      margin: auto;
      cursor: pointer;
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
    .content-header.row {
        /*display: none;*/
    }
    ul.nav.navigation {
      overflow-y: inherit;
    }

    .price-normal {
      position: relative;
      font-size: 14px;
    }
    .price-normal::after {
      color: #eee;
      font-weight: 800;
      display: block;
      position: absolute;
      top: 7px;
      left: -2px;
      width: calc(100% + 4px);
      height: 2px;
      background: #f10b0b;
      content: '';
    }
    .price-normal.detail {
      font-size: 30px;
    }
    .price-normal.detail::after {
      top: 15px;
    }

    .horizontal-menu .content .content-wrapper {
      max-width: 1600px;
      margin: 0 auto;
    }

    .btn.btn-icon {
      padding: 0.715rem 0.791rem;
      margin: 10px;
    }

    .text-title {
      animation: blink-animation 1s steps(3, start) infinite;
      -webkit-animation: blink-animation 1s steps(3, start) infinite;
    }

    .nama-user{
      font-size: 12px;
      animation: blink-animation 1s steps(3, start) infinite;
      -webkit-animation: blink-animation 1s steps(3, start) infinite;
    }

    .text-user{
      color: #df0a0a;
      animation: blink-animation 1s steps(3, start) infinite;
      -webkit-animation: blink-animation 1s steps(3, start) infinite;
    }

    @keyframes blink-animation {
      to {
        visibility: hidden;
      }
    }

    @-webkit-keyframes blink-animation {
      to {
        visibility: hidden;
      }
    }

    .font-small-1 {
      font-size: 0.7rem !important;
      color: #ffffff;
    }

    #user-profile .profile-img-container img {
      border: 0.3rem solid #FFFFFF;
      height: 80px;
      width: 80px;
      margin-bottom: 10px;
    }
    
  </style>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>



</head>

<!-- END: Head-->



<!-- BEGIN: Body-->

<?php
$admin = "";
if ($_SESSION['akses'] == 'adminx') { $admin = "admin"; } ?>

<body class="<?= $admin ?> horizontal-layout horizontal-menu 2-columns navbar-floating footer-static ecommerce-application"
    data-open="hover" data-menu="horizontal-menu" data-col="2-columns" style="background:<?php echo $background; ?>">
		<input type='hidden' id='latitude_toko' value='<?= $a['latitude'] ?>'>
		<input type='hidden' id='longitude_toko' value='<?= $a['longitude'] ?>'>
    <input type="hidden" name="id_user" id="id_user" value="<?= $_SESSION['id_user'] ?>">



  <?php
	if ($_SESSION['akses'] != 'kurir') {
  	// include '../inc/header.php';
    include '../inc/header-new.php';
	}

  ?>



    <?php if ($_SESSION['akses'] == 'admin') {

    //if ($_SESSION['level'] == "admin" || $_SESSION['level'] == 'superadmin') {

  ?>

    <div class="app-content content pb-5 mb-5 mt-0 pt-3">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h4 class="content-header-title float-left mb-0 pt-1 font-medium-5"><i class="fa-regular fa-user"></i></h4>
                            <div class="breadcrumb-wrapper col-12 pt-1">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?menu=home">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#"><?php echo $_SESSION['nm_user'];?></a>
                                    </li>                                   
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="content-body">
                <div id="user-profile">
                    <div class="row">
                        <div class="col-12">
                            <div class="profile-header mb-2">
                                <div class="relative">
                                    <?php 
                                        $ketQuery   = "SELECT * FROM tabel_slide WHERE kat_slide = '4' ORDER BY id_slide DESC limit 1";
                                        $executeSat = mysqli_query($koneksi, $ketQuery);
                                        while ($m = mysqli_fetch_array($executeSat)) {
                                    ?>

                                    <div class="cover-container">
                                        <img class="img-fluid bg-cover rounded-0 w-100" src="../img/iklan/<?php echo $m['gbr_slide'] ?>">
                                    </div>
                                    <?php } ?>
                                    <div class="profile-img-container d-flex align-items-center justify-content-between">
                                        <img src="../img/toko/<?php echo $logo;?>" onerror="this.src='../img/user/user.jpg';" class="rounded-circle img-border box-shadow-1">
                                        <div class="float-right">
                                            <a title="Edit Profile" class="btn btn-icon btn-icon rounded-circle btn-warning mr-1 dropdown-toggle nav-link dropdown-user-link align-items-center" href="#" data-toggle="dropdown" style="height: 55px;">
                                                <i class="fas fa-user-edit fa-2x align-items-center"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                              <a class="dropdown-item" href="index.php?menu=profile"><i class="fas fa-user-edit"></i> Edit Profile</a>
                                              <div class="dropdown-divider"></div>
                                              <a class="dropdown-item" href="../aut/logout.php"><i class="fas fa-power-off"></i> Logout</a>
                                          </div>                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end align-items-center profile-header-nav">
                                    <nav class="navbar navbar-expand-sm w-100 pr-0">
                                        <!-- <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"><i class="feather icon-align-justify"></i></span>
                                        </button> -->
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <ul class="navbar-nav justify-content-around w-50 ml-sm-auto">                              
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
              
                        </div>
                    </div>
                </div>

            </div>

    <?php

    if (isset($_GET['kode_produk'])) {

      include('show_product.php');

    }

    if (isset($_GET['menu'])) {

      $menu = $_GET['menu'];

      switch ($menu) {

        case ('home');

          include('home2.php');

          break;

        case ('ipos');

          include('ipos.php');

          break;

        case ('wholesale');

          include('wholesale.php');

          break;

        case ('product');

          include('product.php');

          break;

        case ('member');

          include('member.php');

          break;

        case ('merchant');

          include('merchant.php');

          break;

        case ('kelola');

          include('kelola_product.php');

          break;

        case ('order');

          include('order-online.php');

          break;

        case ('ads');

          include('ads.php');

          break;

        case ('info');

          include('info.php');

          break;

        case ('pembayaran');

          include('pembayaran.php');

          break;

        case ('kurir');

          include('kurir.php');

          break;

        case ('user');

          include('user.php');

          break;

        case ('master_user');

          include('master_user.php');

          break;

        case ('profile');

          include('website.php');

          break;

        case ('website');

          include('website.php');

          break;

        case ('keuangan');

          include('keuangan.php');

          break;

        case ('streaming');

          include('streaming.php');

          break;

        case ('saldo');

          include('saldo.php');

          break;

        case ('transfer');

          include('transfer.php');

          break;

        case ('retur');

          include('retur.php');

          break;

        case ('nota');

          include('nota.php');

          break;

        case ('nota2');

          include('nota2.php');

          break;

        case ('edit_retur');

          include('show_retur.php');

          break;

        case ('sales');

          include('report_sales.php');

          break;

        case ('balance');

          include('report_balance.php');

          break;

        case ('stock');

          include('report_stock.php');

          break;

        case ('edit_product');

          include('edit_product.php');

          break;

        case ('report_member');

          include('list_report_member.php');

          break;

      }

    }

    ?>

    <?php } ?>
		
		<?php if ($_SESSION['akses'] == 'kasir') {

?>

  <?php

  if (isset($_GET['menu'])) {

    $menu = $_GET['menu'];

    switch ($menu) {
      case ('ipos');

        include('ipos.php');

        break;

      case ('home');

        include('dashboard.php');

        break;

      case ('profile');

        include('profile.php');

        break;
      
    }
  }

  ?>

<?php } ?>

<?php if ($_SESSION['akses'] == 'gudang') {

?>

  <?php

  if (isset($_GET['menu'])) {

    $menu = $_GET['menu'];

    switch ($menu) {

      case ('home');

        include('dashboard.php');

        break;

      case ('product');

        include('product.php');

        break;

      case ('checkout');

        include('checkout.php');

        break;

      case ('order');

        include('order-online.php');

        break;

      case ('detail');

        include('details.php');

        break;

      case ('profile');

        include('profile.php');

        break;

      case ('retur');

        include('retur.php');

        break;

      case ('nota');

        include('nota.php');

        break;

      case ('sales');

        include('report_sales.php');

        break;

      case ('balance');

        include('report_balance.php');

        break;

      case ('stock');

        include('report_stock.php');

        break;
    }
  }

  ?>

<?php } ?>
  

    <?php if ($_SESSION['akses'] == 'merchant') {

  ?>

    <div class="app-content content pb-5 mb-5 mt-0 pt-3">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
          <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
              <div class="row breadcrumbs-top">
                <div class="col-12">
                  <h4 class="content-header-title float-left mb-0 pt-1 font-medium-5"><i class="fa-regular fa-user"></i></h4>
                  <div class="breadcrumb-wrapper col-12 pt-1">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="index.php?menu=home">Home</a>
                      </li>
                      <li class="breadcrumb-item"><a href="#"><?php echo $_SESSION['nm_user'];?></a>
                      </li>                                   
                    </ol>
                  </div>
                </div>
              </div>
            </div>
              
          </div>
          <div class="content-body">
            <div id="user-profile">
              <div class="row">
                <div class="col-12">
                  <div class="profile-header mb-2">
                    <div class="relative">
                      <?php 
                          $ketQuery   = "SELECT * FROM tabel_slide WHERE kat_slide = '4' ORDER BY id_slide DESC limit 1";
                          $executeSat = mysqli_query($koneksi, $ketQuery);
                          while ($m = mysqli_fetch_array($executeSat)) {
                      ?>

                      <div class="cover-container">
                        <img class="img-fluid bg-cover rounded-0 w-100" src="../img/iklan/<?php echo $m['gbr_slide'] ?>">
                      </div>
                      <?php } ?>
                      <div class="profile-img-container d-flex align-items-center justify-content-between">
                        <img src="../img/toko/<?php echo $logo;?>" onerror="this.src='../img/user/user.jpg';" class="rounded-circle img-border box-shadow-1">
                        <div class="float-right">
                            <a title="Edit Profile" class="btn btn-icon btn-icon rounded-circle btn-warning mr-1 dropdown-toggle nav-link dropdown-user-link align-items-center" href="#" data-toggle="dropdown" style="height: 55px;">
                                <i class="fas fa-user-edit fa-2x align-items-center"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="index.php?menu=profile"><i class="fas fa-user-edit"></i> Edit Profile</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="../aut/logout.php"><i class="fas fa-power-off"></i> Logout</a>
                          </div>                                           
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end align-items-center profile-header-nav">
                      <nav class="navbar navbar-expand-sm w-100 pr-0">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav justify-content-around w-50 ml-sm-auto">                              
                          </ul>
                        </div>
                      </nav>
                    </div>
                  </div>
      
                </div>
              </div>
            </div>

          </div>

    <?php

    if (isset($_GET['menu'])) {

      $menu = $_GET['menu'];

      switch ($menu) {

        case ('home');

          include('dashboard_view.php');

          break;

        case ('home_view');

          include('dashboard.php');

          break;

        case ('product');

          include('product.php');

          break;

        case ('checkout');

          include('checkout.php');

          break;

        case ('order');

          include('order.php');

          break;

        case ('history');

          include('history_merchant.php');

          break;

        case ('detail');

          include('details.php');

          break;

        case ('saldo');

          include('saldo_merchant.php');

          break;

        case ('profile');

          include('website_merchant.php');

          break;

        case ('website');

          include('website_merchant.php');

          break;

        case ('retur');

          include('retur.php');

          break;

        case ('nota');

          include('nota.php');

          break;

        case ('laporan_merchant');

          include('laporan_merchant.php');

          break;

        case ('sales');

          include('report_sales.php');

          break;

        case ('bonus');

        include('report_bonus.php');

        break;

        case ('balance');

          include('report_balance.php');

          break;

        case ('stock');

          include('report_stock.php');

          break;

      }

    }

    ?>

    <?php } ?>



    <?php if ($_SESSION['akses'] == 'member') { 
      include '../inc/header-new.php';
    ?>

    <div class="app-content content pb-5 mb-5 mt-0 pt-3">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h4 class="content-header-title float-left mb-0 pt-1 font-medium-5"><i class="fa-regular fa-user"></i></h4>
                            <div class="breadcrumb-wrapper col-12 pt-1">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?menu=home">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#"><?php echo $_SESSION['nm_user'];?></a>
                                    </li>                                   
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="content-body">
                <div id="user-profile">
                    <div class="row">
                        <div class="col-12">
                            <div class="profile-header mb-2">
                                <div class="relative">
                                    <?php 
                                        $ketQuery   = "SELECT * FROM tabel_slide WHERE kat_slide = '4' ORDER BY id_slide DESC limit 1";
                                        $executeSat = mysqli_query($koneksi, $ketQuery);
                                        while ($m = mysqli_fetch_array($executeSat)) {
                                    ?>

                                    <div class="cover-container">
                                        <img class="img-fluid bg-cover rounded-0 w-100" src="../img/iklan/<?php echo $m['gbr_slide'] ?>">
                                    </div>
                                    <?php } ?>
                                    <div class="profile-img-container d-flex align-items-center justify-content-between">
                                        <img src="../img/toko/<?php echo $logo;?>" onerror="this.src='../img/user/user.jpg';" class="rounded-circle img-border box-shadow-1">
                                        <div class="float-right">
                                            <a title="Edit Profile" class="btn btn-icon btn-icon rounded-circle btn-warning mr-1 dropdown-toggle nav-link dropdown-user-link align-items-center" href="#" data-toggle="dropdown" style="height: 55px;">
                                                <i class="fas fa-user-edit fa-2x align-items-center"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                              <a class="dropdown-item" href="index.php?menu=profile"><i class="fas fa-user-edit"></i> Edit Profile</a>
                                              <div class="dropdown-divider"></div>
                                              <a class="dropdown-item" href="../aut/logout.php"><i class="fas fa-power-off"></i> Logout</a>
                                          </div>                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end align-items-center profile-header-nav">
                                    <nav class="navbar navbar-expand-sm w-100 pr-0">
                                        <!-- <button class="navbar-toggler pr-0" type="button" data-toggle="collapse" data-target="navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"><i class="feather icon-align-justify"></i></span>
                                        </button> -->
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <ul class="navbar-nav justify-content-around w-50 ml-sm-auto">                              
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
              
                        </div>
                    </div>
                </div>

            </div>

    <?php


    if (isset($_GET['menu'])) {

      $menu = $_GET['menu'];

      switch ($menu) {

        case ('home');

          include('beranda2.php');

          break;

        case ('list');

          include('list_produk.php');

          break;

        case ('produk');

          include('list_produk_semua.php');

          break;

        case ('detail');

          include('details.php');

          break;

        case ('read');

          include('reading.php');

          break;

        case ('checkout');

          include('checkout.php');

          break;

        case ('order');

          include('order.php');

          break;

        case ('pembayaran');

          include('order_pembayaran.php');

          break;

        case ('detail');

          include('details.php');

          break;

        case ('saldo');

          include('saldo.php');

          break;

        case ('ulasan');

          include('ulasan.php');

          break;

        case ('delivery_member');

          include('delivery_member.php');

          break;

        case ('delivery_member_detail');

          include('delivery_member_detail.php');

          break;

        case ('profile');

          include('website_member.php');

          break;

        case ('store');

          include('store.php');

          break;

        case ('chat');

          include('chat.php');

          break;
        
        case ('nota');
          
          include('nota2.php');
          
          break;

        case ('history');
          include('history.php');
          break;

        case ('list_all'):
          include('list_produk_semua.php');
          break;
      }

    }

    ?>
  </div>
</div>

    <?php } ?>

<?php if ($_SESSION['akses'] == 'kurir') {

?>

  <?php

  if (isset($_GET['menu'])) {

    $menu = $_GET['menu'];

    switch ($menu) {

      case ('home');

        include('kurir_dashboard.php');

			break;

			case ('laporan');

				include('kurir_laporan.php');

			break;

			case ('akun');

				include('kurir_akun.php');

			break;

			case ('saldo');

				include('kurir_saldo.php');

			break;

      case ('delivery');

        include('kurir_delivery.php');

      break;

      case ('kurir_delivery_detail');

        include('kurir_delivery_detail.php');

      break;
    }
  }

  ?>

<?php } ?>

<?php if ($_SESSION['akses'] == 'marketing') {

?>

  <?php

  if (isset($_GET['menu'])) {

    $menu = $_GET['menu'];

    switch ($menu) {

      case ('home');

        include('marketing_dashboard.php');

      break;

      case ('akun');

        include('kurir_akun.php');

      break;
    }
  }

  ?>

<?php } ?>





    <!--a href="#" id="toTopBtn" class="cd-top text-replace js-cd-top cd-top--is-visible cd-top--fade-out" data-abc="true"></a-->

	<div class="mt-5 mb-5">&nbsp</div>

    <?php include '../inc/footer.php'; ?>



    <!-- BEGIN: Vendor JS-->

    <script src="../app-assets/vendors/js/vendors.min.js"></script>
    <!-- <script src="w/app-assets/vendors/js/vendors.min.js"></script> -->

    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->

    <script src="../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="../app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="../app-assets/vendors/js/extensions/tether.min.js"></script>
    <script src="../app-assets/vendors/js/extensions/shepherd.min.js"></script>

    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->

    <script src="../app-assets/js/core/app-menu.js"></script>
    <script src="../app-assets/js/core/app.js"></script>
    <script src="../app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->

    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <script src="../app-assets/js/scripts/pages/dashboard-analytics.js"></script>
    <script src="../app-assets/js/scripts/modal/components-modal.js"></script>
    <script src="../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="../app-assets/js/scripts/forms/select/form-select2.js"></script>
    <!-- <script src="../app-assets/js/scripts/extensions/sweet-alerts.js"></script> -->
    <script src="../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="../app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <script src="../app-assets/js/scripts/pages/app-ecommerce-details.js"></script>
    <!-- <script src="../app-assets/js/scripts/forms/number-input.js"></script> -->
    <script src="../app-assets/js/scripts/pages/app-ecommerce-shop.js"></script>
    <script src="../app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="../app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="../app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
    <script src="../app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="../app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="../app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="../app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
    <script src="../app-assets/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
    <script src="../app-assets/js/scripts/datatables/datatable.js"></script>
    <script src="../app-assets/vendors/js/extensions/dropzone.min.js"></script>
    <script src="../app-assets/vendors/js/tables/datatable/dataTables.select.min.js"></script>
    <script src="../app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js"></script>
    <script src="../app-assets/js/scripts/ui/data-list-view.js"></script>
    <script src="../app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="../app-assets/js/scripts/pages/app-user.js"></script>
    <script src="../app-assets/js/scripts/navs/navs.js"></script>
    <script src="../app-assets/vendors/js/extensions/moment.min.js"></script>
    <script src="../app-assets/vendors/js/calendar/extensions/interactions.min.js"></script>
    <!-- <script src="../app-assets/js/scripts/extensions/fullcalendar.js"></script> -->
    <script src="../app-assets/vendors/js/calendar/fullcalendar.min.js"></script>
    <script src="../app-assets/vendors/js/pagination/jquery.bootpag.min.js"></script>
    <script src="../app-assets/vendors/js/pagination/jquery.twbsPagination.min.js"></script>
    <script src="../app-assets/js/scripts/pagination/pagination.js"></script>
    <script src="../app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
    <script src="../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="../app-assets/js/scripts/forms/wizard-steps.js"></script>
    <script src="../app-assets/js/scripts/cards/card-statistics.js"></script>
    <script src="../app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <script src="../app-assets/js/scripts/forms/number-input.js"></script>
    <script src="../app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="../app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="../app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="../app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js"></script>
    <script src="../app-assets/js/scripts/pages/account-setting.js"></script>
    <script src="../app-assets/js/scripts/pages/invoice.js"></script>
    <script src="../app-assets/js/scripts/bootstrap-colorpicker.js"></script>
    <script src="../app-assets/vendors/js/extensions/swiper.min.js"></script>
    <script src="../app-assets/js/scripts/extensions/swiper.js"></script>
    <script src="../app-assets/rating/jquery.star-rating-svg.js"></script>
    <!-- <script src="../app-assets/star/star-rating.min.js"></script> -->

    <!-- END: Page JS-->

    <script>

    $(function() {
        $('#headerfooter').colorpicker();
        $('#headerfooter').on('colorpickerChange', function(event) {
            $('#demo').css('background-color', event.color.toString());
        });
    });



    $(function() {
        $('#latar').colorpicker();
        $('#latar').on('colorpickerChange', function(event) {
            $('#demo').css('background-color', event.color.toString());
        });
    });



    $(function() {
        $('#tombol').colorpicker();
        $('#tombol').on('colorpickerChange', function(event) {
            $('#demo').css('background-color', event.color.toString());
        });
    });


    function add_cart(stok, kdbarang) {

        if (stok <= 0) {

            alert('stok habis')

        } else {

            $i = kdbarang

            $.ajax({
                type: "POST",
                url: "../aksi/add_keranjang.php",
                data: {

                    kd_barang: $i,
                    id_user: $("#id_user").val(),
                    kd_toko: $("#kd_toko").val()

                },

                success: function(data) {

                    // alert("Barang sudah ditambahkan ke Keranjang");
                    window.location.href = "../page/index.php?menu=checkout";

                }
            });
        }
    }

    </script>





</body>

<!-- END: Body-->



</html>