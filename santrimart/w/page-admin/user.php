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
                  <?php if($_GET['akses'] == 'merchant'){ ?>
                  <div class="divider-text"><h3 class="mb-3 display-4 text-uppercase">Daftar User Merchant</h3></div>
									<?php }else if($_GET['akses'] == 'member'){ ?>
                  <div class="divider-text"><h3 class="mb-3 display-4 text-uppercase">Daftar User Member</h3></div>
                  <?php }else if($_GET['akses'] == 'kurir'){ ?>
                  <div class="divider-text"><h3 class="mb-3 display-4 text-uppercase">Daftar User Kurir</h3></div>
									<?php } ?>
                </div>
                <div class="card-content">
                  <div class="card-body card-dashboard">                                       
                    <?php 
                      if($_GET['akses'] == 'merchant'){
                    ?>
                    <div class="col-lg-12 col-12">
                      <div class="badge badge-primary float-right">
                        <?php 
                        $akses = $_GET['akses'];
                        $sql_user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(a.id_user)jml FROM tabel_member a LEFT JOIN tabel_merchant b on a.id_user = b.id_user WHERE a.akses = '$akses' ORDER BY a.nm_user ASC"));
                        $jumlah_user = $sql_user['jml']; ?>
                        <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2 nama-user">
                          <?php echo $jumlah_user ?></span>Total Info
                      </div>
                      <div class="table-responsive">
                        <table class="table table-striped dataex-html5-selectors">
                          <thead>
                            <tr>
                              <th class="text-center">NO</th>
                              <th class="text-center">KODE</th>
                              <th class="text-center">NAMA</th>
                              <th class="text-center">NAMA MERCHANT</th>
                              <th class="text-center">ALAMAT</th>
                              <th class="text-center">EMAIL</th>
                              <th class="text-center">NOMOR HP</th>
                              <th class="text-center">STATUS</th>
                              <th class="text-center">AKSI</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                                $akses = $_GET['akses'];
                                $no = 0;    
                                $ketQuery = "SELECT * FROM tabel_member a LEFT JOIN tabel_merchant b on a.id_user = b.id_user WHERE a.akses = '$akses' ORDER BY a.nm_user ASC";
                                $executeSat = mysqli_query($koneksi, $ketQuery);
                                while ($m=mysqli_fetch_array($executeSat)) {
                                $no++;
                            ?>                                  
                            <tr>
                              <td class="text-center"><?= $no; ?></td>
                              <td class="text-center"><?php echo $m['kode_user'] ?></td>
                              <td class="text-capitalize"><?php echo strtoupper($m['nm_user']) ?></td>
                              <td class="text-capitalize"><?php echo strtoupper($m['nm_merchant']) ?></td>
                              <td><?php echo $m['alamat_user'] ?></td>
                              <td class="text-capitalize"><?php echo $m['email_user'] ?></td>
                              <td class="text-center"><?php echo $m['hp'] ?></td>
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
                                <a href="index.php?id_user=<?php echo $m['id_user']; ?>">
                                  <i class="fas fa-edit"></i>
                                </a>
                              </td>
                            </tr>
                               <?php } ?>                                                  
                          </tbody>
                          <tfoot>
                            <tr class="header-tabel">
                              <th class="text-center">NO</th>
                              <th class="text-center">KODE</th>
                              <th class="text-center">NAMA</th>
                              <th class="text-center">NAMA MERCHANT</th>
                              <th class="text-center">ALAMAT</th>
                              <th class="text-center">EMAIL</th>
                              <th class="text-center">NOMOR HP</th>
                              <th class="text-center">STATUS</th>
                              <th class="text-center">AKSI</th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                    <?php  
                      }else if($_GET['akses'] == 'member'){
                    ?>
                    <div class="col-lg-12 col-12">
                      <div class="badge badge-primary float-right">
                        <?php 
                        $akses = $_GET['akses'];
                        $sql_user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(id_user)jml FROM tabel_member WHERE tabel_member.akses = '$akses' ORDER BY nm_user ASC"));
                        $jumlah_user = $sql_user['jml']; ?>
                        <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2 nama-user">
                          <?php echo $jumlah_user ?></span>Total Info
                      </div>
                      <div class="table-responsive">
                        <table class="table table-striped dataex-html5-selectors">
                          <thead>
                            <tr>
                              <th class="text-center">NO</th>
                              <th class="text-center">KODE</th>
                              <th class="text-center">NAMA</th>
                              <th class="text-center">ALAMAT</th>
                              <th class="text-center">EMAIL</th>
                              <th class="text-center">NOMOR HP</th>
                              <th class="text-center">STATUS</th>
                              <th class="text-center">AKSI</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                               $akses = $_GET['akses'];  
                               $no = 0;   
                               $ketQuery = "SELECT * FROM tabel_member WHERE tabel_member.akses = '$akses' ORDER BY nm_user ASC";
                               $executeSat = mysqli_query($koneksi, $ketQuery);
                               while ($m=mysqli_fetch_array($executeSat)) {
                               $no++;
                            ?>                                  
                            <tr>
                              <td class="text-center"><?= $no; ?></td>
                              <td class="text-center"><?php echo $m['kode_user'] ?></td>
                              <td class="text-capitalize"><?php echo strtoupper($m['nm_user']) ?></td>
                              <td><?php echo $m['alamat_user'] ?></td>
                              <td class="text-capitalize">
                                  <div><?= $m["email_user"]; ?></div>
                                </td>
                              <td class="text-center"><?php echo $m['hp'] ?></td>
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
                                <a href="index.php?id_user=<?php echo $m['id_user']; ?>">
                                  <i class="fas fa-edit"></i>
                                </a>
                              </td>
                            </tr>
                               <?php } ?>                                                  
                          </tbody>
                          <tfoot>
                            <tr class="header-tabel">
                              <th class="text-center">NO</th>
                              <th class="text-center">KODE</th>
                              <th class="text-center">NAMA</th>
                              <th class="text-center">ALAMAT</th>
                              <th class="text-center">EMAIL</th>
                              <th class="text-center">NOMOR HP</th>
                              <th class="text-center">STATUS</th>
                              <th class="text-center">AKSI</th>
                            </tr>
                          </tfoot>  
                        </table>
                      </div>
                    </div>
                    <?php  
                      }else if($_GET['akses'] == 'kurir'){
                    ?>
                    <div class="col-lg-12 col-12">
                      <div class="badge badge-primary float-right">
                        <?php 
                        $akses = $_GET['akses'];
                        $sql_user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT count(id_user)jml FROM tabel_member WHERE tabel_member.akses = '$akses' ORDER BY nm_user ASC"));
                        $jumlah_user = $sql_user['jml']; ?>
                        <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2 nama-user">
                          <?php echo $jumlah_user ?></span>Total Info
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
                              <th class="text-center">KTP</th>
                              <th class="text-center">BANK</th>
                              <th class="text-center">REKENING</th>
                              <th class="text-center">STATUS</th>
                              <th class="text-center">AKSI</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $no = 0;
                              $ketQuery = "SELECT * FROM tabel_member a INNER JOIN tabel_kurir b on a.id_user = b.id_user";
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
                                <td>
                                  <div><?= $x["bank"]; ?></div>
                                </td>
                                <td>
                                  <div><?= $x["no_rekening"] ?></div>
                                  <div><?= $x["an_rekening"]; ?></div>
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
                                  <a class="badge badge-primary text-white" onclick="action_valid(`<?php echo $x['kode_user']; ?>`)">Validasi</a>
                                  <?php } if($x['stt_user'] == "PENDING" || $x['stt_user'] == "AKTIF"){ ?>
                                  <a class="badge badge-danger text-white" onclick="action_tolak(`<?php echo $x['kode_user']; ?>`)">Tolak</a>
                                  <?php } ?>
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
                              <th class="text-center">KTP</th>
                              <th class="text-center">BANK</th>
                              <th class="text-center">REKENING</th>
                              <th class="text-center">STATUS</th>
                              <th class="text-center">AKSI</th>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                    <?php  
                      }
                    ?>
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

  function action_valid(kode_user, nm_user){

    let valid = confirm("Aktifkan Merchant");

     $.ajax({
      type: "POST",
      url: "../aut/validasi_merchant.php",
      data: {
          kode_user: kode_user
      },
      success: function(data) {
        if (data) {
          alert('Merchant Aktif') ? "" : location.reload();
        }
      }
    });
  }

  function action_tolak(kode_user, nm_user){
    let valid = confirm("Tolak Merchant");

     $.ajax({
      type: "POST",
      url: "../aut/tolak_merchant.php",
      data: {
          kode_user: kode_user
      },
      success: function(data) {
        if (data) {
          alert('Merchant Ditolak') ? "" : location.reload();
        }
      }
    });
  }
</script>