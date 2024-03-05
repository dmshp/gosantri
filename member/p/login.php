<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>.:TUNTAS:.</title>
    <link rel="apple-touch-icon" href="images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
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
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="hover" data-menu="horizontal-menu" data-col="1-column" style="background-image: url('images/backgrounds/bg.jpg');background-repeat: no-repeat;background-attachment: fixed;  background-position: center; " >
<!-- BEGIN: Content-->
	<div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
            
       <div class="content-body" style="opacity: 80%">
        <section class="row flexbox-container">
          <div class="col-xl-10 col-10 d-flex justify-content-center">
           <div class="card round mb-0">
             <div class="row m-0 mr-0 ml-0">
               <div class="col-lg-4 text-center align-self-center p-1">
                 <img src="images/logo/logo-circle.png" width="90">
               </div>
               <div class="col-lg-8 col-12">
                 <div class="card rounded-0 mb-0 px-0">
                  <div class="card-header pb-1">
                   <div class="card-title">
                    <h4 class="mb-0">Selamat Datang
						<p class="font-small-2">Login Nama Aplikasi &#8482; </p></h4>
                    </div>
                  </div>
                                        
                 <div class="card-content">
                    <div class="card-body pt-1">
                      <form action="index.php?menu=home" method="post">
                       <fieldset class="form-label-group form-group position-relative has-icon-left">
                          <input type="text" class="form-control" name="nm_user" placeholder="username" required>
                       <div class="form-control-position">
                         <i class="feather icon-user"></i>
                        </div>
                        <label for="user-name">Username</label>
                       </fieldset>

                       <fieldset class="form-label-group position-relative has-icon-left">
                         <input type="password" class="form-control" name="password" placeholder="Password" required>
                         <div class="form-control-position">
                           <i class="feather icon-lock"></i>
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
                              <span class="">Ingat saya</span>
                             </div>
                          </fieldset>
                        </div>
                        <div class="text-right">
							<a href="#" class="card-link">Lupa kata sandi?</a>
						</div>
                      </div>
                   <div class="text-center">                                 
					<div class="btn-group">		
						<a href="register.php" class="btn btn-outline-primary round float-left btn-inline">Register</a>
                        <button type="" name="button_login" class="btn round gradient-light-primary float-right btn-inline">Login</button>
					</div>
				  </div>	   
                </form>
            
			</div>
         </div>
        <div class="login-footer text-center">
											
        <div class="divider">
           <div class="divider-text">OR</div>
        </div>
                                            
	    <div class="footer-btn d-inline">
           <!--<a href="#" class="btn btn-facebook round"><span class="fa fa-facebook"></span></a>
           <a href="#" class="btn btn-google round"><span class="fa fa-google"></span></a>-->
		   <a href="#"><img src="images/ico/sign-google.png" width="175"></a>	
        </div>
											
       <div class="divider">
            <div class="divider-text">© <?php echo date('Y'); ?></div>
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
<script src="app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="app-assets/vendors/js/ui/jquery.sticky.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="app-assets/js/core/app-menu.js"></script>
<script src="app-assets/js/core/app.js"></script>
<script src="app-assets/js/scripts/components.js"></script>
<!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>