<?php

require_once('connection.php');
$product_name =$_POST['product_name'];
$product_price =$_POST['product_price'];
$product_qty=$_POST['product_qty'];
$product_image=$_POST['product_image'];
$product_code=$_POST['product_code'];

$query = "INSERT INTO product(product_name,product_price,product_qty,product_image,product_code) VALUES('$product_name','$product_price','$product_qty','$product_image','$product_code')";
$sql = mysqli_query($db_connect,$query);

if ($sql){
   
    echo json_encode (array('message'=> 'BERHASIL DIBUAT!'));
} else {
    echo json_encode (array('message'=> 'gagal!'));
}
?>