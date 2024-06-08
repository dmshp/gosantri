
<!-- centered-slides option-2 swiper start -->
  <section id="component-swiper-centered-slides-2" style="margin-top: 20px;">
      <div class="card">
            <div class="card-header">                            
              <h4>PRODUK</h4> 
              <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_tambah_produk">
                <i class="fas fa-plus"></i> &nbsp;
                PRODUK
              </button>
            </div>
          <div class="card-content">
              <div class="card-body pt-0">

                <?php 
                    $no = 0;    
                    $ketQuery = "SELECT a.*, b.*, c.*
                                FROM tabel_barang a
                                INNER JOIN tabel_stok_toko b ON a.kd_barang = b.kd_barang
                                INNER JOIN tabel_barang_gambar c ON a.kd_barang = c.id_brg";
                    $executeSat = mysqli_query($koneksi, $ketQuery);
                    // var_dump($executeSat); die();
                    while ($m=mysqli_fetch_array($executeSat)) {
                    $no++;

                    if ($m['gambar'] != '') {
                      $ft = explode(",",$m['gambar']);
                      $foto = $ft[0];
                    } else {
                      $foto = 'no_image.jpg';
                    }

                    // var_dump($foto); die();
                ?>

                <div class="btn box-affiliate-member" href="">
                  <div class="col-12">
                    <h5 class="font-small-3" style="color: black; font-weight:600;"><?php echo strtoupper($m['nm_barang']) ?> - <?php echo strtoupper($m['kd_barang']) ?></h5>
                  </div>
                  <div class="col-12">
                    <h5 class="font-small-2">Rp.<?php echo number_format($m['hrg_jual'], 0, ",", "."); ?></h5>
                  </div>
                  <div class="col-12" style="text-align-last: center;">
                    <div class="controls">
                      <img src="../img/produk/<?php echo $foto ?>" height="100%" width="80">
                    </div>
                  </div>
                  <div class="col-12">
                    <h5 class="font-small-2">Komisi <?php echo $m['komisi'] ?></h5>
                  </div>
                  <div class="swiper-wrapper">
                    <div class="col-3" style="align-self: center;">
                      <div class="controls">
                        <button type="button" class="btn2 btn-inline-info btn-sm" onclick="editItemProduk(`<?php echo $m['kd_barang'] ?>`, `<?php echo $m['kd_merchant'] ?>`, `<?php echo $m['nm_barang'] ?>`, `<?php echo $m['komisi'] ?>`, `<?php echo $m['stok'] ?>`, `<?php echo $m['berat'] ?>`, `<?php echo $m['hrg_beli'] ?>`, `<?php echo $m['hrg_jual'] ?>`, `<?php echo $m['hrg_grosir'] ?>`, `<?php echo $m['deskripsi'] ?>`)">Edit</button>
                      </div>
                    </div>
                    <div class="col-9" style="">
                      <div class="controls">
                        <button type="button" class="btn2 btn-inline-danger btn-sm" onclick="hapusDataProduk(`<?php echo $m['kd_barang'] ?>`, `<?php echo $m['kd_merchant'] ?>`)">Delete</button>
                      </div>
                    </div>
                  </div>
                </div>

                <?php } ?>   

              </div>
          </div>
      </div>
  </section>
<!-- centered-slides option-2 swiper ends -->


