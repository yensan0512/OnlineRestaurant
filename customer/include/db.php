<?php

$con = mysqli_connect ("localhost:3307","root","","ONLINERESTAURANT"); //or trigger_error(mysql_error(),E_USER_ERROR);
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//echo "Connected successfully";
?>
