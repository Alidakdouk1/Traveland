<?php
session_start();
?>
<?php if(isset($_SESSION['username']) &&
        isset($_SESSION['email']) &&
        isset($_SESSION['password'])){
?>

<!doctype html>
<html lang="en">

<head>
  <title>Traveland - Admin</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

  <!-- Material Kit CSS -->
  <link href="../Styles/material-dashboard.css" rel="stylesheet" />
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
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a class="simple-text logo-normal" href="index.html"><span>Traveland</span></a>
        <!-- <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
        </a> -->
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="AdminPage.php">
              <i class="fa fa-plane"></i>
              <p>Flight</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="Passengers.php">
              <i class="fa fa-user"></i>
              <p>Passengers</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link bg-warning" href="LogoutServerSide.php">
              <i class="material-icons">dashboard</i>
              <p>LogOut</p>
            </a>
          </li>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    
    <div class="main-panel" >
    
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      
      
        <div class="container-fluid">
          <?php
            include('../../BLL/userManager.php');
            if(isset($_SESSION['username']))
            {
              $username=$_SESSION['username'];
              $password=$_SESSION['password'];
              $email=$_SESSION['email'];
              $password= $password=md5($password);
              $fullname = $_GET['fn'] .' '. $_GET['ln'];
          ?>
             <div class="container">
                     <h2><?= $fullname?>'s Flights</h2>
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
                    $result0 = getPassengerById($_GET['id']);
                    $row0 = mysqli_fetch_array($result0);
                    
                    $result= getflights($row0['user_id']);
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
                 
                <a href="./Passengers.php"><div  class="btn float-left btn-primary mr-2">Back</div></a>
                
                 </div>
            </div> 
         </div>
       </nav>
    </div>
  </div>
  
</body>

</html>

<?php
} 
}
}else{
  header("location: index.php");
}
?>