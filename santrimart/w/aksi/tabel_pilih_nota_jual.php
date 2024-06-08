<?php 
session_start();
include '../inc/koneksi.php';

$faktur = $_GET['key'];

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
	 	<th class="text-center">Faktur</th>
	 	<th class="text-center">Kode Barang</th>
	 	<th class="text-center">Nama Barang</th>
	 	<th class="text-center">Jumlah</th>
	 	<th class="text-center">Harga</th>
	 	<th class="text-center">Total Harga</th>
	 	<th class="text-center">Status Order</th>
	 	<th></th>
	 </tr>
		<?php 
		 	$query = "SELECT * FROM `tabel_rinci_penjualan` WHERE `no_faktur_penjualan` LIKE '%$faktur%'";
			$hasil = mysqli_query($koneksi, $query);
            while($h=mysqli_fetch_array($hasil)){
		?>
	<tr>
		<td class="text-center"><?php echo $h['no_faktur_penjualan']; ?></td>
		<td class="text-center"><?php echo $h['kd_barang']; ?></td>
		<td class="text-left"><?php echo strtoupper($h['nm_barang']); ?></td>
		<td class="text-center"><?php echo number_format($h['jumlah'], 0, ",", "."); ?></td>
		<td class="text-center">Rp.<?php echo number_format($h['harga'], 0, ",", "."); ?></td>
		<td class="text-center">Rp.<?php echo number_format($h['sub_total_jual'], 0, ",", "."); ?></td>
		<td class="text-center"><?php echo $h['stts']; ?></td>
		<td class="text-center" onclick="add_data(`<?php echo $h['no_faktur_penjualan']; ?>`)" ><button type="button" class="badge badge-primary">Pilih</button></td>

		<?php  
			}
		?>
	</tr>
</table>