<?php
require_once "../include/session.php";
require_once "dbconnect.php";

if (!isset($_POST["Reset"])) {
    Header("Location: ../../index");
 }
 else{
     $email = $_POST["email"];
    
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_stmt_init($connectDB);

        mysqli_stmt_prepare($stmt,$sql);

        mysqli_stmt_bind_param($stmt,"s",$email);
    
        var_dump($execute = mysqli_stmt_execute($stmt));

         $result = mysqli_stmt_get_result($stmt);

        $numRows = mysqli_num_rows($result);

        // var_dump( $result);
        if ($numRows < 1) {
            $_SESSION['error_msg'] = "Email does not exit!";
            header("Location: ../../index");
        }
        else{
             header("Location: ../../password");
            $_SESSION['email'] = $email;
        }
 }