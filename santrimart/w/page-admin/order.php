<style type="text/css">
	
	.container{
/*  width: 140%;*/
  position: absolute;
  z-index: 1;
}
	
.contain {
	position: relative;
	z-index: 1;
}

.progressbar li{
  	float: left;
  	width: 12%;
  	position: relative;
  	text-align: center;
}

.progressbar li:before{
  	content:"1";
  	width: 30px;
  	height: 30px;
  	border: 2px solid #bebebe;
  	display: block;
  	margin: 0 auto 10px auto;
  	border-radius: 50%;
  	line-height: 27px;
  	background: white;
  	color: #bebebe;
  	text-align: center;
  	font-weight: bold;
}

.progressbar{
  	counter-reset: step;
}
.progressbar li:before{
  	content:counter(step);
  	counter-increment: step;
  	width: 30px;
  	height: 30px;
  	border: 2px solid #bebebe;
  	display: block;
  	margin: 0 auto 10px auto;
  	border-radius: 50%;
  	line-height: 27px;
  	background: white;
  	color: #bebebe;
  	text-align: center;
  	font-weight: bold;
}

.progressbar li:after{
  	content: '';
  	position: absolute;
  	width:100%;
  	height: 3px;
  	background: #b8c2cc;
  	top: 15px;
  	left: -50%;
  	z-index: -1;
}

.progressbar li:first-child:after{
  	content: none;
}

.progressbar li.active + li:after{
  	background: #49b6c3;
 }
 
.progressbar li.active:before{
   border-color: #49b6c3;
   background: #49b6c3;
   color: white
 }

