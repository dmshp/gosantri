<!-- BEGIN: Content-->
  <div class="app-content content pt-0">
    <div class="content-overlay"></div>
    <div class="content-wrapper pt-0">
     <div class="content-body">
<!-- account setting page start -->
       	<section id="page-account-settings">
         	<div class="row">
<!-- left menu section -->
						<div class="col-md-3 mb-0">
							<ul class="nav nav-pills flex-column mt-md-0 mt-1">
								<li class="nav-item">
										<a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true"><i class="fas fa-user mr-50 font-medium-3"></i>Profile</a>
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
						<?php $a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_member WHERE nm_user = '$_SESSION[nm_user]'")); ?>
						<!-- right content section -->
						<div class="col-md-9">
							<div class="card mb-1">
								<div class="card-content">
									<div class="card-body">
										
										<div class="tab-content">
												
											<div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
												<form method="post" action="../aksi/edit_profile.php" enctype="multipart/form-data">
													<div class="media">
														<a href="javascript: void(0);">
															<img src="../img/user/<?php echo $a['foto'] ?>" class="rounded mr-75" height="64" width="64" onerror="this.src='../img/user/default.png';" id="output"/>
														</a>
														<div class="media-body mt-75">
															<div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
																<label class="btn btn-sm btn-primary rounded-0 ml-50 mb-50 mb-sm-0 cursor-pointer" for="account-upload">Upload foto baru</label>
																	<input type="file" name="image" id="account-upload" accept="image/*" onchange="loadFile(event)" hidden>
															</div>
															<p class="text-muted ml-75 mt-50">
																<small>JPG, JPEG or PNG. Max size 1mb</small>
															</p>
														</div>
													</div>
													<hr class="my-1">
													<div class="row">                                                       
														<div class="col-12">
															<div class="form-group">
																<div class="controls">
																	<label for="account-name">Nama</label>
																	<input type="text" class="form-control" name="nm_user" value="<?php echo $a['nm_user'] ?>" disabled>
																</div>
															</div>
														</div>
														
														<div class="col-12">
															<div class="form-group">
																<div class="controls">
																	<label for="account-e-mail">E-mail</label>
																		<input type="email" class="form-control" name="email" value="<?php echo $a['email_user'] ?>">
																</div>
															</div>
														</div>
														
														<div class="col-12">
															<div class="form-group">
																<div class="controls">
																		<label for="account-e-mail">No Hp</label>
																				<input type="text" class="form-control" name="hp" value="<?php echo $a['hp'] ?>">
																	</div>
																</div>
														</div>
														
														<div class="col-12">
															<div class="form-group">
																<div class="controls">
																		<label for="account-e-mail">Alamat</label>
																				<textarea class="form-control" name="alamat" id="accountTextarea" rows="2" placeholder="Tulis disini."><?php echo $a['alamat_user'] ?></textarea>
																	</div>
																</div>
														</div>
																														
														<div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
																<input type="submit" name="update_profile" value="Simpan" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
																<a href="../aut/logout.php" class="btn btn-danger mr-sm-1 mb-1 mb-sm-0 float-right">Keluar Aplikasi</a>
														</div>
												</form>
											</div>
										</div>
																							
										<div class="tab-pane fade " id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
										<form  method="post" action="../aksi/edit_profile.php">
												<div class="row">
													
													<div class="col-12">
														<div class="form-group">
															<div class="controls">
																<label for="account-old-password">Password Lama</label>
																	<input type="password" name="oldPassword" class="form-control">
															</div>
														</div>
													</div>
																														
													<div class="col-12">
														<div class="form-group">
															<div class="controls">
																<label for="account-new-password">Password baru</label>
																<input type="password" name="newPassword" class="form-control" placeholder="New Password" minlength="6">
															</div>
														</div>
												</div>
																														
												<div class="col-12">
													<div class="form-group">
														<div class="controls">
															<label for="account-retype-new-password">Ketik Ulang Password</label>
																<input type="password" name="newPassword2" class="form-control" minlength="6">
														</div>
													</div>
												</div>
												
												<div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
														<input type="submit" name="update_password" value="Simpan" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
												</div>
											</div>
										</form>
										</div>

										<?php $k = mysqli_fetch_array(mysqli_query($koneksi, "SELECT status FROM tabel_kurir WHERE id_kurir = '$_SESSION[id_kurir]'")); ?>
										<input type="hidden" value="<?= $k['status'] ?>" id="status_kurir">

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
<script>
  var loadFile = function(event) {
		if(event.target.files[0].size > 1000000){
			Swal.fire('Max 1mb','','error');
			return false;
		}
		if(event.target.files[0].type == "image/png" || event.target.files[0].type == "image/jpeg" || event.target.files[0].type == "image/jng"){
			console.log("aman")
		}else{
			Swal.fire('Format gambar jpg/jpeg/png','','error');
			return false;
		}
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) // free memory
    }
  };

	$(document).ready(function(){
		if($("#status_kurir").val() == 1){
			getLocation();
			setInterval(getLocation, 5000);
		}
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

    