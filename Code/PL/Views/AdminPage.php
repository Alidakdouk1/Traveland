<?php
function CONNECTDB(){
  $dbhost="localhost";
  $dbuser="root";
  $dbpass="";
  $db="web2";
  $con=new mysqli($dbhost,$dbuser,$dbpass,$db) or die("Connection Failed:%s\n".$con -> error);
return $con;    
}

session_start();
$userId = $_SESSION['userId'];
function isAdmin($userId) {
  $con = CONNECTDB();
  $stmt = $con->prepare("select * from user WHERE IDUser = ?");
  $stmt->bind_param('i',$userId);
  $stmt->execute();
  $result = $stmt->get_result();
  while($row = $result->fetch_assoc()) {
    if ($row['type'] === 'user') {
      return false;
    }
  }
  $stmt->close();
  $con->close();
  return true; 
}
$isAdmin = isAdmin($userId);
if($isAdmin === false) {
  header('location: index.php');
  exit();
}

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
  <script>
            $(document).ready(function(){
               $("#Destination").keyup(function(){
                   var name = $("#Destination").val();
                   $.post("Searchajax.php",{
                       suggestion :name
                   },function(data,status){
                       $("#main").html(data);
                   })
               });
            });
        </script>
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
          ?>
          <div class="container-fluid">
          <h2>Flight <input type="text" name="name" id="Destination"></h2>
            <table class="table table-condensed">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Country</th>
                  <th>City</th>
                  <th>DepartureDate</th>
                  <th>ReturnDate</th>
                  <th>Price</th>
                  <th>Class</th>
                  <th>Passenger Capacity</th>
                  <th>Image</th>
                </tr>
              </thead>
            </div>
          
          
            <div class="container-fluid"id="main"  >
              <div class="navbar-wrapper"  >
                <?php
    
                  $signin= Signin($username,$email,$password);
    
                  if($signin!= null){
                    $result= ShowallFilght();
                    $count=1;
                    while($row = mysqli_fetch_array($result)) {
                      ?>
                      <tbody >
                        <tr>
                          <td><?= $count; ?></td>
                          <td><?= $row['Country']; ?></td>
                          <td><?= $row['City']; ?></td>
                          <td><?= $row['DepartureDate']; ?></td>
                          <td><?= $row['ReturnDate']; ?></td>
                          <td><?= $row['Price']; ?>$</td>
                          <td><?= $row['Class']; ?></td>
                          <td>/<?= $row['passengerCapacity']; ?></td>
                          <td><img src=<?php echo $row['Image']; ?>  class="img-rounded" alt="Cinque Terre" width="100" height="100" > </td>
                          <td><a href='DeletFlight.php?Delet=<?= $row['IDFlight'] ;?>' class="text-danger">Delete</a></td>
                          <td><a href='UpdatePage.php?Update=<?= $row['IDFlight'] ;?>'>Update</a></td>
                        </tr>
                        <?php
                        $count=$count+1;
                     }?>
                      </tbody>
                      <td>
                        <a href="AddFlight.php" class="text-success">
                          <button class="btn float-right login_btn btn-info"> Add Flight</button>
                        </a>      
                      </td>
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