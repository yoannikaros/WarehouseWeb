<?php

require_once('connection.php');

$query = "SELECT * FROM product ORDER BY id DESC";
$sql = mysqli_query($db_connect,$query);

if ($sql){
    $result = array();
    while($row = mysqli_fetch_array($sql)){
        array_push($result,array(
    'id'=>$row['id'],
  'product_name'=>$row['product_name'],
    'product_price'=>$row['product_price'],
    'product_qty'=>$row['product_qty'],
    'product_image'=>$row['product_image'],
    'product_code'=>$row['product_code']


    ));

    }
    echo json_encode (array('notes' => $result));
}
?>