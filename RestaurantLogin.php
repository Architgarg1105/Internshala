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
        <h2>Login to Add Item or to View Orders</h2>
        <form>
        <b>Username</b>
        <input type="text" name="username" placeholder="Username" required/>
        <br>
        <b>Password</b>
        <input type="password" name="password" placeholder="Password" required/>
        <br>
        <button type="submit" class="btn">Login</button>
        <br>
        Not a Registered Owner Yet?
        <a class="register" href="RestaurantRegister.html">Register</a>
        <br>
        <br>
        </form>
      </div>
    </center>
</body>
</html>