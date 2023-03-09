<?php 
require_once "../include/session.php";
require_once "dbconnect.php";
isLoggedIn();
// user ID
$uid = $_SESSION['user'];

  if (!isset($_POST['Update'])) {
    header("Location: logout");
  }
  else { 
     $Jobid   =  $_POST["jobid"];   
    $title = $_POST['Title']; 
    $location = $_POST['location'];
    $term = $_POST['Term'];
    $Categories = $_POST['Categories'];
    $description = $_POST['description'];

    
    $sql = "UPDATE joblist SET title = ?, locations = ?, term = ?,  Categories = ?,  descriptions = ? WHERE Job_id = '$Jobid'";
    $stmt = mysqli_stmt_init($connectDB);
    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt,"sssss",$title,$location,$term,$Categories,$description);
    $execute = mysqli_stmt_execute($stmt);

    
    if (!$execute) {
        $_SESSION['error_msg'] = "Opps! Something went wrong";
        header("Location:../../portal/dashboard");
    }else{
        $_SESSION['success_msg'] = "Update Successful!";
        header("Location:../../portal/dashboard");
    }

    
 }