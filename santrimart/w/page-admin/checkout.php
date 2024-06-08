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
                  <?php echo $_SESSION['akses']; ?>
              </h3>
              <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php?menu=home" class="text-dark">Home</a>
                  </li>
                  <li class="breadcrumb-item"><a href="#" class="text-dark">Checkout</a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
        $idUser = $user['id_user'];
        $kdBarang = $_GET['kd_barang'];
        $saldo = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(jumlah) FROM tabel_saldo WHERE id_user = $idUser "));
        $pengeluaran = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(pengeluaran) FROM tabel_saldo WHERE id_user = $idUser "));
        $sisa_saldo = $saldo[0] - $pengeluaran[0];
        ?>

      <div class="content-body">
        <!-- Form wizard with icon tabs section start -->
        <section id="icon-tabs">
          <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="icons-tab-steps wizard-circle">

                        <!-- Step 1 -->
                        <h6><i class="step-icon fas fa-luggage-cart"></i> Keranjang</h6>
                        <fieldset class="checkout-step-1 px-0">
                          <section id="place-order" class="list-view product-checkout">

                            <div class="checkout-items">
                                <?php error_reporting(0);
                                  $Que = "SELECT DISTINCT nm_barang, berat,gambar,hrg_jual,stok,id_brg,nm_toko,diskon FROM keranjang,tabel_toko, tabel_barang_gambar, tabel_barang, tabel_stok_toko WHERE  keranjang.id_member = '$idUser' AND keranjang.kd_toko = tabel_toko.kd_toko  AND tabel_barang_gambar.id_brg = keranjang.kd_barang AND tabel_barang.kd_barang = keranjang.kd_barang AND tabel_stok_toko.kd_barang = keranjang.kd_barang ";
                                  $executeSat = mysqli_query($koneksi, $Que);
                                  $no = 0; $total_berat = 0;
                                  while ($d = mysqli_fetch_array($executeSat)) {
                                      $no++;
																			$total_berat = (int)$d['berat'] + (int)$total_berat;
                                      $stok_awal = (int)$d['stok'] - (int)$sisa_stok[0];
                                      $e = explode(",", $d['gambar']);
                                      $diskon = 0;
                                      if ($d['diskon']!=null) {
                                        $diskon = ($d['hrg_jual']*$d['diskon'])/100;
                                      }
                                      $r = $d['hrg_jual']-$diskon;
                                      $kdToko = $d['nm_toko'];
                                      $barang[] = $d['id_brg'];
                                  ?>
                                <?php
                                      $nomorFaktur = "ONN";
                                      $nama_member_upper = strtoupper(substr($d['nm_toko'], 0, 3));
                                      $nomorFaktur .= $nama_member_upper;
                                      $query_tabel_penjualan = "SELECT * FROM `tabel_penjualan` WHERE `no_faktur_penjualan` LIKE '%$nama_member_upper%'";
                                      $hasil_tabel_penjualan = mysqli_query($koneksi, $query_tabel_penjualan);
                                      $old_faktur = "";
                                      $new_faktur = "";
                                      while ($h = mysqli_fetch_array($hasil_tabel_penjualan)) {
                                          $old_faktur = $h['no_faktur_penjualan'];
                                      }

                                      // no faktur + urutan
                                      if ($old_faktur == null) {
                                          $new_faktur .= "00001";
                                      } else {
                                          $old_faktur = substr($old_faktur, strlen($old_faktur) - 5) + 1;
                                          $nol = 5 - strlen($old_faktur);
                                          while ($nol > 0) {
                                              $new_faktur .= '0';
                                              $nol--;
                                          }
                                          $new_faktur = $new_faktur . $old_faktur;
                                      }

                                      // print_r($new_faktur);
                                      $nomorFaktur .= $new_faktur;
                                      // print_r($nomorFaktur);
                                      ?>
                                <?php $faktur_beli = "BELI";
                                      $query_member = "SELECT * FROM `tabel_member` WHERE `id_user` = '$idUser'";
                                      $hasil_member = mysqli_fetch_array(mysqli_query($koneksi, $query_member));
                                      $member_upper = strtoupper(substr($hasil_member['nm_user'], 0, 3));
                                      // no faktur + nama toko
                                      $faktur_beli .= $member_upper;

                                      $query_tabel_pembelian = "SELECT * FROM `tabel_pembelian` WHERE `no_faktur_pembelian` LIKE '%$member_upper%'";
                                      $hasil_tabel_pembelian = mysqli_query($koneksi, $query_tabel_pembelian);
                                      $faktur_lama = "";
                                      $faktur_baru = "";
                                      while ($j = mysqli_fetch_array($hasil_tabel_pembelian)) {
                                          $faktur_lama = $j['no_faktur_pembelian'];
                                          // print_r($faktur_lama);
                                      }

                                      if ($faktur_lama == null) {
                                          $faktur_baru .= "00001";
                                      } else {
                                          $faktur_lama = substr($faktur_lama, strlen($faktur_lama) - 5) + 1;
                                          $noll = 5 - strlen($faktur_lama);
                                          while ($noll > 0) {
                                              $faktur_baru .= '0';
                                              $noll--;
                                          }
                                          $faktur_baru = $faktur_baru . $faktur_lama;
                                      }

                                      // print_r($new_faktur);
                                      $faktur_beli .= $faktur_baru;
                                      ?>
                                <div class="card ecommerce-card">
                                  <div class="card-content ">
                                    <div class="item-img text-center">
                                      <a href="index.php?menu=detail">
                                        <input type="text" name="kd_barang[]"
                                            value="<?= $d['id_brg'] ?>" hidden>
                                        <img src="../img/produk/<?php echo $e[0] ?>"
                                            width="90%" height="90%">
                                      </a>
                                    </div>

                                    <div class="card-body ">
                                      <div class="coupons-title mb-1">
                                        <input type="text" name="fakturJual" id="fakturJual"
                                            value="<?php echo $nomorFaktur; ?> " hidden>
                                        <input type="text" name="fakturBeli" id="fakturBeli"
                                            value="<?php echo $faktur_beli; ?>" hidden>
                                        <input type="text" name="nama_barang"
                                            value="<?php echo $d['nm_barang'] ?>" hidden>

                                        <p id="barang"> <?php echo $d['nm_barang'] ?></p>
                                      </div>
                                      <div class="item-name">
                                          <a href="index.php?menu=detail"></a>
                                          <input type="text" id="total-diskon-<?= $no ?>"
                                              value="<?= $diskon ?>" hidden>
                                          <input type="text" id="total-stok-<?= $no ?>"
                                              value="<?= $stok_awal ?>" hidden>
                                          <input type="text" id="total-harga-<?= $no ?>"
                                              name="total-harga[]"
                                              value="<?php echo $d['hrg_jual'] ?>" hidden>
                                          <p class="stock-status-in">

                                          <p id="stok_total-<?= $no ?>">
                                              <?php echo $stok_awal ?>
                                          </p>

                                          </p>
                                      </div>
                                      <div class="item-quantity">
                                          <p class="quantity-title">
                                          <div
                                              class="input-group quantity-counter-wrapper ">
                                              <input type="text" name="quantity[]"
                                                  class="quantity-counter"
                                                  id="quantity-<?= $no ?>"
                                                  onchange="cek_jumlah(<?= $no ?>)"
                                                  value="1">
                                          </div>
                                          </p>
                                      </div>
                                    </div>
                                    <div class="item-options text-center">
                                        <div class="item-wrapper">
                                            <div class="item-rating">
                                                <div class="badge badge-primary badge-md">
                                                    4 <i class="feather icon-star ml-25"></i>
                                                </div>
                                            </div>
                                            <div class="item-cost">
                                                <h6 class="item-price">
                                                    <input name="harga" type="number"
                                                        value="<?= $d['hrg_jual'] ?>"
                                                        id="harga-<?= $no ?>" hidden>
                                                    Rp.<?php echo $d['hrg_jual']; ?>
                                                </h6>
                                                <p class="shipping">
                                                    <i class="feather icon-shopping-cart"></i>
                                                    Free Shipping
                                                </p>
                                            </div>
                                        </div>
                                        <div class="wishlist ">
                                            <button class=" remove-wishlist btn-block"
                                                style="border: none;background-color: transparent;"
                                                onclick="hapus(`<?php echo $idUser ?>`,`<?php echo $d['id_brg'] ?>`)"><i
                                                    class="feather icon-x align-middle">&nbsp
                                                    REMOVE</i></button>
                                        </div>
                                        <div class="cart remove-wishlist rounded-0 "
                                            onclick="">
                                            <i class="fa fa-heart-o mr-25"></i> Wishlist
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                <?php } ?>
                            </div>

                            <div class="checkout-options">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="card-body">
                                            <hr>
																						<input type="hidden" id="total_berat" value="<?= $total_berat ?>">
                                            <div class="price-details">
                                                <p>Price Details</p>
                                            </div>
                                            <div class="detail">
                                                <div class="detail-title">
                                                    <p>Subtotal </p>
                                                </div>
                                                <div class="detail-amt">
                                                    <p id="total_harga">
                                                        Rp.0</p>
                                                </div>
                                            </div>
                                            <div class="detail">
                                                <div class="detail-title">
                                                    Diskon
                                                </div>
                                                <div class="detail-amt discount-amt">
                                                    <input type="number" name="diskon" id="diskon"
                                                        value="<?= $diskon ?>" hidden>
                                                    <p id="disc"> Rp.<?php echo $diskon; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="detail">
                                                <div class="detail-title detail-total">Total
                                                </div>
                                                <div class="detail-amt total-amt">
                                                    <p id="total_final">
                                                        Rp. <?php echo $r; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                          </section>
                        </fieldset>

                        <!-- Step 2 -->
                        <h6><i class="step-icon fas fa-map-marker-alt"></i> Pengiriman</h6>
                        <fieldset>

                            <section id="checkout-address" class="list-view product-checkout">
															<?php include('checkout_address.php'); ?>
                            </section>
                        </fieldset>

                        <!-- Step 3 -->
                        <h6><i class="step-icon fas fa-credit-card"></i> Pembayaran</h6>
                        <fieldset>
                            <section id="checkout-payment" class="list-view product-checkout">
																<?php include('checkout_payment.php'); ?>
                            </section>
                        </fieldset>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </section>
        <!-- Form wizard with icon tabs section end -->
      </div>


      <!-- Modal Kirim Transfer -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog">
              <form enctype="multipart/form-data">

                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Transfer</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"
                              aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <h5>Transfer Ke :<h5>
                                  <hr>
                                  </hr>
                                  <p></p>
                                  <h4>Santri Mart</h4>
                                  <h4>010231029301292</h4>
                                  <h4>BRI</h4>
                                  <hr>
                                  </hr>
                                  <input type="file" id="sub" name="gambar" multiple
                                      accept="i mage/png, image/jpeg"></input>

                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary uploadBukti">Save
                              changes</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>


      <!-- Modal Success -->
      <div class="modal fade" id="modalSukses" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Upload Bukti Transfer</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <p class="text-center">Transaksi Sukses</p>

                  </div>

              </div>
          </div>
      </div>
    </div>
  </div>
  <script type="text/javascript">
