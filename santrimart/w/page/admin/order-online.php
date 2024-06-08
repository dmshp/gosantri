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
                                <li class="breadcrumb-item"><a href="index.php?menu=home" class="text-dark">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#" class="text-dark">Saldo</a>
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
                    <div class="divider-text">
                        <h3 class="mb-3 display-4 text-uppercase">ORDER</h3>
                    </div>
                </div>

                <div class="col-lg-12 col-12">
                    <div class="badge badge-primary float-right">
                        <?php
                        $idUser = $user['id_user'];

                        $sql_user = mysqli_query($koneksi, "SELECT * FROM tabel_pembelian WHERE id_user = '$idUser' ");
                        $jumlah_user = mysqli_num_rows($sql_user);
                        ?>
                        <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2">
                            <?php echo $jumlah_user; ?>
                        </span>
                        Total Order
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped dataex-html5-selectors">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Foto</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total di Bayar</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>pembeli</th>
                                    <th>FAKTUR</th>
                                    <th>Print Nota</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // print_r($_SESSION);
                                $kdToko = $_SESSION['id_user'];
                                $namaMerchant = $_SESSION['nm_user'];
                                $queryToko = mysqli_query($koneksi, "SELECT * FROM tabel_member WHERE id_user = '$kdToko'");
                                $result = $queryToko->fetch_assoc();
                                $ketQuery = "SELECT * FROM tabel_rinci_penjualan, tabel_penjualan , tabel_barang, tabel_member, tabel_barang_gambar WHERE tabel_rinci_penjualan.no_faktur_penjualan = tabel_penjualan.no_faktur_penjualan AND tabel_rinci_penjualan.kd_barang = tabel_barang.kd_barang AND tabel_penjualan.id_user = tabel_member.id_user AND tabel_member.akses != 'admin' AND tabel_barang_gambar.id_brg = tabel_rinci_penjualan.kd_barang  ";
                                $executeSat = mysqli_query($koneksi, $ketQuery);
                                while ($b = mysqli_fetch_array($executeSat)) {
                                    // print_r($result);
                                    $e = explode(",", $b['gambar']);

                                ?>
                                <tr>
                                    <td><?php echo $b['nm_barang'] ?></td>
                                    <td> <img src="../img/produk/<?php echo $e[0] ?>" width="50px" height="50px"></td>
                                    <td>Rp.<?php echo number_format($b['harga'], 0, ",", "."); ?></td>
                                    <td><?php echo $b['jumlah'] ?></td>
                                    <td>Rp.<?php echo number_format($b['sub_total_jual'], 0, ",", "."); ?></td>
                                    <td><?php echo $b['status'] ?></td>
                                    <td><?php echo $b['tgl_penjualan'] ?></td>
                                    <td><?php echo $b['nm_user'] ?></td>
                                    <td><?php echo $b['no_faktur_penjualan'] ?></td>
                                    <td>
                                        <a
                                            href="index.php?menu=nota&faktur=<?php echo $b['no_faktur_penjualan']; ?>&bayar=<?php echo number_format($b['harga'], 0, ",", "."); ?>&tgl=<?php echo $b['tgl_penjualan']; ?>&nama_penerima=<?php echo $b['nm_user']; ?>&nama_merchant=<?php echo $namaMerchant ?>&alamat=<?php echo $b['alamat_user']; ?>&noTelp=<?php echo $b['hp']; ?>&email=<?php echo $b['email_user']; ?>&nama_barang=<?php echo $b['nm_barang']; ?>&jumlah=<?php echo $b['jumlah']; ?>&subtotal=<?php echo number_format($b['sub_total_jual'], 0, ",", "."); ?>">
                                            <button type="submit" class="btn btn-primary rounded-0 mr-1 mb-1 ml-1"
                                                name="add_penjualan">Print</button></a>
                                    </td>


                                </tr>
                                <?php } ?>
                            </tbody>
                            <!-- <tfoot>
                                    <tr>
                                        <th>Member</th>
                                        <th>Saldo</th>
                                        <th>Topup</th>
                                        <th>Edit</th>
                                    </tr>
                                </tfoot> -->
                        </table>
                    </div>

                </div>
            </div>
            <!-- END: Content-->
        </div>
    </div>
</div>
</div>