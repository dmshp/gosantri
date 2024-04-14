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
                  <div class="row">
                    <div class="col-5">
                      <div class="item-img text-center">
                        <a href="?menu=product">
                          <img src="images/produk/1.jpg" class="img-fluid" width="100%">
                        </a>
                      </div>
                    </div>
                    <div class="col-7">
                      <div class="card-body mt-0 pt-0">
                        <div class="item-name">
                          <a href="?menu=product">Ini nama produk yang bagus sekali</a>
                          <p class="item-company font-small-1">By <span class="company-name">Nama Toko</span></p>
                        </div>
                      </div>
                    </div>

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
            <input type="text" class="form-control" id="alamat" name="alamat"
              value="<?php echo $alamat; ?>" readonly>
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
          Sama seperti sebelumnya
        </fieldset>
      </form>
    </div>
  </div>
</div>