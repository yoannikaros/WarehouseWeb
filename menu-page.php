<h3> Data User </h3>

<table border="1">
    <tr>
        <th>No </th>
        <th>Nama </th>
        <th>Email </th>
        <th>Telepon </th>
        <th>Alamat </th>
        <th colspan="2">Aksi</th>
    </tr>

    <?php
    include "connection.php";

    $no=1;
    $ambildata = mysqli_query($con,"SELECT * from biodata");
    while($tampil = mysqli_fetch_array($ambildata)){
        echo "
        <tr>
            <td>$no</td>
            <td>$tampil[nama_pelanggan]</td>
            <td>$tampil[email]</td>
            <td>$tampil[nohp]</td>
            <td>$tampil[lokasi]</td>
            <td><a href='?kode=$tampil[nama_pelanggan]'> Hapus </a></td>
            <td><a href='barang-ubah.php?kode=$tampil[nama_pelanggan]'> Ubah </a></td>
        <tr>";
        $no++;
    }
    ?>
    </table>

    <?php
    include "connection.php";

    if(isset($_GET['kode'])){
    mysqli_query($con,"DELETE  from biodata where nama_pelanggan='$_GET[kode]'");
    
    echo "Data berhasil dihapus";
    echo "<meta http-equiv=refresh content=2;URL='menu-page.php'>";

    }
    ?>