<?php 

$dbHost = 'localhost'; // Database host
$dbUsername = 'root'; // Database username
$dbPassword = ''; // Database password
$dbName = 'socialy'; // Database name


$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// if("$conn->connect_error")
// {
//     die("connection fail: ".$conn->connect_error);

// } else {
//     echo("connection successfull");
// }
?>