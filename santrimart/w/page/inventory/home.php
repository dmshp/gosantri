<style type="text/css">
  
  .text-muted {
      color: #2a9d3d !important;
  }

  .nama-user{
/*      font-size: 15px !;*/
    animation: blink-animation 1.1s steps(3, start) infinite;
    -webkit-animation: blink-animation 1.1s steps(3, start) infinite;
  }

  .horizontal-menu.navbar-floating:not(.blank-page) .app-content {
      padding-top: -6.25rem;
  }

  html body .content.app-content {
    overflow: hidden;
    margin-top: -130px;
  }

  a.s {
      text-decoration: none;
  }

</style>

  <!--BEGIN: Content-->

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
                                  <?php if ($_SESSION['akses'] == 'gudang' || $_SESSION['akses'] == 'kasir') { ?>
                                  <li class="breadcrumb-item"><a href="" class="text-dark">Dashboard</a></li>
                                  <?php } else { ?>
                                  <li class="breadcrumb-item"><a href="index.php?menu=home" class="text-dark">Dashboard</a></li>
                                  <?php } ?>
                              </ol>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <section id="statistics-card" style="margin-top: 15px;">
              <div class="row">

                <?php if ($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'gudang') { ?>
                  
                  <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                      <a href="index.php?menu=input_barang" class="text-dark s">
                          <div class="card text-center">
                              <div class="card-content">
                                  <div class="card-body">
                                      <div class="avatar p-50 m-0 mb-1" style="background:<?php echo $tombol; ?>">
                                          <div class="avatar-content">
                                              <i class="fas fa-chart-line font-medium-5"></i>
                                          </div>
                                      </div>
                                      <h2 class="text-bold-700" style="color: white;">0</h2>
                                      <p class="mb-0 line-ellipsis">INPUT BARANG MASUK</p>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>

                  <?php } ?>

                  <?php if ($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'gudang') { ?>

                  <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                      <a href="index.php?menu=supplier" class="text-dark s">
                          <div class="card text-center">
                              <div class="card-content">
                                  <div class="card-body">
                                      <div class="avatar p-50 m-0 mb-1" style="background:<?php echo $tombol; ?>">
                                          <div class="avatar-content">
                                              <i class="fas fa-truck-moving font-medium-5"></i>
                                          </div>
                                      </div>
                                      <h2 class="text-bold-700" style="color: white;">0</h2>
                                      <p class="mb-0 line-ellipsis">DAFTAR SUPPLIER</p>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>

                  <?php } ?>

                  <?php if ($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'gudang') { ?>

                  <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                      <a href="index.php?menu=retur_beli" class="text-dark s">
                          <div class="card text-center">
                              <div class="card-content">
                                  <div class="card-body">
                                      <div class="avatar p-50 m-0 mb-1" style="background:<?php echo $tombol; ?>">
                                          <div class="avatar-content">
                                              <i class="fas fa-truck-loading font-medium-5"></i>
                                          </div>
                                      </div>
                                      <h2 class="text-bold-700" style="color: white;">0</h2>
                                      <p class="mb-0 line-ellipsis">RETUR PEMBELIAN</p>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>

                  <?php } ?>


                  <?php if ($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'kasir') { ?>
                    
                  <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                      <a href="index.php?menu=ipos_new" class="text-dark s">
                          <div class="card text-center">
                              <div class="card-content">
                                  <div class="card-body">
                                      <div class="avatar p-50 m-0 mb-1" style="background:<?php echo $tombol; ?>">
                                          <div class="avatar-content">
                                              <i class="fas fa-cash-register font-medium-5"></i>
                                          </div>
                                      </div>
                                      <h2 class="text-bold-700" style="color: white;">0</h2>
                                      <p class="mb-0 line-ellipsis">POINT OF SALE</p>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>

                  <?php } ?>

                  <?php if ($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'kasir') { ?>
                    
                  <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                      <a href="index.php?menu=retur_jual" class="text-dark s">
                          <div class="card text-center">
                              <div class="card-content">
                                  <div class="card-body">
                                      <div class="avatar p-50 m-0 mb-1" style="background:<?php echo $tombol; ?>">
                                          <div class="avatar-content">
                                              <i class="fas fa-dolly font-medium-5"></i>
                                          </div>
                                      </div>
                                      <h2 class="text-bold-700" style="color: white;">0</h2>
                                      <p class="mb-0 line-ellipsis">RETUR PENJUALAN</p>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>

                  <?php } ?>

                  <?php if ($_SESSION['akses'] == 'admin' || $_SESSION['akses'] == 'gudang' || $_SESSION['akses'] == 'kasir') { ?>
                    
                  <div class="col-xl-3 col-md-4 col-sm-6 col-6">
                      <a href="index.php?menu=laporan_stok" class="text-dark s">
                          <div class="card text-center">
                              <div class="card-content">
                                  <div class="card-body">
                                      <div class="avatar p-50 m-0 mb-1" style="background:<?php echo $tombol; ?>">
                                          <div class="avatar-content">
                                              <i class="fas fa-balance-scale-right font-medium-5"></i>
                                          </div>
                                      </div>
                                      <h2 class="text-bold-700" style="color: white;">0</h2>
                                      <p class="mb-0 line-ellipsis">LAPORAN PERSEDIAAN STOK</p>
                                  </div>
                              </div>
                          </div>
                      </a>
                  </div>

                <?php } ?>

              </div>

          </section>


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
                                  <div id="pendapatan_biaya" style="display:;"></div>
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


      </div>
  </div>

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