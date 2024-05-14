<?php
// Defining variables
include "./inc/koneksi.php";

if (isset($_POST['submit'])) {
  $id_user = $_POST['kategori'];
  $tanggal = $_POST['tanggal'];
  $jumlah = $_POST['nominal'];
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
<div class="card mt-1">
  <div class="divider">
    <?php
    $sql_user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*)jml FROM tabel_delivery_order WHERE sts_batal IS NULL AND pickup_id_kurir IS NULL"));
    $juml_order = isset($sql_user['jml']) ? $sql_user['jml'] : '';
    ?>
    <div class="divider-text"><?php echo $juml_order ?> Orderan Masuk</div>
  </div>
  <div class="card-content">
    <div class="font-small-2 text-center mb-3">
      <strong>Waktunya Cuan kumpul </strong>,<br>Yuk segera <i><u>ambil orderanmu</u></i>
    </div>
    <div class="card-body pre-scrollable mt-0 pt-0">

      <div class="card-content">
        <ul class="activity-timeline timeline-left list-unstyled">
          <?php
          $id_user = $_SESSION['id_user'];
          $no = 0;
          $ketQuery = "SELECT a.id, a.nm_lokasi_awal, a.det_lokasi_awal, a.lat_lokasi_awal, a.lng_lokasi_awal, a.nm_lokasi_akhir, a.det_lokasi_akhir, a.lat_lokasi_akhir, a.lng_lokasi_akhir, a.jarak_lokasi, a.durasi_perjalanan, a.rupiah,a.jenis_pembayaran, a.kendaraan, a.keterangan, a.tgl_order, a.id_user as id_member, a.nm_member, COALESCE(a.pickup_id_kurir,'-')AS pickup_id_kurir, COALESCE(a.tgl_pickup,'-')AS tgl_pickup, COALESCE(a.pickup_nm_kurir,'-')AS pickup_nm_kurir, COALESCE(b.hp ,'-')AS nomor_hp_kurir,COALESCE(a.selesai,'-')AS selesai, COALESCE(a.konfirm_selesai,'-')AS konfirm_selesai, COALESCE(a.sts_batal,'-')AS sts_batal, COALESCE(a.tgl_batal,'-')AS tgl_batal, COALESCE(a.ket_batal,'-')AS ket_batal, COALESCE(a.user_batal,'-')AS user_batal, COALESCE(c.kendaraan,'-')AS kendaraan, COALESCE(c.nomor_polisi,'-')AS nomor_polisi
															FROM tabel_delivery_order a 
															LEFT JOIN tabel_member b ON a.pickup_id_kurir = b.kode_user
															LEFT JOIN tabel_kurir c ON b.kode_user = c.id_user WHERE a.sts_batal IS NULL AND a.pickup_id_kurir IS NULL ORDER BY a.tgl_order DESC";
          $executeSat = mysqli_query($koneksi, $ketQuery);
          // var_dump($executeSat); die();
          while ($m = mysqli_fetch_array($executeSat)) {
            $no++;
            ?>
            <li>
              <div class="timeline-icon gradient-light-success">
                <img src="images/ico/ride.png" class="img-fluid round" width="25">
              </div>
              <div class="timeline-info">
                <p class="font-weight-bold text-success"><?php echo strtoupper($m['nm_member']) ?></p>
                <span class="font-small-2">Tujuan: <strong><?php echo $m['nm_lokasi_akhir'] ?> </strong> </span>
              </div>
              <a href="index.php?menu=kurir_delivery_detail&id_order=<?php echo $m['id']; ?>"
                class="btn btn-sm gradient-light-warning">
                <i class="fa-solid fa-eye"></i> detail</a>
              <a href="aksi/add_terima_order.php?id_order=<?php echo $m['id']; ?>"
                class="btn btn-sm gradient-light-success">
                <i class="fa-solid fa-hand-pointer"></i> Terima</a>

              <a href="?menu=mchat&id=<?php echo $m['id_member'] ?>" class="btn btn-sm gradient-light-info">
                <i class="fa-regular fa-comment-dots"></i> Chat
              </a>
            </li>

          <?php } ?>

          <!-- <li>
            <div class="timeline-icon gradient-light-success">
              <img src="images/ico/ride.png" class="img-fluid round" width="25">
            </div>
            <div class="timeline-info">
              <p class="font-weight-bold text-success">Ride</p>
              <span class="font-small-2">Tujuan <strong>Alamat </strong> </span>
            </div>
            <a href="" class="btn btn-sm gradient-light-success">
              <i class="fa-solid fa-hand-pointer"></i> Ambil</a>
            <a href="?menu=schat" class="btn btn-sm gradient-light-success">
              <i class="fa-regular fa-comment-dots"></i> Chat</a>
            <a href="" class="btn btn-sm gradient-light-secondary">
              Abaikan</a>
          </li> -->

          <!-- <li>
            <div class="timeline-icon gradient-light-info">
              <img src="images/ico/car.png" class="img-fluid round" width="25">
            </div>
            <div class="timeline-info">
              <p class="font-weight-bold text-info">Car</p>
              <span class="font-small-2">Tujuan <strong>Alamat </strong> </span>
            </div>
            <a href="" class="btn btn-sm gradient-light-info">
              <i class="fa-solid fa-hand-pointer"></i> Ambil</a>
            <a href="?menu=schat" class="btn btn-sm gradient-light-info">
              <i class="fa-regular fa-comment-dots"></i> Chat</a>
            <a href="" class="btn btn-sm gradient-light-secondary">
              Abaikan</a>
          </li> -->

          <!-- <li>
            <div class="timeline-icon gradient-light-danger">
              <img src="images/ico/carxl.png" class="img-fluid round" width="25">
            </div>
            <div class="timeline-info">
              <p class="font-weight-bold text-danger">CarXL</p>
              <span class="font-small-2">Tujuan <strong>Alamat </strong> </span>
            </div>
            <a href="" class="btn btn-sm gradient-light-danger">
              <i class="fa-solid fa-hand-pointer"></i> Ambil</a>
            <a href="?menu=schat" class="btn btn-sm gradient-light-danger">
              <i class="fa-regular fa-comment-dots"></i> Chat</a>
            <a href="" class="btn btn-sm gradient-light-secondary">
              Abaikan</a>
          </li> -->

          <!-- <li>
            <div class="timeline-icon gradient-light-warning">
              <img src="images/ico/send.png" class="img-fluid round" width="25">
            </div>
            <div class="timeline-info">
              <p class="font-weight-bold text-warning">Send</p>
              <span class="font-small-2">Tujuan <strong>Alamat </strong> </span>
            </div>
            <a href="" class="btn btn-sm gradient-light-warning">
              <i class="fa-solid fa-hand-pointer"></i> Ambil</a>
            <a href="?menu=schat" class="btn btn-sm gradient-light-warning">
              <i class="fa-regular fa-comment-dots"></i> Chat</a>
            <a href="" class="btn btn-sm gradient-light-secondary">
              Abaikan</a>
          </li> -->

        </ul>
      </div>

    </div>
  </div>
