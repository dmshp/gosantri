<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-fixed navbar-shadow navbar-brand-center" style="background:<?php echo $headerfooter;?>">
  <div class="navbar-header d-xl-block d-none">
    <ul class="nav navbar-nav flex-row">
       <li class="nav-item"><a class="navbar-brand" href="index.php?menu=home"></a></li>
    </ul>
        </div>
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon feather icon-more-vertical"></i></a></li>
                        </ul>
                        <ul class="nav navbar-nav bookmark-icons"> 
                            
                            <li class="nav-item d-none d-lg-block"><a href="index.php?menu=home"><img src="../img/toko/<?php echo $logo;?>" width="40" height="40" /></a></li>                            
                        </ul>                        
                    </div>
                    <ul class="nav navbar-nav float-right">                              
                    <?php if ($_SESSION['akses'] == 'admin2') {  ?>
                       <li class="nav-item"><a class="nav-link nav-link-label font-medium-5 mr-1 d-xl-none" href="index.php?menu=home" style=""><i class="fas fa-home"></i></a></li>
                       <li class="nav-item"><a class="nav-link nav-link-label font-medium-5 mr-1 d-xl-none" href="index.php?menu=ipos" style=""><i class="fas fa-cash-register"></i></a></li>                        
                       </li> 
                       <li class="nav-item">
                            <a class="nav-link nav-link-label font-medium-5 mr-1 d-xl-block d-none" href="index.php?menu=order" style="">
                                <i class="fas fa-receipt"></i>
                                <!-- <span class="badge badge-pill badge-info font-small-2">1</span> -->
                            </a>
                        </li>                        
                       </li>
                       <li class="nav-item"><a class="nav-link nav-link-label font-medium-5 mr-1" href="chat.php" style=""><i class="fas fa-comment-dots"></i><span class="badge badge-pill badge-info font-small-1 hidden" id="boxcomment-admin"><span id="comment-admin"></span></span></a></li>
                       </li>    
                       
                       </li> 
                       
                       <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                          <div class="user-nav d-sm-flex d-none">
                            <span class="user-name text-bold-600" style=""><?php echo $_SESSION['nm_user'];?></span>
                            <span class="user-status" style=""><?php echo $_SESSION['email_user'];?></span>
                          </div>
                          <span><img class="round" src="../img/toko/<?= $foto ?>" onerror="this.src='../img/user/user.jpg';" height="40" width="40"></span>
                            </a>
                          <div class="dropdown-menu dropdown-menu-rightw-50">
                            <a class="dropdown-item" href="index.php?menu=profile"><i class="fas fa-user-edit"></i> Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../aut/logout.php"><i class="fas fa-power-off"></i> Logout</a>
                            </div>
                        </li>       
<?php } ?>

<?php if ($_SESSION['akses'] == 'merchant2') {   ?>
                       <li class="nav-item"><a class="nav-link nav-link-label font-medium-5 mr-1" href="index.php?menu=home" style=""><i class="fas fa-home"></i></a></li> 
                       <li class="nav-item"><a class="nav-link nav-link-label font-medium-5 mr-1" href="chat.php" style=""><i class="fas fa-comment-dots"></i><span class="badge badge-pill badge-info font-small-1 hidden" id="boxcomment-merchant"><span id="comment-merchant"></span></span></a></li>
                       </li>                        
                        <!-- <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label font-medium-5 mr-1" href="index.php?menu=order" data-toggle="dropdown" style=""><i class="fas fa-receipt"></i><span class="badge badge-pill badge-info font-small-1">1</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <div class="dropdown-header m-0 p-2">
                                        <h3 class="white">5 New</h3><span class="notification-title">App Notifications</span>
                                    </div>
                                </li>
                                <li class="scrollable-container media-list"><a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-plus-square font-medium-5 primary"></i></div>
                                            <div class="media-body">
                                                <h6 class="primary media-heading">You have new order!</h6><small class="notification-text"> Are your going to meet me tonight?</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9 hours ago</time></small>
                                        </div>
                                    </a>
                                    
                                    <a class="d-flex justify-content-between" href="javascript:void(0)">
                                        <div class="media d-flex align-items-start">
                                            <div class="media-left"><i class="feather icon-download-cloud font-medium-5 success"></i></div>
                                            <div class="media-body">
                                                <h6 class="success media-heading red darken-1">99% Server load</h6><small class="notification-text">You got new order of goods.</small>
                                            </div><small>
                                                <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">5 hour ago</time></small>
                                        </div>
                                    </a>
                                    </li>
                                <li class="dropdown-menu-footer"><a class="dropdown-item p-1 text-center" href="index.php?menu=order">Read all notifications</a></li>
                            </ul>
                            
                        </li> -->
                        
                         <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                          <div class="user-nav d-sm-flex d-none">
                            <span class="user-name text-bold-600" style=""><?php echo $_SESSION['nm_user'];?></span>
                            <span class="user-status" style=""><?php echo $_SESSION['email_user'];?></span>
                          </div>
                          <span><img class="round" src="../img/toko/<?= $foto ?>" onerror="this.src='../img/user/user.jpg';" height="40" width="40"></span>
                            </a>
                          <div class="dropdown-menu dropdown-menu-rightw-50">
                            <a class="dropdown-item" href="index.php?menu=profile"><i class="fas fa-user-edit"></i> Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../aut/logout.php"><i class="fas fa-power-off"></i> Logout</a>
                            </div>
                        </li>        
<?php } ?> 

