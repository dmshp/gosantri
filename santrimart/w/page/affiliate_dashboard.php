
<!-- centered-slides option-2 swiper start -->
  <section id="component-swiper-centered-slides-2" style="margin-top: 20px;">
      <div class="card">
            <div class="card-header">
            <h4>DASHBOARD</h4> 
          </div>
          <div class="card-content">
              <div class="card-body pt-0">
                <div class="row" style="text-align: center;">
                  <div class="col-12">
                    <input type="hidden" name="level" id="level" value="<?php echo $_SESSION['akses']?>">

                    <?php

                    if ($_SESSION['akses'] == 'merchant') {

                      $sql_produk = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(a.kd_barang)jml
                        FROM tabel_barang a
                        INNER JOIN tabel_stok_toko b ON a.kd_barang = b.kd_barang
                        INNER JOIN tabel_barang_gambar c ON a.kd_barang = c.id_brg;
                        "));
                      $tot_produk = $sql_produk['jml']; 
                    ?>
                    <a class="btn btn-icon text-center box-affiliate" href="?menu=daftar_produk">	
                      <h5 style="color: black; font-weight:600;">#Produk</h5><br/>
                      <h6 class="font-small-2"><?php echo number_format($tot_produk); ?></h6>
                    </a>

                    <?php 
                      $akses = 'member';
                      $sql_user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(a.id_user)jml FROM tabel_member a WHERE a.akses = '$akses'"));
                      $juml_member = $sql_user['jml']; 
                    ?>
                    <a class="btn btn-icon text-center box-affiliate" href="?menu=user_member">	
                      <h5 style="color: black; font-weight:600;">#Member</h5><br/>
                      <h6 class="font-small-2"><?php echo number_format($juml_member); ?></h6>
                    </a>

                    <a class="btn btn-icon text-center box-affiliate" href="">	
                      <h5 style="color: black; font-weight:600;">Total Komisi</h5><br/>
                      <h6 class="font-small-2">Rp. 1.234.567</h6>
                    </a>

                    <a class="btn btn-icon text-center box-affiliate" href="">	
                      <h5 style="color: black; font-weight:600;">Total WD</h5><br/>
                      <h6 class="font-small-2">Rp. 12.345.678</h6>
                    </a>

                    <a class="btn btn-icon text-center box-affiliate" href="">	
                      <h5 style="color: black; font-weight:600;">Total Hit</h5><br/>
                      <h6 class="font-small-2">Rp. 1.234.567</h6>
                    </a>

                    <?php 
                      $akses = 'merchant';
                      $query = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(a.id_user)jml FROM tabel_member a WHERE a.akses = '$akses'"));
                      $jml_merchant = $query['jml']; 
                    ?>

                    <a class="btn btn-icon text-center box-affiliate" href="?menu=daftar_leads">	
                      <h5 style="color: black; font-weight:600;">Total Lead</h5><br/>
                      <h6 class="font-small-2"><?php echo number_format($jml_merchant); ?></h6>
                    </a>


                    <?php } else if ($_SESSION['akses'] == 'member') { ?>

                    <a class="btn btn-icon text-center box-affiliate" href="?menu=komisi">  
                      <h5 style="color: black; font-weight:600;">Komisi</h5><br/>
                      <h6 class="font-small-2">Rp. 1.234.567</h6>
                    </a>

                    <a class="btn btn-icon text-center box-affiliate" href="">  
                      <h5 style="color: black; font-weight:600;">Total WD</h5><br/>
                      <h6 class="font-small-2">Rp. 12.345.678</h6>
                    </a>

                    <?php 
                      $query2 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(id_link)jml FROM tabel_link_produk WHERE aktif=1"));
                      $jml_link = $query2['jml']; 
                    ?>

                    <a class="btn btn-icon text-center box-affiliate" href="?menu=produk_link">  
                      <h5 style="color: black; font-weight:600;">#Link</h5><br/>
                      <h6 class="font-small-2"><?php echo number_format($jml_link); ?></h6>
                    </a>

                    <a class="btn btn-icon text-center box-affiliate" href="">  
                      <h5 style="color: black; font-weight:600;">Hit</h5><br/>
                      <h6 class="font-small-2">Rp. 1.234.567</h6>
                    </a>

                    <?php }?>

                  </div>
                </div>
              </div>
          </div>
      </div>
  </section>
