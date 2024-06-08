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

	a:hover{
	     cursor: pointer;
	     text-decoration: unset;
    }

    .heading_anchor{
        background: #8142b1 !important; 
        color: #fff !important;
    }

    .define_height{
         height: 750px;
    }

    .badge.badge-up {
	    position: absolute;
	    top: 8.5rem;
	    right: 0rem;
	}

    .badge.badge-success {
	    background-color: #17db53;
	}

	.btn-succes {
	    border-color: #27f566 !important;
	    color: #FFFFFF !important;
	}

	.btn-succes:hover {
	    border-color: #15b15a !important;
	    color: #FFFFFF !important;
	    box-shadow: 0 8px 25px -8px #08bb57 !important;
	}
	.text-title {
		background-color: #2991b9; 
		padding: 5px 10px 5px 10px; 
		border-radius: 6px; color: white; 
		margin-bottom: 15px;
	}

	.nama-user{
	    font-size: 14px;
	    animation: blink-animation 1.1s steps(3, start) infinite;
	    -webkit-animation: blink-animation 1.1s steps(3, start) infinite;
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

	.badge2-success {
	    color: #FFFFFF;
	    background-color: #1dd355;
	}

	.badge2 {
	    display: inline-block;
	    padding: 0.7em 0.7em;
	    font-size: 80%;
	    font-weight: 700;
	    line-height: 1;
	    text-align: center;
	    white-space: nowrap;
	    vertical-align: baseline;
	    border-radius: 0.25rem;
	    -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
	    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
	}

</style>
	
<link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/ui/prism.min.css">
<div class="app-content content pt-1">
	<div class="content-overlay"></div>
	<div class="content-wrapper pt-0">
		<section id="statistics-card">
			<div class="card">
    			<div class="card-body">
    				<div class="divider">
	                    <div class="divider-text">
	                        <h3 class="mb-3 display-4 text-uppercase">Delivery Order</h3>
	                    </div>
	                </div>
	                <div class="badge badge-primary float-right">
                      <?php 
                      $sql_user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*)jml FROM tabel_delivery_order WHERE sts_batal IS NULL AND pickup_id_kurir IS NULL"));
                      $juml_order = isset($sql_user['jml']) ? $sql_user['jml'] : '';
                      ?>
                      <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2 nama-user">
                        <?php echo $juml_order ?></span>Total Order Masuk
                    </div>
	                <div class="table-responsive">
	                	<table class="table table-striped dataex-html5-selectors">
	                		<thead>
		                        <tr>
		                            <th class="text-center">NO</th>
		                            <th class="text-center">TGL ORDER</th>
		                            <th class="text-center">NAMA USER</th>
		                            <th class="text-center">LOKASI JEMPUT</th>
		                            <th class="text-center">LOKASI TUJUAN</th>
		                            <th class="text-center">AKSI</th>
		                        </tr>
	                        </thead>
	                        <tbody>
	                        <?php 
	                            $id_user = $_SESSION['id_user'];
	                            $no = 0;    
	                            $ketQuery = "SELECT a.id, a.nm_lokasi_awal, a.det_lokasi_awal, a.lat_lokasi_awal, a.lng_lokasi_awal, a.nm_lokasi_akhir, a.det_lokasi_akhir, a.lat_lokasi_akhir, a.lng_lokasi_akhir, a.jarak_lokasi, a.durasi_perjalanan, a.rupiah,a.jenis_pembayaran, a.kendaraan, a.keterangan, a.tgl_order, a.id_user as id_member, a.nm_member, COALESCE(a.pickup_id_kurir,'-')AS pickup_id_kurir, COALESCE(a.tgl_pickup,'-')AS tgl_pickup, COALESCE(a.pickup_nm_kurir,'-')AS pickup_nm_kurir, COALESCE(b.hp ,'-')AS nomor_hp_kurir,COALESCE(a.selesai,'-')AS selesai, COALESCE(a.konfirm_selesai,'-')AS konfirm_selesai, COALESCE(a.sts_batal,'-')AS sts_batal, COALESCE(a.tgl_batal,'-')AS tgl_batal, COALESCE(a.ket_batal,'-')AS ket_batal, COALESCE(a.user_batal,'-')AS user_batal, COALESCE(c.sepeda_motor,'-')AS sepeda_motor, COALESCE(c.nomor_polisi,'-')AS nomor_polisi
															FROM tabel_delivery_order a 
															LEFT JOIN tabel_member b ON a.pickup_id_kurir = b.kode_user
															LEFT JOIN tabel_kurir c ON b.kode_user = c.id_user WHERE a.sts_batal IS NULL AND a.pickup_id_kurir IS NULL ORDER BY a.tgl_order DESC";
	                            $executeSat = mysqli_query($koneksi, $ketQuery);
	                            // var_dump($executeSat); die();
	                            while ($m=mysqli_fetch_array($executeSat)) {
	                            $no++;
	                        ?>                                  
	                          <tr>
	                            <td class="text-center"><?= $no; ?></td>
	                            <td class="text-center"><?php echo date('d-m-Y H:i:s', strtotime($m['tgl_order'])) ?></td>
	                            <td class="text-capitalize"><?php echo strtoupper($m['nm_member']) ?></td>
	                            <td class="text-left"><?php echo $m['nm_lokasi_awal'] ?></td>
	                            <td class="text-left"><?php echo $m['nm_lokasi_akhir'] ?></td>
	                            <td class="text-center">
	                            	<a type="button" class="badge2 badge-warning text-white" readonly title="Info Detail" href="index.php?menu=kurir_delivery_detail&id_order=<?php echo $m['id']; ?>">
		                                <i class="fas fa-search"></i>
		                            </a>

		                            <?php
					                      $id_user = $_SESSION['id_user'];
					                      // var_dump($id_user); die(); 
					                      $sql_kurir = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_member WHERE id_user = '$id_user'"));
					                      $kode_user = $sql_kurir['kode_user'];

					                      $sql_user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*)jml FROM tabel_delivery_order WHERE sts_batal IS NULL AND pickup_id_kurir = '$kode_user' AND konfirm_selesai IS NULL AND selesai IS NULL "));
					                      $jml_order = $sql_user['jml']; ?>
					                      <?php if($jml_order == '0' ){ ?>
	                              <a type="button" class="badge2 badge2-success text-white" title="Terima Order"  href="../aksi/add_terima_order.php?id_order=<?php echo $m['id']; ?>">
	                                	<i class="fa fa-check-square-o"></i>
	                              </a>
	                            <?php } ?>
	                            </td>
	                          </tr>
	                             <?php } ?>                                                  
	                        </tbody>
	                	</table>
	                </div>
				</div>
			</div>
		</section>

		<section id="statistics-card">
			<div class="card">
    			<div class="card-body">
    				<div class="divider">
	                    <div class="divider-text">
	                        <h3 class="mb-3 display-4 text-uppercase">My Order Delivery</h3>
	                    </div>
	                </div>
	                <div class="badge badge-primary float-right">
                      <?php
                      $id_user = $_SESSION['id_user'];
                      // var_dump($id_user); die(); 

                      $sql_kurir = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_member WHERE id_user = '$id_user'"));
                      $kode_user = isset($sql_kurir['kode_user']) ? $sql_kurir['kode_user'] : '';

                      $sql_user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*)jml FROM tabel_delivery_order WHERE sts_batal IS NULL AND pickup_id_kurir = '$kode_user' AND konfirm_selesai IS NULL AND selesai IS NULL "));
                      $juml_order = $sql_user['jml']; ?>
                      <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2 nama-user">
                        <?php echo $juml_order ?></span>Total Order Masuk
                    </div>
	                <div class="table-responsive">
	                	<table class="table table-striped dataex-html5-selectors">
	                		<thead>
		                        <tr>
		                            <th class="text-center">NO</th>
		                            <th class="text-center">TGL ORDER</th>
		                            <th class="text-center">NAMA USER</th>
		                            <th class="text-center">LOKASI JEMPUT</th>
		                            <th class="text-center">LOKASI TUJUAN</th>
		                            <th class="text-center" rowspan="2">AKSI</th>
		                        </tr>
	                        </thead>
	                        <tbody>
	                        <?php 
	                            $id_user = $_SESSION['id_user'];
	                            $no = 0;    
	                            $ketQuery = "SELECT a.id, a.nm_lokasi_awal, a.det_lokasi_awal, a.lat_lokasi_awal, a.lng_lokasi_awal, a.nm_lokasi_akhir, a.det_lokasi_akhir, a.lat_lokasi_akhir, a.lng_lokasi_akhir, a.jarak_lokasi, a.durasi_perjalanan, a.rupiah,a.jenis_pembayaran, a.kendaraan, a.keterangan, a.tgl_order, a.id_user as id_member, a.nm_member, COALESCE(a.pickup_id_kurir,'-')AS pickup_id_kurir, COALESCE(a.tgl_pickup,'-')AS tgl_pickup, COALESCE(a.pickup_nm_kurir,'-')AS pickup_nm_kurir, COALESCE(b.hp ,'-')AS nomor_hp_kurir,COALESCE(a.selesai,'-')AS selesai, COALESCE(a.konfirm_selesai,'-')AS konfirm_selesai, COALESCE(a.sts_batal,'-')AS sts_batal, COALESCE(a.tgl_batal,'-')AS tgl_batal, COALESCE(a.ket_batal,'-')AS ket_batal, COALESCE(a.user_batal,'-')AS user_batal, COALESCE(c.sepeda_motor,'-')AS sepeda_motor, COALESCE(c.nomor_polisi,'-')AS nomor_polisi
									FROM tabel_delivery_order a 
									LEFT JOIN tabel_member b ON a.pickup_id_kurir = b.kode_user
									LEFT JOIN tabel_kurir c ON b.kode_user = c.id_user WHERE a.sts_batal IS NULL AND a.pickup_id_kurir = '$kode_user' ORDER BY a.tgl_order DESC";
	                            $executeSat = mysqli_query($koneksi, $ketQuery);
	                            // var_dump($executeSat); die();
	                            while ($m=mysqli_fetch_array($executeSat)) {
	                            $no++;
	                        ?>                                  
	                          <tr>
	                            <td class="text-center"><?= $no; ?></td>
	                            <td class="text-center"><?php echo date('d-m-Y H:i:s', strtotime($m['tgl_order'])) ?></td>
	                            <td class="text-capitalize"><?php echo strtoupper($m['nm_member']) ?></td>
	                            <td class="text-left"><?php echo $m['nm_lokasi_awal'] ?></td>
	                            <td class="text-left"><?php echo $m['nm_lokasi_akhir'] ?></td>
	                            <td class="text-center">
	                            	<a type="button" class="badge2 badge-warning text-white" readonly title="Info Detail" href="index.php?menu=kurir_delivery_detail&id_order=<?php echo $m['id']; ?>">
		                                <i class="fas fa-search"></i>
		                            </a>

	                            	<?php if($m['konfirm_selesai'] != 'Y' ){ ?>
		                            <a type="button" class="badge2 badge2-success text-white" title="Selesai Transaksi" href="../aksi/proses_selesai_order_kurir.php?id_order=<?php echo $m['id']; ?>&&jenis_pembayaran=<?php echo $m['jenis_pembayaran']; ?>&&id_member=<?php echo $m['id_member']; ?>&&rupiah=<?php echo $m['rupiah']; ?>">
		                                <i class="fas fa-save"></i>
		                            </a>
		                            <?php } else { ?>
		                           	<a type="button" class="badge2 badge-info text-white" readonly title="Transaksi Selesai" href="">
		                                <i class="fas fa-save"></i>
		                            </a>
		                            <?php } ?>

		                            <?php if($m['konfirm_selesai'] != 'Y' ){ ?>
		                            <a type="button" class="badge2 badge-danger text-white" title="Batal Order"  href="../aksi/batal_terima_order.php?id_order=<?php echo $m['id']; ?>">
		                                <i class="fa fa-close"></i>
		                            </a>
		                            <?php } ?>
	                            </td>
	                          </tr>
	                             <?php } ?>                                                  
	                        </tbody>
	                	</table>
	                </div>
				</div>
			</div>
		</section>
	</div>
</div>
<!-- END: Content-->
<script>
	$(document).ready(function(){
		if($("#status_kurir").val() == 1){
			getLocation();
			setInterval(getLocation, 5000);
		}
		
		$(".alamat_user strong").remove()
		$(".alamat_user div:nth-child(1), .alamat_user div:nth-child(3), .alamat_user p").remove()
		$(".alamat_user").removeClass("hidden")
	});
	
	
	function getLocation() {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(showPosition);
		} else {
			updateStatus("", "")
		}
	}

	function showPosition(position) {
		updateStatus(position.coords.latitude, position.coords.longitude)
	}

	function updateStatus(lat = "", lng = "") {
		$.ajax({
			url: "../aksi/edit_kurir_status.php",
			type: "post",
			data: { lat: lat, lng: lng, status: 1 },
			success: function(text) {
				if(text != 0){
					Swal.fire(
						'Status aktif',
						'terima orderan / non aktifkan status',
						'warning'
					)
					setTimeout(() => {
						location.replace("index.php?menu=home");
					}, 3000);
				}
			}
		})
	}

</script>