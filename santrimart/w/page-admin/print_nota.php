<style type="text/css" media="print">

@page {

    size: auto;   /* auto is the initial value */

    margin: 0;  /* this affects the margin in the printer settings */

}

</style>

<?php

    session_start();

    include "../inc/koneksi.php";
    if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
      header('location:../aut/login.php');
    } 

    $kd_toko = $_SESSION['kd_toko'];    
    $no_faktur    = $_GET['faktur'];
    $bayar = 0;
    if(isset($_GET['bayar'])){
        $bayar    = $_GET['bayar'];
    }

    $selectDataToko = mysqli_query($koneksi, "SELECT * FROM tabel_toko where kd_toko = '$kd_toko'");

    $namaToko       = "";

    $alamatToko     = "";

    $teleponToko    = "";

    if ($selectDataToko) {

        while ($dataToko = mysqli_fetch_array($selectDataToko)) {

            $namaToko       = $dataToko['nm_toko'];

            $alamatToko     = $dataToko['almt_toko'];

            $teleponToko    = $dataToko['tlp_toko'];

        }

    }else {

        echo $koneksi->error;

    }

?>

<div style="width: 6cm; padding: 0 0.5cm; font-size: 14px;">

    <p style="text-align: center; margin: 0; padding-top: 2cm;">

        <?php

            echo strtoupper($namaToko);

        ?>

    </p>

    <p style="text-align: center; margin: 0;">

        <?php

            echo strtoupper($alamatToko);

        ?>

    </p>

    <p style="text-align: center; margin: 0; padding-bottom: 10px;">

        <?php

            echo "TELP.".strtoupper($teleponToko);

        ?>

    </p>

    <hr style="border: dashed 1px black;">

    <hr style="border: dashed 1px black;">

    <?php
        $query = "SELECT * FROM `tabel_penjualan` INNER JOIN tabel_rinci_penjualan WHERE tabel_penjualan.no_faktur_penjualan = tabel_rinci_penjualan.no_faktur_penjualan AND tabel_penjualan.no_faktur_penjualan = '$no_faktur'";

        $selectDataBarang = mysqli_query($koneksi, $query);

        ?>

    <table border="0" style="width: 100%;">
        <tr>

            <td style="text-align: left; font-size: 12px;">Barang</td>

            <td style="text-align: left; font-size: 12px;">Harga</td>

            <td style="text-align: center; font-size: 12px;">Jml</td>

            <td style="text-align: right; font-size: 12px;">Total</td>

        </tr>

        <?php

            $jumlahBarang   = mysqli_num_rows($selectDataBarang);

            $total = "";

            $grand_total = "";

            $pengiriman = "";

            $ket = "";


            if ($selectDataBarang) {

                while ($dataBarang = mysqli_fetch_array($selectDataBarang)) {

                    $kd_barang = $dataBarang['kd_barang'];

                    $subtotal = $dataBarang['harga'] * $dataBarang['jumlah'];
                    $query = "SELECT * FROM `tabel_barang` WHERE `kd_barang` = '$kd_barang'";

                    $hasil = mysqli_fetch_array(mysqli_query($koneksi, $query));

                    $total = $dataBarang['total_penjualan'];

                    $grand_total = $dataBarang['total_biaya'];

                    $pengiriman = $dataBarang['biaya_pengiriman'];

                    $ket = $dataBarang['ket'];

                    ?>

                    <tr>

                        <td style="text-align: left; font-size: 12px;"><?php echo $hasil['nm_barang']?></td>

                        <td style="text-align: left; font-size: 12px;"><?php echo $dataBarang['harga']?></td>

                        <td style="text-align: center; font-size: 12px;"><?php echo $dataBarang['jumlah']?></td>

                        <td style="text-align: right; font-size: 12px;"><?php echo $dataBarang['sub_total_jual']?></td>

                    </tr>

                    <?php

                }

            }



        ?>

    </table>

    <hr>

    <table border="0" style="width: 100%; font-size: 12px;" >

        <tr>

            <td style="text-align: left;">Total Qty</td>

            <td style="text-align: center;">:</td>

            <td style="text-align: left;"><?php echo $jumlahBarang?></td>

            <td style="text-align: right;"></td>

        </tr>

        <tr>

            <td style="text-align: left;">Total</td>

            <td style="text-align: center;">:</td>

            <td style="text-align: center;"></td>

            <td style="text-align: right;"><?php echo $total;?></td>

        </tr>

        <tr>

            <td style="text-align: left;">Pengiriman</td>

            <td style="text-align: center;">:</td>

            <td style="text-align: center;"></td>

            <td style="text-align: right;">
                <?php 
                    if($pengiriman != null){
                        echo $pengiriman;
                    }
                    else{
                        echo "0";
                    }
                ?>  
            </td>

        </tr>

        <tr>

            <td style="text-align: left;">Grand Total</td>

            <td style="text-align: center;">:</td>

            <td style="text-align: center;"></td>

            <td style="text-align: right;"><?php echo $grand_total;?></td>

        </tr>

        <tr>

            <td style="text-align: left;">Pembayaran</td>

            <td style="text-align: center;">:</td>

            <td style="text-align: left;"></td>

            <td style="text-align: right;"><?php echo $bayar?></td>

        </tr>

        <tr>

            <?php 
                $sisa = intval($bayar)-intval($grand_total);
                if($sisa < 0){
            ?>
                <td style="text-align: left;">Kurang</td>

                <td style="text-align: center;">:</td>

                <td style="text-align: left;"></td>

                <td style="text-align: right;">
                    <?php
                        echo $sisa;
                    ?>   
                </td>
            <?php } else{?>
                <td style="text-align: left;">Kembali</td>

                <td style="text-align: center;">:</td>

                <td style="text-align: left;"></td>

                <td style="text-align: right;">
                    <?php
                        echo $sisa;
                    ?>   
                </td>
            <?php } ?>


        </tr>

        <tr>

            <td style="text-align: left;">Cara Bayar</td>

            <td style="text-align: center;">:</td>

            <td style="text-align: left;"><?php echo $ket;?></td>

            <td style="text-align: right;"></td>

        </tr>

        <tr>

            <td style="text-align: left;">Kasir</td>

            <td style="text-align: center;">:</td>

            <td style="text-align: left;"><?php echo $_SESSION['nm_user'];?></td>

            <td style="text-align: right;"><?php echo date("d-m-Y")?></td>

        </tr>

    </table>

    <hr style="border: dashed 1px black;">

    <p style="margin: 0; text-align: center; font-size: 10px;">

        TERIMA KASIH ATAS KUNJUNGAN ANDA 

    </p>

    <br>

    <P style="margin: 0; text-align: center; font-size: 12px;">

        Barang yang sudah dibeli tidak dapat

        <br>

        ditukar/dikembalikan

        <br><br>

        <a href="index.php?menu=ipos" style="text-decoration: none; color: black;">Terimakasih</a>
    </P>

</div>

<script>

    window.print();

</script>