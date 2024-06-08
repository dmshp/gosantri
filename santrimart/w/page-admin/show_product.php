<?php 

  // $id_produk = $_GET['id_produk'];
  $id_produk = $_GET['kode_produk'];
  // var_dump($id_produk);
  // die;

  $ketQuery = "SELECT * FROM `tabel_barang` WHERE `kd_barang` = '$id_produk'";
  $executeSat = mysqli_query($koneksi, $ketQuery);
  $barang=mysqli_fetch_array($executeSat);

  $ketQuery = "SELECT * FROM `tabel_stok_toko` WHERE `kd_barang` = '$id_produk'";
  $executeSat = mysqli_query($koneksi, $ketQuery);
  $stok=mysqli_fetch_array($executeSat);

  $ketQuery = "SELECT * FROM `tabel_barang_gambar` WHERE `id_brg` = '$id_produk'";
  $executeSat = mysqli_query($koneksi, $ketQuery);
  $gambar=mysqli_fetch_array($executeSat);

  $berat = "";
  $panjang = "";
  $lebar = "";
  $tinggi = "";
  $warna = "";
  $type = "";


  if(isset($barang['berat']))
  {
    $berat = $barang['berat'];
  }
  if(isset($barang['panjang']))
  {
    $panjang = $barang['panjang'];
  }
  if(isset($barang['lebar']))
  {
    $lebar = $barang['lebar'];
  }
  if(isset($barang['tinggi']))
  {
    $tinggi = $barang['tinggi'];
  }
  if(isset($barang['warna']))
  {
    $warna = $barang['warna'];
  }
  if(isset($barang['tipe']))
  {
    $type = $barang['tipe'];
  }

  // var_dump($barang);
  // die;
