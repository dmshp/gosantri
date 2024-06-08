<?php include "../inc/koneksi.php";
$a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_toko")); ?>


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
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
        </div>



        <div class="content-body">
            <div id="user-profile">
                <div class="row">
                    <div class="col-12">
                        <div class="profile-header">
                            <div class="relative">
                                <div class="cover-container">
                                    <div id="carousel-keyboard" class="carousel slide" data-keyboard="true">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-keyboard" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-keyboard" data-slide-to="1"></li>
                                        </ol>

                                        <div class="carousel-inner" role="listbox">
                                            <?php 
                                                $ketQuery   = "SELECT * FROM tabel_slide WHERE kat_slide = '3' ORDER BY id_slide DESC limit 1";
                                                $executeSat = mysqli_query($koneksi, $ketQuery);
                                                while ($m = mysqli_fetch_array($executeSat)) {
                                            ?>

                                            <div class="carousel-item active">
                                                <img class="img-fluid" src="../img/iklan/<?php echo $m['gbr_slide'] ?>">
                                            </div>

                                            <?php } ?>

                                            <?php 
                                                $ketQuery   = "SELECT * FROM tabel_slide WHERE kat_slide = '4' ORDER BY id_slide DESC limit 1";
                                                $executeSat = mysqli_query($koneksi, $ketQuery);
                                                while ($m = mysqli_fetch_array($executeSat)) {
                                                    // print_r($m['gbr_slide']);
                                            ?>

                                            <div class="carousel-item">
                                                <img class="img-fluid" src="../img/iklan/<?php echo $m['gbr_slide'] ?>">
                                            </div>

                                            <?php } ?>
                                            <a class="carousel-control-prev" href="#carousel-keyboard" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>

                                            <a class="carousel-control-next" href="#carousel-keyboard" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>

   <!-- <div class="profile-img-container rounded pt-2 d-flex align-items-center justify-content-center" style=" background-color: white; ">
                                <i class=" fa-solid fa-wallet ml-1 mr-2 mb-2 fa-2x" style="color: purple;"></i>
                                <?php
                                $id             = $user['id_user'];
                                $query          = "SELECT SUM(total_biaya) FROM tabel_pembelian WHERE id_user = $id ";
                                $executeQue     = mysqli_query($koneksi, $query);
                                $pengeluaran    = mysqli_fetch_array($executeQue);
                                // print_r($id);
                                $ketQuery   = "SELECT SUM(jumlah) FROM tabel_saldo WHERE id_user = $id ";
                                $executeSat = mysqli_query($koneksi, $ketQuery);
                                while ($saldo = mysqli_fetch_array($executeSat)) {
                                    // print_r($pengeluaran);
                                    $sisa_saldo = $saldo[0] - $pengeluaran[0];
                                    // print_r($sisa_saldo)
                                ?>

<div class="user-page-info mb-0  border-end-danger">
   <p class="text-bold-600 mb-0">Saldo</p>
   <p>Rp.<?php echo number_format($sisa_saldo, 0, ",", "."); ?></p>
</div>

                                
<div class="user-page-info ml-5 mb-1">
   <p class="text-bold-60 mb-0">Isi Saldo</p>                                    
    <a href="index.php?menu=saldo">
     <i class="fa-solid fa-circle-plus"></i>
   </a>
</div>

<?php } ?>

<!-- <img src="../img/user/<?php echo $foto; ?>" class="rounded-circle img-border box-shadow-1">
         <div class="float-right">
 <a href="index.php?menu=profile" class="btn btn-icon btn-icon rounded-circle btn-dark mr-1">
  <i class="fas fa-user-edit fa-2x"></i>
 </a>-->

<!-- <div class="d-flex justify-content-end align-items-center profile-header-nav">
     <nav class="navbar navbar-expand-sm w-100 pr-0">

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                                <ul class="navbar-nav justify-content-around w-50 ml-sm-auto">

                                    <!-- <li class="nav-item px-sm-0"><a href="index.php?menu=profile" class="nav-link">Edit Profile</a></li>



                     <li class="nav-item px-sm-0"><a href="#" class="nav-link font-medium-1 text-dark">Ads</a></li>

                     <li class="nav-item px-sm-0"><a href="#" class="nav-link font-medium-1 text-dark">Partner</a></li>

                    </ul>



                </div>



                </nav>-->

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>







