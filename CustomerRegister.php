<?php
include 'config.php';
?>

<?php
if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $contactnumber = $_POST['contactnumber'];
    $address = $_POST['address'];
    $category = $_POST['category'];
    
    $sql_u = "SELECT * FROM customer_details WHERE customername='$username'";
    $sql_e = "SELECT * FROM customer_details WHERE customerpassword='$password'";
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
        $sql = "INSERT INTO customer_details (customername, customerpassword, customercontactnumber, address, preferance) VALUES ('$username', '$password', '$contactnumber', '$address', '$category')";
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
            margin-top: 10%;
            width: 25%;
            height: 60%;
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
        <h2>Create your Customer Account!!!</h2>
        <form method="POST" action="CustomerRegister.php">
        <b>Username</b>
        <input type="text" name="username" placeholder="Username" required/>
        <br>
        <b>Password</b>
        <input type="password" name="password" placeholder="Password" required/>
        <br>
        <b>Confirm Password</b>
        <input type="password" name="confirmpassword" placeholder="Confirm Password" required/>
        <br>
        <b>Contact Number</b>
        <input type="number" name="contactnumber" placeholder="Contact Number" required/>
        <br>
        <b>Address</b>
        <input type="text" name="address" placeholder="Address" required/>
        <br>
        <b>Preferance</b>
        <input type="radio" id="veg" name="category" value="veg">
        <label for="male">Veg</label>
        <input type="radio" id="nonveg" name="category" value="nonveg">
        <label for="female">Non-Veg</label>
        <br>
        <input type="submit" name="submit" value="Register">
        <br>
        Already a Customer?
        <a class="register" href="CustomerLogin.html">Login</a>
        <br>
        <br>
        </form>
      </div>
    </center>
</body>
</html>