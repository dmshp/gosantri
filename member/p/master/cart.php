<?php
// error_reporting(0);
$idUser = isset($_SESSION['id_user']) ? $_SESSION['id_user'] : '';
$akses = isset($_SESSION['akses']) ? $_SESSION['akses'] : '';

?>

<div class="card mt-2">
  <div class="card-content">
    <div class="divider">
      <div class="divider-text">Keranjang Belanja</div>
    </div>
    <div class="card-body">
      <form action="#" class="icons-tab-steps wizard-circle">
        <!-- Step 1 -->
        <h6><i class="step-icon fa-solid fa-cart-arrow-down"></i> Keranjang</h6>
        <hr>
        <fieldset class="checkout-step-1 px-0">
          <section id="place-order" class="list-view product-checkout">
            <div class="checkout-items">
              <!---------------------------WHILE PRODUK----------------------------->
              <div class="card ecommerce-card">
                <div class="card-content">
                  <?php
                  // error_reporting(0);
                  $kodekategori = '';
                  $kodemerchant = '';

                  $kd_barang = $_GET['kd_barang'];
                  $jumlah_comment = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(comment) FROM tabel_comment_barang"));
                  $jml_rating_query = mysqli_query($koneksi, "SELECT case when rating is null then '0' else ROUND(AVG(rating),1) end as averageRating FROM tabel_ulasan_barang WHERE kd_barang='$kd_barang'");
                  $jml_rating_row = mysqli_fetch_array($jml_rating_query);
                  $jml_rating = isset($jml_rating_row['averageRating']) ? $jml_rating_row['averageRating'] : 0;

                  $ketQuery = "SELECT * FROM tabel_barang,tabel_barang_gambar,tabel_stok_toko WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang AND tabel_barang.kd_barang = '$kd_barang' ";
                  $executeSat = mysqli_query($koneksi, $ketQuery);
                  while ($d = mysqli_fetch_array($executeSat)) {

                    $stok = $d['stok'];
                    $fotoProduk = explode(",", $d['gambar']);
                    $harga = $d['hrg_jual'];
                    $nm_barang = $d['nm_barang'];
                    $kodekategori = $d['kd_kategori'];
                    $kodemerchant = $d['kd_merchant'];
                    ?>
                  <input type="hidden" name="nama_barang" id="nama_barang"
                    value="<?php echo strtoupper($d['nm_barang']); ?> [<?php echo strtoupper($d['kd_barang']); ?>]"
                    readonly>
                  <input type="hidden" name="id_user" id="id_user" value="<?= $idUser ?>" readonly>
                  <input type="hidden" name="id_merchant" id="id_merchant" value="<?php echo $d['kd_merchant'] ?>"
                    readonly>
                  <input type="hidden" name="kd_barang" id="kd_barang" value="<?php echo $d['kd_barang']; ?>" readonly>
                  <input type="hidden" name="nm_barang" id="nm_barang" value="<?php echo $d['nm_barang']; ?>" readonly>
                  <input type="hidden" name="kd_toko" id="kd_toko" value="<?= $d['kd_toko'] ?>" readonly>
                  <input type="hidden" name="jml_rating" id="jml_rating" value="<?php echo $jml_rating ?>" readonly>


                  <div class="row">
                    <div class="col-6">
                      <a href="#" data-toggle="modal" data-target="#imagemodal">
                        <img class="img-fluid img-thumbnail" src="images/produk/<?php echo $fotoProduk[0]; ?>">
                        <div class="card-img-overlay overflow-hidden overlay-lighten-3">
                          <!-- <h4 class="card-title badge badge-up badge-danger mr-2 mt-2 round">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                  </h4> -->
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
                            $diskon = ($d['hrg_jual'] * $d['diskon']) / 100;
                            $harga = $harga - $diskon;
                            ?>
                            <h1 class="mb-0 text-center text-success border-bottom-primary border-2 round font-weight-bold">
                              <sup class="font-medium-2 text-muted">Rp. </sup>
                              <?php echo number_format($harga, 0, ",", "."); ?>
                            </h1>

                            <p class="text-muted text-center font-medium-1"><del>Rp.
                                <?php echo number_format($d['hrg_jual'], 0, ",", "."); ?>
                              </del></p>
                          <?php } else { ?>
                            <h1 class="mb-0 text-center text-success border-bottom-primary border-2 round font-weight-bold">
                              <sup class="font-medium-2 text-muted">Rp. </sup>
                              <?php echo number_format($harga, 0, ",", "."); ?>
                            </h1>
                          <?php } ?>
                          <hr class="my-1">
                          <strong>Stock</strong>
                          <!--------STATUS STOK---------------------------->
                          <div class="progress progress-bar-danger mb-0">
                            <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="15"
                              aria-valuemax="100" style="width:15%" aria-describedby="example-caption-2"></div>
                          </div>
                          <!--------STATUS STOK---------------------------->
                        </div>
                      </div>
                    </div>
                  <?php } ?>
                  <div class="row">
                    <div class="col-12">
                      <hr class="my-1">
                      <div class="d-flex justify-content-between">
                        <div class="float-left">
                          <div class="input-group quantity-counter-wrapper">
                            <input type="text" class="quantity-counter" value="1">
                          </div>
                        </div>
                        <div class="float-right">
                          <a href="" class="badge round border-primary wishlist remove-wishlist">
                            <i class="feather icon-x align-middle"></i> Remove
                          </a>
                          <a href="" class="badge round border-primary cart remove-wishlist">
                            <i class="fa fa-heart-o mr-25"></i> Simpan
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr class="my-1">
              <!---------------------------WHILE PRODUK----------------------------->
            </div>
            <div class="checkout-options">
              <div class="card border-primary rounded-0 p-1 text-dark">
                <input type="hidden" id="total_berat">
                <div class="price-details text-uppercase font-weight-bold">
                  <h3>Price Details</h3>
                </div>
                <div class="detail">
                  <div class="detail-title">
                    <p>Subtotal </p>
                  </div>
                  <div class="detail-amt text-right">
                    <p id="total_harga">Rp.0</p>
                  </div>
                </div>
                <div class="detail">
                  <div class="detail-title">Diskon</div>
                  <div class="detail-amt discount-amt text-right">
                    <input type="number" name="diskon" id="diskon" hidden>
                    <p id="disc">Rp.000</p>
                  </div>
                </div>
                <hr>
                <div class="detail">
                  <div class="detail-title detail-total">Total</div>
                  <div class="detail-amt total-amt text-right font-weight-bold">
                    <p id="total_final">Rp. 000</p>
                  </div>
                </div>
              </div>
          </section>
        </fieldset>



        <!-- Step 2 -->
        <h6><i class="step-icon fa-solid fa-map-location-dot"></i> Alamat</h6>
        <fieldset>

          <?php
          // Ambil alamat dari database
          $query_comment = "SELECT * FROM tabel_member WHERE id_user = '$idUser' ";
          $hasil = mysqli_query($koneksi, $query_comment);
          if ($hasil) {
            while ($row = mysqli_fetch_assoc($hasil)) {
              $idUser = $row['id_user']; // Menetapkan nilai $idUser dari hasil query
              $alamat = $row['alamat_user']; // Mengambil alamat dari hasil query
              ?>
              <hr>
              <label for="alamat">Alamat Pofile Anda</label>
              <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat; ?>" readonly>
              <?php
            }
          } else {
            // Handle error jika query tidak berhasil
            echo "Error: " . mysqli_error($koneksi);
          }
          ?>

          <!-- Form input untuk mengubah alamat -->
          <div class="form-group">
            <br>
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan alamat baru"
              value="<?php echo $alamat; ?>">
          </div>

        </fieldset>

        <!-- Step 3 -->
        <h6><i class="step-icon fa-solid fa-wallet"></i> Pembayaran</h6>
        <fieldset>
          <div class="form-group">
            <label for="gambar">Upload Bukti Pembayaran Produk</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar">
          </div>
          <div id="gambar-preview" class="my-3"></div>
        </fieldset>

        <script>
          $(document).ready(function () {
            // Ketika pengguna memilih gambar
            $('#gambar').change(function () {
              // Ambil file gambar yang dipilih
              var file = $(this)[0].files[0];

              // Buat objek URL untuk gambar yang dipilih
              var imageUrl = URL.createObjectURL(file);

              // Tampilkan gambar yang dipilih di div dengan id gambar-preview
              $('#gambar-preview').html('<img src="' + imageUrl + '" class="img-fluid" width="200">');
            });
          });
        </script>