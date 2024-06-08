
<div class="checkout-items">
		<?php error_reporting(0);
			$Que = "SELECT DISTINCT COUNT(keranjang.id) cart, nm_barang,gambar,hrg_jual,stok,id_brg,nm_toko FROM keranjang,tabel_toko, tabel_barang_gambar, tabel_barang, tabel_stok_toko WHERE  keranjang.id_member = '$idUser' AND keranjang.kd_toko = tabel_toko.kd_toko  AND tabel_barang_gambar.id_brg = keranjang.kd_barang AND tabel_barang.kd_barang = keranjang.kd_barang AND tabel_stok_toko.kd_barang = keranjang.kd_barang ";
			$executeSat = mysqli_query($koneksi, $Que);
			$no = 0;
			while ($d = mysqli_fetch_array($executeSat)) {
					$no++;
					$stok_awal = (int)$d['stok'] - (int)$sisa_stok[0];
					$e = explode(",", $d['gambar']);
					$r = $d['hrg_jual'];
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
												width="200px" height="200px" style="border-radius:2px;">
								</a>
						</div>

						<div class="card-body ">
								<div class="coupons-title mb-1">
										<input type="text" name="fakturJual"
												id="fakturJual"
												value="<?php echo $nomorFaktur; ?> " hidden>
										<input type="text" name="fakturBeli"
												id="fakturBeli"
												value="<?php echo $faktur_beli; ?>" hidden>
										<input type="text" name="nama_barang"
												value="<?php echo $d['nm_barang'] ?>" hidden>

										<p id="barang"> <?php echo $d['nm_barang'] ?></p>
								</div>
								<div class="item-name">
										<a href="index.php?menu=detail"></a>
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
								<div class="price-details">
										<p>Price Details</p>
								</div>
								<div class="detail">
										<div class="detail-title">
												<p>Total </p>
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
														value="<?= $d['diskon'] ?>" hidden>
												<p id="disc"> Rp.0<?php echo $d['diskon']; ?>
												</p>
										</div>
								</div>
								<hr>
								<div class="detail">
										<div class="detail-title detail-total">Total
										</div>
										<div class="detail-amt total-amt">
												<p id="total_final">
														Rp.<?php echo $d['hrg_jual']; ?></p>
										</div>
								</div>
						</div>
				</div>
		</div>
</div>

<script>
$(document).ready(function() {
	
  // checkout quantity counter
  var quantityCounter = $(".quantity-counter"),
    CounterMin = 1,
    CounterMax = 25;
  if (quantityCounter.length > 0) {
    quantityCounter.TouchSpin({
      min: CounterMin,
      max: CounterMax
    }).on('touchspin.on.startdownspin', function () {
      var $this = $(this);
      $('.bootstrap-touchspin-up').removeClass("disabled-max-min");
      if ($this.val() == 1) {
        $(this).siblings().find('.bootstrap-touchspin-down').addClass("disabled-max-min");
      }
    }).on('touchspin.on.startupspin', function () {
      var $this = $(this);
      $('.bootstrap-touchspin-down').removeClass("disabled-max-min");
      if ($this.val() == CounterMax) {
        $(this).siblings().find('.bootstrap-touchspin-up').addClass("disabled-max-min");
      }
    });
  }

  // remove items from wishlist page
  $(".remove-wishlist , .move-cart").on("click", function () {
    $(this).closest(".ecommerce-card").remove();
  })

    var input = document.getElementsByName("total-harga[]");
    var totalall = 0;
    for (var i = 0; i < input.length; i++) {
        totalall += parseInt(input[i].value);
    }
    $("#total_harga").text("Rp." + totalall);
    $("#total_final").text("Rp." + totalall);

    $("#harga_barang").val(totalall);
    $("#harga_semua").text("Rp." + totalall);
    $("#harga_semua").val(totalall);
    var total_penjualan = document.getElementById("biaya_kirim").value;
    var total_all = totalall + parseInt(total_penjualan)
    $("#total_penjualan").val(total_all);
    $("#harga_final").text("Rp." + total_all);
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
    var jumlah = document.getElementById("quantity-" + id).value;
    // stok
    stok_akhir = total_stok - jumlah
    $("#stok_total-" + id).text(stok_akhir);
    // harga
    var harga = document.getElementById("harga-" + id).value;
    var total_harga = document.getElementById("total-harga-" + id);
    var total = jumlah * harga;
    $("#total-harga-" + id).val(total);

    var input = document.getElementsByName("total-harga[]");
    var totalall = 0;
    for (var i = 0; i < input.length; i++) {
        totalall += parseInt(input[i].value);
    }

    $("#total_harga").text("Rp." + totalall);
    $("#harga_barang").val(totalall);
    $("#harga_semua").text("Rp." + totalall);
    $("#total_final").text("Rp." + totalall);

    var total_penjualan = document.getElementById("biaya_kirim").value;
    var total_all = totalall + parseInt(total_penjualan)
    $("#total_penjualan").val(total_all);
    $("#harga_final").text("Rp." + total_all);
}
</script>