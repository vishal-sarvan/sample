<?php 
$conn_user = "localhost:3307";
$conn_pass = "";
$connUsername = "root";
$conn_name = "stirlingrak";
$conn = mysqli_connect('localhost:3307', 'root', '', 'stirlingrak');
//$conn = new mysqli($connHost, $connUser, $connPass, $connName);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}