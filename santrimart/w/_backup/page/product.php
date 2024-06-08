
<?php 
    // error_reporting(0);
    $idUser = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : '';
    $akses  = isset($_SESSION['akses']) ? $_SESSION['akses'] : '';

 ?>  
<!-- BEGIN: Content-->   
     <div class="card mt-2">
       <div class="card-body p-1">
		    <div class="divider">
			    <div class="divider-text">Product</div>
		    </div>
            <!-- Detail Produk -->
            <?php 
            // error_reporting(0);
            $kodekategori = '';
            $kodemerchant = '';

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
                $kodekategori = $d['kd_kategori'];
                $kodemerchant = $d['kd_merchant'];
            ?>
                    <input type="hidden" name="nama_barang" id="nama_barang" value="<?php echo strtoupper($d['nm_barang']); ?> [<?php echo strtoupper($d['kd_barang']); ?>]" readonly>
                    <input type="hidden" name="id_user" id="id_user" value="<?= $idUser ?>" readonly>
                    <input type="hidden" name="id_merchant" id="id_merchant" value="<?php echo $d['kd_merchant'] ?>" readonly>
                    <input type="hidden" name="kd_barang" id="kd_barang" value="<?php echo $d['kd_barang']; ?>" readonly>
                    <input type="hidden" name="nm_barang" id="nm_barang" value="<?php echo $d['nm_barang']; ?>" readonly>
                    <input type="hidden" name="kd_toko" id="kd_toko" value="<?= $d['kd_toko'] ?>" readonly>
                    <input type="hidden" name="jml_rating" id="jml_rating" value="<?php echo $jml_rating['averageRating']?>" readonly>


                    <div class="row">           
                        <div class="col-6">
                             <a href="#" data-toggle="modal" data-target="#imagemodal">
                                <img class="img-fluid img-thumbnail" src="../img/produk/<?php echo $fotoProduk[0]; ?>">
                                  <div class="card-img-overlay overflow-hidden overlay-lighten-3">
                                    <h4 class="card-title badge badge-up badge-danger mr-2 mt-2 round">
                                        <i class="fa-solid fa-magnifying-glass-plus"></i></h4>
                                  </div>
                              </a>
                        </div>    
                        <div class="col-6">                
                            <div class="text-center mt-1">  
                               <span class="font-small-3">
                                   <i class="feather icon-star text-warning"></i>
                                   <i class="feather icon-star text-warning"></i>
                                   <i class="feather icon-star text-warning"></i>
                                   <i class="feather icon-star text-warning"></i>
                                   <i class="feather icon-star text-secondary"></i>
                                </span>
                            </div>
                            <div class="text-center mt-1">
                                <?php 
                                if ($d['diskon'] != null) { 
                                    $diskon = ($d['hrg_jual']*$d['diskon'])/100;
                                    $harga = $harga - $diskon;
                                ?>
                                <h1 class="mb-0 text-center text-success border-bottom-primary border-2 round font-weight-bold"><sup class="font-medium-2 text-muted">Rp. </sup><?php echo number_format($harga, 0, ",", "."); ?></h1>
                                
                                <p class="text-muted text-center font-medium-1"><del>Rp. <?php echo number_format($d['hrg_jual'], 0, ",", "."); ?></del></p>
                                <?php } else {  ?>  
                                <h1 class="mb-0 text-center text-success border-bottom-primary border-2 round font-weight-bold"><sup class="font-medium-2 text-muted">Rp. </sup><?php echo number_format($harga, 0, ",", "."); ?></h1>
                                <?php  } ?> 
                                <hr class="my-1">
                                
                                <strong>Stock</strong>
                            <!--------STATUS STOK---------------------------->        
                              <div class="progress progress-bar-danger mb-0">
                                <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="15" aria-valuemax="100" style="width:15%" aria-describedby="example-caption-2"></div>
                              </div>       
                           <!--------STATUS STOK---------------------------->
                                         
                            </div>
                        </div> 
                        <div class="col-12">
                            <div class="text-center mt-2"> 
                                 <a href="?menu=cart" class="badge badge-primary badge-md pr-1 pl-1 round">
                                     <i class="fa-solid fa-cart-arrow-down mr-1"></i><small>BELI</small></a>                     
                                 <a class="badge badge-info badge-md pr-1 pl-1 round" href="?menu=merchant">
                                     <i class="fa-solid fa-store mr-1"></i><small>CEK TOKO</small></a>
                                 <a class="badge badge-success badge-md pr-1 pl-1 round" href="?menu=schat">
                                     <i class="fa-regular fa-comment mr-1"></i><small>CHAT</small></a>
                            </div>
                            <h5 class="text-uppercase mb-0 mt-1"><?php echo $d['nm_barang']; ?></h5>
                            <p class="text-danger font-small-1">by <?php echo $toko; ?></p>
                            <p><?php echo $d['deskripsi']; ?></p>
                        </div>
                    </div>
                    <div class="item-features mt-0 pt-0">
                        <div class="row text-center">
                            <div class="col-4 col-md-4 mb-4 mb-md-0 ">
                               <div class="w-100 mx-auto">
                                  <i class="feather icon-award text-primary font-large-2"></i>
                                  <h5 class="mt-2 font-weight-bold font-small-2">Guaranteed</h5>
                               </div>
                            </div>
                            <div class="col-4 col-md-4 mb-4 mb-md-0">
                                <div class="w-100 mx-auto">
                                   <i class="feather icon-clock text-primary font-large-2"></i>
                                   <h5 class="mt-2 font-weight-bold font-small-2">Return</h5>
                                </div>
                            </div>
                            <div class="col-4 col-md-4 mb-4 mb-md-0">
                                <div class="w-100 mx-auto">
                                    <i class="feather icon-shield text-primary font-large-2"></i>
                                    <h5 class="mt-2 font-weight-bold font-small-2">Secured</h5>
                                </div>
                            </div>
                        </div>
                    </div>	

                    <div class="d-flex justify-content-start align-items-center mb-1">
                         <div class="d-flex align-items-center">
                           <i class="feather icon-heart font-medium-2 mr-50"></i><span class="mr-50">145</span>
                           <i class="feather icon-message-square font-medium-2 mr-50"></i><span>77</span>
                         </div>
                    </div>
                    <fieldset class="form-label-group mb-50">
                        <textarea class="form-control" id="comment" rows="3" placeholder="Add Comment"></textarea>
                        <label for="label-textarea">Add Comment</label>
                    </fieldset>
                   <button type="button" class="btn btn-sm btn-primary" onclick="add_comment(`<?php echo $d['kd_barang'] ?>`,`<?php echo $idUser ?>`)">Post Comment</button>

                    <?php 
                        $kd_barang = $_GET['kd_barang'];
                        $query_comment = "SELECT * FROM tabel_comment_barang, tabel_member WHERE id_member=id_user and id_brg = '$kd_barang' ";
                        $hasil = mysqli_query($koneksi, $query_comment);
                        while ($comment = mysqli_fetch_array($hasil)) {
                            if ($comment['foto']!='') {
                                $images = $comment['foto'];
                            } else {
                                $images = 'user.png';
                            }
                    ?>
                        <hr>
                        <div class="d-flex justify-content-start align-items-center mb-1">
                            <div class="avatar mr-50">
                              <img src="../img/user/<?php echo $images; ?>" alt="Avatar" height="30" width="30">
                            </div>
                            <div class="user-page-info">
                                <h6 class="mb-0"><?php echo substr($comment['nm_user'],0,2) ?>***</h6>
                                <span class="font-small-2"><?php echo $comment['comment'] ?></span>
                            </div>
                            <div class="ml-auto cursor-pointer">
                                <i class="feather icon-heart mr-50"></i>
                                <i class="feather icon-message-square"></i>
                            </div>
                        </div>  

                    <?php } ?>

            <?php } ?>
            <!-- End Detail Produk -->

