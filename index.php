<?php 
    require_once "asset/include/session.php";
    require_once "asset\Config\dbconnect.php";

    $sql = "SELECT * FROM joblist";
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
    <title>myJob</title>

    <!--Link  -->
    <link rel="stylesheet" href="asset\css\bootstrap5.min.css">
    <link rel="stylesheet" href="asset\css\style.css">
    <link rel="stylesheet" href="asset\lib\fontawsome\css\all.css">
</head>
<body>
<section class = "head position-fixed w-100">
<?php
require_once "asset/include/navbar.php";
?>
</section>
<!-- hero -->
<section class="hero">
    <div class="row mt-5">
        <div class="col-md-6 col-md-4 col-md-3">
            <h3>Find your <br> <span>dream jobs.</span></h3>
            <p>Search for you dream job with the best search web platform avaliable</p>
               
            <form class="d-flex" role="search">
            <input type="text" name="" class = "form-control" placeholder ="Job title or key word">
            <!-- <input type="text" name="" class = "form-control" placeholder ="City or Zip code"> -->
            <button class="btn btn-outline-success" class = "form-control" type="submit">Search</button>
            </form>
          
        </div>
        <div class="col-md-6 col-md-4 col-md-3">
            <img src="asset\img\contact.jpg" alt="" class = "w-100">
        </div>
    </div>

</section>



<!-- jobs -->
<section class = "jobs">
<h4 class = "text-center">Explore jobs by category</h4>
<?php 
        $sql = "SELECT * FROM joblist";
        $query = mysqli_query($connectDB,$sql);
        // var_dump($job = mysqli_result($query));
        while($job = mysqli_fetch_assoc($query)
            
        ){ if ($job['Categories'] > "1" ) {
            
            }?>
    <div class = "text-center">
             <a href="category.php?categories=<?php echo $job['Categories'];?>"><?php echo $job['Categories'] ;?></a>
            <!-- <a href="#">Engineering</a>
            <a href="#">Design</a>
            <a href="#">Product</a>
            <a href="#">Marketing</a>
            <a href="#">Devops</a>
            <a href="#">Customer Support</a>
            <a href="#">Copywriting</a> -->
    </div>
    <?php } ?>
    <hr>
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
                    <span> posted on: <?php echo $userData['date_created'];?></span>
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