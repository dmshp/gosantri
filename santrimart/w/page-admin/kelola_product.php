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
                            <li class="breadcrumb-item"><a href="index.php?menu=product" class="text-dark">Produk</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#" class="text-dark">Kelola</a>
                            </li>                                     
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
      <div class="card-body">
        <div class="divider">
          <div class="divider-text"><h3 class="mb-3 display-4 text-uppercase">Kelola Atribut Produk</h3></div>
        </div>
        <div class="row">
          <!-- kategori -->
         	<div class="col-lg-6 col-12">
            <div class="badge badge-primary float-right">
              <?php $sql_user = mysqli_query($koneksi,"SELECT * FROM tabel_kategori_barang"); $jumlah_user = mysqli_num_rows($sql_user); ?>
                 <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2">
        		  <?php echo $jumlah_user?></span>Total Kategori 
            </div>    
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Kategori</th>
                    <th>Form</th> 
                    <th>Image</th> 
                    <th>Varian</th>                            
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php            
                    $ketQuery = "SELECT * FROM tabel_kategori_barang";
                    $executeSat = mysqli_query($koneksi, $ketQuery);
                    while ($b=mysqli_fetch_array($executeSat)) {
                  ?>                                  
                      <tr>
                        <td class="text-capitalize"><?php echo $b['nm_kategori'] ?></td>
                        <td>
                        <?php 
                          if($b['form'] == 'mf'){
                            echo "Multi Form";
                          }
                          else if($b['form'] == 'sf'){
                            echo "Single Form";
                          }
                        ?>  
                        </td>
                        <td class="text-center"><img src="../img/kategori/<?php echo $b['ikon_kategori'] ?>" style="width: 70% !important"></td>
                        <td><?php echo $b['varian'] ?></td>
                        <td>
                          <a onclick="showKategori(`<?php echo $b['kd_kategori'] ?>`)">
                          	<i class="fas fa-edit"></i>
                          </a>
                          <a class="action-delete" onclick="deleteKategori(`<?php echo $b['kd_kategori'] ?>`)">
                            <i class="fas fa-trash-alt"></i>
                          </a>
                        </td>
                      </tr>
                  <?php 
                    } 
                  ?>                                                  
                </tbody>
                <tfoot>
                  <tr>
                    <th>Kategori</th>
                    <th>Form</th> 
                    <th>Image</th> 
                    <th>Varian</th>                            
                    <th>Edit</th>
                  </tr>
                </tfoot>
              </table>
            </div>              
          </div>
          <!-- merk -->
          <div class="col-lg-3 col-12">
            <div class="badge badge-primary float-right">
              <?php $sql_user = mysqli_query($koneksi,"SELECT * FROM tabel_merk_barang"); $jumlah_user = mysqli_num_rows($sql_user); ?>
                 <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2">
              <?php echo $jumlah_user?></span>Total Merk 
            </div>    
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Merk</th>                         
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php            
                    $ketQuery = "SELECT * FROM tabel_merk_barang";
                    $executeSat = mysqli_query($koneksi, $ketQuery);
                    while ($b=mysqli_fetch_array($executeSat)) {
                  ?>                                  
                      <tr>
                        <td class="text-capitalize"><?php echo $b['merk'] ?></td>
                        <td>
                          <a onclick="showMerk(`<?php echo $b['id_merk'] ?>`)">
                            <i class="fas fa-edit"></i>
                          </a>
                          <a class="action-delete" onclick="deleteMerk(`<?php echo $b['id_merk'] ?>`)">
                            <i class="fas fa-trash-alt"></i>
                          </a>
                        </td>
                      </tr>
                  <?php 
                    } 
                  ?>                                                  
                </tbody>
                <tfoot>
                  <tr>
                    <th>Merk</th>                          
                    <th>Edit</th>
                  </tr>
                </tfoot>
              </table>
            </div>              
          </div>
          <!-- satuan -->
          <div class="col-lg-3 col-12">
            <div class="badge badge-primary float-right">
              <?php $sql_user = mysqli_query($koneksi,"SELECT * FROM tabel_satuan_barang"); $jumlah_user = mysqli_num_rows($sql_user); ?>
                 <span class="badge badge-pill badge-up badge-danger font-small-2 mr-2">
              <?php echo $jumlah_user?></span>Total Satuan 
            </div>    
            <div class="table-responsive mt-2">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Satuan</th>                           
                    <th>Edit</th>
                  </tr>
                </thead>
                <tbody>
                  <?php            
                    $ketQuery = "SELECT * FROM tabel_satuan_barang";
                    $executeSat = mysqli_query($koneksi, $ketQuery);
                    while ($b=mysqli_fetch_array($executeSat)) {
                  ?>                                  
                      <tr>
                        <td class="text-capitalize"><?php echo $b['nm_satuan'] ?></td>
                        <td>
                          <a onclick="showSatuan(`<?php echo $b['id_satuan'] ?>`)">
                            <i class="fas fa-edit"></i>
                          </a>
                          <a class="action-delete" onclick="deleteSatuan(`<?php echo $b['id_satuan'] ?>`)">
                            <i class="fas fa-trash-alt"></i>
                          </a>
                        </td>
                      </tr>
                  <?php 
                    } 
                  ?>                                                  
                </tbody>
                <tfoot>
                  <tr>
                    <th>Satuan</th>                         
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
</div> 
<!-- END: Content-->