<!-- centered-slides option-2 swiper ends -->
	  
<!-- Multiple Slides Per View swiper start -->
  <section id="component-swiper-multiple">
      <div class="card">
          <div class="card-header">                           
  					<h4>MONITORING</h4> 
					<!-- <p>Pengertian serta deskripsi layanan <b>SantriGo</b></p> -->
          </div>
          <?php 

            // -------------------------------------- REKAP PENDAPATAN ----------------------------

            $no = 0;
              $nm_bulan         = array();
              $nilai_pendapatan = array();
              $query_pendapatan = "SELECT x.periode, x.bln, sum(x.qty)jml, sum(x.tot_harga)tot_harga FROM (
                            SELECT month(a.tgl_penjualan)as periode, 
                            case when month(a.tgl_penjualan)= '1' then 'Jan'
                            when month(a.tgl_penjualan)= '2' then 'Feb'
                            when month(a.tgl_penjualan)= '3' then 'Mar'
                            when month(a.tgl_penjualan)= '4' then 'Apr'
                            when month(a.tgl_penjualan)= '5' then 'Mei'
                            when month(a.tgl_penjualan)= '6' then 'Jun'
                            when month(a.tgl_penjualan)= '7' then 'Jul'
                            when month(a.tgl_penjualan)= '8' then 'Agu'
                            when month(a.tgl_penjualan)= '9' then 'Sep'
                            when month(a.tgl_penjualan)= '10' then 'Okt'
                            when month(a.tgl_penjualan)= '11' then 'Nov'
                            when month(a.tgl_penjualan)= '12' then 'Des' end as bln,
                            b.kd_barang, b.nm_barang, sum(b.jumlah)as qty, sum(b.jumlah * b.harga)as tot_harga FROM tabel_penjualan a 
                            INNER JOIN tabel_rinci_penjualan b on a.no_faktur_penjualan = b.no_faktur_penjualan
                            WHERE year(a.tgl_penjualan)=year(now())
                            GROUP BY month(a.tgl_penjualan), b.kd_barang, b.nm_barang)x
                            GROUP BY x.periode, x.bln;";
              $executeSatX = mysqli_query($koneksi, $query_pendapatan);
              // var_dump($executeSatX); die();
              while ($a=mysqli_fetch_array($executeSatX)) {
              $no++;
              $nm_bulan[]         = $a['bln'];
              $nilai_pendapatan[] = floatval($a['tot_harga']);

            }


            // -------------------------------------- REKAP BIAYA ----------------------------

            $no = 0;
              $nama_bln    = array();
              $nilai_biaya = array();
              $query_biaya = "SELECT x.periode, x.bln, sum(x.qty)jml, sum(x.tot_harga)tot_harga FROM (
                            SELECT month(a.tgl_pembelian)as periode, 
                            CASE WHEN month(a.tgl_pembelian)= '1' THEN 'Jan'
                            WHEN month(a.tgl_pembelian)= '2' THEN 'Feb'
                            WHEN month(a.tgl_pembelian)= '3' THEN 'Mar'
                            WHEN month(a.tgl_pembelian)= '4' THEN 'Apr'
                            WHEN month(a.tgl_pembelian)= '5' THEN 'Mei'
                            WHEN month(a.tgl_pembelian)= '6' THEN 'Jun'
                            WHEN month(a.tgl_pembelian)= '7' THEN 'Jul'
                            WHEN month(a.tgl_pembelian)= '8' THEN 'Agu'
                            WHEN month(a.tgl_pembelian)= '9' THEN 'Sep'
                            WHEN month(a.tgl_pembelian)= '10' THEN 'Okt'
                            WHEN month(a.tgl_pembelian)= '11' THEN 'Nov'
                            WHEN month(a.tgl_pembelian)= '12' THEN 'Des' END as bln,
                            b.kd_barang, sum(b.jumlah)as qty, sum(b.jumlah * b.harga)as tot_harga FROM tabel_pembelian a 
                            INNER JOIN tabel_rinci_pembelian b on a.no_faktur_pembelian = b.no_faktur_pembelian
                            WHERE year(a.tgl_pembelian)=year(now())
                            GROUP BY month(a.tgl_pembelian), b.kd_barang)x
                            GROUP BY x.periode, x.bln;";
              $executeSatY = mysqli_query($koneksi, $query_biaya);
              // var_dump($executeSatY); die();
              while ($b=mysqli_fetch_array($executeSatY)) {
              $no++;
              $nama_bln[]    = $b['bln'];
              $nilai_biaya[] = floatval($b['tot_harga']);

            }




            // ----------------------------------- DAFTAR PRODUK --------------------------------
              $no = 0;
              $kd_brg = array();
              $stok   = array();
              $ketQuery = "SELECT a.kd_barang, a.nm_barang, a.hrg_jual, a.diskon, a.komisi, b.id, b.stok FROM tabel_barang a INNER JOIN tabel_stok_toko b ON a.kd_barang = b.kd_barang;";
              $executeSat = mysqli_query($koneksi, $ketQuery);
              // var_dump($executeSat); die();
              while ($m=mysqli_fetch_array($executeSat)) {
              $no++;
              $kd_brg[]       = $m['nm_barang'] . ' ( ' . $m['kd_barang'] .' )';
              $stok[]         = floatval($m['stok']);

            }

              $array_new = array();
              foreach ($kd_brg as $key => $value) {
                $array_new[$key]['name'] = $value;
                $array_new[$key]['y'] = $stok[$key];
              }

          ?>
          <div class="card-content">
              <div class="card-body">
                  <div class="swiper-multiple swiper-container">
                      <div class="row">
                        <div class="col-12 col-sm-6">
                          <div id="pendapatan_biaya" style="display: none;"></div>
                        </div>
                        <div class="col-12 col-sm-6">
                          <div id="container"></div>
                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