</style>


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0 text-dark text-capitalize">
                            <?php echo $_SESSION['akses']; ?></h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php?menu=home" class="text-dark">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="index.php?menu=history" class="text-dark">Order</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#" class="text-dark">Order Detail</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="card">
            <div class="card-body">
                <div class="divider">
                    <div class="divider-text">
                        <h3 class="mb-3 display-4 text-uppercase">ORDER DETAIL</h3>
                    </div>
                </div>

								
				<?php 
				isset($_GET['faktur']) ? $noFaktur = $_GET['faktur'] : $noFaktur='';
				$ketQuery = "SELECT * FROM tabel_pembelian as p, tabel_pembelian_status as ps WHERE no_faktur_pembelian = '$noFaktur' and p.status = ps.kd_pembelian_status";
				$executeSat = mysqli_query($koneksi, $ketQuery);
				$pemb = mysqli_fetch_array($executeSat);
				$id_pembelian = isset($pemb['id_pembelian_status']) ? $pemb['id_pembelian_status'] : '';
				$kd_pembelian = isset($pemb['kd_pembelian_status']) ? $pemb['kd_pembelian_status'] : '';
				$status 	  = isset($pemb['status']) ? $pemb['status'] : '';
				$ket_status   = isset($pemb['nm_pembelian_status']) ? $pemb['nm_pembelian_status'] : '';

				// var_dump($status); die();
				?>
				<input type="hidden" value="<?php $id_pembelian ?>" id="id_status">

				<div class="card-content">
					<div class="card-body">
						<div class="contain">
							
							<?php if($status == "unpaid" || $status == "proses bayar" || $status == "pending" || $status == "success" || $status == "denied"){ ?>
							<ul class="progressbar">
				              <li class="active " style="color: #49b6c3;"><?php echo $ket_status;?></li>
				              <li class="">Pengecheckan admin</li>
				              <li class="">Dikemas</li>
				              <li class="">Mencari kurir</li>
				              <li class="">Pengambilan paket</li>
				              <li class="">Dikirim</li>
				              <li class="">Diterima</li>
				              <li class="">Selesai</li>
				           	</ul>
				       		<?php } else if($status == "check" ){ ?>
				       		<ul class="progressbar">
				              <li class="active" style="color: #49b6c3;">Belum bayar</li>
				              <li class="active" style="color: #49b6c3;">Pengecheckan admin</li>
				              <li class="">Dikemas</li>
				              <li class="">Mencari kurir</li>
				              <li class="">Pengambilan paket</li>
				              <li class="">Dikirim</li>
				              <li class="">Diterima</li>
				              <li class="">Selesai</li>
				           	</ul>
				       		<?php } else if($status == "dikemas" ){ ?>
				       		<ul class="progressbar">
				              <li class="active" style="color: #49b6c3;">Belum bayar</li>
				              <li class="active" style="color: #49b6c3;">Pengecheckan admin</li>
				              <li class="active" style="color: #49b6c3;">Dikemas</li>
				              <li class="">Mencari kurir</li>
				              <li class="">Pengambilan paket</li>
				              <li class="">Dikirim</li>
				              <li class="">Diterima</li>
				              <li class="">Selesai</li>
				           	</ul>
				           	<?php } else if($status == "driver" ){ ?>
				       		<ul class="progressbar">
				              <li class="active" style="color: #49b6c3;">Belum bayar</li>
				              <li class="active" style="color: #49b6c3;">Pengecheckan admin</li>
				              <li class="active" style="color: #49b6c3;">Dikemas</li>
				              <li class="active" style="color: #49b6c3;">Mencari kurir</li>
				              <li class="">Pengambilan paket</li>
				              <li class="">Dikirim</li>
				              <li class="">Diterima</li>
				              <li class="">Selesai</li>
				           	</ul>
				           	<?php } else if($status == "pickup" ){ ?>
				       		<ul class="progressbar">
				              <li class="active" style="color: #49b6c3;">Belum bayar</li>
				              <li class="active" style="color: #49b6c3;">Pengecheckan admin</li>
				              <li class="active" style="color: #49b6c3;">Dikemas</li>
				              <li class="active" style="color: #49b6c3;">Mencari kurir</li>
				              <li class="active" style="color: #49b6c3;">Pengambilan paket</li>
				              <li class="">Dikirim</li>
				              <li class="">Diterima</li>
				              <li class="">Selesai</li>
				           	</ul>
				           	<?php } else if($status == "dikirim" ){ ?>
				       		<ul class="progressbar">
				              <li class="active" style="color: #49b6c3;">Belum bayar</li>
				              <li class="active" style="color: #49b6c3;">Pengecheckan admin</li>
				              <li class="active" style="color: #49b6c3;">Dikemas</li>
				              <li class="active" style="color: #49b6c3;">Mencari kurir</li>
				              <li class="active" style="color: #49b6c3;">Pengambilan paket</li>
				              <li class="active" style="color: #49b6c3;">Dikirim</li>
				              <li class="">Diterima</li>
				              <li class="">Selesai</li>
				           	</ul>
				           	<?php } else if($status == "diterima" ){ ?>
				       		<ul class="progressbar">
				              <li class="active" style="color: #49b6c3;">Belum bayar</li>
				              <li class="active" style="color: #49b6c3;">Pengecheckan admin</li>
				              <li class="active" style="color: #49b6c3;">Dikemas</li>
				              <li class="active" style="color: #49b6c3;">Mencari kurir</li>
				              <li class="active" style="color: #49b6c3;">Pengambilan paket</li>
				              <li class="active" style="color: #49b6c3;">Dikirim</li>
				              <li class="active" style="color: #49b6c3;">Diterima</li>
				              <li class="">Selesai</li>
				           	</ul>
				           	<?php } else if($status == "selesai" ){ ?>
				       		<ul class="progressbar">
				              <li class="active" style="color: #49b6c3;">Belum bayar</li>
				              <li class="active" style="color: #49b6c3;">Pengecheckan admin</li>
				              <li class="active" style="color: #49b6c3;">Dikemas</li>
				              <li class="active" style="color: #49b6c3;">Mencari kurir</li>
				              <li class="active" style="color: #49b6c3;">Pengambilan paket</li>
				              <li class="active" style="color: #49b6c3;">Dikirim</li>
				              <li class="active" style="color: #49b6c3;">Diterima</li>
				              <li class="active" style="color: #49b6c3;">Selesai</li>
				           	</ul>
				           	<?php } else if($status == "batal" ){ ?>
				           		<center>
				           			<span class="badge badge-danger text-white nama-user">ORDER DIBATALKAN</span>
				           		</center>
				           <?php } ?>
						</div>
					</div>
				</div>
		<!-- </div> -->

			</div>
			<br><br>
            <div class="card-body">
				<div class="row">
					<div class="col-lg-4 col-12">
						<div class="card">
							<div class="card-body pb-0">
								<div class="w-100 mb-1" style="border-bottom: 1px solid #49b5c3;">
									<h3>Info Pengiriman</h3>
								</div>
								<div>
									<table>
										<tr>
											<td width="70px" style="vertical-align: top;">Alamat :</td>
											<td><?= isset($pemb['alamat']) ? $pemb['alamat'] : '-'; ?></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-8 col-12">
							<div class="table-responsive">
									<table class="table table-striped customtb">
											<!--<thead>
													<tr>
															<th>Nama Barang</th>
															<th>Foto</th>
															<th>Harga</th>
															<th>Jumlah</th>
															<th>Bayar</th>
													</tr>
											</thead>-->
											<tbody>
													<?php
													$idUser = $user['id_user'];
													$ketQuery = "SELECT * FROM tabel_rinci_pembelian, tabel_barang_gambar, tabel_barang WHERE tabel_barang.kd_barang = tabel_rinci_pembelian.kd_barang AND tabel_barang.kd_barang = tabel_barang_gambar.id_brg AND no_faktur_pembelian = '$noFaktur'";
													$executeSat = mysqli_query($koneksi, $ketQuery);
													while ($b = mysqli_fetch_array($executeSat)) {
															// print_r($b);
															$e = explode(",", $b['gambar']);
													?>
													<tr>
															<td><img src="../img/produk/<?php echo $e[0] ?>" width="50px" height="50px"></td>
															<td>
																<?php echo $b['nm_barang'] ?>
																<div>Rp<?php echo number_format($b['harga'], 0, ",", "."); ?> x <?php echo $b['jumlah'] ?></div>
															</td>
															<td align="right">
																Harga
																<div style="font-weight:600;">Rp<?php echo number_format($b['sub_total_beli'], 0, ",", "."); ?></div>
															</td>
													</tr>
													<?php } ?>
											</tbody>
											<tfoot>
												<tr>
													<td colspan=2 style="border-top: 1px dashed;">Total Pembelian : </td>
													<td align="right" style="border-top: 1px dashed;">Rp. <?= isset($pemb['total_pembelian']) ? number_format($pemb['total_pembelian'], 0, ",", ".") : '-'; ?></td>
												</tr>
												<tr>
													<td colspan=2>Biaya Pengiriman : </td>
													<td align="right">Rp. <?= isset($pemb['biaya_pengiriman']) ? number_format($pemb['biaya_pengiriman'], 0, ",", ".") : '-'; ?></td>
												</tr>
												<tr>
													<td colspan=2 style="border-top: 1px dashed;font-weight: bold;font-size: 18px;">Total Belanja : </td>
													<td  align="right" style="border-top: 1px dashed;font-weight: bold;font-size: 18px;">Rp. <?= isset($pemb['total_biaya']) ? number_format($pemb['total_biaya'], 0, ",", ".") : '-'; ?></td>
												</tr>
												<tr>
													<td colspan=2>Metode Pembayaran : </td>
													<td align="right"><?= isset($pemb['ket']) ? $pemb['ket'] : '-'; ?></td>
												</tr>

												<?php if($status == "unpaid") { ?>
												<tr>
													<td colspan=3 align="center">
														<a href="index.php?menu=pembayaran&faktur=<?= $noFaktur ?>">
														<button class="btn btn-block btn-warning" style="width:200px;color:white;">Bayar Sekarang</button>
														</a>
													</td>
												</tr>
												<?php } ?>
											</tfoot>
									</table>
							</div>
					</div>
				</div>
            </div>
            <!-- END: Content-->
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
		$(".actions.clearfix").remove();
		let id_status = $("#id_status").val();
		id_status = id_status - 1;

		if(id_status != 5){
			$(".steps li").each(function (id) {
					if (id_status == id) {
							$('.steps li:nth-child(' + (id + 1) + ')').addClass("current");
							$('.steps li:nth-child(' + (id + 1) + ')').removeClass("disabled");
					}else if(id_status > id){
							$('.steps li:nth-child(' + (id + 1) + ')').removeClass("current");
							$('.steps li:nth-child(' + (id + 1) + ')').addClass("done disabled");
					}
			});
		}
});

</script>