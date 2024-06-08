<?php $a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_toko LIMIT 1"));?>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="SIPT">
    <meta name="keywords" content="SIPT">
    <meta name="author" content="SIPT">
    <meta http-equiv="refresh" content="1200">
    <title>.: <?php echo strtoupper($a['nm_toko']) ?> :.</title>
    <link rel="apple-touch-icon" href="../img/logo/<?php echo $a['logo'] ?>">
    <link rel="shortcut icon" type="image/x-icon" href="../img/logo/<?php echo $a['logo'] ?>">
    
	<link href="../app-assets/font/css/fontawesome.min.css" rel="stylesheet" type="text/css">
	<link href="../app-assets/font/css/all.min.css" rel="stylesheet" type="text/css">
	<link href="../app-assets/font/css/brands.min.css" rel="stylesheet" type="text/css">
	<link href="../app-assets/font/css/regular.min.css" rel="stylesheet" type="text/css">
	<link href="../app-assets/font/css/solid.min.css" rel="stylesheet" type="text/css">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/extensions/shepherd-theme-default.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/colors/palette-gradient.css">
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
	
	<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/extensions/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/plugins/extensions/swiper.css">
	<link rel="stylesheet" type="text/css" href="../app-assets/css/pages/app-chat.css">
	
	
    
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <!-- END: Custom CSS-->

    <style>
        .box-affiliate {
            width: 130px;
            /* height: 90px; */
            border-radius: 7px;
            background-color: white;
            margin: 5px;
            padding: 10px;
            justify-content: center;
            align-content: center;
            box-shadow: 3px 3px 10px gray;
        }

        .box-affiliate-member {
            width: 100%;
            /* height: 90px; */
            border-radius: 7px;
            background-color: white;
            text-align: start;
            margin: 5px;
            padding: 10px;
            justify-content: center;
            align-content: center;
            box-shadow: 3px 3px 10px gray;
        }

        .btn2 {
          border: 1px solid black;
          background-color: white;
          color: black;
/*          padding: 14px 28px;*/
/*          font-size: 16px;*/
          cursor: pointer;
        }

        /* Green */
        .btn-inline-success {
          border-color: #04AA6D;
          color: green;
        }

        .btn-inline-success:hover {
          background-color: #04AA6D;
          color: white;
        }

        /* Blue */
        .btn-inline-info {
          border-color: #2196F3;
          color: dodgerblue;
        }

        .btn-inline-info:hover {
          background: #2196F3;
          color: white;
        }

        /* Orange */
        .btn-inline-warning {
          border-color: #ff9800;
          color: orange;
        }

        .btn-inline-warning:hover {
          background: #ff9800;
          color: white;
        }

        /* Red */
        .btn-inline-danger {
          border-color: #f44336;
          color: red;
        }

        .btn-inline-danger:hover {
          background: #f44336;
          color: white;
        }

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 320px;
            max-width: 800px;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

        input[type="number"] {
            min-width: 50px;
        }
    </style>