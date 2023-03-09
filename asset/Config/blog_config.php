<?php
require_once "../include/session.php";
require_once "dbconnect.php";
date_default_timezone_set("Africa/Lagos");

if (!isset($_POST['Blog'])) {
    Header("Location: ../../index");
 }
else {
    $Blog_id = "BG".rand(100000,999999);
    $title = $_POST["title"];
    $descriptions = $_POST["descriptions"];


       // Prepare SQL Statement
       $sql = "INSERT INTO Blog (Blog_id,title,descriptions) VALUES(?,?,?)";

       // Initialize connection with database
       $stmt = mysqli_stmt_init($connectDB);
   
       // Prepare Connection with SQL
       mysqli_stmt_prepare($stmt,$sql);
       // var_dump($stmt);
   
       // Bind the values that will be sent to the database
       mysqli_stmt_bind_param($stmt,"sss",$Blog_id, $title,$descriptions);
   
       $execute = mysqli_stmt_execute($stmt);
          if (!$execute) {
           $_SESSION['error_msg'] = "Opps! Something went wrong";
           header("Location:../../portal/dashboard");
          }
          else {
           $_SESSION['success_msg'] = "Blog Added!";
           header("Location:../../portal/dashboard");
          }
    
}