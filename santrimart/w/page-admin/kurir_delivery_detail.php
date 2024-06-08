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

	.btn-success {
    color: #FFFFFF;
    background-color: #28C76F !important;
    border-color: #28C76F !important;
	}

	.display-5 {
    font-size: 2.3rem;
    font-weight: 500;
    line-height: 1.2;
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

         		<?php 
                $id_order = $_GET['id_order'];
                $no = 0;    
                $ketQuery = "SELECT a.id, a.nm_lokasi_awal, a.det_lokasi_awal, a.lat_lokasi_awal, a.lng_lokasi_awal, a.nm_lokasi_akhir, a.det_lokasi_akhir, a.lat_lokasi_akhir, a.lng_lokasi_akhir, a.jarak_lokasi, a.durasi_perjalanan, a.rupiah,a.jenis_pembayaran, a.kendaraan, a.keterangan, a.tgl_order, COALESCE(a.pickup_id_kurir,'-')AS pickup_id_kurir, COALESCE(a.tgl_pickup,'-')AS tgl_pickup, COALESCE(a.pickup_nm_kurir,'-')AS pickup_nm_kurir, COALESCE(b.hp ,'-')AS nomor_hp_kurir,COALESCE(a.selesai,'-')AS selesai, COALESCE(a.konfirm_selesai,'-')AS konfirm_selesai, COALESCE(a.sts_batal,'-')AS sts_batal, COALESCE(a.tgl_batal,'-')AS tgl_batal, COALESCE(a.ket_batal,'-')AS ket_batal, COALESCE(a.user_batal,'-')AS user_batal, COALESCE(c.sepeda_motor,'-')AS sepeda_motor, COALESCE(c.nomor_polisi,'-')AS nomor_polisi
								FROM tabel_delivery_order a 
								LEFT JOIN tabel_member b ON a.pickup_id_kurir = b.kode_user
								LEFT JOIN tabel_kurir c ON b.kode_user = c.id_user
								WHERE a.id = '$id_order' ORDER BY a.tgl_order DESC";
                $executeSat = mysqli_query($koneksi, $ketQuery);
                while ($m=mysqli_fetch_array($executeSat)) {
                $no++;
            ?> 

            <div class="row">
            	<div class="col-12" style="margin-top: 10px; margin-bottom: 50px;">
	            	<input type="hidden" name="latitude" id="latitude" readonly>
	              <input type="hidden" name="longitude" id="longitude" readonly>
	              <input type="hidden" name="origin" id="origin" readonly value="<?php echo $m['det_lokasi_awal']?>"/>
	              <input type="hidden" name="ori_latitude" id="ori_latitude" readonly value="<?php echo $m['lat_lokasi_awal']?>">
	              <input type="hidden" name="ori_longitude" id="ori_longitude" readonly value="<?php echo $m['lng_lokasi_awal']?>">
	              <input type="hidden" name="ori_name" id="ori_name" readonly value="<?php echo $m['nm_lokasi_awal']?>">
	              <input type="hidden" name="destination" id="destination" readonly value="<?php echo $m['det_lokasi_akhir']?>"/>
	            	<input type="hidden" name="des_latitude" id="des_latitude" readonly value="<?php echo $m['lat_lokasi_akhir']?>">
	              <input type="hidden" name="des_longitude" id="des_longitude" readonly value="<?php echo $m['lng_lokasi_akhir']?>">
	              <input type="hidden" name="des_name" id="des_name" readonly value="<?php echo $m['nm_lokasi_akhir']?>">
	              <input type="hidden" name="jarak" id="jarak" readonly value="<?php echo $m['jarak_lokasi']?>">
	              <input type="hidden" name="durasi" id="durasi" readonly value="<?php echo $m['durasi_perjalanan']?>">
	              <input type="hidden" name="tot_rupiah" id="tot_rupiah" readonly value="<?php echo $m['rupiah']?>">
	              <input type="hidden" name="travel_mode" id="travel_mode" readonly value="<?php echo $m['jenis_pembayaran']?>">
	              <input type="hidden" class="form-control" id="from_places" readonly value="<?php echo $m['det_lokasi_awal']?>"/>
	              <input type="hidden" class="form-control" id="to_places" readonly value="<?php echo $m['det_lokasi_akhir']?>"/>
	              <div id="map" style="height: 600px; width: 100%; margin-bottom: 30px;" ></div>
	              <button type="button" class="btn btn-success btn-xs float-right" id="btn_cari" name="btn_cari" title="Cari">
               		<i class="fas fa-search"></i> &nbsp; LIHAT RUTE MAP
               	</button> &nbsp;
              </div>
            </div>

            <div class="divider nama-user">
	            <div class="divider-text">
	                <h3 class="mb-3 display-5">Detail Delivery Order </h3>
	            </div>
	          </div>

            <div class='row'>

              <!-- <div class="col-xs-12"> -->
            	<div class="col-md-6 col-sm-6 col-xs-12">
            		<div class="form-group">
							    <label for="email">Tanggal Order</label>
							    <input type="text" class="form-control" readonly value="<?php echo date('d-m-Y H:i:s', strtotime($m['tgl_order']))?>">
								</div>
								<div class="form-group">
								    <label for="email">Lokasi Penjemputan</label>
								    <input type="text" class="form-control" readonly value="<?php echo $m['nm_lokasi_awal']?>">
								</div>
								<div class="form-group">
								    <label for="pwd">Alamat Penjemputan</label>
								    <input type="text" class="form-control" readonly value="<?php echo $m['det_lokasi_awal']?>">
							  	</div>
							  	<div class="form-group">
								    <label for="email">Lokasi Tujuan</label>
								    <input type="text" class="form-control" readonly value="<?php echo $m['nm_lokasi_akhir']?>">
								</div>
								<div class="form-group">
								    <label for="pwd">Alamat Tujuan</label>
								    <input type="text" class="form-control" readonly value="<?php echo $m['det_lokasi_akhir']?>">
							  	</div>
							  	<div class="form-group">
								    <label for="pwd">Jarak Tempuh</label>
								    <input type="text" class="form-control" readonly value="<?php echo $m['jarak_lokasi']?> KM., (Rp. <?php echo number_format($m['rupiah'])?>)">
							  	</div>
            	</div>
            	<div class="col-md-6 col-sm-6 col-xs-12">
            		<div class="form-group">
								    <label for="email">Nama Kurir</label>
								    <input type="text" class="form-control" readonly value="<?php echo strtoupper($m['pickup_nm_kurir'])?>">
								</div>
								<div class="form-group">
								    <label for="email">Kendaraan</label>
								    <input type="text" class="form-control" readonly value="<?php echo strtoupper($m['sepeda_motor'])?>, [ <?php echo strtoupper($m['nomor_polisi'])?> ]">
								</div>
								<div class="form-group">
								    <label for="email">Status Batal</label>
								    <?php if($m['sts_batal'] == '1'){ ?>
								    <input type="text" class="form-control" readonly value="<?php echo date('d-m-Y H:i:s', strtotime($m['tgl_order']))?>, [ <?php echo strtoupper($m['user_batal'])?> ]">
									<?php } else { ?>
									<input type="text" class="form-control" readonly value="-">
									<?php } ?>
								</div>
								<div class="form-group">
								    <label for="email">Keterangan Batal</label>
								    <input type="text" class="form-control" readonly value="<?php echo strtoupper($m['ket_batal'])?>">
								</div>
							    <?php if($m['konfirm_selesai'] == 'Y'){ ?>
								<div class="form-group">
								    <label for="email">Status Order : </label>
								    <span class="badge badge-success text-white nama-user">SELESAI</span>
								</div>
						    <?php } ?>
            	</div>
              <!-- </div> -->
		            
		        </div> 
            <?php } ?>
	                
				</div>
			</div>
		</section>

	</div>
</div>
<!-- END: Content-->
<script>
	$(document).ready(function(){
		
		navigator.geolocation.getCurrentPosition((position) => {
	    $("#latitude").val(`${position.coords.latitude}`);
	    $("#longitude").val(`${position.coords.longitude}`);
		});

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
    	// alert(travel_mode);
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
        // var travel_mode = $('#travel_mode').val();

        var kendaraan = $('#travel_mode').val();
        if (kendaraan = 'Mobil') {
        	var travel_mode = 'DRIVING';
        } else if (kendaraan = 'Motor') {
        	var travel_mode = 'WALKING';
        }

        var directionsDisplay = new google.maps.DirectionsRenderer({'draggable': false});
        var directionsService = new google.maps.DirectionsService();
       	displayRoute(travel_mode, origin, destination, directionsService, directionsDisplay);
        calculateDistance(travel_mode, origin, destination);
    });

	});

</script>

<script defer src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDRLyfpZFV4Un7iP3AaT45e2cIanre21Hs" type="text/javascript"></script>