<head>
	<!-- SweetAlert -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<?php

include "../../inc/koneksi.php";
$a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_toko"));
$background       = $a['background'];
$headerfooter     = $a['headerfooter'];
$tombol           = $a['tombol'];
$logo             = $a['logo'];
$toko             = $a['nm_toko'];

require 'function.php';

if (isset($_POST["submit"])) {
    if (register($_POST) > 0) {
        // echo "<script>alert('Login Berhasil Silahkan Lengkapi Data!');window.location= '../../page/?menu=home';</script>";
        echo '<script>
				setTimeout(function() {
                    Swal.fire({
                        icon: "success",
                        tittle: "Berhasil Login",
                        text: "Data Berhasil Di Lengkapi Silahkan Login Kembali!",
                    }).then(function() {
                        window.location = "../../aut/login.php";
                    });
                }, 1);
			</script>';
    } else {
        echo '<script>
				setTimeout(function() {
					Swal.fire({
						icon: "error",
						tittle: "Data Gagal Di Tambahkan",
						text: "Data Gagal Di Tambahkan Silahkan Coba Kembali",
					});
				}, 1);
			</script>';
    }
}

$nama   = isset($_SESSION['info']['name']) ? $_SESSION['info']['name'] : '';
$email  = isset($_SESSION['info']['email']) ? $_SESSION['info']['email'] : '';
$img    = isset($_SESSION['info']['picture']) ? $_SESSION['info']['picture'] : '';
// var_dump($nama);
// var_dump($email);
// var_dump($img);
// die();
?>