?>

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
                            <li class="breadcrumb-item"><a href="index.php?menu=home" class="text-dark">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="index.php?menu=product" class="text-dark">Produk</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#" class="text-dark">Edit Produk</a>
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
          <div class="divider-text"><h3 class="mb-3 display-4 text-uppercase">Edit Data Produk</h3></div>
        </div>
        <form method="post" action="../aksi/edit_product.php" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-2 col-12 pb-5">
              <div class="row">
                
              </div>
            </div>
          	<div class="col-lg-8 col-12 pb-5">        
              <div class="row">
                <input type="text" name="kode" hidden value="<?php echo $barang['kd_barang'] ?>">
                <input type="text" id="panjang" hidden value="<?php echo $panjang ?>">
                <input type="text" id="lebar" hidden value="<?php echo $lebar ?>">
                <input type="text" id="tinggi" hidden value="<?php echo $tinggi ?>">
                <input type="text" id="warna" hidden value="<?php echo $warna ?>">
                <input type="text" id="type" hidden value="<?php echo $type ?>">

                <!-- <div class="col-12 col-md-12">
                  <div class="font-small-2">Gunakan Barcode/ Masukkan kode barang manual</div>
                  <fieldset>
                      <div class="input-group">
                           <input type="text" name="kode" class="form-control" autofocus="autofocus" placeholder="Scan Here!" value="<?php echo $barang['kd_barang'] ?>">
                              <div class="input-group-append" id="button-addon2">
                                 <button class="btn btn-primary rounded-0" type="button"><i class="fas fa-qrcode"></i></button>
                              </div>
                           </div>
                    </fieldset>
                </div> -->
                <div class="col-12 col-md-12 mt-2 mb-1">
                	<div class="font-small-2">Upload Foto terbaik <span class="badge badge-dark">Max.3 (JPG/JPEG/PNG)</span></div>
                </div>

                <?php 
                  $gambars = $gambar['gambar'];
                  $gambars = explode(",", $gambars);
                ?>
                <div class="col-4 col-md-4 mb-2 mt-2">
                  <span class="position-absolute" onclick="edit_delete_image1()">&times;</span>
                  <br>
                  <input type="text" name="cek_hapus1" id="cek_hapus1" hidden>
                  <figure class="image-container">
                    <?php 
                      if($gambars[0] != "kosong"){
                    ?>
                        <img id="edit-chosen-image1" src="../img/produk/<?php echo $gambars[0] ?>" style="width: 100% !important">
                    <?php     
                      }else{
                    ?>
                        <img id="edit-chosen-image1" style="width: 100% !important">
                    <?php  
                      }
                    ?>
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
                    <?php 
                      if($gambars[1] != "kosong"){
                    ?>
                        <img id="edit-chosen-image2" src="../img/produk/<?php echo $gambars[1] ?>" style="width: 100% !important">
                    <?php     
                      }else{
                    ?>
                        <img id="edit-chosen-image2" style="width: 100% !important">
                    <?php  
                      }
                    ?>
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
                    <?php 
                      if($gambars[2] != "kosong"){
                    ?>
                        <img id="edit-chosen-image3" src="../img/produk/<?php echo $gambars[2] ?>" style="width: 100% !important">
                    <?php     
                      }else{
                    ?>
                        <img id="edit-chosen-image3" style="width: 100% !important">
                    <?php  
                      }
                    ?>
                  </figure>

                  <input class="input-image" type="file" id="edit-upload-button3" name="edit-image3">
                  <label class="label-images" for="edit-upload-button3">
                      <i class="fas fa-upload"></i> &nbsp; Choose A Photo
                  </label>
                </div>
                <div class="col-12 col-md-12">
                   <div class="font-small-2">Masukkan nama produk anda</div>
                       <fieldset class="form-group position-relative has-icon-left input-divider-left">
                          <input type="text" name="nama" class="form-control" value="<?php echo $barang['nm_barang'] ?>" placeholder="Isi disini" />                     
                       <div class="form-control-position"><i class="fas fa-box-open"></i>
                     </div>
                    </fieldset>
                </div>
              </div> 
              <div class="row">
                <div class="col-4 col-md-4">
                  <div class="font-small-2 mt-1 mb-1">
                    Kategori
                    <a href="#" class="badge badge-dark" data-toggle="modal" data-target="#kategori-modal"><i class="fas fa-plus-circle"></i>Tambah</a>
                  </div>
                  <?php
                    $kd_kategori = $barang['kd_kategori'];      
                    $ketQuery = "SELECT * FROM `tabel_kategori_barang` WHERE `kd_kategori` = '$kd_kategori'";
                    $executeSat = mysqli_query($koneksi, $ketQuery);
                    $k=mysqli_fetch_array($executeSat);
                    // die;
                  ?> 
                  <input type="text" hidden name="varian_kategori" id="varian_kategori" value="<?php echo $k['varian'];?>">
                  <select name="kategori" id="kategori" class="select2 form-control" onchange="pilihVarian()">
                    <option value="<?php echo $k['kd_kategori'];?>"><?php echo $k['nm_kategori'];?> </option>
                    <?php error_reporting(0);           
                        $ketQuery = "SELECT * FROM `tabel_kategori_barang` WHERE kd_kategori != '$kd_kategori' ORDER BY `nm_kategori` ASC";
                        $executeSat = mysqli_query($koneksi, $ketQuery);
                        while ($k=mysqli_fetch_array($executeSat)) {
                    ?> 
                    <option value="<?php echo $k['kd_kategori'];?>"><?php echo $k['nm_kategori'];?> </option>
                      <?php } ?>
                  </select>
                </div>
                <div class="col-4 col-md-4">
                	<div class="font-small-2 mt-1 mb-1">Merk
                    <a href="#" class="badge badge-dark" data-toggle="modal" data-target="#merk"><i class="fas fa-plus-circle"></i>Tambah</a>
                  </div>
                  <?php 
                    $kd_merk = $barang['merek'];                              
                    $ketQuery = "SELECT * FROM tabel_merk_barang WHERE id_merk = '$kd_merk'";
                    $executeSat = mysqli_query($koneksi, $ketQuery);
                    $s=mysqli_fetch_array($executeSat);
                  ?>    
                  <select name="merk"  class="select2 form-control">
                    <option value="<?php echo $s['id_merk'];?>"><?php echo $s['merk'];?></option>
                    <?php error_reporting(0);           
                      $ketQuery = "SELECT * FROM tabel_merk_barang WHERE id_merk != '$kd_merk' ORDER BY merk ASC";
                      $executeSat = mysqli_query($koneksi, $ketQuery);
                      while ($s=mysqli_fetch_array($executeSat)) {
                    ?>                 
                    <option value="<?php echo $s['id_merk'];?>"><?php echo $s['merk'];?></option>
       			        <?php } ?>                 
                  </select>
                </div>
                <div class="col-4 col-md-4">
                	<div class="font-small-2 mt-1 mb-1">Satuan Produk 
                    <a href="#" class="badge badge-dark" data-toggle="modal" data-target="#satuan"><i class="fas fa-plus-circle"></i>Tambah</a>
                  </div>
                  <?php 
                    $kd_satuan = $barang['kd_satuan'];            
                    $ketQuery = "SELECT * FROM tabel_satuan_barang WHERE id_satuan = '$kd_satuan'";
                    $executeSat = mysqli_query($koneksi, $ketQuery);
                    $s=mysqli_fetch_array($executeSat);
                  ?>   
                  <select class="select2 form-control" name="satuan">
                    <option value="<?php echo $s['id_satuan'];?>"><?php echo $s['nm_satuan'];?></option>
                    <?php           
                      $ketQuery = "SELECT * FROM tabel_satuan_barang WHERE id_satuan != '$kd_satuan' ORDER BY nm_satuan ASC";
                      $executeSat = mysqli_query($koneksi, $ketQuery);
                      while ($s=mysqli_fetch_array($executeSat)) {
                    ?>                 
                    <option value="<?php echo $s['id_satuan'];?>"><?php echo $s['nm_satuan'];?></option>
               			<?php } ?>                 
                  </select>
                </div>
              </div>

              <!-- varian         -->
              <div class="row mt-2" id="varian">
              
              </div> 
              <div class="row">
                <div class="col-6 col-md-4">
                  <div class="font-small-2">Jumlah Stok</div>
                      <div class="d-inline-block mb-1">
                      <div class="input-group">
                        <input type="text" name="stok" class="form-control" value="<?php echo $stok['stok'] ?>">
                        <!-- <input type="number" name="stok" class="touchspin rounded-0" value="1"> -->
                      </div>
                    </div>
                </div>
								<div class="col-6 col-md-4">
									<div class="font-small-2">Berat (gram)</div>
									<div class="d-inline-block mb-1">
										<div class="input-group">
											<input type="number" name="berat" class="form-control" value="<?php echo $berat ?>">
										</div>
									</div>
								</div>
              </div>
              <div class="row">
                  <div class="col-12 col-md-4">
                     <div class="font-small-2 mb-1">Harga Beli Produk</div>
                         <fieldset class="form-group position-relative has-icon-left input-divider-left">
                            <input type="text" name="harga_beli" class="form-control" placeholder="Isi disini" value="<?php echo $barang['hrg_beli'] ?>" />
                             <small class="counter-value float-right"><span class="char-text">Tanpa titik dan Rupiah</span></small>
                         <div class="form-control-position"><i class="feather icon-clipboard"></i>
                       </div>
                      </fieldset>
                  </div>
                  <div class="col-12 col-md-4">
                     <div class="font-small-2 mb-1">Harga Jual Produk</div>
                         <fieldset class="form-group position-relative has-icon-left input-divider-left">
                            <input type="text" name="harga_jual" class="form-control" placeholder="Isi disini" value="<?php echo $barang['hrg_jual'] ?>"/>
                             <small class="counter-value float-right"><span class="char-text">Tanpa titik dan Rupiah</span></small>
                         <div class="form-control-position"><i class="feather icon-clipboard"></i>
                       </div>
                      </fieldset>
                  </div>
                  <div class="col-12 col-md-4">
                      <div class="font-small-2 mb-1">Harga Grosir Produk</div>
                         <fieldset class="form-group position-relative has-icon-left input-divider-left">
                            <input type="text" name="harga_grosir" class="form-control" placeholder="Isi disini" value="<?php echo $barang['hrg_grosir'] ?>" />
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
                       <textarea data-length=100 class="form-control char-textarea" rows="3" name="deskripsi"><?php echo $barang['deskripsi'] ?></textarea>
                     </fieldset>
                     <small class="counter-value float-right"><span class="char-count">maks.</span> / 100 karakter</small>
                   </div>
              </div>
              <div class="row">
                <div class="col-12 mt-1">
                    <input type="submit" name="upload_edit_product" value="Edit" class="btn btn-primary rounded-0" />
                    <input type="reset" value="Cancel" onClick="hide(0)" class="btn btn-danger rounded-0" />
                  </div>
              </div> 
              
                  
            </div>
            <div class="col-lg-2">

            </div>
          </div>
        </form>      
         	
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
                  <fieldset class="form-group">
                     <div class="custom-file">
                        <input type="file" class="custom-file-input" name="gambar">
                          <label class="custom-file-label" for="image">Choose file</label>
                     </div>
                   </fieldset>
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
  <!---------------------------------------- Modal Merk------------------------------------>  

