<?php
$connection = null;
try{
    $host ="localhost";
    $username ="root";
    $password ="";
    $dbname ="cart_system";
   

    //connect
    $database = "mysql:dbname=$dbname;host=$host";
    $connection = new PDO($database,$username,$password);
    $connection ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


// if ($connection ){
//    echo "koneksi berhasil";
// }else{
 //   echo "gagal bro";
//}

}

catch (PDOException $e){
    echo "Error!".$e->getMessage();
    die;

}
?>