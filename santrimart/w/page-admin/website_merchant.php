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
               <h2 class="content-header-title float-left mb-0 text-dark text-capitalize"><?php echo $_SESSION['akses'];?></h2>
               <div class="breadcrumb-wrapper col-12">
                 <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="index.php?menu=home" class="text-dark">Home</a></li>
                   <li class="breadcrumb-item"><a href="#" class="text-dark">Akun <?php echo $_SESSION['nm_user'];?></a></li>                 </ol>
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
          <div class="col-md-3 mb-2 mb-md-0">
            <ul class="nav nav-pills flex-column mt-md-0 mt-1">
               <li class="nav-item">
                   <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true"><i class="fas fa-user mr-50 font-medium-3"></i>Profile <?php echo $_SESSION['nm_user'];?></a>
               </li>
               <li class="nav-item">
                   <a class="nav-link d-flex py-75" id="account-pill-general" data-toggle="pill" href="#account-vertical-store" aria-expanded="true"><i class="fas fa-home mr-50 font-medium-3"></i>Setting Toko</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                      <i class="feather icon-lock mr-50 font-medium-3"></i>Password</a>
               </li>              
               <li class="nav-item">
									<a class="nav-link d-flex py-75" id="account-pill-social" data-toggle="pill" href="#account-vertical-social" aria-expanded="false"><i class="fas fa-book mr-50 font-medium-3"></i>Rekening</a>
               </li>
              
               
             </ul>
           </div>
