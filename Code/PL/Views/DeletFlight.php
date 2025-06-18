<?php
include('../../BLL/userManager.php');
$id = $_GET['Delet'];
$result=DeletFlight($id);
Header("Location:AdminPage.php");



?>