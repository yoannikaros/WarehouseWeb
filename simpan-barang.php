<?php
//Include file koneksi ke database
include "koneksi.php";

//menerima nilai dari kiriman form input-barang 
$product_name=$_POST["product_name"];
$product_price=$_POST["product_price"];
$product_qty=$_POST["product_qty"];
$product_image=$_POST["product_image"];
$product_code=$_POST["product_code"];


//Query input menginput data kedalam tabel barang
  $sql="insert into product (product_name,product_price,product_qty,product_image,product_code) values
		('$product_name','$product_price','$product_qty','$product_image','$product_code')";

//Mengeksekusi/menjalankan query diatas	
  $hasil=mysqli_query($kon,$sql);

//Kondisi apakah berhasil atau tidak
  if ($hasil) {
	echo "Berhasil insert data";
	exit;
  }
else {
	echo " Gagal insert data";
	exit;
}  

?>