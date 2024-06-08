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

    table.dataTable.table-striped tbody tr:nth-of-type(even) {
        background-color: #e9fcfe;
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

    .badge.badge-up {
        position: absolute;
        top: 19.5rem;
        right: -0.5rem;
    }

    .badge.badge-up2 {
        position: absolute;
        top: -0.3rem;
        right: -2.5rem;
    }

    .nav.nav-tabs .nav-item .nav-link.active {
        border: none;
        position: relative;
        color: #49b5c3 !important;
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
        background-color: transparent;
    }

    .nav.nav-tabs .nav-item .nav-link.active:after {
        content: attr(data-before);
        height: 2px;
        width: 100%;
        left: 0;
        position: absolute;
        bottom: 0;
        top: 100%;
        background: -webkit-linear-gradient(60deg, #28838f, rgb(55 232 252)) !important;
        background: linear-gradient(30deg, #198593, rgb(73 181 195 / 55%)) !important;
        box-shadow: 0 0 8px 0 rgb(73 181 195 / 49%) !important;
        -webkit-transform: translateY(0px);
        -ms-transform: translateY(0px);
        transform: translateY(0px);
        -webkit-transition: all 0.2s linear;
        transition: all 0.2s linear;
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
                <li class="breadcrumb-item"><a href="index.php?menu=inventory" class="text-dark">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#" class="text-dark">Laporan Persediaan</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <section id="column-selectors">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="divider">
                  <div class="divider-text">
                    <h3 class="mb-3 display-5 text-uppercase">Laporan Persediaan Stok Barang</h3>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body card-dashboard">
                    <div class="row">
                      <div class="col-12 mb-1">
                          <?php
                          $stok = 0;
                          $rupiah = 0;
                          $query_tot = mysqli_query($koneksi, "SELECT a.kd_barang, a.nm_barang, b.stok, a.hrg_beli, a.hrg_grosir, a.hrg_jual, (b.stok*a.hrg_beli)as biaya FROM tabel_barang a INNER JOIN tabel_stok_toko b ON a.kd_barang = b.kd_barang AND a.kd_toko = b.kd_toko");
                            while ($row = mysqli_fetch_array($query_tot)) {
                              $stok += $row['stok'];
                              $rupiah += $row['biaya'];
                            }
                          ?>
                          <div class="badge badge-primary float-right">
                            Total Stok : &nbsp;
                            <span class="font-small-3 nama-user">
                                <?php echo number_format($stok) ?>
                            </span>
                          </div>
                          <div class="badge badge-primary float-right" style="margin-right: 15px;">
                            Total Rupiah : &nbsp;
                            <span class="font-small-3 nama-user">
                                Rp. <?php echo number_format($rupiah,0,',','.') ?>
                            </span>
                          </div>

                          <div class="table-responsive">
                            <table class="table table-striped dataex-html5-selectors">
                              <thead>
                                <tr>
                                  <th class="text-center" width="5%">No</th>
                                  <th class="text-center" width="10%">Tanggal</th>
                                  <th class="text-center" width="10%">Kode</th>
                                  <th class="text-center" width="10%">Nama Barang</th>
                                  <th class="text-center" width="10%">Stok Awal</th>
                                  <th class="text-center" width="5%">Keluar</th>
                                  <th class="text-center" width="10%">Stok Akhir</th>
                                  <th class="text-center" width="10%">Supplier</th>
                                  <th class="text-center" width="10%">Harga Jual</th>
                                  <th class="text-center" width="10%">Harga Beli</th>
                                  <th class="text-center" width="10%">Harga Grosir</th>
                                  <th class="text-center" width="10%">Foto</th>
                                  <th class="text-center" width="10%">Komisi</th>
                                  <th class="text-center"  width="10%">Keterangan</th>
                                </tr>
                              </thead>
                              <?php
                              $foto = '';
                              $arr = array();
                              $query = mysqli_query($koneksi, "SELECT a.*, b.*, c.*, d.* FROM tabel_barang a INNER JOIN tabel_barang_gambar b ON a.kd_barang=b.id_brg INNER JOIN tabel_stok_toko c ON a.kd_barang = c.kd_barang AND a.kd_toko = c.kd_toko INNER JOIN tabel_supplier d ON a.kd_supplier = d.kd_supplier;");
                                $no = 0;
                                while ($a = mysqli_fetch_array($query)) {
                                $arr = explode(",", $a['gambar']);
                                $foto = $arr[0];
                              ?>
                              <tbody>
                                <tr>
                                  <td class="text-center"><?php echo $no = $no + 1; ?></td>
                                  <td class="text-center"><?php echo date("d-m-Y", strtotime($a['crtdt'])); ?></td>
                                  <td class="text-center"><?php echo $a['kd_barang']; ?></td>
                                  <td class="text-left"><?php echo $a['nm_barang']; ?></td>
                                  <td class="text-center">
                                    <?php
                                    $jml = 0;
                                    $query1 = mysqli_query($koneksi, "SELECT CASE WHEN jumlah<>'' THEN sum(jumlah) ELSE '0' END AS jumlah FROM tabel_rinci_penjualan WHERE kd_barang = '".$a['kd_barang']."'");
                                      while ($c = mysqli_fetch_array($query1)) {
                                        $jml = $c['jumlah'];
                                        echo $jml + $a['stok'];
                                      }
                                    ?>
                                      
                                  </td>
                                  <td class="text-center">
                                    <?php
                                    $jml = 0;
                                    $query2 = mysqli_query($koneksi, "SELECT CASE WHEN jumlah<>'' THEN sum(jumlah) ELSE '0' END AS jumlah FROM tabel_rinci_penjualan WHERE kd_barang = '".$a['kd_barang']."'");
                                      while ($d = mysqli_fetch_array($query2)) {
                                        $jml = $d['jumlah'];
                                        echo $jml;
                                      }
                                    ?>
                                  </td>
                                  <td class="text-center"><?php echo $a['stok']; ?></td>
                                  <td class="text-capitalize"><?php echo $a['nama']; ?></td>
                                  <td>Rp.<?php echo number_format($a['hrg_jual'], 0, ",", "."); ?></td>
                                  <td>Rp.<?php echo number_format($a['hrg_beli'], 0, ",", "."); ?></td>
                                  <td>Rp.<?php echo number_format($a['hrg_grosir'], 0, ",", "."); ?></td>
                                  <td class="text-center"><img src="../img/produk/<?= $foto; ?>" width="35px" style="cursor:pointer;" data-target="#exampleModalLogoMerchant<?= $a['kd_barang'] ?>" data-toggle="modal">
                                  <div class="modal fade" id="exampleModalLogoMerchant<?= $a['kd_barang'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLongTitle"><?php echo strtoupper($a['nm_barang']); ?></h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body text-center">
                                                  <img src="../img/produk/<?= $foto; ?>">
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  </td>
                                  <td class="text-center"><?php echo $a['komisi']; ?></td>
                                  <td class="text-left"><?php echo $a['deskripsi']; ?></td>
                                </tr>
                              </tbody>
                              <?php }?>
                              <tfoot>
                                <tr class="header-tabel">
                                  <th class="text-center"  width="5%">No</th>
                                  <th class="text-center"  width="10%">Tanggal</th>
                                  <th class="text-center"  width="10%">Kode</th>
                                  <th class="text-center"  width="10%">Barang</th>
                                  <th class="text-center"  width="10%">Stok Awal</th>
                                  <th class="text-center"  width="5%">Keluar</th>
                                  <th class="text-center"  width="10%">Stok Akhir</th>
                                  <th class="text-center"  width="10%">Supplier</th>
                                  <th class="text-center" width="10%">Harga Jual</th>
                                  <th class="text-center" width="10%">Harga Beli</th>
                                  <th class="text-center" width="10%">Harga Grosir</th>
                                  <th class="text-center" width="10%">Foto</th>
                                  <th class="text-center" width="10%">Komisi</th>
                                  <th class="text-center"  width="10%">Keterangan</th>
                                </tr>
                              </tfoot>
                            </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- Column selectors with Export Options and print table -->
      </div>
    </div>
    <!-- END: Content-->
  </div>
</div>