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
        .navbar
        {
            flex-direction:column;
        }
        header
        {
            background-color: gainsboro;
            margin-bottom: 2%;
        }
        h1
        {
            text-align: center;
        }
        a
        {
            color: black;
            display: inline;
            margin: 16%;
            padding-bottom: 5%;
            font-size: large;
        }
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            text-align: center;
            font-family: arial;
        }
        .price {
            color: grey;
            font-size: 22px;
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
}   


    </style>
</head>
<body>
    <header>
        <h1>FoodShala</h1>
        <a class="register" href="CustomerLogin.html">Login / Register as Customer</a>
        <!-- <a class="register" href="CustomerRegister.html">Register as Customer</a> -->
        <a class="register" href="RestaurantLogin.html">Login / Register as Restaurant Owner</a>
        <!-- <a class="register" href="RestaurantRegister.html">Register as Restaurant Owner</a> -->
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
                $restaurantname=$ap['restaurantid']
            ?>
        <div class="column">
            <div class="card">
                <img src="https://media.istockphoto.com/photos/tasty-pepperoni-pizza-and-cooking-ingredients-tomatoes-basil-on-black-picture-id1083487948?k=6&m=1083487948&s=612x612&w=0&h=lK-mtDHXA4aQecZlU-KJuAlN9Yjgn3vmV2zz5MMN7e4=" alt="Denim Jeans" style="width:100%">
                <h1<?php echo $itemname; ?></h1>
                <p class="price">Rs <?php echo $price; ?></p>
                <p><?php echo $restaurantname; ?></p>
                <p><button>Order Now</button></p>
                <p><button>Add to Cart</button></p>
            </div>
        </div>
        <?php 
     } ?>

        
    </div>
</body>
</html>