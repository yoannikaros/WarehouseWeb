<?php
/**
 * using mysqli_connect for database connection
 */
 
$databaseHost = 'localhost';
$databaseName = 'cart_system';
$databaseUsername = 'root';
$databasePassword = '';
 
$koneksi = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

$id     = '';
$name      = '';
$email       = '';
$phone  = '';
$address     = '';
$pmode        = '';
$products        = '';
$amount_paid        = '';
$status        = '';

$sukses = '';
$error  = '';

if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = "";
}
if($op =='delete'){
    $id = $_GET['id'];
    $sql1 ="DELETE FROM orders WHERE id = '$id'";
    $q1 = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil menghapus data";
    }else{
        $error = "Gagal menghapus data";
    }
}
if($op == 'edit'){
    $id     = $_GET['id'];
    $sql1   = "SELECT * FROM orders WHERE id = '$id'";
    $q1     = mysqli_query($koneksi,$sql1);
    $r1     = mysqli_fetch_array($q1);
    $name = $r1['name'];
    $email  = $r1['email'];
    $phone  = $r1['phone'];
    $address  = $r1['address'];
    $pmode  = $r1['pmode'];
    $products  = $r1['products'];
    $amount_paid   = $r1['amount_paid'];
    $status  = $r1['status'];

   

    if($name == ''){
        $error = "Data tidak ditemukan";
    }
}

if(isset($_POST['simpan'])){ //untuk create

    $name = $_POST['name'];
    $email  = $_POST['email'];
    $phone  = $_POST['phone'];
    $address  = $_POST['address'];
    $pmode  = $_POST['pmode'];
    $products  = $_POST['products'];
    $amount_paid   = $_POST['amount_paid'];
    $status  = $_POST['status'];

    if($name && $email && $phone && $address && $pmode && $products && $amount_paid && $status){
        if($op == 'edit'){ //untuk update
            $sql1 = "UPDATE orders SET name = '$name',email = '$email', phone = '$phone',  address = '$address',  pmode = '$pmode', products = '$products', amount_paid = '$amount_paid', status = '$status' where id = '$id'";
            $q1 = mysqli_query($koneksi, $sql1);
            if($q1){
                $sukses = "Data berhasil diupdate";
            }else{
                $error = "Data gagal diupdate";
            }
        }else{ //untuk insert
            $sql1 = "INSERT INTO orders(name,email,phone,address,pmode,products,amount_paid,status) VALUES ('$name','$email','$phone','$address','$pmode','$products','$amount_paid','$status')";
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
    <label for="name" class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name="name" value="<?php echo $name?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="email" name="email" value="<?php echo $email?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="phone" class="col-sm-2 col-form-label">No HP</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $phone?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="address" class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="address" name="address" value="<?php echo $address?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="pmode" class="col-sm-2 col-form-label">pmode</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="pmode" name="pmode" value="<?php echo $pmode?>">
    </div>
  </div>
  <div class="mb-3 row">
    <label for="products" class="col-sm-2 col-form-label">Products</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="products" name="products" value="<?php echo $products?>">
    </div>
  </div>
 
  <div class="mb-3 row">
    <label for="amount_paid" class="col-sm-2 col-form-label">Total</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="amount_paid" name="amount_paid" value="<?php echo $products?>">
    </div>
  </div>

  <div class="mb-3 row">
    <label for="status" class="col-sm-2 col-form-label">Status</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="status" name="status" value="<?php echo $products?>">
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
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">No HP</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">pmode</th>
                  <th scope="col">Products</th>
                  <th scope="col">Total</th>
                  <th scope="col">Status</th>
                  <th scope="col">Aksi</th>
              </tr>
              <tbody>
                <?php
                $sql2       = "SELECT * FROM orders ORDER BY id DESC";
                $q2         = mysqli_query($koneksi,$sql2);
                $urut       = 1;
                while($r2   = mysqli_fetch_array($q2)){
                    $id     = $r2['id'];
                    $name = $r2['name'];
                    $email  = $r2['email'];
                    $phone  = $r2['phone'];
                    $address  = $r2['address'];
                    $pmode  = $r2['pmode'];
                    $products    = $r2['products'];
                    $amount_paid    = $r2['amount_paid'];
                    $status    = $r2['status'];
                    

                    ?>
                    <tr>
                        <th scope="row"><?php echo $urut++ ?></th>
                        <td scope="row"><?php echo $name ?></td>
                        <td scope="row"><?php echo $email ?></td>
                        <td scope="row"><?php echo $phone ?></td>
                        <td scope="row"><?php echo $address ?></td>
                        <td scope="row"><?php echo $pmode ?></td>
                        <td scope="row"><?php echo $products ?></td>
                        <td scope="row"><?php echo $amount_paid ?></td>
                        <td scope="row"><?php echo $status ?></td>
                        <td scope="row">
                            <a href="resi.php?op=edit&id=<?php echo $id?>"><button type="button" class="btn btn-warning">Edit</button></a>
                            <a href="resi.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Yakin ingin menghapus data?')"><button type="button" class="btn btn-danger">Delete</button></a>
                           
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