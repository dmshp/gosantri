
<!-- centered-slides option-2 swiper start -->
  <section id="component-swiper-centered-slides-2" style="margin-top: 20px;">
      <div class="card">
            <div class="card-header">                            
              <h4>MY MONEY</h4>
              <h4>Rp. 4.567.123</h4>
            </div>
          <div class="card-content">
              <div class="card-body pt-0">

                <?php 
                    $no = 0;    
                    $ketQuery = "SELECT * FROM tabel_link_produk WHERE aktif=1;";
                    $executeSat = mysqli_query($koneksi, $ketQuery);
                    // var_dump($executeSat); die();
                    while ($m=mysqli_fetch_array($executeSat)) {
                    $no++;
                ?>

                <div class="btn box-affiliate-member" href="">
                  <div class="col-12" style="">
                    <div class="controls">
                      <h5 class="font-small-2" style="color: black; font-weight:600;"><?php echo $m['link'] ?></h5>
                    </div>
                  </div>
                  <div class="col-12">
                    <h6 class="font-small-1" style="color: gray; margin-bottom: 15px;">Rp. 1.678.999</h6>
                  </div>
                  <div class="swiper-wrapper">
                    <div class="col-4" style="align-self: center;">
                      <div class="controls">
                        <button type="button" class="btn2 btn-inline-success btn-sm" onclick="">Mutasi</button>
                      </div>
                    </div>
                    <div class="col-8" style="">
                      <div class="controls">
                        <button type="button" class="btn2 btn-inline-warning btn-sm" onclick="">WD</button>
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

<!-- ----------------------- MODAL TAMBAH LINK PRODUK ------------------------ -->
<div id="modal_tambah_produk" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">TAMBAH LINK PRODUK</h4>
      </div>
      <form method="post" action="" enctype="multipart/form-data">
        <div class="modal-body">
          <?php 

            $query_barang = "SELECT * FROM tabel_barang,tabel_barang_gambar,tabel_stok_toko 
                            WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg 
                            AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang";

            $query_barang_2 = "SELECT * FROM tabel_barang,tabel_barang_gambar,tabel_stok_toko 
                            WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg 
                            AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang";

            $data = mysqli_query($koneksi, $query_barang);
            $jumlah_data = mysqli_num_rows($data);
            $total_halaman = ceil($jumlah_data / 2);

            $data_barang = mysqli_query($koneksi, $query_barang_2);
            // $nomor = $halaman_awal + 1;
            
            while ($d = mysqli_fetch_array($data_barang)) {
                // print_r($d);
                $gambars = $d['gambar'];
                $gambars = explode(",", $gambars);
                $harga = $d['hrg_jual'];

            ?>
            <div class="row match-height">
              <div class="col-md-6 col-12">
                  <div class="card">
                      <div class="card-content">
                          <input type="hidden" name="kd_toko" id="kd_toko" value="<?php echo $d['kd_toko']; ?> ">
                          <img class="card-img-top img-fluid" width="20px" height="50%"
                              src="../img/produk/<?php echo $gambars[0]; ?>" />
                          <div class="card-img-overlay overflow-hidden">
                              <h4 class="card-title mt-0 pt-0">
                                  <?php 
                                  if ($d['diskon'] != null) { 
                                      $diskon = ($d['hrg_jual']*$d['diskon'])/100;
                                      $harga = $harga - $diskon;
                                  ?>
                                  <div class="product-image">
                                    <span class="onsale-section">
                                    <span class="onsale"><?php echo $d['diskon']; ?>%<br>OFF</span></span>
                                  </div> 
                                  <?php } else {  ?>  
                                  <?php  } ?> 
                              </h4>
                          </div> 
                          <div class="card-body text-center">
                              <h5><?php echo $d['nm_barang']; ?></h5>
                              <div class="divider">
                                  <div class="divider-text">
                                      <h3 class="font-medium-1 bg-info p-1">
                                          <?php 
                                          if ($d['diskon'] != null) { 
                                              echo "<span class='price-normal' style=text-decoration: line-through;'><sup>Rp.</sup>".$d['hrg_jual']."</span>&nbsp; ";
                                          }?>
                                          <strong><sup>Rp.</sup><?php echo number_format($harga, 0, ",", "."); ?></strong>
                                      </h3>
                                  </div>
                              </div>
                              <div class="d-flex justify-content-between">
                                  <div class="float-left">
                                      Komisi: <?php echo $d['komisi']; ?>
                                  </div>
                                  <div class="float-right">
                                      Stok: <?php echo $d['stok']; ?>
                                  </div>
                              </div>
                              <div class="btn-group d-xl-block d-none justify-content-between mt-2 m-0 p-0">
                                  <a href="../aksi/add_link_produk.php?kd_barang=<?php echo $d['kd_barang']; ?>&nm_barang=<?php echo $d['nm_barang']; ?>&komisi=<?php echo $d['komisi']; ?>"
                                      class="btn btn-success rounded-0"><i class="fa fa-check"></i> Simpan Link</a>
                              </div>
                              <div class="card-btns d-xl-none justify-content-between mt-2 float-right">
                                  <a href="../aksi/add_link_produk.php?kd_barang=<?php echo $d['kd_barang']; ?>&nm_barang=<?php echo $d['nm_barang']; ?>&komisi=<?php echo $d['komisi']; ?>"
                                      class="btn btn-success rounded-0"><i class="fa fa-check"></i> Simpan Link</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <?php } ?>
          
        </div>
        <div class="modal-footer">
          <!-- <div class="col-12 mt-1"> -->
            <!-- <button type="submit" class="btn btn-success btn-sm" id="upload_product" name="upload_product">Simpan</button> -->
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
          <!-- </div> -->
        </div>
      </form>
    </div>

  </div>
</div>

<!-- ----------------------- MODAL EDIT LINK PRODUK ------------------------ -->
<div id="modal_edit_produk" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">EDIT LINK PRODUK</h4>
      </div>
      <form method="post" action="" enctype="multipart/form-data">
        <div class="modal-body">
          <?php 

            $query_barang = "SELECT * FROM tabel_barang,tabel_barang_gambar,tabel_stok_toko 
                            WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg 
                            AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang";

            $query_barang_2 = "SELECT * FROM tabel_barang,tabel_barang_gambar,tabel_stok_toko 
                            WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg 
                            AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang";

            $data = mysqli_query($koneksi, $query_barang);
            $jumlah_data = mysqli_num_rows($data);
            $total_halaman = ceil($jumlah_data / 2);

            $data_barang = mysqli_query($koneksi, $query_barang_2);
            // $nomor = $halaman_awal + 1;
            
            while ($d = mysqli_fetch_array($data_barang)) {
                // print_r($d);
                $gambars = $d['gambar'];
                $gambars = explode(",", $gambars);
                $harga = $d['hrg_jual'];

            ?>
            <div class="row match-height">
              <div class="col-md-6 col-12">
                  <div class="card">
                      <div class="card-content">
                          <input type="hidden" name="edit_kd_barang" id="edit_kd_barang" readonly>
                          <input type="hidden" name="kd_toko" id="kd_toko" readonly value="<?php echo $d['kd_toko']; ?> ">
                          <img class="card-img-top img-fluid" width="20px" height="50%"
                              src="../img/produk/<?php echo $gambars[0]; ?>" />
                          <div class="card-img-overlay overflow-hidden">
                              <h4 class="card-title mt-0 pt-0">
                                  <?php 
                                  if ($d['diskon'] != null) { 
                                      $diskon = ($d['hrg_jual']*$d['diskon'])/100;
                                      $harga = $harga - $diskon;
                                  ?>
                                  <div class="product-image">
                                    <span class="onsale-section">
                                    <span class="onsale"><?php echo $d['diskon']; ?>%<br>OFF</span></span>
                                  </div> 
                                  <?php } else {  ?>  
                                  <?php  } ?> 
                              </h4>
                          </div> 
                          <div class="card-body text-center">
                              <h5><?php echo $d['nm_barang']; ?></h5>
                              <div class="divider">
                                  <div class="divider-text">
                                      <h3 class="font-medium-1 bg-info p-1">
                                          <?php 
                                          if ($d['diskon'] != null) { 
                                              echo "<span class='price-normal' style=text-decoration: line-through;'><sup>Rp.</sup>".$d['hrg_jual']."</span>&nbsp; ";
                                          }?>
                                          <strong><sup>Rp.</sup><?php echo number_format($harga, 0, ",", "."); ?></strong>
                                      </h3>
                                  </div>
                              </div>
                              <div class="d-flex justify-content-between">
                                  <div class="float-left">
                                      Komisi: <?php echo $d['komisi']; ?>
                                  </div>
                                  <div class="float-right">
                                      Stok: <?php echo $d['stok']; ?>
                                  </div>
                              </div>
                              <div class="btn-group d-xl-block d-none justify-content-between mt-2 m-0 p-0">
                                  <a href="" onclick="simpanEditLinkProduk(`<?php echo $d['kd_barang'] ?>`, `<?php echo $d['nm_barang'] ?>`, `<?php echo $d['komisi'] ?>`)" class="btn btn-success rounded-0"><i class="fa fa-check"></i> Simpan Link</a>
                              </div>
                              <div class="card-btns d-xl-none justify-content-between mt-2 float-right">
                                  <a href="" onclick="simpanEditLinkProduk(`<?php echo $d['kd_barang'] ?>`, `<?php echo $d['nm_barang'] ?>`, `<?php echo $d['komisi'] ?>`)" class="btn btn-success rounded-0"><i class="fa fa-check"></i> Simpan Link</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <?php } ?>
          
        </div>
        <div class="modal-footer">
          <!-- <div class="col-12 mt-1"> -->
            <!-- <button type="submit" class="btn btn-success btn-sm" id="upload_product" name="upload_product">Simpan</button> -->
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
          <!-- </div> -->
        </div>
      </form>
    </div>

  </div>
</div>

<script type="text/javascript">

  function editLinkProduk(id) {
    $('#edit_kd_barang').val(id);
    $('#modal_edit_produk').modal('show');
  }

  function simpanEditLinkProduk(kd_barang, nm_barang, komisi) {

    var id_link = $('#edit_kd_barang').val();

    $.ajax({
      type: "GET",
      url: "../aksi/edit_link_produk.php?id_link=" + id_link + "&kd_barang=" + kd_barang + "&nm_barang=" + nm_barang + "&komisi=" + komisi,
      async: false,
      success: function(text) {
        // alert(text);
        if (text = 'Link Berhasil Di Simpan') {
            Swal.fire('BERHASIL!',text,'success')
            .then(function() {
              window.location = "../page/?menu=produk_link";
            });
        } else {
            Swal.fire('GAGAL!',text,'danger')
            .then(function() {
              window.location = "../page/?menu=produk_link";
            });
        }
        
      }
    })
  }
  
  function hapusLinkProduk(id_link) {
    console.log(id_user);
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
        url: "../aksi/delete_link_produk.php?id_link=" + id_link,
        async: false,
        success: function(text) {
          // alert(text);
          if (text = 'Link Berhasil Di Hapus') {
              Swal.fire('BERHASIL!',text,'success')
              .then(function() {
                window.location = "../page/?menu=produk_link";
              });
          } else {
              Swal.fire('GAGAL!',text,'danger')
              .then(function() {
                window.location = "../page/?menu=produk_link";
              });
          }
          
        }
      })
      }
    })
    
  }

</script>