<!-- ----------------------- MODAL TAMBAH PRODUK ------------------------ -->
<div id="modal_tambah_produk" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">TAMBAH PRODUK BARU</h4>
      </div>
      <form method="post" action="../aksi/add_product_affiliate.php" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="col-12 col-md-12">
              <div class="font-small-2">Gunakan Barcode/ Masukkan kode barang manual</div>
              <fieldset>
                <div class="input-group">
                  <input type="text" name="kode" class="form-control" autofocus="autofocus" placeholder="Kode Barang" required>
                  <div class="input-group-append" id="button-addon2">
                    <button class="btn btn-primary rounded-0" type="button"><i class="fas fa-qrcode"></i></button>
                  </div>
                </div>
              </fieldset>
            </div>
            <div class="col-12 col-md-12 mt-2 mb-1">
              <div class="font-small-2">Upload Foto terbaik <span class="badge badge-dark text-title">Max.3 (JPG/JPEG/PNG)</span></div>
            </div>

            <div class="col-12 col-md-4 mb-2">
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
            <div class="col-12 col-md-4 mb-2">
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
            <div class="col-12 col-md-4 mb-2">
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
                <input type="text" name="nama" class="form-control" placeholder="Isi disini" required />
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
              <select name="kategori" id="kategori" class="select2 form-control" required onchange="pilihVarian()">
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
              <select name="merk" class="select2 form-control" required>
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
                Satuan <a href="#" class="badge badge-dark" data-toggle="modal" data-target="#satuan">
                  <i class="fas fa-plus-circle"></i>Tambah</a>
              </div>
              <select class="select2 form-control" name="satuan" required>
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
            <div class="col-4 col-md-4">
              <div class="font-small-2">Jumlah Komisi (%)</div>
              <div class="d-inline-block mb-1">
                <div class="input-group">
                  <input type="number" name="komisi" class="form-control" value="0" required>
                </div>
              </div>
            </div>
            <div class="col-4 col-md-4">
              <div class="font-small-2">Jumlah Stok</div>
              <div class="d-inline-block mb-1">
                <div class="input-group">
                  <input type="number" name="stok" class="form-control" value="0" required>
                  <!-- <input type="number" name="stok" class="touchspin rounded-0" value="1"> -->
                </div>
              </div>
            </div>
            <div class="col-4 col-md-4">
              <div class="font-small-2">Berat (gram)</div>
              <div class="d-inline-block mb-1">
                <div class="input-group">
                  <input type="number" name="berat" id="berat" class="form-control" value="" required>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-md-4">
              <div class="font-small-2 mb-1">Harga Beli Produk</div>
              <fieldset class="form-group position-relative has-icon-left input-divider-left">
                <input type="text" name="harga_beli" class="form-control" placeholder="Isi disini" required/>
                <small class="counter-value float-right"><span class="char-text">Tanpa titik dan Rupiah</span></small>
                <div class="form-control-position"><i class="feather icon-clipboard"></i>
                </div>
              </fieldset>
            </div>
            <div class="col-12 col-md-4">
              <div class="font-small-2 mb-1">Harga Jual Produk</div>
              <fieldset class="form-group position-relative has-icon-left input-divider-left">
                <input type="text" name="harga_jual" class="form-control" placeholder="Isi disini" required/>
                <small class="counter-value float-right"><span class="char-text">Tanpa titik dan Rupiah</span></small>
                <div class="form-control-position"><i class="feather icon-clipboard"></i>
                </div>
              </fieldset>
            </div>
            <div class="col-12 col-md-4">
              <div class="font-small-2 mb-1">Harga Grosir Produk</div>
              <fieldset class="form-group position-relative has-icon-left input-divider-left">
                <input type="text" name="harga_grosir" class="form-control" placeholder="Isi disini" required/>
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
                <textarea data-length=100 class="form-control char-textarea" rows="3" name="deskripsi" placeholder="Isi disini" required></textarea>
              </fieldset>
              <small class="counter-value float-right"><span class="char-count">maks.</span> / 100 karakter</small>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <!-- <div class="col-12 mt-1"> -->
            <button type="submit" class="btn btn-success btn-sm" id="upload_product" name="upload_product">Simpan</button>
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
          <!-- </div> -->
        </div>
      </form>
    </div>

  </div>
</div>

