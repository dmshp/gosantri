<?php include "../inc/koneksi.php";
$a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_toko")); 
?>


<style type="text/css">

    .pt-5, .py-5 {
        padding-top: 0rem !important;
    }

    .round {
        border-radius: 5rem;
        margin-bottom: 15px;
        margin-top: 11px;
        padding: 2px;
        border-color: #323030;
        border-width: 2px;
        border-style: solid;
    }
    
    .nama-user{
      font-size: 12px;
      animation: blink-animation 1s steps(3, start) infinite;
      -webkit-animation: blink-animation 1s steps(3, start) infinite;
    }

    .text-user{
      color: #df0a0a;
      animation: blink-animation 1s steps(3, start) infinite;
      -webkit-animation: blink-animation 1s steps(3, start) infinite;
    }

    .text-name{
      animation: blink-animation 1s steps(3, start) infinite;
      -webkit-animation: blink-animation 1s steps(3, start) infinite;
    }

    h3, .h3 {
        font-size: 2.51rem;
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

<section id="profile-info">
 <div class="row">	
  <div class="col-12">
   <div class="card">
    <div class="card-body">
        <div class="row p-1">   
			
		  	<!-- <div class="btn gradient-light-primary btn-icon btn-sedang text-center" data-toggle="modal" data-target="#bottom_modal">	
				<button type="button" class="btn btn-icon btn-white">
					<i class="fa-solid fa-file-invoice"></i>
				</button>
				<h5 class="font-small-1 pt-1">Pemerintah kabupaten Pesisir Barat</h5>
		  	</div><br> -->
			
			<!-- ==================================================== -->

			<div class="modal modal-bottom fade" id="bottom_modal" tabindex="-1" role="dialog" aria-labelledby="bottom_modal">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title">Bottom Modal Title</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-right: 1.2rem">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>
			      </div>
			      <div class="modal-footer modal-footer-fixed d-none">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			        <button type="button" class="btn btn-primary">Save changes</button>
			      </div>
			    </div>
			  </div>
			</div>			
			
		
		 	<div class="col-12">	
		  		<div class="divider divider-info">
              		<div class="divider-text"><h4>PILIH MENU</h4></div>
          		</div>
		  	</div>	
			
			<center>
				
				<div class="btn  gradient-light-primary btn-icon text-center btn-kecil" onclick="location.href = 'index.php?menu=home';">	
					<button type="button" class="btn btn-icon btn-white">
						<i class="fa-solid fa-dashboard"></i>
					</button>
					<h5 class="font-small-1 pt-1">MENU</h5>
				</div>

				<div class="btn  gradient-light-primary btn-icon text-center btn-kecil" onclick="location.href = 'index.php?menu=home_view';">	
					<button type="button" class="btn btn-icon btn-white">
						<i class="fa-solid fa-home"></i>
					</button>
					<h5 class="font-small-1 pt-1">BERANDA</h5>
				</div>
					
				 <div class="btn  gradient-light-primary btn-icon text-center btn-kecil" onclick="location.href = 'index.php?menu=product';">	
					<button type="button" class="btn btn-icon btn-white">
						<i class="fa-solid fa-server"></i>
					</button>
					<h5 class="font-small-1 pt-1">PRODUK</h5>
				  </div>

				  <div class="btn  gradient-light-primary btn-icon text-center btn-kecil" onclick="location.href = 'index.php?menu=retur';">
					<button type="button" class="btn btn-icon btn-white">
						<i class="fa-solid fa-recycle"></i>
					</button>
					<h5 class="font-small-1 pt-1">RETURN</h5>
				  </div>

				  <div class="btn  gradient-light-primary btn-icon text-center btn-kecil" onclick="location.href = 'index.php?menu=saldo';">
					<button type="button" class="btn btn-icon btn-white">
						<i class="fa-solid fa-wallet"></i>
					</button>
					<h5 class="font-small-1 pt-1">SALDO</h5>
				  </div>

				 <div class="btn  gradient-light-primary btn-icon text-center btn-kecil" onclick="location.href = 'index.php?menu=sales';">		
					<button type="button" class="btn btn-icon btn-white">
						<i class="fa-solid fa-paste"></i>
					</button>
					<h5 class="font-small-1 pt-1">L. SALES</h5>
				  </div>

				  <div class="btn  gradient-light-primary btn-icon text-center btn-kecil" onclick="location.href = 'index.php?menu=bonus';">		
					<button type="button" class="btn btn-icon btn-white">
						<i class="fa-solid fa-balance-scale"></i>
					</button>
					<h5 class="font-small-1 pt-1">L. BONUS</h5>
				  </div> 

				  <div class="btn  gradient-light-primary btn-icon text-center btn-kecil" onclick="location.href = 'index.php?menu=balance';">		
					<button type="button" class="btn btn-icon btn-white">
						<i class="fa-solid fa-balance-scale"></i>
					</button>
					<h5 class="font-small-1 pt-1">L. LABA</h5>
				  </div> 

				  <div class="btn  gradient-light-primary btn-icon text-center btn-kecil" onclick="location.href = 'index.php?menu=stock';">		
					<button type="button" class="btn btn-icon btn-white">
						<i class="fa-solid fa-clipboard-list"></i>
					</button>
					<h5 class="font-small-1 pt-1">L. STOCK</h5>
				  </div>

			</center>
		  	
                                
       </div>             
                            
     </div>             
</section>

				<?php  $idUser = $_SESSION['id_user'];
                   $saldo = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(jumlah) FROM tabel_saldo WHERE id_user = $idUser "));

                   $pengeluaran = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(pengeluaran) FROM tabel_saldo WHERE id_user = $idUser "));

                   $sisa_saldo = $saldo[0] - $pengeluaran[0];
                ?>
				<!-- Multiple Slides Per View swiper start -->
                <section id="component-swiper-multiple">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-12">	
		  						<div class="divider divider-info m-0 p-0">
              						<div class="divider-text"><h4>INFORMASI</h4></div>
          						</div>
							</div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <!-- <div class="col-lg-8 col-md-12 col-sm-12"> -->
			                        <div class="row">
			                            <div class="col-lg-4 col-md-12 col-sm-12">
			                                <div class="card mb-1">
			                                    <div class="card-body text-center">
			                                        <h4 class="text-bold-700 text-uppercase mt-2"><i class="fas fa-user"></i> &nbsp;
			                                            <i>DATA DIRI</i>
			                                        </h4><hr>
			                                        <span>
			                                            <img class="round" src="../img/toko/<?= $foto ?>" onerror="this.src='../img/user/user.jpg';" height="100" width="100">
			                                        </span><br>
			                                        <span><?php echo $_SESSION['nm_user'];?></span><br>
			                                        <span class="user-status text-name" style="color: #ed696a; margin-bottom: 10px; margin-top: 10px;">
			                                            <i><?php echo $_SESSION['email_user'];?></i>
			                                        </span>
			                                    </div>
			                                </div>
			                            </div>
			                            <div class="col-lg-4 col-md-12 col-sm-12">
			                                <div class="card mb-1">
			                                    <div class="card-body text-center">
			                                        <h4 class="text-bold-700 text-uppercase mt-2"><i class="fas fa-wallet"></i> Saldo</h4><hr>
			                                        <h3 class="text-danger">Rp.<?php echo number_format($sisa_saldo, 0, ",", "."); ?></h3>
			                                        <a href="index.php?menu=saldo" title="Ayo Tambah Saldo Sekarang..." class="btn btn-success mb-3">Tambah</a>
			                                    </div>
			                                </div>
			                            </div>
			                            <div class="col-lg-4 col-md-12 col-sm-12">
				                            <div class="card pt-0 mt-2 shadow-none" style="background:none; height: 70%;">
				                                <div id="carousel-contoh" class="carousel slide" data-ride="carousel">
				                                    <ol class="carousel-indicators">
				                                        <li data-target="#carousel-contoh" data-slide-to="0" class="active"></li>
				                                        <li data-target="#carousel-contoh" data-slide-to="1"></li>
				                                        <li data-target="#carousel-contoh" data-slide-to="2"></li>
				                                    </ol>
				                                    <div class="carousel-inner" role="listbox">
				                                        <div class="carousel-item active">
				                                            <img class="img-fluid rounded" src="../img/iklan/slide-2.png">
				                                        </div>

				                                        <div class="carousel-item">
				                                            <img class="img-fluid rounded" src="../img/iklan/slide-3.jpg">
				                                        </div>
				                                        <div class="carousel-item">
				                                            <img class="img-fluid rounded" src="../img/iklan/slide-4.jpg">
				                                        </div>
				                                    </div>
				                                    <a class="carousel-control-prev" href="#carousel-contoh" role="button"
				                                        data-slide="prev">
				                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				                                        <span class="sr-only">Previous</span>
				                                    </a>
				                                    <a class="carousel-control-next" href="#carousel-contoh" role="button"
				                                        data-slide="next">
				                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
				                                        <span class="sr-only">Next</span>
				                                    </a>
				                                </div>
				                            </div>
				                        </div>
			                        </div>
			                    <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </section>
<!-- Multiple Slides Per View swiper ends -->
	  
	  
<!-- Multiple Slides Per View swiper start -->
                <section id="component-swiper-multiple" style="display: none;">
                    <div class="card">
                        <div class="card-header">
                            <div class="col-12">	
		  						<div class="divider divider-info m-0 p-0">
              						<div class="divider-text"><h4>KATEGORI</h4></div>
          						</div>
							</div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="swiper-multiple swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide" style="margin: -20px"> 
											<img class="img-fluid img-kecil" src="../img/ads/1.jpg">
                                        </div>
                                         <div class="swiper-slide" style="margin: -20px">  
											<img class="img-fluid img-kecil" src="../img/ads/2.jpg">
                                        </div>
                                        <div class="swiper-slide" style="margin: -20px"> 
											<img class="img-fluid img-kecil" src="../img/ads/1.jpg">
                                        </div>
                                        <div class="swiper-slide" style="margin: -20px"> 
											<img class="img-fluid img-kecil" src="../img/ads/2.jpg">
                                        </div>
                                        <div class="swiper-slide" style="margin: -20px"> 
											<img class="img-fluid img-kecil" src="../img/ads/1.jpg">
                                        </div>
                                    </div>
                                    <div class="swiper-pagination"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
<!-- Multiple Slides Per View swiper ends -->