<style type="text/css">
    
    .nama-user{
        font-size: 11px;
        animation: blink-animation 1s steps(3, start) infinite;
        -webkit-animation: blink-animation 1s steps(3, start) infinite;
    }

    .text-user{
        color: #86ff01;
        animation: blink-animation 1s steps(3, start) infinite;
        -webkit-animation: blink-animation 1s steps(3, start) infinite;
        text-shadow: 0 0 5px #86ff01, 0 0 10px #86ff01, 0 0 20px #86ff01, 0 0 45px #86ff01, 0 0 40px #86ff01;
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

    .filter-switch label {
      cursor: pointer;
    }

    .filter-switch-item input:checked + label {
      color: inherit;
    }

    .filter-switch-item input:not(:checked) + label {
      --bg-opacity: 0;
      box-shadow: none;
    }

    .btn-info: hover {
        border-color: #01b1B5 !important;
        background-color: #00CFE8 !important;
        color: #FFFFFF;
    }

    .nav.nav-tabs .nav-item .nav-link {
        color: #ffffff;
        font-size: 0.95rem;
        border: none;
        min-width: auto;
        font-weight: 450;
        padding: 0.61rem 0.635rem;
        border-radius: 2px;
   }

   .has-icon-left .form-control-position i {
        position: relative;
        top: 10px;
        left: 5px;
        color: rgba(34, 41, 47, 0.4);
    }

</style>

<script type="text/javascript">

    function simpan_member_baru(){

        if ($("#alamat").val() == '') {
          Swal.fire("BELUM LENGKAP!", "Kolom Alamat Belum di isi!", "warning");
          $("#alamat").focus();
          return;
        } else if ($("#no_tlv").val() == '') {
          Swal.fire("BELUM LENGKAP!", "Kolom Nomor Telephone Belum di isi!", "warning");
          $("#no_tlv").focus();
          return;
        } else {

            setTimeout(function() {
                Swal.fire({
                    icon: "success",
                    tittle: "Berhasil Login",
                    text: "Data Berhasil Di Lengkapi Silahkan Login Kembali!",
                }).then(function() {
                    window.location = "../../aut/login.php";
                });
            }, 1);
        } 
        
         
      }


</script>

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
    <!-- BEGIN: Vendor CSS-->
    <link rel="shortcut icon" type="image/x-icon" href="../../img/<?php echo $logo; ?>">
    <link rel="stylesheet" type="text/css" href="../../app-assets/vendors/css/vendors.min.css">
    <link href="../../app-assets/font/css/fontawesome.min.css" rel="stylesheet" type="text/css">
    <link href="../../app-assets/font/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/css/pages/authentication.css">
    <link rel="stylesheet" type="text/css" href="../../app-assets/vendors/css/extensions/sweetalert2.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../../assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 1-column  navbar-floating footer-static bg-full-screen-image blank-page" data-open="hover" data-menu="horizontal-menu" data-col="1-column" style="background:<?php echo $a['background']; ?>">
    <!-- BEGIN: Content-->
    <div class="app-content content pb-5">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body m-1">
                <section class="row flexbox-container">
                    <div class="col-xl-6 col-10 justify-content-center d-flex">
                        <div class="card bg-white rounded-0 mb-0 w-100">
                            <div class="row m-0">
                                <div class="col-lg-12 col-12 p-0">
                                    <div class="card rounded-0 mb-0 p-1">
                                        <div class="card-header pt-25 pb-1">
                                            <div class="card-title">
                                                <h2 class="text-uppercase">Lengkapi Data Diri Anda</h2>
                                                <!-- <span class="text-bold-500 font-small-3">Halaman pendaftaran penyedia layanan / penjual</span> -->
                                                <!-- <span class="text-bold-500 font-small-3">Telitilah sebelum melakukan pendaftaran</span> -->
                                                <hr>
                                            </div>
                                        </div>
                                        <!--p class="px-2">Fill the below form to create a new account.</p-->
                                        <div class="tab-content">
                                            <!-- Merchant -->

                                            <div class="card-body pt-0">
                                                <p class="font-small-2 nama-user text-bold-700 text-danger text-right">Telitilah sebelum melakukan pendaftaran</p>
                                                <!-- <p class="font-small-1 text-bold-700 text-danger text-right">Halaman pendaftaran penyedia layanan/ penjual</p> -->
                                                <form action="" method="POST">
                                                    <input type="hidden" name="email" value="<?php echo $email; ?>">
                                                    <!-- <ul class="nav nav-tabs justify-content-center" required>
                                                        <div class="filter-switch-item flex relative h-8 bg-gray-300x">
                                                          <input type="radio" name="role" id="inlineRadio1" class="sr-only" value="member" checked>
                                                          <label for="inlineRadio1" class="h-9 py-1 px-2 text-sm leading-6 text-gray-600 hover:text-gray-800 btn-info rounded shadow" title="pilih sebagai member">Pilih sebagai Member</label>
                                                          
                                                        </div>&nbsp;
                                                        <div class="filter-switch-item flex relative h-8 bg-gray-300x">
                                                          <input type="radio" name="role" id="inlineRadio2" class="sr-only" value="merchant">
                                                          <label for="inlineRadio2" class="h-9 py-1 px-2 text-sm leading-6 text-gray-600 hover:text-gray-800 btn-info rounded shadow" title="pilih sebagai merchant">Pilih sebagai Merchant</label>
                                                        </div>&nbsp;
                                                        <div class="filter-switch-item flex relative h-8 bg-gray-300x">
                                                          <input type="radio" name="role" id="inlineRadio3" class="sr-only" value="kurir">
                                                          <label for="inlineRadio3" class="h-9 py-1 px-2 text-sm leading-6 text-gray-600 hover:text-gray-800 btn-info rounded shadow" title="pilih sebagai kurir">Pilih sebagai Kurir</label>
                                                        </div>
                                                    </ul> -->

                                                    <div class="card-content">
                                                        <ul class="nav nav-tabs justify-content-center" role="tablist">
                                                            <li class="nav-item">
                                                                <a class="nav-link btn bg-danger text-white" id="service-tab-center" data-toggle="tab" href="#service-center" aria-controls="service-center" role="tab" aria-selected="false"><i class="fa-solid fa-address-card"></i> Member</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link btn bg-warning text-white" id="home-tab-center" data-toggle="tab" href="#home-center" aria-controls="home-center" role="tab" aria-selected="true"><i class="fa-solid fa-house-chimney-user"></i> Merchant</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link btn bg-success text-white" href="daftar_kurir.php"><i class="fa-solid fa-truck-fast"></i> Kurir</a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link btn btn-secondary text-white" href="daftar_kurir.php"><i class="fa-solid fa-address-card"></i> Marketing</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <br><br>

                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>" placeholder="Nama" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                       <label for="user-name">Nama</label>
                                                    </fieldset>
                                                  
                                                   
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="Email" required>
                                                            <div class="form-control-position">
                                                               <i class="feather icon-mail"></i>
                                                            </div>
                                                        <label for="user-name">Email</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-home"></i>
                                                        </div>
                                                        <label for="user-name">Alamat</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="number" class="form-control" name="no_tlv" placeholder="No. Telepon" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-phone"></i>
                                                        </div>
                                                        <label for="user-name">No. Telepon</label>
                                                    </fieldset>

                                                    <div class="form-group row">
                                                        <div class="col-12">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox" checked name="validasi">
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class="font-small-2"> Saya setuju dengan seluruh kebijakkan <?php echo $a['nm_toko']; ?>.</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                    <button type="submit" name="submit" class="btn btn-primary float-right btn-inline mb-50" id="type-success">Lanjutkan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <!-- <script src="../app-assets/vendors/js/vendors.min.js"></script> -->
    <script src="../../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../app-assets/js/core/app-menu.js"></script>
    <script src="../../app-assets/js/core/app.js"></script>
    <script src="../../app-assets/js/scripts/components.js"></script>
    <script src="../../app-assets/js/scripts/extensions/sweet-alerts.js"></script>
    <!-- END: Theme JS-->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

    <script>
        $(document).ready(function() {

            $('#btn_tambah_data_diri').click(function() {
                simpan_member_baru();
            })
        });
    </script>    


</body>
<!-- END: Body-->

</html>