<?php
$username="root";  
$password="";  
$hostname = "localhost";  
$db = "kelimelerproje";

/*
//connection string with database  
$baglan = new mysqli($hostname, $username, $password, $db);

$trkarakter = "SET NAMES utf8";
$baglan->query($trkarakter);
*/

$baglan = new PDO("mysql:hostname=$hostname;db=$db;charset=utf8;",$username,$password);

?>