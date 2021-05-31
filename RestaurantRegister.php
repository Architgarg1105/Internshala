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
         body
        {
            background-color:black;
            background: url('https://images.unsplash.com/photo-1620589125156-fd5028c5e05b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1965&q=80')no-repeat;
            height:100%;
        }
        .log-form
        {
            margin-top: 25%;
            width: 50%;
            height: 50%;
            background-color: rgba(37,150,190,0.7);
            border-radius:10%;
            margin-left:40px;
            box-shadow:
    0 0 20px 20px #fff,  /* inner white */
    0 0 30px 30px #0ff; /* middle magenta */
        }
        input[type="submit"]
        {
            background-color: 	white;
            color: red;
            width: 25%;
            font-size: 20px;
            padding: 5px;
            border-radius:5px;
            font-weight:bold;
            cursor: pointer;
            box-shadow:
    0 0 10px 10px #fff,  /* inner white */
    0 0 10px 10px #0ff; /* middle magenta */
            
        }
        input[type=text] {
            background-color: rgb(255, 255, 255);
            color: rgb(0, 0, 0);
            font-size: 30px;
            border-bottom: 5px solid red;
            width: 50%;
            height: 20px;
            margin-left:20px;
            text-align: center;
            box-shadow:
    0 0 10px 10px #fff,  /* inner white */
    0 0 10px 10px #0ff; /* middle magenta */
        }
        input[type=password] {
            background-color: rgb(255, 255, 255);
            color: rgb(0, 0, 0);
            font-size: 30px;
            border-bottom: 5px solid red;
            width: 50%;
            height: 20px;
            margin-left:20px;
            text-align: center;
            box-shadow:
    0 0 10px 10px #fff,  /* inner white */
    0 0 10px 10px #0ff; /* middle magenta */

        }
        input[type=number] {
            background-color: rgb(255, 255, 255);
            color: rgb(0, 0, 0);
            font-size: 30px;
            border-bottom: 5px solid red;
            width: 50%;
            height: 20px;
            margin-left:20px;
            text-align: center;
            box-shadow:
    0 0 10px 10px #fff,  /* inner white */
    0 0 10px 10px #0ff; /* middle magenta */

        }
        input
        {
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 5px;
            border-radius:5px;
        }
        a
        {
            margin-top: 10px;
            margin-bottom: 10px;
            font-weight:bold;
            color:gold;
            
        }
        h2
        {
            padding-top: 10px;
            color: white;
            text-shadow: 1px 1px 2px black, 0 0 25px purple, 0 0 5px darkblue;
        }
        b
        {
            font-size:35px;
            box-shadow:
    0 0 10px 10px #fff,  /* inner white */
    0 0 10px 10px #FF4500; /* middle magenta */
    color:white;
        }
        p
        {
            font-size:25px;
            font-weight:bold;
            color: white;
            text-shadow: 1px 1px 2px black, 0 0 25px purple, 0 0 5px darkblue;
        }
        .register 
        {
            color: white;
            text-shadow: 1px 1px 2px black, 0 0 25px purple, 0 0 5px darkblue;
        }
        button
        {
            background-color: 	white;
            color: red;
            width: 25%;
            height:20%;
            font-size: 20px;
            padding: 5px;
            border-radius:5px;
            font-weight:bold;
            box-shadow:
    0 0 10px 10px #fff,  /* inner white */
    0 0 10px 10px #0ff; /* middle magenta */
            border:2px solid black;
        }
    </style>
    
</head>
<body>
    <center>
    <div class="log-form">
        <h2>Create your Restaurant Account!!!</h2>
        <form method="POST" action="RestaurantRegister.php">
        <button disabled>Username</button>
        <input type="text" name="username" placeholder="Username" required/>
        <br>
        <button disabled>Password</button>
        <input type="password" name="password" placeholder="Password" required />
        <br>
        <button disabled>Confirm PWD</button>
        <input type="password" name="confirmpassword" placeholder="Confirm Password" required />
        <br>
        <button disabled>Restaurant Name</button>
        <input type="text" name="restaurantname" placeholder="Restaurant Name" required/>
        <br>
        <button disabled>Contact Number</button>
        <input type="number" name="contactnumber" placeholder="Contact Number" required/>
        <br>
        <button disabled>Address</button>
        <input type="text" name="address" placeholder="Address" required/>
        <br>
        <input type="submit" name="submit" value="Register">
        <br>
        <p>Already a Registered Restaurant?
        <a class="register" href="RestaurantLogin.php">Login</a></p>
        </form>
      </div>
    </center>
</body>
</html>
