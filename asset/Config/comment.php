<?php
require_once "../include/session.php";
require_once "dbconnect.php";
date_default_timezone_set("Africa/Lagos");
$job = $_SESSION['view'];


if (isset($_POST['comment'])) {

     $message = $_POST["message"];
     $job;
     $date;
     $sql = "INSERT INTO comment (blog_id, comment, date_created) VALUES(?,?,?)";

     // Initialize connection with database
     $stmt = mysqli_stmt_init($connectDB);

     // Prepare Connection with SQL
     mysqli_stmt_prepare($stmt,$sql);
    

     // Bind the values that will be sent to the database
     mysqli_stmt_bind_param($stmt,"sss",  $job, $message, $date);

     $execute = mysqli_stmt_execute($stmt);

     if (!$execute) {
         $_SESSION['error_msg'] = "Opps! Something went wrong";
         header("Location: ../../blog");
     }else{  
         $_SESSION['success_msg'] = "Comment Added!";
         header("Location: ../../blog ");
      }
 }
 
