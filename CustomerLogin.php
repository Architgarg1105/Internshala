<?php
include 'config.php';
if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql_u = "SELECT * FROM customer_details WHERE customername='$username' && customerpassword='$password'";
  	$res_u = mysqli_query($conn, $sql_u);
    $var = mysqli_fetch_array($res_u);
    if (mysqli_num_rows($res_u) == 1) 
    {
  	    echo "successfully login"; 
        header ("Location:./MenuPage.php?cus_id=$var[0]");
    }
    else
    {
  	  echo "Sorry not a customer yet"; 	
  	}
    
}
else{
    echo "Please click Register button to submit the data..";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .log-form
        {
            margin-top: 15%;
            width: 25%;
            height: 50%;
            background-color: gainsboro;
        }
        .btn
        {
            background-color: blue;
            color: white;
            width: 20%;
            font-size: 20px;
            margin-top: 10px;
            margin-bottom: 30px;
            padding: 5px;
        }
        input
        {
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 5px;
        }
        a
        {
            margin-top: 10px;
            margin-bottom: 10px;
        }
        h2
        {
            margin-top: 10px;
        }
    </style>
    
</head>
<body>
    <center>
    <div class="log-form">
        <h2>Login to Order Food</h2>
        <form method="POST">
        <b>Username</b>
        <input type="text" name="username" placeholder="Username" required/>
        <br>
        <b>Password</b>
        <input type="password" name="password" placeholder="Password" required/>
        <br>
        
        <input type="submit" name="submit" value="Login">
        <br>
        Not a Customer?
        <a class="register" href="CustomerRegister.php">Register</a>
        <br>
        <br>
        </form>
      </div>
    </center>
</body>
</html>
