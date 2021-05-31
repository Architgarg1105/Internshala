<?php
include 'config.php';
?>
<?php

    include 'config.php';
    $res_id=$_GET['res_id'];
    $sql= "SELECT * FROM ordered_items WHERE restaurantid='$res_id'";
    $var = mysqli_query($conn, $sql);
    // $orders = mysqli_fetch_array($var);
    // while($ar = mysqli_fetch_assoc($orders))
    //     {
    //         $ret[] = $ar;
    //     }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        header
        {
            background-color: gainsboro;
            padding-bottom: 1%;
        }
        h1
        {
            text-align: center;
        }
        table 
        {
            margin-left:auto;
            margin-right:auto;
            width:70%;
            background-color:cyan;
            font-size:30px;
        }
        thead
        {
            font-weight:bold;
        }
        </style>
</head>
<body>
    <header>
        <h1>FoodShala</h1>
<?php 
    if (isset($_GET['res_id'])) { 
        $restau_id=$_GET['res_id'];
        $sql = "SELECT restaurantname FROM restaurant_details where restaurantid='$restau_id'";
        $res = mysqli_query($conn, $sql);
        $temp = mysqli_fetch_array($res);
        $restau_name=$temp['restaurantname'];
        ?>
            <h2 style="margin-left:5%;">
            <a href="MenuPage.php">
                <p ><button style="float:right;margin-right:10%;background-color:blue;color:white;font-weight:bold;">Log Out</button></p></a>
            <?php
            echo("Loged in as ");
            echo($restau_name);?>
            </h2>
            <?php } ?>
        </header>
        <br>
    <table border="1px">
        <thead>
            <!-- <td>Order Id</td> -->
            <td>Customer Name</td>
            <td>Item Name</td>
            <td>Price</td>
        </thead>
        <tbody>
        <?php
        while($row=$var->fetch_assoc()){
            $restaurantid=$row['restaurantid'];
                $customerid=$row['customerid'];
                $itemid=$row['itemid'];
                $sql1 = "SELECT customername FROM customer_details WHERE customerid='$customerid'";
                $res1 = mysqli_query($conn, $sql1);
                $temp1 = mysqli_fetch_array($res1);
                $sql2 = "SELECT itemname,price FROM add_item WHERE restaurantid='$restaurantid' && itemid='$itemid'";
                $res2 = mysqli_query($conn, $sql2);
                $temp2 = mysqli_fetch_array($res2);
        ?>
            <tr>
                <!-- <td><?php echo $row['orderid']?></td> -->
                <td><?php echo $temp1['customername']?></td>
                <td><?php echo $temp2['itemname']?></td>
                <td><?php echo $temp2['price']?></td>

            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>