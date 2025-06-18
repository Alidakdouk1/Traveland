<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Traveland - Check</title>
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
              <h1 class="mb-3 bread">Check Your Registration</h1>
              <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Check <i class="ion-ios-arrow-forward"></i></span></p>
            </div>
          </div>
        </div>
      </section>
        <?php

include('../../BLL/userManager.php');

  if(isset($_SESSION['username']))
  {
    $username=$_SESSION['username'];
    $password=$_SESSION['password'];
    $email = $_SESSION['email'];
    $password=md5($password);
    ?><div class="container">
      <h2>Flight</h2>
      <table class="table table-condensed">
      <thead>
        <tr>
          <th>Destination</th>
          <th>DepartureDate</th>
          <th>ReturnDate</th>
          <th>Price</th>
          <th>Class</th>
          <th>Image</th>
          <th>Action</th>
        </tr>
      </thead>
    <?php
    $signin= Signin($username,$email, $password);

    if($signin!= null){
      $result= getflights($_SESSION['userId']);
      while($row = mysqli_fetch_array($result)) {
        
      $IDFlight = $row['IDFlight'];
      $DepartureDate = $row['DepartureDate'];
      $ReturnDate = $row['ReturnDate'];
      $Price  = $row['Price'];
      $Class = $row['Class'];
      $image = $row['Image'] ;
      $Destination = $row['Destination'];
   ?>
       <tbody>
         <tr>
           <td><?= $row['Destination']; ?></td>
           <td><?= $row['DepartureDate']; ?></td>
           <td><?= $row['ReturnDate']; ?></td>
           <td><?= $row['Price']; ?></td>
           <td><?= $row['Class']; ?></td>
           <td><img src=<?= $row['Image']; ?>  class="img-rounded" alt="Cinque Terre" width="100" height="130" > </td>
           <td><a href='DeletRegistration.php?uid=<?= $_SESSION['userId'] ;?>&fid=<?= $IDFlight ?>' class="text-danger">Cancel flight</a></td>

         </tr>
      
   
        
   <?php
   }?>
   </tbody>
   </table>
   </div>
   <?php
}
}else{
  echo "<script type='text/javascript'>
  alert('Please Signin to check your registration');
  </script>";
}?>
    

    <script>
      document.addEventListener("DOMContentLoaded", function() {
        var firstNavLink = document.querySelector("#navLinks li:nth-child(4) a");
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