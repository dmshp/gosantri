<?php
session_start();
error_reporting(0);

include '../inc/koneksi.php';
function compressImage($source, $destination, $quality)
{
    // Get image info 
    $imgInfo = getimagesize($source);
    $mime = $imgInfo['mime'];

    // Create a new image from file 
    switch ($mime) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($source);
            break;
        case 'image/png':
            $image = imagecreatefrompng($source);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($source);
            break;
        default:
            $image = imagecreatefromjpeg($source);
    }

    // Save image 
    imagejpeg($image, $destination, $quality);

    // Return compressed image 
    return $destination;
}

function convert_filesize($bytes, $decimals = 2)
{
    $size = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}

if (isset($_POST['submit'])) {
    $_SESSION['submit'] = '';
}

// print_r($_SESSION);
if (isset($_POST['submit'])) {
    if ($_POST["kode"] != $_SESSION["tiket_cap"] or $_SESSION["tiket_cap"] == '') {
        echo "<script>alert('Incorrect verification code');</script>";
    } else {
        $nama = $_POST['nama'];
        $noTelp = $_POST['noTelp'];
        $story = $_POST['story'];
        $date = date('Y-m-d H:i:s');
        $uploadPath = '../img/comment/';
        // print_r($nama);
        $fileName = '';


        if (!empty($_FILES["image"]["name"])) {

            // File info 
            $fileName = basename($_FILES["image"]["name"]);
            $imageUploadPath = $uploadPath . $fileName;
            $fileType = pathinfo($imageUploadPath, PATHINFO_EXTENSION);


            // Allow certain file formats 
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array($fileType, $allowTypes)) {
                // Image temp source and size 
                $imageTemp = $_FILES["image"]["tmp_name"];
                $imageSize = convert_filesize($_FILES["image"]["size"]);
                $ekstensiHeader = explode(".", $fileName);

                // Compress size and upload image 
                $compressedImage = compressImage($imageTemp, $imageUploadPath, 75);

                if ($compressedImage) {

                    move_uploaded_file($imageTemp, '../img/comment/' . $fileName);
                    $compressedImageSize = filesize($compressedImage);
                    $compressedImageSize = convert_filesize($compressedImageSize);

                    $status = 'success';
                    $statusMsg = "Image compressed successfully.";
                } else {
                    $statusMsg = "Image compress failed!";
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
            }
        } else {
            $statusMsg = 'Please select an image file to upload.';
        }


        $comment = "INSERT INTO tabel_comment values('','$nama','$noTelp','$story','$fileName','$date')";



        if (mysqli_query($koneksi, $comment)) {
            // echo "<script>alert('Terimakasih telah memberikan komentar');history.back()</script>";
            echo "<script>Swal.fire('Informasi','Terimakasih telah memberikan komentar','success')</script>";
        } else {
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }
    }
}