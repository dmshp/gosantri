<?php include "../inc/koneksi.php";
$a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_toko")); 
?>


<style type="text/css">
    
    .nama-user{
      font-size: 12px;
      animation: blink-animation 1s steps(3, start) infinite;
      -webkit-animation: blink-animation 1s steps(3, start) infinite;
    }

    .text-user{
      color: #df0a0a;
      animation: blink-animation 1s steps(3, start) infinite;
      -webkit-animation: blink-animation 1s steps(3, start) infinite;
    }

    @keyframes blink-animation {
      to {
        visibility: hidden;
      }
    }

    @-webkit-keyframes blink-animation {
      to {
        visibility: hidden;
      }
    }

</style>


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row" style="display: none;">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h4 class="content-header-title float-left mb-0 text-dark text-capitalize">
                            <?php echo $_SESSION['akses']; ?></h4>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php?menu=home" class="text-dark"><?php echo $_SESSION['nm_user']; ?></a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>				
            </div>			
        </div>
		
        <div class="content-body">
            <div id="user-profile">

                <!-- BEGIN: Main Content -->
                <div class="card-content text-white" id="home">
                    <div class="card-body text-center">
                        <div class="row pl-1 pr-1 pt-5 mt-3">
                            <div class="col-lg-8 col-md-12 col-sm-12">
                                <div class="card pt-0 mt-2 shadow-none" style="background:none">
                                    <div id="carousel-example-caption" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel-example-caption" data-slide-to="0" class="active"></li>
                                            <li data-target="#carousel-example-caption" data-slide-to="1"></li>
                                        </ol>
                                        <div class="carousel-inner shadow-none" role="listbox">
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
                                        </div>
                                        <a class="carousel-control-prev" href="#carousel-example-caption" role="button"
                                            data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carousel-example-caption" role="button"
                                            data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-sm-12">
                                <div class="col-md-12 col-sm-12">
                                    <div class="card pt-0 mt-2 shadow-none" style="background:none; height: 70%;">
                                        <div id="carousel-contoh" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <li data-target="#carousel-contoh" data-slide-to="0" class="active"></li>
                                                <li data-target="#carousel-contoh" data-slide-to="1"></li>
                                                <li data-target="#carousel-contoh" data-slide-to="2"></li>
                                            </ol>
                                            <div class="carousel-inner" role="listbox">
                                                <div class="carousel-item active">
                                                    <img class="img-fluid rounded" src="../img/iklan/slide-2.png">
                                                </div>

                                                <div class="carousel-item">
                                                    <img class="img-fluid rounded" src="../img/iklan/slide-3.jpg">
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="img-fluid rounded" src="../img/iklan/slide-4.jpg">
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carousel-contoh" role="button"
                                                data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carousel-contoh" role="button"
                                                data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="card pt-0 mt-2 shadow-none" style="background:none; height: 70%;">
                                        <div>
                                            <img class="img-fluid rounded" src="../img/iklan/promo-ovo.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Main Content -->


                <?php  $idUser = $_SESSION['id_user'];
                   $saldo = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(jumlah) FROM tabel_saldo WHERE id_user = $idUser "));

                   $pengeluaran = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(pengeluaran) FROM tabel_saldo WHERE id_user = $idUser "));

                   $sisa_saldo = $saldo[0] - $pengeluaran[0];
                ?>


                <!-- ----------- HALAMAN SIDEBARE MENU --------------- -->
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
	   
	   
                <!-- ----------- DAFTAR PRODUK TERBARU  --------------- -->
                <section id="component-swiper-multiple">
                    <div class="card">
                        <div class="divider">
                    		<div class="divider-text bg-transparent mt-0">                                
                    			<h4 class="mb-3 display-5 pt-1 text-uppercase"> Terbaru</h4>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="swiper-multiple swiper-container">
                                    <div class="swiper-wrapper">
                                        <?php $query = "SELECT * FROM `tabel_barang` INNER JOIN tabel_barang_gambar INNER JOIN tabel_stok_toko WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang ORDER BY tabel_barang.kd_barang DESC limit 6";
                                            $result = mysqli_query($koneksi, $query);
                                            while ($produk = mysqli_fetch_array($result)) {
                                            $gambars = $produk['gambar'];
                                            $gambars = explode(",", $gambars);
                                            $kdToko = $produk['kd_toko'];
                                            $stok = $produk['stok'];
                                            $kd_barang = $produk['kd_barang'];
                                            $toko = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_toko WHERE kd_toko = $kdToko"));
                                        ?>                 
                        				<div class="swiper-slide"> 
                        					<a href="index.php?menu=detail&kd_barang=<?php echo $produk['kd_barang']; ?>"><img class="img-fluid" src="../img/produk/<?php echo $gambars[0]; ?>"></a>
                                        </div>
                                                 <?php }   ?>        
                                                            
                                    </div>
                                    <!-- Add Pagination -->
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Multiple Slides Per View swiper ends -->   
	   
                </div>

                    <div class="col-lg-9 col-md-12 col-sm-12 col-12">
                    	<div class="divider">
                    		<div class="divider-text bg-transparent mt-0">                                
                    			<h3 class="mb-1 display-5 pt-0 text-uppercase"> Kategori</h3>
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
                                                <button class="swiper-slide rounded p-0 border-0" 
                                                  onclick="pilihKategori(`<?php echo $kd_kategori ?>`,`<?php echo $nm_kategori ?>`)">
                                					<div class="avatar mr-0 avatar-xl">
                                                        <img src="../img/kategori/<?php echo $produk['ikon_kategori']; ?>">
                                					</div>
                                                    <div class="swiper-text pt-md-1 pt-sm-25">
                                                      <?php echo $produk['nm_kategori']; ?>
                                                          
                                                    </div>
                                                </button>
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
                                    <input type="hidden" id="nama-toko" readonly value="<?php echo $a['nm_toko']; ?>">
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
                                            ?>
                                            <!------------------- SCRIPT ------------------>
                                      
                                            <div class="col-lg-4 col-md-12 col-sm-12 col-6">
                                                <a href="index.php?menu=detail&kd_barang=<?php echo $produk['kd_barang']; ?>">
                                                    <div class="swiper-slide rounded swiper-shadow">
                                                        <div class="card border-0">
                                                            <div class="card-content">
                                                            <input type="hidden" name="id_user" id="id_user" value="<?= $_SESSION['id_user'] ?>">
                                                            <input type="hidden" name="kd_barang" id="kd_barang" value="<?= $kd_barang ?> ">
                                                            <input type="hidden" name="kd_toko" id="kd_toko" value="<?= $toko['kd_toko'] ?> ">
                                                            <img class="card-img img-fluid" src="../img/produk/<?php echo $gambars[0]; ?>" 
                                                                style="">
                										   
                 											    <div class="card-img-overlay overflow-hidden">
                                                                    <h4 class="card-title mt-0 pt-0">
                                                                 <!-- <img src="../img/logo.png" class="img-left float-left" width="35"> -->
                                                                        <?php if ($produk['diskon'] != null) { ?>
                                                                        <div class="product-image">
                                                                            <span class="onsale-section">
                                                                                <span class="onsale"><?php echo $produk['diskon']; ?>%<br>OFF
                                                                                </span>
                                                                            </span>
                                                                        </div>
                													    <?php }   ?>
                                                                    </h4>
                                                                </div>
                                                                <img src="../img/icon/cod.png" class="item-img p-1 float-right" width="125">
                                                                <hr>
                                                                <a href="#" class="font-medium-3 text-dark text-bold-600 text-decoration-none">
                                                                    <sup>Rp.</sup><?php echo number_format($produk['hrg_jual'], 2, ",", "."); ?>
                                                                </a>
                                                                <p class="item-company">
                                                                    <?php echo strtoupper($produk['nm_barang']); ?>
                                                                </p>

                                                                <?php if ($stok == 0) { ?>
                                                                    <span class="font-small-2">
                                                                        Stock Habis
                                                                    </span>
                                                                <?php } else if ($stok < 50) { ?>
                                                                    <span class="font-small-2 nama-user" style="color: #e1950c;">
                                                                        Stock Akan Habis
                                                                    </span>
                                                                <?php } else if ($stok > 50) { ?>
                                                                    <span class="font-small-2">
                                                                        Stock Masih Banyak
                                                                    </span>
                                                                <?php } ?>

                                                                <?php if ($stok >= 250) { ?>
                                                                <div class="progress progress-bar-primary mt-1 mb-0">
                                                                    <div class="progress-bar" role="progressbar" style="width:90%" aria-valuenow="80"
                                                                    aria-valuemin="0" aria-valuemax="100">
                                                                    </div>
                                                                </div>
                    											<?php } else if ($stok < 250 && $stok >= 50) { ?>
                                                                <div class="progress progress-bar-warning mt-1 mb-0">
                                                                    <div class="progress-bar" role="progressbar" style="width:50%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                                                    </div>
                                                                </div>
                                                                <?php } else if ($stok < 50 && $stok > 0) { ?>
                                                                <div class="progress progress-bar-danger mt-1 mb-0">
                                                                    <div class="progress-bar" role="progressbar" style="width:30%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                                                    </div>
                                                                </div>
                                                                <?php } else { ?>
                                                                <div class="progress progress-bar-secondary mt-1 mb-0">
                                                                    <div class=" progress-bar" role="progressbar" style="width:100%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                                                    </div>
                                                                </div>
                    											<?php } ?>
                                                                <div class="d-flex justify-content-between mt-2">
                                                                    <div class="float-left">
                                                                        <div class="d-flex text-left">
                                                                            <p class="badge badge-sm badge-info rounded">by&nbsp<?php echo $toko['nm_toko'] ?></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="float-right">
                                                                        <div class="d-flex text-center">
                                                                            <button class="btn btn-sm btn-danger rounded-0 mb-1 p-1 font-small-1" name="submit" id="submit" onclick="add_keranjang(`<?php echo $stok ?>`,`<?php echo $kd_barang ?>`)">
                                                                                <i class="fas fa-shopping-cart"></i> BUY
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                            <?php  } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                

                </div>



            </div>



        </div>

        <!-- </section> -->

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