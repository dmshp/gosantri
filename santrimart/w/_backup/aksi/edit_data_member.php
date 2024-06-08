<head>
    <script src="../app-assets/js/jquery3.6.0.min.js"></script>
    <script src="../app-assets/js/sweetalert2@11.js"></script>
</head>

<?php
error_reporting(0);
session_start();
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
  header('location:../aut/login.php');
}

$nomor_hp   = $_POST['edit_nomor_hp'];
$email      = $_POST['edit_email'];
$alamat     = $_POST['edit_alamat'];
$kode_user  = $_POST['edit_kode_user'];
$foto_user  = $_FILES['image_profile']['name'];
$id_user    = $_SESSION['id_user'];
$nm_user    = $_SESSION['nm_user'];
$folder     = "../img/user/";

// var_dump($nomor_hp);
// var_dump($email);
// var_dump($alamat);
// var_dump($kode_user);
// var_dump($foto_user);
// die();

if ($nomor_hp != '' && $email != '' && $alamat != ''&& $kode_user != '') {

    // ---------------------------- UPLOAD GAMBAR FOTO -----------------------

    $upload_image_profile = $_FILES['image_profile']['name'];
    // tentukan ukuran width yang diharapkan
    $width_size = 1524;
    // tentukan di mana image akan ditempatkan setelah diupload
    $filesavektp = $folder . $upload_image_profile;
    move_uploaded_file($_FILES['image_profile']['tmp_name'], $filesavektp);
    // menentukan nama image setelah dibuat
    $rename_image_profile = "$nama" .uniqid(rand()).".jpg";
    $resize_image_profile = $folder.$rename_image_profile;
    // mendapatkan ukuran width dan height dari image
    list( $width, $height ) = getimagesize($filesavektp);
    // mendapatkan nilai pembagi supaya ukuran skala image yang dihasilkan sesuai dengan aslinya
    $k = $width / $width_size;
    // menentukan width yang baru
    $newwidth = $width / $k;
    // menentukan height yang baru
    $newheight = $height / $k;
    // fungsi untuk membuat image yang baru
    $thumb = imagecreatetruecolor($newwidth, $newheight);

    $source_ktp = imagecreatefromjpeg($filesavektp);
    // men-resize image yang baru
    imagecopyresized($thumb, $source_ktp, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    // menyimpan image yang baru
    imagejpeg($thumb, $resize_image_profile);
    imagedestroy($thumb);
    imagedestroy($source_ktp);
    unlink($filesavektp);

    if ($foto_user != "") {
        $query = "UPDATE tabel_member SET email_user='$email', alamat_user='$alamat', hp='$nomor_hp', foto='$rename_image_profile' WHERE kode_user = '$kode_user'";
    } else {
        $query = "UPDATE tabel_member SET email_user='$email', alamat_user='$alamat', hp='$nomor_hp' WHERE kode_user = '$kode_user'";
    }


    $n = mysqli_query($koneksi, $query);

    // var_dump($n); die();
    
    if($n != null){
        echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        icon: "success",
                        tittle: "BERHASIL.",
                        text: "Data Members berhasil di simpan.",
                    }).then(function() {
                        window.location = "../page/index.php?menu=user_member";
                    });
                }, 1);
            </script>';
    }
     
    // print_r($query);
} else {
    echo "<script>alert('Koneksi terganngu, silahkan coba lagi!');history.back()</script>";
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}