</div>
<div class="card mt-1">
  <div class="divider">
    <?php
    $id_user = $_SESSION['id_user'];
    // var_dump($id_user); die(); 
    
    $sql_kurir = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_member WHERE id_user = '$id_user'"));
    $kode_user = isset($sql_kurir['kode_user']) ? $sql_kurir['kode_user'] : '';

    $sql_user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(*)jml FROM tabel_delivery_order WHERE sts_batal IS NULL AND pickup_id_kurir = '$kode_user' AND konfirm_selesai IS NULL AND selesai IS NULL "));
    $juml_order = $sql_user['jml']; ?>
    <div class="divider-text"><?php echo $juml_order ?> List Orderan Yang Kamu Ambil </div>
  </div>
  <div class="card-content">
    <div class="card-body pre-scrollable mt-0 pt-0">

      <div class="card-content">
        <ul class="activity-timeline timeline-left list-unstyled">
          <?php
          $id_user = $_SESSION['id_user'];
          $no = 0;
          $ketQuery = "SELECT a.id, a.nm_lokasi_awal, a.det_lokasi_awal, a.lat_lokasi_awal, a.lng_lokasi_awal, a.nm_lokasi_akhir, a.det_lokasi_akhir, a.lat_lokasi_akhir, a.lng_lokasi_akhir, a.jarak_lokasi, a.durasi_perjalanan, a.rupiah,a.jenis_pembayaran, a.kendaraan, a.keterangan, a.tgl_order, a.id_user as id_member, a.nm_member, COALESCE(a.pickup_id_kurir,'-')AS pickup_id_kurir, COALESCE(a.tgl_pickup,'-')AS tgl_pickup, COALESCE(a.pickup_nm_kurir,'-')AS pickup_nm_kurir, COALESCE(b.hp ,'-')AS nomor_hp_kurir,COALESCE(a.selesai,'-')AS selesai, COALESCE(a.konfirm_selesai,'-')AS konfirm_selesai, COALESCE(a.sts_batal,'-')AS sts_batal, COALESCE(a.tgl_batal,'-')AS tgl_batal, COALESCE(a.ket_batal,'-')AS ket_batal, COALESCE(a.user_batal,'-')AS user_batal, COALESCE(c.kendaraan,'-')AS kendaraan, COALESCE(c.nomor_polisi,'-')AS nomor_polisi
									FROM tabel_delivery_order a 
									LEFT JOIN tabel_member b ON a.pickup_id_kurir = b.kode_user
									LEFT JOIN tabel_kurir c ON b.kode_user = c.id_user WHERE a.sts_batal IS NULL AND a.pickup_id_kurir = '$kode_user' ORDER BY a.tgl_order DESC";
          $executeSat = mysqli_query($koneksi, $ketQuery);
          // var_dump($executeSat); die();
          while ($m = mysqli_fetch_array($executeSat)) {
            $no++;
            ?>
            <li>
              <div class="timeline-icon gradient-light-success">
                <img src="images/ico/ride.png" class="img-fluid round" width="25">
              </div>
              <div class="timeline-info">
                <p class="font-weight-bold text-success"><?php echo strtoupper($m['nm_member']) ?></p>
                <span class="font-small-2">Tujuan: <strong><?php echo $m['nm_lokasi_akhir'] ?> </strong> </span>
              </div>
              <a href="index.php?menu=kurir_delivery_detail&id_order=<?php echo $m['id']; ?>"
                class="btn btn-sm gradient-light-warning">
                <i class="fa-solid fa-eye"></i> detail</a>
              <a href="?menu=mchat&id=<?php echo $m['id_member'] ?>" class="btn btn-sm gradient-light-info">
                <i class="fa-regular fa-comment-dots"></i> Chat
              </a>
              <?php if ($m['konfirm_selesai'] != 'Y') { ?>
                <a class="btn btn-sm gradient-light-success" title="Selesai Transaksi"
                  href="aksi/proses_selesai_order_kurir.php?id_order=<?php echo $m['id']; ?>&&jenis_pembayaran=<?php echo $m['jenis_pembayaran']; ?>&&id_member=<?php echo $m['id_member']; ?>&&rupiah=<?php echo $m['rupiah']; ?>">
                  <i class="fa-regular fa-save"></i> Selesai
                </a>
              <?php } else { ?>
                <a class="btn btn-sm gradient-light-success" readonly title="Transaksi Selesai" href="">
                  <i class="fa-regular fa-save"></i> Selesai
                </a>
              <?php } ?>

              <?php if ($m['konfirm_selesai'] != 'Y') { ?>
                <a class="btn btn-sm gradient-light-danger" title="Batal Order"
                  href="batal_terima_order.php?id_order=<?php echo $m['id']; ?>">
                  <i class="fa fa-close"></i>
                </a>
              <?php } ?>

            </li>

          <?php } ?>
        </ul>
      </div>

    </div>
  </div>
</div>

<script>
  $(document).ready(function () {
    if ($("#status_kurir").val() == 1) {
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
      success: function (text) {
        if (text != 0) {
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