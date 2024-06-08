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
                    <h2 class="content-header-title float-left mb-0 text-dark text-capitalize"><?php echo $_SESSION['nm_user'];?></h2>
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php?menu=home" class="text-dark">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#" class="text-dark"><?php echo $_SESSION['akses'];?></a>
                            </li>                                   
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
      <div class="card-body">
  
        <!-- Column selectors with Export Options and print table -->
        <section id="column-selectors">
          <div class="row">
            <div class="col-12">
              <div class="card">

                <div class="divider">
                  <div class="divider-text"><h3 class="mb-3 display-4 text-uppercase">Daftar Master User</h3></div>
                </div>

                <ul class="nav nav-tabs justify-content-center" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" href="#member" role="tab" data-toggle="tab">
                      <i class="fa-solid fa-address-card"></i> MEMBER
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#merchant" role="tab" data-toggle="tab">
                      <i class="fa-solid fa-house-chimney-user"></i> MERCHANT
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#kurir" role="tab" data-toggle="tab">
                      <i class="fa-solid fa-truck-fast"></i> KURIR
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#marketing" role="tab" data-toggle="tab">
                      <i class="fa-solid fa-mail-bulk"></i> MARKETING
                      <span class="badge badge-pill badge-up2 badge-danger font-small-2 mr-2 nama-user">Baru</span>
                    </a>
                  </li>
                </ul>
                <br><br>
                
                <div class="card-content">
                  <div class="card-body card-dashboard">
                    <div class="tab-content">
                      <div role="tabpanel" class="tab-pane fade show in active" id="member">
                        <div class="divider-text">
                          <center>
                            <h4 class="mb-3 text-uppercase">-- Daftar User Member --</h4>
                          </center>
                        </div>
                        
                        <div class="badge badge-primary float-right">
                          <?php 
                          $akses = 'member';
                          $sql_user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(a.id_user)jml FROM tabel_member a WHERE a.akses = '$akses'"));
                          $juml_member = $sql_user['jml']; ?>
                          <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2 nama-user">
                            <?php echo $juml_member ?></span>Total Info
                        </div>

                        <div class="table-responsive">
                          <table class="table table-striped dataex-html5-selectors">
                            <thead>
                              <tr>
                                <th class="text-center">NO</th>
                                <th class="text-center">KODE</th>
                                <th class="text-center">TGL DAFTAR</th>
                                <th class="text-center">NAMA</th>
                                <th class="text-center">ALAMAT</th>
                                <th class="text-center">EMAIL</th>
                                <th class="text-center">NOMOR HP</th>
                                <th class="text-center">TOT ORDER</th>
                                <th class="text-center">STATUS</th>
                                <th class="text-center">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                                  $akses = 'member';
                                  $no = 0;    
                                  $ketQuery = "SELECT * FROM tabel_member a  WHERE a.akses = '$akses' ORDER BY a.tgl_daftar DESC";
                                  $executeSat = mysqli_query($koneksi, $ketQuery);
                                  while ($m=mysqli_fetch_array($executeSat)) {
                                  $no++;
                              ?>                                  
                              <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td class="text-center"><?php echo $m['kode_user'] ?></td>
                                <td class="text-capitalize"><?php echo strtoupper($m['nm_user']) ?></td>
                                <td class="text-capitalize"><?php echo date('d-m-Y H:i:s', strtotime($m['tgl_daftar'])) ?></td>
                                <td><?php echo $m['alamat_user'] ?></td>
                                <td class="text-capitalize"><?php echo $m['email_user'] ?></td>
                                <td class="text-center"><?php echo $m['hp'] ?></td>
                                <td class="text-center">
                                  <?php $c = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(no_faktur_penjualan) AS total FROM tabel_penjualan WHERE id_user = '$m[id_user]'"));
                                    $tot     = $c['total'];
                                  ?>
                                    <?php echo $tot ?>
                                </td>

                                <?php if($m['stt_user'] == 'AKTIF'){ ?>
                                <td class="text-center">
                                    <span class="badge badge-success text-white"><?php echo strtoupper($m['stt_user']) ?></span>
                                </td>
                                <?php } else if($m['stt_user'] == 'PENDING'){ ?>
                                  <td class="text-center">
                                    <span class="badge badge-warning text-white nama-user"><?php echo strtoupper($m['stt_user']) ?></span>
                                </td>
                                <?php } else if($m['stt_user'] == 'DITOLAK'){ ?>
                                  <td class="text-center">
                                    <span class="badge badge-danger text-white nama-user"><?php echo strtoupper($m['stt_user']) ?></span>
                                </td>
                                <?php } ?>
                                <td class="text-center">
                                  <a href="index.php?menu=report_member&id_user=<?php echo $m['id_user']; ?>">
                                    <i class="fas fa-edit"></i>
                                  </a>
                                  <a class="action-delete" onclick="deleteUserMember(`<?php echo $m['id_user'] ?>`)">
                                    <i class="fas fa-trash-alt"></i>
                                  </a>
                                </td>
                              </tr>
                                 <?php } ?>                                                  
                            </tbody>
                            <tfoot>
                              <tr class="header-tabel">
                                <th class="text-center">NO</th>
                                <th class="text-center">KODE</th>
                                <th class="text-center">TGL DAFTAR</th>
                                <th class="text-center">NAMA</th>
                                <th class="text-center">ALAMAT</th>
                                <th class="text-center">EMAIL</th>
                                <th class="text-center">NOMOR HP</th>
                                <th class="text-center">TOT ORDER</th>
                                <th class="text-center">STATUS</th>
                                <th class="text-center">AKSI</th>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="merchant">
                        <div class="divider-text">
                          <center>
                            <h4 class="mb-3 text-uppercase">-- Daftar User Merchant --</h4>
                          </center>
                        </div>

                        <div class="badge badge-primary float-right">
                          <?php 
                          $akses = 'merchant';
                          $sql_user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(a.id_user)jml FROM tabel_member a inner JOIN tabel_merchant b on a.kode_user=b.id_user and a.kd_toko = b.kode_toko WHERE a.akses = '$akses' and a.stt_user = 'PENDING'"));
                          $jumlah_user = $sql_user['jml']; ?>
                          <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2 nama-user">
                            <?php echo $jumlah_user ?></span>Total Pending
                        </div>
                        <div class="table-responsive">
                          <table class="table table-striped dataex-html5-selectors">
                            <thead>
                              <tr>
                                <th class="text-center">NO</th>
                                <th class="text-center">KODE</th>
                                <th class="text-center">TGL DAFTAR</th>
                                <th class="text-center">NAMA</th>
                                <th class="text-center">NAMA MERCHANT</th>
                                <th class="text-center">ALAMAT</th>
                                <th class="text-center">EMAIL</th>
                                <th class="text-center">NOMOR HP</th>
                                <th class="text-center">BANK</th>
                                <th class="text-center">LOGO</th>
                                <th class="text-center">KTP</th>
                                <th class="text-center">SIUP</th>
                                <th class="text-center">STATUS</th>
                                <th class="text-center">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                                  $akses = 'merchant';
                                  $no = 0;    
                                  $ketQuery = "SELECT a.id_user as id_master, a.*, b.* FROM tabel_member a inner JOIN tabel_merchant b on a.kode_user=b.id_user and a.kd_toko = b.kode_toko WHERE a.akses = '$akses' ORDER BY a.tgl_daftar DESC;";
                                  $executeSat = mysqli_query($koneksi, $ketQuery);
                                  while ($m=mysqli_fetch_array($executeSat)) {
                                  $no++;
                              ?>                                  
                              <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td class="text-center"><?php echo $m['kode_user'] ?></td>
                                <td class="text-capitalize"><?php echo date('d-m-Y H:i:s', strtotime($m['tgl_daftar'])) ?></td>
                                <td class="text-capitalize"><?php echo strtoupper($m['nm_user']) ?></td>
                                <td class="text-capitalize"><?php echo strtoupper($m['nm_merchant']) ?></td>
                                <td><?php echo $m['alamat_user'] ?></td>
                                <td class="text-capitalize"><?php echo $m['email_user'] ?></td>
                                <td class="text-center"><?php echo $m['hp'] ?></td>
                                <td>
                                  <div>Bank : <?= $m["bank"]; ?></div>
                                  <div>Rekening : <?= $m["no_rekening"] ?></div>
                                  <div>a.n. :<?= $m["an_rekening"]; ?></div>
                                </td>
                                <td class="text-center"><img src="../img/toko/<?= $m['foto'] ?>" width="35px" style="cursor:pointer;" data-target="#exampleModalLogoMerchant<?= $m['id_user'] ?>" data-toggle="modal">
                                  <div class="modal fade" id="exampleModalLogoMerchant<?= $m['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLongTitle">Logo Merchant</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body text-center">
                                                  <img src="../img/toko/<?= $m['foto'] ?>">
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  </td>
                                  <td class="text-center"><img src="../img/ktp/<?= $m['ktp'] ?>" width="35px" style="cursor:pointer;" data-target="#exampleModalKTPMerchant<?= $m['id_user'] ?>" data-toggle="modal">
                                  <div class="modal fade" id="exampleModalKTPMerchant<?= $m['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLongTitle">KTP</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body text-center">
                                                  <img src="../img/ktp/<?= $m['ktp'] ?>">
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  </td>
                                  <td class="text-center"><img src="../img/siup/<?= $m['siup'] ?>" width="35px" style="cursor:pointer;" data-target="#exampleModalSiup<?= $m['kode_user'] ?>" data-toggle="modal">
                                  <div class="modal fade" id="exampleModalSiup<?= $m['kode_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLongTitle">Surat Ijin Mendirikan Usaha</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body text-center">
                                                  <img src="../img/siup/<?= $m['siup'] ?>">
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  </td>
                                <?php if($m['stt_user'] == 'AKTIF'){ ?>
                                <td class="text-center">
                                    <span class="badge badge-success text-white"><?php echo strtoupper($m['stt_user']) ?></span>
                                </td>
                                <?php } else if($m['stt_user'] == 'PENDING'){ ?>
                                  <td class="text-center">
                                    <span class="badge badge-warning text-white nama-user"><?php echo strtoupper($m['stt_user']) ?></span>
                                </td>
                                <?php } else if($m['stt_user'] == 'DITOLAK'){ ?>
                                  <td class="text-center">
                                    <span class="badge badge-danger text-white nama-user"><?php echo strtoupper($m['stt_user']) ?></span>
                                </td>
                                <?php } ?>
                                <td class="text-center">
                                  <?php if($m['stt_user'] == "PENDING" || $m['stt_user'] == "DITOLAK"){ ?>
                                  <a class="badge badge-primary text-white" onclick="action_valid_merchant(`<?php echo $m['kode_user']; ?>`)">Validasi</a>
                                  <?php } if($m['stt_user'] == "PENDING" || $m['stt_user'] == "AKTIF"){ ?>
                                  <a class="badge badge-warning text-white" onclick="action_tolak_merchant(`<?php echo $m['kode_user']; ?>`)">Tolak</a>
                                  <?php } ?>
                                  <a class="action-delete badge badge-danger text-white" onclick="deleteUserMerchant(`<?php echo $m['id_master'] ?>`,`<?php echo $m['kd_merchant'] ?>`)">
                                    <i class="fas fa-close"></i> Hapus
                                  </a>
                                </td>
                              </tr>
                                 <?php } ?>                                                  
                            </tbody>
                            <tfoot>
                              <tr class="header-tabel">
                                <th class="text-center">NO</th>
                                <th class="text-center">KODE</th>
                                <th class="text-center">TGL DAFTAR</th>
                                <th class="text-center">NAMA</th>
                                <th class="text-center">NAMA MERCHANT</th>
                                <th class="text-center">ALAMAT</th>
                                <th class="text-center">EMAIL</th>
                                <th class="text-center">NOMOR HP</th>
                                <th class="text-center">BANK</th>
                                <th class="text-center">LOGO</th>
                                <th class="text-center">KTP</th>
                                <th class="text-center">SIUP</th>
                                <th class="text-center">STATUS</th>
                                <th class="text-center">AKSI</th>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="kurir">
                        <div class="divider-text">
                          <center>
                            <h4 class="mb-3 text-uppercase">-- Daftar User Kurir --</h4>
                          </center>
                        </div>

                        <div class="badge badge-primary float-right">
                          <?php 
                          $akses = 'kurir';
                          $sql_user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(a.id_user)jml FROM tabel_member a INNER JOIN tabel_kurir b on a.kode_user = b.id_user AND a.akses = '$akses' and a.stt_user = 'PENDING'"));
                          $jumlah_user = $sql_user['jml']; ?>
                          <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2 nama-user">
                            <?php echo $jumlah_user ?></span>Total Pending
                        </div>
                        <div class="table-responsive">
                          <table class="table table-striped dataex-html5-selectors">
                            <thead>
                              <tr class="header-tabel">
                                <th class="text-center">NO</th>
                                <th class="text-center">DAFTAR</th>
                                <th class="text-center">NAMA</th>
                                <th class="text-center">EMAIL / HP</th>
                                <th class="text-center">MOTOR</th>
                                <th class="text-center">BANK</th>
                                <th class="text-center">REKENING</th>
                                <th class="text-center">KTP</th>
                                <th class="text-center">SIM</th>
                                <th class="text-center">STATUS</th>
                                <th class="text-center">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no = 0;
                                $ketQuery = "SELECT a.id_user as id_master, a.*, b.* FROM tabel_member a INNER JOIN tabel_kurir b on a.kode_user = b.id_user AND a.akses = '$akses' ORDER BY a.tgl_daftar DESC";
                                $executeSat = mysqli_query($koneksi, $ketQuery);
                                while ($x = mysqli_fetch_array($executeSat)) {
                                $no++;
                              ?>
                                <tr>
                                  <td class="text-center"><?= $no; ?></td>
                                  <td class="text-center"><?= date('d-m-Y H:i:s', strtotime($x["tgl_daftar"])); ?></td>
                                  <td><?= strtoupper($x["nm_user"]); ?></td>
                                  <td class="text-capitalize">
                                    <div>Email : <?= $x["email_user"]; ?></div>
                                    <div>Hp : <?= $x["hp"]; ?></div>
                                  </td>
                                  <td>
                                    <div><?= $x["sepeda_motor"] . " (" . $x["sepeda_motor_tahun"] . ")" ?></div>
                                    <div><?= strtoupper($x["nomor_polisi"]); ?></div>
                                  </td>
                                  <td>
                                    <div><?= $x["bank"]; ?></div>
                                  </td>
                                  <td>
                                    <div><?= $x["no_rekening"] ?></div>
                                    <div><?= $x["an_rekening"]; ?></div>
                                  </td>
                                  <td class="text-center"><img src="../img/ktp/<?= $x['ktp'] ?>" width="35px" style="cursor:pointer;" data-target="#exampleModalCenter<?= $x['id_user'] ?>" data-toggle="modal">
                                  <div class="modal fade" id="exampleModalCenter<?= $x['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLongTitle">KTP</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body text-center">
                                                  <img src="../img/ktp/<?= $x['ktp'] ?>">
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  </td>
                                  <td class="text-center"><img src="../img/sim/<?= $x['sim'] ?>" width="35px" style="cursor:pointer;" data-target="#exampleModalSIMKurir<?= $x['id_user'] ?>" data-toggle="modal">
                                  <div class="modal fade" id="exampleModalSIMKurir<?= $x['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLongTitle">Surat Ijin Mengemudi</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body text-center">
                                                  <img src="../img/sim/<?= $x['sim'] ?>">
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  </td>
                                  <?php if($x['stt_user'] == 'AKTIF'){ ?>
                                  <td class="text-center">
                                      <span class="badge badge-success text-white"><?php echo strtoupper($x['stt_user']) ?></span>
                                  </td>
                                  <?php } else if($x['stt_user'] == 'PENDING'){ ?>
                                    <td class="text-center">
                                      <span class="badge badge-warning text-white nama-user"><?php echo strtoupper($x['stt_user']) ?></span>
                                  </td>
                                  <?php } else if($x['stt_user'] == 'DITOLAK'){ ?>
                                    <td class="text-center">
                                      <span class="badge badge-danger text-white nama-user"><?php echo strtoupper($x['stt_user']) ?></span>
                                  </td>
                                  <?php } ?>
                                  <td class="text-center">
                                    <?php if($x['stt_user'] == "PENDING" || $x['stt_user'] == "DITOLAK"){ ?>
                                    <a class="badge badge-primary text-white" onclick="action_valid_kurir(`<?php echo $x['kode_user']; ?>`)">Validasi</a>
                                    <?php } if($x['stt_user'] == "PENDING" || $x['stt_user'] == "AKTIF"){ ?>
                                    <a class="badge badge-warning text-white" onclick="action_tolak_kurir(`<?php echo $x['kode_user']; ?>`)">Tolak</a>
                                    <?php } ?>
                                    <a class="action-delete badge badge-danger text-white" onclick="deleteUserKurir(`<?php echo $x['id_master'] ?>`,`<?php echo $x['id_kurir'] ?>`)">
                                    <i class="fas fa-close"></i> Hapus
                                  </a>
                                  </td>
                                </tr>
                              <?php } ?>
                            </tbody>
                            <tfoot>
                              <tr class="header-tabel">
                                <th class="text-center">NO</th>
                                <th class="text-center">DAFTAR</th>
                                <th class="text-center">NAMA</th>
                                <th class="text-center">EMAIL / HP</th>
                                <th class="text-center">MOTOR</th>
                                <th class="text-center">BANK</th>
                                <th class="text-center">REKENING</th>
                                <th class="text-center">KTP</th>
                                <th class="text-center">SIM</th>
                                <th class="text-center">STATUS</th>
                                <th class="text-center">AKSI</th>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                      <div role="tabpanel" class="tab-pane fade" id="marketing">
                        <div class="divider-text">
                          <center>
                            <h4 class="mb-3 text-uppercase">-- Daftar User Marketing --</h4>
                          </center>
                        </div>

                        <div class="badge badge-primary float-right">
                          <?php 
                          $akses = 'marketing';
                          $sql_user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(a.id_user)jml FROM tabel_member a INNER JOIN tabel_marketing b on a.kode_user = b.kode_user AND a.akses = '$akses' and a.stt_user = 'PENDING'"));
                          $jumlah_user = $sql_user['jml']; ?>
                          <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2 nama-user">
                            <?php echo $jumlah_user ?></span>Total Pending
                        </div>
                        <div class="table-responsive">
                          <table class="table table-striped dataex-html5-selectors">
                            <thead>
                              <tr class="header-tabel">
                                <th class="text-center">NO</th>
                                <th class="text-center">DAFTAR</th>
                                <th class="text-center">NAMA</th>
                                <th class="text-center">EMAIL / HP</th>
                                <th class="text-center">KENDARAAN</th>
                                <th class="text-center">BANK</th>
                                <th class="text-center">REKENING</th>
                                <th class="text-center">KTP</th>
                                <th class="text-center">SIM</th>
                                <th class="text-center">STATUS</th>
                                <th class="text-center">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $no = 0;
                              $akses = 'marketing';
                                $ketQuery = "SELECT a.id_user as id_master, a.*, b.* FROM tabel_member a INNER JOIN tabel_marketing b on a.kode_user = b.kode_user AND a.akses = '$akses' ORDER BY a.tgl_daftar DESC";
                                $executeSat = mysqli_query($koneksi, $ketQuery);
                                while ($x = mysqli_fetch_array($executeSat)) {
                                $no++;
                              ?>
                                <tr>
                                  <td class="text-center"><?= $no; ?></td>
                                  <td class="text-center"><?= date('d-m-Y H:i:s', strtotime($x["tgl_daftar"])); ?></td>
                                  <td><?= strtoupper($x["nm_user"]); ?></td>
                                  <td class="text-capitalize">
                                    <div>Email : <?= $x["email_user"]; ?></div>
                                    <div>Hp : <?= $x["hp"]; ?></div>
                                  </td>
                                  <td>
                                    <div><?= $x["type_kendaraan"] . " (" . $x["tahun_kendaraan"] . ")" ?></div>
                                    <div><?= strtoupper($x["nomor_polisi"]); ?></div>
                                  </td>
                                  <td>
                                    <div><?= $x["bank"]; ?></div>
                                  </td>
                                  <td>
                                    <div><?= $x["no_rekening"] ?></div>
                                    <div><?= $x["an_rekening"]; ?></div>
                                  </td>
                                  <td class="text-center"><img src="../img/ktp/<?= $x['ktp'] ?>" width="35px" style="cursor:pointer;" data-target="#exampleModalKTPMerketing<?= $x['id_user'] ?>" data-toggle="modal">
                                  <div class="modal fade" id="exampleModalKTPMerketing<?= $x['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLongTitle">KTP</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body text-center">
                                                  <img src="../img/ktp/<?= $x['ktp'] ?>">
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  </td>
                                  <td class="text-center"><img src="../img/sim/<?= $x['sim'] ?>" width="35px" style="cursor:pointer;" data-target="#exampleModalSIMMerketing<?= $x['id_user'] ?>" data-toggle="modal">
                                  <div class="modal fade" id="exampleModalSIMMerketing<?= $x['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalLongTitle">Surat Ijin Mengemudi</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body text-center">
                                                  <img src="../img/sim/<?= $x['sim'] ?>">
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  </td>
                                  <?php if($x['stt_user'] == 'AKTIF'){ ?>
                                  <td class="text-center">
                                      <span class="badge badge-success text-white"><?php echo strtoupper($x['stt_user']) ?></span>
                                  </td>
                                  <?php } else if($x['stt_user'] == 'PENDING'){ ?>
                                    <td class="text-center">
                                      <span class="badge badge-warning text-white nama-user"><?php echo strtoupper($x['stt_user']) ?></span>
                                  </td>
                                  <?php } else if($x['stt_user'] == 'DITOLAK'){ ?>
                                    <td class="text-center">
                                      <span class="badge badge-danger text-white nama-user"><?php echo strtoupper($x['stt_user']) ?></span>
                                  </td>
                                  <?php } ?>
                                  <td class="text-center">
                                    <?php if($x['stt_user'] == "PENDING" || $x['stt_user'] == "DITOLAK"){ ?>
                                    <a class="badge badge-primary text-white" onclick="action_valid_marketing(`<?php echo $x['kode_user']; ?>`)">Validasi</a>
                                    <?php } if($x['stt_user'] == "PENDING" || $x['stt_user'] == "AKTIF"){ ?>
                                    <a class="badge badge-warning text-white" onclick="action_tolak_marketing(`<?php echo $x['kode_user']; ?>`)">Tolak</a>
                                    <?php } ?>
                                    <a class="action-delete badge badge-danger text-white" onclick="deleteUserMarketing(`<?php echo $x['id_master'] ?>`,`<?php echo $x['id_marketing'] ?>`)">
                                    <i class="fas fa-close"></i> Hapus
                                  </td>
                                </tr>
                              <?php } ?>
                            </tbody>
                            <tfoot>
                              <tr class="header-tabel">
                                <th class="text-center">NO</th>
                                <th class="text-center">DAFTAR</th>
                                <th class="text-center">NAMA</th>
                                <th class="text-center">EMAIL / HP</th>
                                <th class="text-center">KENDARAAN</th>
                                <th class="text-center">BANK</th>
                                <th class="text-center">REKENING</th>
                                <th class="text-center">KTP</th>
                                <th class="text-center">SIM</th>
                                <th class="text-center">STATUS</th>
                                <th class="text-center">AKSI</th>
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
  </div>