<?php $a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_member mb, tabel_merchant mr WHERE mb.kode_user=mr.id_user and mb.kode_user = '$_SESSION[kode_user]'")); ?>
<!-- right content section -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                  
									<div class="tab-content">

										<div role="tabpanel" class="tab-pane active" id="account-vertical-general"
												aria-labelledby="account-pill-general" aria-expanded="true">
												<form action="../aksi/edit_merchant.php" method="post"
														enctype="multipart/form-data">
														<div class="media">
																<a href="javascript: void(0);">
																		<img id="chosen-image1"
																				src="../img/toko/<?php echo $a['foto'] ?>"
																				class="rounded mr-75" height="64" width="64">
																</a>
																<div class="media-body mt-75">
																		<div
																				class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
																				<label
																						class="btn btn-sm btn-primary rounded-0 ml-50 mb-50 mb-sm-0 cursor-pointer"
																						for="account-upload">Upload new logo</label>
																				<input type="file" id="account-upload" hidden name="image">
																		</div>
																		<p class="text-muted ml-75 mt-50">
																				<small>Allowed JPG, GIF or PNG. Max size of 100kB</small>
																		</p>
																</div>
														</div>
														<hr class="my-1">
														<!-- <form novalidate> -->
														<input type="text" class="form-control" name="id_merchant" hidden
																value="<?php echo $a['id_merchant'] ?>">
														<div class="row">
																<div class="col-12">
																		<div class="form-group">
																				<div class="controls">
																						<label for="account-name">Name</label>
																						<input type="text" name="nm_merchant" class="form-control"
																								value="<?php echo $a['nm_merchant'] ?>">
																				</div>
																		</div>
																</div>

																<div class="col-12">
																		<div class="form-group">
																				<div class="controls">
																						<label for="account-name">No Hp</label>
																						<input type="text" name="hp" class="form-control"
																								value="<?php echo $a['hp'] ?>">
																				</div>
																		</div>
																</div>

																<div class="col-12">
																		<div class="form-group">
																					<div class="controls">
																						<label>Alamat</label>
																						<input type="text" name="alamat_user" class="form-control"
																								value="<?php echo $a['alamat_user'] ?>">
																				</div>
																		</div>
																</div>

																<div class="col-md-12 col-sm-12">
																		<div class="form-group">
																				<label for="checkout-landmark">Pinpoint Lokasi</label>
																				<div id="map_pin" class="w-100" style="height: 400px;"></div>
																				<input type="hidden" readonly class="lat_pin" name="lat_pin" value="<?= $a['latitude'] ?>">
																				<input type="hidden" readonly class="lng_pin" name="lng_pin" value="<?= $a['longitude'] ?>">
																		</div>
																</div>

																<div
																		class="col-12 d-flex flex-sm-row flex-column justify-content-end">
																		<input type="submit" name="update_profile" value="Simpan" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
																</div>
														</div>
														<!-- </form> -->
												</form>
										</div>

										<div class="tab-pane fade " id="account-vertical-store" role="tabpanel" aria-labelledby="account-pill-social" aria-expanded="false">
											<div class="media">
													<a href="javascript: void(0);">
															<img id="chosen-image1"
																	src="../img/toko/<?php echo $a['foto'] ?>"
																	class="rounded mr-75" height="64" width="64">
													</a>
													<div class="media-body mt-75">
															<br>
															<p class="text-muted ml-75 mt-50">
																	<small><?php echo $a['nm_merchant'] ?></small>
															</p>
													</div>
											</div>
											<hr class="my-1">
											<!-- <form novalidate> -->
											<input type="text" class="form-control" name="id_merchant" hidden
													value="<?php echo $a['id_merchant'] ?>">
											<div class="row">
												<?php 
                        $akses = $_SESSION['kode_user'];

                        $sql_user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(a.id_user)jml FROM tabel_setting_toko a WHERE a.id_user = '$akses'"));
                        $jumlah = $sql_user['jml']; 
                        ?>
                        <?php if ($jumlah == 0) { ?>
                        	<div class="col-12">
                        		<form action="../aksi/add_setting_jam_toko.php" method="post" enctype="multipart/form-data">
														<div class="form-group">
															<div class="controls">
																<label for="account-old-password">Toko belum disetting</label>
															</div>
														</div>
                          	<center>
                          		<button type="submit" class="btn btn-primary btn-block" id="btn_setting_toko" name="btn_setting_toko">
                          		 Setting Toko Sekarang
                          		</button>
                          	</center>
                          	</form>
													</div>
                        <?php } else { ?>
												<div class="table-responsive">
                          <table class="table table-striped dataex-html5-selectors" id="tableSettingToko" name="tableSettingToko">
                            <thead>
                              <tr>
                                <th class="text-center">NO</th>
                                <th class="text-center">HARI</th>
                                <th class="text-center">JAM AWAL</th>
                                <th class="text-center">JAM AKHIR</th>
                                <th class="text-center">STATUS</th>
                                <th class="text-center">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                            	<?php 
                                  $akses = $_SESSION['kode_user'];
                                  $no = 0;    
                                  $ketQuery = "SELECT * FROM tabel_setting_toko a  WHERE a.id_user = '$akses'";
                                  $executeSat = mysqli_query($koneksi, $ketQuery);
                                  while ($m=mysqli_fetch_array($executeSat)) {
                                  $no++;
                              ?>                                  
                              <tr>
                                <td class="text-center"><?= $no; ?></td>

                                <?php if($m['hari'] == '1'){ ?>
                                	<td class="text-center">Senin</td>
                              	<?php } else if($m['hari'] == '2'){ ?>
                              		<td class="text-center">Selasa</td>
                              	<?php } else if($m['hari'] == '3'){ ?>
                              		<td class="text-center">Rabu</td>
                              	<?php } else if($m['hari'] == '4'){ ?>
                              		<td class="text-center">Kamis</td>
                              	<?php } else if($m['hari'] == '5'){ ?>
                              		<td class="text-center">Jum'at</td>
                              	<?php } else if($m['hari'] == '6'){ ?>
                              		<td class="text-center">Sabtu</td>
                              	<?php } else if($m['hari'] == '7'){ ?>
                              		<td class="text-center">Minggu</td>
                              	<?php } ?>
                                <td class="text-center"><?php echo $m['jam_awal'] ?></td>
                                <td class="text-center"><?php echo $m['jam_akhir'] ?></td>
                                 <?php if($m['aktif'] == '1'){ ?>
                                	<td class="text-center">
                                    <span class="badge badge-success text-white">Toko Buka</span>
                                	</td>
                              	<?php } else { ?>
                              		<td class="text-center">
                                    <span class="badge badge-danger text-white">Toko Tutup</span>
                                	</td>
                              	<?php } ?>
                                <td class="text-center">
                                  <a title="Ubah Jam Toko" onclick="updateSettingToko(`<?php echo $m['id_setting'] ?>`,`<?php echo $m['hari'] ?>`,`<?php echo $m['jam_awal'] ?>`,`<?php echo $m['jam_akhir'] ?>`)">
                                    <i class="fas fa-edit"></i>
                                  </a>
                                  <a href="" title="Buka / Tutup Toko" onclick="updateStatusToko(`<?php echo $m['id_setting'] ?>`)">
                                    <i class="fas fa-check"></i>
                                  </a>
                                </td>
                              </tr>
															<?php } ?>
                            </tbody>
                          </table>
                        </div>
												<?php } ?>	
											</div>
										</div>
                                            
										<div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
											<form  method="post" action="../aksi/edit_profile.php">
													<div class="row">
														
														<div class="col-12">
															<div class="form-group">
																<div class="controls">
																	<label for="account-old-password">Password Lama</label>
																		<input type="password" name="oldPassword" class="form-control" placeholder="Ketikan Password Lama">
																</div>
															</div>
														</div>
																															
														<div class="col-12">
															<div class="form-group">
																<div class="controls">
																	<label for="account-new-password">Password baru</label>
																	<input type="password" name="newPassword" class="form-control" placeholder="Ketikan Password Baru" minlength="6">
																</div>
															</div>
														</div>
																															
														<div class="col-12">
															<div class="form-group">
																<div class="controls">
																	<label for="account-retype-new-password">Ketik Ulang Password</label>
																		<input type="password" name="newPassword2" class="form-control" placeholder="Ketikan Ulang Password Baru" minlength="6">
																</div>
															</div>
														</div>
													
													<div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
															<input type="submit" name="update_password" value="Simpan" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
													</div>
												</div>
											</form>
										</div>
																									
										<div class="tab-pane fade " id="account-vertical-social" role="tabpanel" aria-labelledby="account-pill-social" aria-expanded="false">
											<form method="post" action="../aksi/edit_profile.php">
												<div class="row">

													<div class="col-12">
														<div class="form-group">
																<label for="account-bank">Bank</label>
																<input type="text" class="form-control" name="bank" value="<?= $a['bank'] ?>">
														</div>
													</div>
													<div class="col-12">
														<div class="form-group">
																<label for="account-an">Nama Rekening</label>
																<input type="text" class="form-control" name="an_rekening" value="<?= $a['an_rekening'] ?>">
														</div>
													</div>
													<div class="col-12">
														<div class="form-group">
																<label for="account-no">Nomor Rekening</label>
																<input type="text" class="form-control" name="no_rekening" value="<?= $a['no_rekening'] ?>">
														</div>
													</div>
																															
																															
													<div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
														<input type="submit" name="update_rekening" value="Simpan" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
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

