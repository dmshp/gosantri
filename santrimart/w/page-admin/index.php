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

 
    <?php include '../inc/header.php';?>

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

        </div>
    </div>
    <?php include '../inc/footer.php';?>



</body>

<!-- END: Body-->



</html>