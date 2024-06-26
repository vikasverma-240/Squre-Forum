<?php

$showError = "false";

if(($_SERVER['REQUEST_METHOD'] == 'POST')){
    include 'components/_dbconnect.php';


    $user_email = $_POST['email'];
    $user_password = $_POST['password'];
    $user_cpassword = $_POST['cpassword'];

    // Check wether this email exist
    $existSql = "SELECT * FROM `squre_forum_user` WHERE forum_user_email = '$user_email'";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
        $showError = "Email already in use";
    }
    else{
        if($user_password == $user_cpassword){
            $passHash = password_hash($user_password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `squre_forum_user` (`forum_user_email`, `forum_user_password`, `created_date`) VALUES ('$user_email', '$passHash', CURRENT_TIMESTAMP)";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
                header("location:index.php?signupsuccess=true");
                exit();
            }
        }
        else{
            $showError = "Password do not match.";
        }
    }
    // header("location:index.php?signupsuccess=false&error=$showError");

}



?>