<?php  $idUser = $_SESSION['id_user'];
   $saldo = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(jumlah) FROM tabel_saldo WHERE id_user = $idUser "));

   $pengeluaran = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(pengeluaran) FROM tabel_saldo WHERE id_user = $idUser "));

   $sisa_saldo = $saldo[0] - $pengeluaran[0];
?>


<div class="row mt-1 mb-5">
   <div class="col-lg-3 col-md-12 col-sm-12 col-12">
     <div class="card mb-1">
       <div class="card-body text-center">
         <h4 class="text-bold-700 text-uppercase mt-2"><i class="fas fa-wallet"></i> Saldo</h4><hr>
          <h3 class="text-danger">Rp.<?php echo number_format($sisa_saldo, 0, ",", "."); ?></h3>
            <a href="index.php?menu=saldo" class="btn btn-success mb-3">Tambah</a>
        </div>
     </div>

    <div class="card mb-1">
       <div class="card-header">
        <h4 class="text-bold-700 text-uppercase"><i class="fas fa-history"></i> History</h4>
        <p class="text-right badge badge-success">                                    
            <a href="index.php?menu=history" style="text-decoration:none">Check</a> 
              <i class="fa-solid fa-angle-right"></i>
        </p>
      </div>
       <hr style="margin: 14px">
      <div class="card-body text-center">
        <div class="row ml-1 d-flex justify-content-center">
           <div class="col-4 text-center pl-0 pr-0">
              <a href="" class="badge bg-transparent text-black-50 text-decoration-none">
                <i class="fa-solid fa-wallet mb-1 fa-2x"></i>
                  <p>Belum Bayar</p>
              </a>
           </div>
         <div class="col-4 text-center pl-0 pr-0">
           <a href="" class="badge bg-transparent text-black-50 text-decoration-none">
              <i class="fa-solid fa-box fa-2x mb-1"></i>
                 <p>Dikemas</p>
           </a>
         </div>

        <div class="col-4 text-center pl-0 pr-0">
            <a href="" class="badge bg-transparent text-black-50 text-decoration-none">
               <i class="fa-solid fa-truck fa-2x mb-2"></i>
                <p>Dikirim</p>
            </a>
       </div>
     </div>
   </div>
 </div>

                        
                
                        
                        
                        <div class="card mb-1"> 
                            <div class="card-header">
                                <h4 class="text-bold-700 text-uppercase"><i class="fas fa-bullhorn"></i> Promo</h4>
                                <p class="text-right badge badge-success">                                    
                                    <a href="" style="text-decoration:none">Check</a>  
                                    
                                    <i class="fa-solid fa-angle-right"></i>

                                </p>

                            </div>
                            
                            <hr style="margin: 14px">
                            
                            <div class="card-body overflow-y-scroll overlay-hidden" style="max-height:325px;">


                                <?php $ketQuery = "SELECT * FROM tabel_info,tabel_info_gambar WHERE tabel_info.id_info = tabel_info_gambar.id_info ORDER BY tabel_info.id_info DESC";

                                $executeSat = mysqli_query($koneksi, $ketQuery);

                                while ($a = mysqli_fetch_array($executeSat)) {

                                ?>

                                <div class="d-flex justify-content-start align-items-center mb-1">

                                    <img src="../img/info/<?php echo $a['gambar']; ?>" class="img-thumbnail mr-2"

                                        width="100" />

                                    <div class="user-page-info">

                                        <h3 class="font-medium-1"><?php echo $a['judul']; ?></h3>

                                        <p class="font-small-1"><?php echo $a['subjudul']; ?></p>

                                        <hr class="my-1" />

                                        <a href="?menu=read" class="badge badge-danger rounded-0" style="text-decoration:none">
                                            
                                            <i class="fab fa-readme"></i>
                                            
                                            ...read...
                                        
                                        </a>

                                    </div>

                                </div>

                                <hr class="my-1" />

                                <?php } ?>

                            </div>

                        </div>

                    </div>

                    <div class="col-lg-9 col-md-12 col-sm-12 col-12">

                        <div class="divider">

                            <div class="divider-text  bg-transparent">

                                <h3 class="mb-3 display-4 pt-2 text-uppercase"> Produk </h3>

                            </div>

                        </div>

                        <!-- centered-slides swiper option-1 start -->

                        <section id="component-swiper-centered-slides">
                            <div class="card shadow-none">
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="swiper-centered-slides swiper-container">
                                            <div class="swiper-wrapper">
                                                <?php error_reporting(0);
                                                $kueri = "SELECT * FROM tabel_kategori_barang ORDER BY nm_kategori";
                                                $result = mysqli_query($koneksi, $kueri);
                                                while ($produk = mysqli_fetch_array($result)) {
                                                    $kd_kategori = $produk['kd_kategori'];
                                                    $nm_kategori = $produk['nm_kategori'];
                                                    // print_r($produk);
                                                ?>
                                                <button class="swiper-slide rounded swiper-shadow p-1"
                                                    style="border-color: transparent !important;"
                                                    onclick="pilihKategori(`<?php echo $kd_kategori ?>`,`<?php echo $nm_kategori ?>`)">

                                                    <img class="card-img img-fluid" style="height:40px;"
                                                        src="../img/kategori/<?php echo $produk['ikon_kategori']; ?>">
                                                    <div class="swiper-text pt-md-1 pt-sm-25">
                                                        <?php echo $produk['nm_kategori']; ?></div>
                                                </button>
                                                <!-- <a href="?menu=barang&nm_kategori=<?php echo $produk['nm_kategori']; ?>" class="swiper-slide rounded swiper-shadow"> 
<i class="feather icon-gitlab font-large-1"></i>
<div class="swiper-text pt-md-1 pt-sm-50"><?php echo $produk['nm_kategori']; ?></div>
</a> -->
                                                <?php } ?>
                                            </div>
                                            <!-- Add Arrows -->
                                            <div class="swiper-button-next"></div>
                                            <div class="swiper-button-prev"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card">
                                <div class="card-body">
                                    <input type="text" id="nama-toko" hidden value="<?php echo $a['nm_toko']; ?>">
                                    <div id="produk"></div>
                                    <div id="all-produk">
                                        <div class="row mt-1 pr-0 pl-0">
                                            <?php $query = "SELECT * FROM `tabel_barang` INNER JOIN tabel_barang_gambar INNER JOIN tabel_stok_toko WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang";
                                            $result = mysqli_query($koneksi, $query);
                                            while ($produk = mysqli_fetch_array($result)) {
                                                $gambars = $produk['gambar'];
                                                $gambars = explode(",", $gambars);
                                                $kdToko = $produk['kd_toko'];
                                                $stok = $produk['stok'];
                                                $kd_barang = $produk['kd_barang'];
                                                $toko = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_toko WHERE kd_toko = $kdToko"));

                                            ?><!--------------------------------------------------SCRIPT---------------------------------------->
                                      
                               <div class="col-lg-6 col-md-12 col-sm-12 col-6">
                                 <a href="index.php?menu=detail&kd_barang=<?php echo $produk['kd_barang']; ?>">
                                   <div class="swiper-slide rounded swiper-shadow">
                                     <div class="card border-0">
                                       <div class="card-content">
                                        <input type="hidden" name="id_user" id="id_user" value="<?= $_SESSION['id_user'] ?>"
                                        <input type="hidden" name="kd_barang" id="kd_barang" value="<?= $kd_barang ?> ">
                                        <input type="hidden" name="kd_toko" id="kd_toko" value="<?= $toko['kd_toko'] ?> ">
                                        <img class="card-img img-fluid" src="../img/produk/<?php echo $gambars[0]; ?>" 
                                            style="width:480px !important; height: 480px !important">
 											<div class="card-img-overlay overflow-hidden">
                                               <h4 class="card-title mt-0 pt-0">
                                                 <!--<img src="../img/logo.png" class="img-left float-left" width="35">-->
                                                  <?php if ($produk['diskon'] != null) { ?>
                                                     <div class="product-image">
                                                       <span class="onsale-section">
                                                         <span class="onsale"><?php echo $produk['diskon']; ?>%<br>OFF
                                                         </span></span>
                                                     </div>
													 <?php }   ?>
                                                 </h4>
                                                </div>
                                                <img src="../img/icon/cod.png" class="item-img p-1 float-right" width="125">
                                                <hr>
                                               <a href="#" class="font-medium-3 text-dark text-bold-500 text-decoration-none">
                                               <sup>Rp.</sup><?php echo number_format($produk['hrg_jual'], 2, ",", "."); ?></a>
                                              <p class="item-company">
                                                 <?php echo $produk['nm_barang']; ?></span></p>
                                             <span class="font-small-2">
											    <?php if ($stok == 0) { 
												echo "Stok Habis"; } else if ($stok < 50) { 
												echo "Stok Akan Habis"; } else if ($stok > 50) {
												echo "Stok Masih Banyak";  } ?></span>
                                              <?php if ($stok >= 250) { ?>
                                              <div class="progress progress-bar-primary mt-1 mb-0">
                                                 <div class="progress-bar" role="progressbar" style="width:90%" aria-valuenow="80"
                                                aria-valuemin="0" aria-valuemax="100"></div></div>
											 <?php } else if ($stok < 250 && $stok >= 50) { ?>
                                                <div class="progress progress-bar-warning mt-1 mb-0">
                                                   <div class="progress-bar" role="progressbar" style="width:50%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div></div>
                                             <?php } else if ($stok < 50 && $stok > 0) { ?>                                                <div class="progress progress-bar-danger mt-1 mb-0">
                                                  <div class="progress-bar" role="progressbar" style="width:30%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div></div>
                                             <?php } else { ?>
                                                <div class="progress progress-bar-secondary mt-1 mb-0">
                                                   <div class=" progress-bar" role="progressbar" style="width:100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div></div>
											<?php } ?>
                                            <div class="d-flex justify-content-between mt-2">
                                              <div class="float-left">
                                               <div class="d-flex text-left">
                                                <p class="badge badge-sm badge-info rounded">by&nbsp<?php echo $toko['nm_toko'] ?></p>
                                             </div>
                                           </div>
                                          <div class="float-right">
                                            <div class="d-flex text-center">
                                               <button class="btn btn-sm btn-danger rounded-0 mb-1 font-small-1" name="submit" id="submit" onclick="add_keranjang(`<?php echo $stok ?>`,`<?php echo $kd_barang ?>`)"><i class="fas fa-shopping-cart"></i> BUY</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                     </div>
                                   </div></a>
                                 </div>                                            
                                            <?php  } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>



                    <!-- centered-slides swiper option-1 ends -->











                </div>



            </div>



        </div>

        </section>

    </div>

