<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0 text-dark text-capitalize">
							 <?php echo $_SESSION['akses'];?></h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?menu=home" class="text-dark">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#" class="text-dark">Details</a>
                                    </li>                                   
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrum-right">
                       
                    </div>
                </div>
            </div>
 
<?php error_reporting(0);           
    $ketQuery = "SELECT * FROM tabel_barang,tabel_barang_gambar,tabel_stok_toko WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang limit 1";
    $executeSat = mysqli_query($koneksi, $ketQuery);
    while ($d=mysqli_fetch_array($executeSat)) {
?>          
            <div class="content-body">
                <!-- app ecommerce details start -->
                <section class="app-ecommerce-details">
                    <div class="card bg-transparent">
                        <div class="card-body">
                            <div class="row mb-5 mt-2">
                                <div class="col-12 col-md-5 d-flex align-items-center justify-content-center mb-2 mb-md-0">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img src="../img/produk/<?php echo $d['gambar']; ?>" class="img-fluid">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <h5><?php echo $d['nm_barang']; ?></h5>
                                    <p class="text-dark">by <?php echo $toko;?></p>
                                    <div class="ecommerce-details-price d-flex flex-wrap">

                                        <p class="text-primary display-4 mr-1 mb-0"><sup>Rp.</sup><?php echo number_format($d['hrg_jual'],0,",","."); ?></p>
                                        <span class="pl-1 font-medium-3 border-left">
                                            <i class="fas fa-star text-dark"></i>
                                            <i class="fas fa-star text-dark"></i>
                                            <i class="fas fa-star text-dark"></i>
                                            <i class="fas fa-star text-dark"></i> 
                                            <i class="fas fa-star text-dark"></i>
                                        </span>
                                        <span class="ml-50 text-dark font-medium-1">424 ratings</span>
                                    </div>
                                    <hr>
                                    <p><?php echo $d['deskripsi']; ?></p>
                                    <p class="font-weight-bold mb-25"> <i class="fas fa-truck-moving mr-50 font-medium-2"></i>
                                    Pengiriman
                                    </p>                             
                                    <hr>
                                    <p>Available - <span class="text-success">In stock</span></p>

                                    <div class="btn-group">
                                        <a href="index.php?menu=checkout" class="btn btn-success rounded-0">
                                         <i class="fas fa-luggage-cart"></i> Checkout</a>
                                        <button class="btn btn-danger rounded-0"><i class="far fa-heart"></i> Suka</button>
                                        <a href="chat.php" class="btn btn-info rounded-0"><i class="far fa-comment-dots"></i> Chat</a>
                                    </div>
                                    <div class="divider">
                                      <div class="divider-text bg-transparent">
                                          <h3 class="font-medium-1 text-uppercase">Share</h3></div>
                                     </div>
                                    <button type="button" class="btn btn-icon rounded-circle btn-dark mr-1 mb-1"><i class="feather icon-facebook"></i></button>
                                    <button type="button" class="btn btn-icon rounded-circle btn-dark mr-1 mb-1"><i class="feather icon-twitter"></i></button>
                                    <button type="button" class="btn btn-icon rounded-circle btn-dark mr-1 mb-1"><i class="feather icon-youtube"></i></button>
                                    <button type="button" class="btn btn-icon rounded-circle btn-dark mr-1 mb-1"><i class="feather icon-instagram"></i></button>
                                  <div class="divider">
                                     <div class="divider-text bg-transparent">
                                        <h3 class="font-medium-1 text-uppercase">Ulasan</h3></div>
                                  </div>
                                  <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <div class="avatar mr-1">
                                                <img src="../img/<?php echo $logo;?>" height="45" width="45">
                                            </div>
                                            <div class="user-page-info">
                                                <h6 class="mb-0"><?php echo $toko;?></h6>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <div class="d-flex align-items-center">
                                                <i class="feather icon-heart font-medium-2 mr-50"></i>
                                                <span>276</span>
                                            </div>
                                            
                                            <p class="ml-auto d-flex align-items-center">
                                                <i class="feather icon-message-square font-medium-2 mr-50"></i>105
                                            </p>
                                        </div>
                                        
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <div class="avatar mr-50">
                                                <img src="../img/user/<?php echo $foto;?>" height="30" width="30">
                                            </div>
                                            <div class="user-page-info">
                                                <h6 class="mb-0">Darcey Nooner</h6>
                                                <span class="font-small-2">I love cupcake danish jujubes sweet.</span>
                                            </div>
                                            <div class="ml-auto cursor-pointer">
                                                <i class="feather icon-heart mr-50"></i>
                                                <i class="feather icon-message-square"></i>
                                            </div>
                                        </div>
                                        
                                        
                                        <fieldset class="form-label-group mb-50">
                                            <textarea class="form-control" id="label-textarea2" rows="3" placeholder="Add Comment"></textarea>
                                            <label for="label-textarea2">Add Comment</label>
                                        </fieldset>
                                        <button type="button" class="btn btn-sm btn-primary">Post Comment</button>
                                    </div>
                                </div>
                                  
                                </div>
                            </div>
                        </div>
                       
                        <?php } ?>
                        
                        <div class="card-body">
                            <div class="divider">
                                <div class="divider-text bg-transparent">
                                  <h3 class="font-large-1 text-uppercase">Produk Lainnya</h3></div>
                             </div>
                             <div class="swiper-responsive-breakpoints swiper-container">
                                 <div id="produk_lain" class="carousel slide" data-ride="carousel">
                                     <div class="carousel-inner" role="listbox">
                                                                        
                     <div class="carousel-item active">
                        <div class="row">
