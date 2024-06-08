<?php

    include "../inc/koneksi.php";


    $kd_barang = $_POST['id_barang'];

    $selectBarang =  mysqli_query($koneksi, "SELECT a.kd_barang, a.nm_barang, a.kd_satuan, a.kd_kategori, a.kd_merchant, a.nota, a.kd_supplier, c.nama as nm_supplier, a.kd_toko, a.deskripsi, b.stok, a.berat, a.panjang, a.lebar, a.tinggi, a.warna, a.tipe, a.merek, a.hrg_beli, a.hrg_grosir, a.hrg_jual, a.diskon, a.hrg_jual_disk, a.aktif, a.komisi, a.crtdt, a.crtusr FROM tabel_barang a INNER JOIN tabel_stok_toko b ON a.kd_barang = b.kd_barang AND a.kd_toko = b.kd_toko INNER JOIN tabel_supplier c ON a.kd_supplier = c.kd_supplier WHERE a.kd_barang = '$kd_barang'");

    echo json_encode(mysqli_fetch_array($selectBarang));

?>