<!-- Multiple Slides Per View swiper ends -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<script type="text/javascript">
  
  $(document).ready(function() {

    var level = $('#level').val();

    if (level == 'admin' || level == 'merchant') {
      $('#pendapatan_biaya').show();
    }

    var colors = Highcharts.getOptions().colors;

    Highcharts.chart('pendapatan_biaya', {
          chart: {
              type: 'line'
          },
          title: {
              text: 'TOTAL PENDAPATAN DAN BIAYA'
          },
          subtitle: {
              text: 'Periode Tahun : <?php echo date('Y')?>' // (Berdasarkan bulan yang dipilih)'
          },
          credits: {
            enabled: false
          },
          xAxis: {
              categories: <?php echo json_encode($nm_bulan) ?>,
              crosshair: true
          },
          yAxis: {
              min: 0,
              title: {
                  text: 'Data Pendapatan (IDR)'
              }
          },
          tooltip: {
              headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
              pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                  '<td style="padding:0"><b>{point.y:,.0f} IDR</b></td></tr>',
              footerFormat: '</table>',
              shared: true,
              useHTML: true
          },
          // plotOptions: {
          //     column: {
          //         pointPadding: 0.2,
          //         borderWidth: 0
          //     }
          // },
          plotOptions: {
              line: {
                  dataLabels: {
                      enabled: true
                  },
                  enableMouseTracking: true
              }
          },
          series: [{
              name: 'PENDAPATAN',
              data: <?php echo json_encode($nilai_pendapatan) ?>

          }, {
              name: 'BIAYA',
              data: <?php echo json_encode($nilai_biaya)?>

          }]

      });

    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },

        credits: {
          enabled: false
        },

        title: {
            text: 'Daftar Produk Saat Ini',
            align: 'center'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f} %</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Produk',
            colorByPoint: true,
            data: <?php echo json_encode($array_new) ?>
        }]
    });

  })

</script>


