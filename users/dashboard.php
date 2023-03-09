<?php
require_once "../asset/include/session.php";
require_once "../asset/Config/dbconnect.php";
isLoggedIn();
// user ID
    $uid = $_SESSION['user'];
    $sql = "SELECT * FROM users WHERE id = '$uid'";
    $query = mysqli_query($connectDB,$sql);
    $userData = mysqli_fetch_assoc($query);
    // var_dump($userData);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--Link  -->
    <link rel="stylesheet" href="..\asset\css\bootstrap5.min.css">
    <link rel="stylesheet" href="..\asset\css\style.css">
    <link rel="stylesheet" href="..\asset\lib\fontawsome\css\all.css">
</head>
<body>
    <section>
        <?php
          require_once "..\asset/include/dashbar.php";
        ?>
    </section>
    
    





    
    <script src="..\asset\js\bootstrap.bundle.min.js"></script>
</body>
</html>