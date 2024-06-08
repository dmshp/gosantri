  <!--BEGIN: Content-->

  <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
          <!--<div class="content-header row">
              <div class="content-header-left col-md-9 col-12 mb-2">
                  <div class="row breadcrumbs-top">
                      <div class="col-12">
                          <h2 class="content-header-title float-left mb-0 text-dark text-capitalize">
                              <?php echo $_SESSION['akses']; ?></h2>
                          <div class="breadcrumb-wrapper col-12">
                              <ol class="breadcrumb">
                                  <li class="breadcrumb-item"><a href="index.php?menu=home" class="text-dark">Home</a>
                                  </li>
                              </ol>
                          </div>
                      </div>
                  </div>
              </div>
          </div>-->



          <!-- Statistics card section start -->

          <section id="statistics-card" style="margin-top: 15px;">
              <div class="row">
                  <?php $satQuery = "SELECT COUNT(id_user) as user FROM tabel_member";
                    $executeSat = mysqli_query($koneksi, $satQuery);
                    while ($user = mysqli_fetch_array($executeSat)) {

                    ?>

                  <?php $a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_member WHERE akses = 'member'")); ?>
                  <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                      <a href="index.php?menu=master_user&akses=<?php echo $a['akses']; ?>" class="text-dark s">
                          <div class="card text-center">
                              <div class="card-content">
                                  <div class="card-body">
                                      <div class="avatar p-50 m-0 mb-1" style="background:<?php echo $tombol; ?>">
                                          <div class="avatar-content">
                                              <i class="fas fa-id-badge font-medium-5"></i>
                                          </div>
                                      </div>
                                      <h2 class="text-bold-700"><?= $user['user'] ?></h2>
                                      <p class="mb-0 line-ellipsis">MASTER USER</p>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>

                  <?php  }  ?>



                  <?php $satQuery = "SELECT COUNT(id_user) as user FROM tabel_member WHERE akses = 'merchant'";
                    $executeSat = mysqli_query($koneksi, $satQuery);
                    while ($merchant = mysqli_fetch_array($executeSat)) {
                  ?>

                  <?php $b = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_member WHERE akses = 'merchant'")); ?>
                  <div class="col-xl-3 col-md-4 col-sm-6 col-6" style="display: none;">
                      <a href="index.php?menu=user&akses=<?php echo $b['akses']; ?>" class="text-dark s">
                          <div class="card text-center">
                              <div class="card-content">
                                  <div class="card-body">
                                      <div class="avatar p-50 m-0 mb-1" style="background:<?php echo $tombol; ?>">
                                          <div class="avatar-content">
                                              <i class="fas fa-user-tag font-medium-5"></i>
                                          </div>
                                      </div>
                                      <h2 class="text-bold-700"><?= $merchant['user'] ?></h2>
                                      <p class="mb-0 line-ellipsis">Merchant</p>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>

                  <?php  }  ?>



                  <?php $satQuery = "SELECT COUNT(kd_barang) as barang FROM tabel_barang";
                    $executeSat = mysqli_query($koneksi, $satQuery);
                    while ($barang = mysqli_fetch_array($executeSat)) {
                    ?>

                  <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                      <a href="index.php?menu=product" class="text-dark s">
                          <div class="card text-center">
                              <div class="card-content">
                                  <div class="card-body">
                                      <div class="avatar p-50 m-0 mb-1" style="background:<?php echo $tombol; ?>">
                                          <div class="avatar-content">
                                              <i class="fas fa-box-open font-medium-5"></i>
                                          </div>
                                      </div>
                                      <h2 class="text-bold-700"><?= $barang['barang'] ?></h2>
                                      <p class="mb-0 line-ellipsis">PRODUK</p>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>

                  <?php  }  ?>



                  <?php $satQuery = "SELECT COUNT(id) as pembelian FROM tabel_pembelian";
                    $executeSat = mysqli_query($koneksi, $satQuery);
                    while ($pembelian = mysqli_fetch_array($executeSat)) {
                    ?>

                  <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                      <a href="index.php?menu=info" class="text-dark s">
                          <div class="card text-center">
                              <div class="card-content">
                                  <div class="card-body">
                                      <div class="avatar p-50 m-0 mb-1" style="background:<?php echo $tombol; ?>">
                                          <div class="avatar-content">
                                              <i class="fas fa-newspaper font-medium-5"></i>
                                          </div>
                                      </div>
                                      <h2 class="text-bold-700"><?= $pembelian['pembelian'] ?></h2>
                                      <p class="mb-0 line-ellipsis">WHOLESALE</p>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>

                  <?php  }  ?>



                  <?php $satQuery = "SELECT COUNT(no_faktur_retur) as retur FROM tabel_retur";
                    $executeSat = mysqli_query($koneksi, $satQuery);
                    while ($retur = mysqli_fetch_array($executeSat)) {
                    ?>

                  <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                      <a href="index.php?menu=retur" class="text-dark s">
                          <div class="card text-center">
                              <div class="card-content">
                                  <div class="card-body">
                                      <div class="avatar p-50 m-0 mb-1" style="background:<?php echo $tombol; ?>">
                                          <div class="avatar-content">
                                              <i class="fas fa-recycle font-medium-5"></i>
                                          </div>
                                      </div>
                                      <h2 class="text-bold-700"><?= $retur['retur'] ?></h2>
                                      <p class="mb-0 line-ellipsis">RETURN</p>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>

                  <?php  }  ?>


                  <?php $satQuery = "SELECT COUNT(no_faktur_penjualan) as jml FROM tabel_penjualan";
                    $executeSat = mysqli_query($koneksi, $satQuery);
                    $jml = 0;
                    while ($jml = mysqli_fetch_array($executeSat)) {
                    ?>

                  <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                      <a href="index.php?menu=sales" class="text-dark s">
                          <div class="card text-center">
                              <div class="card-content">
                                  <div class="card-body">
                                      <div class="avatar p-50 m-0 mb-1" style="background:<?php echo $tombol; ?>">
                                          <div class="avatar-content">
                                              <i class="fas fa-paste font-medium-5"></i>
                                          </div>
                                      </div>
                                      <h2 class="text-bold-700"><?= $jml['jml']; ?></h2>
                                      <p class="mb-0 line-ellipsis">LAPORAN PENJUALAN</p>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>

                  <?php  }  ?>



                  <?php $satQuery = "SELECT COUNT(no_faktur_penjualan) as jml FROM tabel_penjualan";
                    $executeSat = mysqli_query($koneksi, $satQuery);
                    $jml = 0;
                    while ($jml = mysqli_fetch_array($executeSat)) {
                    ?>
                  <div class="col-xl-3 col-md-4 col-sm-6 col-6">

                      <a href="index.php?menu=balance" class="text-dark s">
                          <div class="card text-center">
                              <div class="card-content">
                                  <div class="card-body">
                                      <div class="avatar p-50 m-0 mb-1" style="background:<?php echo $tombol; ?>">
                                          <div class="avatar-content">
                                              <i class="fas fa-balance-scale font-medium-5"></i>
                                          </div>
                                      </div>
                                      <h2 class="text-bold-700"><?= $jml['jml']; ?></h2>
                                      <p class="mb-0 line-ellipsis">LAPORAN LABA</p>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>

                  <?php  }  ?>



                  <?php $satQuery = "SELECT COUNT(no_faktur_penjualan) as jml FROM tabel_penjualan";
                    $executeSat = mysqli_query($koneksi, $satQuery);
                    $jml = 0;
                    while ($jml = mysqli_fetch_array($executeSat)) {
                    ?>

                  <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                      <a href="index.php?menu=stock" class="text-dark s">
                          <div class="card text-center">
                              <div class="card-content">
                                  <div class="card-body">
                                      <div class="avatar p-50 m-0 mb-1" style="background:<?php echo $tombol; ?>">
                                          <div class="avatar-content">
                                              <i class="fas fa-clipboard-list font-medium-5"></i>
                                          </div>
                                      </div>
                                      <h2 class="text-bold-700"><?= $jml['jml']; ?></h2>
                                      <p class="mb-0 line-ellipsis">LAPORAN STOCK</p>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>

                  <?php  }  ?>


                  <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                      <a href="index.php?menu=profile" class="text-dark s">
                          <div class="card text-center">
                              <div class="card-content">
                                  <div class="card-body">
                                      <div class="avatar p-50 m-0 mb-1" style="background:<?php echo $tombol; ?>">
                                          <div class="avatar-content">
                                              <i class="fas fa-home font-medium-5"></i>
                                          </div>
                                      </div>
                                      <h2 class="text-bold-700" style="color: white;">0</h2>
                                      <p class="mb-0 line-ellipsis">PROFIL TOKO</p>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>



              </div>



              <div class="row">
                  <div class="col-lg-4 col-sm-6 col-12">
                      <div class="card">
                          <div class="card-header d-flex flex-column align-items-start pb-0">
                              <div class="avatar bg-rgba-primary p-50 m-0">
                                  <div class="avatar-content">
                                      <i class="feather icon-users text-primary font-medium-5"></i>
                                  </div>
                              </div>
                              <h2 class="text-bold-700 mt-1">92.6k</h2>
                              <p class="mb-0">Pendaftaran Member</p>
                          </div>
                          <div class="card-content">
                              <div id="line-area-chart-1"></div>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-4 col-sm-6 col-12">
                      <div class="card">
                          <div class="card-header d-flex flex-column align-items-start pb-0">
                              <div class="avatar bg-rgba-success p-50 m-0">
                                  <div class="avatar-content">
                                      <i class="feather icon-credit-card text-success font-medium-5"></i>
                                  </div>
                              </div>
                              <h2 class="text-bold-700 mt-1">97.5k</h2>
                              <p class="mb-0">Transaksi</p>
                          </div>

                          <div class="card-content">
                              <div id="line-area-chart-2"></div>
                          </div>
                      </div>
                  </div>

                  <div class="col-lg-4 col-sm-6 col-12">
                      <div class="card">
                          <div class="card-header d-flex flex-column align-items-start pb-0">
                              <div class="avatar bg-rgba-danger p-50 m-0">
                                  <div class="avatar-content">
                                      <i class="fas fa-truck-loading font-medium-5"></i>
                                  </div>
                              </div>
                              <h2 class="text-bold-700 mt-1">36%</h2>
                              <p class="mb-0">Sirkulasi Produk</p>
                          </div>

                          <div class="card-content">
                              <div id="line-area-chart-3"></div>
                          </div>
                      </div>
                  </div>

              </div>

          </section>

          <!-- // Statistics Card section end-->


      </div>
  </div>

  <!-- END: Content -->

  <style>
    a.s {
        text-decoration: none;
    }
  </style>