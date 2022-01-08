<?php

require_once('connection.php');
parse_str(file_get_contents('php://input'),$value);

$id =$value['id'];
$product_name =$value['product_name'];
$product_price =$value['product_price'];
$product_qty =$value['product_qty'];
$product_image =$value['product_image'];
$product_code =$value['product_code'];


$query = "UPDATE product set product_name='$product_name',product_price='$product_price',product_qty='$product_qty', product_image='$product_image',product_code='$product_code' WHERE id='$id' ";
$sql = mysqli_query($db_connect,$query);

if ($sql){
   
    echo json_encode (array('message'=> 'BERHASIL DIUUPDATE BRO!'));
} else {
    echo json_encode (array('message'=> 'gagal!'));
}
?>