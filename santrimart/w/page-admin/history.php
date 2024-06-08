<style type="text/css">
	
	.btn-success {
	    border-color: #1F9D57 !important;
	    background-color: #1dc95a !important;
	    color: #FFFFFF;
	}

	.badge.badge-success {
	    background-color: #11c12f;
	}

	.modal-title {
	    margin-bottom: 0;
	    line-height: 1.45;
	    color: white;
	}

	.modal .modal-header {
	    background-color: #49b5c3;
	    border-radius: 0.42rem;
	    padding: 0.8rem;
	    color: white;
	    border-bottom: none;
	}

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

        <!-- NAVIGASI -->
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top pt-2">
                    <div class="col-12">
                        <h3 class="content-header-title float-left mb-0 text-dark text-capitalize" style="padding-top:.3rem">
                            <?php echo $_SESSION['akses']; ?>
                        </h3>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="index.php?menu=home" class="text-dark">Home</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="#" class="text-dark">Order Histori</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

		<div class="content-body">
			<div class="content-detached content-right">
				<div class="row">
					<div class="col-lg-2 col-12">
						<!-- SIDEBAR -->
						<div class="sidebar-detached">
							<div class="sidebar">
	
								<!-- JUDUL -->
								<div class="sidebar-shop" id="ecommerce-sidebar-toggler">
									<div class="row">
										<div class="col-sm-12">
											<h6 class="filter-heading d-none d-lg-block">Filter pencarian</h6>
										</div>
									</div>
								</div>
								<span class="sidebar-close-icon d-block d-md-none">
									<i class="feather icon-x"></i>
								</span>

								<!-- BODY SIDEBAR -->
								<div class="card">
									<div class="card-body">
											
										<!-- STATUS -->
										<div class="multi-range-price">
											<div class="multi-range-title pb-75">
													<h6 class="filter-title mb-0">Status</h6>
											</div>
											<?php $st = isset($_GET['status']) ? $_GET['status'] : ""; ?>
											<ul class="list-unstyled filter-order" id="price-range">
												<li onClick="href('')">
													<span class="vs-radio-con vs-radio-primary py-25">
														<input type="radio" name="price-range" value="all" <?= ($st == "" ? "checked" : "") ?>>
														<span class="vs-radio">
															<span class="vs-radio--border"></span>
															<span class="vs-radio--circle"></span>
														</span>
														<span class="ml-50">All</span>
													</span>
												</li>
												<?php
													$ketQuery   = "SELECT * FROM tabel_pembelian_status";
													$executeSat = mysqli_query($koneksi, $ketQuery);
													$statusOrder = [];
													while ($b = mysqli_fetch_array($executeSat)) {
														$statusOrder[] = $b;
												?>
												<li onClick="href('<?= $b['kd_pembelian_status'] ?>')">
													<span class="vs-radio-con vs-radio-primary py-25">
														<input type="radio" name="price-range" value="unpaid" <?= ($st == $b['kd_pembelian_status'] ? "checked" : "") ?>>
														<span class="vs-radio">
																<span class="vs-radio--border"></span>
																<span class="vs-radio--circle"></span>
														</span>
														<span class="ml-50"><?= $b['nm_pembelian_status'] ?></span>
													</span>
												</li>
												<?php } ?>
											</ul>
										</div>
										<hr>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-10 col-12">
						<!-- MAIN CONTENT -->
						<section id="basic-examples">
							<div class="row match-height">
								<div class="col-12">
									<div class="card p-2">
										<div class="card-content">
											<div class="table-responsive">
												<table class="table table-bordered">
													<!--<thead>
															<tr align="center">
																	<th colspan=2>Daftar Transaksi</th>
															</tr>
													</thead>-->
													<?php
														$status = $st;
														if($status != ""){
															$status = "and p.status = '$status'";
														}
														$id_user = "";
														if ($_SESSION['akses'] == 'member') {
															$id_user = $_SESSION['id_user'];
															$id_user = "and p.id_user = $id_user";
														}

														$nama_user 	 = $_SESSION['nm_user'];

														// var_dump($nama_user); die();

														$ketQuery   = "SELECT * FROM tabel_pembelian as p, tabel_pembelian_status as ps, tabel_member as a WHERE p.status = ps.kd_pembelian_status and p.id_user = a.id_user and a.nm_user = '$nama_user' order by p.tgl_pembelian desc";
														$executeSat = mysqli_query($koneksi, $ketQuery);
														while ($b 	= mysqli_fetch_array($executeSat)) {
														$no_faktur 	= isset($b['no_faktur_pembelian']) ? $b['no_faktur_pembelian'] : '';
													?>
													<tbody style="border: 2px solid #37e8fc !important;">
														<tr>
															<td><strong>No Faktur:</strong></td>
															<td><?= $b['no_faktur_pembelian'] ?></td>
														</tr>
														<tr>
															<td><strong>Tanggal Pembelian: </strong></td>
															<td><?= $b['tgl_pembelian'] ?></td>
														</tr>
														<tr>
															<td><strong>Total Biaya :</strong></td>
															<td>Rp <?= number_format($b['total_biaya'], 0, ",", "."); ?></td>
														</tr>
														<tr>
															<td><strong>Status :</strong></td>
															<?php if($b['status'] == "selesai") { ?>
																<td>
																	<span class="badge badge-success text-white nama-user">
																		<?php echo strtoupper($b['nm_pembelian_status']) ?>
																	</span>
																</td>
															<?php } else if($b['status'] == "batal") { ?>
																<td>
																	<span class="badge badge-danger text-white nama-user">
																		<?php echo strtoupper($b['nm_pembelian_status']) ?>
																	</span>
																</td>
															<?php } else { ?>
																<td><?= $b['nm_pembelian_status']; ?></td>
															<?php } ?>
														</tr>
														<tr>
															<td colspan=2 align="center">
																<?php if($b['status'] == "unpaid") { ?>
																	<a href="index.php?menu=pembayaran&faktur=<?= $b['no_faktur_pembelian'] ?>" class="btn btn-warning waves-effect waves-light mr-1" style="width:200px;color:white;">Bayar Sekarang
																	</a>
																<?php } ?>
																<?php if($b['status'] == "proses bayar") { ?>
																	<a href="../midtrans/examples/snap/checkout.php?order_id=<?= $b['no_faktur_pembelian'] ?>&total_biaya=<?= $b['total_biaya'] ?>" class="btn btn-warning waves-effect waves-light mr-1" style="width:200px;color:white;">Bayar Sekarang
																	</a>
																<?php } ?>
																<?php if($b['status'] == "diterima") { ?>
																	<a href="index.php?menu=ulasan&faktur=<?= $b['no_faktur_pembelian'] ?>" class="btn btn-success waves-effect waves-light" style="width:200px;color:white;">Terima Pesanan</a>
																<?php } ?>
																<?php if($b['status'] == "unpaid" || $b['status'] == "proses bayar") { ?>
																	<a href="" class="btn btn-danger waves-effect waves-light mr-1" style="width:200px;color:white;" data-toggle="modal" data-target="#modal_batal_pesanan">
																		Batalkan Pesanan
																	</a>
																<?php } ?>
																<a href="index.php?menu=order&faktur=<?= $b['no_faktur_pembelian'] ?>" class="btn btn-primary waves-effect waves-light" style="width:200px;color:white;">Detail Order</a>
															</td>
														</tr>
													</tbody>
													<?php } ?>
												</table>
											</div>
										</div>
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

