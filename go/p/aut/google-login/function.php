<?php

include "../../inc/koneksi.php";

session_start();

    function register($data) {
        global $koneksi;

        // ambil nama pdf 
        $nama       = $_SESSION['info']['name'];
        $email      = $_SESSION['info']['email'];
        $alamat     = $data['alamat'];
        $no_tlv     = $data['no_tlv'];
        $akses      = $data['role'];
        $random     = rand();
        
        if( $akses == "member" ){
            $status = "AKTIF";
        } else {
            $status = "PENDING";
        }
        // upload pdf
        

        // Query insert data
        $query = $query = "INSERT INTO `tabel_member`
                                (`kode_user`, `tgl_daftar`, `nm_user`, `email_user`,`alamat_user`,`hp`,`akses`,`stt_user`) 
                            VALUES 
                                ('$random', now(), '$nama', '$email','$alamat','$no_tlv','$akses','$status')";

        mysqli_query($koneksi,$query);

        // cek data 
        return mysqli_affected_rows($koneksi);
    }

?>