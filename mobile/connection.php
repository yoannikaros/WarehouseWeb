<?php
define ('HOST','localhost');
define ('USER','root');
define ('PASS','');
define ('DB','cart_system'); 

$db_connect = mysqli_connect(HOST,USER,PASS,DB) or die ('gagal koneksi bro');
header('Content-Type: application/json');
?>