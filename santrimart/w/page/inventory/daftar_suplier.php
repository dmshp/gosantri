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
                                <li class="breadcrumb-item"><a href="index.php?menu=inventory" class="text-dark">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#" class="text-dark">Supplier</a>
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
                        <h3 class="mb-3 display-5 text-uppercase">Daftar Supplier</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-12 pb-5">

                        <form method="post" action="../aksi/add_supplier.php" enctype="multipart/form-data">

                            <div class="row">
                                <div class="col-12">
                                  <div class="form-group">
                                    <div class="controls">
                                      <label for="account-name">Nama</label>
                                      <input type="text" class="form-control" name="add_nm_suppier" id="add_nm_suppier" placeholder="Nama Supplier" required>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-5">
                                  <div class="form-group">
                                    <div class="controls">
                                      <label for="account-name">Nomor HP (kontak)</label>
                                      <input type="text" class="form-control" name="add_nomor_hp" id="add_nomor_hp" placeholder="Nomor HP" required>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-12 col-sm-7">
                                  <div class="form-group">
                                    <div class="controls">
                                      <label for="account-name">Email</label>
                                      <input type="email" class="form-control" name="add_email" id="add_email" placeholder="Email" required>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                  <div class="font-small-2 mb-1">Alamat</div>
                                    <fieldset class="form-label-group mb-0">
                                        <textarea data-length=100 class="form-control char-textarea" rows="3"
                                            name="add_alamat" id="add_alamat" required placeholder="Alamat Detail Isi disini"></textarea>
                                    </fieldset>
                                    <small class="counter-value float-right"><span class="char-count">maks.</span> / 100
                                        karakter</small>
                                </div>
                                <div class="col-12">
                                    <div class="font-small-2 mb-1">Keterangan</div>
                                    <fieldset class="form-label-group mb-0">
                                        <textarea data-length=100 class="form-control char-textarea" rows="3"
                                            name="add_keterangan" id="add_keterangan" required placeholder="Isi disini"></textarea>
                                    </fieldset>
                                    <small class="counter-value float-right"><span class="char-count">maks.</span> / 100
                                        karakter</small>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 mt-1">
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                    <button type="button" class="btn btn-danger"  onClick="delete_(0)">Batal</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-9 col-12">
                        <div class="badge badge-primary float-right">
                            <?php $sql = mysqli_query($koneksi, "SELECT * FROM tabel_supplier");
                            $jml_supplier = mysqli_num_rows($sql); ?>
                            <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2 nama-user">
                                <?php echo $jml_supplier ?></span>Total Supplier
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped dataex-html5-selectors">
                                <thead>
                                    <tr>
                                        <th class="text-center">Kode</th>
                                        <th class="text-center">Tgl Masuk</th>
                                        <th class="text-center">Supplier</th>
                                        <th class="text-center">Kontak</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">Keterangan</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                      $ketQuery = "SELECT * FROM tabel_supplier";
                                      $executeSat = mysqli_query($koneksi, $ketQuery);
                                      while ($b = mysqli_fetch_array($executeSat)) {
                                        // print_r($b)
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $b['kd_supplier']; ?></td>
                                        <td class="text-center"><?php echo date("d-m-Y", strtotime($b['tgl_masuk'])); ?></td>
                                        <td class="text-capitalize"><?php echo $b['nama']; ?></td>
                                        <td>
                                            <div><?php echo $b['telepon']; ?></div>
                                            <div><?php echo $b['email']; ?></div>
                                        </td>
                                        <td><?php echo $b['alamat']; ?></td>
                                        <td><?php echo $b['keterangan']; ?></td>
                                        <td class="text-center">
                                            <?php if ($b['aktif'] == 1) {?>
                                            <button type="button" class="btn btn-success btn-sm" title="Klik disini Untuk Ganti Status" onclick="edit_status(`<?php echo $b['kd_supplier'] ?>`,`<?php echo $b['aktif'] ?>`)">
                                                Aktif
                                            </button>
                                            <?php } else {?>
                                            <button type="button" class="btn btn-danger btn-sm" title="Klik disini Untuk Ganti Status" onclick="edit_status(`<?php echo $b['kd_supplier'] ?>`,`<?php echo $b['aktif'] ?>`)">
                                                Tidak Aktif
                                            </button>
                                            <?php }?>
                                        </td>
                                        <td class="text-center">
                                            <a class="badge badge-warning text-white" title="Edit Data Supplier" onclick="edit_data(`<?php echo $b['kd_supplier'] ?>`,`<?php echo $b['nama'] ?>`,`<?php echo $b['telepon'] ?>`,`<?php echo $b['email'] ?>`,`<?php echo $b['alamat'] ?>`,`<?php echo $b['keterangan'] ?>`)">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a class="badge badge-danger text-white" title="Hapus Data Supplier" onclick="hapus_data(`<?php echo $b['kd_supplier'] ?>`)">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                                <tfoot>
                                    <tr class="header-tabel">
                                        <th class="text-center">Kode</th>
                                        <th class="text-center">Tgl Masuk</th>
                                        <th class="text-center">Supplier</th>
                                        <th class="text-center">Kontak</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">Keterangan</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center"></th>
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

<!-- Modal -->
<div id="modal_edit_supplier" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Edit Data Suppiler</h4>
        </div>
        <form method="post" action="../aksi/edit_supplier.php" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <div class="controls">
                      <label for="account-name">Nama</label>
                      <input type="text" class="form-control" name="edit_nm_suppier" id="edit_nm_suppier" placeholder="Nama Supplier" required>
                      <input type="hidden" class="form-control" name="edit_kd_suppier" id="edit_kd_suppier"readonly required>
                    </div>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-5">
                  <div class="form-group">
                    <div class="controls">
                      <label for="account-name">Nomor HP (kontak)</label>
                      <input type="text" class="form-control" name="edit_nomor_hp" id="edit_nomor_hp" placeholder="Nomor HP" required>
                    </div>
                  </div>
                </div>
                <div class="col-12 col-sm-7">
                  <div class="form-group">
                    <div class="controls">
                      <label for="account-name">Email</label>
                      <input type="email" class="form-control" name="edit_email" id="edit_email" placeholder="Email" required>
                    </div>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                  <div class="font-small-2 mb-1">Alamat</div>
                    <fieldset class="form-label-group mb-0">
                        <textarea data-length=100 class="form-control char-textarea" rows="3"
                            name="edit_alamat" id="edit_alamat" required placeholder="Alamat Detail Isi disini"></textarea>
                    </fieldset>
                    <small class="counter-value float-right"><span class="char-count">maks.</span> / 100
                        karakter</small>
                </div>
                <div class="col-12">
                    <div class="font-small-2 mb-1">Keterangan</div>
                    <fieldset class="form-label-group mb-0">
                        <textarea data-length=100 class="form-control char-textarea" rows="3"
                            name="edit_keterangan" id="edit_keterangan" required placeholder="Isi disini"></textarea>
                    </fieldset>
                    <small class="counter-value float-right"><span class="char-count">maks.</span> / 100
                        karakter</small>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-info btn-sm">
                <i class="fas fa-check"></i> &nbsp;
                Simpan
            </button>
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
                <i class="fas fa-close"></i> &nbsp;
                Tutup
            </button>
        </div>
        </form>
    </div>

  </div>
</div>
<script type="text/javascript">

    $(document).ready(function(){
        $('#add_nm_suppier').focus();
    })

    function edit_status(id_supplier,sts_supplier) {
        Swal.fire({
          title: 'INFORMASI',
          text: "Status Data Yang Dipilih Akan Diubah!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Ubah sekarang!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: "../aksi/edit_status_supplier.php?kd_supplier=" + id_supplier + "&status=" + sts_supplier,
                async: false,
                success: function(text) {
                  // alert(text);
                  if (text = 'Data Berhasil Di Ubah') {
                      Swal.fire('BERHASIL!',text,'success')
                      .then(function() {
                        window.location = "../page/?menu=supplier";
                      });
                  } else {
                      Swal.fire('GAGAL!',text,'error')
                      .then(function() {
                        window.location = "../page/?menu=supplier";
                      });
                  }
                  
                }
            })
          }
        })
    }

    function hapus_data(id_supplier) {
        Swal.fire({
          title: 'INFORMASI',
          text: "Data Yang Dipilih Akan Dihapus!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Ya, Hapus sekarang!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: "../aksi/delete_data_supplier.php?kd_supplier=" + id_supplier,
                async: false,
                success: function(text) {
                  // alert(text);
                  if (text = 'Data Berhasil Di Hapus') {
                      Swal.fire('BERHASIL!',text,'success')
                      .then(function() {
                        window.location = "../page/?menu=supplier";
                      });
                  } else {
                      Swal.fire('GAGAL!',text,'error')
                      .then(function() {
                        window.location = "../page/?menu=supplier";
                      });
                  }
                  
                }
            })
          }
        })
    }

    function edit_data(id_supplier,nama,nomor_hp,email,alamat,ket) {

        $('#edit_kd_suppier').val(id_supplier);
        $('#edit_nm_suppier').val(nama);
        $('#edit_nomor_hp').val(nomor_hp);
        $('#edit_email').val(email);
        $('#edit_alamat').val(alamat);
        $('#edit_keterangan').val(ket);

        $('#modal_edit_supplier').modal('show');
    }

    function delete_(id) {
        $('#add_nm_suppier').val("");
        $('#add_nomor_hp').val("");
        $('#add_email').val("");
        $('#add_alamat').val("");
        $('#add_keterangan').val("");
        $('#add_nm_suppier').focus();
    }
</script>