<!-- Multiple Slides Per View swiper start -->
  <section id="component-swiper-multiple" class="border-top-secondary pt-1">
	<h5 class="font-medium-2">Produk Terkait</h5> 
	<p class="font-small-2">Orang-orang juga mencari <b>item</b> ini</p>
      <div class="card-content">
         <div class="swiper-multiple swiper-container">
            <div class="swiper-wrapper">
				<?php
                $query = "SELECT * FROM `tabel_barang` INNER JOIN tabel_barang_gambar INNER JOIN tabel_stok_toko WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang AND tabel_barang.kd_kategori='$kodekategori' and tabel_barang.kd_merchant='$kodemerchant'";

                $result = mysqli_query($koneksi, $query);
                while ($produk = mysqli_fetch_array($result)) {
                    $gambars = $produk['gambar'];
                    $gambars = explode(",", $gambars);
                    $stok = $produk['stok'];
                ?>
                   <div class="swiper-slide" style="margin: 0px"> 
                        <a href="?menu=produk&kd_barang=<?php echo $produk['kd_barang']; ?>">
                            <img class="img-fluid img-kecil" src="../img/produk/<?php echo $gambars[0]; ?>">
                            <p class="font-small-2"><?php echo $produk['nm_barang']; ?></p>
                        </a>
                   </div>

                <?php } ?>
				
             </div>
           <div class="swiper-pagination"></div>
         </div>
      </div>
   </section>
<!-- Multiple Slides Per View swiper ends -->               
	</div>
  </div>
    
<!-- app ecommerce details end -->

<!-----------=============MODAL IMAGE=============================------------------->
<div class="modal fade text-center" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg pt-5" role="document">
    <div class="modal-content rounded-0" style="opacity: 0.9">
       <div class="modal-header bg-transparent"> 
         <button type="button" class="close rounded-0" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">         
		  <div id="carousel-keyboard" class="carousel slide" data-keyboard="true">
            <ol class="carousel-indicators">
               <li data-target="#carousel-keyboard" data-slide-to="0" class="active"></li>
               <li data-target="#carousel-keyboard" data-slide-to="1"></li>
               <li data-target="#carousel-keyboard" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
               <div class="carousel-item active">
                 <img class="img-fluid" src="../img/produk/1.jpg">
               </div>
               <div class="carousel-item">
                   <img class="img-fluid" src="../img/produk/2.jpg">
               </div>
               <div class="carousel-item">
                   <img class="img-fluid" src="../img/produk/1.jpg">
               </div>
           </div>
           <a class="carousel-control-prev" href="#carousel-keyboard" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only"></span>
          </a>
          <a class="carousel-control-next" href="#carousel-keyboard" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only"></span>
          </a>
         </div> 
      </div>
	 <div class="modal-footer bg-transparent">
        <h4 class="modal-title" id="myModalLabel1">Ini nama produk yang bagus sekali</h4>
     </div>
    </div>
  </div>
</div>
<!-----------=============MODAL IMAGE=============================------------------->


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