<?php
session_start();
$_SESSION['id']= $_GET['Update'];

?>
<!doctype html>
<html lang="en">

<head>
  <title>Hello, world!</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
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
    <div class="sidebar" data-color="purple" data-background-color="BlueViolet">
      <div class="logo">
        <a class="simple-text logo-normal" href="index.html"><span >Traveland</span></a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item active  ">
                <a class="nav-link" href="AdminPage.php">
                    <i class="fa fa-plane"></i>
                    <p>Flight</p>
                </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link bg-warning" href="LogoutServerSide.php">
              <i class="material-icons">dashboard</i>
              <p>LogOut</p>
            </a>
          </li>
          <!-- your sidebar here  <i href="LogoutServerSide.php">LogOut</i>-->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
          <!-- Add your data in windw -->
            <!-- <a class="navbar-brand" href="javascript:;">Hassan AKil</a> -->
            
        <form method="post" action="Updateserverside.php" >
        <h2>Update<h2>
        <?php
        include('../../BLL/userManager.php');
          $id = $_GET['Update'];
          $row = ShowFlightById($id);
        ?>
            <label for="DepartureDate"><b>Date of departure:</b></label> 
						<input type="datetime-local" class="form-control" id="DepartureDate" name="DepartureDate" placeholder="DepartureDate" value="<?= $row['DepartureDate']?>">
						
            <label for="ReturnDate"><b>Date of return:</b></label>
            <input type="datetime-local" class="form-control" id="ReturnDate" name="ReturnDate" placeholder="ReturnDate" value="<?= $row['ReturnDate']?>">
                        			
            <label for="Price"><b>Price:</b></label>
						<input type="number" class="form-control" id="Price" name="Price" placeholder="Price" value="<?= $row['Price']?>">
            
            <label for="capacity"><b>Maximum Capacity:</b></label>
						<input type="number" class="form-control" id="capacity" name="capacity" placeholder="Capacity" value="<?= $row['passengerCapacity']?>">
					
					<div class="form-group">
						<input type="submit" value="Update" name="SubmitUpdate" id="SubmitUpdate" class="btn float-right login_btn btn-warning">
            <div  class="btn float-right login_btn btn-secondary mr-2">
              <a href="./AdminPage.php">Back</a>
            </div>
					</div>
          
				</form>
        </div>
        </div>
      </nav>
    </div>
  </div>
</body>

</html>