<!---------------------------------------- Modal Kategori ------------------------------------>
<div class="modal fade" id="kategori-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="../aksi/edit_kategori.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <input type="text" id="kd_kategori" name="kd_kategori" hidden>
            <div class="col-12">
              <div class="font-small-2 mb-1">Icon</div>
              <span class="position-absolute" onclick="delete_image_kategori()">&times;</span>
              <br>
              <figure class="image-container">
                  <img id="chosen-image-kategori" style="width: 30% !important">
              </figure>
              <input class="input-image" type="file" id="upload-button-kategori" name="gambar">
              <label class="label-images" for="upload-button-kategori">
                  <i class="fas fa-upload"></i> &nbsp; Choose A Photo
              </label>
            </div>
            <div class="col-12">
               <div class="font-small-2 mb-1">Nama Kategori</div>
                <fieldset class="form-group">
                   <div class="custom-file">
                      <input type="text" id="kategori" name="kategori" class="form-control" placeholder="Isi disini" /> 
                   </div>
                 </fieldset>
            </div>        
            <div class="col-12">
             <div class="font-small-2 mb-1">Form</div>
              <fieldset class="form-group">
                 <div class="custom-file">
                    <select class="form-control" id="form-kategori" name="form"> 
                      <option id="sf" value="sf">Single Form</option>
                      <option id="mf" value="mf">Multi Form</option>
                    </select>
                 </div>
               </fieldset>
            </div>
            <div class="col-12">
             <div class="font-small-2 mb-1">Varian</div>
            </div>
            <div class="col-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" name="panjang" id="panjang">
                <label class="form-check-label" for="panjang">
                  Panjang
                </label>
              </div>
            </div>
            <div class="col-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" name="lebar" id="lebar">
                <label class="form-check-label" for="lebar">
                  Lebar
                </label>
              </div>
            </div>
            <div class="col-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" name="tinggi" id="tinggi">
                <label class="form-check-label" for="tinggi">
                  Tinggi
                </label>
              </div>
            </div>
            <div class="col-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" name="warna" id="warna">
                <label class="form-check-label" for="warna">
                  Warna
                </label>
              </div>
            </div>
            <div class="col-4">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" name="type" id="type">
                <label class="form-check-label" for="type">
                  Type
                </label>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="edit_kategori" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>
<!---------------------------------------- Modal Kategori ------------------------------------>

  
<!---------------------------------------- Modal Satuan------------------------------------>
<div class="modal fade text-left" id="modal-satuan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel20" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xs" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title font-medium-2" id="myModalLabel20"><i class="fas fa-plus-circle"></i> Tambahkan Satuan baru</h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
         </div>
         <form action="../aksi/edit_satuan.php" method="post" class="form-kategori">
          <div class="modal-body">
          <input type="text" id="id_satuan" name="id_satuan" hidden>
          <div class="col-12">
             <div class="font-small-2 mb-1">Nama Satuan</div>
              <fieldset class="form-group">
                 <div class="custom-file">
                    <input type="text" id="satuan" name="satuan" class="form-control" placeholder="Isi disini" /> 
                 </div>
               </fieldset>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="edit_satuan" class="btn btn-primary">Save</button>
        </div>
         </form>
       </div>
      </div>
     </div>
