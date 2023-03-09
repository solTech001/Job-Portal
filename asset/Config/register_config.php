<?php
    require_once "../include/session.php";
    require_once "dbconnect.php";

    date_default_timezone_set("Africa/Lagos");

if (!isset($_POST["register"])) {
   Header("Location: ../../index");
}
else {
    $uid = "JB".rand(1000000,9999999);
    $surName = $_POST["Sname"];
    $Fname = $_POST["fname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $password = $_POST["pass"];
    $conPassword= $_POST["conPassword"];
    $user_role= "user";

    // $role = "user";
        $date = date("Y-m-d");
        $hash = password_hash($password, PASSWORD_DEFAULT);

        var_dump($hash);

        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_stmt_init($connectDB);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,"s",$email);
        $execute = mysqli_stmt_execute($stmt);
   
        $result = mysqli_stmt_get_result($stmt);

        $numRows = mysqli_num_rows($result);

        if ($numRows > 0) {
            $_SESSION['error_msg'] = "This email already exists!";
            header("Location: ../../login");
        }
        elseif(strlen($password) < 8) {
           $_SESSION['error_msg'] = "Password must be at least 8 characters!";
           header("Location: ../../register");
        }
        elseif($password != $conPassword){
            $_SESSION['error_msg'] = "Passwords do not match!";
            header("Location: ../../register");
        }
        else{
          
            // Prepare SQL Statement
            $sql = "INSERT INTO users (user_id,sur_name,fname,email,phone,dob,gender,passwords,user_role,date_created) VALUES(?,?,?,?,?,?,?,?,?,?)";

            // Initialize connection with database
            $stmt = mysqli_stmt_init($connectDB);

            // Prepare Connection with SQL
            mysqli_stmt_prepare($stmt,$sql);
           

            // Bind the values that will be sent to the database
            mysqli_stmt_bind_param($stmt,"ssssssssss",$uid,$surName,$Fname,$email,$phone,$dob,$gender,$hash,$user_role,$date);

            $execute = mysqli_stmt_execute($stmt);

            if (!$execute) {
                $_SESSION['error_msg'] = "Opps! Something went wrong";
                header("Location: ../../register");
            }else{  
                $_SESSION['success_msg'] = "Registration Successful!";
                header("Location: ../../login");
             }
        }
        
    
}