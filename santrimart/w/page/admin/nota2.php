<?php
$no_faktur = $_GET['faktur'];
$bayar = $_GET['bayar'];

$query_tabel_penjualan = "SELECT * FROM `tabel_penjualan` WHERE `no_faktur_penjualan` = '$no_faktur'";
$hasil = mysqli_fetch_array(mysqli_query($koneksi, $query_tabel_penjualan));
// var_dump($hasil_tabel_penjualan);
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
                            <li class="breadcrumb-item"><a href="#" class="text-dark">Pesanan</a>
                            </li>                                   
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
      <div class="card-body">
        <div class="content-body">
          <section id="basic-examples">
            <div class="row match-height mt-3">                
              <div class="col-xl-4 col-md-6 col-sm-12"></div>        
              <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="card bg-gradient-info">
                  <div class="card-content">
                    <div class="ml-auto float-right">
                      <span class="badge badge-danger font-weight-normal p-1 rounded-0">Nota. <?php echo $no_faktur; ?></span>
                    </div>
                    <div class="card-body"> 
                      <div class="d-flex justify-content-between">
                        <div class="float-left">                     
                            <p class="font-medium-2 mb-0 text-capitalize">nama-toko</p>
                         </div>
                      </div> 
                      <hr class="my-1">
                          
                      <form method="post" action="../aksi/add_pengiriman.php">
                        <div class="row">
                          <div class="col-sm-6">
                            <label class="text-white">Nama</label>
                            <input name="nama_penerima" class="form-control" placeholder="Nama penerima"/>
                          </div>
                          <div class="col-sm-6">
                            <label class="text-white">Kontak</label>
                            <input name="kontak" class="form-control" placeholder="No. Telepon"/>
                          </div>
                        </div>
                        <input type="hidden" name="no_faktur" value="<?php echo $no_faktur; ?>">
                        <input type="hidden" name="bayar" value="<?php echo $bayar; ?>">
                        <label class="text-white">Alamat</label>
                        <input name="alamat" class="form-control" placeholder="Alamat lengkap"/>
                        <ul class="list-inline font-weight-medium">
                          <?php $query_detail = "SELECT * FROM tabel_rinci_penjualan WHERE no_faktur_penjualan = '$no_faktur'";
                                $result_detail = mysqli_query($koneksi, $query_detail);
                                while ($b = mysqli_fetch_array($result_detail)) {
                          ?>
                    			<li><i class="fas fa-check"></i>
                          <?php
                            if (empty($b['no_hp'])) {
                              echo $b['nm_barang']; ?> <?php echo "(" . $b['jumlah'] . ")";
                            }elseif(empty($b['no_hp']) || empty($b['alamat'])){
                              echo $b['nm_barang']; ?> <?php echo "(" . $b['jumlah'] . ")";?> <?php echo "(" . $b['no_hp'] . ")";
                            }elseif(empty($b['no_hp']) || empty($b['alamat']) || empty($b['alamat_akhir'])){
                              echo $b['nm_barang']; ?> <?php echo "(" . $b['jumlah'] . ")";?> <?php echo "(" . $b['no_hp'] . ")<br/>";?><?php echo "(" . $b['alamat'] . ")";
                            } else {
                              echo $b['nm_barang']; ?> <?php echo "(" . $b['jumlah'] . ")"; ?> <?php echo "(" . $b['no_hp'] . ")<br/>";?><?php echo "(" . $b['alamat'] . ")<br/>";?><?php echo "(" . $b['alamat_akhir'] . ")";
                            }
                          ?>
                    			</li>
                          <?php } ?>
                			  </ul>
                        <div class="d-flex justify-content-between">
                          <div class="float-left">
                            <span class="mb-0">HARGA BARANG :</span>
                          </div>
                          <div class="float-right">
                            <span class="btn rounded-0 text-white" id="total">Rp.<?php echo $hasil['total_penjualan']; ?></span>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between">
                          <div class="float-left">
                            <span class="mb-0">PENGIRIMAN :</span>
                          </div>
                          <div class="float-right">
                            <span class="btn rounded-0 text-white" id="total">Rp.<?php echo $hasil['biaya_pengiriman']; ?></span>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between">
                          <div class="float-left">
                            <span class="mb-0">BIAYA TOTAL :</span>
                          </div>
                          <div class="float-right">
                            <span class="btn rounded-0 text-white" id="total">Rp.<?php echo $hasil['total_biaya']; ?></span>
                          </div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                          <button type="submit" name="selesai" class="btn btn-danger rounded-0"><i class="fas fa-clipboard-check"></i>Selesai</button>
                          <!-- <a href="index.php?menu=nota" target="_blank" class="btn btn-white rounded-0"><i class="fas fa-print"></i> PRINT</a> -->
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <div  class="col-xl-4 col-md-6 col-sm-12"></div>
            </div>
          </section>    
        </div>
      </div>
    </div>
  </div>
</div>