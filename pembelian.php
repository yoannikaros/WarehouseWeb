<?php
/**
 * using mysqli_connect for database connection
 */
 
$databaseHost = 'localhost';
$databaseName = 'cart_system';
$databaseUsername = 'root';
$databasePassword = '';
 
$koneksi = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

$product_name     = '';
$product_price      = '';
$product_qty       = '';
$product_image  = '';
$product_code     = '';


$sukses = '';
$error  = '';

if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = "";
}
if($op =='delete'){
    $id = $_GET['id'];
    $sql1 ="DELETE FROM product WHERE id = '$id'";
    $q1 = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil menghapus data";
    }else{
        $error = "Gagal menghapus data";
    }
}
if($op == 'edit'){
    $id     = $_GET['id'];
    $sql1   = "SELECT * FROM product WHERE id = '$id'";
    $q1     = mysqli_query($koneksi,$sql1);
    $r1     = mysqli_fetch_array($q1);
    $product_name = $r1['product_name'];
    $product_price  = $r1['product_price'];
    $product_qty  = $r1['product_qty'];
    $product_image  = $r1['product_image'];
    $product_code  = $r1['product_code'];

   

    if($product_name == ''){
        $error = "Data tidak ditemukan";
    }
}

if(isset($_POST['simpan'])){ //untuk create
    $product_name = $_POST['product_name'];
    $product_price  = $_POST['product_price'];
    $product_qty  = $_POST['product_qty'];
    $product_image  = $_POST['product_image'];
    $product_code  = $_POST['product_code'];


    if($product_name && $product_price && $product_qty && $product_image && $product_code){
        if($op == 'edit'){ //untuk update
            $sql1 = "UPDATE product SET product_name = '$product_name',product_price = '$product_price', product_qty = '$product_qty',  product_image = '$product_image',  product_code = '$product_code' where id = '$id'";
            $q1 = mysqli_query($koneksi, $sql1);
            if($q1){
                $sukses = "Data berhasil diupdate";
            }else{
                $error = "Data gagal diupdate";
            }
        }else{ //untuk insert
            $sql1 = "INSERT INTO product(product_name,product_price,product_qty,product_image,product_code) VALUES ('$product_name','$product_price','$product_qty','$product_image','$product_code')";
            $q1 = mysqli_query($koneksi, $sql1);
            if($q1){
                $sukses = "Berhasil memasukkan data baru";
            }else{
                $error = "Gagal memasukkan data";
            }
        }
       
    }else{
        $error = "Silahkan masukkan semua data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pembelian</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
        .mx-auto {width: 1000px;}
        .card {margin-top: 10px;}
    </style>
</head>

<body>
    <div class="mx-auto">
    <div class="card">
  <div class="card-header">
    Create / Edit Data
  </div>
  <div class="card-body">
      <?php
      if($error){
            ?>
            <div class="alert alert-danger" role="alert">
<?php echo $error ?>
</div>
            <?php
      }
      ?>
      <?php
      if($sukses){
            ?>
            <div class="alert alert-success" role="alert">
<?php echo $sukses ?>
</div>
            <?php
      }
      ?>
   <form action="" method="POST">
   <div class="mb-3 row">
    <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $product_name?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="product_price" class="col-sm-2 col-form-label">Product Price</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="product_price" name="product_price" value="<?php echo $product_price?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="product_qty" class="col-sm-2 col-form-label">QTY</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="product_qty" name="product_qty" value="<?php echo $product_qty?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="product_image" class="col-sm-2 col-form-label">Link Image</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="product_image" name="product_image" value="<?php echo $product_image?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="product_code" class="col-sm-2 col-form-label">Product Code</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="product_code" name="product_code" value="<?php echo $product_code?>">
    </div>
  </div>
 
 
  <div class="col-12">
      <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary"/>
  </div>
   </form>
  </div>
</div>

<div class="card">
  <div class="card-header text-white bg-secondary">
    Data Pembelian
  </div>
  <div class="card-body">
      <table class="table">
          <thead>
              <tr>
                  <th scope="col">#</th>
                  <th scope="col">Product Name</th>
                  <th scope="col">Product Price</th>
                  <th scope="col">QTY</th>
                  <th scope="col">Link Image</th>
                  <th scope="col">Product Code</th>
                 
                  <th scope="col">Aksi</th>
              </tr>
              <tbody>
                <?php
                $sql2       = "SELECT * FROM product ORDER BY id DESC";
                $q2         = mysqli_query($koneksi,$sql2);
                $urut       = 1;
                while($r2   = mysqli_fetch_array($q2)){
                    $id     = $r2['id'];
                    $product_name = $r2['product_name'];
                    $product_price  = $r2['product_price'];
                    $product_qty  = $r2['product_qty'];
                    $product_image  = $r2['product_image'];
                    $product_code  = $r2['product_code'];
                   
                    

                    ?>
                    <tr>
                        <th scope="row"><?php echo $urut++ ?></th>
                        <td scope="row"><?php echo $product_name ?></td>
                        <td scope="row"><?php echo $product_price ?></td>
                        <td scope="row"><?php echo $product_qty ?></td>
                        <td scope="row"><?php echo $product_image ?></td>
                        <td scope="row"><?php echo $product_code ?></td>
                     
                        
                        <td scope="row">
                            <a href="pembelian.php?op=edit&id=<?php echo $id?>"><button type="button" class="btn btn-warning">Edit</button></a>
                            <a href="pembelian.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Yakin ingin menghapus data?')"><button type="button" class="btn btn-danger">Delete</button></a>
                           
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
          </thead>
      </table>
  </div>
</div>
    </div>
</body>
</html>