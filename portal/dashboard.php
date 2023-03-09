<?php
require_once "../asset/include/session.php";
require_once "../asset/Config/dbconnect.php";
isLoggedIn();
// user ID
    $uid = $_SESSION['user'];
    $sql = "SELECT * FROM users WHERE id = '$uid'";
    $query = mysqli_query($connectDB,$sql);
    $userData = mysqli_fetch_assoc($query);
    //  var_dump($userData);

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
    <section class = "position-fixed top-0" style = "width:100%;">
        <?php
          require_once "../asset/include/dashbar.php";
        ?>
    </section>

    <!-- Sidebar -->
    <div class="sidebar position-fixed left-0 top-0" style = "width:150px; margin-top:55px; height:100%; z-index:999; background:blue;">
        <div>
            <ul style = "list-style:none; color:white; line-height:60px;    text-transform: uppercase;
 padding-top:70px;">
                <li  class="list-item" id="PostJ"><button class = "btn btn-light">Post Job</button></li>
                <li class="list-item" id="UpdateJ"><button  class = "btn btn-light">Update Job</button></li>
                <li class="list-item" id="DeleteJ"><button class = "btn btn-light">Delete Job</button></li>
                <li class="list-item" id="PostB"><button class = "btn btn-light">Post Blog</button></li>
            </ul>
        </div>
    </div>

    <section class = "side-Left" style = "margin-right:-80px; margin-top:70px">
            <!-- Post Jobs -->

    <section class = "my-5  PostaJob">
            <div class = "shadow container" style="max-width: 600px;">
            <?php
                echo ErrorMsg(); echo SuccessMsg();
            ?>
            <h3 class = "text-center text-primary pt-3">Post a Job</h3>
        <form action="..\asset\Config\joblist_config.php" method="post" class = "text-center">
                <input type="text" class="form-control mb-3" name="title" placeholder="Job Title" >
                <input type="text" class="form-control mb-3" name="location" placeholder="location" >
                <select name="term" class="form-select  mb-3">
                    <option selected disabled>term</option>
                    <option class="form-select" >Full Time</option>
                    <option class="form-select">Part-Time</option>
                    <option class="form-select">Contract</option>
                    <option class="form-select">Internship</option>
                </select>
                <select name="Categories" class="form-select  mb-3">
                    <option selected disabled>categoris</option>
                    <option class="form-select" >Other Remote</option>
                    <option class="form-select">Engineering</option>
                    <option class="form-select">Design</option>
                    <option class="form-select">Marketing</option>
                    <option class="form-select">Product</option>
                    <option class="form-select">Devops</option>
                    <option class="form-select">Customer Support</option>
                    <option class="form-select">Copywriting</option>
                </select>
                  <!-- <textarea name="description"  placeholder="description"   style="width:580px ; height:200px;"></textarea> -->
                <textarea name="description"  placeholder="description"  required style="width:100% ;"></textarea>

                <button type="Submit"  name="post" value="Create Account" class="btn  d-block btn-primary mx-auto  mt-3 mb-3 ">Post</button>
            </form>
            </div>
    </section>
    <!-- post Jobs End -->
    
    <!-- Updata and Delete Start -->
    <div class="container Delete d-none">
    <div class="card table-responsive mt-4 shadow p-2">
    <?php
     echo ErrorMsg(); echo SuccessMsg();
    ?>
        <p class = "text-center fs-4">Updata and Delete Job</p>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Job Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Locations</th>
                        <th scope="col">term</th>
                        <th scope="col">Categories</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql = "SELECT * FROM joblist";
                        $query = mysqli_query($connectDB,$sql);
                        while($row = mysqli_fetch_assoc($query)){ ?>
                        <tr>
                            <th scope="row"><?php echo $row['Job_id']; ?></th>
                            <td><?php echo $row['title']; ?></td>
                            <td><?php echo $row['locations']; ?></td>
                            <td> <?php echo $row['term']; ?></td>
                            <td> <?php echo $row['Categories']; ?></td>
                            <!-- <td> <?php echo $row['descriptions']; ?></td> -->
                            <td>
                                <a href="views.php?Go=<?php echo $row['Job_id']; ?>" class="btn btn-primary btn-sm " onclick="return confirm('Are you sure you want to View <?php echo strtoupper($row['title']); ?> ?')">
                                    <i class="fa fa-eye"></i>
                                </a>


                                <!-- <a href="..\asset\Config\update.config.php?Edit=<?php echo $row['Job_id']; ?>" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to update <?php echo strtoupper($row['title']); ?> ?')"><i class="fa fa-edit"></i></a> -->

                                <a href="..\asset\Config\delete.php?del=<?php echo $row['Job_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete <?php echo strtoupper($row['title']); ?> Job?')"><i class="fa fa-trash"></i></a>
                                
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Update and Delete End -->

    <!-- Blog -->
    <section class = "my-3  Blog d-none">
            <div class = "shadow container" style="max-width: 600px;">
            <?php
                echo ErrorMsg(); echo SuccessMsg();
            ?>
            <h3 class = "text-center text-primary pt-3">Post a Blog</h3>
        <form action="..\asset\Config\blog_config.php" method="post" class = "text-center">
                <input type="text" class="form-control mb-3" name="title" placeholder="Blog title" >
                <textarea name="descriptions" class="form-control mb-3"  placeholder="description"  required ></textarea>
                <!-- <input type="file"> -->
                <button type="Submit"  name="Blog"  class="btn  d-block btn-primary mx-auto  mt-3 mb-3 ">Post</button>
            </form>
            </div>
    </section>
    <!-- blog end -->
    </section>

    <script src="..\asset\js\bootstrap.bundle.min.js"></script>
    <script src="..\asset\lib\ckeditor5\build\ckeditor.js"></script>
</body>
</html>
<!-- <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
 </script> -->
 <script src="..\asset\js\formvalidation.js"></script>

    <style>
        ul:hover list-item{
            background:white;
        }

    </style>


 <script>
    const Postj = document.querySelector("#PostJ")
    const UpdateJ = document.querySelector("#UpdateJ")
    const DeleteJ = document.querySelector("#DeleteJ")
    const PostB = document.querySelector("#PostB")

    const PostaJob = document.querySelector(".PostaJob")
    const Delete = document.querySelector(".Delete")
    const Blog = document.querySelector(".Blog")


Postj.addEventListener('click',()=>{
    PostaJob.classList.remove('d-none')
    Delete.classList.add('d-none')
    Blog.classList.add('d-none')
})	
UpdateJ.addEventListener('click',()=>{
    PostaJob.classList.add('d-none')
    Delete.classList.remove('d-none')
    Blog.classList.add('d-none')
})	
DeleteJ.addEventListener('click',()=>{
    PostaJob.classList.add('d-none')
    Delete.classList.remove('d-none')
    Blog.classList.add('d-none')
})	
PostB.addEventListener('click',()=>{
    PostaJob.classList.add('d-none')
    Delete.classList.add('d-none')
    Blog.classList.remove('d-none')
})	

 </script>