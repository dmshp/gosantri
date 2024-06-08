<?php $a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_toko LIMIT 1"));
        // var_dump($a['logo_login']); die();
?>

<div class="content-body mt-1">
      <div id="user-profile">
        <div class="row">
          <div class="col-12">
             <div class="profile-header mb-2">
                <div class="relative">
					<div class="container">
                  <div class="cover-container">                     
					  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                       <ol class="carousel-indicators">
                          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                       </ol>
                      <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                           <img class="img-fluid round" src="../img/banner/<?php echo $a['banner1'] ?>">
                        </div>
                        
						<div class="carousel-item">
                           <img class="img-fluid round" src="../img/banner/<?php echo $a['banner2'] ?>">
                        </div>
						
						<div class="carousel-item">
                           <img class="img-fluid round" src="../img/banner/<?php echo $a['banner3'] ?>">
                        </div>
                                               
                       </div>
                       <a class="carousel-control-prev" href="#carousel-example-generic" role="button" data-slide="prev">
                         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                         <span class="sr-only">Previous</span>
                       </a>
                       <a class="carousel-control-next" href="#carousel-example-generic" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                       </a>
                   </div>
                  </div>
                  
				
                </div>              
             </div>
			   <div class="justify-content-end align-items-center profile-header-nav" style="display: none;">
                  <a href="#" class="text-capitalize text-left font-small-1 badge badge-pill block bg-transparent text-dark p-1" style="border: solid 1px; border-color: #1C993E; border-radius: 100px; padding: 5px 40px 5px 5px;"><i class="fa-solid fa-volume-high text-danger"></i> &nbsp; notifikasi <i class="fa-solid fa-circle-info float-right"></i></a>
				   </div>
               </div>
          </div>
       </div>
	</div>
</div>

<section id="profile-info">
    <div class="row">	
        <div class="col-12">
            <center>
                <a class="btn btn-icon text-center btn-kecil" href="?menu=delivery">
                    <img src="../img/ico/ride.png" width="60px">
                    <h6 class="font-small-1 pt-1 text-Capitalize">SantriRide</h6>
                </a>

                <a class="btn btn-icon text-center btn-kecil" href="?menu=delivery">
                    <img src="../img/ico/car.png" width="60px">
                    <h6 class="font-small-1 pt-1 text-Capitalize">SantriCar</h6>
                </a>

                <a class="btn btn-icon text-center btn-kecil" href="?menu=delivery">
                    <img src="../img/ico/carxl.png" width="60px">
                    <h6 class="font-small-1 pt-1 text-Capitalize">SantriCarXL</h6>
                </a>
                
                <!--======================= OVERLAY =========================-->            
                <a class="btn btn-icon text-center btn-kecil" href="?menu=shop">        
                    <img src="../img/ico/food.png" width="60px">
                    <h6 class="font-small-1 pt-1 text-Capitalize">SantriFood</h6>
                </a>

                <a class="btn btn-icon text-center btn-kecil" href="?menu=delivery">
                    <img src="../img/ico/send.png" width="60px">
                    <h6 class="font-small-1 pt-1 text-Capitalize">SantriSend</h6>
                </a>
          
                <!--======================= OVERLAY =========================-->    
                <a class="btn btn-icon text-center btn-kecil" href="?menu=now">     
                    <img src="../img/ico/now.png" width="60px">
                    <h6 class="font-small-1 pt-1 text-Capitalize">SantriNow</h6>
                </a>

                <a class="btn btn-icon text-center btn-kecil" href="?menu=pay">     
                    <img src="../img/ico/pay.png" width="60px">
                    <h6 class="font-small-1 pt-1 text-Capitalize">SantriPay</h6>
                </a>
          
                <a class="btn btn-icon text-center btn-kecil" href="?menu=shop">    
                    <img src="../img/ico/mart.png" width="60px">
                    <h6 class="font-small-1 pt-1 text-Capitalize">SantriMart</h6>
                </a>

                <a class="btn btn-icon text-center btn-kecil" href="?menu=dashboard">   
                    <img src="../img/ico/affiliate.png" width="60px">
                    <h6 class="font-small-1 pt-1 text-Capitalize">Affiliate</h6>
                </a>
            </center>
        </div>             
    </div>       
</section>

<!-- centered-slides option-2 swiper start -->
<section id="component-swiper-centered-slides-2" style="display: none;">
    <div class="card">
        <div class="card-header">                            
            <h4>Terdekat dari kamu</h4> 
        </div>
        <div class="card-content">
            <div class="card-body pt-0">
                <div class="swiper-centered-slides-2 swiper-container p-1">
                    <div class="swiper-wrapper">
                        <a href="?menu=map" class="swiper-slide gradient-light-success round py-1 px-1 d-flex">
                            <div class="swiper-text">Tempat Makan</div>
                            <i class="fa-solid fa-utensils ml-50 font-medium-1"></i>
                        </a>
                        <a href="?menu=map" class="swiper-slide gradient-light-success round py-1 px-1 d-flex">
                            <div class="swiper-text">Pusat Belanja</div>
							<i class="fa-solid fa-bag-shopping ml-50 font-medium-1"></i>
                        </a>
                        <a href="?menu=map" class="swiper-slide gradient-light-success round py-1 px-1 d-flex">
                            <div class="swiper-text">Cafe Terdekat</div>
							<i class="fa-solid fa-mug-hot ml-50 font-medium-1"></i>
                        </a>
                        <a href="?menu=map" class="swiper-slide gradient-light-success round py-1 px-1 d-flex">
                            <div class="swiper-text">ATM Terdekat</div>
							<i class="fa-regular fa-credit-card ml-50 font-medium-1"></i>
                        </a>
                        <a href="?menu=map" class="swiper-slide gradient-light-success round py-1 px-1 d-flex"> 
                            <div class="swiper-text">Apotik Terdekat</div>
							<i class="fa-solid fa-notes-medical ml-50 font-medium-1"></i>
                        </a>
                        <a href="?menu=map" class="swiper-slide gradient-light-success round py-1 px-1 d-flex"> 
                            <div class="swiper-text">Rumah Sakit</div>
							<i class="fa-solid fa-hospital-user ml-50 font-medium-1"></i>
                        </a>
						<a href="?menu=map" class="swiper-slide gradient-light-success round py-1 px-1 d-flex"> 
                            <div class="swiper-text">Kantor Polisi</div>
							<i class="fa-solid fa-building-shield ml-50 font-medium-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- centered-slides option-2 swiper ends -->
	  
<!-- Multiple Slides Per View swiper start -->
<section id="component-swiper-multiple">
    <div class="card">
        <div class="card-header">                           
			<h4>Ayo kepoin layanan kami</h4> 
			<p>Pengertian serta deskripsi layanan <b>Kami</b></p>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="swiper-multiple swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" style="margin: 0px"> 
							<a href="?menu=detail">
							<img class="img-fluid img-kecil" src="../img/1.png">
							</a>
                        </div>
                        <div class="swiper-slide" style="margin: 0px">  
							<img class="img-fluid img-kecil" src="../img/2.jpg">
                        </div>
                        <div class="swiper-slide" style="margin: 0px"> 
							<a href="?menu=detail">
							<img class="img-fluid img-kecil" src="../img/1.png">
							</a>
                        </div>
                        <div class="swiper-slide" style="margin: 0px"> 
							<img class="img-fluid img-kecil" src="../img/2.jpg">
                        </div>
                        <div class="swiper-slide" style="margin: 0px"> 
							<a href="?menu=detail">
							<img class="img-fluid img-kecil" src="../img/1.png">
							</a>
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Multiple Slides Per View swiper ends -->


