<?php
    include 'config.php';
    $customerid=$_GET['cus_id'];
    $restaurantid=$_GET['res_id'];
    $itemid=$_GET['item_id'];

    $sql = "INSERT INTO ordered_items (customerid, restaurantid,itemid) VALUES ('$customerid', '$restaurantid','$itemid')";
    $order = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Food Ordered</h1>
</body>
</html>