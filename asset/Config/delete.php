
<?php 
require_once "../include/session.php";
require_once "dbconnect.php";
  
  if (!isset($_GET['del'])) {
    header("Location: logout");
  }else{
    $jobId =  $_GET['del'];

    $sql = "DELETE FROM joblist WHERE  Job_id = '$jobId'";
    $query = mysqli_query($connectDB,$sql);
    if (!$query) {
        $_SESSION['error_msg'] = "Opps, Something went wrong!";
        header("Location: ../../portal/dashboard");
    }else{
        $_SESSION['success_msg'] = "Records Deleted Successfully";
        header("Location: ../../portal/dashboard");
    }
  }