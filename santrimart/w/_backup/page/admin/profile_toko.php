
<style type="text/css">
    
    .text-muted {
        color: #2a9d3d !important;
    }

    .nama-user{
/*      font-size: 15px !;*/
      animation: blink-animation 1.1s steps(3, start) infinite;
      -webkit-animation: blink-animation 1.1s steps(3, start) infinite;
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
                                <li class="breadcrumb-item"><a href="#" class="text-dark">Edit Profile Toko</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">

            <!-- account setting page start -->
            <section id="page-account-settings">
                <div class="row">

                    <!-- left menu section -->
                    <div class="col-md-2 mb-2 mb-md-0 col-12">
                        <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                            <li class="nav-item">
                                <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill"
                                    href="#account-vertical-general" aria-expanded="true"><i
                                        class="feather icon-home mr-50 font-medium-3"></i>Profile Toko</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill"
                                    href="#account-vertical-password" aria-expanded="false">
                                    <i class="feather icon-lock mr-50 font-medium-3"></i>Password</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex py-75" id="account-pill-social" data-toggle="pill"
                                    href="#account-vertical-social" aria-expanded="false"><i
                                        class="feather icon-camera mr-50 font-medium-3"></i>Social Media</a>
                            </li>


                        </ul>
                    </div>

                    <?php $a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_toko"));
                        // var_dump($a['logo_login']); die();
                     ?>

                    <!-- right content section -->
                    <div class="col-md-10 col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="tab-content">

                                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                            aria-labelledby="account-pill-general" aria-expanded="true">
                                            <form action="../aksi/edit_profile_app.php" method="post"
                                                enctype="multipart/form-data">
                                                <label for="account-name">Logo Aplikasi</label>
                                                <div class="media">
                                                    <a href="javascript: void(0);">
                                                        <img id="chosen-image1"
                                                            src="../img/logo/<?php echo $a['logo'] ?>"
                                                            class="rounded mr-75" height="64" width="64">
                                                    </a>
                                                    <div class="media-body mt-75">
                                                        <div
                                                            class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                            <label class="btn btn-sm btn-primary rounded-0 ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload1">Upload logo aplikasi</label>
                                                            <input type="file" id="account-upload1" hidden name="image">
                                                        </div>
                                                        <p class="text-muted nama-user ml-75 mt-50">
                                                            <i>
                                                                <small>File / Gambar harus berupa PNG dan Max size of 100kB</small>
                                                            </i>
                                                        </p>
                                                    </div>
                                                </div>
                                                <label for="account-name">Logo Header</label>
                                                <div class="media">
                                                    <a href="javascript: void(0);">
                                                        <img id="chosen-image2"
                                                            src="../img/logo/<?php echo $a['logo_header'] ?>"
                                                            class="rounded mr-75" height="50">
                                                    </a>
                                                    <div class="media-body mt-75">
                                                        <div
                                                            class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                            <label class="btn btn-sm btn-primary rounded-0 ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload2">Upload logo header</label>
                                                            <input type="file" id="account-upload2" hidden name="header">
                                                        </div>
                                                        <p class="text-muted nama-user ml-75 mt-50">
                                                            <i>
                                                                <small>File / Gambar harus berupa PNG dan Max size of 100kB</small>
                                                            </i>
                                                        </p>
                                                    </div>
                                                </div>
                                                <label for="account-name">Logo Login</label>
                                                <div class="media">
                                                    <a href="javascript: void(0);">
                                                        <img id="chosen-image3"
                                                            src="../img/logo/<?php echo $a['logo_login'] ?>"
                                                            class="rounded mr-75" height="100" width="100">
                                                    </a>
                                                    <div class="media-body mt-75">
                                                        <div
                                                            class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                            <label class="btn btn-sm btn-primary rounded-0 ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload3">Upload logo login</label>
                                                            <input type="file" id="account-upload3" hidden name="login">
                                                        </div>
                                                        <p class="text-muted nama-user ml-75 mt-50">
                                                            <i>
                                                                <small>File / Gambar harus berupa PNG dan Max size of 100kB</small>
                                                            </i>
                                                        </p>
                                                    </div>
                                                </div>

                                                <label for="account-name">Banner Pertama</label>
                                                <div class="media">
                                                    <a href="javascript: void(0);">
                                                        <img id="chosen-banner1"
                                                            src="../img/banner/<?php echo $a['banner1'] ?>"
                                                            class="rounded mr-75" height="350" width="100%">
                                                    </a>
                                                    <div class="media-body mt-75">
                                                        <div
                                                            class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                            <label class="btn btn-sm btn-primary rounded-0 ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-banner1">Upload banner pertama</label>
                                                            <input type="file" id="account-banner1" hidden name="banner1">
                                                        </div>
                                                        <p class="text-muted nama-user ml-75 mt-50">
                                                            <i>
                                                                <small>File / Gambar harus berupa JPG dan Max size of 100kB</small>
                                                            </i>
                                                        </p>
                                                    </div>
                                                </div>

                                                <label for="account-name">Banner Kedua</label>
                                                <div class="media">
                                                    <a href="javascript: void(0);">
                                                        <img id="chosen-banner2"
                                                            src="../img/banner/<?php echo $a['banner2'] ?>"
                                                            class="rounded mr-75" height="350" width="100%">
                                                    </a>
                                                    <div class="media-body mt-75">
                                                        <div
                                                            class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                            <label class="btn btn-sm btn-primary rounded-0 ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-banner2">Upload banner kedua</label>
                                                            <input type="file" id="account-banner2" hidden name="banner2">
                                                        </div>
                                                        <p class="text-muted nama-user ml-75 mt-50">
                                                            <i>
                                                                <small>File / Gambar harus berupa JPG dan Max size of 100kB</small>
                                                            </i>
                                                        </p>
                                                    </div>
                                                </div>

                                                <label for="account-name">Banner Ketiga</label>
                                                <div class="media">
                                                    <a href="javascript: void(0);">
                                                        <img id="chosen-banner3"
                                                            src="../img/banner/<?php echo $a['banner3'] ?>"
                                                            class="rounded mr-75" height="350" width="100%">
                                                    </a>
                                                    <div class="media-body mt-75">
                                                        <div
                                                            class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                            <label class="btn btn-sm btn-primary rounded-0 ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-banner3">Upload banner ketiga</label>
                                                            <input type="file" id="account-banner3" hidden name="banner3">
                                                        </div>
                                                        <p class="text-muted nama-user ml-75 mt-50">
                                                            <i>
                                                                <small>File / Gambar harus berupa JPG dan Max size of 100kB</small>
                                                            </i>
                                                        </p>
                                                    </div>
                                                </div>

                                                <hr class="my-1">
                                                <!-- <form novalidate> -->
                                                <input type="text" class="form-control" name="id_toko" hidden value="<?php echo $a['kd_toko'] ?>" readonly>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-name">Nama Aplikasi</label>
                                                                <input type="text" name="nama" class="form-control" value="<?php echo $a['nm_toko'] ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Alamat</label>
                                                                <input type="text" name="alamat" class="form-control" value="<?php echo $a['almt_toko'] ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Kecamatan</label>
                                                                <input type="text" name="kecamatan" class="form-control" value="<?php echo $a['kecamatan_toko'] ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Kota</label>
                                                                <input type="text" name="kota" class="form-control" value="<?php echo $a['kota_toko'] ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Nomor Telepon</label>
                                                                <input type="text" name="telepon" id="telepon" class="form-control" value="<?php echo $a['tlp_toko'] ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Tema Header</label>
                                                                <input type="text" name="style_headerfooter" id="style_headerfooter" class="form-control" value="<?php echo $a['headerfooter'] ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-sm-4 col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Background</label>
                                                                <input type="text" name="style_background" id="style_background" class="form-control" value="<?php echo $a['background'] ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-4 col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Tema Tombol</label>
                                                                <input type="text" name="style_tombol" id="style_tombol" class="form-control" value="<?php echo $a['tombol'] ?>"required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Keterangan Toko</label>
                                                                <input type="text" name="ket_toko" id="ket_toko" class="form-control" value="<?php echo $a['ket_toko'] ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6 col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Jargon Toko</label>
                                                                <input type="text" name="jargon_toko" id="jargon_toko" class="form-control" value="<?php echo $a['jargon_toko'] ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>KONTEN</label>
                                                                <textarea type="text" name="konten"class="form-control" required><?= $a['konten'] ?></textarea>
                                                                <small>ex : Nama Aplikasi, Keterangan, Jargon/Tagline,
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label>Ketentuan Download App Untuk User</label>
                                                                <textarea type="text" name="ketentuan" class="form-control" required><?= $a['ketentuan'] ?></textarea>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-sm-12">
                                                        <div class="form-group">
                                                            <div class="controls">                                 
                                                                <label>Google Map <sup class="badge badge-danger">Ganti width dengan 100%</sup></label>
                                                                <textarea class="form-control" name="google_map" rows="4" placeholder="Copy paste embbed peta disini" required><?php echo $a['google_map'] ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12" style="margin-bottom: 20px;">
                                                        <?php echo $a['google_map'] ?>
                                                    </div>
                                                    <br><br>
													<div class="col-md-12 col-sm-12" style="display: none;">
														<div class="form-group">
															<label for="checkout-landmark">Pinpoint Lokasi</label>
															<div id="map_pin" class="w-100" style="height: 400px;"></div>
															<input type="hidden" class="lat_pin" name="lat_pin" value="-7.984">
															<input type="hidden" class="lng_pin" name="lng_pin" value="<?= $a['longitude'] ?>">
														</div>
													</div>
                                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" name="upload_edit_profile_app"
                                                            class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Simpan</button>
                                                        <button type="button" class="btn btn-danger">Batal</button>
                                                    </div>
                                                </div>
                                                <!-- </form> -->
                                            </form>
                                        </div>

                                        <div class="tab-pane fade " id="account-vertical-password" role="tabpanel"
                                            aria-labelledby="account-pill-password" aria-expanded="false">
                                            <form action="../aksi/edit_profile_app.php" method="post">
                                                <div class="row">
                                                    <input type="text" class="form-control" name="id_toko" hidden
                                                        value="<?php echo $a['kd_toko'] ?>">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-old-password">Password Lama</label>
                                                                <input type="password" class="form-control" placeholder="Ketikan Password Lama" name="old_password" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-new-password">Password baru</label>
                                                                <input type="password" name="new_password" class="form-control" placeholder="Ketikan Password Baru" minlength="6" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <div class="controls">
                                                                <label for="account-retype-new-password">Ketik Ulang
                                                                    Password</label>
                                                                <input type="password" name="confirm_pass_user" class="form-control" minlength="6" placeholder="Ketikan Ulang Password Baru" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div
                                                        class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" name="upload_edit_password_toko"
                                                            class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Simpan</button>
                                                        <button type="button" class="btn btn-danger">Batal</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane fade" id="account-vertical-social" role="tabpanel"
                                            aria-labelledby="account-pill-social" aria-expanded="false">
                                            <?php
                                              $id_toko = $a['kd_toko'];
                                              $medsos = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM `tabel_medsos_toko` WHERE `id_toko` = '$id_toko'"));
                                              // var_dump($medsos);
                                              $twitter = "";
                                              $facebook = "";
                                              $google = "";
                                              $tiktok = "";
                                              $instagram = "";

                                              if ($medsos != null) {
                                                $twitter = $medsos['twitter'];
                                                $facebook = $medsos['facebook'];
                                                $google = $medsos['google'];
                                                $tiktok = $medsos['tiktok'];
                                                $instagram = $medsos['instagram'];
                                              }
                                              ?>
                                            <form action="../aksi/edit_profile_app.php" method="post">
                                                <div class="row">
                                                    <div class="col-12 mb-1">
                                                        <h5>Akun Media Sosial <span class="badge badge-dark">Tidak Wajib
                                                                Diisi</span></h5>
                                                    </div>
                                                    <hr>
                                                    <input type="text" class="form-control" name="id_toko" hidden
                                                        value="<?php echo $a['kd_toko'] ?>">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-twitter">Twitter</label>
                                                            <input type="text" name="account-twitter"
                                                                class="form-control" placeholder="Add link"
                                                                value="<?php echo $twitter ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-facebook">Facebook</label>
                                                            <input type="text" name="account-facebook"
                                                                class="form-control" placeholder="Add link"
                                                                value="<?php echo $facebook ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-google">Google+</label>
                                                            <input type="text" name="account-google"
                                                                class="form-control" placeholder="Add link"
                                                                value="<?php echo $google ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-tiktok">Tiktok</label>
                                                            <input type="text" name="account-tiktok"
                                                                class="form-control" placeholder="Add link"
                                                                value="<?php echo $tiktok ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="account-instagram">Instagram</label>
                                                            <input type="text" name="account-instagram"
                                                                class="form-control" placeholder="Add link"
                                                                value="<?php echo $instagram ?>">
                                                        </div>
                                                    </div>


                                                    <div
                                                        class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                        <button type="submit" name="upload_edit_medsos_toko"
                                                            class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Simpan</button>
                                                        <button type="button" class="btn btn-danger">Batal</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- account setting page end -->
        </div>
    </div>
</div>
<!-- END: Content-->

<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHNblfcSOZhJKO9xAgLNk36xvvqgvoJ8w">
</script>
<script type="text/javascript">
$(document).ready(function () {
	if($('.lat_pin').val() == ""){
		getLocation()
	}else{
		initMap(parseFloat($('.lat_pin').val()), parseFloat($('.lng_pin').val()))
	}
});
function getLocation() {
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition);
	} else { 
		x.innerHTML = "Geolocation is not supported by this browser.";
		initMap("add", arseFloat(-7.980498), parseFloat(112.6666))
		$('.lat_pin').val(-7.980498);
		$('.lng_pin').val(112.6666);
	}
}

