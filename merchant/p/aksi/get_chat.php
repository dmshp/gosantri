<?php
session_start();
include_once '../inc/koneksi.php';

// Mengambil nilai parameter dari URL
$idSender = isset($_GET['idSender']) ? $_GET['idSender'] : '';
$idReceiver = isset($_GET['idReceiver']) ? $_GET['idReceiver'] : '';

if ($idSender != '' && $idReceiver != "") {
    $output = "";

    // Menandai pesan sebagai sudah dibaca
    $sqlUpdate = "UPDATE chat SET status = 'read' WHERE sender_id = {$idReceiver} AND receiver_id = {$idSender}";
    mysqli_query($koneksi, $sqlUpdate);

    // Mengambil data chat
    $sqlSelect = "SELECT chat.*, tm.foto, tm.akses FROM chat 
                  LEFT JOIN tabel_member tm ON chat.sender_id = tm.id_user
                  WHERE (sender_id = {$idSender} AND receiver_id = {$idReceiver}) 
                  OR (sender_id = {$idReceiver} AND receiver_id = {$idSender}) 
                  ORDER BY id ASC";
    $query = mysqli_query($koneksi, $sqlSelect);
    if ($query) {
        while ($row = mysqli_fetch_assoc($query)) {
            $url = 'user';
            $chatps = $row['sender_id'] != $idSender ? "chat-left" : "";
            $foto = $row['foto'] ? "images/$url/{$row['foto']}" : "./images/user/user.png";

            if ($row['photo'] != null) {
                $target = './images/chat/' . $row['photo'];
                $output .= '<div class="chat ' . $chatps . '">
                                <div class="chat-avatar">
                                    <a class="avatar m-0" data-toggle="tooltip" href="#"
                                        data-placement="right" title="" data-original-title="">
                                        <img src="' . $foto . '" onerror="this.src=\'images/user/user.png\';" alt="avatar" height="40"
                                            width="40" />
                                    </a>
                                </div>
                                <div class="chat-body">
                                    <div class="chat-content">
                                        <img src="' . $target . '" height="120" width="120"  style="cursor:pointer;" data-target="#exampleModalCenter" onClick="openImg(\'' . $target . '\')" data-toggle="modal" onerror="this.src=\'./images/user/user.png\';" alt="avatar"/>
                                    </div>
                                </div>
                            </div>';
            } else {
                $output .= '<div class="chat ' . $chatps . '">
                                <div class="chat-avatar">
                                    <a class="avatar m-0" data-toggle="tooltip" href="#"
                                        data-placement="right" title="" data-original-title="">
                                        <img src="' . $foto . '" onerror="this.src=\'images/user/user.png\';" alt="avatar" height="40"
                                            width="40" />
                                    </a>
                                </div>
                                <div class="chat-body">
                                    <div class="chat-content">
                                        <p>' . $row['msg'] . '</p>
                                    </div>
                                </div>
                            </div>';
            }
        }
        echo $output;
    }
} else {
    echo "";
}
?>