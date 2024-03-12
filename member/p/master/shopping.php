<div class="card mt-2"> 
  <div class="content-wrapper">
   <div class="content-detached content-right">
    <div class="content-body">
	 <div class="divider">
		<div class="divider-text">Belanja Hemat</div>
	 </div>
  <section id="ecommerce-header">
	<div class="row">	
	  <div class="col-12">  
               <fieldset class="form-group position-relative">
				<input type="text" class="form-control search-product" id="iconLeft5" placeholder="Search here">
				<div class="form-control-position"><i class="fa-solid fa-magnifying-glass"></i></div>
			  </fieldset>
	  </div>
	</div>
  </section>

                    
<div class="shop-content-overlay"></div>
 
 <section id="ecommerce-products" class="grid-view">
  <div class="row">	  
  <div class="col-6">
   <div class="btn-group">
    <div class="dropdown">
     <button class="btn dropdown-toggle dropdown-toggle-split mr-1 mb-1" type="button" id="dropdownMenuButton700" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa-solid fa-layer-group"></i> Harga
     </button>
     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton700">
        <a class="dropdown-item" href="#">Termurah</a>
        <a class="dropdown-item" href="#">Tertinggi</a>
     </div>
     </div>
     </div>
   </div>
	  
   <div class="col-6">
   <div class="btn-group">
    <div class="dropdown">
     <button class="btn dropdown-toggle mr-1 mb-1" type="button" id="dropdownMenuButton700" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa-solid fa-boxes-packing"></i> Kategori
     </button>
     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton700">
        <?php error_reporting(0);
        $Query1 = "SELECT * FROM tabel_kategori_barang ORDER BY nm_kategori ASC";
        $execute = mysqli_query($koneksi, $Query1);
        while ($k = mysqli_fetch_array($execute)) {

        ?>
          <a class="dropdown-item" href="#"><?php echo $k['nm_kategori']; ?></a>

        <?php } ?>
     </div>
     </div>
     </div>
   </div>
  </div>
	 
  <div class="row">		
    <?php
      $kd_kategori = $_GET['kd_kategori'];
      $ketkategori = '';
      if($kd_kategori!='') {
        $ketkategori = "AND tabel_barang.kd_kategori = '$kd_kategori'";
      }

      $batas = 6;
      $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
      $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;
      $previous = $halaman - 1;
      $next = $halaman + 1;
      $data = mysqli_query($koneksi, "SELECT * FROM tabel_barang,tabel_barang_gambar,tabel_stok_toko WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang $ketkategori");
      $jumlah_data = mysqli_num_rows($data);
      $total_halaman = ceil($jumlah_data / $batas);
      $data_barang = mysqli_query($koneksi, "SELECT * FROM tabel_barang,tabel_barang_gambar,tabel_stok_toko WHERE tabel_barang.kd_barang = tabel_barang_gambar.id_brg AND tabel_barang.kd_barang = tabel_stok_toko.kd_barang $ketkategori limit $halaman_awal, $batas");
      $nomor = $halaman_awal + 1;
      while ($d = mysqli_fetch_array($data_barang)) {
          // print_r($d);
          $gambars = $d['gambar'];
          $gambars = explode(",", $gambars);
          $harga = $d['hrg_jual'];

    ?>
        <div class="col-6 m-0 p-0">
            <div class="card">
              <div class="card-content">
                <div class="card-body">
                    <input type="hidden" name="kd_toko" id="kd_toko" value="<?php echo $d['kd_toko']; ?> ">                
                    <!--<span class="badge badge-pill gradient-light-warning badge-up badge-sm mt-2 mr-2 font-small-1 text-dark">NEW</span>-->
                    <img class="img-kecil" style="height: 100%;" src="../img/produk/<?php echo $gambars[0]; ?>">
                    <h5 class="my-1 font-small-3"><?php echo $d['nm_barang']; ?></h5>
                    <div class="d-flex justify-content-between">
                      <small class="float-left font-weight-bold mb-25" id="example-caption-1">Stock</small>
                      <small class="float-right  mb-25" id="example-caption-2"><sup>Rp.</sup><?php echo number_format($harga, 0, ",", "."); ?></small>
                    </div>

                    <div class="progress progress-bar-success mb-1">
                      <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="95" aria-valuemax="100" style="width:95%" aria-describedby="example-caption-2"></div>
                    </div>      

                    <div class="btn-group" style="width:100%;">

                      <a href="?menu=product&kd_barang=<?php echo $d['kd_barang']; ?>" class="btn btn-sm btn-icon gradient-light-success white"><i class="fa-solid fa-book-open-reader"></i></a>
                      <a href="?menu=cart" class="btn btn-sm btn-icon gradient-light-danger white"><i class="fa-solid fa-cart-arrow-down"></i></a>    
               
                    </div>
                </div>
              </div>
            </div>  
        </div> 

    <?php } ?>
 
	  
                        
 </div><!---------ROW---------> 
</section>

<section id="ecommerce-pagination">
   <div class="row">
     <div class="col-sm-12">
       <nav aria-label="Page navigation example">
         <ul class="pagination justify-content-center mt-2">
           <li class="page-item prev-item"><a class="page-link" href="#"></a></li>
           <li class="page-item active"><a class="page-link" href="#">1</a></li>
           <li class="page-item next-item"><a class="page-link" href="#"></a></li>
         </ul>
       </nav>
      </div>
    </div>
</section>
  </div>
</div>

 </div>
</div>