<?php

$con = new mysqli('localhost','root','','cart_system');
$st_check= $con->prepare("SELECT* FROM biodata WHERE email=? AND password=?");
$st_check->bind_param("ss",$_POST["email"],$_POST["password"]);
$st_check -> execute();
$rs=$st_check->get_result();
if ($rs -> num_rows==0){
    echo "gagal user";

}else{ echo "sukses";

}
?>