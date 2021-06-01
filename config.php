<?php
$hostname = "sql100.epizy.com";
$username = "epiz_28768313";
$password = "z5mdfRjcqnkngcn";
$databasename = "epiz_28768313_foodshala";

$conn = mysqli_connect($hostname, $username, $password, $databasename);
if($conn){}
else{
    echo "Connection failed..." + mysqli_connect_error();
}
?>