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
				
				<div class="btn  gradient-light-primary btn-icon text-center btn-kecil" onclick="location.href = 'index.php?menu=master_user&akses=<?php echo $_SESSION['akses']; ?>';">	
					<button type="button" class="btn btn-icon btn-white">
						<i class="fa-solid fa-id-badge"></i>
					</button>
					<h5 class="font-small-1 pt-1">USER</h5>
				 </div>
					
				 <div class="btn  gradient-light-primary btn-icon text-center btn-kecil" onclick="location.href = 'index.php?menu=product';">	
					<button type="button" class="btn btn-icon btn-white">
						<i class="fa-solid fa-box-open"></i>
					</button>
					<h5 class="font-small-1 pt-1">PRODUK</h5>
				  </div>

				  <div class="btn  gradient-light-primary btn-icon text-center btn-kecil" onclick="location.href = 'index.php?menu=info';">
					<button type="button" class="btn btn-icon btn-white">
						<i class="fa-solid fa-newspaper"></i>
					</button>
					<h5 class="font-small-1 pt-1">WHOLESALE</h5>
				  </div>

				 <div class="btn  gradient-light-primary btn-icon text-center btn-kecil" onclick="location.href = 'index.php?menu=retur';">
					<button type="button" class="btn btn-icon btn-white">
						<i class="fa-solid fa-recycle"></i>
					</button>
					<h5 class="font-small-1 pt-1">RETURN</h5>
				  </div> 	

				  <div class="btn  gradient-light-primary btn-icon text-center btn-kecil" onclick="location.href = 'index.php?menu=sales';">		
					<button type="button" class="btn btn-icon btn-white">
						<i class="fa-solid fa-paste"></i>
					</button>
					<h5 class="font-small-1 pt-1">L. PENJUALAN</h5>
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
		                        <div class="row">
		                            <div class="col-lg-4 col-sm-6 col-12">
				                      	<div class="card">
				                          	<div class="card-header d-flex flex-column align-items-start pb-0">
				                              	<div class="avatar bg-rgba-primary p-50 m-0">
				                                  	<div class="avatar-content">
				                                      	<i class="feather icon-users text-primary font-medium-5"></i>
				                                  	</div>
				                              	</div>
				                              	<h2 class="text-bold-700 mt-1">92.6k</h2>
				                              	<p class="mb-0">Pendaftaran Member</p>
				                          	</div>
				                          	<div class="card-content">
				                              	<div id="line-area-chart-1"></div>
				                          	</div>
				                      	</div>
				                  	</div>

				                  	<div class="col-lg-4 col-sm-6 col-12">
				                      	<div class="card">
				                          	<div class="card-header d-flex flex-column align-items-start pb-0">
				                              	<div class="avatar bg-rgba-success p-50 m-0">
				                                  	<div class="avatar-content">
					                                	<i class="feather icon-credit-card text-success font-medium-5"></i>
				                                  	</div>
				                              	</div>
				                              	<h2 class="text-bold-700 mt-1">97.5k</h2>
				                              	<p class="mb-0">Transaksi</p>
				                          	</div>

				                          	<div class="card-content">
				                              	<div id="line-area-chart-2"></div>
				                          	</div>
				                      	</div>
				                  	</div>

				                  	<div class="col-lg-4 col-sm-6 col-12">
				                      	<div class="card">
				                          	<div class="card-header d-flex flex-column align-items-start pb-0">
				                              	<div class="avatar bg-rgba-danger p-50 m-0">
				                                  	<div class="avatar-content">
				                                      	<i class="fas fa-truck-loading font-medium-5"></i>
				                                  	</div>
				                              	</div>
				                              	<h2 class="text-bold-700 mt-1">36%</h2>
				                              	<p class="mb-0">Sirkulasi Produk</p>
				                          	</div>

				                          	<div class="card-content">
				                              	<div id="line-area-chart-3"></div>
				                          	</div>
				                      	</div>
				                  	</div>
		                        </div>
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

