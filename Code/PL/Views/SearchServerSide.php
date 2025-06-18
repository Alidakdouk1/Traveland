<?php session_start(); 

  if(isset( $_SESSION['userId'])){
    $user_id = $_SESSION['userId'];

?>


<!doctype html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title>Traveland - Search</title>
</head>

<body>
<?php
include('../../BLL/userManager.php');


if(isset($_POST['submit']) || isset($_GET['destination'])){
   

    if(isset($_GET['destination'])){
      $destination = $_GET['destination'];
    }else{
       $destination = $_POST['Search'];
    }



?>
<div class="container">
  <h2>Flight</h2>
  <table class="table table-condensed">
    <thead>
      <tr>
        <th>Destination</th>
        <th>DepartureDate</th>
        <th>ReturnDate</th>
        <th>Price</th>
        <th>Class</th>
        <th>Passenger Capacity</th>
        <th>Image</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php
    $result = SearchDestination($destination);
    $BFs = bookedflights();
    while($row = mysqli_fetch_array($result)) {
        $IDFlight = $row['IDFlight'];
        $DepartureDate = $row['DepartureDate'];
        $ReturnDate = $row['ReturnDate'];
        $Price = $row['Price'];
        $Class = $row['Class'];
        $image = $row['Image'];
        $Destination = $row['Destination'];
        $numPassengers = $row['num_of_passengers'];
        $capsNum =  $row['passengerCapacity'];
        $isBooked = false;
        foreach($BFs as $BF){
            if($BF[0] == $user_id && $BF[1] == $IDFlight){
                $isBooked = true;
                break;
            }
        }
        ?>
        <tr>
          <td><?= $Destination; ?></td>
          <td><?= $DepartureDate; ?></td>
          <td><?= $ReturnDate; ?></td>
          <td><?= $Price; ?></td>
          <td><?= $Class; ?></td>
          <td><?= $numPassengers ?>/<?= $capsNum; ?></td>
          <td><img src="<?= $image; ?>" class="img-rounded" alt="Cinque Terre" width="100" height="130"></td>
          <td>
            <?php if($isBooked) { ?>
              Already Booked
            <?php } else { ?>  
              <a href='Checkforbook.php?id=<?= $IDFlight; ?>'><button class="btn btn-primary"  <?php if($numPassengers >= $capsNum) echo 'disabled'; ?>>Book Now</button></a>
            <?php  } ?>
          </td>
          
        </tr>
        <?php
    }
    ?>
    
    </tbody>
  </table>
  <a href="./destination.php"><div class="btn btn-warning">Back</div></a>
</div>
<?php
}
?>
</body>
</html>
<?php }else{
  header("Location: Login1.php");
}
?>