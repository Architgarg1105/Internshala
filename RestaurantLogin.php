<?php
include 'config.php';
if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql_u = "SELECT * FROM restaurant_details WHERE username='$username' && restaurantpassword='$password'";
  	$res_u = mysqli_query($conn, $sql_u);
    $var = mysqli_fetch_array($res_u);
    if (mysqli_num_rows($res_u) == 1) 
    {
  	    echo "successfully login"; 
        header ("Location:./AddMenuItem.php?res_id=$var[0]");
    }
    else
    {
  	  echo "Sorry not a customer yet"; 	
  	}
    
}
// else{
//     echo "Please click Register button to submit the data..";
// }
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
            margin-top: 10%;
            width: 25%;
            height: 50%;
            background-color: gainsboro;
        }
        input[type="submit"]
        {
            background-color: blue;
            color: white;
            width: 25%;
            font-size: 20px;
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
            font-weight:bold;
        }
        h2
        {
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <center>
    <div class="log-form">
        <h2>Login as Restaurant</h2>
        <form method="POST">
        <b>Username</b>
        <input type="text" name="username" placeholder="Username" required/>
        <br>
        <br>
        <b>Password</b>
        <input type="password" name="password" placeholder="Password" required/>
        <br>
        <br>
        <input type="submit" name="submit" value="Login">
        <br>
        <br>
        <br>
        Not a Registered Owner Yet?
        <a class="register" href="RestaurantRegister.php">Register</a>
        <br>
        <br>
        </form>
      </div>
    </center>
</body>
</html>