</div> 

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">

  $(document).ready(function() {

    let panjang = $('#panjang').val();
    let lebar = $('#lebar').val();
    let tinggi = $('#tinggi').val();
    let warna = $('#warna').val();
    let type = $('#type').val();

    let varian = $('#varian_kategori').val();
    let text = "";
    console.log(varian);
    varian = varian.replace('"', '');
    varian = varian.split(',');

    for (var i = 0; i < varian.length; i++) {
      if(varian[i] == 'panjang')
      {
        text += `<div class="col-6 col-md-4">
            <div class="font-small-2">Panjang</div>
               <fieldset class="form-group position-relative has-icon-left input-divider-left">
                  <input type="text" name="panjang" value="${panjang}" class="form-control" placeholder="Isi disini" />                     
               <div class="form-control-position"><i class="fas fa-ruler-horizontal"></i>
             </div>
            </fieldset>
          </div>`
      }
      else if(varian[i] == 'lebar')
      {
        text += `<div class="col-6 col-md-4">
            <div class="font-small-2">Lebar</div>
                <fieldset class="form-group position-relative has-icon-left input-divider-left">
                   <input type="text" name="lebar" value="${lebar}" class="form-control" placeholder="Isi disini" />                     
                <div class="form-control-position"><i class="fas fa-ruler-combined"></i>
               </div>
              </fieldset>
          </div>`
      }
      else if(varian[i] == 'tinggi')
      {
        text += `<div class="col-6 col-md-4">
             <div class="font-small-2">Tinggi</div>
                <fieldset class="form-group position-relative has-icon-left input-divider-left">
                    <input type="text" name="tinggi" value="${tinggi}" class="form-control" placeholder="Isi disini" />                     
                 <div class="form-control-position"><i class="fas fa-ruler-vertical"></i>
                </div>
               </fieldset>
          </div>`
      }
      else if(varian[i] == 'warna')
      {
        text += `<div class="col-6 col-md-4">
            <div class="font-small-2">Warna</div>
                 <fieldset class="form-group position-relative has-icon-left input-divider-left">
                    <input type="text" name="warna" value="${warna}" class="form-control" placeholder="Isi disini" />                     
                 <div class="form-control-position"><i class="fas fa-eye-dropper"></i>
               </div>
              </fieldset>
          </div>`
      }
      else if(varian[i] == 'type')
      {
        text += `<div class="col-6 col-md-4">
            <div class="font-small-2">Type</div>
                 <fieldset class="form-group position-relative has-icon-left input-divider-left">
                    <input type="text" name="type" value="${type}" class="form-control" placeholder="Isi disini" />                     
                 <div class="form-control-position"><i class="fas fa-tag"></i>
               </div>
              </fieldset>
          </div>`
          console.log('ada bos')
      }
    }
    if(text == "")
    {
      text += `<div class="col-6 col-md-12">
            <p class="text-center"> tidak ada varian </p>
          </div>`
    }

    $("#varian").html(text);
  });

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
          chosenImageEdit1.setAttribute("src",reader.result);
      }
  }

  function edit_delete_image1(){
    chosenImageEdit1.setAttribute("src","")
    $('#cek_hapus1').val('1');
  }

  uploadButtonEdit2.onchange = () => {
      let reader = new FileReader();
      reader.readAsDataURL(uploadButtonEdit2.files[0]);
      reader.onload = () => {
          chosenImageEdit2.setAttribute("src",reader.result);
      }
  }

  function edit_delete_image2(){
    chosenImageEdit2.setAttribute("src","")
    $('#cek_hapus2').val('1');
  }

  uploadButtonEdit3.onchange = () => {
      let reader = new FileReader();
      reader.readAsDataURL(uploadButtonEdit3.files[0]);
      reader.onload = () => {
          chosenImageEdit3.setAttribute("src",reader.result);
      }
  }

  function edit_delete_image3(){
    chosenImageEdit3.setAttribute("src","")
    $('#cek_hapus3').val('1');
  }


  function pilihVarian() {
    var x = document.getElementById("kategori").value;
    var response = '';
    $.ajax({
        type: "GET",
        url: "../aksi/select_varian_in_kategori.php?id_kategori="+x,
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
      if(varian[i] == 'panjang')
      {
        text += `<div class="col-6 col-md-4">
            <div class="font-small-2">Panjang</div>
               <fieldset class="form-group position-relative has-icon-left input-divider-left">
                  <input type="text" name="panjang" class="form-control" placeholder="Isi disini" />                     
               <div class="form-control-position"><i class="fas fa-ruler-horizontal"></i>
             </div>
            </fieldset>
          </div>`
      }
      else if(varian[i] == 'lebar')
      {
        text += `<div class="col-6 col-md-4">
            <div class="font-small-2">Lebar</div>
                <fieldset class="form-group position-relative has-icon-left input-divider-left">
                   <input type="text" name="lebar" class="form-control" placeholder="Isi disini" />                     
                <div class="form-control-position"><i class="fas fa-ruler-combined"></i>
               </div>
              </fieldset>
          </div>`
      }
      else if(varian[i] == 'tinggi')
      {
        text += `<div class="col-6 col-md-4">
             <div class="font-small-2">Tinggi</div>
                <fieldset class="form-group position-relative has-icon-left input-divider-left">
                    <input type="text" name="tinggi" class="form-control" placeholder="Isi disini" />                     
                 <div class="form-control-position"><i class="fas fa-ruler-vertical"></i>
                </div>
               </fieldset>
          </div>`
      }
      else if(varian[i] == 'warna')
      {
        text += `<div class="col-6 col-md-4">
            <div class="font-small-2">Warna</div>
                 <fieldset class="form-group position-relative has-icon-left input-divider-left">
                    <input type="text" name="warna" class="form-control" placeholder="Isi disini" />                     
                 <div class="form-control-position"><i class="fas fa-eye-dropper"></i>
               </div>
              </fieldset>
          </div>`
      }
      else if(varian[i] == 'type')
      {
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
    if(text == "")
    {
      text += `<div class="col-6 col-md-12">
            <p class="text-center"> tidak ada varian </p>
          </div>`
    }

    $("#varian").html(text);
  }

</script>