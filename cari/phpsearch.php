
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gudang</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="warnain.css">
<link rel="stylesheet" href="bootstrap.css" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap-theme.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .container{
    width:70%;
    height:30%;
    padding:20px;
}
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
    nav{
        padding-left: 100px!important;
        padding-right: 100px!important;
        background: rgb(30, 132, 226);
        font-family: 'Poppins', sans-serif;
    } 
    nav a.navbar-brand{
        color: #fff;
        font-size: 30px!important;
        font-weight: 500;
    }
    button a{
        color: black;
        font-weight: 500;
    }
    button a:hover{
        text-decoration: none;
    }
    h1{
        position: absolute;
        top: 95%;
        left: 124%; 
        width: 100%;
        transform: translate(-50%, -50%);
        font-size: 25px;
        font-weight: 600;
    }
    .profile button a{
        color: black;
    }
    .profile button{
        background-color: rgb(168, 228, 28);
        border: none;
        margin-top: 2%;
        margin-left: auto;
        margin-right: auto;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        font-size: 18px;
        cursor: pointer;
        width: 200px;
        display: block;
        -webkit-transition-duration: 0.4s;
        transition-duration: 0.4s;
    }
    .profile button:hover{
        background-color: yellow;
        box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    }
    </style>
</head>
<body>
    <nav class="navbar">
    <a class="navbar-brand" href="#">GUDANG</a>
    <button type="button" class="btn btn-light"><a href="home.php">Admin</a></button>
    <button type="button" class="btn btn-light"><a href="cart.php">Keranjang</a></button>
    <button type="button" class="btn btn-light"><a href="cari/">Cek</a></button>
    </nav>
    
<!-- Displaying Products Start -->

<div class="container">
  
    <br/><br/>
    <form class="form-horizontal" action="#" method="post">
    <div class="row">
        <div class="form-group">


            <div class="search-box">

    <input width="40px" type="text" name="search"  class="main-input main-name" placeholder="Type to Search...">
  </div>
  <button id="main-submit" type="submit" name="save" value="Cari" ></i>Cari</button>


        </div>
        <div class="form-group">
            <span class="error" style="color:red;"> <?php echo $searchErr;?></span>
        </div>
         
    </div>
    </form>
    <br/><br/>
    <h3><u>Search Result</u></h3><br/>
    <div class="table-responsive">          
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Phone No</th>
            <th>status</th>
          </tr>
        </thead>
        <tbody>
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
                        <td><?php echo $key+1;?></td>
                        <td><?php echo $value['name'];?></td>
                        <td><?php echo $value['phone'];?></td>
                        <td><?php echo $value['status'];?></td>
                    </tr>
                         
                        <?php
                    }
                     
                 }
                ?>
             
         </tbody>
      </table>



    </div>

    
</body>
</html>