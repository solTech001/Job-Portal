<?php 
    require_once "asset/include/session.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- Bootstrap-->
    <link rel="stylesheet" href="asset/css/bootstrap5.min.css">
   <link rel="stylesheet" href="asset/lib/fontawsome/css/all.css">
    <link rel="stylesheet" href="asset/css/style.css">
</head>

<body class = " posistion-relative">
    <!-- Navbar -->
    
    <section>
        <?php
        include_once "asset/include/navbar.php";
        ?>
    </section>

    <section>
        <div class="container register my-5">
            <form action="asset\Config\password.php" method="post" class="card p-3 mx-auto shadow" style="max-width: 600px;">
                <?php echo ErrorMsg(); echo SuccessMsg();?>
                <h4 class="card-title text-center">Reset Password</h4>
                <h6 class = "text-center">Enter new password!</h6>
                <input type="password" class="form-control mb-3" name="pass" placeholder="password" required>
                <h6 class = "text-center">confimed password</h6>
                <input type="password" class="form-control mb-3" name="Compass" placeholder="comfimed password" autocomplete="off" required>
                
                <input type="submit" name="SetPassword" value="Reset" class="btn btn-dark mb-3">
            </form>
        </div>
    </section>
    <section class = "position-absolute bottom-0 w-100">
    <?php include_once "asset/include/footer.php"?>
</section>
    <script src="asset/js/bootstrap.bundle.min.js"></script>
    <!-- <script>
        const message = document.querySelector("#messageAlert");

        if (message) {
            setTimeout(()=>{
               message.classList.add("animate__animated","animate__fadeOut");
                setTimeout(()=>{
                    message.classList.add('d-none')
                },1000)
           },3000)
        }
    </script> -->
</body>



</html>