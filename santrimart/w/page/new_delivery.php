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

    .badge.badge-success {
      background-color: #27f566;
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
      font-size: 15px !;
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

<div class="card mt-2"> 
  <div class="content-wrapper">
   <div class="content-detached content-right">
    <div class="content-body">
	 <div class="divider">
		<div class="divider-text">Delivery Order</div>
	 </div>
                      
<div class="shop-content-overlay"></div>
 
<section id="ecommerce-products" class="grid-view">

  <div class='row'>
    <div class='col-md-4 col-12'>
      <div class="text-title nama-user">
        <center>
          <span>
              <strong>AYO TENTUKAN DESTINASIMU SEKARANG</strong>, Cukup masukkan <i><u>lokasi awal dan lokasi tujuan</u></i> kemana Kamu ingin pergi.
            </span>
        </center>
      </div>
        <div class='well define_height'>
          <?php 
            $id_user = $_SESSION['id_user'];
            $sql_order = mysqli_fetch_array(mysqli_query($koneksi, "SELECT COUNT(*)jml FROM tabel_delivery_order a WHERE a.id_user = '$id_user' AND a.sts_batal IS NULL AND a.konfirm_selesai IS NULL"));
            $hasil = isset($sql_order['jml']) ? $sql_order['jml'] : '';

            // var_dump($hasil); die();

            $sql_mobile = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_tarif_delivery WHERE jenis_order = 'Ojek Online' AND jenis_kendaraan = 'Mobil'"));
            $rupiah_mobil = $sql_mobile['tarif']; 

            $sql_motor = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_tarif_delivery WHERE jenis_order = 'Ojek Online' AND jenis_kendaraan = 'Motor'"));
            $rupiah_motor = $sql_motor['tarif'];

            $sql_saldo = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(z.id_user)id_user, SUM(z.tanggal)tanggal,SUM( z.jumlah)jumlah, SUM(z.pengeluaran)pengeluaran, SUM(z.ket_saldo)ket_saldo, SUM(z.jml)jml FROM (SELECT '' AS id_user, '' AS tanggal, '' AS jumlah, '' AS pengeluaran, '' AS ket_saldo, COUNT(*)jml FROM tabel_saldo WHERE id_user = '$id_user' UNION all
              SELECT y.id_user, y.tanggal, y.jumlah, y.pengeluaran, y.ket_saldo, y.jml FROM (
              SELECT x.id_user, x.tanggal, x.jumlah, x.pengeluaran, x.ket_saldo, x.jml FROM (
              SELECT distinct id_user, tanggal, jumlah, pengeluaran, ket_saldo, '0' AS jml FROM tabel_saldo WHERE id_user = '$id_user' ORDER BY tanggal DESC) x LIMIT 1)y)z"));
            $nilai = $sql_saldo['jml'];
            $jml_saldo = $sql_saldo['jumlah'];
            // var_dump($hasil); die();
            ?>
        <input type="hidden" name="latitude" id="latitude" readonly>
            <input type="hidden" name="longitude" id="longitude" readonly>
            <input type="hidden" name="tarif_mobil" id="tarif_mobil" value="<?php echo $rupiah_mobil;?>" readonly>
            <input type="hidden" name="tarif_motor" id="tarif_motor" value="<?php echo $rupiah_motor;?>" readonly>
              <form action="../aksi/add_delivery_member.php" method="POST" enctype="multipart/form-data" id="distance_form">
              <div class="form-group">
                  <label>Lokasi Penjemputan</label>
                  <input class="form-control" id="from_places" placeholder="Lokasi Penjemputan" required/>
                  <br>
                  <button type="button" class="btn btn-primary btn-xs" onclick="getCurrentPosition()">
                    <i class="fas fa-map-marker-alt"></i> &nbsp;
                    PILIH LOKASI SEKARANG
                </button>
              </div>
                <input type="hidden" name="origin" id="origin" required="" readonly/>
                <input type="hidden" name="ori_latitude" id="ori_latitude" readonly>
                <input type="hidden" name="ori_longitude" id="ori_longitude" readonly>
                <input type="hidden" name="ori_name" id="ori_name" readonly>
              <div class="form-group">
                  <label>Lokasi Tujuan</label>
                  <input class="form-control" id="to_places" placeholder="Lokasi Tujuan" required/>
              </div>
                <input type="hidden" name="destination" id="destination" required="" readonly/>
                <input type="hidden" name="des_latitude" id="des_latitude" readonly>
                <input type="hidden" name="des_longitude" id="des_longitude" readonly>
                <input type="hidden" name="des_name" id="des_name" readonly>
                <input type="hidden" name="jarak" id="jarak" readonly>
                <input type="hidden" name="durasi" id="durasi" readonly>
                <input type="hidden" name="tot_rupiah" id="tot_rupiah" readonly>
              <div class="form-group">
                  <label>Pilih Jenis Kendaraan</label>
                  <select class="form-control" id="travel_mode" name="travel_mode" required>
                      <option value="">-pilih kendaraan-</option>
                      <option value="DRIVING">Mobil</option>
                      <option value="WALKING">Motor</option>
                      <!-- <option value="BICYCLING">Motor</option> -->
                      <!-- <option value="TRANSIT">Transit</option> -->
                  </select>
              </div>
              <div class="form-group">
                  <label>Pilih Jenis Pembayaran</label>
                  <select class="form-control" id="jns_pembayaran" name="jns_pembayaran" required>
                    <?php if($nilai == '0' ){ ?>
                        <option value="">-pilih pembayaran-</option>
                        <!-- <option value="SALDO">Saldo</option> -->
                        <option value="CASH">Tunai</option>
                      <?php } else if($jml_saldo <= '20000' ){ ?>
                        <option value="">-pilih pembayaran-</option>
                        <!-- <option value="SALDO">Saldo</option> -->
                        <option value="CASH">Tunai</option>
                      <?php } else { ?>
                        <option value="">-pilih pembayaran-</option>
                        <option value="SALDO">Saldo</option>
                        <option value="CASH">Tunai</option>
                      <?php } ?>
                  </select>
              </div>
              <div class="form-group">
                  <label for="exampleFormControlInput1">Keterangan</label>
                  <textarea class="form-control" name="keterangan" cols="30" rows="4" placeholder="Tambahkan Keterangan" required></textarea>
              </div>
              <button type="button" class="btn btn-secondary btn-sm" id="btn_cari" name="btn_cari" title="Cari">
                <i class="fas fa-search"></i>
              </button> &nbsp;
              <button type="button" class="btn btn-warning btn-sm" id="btn_cari" name="btn_cari" title="Refresh" onclick="window.location.reload()">
                <i class="fas fa-refresh"></i>
              </button> &nbsp;
              <?php if($hasil == '0' ){ ?>
              <button type="submit" class="btn btn-primary btn-sm" id="btn_cari" name="btn_cari" title="Proses Simpan Data">
                SIMPAN
              </button>
              <?php } ?>
            </form>
            <div class="row" style="padding-top: 20px;">
              <div class="container">
                  <p class="nama-user" id="in_mile" style="display: none;"></p>
                  <p class="nama-user" id="in_kilo"></p>
                  <p class="nama-user" id="duration_text"></p>
                  <p class="nama-user" id="rupiah_text"></p>
              </div>
            </div>
        </div>
    </div>
    <div class='col-md-8 col-12'>
       <noscript>
          <div class='alert alert-info'>
             <h4>Your JavaScript is disabled</h4>
             <p>Please enable JavaScript to view the map.</p>
          </div>
       </noscript>
       <div id="map" style="height: 800px; width: 100%" ></div>
    </div>
  </div> 

</section>
  </div>
 </div>
 </div>
</div>

<div class="card mt-2"> 
  <div class="content-wrapper">
    <div class="content-detached content-right">
      <div class="content-body">
        <div class="divider">
          <div class="divider-text">Riwayat Delivery Order</div>
        </div>
        <div class="shop-content-overlay"></div>
 
        <section class="grid-view2">
          <div class="card">
            <div class="card-content">
                <div class="col-12">

                  <?php 
                    $id_user = $_SESSION['id_user'];
                    $no = 0;    
                    $ketQuery = "SELECT a.id, a.nm_lokasi_awal, a.det_lokasi_awal, a.lat_lokasi_awal, a.lng_lokasi_awal, a.nm_lokasi_akhir, a.det_lokasi_akhir, a.lat_lokasi_akhir, a.lng_lokasi_akhir, a.jarak_lokasi, a.durasi_perjalanan, a.rupiah,a.jenis_pembayaran, a.kendaraan, a.keterangan, a.tgl_order, COALESCE(a.pickup_id_kurir,'-')AS pickup_id_kurir, COALESCE(a.tgl_pickup,'-')AS tgl_pickup, COALESCE(a.pickup_nm_kurir,'-')AS pickup_nm_kurir, COALESCE(b.hp ,'-')AS nomor_hp_kurir,COALESCE(a.selesai,'-')AS selesai, COALESCE(a.konfirm_selesai,'-')AS konfirm_selesai, COALESCE(a.sts_batal,'-')AS sts_batal, COALESCE(a.tgl_batal,'-')AS tgl_batal, COALESCE(a.ket_batal,'-')AS ket_batal, COALESCE(a.user_batal,'-')AS user_batal, COALESCE(c.sepeda_motor,'-')AS sepeda_motor, COALESCE(c.nomor_polisi,'-')AS nomor_polisi FROM tabel_delivery_order a 
                    LEFT JOIN tabel_member b ON a.pickup_id_kurir = b.kode_user
                    LEFT JOIN tabel_kurir c ON b.kode_user = c.id_user
                    WHERE a.id_user = '$id_user' ORDER BY a.tgl_order DESC";
                    $executeSat = mysqli_query($koneksi, $ketQuery);
                    while ($m=mysqli_fetch_array($executeSat)) {
                    $no++;
                  ?>

                  <div class="btn box-affiliate-member" href="">
                    <input type="hidden" class="form-control" readonly name="id_order" id="id_order" value="<?php echo $m['id'];?>">
                    <div class="col-12" style="">
                      <div class="controls">
                        <h5 class="font-small-3" style="color: black; font-weight:600;"><?php echo $m['nm_lokasi_awal'] ?></i> - <i><?php echo $m['nm_lokasi_akhir'] ?></h5>
                      </div>
                    </div>
                    <div class="col-12">
                      <h6 class="font-small-1" style="color: gray; margin-bottom: 15px;">
                        <i><?php echo date('d-m-Y H:i:s', strtotime($m['tgl_order'])) ?></i>
                      </h6>
                    </div>
                    <?php if($m['sts_batal'] == '1'){ ?>
                    <div class="col-12">
                      <h5 class="font-small-1 nama-user" style="color: green;"><?php echo strtoupper($m['user_batal']) ?> <i> [<?php echo date('d-m-Y H:i:s', strtotime($m['tgl_batal'])) ?>]</i></h5>
                      <h6 class="font-small-1 nama-user" style="color: red;"><?php echo $m['ket_batal'] ?></h6>
                    </div>
                    <?php } else { ?>
                      <!-- <h5 class="font-small-2">-</h5> -->
                    <?php } ?>
                    <div class="swiper-wrapper">
                      <div class="col-12">
                        <a type="button" class="badge2 badge-warning text-white" readonly title="Info Detail" href="index.php?menu=delivery_detail&id_order=<?php echo $m['id']; ?>">
                            <i class="fas fa-search"></i>
                        </a>
                        <?php if($m['sts_batal'] == null){ ?>
                        <a type="button" class="badge2 badge2-success text-white" title="Selesai Perjalanan" href="../aksi/proses_selesai_order_member.php?id_order=<?php echo $m['id']; ?>">
                            <i class="fas fa-save"></i>
                        </a>
                        <?php } else if($m['sts_batal'] == null && $m['selesai'] == null){ ?>
                        <a type="button" class="badge2 badge2-success text-white" title="Selesai Perjalanan" href="../aksi/proses_selesai_order_member.php?id_order=<?php echo $m['id']; ?>">
                            <i class="fas fa-save"></i>
                        </a>
                        <?php } ?>
                        <?php if($m['sts_batal'] != '1' && $m['selesai'] != 'Y'){ ?>
                        <a type="button" class="badge2 badge-danger text-white" id="btn_batal_order" name="btn_batal_order" title="Batal Order">
                            <i class="fa fa-close"></i>
                        </a>
                        <?php } ?>
                      </div>
                    </div>
                  </div>

                  <?php } ?>   

                </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div id="modal_batal_order" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title">Batalkan Delivery</h4>
      </div>
        <form action="../aksi/batal_delivery_order.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
            <input type="hidden" class="form-control" name="id_batal_order" id="id_batal_order" readonly>
            <div class="row">
              <div class="col-12">
                      <label for="exampleFormControlInput1">Alasan dibatalkan</label>
                      <textarea class="form-control" name="keterangan_batal" cols="30" rows="5" placeholder="Tambahkan Alasan dibatalkan" required></textarea>
                  </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn2 btn-inline-success btn-sm">Simpan</button>
          <button type="button" class="btn2 btn-inline-danger btn-sm" data-dismiss="modal">Tutup</button>
        </div>
        </form>
    </div>

  </div>
</div>

<script>  
$(document).ready(function () {
  $('#travel_mode').select2();
  $('#jns_pembayaran').select2();
  navigator.geolocation.getCurrentPosition((position) => {
      $("#latitude").val(`${position.coords.latitude}`);
      $("#longitude").val(`${position.coords.longitude}`);
  });

  $('#btn_batal_order').click(function() {
    $('#id_batal_order').val($('#id_order').val());
    $('#modal_batal_order').modal('show');
  })
});

$(function () {
  
    var origin, destination, map;

    // add input listeners
    google.maps.event.addDomListener(window, 'load', function (listener) {
        setDestination();
        // initMap();
        var latitude = $("#latitude").val();
    var longitude = $("#longitude").val();
    initMap(latitude, longitude);
    });

    // init or load map
    function initMap(latitude, longitude) {

        var myLatLng = {
          // lat: -7.217428,
          // lng: 112.7271187
            lat: Math.floor(latitude),
            lng: Math.floor(longitude)
        };
        map = new google.maps.Map(document.getElementById('map'), {zoom: 13, center: myLatLng,});
    }

    function setDestination() {
        var from_places = new google.maps.places.Autocomplete(document.getElementById('from_places'));
        var to_places = new google.maps.places.Autocomplete(document.getElementById('to_places'));

        google.maps.event.addListener(from_places, 'place_changed', function () {
            var from_place = from_places.getPlace();
            var from_address = from_place.formatted_address;
            $('#origin').val(from_address);
            $('#ori_latitude').val(from_place.geometry.location.lat());
            $('#ori_longitude').val(from_place.geometry.location.lng());
            $('#ori_name').val(from_place.name);
        });

        google.maps.event.addListener(to_places, 'place_changed', function () {
            var to_place = to_places.getPlace();
            var to_address = to_place.formatted_address;
            $('#destination').val(to_address);
          $('#des_latitude').val(to_place.geometry.location.lat());
          $('#des_longitude').val(to_place.geometry.location.lng());
          $('#des_name').val(to_place.name);
        });


    }

    function displayRoute(travel_mode, origin, destination, directionsService, directionsDisplay) {
        directionsService.route({
            origin: origin,
            destination: destination,
            travelMode: travel_mode,
            avoidTolls: true
        }, function (response, status) {
            if (status === 'OK') {
                directionsDisplay.setMap(map);
                directionsDisplay.setDirections(response);
            } else {
                directionsDisplay.setMap(null);
                directionsDisplay.setDirections(null);
                alert('Could not display directions due to: ' + status);
            }
        });
    }

    // calculate distance , after finish send result to callback function
    function calculateDistance(travel_mode, origin, destination) {

        var DistanceMatrixService = new google.maps.DistanceMatrixService();
        DistanceMatrixService.getDistanceMatrix(
            {
                origins: [origin],
                destinations: [destination],
                travelMode: google.maps.TravelMode[travel_mode],
                unitSystem: google.maps.UnitSystem.IMPERIAL, // miles and feet.
                // unitSystem: google.maps.UnitSystem.metric, // kilometers and meters.
                avoidHighways: false,
                avoidTolls: false
            }, save_results);
    }

    // save distance results
    function save_results(response, status) {

        if (status != google.maps.DistanceMatrixStatus.OK) {
            $('#result').html(err);
        } else {
            var origin = response.originAddresses[0];
            var destination = response.destinationAddresses[0];
            if (response.rows[0].elements[0].status === "ZERO_RESULTS") {
                $('#result').html("Sorry , not available to use this travel mode between " + origin + " and " + destination);
            } else {
                
                var kendaraan = $('#travel_mode').val();
                if (kendaraan = 'DRIVING') {
                  var tarif = $('#tarif_mobil').val();
                } else if (kendaraan = 'WALKING') {
                  var tarif = $('#tarif_motor').val();
                }

                var distance = response.rows[0].elements[0].distance;
                var duration = response.rows[0].elements[0].duration;
                var distance_in_kilo = distance.value / 1000; // the kilo meter
                var distance_in_mile = distance.value / 1609.34; // the mile
                var duration_text = duration.text;
                var total_rupiah = distance_in_kilo * tarif; // Total tarif ojek

                appendResults(distance_in_kilo, distance_in_mile, duration_text, total_rupiah);
                sendAjaxRequest(origin, destination, distance_in_kilo, distance_in_mile, duration_text);
            }
        }
    }

    // append html results
    function appendResults(distance_in_kilo, distance_in_mile, duration_text, total_rupiah) {
        $("#result").removeClass("hide");
        $('#in_mile').html(" Distance in Mile: <span class='badge badge-pill badge-primary'>" + distance_in_mile.toFixed(2) + "</span>");
        $('#in_kilo').html("Estimasi jarak tempuh : <span class='badge badge-pill badge-primary'>" + distance_in_kilo.toFixed(2) + " KM</span>");
        $('#duration_text').html("Estimasi waktu : <span class='badge badge-pill badge-success'>" + duration_text + "</span>");
        $('#rupiah_text').html("Estimasi waktu : <span class='badge badge-pill badge-warning'>Rp. " + total_rupiah.toLocaleString('en-US') + "</span>");
        $('#jarak').val(distance_in_kilo.toFixed(2));
        $('#durasi').val(duration_text);
        $('#tot_rupiah').val(total_rupiah);
    }

    // send ajax request to save results in the database
    

    // on submit  display route ,append results and send calculateDistance to ajax request
    $('#btn_cari').click(function(e) {
    // $('#distance_form').submit(function (e) {
        e.preventDefault();
        var origin = $('#origin').val();
        var destination = $('#destination').val();
        var travel_mode = $('#travel_mode').val();
        var directionsDisplay = new google.maps.DirectionsRenderer({'draggable': false});
        var directionsService = new google.maps.DirectionsService();
        displayRoute(travel_mode, origin, destination, directionsService, directionsDisplay);
        calculateDistance(travel_mode, origin, destination);
    });

});

// get current Position
function getCurrentPosition() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(setCurrentPosition);
    } else {
        alert("Geolocation is not supported by this browser.")
    }
}

// get formatted address based on current position and set it to input
function setCurrentPosition(pos) {
    var geocoder = new google.maps.Geocoder();
    var latlng = {lat: parseFloat(pos.coords.latitude), lng: parseFloat(pos.coords.longitude)};
    geocoder.geocode({ 'location' :latlng  }, function (responses) {
        console.log(responses);
        if (responses && responses.length > 0) {
            $("#origin").val(responses[1].formatted_address);
            $("#from_places").val(responses[1].formatted_address);
            //    console.log(responses[1].formatted_address);
        } else {
            alert("Cannot determine address at this location.")
        }
    });
}


</script>

<script defer src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDRLyfpZFV4Un7iP3AaT45e2cIanre21Hs" type="text/javascript"></script>
