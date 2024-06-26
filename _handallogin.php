<?php

$showError = "false";

if(($_SERVER['REQUEST_METHOD'] == 'POST')){
    include 'components/_dbconnect.php';

    $email = $_POST['email'];
    $pass = $_POST['password'];


    $sql = "SELECT * FROM `squre_forum_user` WHERE forum_user_email='$email'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if($numRows == 1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass, $row['forum_user_password'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['user_email'] = $email;
            // echo "logged in". $email;
        }
        header("Location:index.php");
        
    }

}



?>