<?php
include "./inc/koneksi.php";
session_start();
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
    header('location: ../p/login.php');
} else {
}
// $kode_toko = $_SESSION['kd_toko'];
// var_dump($_SESSION);
// die;
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="SIPT">
    <meta name="keywords" content="SIPT">
    <meta name="author" content="SIPT">
    <!--meta http-equiv="refresh" content="1200"-->
    <title>.:SANTRIGO:.</title>
    <link rel="apple-touch-icon" href="images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="images/ico/favicon.png">

    <link href="app-assets/font/css/fontawesome.min.css" rel="stylesheet" type="text/css">
    <link href="app-assets/font/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="app-assets/font/css/brands.min.css" rel="stylesheet" type="text/css">
    <link href="app-assets/font/css/regular.min.css" rel="stylesheet" type="text/css">
    <link href="app-assets/font/css/solid.min.css" rel="stylesheet" type="text/css">

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

    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/swiper.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/app-chat.css">



    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->


</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<!--<body class="horizontal-layout horizontal-menu 2-columns navbar-floating footer-static ecommerce-application" data-open="hover" data-menu="horizontal-menu" data-col="2-columns" style="background: #fff">-->

<body class="horizontal-layout horizontal-menu content-left-sidebar chat-application navbar-floating footer-static"
    data-open="hover" data-menu="horizontal-menu" data-col="content-left-sidebar">


    <input type='hidden' id='latitude_toko' value='<?= $a['latitude'] ?>'>
    <input type='hidden' id='longitude_toko' value='<?= $a['longitude'] ?>'>
    <input type="hidden" name="id_user" id="id_user" value="<?= $_SESSION['id_user'] ?>">


    <?php include 'inc/navigation.php'; ?>
    <!-- BEGIN: Content-->

    <div class="app-content content pb-5 mb-5 mt-0 pt-3">
        <div class="content-wrapper">

            <?php
            if (isset($_GET['menu'])) {
                $menu = $_GET['menu'];
                switch ($menu) {
                    case('home');
                        include('master/home.php');
                        break;
                    case('account');
                        include('master/account.php');
                        break;
                    case('mchat');
                        include('master/multichat.php');
                        break;
                    case('schat');
                        include('master/singlechat.php');
                        break;
                    case('edit');
                        include('master/editproduct.php');
                        break;
                    case('pay');
                        include('master/payment.php');
                        break;
                    case('history');
                        include('master/history.php');
                        break;
                }
            }
            ?>
        </div>

    </div>
    <!-- END: Content-->


    <!--a href="#" id="toTopBtn" class="cd-top text-replace js-cd-top cd-top--is-visible cd-top--fade-out" data-abc="true"></a-->

    <?php include 'inc/footer.php'; ?>

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
    <script src="app-assets/js/scripts/forms/number-input.js"></script>
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
    <script src="app-assets/js/scripts/extensions/fullcalendar.js"></script>
    <script src="app-assets/vendors/js/pagination/jquery.bootpag.min.js"></script>
    <script src="app-assets/vendors/js/pagination/jquery.twbsPagination.min.js"></script>
    <script src="app-assets/js/scripts/pagination/pagination.js"></script>

    <script src="app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
    <script src="app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
    <script src="app-assets/vendors/js/extensions/toastr.min.js"></script>


    <script src="app-assets/js/scripts/forms/wizard-steps.js"></script>
    <script src="app-assets/vendors/js/extensions/swiper.min.js"></script>
    <script src="app-assets/js/scripts/extensions/swiper.js"></script>
    <script src="app-assets/js/scripts/pages/app-chat.js"></script>
    <!-- END: Page JS-->

    <script type="text/javascript">
        $(document).ready(function () {
            $('#edit_produk').on('show.bs.modal', function (e) {
                var idx = $(e.relatedTarget).data('id');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type: 'post',
                    url: 'master/product.php',
                    data: 'idx=' + idx,
                    success: function (data) {
                        $('.hasil-data').html(data); //menampilkan data ke dalam modal
                    }
                });
            });
        });
    </script>


</body>
<!-- END: Body-->

</html>