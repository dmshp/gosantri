<?php 
  $a = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM tabel_member WHERE id_user = '$_SESSION[id_user]'")); 

?>   
<!-- BEGIN: Content-->
<section class="users-edit">
 <div class="card mt-2">
  <div class="card-header mx-auto">
     <div class="avatar avatar-xl">
         <img class="img-fluid" src="../img/user/user.png">
     </div>
  </div>
  <div class="card-content">
     <div class="card-body text-center">
       <h4><?php echo $a['nm_user']; ?></h4>
		<p class="font-small-1 text-italic">Active at <?php echo $a['tgl_daftar']; ?></p>
        <p class="font-small-1 text-italic mt-2 mb-0 pb-0">Ganti Foto</p> 
		   <div class="btn-group">
			<a href="#" class="btn btn-primary btn-icon btn-sm text-uppercase" data-toggle="tooltip" data-placement="left" data-trigger="hover" title="Upload foto">
				<i class="fa-solid fa-cloud-arrow-up mr-50"></i></a>						
						              
            <a href="#" class="btn btn-success btn-icon btn-sm text-uppercase">
				 <i class="fa-solid fa-user-slash mr-50"></i>Non Aktifkan akun anda</a>	
			
			<a href="../aut/logout.php" class="btn btn-danger btn-icon btn-sm">
				<i class="fa-solid fa-power-off ml-50"></i></a>
			   
	      </div>
       <hr class="my-2">
       <div class="d-flex justify-content-between">
         <div class="float-left">
            <i class="fa-solid fa-star text-warning mr-50"></i>4.9
			<i class="fa-solid fa-heart text-danger mr-50"></i>50
			<i class="fa-solid fa-comment-dots text-info mr-50"></i> 3000
         </div>
         <div class="float-right">
            <i class="fa-solid fa-wallet text-primary mr-50"></i>37 Transaksi
         </div>
        </div>
     </div>
   </div>
   
</div>	
<div class="card">
  <div class="card-content">
   <div class="card-body">   
   <h4>Profil</h4>       
    <form  method="post" action="../aksi/edit_profile.php" enctype="multipart/form-data">
     <div class="row">
       <div class="col-12 col-sm-6">
         <div class="form-group">
           <label>Username</label>
             <input type="text" class="form-control"  name="username" value="<?php echo $a['nm_user']; ?>" readonly>
         </div>
         <div class="form-group" style="display: none;">
           <label>Name</label>
              <input type="text" class="form-control">
         </div>
         <div class="form-group">                         
           <label>E-mail</label>
             <input type="email" class="form-control" name="email" value="<?php echo $a['email_user']; ?>">
         </div>
         <div class="form-group">                         
           <label>No Hp</label>
             <input type="text" class="form-control" name="hp" value="<?php echo $a['hp']; ?>">
         </div>
       </div>
       <div class="col-12 col-sm-6">
         <div class="form-group">
           <label>Activated</label>
              <input type="text" class="form-control"  name="" value="<?php echo $a['stt_user']; ?>" readonly>
         </div>
         <div class="form-group">
           <label>Status</label>                         
           <input type="text" class="form-control"  name="" value="<?php echo $a['akses']; ?>" readonly>
          </div>
        </div>
        <div class="text-center align-self-center p-2">
			<button type="submit" name="update_profile" class="btn btn-primary glow mb-1 mb-sm-0"><i class="fa-solid fa-paper-plane mr-1"></i>Simpan</button>
		</div>
       </div>
      </form>
    </div>
   </div>
  </div>

<div class="card">
  <div class="card-content">
   <div class="card-body">   
   <h4>Password</h4>       
    <form  method="post" action="../aksi/edit_profile.php" enctype="multipart/form-data">
     <div class="row">
       <div class="col-12 col-sm-6">
         <div class="form-group">
           <label>Password Lama</label>
             <input type="text" class="form-control"  name="oldPassword" placeholder="Ketikan Password Lama">
         </div>
         <div class="form-group">
           <label>Password Baru</label>
             <input type="password" class="form-control"  name="newPassword" placeholder="Ketikan Password Baru">
         </div>
         <div class="form-group">
           <label>Ketik Ulang Password</label>
             <input type="password" class="form-control"  name="newPassword2" placeholder="Ketikan Ulang Password Baru">
         </div>
       </div>
        <div class="text-center align-self-center p-2">
      <button type="submit" name="update_password" class="btn btn-primary glow mb-1 mb-sm-0"><i class="fa-solid fa-paper-plane mr-1"></i>Simpan</button>
    </div>
       </div>
      </form>
    </div>
   </div>
  </div>
</section>