<div id="modal_edit_setting_toko" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        <h4 class="modal-title">Ubah Jam Operasional Toko</h4>
      </div>
      <form action="../aksi/update_setting_jam_toko.php" method="post" enctype="multipart/form-data">
      <div class="modal-body">
      	<input type="hidden" class="form-control" name="edit_id" id="edit_id" readonly>
        <div class="row">
        	<div class="col-4">
						<div class="form-group">
								<label for="nama-hari">Hari</label>
								<input type="text" class="form-control" name="edit_hari" id="edit_hari" readonly>
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
								<label for="nama-hari">Jam Buka</label>
								<input type="text" class="form-control" name="edit_jam_awal" id="edit_jam_awal" readonly>
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
								<label for="nama-hari">Jam Tutup</label>
								<input type="text" class="form-control" name="edit_jam_akhir" id="edit_jam_akhir" readonly>
						</div>
					</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" name="btn_simpan_setting_toko" class="btn btn-success btn-sm">SIMPAN</button>
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">BATAL</button>
      </div>
    	</form>
    </div>

  </div>
</div>

    

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHNblfcSOZhJKO9xAgLNk36xvvqgvoJ8w"> </script>


<script type="text/javascript">
	$(document).ready(function () {
		if($('.lat_pin').val() == ""){
			getLocation()
		}else{
			initMap(parseFloat($('.lat_pin').val()), parseFloat($('.lng_pin').val()))
		}

		$('#edit_jam_awal, #edit_jam_akhir').pickatime({
      format:'H:i',
      interval: 15, // 15 minutes
      //minTime: getCurrentTime(new Date())
    });

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
	let uploadButton1 = document.getElementById("account-upload");
	let chosenImage1 = document.getElementById("chosen-image1");

	uploadButton1.onchange = () => {
	    let reader = new FileReader();
	    reader.readAsDataURL(uploadButton1.files[0]);
	    reader.onload = () => {
	        chosenImage1.setAttribute("src", reader.result);
	    }
	}

	function updateStatusToko(id) {
    console.log(id);
    $.ajax({
      type: "GET",
      url: "../aksi/update_status_toko.php?id_setting=" + id,
      async: false,
      success: function(text) {
        alert(text);
      }
    });
  }

  function updateSettingToko(id, hari, jam_awal, jam_akhir) {

  	if (hari == 1) {
			$('#edit_hari').val('Senin');
  	} else if (hari == 2) {
			$('#edit_hari').val('Selasa');
  	} else if (hari == 3) {
			$('#edit_hari').val('Rabu');
  	} else if (hari == 4) {
			$('#edit_hari').val('Kamis');
  	} else if (hari == 5) {
			$('#edit_hari').val('Jum`at');
  	} else if (hari == 6) {
			$('#edit_hari').val('Sabtu');
  	} else if (hari == 7) {
			$('#edit_hari').val('Minggu');
  	}

  	$('#edit_id').val(id);
		$('#edit_jam_awal').val(jam_awal);
		$('#edit_jam_akhir').val(jam_akhir);

  	$('#modal_edit_setting_toko').modal('show');
  }


</script>