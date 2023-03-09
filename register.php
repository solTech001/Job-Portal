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

<body>
    <!-- Navbar -->
    <section>
        <?php include_once "asset/include/navbar.php"; ?>
    </section>

    <section>
        <div class="container register my-3">
            <form action="asset\Config\register_config.php" method="post" class="card p-3 mx-auto shadow" style="max-width: 600px;">
                <?php
                echo ErrorMsg(); echo SuccessMsg();
                ?>
                <h4 class="card-title text-center">Create an Account</h4>

                <input type="text" class="form-control mb-3" name="Sname" placeholder="Surname Name" required>
                <input type="text" class="form-control mb-3" name="fname" placeholder="First Name" required>
                <input type="email" class="form-control mb-3" name="email" placeholder="Email" required>
                <input type="tel" class="form-control mb-3" name="phone" placeholder="Phone Number" required>
                <input type="text" onfocus="this.type='date'" class="form-control mb-3" name="dob" placeholder="Date of Birth" required>
                <select name="gender" class="form-select  mb-3">
                    <option selected disabled>Gender</option>
                    <option class="form-select" >Male</option>
                    <option class="form-select">Female</option>
                </select>
                <input type="password" class="form-control mb-3" name="pass" placeholder="Password" autocomplete="off" required>
                <input type="password" class="form-control mb-3" name="conPassword" placeholder="Confirm Password" autocomplete="off" required>

                <div class="form-check my-3">
                    <input type="checkbox" id="check" class="form-check-input" required>
                    <label for="check" class="form-check-label">Do you accept these Terms and Conditions?</label>
                </div>
                <button type="submit" name="register" value="Create Account" class="btn btn-dark mb-3">Create Account</button>
    
                <p>
                    Already have an account? <a href="login" class="text-decoration-none">Login</a>
                </p>
            </form>
        </div>
    </section>
    <section>
    <?php include_once "asset/include/footer.php"?>
    </section>
    <script src="asset/js/bootstrap.bundle.min.js"></script>

</body>



</html>