$(document).ready(function() {
		cek_total()
});

function hapus(idUser, id_brg) {
    $.ajax({
        type: "POST",
        url: "../aksi/remove_checkout.php",
        data: {
            kd_barang: id_brg,
            id_user: idUser,
        },
        success: function(data) {}
    });
}

function cek_jumlah(id) {
    var total_stok = document.getElementById("total-stok-" + id).value;
    var total_diskon = document.getElementById("total-diskon-" + id).value;
    var jumlah = document.getElementById("quantity-" + id).value;
    // stok
    stok_akhir = total_stok - jumlah
    $("#stok_total-" + id).text(stok_akhir);
    // harga
    var harga = document.getElementById("harga-" + id).value;
    var total_harga = document.getElementById("total-harga-" + id);
    var total = jumlah * (harga - total_diskon);
    $("#total-harga-" + id).val(total);

		cek_total()
}

function cek_total() {
    var input = document.getElementsByName("total-harga[]");
    var diskon = $("#diskon").val();
    var totalall = 0;
    for (var i = 0; i < input.length; i++) {
        totalall += parseInt(input[i].value);
    }
    var subtotal = totalall;
    totalall = totalall-diskon;

    $("#total_harga").text("Rp." + subtotal);
    $("#harga_barang").val(totalall);
    $("#harga_semua").text("Rp." + totalall);
    $("#harga_semua").val(totalall);
    $("#total_final").text("Rp." + totalall);
		$("#total_harga_alamat").text("Rp." + totalall);

    var biaya_kirim = $("#biaya_kirim").val();
    var total_all = totalall + parseInt(biaya_kirim)
    $("#total_penjualan").val(total_all);
    $("#harga_final").text("Rp." + total_all);
    $("#harga_final_alamat").text("Rp." + total_all);
}


