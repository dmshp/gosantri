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
            <h2 class="content-header-title float-left mb-0 text-dark text-capitalize"><?php echo $_SESSION['akses']; ?></h2>
            <div class="breadcrumb-wrapper col-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php?menu=home" class="text-dark">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#" class="text-dark">Pembayaran</a>
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
            <h3 class="mb-3 display-4 text-uppercase">Data Pembayaran</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-5 col-12 pb-5">
            <form method="post" action="../aksi/add_pembayaran.php" enctype="multipart/form-data">
              <div class="row">
                <div class="col-8">
                  <div class="font-small-2 mb-1">
                    Kategori
                  </div>
                  <select name="kategori" class="form-control select2">
                    <option disabled selected>Pilih Kategori</option>
										<?php error_reporting(0);
										$ketQuery = "SELECT * FROM tabel_kategori_pembayaran";
										$executeSat = mysqli_query($koneksi, $ketQuery);
										while ($k = mysqli_fetch_array($executeSat)) {
										?>
											<option value="<?php echo $k['kd_kategori_pembayaran']; ?>"> <?php echo $k['nm_kategori_pembayaran']; ?> </option>
										<?php } ?>
                  </select>
                </div>
                <div class="col-4 pb-1">
                  <div class="font-small-2 mb-1">Urutan</div>
                  <fieldset>
                    <div class="input-group">
                      <input type="text" name="urutan" class="form-control" placeholder="Tulis disini!">
                    </div>
                  </fieldset>
                </div>
                <div class="col-12 pb-1 mt-1">
                  <div class="font-small-2 mb-1">Bank</div>
                  <fieldset>
                    <div class="input-group">
                      <input type="text" name="bank" class="form-control" placeholder="Tulis disini!">
                    </div>
                  </fieldset>
									<fieldset>
											<div class="vs-checkbox-con vs-checkbox-primary">
													<input type="checkbox" name="upload_bukti" checked value="false">
													<span class="vs-checkbox">
															<span class="vs-checkbox--check">
																	<i class="vs-icon feather icon-check"></i>
															</span>
													</span>
													<span class="">Upload Bukti Transfer</span>
											</div>
									</fieldset>
                </div>
                <div class="col-6 pb-1">
                  <div class="font-small-2 mb-1">An Rekening</div>
                  <fieldset>
                    <div class="input-group">
                      <input type="text" name="an_rekening" class="form-control" placeholder="Tulis disini!">
                    </div>
                  </fieldset>
                </div>
                <div class="col-6 pb-1">
                  <div class="font-small-2 mb-1">No Rekening</div>
                  <fieldset>
                    <div class="input-group">
                      <input type="text" name="no_rekening" class="form-control" placeholder="Tulis disini!">
                    </div>
                  </fieldset>
                </div>

                <div class="col-6">
                  <div class="font-small-2 mb-1">Deskripsi</div>
                  <fieldset class="form-label-group mb-0">
                    <textarea data-length=100 name="desc" class="form-control char-textarea" rows="2" placeholder="Isi disini"></textarea>
                  </fieldset>
                  <small class="counter-value float-right"><span class="char-count">maks.</span> / 100 karakter</small>
                </div>

                <div class="col-4 col-md-6 mb-2">
                  <div class="font-small-2 mb-1">icon</div>
                  <span class="position-absolute" onclick="delete_image1()">&times;</span>
                  <figure class="image-container">
                      <img id="chosen-image1" style="width: 30% !important">
                  </figure>

                  <input class="input-image" type="file" id="upload-button1" name="image">
                  <label class="label-images" for="upload-button1" style="color:white;">
                      <i class="fas fa-upload"></i> &nbsp; Choose A Photo
                  </label>
                </div>
								
                <div class="col-6 pb-1">
                  <div class="font-small-2 mb-1">Biaya Transfer</div>
                  <fieldset>
                    <div class="input-group">
                      <input type="text" name="biaya_transfer" class="form-control" placeholder="Tulis disini!">
                    </div>
                  </fieldset>
                </div>
                <div class="col-6 pb-1">
                  <div class="font-small-2 mb-1">Biaya Transfer Persen</div>
                  <fieldset>
                    <div class="input-group">
                      <input type="text" name="biaya_transfer_persen" class="form-control" placeholder="Tulis disini!">
                    </div>
                  </fieldset>
                </div>

                <div class="col-12 mt-1">
                  <input type="submit" name="add_pembayaran" value="Upload" class="btn btn-primary rounded-0" />
                  <input type="reset" name="" value="Cancel" onClick="hide(0)" class="btn btn-danger rounded-0" />
                </div>
            </form>
          </div>
        </div>
        <div class="col-lg-7 col-12">
          <div class="badge badge-primary float-right hidden">
            <!--<?php $sql_user = mysqli_query($koneksi, "SELECT * FROM tabel_info");
            $jumlah_user = mysqli_num_rows($sql_user); ?>
            <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2">
              <?php echo $jumlah_user ?></span>Total Info-->
          </div>
          <div class="table-responsive">
            <table class="table table-striped dataex-html5-selectors">
              <thead>
                <tr>
                  <th>Urutan</th>
                  <th>Kategori</th>
                  <th>Bank</th>
                  <th>Rekening</th>
                  <th>Upload</th>
                  <th>Biaya</th>
                  <th>Edit</th>
                </tr>
              </thead>
              <tbody>
                <?php
									$ketQuery = "SELECT *, tp.urutan as urut FROM tabel_pembayaran tp
																 INNER JOIN tabel_kategori_pembayaran tkp on tp.kd_kategori_pembayaran= tkp.kd_kategori_pembayaran
																 order by tp.urutan asc";
									$executeSat = mysqli_query($koneksi, $ketQuery);
									while ($x = mysqli_fetch_array($executeSat)) {
                ?>
                  <tr>
										<td><?= $x["urut"]; ?></td>
										<td><?= $x["nm_kategori_pembayaran"]; ?></td>
                    <td>
											<div class="float-left align-items-center d-flex">
												<img src="../img/pembayaran/<?= $x["gambar"]; ?>" class="d-inline-block mr-2" witdh="30px" height="30px">
												<div class="d-inline-block">
													<div class="collapse-title"><?= $x["bank"]; ?></div>
													<div><?= $x["desc_pembayaran"]; ?></div>
												</div>
											</div>
										</td>
                    <td class="text-capitalize">
											<div>An : <?= $x["an_rekening"]; ?></div>
											<div>No : <?= $x["no_rekening"]; ?></div>
										</td>
										<td><?= $x["upload_bukti"] ? "ya" : "tidak"; ?></td>
                    <td class="text-capitalize">
											<div>Rp : <?= $x["biaya_transfer"]; ?></div>
											<div>% : <?= $x["biaya_transfer_persen"]; ?></div>
										</td>
                    <td>
                      <a onclick="statusPembayaran(<?= $x['kd_pembayaran'] ?>)" class="action-update-status">
                        <i class="fas fa-<?= $x["status"] ? "check" : "times"; ?>"></i>
                      </a>
                      <a onclick="show(<?= $x['kd_pembayaran'] ?>)">
                        <i class="fas fa-edit"></i></a>
                      <a onclick="deletePembayaran(<?= $x['kd_pembayaran'] ?>)">
                        <i class="fas fa-trash-alt"></i>
                      </a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
              <tfoot>
                <tr class="header-tabel">
                  <th>Urutan</th>
                  <th>Kategori</th>
                  <th>Bank</th>
                  <th>Rekening</th>
                  <th>Upload</th>
                  <th>Biaya</th>
                  <th>Edit</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- END: Content-->
  </div>
</div>


<!---------------------------------------- Modal Pembayaran------------------------------------>
<div class=" modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="editinfo" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <form method="post" action="../aksi/edit_pembayaran.php" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title font-medium-2" id="myModalLabel20"><i class="fas fa-plus-circle"></i> Ubah Data Informasi</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="row">
						<input type="hidden" class="form-control" id="id_hidden" name="id">
            
						<div class="col-8">
							<div class="font-small-2 mb-1">
								Kategori
							</div>
							<select name="kategori" id="kategori_edit" class="form-control select2">
								<option disabled selected>Pilih Kategori</option>
								<?php error_reporting(0);
								$ketQuery = "SELECT * FROM tabel_kategori_pembayaran";
								$executeSat = mysqli_query($koneksi, $ketQuery);
								while ($k = mysqli_fetch_array($executeSat)) {
								?>
									<option value="<?php echo $k['kd_kategori_pembayaran']; ?>"> <?php echo $k['nm_kategori_pembayaran']; ?> </option>
								<?php } ?>
							</select>
						</div>
						<div class="col-4 pb-1">
							<div class="font-small-2 mb-1">Urutan</div>
							<fieldset>
								<div class="input-group">
									<input type="text" name="urutan" id="urutan" class="form-control" placeholder="Tulis disini!">
								</div>
							</fieldset>
						</div>
						<div class="col-12 pb-1 mt-1">
							<div class="font-small-2 mb-1">Bank</div>
							<fieldset>
								<div class="input-group">
									<input type="text" name="bank" id="bank" class="form-control" placeholder="Tulis disini!">
								</div>
							</fieldset>
							<fieldset>
									<div class="vs-checkbox-con vs-checkbox-primary">
											<input type="checkbox" name="upload_bukti" id="upload_bukti">
											<span class="vs-checkbox">
													<span class="vs-checkbox--check">
															<i class="vs-icon feather icon-check"></i>
													</span>
											</span>
											<span class="">Upload Bukti Transfer</span>
									</div>
							</fieldset>
						</div>
						<div class="col-6 pb-1">
							<div class="font-small-2 mb-1">An Rekening</div>
							<fieldset>
								<div class="input-group">
									<input type="text" name="an_rekening" id="an_rekening" class="form-control" placeholder="Tulis disini!">
								</div>
							</fieldset>
						</div>
						<div class="col-6 pb-1">
							<div class="font-small-2 mb-1">No Rekening</div>
							<fieldset>
								<div class="input-group">
									<input type="text" name="no_rekening" id="no_rekening" class="form-control" placeholder="Tulis disini!">
								</div>
							</fieldset>
						</div>

						<div class="col-6">
							<div class="font-small-2 mb-1">Deskripsi</div>
							<fieldset class="form-label-group mb-0">
								<textarea data-length=100 name="desc" id="desc" class="form-control char-textarea" rows="2" placeholder="Isi disini"></textarea>
							</fieldset>
							<small class="counter-value float-right"><span class="char-count">maks.</span> / 100 karakter</small>
						</div>

						<div class="col-4 col-md-6 mb-2">
							<div class="font-small-2 mb-1">icon</div>
							<span class="position-absolute" onclick="edit_delete_image1()">&times;</span>
							<figure class="image-container">
									<img id="edit-chosen-image1" style="width: 30% !important">
							</figure>

							<input class="input-image" type="file" id="edit-upload-button1" name="image" id="image">
							<label class="label-images" for="edit-upload-button1" style="color:white;">
									<i class="fas fa-upload"></i> &nbsp; Choose A Photo
							</label>
						</div>
						
						<div class="col-6 pb-1">
							<div class="font-small-2 mb-1">Biaya Transfer</div>
							<fieldset>
								<div class="input-group">
									<input type="text" name="biaya_transfer" id="biaya_transfer" class="form-control" placeholder="Tulis disini!">
								</div>
							</fieldset>
						</div>
						<div class="col-6 pb-1">
							<div class="font-small-2 mb-1">Biaya Transfer Persen</div>
							<fieldset>
								<div class="input-group">
									<input type="text" name="biaya_transfer_persen" id="biaya_transfer_persen" class="form-control" placeholder="Tulis disini!">
								</div>
							</fieldset>
						</div>
          </div>

        </div>
        <div class="modal-footer">
          <input type="submit" name="upload_edit_pembayaran" value="Upload" class="btn btn-primary rounded-0" />
          <input type="reset" name="" value="Cancel" onClick="hide(0)" class="btn btn-danger rounded-0" />
        </div>
      </div>
    </form>
  </div>
</div>
<!---------------------------------------- Modal Pembayaran------------------------------------>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">

  let uploadButton1 = document.getElementById("upload-button1");
  let chosenImage1 = document.getElementById("chosen-image1");

  uploadButton1.onchange = () => {
      let reader = new FileReader();
      reader.readAsDataURL(uploadButton1.files[0]);
      reader.onload = () => {
          chosenImage1.setAttribute("src",reader.result);
      }
  }

  function delete_image1(){
    chosenImage1.setAttribute("src","")
  }

  let uploadButtonEdit1 = document.getElementById("edit-upload-button1");
  let chosenImageEdit1 = document.getElementById("edit-chosen-image1");

  uploadButtonEdit1.onchange = () => {
      let reader = new FileReader();
      reader.readAsDataURL(uploadButtonEdit1.files[0]);
      reader.onload = () => {
          chosenImageEdit1.setAttribute("src",reader.result);
      }
  }

  function edit_delete_image1(){
    chosenImageEdit1.setAttribute("src","")
  }

  function statusPembayaran(id) {
    $.ajax({
      type: "GET",
      url: "../aksi/edit_pembayaran_status.php?id=" + id,
      async: false,
      success: function(text) {
        alert(text);
				location.reload();
      }
    });
  }

  function deletePembayaran(id) {
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			console.log(result)
			if (result.value) {
				$.ajax({
					type: "GET",
					url: "../aksi/delete_pembayaran.php?id=" + id,
					async: false,
					success: function(text) {
						Swal.fire(
							'Deleted!',
							text,
							'success'
						)
						location.reload();
					}
				});
			}
		})
  }

  function show(id) {
    var response = [];
    let text = "";
    $.ajax({
      type: "GET",
      url: "../aksi/show_pembayaran.php?id=" + id,
      async: false,
      success: function(text) {
        response = JSON.parse(text);
      }
    });
		
    $('#id_hidden').val(response.kd_pembayaran);
    $('#kategori_edit option[value="' + response.kd_kategori_pembayaran + '"]').prop('selected', true).change();
		$('#urutan').val(response.urut);
		$('#upload_bukti').prop('checked', response.upload_bukti == "1" ? true : false);
		$('#bank').val(response.bank);
		$('#an_rekening').val(response.an_rekening);
		$('#no_rekening').val(response.no_rekening);
		$('#desc').val(response.desc_pembayaran);
		$('#biaya_transfer').val(response.biaya_transfer);
		$('#biaya_transfer_persen').val(response.biaya_transfer_persen);

    gambar = response.gambar
    if(gambar != null){
      chosenImageEdit1.setAttribute("src","../img/pembayaran/"+gambar);
    }
    $("#edit").modal('show');
  }
</script>