<?php
require_once "../asset/include/session.php";
require_once "../asset/Config/dbconnect.php";
    isLoggedIn();
    $uid = $_SESSION['user'];
        $sql = "SELECT * FROM users WHERE id = '$uid'";
        $query = mysqli_query($connectDB,$sql);
        $userData = mysqli_fetch_assoc($query);

    if (!isset($_GET['Go'])) {
        header("Location: logout");
    }else{
        $jobId =  $_GET['Go'];
        $sql = "SELECT * FROM joblist WHERE Job_id = ' $jobId' ";
        $query = mysqli_query($connectDB,$sql);
        $row = mysqli_fetch_assoc($query);
    };

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
          require_once "../asset/include/dashbar.php";
        ?>
    </section>

    <!-- Update and Delete -->
    <section class = "my-3">
            <div class = "shadow container" style="max-width: 600px;">
    <form action="..\asset\Config\update.config.php" method="POST">
                <input type="text" class="form-control mb-3" name="jobid" value = "<?php echo  $row['Job_id']; ?>" placeholder="Job ID" readonly >

                 <input type="text" class="form-control mb-3" name="Title" value = "<?php echo  $row['title']; ?>" placeholder="Job Title" >

                <input type="text" class="form-control mb-3" name="location" value = "<?php echo  $row['locations']; ?>" placeholder="location" >

                <select name="Term" value = "<?php echo  $row['term']; ?>" class="form-select  mb-3">
                    <!-- <option selected disabled>term</option> -->
                    <!-- <option class="form-select" selected disabled ></option> -->
                    <option class="form-select" >Full Time</option>
                    <option class="form-select">Part-Time</option>
                    <option class="form-select">Contract</option>
                    <option class="form-select">Internship</option>
                </select>
                <select name="Categories" value = "<?php echo  $row['Categories']; ?>" class="form-select  mb-3">                
                    <option class="form-select" >Other Remote</option>
                    <option class="form-select">Engineering</option>
                    <option class="form-select">Design</option>
                    <option class="form-select">Marketing</option>
                    <option class="form-select">Product</option>
                    <option class="form-select">Devops</option>
                    <option class="form-select">Customer Support</option>
                    <option class="form-select">Copywriting</option>
                </select>

                  <textarea name="description"  placeholder="description"    style="width:100% ;"><?php echo $row['descriptions']; ?></textarea>
               
                <button type="Submit"  name="Update" class="btn  d-block btn-primary mx-auto  mt-3 mb-3 ">Update</button>
    </form>
    </div>
</section>

  
    
    
    <script src="..\asset\js\bootstrap.bundle.min.js"></script>
    <script src="..\asset\lib\ckeditor5\build\ckeditor.js"></script>
</body>
</html>
<script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
 </script>