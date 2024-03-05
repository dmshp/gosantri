  <div class="content-body mt-1">
      <div id="user-profile">
        <div class="row">
		
		  <div class="col-6"> 
			 <div class="card">
               <div class="card-header d-flex flex-column align-items-start pb-0">
                 <div class="avatar bg-rgba-primary p-25 m-0">
                   <div class="avatar-content">                      
					  <i class="fa-solid fa-handshake-simple text-primary font-medium-5"></i>
                   </div>
                 </div>
                 <h5 class="text-bold-300 mt-1 mb-25">92.6k (Total Transaksi)</h5>
                 <p class="mb-0">&#931; Transaksi</p>
                </div>
               <div class="card-content">
                 <div id="subscribe-gain-chart"></div>
               </div>
             </div>			  
		  </div>
		  <div class="col-6"> 
			<div class="card">
              <div class="card-header d-flex flex-column align-items-start pb-0">
                 <div class="avatar bg-rgba-warning p-25 m-0">
                   <div class="avatar-content">
					 <i class="fa-solid fa-boxes-packing text-warning font-medium-5"></i>  
                    </div>
                  </div>
                  <h5 class="text-bold-300 mt-1 mb-25">97.5 (Total Barang)</h5>
                  <p class="mb-0"><i class="fa-solid fa-arrows-spin"></i> Sirkulasi</p>
              </div>
              <div class="card-content">
                <div id="orders-received-chart"></div>
              </div>
            </div>			  
		  </div>
		   
          <div class="col-12">                
			   <div class="justify-content-end align-items-center profile-header-nav">
                  <a href="#" class="text-capitalize text-left font-small-1 badge badge-pill block bg-transparent text-dark p-1" style="border: solid 1px; border-color: #1C993E; border-radius: 100px; padding: 5px 40px 5px 5px;"><i class="fa-solid fa-volume-high text-danger"></i> &nbsp; notifikasi <i class="fa-solid fa-circle-info float-right"></i></a>
				</div>
          </div>
		  	
       </div>
	</div>
</div>

<section id="profile-info" class="mt-2">
    <div class="card">
      <div class="card-header">                           
		<h4>Produk (nama akun)</h4> 
		<p>Urutan produk berdasarkan <b>Terlaris</b></p>
      </div>
	<div class="row">	
		
<!------------------***PRODUK***----------------------------------->  
	 <div class="col-6">
   <div class="card">
         <div class="card-content">
           <div class="card-body">
           <span class="badge badge-pill gradient-light-warning badge-up badge-sm mt-2 mr-2 font-small-1 text-dark">NEW</span>
            <img class="img-kecil" src="images/produk/5.jpg">
              <h5 class="my-1 font-small-3">Kaos Oblong Santri</h5>
            <div class="d-flex justify-content-between">
              <small class="float-left font-weight-bold mb-25" id="example-caption-1">Stock</small>
              <small class="float-right  mb-25" id="example-caption-2"><sup>Rp.</sup>65000</small>
            </div>
          <!--------STATUS STOK---------------------------->
		  <div class="progress progress-bar-success mb-1">
            <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="95" aria-valuemax="100" style="width:95%" aria-describedby="example-caption-2"></div>
          </div>		  
		  <!--------STATUS STOK---------------------------->	   
			 <div class="btn-group">
				 <?php echo "<a href='#edit_produk' data-toggle='modal' data-id='#' class='btn block btn-icon gradient-light-info white'><i class='fa-regular fa-eye'></i> view</a>"; ?>	 
				 <a href="?menu=edit" class="btn block btn-icon gradient-light-success white">
				 <i class="fa-solid fa-pen-to-square"></i> edit</a>
			 </div>  
         </div>
        </div>
      </div>	
   </div> 
