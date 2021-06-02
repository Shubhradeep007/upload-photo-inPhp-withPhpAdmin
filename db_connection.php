<?php
$servername = "servername";
$username = "username";
$password = "password";
$database = "Database name";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
    // echo "Connection was successful<br>";
}


?>
