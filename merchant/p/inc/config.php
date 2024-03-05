<!--?php
$host	= "localhost";
$users	= "root";
$pass	= "";
$db		= "smartcity";
$koneksi= mysqli_connect($host, $users, $pass, $db) or die(mysqli_error());
if (!$koneksi){
	echo "KONEKSI DATABASE GAGAL";
}
?-->
<!--?php
	define('db_host','localhost');
	define('db_user','root');
	define('db_pass','');
	define('db_name','gmaps');
	
	mysql_connect(db_host,db_user,db_pass);
	mysql_select_db(db_name);
	
?-->