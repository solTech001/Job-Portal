<?php 

require_once "asset\include\session.php";
require_once "asset\Config\dbconnect.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myJob</title>

    <!--Link  -->
    <link rel="stylesheet" href="asset\css\bootstrap5.min.css">
    <link rel="stylesheet" href="asset\css\style.css">
    <link rel="stylesheet" href="asset\lib\fontawsome\css\all.css">
</head>
<section>
<?php
require_once "asset/include/navbar.php";
?>
</section>


<?php 
        $sql = "SELECT * FROM joblist";
        $query = mysqli_query($connectDB,$sql);
        while($userData = mysqli_fetch_assoc($query)){ ?>
    <div class="card shadow text-center">
                <div class="list-jobs">
                <div>
                    <h3><a href="view.php?view=<?php echo $userData['Job_id'];?> &type = <?php echo $userData['Categories'];?>"> <?php echo $userData['title'];?> </a></h3>
                    
                    <div>
                    <p> 
                   <span><small><i class = "fa fa-map-marker pe-1"></i></small><?php echo $userData['locations'];?></span>
                    <span><?php echo $userData['term'];?></span>
                    <span> Category: <?php echo $userData['Categories'];?></span>
                  </p> 
                    </div>
                </div>
            </div>
    </div>
    <?php } ?>

    </section>









<section>
    <?php include_once "asset/include/footer.php"?>
</section>
    <script src="asset\js\bootstrap.bundle.min.js"></script>
</body>
</html>