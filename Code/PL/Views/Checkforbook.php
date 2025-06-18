<?php
session_start();

if(isset($_SESSION['username']))
{
    $_SESSION['idFlight']= $_GET['id'];
    Header("Location:Tickets.php");

}else{
    Header("Location:Login1.php");
}


?>