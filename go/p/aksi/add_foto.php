
<!-- SweetAlert -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
// var_dump($_FILES);
// die;

session_start();
include_once '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../login.php');
}

// Mengambil id user
$id_user = $_SESSION['id_user'];

// Mengambil data user untuk memeriksa apakah sudah ada foto profil atau tidak
$query = mysqli_query($koneksi, "SELECT foto FROM tabel_member WHERE id_user='$id_user'");
$user_data = mysqli_fetch_assoc($query);
$old_image = $user_data['foto'];

// Jika foto profil sudah ada, hapus file gambar lama
if (!empty($old_image)) {
    $file_path = "../images/user/$old_image";
    if (file_exists($file_path)) {
        unlink($file_path);
    }
}

// ---------------------------- UPLOAD GAMBAR user -----------------------
$folder = "../images/user/";
$upload_image_user = $_FILES['image_user']['name'];
// Check if image file is a actual image or fake image
$check = getimagesize($_FILES["image_user"]["tmp_name"]);
if($check === false) {
  // Redirect back with error message
  echo '<script>
            setTimeout(function() {
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: "File yang diunggah bukan gambar.",
                }).then(function() {
                    history.go(-1);
                });
            }, 1);
        </script>';
  exit(); // Stop further execution
}

// tentukan ukuran width yang diharapkan
$width_size = 1024;
// tentukan di mana image akan ditempatkan setelah diupload
$filesaveuser = $folder . $upload_image_user;
move_uploaded_file($_FILES['image_user']['tmp_name'], $filesaveuser);
// menentukan nama image setelah dibuat
$rename_image_user = "user_" . uniqid(rand()) . ".jpg"; // Perbaikan pada pembuatan nama file
$resize_image_user = $folder . $rename_image_user;
// mendapatkan ukuran width dan height dari image
list($width, $height) = getimagesize($filesaveuser);
// mendapatkan nilai pembagi supaya ukuran skala image yang dihasilkan sesuai dengan aslinya
$k = $width / $width_size;
// menentukan width yang baru
$newwidth = $width / $k;
// menentukan height yang baru
$newheight = $height / $k;
// fungsi untuk membuat image yang baru
$thumb = imagecreatetruecolor($newwidth, $newheight);

$source_user = imagecreatefromjpeg($filesaveuser);
// men-resize image yang baru
imagecopyresized($thumb, $source_user, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
// menyimpan image yang baru
imagejpeg($thumb, $resize_image_user);
imagedestroy($thumb);
imagedestroy($source_user);
unlink($filesaveuser);

// Update database dengan nama file baru
$insert_1 = mysqli_query($koneksi, "UPDATE tabel_member SET foto='$rename_image_user' WHERE id_user='$id_user'");

?>
<script>
    setTimeout(function() {
        Swal.fire({
            icon: "success",
            title: "Gambar Profil",
            text: "Gambar Berhasil Diupdate",
        }).then(function() {
            window.location = "../?menu=account";
        });
    }, 1);
</script>