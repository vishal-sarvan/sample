<?php
session_start();
$server = "localhost:3307";
$username="root";
$password="";
$dbname="stirlingrak";

$conn = new mysqli($server,$username,$password,$dbname);

if($conn->connect_error){
    die("Connection failed" .$conn->connect_error);
}

$query = "Delete FROM attendance";
$result = mysqli_query($conn,$query);

exit();

?>