$(document).ready(function() {
	$('.simpanData').click(function() {
		if($("#alamat_saya").val() == 0){
			Swal.fire(
				'Alamat',
				'Alamat belum ditambah',
				'error'
			)
			return false;
		}else if ($("#latitude_user").length == 0){
			Swal.fire(
				'Alamat',
				'Alamat Utama belum dipilih',
				'error'
			)
			return false;
		}

		var kd_barang = $("input[name='kd_barang[]']")
				.map(function() {
							return $(this).val();
					}).get();
		var quantity = $("input[name='quantity[]']")
				.map(function() {
							return $(this).val();
					}).get();
					submit(kd_barang, quantity);
	});
	$(".actions.clearfix li:nth-child(3)").remove();
});
function submit(kd_barang, quantity) {
		const pembayaran = $("input[name='pembayaran']:checked").val();
		if(pembayaran == undefined){
			Swal.fire(
				'Pembayaran',
				'Pembayaran belum dipilih',
				'error'
			)
			return false;
		}
		
		const jarak = $("#jarak").val();
		const durasi = $("#durasi").val();
		const latitude_user = $("#latitude_user").val();
		const longitude_user = $("#longitude_user").val();
		const latlng = latitude_user + "," +longitude_user
		const alamat = $("#alamat_checkout").html();
		const fak = $("#fakturJual").val();
		const biaya_kirim = $("#biaya_kirim").val();
		const harga_barang = $("#harga_barang").val();
		const total_penjualan = $("#total_penjualan").val();
		const fakBeli = $("#fakturBeli").val();

		$.ajax({
				url: "../aksi/add_checkout.php",
				type: "post",
				data: {
						jarak: jarak,
						durasi: durasi,
						cara_bayar: pembayaran,
						kd_barang: kd_barang,
						quantity: quantity,
						alamat: alamat,
						latlng: latlng,
						faktur_jual: fak,
						faktur_beli: fakBeli,
						biaya_kirim: biaya_kirim,
						harga_barang: harga_barang,
						total_penjualan: total_penjualan
				},
				success: function(data) {
					if(data == ""){
						Swal.fire(
							'Checkout',
							'Checkout Berhasil',
							'success'
						)
						setTimeout('location.href=`../page/index.php?menu=history`', 1);
					}else{
						Swal.fire(
							'Checkout',
							data,
							'error'
						)
					}
				}
		})
}
  </script>

  <!-- END: Content-->