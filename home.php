<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['remember_token'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Control Center</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
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
    <a class="navbar-brand" href="#">GUDANG ADMIN PAGE</a>
    <button type="button" class="btn btn-light"><a href="logout-user.php">Logout</a></button>
    </nav>
    <div class="profile"> 
        <button style="margin-top: 100px;" onclick="document.location='pembelian.php'"><a href="pembelian.php"> <b>BARANG</b> </button>
        <button onclick="document.location='resi.php'"><a href="resi.php"> <b>ORDER</b> </button>
        <button onclick="document.location='signup-user.php'"><a href="signup-user.php"> <b>ADD ADMIN</b> </button>
    </div>
    <h1>Welcome <?php echo $fetch_info['name'] ?></h1>
    
</body>
</html>