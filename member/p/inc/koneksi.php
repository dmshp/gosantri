<?php
$host	= "localhost";
$users	= "root";
$pass	= "";
$db		= "republ23_santrigo";
$koneksi = mysqli_connect($host, $users, $pass, $db);

if (!$koneksi) {
	die ("Connection failed: " . mysqli_connect_error());
  }