</div> 
<!---------------------------------------- Modal Satuan------------------------------------>  

<!---------------------------------------- Modal Merk------------------------------------>
<div class="modal fade text-left" id="modal-merk" tabindex="-1" role="dialog" aria-labelledby="myModalLabel20" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xs" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h4 class="modal-title font-medium-2" id="myModalLabel20"><i class="fas fa-plus-circle"></i> Tambahkan Merk baru</h4>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
         </div>
         <form action="../aksi/edit_merk.php" method="post" class="form-kategori">
          <div class="modal-body">
          <input type="text" id="id_merk" name="id_merk" hidden>
          <div class="col-12">
             <div class="font-small-2 mb-1">Nama Merk</div>
              <fieldset class="form-group">
                 <div class="custom-file">
                    <input type="text" id="merk" name="merk" class="form-control" placeholder="Isi disini" /> 
                 </div>
               </fieldset>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="edit_merk" class="btn btn-primary">Save</button>
        </div>
         </form>
       </div>
      </div>
     </div>
</div> 
<!---------------------------------------- Modal Merk------------------------------------>  


<script type="text/javascript">

  let uploadButtonKategori = document.getElementById("upload-button-kategori");
  let chosenImageKategori = document.getElementById("chosen-image-kategori");

  uploadButtonKategori.onchange = () => {
      let reader = new FileReader();
      reader.readAsDataURL(uploadButtonKategori.files[0]);
      reader.onload = () => {
          chosenImageKategori.setAttribute("src",reader.result);
      }
  }

  function delete_image_kategori(){
    chosenImageKategori.setAttribute("src","")
  }

  function deleteKategori(id){
    $.ajax({
      type: "GET",
      url: "../aksi/delete_kategori.php?kd_kategori="+id,
      async: false,
      success: function(text) {
        alert(text);
      }
    });
  }

  function showKategori(id) {
    var response = [];

    $.ajax({
      type: "GET",
      url: "../aksi/show_kategori.php?kd_kategori="+id,
      async: false,
      success: function(text) {
        response = JSON.parse(text);
      }
    });

    varians = response.varian;
    varians = varians.split(',');

    chosenImageKategori.setAttribute("src","../img/kategori/"+response.ikon_kategori);
    $('#kd_kategori').val(response.kd_kategori);
    $('#kategori').val(response.nm_kategori);
    $('#form-kategori').val(response.form);
    document.getElementById(`${response.form}`).selected  = true;

    for (var i = 0; i < varians.length; i++) {
      if(varians[i] == 'panjang'){
        $('#panjang').prop('checked', true);
      }
      else if(varians[i] == 'lebar'){
        $('#lebar').prop('checked', true);
      }
      else if(varians[i] == 'tinggi'){
        $('#tinggi').prop('checked', true);
      }
      else if(varians[i] == 'warna'){
        $('#warna').prop('checked', true);
      }
      else if(varians[i] == 'type'){
        $('#type').prop('checked', true);
      }
    }

    $("#kategori-modal").modal('show');
  }

  function deleteMerk(id){
    $.ajax({
      type: "GET",
      url: "../aksi/delete_merk.php?kd_merk="+id,
      async: false,
      success: function(text) {
        alert(text);
      }
    });
  }

  function showMerk(id) {
    var response = [];

    $.ajax({
      type: "GET",
      url: "../aksi/show_merk.php?kd_merk="+id,
      async: false,
      success: function(text) {
        response = JSON.parse(text);
      }
    });
    console.log(response);
    $('#id_merk').val(response.id_merk);
    $('#merk').val(response.merk);

    $("#modal-merk").modal('show');
  }

  function deleteSatuan(id){
    $.ajax({
      type: "GET",
      url: "../aksi/delete_satuan.php?kd_satuan="+id,
      async: false,
      success: function(text) {
        alert(text);
      }
    });
  }

  function showSatuan(id) {
    var response = [];

    $.ajax({
      type: "GET",
      url: "../aksi/show_satuan.php?kd_satuan="+id,
      async: false,
      success: function(text) {
        response = JSON.parse(text);
      }
    });
    console.log(response);
    $('#id_satuan').val(response.id_satuan);
    $('#satuan').val(response.nm_satuan);

    $("#modal-satuan").modal('show');
  }


  
</script>