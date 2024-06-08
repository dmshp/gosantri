<head>
    <!-- SweetAlert -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- <script src="../app-assets/js/jquery3.6.0.min.js"></script> -->
    <!-- <script src="../app-assets/js/sweetalert2@11.js"></script> -->
</head>

<?php
session_start();

//var_dump($_SESSION['nm_user']);
include '../inc/koneksi.php';
if (!isset($_SESSION['nm_user']) && !isset($_SESSION['pass'])) {
    header('location:../aut/login.php');
}
// var_dump($_FILES);
// var_dump($_POST);
// die;

if (isset($_POST['upload_edit_profile_aplikasi'])) {

    $id = $_POST['id_toko'];
    $nama_toko = $_POST['nama'];
    if (!$nama_toko) {
        echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Nama Aplikasi Tidak Boleh Kosong!",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
        return false;
    }
    $alamat = $_POST['alamat'];
    if (!$alamat) {
        echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Alamat toko Tidak Boleh Kosong!",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
        return false;
    }
    $kota = $_POST['kota'];
    if (!$kota) {
        echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Nama Kota Tidak Boleh Kosong!",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
        return false;
    }

    $kecamatan = $_POST['kecamatan'];
    if (!$kecamatan) {
        echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Nama Kecamatan Tidak Boleh Kosong!",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
        return false;
    }

    $konten = $_POST['konten'];
    if (!$konten) {
        echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Kolom Konten Tidak Boleh Kosong!",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
        return false;
    }
    $ketentuan = $_POST['ketentuan'];
    if (!$ketentuan) {
        echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Kolom Ketentetuan Tidak Boleh Kosong!",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
        return false;
    }
    $google_map = $_POST['google_map'];
    if (!$google_map) {
        echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Kolom Google Maps Tidak Boleh Kosong!",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
        return false;
    }
		$lat_pin = $_POST['lat_pin'];
		$lng_pin = $_POST['lng_pin'];

    $style_headerfooter = $_POST['style_headerfooter'];
    $style_background = $_POST['style_background'];
    $style_tombol = $_POST['style_tombol'];

    // ------------------------- LOGO UTAMA, LOGO HEADER, DAN LOGO LOGIN ------------------------------------
    if ($_FILES['image']['name'] != null || $_FILES['header']['name'] != null || $_FILES['login']['name'] != null) {

        // =================================== LOGO UTAMA ========================================

        $image_name = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_error = $_FILES['image']['error'];

        // cek image
        if ($image_error === 4) {
            // echo "<script>alert('Tambah Foto Index');history.back()</script>";
            echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Silahkan lengkapi gambar yang lainnya!",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
            return false;
        }

        // cek ekstensi
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode(".", $image_name);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Hanya Menerima ekstensi jpg, jpeg dan png",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
            return false;
        }

        // cek ukuran
        if ($image_size > 1000000) {
            echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Ukuran Image Harus < 1 Mb",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
            return false;
        }

        // generate nama image
        $image_name_new = uniqid(rand());
        $image_name_new .= '.';
        $image_name_new .= $ekstensiGambar;

        // simpan gambar
        move_uploaded_file($image_tmp, '../img/logo/' . $image_name_new);

        // =================================== LOGO HEADER ===========================================

        $header_name = $_FILES['header']['name'];
        $header_size = $_FILES['header']['size'];
        $header_tmp = $_FILES['header']['tmp_name'];
        $header_error = $_FILES['header']['error'];

        // cek image
        if ($header_error === 4) {
            // echo "<script>alert('Tambah Foto Index');history.back()</script>";
            echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Silahkan lengkapi gambar yang lainnya!",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
            return false;
        }

        // cek ekstensi
        $ekstensiHeaderValid = ['jpg', 'jpeg', 'png'];
        $ekstensiHeader = explode(".", $header_name);
        $ekstensiHeader = strtolower(end($ekstensiHeader));
        if (!in_array($ekstensiHeader, $ekstensiHeaderValid)) {
            echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Hanya Menerima ekstensi jpg, jpeg dan png",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
            return false;
        }

        // cek ukuran
        if ($header_size > 1000000) {
            echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Ukuran Image Harus < 1 Mb",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
            return false;
        }

        // generate nama image
        $header_name_new = uniqid(rand());
        $header_name_new .= '.';
        $header_name_new .= $ekstensiHeader;

        // simpan gambar
        move_uploaded_file($header_tmp, '../img/logo/' . $header_name_new);

        // =================================== LOGO LOGIN ===========================================

        $login_name = $_FILES['login']['name'];
        $login_size = $_FILES['login']['size'];
        $login_tmp = $_FILES['login']['tmp_name'];
        $login_error = $_FILES['login']['error'];

        // cek image
        if ($login_error === 4) {
            // echo "<script>alert('Tambah Foto Index');history.back()</script>";
            echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Silahkan lengkapi gambar yang lainnya!",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
            return false;
        }

        // cek ekstensi
        $ekstensiGambarValidLogin = ['jpg', 'jpeg', 'png'];
        $ekstensiGambarLogin = explode(".", $login_name);
        $ekstensiGambarLogin = strtolower(end($ekstensiGambarLogin));
        if (!in_array($ekstensiGambarLogin, $ekstensiGambarValidLogin)) {
            echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Hanya Menerima ekstensi jpg, jpeg dan png",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
            return false;
        }

        // cek ukuran
        if ($login_size > 1000000) {
            echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Ukuran Image Harus < 1 Mb",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
            return false;
        }

        // generate nama image
        $login_name_new = uniqid(rand());
        $login_name_new .= '.';
        $login_name_new .= $ekstensiGambarLogin;

        // simpan gambar
        move_uploaded_file($login_tmp, '../img/logo/' . $login_name_new);

        $query_tabel_toko = "UPDATE `tabel_toko` SET `nm_toko`='$nama_toko',`almt_toko`='$alamat',`kota_toko`='$kota',`kecamatan_toko`='$kecamatan',`logo`='$image_name_new',`logo_header`='$header_name_new',`logo_login`='$login_name_new',`headerfooter`='$style_headerfooter',`background`='$style_background',`tombol`='$style_tombol', `konten`='$konten', `ketentuan`='$ketentuan', `latitude`='$lat_pin', `longitude`='$lng_pin', `google_map` = '$google_map' WHERE `kd_toko` = '$id'";
        
                $id_user = $_SESSION['id_user'];
        // $query_tabel_member = "UPDATE `tabel_member` SET `foto`='$login_name_new' WHERE `id_user` = '$id_user'";
        //         mysqli_query($koneksi, $query_tabel_member);
    } else {
        $query_tabel_toko = "UPDATE `tabel_toko` SET `nm_toko`='$nama_toko',`almt_toko`='$alamat',`kota_toko`='$kota',`kecamatan_toko`='$kecamatan',`headerfooter`='$style_headerfooter',`background`='$style_background',`tombol`='$style_tombol', `konten`='$konten',`ketentuan`='$ketentuan', `latitude`='$lat_pin', `longitude`='$lng_pin', `google_map` = '$google_map' WHERE `kd_toko` = '$id'";
    }


    // ----------------------------------------------- LOGO HEADER ------------------------------------
    if ($_FILES['header']['name'] != null || $_FILES['image']['name'] === null || $_FILES['login']['name'] === null) {
        $header_name = $_FILES['header']['name'];
        $header_size = $_FILES['header']['size'];
        $header_tmp = $_FILES['header']['tmp_name'];
        $header_error = $_FILES['header']['error'];

        // cek image
        if ($header_error === 4) {
            echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Silahkan lengkapi gambar yang lainnya!",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
            return false;
        }

        // cek ekstensi
        $ekstensiHeaderValid = ['jpg', 'jpeg', 'png'];
        $ekstensiHeader = explode(".", $header_name);
        $ekstensiHeader = strtolower(end($ekstensiHeader));
        if (!in_array($ekstensiHeader, $ekstensiHeaderValid)) {
            echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Hanya Menerima ekstensi jpg, jpeg dan png",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
            return false;
        }

        // cek ukuran
        if ($header_size > 1000000) {
            echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Ukuran Image Harus < 1 Mb",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
            return false;
        }

        // generate nama image
        $header_name_new = uniqid(rand());
        $header_name_new .= '.';
        $header_name_new .= $ekstensiHeader;

        // simpan gambar
        move_uploaded_file($header_tmp, '../img/logo/' . $header_name_new);
        // return $header_name_new;
        $query_tabel_toko = "UPDATE `tabel_toko` SET `nm_toko`='$nama_toko',`almt_toko`='$alamat',`kota_toko`='$kota',`kecamatan_toko`='$kecamatan',`logo_header`='$header_name_new',`headerfooter`='$style_headerfooter',`background`='$style_background',`tombol`='$style_tombol', `konten`='$konten', `latitude`='$lat_pin', `longitude`='$lng_pin', `google_map` = '$google_map' WHERE `kd_toko` = '$id'";
        
				$id_user = $_SESSION['id_user'];
        $query_tabel_member = "UPDATE `tabel_member` SET `foto`='$header_name_new' WHERE `id_user` = '$id_user'";
				mysqli_query($koneksi, $query_tabel_member);
    } else {
        $query_tabel_toko = "UPDATE `tabel_toko` SET `nm_toko`='$nama_toko',`almt_toko`='$alamat',`kota_toko`='$kota',`kecamatan_toko`='$kecamatan',`headerfooter`='$style_headerfooter',`background`='$style_background',`tombol`='$style_tombol', `konten`='$konten', `ketentuan`='$ketentuan', `latitude`='$lat_pin', `longitude`='$lng_pin', `google_map` = '$google_map' WHERE `kd_toko` = '$id'";
    }

    // ----------------------------------------------- LOGO UTAMA ------------------------------------
    if ($_FILES['image']['name'] != null || $_FILES['login']['header'] === null || $_FILES['login']['name'] === null) {
        $image_name = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_error = $_FILES['image']['error'];

        // cek image
        if ($image_error === 4) {
            // echo "<script>alert('Tambah Foto Index');history.back()</script>";
            echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Silahkan lengkapi gambar yang lainnya!",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
            return false;
        }

        // cek ekstensi
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode(".", $image_name);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Hanya Menerima ekstensi jpg, jpeg dan png",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
            return false;
        }

        // cek ukuran
        if ($image_size > 1000000) {
            echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Ukuran Image Harus < 1 Mb",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
            return false;
        }

        // generate nama image
        $image_name_new = uniqid(rand());
        $image_name_new .= '.';
        $image_name_new .= $ekstensiGambar;

        // simpan gambar
        move_uploaded_file($image_tmp, '../img/logo/' . $image_name_new);

        $query_tabel_toko = "UPDATE `tabel_toko` SET `nm_toko`='$nama_toko',`almt_toko`='$alamat',`kota_toko`='$kota',`kecamatan_toko`='$kecamatan',`logo`='$image_name_new',`headerfooter`='$style_headerfooter',`background`='$style_background',`tombol`='$style_tombol', `konten`='$konten', `ketentuan`='$ketentuan', `latitude`='$lat_pin', `longitude`='$lng_pin', `google_map` = '$google_map' WHERE `kd_toko` = '$id'";
        
				$id_user = $_SESSION['id_user'];
        $query_tabel_member = "UPDATE `tabel_member` SET `foto`='$image_name_new' WHERE `id_user` = '$id_user'";
				mysqli_query($koneksi, $query_tabel_member);
    } else {
        $query_tabel_toko = "UPDATE `tabel_toko` SET `nm_toko`='$nama_toko',`almt_toko`='$alamat',`kota_toko`='$kota',`kecamatan_toko`='$kecamatan',`headerfooter`='$style_headerfooter',`background`='$style_background',`tombol`='$style_tombol', `konten`='$konten',`ketentuan`='$ketentuan', `latitude`='$lat_pin', `longitude`='$lng_pin', `google_map` = '$google_map' WHERE `kd_toko` = '$id'";
    }

    // ----------------------------------------------- LOGO LOGIN ------------------------------------
    if ($_FILES['login']['name'] != null || $_FILES['images']['name'] === null || $_FILES['header']['name'] === null) {
        $login_name = $_FILES['login']['name'];
        $login_size = $_FILES['login']['size'];
        $login_tmp = $_FILES['login']['tmp_name'];
        $login_error = $_FILES['login']['error'];

        // cek image
        if ($login_error === 4) {
            // echo "<script>alert('Tambah Foto Index');history.back()</script>";
             echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Silahkan lengkapi gambar yang lainnya!",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
            return false;
        }

        // cek ekstensi
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode(".", $login_name);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Hanya Menerima ekstensi jpg, jpeg dan png",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
            return false;
        }

        // cek ukuran
        if ($login_size > 1000000) {
            echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "INFORMASI",
                        icon: "warning",
                        text: "Ukuran Image Harus < 1 Mb",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
            return false;
        }

        // generate nama image
        $login_name_new = uniqid(rand());
        $login_name_new .= '.';
        $login_name_new .= $ekstensiGambar;

        // simpan gambar
        move_uploaded_file($login_tmp, '../img/logo/' . $login_name_new);

        $query_tabel_toko = "UPDATE `tabel_toko` SET `nm_toko`='$nama_toko',`almt_toko`='$alamat',`kota_toko`='$kota',`kecamatan_toko`='$kecamatan',`logo_login`='$login_name_new',`headerfooter`='$style_headerfooter',`background`='$style_background',`tombol`='$style_tombol', `konten`='$konten', `ketentuan`='$ketentuan', `latitude`='$lat_pin', `longitude`='$lng_pin', `google_map` = '$google_map' WHERE `kd_toko` = '$id'";
        
                $id_user = $_SESSION['id_user'];
        // $query_tabel_member = "UPDATE `tabel_member` SET `foto`='$login_name_new' WHERE `id_user` = '$id_user'";
        //         mysqli_query($koneksi, $query_tabel_member);
    } else {
        $query_tabel_toko = "UPDATE `tabel_toko` SET `nm_toko`='$nama_toko',`almt_toko`='$alamat',`kota_toko`='$kota',`kecamatan_toko`='$kecamatan',`headerfooter`='$style_headerfooter',`background`='$style_background',`tombol`='$style_tombol', `konten`='$konten',`ketentuan`='$ketentuan', `latitude`='$lat_pin', `longitude`='$lng_pin', `google_map` = '$google_map' WHERE `kd_toko` = '$id'";
    }

    $hasil_tabel_toko = mysqli_query($koneksi, $query_tabel_toko);
    // var_dump($hasil_tabel_toko);

    if ($hasil_tabel_toko) {
        echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "BERHASIL",
                        icon: "success",
                        text: "Data Berhasil diupdate",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
    } else {
        echo '<script>
                setTimeout(function() {
                    Swal.fire({
                        tittle: "GAGAL",
                        icon: "danger",
                        text: "Data Gagal diupdate",
                    }).then(function() {
                        history.back();
                    });
                }, 1);
            </script>';
    }
}



