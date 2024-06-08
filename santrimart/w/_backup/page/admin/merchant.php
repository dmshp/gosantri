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
                <li class="breadcrumb-item"><a href="#" class="text-dark">Merchant</a>
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
            <h3 class="mb-3 display-4 text-uppercase">Data Merchant</h3>
          </div>
        </div>
        <div class="row">
          
          <div class="col-12">
            <div class="badge badge-primary float-right">
              <?php $sql_user = mysqli_query($koneksi, "SELECT * FROM tabel_member WHERE akses='merchant'");
              $jumlah_user = mysqli_num_rows($sql_user); ?>
              <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2">
                <?php echo $jumlah_user ?></span>Total merchant
            </div>
            <div class="table-responsive">
              <table class="table table-striped dataex-html5-selectors">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode User</th>
                    <th>Nama User</th>
                    <th>Nama Merchant</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Telp</th>
                    <th>Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $n=1;
                  $ketQuery = "SELECT * FROM tabel_member WHERE akses='merchant' " ;
                  $executeSat = mysqli_query($koneksi, $ketQuery);
                  while ($b = mysqli_fetch_array($executeSat)) {

                    $iduser = $b['id_user'];
                    $sqln = "SELECT * FROM tabel_merchant WHERE id_user='$iduser' " ;
                    $queryn = mysqli_query($koneksi, $sqln);
                    $data = mysqli_fetch_array($queryn);

                  ?>
                    <tr>
                      <td><?php echo $n ?></td>
                      <td><?php echo $b['kode_user'] ?></td>
                      <td><?php echo $b['nm_user'] ?></td>
                      <td><?php echo $data['nm_merchant'] ?></td>
                      <td><?php echo $b['alamat_user'] ?></td>
                      <td><?php echo $b['email_user'] ?></td>
                      <td><?php echo $b['hp'] ?></td>
                      <td><?php echo $b['stt_user'] ?></td>
                      <td>
                        <!-- <a href="#" data-toggle="modal" data-target="#produk<?php echo $b['id_user'] ?>"> -->
                        <a href="index.php?kode_produk=<?php echo $b['id_user'] ?>">
                          <i class="fas fa-edit"></i>
                        </a>
                      </td>
                    </tr>
                  <?php 
                    $n++;
                  } 
                  ?>
                </tbody>
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