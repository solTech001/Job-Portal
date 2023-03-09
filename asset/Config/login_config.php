<?php
require_once "../include/session.php";
require_once "dbconnect.php";

if (!isset($_POST["Login"])) {
    Header("Location: ../../index");
 }
 else {
    
    $email = $_POST['email'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_stmt_init($connectDB);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt,"s",$email);
   
    $execute = mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $numRows = mysqli_num_rows($result);


    if ($numRows < 1) {
        $_SESSION['error_msg'] = "Invalid Email!";
        header("Location: ../../login");
    }else{
        // Convert the $result object to php arrays
        $row = mysqli_fetch_assoc($result);
        // print_r($row);
        $returnedPassword = $row['passwords'];
        if (!password_verify($password,$returnedPassword)) {
            $_SESSION['error_msg'] = "Incorrect Password!";
            header("Location: ../../login");
        }else{
            $_SESSION['surname'] = $row['sur_name'];
            $_SESSION['user'] = $row['id'];
            $_SESSION['success_msg'] = "Login Successful";
            if($row['user_role'] === 'user'){
                header("Location: ../../users/dashboard");
            }
           else{
                header("Location: ../../portal/dashboard");
            }
        }
    }

 }