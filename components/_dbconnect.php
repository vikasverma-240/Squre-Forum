<?php
// script connect to the data base

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "squre_forum";


// Connect to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);


// connection handling
if(!$conn){
    die("Failed to connect");
}
else{
    // echo "Connected successfuly";
}


?>