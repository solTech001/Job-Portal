<?php
    require_once "../include/session.php";
    require_once "dbconnect.php";

if (isset($_POST["Subscribe"])) {
   $email = $_POST["email"];

   $sql = "SELECT * FROM newletter WHERE email = ?";
   $stmt = mysqli_stmt_init($connectDB);
   mysqli_stmt_prepare($stmt,$sql);
   mysqli_stmt_bind_param($stmt,"s",$email);
   $execute = mysqli_stmt_execute($stmt);

   $result = mysqli_stmt_get_result($stmt);

   $numRows = mysqli_num_rows($result);

   if ($numRows > 0) {
       $_SESSION['error_msg'] = "you have already Subscribe!";
       header("Location: ../../index");}
    else {
         // Prepare SQL Statement
    $sql = "INSERT INTO newletter (email) VALUES(?)";

    // Initialize connection with database
    $stmt = mysqli_stmt_init($connectDB);

    // Prepare Connection with SQL
    mysqli_stmt_prepare($stmt,$sql);
   

    // Bind the values that will be sent to the database
    mysqli_stmt_bind_param($stmt,"s",$email);

    $execute = mysqli_stmt_execute($stmt);

    if (!$execute) {
        $_SESSION['error_msg'] = "Opps! Something went wrong";
        header("Location: ../../index");
    }else{  
        $_SESSION['success_msg'] = "Thanks for Subscribe!";
        header("Location: ../../index");
     }
    }
}
