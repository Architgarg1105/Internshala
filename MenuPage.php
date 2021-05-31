<?php
include 'config.php';
?>
<?php
    function get_product_details()
    {
        include 'config.php';
        $ret = array();
        $sql = "SELECT * FROM add_item";
        $res = mysqli_query($conn, $sql);

        while($ar = mysqli_fetch_assoc($res))
        {
            $ret[] = $ar;
        }
        return $ret;
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
        body
        {
            background-color: rgb(37,150,190);
        }
        .navbar
        {
            flex-direction:column;
        }
        header
        {
            background-color: rgb(219, 218, 218);
            margin-bottom: 2%;
            padding-top: 1px;
        }
        h1
        {
            
            color: white;
            text-shadow: 1px 1px 2px black, 0 0 25px purple, 0 0 5px darkblue;
        }
        .register
        {
            
            display: inline;
            margin: 18%;
            background-color: 	white;
            color: red;
            width: 25%;
            height:45px;
            font-size: 20px;
            padding: 5px;
            border-radius:5px;
            font-weight:bold;
            box-shadow:
    0 0 10px 10px #fff,  /* inner white */
    0 0 10px 10px purple; /* middle magenta */
            border:2px solid black;
        }
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            text-align: center;
            font-family: arial;
            background-color:white;
        }
        .price {
            color: red;
            font-size: 22px;
            
            text-shadow: 1px 1px 2px black, 0 0 25px purple, 0 0 5px darkblue;
        }

        .restauname {
            color: black;
            font-size: 30px;
            text-shadow: 1px 1px 2px black, 0 0 25px purple, 0 0 5px darkblue;
        }
        
        .card button {
            border: none;
            outline: 0;
            padding: 12px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }
        .card button:hover {
            opacity: 0.7;
        }
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        .column {
            float: left;
            width: 24%;
            padding: 0 5px;
        }
        @media screen and (max-width: 600px) {
        .column {
            width: 100%;
            display: block;
            margin-bottom: 20px;
        }
        .orderbutton
        {
            color: black;
            display: inline;
            margin: 1%;
            padding-bottom: 5%;
            font-size: large;
        }
}   


    </style>
</head>
<body>
    <header>
        <h1 style="text-align:center;">FoodShala</h1>
        <?php 
        if (!isset($_GET['cus_id'])) {?>
        <a class="register" href="CustomerLogin.php">Login as Customer</a>
        <!-- <a class="register" href="CustomerRegister.html">Register as Customer</a> -->
        <a class="register" href="RestaurantLogin.php">Login as Restaurant</a>
        <!-- <a class="register" href="RestaurantRegister.html">Register as Restaurant Owner</a> -->
        <?php } else{ 
            $custo_id=$_GET['cus_id'];
            $sql = "SELECT customername FROM customer_details where customerid='$custo_id'";
            $res = mysqli_query($conn, $sql);
            $temp = mysqli_fetch_array($res);
            $custo_name=$temp['customername'];
            ?>
            <h1 style="margin-left:5%;">
            <a  href="MenuPage.php">
                <button class="lout" 
                    style="float:right;margin-right:10%;background-color:white;
                            color: red;width: 10%;height:45px;font-size: 25px;
                            padding: 5px;border-radius:5px;font-weight:bold;
                            box-shadow:
                                0 0 10px 10px #fff,  /* inner white */
                                0 0 10px 10px purple; /* middle magenta */
                            border:2px solid black;"
                >Log Out
                </button>
            </a>
            <?php
            echo("Loged in as ");
            echo($custo_name);?>
            </h1>
            <?php } ?>
        
        <br>
        <br>
    </header>
    <div class="menu">
        <?php 
            $products = get_product_details(); 

            foreach($products as $ap)
            {
                $itemname = $ap['itemname'];
                $price = $ap['price'];
                $restaurantid=$ap['restaurantid'];
                $itemid=$ap['itemid'];
                $sql_e = "SELECT restaurantname FROM restaurant_details WHERE restaurantid='$restaurantid'";
                $res_u = mysqli_query($conn, $sql_e);
                $restaurantname = mysqli_fetch_array($res_u);
            ?>
        <div class="column">
            <div class="card">
                <img src="https://media.istockphoto.com/photos/tasty-pepperoni-pizza-and-cooking-ingredients-tomatoes-basil-on-black-picture-id1083487948?k=6&m=1083487948&s=612x612&w=0&h=lK-mtDHXA4aQecZlU-KJuAlN9Yjgn3vmV2zz5MMN7e4=" alt="Denim Jeans" style="width:100%">
                <h1 style="text-align:center;"><?php echo $itemname; ?></h1>
                <p style="font-weight:bold;" class="price">Rs <?php echo $price; ?></p>
                <p class="restauname"><?php echo $restaurantname['restaurantname']; ?></p>
                <a <?php if (isset($_GET['cus_id'])) { ?> onclick="alert('Food Ordered');" href="FoodOrdered.php?cus_id=<?php echo $_GET['cus_id']?>&res_id=<?php echo $restaurantid?>&item_id=<?php echo $itemid?>" <?php } ?>href="CustomerLogin.php">
                <p ><button class="orderbutton">Order Now</button></p></a>
                <p><button>Add to Cart</button></p>
            </div>
        </div>
        <?php 
     } ?>

        
    </div>
</body>
</html>

