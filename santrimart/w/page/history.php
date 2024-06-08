<style type="text/css">
  .dataTables_scrollHeadInner, div.dataTables_scrollHead table.dataTable, div.dataTables_scrollBody table {
    width: 100%!important;
  }
</style>
<div class="card mt-2"> 
  <div class="content-wrapper">
   <div class="content-detached content-right">
    <div class="content-body">
	 <div class="divider">
		<div class="divider-text">Riwayat Transaksi</div>
	 </div>
                    
<div class="shop-content-overlay"></div>
<!-- Centered Pills Start -->
 <section id="centered-pills"> 
    <ul class="nav nav-pills nav-active-bordered-pill justify-content-center">
       <li class="nav-item mb-1 mr-1">
         <a class="nav-link active btn btn-icon rounded-0" id="all-tab" data-toggle="pill" href="#all-center" aria-expanded="true"><i class="fa-solid fa-clipboard-check"></i></a>
       </li>
        <?php
          $ketQuery   = "SELECT * FROM tabel_pembelian_status";
          $executeSat = mysqli_query($koneksi, $ketQuery);
          $statusOrder = [];
          while ($b = mysqli_fetch_array($executeSat)) {

        ?>     
            <li class="nav-item mb-1 mr-1">
              <a class="nav-link btn btn-icon rounded-0" id="<?php echo $b['kd_pembelian_status']; ?>-tab" data-toggle="pill" href="#<?php echo $b['kd_pembelian_status']; ?>" aria-expanded="false"><i class="<?php echo $b['icon']; ?>"></i></a>
            </li>

        <?php
          }
        ?>	
       
    </ul>
    <hr class="my-1"> 
	  <div class="tab-content m-0 p-0">   
			<div role="tabpanel" class="tab-pane active" id="all-center" aria-labelledby="all-tab" aria-expanded="true"> 
                 
         <div class="card-header">
            <h4 class="card-title">Semua Riwayat</h4>
         </div>
         <div class="table-responsive">
           <table class="table nowrap scroll-horizontal-vertical">
             <thead>
               <tr>
                  <th class="font-small-1">Faktur</th>
                  <th class="font-small-1">Nominal</th>
                  <th class="font-small-1">Status</th>
               </tr>
            </thead>
            <tbody>
            <?php
              $id_user = $_SESSION['id_user'];
              $ketQuery   = "SELECT * FROM tabel_pembelian as p, tabel_pembelian_status as ps, tabel_member as a WHERE p.status = ps.kd_pembelian_status and p.id_user = a.id_user and a.id_user = '$id_user' order by p.tgl_pembelian desc";
              $executeSat = mysqli_query($koneksi, $ketQuery);
              while ($b   = mysqli_fetch_array($executeSat)) {
              $no_faktur  = isset($b['no_faktur_pembelian']) ? $b['no_faktur_pembelian'] : '';


            ?>
               <tr>
                 <td class="font-small-3">
                  <strong><?= $b['no_faktur_pembelian'] ?></strong><br>
	                <p class="text-italic font-small-1"><i class="fa-regular fa-clock"></i><?= $b['tgl_pembelian'] ?></p>
                 </td>
                 <td class="font-small-1"><sup>Rp. </sup><?= number_format($b['total_biaya'], 0, ",", "."); ?></td>
                 <td class="font-small-1"><?= $b['nm_pembelian_status']; ?></td>
               </tr> 
            <?php } ?>
            </tbody>
          </table>
        </div>
      </div><!-- TAB ALL -->
            
      <?php
        $ketQueryc   = "SELECT * FROM tabel_pembelian_status";
        $executeSatc = mysqli_query($koneksi, $ketQueryc);
        while ($bc = mysqli_fetch_array($executeSatc)) {

      ?>
          <div class="tab-pane" id="<?php echo $bc['kd_pembelian_status']; ?>" role="tabpanel" aria-labelledby="<?php echo $bc['kd_pembelian_status']; ?>-tab" aria-expanded="false">

               <div class="card-header">
                  <h4 class="card-title"><?php echo $bc['nm_pembelian_status']; ?></h4>
               </div>
               <div class="table-responsive">
                 <table class="table nowrap scroll-horizontal-vertical">
                   <thead>
                     <tr>
                        <th class="font-small-1">Faktur</th>
                        <th class="font-small-1">Nominal</th>
                        <th class="font-small-1">Status</th>
                     </tr>
                  </thead>
                  <tbody>
                  <?php
                    $status = $bc['kd_pembelian_status'];

                    $id_user = $_SESSION['id_user'];
                    $ketQuery   = "SELECT * FROM tabel_pembelian as p, tabel_pembelian_status as ps, tabel_member as a WHERE p.status = ps.kd_pembelian_status and p.id_user = a.id_user and a.id_user = '$id_user' and p.status='$status' order by p.tgl_pembelian desc";
                    $executeSat = mysqli_query($koneksi, $ketQuery);
                    while ($b   = mysqli_fetch_array($executeSat)) {
                    $no_faktur  = isset($b['no_faktur_pembelian']) ? $b['no_faktur_pembelian'] : '';


                  ?>
                     <tr>
                       <td class="font-small-3">
                        <strong><?= $b['no_faktur_pembelian'] ?></strong><br>
                        <p class="text-italic font-small-1"><i class="fa-regular fa-clock"></i><?= $b['tgl_pembelian'] ?></p>
                       </td>
                       <td class="font-small-1"><sup>Rp. </sup><?= number_format($b['total_biaya'], 0, ",", "."); ?></td>
                       <td class="font-small-1"><?= $b['nm_pembelian_status']; ?></td>
                     </tr> 
                  <?php } ?>
                  </tbody>
                </table>
              </div>

          </div>
      <?php } ?>
			  
    </div>

 </section>
<!-- Centered Pills End -->
		
		
    
 
   </div>
  </div>
 </div>
</div>