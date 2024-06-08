<?php 
session_start();
include '../inc/koneksi.php';

$nm_barang = $_GET['key'];

?>

<table class="table table-striped">

	 <tr>
	 	<th>Kode</th>
	 	<th>Nama</th>
	 	<th>-</th>
	 </tr>
		<?php 
		 	$query = "SELECT * FROM `tabel_barang` WHERE `nm_barang` LIKE '%$nm_barang%'";
			$hasil = mysqli_query($koneksi, $query);
            while($h=mysqli_fetch_array($hasil)){
		?>
	<tr>
		<td><?php echo $h['kd_barang']; ?></td>
		<td><?php echo $h['nm_barang']; ?></td>
		<td onclick="add_data(`<?php echo $h['kd_barang']; ?>`)" ><button type="button" class="badge badge-primary">Pilih</button></td>

		<?php  
			}
		?>
	</tr>
</table>