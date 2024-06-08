<?php include "../inc/koneksi.php"; $a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_toko WHERE `kd_toko` = '123'"));
$background 	= $a['background'];
$headerfooter 	= $a['headerfooter'];
$tombol		 	= $a['tombol'];
$logo		 	= $a['logo'];
$toko		 	= $a['nm_toko'];
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
    // header('Location: /google-login');
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
    <meta name="description" content="<?php echo $toko;?>">
    <meta name="keywords" content="<?php echo $toko;?>">
    <meta name="author" content="<?php echo $toko;?>">
    <meta http-equiv="refresh" content="1200">
    <title>.: <?php echo $toko;?> :.</title>
    <!-- BEGIN: Vendor CSS-->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="w/logo.png"> -->
    <link rel="shortcut icon" type="image/x-icon" href="../img/<?php echo $logo; ?>">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/vendors.min.css">
    <link href="../app-assets/font/css/fontawesome.min.css" rel="stylesheet" type="text/css">
	<link href="../app-assets/font/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/vendors.min.css">
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
    <link rel="stylesheet" type="text/css" href="../app-assets/css/pages/authentication.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/extensions/sweetalert2.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<style type="text/css">
   
   .nav.nav-tabs .nav-item .nav-link {
      color: #ffffff;
      font-size: 0.95rem;
      border: none;
      min-width: auto;
      font-weight: 450;
      padding: 0.61rem 0.635rem;
      border-radius: 2px;
   }

