<head>
<script src="https://cdn.jsdelivr.net/npm/quagga@0.12.1/dist/quagga.min.js"></script>
</head>

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

  .horizontal-menu.navbar-floating:not(.blank-page) .app-content {
      padding-top: -6.25rem;
  }

  html body .content.app-content {
    overflow: hidden;
    margin-top: -130px;
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
                <li class="breadcrumb-item"><a href="#" class="text-dark">Produk</a>
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
            <h3 class="mb-3 display-4 text-uppercase">Data Produk</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-5 col-12 pb-5">

            <form method="post" action="../aksi/add_product.php" enctype="multipart/form-data">

              <div class="row">
                <!-- <div class="col-12 col-md-12 text-right">
            <button class="btn btn-primary" style="border-radius: 20%;" type="button" onclick="location.reload()">Refresh</button>
          </div> -->
                <div class="col-12 col-md-12">
                  <div class="font-small-2">Gunakan Barcode/ Masukkan kode barang manual</div>
                  <fieldset>
                    <div class="input-group">
                      <input type="text" name="kode" class="form-control" autofocus="autofocus" placeholder="Scan Here!">
                      <div class="input-group-append" id="button-addon2">
                        <button class="btn btn-primary rounded-0" type="button"><i class="fas fa-qrcode"></i></button>
                      </div>
                    </div>
                  </fieldset>
                </div>
                <script>
    function startBarcodeScanner() {
        Quagga.init({
            inputStream: {
                name: "Live",
                type: "LiveStream",
                target: document.querySelector('#kodebarang'),
                constraints: {
                    width: 480,
                    height: 320,
                    facingMode: "environment"
                },
            },
            decoder: {
                readers: ["ean_reader", "upc_reader", "code128_reader", "code39_reader", "codabar_reader"]
            }
        }, function (err) {
            if (err) {
                console.error(err);
                return;
            }
            Quagga.start();
        });

        Quagga.onDetected(function (result) {
            document.getElementById('kodebarang').value = result.codeResult.code;
            Quagga.stop();
        });
    }
    </script>
                <div class="col-12 col-md-12 mt-2 mb-1">
                  <div class="font-small-2">Upload Foto terbaik <span class="badge badge-dark text-title">Max.3 (JPG/JPEG/PNG)</span></div>
                </div>

                <div class="col-4 col-md-4 mb-2">
                  <span class="position-absolute" onclick="delete_image1()">&times;</span>
                  <br>
                  <figure class="image-container">
                    <img id="chosen-image1" style="width: 100% !important">
                  </figure>

                  <input class="input-image" type="file" id="upload-button1" name="image1">
                  <label class="label-images" for="upload-button1">
                    <i class="fas fa-upload"></i> &nbsp; Choose A Photo
                  </label>
                </div>
                <div class="col-4 col-md-4 mb-2">
                  <span class="position-absolute" onclick="delete_image2()">&times;</span>
                  <br>
                  <figure class="image-container">
                    <img id="chosen-image2" style="width: 100% !important">
                  </figure>

                  <input class="input-image" type="file" id="upload-button2" name="image2">
                  <label class="label-images" for="upload-button2">
                    <i class="fas fa-upload"></i> &nbsp; Choose A Photo
                  </label>
                </div>
                <div class="col-4 col-md-4 mb-2">
                  <span class="position-absolute" onclick="delete_image3()">&times;</span>
                  <br>
                  <figure class="image-container">
                    <img id="chosen-image3" style="width: 100% !important">
                  </figure>

                  <input class="input-image" type="file" id="upload-button3" name="image3">
                  <label class="label-images" for="upload-button3">
                    <i class="fas fa-upload"></i> &nbsp; Choose A Photo
                  </label>
                </div>
                <div class="col-12 col-md-12">
                  <div class="font-small-2">Masukkan nama produk anda</div>
                  <fieldset class="form-group position-relative has-icon-left input-divider-left">
                    <input type="text" name="nama" class="form-control" placeholder="Isi disini" />
                    <div class="form-control-position"><i class="fas fa-box-open"></i>
                    </div>
                  </fieldset>
                </div>
              </div>
              <!-- <button type="button" onclick="pilihVarian();"></button> -->
              <?php if ($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'merchant') { ?>
              <div class="row">
                <div class="col-4 col-md-4">
                  <div class="font-small-2 mt-1 mb-1">
                    Kategori <a href="#" class="badge badge-dark" data-toggle="modal" data-target="#kategori-modal">
                      <i class="fas fa-plus-circle"></i>Tambah</a>
                  </div>
                  <select name="kategori" id="kategori" class="select2 form-control" onchange="pilihVarian()">
                    <option disabled selected>Pilih Kategori</option>
                    <?php error_reporting(0);
                    $ketQuery = "SELECT * FROM tabel_kategori_barang ORDER BY nm_kategori ASC";
                    $executeSat = mysqli_query($koneksi, $ketQuery);
                    while ($k = mysqli_fetch_array($executeSat)) {
                    ?>
                      <option value="<?php echo $k['kd_kategori']; ?>"><?php echo $k['nm_kategori']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-4 col-md-4">
                  <div class="font-small-2 mt-1 mb-1">
                    Merk <a href="#" class="badge badge-dark" data-toggle="modal" data-target="#merk">
                      <i class="fas fa-plus-circle"></i>Tambah</a>
                  </div>
                  <select name="merk" class="select2 form-control">
                    <option disabled selected>Pilih Merk</option>
                    <?php error_reporting(0);
                    $ketQuery = "SELECT * FROM tabel_merk_barang ORDER BY merk ASC";
                    $executeSat = mysqli_query($koneksi, $ketQuery);
                    while ($s = mysqli_fetch_array($executeSat)) {
                    ?>
                      <option value="<?php echo $s['id_merk']; ?>"><?php echo $s['merk']; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-4 col-md-4">
                  <div class="font-small-2 mt-1 mb-1">
                    Satuan Produk <a href="#" class="badge badge-dark" data-toggle="modal" data-target="#satuan">
                      <i class="fas fa-plus-circle"></i>Tambah</a>
                  </div>
                  <select class="select2 form-control" name="satuan">
                    <option disabled selected>Pilih Satuan</option>
                    <?php error_reporting(0);
                    $ketQuery = "SELECT * FROM tabel_satuan_barang ORDER BY nm_satuan ASC";
                    $executeSat = mysqli_query($koneksi, $ketQuery);
                    while ($s = mysqli_fetch_array($executeSat)) {
                    ?>
                      <option value="<?php echo $s['id_satuan']; ?>"><?php echo $s['nm_satuan']; ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <?php } ?>

              <!-- varian         -->
              <div class="row mt-2" id="varian">

              </div>
              <div class="row">
                <div class="col-6 col-md-4">
                  <div class="font-small-2">Jumlah Stok</div>
                  <div class="d-inline-block mb-1">
                    <div class="input-group">
                      <input type="number" name="stok" class="form-control" value="0">
                      <!-- <input type="number" name="stok" class="touchspin rounded-0" value="1"> -->
                    </div>
                  </div>
                </div>
								<div class="col-6 col-md-4">
									<div class="font-small-2">Berat (gram)</div>
									<div class="d-inline-block mb-1">
										<div class="input-group">
											<input type="number" name="berat" id="berat" class="form-control" value="">
										</div>
									</div>
								</div>
              </div>
              <div class="row">
                <div class="col-12 col-md-4">
                  <div class="font-small-2 mb-1">Harga Beli Produk</div>
                  <fieldset class="form-group position-relative has-icon-left input-divider-left">
                    <input type="text" name="harga_beli" class="form-control" placeholder="Isi disini" />
                    <small class="counter-value float-right"><span class="char-text">Tanpa titik dan Rupiah</span></small>
                    <div class="form-control-position"><i class="feather icon-clipboard"></i>
                    </div>
                  </fieldset>
                </div>
                <div class="col-12 col-md-4">
                  <div class="font-small-2 mb-1">Harga Jual Produk</div>
                  <fieldset class="form-group position-relative has-icon-left input-divider-left">
                    <input type="text" name="harga_jual" class="form-control" placeholder="Isi disini" />
                    <small class="counter-value float-right"><span class="char-text">Tanpa titik dan Rupiah</span></small>
                    <div class="form-control-position"><i class="feather icon-clipboard"></i>
                    </div>
                  </fieldset>
                </div>
                <div class="col-12 col-md-4">
                  <div class="font-small-2 mb-1">Harga Grosir Produk</div>
                  <fieldset class="form-group position-relative has-icon-left input-divider-left">
                    <input type="text" name="harga_grosir" class="form-control" placeholder="Isi disini" />
                    <small class="counter-value float-right"><span class="char-text">Tanpa titik dan Rupiah</span></small>
                    <div class="form-control-position"><i class="feather icon-clipboard"></i>
                    </div>
                  </fieldset>
                </div>
              </div>
              <div class="row">
                <div class="col-12 mt-1">
                  <div class="font-small-2 mb-1">Deskripsi Produk anda</div>
                  <fieldset class="form-label-group mb-0">
                    <textarea data-length=100 class="form-control char-textarea" rows="3" name="deskripsi" placeholder="Isi disini"></textarea>
                  </fieldset>
                  <small class="counter-value float-right"><span class="char-count">maks.</span> / 100 karakter</small>
                </div>
              </div>
              <div class="row">
                <div class="col-12 mt-1">
                  <input type="submit" name="upload_product" value="Upload" class="btn btn-primary rounded-0" />
                  <input type="reset" value="Cancel" onClick="hide(0)" class="btn btn-danger rounded-0" />
                </div>
              </div>
            </form>
          </div>
          <div class="col-lg-7 col-12">
            <div class="badge badge-primary float-right">
              <?php $sql_user = mysqli_query($koneksi, "SELECT * FROM tabel_barang");
              $jumlah_user = mysqli_num_rows($sql_user); ?>
              <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2">
                <?php echo $jumlah_user ?></span>Total Produk
            </div>
            <div class="table-responsive">
              <table class="table table-striped dataex-html5-selectors">
                <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Produk</th>
                    <th>Stok</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Harga Grosir</th>
                    <th>Satuan</th>
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $ketQuery = "SELECT * FROM tabel_barang, tabel_stok_toko, tabel_barang_gambar WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang";
                  $executeSat = mysqli_query($koneksi, $ketQuery);
                  while ($b = mysqli_fetch_array($executeSat)) {

                    $id_satuan = $b['kd_satuan'];
                    $querySatuan = "SELECT * FROM `tabel_satuan_barang` WHERE id_satuan = '$id_satuan'";
                    $hasilSatuan = mysqli_fetch_array(mysqli_query($koneksi, $querySatuan));
                    // var_dump($hasilSatuan);
                    // die;

                  ?>
                    <tr>
                      <td><?php echo $b['kd_barang'] ?></td>
                      <td class="text-capitalize"><?php echo $b['nm_barang'] ?></td>
                      <td><?php echo $b['stok'] ?></td>
                      <td>Rp.<?php echo number_format($b['hrg_jual'], 0, ",", "."); ?></td>
                      <td>Rp.<?php echo number_format($b['hrg_beli'], 0, ",", "."); ?></td>
                      <td>Rp.<?php echo number_format($b['hrg_grosir'], 0, ",", "."); ?></td>
                      <td><?php echo $hasilSatuan['nm_satuan']; ?></td>
                      <td>
                        <!-- <a href="#" data-toggle="modal" data-target="#produk<?php echo $b['kd_barang'] ?>"> -->
                        <a href="index.php?kode_produk=<?php echo $b['kd_barang'] ?>">
                          <i class="fas fa-edit"></i>
                        </a>
                        <!-- <a onclick="show(`<?php echo $b['kd_barang'] ?>`)">
                                      	<i class="fas fa-edit"></i>
                                      </a> -->
                        <a class="action-delete" onclick="deleteImage(`<?php echo $b['kd_barang'] ?>`)">
                          <i class="fas fa-trash-alt"></i>
                        </a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr class="header-tabel">
                    <th>Kode</th>
                    <th>Produk</th>
                    <th>Stok</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Harga Grosir</th>
                    <th>Harga Satuan</th>
                    <th>Edit</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="badge badge-warning text-title">
              <i><strong>Harga Jual</strong> dan <strong>Harga Grosir</strong> diatas sudah ditambahkan 5% untuk biaya admin</i>
            </div>

          </div>
        </div>
        <!-- END: Content-->
      </div>
    </div>

    <!---------------------------------------- Modal Kategori ------------------------------------>
    <div class="modal fade" id="kategori-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="../aksi/add_kategori.php" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="row">
                <div class="col-12">
                  <div class="font-small-2 mb-1">Icon</div>
                  <span class="position-absolute" onclick="delete_image_kategori()">&times;</span>
                  <br>
                  <figure class="image-container">
                    <img id="chosen-image-kategori" style="width: 100% !important">
                  </figure>
                  <input class="input-image" type="file" id="upload-button-kategori" name="gambar">
                  <label class="label-images" for="upload-button-kategori">
                    <i class="fas fa-upload"></i> &nbsp; Choose A Photo
                  </label>
                </div>
                <div class="col-12">
                  <div class="font-small-2 mb-1">Nama Kategori</div>
                  <fieldset class="form-group">
                    <div class="custom-file">
                      <input type="text" name="kategori" class="form-control" placeholder="Isi disini" />
                    </div>
                  </fieldset>
                </div>
                <div class="col-12">
                  <div class="font-small-2 mb-1">Form</div>
                  <fieldset class="form-group">
                    <div class="custom-file">
                      <select class="select2 form-control" name="form">
                        <option value="sf">Single Form</option>
                        <option value="mf">Multi Form</option>
                      </select>
                    </div>
                  </fieldset>
                </div>
                <div class="col-12">
                  <div class="font-small-2 mb-1">Varian</div>
                </div>
                <div class="col-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" name="panjang" id="panjang">
                    <label class="form-check-label" for="panjang">
                      Panjang
                    </label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" name="lebar" id="lebar">
                    <label class="form-check-label" for="lebar">
                      Lebar
                    </label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" name="tinggi" id="tinggi">
                    <label class="form-check-label" for="tinggi">
                      Tinggi
                    </label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" name="warna" id="warna">
                    <label class="form-check-label" for="warna">
                      Warna
                    </label>
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" name="type" id="type">
                    <label class="form-check-label" for="type">
                      Type
                    </label>
                  </div>
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
    <!---------------------------------------- Modal Kategori ------------------------------------>


    <!---------------------------------------- Modal Satuan------------------------------------>
    <div class="modal fade text-left" id="satuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel20" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xs" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title font-medium-2" id="myModalLabel20"><i class="fas fa-plus-circle"></i> Tambahkan Satuan baru</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
          </div>
          <form action="../aksi/add_satuan.php" method="post" class="form-kategori">
            <div class="modal-body">
              <div class="col-12">
                <div class="font-small-2 mb-1">Nama Satuan</div>
                <fieldset class="form-group">
                  <div class="custom-file">
                    <input type="text" name="satuan" class="form-control" placeholder="Isi disini" />
                  </div>
                </fieldset>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" name="add_satuan" class="btn btn-primary">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!---------------------------------------- Modal Satuan------------------------------------>

  <!---------------------------------------- Modal Merk------------------------------------>
  <div class="modal fade text-left" id="merk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel20" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xs" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title font-medium-2" id="myModalLabel20"><i class="fas fa-plus-circle"></i> Tambahkan Merk baru</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <form action="../aksi/add_merk.php" method="post" class="form-kategori">
          <div class="modal-body">
            <div class="col-12">
              <div class="font-small-2 mb-1">Nama Merk</div>
              <fieldset class="form-group">
                <div class="custom-file">
                  <input type="text" name="merk" class="form-control" placeholder="Isi disini" />
                </div>
              </fieldset>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="add_merk" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!---------------------------------------- Modal Merk------------------------------------>
<!---------------------------------------- Modal Produk------------------------------------>
<div class="modal fade" id="modal_produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <form method="post" action="../aksi/edit_product.php" enctype="multipart/form-data" class="form-kategori">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title font-medium-2" id="myModalLabel20"><i class="fas fa-plus-circle"></i> Ubah Data Produk</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <input type="text" hidden name="kode" id="kd_barang">
            <input type="text" hidden name="kd_toko" id="kd_toko">
            <div class="col-12 col-md-12 mt-2 mb-1">
              <div class="font-small-2">Upload Foto terbaik <span class="badge badge-dark">Max.3 (JPG/JPEG/PNG)</span></div>
            </div>
            <div class="col-4 col-md-4 mb-2 mt-2">
              <span class="position-absolute" onclick="edit_delete_image1()">&times;</span>
              <br>
              <input type="text" name="cek_hapus1" id="cek_hapus1" hidden>
              <figure class="image-container">
                <img id="edit-chosen-image1" style="width: 100% !important">
              </figure>

              <input class="input-image" type="file" id="edit-upload-button1" name="edit-image1">
              <label class="label-images" for="edit-upload-button1">
                <i class="fas fa-upload"></i> &nbsp; Choose A Photo
              </label>
            </div>
            <div class="col-4 col-md-4 mb-2 mt-2">
              <span class="position-absolute" onclick="edit_delete_image2()">&times;</span>
              <br>
              <input type="text" name="cek_hapus2" id="cek_hapus2" hidden>
              <figure class="image-container">
                <img id="edit-chosen-image2" style="width: 100% !important">
              </figure>

              <input class="input-image" type="file" id="edit-upload-button2" name="edit-image2">
              <label class="label-images" for="edit-upload-button2">
                <i class="fas fa-upload"></i> &nbsp; Choose A Photo
              </label>
            </div>
            <div class="col-4 col-md-4 mb-2 mt-2">
              <span class="position-absolute" onclick="edit_delete_image3()">&times;</span>
              <br>
              <input type="text" name="cek_hapus3" id="cek_hapus3" hidden>
              <figure class="image-container">
                <img id="edit-chosen-image3" style="width: 100% !important">
              </figure>

              <input class="input-image" type="file" id="edit-upload-button3" name="edit-image3">
              <label class="label-images" for="edit-upload-button3">
                <i class="fas fa-upload"></i> &nbsp; Choose A Photo
              </label>
            </div>

            <div class="col-12 col-md-12">
              <div class="font-small-2">Masukkan nama produk anda</div>
              <fieldset class="form-group position-relative has-icon-left input-divider-left">
                <input type="text" name="nama" id="nm_barang" class="form-control" placeholder="Isi disini" value="" />
                <div class="form-control-position"><i class="fas fa-box-open"></i>
                </div>
              </fieldset>
            </div>
          </div>
          <div class="row">
            <div class="col-6 col-md-6">
              <div class="font-small-2 mt-1 mb-1">
                Kategori Produk
                <!-- <a href="#" class="badge badge-dark" data-toggle="modal" data-target="#kategori">
                <i class="fas fa-plus-circle"></i>Tambah</a> -->
              </div>
              <select name="kategori" id="kategori_edit" class="form-control select2" onchange="pilihVarianEdit()">
                <option disabled selected>Pilih Kategori</option>
                <?php error_reporting(0);
                $ketQuery = "SELECT * FROM tabel_kategori_barang ORDER BY nm_kategori ASC";
                $executeSat = mysqli_query($koneksi, $ketQuery);
                while ($k = mysqli_fetch_array($executeSat)) {
                ?>
                  <option value="<?php echo $k['kd_kategori']; ?>"><?php echo $k['nm_kategori']; ?> </option>
                <?php } ?>
              </select>
            </div>
            <div class="col-6 col-md-6">
              <div class="font-small-2 mt-1 mb-1">
                Merk Produk
                <!-- <a href="#" class="badge badge-dark" data-toggle="modal" data-target="#satuan">
                <i class="fas fa-plus-circle"></i>Tambah</a> -->
              </div>
              <select name="merk" id="merk_edit" class="select2 form-control">
                <option disabled selected>Pilih Merk</option>
                <?php error_reporting(0);
                $ketQuery = "SELECT * FROM tabel_merk_barang ORDER BY merk ASC";
                $executeSat = mysqli_query($koneksi, $ketQuery);
                while ($s = mysqli_fetch_array($executeSat)) {
                ?>
                  <option value="<?php echo $s['id_merk']; ?>"><?php echo $s['merk']; ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="col-6 col-md-6">
              <div class="font-small-2 mt-1 mb-1">
                Satuan Produk
                <!-- <a href="#" class="badge badge-dark" data-toggle="modal" data-target="#satuan">
                <i class="fas fa-plus-circle"></i>Tambah</a> -->
              </div>
              <select class="select2 form-control" name="satuan" id="satuan_edit">
                <option disabled selected>Pilih Satuan</option>
                <?php error_reporting(0);
                $ketQuery = "SELECT * FROM tabel_satuan_barang ORDER BY nm_satuan ASC";
                $executeSat = mysqli_query($koneksi, $ketQuery);
                while ($s = mysqli_fetch_array($executeSat)) {
                ?>
                  <option value="<?php echo $s['id_satuan']; ?>"><?php echo $s['nm_satuan']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <!-- varian -->
          <div class="row mt-2" id="varian_edit">

          </div>

          <div class="row">
            <div class="col-6 col-md-4">
              <div class="font-small-2">Jumlah Stok</div>
              <div class="d-inline-block mb-1">
                <div class="input-group">
                  <input type="number" name="stok" id="stok_edit" class="touchspin rounded-0" value="">
                </div>
              </div>
            </div>
            <div class="col-6 col-md-4">
              <div class="font-small-2">Berat (gram)</div>
              <div class="d-inline-block mb-1">
                <div class="input-group">
                  <input type="number" name="berat" id="berat_edit" class="touchspin rounded-0" value="">
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-md-4">
              <div class="font-small-2 mb-1">Harga Beli Produk</div>
              <fieldset class="form-group position-relative has-icon-left input-divider-left">
                <input type="text" name="harga_beli" id="harga_beli_edit" class="form-control" placeholder="Isi disini" />
                <small class="counter-value float-right"><span class="char-count">Tanpa titik dan Rupiah</span></small>
                <div class="form-control-position"><i class="feather icon-clipboard"></i>
                </div>
              </fieldset>
            </div>
            <div class="col-12 col-md-4">
              <div class="font-small-2 mb-1">Harga Jual Produk</div>
              <fieldset class="form-group position-relative has-icon-left input-divider-left">
                <input type="text" name="harga_jual" id="harga_jual_edit" class="form-control" placeholder="Isi disini" />
                <small class="counter-value float-right"><span class="char-count">Tanpa titik dan Rupiah</span></small>
                <div class="form-control-position"><i class="feather icon-clipboard"></i>
                </div>
              </fieldset>
            </div>
            <div class="col-12 col-md-4">
              <div class="font-small-2 mb-1">Harga Grosir Produk</div>
              <fieldset class="form-group position-relative has-icon-left input-divider-left">
                <input type="text" name="harga_grosir" id="harga_grosir_edit" class="form-control" placeholder="Isi disini" />
                <small class="counter-value float-right"><span class="char-count">Tanpa titik dan Rupiah</span></small>
                <div class="form-control-position"><i class="feather icon-clipboard"></i>
                </div>
              </fieldset>
            </div>
          </div>
          <div class="row">
            <div class="col-12 mt-1">
              <div class="font-small-2 mb-1">Deskripsi Produk anda</div>
              <fieldset class="form-label-group mb-0">
                <textarea data-length=100 class="form-control char-textarea" rows="3" id="deskripsi_edit" name="deskripsi">Isi disini</textarea>
              </fieldset>
              <small class="counter-value float-right"><span class="char-count">maks.</span> / 100 karakter</small>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <input type="submit" name="upload_edit_product" value="Upload" class="btn btn-primary rounded-0" />
          <input type="reset" name="" value="Cancel" onClick="hide(0)" class="btn btn-danger rounded-0" />
        </div>
      </div>
    </form>
  </div>
</div>
<!---------------------------------------- Modal Produk------------------------------------>


<script type="text/javascript">
  // $(document).ready(function() {
  //   setTimeout(function(){
  //     window.location.reload(1);
  //   }, 5000);
  // });

  let uploadButtonKategori = document.getElementById("upload-button-kategori");
  let chosenImageKategori = document.getElementById("chosen-image-kategori");

  uploadButtonKategori.onchange = () => {
    let reader = new FileReader();
    reader.readAsDataURL(uploadButtonKategori.files[0]);
    reader.onload = () => {
      chosenImageKategori.setAttribute("src", reader.result);
    }
  }

  function delete_image_kategori() {
    chosenImageKategori.setAttribute("src", "")
  }

  let uploadButton1 = document.getElementById("upload-button1");
  let chosenImage1 = document.getElementById("chosen-image1");
  let uploadButton2 = document.getElementById("upload-button2");
  let chosenImage2 = document.getElementById("chosen-image2");
  let uploadButton3 = document.getElementById("upload-button3");
  let chosenImage3 = document.getElementById("chosen-image3");

  uploadButton1.onchange = () => {
    let reader = new FileReader();
    reader.readAsDataURL(uploadButton1.files[0]);
    reader.onload = () => {
      chosenImage1.setAttribute("src", reader.result);
    }
  }

  function delete_image1() {
    chosenImage1.setAttribute("src", "")
  }

  uploadButton2.onchange = () => {
    let reader = new FileReader();
    reader.readAsDataURL(uploadButton2.files[0]);
    reader.onload = () => {
      chosenImage2.setAttribute("src", reader.result);
    }
  }

  function delete_image2() {
    chosenImage2.setAttribute("src", "")
  }

  uploadButton3.onchange = () => {
    let reader = new FileReader();
    reader.readAsDataURL(uploadButton3.files[0]);
    reader.onload = () => {
      chosenImage3.setAttribute("src", reader.result);
    }
  }

  function delete_image3() {
    chosenImage3.setAttribute("src", "")
  }


  let uploadButtonEdit1 = document.getElementById("edit-upload-button1");
  let chosenImageEdit1 = document.getElementById("edit-chosen-image1");
  let uploadButtonEdit2 = document.getElementById("edit-upload-button2");
  let chosenImageEdit2 = document.getElementById("edit-chosen-image2");
  let uploadButtonEdit3 = document.getElementById("edit-upload-button3");
  let chosenImageEdit3 = document.getElementById("edit-chosen-image3");

  uploadButtonEdit1.onchange = () => {
    let reader = new FileReader();
    reader.readAsDataURL(uploadButtonEdit1.files[0]);
    reader.onload = () => {
      chosenImageEdit1.setAttribute("src", reader.result);
    }
  }

  function edit_delete_image1() {
    chosenImageEdit1.setAttribute("src", "")
    $('#cek_hapus1').val('1');
  }

  uploadButtonEdit2.onchange = () => {
    let reader = new FileReader();
    reader.readAsDataURL(uploadButtonEdit2.files[0]);
    reader.onload = () => {
      chosenImageEdit2.setAttribute("src", reader.result);
    }
  }

  function edit_delete_image2() {
    chosenImageEdit2.setAttribute("src", "")
    $('#cek_hapus2').val('1');
  }

  uploadButtonEdit3.onchange = () => {
    let reader = new FileReader();
    reader.readAsDataURL(uploadButtonEdit3.files[0]);
    reader.onload = () => {
      chosenImageEdit3.setAttribute("src", reader.result);
    }
  }

  function edit_delete_image3() {
    chosenImageEdit3.setAttribute("src", "")
    $('#cek_hapus3').val('1');
  }


  function pilihVarian() {
    var x = document.getElementById("kategori").value;
    var response = '';
    $.ajax({
      type: "GET",
      url: "../aksi/select_varian_in_kategori.php?id_kategori=" + x,
      async: false,
      success: function(text) {
        response = text;
      }
    });
    let text = "";
    let varian = response.replace('"', '');
    varian = varian.replace('"', '');
    varian = varian.split(',');

    for (var i = 0; i < varian.length; i++) {
      if (varian[i] == 'panjang') {
        text += `<div class="col-6 col-md-4">
            <div class="font-small-2">Panjang</div>
               <fieldset class="form-group position-relative has-icon-left input-divider-left">
                  <input type="text" name="panjang" class="form-control" placeholder="Isi disini" />                     
               <div class="form-control-position"><i class="fas fa-ruler-horizontal"></i>
             </div>
            </fieldset>
          </div>`
      } else if (varian[i] == 'lebar') {
        text += `<div class="col-6 col-md-4">
            <div class="font-small-2">Lebar</div>
                <fieldset class="form-group position-relative has-icon-left input-divider-left">
                   <input type="text" name="lebar" class="form-control" placeholder="Isi disini" />                     
                <div class="form-control-position"><i class="fas fa-ruler-combined"></i>
               </div>
              </fieldset>
          </div>`
      } else if (varian[i] == 'tinggi') {
        text += `<div class="col-6 col-md-4">
             <div class="font-small-2">Tinggi</div>
                <fieldset class="form-group position-relative has-icon-left input-divider-left">
                    <input type="text" name="tinggi" class="form-control" placeholder="Isi disini" />                     
                 <div class="form-control-position"><i class="fas fa-ruler-vertical"></i>
                </div>
               </fieldset>
          </div>`
      } else if (varian[i] == 'warna') {
        text += `<div class="col-6 col-md-4">
            <div class="font-small-2">Warna</div>
                 <fieldset class="form-group position-relative has-icon-left input-divider-left">
                    <input type="text" name="warna" class="form-control" placeholder="Isi disini" />                     
                 <div class="form-control-position"><i class="fas fa-eye-dropper"></i>
               </div>
              </fieldset>
          </div>`
      } else if (varian[i] == 'type') {
        text += `<div class="col-6 col-md-4">
            <div class="font-small-2">Type</div>
                 <fieldset class="form-group position-relative has-icon-left input-divider-left">
                    <input type="text" name="type" class="form-control" placeholder="Isi disini" />                     
                 <div class="form-control-position"><i class="fas fa-tag"></i>
               </div>
              </fieldset>
          </div>`
      }
    }
    if (text == "") {
      text += `<div class="col-6 col-md-12">
            <p class="text-center"> tidak ada varian </p>
          </div>`
    }

    $("#varian").html(text);
  }

  function pilihVarianEdit() {
    var x = document.getElementById("kategori_edit").value;
    var response = '';
    $.ajax({
      type: "GET",
      url: "../aksi/select_varian_in_kategori.php?id_kategori=" + x,
      async: false,
      success: function(text) {
        response = text;
      }
    });
    let text = "";
    let varian = response.replace('"', '');
    varian = varian.replace('"', '');
    varian = varian.split(',');

    for (var i = 0; i < varian.length; i++) {
      if (varian[i] == 'panjang') {
        text += `<div class="col-6 col-md-4">
            <div class="font-small-2">Panjang</div>
               <fieldset class="form-group position-relative has-icon-left input-divider-left">
                  <input type="text" name="panjang" class="form-control" placeholder="Isi disini" />                     
               <div class="form-control-position"><i class="fas fa-ruler-horizontal"></i>
             </div>
            </fieldset>
          </div>`
      } else if (varian[i] == 'lebar') {
        text += `<div class="col-6 col-md-4">
            <div class="font-small-2">Lebar</div>
                <fieldset class="form-group position-relative has-icon-left input-divider-left">
                   <input type="text" name="lebar" class="form-control" placeholder="Isi disini" />                     
                <div class="form-control-position"><i class="fas fa-ruler-combined"></i>
               </div>
              </fieldset>
          </div>`
      } else if (varian[i] == 'tinggi') {
        text += `<div class="col-6 col-md-4">
             <div class="font-small-2">Tinggi</div>
                <fieldset class="form-group position-relative has-icon-left input-divider-left">
                    <input type="text" name="tinggi" class="form-control" placeholder="Isi disini" />                     
                 <div class="form-control-position"><i class="fas fa-ruler-vertical"></i>
                </div>
               </fieldset>
          </div>`
      } else if (varian[i] == 'warna') {
        text += `<div class="col-6 col-md-4">
            <div class="font-small-2">Warna</div>
                 <fieldset class="form-group position-relative has-icon-left input-divider-left">
                    <input type="text" name="warna" class="form-control" placeholder="Isi disini" />                     
                 <div class="form-control-position"><i class="fas fa-eye-dropper"></i>
               </div>
              </fieldset>
          </div>`
      } else if (varian[i] == 'type') {
        text += `<div class="col-6 col-md-4">
            <div class="font-small-2">Type</div>
                 <fieldset class="form-group position-relative has-icon-left input-divider-left">
                    <input type="text" name="type" class="form-control" placeholder="Isi disini" />                     
                 <div class="form-control-position"><i class="fas fa-tag"></i>
               </div>
              </fieldset>
          </div>`
      }
    }
    if (text == "") {
      text += `<div class="col-6 col-md-12">
            <p class="text-center"> tidak ada varian </p>
          </div>`
    }

    $("#varian_edit").html(text);
  }

  function deleteImage(id) {
    console.log(id);
    $.ajax({
      type: "GET",
      url: "../aksi/delete_produk.php?id_produk=" + id,
      async: false,
      success: function(text) {
        alert(text);
      }
    });
  }

  function show(id) {
    var response = [];
    var gambar = "";
    let text = "";

    chosenImageEdit1.setAttribute("src", "");
    chosenImageEdit2.setAttribute("src", "");
    chosenImageEdit3.setAttribute("src", "");

    $('#cek_hapus1').val('');
    $('#cek_hapus2').val('');
    $('#cek_hapus3').val('');

    $.ajax({
      type: "GET",
      url: "../aksi/show_produk.php?id_produk=" + id,
      async: false,
      success: function(text) {
        response = JSON.parse(text);
      }
    });
    console.log(response);
    $('#kd_barang').val(response.barang.kd_barang);
    $('#kd_toko').val(response.barang.kd_toko);
    $('#nm_barang').val(response.barang.nm_barang);
    $('#kategori_edit option[value="' + response.barang.kd_kategori + '"]').prop('selected', true);
    $('#satuan_edit option[value="' + response.barang.kd_satuan + '"]').prop('selected', true);
    $('#merk_edit option[value="' + response.barang.merek + '"]').prop('selected', true);
    $('#stok_edit').val(response.stok.stok);
    $('#harga_beli_edit').val(response.barang.hrg_beli);
    $('#harga_jual_edit').val(response.barang.hrg_jual);
    $('#harga_grosir_edit').val(response.barang.hrg_grosir);
    $('#deskripsi_edit').val(response.barang.deskripsi);

    if (response.barang.panjang != "") {
      text += `<div class="col-6 col-md-4">
          <div class="font-small-2">Panjang</div>
             <fieldset class="form-group position-relative has-icon-left input-divider-left">
                <input type="text" name="panjang" value="${response.barang.panjang}" class="form-control" placeholder="Isi disini" />                     
             <div class="form-control-position"><i class="fas fa-ruler-horizontal"></i>
           </div>
          </fieldset>
        </div>`
    }
    if (response.barang.lebar != "") {
      text += `<div class="col-6 col-md-4">
          <div class="font-small-2">Lebar</div>
              <fieldset class="form-group position-relative has-icon-left input-divider-left">
                 <input type="text" name="lebar" value="${response.barang.lebar}" class="form-control" placeholder="Isi disini" />                     
              <div class="form-control-position"><i class="fas fa-ruler-combined"></i>
             </div>
            </fieldset>
        </div>`
    }
    if (response.barang.tinggi != "") {
      text += `<div class="col-6 col-md-4">
           <div class="font-small-2">Tinggi</div>
              <fieldset class="form-group position-relative has-icon-left input-divider-left">
                  <input type="text" name="tinggi" value="${response.barang.tinggi}" class="form-control" placeholder="Isi disini" />                     
               <div class="form-control-position"><i class="fas fa-ruler-vertical"></i>
              </div>
             </fieldset>
        </div>`
    }
    if (response.barang.warna != "") {
      text += `<div class="col-6 col-md-4">
          <div class="font-small-2">Warna</div>
               <fieldset class="form-group position-relative has-icon-left input-divider-left">
                  <input type="text" name="warna" value="${response.barang.warna}" class="form-control" placeholder="Isi disini" />                     
               <div class="form-control-position"><i class="fas fa-eye-dropper"></i>
             </div>
            </fieldset>
        </div>`
    }
    if (response.barang.tipe != "") {
      text += `<div class="col-6 col-md-4">
          <div class="font-small-2">Type</div>
               <fieldset class="form-group position-relative has-icon-left input-divider-left">
                  <input type="text" name="type" value="${response.barang.tipe}" class="form-control" placeholder="Isi disini" />                     
               <div class="form-control-position"><i class="fas fa-tag"></i>
             </div>
            </fieldset>
        </div>`
    }
    $("#varian_edit").html(text);
    gambar = response.gambar.gambar
    gambar = gambar.split(',');
    console.log(gambar[2]);

    if (gambar[0] != "kosong") {
      chosenImageEdit1.setAttribute("src", "../img/produk/" + gambar[0]);

    }
    if (gambar[1] != "kosong") {
      chosenImageEdit2.setAttribute("src", "../img/produk/" + gambar[1]);

    }
    if (gambar[2] != "kosong") {
      chosenImageEdit3.setAttribute("src", "../img/produk/" + gambar[2]);
    }
    $("#modal_produk").modal('show');
  }
</script>

