<?php include "../inc/koneksi.php";
$a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM `tabel_toko` WHERE `kd_toko` = '123'"));
$background     = $a['background'];
$headerfooter   = $a['headerfooter'];
$tombol         = $a['tombol'];
$logo           = $a['logo'];
$toko           = $a['nm_toko'];

?>

<?php 
//start session
session_start();
require_once '../inc/config.php';

if (isset($_GET['code'])) {
   $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
   $client->setAccessToken($token);

   // getting user profile
   $gauth = new Google_Service_Oauth2($client);
   $google_info = $gauth->userinfo->get();
   
   $_SESSION['info'] = [
      'name' => $google_info->name, 
      'email' => $google_info->email, 
      'picture' => $google_info->picture
   ];
   header('Location: /santrimart/w/aut/google-login/login_google.php');
}
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
    <!-- BEGIN: Vendor CSS-->
    <link rel="shortcut icon" type="image/x-icon" href="../img/<?php echo $logo; ?>">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/vendors.min.css">
    <link href="../app-assets/font/css/fontawesome.min.css" rel="stylesheet" type="text/css">
    <link href="../app-assets/font/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 1-column  navbar-floating footer-static bg-full-screen-image blank-page"
    data-open="hover" data-menu="horizontal-menu" data-col="1-column" style="background:<?php echo $background; ?>">
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
							 <div class="divider mt-1">
								<div class="divider-text mb-1">
									<h5 class="text-uppercase text-info border-info p-1">Login App <?php echo $toko; ?></h5>
								</div>
							  </div>
                            <div class="row m-0">

                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-0"> 
                                        </div>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <form action="aksi_login.php" method="post">
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control" name="nama"
                                                            placeholder="Nama Pengguna" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="user-name">Username</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input type="password" class="form-control" name="pass"
                                                            id="pass" placeholder="Password" required>
                                                        <div class="form-control-position">
                                                            <i class="fa-solid fa-eye-slash" id="togglePasword"
                                                                onclick="fun()"></i>
                                                        </div>
                                                        <label for="user-password">Password</label>
                                                    </fieldset>
                                                    <div class="form-group d-flex justify-content-between align-items-center">
                                                        <div class="text-left">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox">
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class="font-small-2">Ingat saya</span>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="text-right font-small-2"><a href="lupa-password.php"
                                                                class="card-link">Lupa Password?</a></div>
                                                    </div>
                                                    <a href="daftar.php"
                                                        class="btn btn-outline-primary float-left btn-inline mb-2">Daftar</a>
                                                    <button type="submit"
                                                        class="btn btn-primary float-right btn-inline">Masuk</button>
                                                </form>

                                                <!-- Google & Facebook -->
                                                <div class="d-block mb-1">
                                                    <a href="<?= $client->createAuthUrl()?>" class="btn btn-danger" style="width:100%">
                                                        <i class="fa-brands fa-google" style="margin-right:5px"></i>
                                                        Masuk dengan Google
                                                    </a>
                                                </div>
                                                <!-- <div class="d-block">
                                                    <a href="#" class="btn btn-primary" style="width:100%">
                                                    <i class="fa-brands fa-facebook-f" style="margin-right:5px"></i>
                                                        Masuk dengan Facebook
                                                    </a>
                                                </div> -->

                                                <!-- <button id="click">tes</button> -->
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-------------------------------CAROUSEL--------------------------------------------->
                                <div class="col-lg-6 col-12 text-center align-self-center px-0 py-0">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <div id="carousel-example-caption" class="carousel slide"
                                                data-ride="carousel">
                                                <ol class="carousel-indicators">
                                                    <li data-target="#carousel-example-caption" data-slide-to="0"
                                                        class="active"></li>
                                                    <li data-target="#carousel-example-caption" data-slide-to="1"></li>
                                                    <li data-target="#carousel-example-caption" data-slide-to="2"></li>
                                                </ol>
                                                <div class="carousel-inner" role="listbox">
                                                    <?php include "../inc/koneksi.php";
                                                    $data_barang = mysqli_query($koneksi, "SELECT * FROM tabel_barang limit 1");
                                                    while ($d = mysqli_fetch_array($data_barang)) {
                                                        // print_r($d)
                                                    ?>
                                                    <div class="carousel-item active">

                                                        <?php $kode = $d['kd_barang'];
                                                            $a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_barang_gambar WHERE id_brg = '$kode'"));
                                                            $e = explode(",", $a['gambar']);
                                                            // print_r($a)
                                                            ?>
                                                        <img class="card-img mb-0 pb-0" src="../img/produk/<?php echo $e[0]; ?>">
                                                        <p class="card-text"> <?php echo $toko; ?></p>
                                                        <hr class="my-0">
                                                        <div class="justify-content-between mt-0">
                                                            <div class="float-left">
                                                                <p class="font-medium-2 text-bold-600 mb-0">
                                                                    <sup>Rp.</sup><?php echo number_format($d['hrg_jual'], 0, ",", "."); ?>
                                                                </p>
                                                                <p class="font-small-2">Price per Day</p>
                                                            </div>
                                                            <div class="float-right">
                                                                <p class="font-medium-2 text-bold-600 mb-0">
                                                                    <?php echo $d['nm_barang']; ?></p>
                                                                <p class="font-small-2">Product Units</p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <?php } ?>
                                                    <?php $data_barang = mysqli_query($koneksi, "SELECT * FROM tabel_barang ");
                                                    while ($e = mysqli_fetch_array($data_barang)) {
                                                        // print_r($e);
                                                    ?>
                                                    <div class="carousel-item">
                                                        <?php $kode = $e['kd_barang'];
                                                            $b = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_barang_gambar WHERE id_brg = '$kode'"));
                                                            $c = explode(",", $b['gambar']);
                                                            // print_r($b)
                                                            ?>

                                                        <img class="card-img mb-0 pb-0"
                                                            src="../img/produk/<?php echo $c[0]; ?>">
                                                        <p class="card-text"><?php echo $toko; ?> </p>
                                                        <hr class="my-0">
                                                        <div class="justify-content-between mt-0">
                                                            <div class="float-left">
                                                                <p class="font-medium-2 text-bold-600 mb-0">
                                                                    <sup>Rp.</sup><?php echo number_format($e['hrg_jual'], 0, ",", "."); ?>
                                                                </p>
                                                                <p class="font-small-2">Price per Day</p>
                                                            </div>
                                                            <div class="float-right">
                                                                <p class="font-medium-2 text-bold-600 mb-0">
                                                                    <?php echo $e['nm_barang']; ?></p>
                                                                <p class="font-small-2">Product Units</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } ?>

                                                </div>
                                                <a class="carousel-control-prev" href="#carousel-example-caption"
                                                    role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carousel-example-caption"
                                                    role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-------------------------------CAROUSEL--------------------------------------------->
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <script type="text/javascript">
    function fun() {
        var x = document.getElementById("pass");
        if (x.type === "password") {
            x.type = "text";
            document.getElementById("togglePasword").classList.remove('fa-eye-slash');
            document.getElementById("togglePasword").classList.add('fa-eye');
        } else {
            x.type = "password";
        }
    }
    // const togglePassword = document.querySelector("#togglePassword");
    // const password = document.querySelector("#pass");

    // togglePassword.addEventListener("click", function() {
    //     // toggle the type attribute
    //     const type = password.getAttribute("type") === "password" ? "text" : "password";
    //     password.setAttribute("type", type);

    //     // toggle the icon
    //     this.classList.toggle("bi-eye");
    // });
    </script>
    <!-- BEGIN: Vendor JS-->
    <script src="../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../app-assets/js/core/app-menu.js"></script>
    <script src="../app-assets/js/core/app.js"></script>
    <script src="../app-assets/js/scripts/components.js"></script>

    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->
    
    <!-- Google API -->
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <!-- SweetAlert -->
    <!-- <script>
        $('#click').click(function() {
            Swal.fire(
                'Good job!',
                'You clicked the button!',
                'success'
            )
        })
    </script> -->
</body>
<!-- END: Body-->

</html>