</div>

</div>



</div>

</div>

</div>

</div>

<style>
    div.sc::-webkit-scrollbar {
        width: 8px;
    }

    div.sc::-webkit-scrollbar-track {
        background: none;
    }

    div.sc::-webkit-scrollbar-thumb {
        background-image: linear-gradient(#56CCF2, #2F80ED);
        border-radius: 20px;
    }
</style>


<script type="text/javascript">

function add_keranjang(stok, kdbarang) {



    if (stok <= 0) {



        alert('stok habis')



    } else {



        $i = kdbarang



        $.ajax({



            type: "POST",



            url: "../aksi/add_keranjang.php",



            data: {



                kd_barang: $i,



                id_user: $("#id_user").val(),



                kd_toko: $("#kd_toko").val()



            },



            success: function(data) {



                // alert("Barang sudah ditambahkan ke Keranjang");



                window.location.href = "../page/index.php?menu=checkout";



            }







        });



    }







}


function pilihKategori(kd_kategori, nm_kategori) {



    var produk = document.getElementById('produk');



    $('#all-produk').remove();



    $('#judul_produk').val(nm_kategori);



    nm_toko = $('#nama-toko').val();



    $.ajax({



        type: "GET",



        url: '../aksi/produk_kategori.php?key=' + kd_kategori + '&nama_toko=' + nm_toko,



        dataType: "html",



        async: false,



        success: function(text) {



            produk.innerHTML = text;



        }



    });



}

</script>