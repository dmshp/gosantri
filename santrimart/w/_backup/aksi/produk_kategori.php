<?php
session_start();
include '../inc/koneksi.php';

$kd_kategori = $_GET['key'];
$nama_toko = $_GET['nama_toko'];
?>



<div class="row">

    <?php

    $query = "SELECT * FROM `tabel_barang` INNER JOIN tabel_barang_gambar INNER JOIN tabel_stok_toko WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang AND tabel_barang.kd_kategori = '$kd_kategori'";

    $result = mysqli_query($koneksi, $query);

    while ($produk = mysqli_fetch_array($result)) {

        $gambars = $produk['gambar'];

        $gambars = explode(",", $gambars);

        $kdToko = $produk['kd_toko'];

        $stok = $produk['stok'];

        $kd_barang = $produk['kd_barang'];

        $toko = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_toko WHERE kd_toko = $kdToko"));

    ?>

    <!--------------------------------------------------SCRIPT---------------------------------------->
                             
                              <div class="col-lg-4 col-md-6 col-sm-12 col-6"> 
                              <a href="index.php?menu=detail&kd_barang=<?php echo $produk['kd_barang']; ?>">  
                               <div class="swiper-slide rounded swiper-shadow">
                                <div class="card border-0">
                                    <div class="card-content">
                                    <input type="hidden" name="id_user" id="id_user" value="<?= $_SESSION['id_user'] ?>">
                                    <input type="hidden" name="kd_barang" id="kd_barang" value="<?= $kd_barang ?> ">
                                    <input type="hidden" name="kd_toko" id="kd_toko" value="<?= $toko['kd_toko'] ?> ">
                                        
                                        <img class="card-img img-fluid" src="../img/produk/<?php echo $gambars[0]; ?>" style="max-height:150px">
                                        <div class="card-img-overlay overflow-hidden">
                                            <h4 class="card-title mt-0 pt-0">
                                                <!--<img src="../img/logo.png" class="img-left float-left" width="35">-->
                                                <?php if ($produk['diskon'] != null) { ?>
                                                <div class="product-image">
                                                  <span class="onsale-section">
                                                  <span class="onsale"><?php echo $produk['diskon']; ?>%<br>OFF</span></span>
                                                </div>                  
                                                <?php } else {  ?>
                                                                        
                                                <?php  } ?>                                                
                                            </h4>
                                            </div> 
                                            <img src="../img/icon/cod.png" class="item-img p-1 float-right" width="125"><hr>
                                            <a href="#" class="font-medium-3 text-dark text-bold-500 text-decoration-none"><sup>Rp.</sup><?php echo number_format($produk['hrg_jual'], 2, ",", "."); ?></a>
                                        	<p class="item-company"><?php echo $produk['nm_barang']; ?></span></p>
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
                                                <div class="float-right">                                                
                                                    <div class="d-flex text-center">
                                                     <a href="index.php?menu=checkout&kd_barang=<?php echo $produk['kd_barang']; ?>" class="btn btn-sm btn-danger rounded-0 mb-1 font-small-1" onclick="add_keranjang(`<?php echo $stok ?>`,`<?php echo $kd_barang ?>`)"><i class="fas fa-shopping-cart"></i> BUY</a>
                                                        
                                                    </div>  
                                                </div>                           
                                            </div>
                                        </div>
                                    </div>
                                </div></a>
                              </div> 
<!--------------------------------------------------SCRIPT---------------------------------------->
    
    
    
    

    <?php

    }

    ?>

</div>

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

                alert("Barang sudah ditambahkan ke Keranjang");



            }



        });

    }



}

</script>