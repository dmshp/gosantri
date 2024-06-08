<style type="text/css">
	.nama-user{
	    font-size: 12px;
	    animation: blink-animation 1s steps(3, start) infinite;
	    -webkit-animation: blink-animation 1s steps(3, start) infinite;
	}

	.text-user{
	    color: #86ff01;
	    animation: blink-animation 1s steps(3, start) infinite;
	    -webkit-animation: blink-animation 1s steps(3, start) infinite;
	    text-shadow: 0 0 5px #86ff01, 0 0 10px #86ff01, 0 0 20px #86ff01, 0 0 45px #86ff01, 0 0 40px #86ff01;
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

	.text-muted {
	    color: #ed0707 !important;
	}
</style>

<div class="payment-type">
	<div class="card collapse-icon accordion-icon-rotate">
			<div class="card-header flex-column align-items-start">
					<h4 class="card-title">Pembayaran</h4>
					<p class="text-muted mt-25 nama-user">Silahkan memilih metode pembayaran</p>
			</div>
			<div class="card-content">
				<div class="card-body">

					<div class="accordion-shadow collapse-bordered" id="accordionExample0">
								<?php
								$data = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(CASE WHEN arus=0 and status=1 THEN `nominal` END) as saldo, SUM(CASE WHEN (arus=1 and status=1) or (arus=1 and status=0 and no_faktur_pembelian='') THEN `nominal` END) as wd FROM `tabel_keuangan` WHERE `id_member`=$idUser"));
								$saldo = $data['saldo'] - $data['wd'];
								echo "<input type='hidden' value='$saldo' id='saldo'>";

								$ketQuery = "SELECT *, (SELECT COUNT(kd_pembayaran) FROM tabel_pembayaran where kd_kategori_pembayaran=tkp.kd_kategori_pembayaran and status = 0) as total FROM tabel_kategori_pembayaran as tkp order by urutan asc";
								$executeSat = mysqli_query($koneksi, $ketQuery);
								while ($b = mysqli_fetch_array($executeSat)) {
									if($b['total'] != 0){
								?>
								<div class="collapse-border-item collapse-header card collapse-bordered">
									<div class="card-header" id="heading200" data-toggle="collapse" role="button" data-target="#collapse<?= $b["kd_kategori_pembayaran"]; ?>" aria-expanded="false" aria-controls="collapse<?= $b["kd_kategori_pembayaran"]; ?>">
											<span class="lead collapse-title">
													<?= $b["nm_kategori_pembayaran"]; ?> <?= $b["kd_kategori_pembayaran"] == 2 ? '(Saldo : ' . number_format($saldo, 0, ",", ".") . ')' : '' ?>
											</span>
									</div>

									<div id="collapse<?= $b["kd_kategori_pembayaran"]; ?>" class="collapse" aria-labelledby="heading200" data-parent="#accordionExample0">
											<div class="card-body">
												<?php
												$ketQuery2 = "SELECT * FROM tabel_pembayaran where kd_kategori_pembayaran='$b[kd_kategori_pembayaran]' and status=0 order by urutan asc";
												$executeSat2 = mysqli_query($koneksi, $ketQuery2);
												while ($x = mysqli_fetch_array($executeSat2)) {
												?>
												<label class="mb-1 w-100">
													<input type="radio" name="pembayaran" value="<?= $x["kd_pembayaran"] ?>" kd_kategori_pembayaran="<?= $b['kd_kategori_pembayaran'] ?>" class="card-input-element d-none" id="pembayaran1">
													<div class="card card-body bg-white w-100 waves-effect waves-light d-block border-bottom" style="padding-top: 8px;">
														<div class="float-left align-items-center d-flex">
															<img src="../img/pembayaran/<?= $x["gambar"]; ?>" class="d-inline-block mr-2" witdh="30px" height="30px">
															<div class="d-inline-block">
																<div class="collapse-title"><?= $x["bank"]; ?></div>
																<div><?= $x["desc_pembayaran"]; ?></div>
															</div>
														</div>
														<i class="fas fa-check float-right mt-1 hidden"></i>
													</div>
												</label>
												<?php } ?>
											</div>
									</div>
									<!-- <div class="card-header" id="heading200" data-toggle="collapse" role="button" data-target="#collapse<?= $b["kd_kategori_pembayaran"]; ?>" aria-expanded="false" aria-controls="collapse<?= $b["kd_kategori_pembayaran"]; ?>">
											<span class="lead collapse-title">
													<?= $b["nm_kategori_pembayaran"]; ?> <?= $b["kd_kategori_pembayaran"] == 4 ? '(Saldo : ' . number_format($saldo, 0, ",", ".") . ')' : '' ?>
											</span>
									</div> -->
								</div>
								<?php }} ?>
					</div>
				</div>
			</div>
	</div>
</div>


<div class="amount-payable checkout-options">
	<div class="card">
			<div class="card-header">
					<h4 class="card-title">Detail Harga</h4>
			</div>
			<div class="card-content">
					<div class="card-body">

							<div class="detail">
									<div class="details-title">
											<p id="jumlah_barang">Total</p>
									</div>
									<div class="detail-amt">
											<input type="text" id="harga_barang"
													name="harga_barang" hidden>
											<p id="harga_semua">
													Rp.<?= number_format($d['hrg_jual'], 0, ",", ".") ?></p>
									</div>
							</div>
							<div class="detail">
									<div class="details-title">
											Harga Pengiriman
									</div>
									<div class="detail-amt discount-amt">
											<input type="text" name="biaya_kirim"
													id="biaya_kirim" value="20000" hidden>
											<p id="b_kirim">Rp.20000</p>
									</div>
							</div>
							<hr>
							<div class="detail">
									<div class="details-title">
											Yang harus di bayar </div>
									<div class="detail-amt total-amt">
											<input type="number" value=""
													name="total_penjualan"
													id="total_penjualan" hidden>
											<p id="harga_final">
													Rp.<? number_format($d['hrg_jual'], 0, ",", ".") ?></p>
									</div>
							</div>
							<!--<div class="detail">
									<div class="details-title">Saldo yang digunakan </div>
									<div class="detail-amt total-amt">
											<p id="saldo_digunakan">Rp.<? number_format($d['hrg_jual'], 0, ",", ".") ?></p>
									</div>
							</div>-->
							<div class="detail">
									<div class="details-title">
											<p id="title_saldo"> </p>
									</div>
									<div class="detail-amt">
											<input type="number"
													value="<?= $sisa_saldo ?>" id="saldo_user"
													name="saldo_user" hidden>
											<p id="amount"> </p>
									</div>
							</div>
							<div class="detail">
									<div class="details-title">
											<p id="title_total"> </p>
									</div>
									<div class="detail-amt">

											<p id="total_akhir"> </p>
									</div>
							</div>

							<div class="detail">
									<button type="submit" class="btn btn-primary btn-block
									rounded-0 simpanData">
											BAYAR
									</button>
							</div>
					</div>
			</div>
	</div>
</div>