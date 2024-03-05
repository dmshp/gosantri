<!-- <div class="content-body mt-1">
  <div class="card"> 
   <div class="card-content p-1">            
	<div class="row">
					
		<div class="col-6 p-1">
		  <div class="btn bg-gradient-warning btn-block">
			<i class="fa-solid fa-boxes-stacked fa-2x mb-1"></i>
			<span class="badge badge-pill badge-danger badge-large badge-up mt-2 mr-3">4</span>
			<span class="text-white text-uppercase dark">Produk</span>
		   </div>
		</div>
		
		<div class="col-6 p-1">
		  <div class="btn bg-gradient-warning btn-block">
			<i class="fa-solid fa-users-line fa-2x mb-1"></i>
			<span class="badge badge-pill badge-danger badge-large badge-up mt-2 mr-3">4</span>
			<span class="text-white text-uppercase dark">Merchant</span>
		   </div>
		</div>
		
		<div class="col-6 p-1">
		  <div class="btn bg-gradient-warning btn-block">
			<i class="fa-solid fa-money-bill-trend-up fa-2x mb-1"></i>
			<span class="badge badge-pill badge-danger badge-large badge-up mt-2 mr-3">4850k</span>
			<span class="text-white text-uppercase dark">Komisi</span>
		   </div>
		</div>
		
		<div class="col-6 p-1">
		  <div class="btn bg-gradient-warning btn-block">
			<i class="fa-solid fa-globe fa-2x mb-1"></i>
			<span class="badge badge-pill badge-danger badge-large badge-up mt-2 mr-3">4000k</span>
			<span class="text-white text-uppercase dark">WD</span>
		   </div>
		</div>
		
		<div class="col-6 p-1">
		  <div class="btn bg-gradient-warning btn-block">
			<i class="fa-solid fa-laptop fa-2x mb-1"></i>  
			<span class="badge badge-pill badge-danger badge-large badge-up mt-2 mr-3">450k</span>
			<span class="text-white text-uppercase dark">Hit</span>
		   </div>
		</div>
		
		<div class="col-6 p-1">
		  <div class="btn bg-gradient-warning btn-block">
			<i class="fa-solid fa-user-gear fa-2x mb-1"></i>  
			<span class="badge badge-pill badge-danger badge-large badge-up mt-2 mr-3">7</span>
			<span class="text-white text-uppercase dark">Lead</span>
		   </div>
		</div>
					
					
					
									
	 </div>
	</div>
  </div>
			
<div class="row">
		  <div class="col-12"> 
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
		  		  	
       </div>
</div> -->

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
            <img class="img-kecil" src="images/produk/3.jpg">
              <h5 class="my-1 font-small-3">Topi Santri</h5>
            <div class="d-flex justify-content-between">
              <small class="float-left font-weight-bold mb-25" id="example-caption-1">Stock</small>
              <small class="float-right  mb-25" id="example-caption-2"><sup>Rp.</sup>15000</small>
            </div>
          <!--------STATUS STOK---------------------------->
		  <div class="progress progress-bar-success mb-1">
            <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="95" aria-valuemax="100" style="width:95%" aria-describedby="example-caption-2"></div>
          </div>		  
		  <!--------STATUS STOK---------------------------->	   
			 <div class="btn-group">
				 <?php echo "<a href='#edit_produk' data-toggle='modal' data-id='#' class='btn block btn-icon gradient-light-info white'><i class='fa-regular fa-eye'></i> View</a>"; ?>	 
				 <a href="?menu=edit" class="btn block btn-icon gradient-light-success white">
				 <i class="fa-solid fa-pen-to-square"></i> Edit</a>
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
            <img class="img-kecil" src="images/produk/4.jpg">
              <h5 class="my-1 font-small-3">Kaos Polo Santri</h5>
            <div class="d-flex justify-content-between">
              <small class="float-left font-weight-bold mb-25" id="example-caption-1">Stock</small>
              <small class="float-right  mb-25" id="example-caption-2"><sup>Rp.</sup>80000</small>
            </div>
          <!--------STATUS STOK---------------------------->		 
		  <div class="progress progress-bar-info mb-1">
            <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="75" aria-valuemax="100" style="width:75%" aria-describedby="example-caption-2"></div>
          </div>		  	   
		  <!--------STATUS STOK---------------------------->	   
			  <div class="btn-group">
				 <?php echo "<a href='#edit_produk' data-toggle='modal' data-id='#' class='btn block btn-icon gradient-light-info white'><i class='fa-regular fa-eye'></i> View</a>"; ?>	 
				 <a href="?menu=edit" class="btn block btn-icon gradient-light-success white">
				 <i class="fa-solid fa-pen-to-square"></i> Edit</a>
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
            <img class="img-kecil" src="images/produk/5.jpg">
              <h5 class="my-1 font-small-3">Kaos Oblong Santri</h5>
            <div class="d-flex justify-content-between">
              <small class="float-left font-weight-bold mb-25" id="example-caption-1">Stock</small>
              <small class="float-right  mb-25" id="example-caption-2"><sup>Rp.</sup>65000</small>
            </div>
          <!--------STATUS STOK---------------------------->		  
		  <div class="progress progress-bar-danger mb-1">
            <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="15" aria-valuemax="100" style="width:15%" aria-describedby="example-caption-2"></div>
          </div>	   
		  <!--------STATUS STOK---------------------------->			 
			 <div class="btn-group">
				 <?php echo "<a href='#edit_produk' data-toggle='modal' data-id='#' class='btn block btn-icon gradient-light-info white'><i class='fa-regular fa-eye'></i> View</a>"; ?>	 
				 <a href="?menu=edit" class="btn block btn-icon gradient-light-success white">
				 <i class="fa-solid fa-pen-to-square"></i> Edit</a>
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
				 <?php echo "<a href='#edit_produk' data-toggle='modal' data-id='#' class='btn block btn-icon gradient-light-info white'><i class='fa-regular fa-eye'></i> View</a>"; ?>	 
				 <a href="?menu=edit" class="btn block btn-icon gradient-light-success white">
				 <i class="fa-solid fa-pen-to-square"></i> Edit</a>
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