function showPosition(position) {
	initMap(parseFloat(position.coords.latitude), parseFloat(position.coords.longitude))
}

function initMap(lat, long) {
		$('.lat_pin').val(lat);
		$('.lng_pin').val(long);
		// The location of Uluru
		var posisi = { lat: lat, lng: long };
		// The map, centered at Uluru
		var map = new google.maps.Map(
				document.getElementById('map_pin'), {
						zoom: 16,
						center: posisi
				});
		// The marker, positioned at Uluru
		var marker = new google.maps.Marker({
				position: posisi,
				map: map,
				title: 'Drag Ke lokasi merchant',
				//animation: google.maps.Animation.BOUNCE,
				draggable: true
		});

		google.maps.event.addListener(marker, 'dragend', function (evt) {
				$('.lat_pin').val(evt.latLng.lat().toFixed(3));
				$('.lng_pin').val(evt.latLng.lng().toFixed(3));
		});
		map.setCenter(marker.position);
		marker.setMap(map);
}
let uploadButton1 = document.getElementById("account-upload1");
let chosenImage1 = document.getElementById("chosen-image1");

uploadButton1.onchange = () => {
    let reader1 = new FileReader();
    reader1.readAsDataURL(uploadButton1.files[0]);
    reader1.onload = () => {
        chosenImage1.setAttribute("src", reader1.result);
    }
}

