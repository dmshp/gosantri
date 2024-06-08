<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="../app-assets/css/core-new/menu/menu-types/horizontal-menu.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/core-new/colors/palette-gradient.css">

<?php
    $warna1 = $headerfooter;
?>

<style type="text/css">
    
    .gradient-light-primary {
        background-color: <?php echo $warna1; ?> !important;
        background: -webkit-linear-gradient(60deg, #b721ff 0%, #21d4fd 100%);
        background: linear-gradient(30deg, #b721ff 0%, #21d4fd 100%); 
        color: #FFFFFF;
    }

    .header-navbar .navbar-container ul.nav li a.dropdown-user-link .user-status {
        font-size: smaller;
        color: #616161;
    }

    .horizontal-menu.navbar-floating:not(.blank-page) .app-content {
        padding-top: 0rem;
    }

</style>

<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center" style="background: <?php echo $headerfooter; ?>">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item"><a class="navbar-brand mt-1" href="index.php?menu=home">
                	<div class="avatar avatar-xl">
                      <!-- <img src="../img/logo/logo.png" class="img-fluid shadow-lg border-white"> -->
                      <img src="../img/toko/<?php echo $logo;?>" onerror="this.src='../img/user/user.jpg';" height="40" width="40" class="img-fluid shadow-lg border-white">
                    </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="navbar-wrapper gradient-light-primary2">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <?php if ($_SESSION['akses'] == 'admin') {  ?>
                        <ul class="nav navbar-nav">
							<li class="nav-item nav">
                                <a href="index.php?menu=order" title="Lihat Pesanan" target="_blank" class="btn btn-icon mt-1 mb-1 font-small-3">
                                    <i class="fas fa-receipt"></i>
                                </a>
                            </li>
                            <li class="nav-item nav">
                                <a class="nav-link nav-link-label font-medium-5 mr-1" href="chat.php" title="Lihat Chat" style="">
                                    <i class="fas fa-comment-dots"></i>
                                    <span class="badge badge-pill badge-info font-small-1 hidden" id="boxcomment-admin">
                                        <span id="comment-admin"></span>
                                    </span>
                                </a>
                            </li>
							
                        </ul>
                        <?php } else if ($_SESSION['akses'] == 'merchant' || $_SESSION['akses'] == 'marketing' || $_SESSION['akses'] == 'kurir') { ?>
                        <ul class="nav navbar-nav">
                            <li class="nav-item nav">
                                <a class="nav-link nav-link-label font-medium-5 mr-1" href="chat.php" title="Lihat Chat" style="">
                                    <i class="fas fa-comment-dots"></i>
                                    <span class="badge badge-pill badge-info font-small-1 hidden" id="boxcomment-admin">
                                        <span id="comment-admin"></span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <?php } else if ($_SESSION['akses'] == 'member') { ?>
                        <ul class="nav navbar-nav">
                            <li class="nav-item nav">
                                <a class="nav-link nav-link-label font-medium-5 mr-1" href="chat.php" title="Lihat Chat" style="">
                                    <i class="fas fa-comment-dots"></i>
                                    <span class="badge badge-pill badge-info font-small-1 hidden" id="boxcomment-admin">
                                        <span id="comment-admin"></span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item nav">
                                <a class="nav-link nav-link-label font-medium-5 mr-1" href="index.php?menu=checkout" title="Checkout" style="">
                                    <i class="fas fa-shopping-cart"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <?php } ?>
                        <ul class="nav navbar-nav bookmark-icons">                          
                        </ul>                        
                    </div>
                    <ul class="nav navbar-nav float-right">
                        
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                            <div class="user-nav d-sm-flex d-none">
                                <!-- <span class="user-name text-bold-600" style=""><?php echo $_SESSION['nm_user'];?></span><br> -->
                                <span class="user-status" style=""><?php echo $_SESSION['email_user'];?></span>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="index.php?menu=profile"><i class="fas fa-user-edit"></i> Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <span class="dropdown-item" onclick="location.href = '../aut/logout.php'"><i class="fas fa-power-off"></i> Logout</span>
                        </div>
						
                       <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                           <span><img class="round d-block d-sm-none" src="../img/toko/<?php echo $logo;?>" onerror="this.src='../img/user/user.jpg';" height="40" width="40"></span>
                           
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="../aut/logout.php"><i class="fas fa-power-off"></i> Logout</a>
                            </div>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </div>
	
	
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    
<!-- END: Main Menu-->
    
<!---------------------------------------- Modal ------------------------------------>
<div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
          <div class="modal-content">
             <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1">Basic Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
              </div>
            <div class="modal-body">
                <h5>Check First Paragraph</h5>
                <p>ISI</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
            </div>
          </div>
     </div>
</div> 
<!---------------------------------------- Modal ------------------------------------>