</div>
<!-- END: Content-->


<script type="text/javascript">
	$(document).ready(function(){
		$('#biaya_admin').change(function() {

			$.ajax({
				type: "POST",
				url: "../aksi/edit_merchant.php",
				data: {
						kd_merchant: $(this).attr("data-id"),
						biaya: this.value,
						edit_fee: "edit_fee"
				},
				success: function(data) {
					alert('Berhasil update biaya')
				}
			});

		});
	});

  function deleteUserMember(id) {
    console.log(id);
    $.ajax({
      type: "GET",
      url: "../aksi/delete_user_member.php?id_user=" + id,
      async: false,
      success: function(text) {
        alert(text);
      }
    });
  }

  function deleteUserMerchant(id, kd_merchant) {
    console.log(id + kd_merchant);
    $.ajax({
      type: "GET",
      url: "../aksi/delete_user_merchant.php?id_user=" + id + "&kd_merchant=" + kd_merchant,
      async: false,
      success: function(text) {
        alert(text);
      }
    });
  }

  function deleteUserKurir(id, id_kurir) {
    console.log(id + id_kurir);
    $.ajax({
      type: "GET",
      url: "../aksi/delete_user_kurir.php?id_user=" + id + "&id_kurir=" + id_kurir,
      async: false,
      success: function(text) {
        alert(text);
      }
    });
  }

  function deleteUserMarketing(id, id_marketing) {
    console.log(id + id_marketing);
    $.ajax({
      type: "GET",
      url: "../aksi/delete_user_marketing.php?id_user=" + id + "&id_marketing=" + id_marketing,
      async: false,
      success: function(text) {
        alert(text);
      }
    });
  }

  function action_valid_merchant(kode_user){

    let valid = confirm("Aktifkan User Merchant Yang dipilih !");

     $.ajax({
      type: "POST",
      url: "../aut/validasi_merchant.php",
      data: {
          kode_user: kode_user
      },
      success: function(data) {
        if (data) {
          alert('User Merchant Aktif') ? "" : location.reload();
        }
      }
    });
  }

  function action_tolak_merchant(kode_user){
    let valid = confirm("Tolak User Merchant Yang dipilih !");

     $.ajax({
      type: "POST",
      url: "../aut/tolak_merchant.php",
      data: {
          kode_user: kode_user
      },
      success: function(data) {
        if (data) {
          alert('User Merchant Ditolak') ? "" : location.reload();
        }
      }
    });
  }

  function action_valid_kurir(kode_user){

    let valid = confirm("Aktifkan User Kurir Yang dipilih !");

     $.ajax({
      type: "POST",
      url: "../aut/validasi_merchant.php",
      data: {
          kode_user: kode_user
      },
      success: function(data) {
        if (data) {
          alert('User Kurir Aktif') ? "" : location.reload();
        }
      }
    });
  }

  function action_tolak_kurir(kode_user){
    let valid = confirm("Tolak User Kurir Yang dipilih !");

     $.ajax({
      type: "POST",
      url: "../aut/tolak_merchant.php",
      data: {
          kode_user: kode_user
      },
      success: function(data) {
        if (data) {
          alert('User Kurir Ditolak') ? "" : location.reload();
        }
      }
    });
  }

  function action_valid_marketing(kode_user){

    let valid = confirm("Aktifkan User Marketing Yang dipilih !");

     $.ajax({
      type: "POST",
      url: "../aut/validasi_merchant.php",
      data: {
          kode_user: kode_user
      },
      success: function(data) {
        if (data) {
          alert('User Marketing Aktif') ? "" : location.reload();
        }
      }
    });
  }

  function action_tolak_marketing(kode_user){
    let valid = confirm("Tolak User Marketing Yang dipilih !");

     $.ajax({
      type: "POST",
      url: "../aut/tolak_merchant.php",
      data: {
          kode_user: kode_user
      },
      success: function(data) {
        if (data) {
          alert('User Marketing Ditolak') ? "" : location.reload();
        }
      }
    });
  }

</script>