<?php if ($_SESSION['akses'] == 'member' || $_SESSION['akses'] == 'marketing2') {    ?>
           
                     
                        <li class="nav-item">
                            <a class="nav-link nav-link-label font-medium-5 mr-1" href="chat.php" style="" title="Chat">
                                <i class="fas fa-comment-dots"></i>
                                <span class="badge badge-pill badge-info font-small-1 hidden" id="boxcomment-member">
                                    <span id="comment-member"></span>
                                </span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link nav-link-label font-medium-5 mr-1" href="index.php?menu=checkout" style="" title="Checkout">
                                <i class="fas fa-shopping-cart"></i>
                            </a>
                        </li>
                       
                        
                        <!-- <li class="dropdown dropdown-notification nav-item">
                            <a class="nav-link nav-link-label font-medium-5 mr-1" href="index.php?menu=order" data-toggle="dropdown" style="">
                                <i class="fa-sharp fa-solid fa-bag-shopping"></i>
                                <span class="badge badge-pill badge-info font-small-1">1</span>
                            </a>
                        </li> -->
                        
                        <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                          <div class="user-nav d-sm-flex d-none">
                            <span class="user-name text-bold-600" style=""><?php echo $_SESSION['nm_user'];?></span>
                            <span class="user-status" style=""><?php echo $_SESSION['email_user'];?></span>
                          </div>
                          <span><img class="round" src="../img/user/<?= $foto ?>" onerror="this.src='../img/user/user.jpg';" height="40" width="40"></span>
                            </a>
                          <div class="dropdown-menu dropdown-menu-rightw-50">
                            <a class="dropdown-item" href="index.php?menu=profile"><i class="fas fa-user-edit"></i> Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../aut/logout.php"><i class="fas fa-power-off"></i> Logout</a>
                            </div>
                        </li>         
<?php } ?>                      

<?php if ($_SESSION['akses'] == 'kurir') {  ?>
                        <li class="nav-item">
                            <a class="nav-link nav-link-label font-medium-5 mr-1 d-xl-none" href="index.php?menu=home" style="">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                       
                       <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                          <div class="user-nav d-sm-flex d-none">
                            <span class="user-name text-bold-600" style=""><?php echo $_SESSION['nm_user'];?></span>
                            <span class="user-status" style=""><?php echo $_SESSION['email_user'];?></span>
                          </div>
                          <span><img class="round" src="../img/icon/admin.jpg" height="40" width="40"></span>
                            </a>
                          <div class="dropdown-menu dropdown-menu-rightw-50">
                            <a class="dropdown-item" href="index.php?menu=profile"><i class="fas fa-user-edit"></i> Edit Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../aut/logout.php"><i class="fas fa-power-off"></i> Logout</a>
                            </div>
                        </li>       
<?php } ?> 

                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    <div class="horizontal-menu-wrapper">
        <div class="header-navbar navbar-expand-sm navbar navbar-horizontal floating-nav navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto"><a class="navbar-brand" href="index.php?menu=home">
                            <img src="../img/<?php echo $logo;?>" height="45" />
                        </a></li>
                    <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
                </ul>
            </div>
            <!-- Horizontal menu content-->
            <div class="navbar-container main-menu-content" data-menu="menu-container">              
                <ul class="nav navbar-nav justify-content-center navigation" id="main-menu-navigation" data-menu="menu-navigation">
