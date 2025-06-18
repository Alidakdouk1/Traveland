<?php
include('../../BLL/userManager.php');
$id = $_GET['id'];
$result= DeletePassenger($id);
Header("Location:Passengers.php");



?>