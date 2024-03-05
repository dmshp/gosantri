<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/horizontal-menu.css">
<link rel="stylesheet" type="text/css" href="../app-assets/css/core/colors/palette-gradient.css">

<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item"><a class="navbar-brand mt-1" href="?menu=home">
                	<div class="avatar avatar-xl">
                      <img src="images/logo/logo.png" class="img-fluid shadow-lg border-white">
                    </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="navbar-wrapper gradient-light-primary">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <!--li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="fa-solid fa-ellipsis-vertical text-white"></i></a></li-->
							<li class="nav-item nav"><a href="#" target="_blank" class="btn btn-icon text-white mt-1 mb-1 font-small-3"><i class="fa-solid fa-chalkboard-user fa-2x"></i><br>VOIP</a></li>
							
							<li class="nav-item nav"><a href="#" target="_blank" class="btn btn-icon text-white mt-1 mb-1 font-small-3"><i class="fa-solid fa-comment-dots fa-2x"></i><br>Pengaduan</a></li>
							
							
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons"> 
                            <!--li class="nav-item d-none d-lg-block text-bold-700">
								<a href="?menu=home" class="btn text-white mt-1 mb-1 font-small-3">Kabupaten Pesisir Barat</a>							
							</li-->                            
                        </ul>                        
                    </div>
                    <ul class="nav navbar-nav float-right"> 
                       <!--li class="nav-item nav"><a href="#login" class="btn btn-dark mt-1 mb-1 font-small-3"><i class="fab fa-google-play"></i> Download App!</a></li--> 
						<li class="nav-item d-none d-lg-block text-bold-700">
								<a href="?menu=home" class="btn text-white mt-1 mb-1 font-small-3">Kabupaten Pesisir Barat</a>							
							</li> 
						
						<!--li class="nav-item nav">
<a href="https://wa.me/<?php echo $hp ?>" target="_blank" class="btn btn-icon text-white mt-1 mb-1 font-small-3"><i class="fab fa-whatsapp" style="color:<?php echo $tombol;?>"></i></a>
<a href="<?php echo $fb ?>" target="_blank" class="btn btn-icon text-white mt-1 mb-1 font-small-3"><i class="fab fa-facebook" style="color:<?php echo $tombol;?>"></i></a>
<a href="<?php echo $twitter ?>" target="_blank" class="btn btn-icon text-white mt-1 mb-1 font-small-3"><i class="fab fa-twitter" style="color:<?php echo $tombol;?>"></i></a>
<a href="<?php echo $ig ?>" target="_blank" class="btn btn-icon text-white mt-1 mb-1 font-small-3"><i class="fab fa-instagram" style="color:<?php echo $tombol;?>"></i></a>
<a href="<?php echo $yt ?>" target="_blank" class="btn btn-icon text-white mt-1 mb-1 font-small-3"><i class="fab fa-youtube" style="color:<?php echo $tombol;?>"></i></a>
<a href="<?php echo $tiktok ?>" target="_blank" class="btn btn-icon text-white mt-1 mb-1 font-small-3"><i class="fab fa-tiktok" style="color:<?php echo $tombol;?>"></i></a>
					   </li--> 
						
                       <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <!--div class="user-nav">
									<span class="user-name text-dark">Access</span>
									<span class="user-status text-dark">Now!</span>
						       </div-->
                               <span><img class="round d-block d-sm-none" src="images/logo/logo.png" height="40" width="40"></span>
                                <!--span><i class="fas fa-user round text-dark"></i></span-->
						   
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                            	<a class="dropdown-item" href="#" data-toggle="modal" data-target="#log"><i class="fas fa-user-lock"></i> Login!</a>
                                <!--a class="dropdown-item" href="#"><i class="fas fa-user-plus"></i> Register!</a-->
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