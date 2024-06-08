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
$tombol			= $a['tombol'];
$logo       	= $a['logo'];
$toko			= $a['nm_toko'];
$kd_toko		= $a['kd_toko'];
$almt_toko		= $a['almt_toko'];
$tlp_toko		= $a['tlp_toko'];
$latlng_toko	= $a['latitude'] . "," . $a['longitude'];
?>

<?php $user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_member WHERE nm_user = '$_SESSION[nm_user]'"));
$foto       = $user['foto'];
?>

<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">

<!-- BEGIN: Head-->


<head>

 
    <?php 

        include '../inc/header.php';

    ?>

</head>

<!-- END: Head-->



<!-- BEGIN: Body-->

<?php
$admin = "";
if ($_SESSION['akses'] == 'adminx') { $admin = "admin"; } ?>

<body class="horizontal-layout horizontal-menu content-left-sidebar chat-application navbar-floating footer-static" data-open="hover" data-menu="horizontal-menu" data-col="content-left-sidebar">

		<input type='hidden' id='latitude_toko' value='<?= $a['latitude'] ?>'>
		<input type='hidden' id='longitude_toko' value='<?= $a['longitude'] ?>'>
    <input type="hidden" name="id_user" id="id_user" value="<?= $_SESSION['id_user'] ?>">


    <?php include '../inc/navigation.php';?>
    <div class="app-content content pb-5 mb-5 mt-0 pt-3">
        <div class="content-wrapper">

            <?php 

            if ($_SESSION['akses'] == 'member') {

                if (isset($_GET['menu'])) {
                    $menu = $_GET['menu'];


                    switch ($menu) {

                        case ('home');
                            include('home.php');
                        break;

                        case ('account');
                            include('account.php');
                         break;

                        case ('mchat');
                            include('multichat.php');
                         break;

                        case ('schat');
                            include('singlechat.php');
                         break;  

                        case ('now');
                            include('news.php');
                         break;

                        case ('detail');
                            include('detail.php');
                         break; 

                        case ('shop');
                            include('shopping.php');
                        break;

                        case ('product');
                            include('product.php');
                        break; 

                        case ('cart');
                            include('cart.php');
                        break;   

                        case ('pay');
                            include('payment.php');
                        break;

                        case ('history');
                            include('history.php');
                        break; 

                        case ('promo');
                            include('promo.php');
                        break; 

                        case ('merchant');
                            include('merchant.php');
                        break;

                        case ('map');
                            include('map.php');
                        break; 

                        case ('delivery');
                            include('new_delivery.php');
                        break;

                        case ('delivery_detail');
                            include('new_delivery_detail.php');
                        break;

                        case ('dashboard');
                            include('affiliate_dashboard.php');
                        break;

                        case ('produk_link');
                            include('affiliate_produk_link.php');
                        break;

                        case ('komisi');
                            include('affiliate_komisi.php');
                        break;

                    }
                }
            } else if ($_SESSION['akses'] == 'merchant') {

                if (isset($_GET['menu'])) {
                    $menu = $_GET['menu'];


                    switch ($menu) {

                        case ('home');
                            include('home.php');
                        break;

                        case ('account');
                            include('account.php');
                         break;

                        case ('mchat');
                            include('multichat.php');
                         break;

                        case ('schat');
                            include('singlechat.php');
                         break;  

                        case ('now');
                            include('news.php');
                         break;

                        case ('detail');
                            include('detail.php');
                         break; 

                        case ('shop');
                            include('shopping.php');
                        break;

                        case ('product');
                            include('product.php');
                        break; 

                        case ('cart');
                            include('cart.php');
                        break;   

                        case ('pay');
                            include('payment.php');
                        break;

                        case ('history');
                            include('history.php');
                        break; 

                        case ('promo');
                            include('promo.php');
                        break; 

                        case ('merchant');
                            include('merchant.php');
                        break;

                        case ('map');
                            include('map.php');
                        break; 

                        case ('dashboard');
                            include('affiliate_dashboard.php');
                        break;

                        case ('user_member');
                            include('affiliate_member.php');
                        break;

                        case ('daftar_produk');
                            include('affiliate_produk.php');
                        break;

                        case ('daftar_leads');
                            include('affiliate_merchant.php');
                        break;

                    }
                }


            } else if ($_SESSION['akses'] == 'admin') {

                if (isset($_GET['menu'])) {

                    $menu = $_GET['menu'];

                    switch ($menu) {
                        case ('home');
                          include('admin/home.php');
                        break;

                        case ('account');
                            include('account.php');
                         break;

                        case ('ipos');
                          include('admin/ipos.php');
                        break;

                        case ('wholesale');
                          include('admin/wholesale.php');
                        break;

                        case ('product');
                          include('admin/product.php');
                        break;

                        case ('member');
                          include('admin/member.php');
                        break;

                        case ('merchant');
                          include('admin/merchant.php');
                        break;

                        case ('kelola');
                          include('admin/kelola_product.php');
                        break;

                        case ('order');
                          include('admin/order-online.php');
                        break;

                        case ('ads');
                          include('admin/ads.php');
                        break;

                        case ('info');
                          include('admin/info.php');
                        break;

                        case ('pembayaran');
                          include('admin/pembayaran.php');
                        break;

                        case ('kurir');
                          include('admin/kurir.php');
                        break;

                        case ('user');
                          include('admin/user.php');
                        break;

                        case ('master_user');
                          include('admin/master_user.php');
                        break;

                        case ('profile');
                          include('admin/profile_toko.php');
                        break;

                        case ('keuangan');
                          include('admin/keuangan.php');
                        break;

                        case ('streaming');
                          include('admin/streaming.php');
                        break;

                        case ('saldo');
                          include('admin/saldo.php');
                        break;

                        case ('transfer');
                          include('admin/transfer.php');
                        break;

                        case ('retur');
                          include('admin/retur.php');
                        break;

                        case ('nota');
                          include('admin/nota.php');
                        break;

                        case ('nota2');
                          include('admin/nota2.php');
                        break;

                        case ('edit_retur');
                          include('admin/show_retur.php');
                        break;

                        case ('sales');
                          include('admin/report_sales.php');
                        break;

                        case ('balance');
                          include('admin/report_balance.php');
                        break;

                        case ('stock');
                          include('admin/report_stock.php');
                        break;

                        case ('edit_product');
                          include('admin/edit_product.php');
                        break;

                        case ('report_member');
                          include('admin/list_report_member.php');
                        break;


                    }

                }


            }


            ?>

        </div>
    </div>
    <?php include '../inc/footer.php';?>



</body>

<!-- END: Body-->



</html>