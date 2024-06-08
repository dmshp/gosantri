<?php 
$id_user = $_SESSION['id_user'];
//debet jika status 1, kredit jika status 1 atau status 0 saat penarikan
$kurir = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(CASE WHEN arus=0 and status=1 THEN `nominal` END) as saldo, SUM(CASE WHEN (arus=1 and status=1) or (arus=1 and status=0 and no_faktur_pembelian='') THEN `nominal` END) as wd FROM `tabel_keuangan` WHERE `id_member`=$id_user"));
$saldo = $kurir['saldo'] - $kurir['wd'];

$ketQuery = "SELECT * FROM tabel_keuangan WHERE id_member = '$id_user' order by id_keuangan DESC LIMIT 1";
$executeSat = mysqli_query($koneksi, $ketQuery);
$b = mysqli_fetch_array($executeSat);


$Query = "SELECT * FROM tabel_member WHERE id_user = '$id_user'";
$execute = mysqli_query($koneksi, $Query);
$data = mysqli_fetch_array($execute);

?>
<div class="card mt-2"> 
  <div class="content-wrapper">
   <div class="content-detached content-right">
    <div class="content-body">
	 <div class="divider">
		<div class="divider-text">Saldo Paylater Anda</div>
	 </div>
  

                    
<div class="shop-content-overlay"></div>
 
 <section id="ecommerce-products" class="grid-view">
  <div class="row">	
	<div class="col-lg-3 col-md-4 col-12">
     <div class="card">
      <div class="card-body d-flex justify-content-center align-items-center flex-column">
      <div>
       <h1 class="mb-0 text-center text-success border-bottom-primary border-2 round p-1 font-weight-bold">
		   <sup class="font-medium-2 text-dark">Rp. </sup><?= number_format($saldo, 0, ",", "."); ?></h1>
	   	   <small class="text-muted">Selalu cek saldo, demi kelancaran
			   <b>Transaksi </b>anda</small>
       <h5 class="mt-1"><span class="text-success">Transaksi Terakhir <sup>Rp. </sup><?= number_format($b['nominal'], 0, ",", "."); ?></span></h5>
      </div>
     </div>
	 <div class="btn-group">
		<button class="btn gradient-light-info white round box-shadow-1" data-toggle="modal" data-target="#deposit">
			Tambah <i class="feather icon-chevrons-right"></i></button>
		<button class="btn gradient-light-danger white round box-shadow-1" data-toggle="modal" data-target="#tarik">
			Cairkan <i class="feather icon-chevrons-right"></i></button>
		
	</div>
    <hr class="my-50">
             
		
           <form action="#"> 
			<div class="col-lg-12 col-12">
             <div class="font-small-2 mb-0">Bank Tujuan</div>
               <fieldset class="form-label-group form-group position-relative has-icon-left">
                 <input type="text" class="form-control" value="<?php echo $data['bank']; ?>">
                  <div class="form-control-position"><i class="fa-solid fa-money-check"></i></div>
               </fieldset>
            </div>
		   <div class="col-sm-6 col-12">
             <div class="font-small-2 mb-0">Atas Nama</div>
               <fieldset class="form-label-group form-group position-relative has-icon-left">
                 <input type="text" class="form-control" value="<?php echo $data['an_rekening']; ?>">
                  <div class="form-control-position"><i class="fa-solid fa-book-open-reader"></i></div>
               </fieldset>
            </div>
		   <div class="col-sm-6 col-12">
             <div class="font-small-2 mb-0">Nomer Rekening</div>
               <fieldset class="form-label-group form-group position-relative has-icon-left">
                 <input type="text" class="form-control" value="<?php echo $data['no_rekening']; ?>">
                  <div class="form-control-position"><i class="fa-solid fa-book-open"></i></div>
               </fieldset>
            </div> 
			<div class="col-sm-6 col-12 text-center">
                <button class="btn gradient-light-danger white round box-shadow-1">
			Ubah Data <i class="feather icon-chevrons-right"></i></button>                            
            </div>                                
          </form>                                 
        </div>       
      </div>
     
                        
 </div><!---------ROW---------> 
</section>
  </div>
 </div>
 </div>
</div>

<!---------=================MODAL DEPOSIT==========---------> 
<div class="modal fade text-left" id="deposit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
  <div class="modal-content gradient-light-info">
    <div class="modal-header gradient-light-info">
     <h4 class="modal-title" id="myModalLabel33">DEPOSIT SALDO</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
     <form action="#">
      <div class="modal-body">
        <label>Nominal: </label>
          <div class="form-group">
             <input type="text" placeholder="tulis nominal deposit" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Deposit Saldo</button>
      </div>
     </form>
    </div>
   </div>
  </div>
<!---------=================MODAL DEPOSIT==========---------> 




<!---------=================MODAL TARIK==========---------> 
<div class="modal fade text-left" id="tarik" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
  <div class="modal-content gradient-light-danger">
    <div class="modal-header gradient-light-danger">
     <h4 class="modal-title" id="myModalLabel33">TARIK SALDO</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
     <form action="#">
      <div class="modal-body">
        <label>Nominal: </label>
          <div class="form-group">
             <input type="text" placeholder="tulis nominal penarikan" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Tarik Saldo</button>
      </div>
     </form>
    </div>
   </div>
  </div>
<!---------=================MODAL TARIK==========---------> 