<?php
// Defining variables
include "../inc/koneksi.php";


// Checking for a POST request

// Removing the redundant HTML characters if any exist.

?>
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
                                <li class="breadcrumb-item"><a href="index.php?menu=history" class="text-dark">Order</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#" class="text-dark">Pembayaran</a>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card" style="max-width: 530px;margin: 0 auto;">
            <div class="card-body">
                <div class="divider">
                    <div class="divider-text">
                        <h3 class="mb-3 display-4 text-uppercase">PEMBAYARAN</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-12 pb-12">
						<?php error_reporting(0);
							$noFaktur = $_GET['faktur'];
							$ketQuery = "SELECT *, DATE_ADD(tgl_pembelian, INTERVAL 1 DAY) as tgl_expired FROM tabel_pembelian as pe, tabel_pembayaran as pa WHERE pe.pembayaran = pa.kd_pembayaran AND pe.no_faktur_pembelian = '$noFaktur'";
							$executeSat = mysqli_query($koneksi, $ketQuery);
							$k = mysqli_fetch_array($executeSat)
						?>
                        <form method="post" action="../aksi/add_order_pembayaran.php" enctype="multipart/form-data">
							<input type="hidden" name="faktur" value="<?= $noFaktur ?>">
							<input type="hidden" name="bank" value="<?= $k['pembayaran'] ?>">
                            <div class="row">
                                <div class="col-12 mb-2 pb-1" style="border-bottom: 5px solid #e5e5e5;">
                                    <div class="font-small-2 mb-1">Batas akhir pembayaran</div>
                                    <h4 style="margin-top: 5px;">
										<?= $k['tgl_expired'] ?>
										<div class="float-right text-danger" id="timer">
											<span id="days" class="hidden"></span>
											<span id="hours" style="margin-right:-5px;"></span>
											<span id="minutes" style="margin-right:-5px;"></span>
											<span id="seconds"></span>
										</div>
									</h4>
                                </div>
																
                                <div class="col-12 mb-2 pb-1" style="border-bottom: 5px solid #e5e5e5;">
                                    <h4 class="pb-1" style="border-bottom: 1px solid #e5e5e5;">
										<?= $k['bank'] ?> Tranfer Bank
										<span class="float-right" style="margin-top: -20px;">
											<img src="../img/pembayaran/<?= $k['gambar'] ?>" width="55px">
										</span>
									</h4>
                                    <div><?= $k['an_rekening'] ?></div>
                                    <h4 class="mb-1" style="margin-top:2px;">
										<span id="sr"><?= $k['no_rekening'] ?> </span>
										<span class="float-right text-warning cursor-pointer" onClick="salin('sr')">
											Salin
											<i class="fas fa-files-o"></i>
										</span>
									</h4>
									
                                    <div>Total Belanja</div>
                                    <h4 style="margin-top:5px;">
										Rp. <span id="sb"><?= $k['total_biaya'] ?> </span>
										<span class="float-right text-warning cursor-pointer" onClick="salin('sb')">
											Salin
											<i class="fas fa-files-o"></i>
										</span>
									</h4>

                                </div>

                                <div class="col-12 bukti">
                                    <div class="font-small-2 mb-1">Bukti Transfer</div>
                                    <fieldset class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image" id="image" required>
                                            <label class="custom-file-label" for="image">Choose file</label>
                                        </div>
                                    </fieldset>
                                </div>

                                <div class="col-12 mt-1 mb-2 text-center konfirmasi">
                                    <input type="submit" name="submit" value="Konfirmasi Pembayaran"
                                        class="btn btn-warning rounded-0" style="color:white;" />
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END: Content-->
            </div>
        </div>
    </div>
</div>

<script>
	function salin(st) {
		let x = 0;
		copyToClipboard("#"+st)
		if(st == "sr") {
			x = "Nomor rekening berhasil disalin";
		}else{
			x = "Total Belanja berhasil disalin";
		}
		Swal.fire({
      type: 'success',
      title: x,
      showConfirmButton: false,
      timer: 1500,
      confirmButtonClass: 'btn btn-primary',
      buttonsStyling: false,
    })
	}
	
	function copyToClipboard(element) {
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val($(element).text()).select();
    document.execCommand("copy");
    $temp.remove();
	}

	function makeTimer() {
		var endTime = new Date("<?= $k['tgl_expired'] ?>");
		endTime = (Date.parse(endTime) / 1000);

		var now = new Date();
		now = (Date.parse(now) / 1000);

		var timeLeft = endTime - now;

		var days = Math.floor(timeLeft / 86400);
		if(days < 0){
			hours = 0;
			minutes = 0;
			seconds = 0;
		}else{
			var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
			var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
			var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
	
			if (hours < "10") { hours = "0" + hours; }
			if (minutes < "10") { minutes = "0" + minutes; }
			if (seconds < "10") { seconds = "0" + seconds; }
		}

		$("#days").html(days);
		$("#hours").html(hours + ":");
		$("#minutes").html(minutes + ":");
		$("#seconds").html(seconds);
		if(seconds == 0 || days < 0){
			$(".bukti").remove();
			$(".konfirmasi").remove();
		}
	}

	$(document).ready(function() {
		setInterval(function() { makeTimer(); }, 1000);
	});

</script>