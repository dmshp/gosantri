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
                                <li class="breadcrumb-item"><a href="#" class="text-dark">Keranjang</a>
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
                        <h3 class="mb-3 display-4 text-uppercase">KERANJANG</h3>
                    </div>
                </div>

                <div class="col-lg-12 col-12">
                    <?php
                    $user = $_SESSION['id_user'];
                    $Que = "SELECT DISTINCT nm_toko,nm_barang,gambar,hrg_jual FROM keranjang,tabel_toko, tabel_barang_gambar, tabel_barang WHERE keranjang.id_member = '$user' AND keranjang.kd_toko = tabel_toko.kd_toko  AND tabel_barang_gambar.id_brg = keranjang.kd_barang AND tabel_barang.kd_barang = keranjang.kd_barang";
                    $ex = mysqli_query($koneksi, $Que);
                    while ($c = mysqli_fetch_array($ex)) {
                        $kdbarang = $c['kd_barang'];
                        $e = $c['gambar'];
                        $e = explode(",", $e);
                    ?>
                        <div class="table-responsive">
                            <table class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th style="background-color: whitesmoke;font-size: large;">
                                            <p class="text-capitalize fs-1"><?php echo ucfirst($c['nm_toko']) ?></p>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                            <table class="table table" id="TABLEID">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Nama Barang</th>
                                        <th>Foto</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total di Bayar</th>
                                    </tr>
                                </thead>
                                <?php
                                $Que = "SELECT DISTINCT nm_barang,gambar,hrg_jual FROM keranjang,tabel_toko, tabel_barang_gambar, tabel_barang WHERE keranjang.id_member = '$user' AND keranjang.kd_toko = tabel_toko.kd_toko  AND tabel_barang_gambar.id_brg = keranjang.kd_barang AND tabel_barang.kd_barang = keranjang.kd_barang";
                                $ex = mysqli_query($koneksi, $Que);
                                $no = 0;
                                while ($c = mysqli_fetch_array($ex)) {
                                    $no++;
                                    $kdbarang = $c['kd_barang'];
                                    $e = $c['gambar'];
                                    $e = explode(",", $e);
                                ?>
                                    <tbody>
                                        <tr>
                                            <td><input type="checkbox" class="myCheckbox" id="myCheckbox-<?= $no ?>" name="checkBox[]" onclick="getVal()">
                                            </td>
                                            <td><?php echo $c['nm_barang'] ?></td>
                                            <td> <img src="../img/produk/<?php echo $e[0] ?>" width="50px" height="50px"></td>
                                            <td>Rp.<?php echo number_format($c['hrg_jual'], 0, ",", "."); ?>
                                                <input type="text" id="harga-<?= $no ?>" name="harga" value="<?= $c['hrg_jual'] ?>" hidden>
                                            </td>
                                            <td>
                                                <div class="input-group quantity-counter-wrapper ">
                                                    <input type="text" class="quantity-counter" id="quantity-<?= $no ?>" onchange="cek_jumlah(<?= $no ?>)" value="1">
                                                </div>
                                            </td>
                                            <td>
                                                <input type="text" id="total-harga-<?= $no ?>" name="total-harga[]" value="<?= $c['hrg_jual']; ?>" hidden>
                                                <p id="total-<?= $no ?>">
                                                    Rp.<?php echo number_format($c['hrg_jual'], 0, ",", "."); ?></p>
                                            </td>
                                            <td>
                                                <a class="action-delete"><i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                <?php } ?>

                            </table>
                        </div>

                    <?php } ?>
                    <div class="float-right ">
                        <div class="row">

                            <button type="button" class="btn btn-outline-secondary btn-block">
                                <p id="jumlah" class="text-center">Rp.0</p>
                            </button>
                            <a href="index.php?menu=keranjang2" name="submit" class="btn btn-primary btn-block
                                                                      rounded-0">Check Out</a>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    function cek_jumlah(id) {
        var jumlah = document.getElementById("quantity-" + id).value;
        var harga = document.getElementById("harga-" + id).value;
        var total = jumlah * harga;
        $("#total-" + id).text("Rp." + total);
        $("#total-" + id).val(total);
        $("#total-harga-" + id).val(total);
    }

    function getVal() {
        var input = document.getElementsByName("total-harga[]");
        var check = document.getElementsByName("checkBox[]");
        var total = 0;
        for (var i = 0; i < check.length; i++) {
            if (check[i].checked) {
                total += parseInt(input[i].value);
            }
        }
        $("#jumlah").text("Rp." + total);
    }
</script>