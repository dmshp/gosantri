<!-- <link rel="stylesheet" href="https://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.rating.css"> -->

<?php 
    // error_reporting(0);
    $idUser = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : '';
    $akses  = isset($_SESSION['akses']) ? $_SESSION['akses'] : '';

    // var_dump($idUser);
    // var_dump($akses); die();
 ?>       

<style type="text/css">
    
    .border-bottom-dark {
        border-bottom: 1px solid #717274 !important;
    }
</style>


<!-- BEGIN: Content-->
<div class="app-content content">
  <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top pt-2">
                    <div class="col-12">
                        <h3 class="content-header-title float-left mb-0 text-dark text-capitalize" style="padding-top:.3rem">
                            <?php echo $akses; ?>
                        </h3>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php?menu=home" class="text-dark">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="index.php?menu=produk" class="text-dark">Produk</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#" class="text-dark">Details</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
           <div class="form-group breadcrum-right"></div>
        </div>
      </div>
     <?php 
        // error_reporting(0);
        $kd_barang = $_GET['kd_barang'];
        $jumlah_comment = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(comment) FROM tabel_comment_barang"));
        $jml_rating = mysqli_fetch_array(mysqli_query($koneksi, "SELECT case when rating is null then '0' else ROUND(AVG(rating),1) end as averageRating FROM tabel_ulasan_barang WHERE kd_barang='$kd_barang';")); // var_dump($jml_rating['averageRating']); die();
        $ketQuery = "SELECT * FROM tabel_barang,tabel_barang_gambar,tabel_stok_toko WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang AND tabel_barang.kd_barang = '$kd_barang' ";
        $executeSat = mysqli_query($koneksi, $ketQuery);
        while ($d = mysqli_fetch_array($executeSat)) {
            
            $stok = $d['stok'];
            $fotoProduk =  explode(",", $d['gambar']);
            $harga = $d['hrg_jual'];
            $nm_barang = $d['nm_barang'];
        ?>
        <div class="content-body">
            <!-- app ecommerce details start -->
            <section class="app-ecommerce-details">
                <div class="card ">
                    <div class="card-body">
                      <div class="row mb-5 mt-2">
                        <div class="col-12 col-md-5 d-flex justify-content-center mb-2 mb-md-0">
                          <div class="">
                             <img src="../img/produk/<?php echo $fotoProduk[0]; ?>" class="img-fluid">
                         </div>
                         <div class="card-img-overlay overflow-hidden" style="margin-right: 10px;">
                            <h4 class="card-title mt-0 pt-0">
                                <!--<img src="w/img/logo.png" class="img-left float-left" width="35">-->
                                <?php 
                                if ($d['diskon'] != null) { 
                                    $diskon = ($d['hrg_jual']*$d['diskon'])/100;
                                    $harga = $harga - $diskon;
                                ?>
                                <div class="product-image">
                                  <span class="onsale-section">
                                  <span class="onsale"><?php echo $d['diskon']; ?>%<br>OFF</span></span>
                                </div> 
                                <?php } else {  ?>  
                                <?php  } ?> 
                            </h4>
                        </div> 
                       </div>
                     <div class="col-12 col-md-6">
                        <input type="hidden" name="nama_barang" id="nama_barang" value="<?php echo strtoupper($d['nm_barang']); ?> [<?php echo strtoupper($d['kd_barang']); ?>]" readonly>
                        <h1><strong><?php echo $d['nm_barang']; ?></strong></h1>
                            <p class="text-dark">by <?php echo $toko; ?></p>
                                <div class="ecommerce-details-price d-flex flex-wrap">
                                    <p class="text-primary display-4 mr-1 mb-0">
                                        <?php 
                                        if ($d['diskon'] != null) { 
                                            echo "<span class='price-normal detail'><sup>Rp.</sup>".$d['hrg_jual']."</span>&nbsp; ";
                                        }?>
                                        <strong><sup>Rp.</sup><?php echo number_format($harga, 0, ",", "."); ?></strong>
                                    </p>
                                    <div class="rating"></div> &nbsp;
                                    <span class="ml-50 text-dark font-medium-1">
                                        <?php echo $jml_rating['averageRating']?> ratings
                                    </span>
                                </div>
                                <hr>
                                <p><?php echo $d['deskripsi']; ?></p>
                                <p class="font-weight-bold mb-25"> <i class="fas fa-truck-moving mr-50 font-medium-2"></i>
                                    Pengiriman
                                </p>
                                <hr>
                                <p>Available - <span class="text-success">In stock</span></p>
                                <input type="hidden" name="id_user" id="id_user" value="<?= $idUser ?>" readonly>
                                <input type="hidden" name="id_merchant" id="id_merchant" value="<?php echo $d['kd_merchant'] ?>" readonly>
                                <input type="hidden" name="kd_barang" id="kd_barang" value="<?php echo $d['kd_barang']; ?>" readonly>
                                <input type="hidden" name="nm_barang" id="nm_barang" value="<?php echo $d['nm_barang']; ?>" readonly>
                                <input type="hidden" name="kd_toko" id="kd_toko" value="<?= $d['kd_toko'] ?>" readonly>
                                <input type="hidden" name="jml_rating" id="jml_rating" value="<?php echo $jml_rating['averageRating']?>" readonly>
                                <div class="row">
                                    <?php if ($akses == 'member') {?>
                                    <div class="btn-group">
                                        <a onclick="add_keranjang(`<?php echo $stok ?>`,`<?php echo $d['kd_barang'] ?>`,`<?php echo $d['kd_toko'] ?>`,`<?php echo $idUser ?>`)"
                                            class=" btn btn-info rounded-0">
                                            <i class="fas fa-luggage-cart"></i> BUY</a>
                                        <a  onClick="chat_merchant()" href="single_chat.php?id=<?php echo $d['kd_merchant'] ?>" class="btn btn-info rounded-0 ml-1">
                                            <i class="far fa-comment-dots"></i> CHAT</a>
                                    </div>
                                    <?php } ?>
                                </div>
                                <div class="divider">
                                    <div class="divider-text">
                                       <h3 class="font-medium-1 text-uppercase"><i class="fas fa-share-alt"></i> Share</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <?php 
                                        $url2    = "http://localhost/santrimart/w/detail_produk.php?kd_barang=".$kd_barang;
                                        $url     = "https://santrimart.co.id/w/detail_produk.php?kd_barang=".$kd_barang;
                                        $message = strtoupper($nm_barang) .", Hanya Rp. ".$harga . ", Ayo buruan cek sekarang juga";
                                    ?>

                                    <div class="btn-group justify-content-center" style="margin-left: 20px;">
                                        <a href="https://facebook.com/sharer/sharer.php?u=<?php echo urlencode($url . $message) ?>" class="mr-1 text-info" target="_blank" title="Share on Facebook">
                                            <i class="fab fa-facebook-square fa-2x"></i>
                                        </a>
                                        <a href="https://twitter.com/intent/tweet/?text=<?php echo urlencode($message) ?>&amp;url=<?php echo urlencode($url) ?>" class="mr-1 text-info" target="_blank" title="Share on Twitter">
                                            <i class="fab fa-twitter-square fa-2x"></i>
                                        </a>
                                        <!-- <a href="" class="mr-1 text-info" target="_blank">
                                            <i class="fab fa-instagram-square fa-2x"></i>
                                        </a> -->
                                        <a href="https://api.whatsapp.com/send?phone=&text=<?php echo urlencode($message) ?>%20<?php echo urlencode($url) ?>" class="mr-1 text-info" target="_blank" title="Share on WhatApp">
                                            <i class="fab fa-whatsapp-square fa-2x"></i>
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="divider">
                                    <div class="divider-text">
                                        <h3 class="font-medium-1 text-uppercase">Ulasan</h3>
                                    </div>
                                    <?php error_reporting(0);
                                        $kd_barang = $_GET['kd_barang'];
                                        $query_ulasan = "SELECT a.id, a.no_faktur_pembelian, c.nm_user, a.kd_barang, a.rating, a.keterangan FROM tabel_ulasan_barang a
                                            INNER JOIN tabel_pembelian b ON a.no_faktur_pembelian = b.no_faktur_pembelian
                                            INNER JOIN tabel_member c ON b.id_user = c.id_user WHERE a.kd_barang = '$kd_barang' ";
                                        $hasil = mysqli_query($koneksi, $query_ulasan);
                                        while ($ulas = mysqli_fetch_array($hasil)) {
                                    ?>
                                    <div class="d-flex justify-content-start align-items-center mb-1 border-bottom-dark">
                                        <input type="hidden" name="jml_rating_det" id="jml_rating_det" readonly value="<?php echo $ulas['rating'] ?>">
                                        <div class="user-page-info ml-1">
                                            <h5 style="text-align: start"><?php echo substr($ulas['nm_user'],0,2) ?>***</h5>
                                            <p><?php echo $ulas['keterangan'] ?></p>
                                        </div>
                                        <div class="ml-auto cursor-pointer">
                                            <div class="rating-detil"></div>
                                        </div>
                                    </div>

                                    <?php
                                        echo "<script type='text/javascript'>
                                            $(document).ready(function() {

                                                var jml_rating = $('#jml_rating').val();
                                                $('.rating-detil').starRating({
                                                    initialRating: jml_rating,
                                                    strokeColor: '#894A00',
                                                    strokeWidth: 10,
                                                    starSize: 20
                                                });

                                            })
                                        </script>";
                                    ?>

                                    <?php } ?>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <div class="avatar mr-1">
                                                <img src="../img/<?php echo $logo; ?>" height="45" width="45">
                                            </div>
                                            <div class="user-page-info">
                                                <h6 class="mb-0"><?php echo $toko; ?></h6>
                                            </div>
                                        </div>
                                       <div class="d-flex justify-content-start align-items-center mb-1">
                                            <div class="d-flex align-items-center">
                                                <i class="feather icon-heart font-medium-2 mr-50"></i>
                                                <!-- <span>276</span> -->
                                            </div>
                                            <p class="ml-auto d-flex align-items-center"> Total Kometar &nbsp;
                                                <i class="feather icon-message-square font-medium-2 mr-50"></i><?php echo $jumlah_comment[0] ?>
                                            </p>
                                        </div>
                                        <?php if ($akses == 'member') {?>
                                        <fieldset class="form-label-group mt-3 mb-50">
                                            <textarea class="form-control" id="comment" rows="3"
                                                placeholder="Add Comment"></textarea>
                                            <label for="label-textarea2">Add Comment</label>
                                        </fieldset>
                                        <button type="button" class="btn btn-info rounded-0 mt-1 waves-effect waves-light mb-4"
                                            onclick="add_comment(`<?php echo $d['kd_barang'] ?>`,`<?php echo $idUser ?>`)">Post Comment
                                        </button>
                                        <?php } ?>
                                        <p for="label-textarea2 mt-6">Komentar Dari Pelanggan</p>
                                        <?php error_reporting(0);
                                            $kd_barang = $_GET['kd_barang'];
                                            $query_comment = "SELECT * FROM tabel_comment_barang, tabel_member WHERE id_member=id_user and id_brg = '$kd_barang' ";
                                            $hasil = mysqli_query($koneksi, $query_comment);
                                            while ($comment = mysqli_fetch_array($hasil)) {
                                                if ($comment['foto']!='') {
                                                    $images = $comment['foto'];
                                                } else {
                                                    $images = 'user.jpg';
                                                }
                                        ?>
                                        <div class="d-flex justify-content-start align-items-center mb-1 border-bottom-dark">
                                            <div class="avatar mr-50">
                                                <img src="../img/user/<?php echo $images; ?>" height="30" width="30">
                                            </div>
                                            <div class="user-page-info ml-1">
                                                <h5 class=""><?php echo substr($comment['nm_user'],0,2) ?>***</h5>
                                                <p><?php echo $comment['comment'] ?></p>
                                            </div>
                                            <div class="ml-auto cursor-pointer">
                                                <i class="feather icon-heart mr-50"></i>
                                                <i class="feather icon-message-square"></i>
                                            </div>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>







                    <div class="card-body">
                        <div class="divider">
                            <div class="divider-text">
                                <h3 class="font-large-1 text-uppercase">Produk Lainnya</h3>
                            </div>
                        </div>
                        <div class="swiper-responsive-breakpoints swiper-container">
                            <div id="produk_lain" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <div class="row mt-1 pr-0 pl-0">   
                                           <?php
                                            $query = "SELECT * FROM `tabel_barang` INNER JOIN tabel_barang_gambar INNER JOIN tabel_stok_toko WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang";

                                            $result = mysqli_query($koneksi, $query);
                                            while ($produk = mysqli_fetch_array($result)) {
                                                $gambars = $produk['gambar'];
                                                $gambars = explode(",", $gambars);
												$stok = $produk['stok'];
                                            ?>



                                            <!--------------------------------------------------SCRIPT---------------------------------------->

                              <div class="col-lg-3 col-md-6 col-sm-12 col-6"> 
                              <a href="index.php?menu=detail&kd_barang=<?php echo $produk['kd_barang']; ?>">
                               <div class="swiper-slide rounded swiper-shadow">
                                <div class="card p-1">
                                    <div class="card-content">
                                        <img class="card-img img-fluid" src="../img/produk/<?php echo $gambars[0]; ?>" style="max-height:200px">

                                        <div class="card-img-overlay overflow-hidden">
                                            <h4 class="card-title mt-0 pt-0">
                                                <!--<img src="w/img/logo.png" class="img-left float-left" width="35">-->
                                                <?php if ($produk['diskon'] != null) { ?>
                                                <div class="product-image">
                                                  <span class="onsale-section">
                                                  <span class="onsale"><?php echo $produk['diskon']; ?>%<br>OFF</span></span>
                                                </div> 
                                                <?php } else {  ?>  
                                                <?php  } ?> 
                                            </h4>
                                            </div> 
                                            <img src="../img/icon/cod.png" class="item-img p-1 float-right" width="150">
                                            <a href="#" class="font-medium-3 text-dark text-bold-500 text-decoration-none"><sup>Rp.</sup><?php echo number_format($produk['hrg_jual'], 2, ",", "."); ?></a>
                                        	<p class="item-company"><?php echo $produk['nm_barang']; ?></span></p>
                                            	<span class="font-small-2">
											    <?php if ($stok == 0) { 
												echo "Stok Habis"; } else if ($stok < 50) { 
												echo "Stok Akan Habis"; } else if ($stok > 50) {
												echo "Stok Masih Banyak";  } ?></span>
                                              <?php if ($stok >= 250) { ?>
                                              <div class="progress progress-bar-primary mt-1 mb-0">
                                                 <div class="progress-bar" role="progressbar" style="width:90%" aria-valuenow="80"aria-valuemin="0" aria-valuemax="100"></div></div>
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
                                                    <p class="badge badge-sm badge-info rounded">by <?php echo $a['nm_toko']; ?></p>

                                                 </div> 
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                              </div>  

    <!--------------------------------------------------SCRIPT---------------------------------------->


                                            <?php } ?>
                                        </div>
                                    </div>







                                    <div class="carousel-item">



                                        <div class="row">
                                            <?php

                                            $query = "SELECT * FROM `tabel_barang` INNER JOIN tabel_barang_gambar INNER JOIN tabel_stok_toko WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang";

                                            $result = mysqli_query($koneksi, $query);
                                            while ($produk = mysqli_fetch_array($result)) {
                                                $gambars = $produk['gambar'];
                                                $gambars = explode(",", $gambars);
                                            ?>



                                            <!--------------------------------------------------SCRIPT---------------------------------------->

                              <div class="col-lg-3 col-md-6 col-sm-12 col-6"> 
                              <a href="index.php?menu=detail&kd_barang=<?php echo $produk['kd_barang']; ?>">
                               <div class="swiper-slide rounded swiper-shadow">
                                <div class="card p-1">
                                    <div class="card-content">
                                        <img class="card-img img-fluid" src="../img/produk/<?php echo $gambars[0]; ?>" style="max-height:200px">

                                        <div class="card-img-overlay overflow-hidden">
                                            <h4 class="card-title mt-0 pt-0">
                                                <!--<img src="w/img/logo.png" class="img-left float-left" width="35">-->
                                                <?php if ($produk['diskon'] != null) { ?>
                                                <div class="product-image">
                                                  <span class="onsale-section">
                                                  <span class="onsale"><?php echo $produk['diskon']; ?>%<br>OFF</span></span>
                                                </div> 
                                                <?php } else {  ?>  
                                                <?php  } ?> 
                                            </h4>
                                            </div> 
                                            <img src="../img/icon/cod.png" class="item-img p-1 float-right" width="150">
                                            <a href="#" class="font-medium-3 text-dark text-bold-500 text-decoration-none"><sup>Rp.</sup><?php echo number_format($produk['hrg_jual'], 2, ",", "."); ?></a>
                                        	<p class="item-company"><?php echo $produk['nm_barang']; ?></span></p>
                                            	<span class="font-small-2">
											    <?php if ($stok == 0) { 
												echo "Stok Habis"; } else if ($stok < 50) { 
												echo "Stok Akan Habis"; } else if ($stok > 50) {
												echo "Stok Masih Banyak";  } ?></span>
                                              <?php if ($stok >= 250) { ?>
                                              <div class="progress progress-bar-primary mt-1 mb-0">
                                                 <div class="progress-bar" role="progressbar" style="width:90%" aria-valuenow="80"aria-valuemin="0" aria-valuemax="100"></div></div>
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
                                                    <p class="badge badge-sm badge-info rounded">by <?php echo $a['nm_toko']; ?></p>

                                                 </div> 
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                              </div>  

    <!--------------------------------------------------SCRIPT---------------------------------------->

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

<script type="text/javascript">

    $(document).ready(function() {

        var jml_rating = $('#jml_rating_det').val();
        $(".rating").starRating({
            initialRating: jml_rating,
            strokeColor: '#894A00',
            strokeWidth: 10,
            starSize: 25
        });

    })

    function chat_merchant() {
        var idSender = $("#id_user").val();
        var idReceiver = $("#id_merchant").val();
        var chatp = $('#nama_barang').val();
        if(chatp != ""){
            $.ajax({
                url: "add_chat_member.php",
                type: "post",
                data: {
                    idSender: idSender,
                    idReceiver: idReceiver,
                    // photo: photo,
                    chatp: chatp
                },
                success: function(data) {
                    document.getElementById("chat-input").value = "";
                }
            })
        }       
    }



    function add_comment(idbarang, nama) {
        $.ajax({
            type: "POST",
            url: "../aksi/add_comment_barang.php",
            data: {
                idbarang: idbarang,
                nama: nama,
                comment: $("#comment").val()
            },

            success: function(data) {
                // alert("Barang sudah ditambahkan ke Keranjang");
                alert(data);
                location.reload();
            }
        });
    }

</script>
<script type="text/javascript">

function add_keranjang(stok, kdbarang, kdToko, idUser) {
    // console.log(stok, kdToko, kdbarang, idUser);
    if (stok <= 0) {
        alert('stok habis')
    } else {
        $.ajax({
            type: "POST",
            url: "../aksi/add_keranjang.php",
            data: {
                kd_barang: kdbarang,
                id_user: idUser,
                kd_toko: kdToko
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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<!-- <script data-require="jquery@*" data-semver="2.1.3" src="http://code.jquery.com/jquery-2.1.3.min.js"></script> -->
<!-- <script src="https://jquery-star-rating-plugin.googlecode.com/svn/trunk/jquery.rating.js"></script> -->



<!-- END: Content-->