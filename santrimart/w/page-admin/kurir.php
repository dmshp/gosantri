<!-- BEGIN: Content-->
<div class="app-content content">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper">
    <div class="content-header row">
      <div class="content-header-left col-md-9 col-12 mb-2">
        <div class="row breadcrumbs-top">
          <div class="col-12">
            <h2 class="content-header-title float-left mb-0 text-dark text-capitalize"><?php echo $_SESSION['akses']; ?></h2>
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?menu=home" class="text-dark">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#" class="text-dark">Kurir</a>
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
            <h3 class="mb-3 display-4 text-uppercase">Data Kurir</h3>
          </div>
        </div>
        <div class="col-lg-12 col-12">
          <div class="badge badge-primary float-right">
            <?php $sql_user = mysqli_query($koneksi, "SELECT id_kurir FROM tabel_kurir k, tabel_member m where k.id_user = m.id_user");
            $jumlah_user = mysqli_num_rows($sql_user); ?>
            <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2">
              <?php echo $jumlah_user ?></span>Total Info
          </div>
          <div class="table-responsive">
            <table class="table table-striped dataex-html5-selectors">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Daftar</th>
                  <th>Nama</th>
                  <th>Email / Hp</th>
                  <th>Motor</th>
                  <th>Ktp</th>
                  <th>Bank</th>
                  <th>Rekening</th>
                  <th>Status</th>
                  <th>Aksi Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0;
									$ketQuery = "SELECT * FROM tabel_kurir k, tabel_member m where k.id_user = m.id_user";
									$executeSat = mysqli_query($koneksi, $ketQuery);
									while ($x = mysqli_fetch_array($executeSat)) {
									$no++;
									$bank = '--';
									$norek = '--';
									$anrek = '--';
									if ($x["bank"]!='') {
										$bank = $x["bank"];
									}
									if ($x["no_rekening"]!='') {
										$norek = $x["no_rekening"];
									}
									if ($x["an_rekening"]!='') {
										$anrek = "a.n. ".$x["an_rekening"];
									}

                ?>
                  <tr>
										<td><?= $no; ?></td>
										<td><?= $x["tgl_daftar"]; ?></td>
										<td><?= $x["nm_user"]; ?></td>
                    <td class="text-capitalize">
											<div>Email : <?= $x["email_user"]; ?></div>
											<div>Hp : <?= $x["hp"]; ?></div>
										</td>
										<td>
											<div><?= $x["sepeda_motor"] . " (" . $x["sepeda_motor_tahun"] . ")" ?></div>
											<div><?= $x["nomor_polisi"]; ?></div>
										</td>
										<td><img src="../img/ktp/<?= $x['ktp'] ?>" width="35px" style="cursor:pointer;" data-target="#exampleModalCenter<?= $x['id_user'] ?>" data-toggle="modal">
										<div class="modal fade" id="exampleModalCenter<?= $x['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
												<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
														<div class="modal-content">
																<div class="modal-header">
																		<h5 class="modal-title" id="exampleModalLongTitle">KTP</h5>
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																				<span aria-hidden="true">&times;</span>
																		</button>
																</div>
																<div class="modal-body text-center">
																		<img src="../img/ktp/<?= $x['ktp'] ?>">
																</div>
														</div>
												</div>
										</div>
										</td>
										<td><?= $bank; ?></td>
										<td>
											<div><?= $norek ; ?></div>
											<div><?= $anrek ; ?></div>
										</td>
										<td><?= $x["stt_user"]; ?></td>
										<td class="text-center">
											<?php if($x['stt_user'] == "PENDING" || $x['stt_user'] == "DITOLAK"){ ?>
											<a class="badge badge-primary text-white" onclick="action_valid(`<?php echo $x['kode_user']; ?>`)">Validasi</a>
											<?php } if($x['stt_user'] == "PENDING" || $x['stt_user'] == "AKTIF"){ ?>
											<a class="badge badge-danger text-white" onclick="action_tolak(`<?php echo $x['kode_user']; ?>`)">Tolak</a>
											<?php } ?>
										</td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Content-->
  </div>
</div>

<!---------------------------------------- Modal ------------------------------------>
    <div class="modal fade" id="kurir-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Kurir</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="../aksi/edit_kurir.php" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="row">
                <div class="col-6">
                  <div class="font-small-2 mb-1">Username</div>
                  <fieldset class="form-group">
                    <div class="custom-file">
                      <input type="text" name="username" class="form-control" placeholder="Isi disini" />
                    </div>
                  </fieldset>
                </div>
                <div class="col-6">
                  <div class="font-small-2 mb-1">Email</div>
                  <fieldset class="form-group">
                    <div class="custom-file">
                      <input type="email" name="email" class="form-control" placeholder="Isi disini" />
                    </div>
                  </fieldset>
                </div>
                <div class="col-12">
                  <div class="font-small-2 mb-1">Alamat</div>
                  <fieldset class="form-group">
                    <div class="custom-file">
                      <textarea type="text" name="Alamat" rows="2" class="form-control"></textarea>
                    </div>
                  </fieldset>
                </div>
                <div class="col-6">
                  <div class="font-small-2 mb-1">Nama Bank</div>
                  <fieldset class="form-group">
                    <div class="custom-file">
                      <input type="text" name="username" class="form-control" placeholder="Isi disini" />
                    </div>
                  </fieldset>
                </div>
                <div class="col-6">
                  <div class="font-small-2 mb-1">a.n. Rekening</div>
                  <fieldset class="form-group">
                    <div class="custom-file">
                      <input type="text" name="username" class="form-control" placeholder="Isi disini" />
                    </div>
                  </fieldset>
                </div>
                <div class="col-6">
                  <div class="font-small-2 mb-1">No. Rekening</div>
                  <fieldset class="form-group">
                    <div class="custom-file">
                      <input type="text" name="username" class="form-control" placeholder="Isi disini" />
                    </div>
                  </fieldset>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="add_kategori" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!---------------------------------------- Modal ------------------------------------>

<script type="text/javascript">
  function action_valid(kode_user){
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
					url: "../aut/validasi_merchant.php",
					data: {
							kode_user: kode_user
					},
					success: function(data) {
						if (data) {
							alert('Kurir Aktif') ? "" : location.reload();
						}
					}
				});
			}
		})
  }

  function action_tolak(kode_user){
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
					url: "../aut/tolak_merchant.php",
					data: {
							kode_user: kode_user
					},
					success: function(data) {
						if (data) {
							alert('Kurir Ditolak') ? "" : location.reload();
						}
					}
				});
			}
		});
  }
</script>