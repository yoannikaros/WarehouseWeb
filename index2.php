<?php
/**
 * using mysqli_connect for database connection
 */
 
$databaseHost = 'localhost';
$databaseName = 'gudang';
$databaseUsername = 'root';
$databasePassword = '';
 
$koneksi = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

$barang = '';
$qty = '';
$harga = '';
$sukses = '';
$error = '';

if(isset($_GET['op'])){
    $op = $_GET['op'];
}else{
    $op = "";
}
if($op =='delete'){
    $id = $_GET['id'];
    $sql1 ="delete from pembelian where id = '$id'";
    $q1 = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil menghapus data";
    }else{
        $error = "Gagal menghapus data";
    }
}
if($op == 'edit'){
    $id     = $_GET['id'];
    $sql2   = "select * from pembelian where id = '$id'";
    $q1     = mysqli_query($koneksi,$sql2);
    $r1     = mysqli_fetch_array($q1);
    $barang = $r1['barang'];
    $qty    = $r1['qty'];
    $harga  = $r1['harga'];

    if($barang == ''){
        $error = "Data tidak ditemukan";
    }
}

if(isset($_POST['simpan'])){ //untuk create
    $barang = $_POST['barang'];
    $qty = $_POST['qty'];
    $harga = $_POST['harga'];

    if($barang && $qty && $harga){
        if($op == 'edit'){ //untuk update
            $sql1 = "update pembelian set barang = '$barang', qty = '$qty', harga = '$harga' where id = '$id'";
            $q1 = mysqli_query($koneksi, $sql1);
            if($q1){
                $sukses = "Data berhasil diupdate";
            }else{
                $error = "Data gagal diupdate";
            }
        }else{ //untuk insert
            $sql1 = "insert into pembelian(barang,qty,harga) values ('$barang','$qty','$harga')";
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
<html>
<head>
	<title>GUDANG PEMBELIAN</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">

	<h1 class="text-center">G U D A N G </h1>
	<h2 class="text-center">PEMBELIAN</h2>

	<div class="card mt-3">
	  <div class="card-header bg-primary text-white">
	    Form Input Data Mahasiswa
	  </div>
	  <div class="card-body">
	    <form method="post" action="">
	    	<div class="form-group">
	    		<label>ID</label>
	    		<input type="text" name="tno" value="<?=@$id?>" class="form-control" placeholder="input id barang di sini" required>
	    	</div>
	    	<div class="form-group">
	    		<label>Nama barang </label>
	    		<input type="text" name="tbarang" value="<?=@$barang?>" class="form-control" placeholder="Input Nama barang disini!" required>
	    	</div>
	    	<div class="form-group">
	    		<label>harga barang</label>
	    		<textarea class="form-control" name="tharga"  placeholder="Input harga barang disini!"><?=@$harga?></textarea>
	    	</div>
	    	<div class="form-group">
	    		<label>Jenis barang</label>
	    		<select class="form-control" name="tprodi">
	    			<option value="<?=@$jenis?>"><?=@$jenis?></option>
	    			<option value="makanan">makanan</option>
	    			<option value="minuman">minuman</option>
	    			<option value="cemilan">cemilan</option>
	    		</select>
	    	</div>

	    	<button type="submit" class="btn btn-success" name="bsimpan">Simpan</button>
	    	<button type="reset" class="btn btn-danger" name="breset">Kosongkan</button>

	    </form>
	  </div>
	</div>
	
	<div class="card mt-3">
	  <div class="card-header bg-success text-white">
	    Daftar Pembelian
	  </div>
	  <div class="card-body">
	    
	    <table class="table table-bordered table-striped">
	    	<tr>
	    		
	    		<th>No</th>
	    		<th>Nama barang</th>
	    		<th>Harga barang</th>
	    		<th>Jenis makanan</th>
	    		<th>Aksi</th>
	    	</tr>
	    	<?php
	    		$no = 1;
	    		$tampil = mysqli_query($koneksi, "SELECT * from database order by id desc");
	    		while($data = mysqli_fetch_array($tampil)) :

	    	?>
	    	<tr>
	    		<td><?=$no++;?></td>
	    		<td><?=$data['nama barang']?></td>
	    		<td><?=$data['harga barang']?></td>
	    		<td><?=$data['Jenis makanan']?></td>
	    		<td>
	    			<a href="index.php?hal=edit&id=<?=$data['id']?>" class="btn btn-warning"> Edit </a>
	    			<a href="index.php?hal=hapus&id=<?=$data['id']?>" 
	    			   onclick="return confirm('Apakah yakin ingin menghapus data ini?')" class="btn btn-danger"> Hapus </a>
	    		</td>
	    	</tr>
	    <?php endwhile;  ?>
	    </table>

	  </div>
	</div>
	

</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>