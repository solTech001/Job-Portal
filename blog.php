<?php 
    require_once "asset/include/session.php";
    require_once "asset\Config\dbconnect.php";

    
    // var_dump($blogData);

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
<body class = " posistion-relative">
<section>
<?php
require_once "asset/include/navbar.php";
?>
</section>

<section>
    <div class="container p4">
         <?php
             $sql = "SELECT * FROM blog";
             $query = mysqli_query($connectDB,$sql);
             while($blogData = mysqli_fetch_assoc($query)){ ?>
        <h6><?php echo $blogData["title"]; ?></h6>
        <p><?php echo $blogData["descriptions"];?></p>
        <a href="views.php?blogs=<?php echo $blogData['Blog_id'];?>" class="btn btn-danger btn-sm"><i class="fa fa-comment"></i></a>
    <?php } ?>
    </div>


    <section class = "position-absolute bottom-0 w-100">
    <?php include_once "asset/include/footer.php"?>
</section>
</section>
<script src="asset\js\bootstrap.bundle.min.js"></script>
</body>
</html>