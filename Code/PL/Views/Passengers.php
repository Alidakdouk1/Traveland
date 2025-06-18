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
        <a class="simple-text logo-normal" href="#"><span>Traveland</span></a>
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
          ?>
          <div class="container-fluid">
          <h2>Passengers </h2>
            <table class="table table-condensed">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Age</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Total Tickets</th>
                  <th>Total Payments</th>
                  <th><div class="ml-5">Action</div></th>
                </tr>
              </thead>
            </div>
          
          
            <div class="container-fluid"id="main"  >
              <div class="navbar-wrapper"  >
                <?php
    
                  $signin= Signin($username,$email,$password);
    
                  if($signin!= null){
                    $result= getPassengers();
                    $count=1;
                    while($row = mysqli_fetch_array($result)) {
                      ?>
                      <tbody >
                        <tr>
                          <td><?= $count; ?></td>
                          <td><?= $row['FirstName']; ?></td>
                          <td><?= $row['LastName']; ?></td>
                          <td><?= $row['Age']; ?></td>
                          <td><?= $row['Phone']; ?></td>
                          <td><?= $row['Email']; ?></td>
                          <td><?= $row['Tickets']; ?></td>
                          <td>$<?= $row['total_price']; ?></td>
                          <td><a href='DeletePassenger.php?id=<?= $row['PID'] ;?>' class="text-danger btn">Delete</a>
                          <a href='PassengerFlights.php?id=<?= $row['PID'] ;?>&fn=<?= $row['FirstName']; ?>&ln=<?= $row['LastName']; ?>' class="text-success btn">View</a></td>
                        </tr>
                        <?php
                        $count=$count+1;
                     }?>
                      </tbody> 
                 </table>
               </div>
              <?php
                }
              }?>
            </div>
            </div> 
         </div>
       </nav>
    </div>
  </div>
  
</body>

</html>

<?php
}else{
  header("location: index.php");
}
?>