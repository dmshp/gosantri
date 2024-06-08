<?php
// Defining variables
include "../inc/koneksi.php";

if (isset($_POST['submit'])) {
    $id_user =  $_POST['kategori'];
    $tanggal = $_POST['tanggal'];
    $jumlah =  $_POST['nominal'];
    $keterangan = $_POST['keterangan'];


    $saldo_masuk = "INSERT INTO 'tabel_saldo' ('id_user', 'tanggal', 'jumlah','pengeluaran', 'ket_saldo')   VALUES ('$id_user', 
    '$tanggal','$jumlah','0','$keterangan')";

    if (mysqli_query($koneksi, $saldo_masuk)) {
        echo "sukses";

        // echo nl2br("\n$first_name\n $last_name\n "
        //     . "$gender\n $address\n $email");
    } else {
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }
    //check if form was submitted
}
// Checking for a POST request

// Removing the redundant HTML characters if any exist.

?>

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

	.counter-value {
	    background-color: #990099;
	    color: #FFFFFF;
	    padding: 1px 6px;
	    font-size: 0.6rem;
	    border-radius: 0 0 5px 5px;
	    margin-right: 0rem; 
	}

	.badge.badge-up {
	    position: absolute;
	    top: -1.2rem;
	    right: -0.5rem;
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
<!-- BEGIN: Content-->
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
                                <li class="breadcrumb-item"><a href="#" class="text-dark">Saldo</a>
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
                        <h3 class="mb-3 display-4 text-uppercase">Saldo</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-12 pb-5">

											<?php 
											$id_user = $_SESSION['id_user'];
											//debet jika status 1, kredit jika status 1 atau status 0 saat penarikan
											$kurir = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(CASE WHEN arus=0 and status=1 THEN `nominal` END) as saldo, SUM(CASE WHEN (arus=1 and status=1) or (arus=1 and status=0 and no_faktur_pembelian='') THEN `nominal` END) as wd FROM `tabel_keuangan` WHERE `id_member`=$id_user"));
											$saldo = $kurir['saldo'] - $kurir['wd'];
											?>

												<div class="card border rounded">
													<div class="card-body text-center">
															<h6 class="text-bold-300">Saldo Penghasilan</h6>
															<h1 class="text-bold-500 mt-1 color-success" style="font-size: 3rem;font-family: 'Open Sauce One',sans-serif;">
																<span style="font-size: 1.5rem;">Rp </span><?= number_format($saldo, 0, ",", "."); ?>
															</h1>
															<input type="hidden" value="<?= $saldo ?>" id="saldo"/>
													</div>
													<!--<div class="w-100 mb-1 mt-1" style="border-bottom: 5px solid #ebebeb;"></div>-->
												</div>
												<!-- Nav tabs -->
												<ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
														<li class="nav-item">
																<a class="nav-link active" id="withdraw-tab-fill" data-toggle="tab" href="#withdraw-fill" role="tab" aria-controls="withdraw-fill" aria-selected="true">Withdraw</a>
														</li>
														<li class="nav-item">
																<a class="nav-link" id="topup-tab-fill" data-toggle="tab" href="#topup-fill" role="tab" aria-controls="topup-fill" aria-selected="false">
																<span>Topup</span>
																</a>
														</li>
												</ul>

												<!-- Tab panes -->
												<div class="tab-content pt-1">
													<div class="tab-pane active" id="withdraw-fill" role="tabpanel" aria-labelledby="withdraw-tab-fill">
														<div class="card-body">
															<h6 class="text-bold-300 mb-1" style="border-bottom: 1px solid #37e8fc;padding-bottom: 6px;width: 145px;">Nominal Penarikan</h6>
															<fieldset class="form-label-group form-group position-relative has-icon-left">
																	<div class="form-control-position">
																			<span>Rp</span>
																	</div>
																	<input type="text" class="form-control" id="nominal" name="nominal" required>
																	<label for="user-name" class="nama-user" style="top: 38px !important;left: 8px !important;">Minimum penarikan 50.000</label>
															</fieldset>
														</div>
														<div class="w-100" style="border-bottom: 2px solid #ebebeb;"></div>
														<?php $rekening = mysqli_fetch_array(mysqli_query($koneksi, "SELECT bank,an_rekening,no_rekening FROM tabel_member WHERE id_user = '$_SESSION[id_user]'")); ?>

														<div class="card-body">
																<h6 class="text-bold-300 mb-1" style="border-bottom: 1px solid #37e8fc;padding-bottom: 6px;width: 130px;">Rekening Tujuan</h6>
																<div>
																	<div class="font-weight-bold" style="margin-bottom:-7px;">Bank <?= $rekening['bank'] ?></div>
																	<div><?= $rekening['no_rekening'] ?> <span style="font-size: 70px;line-height: 0;">.</span> <?= $rekening['an_rekening'] ?></div>
																</div>
														</div>
														<div class="w-100" style="border-bottom: 2px solid #ebebeb;margin-bottom: -17px;"></div>
														<div class="card-body">
															<button onClick="tarik()" class="btn btn-success w-100 mt-1 waves-effect waves-light">Tarik Saldo</button>
														</div>
													</div>
													<div class="tab-pane" id="topup-fill" role="tabpanel" aria-labelledby="topup-tab-fill">
														<form method="post" action="../aksi/topup.php" enctype="multipart/form-data">
																<div class="row">
																		<div class="col-12 pb-1">
																				<div class="font-small-2 mb-1">Tanggal</div>
																				<fieldset>
																						<div class="input-group">
																								<input type="text" name="tanggal" class="form-control pickadate" required>
																								<div class="input-group-append" id="button-addon2">
																										<button class="btn btn-primary rounded-0" type="button">
																												<i class="far fa-calendar-alt"></i></button>
																								</div>
																						</div>
																				</fieldset>
																		</div>

																		<div class="col-12 pb-1">
																				<div class="font-small-2 mb-1 mt-1">Bank Tujuan</div>
																				<select name="bank" class="form-control select2" onChange="showRek(this.value)" required>
																						<option disabled selected>Pilih Bank</option>
																						<?php
																							$ketQuery = "SELECT * FROM tabel_pembayaran WHERE kd_kategori_pembayaran ='1'";
																							$executeSat = mysqli_query($koneksi, $ketQuery);
																							$bank = [];
																							while ($k = mysqli_fetch_array($executeSat)) {
																							$bank[] = $k;
																						?>
																						<option value="<?= $k['kd_pembayaran']; ?>"><?= $k['bank']; ?></option>
																						<?php } ?>
																				</select>
																		</div>

																		<div class="col-12 pb-1">
																				<div class="font-small-2 mb-1 mt-1">Rekening Tujuan</div>
																				<div class='kd_pembayaran' kd_pembayaran='0'>
																						<h5 class='border rounded w-100 pb-1 pl-1'>Pilih bank tujuan untuk melihat rekening</h5>
																				</div>
																				<?php 
																				for ($i=0; $i < count($bank); $i++) {
																					$obj = $bank[$i];
																					$kd_pembayaran = $obj['kd_pembayaran'];
																					echo "<div class='kd_pembayaran hidden' kd_pembayaran='".$kd_pembayaran."'>
																						<h5 class='border rounded w-100 pb-1 pl-1'>" .$obj['an_rekening']. " <span style='font-size: 70px;line-height: 0;'>.</span> " .$obj['no_rekening']."</h5>
																					</div>";
																				}
																				?>
																		</div>

																		<div class="col-12 col-md-12">
																				<div class="font-small-2 mb-1">Nominal</div>
																				<fieldset class="form-group position-relative has-icon-left input-divider-left">
																						<input type="number" name="nominal" id="nominal" class="form-control" placeholder="Isi disini" required />
																						<small class="counter-value nama-user float-right"><span class="char-count">Tanpa titik
																										dan Rupiah</span></small>
																						<div class="form-control-position"><i class="feather icon-clipboard"></i>
																						</div>
																				</fieldset>
																		</div>

																		<div class="col-12">
																				<div class="font-small-2 mb-1">Bukti Transfer</div>
																				<fieldset class="form-group">
																						<div class="custom-file">
																								<input type="file" class="custom-file-input" name="image" id="image" required>
																								<label class="custom-file-label" for="image">Choose file</label>
																						</div>
																				</fieldset>
																		</div>

																		<div class="col-12 mt-1 mb-2">
																				<input type="submit" name="submit" value="Upload"
																						class="btn btn-primary rounded-0" />
																		</div>
																</div>
														</form>
													</div>
												</div>


                    </div>
                    <div class="col-lg-8 col-12">
                        <div class="badge badge-primary float-right">
                           <?php
                            $id_user = $_SESSION['id_user'];
														$sql_user = mysqli_query($koneksi, "SELECT * FROM tabel_keuangan WHERE id_member = '$id_user'");
														$jumlah_user = mysqli_num_rows($sql_user);
                            ?>
                            <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2">
                                <?php echo $jumlah_user; ?>
                            </span>
                            Total Saldo
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Status</th>
                                        <th>Kredit</th>
                                        <th>Debet</th>
                                        <th>Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $ketQuery = "SELECT * FROM tabel_keuangan WHERE id_member = '$id_user' order by id_keuangan asc";
                                        $executeSat = mysqli_query($koneksi, $ketQuery);
																				$total_saldo = 0; $data = [];
																				//menyimpan data laporan
                                        while ($b = mysqli_fetch_array($executeSat)) {
                            							$debet = 0; $kredit = 0;
																					$status = $b['status'] == 0 ? 'pending' : ($b['status'] == 1 ? 'sucess' : 'batal');
																					
																					if ($b['arus'] == 0) {
																						$debet = $b['nominal'];
																					} else if ($b['arus'] == 1) {
																						$kredit = $b['nominal'];
																					}
																					if($b['status'] == 1 || ($b['status'] == 0 && !$b['no_faktur_pembelian'])){ 
																						if ($b['arus'] == 0) {
																								$total_saldo = $total_saldo + $b['nominal'];
																						} else if ($b['arus'] == 1) {
																								$total_saldo = $total_saldo - $b['nominal'];
																						}
																					}
																					
																					$b['no_faktur_pembelian'] = !$b['no_faktur_pembelian'] ? 'Penarikan' : $b['no_faktur_pembelian'];
																					array_push($data,'<tr class="'.$status.'">
																							<td>' . $b['tanggal'] . '</td>
																							<td>' . $b['no_faktur_pembelian'] . '</td>
																							<td>' . $status . '</td>
																							<td>Rp ' . number_format($kredit, 0, ",", ".") . '</td>
																							<td>Rp ' . number_format($debet, 0, ",", ".") . '</td>
																							<td>Rp ' . number_format($total_saldo, 0, ",", ".") . '</td>
																					</tr>');
																				}
																				//laporan data direverse
																				$data = array_reverse($data,true);
																				foreach($data as $d){
																						echo $d;
																				};
																			?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- END: Content-->
            </div>
        </div>
    </div>
</div>

<script>	
$(document).ready(function () {
	$(".table-striped").DataTable({
		"ordering": false
	});

	var rupiah = document.getElementById('nominal');
    rupiah.addEventListener('keyup', function(e){
        // tambahkan 'Rp.' pada saat form di ketik
        // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
        rupiah.value = formatRupiah(this.value, 'Rp. ');
    });
});

function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split           = number_string.split(','),
    sisa            = split[0].length % 3,
    rupiah          = split[0].substr(0, sisa),
    ribuan          = split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
}

function showRek(val) {
	$(".kd_pembayaran").addClass("hidden")
	$("div[kd_pembayaran="+val+"]").removeClass("hidden");
	console.log(val)
}

function tarik() {
	const nominal = parseInt($("#nominal").val());
	const saldo = parseInt($("#saldo").val());
	if(nominal < 50000){
		Swal.fire(
			'Nominal Penarikan',
			'minimal 50.000',
			'error'
		)
		return false;
	}
	if(nominal > saldo){
		Swal.fire(
			'Nominal Penarikan',
			'melebihi saldo',
			'error'
		)
		return false;
	}

	$.ajax({
			url: "../aksi/withdraw.php",
			type: "post",
			data: { nominal: nominal },
			success: function(text) {
				if(text == 1){
					Swal.fire(
						'Berhasil Tarik Saldo',
						'',
						'success'
					)
					setTimeout(() => {
						location.reload();
					}, 2000);
				}else{
					Swal.fire(
						'Gagal',
						text,
						'error'
					)
				}
			}
	})
}
</script>
</script>