<?php
include 'config.php';
?>

<?php
if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $itemname = $_POST['itemname'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    
    $sql_u = "SELECT * FROM restaurant_details WHERE username='$username' && restaurantpassword='$password'";
    $sql_e = "SELECT * FROM add_item WHERE itemname='$itemname'";
  	$row = mysqli_query($conn, $sql_u);
    $restaurantid = mysqli_fetch_array($row);
    $resid=$restaurantid['restaurantid'];
    $res_e = mysqli_query($conn, $sql_e);
    if (mysqli_num_rows($res_e) > 0) 
    {
  	  echo "Sorry... itemname already taken"; 	
  	}
    else{
        $sql = "INSERT INTO add_item (restaurantid, itemname, price, category) VALUES ('$resid', '$itemname', '$price', '$category')";
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
        h2
        {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <center>
        <div class="log-form">
            <h2>Add Items In Your Menu</h2>
            <form method="POST" action="AddMenuItem.php">
            <b>Username</b>
            <input type="text" name="username" placeholder="Username" required/>
            <br>
            <b>Password</b>
            <input type="password" name="password" placeholder="Password" required />
            <br>
            <b>Item Name</b>
            <input type="text" name="itemname" placeholder="Item Name" required/>
            <br>
            <b>Price</b>
            <input type="password" name="price" placeholder="Price" required/>
            <br>
            <b>Category</b>
            <input type="password" name="category" placeholder="Veg/Non-Veg" required/>
            <br>
            <input type="submit" name="submit" value="Submit">
            <br>
            </form>
          </div>
        </center>
</body>
</html>