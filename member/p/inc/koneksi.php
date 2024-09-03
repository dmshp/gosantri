<?php
$host	= "localhost";
$users	= "root";
$pass	= "";
$db		= "gosantri";
$koneksi = mysqli_connect($host, $users, $pass, $db);

if (!$koneksi) {
	die ("Connection failed: " . mysqli_connect_error());
  }

