<?php $a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_toko LIMIT 1"));?>

     <style>
        .footer {
          position: fixed;
          left: 0;
          bottom: 0;
          width: 100%;
          /*background-color: <?php echo $headerfooter; ?>;*/
          text-align: center;
          z-index: 100;	
        }

        .float{
            position:fixed;
            width:60px;
            height:60px;
            bottom:40px;
            right:40px;
            background-color:#EA5455;
            color:#FFF;
            font-size: 22px;
            border-radius:50px;
            text-align:center;
            box-shadow: 2px 2px 3px #999;
        }

        a:hover {
            color: #f8f8f8;
            text-decoration: none;
        }

        .my-float{
            margin-top:22px;
        }
    </style>

     <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>

    <footer class="footer d-block d-sm-none d-md-block d-lg-none bg-white p-0 m-0" style="position: fixed">   
         <div class="btn-group">
    		<a class="btn btn-icon font-small-2 mr-1" href="?menu=mchat">
    			<img src="../img/ico/chat.png" width="30" class="pb-1"><br>Chat</a>
    		<a class="btn btn-icon font-small-2 mr-1" href="?menu=history">
    			<img src="../img/ico/history.png" width="30" class="pb-1"><br>Riwayat</a>
    		<a class="btn btn-icon font-small-2 ml-0 mr-0" href="?menu=home">
    			<img src="../img/ico/home.png" width="30" class="pb-1"><br>Beranda</a> 
    		<a class="btn btn-icon font-small-2 ml-1" href="?menu=promo">
    			<img src="../img/ico/tag.png" width="30" class="pb-1"><br>Promo</a>
    		<a class="btn btn-icon font-small-2 ml-1" href="?menu=account">
    			<img src="../img/ico/akun.png" width="30" class="pb-1"><br>Akun</a> 
    	 </div> 	
    </footer>
     <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light bg-white d-none d-xl-block">
        <div href="" onclick="keluar_aplikasi()" class="float" title="Keluar Aplikasi">
            <i class="fa fa-sign-out my-float"></i>
        </div>
        <p class="clearfix blue-grey lighten-2 mb-0">
        <span class="float-md-left mt-25">Hak Cipta di lindungi Undang-Undang &copy; <?php echo date('M,d.Y')?>
        <a class="text-bold-800 grey darken-2" href="#" target="_blank"></a> </span><span class="float-md-right d-none d-md-block"> <img src="../img/logo/<?php echo $a['logo'] ?>" class="rounded-circle img-border box-shadow-1" width="35"></span>
            <!--button class="btn btn-icon text-white scroll-top" type="button"></button-->
        </p>
    </footer>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <script src="../app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="../app-assets/vendors/js/charts/apexcharts.min.js"></script>
    <script src="../app-assets/vendors/js/extensions/tether.min.js"></script>
    <!-- <script src="../app-assets/vendors/js/extensions/shepherd.min.js"></script> -->
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <script src="../app-assets/js/core/app-menu.js"></script>
    <script src="../app-assets/js/core/app.js"></script>
    <script src="../app-assets/js/scripts/components.js"></script>
    <!-- END: Theme JS-->
    <!-- BEGIN: Page JS-->
    <!-- <script src="../app-assets/js/scripts/pages/dashboard-analytics.js"></script> -->
    <script src="../app-assets/js/scripts/modal/components-modal.js"></script>
    
    <script src="../app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="../app-assets/js/scripts/forms/select/form-select2.js"></script>
    
    <script src="../app-assets/js/sweetalert2@11.js"></script>
    <script src="../app-assets/js/scripts/extensions/sweet-alerts.js"></script>
    <!-- <script src="../app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script> -->
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
    <script src="../app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="../app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>    
    <script src="../app-assets/js/scripts/pages/app-user.js"></script>
    <script src="../app-assets/js/scripts/navs/navs.js"></script>    
    <script src="../app-assets/vendors/js/extensions/moment.min.js"></script>
    <!-- <script src="../app-assets/vendors/js/calendar/fullcalendar.min.js"></script> -->
    <!-- <script src="../app-assets/vendors/js/calendar/extensions/daygrid.min.js"></script> -->
    <!-- <script src="../app-assets/vendors/js/calendar/extensions/timegrid.min.js"></script> -->
    <!-- <script src="../app-assets/vendors/js/calendar/extensions/interactions.min.js"></script> -->
    <!-- <script src="../app-assets/js/scripts/extensions/fullcalendar.js"></script>     -->
    <script src="../app-assets/vendors/js/pagination/jquery.bootpag.min.js"></script>
    <script src="../app-assets/vendors/js/pagination/jquery.twbsPagination.min.js"></script>
    <script src="../app-assets/js/scripts/pagination/pagination.js"></script>
    
    <script src="../app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
    <script src="../app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="../app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>   
    <script src="../app-assets/vendors/js/extensions/toastr.min.js"></script>  
        
        
    <script src="../app-assets/js/scripts/forms/wizard-steps.js"></script> 
    <script src="../app-assets/vendors/js/extensions/swiper.min.js"></script>
    <script src="../app-assets/js/scripts/extensions/swiper.js"></script>      
    <script src="../app-assets/js/scripts/pages/app-chat.js"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/themes/high-contrast-light.js"></script>

    <!-- END: Page JS-->
    
    <!----SLIDE MASUK---->
    <script>    
    function openNav1() {
        document.getElementById("myNav1").style.height = "100%";}
    function closeNav1() {document.getElementById("myNav1").style.height = "0%";}
        
    function openNav2() {document.getElementById("myNav2").style.height = "100%";}
    function closeNav2() {document.getElementById("myNav2").style.height = "0%";}
        
    function openNav3() {document.getElementById("myNav3").style.height = "100%";}
    function closeNav3() {document.getElementById("myNav3").style.height = "0%";}
        
    function openNav4() {document.getElementById("myNav4").style.height = "100%";}
    function closeNav4() {document.getElementById("myNav4").style.height = "0%";}
        
    function openNav5() {document.getElementById("myNav5").style.height = "100%";}
    function closeNav5() {document.getElementById("myNav5").style.height = "0%";}
        
    function openNav6() {document.getElementById("myNav6").style.height = "100%";}
    function closeNav6() {document.getElementById("myNav6").style.height = "0%";}
        
    function openNav7() {document.getElementById("myNav7").style.height = "100%";}
    function closeNav7() {document.getElementById("myNav7").style.height = "0%";}
        
    function openNav8() {document.getElementById("myNav8").style.height = "100%";}
    function closeNav8() {document.getElementById("myNav8").style.height = "0%";}
    </script>

    <script type="text/javascript">
        
        function keluar_aplikasi() {

            Swal.fire({
              title: 'INFORMASI',
              text: "Yakin akan keluar aplikasi?",
              icon: 'question',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, keluar sekarang!'
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                type: "GET",
                url: "../aut/logout.php",
                async: false,
                success: function(text) {
                    window.location = "../aut/login.php";                  
                }
              })
              }
            })

        }

    </script>