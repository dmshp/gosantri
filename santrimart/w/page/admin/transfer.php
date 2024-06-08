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
                                <li class="breadcrumb-item"><a href="#" class="text-dark">User Tranfer</a>
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
                        <h3 class="mb-3 display-4 text-uppercase">USER TRANSFER</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="badge badge-primary float-right">
                            <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2 nama-user">
                                <?php echo $jumlah_transfer; ?>
                            </span>
                            Belum disetujui
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-transfer">
                                <thead>
                                    <tr>
                                        <th>No Faktur</th>
                                        <th>Tanggal</th>
                                        <th>Pembayaran</th>
                                        <th>Nominal</th>
                                        <th>Bukti Transfer</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $ketQuery = "SELECT bp.id_bukti, bp.tgl_bukti, bp.gmb_bukti, bp.status, p.no_faktur_pembelian, total_biaya, pa.an_rekening, pa.no_rekening, pa.bank, tk.nominal FROM tabel_bukti_pembayaran as bp LEFT JOIN tabel_pembelian as p ON p.id_bukti = bp.id_bukti LEFT JOIN tabel_pembayaran as pa ON pa.kd_pembayaran = p.pembayaran OR pa.kd_pembayaran = bp.bank LEFT JOIN tabel_keuangan as tk ON tk.id_bukti = bp.id_bukti and tk.no_faktur_pembelian='topup' order by bp.status,bp.tgl_bukti asc";
                                        $executeSat = mysqli_query($koneksi, $ketQuery);
                                        while ($b = mysqli_fetch_array($executeSat)) {
                                        ?>
                                    <tr>
                                        <td><?= !$b['no_faktur_pembelian'] ? 'topup' : $b['no_faktur_pembelian'] ?></td>
                                        <td><?= $b['tgl_bukti'] ?></td>
                                        <td><?= $b["bank"] ?>
    										<?php if($b["an_rekening"] != ""){ ?>
    											<div>AN : <?= $b["an_rekening"] ?></div>
    											<div>NO : <?= $b["no_rekening"] ?></div>
    										<?php } ?>
    									</td>
                                        <td>Rp.<?= number_format(!$b['total_biaya'] ? $b['nominal'] : $b['total_biaya'], 0, ",", "."); ?></td>

                                        <td>
    											<?php if($b["gmb_bukti"] != ""){ ?>
    											<img src="../img/buktiBayar/<?= $b['gmb_bukti'] ?>" width="35px" style="cursor:pointer;" data-target="#exampleModalCenter<?= $b['no_faktur_pembelian'] ?>" data-toggle="modal">
    										<div class="modal fade" id="exampleModalCenter<?= $b['no_faktur_pembelian'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Bukti Transfer</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <img src="../img/buktiBayar/<?= $b['gmb_bukti'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        	</div>
											<?php } ?>
										</td>
                                        <td>
											<?php if($b['status'] == "0" || $b['status'] == "2"){ ?>
											<input type="submit" onClick="action_transfer('Setuju','<?= $b['no_faktur_pembelian'] ?>','<?= $b['id_bukti'] ?>','<?= $b["bank"] ?>')" value="Setuju" class="btn btn-primary rounded-0" />
											<?php } if($b['status'] == "0" || $b['status'] == "1"){ ?>
											<input type="submit" onClick="action_transfer('Tolak','<?= $b['no_faktur_pembelian'] ?>','<?= $b['id_bukti'] ?>','<?= $b["bank"] ?>')" value="Tolak" class="btn btn-danger rounded-0" />
											<?php } ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
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
	$('.table-transfer').DataTable( {
  "ordering": false
} );
});


function action_transfer(submit,faktur,id_bukti,bank){
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
				url: "../aksi/edit_transfer_status.php",
				data: {
					faktur:faktur,
					id_bukti:id_bukti,
					submit: submit,
					bank: bank
				},
				success: function(data) {
					alert('Berhasil Update Status') ? "" : location.reload();
				}
			});
		}
	});
}
</script>