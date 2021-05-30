<?php
    include 'config.php';
    $sql= "SELECT * FROM ordered_items";
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
</head>
<body>

    <table border="1px">
        <thead>
            <td>Order Id</td>
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
                <td><?php echo $row['orderid']?></td>
                <td><?php echo $temp1['customername']?></td>
                <td><?php echo $temp2['itemname']?></td>
                <td><?php echo $temp2['price']?></td>

            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>