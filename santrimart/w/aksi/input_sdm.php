<?php
include('koneksi.php');
error_reporting(0);
$alamat	=$_POST ['alamat'];
$ntk		=$_POST ['ntk'];
$getid 		= $_POST['id'];
$folder = "./img/pengguna/";
$upload_image = $_FILES['gambar']['name'];
// tentukan ukuran width yang diharapkan
$width_size = 480;
// tentukan di mana image akan ditempatkan setelah diupload
$filesave = $folder . $upload_image;
move_uploaded_file($_FILES['gambar']['tmp_name'], $filesave);
// menentukan nama image setelah dibuat
$rename_image = "fileasli_foto_" .uniqid(rand()).".jpg";
$rename_image2 = "fileasli_ntk_" .uniqid(rand()).".jpg";
$resize_image = $folder.$rename_image;
$resize_image2 = $folder.$rename_image2;
// mendapatkan ukuran width dan height dari image
list( $width, $height ) = getimagesize($filesave);
// mendapatkan nilai pembagi supaya ukuran skala image yang dihasilkan sesuai dengan aslinya
$k = $width / $width_size;
// menentukan width yang baru
$newwidth = $width / $k;
// menentukan height yang baru
$newheight = $height / $k;
// fungsi untuk membuat image yang baru
$thumb = imagecreatetruecolor($newwidth, $newheight);
$source = imagecreatefromjpeg($filesave);
// men-resize image yang baru
imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
// menyimpan image yang baru
imagejpeg($thumb, $resize_image);
imagejpeg($thumb, $resize_image2);
imagedestroy($thumb);
imagedestroy($source);
//echo 'Image Asli : <img src="' . $filesave . '" /><br />';
//echo 'Image setelah di resize : <img src="' . $resize_image . '" />';
mysqli_query($koneksi, "UPDATE tabel_user SET alamat= '$alamat', foto ='$rename_image', ntk ='$rename_image2' WHERE id = '$getid' ");	
?><script language="JavaScript">document.location='../?menu=home'</script>
