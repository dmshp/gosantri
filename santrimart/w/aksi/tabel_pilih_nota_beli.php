<?php 
session_start();
include '../inc/koneksi.php';

$barang = $_GET['key'];

?>

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

    .table th {
	    font-size: 0.85rem;
	    background-color: #337ab7;
	}

</style>

<table class="table table-striped">

	 <tr class="header-tabel">
	 	<th class="text-center">Kode Barang</th>
	 	<th class="text-center">Nama Barang</th>
	 	<th class="text-center">Jumlah</th>
	 	<th class="text-center">Harga Beli</th>
	 	<th class="text-center">Harga Jual</th>
	 	<th class="text-center">Nota</th>
	 	<th class="text-center">Supplier</th>
	 	<th></th>
	 </tr>
		<?php 
		 	$query = "SELECT a.kd_barang, a.nm_barang, a.kd_satuan, a.kd_kategori, a.kd_merchant, a.nota, a.kd_supplier, c.nama as nm_supplier, a.kd_toko, a.deskripsi, b.stok, a.berat, a.panjang, a.lebar, a.tinggi, a.warna, a.tipe, a.merek, a.hrg_beli, a.hrg_grosir, a.hrg_jual, a.diskon, a.hrg_jual_disk, a.aktif, a.komisi, a.crtdt, a.crtusr FROM tabel_barang a INNER JOIN tabel_stok_toko b ON a.kd_barang = b.kd_barang AND a.kd_toko = b.kd_toko INNER JOIN tabel_supplier c ON a.kd_supplier = c.kd_supplier WHERE a.nm_barang LIKE '%$barang%'";
			$hasil = mysqli_query($koneksi, $query);
            while($h=mysqli_fetch_array($hasil)){
		?>
	<tr>
		<td class="text-center"><?php echo $h['kd_barang']; ?></td>
		<td class="text-left"><?php echo strtoupper($h['nm_barang']); ?></td>
		<td class="text-center"><?php echo number_format($h['stok'], 0, ",", "."); ?></td>
		<td class="text-center">Rp.<?php echo number_format($h['hrg_beli'], 0, ",", "."); ?></td>
		<td class="text-center">Rp.<?php echo number_format($h['hrg_jual'], 0, ",", "."); ?></td>
		<td class="text-center"><?php echo $h['nota']; ?></td>
		<td class="text-center"><?php echo $h['nm_supplier']; ?></td>
		<td class="text-center" onclick="add_data(`<?php echo $h['kd_barang']; ?>`)" ><button type="button" class="badge badge-primary">Pilih</button></td>

		<?php  
			}
		?>
	</tr>
</table>