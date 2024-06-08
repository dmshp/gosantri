<style type="text/css">
	
	.nama-user{
	    font-size: 15px;
	    animation: blink-animation 1.1s steps(3, start) infinite;
	    -webkit-animation: blink-animation 1.1s steps(3, start) infinite;
	}

	.text-user{
	    color: #86ff01;
	    animation: blink-animation 1s steps(3, start) infinite;
	    -webkit-animation: blink-animation 1s steps(3, start) infinite;
	    text-shadow: 0 0 5px #86ff01, 0 0 10px #86ff01, 0 0 20px #86ff01, 0 0 45px #86ff01, 0 0 40px #86ff01;
	}

	@keyframes blink-animation {
	    to {
	      visibility: hidden;
	    }
	}

	@-webkit-keyframes blink-animation {
	    to {
	      visibility: hidden;
	    }
	}

</style>

 <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
 <!-- BEGIN: Footer-->
    <footer class="footer footer-static fixed-footer d-xl-none" style="background:<?php echo $headerfooter;?>;position:fixed;bottom:0;width:100%;z-index:100">
      
		<div class="row mt-0 pt-0">
	<?php if ($_SESSION['akses'] == 'admin') {	?>
         <div class="col-4 text-center">
         	<a href="index.php?menu=ipos" style="<?= $menu == 'ipos' ? 'color: '.$tombol : ''; ?>">
         		<i class="fas fa-cash-register font-medium-1"></i><br> POS
         	</a>
         </div>
         <div class="col-4 text-center">
         	<a href="index.php?menu=order" style="<?= $menu == 'order' ? 'color: '.$tombol : ''; ?>">
         		<span class="badge badge-pill badge-info font-small-2">1</span>
         		<i class="fas fa-receipt font-medium-1"></i><br> Order
         	</a>
         </div>
         <div class="col-4 text-center">
         	<a href="index.php?menu=profile" style="<?= $menu == 'profile' ? 'color: '.$tombol : ''; ?>">
         		<i class="fas fa-user-edit font-medium-1"></i><br> User
         	</a>
         </div>
	<?php } ?>
			
	<?php if ($_SESSION['akses'] == 'merchant') {	?>
         <div class="col-4 text-center">
         	<a href="index.php?menu=ipos" style="<?= $menu == 'ipos' ? 'color: '.$tombol : ''; ?>">
         		<i class="fas fa-cash-register font-medium-1"></i><br> POS
         	</a>
         </div>
         <div class="col-4 text-center">
         	<a href="index.php?menu=order" style="<?= $menu == 'orer' ? 'color: '.$tombol : ''; ?>">
         		<!-- <span class="badge badge-pill badge-info font-small-2">1</span> -->
         		<i class="fas fa-receipt font-medium-1"></i><br> Order
         	</a>
         </div>
         <div class="col-4 text-center">
         	<a href="index.php?menu=profile" style="<?= $menu == 'profile' ? 'color: '.$tombol : ''; ?>">
         		<i class="fas fa-user-edit font-medium-1"></i><br> User
         	</a>
         </div>
	<?php } ?>	
			
			
	<?php if ($_SESSION['akses'] == 'kurir') {	?>
         <div class="col-2 text-center">
			<a href="index.php?menu=home" style="<?= $menu == 'home' ? 'color: '.$tombol : ''; ?>">
			  <i class="fas fa-home font-medium-1" style="color:<?= $tombol;?>"></i><br> Home
			</a>
		 </div>
		 <div class="col-2 text-center">
			<a href="index.php?menu=saldo" style="<?= $menu == 'saldo' ? 'color: '.$tombol : ''; ?>">
			   <i class="fas fa-wallet font-medium-1" style="color:<?= $tombol;?>"></i><br> Saldo
			</a>
		</div>
		<div class="col-3 text-center">
		   <a href="index.php?menu=delivery" style="<?= $menu == 'delivery' ? 'color: '.$tombol : ''; ?>">
		   	<!-- <span class="badge badge-pill badge-danger font-small-2 nama-user">Baru</span> -->
			<i class="fas fa-map-marker-alt" style="color:<?= $tombol;?>"></i><br> Delivery
		   </a>
		</div>
		<div class="col-3 text-center">
		   <a href="index.php?menu=laporan" style="<?= $menu == 'laporan' ? 'color: '.$tombol : ''; ?>">
			<i class="fas fa-list-alt font-medium-1" style="color:<?= $tombol;?>"></i><br> Laporan
		   </a>
		</div>
		<div class="col-2 text-center">
		  <a href="index.php?menu=akun" style="<?= $menu == 'akun' ? 'color: '.$tombol : ''; ?>">
			<i class="fas fa-user-edit font-medium-1" style="color:<?= $tombol;?>"></i><br> Akun
		  </a>
		</div>
	<?php } ?>	
			
	<?php if ($_SESSION['akses'] == 'member') {	?>
         <div class="col-4 text-center">
         	<a href="index.php?menu=home" style="<?= $menu == 'home' ? 'color: '.$tombol : ''; ?>">
         		<i class="fas fa-home font-medium-1"></i><br> Home
         	</a>
         </div>
         <div class="col-4 text-center">
         	<a href="index.php?menu=history" style="<?= $menu == 'history' ? 'color: '.$tombol : ''; ?>">
         		<!-- <span class="badge badge-pill badge-info font-small-2">1</span> -->
         		<i class="fas fa-receipt font-medium-1"></i><br> Order
         	</a>
         </div>
         <div class="col-4 text-center">
         	<a href="index.php?menu=profile" style="<?= $menu == 'profile' ? 'color: '.$tombol : ''; ?>">
         		<i class="fas fa-user-edit font-medium-1"></i><br> User
         	</a>
         </div>
	<?php } ?>		
			
			
        </div>
    </footer>
<!-- END: Footer-->
 <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light d-xl-block d-none" style="background:<?php echo $headerfooter;?>">
        <p class="clearfix blue-grey lighten-2 mb-0">
        <span class="float-md-left d-block d-md-inline-block mt-25">&copy; <?php echo date('Y')?> Developer by <?php echo $toko;?>
        <a class="text-bold-800 grey darken-2" href="#" target="_blank"><?php echo $toko;?></a> </span><span class="float-md-right d-none d-md-block"><img src="../img/<?php echo $logo;?>" class="img-border box-shadow-1" width="40"></span>
            <!--button class="btn btn-icon scroll-top" type="button"></button-->
        </p>
    </footer>
<!-- END: Footer-->