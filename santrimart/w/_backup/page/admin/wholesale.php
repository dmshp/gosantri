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
                            <li class="breadcrumb-item"><a href="#" class="text-dark">Wholesale (Pembelian)</a>
                            </li>                                   
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>       
    <div class="row">
      <div class="col-lg-8 col-md-12 col-sm-12">
        <!-- Data list view starts -->
        <section id="horizontal-vertical">
          <div class="card">
            <div class="row mt-2 p-1">
            	<div class="col-lg-6 col-6">
                  <fieldset>
                    <label for="basicInput">Gunakan Scanner Anda</label>
                     <div class="input-group">
                         <input type="text" class="form-control" autofocus="autofocus" placeholder="Scan Here!" aria-describedby="button-addon2">
                            <div class="input-group-append" id="button-addon2">
                               <button class="btn btn-primary rounded-0" type="button"><i class="fas fa-qrcode"></i></button>
                            </div>
                         </div>
                  </fieldset>        
                </div>
                <div class="col-lg-6 col-6">
                	<div class="form-group">
                     <label for="basicInput">Cari Nama Barang</label>
                     <input type="text" class="form-control" name="barang" id="barang" placeholder="Masukan Nama Barang" onkeyup="pilihProduk()">
                   </div>
                </div>        
            </div>
            <div id="tabel-pilih-produk" class="mr-4 ml-4 mb-1"></div>
            <div class="table-responsive p-1">
              <table class="table text-center table-striped" id="tableTransaksi">
                <thead>
                  <tr>                                    
                    <th>ID.BARANG</th>
                    <th>PRODUK</th>
                    <th>HARGA</th>
                    <th>JUMLAH</th>
                    <th>SUBTOTAL</th>
                    <th>HAPUS</th>
                  </tr>
                </thead>
                <tbody id="isi-tabel">
                  <tr id="tabel-contoh">                                    
                    <td>-</td>
                    <td>-</td>
                    <td>-</td>
                    <td>-
                    <!-- <form> -->
                       <!-- <div class="d-inline-block mb-1">
                         <div class="input-group">
                           <input type="number" class="touchspin rounded-0" value="1">
                         </div>
                       </div> -->
                      <!-- </form>  -->
                    </td>
                    <!-- <td>-</td> -->
                    <td>-</td>
                    <td><a href="#" class="action-delete"><i class="far fa-trash-alt"></i></a></td>
                  </tr>
                  
                                      
                </tbody>
              </table>
              <hr class="mt-2 mb-2">
              <table class="table">

                <tbody class="text-center">

                  <tr class="footer-tr">

                    <td>Disc</td>

                    <td>0</td>

                    <td>Total Barang</td>

                    <td id="sum-product">0</td>

                    <td>Total Harga</td>

                    <td id="sum_price">Rp.0</td>

                  </tr>

                </tbody>
              </table>
            </div>
          </div>
        </section>
        <!-- Data list view end -->

        <!-- Data tabel starts -->
        <!-- Data tabel end -->
      </div>
      <div class="col-lg-4 col-md-12 col-sm-12">
        <div class="card">           
          <div class="content-body">
            <div class="card-body">
              
              <div class="card">
                <div class="card-content">
                  <div class="card-body">
                    <form class="form form-horizontal" method="post" action="../aksi/add_pembelian.php">
                      <div class="form-body">
                        <div class="row">
                          <div class="col-12 mb-2">
                            <?php 
                              $kd_toko = $_SESSION['kd_toko'];
                              // membuat nomor faktur
                              $nomorFaktur = "BELI";
                                $query_tabel_toko = "SELECT * FROM `tabel_toko` WHERE `kd_toko` = '$kd_toko'";
                                $hasil_tabel_toko = mysqli_fetch_array(mysqli_query($koneksi, $query_tabel_toko));
                              $nama_toko_upper = strtoupper(substr($hasil_tabel_toko['nm_toko'],0,3));
                              // no faktur + nama toko
                              $nomorFaktur .= $nama_toko_upper;

                                $query_tabel_pembelian = "SELECT * FROM `tabel_pembelian` WHERE `no_faktur_pembelian` LIKE '%$nama_toko_upper%'";
                                $hasil_tabel_pembelian = mysqli_query($koneksi, $query_tabel_pembelian);
                                $old_faktur = "";
                                $new_faktur = "";
                                while($h=mysqli_fetch_array($hasil_tabel_pembelian)){
                                  $old_faktur = $h['no_faktur_pembelian'];
                                }

                              // no faktur + urutan
                              if($old_faktur == null){
                                $new_faktur .= "00001";
                              }
                              else{
                                $old_faktur = substr($old_faktur,strlen($old_faktur)-5)+1;
                                $nol = 5 - strlen($old_faktur);
                                while($nol > 0){
                                  $new_faktur .= '0';
                                  $nol --;
                                }
                                $new_faktur = $new_faktur.$old_faktur;  
                              }
                              $nomorFaktur .= $new_faktur;
                             ?>
                            <h3 class="display-4 text-center m-1"><?php echo $nomorFaktur; ?></h3>
                          </div> 

                          <input type="text" name="kd_barang" id="id_barang" hidden>

                          <input type="text" name="jumlah" id="jumlah" hidden>

                          <input type="text" name="faktur" value="<?php echo $nomorFaktur; ?>" hidden>
                              
                          <div class="col-12">
                             <div class="form-group row">
                                <div class="col-md-4"><span>Harga Total</span></div>
                                <div class="col-md-8">
                                  <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga" readonly>
                                 </div>
                              </div>
                          </div>
                          <div class="col-12">
                             <div class="form-group row">
                                <div class="col-md-4"><span>Pengiriman</span></div>
                                <div class="col-md-8">
                                  <input type="text" id="pengiriman" name="pengiriman" class="form-control" placeholder="Isi jika perlu" aria-describedby="button-addon2" onkeyup="setBiaya()">
                                 </div>
                              </div>
                          </div>
                          <div class="col-12">
                             <div class="form-group row">
                                <div class="col-md-4"><span>Biaya Total</span></div>
                                <div class="col-md-8">
                                  <input type="text" readonly class="form-control" id="biaya_total" name="biaya_total" placeholder="Biaya Total">
                                 </div>
                              </div>
                          </div>
                                             
                          <div class="btn-group" role="group" aria-label="Basic example">
                             <button type="submit" class="btn btn-primary rounded-0 mr-1 mb-1 ml-1" name="add_pembelian">Print</button>
                             <button type="reset" class="btn btn-danger rounded-0 mr-1 mb-1">Batal</button>
                          </div>
                        </div>
                      </div>
                    </form>
                    <!-- <button type="button" onclick="hitungDataTabel()">hi</button> -->
                  </div>
                </div>
              </div>
            </div>  
            
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">


  function pilihProduk(){
    var nama = $('#barang').val();
    var tabel = document.getElementById('tabel-pilih-produk');
    console.log(nama);
    if(nama == ""){
      console.log("kosong");
      tabel.innerHTML = "<div class='text-center'><font color='red'><blink>Kosong!</blink></font></div>";
    }
    else{ 
      $.ajax({
          type: "GET",
          url: '../aksi/tabel_pilih_produk.php?key='+nama,
          dataType: "html",
          async: false,
          success: function(text) {
              tabel.innerHTML = text;
          }
      });
    }


  }

  function setBiaya(){
    var harga = $('#harga').val();
    var pengiriman = $('#pengiriman').val();

    if(pengiriman == ""){
      pengiriman = 0;
    }

    biaya_total = parseInt(harga)+parseInt(pengiriman);

    $('#biaya_total').val(biaya_total);
  }

  function add_data(kd_barang) {
    // console.log($("#barang").val())

    var tabel = document.getElementById('tabel-pilih-produk');
    $('#barang').val('');
    tabel.innerHTML = "<div class='text-center'></div>";

    $.ajax({

        type: "POST",

        url: "../aksi/kasir_add_to_table.php",

        // dataType: "html",

        data: {

            id_barang: kd_barang

        },

        success: function(data) {
            // console.log(data)
            response = JSON.parse(data);
            // console.log(response);

            var text =`<tr id="kode${response.kd_barang}">                                    
                        <td id="kd_barang">${response.kd_barang}</td>
                        <td>${response.nm_barang}</td>
                        <td>${response.hrg_beli}</td>
                        <td>
                          <div class="d-inline-block mb-1">
                            <div class="input-group">
                              <input type="number" class="touchspin rounded-0" value="1" onchange="cek_jumlah()">
                            </div>
                          </div>
                        </td>
                        <td id="sum_harga">${response.hrg_beli}</td>
                        <td><a href="#" class="action-delete" onclick="delete_(this)"><i class="far fa-trash-alt"></i></a></td>
                      </tr>`;
            $("#tabel-contoh").remove();

            $("#tableTransaksi > tbody ").append(text);

            // $("#barang").val("1");

            cek_jumlah();

            set_jumlah();

            hitungDataTabel()

        }

    });
  }

  function delete_(btn){
    // console.log("kode"+id)
    var row = btn.parentNode.parentNode;
    row.parentNode.removeChild(row);
    // $("#kode"+id+"").remove();

    cek_jumlah();

    set_jumlah();
  }

  function cek_jumlah() {

      $("#tableTransaksi tr").each(function(i) {

          var self = $(this);

          var col_3 = self.find("td:eq(2)").text().trim();

          var col_4 = self.find("td:eq(3) input[type='number']").val();

          var jumlah = parseInt(col_3) * parseInt(col_4);

          if (i > 0) {

              var col_5 = self.find("td:eq(4)").text(jumlah);

          }

      });

      set_jumlah();

      hitungDataTabel();

  }



  function set_jumlah() {

      var totalHarga = 0;

      var jumlah = 0;

      var jumlahBarang = 0;

      $("#tableTransaksi tr").each(function(i) {

          var self = $(this);

          var col_3 = self.find("td:eq(2)").text().trim();

          var col_4 = self.find("td:eq(3) input[type='number']").val();

          if (i > 0) {

              jumlah = parseInt(col_3) * parseInt(col_4);

              var col_5 = self.find("td:eq(4)").text(jumlah);

              jumlahBarang = jumlahBarang + parseInt(col_4);

          }

          totalHarga = totalHarga + jumlah;

      });

      $("#sum_price").text("Rp." + totalHarga);

      $("#harga").val(totalHarga);

      $("#sum-product").text(jumlahBarang);

      setBiaya()

  }

  function hitungDataTabel()
  {
    var kode = "";
    var jml = "";

    $("#isi-tabel tr").each(function(i) {

        var self = $(this);

        var col_0 = self.find("td:eq(0)").text().trim();

        var col_4 = self.find("td:eq(3) input[type='number']").val();

        kode += col_0+',';
        jml += col_4+',';

    });


    kode = kode.substring(0, kode.length-1);
    jml = jml.substring(0, jml.length-1);

    console.log(jml);

    $('#id_barang').val(kode);
    $('#jumlah').val(jml);

    // console.log(kode)

  }
</script>
<!-- END: Content
