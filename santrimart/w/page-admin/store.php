<!-- BEGIN: Content-->
  <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
          <div class="row breadcrumbs-top">
             <div class="col-12">
               <h2 class="content-header-title float-left mb-0 text-dark text-capitalize"><?php echo $_SESSION['akses'];?></h2>
               <div class="breadcrumb-wrapper col-12">
                 <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="index.php?menu=home" class="text-dark">Home</a></li>
                   <li class="breadcrumb-item"><a href="#" class="text-dark">Akun <?php echo $_SESSION['nm_user'];?></a></li>                 </ol>
               </div>
              </div>
          </div>
        </div>
     </div>
     <div class="content-body">
<!-- account setting page start -->
       <section id="page-account-settings">
         <div class="row">
<!-- left menu section -->
          <div class="col-md-3 mb-2 mb-md-0">
            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
               <li class="nav-item">
                   <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true"><i class="fas fa-user mr-50 font-medium-3"></i>Profile <?php echo $toko;?></a>
               </li>
               <li class="nav-item">
                   <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                      <i class="feather icon-lock mr-50 font-medium-3"></i>Produk <?php echo $toko;?></a>
               </li>              
               <li class="nav-item">
                   <a class="nav-link d-flex py-75" id="account-pill-social" data-toggle="pill" href="#account-vertical-social" aria-expanded="false"><i class="feather icon-camera mr-50 font-medium-3"></i>Social Media</a>
               </li>
              
               
             </ul>
           </div>
<?php $a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_member WHERE akses = 'merchant'")); ?>                        
<!-- right content section -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  
                  <div class="tab-content">
                    
                    <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                      <div class="media">
                         <a href="javascript: void(0);">
                             <img src="../img/user/<?php echo $a['foto'] ?>" class="rounded mr-75" height="64" width="64">
                          </a>
                          <div class="media-body mt-75">
                             <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                <label class="btn btn-sm btn-primary rounded-0 ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Upload new photo</label>
                                   <input type="file" id="account-upload" hidden>
                                <button class="btn btn-sm btn-outline-warning ml-50">Reset</button>
                              </div>
                              <p class="text-muted ml-75 mt-50">
                                <small>Allowed JPG, GIF or PNG. Max size of 100kB</small>
                              </p>
                             </div>
                           </div>
                           <hr class="my-1">
                     <form novalidate>
                       <div class="row">                                                       
                        <div class="col-12">
                          <div class="form-group">
                            <div class="controls">
                              <label for="account-name">Name</label>
                     			<input type="text" class="form-control" value="<?php echo $a['nm_user'] ?>" readonly="readonly">
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-12">
                          <div class="form-group">
                            <div class="controls">
                              <label for="account-e-mail">E-mail</label>
                                <input type="email" class="form-control" value="<?php echo $a['email_user'] ?>" readonly="readonly">
                            </div>
                          </div>
                        </div>                                                         
                       
                    </div>
                   </form>
                </div>
                                            
                <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">                 
                   
                <div id="produk_lain" class="carousel slide" data-ride="carousel">
                 <h4>Produk <?php echo $toko;?></h4>
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
                                            
              <div class="tab-pane fade " id="account-vertical-social" role="tabpanel" aria-labelledby="account-pill-social" aria-expanded="false">
                <form>
                   <div class="row">
                                                        
                     <div class="col-12">
                       <div class="form-group">
                           <label for="account-twitter">Twitter</label>
                           <input type="text" class="form-control" placeholder="Add link" value="https://www.twitter.com" readonly="readonly">
                       </div>
                     </div>
                                                        
                     <div class="col-12">
                        <div class="form-group">
                           <label for="account-facebook">Facebook</label>
                           <input type="text" class="form-control" placeholder="Add link" readonly="readonly">
                        </div>
                     </div>
                                                        
                     <div class="col-12">
                         <div class="form-group">
                            <label for="account-google">Google+</label>
                            <input type="text" class="form-control" placeholder="Add link" readonly="readonly">
                         </div>
                     </div>
                                                        
                     <div class="col-12">
                        <div class="form-group">
                           <label for="account-linkedin">Tiktok</label>
                           <input type="text" class="form-control" placeholder="Add link" value="https://www.linkedin.com" readonly="readonly">
                        </div>
                     </div>
                                                        
                     <div class="col-12">
                        <div class="form-group">
                           <label for="account-instagram">Instagram</label>
                           <input type="text" class="form-control" placeholder="Add link" readonly="readonly">
                        </div>
                     </div>                          
                   
                  </div>
               </form>
             </div>
                                            
          </div>
        </div>
       </div>
      </div>
     </div>
    </div>
   </section>
<!-- account setting page end -->
   </div>
  </div>
</div>
<!-- END: Content-->

    