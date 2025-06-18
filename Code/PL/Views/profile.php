<!DOCTYPE html>
<html lang="en">

<head>
    <title>Traveland - Profile</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="../Styles/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="../Styles/css/animate.css">

    <link rel="stylesheet" href="../Styles/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../Styles/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../Styles/css/magnific-popup.css">

    <link rel="stylesheet" href="../Styles/css/aos.css">

    <link rel="stylesheet" href="../Styles/css/ionicons.min.css">

    <link rel="stylesheet" href="../Styles/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../Styles/css/jquery.timepicker.css">


    <link rel="stylesheet" href="../Styles/css/flaticon.css">
    <link rel="stylesheet" href="../Styles/css/icomoon.css">
    <link rel="stylesheet" href="../Styles/css/style.css">
</head>

<body>
    <!-- start nav -->
    <?php include("inc/nav.php") ?>
    <!-- END nav -->
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('../Assets/bg_2.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-9 ftco-animate pb-5 mb-5 text-center">
                    <h1 class="mb-3 bread">User Profile</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Check <i class="ion-ios-arrow-forward"></i></span></p>
                </div>
            </div>
        </div>
    </section>
    <?php
     
    include('../../BLL/userManager.php');
    if (isset($_SESSION['username'])) {
       
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $email = $_SESSION['email'];
        $password = md5($password);
        
    
    ?>
        <div class="container">
            
                <?php
                $signin = Signin($username, $email, $password);
                if ($signin != null) {
                    $result = getUserInfo($username, $email, $password);
                    while ($row = mysqli_fetch_array($result)) {
                        // echo '<pre>';
                        // print_r($row);
                        // echo '</pre>';
                        // exit;
                        $userId = $row['IDUser'];
                        $username = $row['Username'];
                        $email = $row['Email'];
                ?>
        <div class="row mb-5 mt-3">
           <div class="card col-6" style="width: 30rem;border: none;">
             <div class="card-body">
              <h6>Username: </h6>
               <h5 class="card-title text-info">@<?=$username?></h5>
               <p class="card-text">Hello ! this is your profile info you can change your email and the password anytime you feel insecure</p>
             </div>
             <ul class="list-group list-group-flush">
               <li class="list-group-item">Email: <?="<h3 class='text-info'>${email}</>"?></li>
             </ul>
           </div>
          <div class="col-6">             
           <form method="post" action="ChangeEmailServerSide.php" class="mt-3">
                <h2 class="text-secondary">Change Email</h2>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">New Email address</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Current Password</label>
                <input type="password" class="form-control" name="current_pass">
                <input type="text" value="<?= $password ?>" name="password" hidden>
                <input type="text" value="<?= $userId ?>" name="userId" hidden>
             </div>
              
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
           
            </form>
            </div> 
           <div class="col-6">            
           <form method="post" action="ChangePassServerSide.php">
              <h2 class="text-secondary">Change Password</h2>
              <div class="mb-3">
                <label class="form-label">New Password</label>
                <input type="password" class="form-control" name="newPass">
             </div>
              <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="conPass">
             </div>
              <div class="mb-3">
                <label class="form-label">Current Password</label>
                <input type="password" class="form-control" name="current_pass">
             </div>
              <input type="text" value="<?= $password ?>" name="password" hidden>
              <input type="text" value="<?= $userId ?>" name="userId" hidden>
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
            </div> 
            </div>  
           <?php } ?>
        </div>
<?php
                }
            } else {
                echo "<script type='text/javascript'>
  alert('Please Signin to check your info');
  </script>";
            } ?>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        var firstNavLink = document.querySelector("#navLinks li:nth-child(5) a");
        if (firstNavLink) {
            firstNavLink.classList.add('active');
        }
    });
</script>

<script src="../Scripts/js/jquery.min.js"></script>
<script src="../Scripts/js/jquery-migrate-3.0.1.min.js"></script>
<script src="../Scripts/js/popper.min.js"></script>
<script src="../Scripts/js/bootstrap.min.js"></script>
<script src="../Scripts/js/jquery.easing.1.3.js"></script>
<script src="../Scripts/js/jquery.waypoints.min.js"></script>
<script src="../Scripts/js/jquery.stellar.min.js"></script>
<script src="../Scripts/js/owl.carousel.min.js"></script>
<script src="../Scripts/js/jquery.magnific-popup.min.js"></script>
<script src="../Scripts/js/aos.js"></script>
<script src="../Scripts/js/jquery.animateNumber.min.js"></script>
<script src="../Scripts/js/bootstrap-datepicker.js"></script>
<script src="../Scripts/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="../Scripts/js/google-map.js"></script>
<script src="../Scripts/js/main.js"></script>
</body>

</html>