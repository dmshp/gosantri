<?php
session_start();  
$_SESSION['nm_user']=NULL;   
$_SESSION['id_user'] = 0; 
  session_destroy();
header("location:../aut/login.php");