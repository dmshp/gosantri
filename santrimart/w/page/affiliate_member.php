
<!-- centered-slides option-2 swiper start -->
  <section id="component-swiper-centered-slides-2" style="margin-top: 20px;">
      <div class="card">
            <div class="card-header">                            
            <h4>MEMBER</h4> 
          </div>
          <div class="card-content">
              <div class="card-body pt-0">

                <?php 
                    $no = 0;    
                    $ketQuery = "SELECT * FROM tabel_member WHERE stt_user = 'AKTIF' AND akses = 'member'";
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
                  <div class="swiper-wrapper">
                    <div class="col-2" style="align-self: center;">
                      <div class="controls">
                        <img class="round" src="../img/user/<?php echo $foto ?>" height="30" width="30">
                      </div>
                    </div>
                    <div class="col-sm-11" style="">
                      <div class="controls">
                        <h4  style="color: black; font-weight:600;"><?php echo strtoupper($m['nm_user']) ?></h4>
                      </div>
                    </div>
                  </div><br>
                  <div class="col-12">
                    <h5 class="font-small-2"><?php echo $m['email_user'] ?> / <?php echo $m['hp'] ?></h5>
                  </div>
                  <div class="swiper-wrapper">
                    <div class="col-3" style="align-self: center;">
                      <div class="controls">
                        <button type="button" class="btn2 btn-inline-info btn-sm" onclick="editDataMember(`<?php echo $m['id_user'] ?>`, `<?php echo $m['kode_user'] ?>`, `<?php echo $m['alamat_user'] ?>`, `<?php echo $m['email_user'] ?>`, `<?php echo $m['hp'] ?>`)">Edit</button>
                      </div>
                    </div>
                    <div class="col-9" style="">
                      <div class="controls">
                        <button type="button" class="btn2 btn-inline-danger btn-sm" onclick="hapusDataMember(`<?php echo $m['id_user'] ?>`, `<?php echo $m['kode_user'] ?>`)">Delete</button>
                      </div>
                    </div>
                  </div>
                </div>

                <?php } ?>   

              </div>
          </div>
      </div>
  </section>
<!-- centered-slides option-2 swiper ends -->

<!---------------------------------------- Modal Edit Member------------------------------------>
<div class="modal fade" id="modal_edit_member" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <form method="post" action="../aksi/edit_data_member.php" enctype="multipart/form-data" class="form-kategori">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title font-medium-2" id="myModalLabel20"> Ubah Data Member</h4>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12">
                <center>
                  <img class="foto-profile" src="../img/user/<?php echo $foto; ?>" id="output" name="output" style="width: 50px; height: 50px;">
                </center>
                <br>
                <div class="row">
                  <div class="col-12" style="text-align: -webkit-center;">
                    <input type="file" id="image_profile" name="image_profile" hidden="" onchange="loadFile(event)">
                    <div class="col-12 col-sm-3">
                      <label class="btn2 btn-inline-success btn-sm mr-sm-1 mb-1 mb-sm-0" for="image_profile">Pilih Foto</label>
                    </div>
                  </div>
                  <!-- <div class="col-12 col-sm-6">
                    <button type="button" class="btn btn-danger-soft">Remove</button>
                  </div> -->
                </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <div class="controls">
                  <label for="account-name">Nomor HP (kontak)</label>
                  <input type="text" class="form-control" name="edit_nomor_hp" id="edit_nomor_hp" required>
                  <input type="hidden" class="form-control" name="edit_kode_user" id="edit_kode_user" readonly required>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <div class="controls">
                  <label for="account-name">Email</label>
                  <input type="text" class="form-control" name="edit_email" id="edit_email" required>
                </div>
              </div>
            </div> 
            <div class="col-12">
              <div class="form-group">
                <div class="controls">
                  <label for="account-name">Alamat</label>
                  <input type="text" class="form-control" name="edit_alamat" id="edit_alamat" required>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-info btn-sm">Simpan</button>
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript">

  function editDataMember(id_user, kode_user, alamat, email, hp) {

    $('#edit_kode_user').val(kode_user);
    $('#edit_alamat').val(alamat);
    $('#edit_email').val(email);
    $('#edit_nomor_hp').val(hp);
    $('#modal_edit_member').modal('show');

  }
  
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

  var loadFile = function (event) {
    var image = document.getElementById("output");
    image.src = URL.createObjectURL(event.target.files[0]);
  };

</script>