<?php error_reporting(0);           
    $ketQuery = "SELECT * FROM tabel_barang,tabel_barang_gambar,tabel_stok_toko WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang limit 4";
    $executeSat = mysqli_query($koneksi, $ketQuery);
    while ($e=mysqli_fetch_array($executeSat)) {
?> 
                         <div class="col-xl-3 col-md-6 col-sm-12 col-6">
                            <div class="card">
                                <div class="card-content">
                                    <img class="card-img-top img-fluid" src="../img/produk/<?php echo $e['gambar']; ?>">
                                    <div class="card-body">
                                        <div class="divider">
                                            <div class="divider-text"><h3 class="font-medium-1 bg-info p-1">
                                             <sup>Rp.</sup><?php echo number_format($e['hrg_jual'],0,",","."); ?></h3></div>
                                           </div>
                                        <div class="card-btns justify-content-between mt-2 float-right">
                                            <a href="index.php?menu=detail" class="btn btn-info btn-icon rounded-0"><i class="far fa-eye"></i></a>
                                            <a href="#" class="btn btn-warning btn-icon rounded-0"><i class="fas fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         
                        
<?php } ?>
                   </div>
                 </div>
                                                                        
                 <div class="carousel-item">                                         
                   <div class="row">
<?php error_reporting(0);           
    $ketQuery = "SELECT * FROM tabel_barang,tabel_barang_gambar,tabel_stok_toko WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang limit 4";
    $executeSat = mysqli_query($koneksi, $ketQuery);
    while ($f=mysqli_fetch_array($executeSat)) {
?> 
                       <div class="col-xl-3 col-md-6 col-sm-12 col-6">
                            <div class="card">
                                <div class="card-content">
                                    <img class="card-img-top img-fluid" src="../img/produk/<?php echo $f['gambar']; ?>">
                                    <div class="card-body">
                                        <div class="divider">
                                            <div class="divider-text"><h3 class="font-medium-1 bg-info p-1">
                                             <sup>Rp.</sup><?php echo number_format($f['hrg_jual'],0,",","."); ?></h3></div>
                                           </div>
                                        <div class="card-btns justify-content-between mt-2 float-right">
                                            <a href="index.php?menu=detail" class="btn btn-info btn-icon rounded-0"><i class="far fa-eye"></i></a>
                                            <a href="#" class="btn btn-warning btn-icon rounded-0"><i class="fas fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<?php } ?>
                         </div>                                    
                     </div>
                   </div>
                   <a class="carousel-control-prev" href="#produk_lain" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                   </a>
                   <a class="carousel-control-next" href="#produk_lain" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                   </a>
                  </div>
               </div> 
              </div>
            </section>
         <!-- app ecommerce details end -->

            </div>
        </div>
    </div>
    <!-- END: Content-->