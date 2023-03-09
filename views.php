<?php
    require_once "asset/include/session.php";
    require_once "asset\Config\dbconnect.php";
    $_SESSION['view'] = $_GET['blogs'] ;
    $job = $_SESSION['view'];
    $sql = "SELECT * FROM blog WHERE Blog_id = '$job' ";
    $query = mysqli_query($connectDB,$sql);
    $blogData = mysqli_fetch_assoc($query);
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
    <section>
    <?php
    require_once "asset/include/navbar.php";
    ?>
</section>
    <section class = "container">
    <h2><?php echo $blogData["title"] ?></h2>
    <small>post on: <?php echo $blogData["time_created"] ?> </small>
    <p><?php echo $blogData["descriptions"] ?></p>

    <hr>
    <?php
        $sql = "SELECT * FROM comment WHERE blog_id = '$job'";
        $query = mysqli_query($connectDB,$sql);
        ?>
        <div class = "">
        <?php
         while ($commentData = mysqli_fetch_assoc($query)) { ?>
                <p class = "py-2"><?php echo $commentData["comment"] ;?> <small><?php echo $commentData["date_created"] ;?></small></p>
             <?php  
         }; ?>
        </div>
    <!-- comment form -->
    <div class="card p4 text-center">
        <form action="asset\Config\comment.php" method="post" class="text-center">
            <textarea name="message" id="" cols="30" rows="10" class = "d-block mb-2" style="width:100% ;"></textarea>
            <button type="submit" name = "comment" class = "d-block"> comment</button>
        </form>
    </div>
    </section>
    <script src="asset\js\bootstrap.bundle.min.js"></script>
</body>
</html>