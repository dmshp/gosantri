<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <?php $a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_toko LIMIT 1"));
        // var_dump($a['logo_login']); die();
    ?>
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item"><a class="navbar-brand mt-1" href="?menu=home">
                	<div class="avatar avatar-xl">
                      <img src="../img/logo/<?php echo $a['logo'] ?>" class="img-fluid shadow-lg">
                    </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">                            
							<li class="nav-item nav">
								<a href="?menu=home" class="btn btn-icon text-white mt-1 mb-1 font-small-3">
								<img src="../img/logo/<?php echo $a['logo_header'] ?>" width="110" class="img-fluid"></a>
							</li>							
														
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons"> 
                            <!--li class="nav-item d-none d-lg-block text-bold-700">
								<a href="?menu=home" class="btn text-white mt-1 mb-1 font-small-3">Kabupaten Pesisir Barat</a>							
							</li-->                            
                        </ul>                        
                    </div>
                    <ul class="nav navbar-nav float-right">					 
						<li class="nav-item">
                            <a class="btn btn-outline-info round mr-1 mb-1 mt-2" style="border: solid 1px; border-color: #1C993E; border-radius: 100px; padding: 5px 40px 5px 5px">
                                <i class="fa-solid fa-user-circle text-danger"></i> 
                                <?php echo $_SESSION['nm_user'];?>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
	
	
    </nav>

<script type="text/javascript">
    
    $(document).ready(function() {



    })

</script>