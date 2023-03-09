<nav class="navbar navbar-expand-lg bg-light ">
  <div class="container-fluid">
    <a class="navbar-brand" href="dashboard.php">myJob</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Community</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Jobs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Talents</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">FAQ- Employer</a>
        </li> -->
       
        <?php
            if($userData["user_role"]  != 'admin') {?>
            <li class="nav-item">
              <a class="nav-link" href="#">Build Resume</a>
            </li>
            <?php }?>
      </ul>

           
      <a href="..\asset\Config\logout.php" class="nav-link d-flex align-items-center gap-2  pe-3 ">
                <!-- <i class="fa fa-user-plus fs-5"></i> -->
                <span>Logout</span>
      </a>     
    </div>
  </div>
</nav>

