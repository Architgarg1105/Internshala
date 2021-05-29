<?php
include 'config.php';
?>

<?php
if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $restaurantname = $_POST['restaurantname'];
    $contactnumber = $_POST['contactnumber'];
    $address = $_POST['address'];
    
    $sql_u = "SELECT * FROM restaurant_details WHERE username='$username'";
    $sql_e = "SELECT * FROM restaurant_details WHERE restaurantpassword='$password'";
  	$res_u = mysqli_query($conn, $sql_u);
    $res_e = mysqli_query($conn, $sql_e);
    if (mysqli_num_rows($res_u) > 0) 
    {
  	  echo "Sorry... username already taken"; 	
  	}
      else if(mysqli_num_rows($res_e) > 0){
  	  echo "Sorry... password already taken"; 	
  	}
    else{
        $sql = "INSERT INTO restaurant_details (username, restaurantpassword, restaurantname, restaurantcontactnumber, address) VALUES ('$username', '$password', '$restaurantname', '$contactnumber', '$address')";
        mysqli_query($conn, $sql);
        // $fetch = mysqli_query($conn,"select * from users where email = '$email'");
        // $data = mysqli_fetch_array($fetch);
        // $id = $data['id'];
        // $sql1 = "insert into student_details (username, branch, year) values ('$id', '$branch', '$year')";
        // mysqli_query($conn,$sql1);
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
            margin-top: 5%;
            width: 25%;
            height: 65%;
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
        <h2>Create your Restaurant Owner Account!!!</h2>
        <form method="POST" action="RestaurantRegister.php">
        <b>Username</b>
        <input type="text" name="username" placeholder="Username" required/>
        <br>
        <b>Password</b>
        <input type="password" name="password" placeholder="Password" required />
        <br>
        <b>Confirm Password</b>
        <input type="password" name="confirmpassword" placeholder="Confirm Password" required />
        <br>
        <b>Restaurant Name</b>
        <input type="text" name="restaurantname" placeholder="Restaurant Name" required/>
        <br>
        <b>Contact Number</b>
        <input type="number" name="contactnumber" placeholder="Contact Number" required/>
        <br>
        <b>Address</b>
        <input type="text" name="address" placeholder="Address" required/>
        <br>
        <input type="submit" name="submit" value="Register">
        <br>
        Already a Registered Restaurant Owner?
        <a class="register" href="RestaurantLogin.html">Login</a>
        <br>
        <br>
        </form>
      </div>
    </center>
</body>
</html>