<?php
require_once "../include/session.php";
require_once "dbconnect.php";
$id = $_SESSION['email']; 
// var_dump($id);
if (!isset($_POST["SetPassword"])) {
    Header("Location: ../../setting");
 }
 else {
    $pass =  $_POST["pass"];
    $Compass = $_POST["Compass"];
    $hash = password_hash( $pass, PASSWORD_DEFAULT);
    // $hash = password_hash($password, PASSWORD_DEFAULT);

    if(strlen($pass) < 8) {
        $_SESSION['error_msg'] = "Password must be at least 8 characters!";
        header("Location: ../../password");
     }
     elseif($pass != $Compass){
         $_SESSION['error_msg'] = "Passwords do not match!";
         header("Location: ../../password");
     }
     else {
        $sql = "UPDATE users SET passwords = ? where email = '$id'";
        $stmt = mysqli_stmt_init($connectDB);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,"s", $hash);
        $execute = mysqli_stmt_execute($stmt);

        
        if (!$execute) {
            $_SESSION['error_msg'] = "Opps! Something went wrong";
            header("Location: ../../login");
        }else{
            $_SESSION['fullName'] = $fullName;
            $_SESSION['success_msg'] = "Update Successful!";
            header("Location: ../../login");
        }
        
     }

 }