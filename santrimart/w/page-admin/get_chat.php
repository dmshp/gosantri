<?php
session_start();
include_once '../inc/koneksi.php';


extract($_GET);
$idSender = $_GET['idSender'];
$idReceiver = $_GET['idReceiver'];


if (isset($_GET['idSender']) && isset($_GET['idReceiver']) && $_GET['idReceiver'] != "") {
    $output = "";
		
    $sql = "UPDATE chat set status = 'read' WHERE sender_id = {$idReceiver} AND receiver_id = {$idSender}";
    mysqli_query($koneksi, $sql);

    $sql = "SELECT chat.*, tm.foto, tm.akses FROM chat LEFT JOIN tabel_member tm  
		ON chat.sender_id = tm.id_user
		WHERE (sender_id = {$idSender} AND receiver_id = {$idReceiver}) OR (sender_id = {$idReceiver} AND receiver_id = {$idSender}) ORDER BY id ASC";
    $query = mysqli_query($koneksi, $sql);
    if ($query) {
        while ($row = mysqli_fetch_assoc($query)) {
						$url = $row['akses'];
						if($row['akses'] == 'member'){
							$url = 'user';
						}else if($row['akses'] == 'admin'){
							$url = 'toko';
						}

						$chatps = "";
            if ($row['sender_id'] != $idSender) {
							$chatps = "chat-left";
						}
                if ($row['photo'] != null) {
                    $target = '../img/chat/' . $row['photo'];
                    $output .= '<div class="chat '.$chatps.'">
																	<div class="chat-avatar">
																			<a class="avatar m-0" data-toggle="tooltip" href="#"
																					data-placement="right" title="" data-original-title="">
																					<img src="../img/'.$url.'/'.$row['foto'].'" onerror="this.src=\'../img/user/user.jpg\';" alt="avatar" height="40"
																							width="40" />
																			</a>
																	</div>
																	<div class="chat-body">
																			<div class="chat-content">
																					<img src="' . $target . '" height="120" width="120"  style="cursor:pointer;" data-target="#exampleModalCenter" onClick="openImg(\'' . $target . '\')" data-toggle="modal" onerror="this.src=\'../img/user/user.jpg\';" alt="avatar"/>
																			</div>
																	</div>
																</div>';
                } else {
                    $output .= '<div class="chat '.$chatps.'">
																	<div class="chat-avatar">
																			<a class="avatar m-0" data-toggle="tooltip" href="#"
																					data-placement="right" title="" data-original-title="">
																					<img src="../img/'.$url.'/'.$row['foto'].'" onerror="this.src=\'../img/user/user.jpg\';" alt="avatar" height="40"
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