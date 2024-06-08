<?php

    include "../inc/koneksi.php";


    $faktur = $_POST['id_barang'];

    $selectBarang =  mysqli_query($koneksi, "SELECT * FROM tabel_rinci_penjualan WHERE no_faktur_penjualan = '$faktur'");

    echo json_encode(mysqli_fetch_array($selectBarang));

?>