<?php if ($_SESSION['akses'] == 'admin') {  ?>                 

                    <li class="nav-item">
                         <a href="index.php?menu=home" class="nav-link"><i class="fas fa-home"></i> BERANDA</a>
                    </li>
                    <li class="nav-item">
                         <a href="index.php?menu=ipos" class="nav-link"><i class="fas fa-cash-register"></i> iPOS</a>
                    </li>
                    <li class="nav-item">
                         <a href="index.php?menu=product" class="nav-link"><i class="fas fa-box-open"></i> PRODUCT</a> 
                    </li> 
                    <li class="nav-item">
                        <a href="index.php?menu=info" class="nav-link"><i class="fas fa-newspaper"></i> INFO</a> 
                    </li>
                    <li class="nav-item">
                        <a href="index.php?menu=ads" class="nav-link"><i class="fab fa-adversal"></i> IKLAN</a> 
                    </li>
                    <li class="nav-item">
                        <a href="index.php?menu=streaming" class="nav-link"><i class="fas fa-video"></i> LIVE STREAMING</a> 
                    </li>
                        <?php
                            $sql_topupwd = mysqli_query($koneksi, "SELECT COUNT(CASE WHEN mb.akses='merchant' THEN id_keuangan END) merchant,
                            COUNT(CASE WHEN mb.akses='member' THEN id_keuangan END) member,
                            COUNT(CASE WHEN mb.akses='kurir' THEN id_keuangan END) kurir 
                            FROM tabel_keuangan tk, tabel_member mb WHERE tk.id_member=mb.id_user and (tk.no_faktur_pembelian = '' and tk.arus=1)");
                            $jumlah_topupwd = mysqli_fetch_array($sql_topupwd);
                            $jumlah_all_topupwd = $jumlah_topupwd['merchant'] + $jumlah_topupwd['member'] + $jumlah_topupwd['kurir']
                        ?>
                    <li class="nav-item">
                        <a href="index.php?menu=keuangan" class="nav-link"><i class="fas fa-money"></i> Keuangan
                            <?php if($jumlah_all_topupwd != 0) { ?>
                            <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2 nama-user">
                                <?php echo $jumlah_all_topupwd; ?>
                            </span>
                            <?php } ?>
                        </a> 
                    </li>
                    <li class="nav-item">
                        <a href="index.php?menu=pembayaran" class="nav-link"><i class="fas fa-book"></i> PEMBAYARAN</a> 
                    </li>
                            <?php
                                $sql_transfer = mysqli_query($koneksi, "SELECT p.id_bukti
                                FROM tabel_bukti_pembayaran as bp 
                                LEFT JOIN tabel_pembelian as p ON p.id_bukti = bp.id_bukti 
                                LEFT JOIN tabel_pembayaran as pa ON pa.kd_pembayaran = p.pembayaran OR pa.kd_pembayaran = bp.bank where bp.status = '0'");
                                $jumlah_transfer = mysqli_num_rows($sql_transfer);
                            ?>
                    <li class="nav-item">
                        <a href="index.php?menu=transfer" class="nav-link">
                            <i class="fas fa-exchange"></i> USER TRANSFER
                            <?php if($jumlah_transfer != 0) { ?>
                            <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2 nama-user">
                                <?php echo $jumlah_transfer; ?>
                            </span>
                            <?php } ?>
                        </a> 
                    </li>
                        
                    <li class="nav-item">
                        <a href="index.php?menu=website" class="nav-link"><i class="fas fa-house-user"></i> PROFIL</a> 
                    </li>
<?php } ?>


<?php if ($_SESSION['akses'] == 'merchant' ) {  ?>                  
                    <li class="nav-item">
                        <a href="index.php?menu=home" class="nav-link"><i class="fas fa-home"></i> BERANDA</a>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown">
                        <a class="dropdown-toggle nav-link active" href="" data-toggle="dropdown"><i class="fas fa-server"></i> PRODUK</a>
                        <ul class="dropdown-menu">
                            <li class="nav-item" data-menu="">
                                <a class="dropdown-item" href="index.php?menu=product" data-toggle="dropdown">Daftar Produk</a>
                            </li>
                            <?php
                            $satQuery = "SELECT COUNT(total_retur) as total_retur FROM tabel_retur WHERE `id_user` = $_SESSION[id_user]";
                            $executeSat = mysqli_query($koneksi, $satQuery);
                            while ($count = mysqli_fetch_array($executeSat)) {
                            ?>
                            <li class="nav-item" data-menu="">
                                <a class="dropdown-item" href="index.php?menu=retur" data-toggle="dropdown">Return Produk</a>
                                <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2 nama-user">
                                    <?php echo $count['total_retur']; ?>
                                </span>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>
                        <?php
                            $sql_dikemas = mysqli_query($koneksi, "SELECT no_faktur_pembelian FROM tabel_pembelian WHERE status = 'dikemas'");
                            $jumlah_dikemas = mysqli_num_rows($sql_dikemas);
                        ?>
                    <li class="nav-item">
                        <a href="index.php?menu=history" class="nav-link"><i class="fas fa-receipt"></i> ORDER
                            <?php if($jumlah_dikemas != 0) { ?>
                            <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2 nama-user">
                                <?php echo $jumlah_dikemas; ?>
                            </span>
                            <?php } ?>
                        </a> 
                    </li>
                    <li class="nav-item">
                        <a href="index.php?menu=saldo" class="nav-link"><i class="fas fa-wallet"></i> SALDO</a> 
                    </li>
                    <!-- <li class="nav-item">
                        <a href="index.php?menu=laporan_merchant" class="nav-link"><i class="fa fa-file-text"></i> LAPORAN</a> 
                    </li> -->
                    <li class="dropdown nav-item" data-menu="dropdown">
                        <a class="dropdown-toggle nav-link active" href="" data-toggle="dropdown"><i class="fa fa-file-text"></i> LAPORAN</a> 
                        <ul class="dropdown-menu">
                            <li class="nav-item" data-menu="">
                                <a class="dropdown-item" href="index.php?menu=sales" data-toggle="dropdown">Laporan Penjualan</a>
                            </li>
                            <li class="nav-item" data-menu="">
                                <a class="dropdown-item" href="index.php?menu=bonus" data-toggle="dropdown">Laporan Bonus Penjualan</a>
                            </li>
                            <li class="nav-item" data-menu="">
                                <a class="dropdown-item" href="index.php?menu=balance" data-toggle="dropdown">Laporan Laba</a>
                            </li>
                            <li class="nav-item" data-menu="">
                                <a class="dropdown-item" href="index.php?menu=stock" data-toggle="dropdown">Laporan Stock</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="index.php?menu=website" class="nav-link"><i class="fas fa-house-user"></i> PROFIL</a> 
                    </li>
                               
<?php } ?>
                 

<?php if ($_SESSION['akses'] == 'member' ) {    ?>                  
                    <li class="nav-item">
                        <a href="index.php?menu=home" class="nav-link"><i class="fas fa-home"></i> BERANDA</a>
                    </li>
                    <li class="dropdown nav-item" data-menu="dropdown"><a class="dropdown-toggle nav-link active" href="index.php?menu=home" data-toggle="dropdown"><i class="fas fa-server"></i> PRODUK</a>
                        <ul class="dropdown-menu">
                            <li class="nav-item" data-menu=""><a class="dropdown-item" href="index.php?menu=produk" data-toggle="dropdown">Semua Produk</a>
                            </li>
                            <?php error_reporting(0);           
                               $ketQuery = "SELECT * FROM tabel_kategori_barang ORDER BY nm_kategori ASC";
                               $executeSat = mysqli_query($koneksi, $ketQuery);
                               while ($a=mysqli_fetch_array($executeSat)) {
                            ?> 
                            <li class="nav-item" data-menu=""><a class="dropdown-item" href="index.php?menu=produk&kd_kategori=<?php echo $a['kd_kategori']; ?>" data-toggle="dropdown"><?php echo $a['nm_kategori'];?></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </li>                   

                    <li class="nav-item">
                        <a href="index.php?menu=saldo" class="nav-link"><i class="fas fa-wallet"></i> SALDO</a> 
                    </li>
                    <li class="nav-item">
                        <a href="index.php?menu=history" class="nav-link"><i class="fas fa-receipt"></i> ORDER</a> 
                    </li>
                    <li class="nav-item">
                        <a href="index.php?menu=delivery_member" class="nav-link"><i class="fas fa-map-marker"></i> DELIVERY</a> 
                        <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2 nama-user">Baru</span>
                    </li>
                                  
<?php } ?>


                </ul>
            </div>
        </div>
    </div>
<!-- END: Main Menu--> 
    
<script>
    setInterval(() => {
        $.ajax({
            type: "GET",
            url: "get_chat_total.php",
            data: {},
            success: function(data) {
                            if(data != 0){
                $('#boxcomment-<?= $_SESSION['akses'] ?>').removeClass("hidden");
                $('#comment-<?= $_SESSION['akses'] ?>').html(data);
                            }else{
                $('#boxcomment-<?= $_SESSION['akses'] ?>').addClass("hidden");
                            }
            }
        })
    }, 1000)
</script>