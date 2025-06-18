<?php
include('../../BLL/userManager.php');
session_start();
$to=$_SESSION['email'];
$subject='Registration';
$message = '<html><body>';
$message .= '<h3>Hello  '.$_SESSION['Fname'].'</h3>';
$message .= $_SESSION['message'];
$message .= '</body></html>';
$headers="from: traveland <traveland.online21@gmail.com>\r\n";
$headers .="content-type:text/html \r\n";
mail($to,$subject,$message,$headers);


// Inserting tickets
$ticketsData = $_SESSION['ticketsData'];
$user_id = $_SESSION['userId'];
$result = getPassengerByUserID($user_id);
$row = mysqli_fetch_array($result);
$PID = $row['PID'];
$FID = $_SESSION['idFlight'];

for($i=0; $i< sizeof($ticketsData[0]); $i++){
        $fname = $ticketsData[0][$i];
        $lname = $ticketsData[1][$i];
        $age = $ticketsData[2][$i];
        addTickets($fname, $lname, $age, $PID, $FID);
}

updateNumTickets($PID); 
updatePrice($PID);
    



Header("Location:CheckPage.php");

?>