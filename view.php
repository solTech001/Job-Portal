<?php
 require_once "asset\include\session.php";
 require_once "asset\Config\dbconnect.php";
    
 $job = $_GET['view'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <!--Link  -->
      <link rel="stylesheet" href="asset\css\bootstrap5.min.css">
    <link rel="stylesheet" href="asset\css\style.css">
    <link rel="stylesheet" href="asset\lib\fontawsome\css\all.css">
</head>
<body>

    <?php
    require_once "asset/include/navbar.php";
    ?>
    <?php
        $sql = "SELECT * FROM joblist where Job_id = '$job' ";
        $query = mysqli_query($connectDB,$sql);
        $userData = mysqli_fetch_assoc($query);
      //   var_dump($userData);
    ?>


        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body>
           <section>
           <div class="container p4">
            <h3 class = "text-center"><?php echo $userData['title'];?></h3>
            <p><?php echo $userData['descriptions'];?></p>

           </div>
           </section>
        </body>
        </html>


    <section>
    <?php include_once "asset/include/footer.php"?>
    </section>
        <script src="asset\js\bootstrap.bundle.min.js"></script>
</body>
</html>