<!---------------------------------------- Modal Produk------------------------------------>
<div class="modal fade" id="modal_edit_produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <form method="post" action="../aksi/edit_data_produk.php" enctype="multipart/form-data" class="form-kategori">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title font-medium-2" id="myModalLabel20"><i class="fas fa-plus-circle"></i> Ubah Data Produk</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <input type="text" hidden name="edit_kd_barang" id="edit_kd_barang" class="form-control" required>
            <input type="text" hidden name="edit_kd_toko" id="edit_kd_toko" class="form-control" required>

            <div class="col-12 col-md-12">
              <div class="font-small-2">Masukkan nama produk anda</div>
              <fieldset class="form-group position-relative has-icon-left input-divider-left">
                <input type="text" name="edit_nm_barang" id="edit_nm_barang" class="form-control" placeholder="Isi disini" value=""  required/>
                <div class="form-control-position"><i class="fas fa-box-open"></i>
                </div>
              </fieldset>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-md-12">
              <div class="font-small-2">Komisi</div>
              <fieldset class="form-group position-relative has-icon-left input-divider-left">
                  <input type="text" name="edit_komisi" id="edit_komisi" class="form-control" value="" required>
                  <div class="form-control-position"><i class="fas fa-box-open"></i></div>
              </fieldset>
            </div>
            <div class="col-12 col-md-12">
              <div class="font-small-2">Jumlah Stok</div>
              <fieldset class="form-group position-relative has-icon-left input-divider-left">
                  <input type="text" name="edit_stok" id="edit_stok" class="form-control" value="" required>
                  <div class="form-control-position"><i class="fas fa-box-open"></i></div>
              </fieldset>
            </div>
            <div class="col-12 col-md-12">
              <div class="font-small-2">Berat (gram)</div>
              <fieldset class="form-group position-relative has-icon-left input-divider-left">
                  <input type="text" name="edit_berat" id="edit_berat" class="form-control" value="" required>
                  <div class="form-control-position"><i class="fas fa-box-open"></i></div>
              </fieldset>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-md-4">
              <div class="font-small-2 mb-1">Harga Beli Produk</div>
              <fieldset class="form-group position-relative has-icon-left input-divider-left">
                <input type="text" name="edit_harga_beli" id="edit_harga_beli" class="form-control" placeholder="Isi disini"  required/>
                <small class="counter-value float-right"><span class="char-count">Tanpa titik dan Rupiah</span></small>
                <div class="form-control-position"><i class="feather icon-clipboard"></i>
                </div>
              </fieldset>
            </div>
            <div class="col-12 col-md-4">
              <div class="font-small-2 mb-1">Harga Jual Produk</div>
              <fieldset class="form-group position-relative has-icon-left input-divider-left">
                <input type="text" name="edit_harga_jual" id="edit_harga_jual" class="form-control" placeholder="Isi disini"  required/>
                <small class="counter-value float-right"><span class="char-count">Tanpa titik dan Rupiah</span></small>
                <div class="form-control-position"><i class="feather icon-clipboard"></i>
                </div>
              </fieldset>
            </div>
            <div class="col-12 col-md-4">
              <div class="font-small-2 mb-1">Harga Grosir Produk</div>
              <fieldset class="form-group position-relative has-icon-left input-divider-left">
                <input type="text" name="edit_harga_grosir" id="edit_harga_grosir" class="form-control" placeholder="Isi disini"  required/>
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
                <textarea data-length=100 class="form-control char-textarea" rows="3" id="edit_deskripsi" name="edit_deskripsi" required>Isi disini</textarea>
              </fieldset>
              <small class="counter-value float-right"><span class="char-count">maks.</span> / 100 karakter</small>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info btn-sm"]>Simpan</button>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript">

  function editItemProduk(kd_brg, kd_merchant, nm_barang, komisi, stok, berat, hrg_beli, hrg_jual, hrg_grosir, deskripsi) {

    $('#edit_kd_barang').val(kd_brg);
    $('#edit_kd_toko').val(kd_merchant);
    $('#edit_nm_barang').val(nm_barang);
    $('#edit_komisi').val(komisi);
    $('#edit_stok').val(stok);
    $('#edit_berat').val(berat);
    $('#edit_harga_beli').val(hrg_beli);
    $('#edit_harga_jual').val(hrg_jual);
    $('#edit_harga_grosir').val(hrg_grosir);
    $('#edit_deskripsi').val(deskripsi);
    $('#modal_edit_produk').modal('show');

  }
  
  function hapusDataProduk(kd_brg, kd_merchant) {
    console.log(kd_brg);
    Swal.fire({
      title: 'INFORMASI',
      text: "Apakah Data Ini Akan dihapus?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus sekarang!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
        type: "GET",
        url: "../aksi/delete_daftar_produk.php?kd_barang=" + kd_brg + "&kd_merchant=" + kd_merchant,
        async: false,
        success: function(text) {
          // alert(text);
          if (text = 'Daftar Produk Berhasil Dihapus') {
              Swal.fire('BERHASIL!',text,'success')
              .then(function() {
                window.location = "../page/?menu=daftar_produk";
              });
          } else {
              Swal.fire('GAGAL!',text,'danger')
              .then(function() {
                window.location = "../page/?menu=daftar_produk";
              });
          }
          
        }
      })
      }
    })
    
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

  function editDataProduk(id) {

    // alert(id);
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
      url: "../aksi/show_produk2.php?id_produk=" + id,
      async: false,
      success: function(text) {
        response = JSON.parse(text);
      }
    });
    console.log(response);
    $('#kd_barang').val(id);
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


