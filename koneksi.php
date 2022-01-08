<?php

$host="localhost";
$user="root";
$password="";
$db="cart_system";

$kon = mysqli_connect($host,$user,$password);
if ($kon){
	echo "Database MYSQL <b>berhasil</b> dikoneksikan<br>";
}else {
	echo"Database  MYSQL <b>gagal</b> dikoneksikan<br>";
}

$hasil=mysqli_select_db($kon,$db);
if ($hasil){
	echo "Database $db berhasil dipilih,";
}else {
	echo "Database $db gagal dipilih";
}


?>