</style>

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu 1-column  navbar-floating footer-static bg-full-screen-image blank-page" data-open="hover" data-menu="horizontal-menu" data-col="1-column" style="background:<?php echo $a['background'];?>">
    <!-- BEGIN: Content-->
    <div class="app-content content pb-5 mb-5">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row"></div>
          <div class="content-body m-2">
            <section class="row flexbox-container">
       <div class="col-xl-6 col-10 justify-content-center d-flex">
         <div class="card rounded-0 mb-0 w-100">
            <div class="row m-0">
               <div class="col-lg-12 col-12 p-0">
                  <div class="card rounded-0 mb-5 p-0">
					  <div class="divider mt-1">
                          <div class="divider-text mb-1">
                             <h3 class="text-uppercase text-info border-info p-1">Daftar Akun Baru</h3>
                           </div>
						 </div>                     
               <div class="card-content">
                  <ul class="nav nav-tabs justify-content-center" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link btn bg-danger" id="service-tab-center" data-toggle="tab" href="#service-center" aria-controls="service-center" role="tab" aria-selected="false"><i class="fa-solid fa-address-card"></i> Member</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link btn bg-warning text-white" id="home-tab-center" data-toggle="tab" href="#home-center" aria-controls="home-center" role="tab" aria-selected="true"><i class="fa-solid fa-house-chimney-user"></i> Merchant</a>
                     </li>
   				     <li class="nav-item">
                        <a class="nav-link btn bg-success" href="daftar_kurir.php"><i class="fa-solid fa-truck-fast"></i> Kurir</a>
                     </li>
                 </ul>
               </div>
            
			<div class="tab-content">
               <!-- Merchant -->
                <div class="tab-pane" id="home-center" aria-labelledby="home-tab-center" role="tabpanel">
                 <div class="card-body p-2">
                  <p class="font-small-3 text-bold-700 text-danger text-center">Halaman Pendaftaran Merchant</p>
                    
					 
					<form action="aksi_daftar.php" method="POST">
					<div class="row">
                      <input type="hidden" name="akses" value="merchant">
                        
					  <div class="col-12">	
						   <fieldset class="form-label-group form-group position-relative has-icon-left">
                        <input type="text" class="form-control" name="nama" placeholder="Nama Merchant" required>
                           <div class="form-control-position">
                              <i class="feather icon-user"></i>
                            </div>
                           <label for="user-name">Nama</label>
                     </fieldset>
					  </div>	  
                       
					  <div class="col-6 mr-0 pr-0">	
                          <fieldset class="form-label-group form-group position-relative has-icon-left">
                             <input type="email" class="form-control" name="email" placeholder="Email" required>
                                <div class="form-control-position">
                                   <i class="feather icon-mail"></i>
                                 </div>
                               <label for="user-name">Email</label>
                          </fieldset>
					 </div>	 						
					
							
					<div class="col-6">	
                          <fieldset class="form-label-group form-group position-relative has-icon-left">
                             <input type="text" class="form-control" name="no_tlv" placeholder="No. Telepon" required>
                                 <div class="form-control-position">
                                    <i class="feather icon-phone"></i>
                                      </div>
                             <label for="user-name">No. Telepon</label>
                         </fieldset>   
					</div>	
                                                                                                    
                    <div class="col-6 mr-0 pr-0">     
						<fieldset class="form-label-group position-relative has-icon-left">
                             <input type="password" class="form-control" name="pass" placeholder="Password" required>
                                <div class="form-control-position">
                                   <i class="feather icon-lock"></i>
                                 </div>
                             <label for="user-password">Password</label>
                         </fieldset>
					</div>	
                                                    
                    <div class="col-6">     
					  <fieldset class="form-label-group position-relative has-icon-left">
                         <input type="password" class="form-control" name="pass1" placeholder="Ketik Ulang Password" required>
                           <div class="form-control-position">
                               <i class="feather icon-lock"></i>
                           </div>
                          <label for="user-password">Ketik Ulang Password</label>
                       </fieldset>
					</div>	
                                                    
                    
                   <div class="col-12">
                        <fieldset class="checkbox">
                           <div class="vs-checkbox-con vs-checkbox-primary">
                               <input type="checkbox" checked name="validasi">
                                  <span class="vs-checkbox">
                                     <span class="vs-checkbox--check">
                                        <i class="vs-icon feather icon-check"></i>
                                      </span>
                                  </span>
                           <span class="font-small-2"> Saya setuju dengan seluruh kebijakkan <?php echo $a['nm_toko'];?>.</span>
                           </div>
                        </fieldset>
                      </div>
                    <div class="col-12">  
					<a href="login.php" class="btn btn-outline-primary btn-inline mb-50">Masuk</a>
                    <button type="submit" name="daftar-merchant" class="btn btn-primary btn-inline mb-50" id="type-success">Daftar</button>
					</div>		
							
                </form>
                </div>
			</div>

            <!-- Google & Facebook -->
              <div class="divider mt-1">
                 <div class="divider-text mb-1">
                    <h5 class="text-uppercase text-info border-info p-1">Atau</h3>
                 </div>
              <div class="row justify-content-center text-center">
			  <div class="col-12">
                <a href="<?= $client->createAuthUrl()?>" class="btn btn-danger">
                  <i class="fa-brands fa-google"></i>
                    Daftar dengan Google</a>
               </div>
               <!--div class="col-6">
                  <a href="#" class="btn btn-primary" style="width:100%">
                     <i class="fa-brands fa-facebook-f" style="margin-right:5px"></i>
                       Masuk dengan Facebook
                  </a>
                 </div-->
                </div>
               </div>
			</div>		

                                         
		<!-- User -->
          <div class="tab-pane active" id="service-center" aria-labelledby="service-tab-center" role="tabpanel">
                                          
             <div class="card-body p-2">
               <p class="font-small-3 text-bold-700 text-danger text-center">Halaman Pendaftaran Member</p>				
                 <form action="aksi_daftar.php" method="POST">
					  
			     <div class="row">
                   <input type="hidden" name="akses" value="member">
                    <div class="col-12">                                
					 <fieldset class="form-label-group form-group position-relative has-icon-left">
                       <input type="text" class="form-control" name="nama" placeholder="Nama Anda" required>
                         <div class="form-control-position">
                            <i class="feather icon-user"></i>
                           </div>
                          <label for="user-name">Nama Anda</label>
                      </fieldset>
					 </div>	
                                                    
                    <div class="col-6 mr-0 pr-0">                               
					 <fieldset class="form-label-group form-group position-relative has-icon-left">  
						 <input type="email" class="form-control" name="email" placeholder="Email Anda" required>
						 <div class="form-control-position">
							 <i class="feather icon-mail"></i>
						 </div>
						 <label for="user-name">Email Anda</label>                                                   
						</fieldset>    
					 </div>
                     
					
                    <div class="col-6">                                
					 <fieldset class="form-label-group form-group position-relative has-icon-left">
						 <input type="text" class="form-control" name="no_tlv" placeholder="No. Telepon" required> 
						 <div class="form-control-position">
							 <i class="feather icon-phone"></i>                                                        
						 </div>                                                        
						 <label for="user-name">No. Telepon</label>                                                    
						</fieldset>  
					</div> 
                                                                                                
                      <div class="col-6 mr-0 pr-0">
						  <fieldset class="form-label-group position-relative has-icon-left"> 
							<input type="password" class="form-control" name="pass" placeholder="Password" required>
							  <div class="form-control-position">
								  <i class="feather icon-lock"></i>                                                        
							  </div>                                                        
							  <label for="user-password">Password</label> 
						  </fieldset>
                       </div>                             
                        
					<div class="col-6"> 
					 <fieldset class="form-label-group position-relative has-icon-left">  
						<input type="password" class="form-control" name="pass1" placeholder="Ketik Ulang Password" required>                      
						 <div class="form-control-position">                                                            
							 <i class="feather icon-lock"></i>                                                        
						 </div>                        
						 <label for="user-password">Ketik Ulang Password</label> 
						</fieldset>
					 </div>
                                                  
                                                        
				 <div class="col-12">                                                            
					<fieldset class="checkbox">                                                                
						<div class="vs-checkbox-con vs-checkbox-primary"> 
							<input type="checkbox" checked name="validasi">
							<span class="vs-checkbox">                 
								<span class="vs-checkbox--check">
									<i class="vs-icon feather icon-check"></i>
                                </span>
                             </span>
                          <span class="font-small-2"> Saya setuju dengan seluruh kebijakkan <?php echo $a['nm_toko'];?>.</span>
                     </div>
                   </fieldset>
                </div>
					 
				<div class="col-12">               
					<a href="login.php" class="btn btn-outline-primary btn-inline mb-50">Masuk</a> 
					<button type="submit" class="btn btn-primary btn-inline mb-50" id="type-success">Daftar</button>
					</div>
				 </div>                                               
				 </form>
				</div>
                                          
                
			  <!-- Google & Facebook -->
              <div class="divider mt-1">
                 <div class="divider-text mb-1">
                    <h5 class="text-uppercase text-info border-info p-1">Atau</h3>
                 </div>
              <div class="row justify-content-center text-center">
			  <div class="col-12">
                <a href="<?= $client->createAuthUrl()?>" class="btn btn-danger">
                  <i class="fa-brands fa-google"></i>
                    Daftar dengan Google</a>
               </div>
               <!--div class="col-6">
                  <a href="#" class="btn btn-primary" style="width:100%">
                     <i class="fa-brands fa-facebook-f" style="margin-right:5px"></i>
                       Masuk dengan Facebook
                  </a>
                 </div-->
                </div>
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
 </div>
 </div>
 </div>
<!-- END: Content-->


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
    <script src="../app-assets/js/scripts/extensions/sweet-alerts.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->


</body>
<!-- END: Body-->

</html>