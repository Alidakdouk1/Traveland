 <?php
include('../../BLL/userManager.php');
 if(isset($_POST['submitCheck'])){
     $username=$_POST['username'];
     $password=$_POST['password'];

     echo $username;
     echo $password;


echo "<table style=' border='3px' bordercolor='#050000';'>";
echo "<tr> <th> Destination </th> <th> DepartureDate </th> <th> ReturnDate </th>  <th> Price </th> <th> Class </th> <th> Image</th></tr>";
$result= Check($username,$password);


while($row = mysqli_fetch_array($result)) {
	$IDFlight = $row['IDFlight'];
    // $Destination = $row['Destination'];
    $DepartureDate = $row['DepartureDate'];
	$ReturnDate = $row['ReturnDate'];
	$Price  = $row['Price'];
	$Class = $row['Class'];
	$image = $row['Image'] ;
	// <td >"	. $Destination."</td>
	echo "<tr ><td>"	. $DepartureDate."</td><td >".$ReturnDate."</td><td >".$Price."$</td><td >".$Class."</td>  <td> <img src=".$image." style=width:100px; height:100px; >     </td></tr>";
} 
echo "</table>";


 }
	 

 



?> 