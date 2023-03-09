<?php
require_once "../include/session.php";
require_once "dbconnect.php";
date_default_timezone_set("Africa/Lagos");

if (!isset($_POST['post'])) {
    Header("Location: ../../index");
 }

 else {
    $Job_id = rand(100000,999999);
    $title = $_POST["title"];
    $location = $_POST["location"];
    $term = $_POST["term"];
    $Categories = $_POST["Categories"];
    $description = $_POST["description"];
    $date = date("Y-m-d");
    
    // Prepare SQL Statement
    $sql = "INSERT INTO joblist(Job_id,title,locations,term,Categories,descriptions,date_created) VALUES(?,?,?,?,?,?,?)";

    // Initialize connection with database
    $stmt = mysqli_stmt_init($connectDB);

    // Prepare Connection with SQL
    mysqli_stmt_prepare($stmt,$sql);
    // var_dump($stmt);

    // Bind the values that will be sent to the database
    mysqli_stmt_bind_param($stmt,"issssss",$Job_id, $title, $location, $term,$Categories,$description,$date);

    $execute = mysqli_stmt_execute($stmt);
       if (!$execute) {
        $_SESSION['error_msg'] = "Opps! Something went wrong";
        header("Location:../../portal/dashboard");
       }
       else {
        $_SESSION['success_msg'] = "Job Added!";
        header("Location:../../portal/dashboard");
       }
 }
