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
                                <li class="breadcrumb-item"><a href="#" class="text-dark">Keuangan</a>
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
                        <h3 class="mb-3 display-4 text-uppercase">Keuangan</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-12">
											
												<!-- Nav tabs -->
												<ul class="nav nav-tabs nav-fill" id="myTab" role="tablist">
														<li class="nav-item">
																<a class="nav-link <?= !$_GET['tab'] ? 'active' : ''  ?>" onClick="link('','')" id="saldo-tab-fill" data-toggle="tab" href="#saldo-fill" role="tab" aria-controls="saldo-fill" aria-selected="true">Saldo admin</a>
														</li>
														<li class="nav-item">
																<a class="nav-link <?= !$_GET['tab'] ? '' : 'active'  ?>" onClick="link('keuangan','member')" id="topupwd-tab-fill" data-toggle="tab" href="#topupwd-fill" role="tab" aria-controls="topupwd-fill" aria-selected="false">
																<span>Withdraw
																	<?php if($jumlah_all_topupwd != 0) { ?>
																		<span class="badge badge-pill badge-up badge-danger font-small-2 mr-2 position-relative nama-user">
																			<?php echo $jumlah_all_topupwd; ?>
																		</span>
																	<?php } ?>
																</span>
																</a>
														</li>
												</ul>

												<!-- Tab panes -->
												<div class="tab-content pt-1">
														<div class="tab-pane <?= !$_GET['tab'] ? 'active' : ''  ?>" id="saldo-fill" role="tabpanel" aria-labelledby="saldo-tab-fill">
															<div class="card border rounded">
																<div class="card-body">
																	<div class="row">
																		<div class="col-12">
																			<?php 
																			$id_user = $_SESSION['id_user'];
																			$admin = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(tk.`nominal`) as saldo FROM tabel_keuangan tk, tabel_member mb WHERE tk.id_member=mb.id_user and tk.no_faktur_pembelian != '' and tk.arus=1 and tk.status=1 and mb.akses='merchant'"));
																			$saldo = $admin['saldo'];
																			?>

																				<div class="card rounded">
																					<div class="card-body text-center">
																							<h6 class="text-bold-300">Saldo Penghasilan</h6>
																							<h1 class="text-bold-500 mt-1 color-success" style="font-size: 3rem;font-family: 'Open Sauce One',sans-serif;">
																								<span style="font-size: 1.5rem;">Rp </span><?= number_format($saldo, 0, ",", "."); ?>
																							</h1>
																							<input type="hidden" value="<?= $saldo ?>" id="saldo"/>
																					</div>
																					<div class="w-100 mb-1 mt-1" style="border-bottom: 5px solid #ebebeb;"></div>
																				</div>
																		</div>
																		<div class="table-responsive">
																				<table class="table table-striped table-transfer">
																						<thead>
																								<tr>
																										<th>Tanggal</th>
																										<th>Faktur</th>
																										<th>Status</th>
																										<th>Nominal</th>
																								</tr>
																						</thead>
																						<tbody>
																						<?php
																							$ketQuery = "SELECT * FROM tabel_keuangan tk, tabel_member mb WHERE tk.id_member=mb.id_user and no_faktur_pembelian != '' and arus=1 and mb.akses='merchant' order by id_keuangan asc";
																							$executeSat = mysqli_query($koneksi, $ketQuery);
																							$data = [];
																							while ($b = mysqli_fetch_array($executeSat)) {
																							$status = $b['status'] == 0 ? 'pending' : ($b['status'] == 1 ? 'sucess' : 'batal');
																							
																							array_push($data,'<tr class="'.$status.'">
																									<td>' . $b['tanggal'] . '</td>
																									<td>' . $b['no_faktur_pembelian'] . '</td>
																									<td>' . $status . '</td>
																									<td>Rp ' . number_format($b['nominal'], 0, ",", ".") . '</td>
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
															</div>
														</div>
														
														<div class="tab-pane <?= !$_GET['tab'] ? '' : 'active'  ?>" id="topupwd-fill" role="tabpanel" aria-labelledby="topupwd-tab-fill">
															<div class="card border rounded">
																<div class="card-body">
																	<div class="row">
																		<div class="col-lg-4 col-12 pb-5 hidden">
																				<form method="post" action="../aksi/input_saldo.php" enctype="multipart/form-data">
																						<div class="row">
																								<div class="col-12 pb-1">
																										<div class="font-small-2 mb-1 mt-1">User</div>
																										<select name="kategori" class="form-control select2" required>
																												<option disabled selected>Pilih User</option>
																												<?php error_reporting(0);
																														$ketQuery = "SELECT * FROM tabel_member WHERE akses !='admin' ORDER BY nm_user ASC";
																														$executeSat = mysqli_query($koneksi, $ketQuery);
																														while ($k = mysqli_fetch_array($executeSat)) {
																														?>
																												<option value="<?php echo $k['id_user']; ?>"><?php echo $k['nm_user']; ?>
																												</option>
																												<?php } ?>
																										</select>
																								</div>

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
																										<select name="kategori" class="form-control select2" required>
																												<option disabled selected>Pilih Bank</option>
																												<?php
																													$ketQuery = "SELECT * FROM tabel_pembayaran WHERE kd_kategori_pembayaran ='1'";
																													$executeSat = mysqli_query($koneksi, $ketQuery);
																													while ($k = mysqli_fetch_array($executeSat)) {
																												?>
																												<option value="<?= $k['bank']; ?>"><?= $k['bank']; ?>
																												</option>
																												<?php } ?>
																										</select>
																								</div>

																								<div class="col-12 col-md-12">
																										<div class="font-small-2 mb-1">Nominal</div>
																										<fieldset class="form-group position-relative has-icon-left input-divider-left">
																												<input type="number" name="nominal" class="form-control"
																														placeholder="Isi disini" required />
																												<small class="counter-value float-right"><span class="char-count">Tanpa titik
																																dan Rupiah</span></small>
																												<div class="form-control-position"><i class="feather icon-clipboard"></i>
																												</div>
																										</fieldset>
																								</div>

																								<div class="col-12">
																										<div class="font-small-2 mb-1">Bukti Transfer</div>
																										<fieldset class="form-group">
																												<div class="custom-file">
																														<input type="file" class="custom-file-input" name="" id="image" required>
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
																		<div class="col-lg-12 col-12">
																			<ul class="list-unstyled mb-0">
																				<li class="d-inline-block mr-2 position-relative">
																						<fieldset>
																								<div class="vs-checkbox-con vs-checkbox-primary">
																										<input type="checkbox" <?= $_GET['user'] == 'member' ? 'checked' : ''  ?> value="member" id="member" onClick="link('keuangan','member')">
																										<span class="vs-checkbox">
																												<span class="vs-checkbox--check">
																														<i class="vs-icon feather icon-check"></i>
																												</span>
																										</span>
																										<span class="">Member</span>
																								</div>
																						</fieldset>
																						<?php if($jumlah_topupwd['member'] != 0) { ?>
																							<span class="badge badge-pill badge-up badge-danger font-small-2">
																								<?php echo $jumlah_topupwd['member']; ?>
																							</span>
																						<?php } ?>
																				</li>
																				<li class="d-inline-block mr-2 position-relative">
																						<fieldset>
																								<div class="vs-checkbox-con vs-checkbox-primary">
																										<input type="checkbox" <?= $_GET['user'] == 'merchant' ? 'checked' : ''  ?>  value="merchant" id="merchant" onClick="link('keuangan','merchant')">
																										<span class="vs-checkbox">
																												<span class="vs-checkbox--check">
																														<i class="vs-icon feather icon-check"></i>
																												</span>
																										</span>
																										<span class="">Merchant</span>
																								</div>
																						</fieldset>
																						<?php if($jumlah_topupwd['merchant'] != 0) { ?>
																							<span class="badge badge-pill badge-up badge-danger font-small-2">
																								<?php echo $jumlah_topupwd['merchant']; ?>
																							</span>
																						<?php } ?>
																				</li>
																				<li class="d-inline-block mr-2 position-relative">
																						<fieldset>
																								<div class="vs-checkbox-con vs-checkbox-primary">
																										<input type="checkbox" <?= $_GET['user'] == 'kurir' ? 'checked' : ''  ?>  value="kurir" id="kurir" onClick="link('keuangan','kurir')">
																										<span class="vs-checkbox">
																												<span class="vs-checkbox--check">
																														<i class="vs-icon feather icon-check"></i>
																												</span>
																										</span>
																										<span class="">Kurir</span>
																								</div>
																						</fieldset>
																						<?php if($jumlah_topupwd['kurir'] != 0) { ?>
																							<span class="badge badge-pill badge-up badge-danger font-small-2">
																								<?php echo $jumlah_topupwd['kurir']; ?>
																							</span>
																						<?php } ?>
																				</li>
																			</ul>
																			<div class="table-responsive">
																				<table class="table table-striped dataex-html5-selectors">
																						<thead>
																								<tr>
																									<th>Nama</th>
																									<th>Tanggal</th>
																									<th>Keterangan</th>
																									<th>Status</th>
																									<th>Nominal</th>
																									<th>Aksi</th>
																								</tr>
																						</thead>
																						<?php
																							if($_GET['user'] == "merchant"){
																								$ketQuery = "SELECT tk.*, mr.nm_merchant as nama FROM tabel_keuangan tk, tabel_member mb, tabel_merchant mr WHERE tk.id_member=mb.id_user and mb.id_user=mr.id_user and mb.akses='merchant' and (tk.no_faktur_pembelian = '' and tk.arus=1) order by id_keuangan asc";
																							}else if($_GET['user'] == "kurir"){
																								$ketQuery = "SELECT tk.*, mb.nm_user as nama FROM tabel_keuangan tk, tabel_member mb WHERE tk.id_member=mb.id_user and mb.akses='kurir' and (tk.no_faktur_pembelian = '' and tk.arus=1) order by id_keuangan asc";
																							}else if($_GET['user'] == "member"){
																								$ketQuery = "SELECT tk.*, mb.nm_user as nama FROM tabel_keuangan tk, tabel_member mb WHERE tk.id_member=mb.id_user and mb.akses='member' and (tk.no_faktur_pembelian = '' and tk.arus=1) order by id_keuangan asc";
																							}else{
																								$ketQuery = "";
																							}
																							$executeSat = mysqli_query($koneksi, $ketQuery);
																							while ($b = mysqli_fetch_array($executeSat)) {
																							$status = $b['status'] == 0 ? 'pending' : ($b['status'] == 1 ? 'sucess' : 'batal');
																							$ket = $b['no_faktur_pembelian'] ? 'TopUp' : 'Withdraw';
																							?>
																							<tr>
																									<td><?= $b['nama'] ?></td>
																									<td><?= $b['tanggal'] ?></td>
																									<td><?= $ket ?></td>
																									<td><?= $status ?></td>
																									<td><?= number_format($b['nominal'], 0, ",", ".") ?></td>
																									<td>
																										<input type="submit" onClick="action_transfer(1,'<?= $b['id_keuangan'] ?>')" value="Setuju" class="btn btn-primary rounded-0" />
																										<input type="submit" onClick="action_transfer(2,'<?= $b['id_keuangan'] ?>')" value="Tolak" class="btn btn-danger rounded-0" />
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
														</div>
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
	$('.table-transfer').DataTable( {
  "ordering": false
} );
});

function link(tab, user){
	if(!tab){
		window.history.replaceState(null, null, "?menu=keuangan");
	}else{
		if($("#"+user).prop("checked")){
			$("#member").prop("checked",false);
			$("#merchant").prop("checked",false);
			$("#kurir").prop("checked",false);
			$("#"+user).prop("checked",true);
			window.history.replaceState(null, null, "?menu=keuangan&tab=keuangan&user="+user);
		}else{
			$("#merchant").prop("checked",false);
			$("#kurir").prop("checked",false);
			window.history.replaceState(null, null, "?menu=keuangan&tab=keuangan&user=member");
			$("#member").prop("checked",true);
		}
		location.reload();
	}
}


function action_transfer(submit,id_keuangan){
	Swal.fire({
		title: 'Apakah anda yakin?',
		text: "",
		icon: 'warning',
		showCancelButton: true,
		cancelButtonColor: '#d33',
	}).then((result) => {
		if (result.value) {
			$.ajax({
				type: "POST",
				url: "../aksi/withdraw_acc.php",
				data: {
					id_keuangan:id_keuangan,
					submit: submit
				},
				success: function(data) {
					alert('Berhasil Update Status') ? "" : location.reload();
				}
			});
		}
	});
}
</script>