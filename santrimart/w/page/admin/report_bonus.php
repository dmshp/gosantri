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
                        <h2 class="content-header-title float-left mb-0 text-dark text-capitalize"><?php echo $_SESSION['akses'];?></h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php?menu=home" class="text-dark">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#" class="text-dark">Sales Report</a>
                                </li>                                   
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <?php
                include "../inc/koneksi.php";
                //untuk menantukan tanggal awal dan tanggal akhir data di database
                $min_tanggal = mysqli_fetch_array(mysqli_query($koneksi, "SELECT MIN(tgl_penjualan) AS min_tanggal FROM tabel_penjualan"));
                $max_tanggal = mysqli_fetch_array(mysqli_query($koneksi, "SELECT MAX(tgl_penjualan) AS max_tanggal FROM tabel_penjualan"));
                ?>  
                <!-- Column selectors with Export Options and print table -->
                <section id="column-selectors">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="divider">
                                    <div class="divider-text"><h3 class="mb-3 display-4 text-uppercase">Laporan Bonus Penjualan</h3></div>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard"> 
                                        <div class="row">
                                            <div class="col-lg-3 col-12 mb-3">
                                                <form action="index.php?menu=bonus" method="post" name="postform">
                                                    <div class="divider">
                                                        <div class="divider-text"><h5 class="mb-3 font-medium-1 text-uppercase">Tanggal Awal</h5></div>
                                                    </div>
                                                    <div class="input-group">
                                                        <input type='text' name="tanggal_awal" class="form-control pickadate" value="<?php echo $min_tanggal['min_tanggal']; ?>" />
                                                        <div class="input-group-append" id="button-addon2">
                                                           <button class="btn btn-primary rounded-0" type="button"><i class="far fa-calendar-minus"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="divider">
                                                        <div class="divider-text"><h5 class="mb-3 font-medium-1 text-uppercase">Tanggal Akhir</h5></div>
                                                    </div>
                                                    <div class="input-group">
                                                        <input type='text' name="tanggal_akhir" class="form-control pickadate" value="<?php echo $max_tanggal['max_tanggal']; ?>" />
                                                        <div class="input-group-append" id="button-addon2">
                                                           <button class="btn btn-primary rounded-0" type="button"><i class="far fa-calendar-plus"></i></button>
                                                        </div>
                                                    </div>
                                                   <button type="submit" name="cari" class="btn btn-block btn-info mt-2 text-white rounded-0">TAMPIL</button>
                                                </form>
                                            </div>
                                            <div class="col-lg-9 col-12 mb-1">
                                                    <?php
                                                    if (isset($_POST['cari'])) {
                                                    $tanggal_awal = $_POST['tanggal_awal'];
                                                    $tanggal_akhir = $_POST['tanggal_akhir'];
                                                    if (empty($tanggal_awal) and empty($tanggal_akhir)) {
                                                    //jika tidak menginput apa2
                                                    $query = mysqli_query($koneksi, "SELECT * FROM tabel_penjualan ORDER BY tgl_penjualan DESC");
                                                    $jumlah = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(total_penjualan) AS total FROM tabel_penjualan ORDER BY tgl_penjualan DESC"));
                                                    } else {
                                                      ?>
                                                    <span class="nama-user" style="color: #d16010;">
                                                        <i><b>Data Penjualan : </b> Pencarian dari tanggal <b><?php echo $_POST['tanggal_awal'] ?></b> sampai dengan tanggal <b><?php echo $_POST['tanggal_akhir'] ?></b>
                                                        </i>
                                                    </span>

                                                    <?php 
                                                      $query = mysqli_query($koneksi, "SELECT a.id, a.no_faktur_penjualan, a.kd_supplier, a.tgl_penjualan, a.id_user, b.nm_user, a.total_penjualan, a.biaya_pengiriman, a.total_biaya, a.total_biaya*(3/100) as tot_bonus, a.dp, a.sisa, a.ket, a.status, a.nama_penerima, a.kontak, a.alamat FROM tabel_penjualan a INNER JOIN tabel_member b ON a.id_user=b.id_user WHERE a.tgl_penjualan BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY a.tgl_penjualan DESC");
                                                        
                                                        $jumlah = mysqli_fetch_array(mysqli_query($koneksi, "SELECT sum(total_biaya)*(3/100) as tot_bonus FROM tabel_penjualan WHERE tgl_penjualan BETWEEN '$tanggal_awal' AND '$tanggal_akhir' ORDER BY tgl_penjualan DESC")); 
                                                    } ?>

                                                <div class="badge badge-primary float-right">
                                                    Total Bonus
                                                    <span class="font-small-3 nama-user">
                                                        Rp. <?php echo number_format($jumlah['tot_bonus'],0,',','.') ?>
                                                    </span>
                                                </div>
                                                <br>                     
                                            
                                                <div class="table-responsive">
                                                    <table class="table table-striped dataex-html5-selectors">
                                                        <thead>
                                                            <tr>
                                                                <th width="5%">No</th>
                                                                <th width="10%">Faktur</th>
                                                                <th width="15%">Tanggal</th>
                                                                <th width="15%">Penjualan</th>
                                                                <th width="15%">Bonus</th>
                                                                <th width="25%">Barang</th>
                                                                <th width="10%">Member</th>
                                                                <th width="25%">Keterangan</th>
                                                            </tr>
                                                            <?php
                                                            //untuk penomoran data
                                                            $no = 0;
                                                            //menampilkan data
                                                            while ($row = mysqli_fetch_array($query)) {
                                                            ?>
                                                        </thead>
                                                        <tbody> 
                                                            <tr>
                                                                <td style="vertical-align: top;">
                                                                    <?php echo $no = $no + 1; ?>        
                                                                </td>
                                                                <td style="vertical-align: top;">
                                                                    <?php echo $row['no_faktur_penjualan']; ?>
                                                                </td>
                                                                <td style="vertical-align: top;">
                                                                    <?php echo $row['tgl_penjualan']; ?>
                                                                </td>
                                                                <td style="vertical-align: top;">
                                                                    <!--?php echo number_format($row['total_penjualan'],0,',','.');?--><?php echo $row['total_penjualan']; ?>
                                                                </td>
                                                                <td style="vertical-align: top;">
                                                                    <?php echo $row['tot_bonus']; ?>      
                                                                </td>
                                                                <td>
                                                                    <?php $c = mysqli_query($koneksi, "SELECT * FROM tabel_barang, tabel_rinci_penjualan WHERE tabel_barang.kd_barang = tabel_rinci_penjualan.kd_barang AND tabel_rinci_penjualan.no_faktur_penjualan = '$row[no_faktur_penjualan]' ");
                                                                    while ($d = mysqli_fetch_array($c)) {
                                                                        $hrg     = $d['harga'];
                                                                        $jml     = $d['jumlah'];
                                                                        $total_hrg  = $hrg * $jml;
                                                                    ?>
                                                                    <?php echo $jml ?> &nbsp; <?php echo $d['nm_barang'] ?>
                                                                    <hr />
                                                                    <?php } ?>
                                                                </td>
                                                                <td style="vertical-align: top;">
                                                                    <?php echo rtrim($row['nm_user']) ?>
                                                                </td>
                                                                <td style="vertical-align: top;">
                                                                    <?php echo $row['ket']; ?>
                                                                </td>
                                                            </tr>
                                                            <?php  } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <?php 
                                                } else {
                                                    unset($_POST['cari']);
                                                } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>   
            </div>
        </div>
       <!-- END: Content-->
    </div>
</div> 