<!-- Modal -->
<div id="modal_batal_pesanan" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title">Batalkan pesanan</h4>
      </div>
        <form action="../aksi/batal_pesanan_member.php" method="POST" enctype="multipart/form-data">
	      <div class="modal-body">
	        	<input type="hidden" name="no_faktur_batal" id="no_faktur_batal" readonly value="<?php echo $no_faktur ?>">
	        	<div class="row">
	        		<div class="col-12">
	                    <label for="exampleFormControlInput1">Alasan dibatalkan</label>
	                    <textarea class="form-control" name="keterangan_batal" cols="30" rows="5" placeholder="Tambahkan Alasan dibatalkan" required></textarea>
	                </div>
	        	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-success">Simpan</button>
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
	      </div>
        </form>
    </div>

  </div>
</div>

<script type="text/javascript">
$(document).ready(function () {
//$(".table-bordered").DataTable();
});
function href(status){
	location.href='index.php?menu=history&status='+status;
}
function editStatus(faktur, status) {
	$.ajax({
					url: "../aksi/edit_order_status.php",
					type: "post",
					data: {
						status: status,
						faktur: faktur,
					},
					success: function(data) {
							Swal.fire(
								'Update Status',
								data,
								'success'
							)
							location.reload();
					}
			})
}
</script>
<!--  -->