<!-- BEGIN: Content-->   
     <div class="card mt-2">
       <div class="card-body p-1">
		   <div class="divider">
			 <div class="divider-text">Product</div>
		   </div>
         <div class="row">           
              <div class="col-12">
				 <a href="#" data-toggle="modal" data-target="#imagemodal">
                    <img class="img-fluid img-thumbnail" src="images/produk/1.jpg">
                      <div class="card-img-overlay overflow-hidden overlay-lighten-3">
                        <a class="card-title badge badge-up badge-danger mr-2 mt-2 round" data-toggle="modal" data-target="#xSmall">
						  <i class="fa-solid fa-pen-to-square text-white"></i>
						</a>
                      </div>
                  </a>
              </div>	  
			 <div class="col-12">				   
				<div class="text-center mt-1">	
				   <span class="font-small-3">
					   <i class="feather icon-star text-warning"></i>
					   <i class="feather icon-star text-warning"></i>
					   <i class="feather icon-star text-warning"></i>
					   <i class="feather icon-star text-warning"></i>
					   <i class="feather icon-star text-secondary"></i>
					</span>
			 	</div>
                <div class="text-center mt-1">                    
					<form>
					<fieldset class="border-warning p-1 mb-1 text-right">
					  <label>PERMINTAAN PROMOSIKAN PRODUK</label>	
						<div class="input-group mb-1 bg-warning">
						  <div class="input-group-prepend">
							<span class="input-group-text bg-warning"><i class="fa-solid fa-bullhorn"></i></span>
						  </div>
						  <input type="text" class="form-control" placeholder="Permintaan" readonly>
							<select name="" class="bg-warning">
								<option>Bantu Promosikan</option>
								<option>Batalkan Promosi</option>
							</select>
						</div>
					  </fieldset>  
						
					<fieldset>
						<div class="input-group mb-1">
						  <div class="input-group-prepend">
							<span class="input-group-text bg-primary text-white"><i class="fa-solid fa-boxes-packing"></i></span>
						  </div>
						  <input type="text" class="form-control" placeholder="Nama Barang">
						</div>
					  </fieldset>  
					
					  <fieldset>
						<div class="input-group mb-1">
						  <div class="input-group-prepend">
							<span class="input-group-text bg-primary text-white">Rp</span>
						  </div>
						  <input type="text" class="form-control" placeholder="Harga produk">
						  <div class="input-group-append">
							  <span class="input-group-text">.00</span>
						   </div>
						</div>
					  </fieldset>
						
					  <fieldset>
						<div class="input-group mb-1">
						  <div class="input-group-prepend">
							<span class="input-group-text bg-primary text-white"><i class="fa-solid fa-boxes-stacked"></i></span>
						  </div>
						  <input type="text" class="form-control" placeholder="Stok Barang">
						</div>
					  </fieldset>
						
					  <fieldset>
						<div class="input-group mb-1">
						  <div class="input-group-prepend">
							<span class="input-group-text"><i class="fa-solid fa-file-pen"></i></span>
						  </div>
						  <textarea class="form-control" name="">Deskripsi produk</textarea>
						</div>
					  </fieldset>
						
					 <div class="form-group">
                       <select class="select2 form-control" multiple="multiple">
                         <option value="Guaranteed">Guaranteed</option>
                         <option value="Return" selected>Return</option>
                         <option value="Secured">Secured</option>                         
                       </select>
                     </div>	
					
					<button class="btn btn-block btn-primary" type="submit" name="">Ubah</button>
					</form>				
					         
                </div>
               </div> 
			</div>                          
		                
	</div>
  </div>
    
<!-- app ecommerce details end -->

<!-----------=============MODAL IMAGE=============================------------------->
<div class="modal fade text-center" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg pt-5" role="document">
    <div class="modal-content rounded-0" style="opacity: 0.9">
       <div class="modal-header bg-transparent"> 
         <button type="button" class="close rounded-0" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">         
		  <div id="carousel-keyboard" class="carousel slide" data-keyboard="true">
            <ol class="carousel-indicators">
               <li data-target="#carousel-keyboard" data-slide-to="0" class="active"></li>
               <li data-target="#carousel-keyboard" data-slide-to="1"></li>
               <li data-target="#carousel-keyboard" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
               <div class="carousel-item active">
                 <img class="img-fluid" src="images/produk/1.jpg">
               </div>
               <div class="carousel-item">
                   <img class="img-fluid" src="images/produk/2.jpg">
               </div>
               <div class="carousel-item">
                   <img class="img-fluid" src="images/produk/1.jpg">
               </div>
           </div>
           <a class="carousel-control-prev" href="#carousel-keyboard" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only"></span>
          </a>
          <a class="carousel-control-next" href="#carousel-keyboard" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only"></span>
          </a>
         </div> 
      </div>
	 <div class="modal-footer bg-transparent">
        <h4 class="modal-title" id="myModalLabel1">Ini nama produk yang bagus sekali</h4>
     </div>
    </div>
  </div>
</div>
<!-----------=============MODAL IMAGE=============================------------------->



<!-----------=============MODAL EDIT IMAGE=============================------------------->
<div class="modal fade text-left" id="xSmall" tabindex="-1" role="dialog" aria-labelledby="myModalLabel20" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xs" role="document">
      <div class="modal-content">
         <div class="modal-header">
           <h4 class="modal-title" id="myModalLabel20">Edit Foto</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
          </div>
          <div class="modal-body">
             <form action="#" class="dropzone dropzone-area" id="dpz-multiple-files">
               <div class="dz-message">Maks.3 Foto Produk</div>
             </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Ubah</button>
         </div>
      </div>
    </div>
</div>