let uploadButton2 = document.getElementById("account-upload2");
let chosenImage2 = document.getElementById("chosen-image2");

uploadButton2.onchange = () => {
    let reader = new FileReader();
    reader.readAsDataURL(uploadButton2.files[0]);
    reader.onload = () => {
        chosenImage2.setAttribute("src", reader.result);
    }
}

let uploadButton3 = document.getElementById("account-upload3");
let chosenImage3 = document.getElementById("chosen-image3");

uploadButton3.onchange = () => {
    let reader = new FileReader();
    reader.readAsDataURL(uploadButton3.files[0]);
    reader.onload = () => {
        chosenImage3.setAttribute("src", reader.result);
    }
}

let uploadBanner1 = document.getElementById("account-banner1");
let chosenBanner1 = document.getElementById("chosen-banner1");

uploadBanner1.onchange = () => {
    let reader = new FileReader();
    reader.readAsDataURL(uploadBanner1.files[0]);
    reader.onload = () => {
        chosenBanner1.setAttribute("src", reader.result);
    }
}

let uploadBanner2 = document.getElementById("account-banner2");
let chosenBanner2 = document.getElementById("chosen-banner2");

uploadBanner2.onchange = () => {
    let reader = new FileReader();
    reader.readAsDataURL(uploadBanner2.files[0]);
    reader.onload = () => {
        chosenBanner2.setAttribute("src", reader.result);
    }
}

let uploadBanner3 = document.getElementById("account-banner3");
let chosenBanner3 = document.getElementById("chosen-banner3");

uploadBanner3.onchange = () => {
    let reader = new FileReader();
    reader.readAsDataURL(uploadBanner3.files[0]);
    reader.onload = () => {
        chosenBanner3.setAttribute("src", reader.result);
    }
}

</script>