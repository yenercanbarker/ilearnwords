<?php
$username="root";  
$password="";  
$hostname = "localhost";  
$db = "kelimelerproje";

$baglan = new PDO("mysql:hostname=$hostname;db=$db;charset=utf8;",$username,$password);

?>