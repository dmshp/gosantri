<?php

    include "../inc/koneksi.php";


    $kodeBarang = $_POST['id_barang'];

    $selectBarang =  mysqli_query($koneksi, "SELECT * FROM tabel_barang WHERE kd_barang = '$kodeBarang'");

    echo json_encode(mysqli_fetch_array($selectBarang));

    // if ($selectBarang) {

    //     while ($data = mysqli_fetch_array($selectBarang)) {

    //         echo "

            // <tr>

            //     <td>".$data['kd_barang']."</td>

            //     <td>".$data['nm_barang']."</td>

            //     <td>".$data['hrg_jual']."</td>

            //     <td>
            //     form
            //     <div class='d-inline-block mb-1'>
            //        <div class='input-group'>
            //          <input type='number' class='touchspin rounded-0' value='1'>
            //        </div>
            //      </div>
            //      </td>

            //     <td>".$data['hrg_jual']."</td>

            //     <td><button class='btn btn-danger btn-delete'>hapus</button></td>

            // </tr>";

    //     }

    // }else{

    //     echo $selectBarang;

    // }

?>