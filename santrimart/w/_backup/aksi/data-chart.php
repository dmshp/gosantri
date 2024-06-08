<?php

header('Content-Type: application/json');
include "../inc/koneksi.php";

// $query = sprintf("SELECT COUNT(nm_user) FROM ")

$query = sprintf("SELECT count(*) as total_member from tabel_member");
$result = $koneksi->query($query);
$data = array();
foreach ($result as $row) {
    $data[] = $row;
}
$result->close();
print json_encode($data);