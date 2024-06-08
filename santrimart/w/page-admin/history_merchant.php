<style type="text/css">
  
  table.dataTable thead tr {
    background-color: #337ab7;
    color:#fff;
    font-size: 11px;
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

  .header-tabel {
    color:#fff;
    font-size: 11px;
    background-color: #337ab7;
  }

  .pagination .page-item.active .page-link {
    z-index: 3;
    border-radius: 5rem;
    background-color: #337ab7;
    color: #FFFFFF;
    -webkit-transform: scale(1.05);
    -ms-transform: scale(1.05);
    transform: scale(1.05); 
  }

  table.dataTable.table-striped tbody tr:nth-of-type(even) {
    background-color: #e9fcfe;
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

  .badge.badge-up {
    position: absolute;
    top: -1.0rem;
    right: -0.8rem;
  }

  .badge.badge-up2 {
    position: absolute;
    top: -0.3rem;
    right: -2.5rem;
  }

  .nav.nav-tabs .nav-item .nav-link.active {
    border: none;
    position: relative;
    color: #49b5c3 !important;
    -webkit-transition: all 0.2s ease;
    transition: all 0.2s ease;
    background-color: transparent;
  }

  .nav.nav-tabs .nav-item .nav-link.active:after {
    content: attr(data-before);
    height: 2px;
    width: 100%;
    left: 0;
    position: absolute;
    bottom: 0;
    top: 100%;
    background: -webkit-linear-gradient(60deg, #28838f, rgb(55 232 252)) !important;
    background: linear-gradient(30deg, #198593, rgb(73 181 195 / 55%)) !important;
    box-shadow: 0 0 8px 0 rgb(73 181 195 / 49%) !important;
    -webkit-transform: translateY(0px);
    -ms-transform: translateY(0px);
    transform: translateY(0px);
    -webkit-transition: all 0.2s linear;
    transition: all 0.2s linear;
  }

</style>
<div class="app-content content">
		<div class="content-overlay"></div>
		<div class="header-navbar-shadow"></div>
		<div class="content-wrapper">

        <!-- NAVIGASI -->
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0 text-dark text-capitalize">
                            <?php echo $_SESSION['akses']; ?>
                        </h2>
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
														<span class="ml-50"><?= $b['nm_pembelian_status'] ?>
														
														<?php if($b['nm_pembelian_status'] == 'Dikemas' && $jumlah_dikemas != 0) { ?>
														<span class="badge badge-pill badge-up badge-danger font-small-2 mr-2">
															<?php echo $jumlah_dikemas; ?>
														</span>
														<?php } ?>
														</span>
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
												<table class="table table-striped dataex-html5-selectors">
													<thead>
														<tr>
															<th>No Fakturasrar</th>
															<th>Tanggal Pembelian</th>
															<th>Total Pembelian</th>
															<th>Status</th>
															<th>Keterangan</th>
															<th>Aksi</th>
														</tr>
													</thead>
													<tbody>
														<?php
															$status = $st;
															if($status != ""){
																$status = "and p.status = '$status'";
															}

															$ketQuery   = "SELECT * FROM tabel_pembelian as p, tabel_pembelian_status as ps WHERE p.status = ps.kd_pembelian_status $status order by p.tgl_pembelian desc";
															$executeSat = mysqli_query($koneksi, $ketQuery);
															while ($b = mysqli_fetch_array($executeSat)) {
																$ket = "";
																if($b["status"] == "dikemas"){
																	$ket = "<div class='blink_me text-danger mt-2'>segera kemas pesanan</div>";
																}else if($b["status"] == "driver"){
																	$ket = "<a href='#' onClick='openModal()' class='badge badge-primary'>Cek kurir aktif</a>";
																}else if($b["status"] == "pickup"){
																	$ket = "<div class='blink_me text-danger mt-2'>menunggu kurir</div>";
																}else if($b["status"] == "dikirim"){
																	$ket = "<div class='blink_me text-danger mt-2'>kurir sedang diperjalanan</div>";
																}else if($b["status"] == "proses bayar"){
																	$ket = "<div class='blink_me text-danger mt-2'>menunggu pembayaran payment gateway</div>";
																}

																$color = "";
																if($b["id_pembelian_status"] >= 3 && $b["id_pembelian_status"] <= 6){
																	$color = "text-warning";
																}else if($b["id_pembelian_status"] == 7 || $b["id_pembelian_status"] == 8){
																	$color = "color-success";
																}else if($b["id_pembelian_status"] == 9){
																	$color = "color-danger";
																}
														?>
														<tr>
															<td><?= $b['no_faktur_pembelian'] ?></td>
															<td><?= $b['tgl_pembelian'] ?></td>
															<td><?= number_format($b['total_pembelian'], 0, ",", ".") ?></td>
															<td class="<?= $color ?>"><?= $b["nm_pembelian_status"] ?>
																<!--<fieldset class="form-group">
																<select class="form-control statusOrder" id="<?= $b['no_faktur_pembelian'] ?>">
																<?php
																	for ($i=0; $i < count($statusOrder); $i++) {
																		$obj = $statusOrder[$i];
																		$kd = $obj['kd_pembelian_status'];
																		$nm = $obj['nm_pembelian_status'];
																?>
																	<option <?= $b["status"] == $kd ? "selected" : ""; ?> value="<?= $kd ?>"><?= $nm ?></option>
																	<?php } ?>
																</select>
																</fieldset>-->
															</td>
															<td><?= $ket ?> </td>
															<td>
																<?php if($b['status'] == "dikemas") { ?>
																	<a href="#" onClick="editStatus('<?= $b['no_faktur_pembelian'] ?>','driver')"  class="badge badge-warning">Mencari Kurir
																	</a>
																<?php } ?>
																<?php if($b['status'] == "pickup") { ?>
																	<a href="#" onClick="editStatus('<?= $b['no_faktur_pembelian'] ?>','driver')"  class="badge badge-danger">Cancel Kurir
																	</a>
																	<a href="#" onClick="editStatus('<?= $b['no_faktur_pembelian'] ?>','dikirim')"  class="badge badge-warning">Pengiriman
																	</a>
																<?php } ?>
																<a href="index.php?menu=order&faktur=<?= $b['no_faktur_pembelian'] ?>" class="badge badge-primary">Detail</a>
															</td>
														</tr>
														<?php } ?>
													</tbody>
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

<!---------------------------------------- Modal Kurir------------------------------------>
<div class=" modal fade" id="kurir" tabindex="-1" role="dialog" aria-labelledby="kuririnfo" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title font-medium-2" id="myModalLabel20"><i class="fas fa-info-circle"></i> Data kurir aktif</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="card-body table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama kurir</th>
									<th>Aktif</th>
									<th>Status</th>
									<th>Hubungi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$ketQuery   = "SELECT * FROM tabel_kurir as tk, tabel_member as tm WHERE tk.id_user = tm.id_user order by tk.current_active desc";
									$executeSat = mysqli_query($koneksi, $ketQuery);
									$no = 1;
									while ($b = mysqli_fetch_array($executeSat)) {
								?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $b['nm_user'] ?></td>
									<td><?= $b['current_active'] ?></td>
									<td><?= $b["status"] == 2 ? "kirim" : ($b["status"] == 1 ? "aktif" : "non aktif"); ?></td>
									<td><a href="https://wa.me/<?= $b["hp"] ?>" target="_blank"><?= $b["hp"] ?></a></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
  </div>
</div>
<!---------------------------------------- Modal Kurir------------------------------------>

<script type="text/javascript">
function href(status){
	location.href='index.php?menu=history&status='+status;
}

$(document).ready(function() {
	$( ".statusOrder" ).change(function() {
    $.ajax({
            url: "../aksi/edit_order_status.php",
            type: "post",
            data: {
              	status: this.value,
				faktur: $(this).attr('id'),
            },
            success: function(data) {
				Swal.fire(
					'Update Status',
					data,
					'success'
				)
            }

        })
	});
});

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

function openModal() {
	$("#kurir").modal('show');
}

</script>