<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<?php
include('../../BLL/userManager.php');
    $destination = $_GET['destination'];



// echo "<table style=' border='3px' bordercolor='#050000';'>";
// echo "<tr> <th> Destination </th> <th> DepartureDate </th> <th> ReturnDate </th>  <th> Price </th> <th> Class </th> <th> Image</th></tr>";
// $result= SearchDestination($destination);


// while($row = mysqli_fetch_array($result)) {
// 	$IDFlight = $row['IDFlight'];
//     $Destination = $row['Destination'];
//     $DepartureDate = $row['DepartureDate'];
// 	$ReturnDate = $row['ReturnDate'];
// 	$Price  = $row['Price'];
// 	$Class = $row['Class'];
// 	$image = $row['Image'] ;
	
// 	echo "<tr ><td >"	. $Destination."</td><td>"	. $DepartureDate."</td><td >".$ReturnDate."</td><td >".$Price."$</td><td >".$Class."</td>  <td> <img src=".$image." style=width:100px; height:100px; >     </td><td ><a href='Insertoerderserverside.php?id=".$row["IDFlight"]."' ><button>BookNow</button></a></td></tr>";
// 	echo $IDFlight;
// } 
// echo "</table>";
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
      </tr>
    </thead>
    <?php
 $result= SearchDestination($destination);
    while($row = mysqli_fetch_array($result)) {
        $IDFlight = $row['IDFlight'];
        
        $DepartureDate = $row['DepartureDate'];
        $ReturnDate = $row['ReturnDate'];
        $Price  = $row['Price'];
        $Class = $row['Class'];
        $image = $row['Image'] ;
        $Destination = $row['Destination'];
      
     //    echo "<tr ><td >"	. $Destination."</td><td>"	. $DepartureDate."</td><td >".$ReturnDate."</td><td >".$Price."$</td><td >".$Class."</td>  <td> <img src=".$image." style=width:100px; height:100px; >     </td></tr>";
     ?>
         <tbody>
           <tr>
             <td><?php echo $row['Destination']; ?></td>
             <td><?php echo $row['DepartureDate']; ?></td>
             <td><?php echo $row['ReturnDate']; ?></td>
             <td><?php echo $row['Price']; ?></td>
             <td><?php echo $row['Class']; ?></td>
             <td><img src=<?php echo $row['Image']; ?>  class="img-rounded" alt="Cinque Terre" width="100" height="130" > </td>
			 </td><td ><a href='Checkforbook.php?id=<?php echo $row['IDFlight'] ;?>' ><button>BookNow</button></a></td>
           </tr>
        
     
          
     <?php
     }?>
     </tbody>
     </table>
     <a href="./destination.php"><div class="btn btn-warning">Back</div></a>
     </div>
     <?php
?>