<style type="text/css">
    
    table.dataTable thead tr {
        background-color: #337ab7;
        color:#fff;
        font-size: 11px;
    }

    .modal-title {
        margin-bottom: 0;
        line-height: 1.45;
        color: white;
    }

    .modal .modal-header {
        background-color: #49b5c3;
        border-radius: 0.42rem;
        padding: 0.8rem;
        color: white;
        border-bottom: none;
    }

    .header-tabel {
        color:#fff;
        font-size: 11px;
        background-color: #337ab7;
    }

    .pagination .page-item.active .page-link {
        z-index: 3;
        border-radius: 5rem;
        background-color: #337ab7;
        color: #FFFFFF;
        -webkit-transform: scale(1.05);
        -ms-transform: scale(1.05);
        transform: scale(1.05); 
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


<!-- BEGIN: Content-->
   <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0 text-dark text-capitalize"><?php echo $_SESSION['akses'];?></h2>
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php?menu=home" class="text-dark">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#" class="text-dark">Streaming</a>
                                    </li>                                   
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<div class="card">
 <div class="card-body">
  
 <div class="content-detached content-right">
   <div class="content-body">
                  
     <!-- Column selectors with Export Options and print table -->
      <section id="column-selectors">
         <div class="row">
           <div class="col-12">
             <div class="card">
                <div class="divider">
                     <div class="divider-text"><h3 class="mb-3 display-4 text-uppercase">Data Streaming</h3></div>
                   </div>
                 <div class="card-content">
                    <div class="badge badge-primary float-right">
					   <?php $sql_user = mysqli_query($koneksi,"SELECT * FROM tabel_streaming"); 
					    $jumlah_user = mysqli_num_rows($sql_user); ?>
                         <span class="badge badge-pill badge-danger font-small-2 mr-2 nama-user">
                         <?php echo $jumlah_user?></span>Streaming 
                    </div>          
                   <div class="card-body card-dashboard">
                      <div class="table-responsive">
                        <table class="table table-striped dataex-html5-selectors">
                           <thead>
                             <tr>
                                 <th>Kode</th>
                                 <th>Link</th>
                                 <th>Status</th>
                                 <th>Edit</th>
                               </tr>
                              </thead>
                              <tbody>
                                <?php              
                                   $ketQuery = "SELECT * FROM tabel_streaming ORDER BY id_streaming DESC";
                                   $executeSat = mysqli_query($koneksi, $ketQuery);
                                   while ($m=mysqli_fetch_array($executeSat)) {
                                ?>                                  
                                 <tr>
                                   <td><?php echo $m['id_streaming'] ?></td>
                                   <td class="text-capitalize"><?php echo $m['link'] ?></td>
                                   <td><?php echo $m['status'] ?></td>
                                   <td>
                                   		<a href="#" data-toggle="modal" data-target="#steam">
                                        	<i class="fas fa-edit"></i></a>
                                        <a class="action-delete"><i class="fas fa-trash-alt"></i></a>
                                   </td>
                                 </tr>
                                   <?php } ?>                                                  
                               </tbody>
                               <tfoot>
                                 <tr class="header-tabel">
                                     <th>Kode</th>
                                     <th>Link</th>
                                     <th>Status</th>
                                     <th>Edit</th>
                                 </tr>
                                </tfoot>
                             </table>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </section>
<!-- Column selectors with Export Options and print table -->

                </div>
            </div>
         
<div class="sidebar-detached sidebar-left">
  <div class="sidebar">
  <!-- Ecommerce Sidebar Starts -->
   <div class="sidebar-shop" id="ecommerce-sidebar-toggler">
                        
    <div class="card">
     <div class="card-body">
       <div class="multi-range-price">
         <div class="multi-range-title pb-75">
           <h6 class="filter-title mb-0">Daftar Live <?php echo $toko ?></h6>
         </div>                                  
      </div>                 
<form method="post" action="" enctype="multipart/form-data">
<div class="row">
	<div class="col-12 pb-1">
      <div class="font-small-2 mb-1">Embedd</div>
        <fieldset>
            <div class="input-group">
                 <input type="text" class="form-control" placeholder="Link!">
                    <div class="input-group-append" id="button-addon2">
                       <button class="btn btn-primary rounded-0" type="button"><i class="fas fa-link"></i></button>
                    </div>
                 </div>
          </fieldset>
      </div>

    <div class="col-12 mb-2">
      <div class="font-small-2 mb-1 mt-1">
         Status
           </div>            
              <select name="kategori" class="form-control select2">
                <option disabled selected>Aktivasi</option>
            	<option value="">ON</option>
                <option value="">OFF</option>
            </select>
         
     </div>

    <input type="submit" name="" value="Upload" class="btn btn-primary rounded-0" />
	<input type="reset" name="" value="Cancel" onClick="hide(0)" class="btn btn-danger rounded-0" />

   </form>
     </div>
    </div>
    </div>
<!-- Ecommerce Sidebar Ends -->
     </div>
    </div>
  </div>
  </div>
<!-- END: Content-->
 </div>
</div>   

<!---------------------------------------- Modal steam------------------------------------>
<div class="modal fade" id="steam" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
   <div class="modal-dialog modal-dialog-scrollable" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title font-medium-2" id="myModalLabel20"><i class="fas fa-plus-circle"></i> Ubah Data Informasi</h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
         </div>
         <div class="modal-body">
         	
           <form method="post" action="" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12 pb-1">
                  <div class="font-small-2 mb-1">Embedd</div>
                    <fieldset>
                        <div class="input-group">
                             <input type="text" class="form-control" placeholder="Link!">
                                <div class="input-group-append" id="button-addon2">
                                   <button class="btn btn-primary rounded-0" type="button"><i class="fas fa-link"></i></button>
                                </div>
                             </div>
                      </fieldset>
                  </div>
            
                <div class="col-12 mb-2">
                  <div class="font-small-2 mb-1 mt-1">
                     Status
                       </div>            
                          <select name="kategori" class="form-control select2">
                            <option disabled selected>Aktivasi</option>
                            <option value="">ON</option>
                            <option value="">OFF</option>
                        </select>
                     
                 </div>
            
         </div>
         <div class="modal-footer">
         			<input type="submit" name="" value="Upload" class="btn btn-primary rounded-0" />
                    <input type="reset" name="" value="Cancel" onClick="hide(0)" class="btn btn-danger rounded-0" />
           </form>
         </div>
       </div>
      </div>
     </div>
</div> 
<!---------------------------------------- Modal steam------------------------------------>