if (isset($_POST['upload_edit_password_toko'])) {

    $id = $_POST['id_toko'];
    $query_tabel_toko = "SELECT  `password`, `pass` FROM `tabel_toko` WHERE `kd_toko` = '$id'";
    $hasil_tabel_toko = mysqli_fetch_array(mysqli_query($koneksi, $query_tabel_toko));

    $old_password = $_POST['old_password'];
    $pengacak = "p3ng4c4k";

    $old_password = md5($pengacak . md5($old_password));
    if ($old_password != $hasil_tabel_toko['password']) {
        echo "<script>alert('Password lama salah');history.back()</script>";
        return false;
    }
    $new_password = $_POST['new_password'];
    if (!$new_password) {
        echo "<script>alert('Isi new password');history.back()</script>";
        return false;
    }
    $confirm = $_POST['confirm_pass_user'];
    if ($new_password !== $confirm) {
        echo "<script>alert('Konfirmasi Password Salah');history.back()</script>";
        return false;
    } else {
        $new_password = md5($pengacak . md5($new_password));
    }

    $query_tabel_toko = "UPDATE `tabel_toko` SET `password`='$new_password',`pass`='$confirm' WHERE `kd_toko` = '$id'";
    $hasil_tabel_toko = mysqli_query($koneksi, $query_tabel_toko);

    if ($hasil_tabel_toko) {
        echo "<script>alert('Edit Password Toko Berhasil');history.back()</script>";
    } else {
        echo "<script>alert('Edit Password Toko Gagal');history.back()</script>";
    }
}

