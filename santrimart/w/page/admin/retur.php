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
                        <h2 class="content-header-title float-left mb-0 text-dark text-capitalize">
                            <?php echo $_SESSION['akses']; ?></h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php?menu=home" class="text-dark">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#" class="text-dark">Retur</a>
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
                        <h3 class="mb-3 display-5 text-uppercase">Retur Produk</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-12 pb-5">

                        <form method="post" action="../aksi/add_retur.php" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-12 col-md-12 mb-1">
                                    <div class="font-small-2">Cari Faktur</div>
                                    <select name="faktur" id="id_faktur" class="form-control select2"
                                        onchange="pilihProduk()">
                                        <option disabled selected>Pilih No.Faktur</option>
                                        <?php error_reporting(0);
                    $ketQuery = "SELECT * FROM `tabel_rinci_penjualan` ORDER BY `tabel_rinci_penjualan`.`no_faktur_penjualan` ASC";
                    $executeSat = mysqli_query($koneksi, $ketQuery);
                    $faktur_before = "";
                    while ($k = mysqli_fetch_array($executeSat)) {
                      if ($k['no_faktur_penjualan'] != $faktur_before) {
                    ?>
                                        <option value="<?php echo $k['no_faktur_penjualan']; ?>">
                                            <?php echo $k['no_faktur_penjualan']; ?> </option>
                                        <?php
                      }
                      $faktur_before = $k['no_faktur_penjualan'];
                    }
                    ?>
                                    </select>
                                </div>
                                <div class="col-12 col-md-12 mb-1" id="produk">
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col-6 col-md-6">
                                    <div class="font-small-2">Jumlah Retur</div>
                                    <div class="d-inline-block mb-1">
                                        <div class="input-group">
                                            <input type="number" class="form-control" name="jml" id="jml_retur" min="0"
                                                value="1">
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-12 mt-1">
                                    <div class="font-small-2 mb-1">Deskripsi Retur</div>
                                    <fieldset class="form-label-group mb-0">
                                        <textarea data-length=100 class="form-control char-textarea" rows="3"
                                            name="ket">Isi disini</textarea>
                                    </fieldset>
                                    <small class="counter-value float-right"><span class="char-count">maks.</span> / 100
                                        karakter</small>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 mt-1">
                                    <input type="submit" name="retur" value="Kirim" class="btn btn-primary rounded-0" />
                                    <input type="reset" value="Cancel" onClick="hide(0)"
                                        class="btn btn-danger rounded-0" />
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
                                        <th>Jumlah</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                  $ketQuery = "SELECT * FROM tabel_rinci_penjualan, tabel_retur WHERE tabel_rinci_penjualan.kd_barang = tabel_retur.kd_barang";
                  $executeSat = mysqli_query($koneksi, $ketQuery);
                  while ($b = mysqli_fetch_array($executeSat)) {
                    // print_r($b)
                  ?>
                                    <tr>
                                        <td><?php echo $b['kd_barang']; ?></td>
                                        <td class="text-capitalize"><?php echo $b['nm_barang']; ?></td>
                                        <td><?php echo $b['total_retur']; ?></td>
                                        <td><?php echo $b['tgl_retur']; ?></td>
                                        <td><?php echo $b['ket']; ?></td>
                                        <td>
                                            <a href="index.php?menu=edit_retur&id=<?php echo $b['id'] ?>">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a class="action-delete" onclick="delete_(`<?php echo $b['id'] ?>`)">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Kode</th>
                                        <th>Produk</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal</th>
                                        <th>Keterangan</th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
                <!-- END: Content-->
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function pilihProduk() {
    var x = document.getElementById("id_faktur").value;
    // console.log(x);
    var response = [];
    $.ajax({
        type: "GET",
        url: "../aksi/select_produk_retur.php?faktur=" + x,
        async: false,
        success: function(text) {
            response = JSON.parse(text)
        }
    });

    let text = "";

    text = `<div class="font-small-2">Cari Produk</div>
            <select name="produk" id="produk_pilih" class="form-control select2" onchange="max()">
              <option disabled selected>Pilih Produk</option>`;

    for (var i = 0; i < response['nama'].length; i++) {
        text += `<option value="${response['kode'][i]}">${response['nama'][i]}</option>`;
    }

    text += `</select>`;

    $("#produk").html(text);
}

function max() {
    var kd_barang = $('#produk_pilih').val();
    var faktur = $('#id_faktur').val();
    $.ajax({
        type: "GET",
        url: `../aksi/jml_produk_retur.php?faktur=${faktur}&&kd_barang=${kd_barang}`,
        async: false,
        success: function(text) {
            response = JSON.parse(text)
        }
    });

    document.getElementById("jml_retur").max = response;
}

function delete_(id) {
    $.ajax({
        type: "GET",
        url: "../aksi/delete_retur.php?id=" + id,
        async: false,
        success: function(text) {
            alert(text);
        }
    });
}
</script>