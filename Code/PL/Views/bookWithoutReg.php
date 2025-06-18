<?php
session_start();

if(isset($_SESSION['username']))
{
    include('../../BLL/userManager.php');
    $_SESSION['idFlight']= $_GET['fid'];

    $flight_id = $_SESSION['idFlight'];
    $user_id = $_SESSION['userId'];

    insertToBookedFlights($flight_id, $user_id);
    
    header("Location: checkPage.php");
}else{
    Header("Location:Login1.php");
}


?>