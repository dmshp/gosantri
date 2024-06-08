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
                   <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true"><i class="fas fa-user mr-50 font-medium-3"></i>Profile <?php echo $_SESSION['nm_user'];?></a>
               </li>
               <li class="nav-item">
                   <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                      <i class="feather icon-lock mr-50 font-medium-3"></i>Password</a>
               </li>              
               <li class="nav-item">
                   <a class="nav-link d-flex py-75" id="account-pill-social" data-toggle="pill" href="#account-vertical-social" aria-expanded="false"><i class="feather icon-camera mr-50 font-medium-3"></i>Social Media</a>
               </li>
              
               
             </ul>
           </div>
<?php $a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_member WHERE nm_user = '$_SESSION[nm_user]'")); ?>                        
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
                     			<input type="text" class="form-control" value="<?php echo $a['nm_user'] ?>">
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-12">
                          <div class="form-group">
                            <div class="controls">
                              <label for="account-e-mail">E-mail</label>
                                <input type="email" class="form-control" value="<?php echo $a['email_user'] ?>">
                            </div>
                          </div>
                        </div>
                        
                        <div class="col-12">
                          <div class="alert alert-warning alert-dismissible mb-2" role="alert">
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">×</span>
                             </button>
                             <p class="mb-0">Your email is not confirmed. Please check your inbox.</p>
                                <a href="javascript: void(0);">Resend confirmation</a>
                           </div>
                        </div>
                        
                        <div class="col-12">
                          <div class="form-group">
                             <div class="controls">
                                 <label for="account-e-mail">Alamat</label>
                                    <input type="email" class="form-control" value="<?php echo $a['email_user'] ?>">
                              </div>
                            </div>
                        </div>
                                                        
                       <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                          <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Simpan</button>
                          <button type="reset" class="btn btn-outline-warning">Cancel</button>
                       </div>
                    </div>
                   </form>
                </div>
                                            
                <div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                 <form novalidate>
                    <div class="row">
                       
                       <div class="col-12">
                        <div class="form-group">
                          <div class="controls">
                            <label for="account-old-password">Password Lama</label>
                               <input type="text" class="form-control" value="<?php echo $a['pass_user'] ?>">
                          </div>
                        </div>
                      </div>
                                                        
                      <div class="col-12">
                        <div class="form-group">
                           <div class="controls">
                             <label for="account-new-password">Password baru</label>
                             <input type="password" name="password" class="form-control" placeholder="New Password" minlength="6">
                           </div>
                         </div>
                     </div>
                                                        
                     <div class="col-12">
                       <div class="form-group">
                        <div class="controls">
                          <label for="account-retype-new-password">Ketik Ulang Password</label>
                            <input type="password" name="pass_user" class="form-control" minlength="6">
                        </div>
                       </div>
                     </div>
                     
                     <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                        <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Simpan</button>
                        <button type="reset" class="btn btn-outline-warning">Cancel</button>
                     </div>
                   </div>
                 </form>
               </div>
                                            
              <div class="tab-pane fade " id="account-vertical-social" role="tabpanel" aria-labelledby="account-pill-social" aria-expanded="false">
                <form>
                   <div class="row">
                                                        
                     <div class="col-12">
                       <div class="form-group">
                           <label for="account-twitter">Twitter</label>
                           <input type="text" class="form-control" placeholder="Add link" value="https://www.twitter.com">
                       </div>
                     </div>
                                                        
                     <div class="col-12">
                        <div class="form-group">
                           <label for="account-facebook">Facebook</label>
                           <input type="text" class="form-control" placeholder="Add link">
                        </div>
                     </div>
                                                        
                     <div class="col-12">
                         <div class="form-group">
                            <label for="account-google">Google+</label>
                            <input type="text" class="form-control" placeholder="Add link">
                         </div>
                     </div>
                                                        
                     <div class="col-12">
                        <div class="form-group">
                           <label for="account-linkedin">Tiktok</label>
                           <input type="text" class="form-control" placeholder="Add link" value="https://www.linkedin.com">
                        </div>
                     </div>
                                                        
                     <div class="col-12">
                        <div class="form-group">
                           <label for="account-instagram">Instagram</label>
                           <input type="text" class="form-control" placeholder="Add link">
                        </div>
                     </div>
                                                        
                                                        
                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                       <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Simpan</button>
                       <button type="reset" class="btn btn-outline-warning">Cancel</button>
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

    