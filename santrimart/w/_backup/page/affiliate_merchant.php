
<!-- centered-slides option-2 swiper start -->
  <section id="component-swiper-centered-slides-2" style="margin-top: 20px;">
      <div class="card">
            <div class="card-header">                            
            <h4>LEADS</h4> 
          </div>
          <div class="card-content">
              <div class="card-body pt-0">

                <?php 
                    $no = 0;    
                    $ketQuery = "SELECT * FROM tabel_member WHERE stt_user = 'AKTIF' AND akses = 'merchant'";
                    $executeSat = mysqli_query($koneksi, $ketQuery);
                    // var_dump($executeSat); die();
                    while ($m=mysqli_fetch_array($executeSat)) {
                    $no++;

                    if ($m['foto'] != '') {
                      $foto = $m['foto'];
                    } else {
                      $foto = 'user.png';
                    }
                ?>

                <div class="btn box-affiliate-member" href="">
                  <div class="col-12">
                    <h5 class="font-small-4"><?php echo $m['email_user'] ?> / <?php echo $m['hp'] ?></h5>
                  </div>
                  <div class="col-12">
                    <h6 class="font-small-2"><?php echo date('d-m-Y H:i:s', strtotime($m['tgl_daftar'])) ?></h6>
                  </div>
                </div>

                <?php } ?>   

              </div>
          </div>
      </div>
  </section>
<!-- centered-slides option-2 swiper ends -->
	  
<!-- Multiple Slides Per View swiper start -->
  <section id="component-swiper-multiple" style="display: none;">
      <div class="card">
          <div class="card-header">                           
	  					<h4>Ayo kepoin layanan kami</h4> 
						<p>Pengertian serta deskripsi layanan <b>SantriGo</b></p>
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

<script type="text/javascript">
  
  function hapusDataMember(id_user, kode_user) {
    console.log(id_user);
    Swal.fire({
      title: 'INFORMASI',
      text: "Apakah Data Ini Akan dihapus?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ya, Hapus sekarang!'
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
        type: "GET",
        url: "../aksi/delete_user_member.php?id_user=" + id_user + "&kode_user=" + kode_user,
        async: false,
        success: function(text) {
          // alert(text);
          if (text = 'Delete User Member Berhasil') {
              Swal.fire('BERHASIL!',text,'success')
              .then(function() {
                window.location = "../page/?menu=user_member";
              });
          } else {
              Swal.fire('GAGAL!',text,'danger')
              .then(function() {
                window.location = "../page/?menu=user_member";
              });
          }
          
        }
      })
      }
    })
    
  }

</script>


