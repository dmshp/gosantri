<!-- <br><br><br><br><br><br><br><br> -->
<?php 

  $id = $_GET['id'];

  $ketQuery = "SELECT * FROM `tabel_retur` join tabel_barang WHERE tabel_barang.kd_barang = tabel_retur.kd_barang and `id` = '$id'";
  $executeSat = mysqli_query($koneksi, $ketQuery);
  $retur=mysqli_fetch_array($executeSat);

  // var_dump($retur);
  // die;

?>

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
                            <li class="breadcrumb-item"><a href="index.php?menu=product" class="text-dark">Retur</a>
                            </li>
                            <li class="breadcrumb-item"><a href="#" class="text-dark">Edit Retur</a>
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
          <div class="divider-text"><h3 class="mb-3 display-4 text-uppercase">Edit Data Retur</h3></div>
        </div>
        <form method="post" action="../aksi/edit_retur.php" enctype="multipart/form-data">
          <div class="row">
            <div class="col-lg-2 col-12 pb-5">
            </div>
          	<div class="col-lg-8 col-12 pb-5">        
              <div class="row">
                <div class="col-12 col-md-12 mb-1">
                  <div class="font-small-2">Cari Faktur</div>
                  <input type="text" class="form-control" disabled name="faktur" id="faktur" value="<?php echo $retur['no_faktur_retur']; ?>">
                  <input type="text" name="id_retur" hidden value="<?php echo $retur['id']; ?>">
                  <input type="text" name="kd_produk" id="kd_produk" hidden value="<?php echo $retur['kd_barang']; ?>">
                </div>
                <div class="col-12 col-md-12 mb-1">
                  <div class="font-small-2">Cari Produk</div>
                  <input type="text" class="form-control" disabled name="produk" id="produk" value="<?php echo $retur['nm_barang']; ?>">
                </div>         
              </div>
              <div class="row mt-1">  
                 <div class="col-6 col-md-6">
                  <div class="font-small-2">Jumlah Retur</div>
                      <div class="d-inline-block mb-1">
                      <div class="input-group">
                        <input type="number" class="form-control" name="jml" id="jml_retur" min="0" onclick="max_edit()" value="<?php echo $retur['total_retur']; ?>" >
                      </div>
                    </div>
                </div>
              </div> 
              
                    
              <div class="row">
                <div class="col-12 mt-1">
                    <div class="font-small-2 mb-1">Deskripsi Retur</div>
                     <fieldset class="form-label-group mb-0">
                       <textarea data-length=100 class="form-control char-textarea" rows="3" name="ket" ><?php echo $retur['ket']; ?></textarea>
                     </fieldset>
                     <small class="counter-value float-right"><span class="char-count">maks.</span> / 100 karakter</small>
                </div>
              </div>
              <div class="row">
                <div class="col-12 mt-1">
                    <input type="submit" name="edit_retur" value="Edit" class="btn btn-primary rounded-0" />
                    <input type="reset" value="Cancel" onClick="hide(0)" class="btn btn-danger rounded-0" />
                  </div>
              </div> 
              
                  
            </div>
            <div class="col-lg-2">

            </div>
          </div>
        </form>      
         	
      </div>  
      <!-- END: Content-->
    </div>
  </div> 
</div>
<script type="text/javascript">
  function max_edit(){
    var kd_barang = $('#kd_produk').val();
    var faktur = $('#faktur').val();
    $.ajax({
        type: "GET",
        url: `../aksi/jml_produk_retur.php?faktur=${faktur}&&kd_barang=${kd_barang}`,
        async: false,
        success: function(text) {
            response = JSON.parse(text)
        }
    });

    document.getElementById("jml_retur").max = response;
  }
</script>