<!------------------***PRODUK***----------------------------------->  	  
   <div class="col-6">
   <div class="card">
         <div class="card-content">
           <div class="card-body">
            <img class="img-kecil" src="images/produk/6.jpg">
              <h5 class="my-1 font-small-3">Jaket Sport Santri</h5>
            <div class="d-flex justify-content-between">
              <small class="float-left font-weight-bold mb-25" id="example-caption-1">Stock</small>
              <small class="float-right  mb-25" id="example-caption-2"><sup>Rp.</sup>155000</small>
            </div>
          <!--------STATUS STOK---------------------------->		 
		  <div class="progress progress-bar-info mb-1">
            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="75" aria-valuemax="100" style="width:75%" aria-describedby="example-caption-2"></div>
          </div>		  	   
		  <!--------STATUS STOK---------------------------->	   
			  <div class="btn-group">
				 <?php echo "<a href='#edit_produk' data-toggle='modal' data-id='#' class='btn block btn-icon gradient-light-info white'><i class='fa-regular fa-eye'></i> view</a>"; ?>	 
				 <a href="?menu=edit" class="btn block btn-icon gradient-light-success white">
				 <i class="fa-solid fa-pen-to-square"></i> edit</a>
			 </div> 
         </div>
        </div>
      </div>	
   </div>	  
 <!------------------***PRODUK***-----------------------------------> 	
  <div class="col-6">
  <div class="card">
         <div class="card-content">
           <div class="card-body">
            <img class="img-kecil" src="images/produk/3.jpg">
              <h5 class="my-1 font-small-3">Topi Santri</h5>
            <div class="d-flex justify-content-between">
              <small class="float-left font-weight-bold mb-25" id="example-caption-1">Stock</small>
              <small class="float-right  mb-25" id="example-caption-2"><sup>Rp.</sup>15000</small>
            </div>
          <!--------STATUS STOK---------------------------->		  
		  <div class="progress progress-bar-danger mb-1">
            <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="15" aria-valuemax="100" style="width:15%" aria-describedby="example-caption-2"></div>
          </div>	   
		  <!--------STATUS STOK---------------------------->			 
			 <div class="btn-group">
				 <?php echo "<a href='#edit_produk' data-toggle='modal' data-id='#' class='btn block btn-icon gradient-light-info white'><i class='fa-regular fa-eye'></i> view</a>"; ?>	 
				 <a href="?menu=edit" class="btn block btn-icon gradient-light-success white">
				 <i class="fa-solid fa-pen-to-square"></i> edit</a>
			 </div> 
         </div>
        </div>
      </div>	
   </div>
		
   </div>
		
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
</section>


	  
<!-- Multiple Slides Per View swiper start -->
                <section id="component-swiper-multiple">
                    <div class="card">
                        <div class="card-header">                           
		  					<h4>Ayo kepoin layanan kami</h4> 
							<p>Pengertian serta deskripsi layanan <b>SantriGo</b></p>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="swiper-multiple swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide" style="margin: -20px"> 
											<a href="?menu=detail">
											<img class="img-fluid img-kecil" src="images/ads/1.jpg">
											</a>
                                        </div>
                                         <div class="swiper-slide" style="margin: -20px">  
											<img class="img-fluid img-kecil" src="images/ads/2.jpg">
                                        </div>
                                        <div class="swiper-slide" style="margin: -20px"> 
											<a href="?menu=detail">
											<img class="img-fluid img-kecil" src="images/ads/1.jpg">
											</a>
                                        </div>
                                        <div class="swiper-slide" style="margin: -20px"> 
											<img class="img-fluid img-kecil" src="images/ads/2.jpg">
                                        </div>
                                        <div class="swiper-slide" style="margin: -20px"> 
											<a href="?menu=detail">
											<img class="img-fluid img-kecil" src="images/ads/1.jpg">
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


<!--============================ VIEW PRODUCT ============================-->
<div class="modal fade" id="edit_produk" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
     <div class="modal-content" style="max-width: 800px;">
       <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel16">View Product</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
       </div>
       <div class="modal-body">
          <div class="hasil-data"></div>                                                      
       </div>
       <div class="modal-footer"></div>
     </div>
   </div>
  </div>