if (isset($_POST['upload_edit_medsos_toko'])) {

    $id = $_POST['id_toko'];
    $twitter = $_POST['account-twitter'];
    $facebook = $_POST['account-facebook'];
    $google = $_POST['account-google'];
    $tiktok = $_POST['account-tiktok'];
    $instagram = $_POST['account-instagram'];

    $query_tabel_medsos_toko = "SELECT * FROM `tabel_medsos_toko` WHERE `id_toko` = '$id'";
    $hasil_tabel_medsos_toko = mysqli_fetch_array(mysqli_query($koneksi, $query_tabel_medsos_toko));
    // echo $id;
    // var_dump($hasil_tabel_medsos_toko);
    if ($hasil_tabel_medsos_toko == null) {
        $query_tabel_medsos_toko = "INSERT INTO `tabel_medsos_toko`(`id_toko`, `twitter`, `facebook`, `google`, `tiktok`, `instagram`) VALUES ('$id','$twitter','$facebook','$google','$tiktok','$instagram')";
    } else {
        $query_tabel_medsos_toko = "UPDATE `tabel_medsos_toko` SET `twitter`='$twitter',`facebook`='$facebook',`google`='$google',`tiktok`='$tiktok',`instagram`='$instagram' WHERE `id_toko` = '$id'";
    }
    $hasil_tabel_medsos_toko = mysqli_query($koneksi, $query_tabel_medsos_toko);

    if ($hasil_tabel_medsos_toko) {
        echo "<script>alert('Medsos Toko Berhasil');history.back()</script>";
    } else {
        echo "<script>alert('Medsos Toko Gagal');history.back()</script>";
    }
}