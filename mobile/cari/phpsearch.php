<?php
include 'config.php';
$searchErr = '';
$employee_details='';
if(isset($_POST['save']))
{
    if(!empty($_POST['search']))
    {
        $search = $_POST['search'];
        $stmt = $con->prepare("select * from orders where phone like '%$search%' or name like '%$search%'");
        $stmt->execute();
        $employee_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($employee_details);
         
    }
    else
    {
        $searchErr = "Please enter the information";
    }
    
}
 
?>
<html>
<head>
<title>Cari</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
form {
    width:800px;
    margin:50px auto;
}
.search {
    padding:8px 15px;
    width: 400px;
    background:rgba(50, 50, 50, 0.2);
    border:0px solid #dbdbdb;
}
.button {
    position:relative;
    padding:6px 15px;
    left:-8px;
    border:2px solid #53bd84;
    background-color:#53bd84;
    color:#fafafa;
}
.button:hover  {
    background-color:#fafafa;
    color:#207cca;
}

</style>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="warnain.css">
<link rel="stylesheet" href="bootstrap.css" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap-theme.css" crossorigin="anonymous">

<style>
.container{
    width:90%;
    height:100%;
    padding:10px;
}
</style>
</head>
 
<body>
    <div class="container">
  
    
    <form class="form-horizontal" action="#" method="post">
    <div class="row">
        <div class="form-group">


            <div class="search-box">

    

    <input name="search" class="search" type="text" placeholder="Cari..." required>	
  <input class="button" type="submit" name="save" value="Cari">
 

        </div>
        <br>
        <div class="form-group">
            <span class="error" style="color:red;"> <?php echo $searchErr;?></span>
        </div>
         
    </div>
    </form>
    <br/><br/>
    <h3><u>Hasil Pencarian</u></h3><br/>
    <div class="table-responsive">          
      <table  class="table">

                <?php
                 if(!$employee_details)
                 {
                    echo '<tr>No data found</tr>';
                 }
                 else{
                    foreach($employee_details as $key=>$value)
                    {
                        ?>
                    <tr>
                        <td>No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;= <?php echo $key+1;?></td>
                        </tr>
                        <tr>
                        <td>Nama  &nbsp; = <?php echo $value['name'];?></td>
                        
                        <tr>
                        <td>Telp &nbsp;&nbsp;&nbsp;&nbsp; = <?php echo $value['phone'];?></td>
                        <tr>
                        <td>Status&nbsp;&nbsp; = <?php echo $value['status'];?></td>
                    </tr>
                         
                        <?php
                    }
                     
                 }
                ?>
             

      </table>
    </div>
</div>
<script src="jquery-3.2.1.min.js"></script>
<script src="bootstrap.min.js"></script>
</body>
</html>