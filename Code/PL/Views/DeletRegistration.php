<?php
session_start();
include('../../BLL/userManager.php');
$uid = $_GET['uid'];
$fid = $_GET['fid'];
echo $uid;
$result=DeletRegistration($uid, $fid);
$_SESSION['message']  ='<p style="font-size:18px;">You have canceled your flight . </p>';
$_SESSION['message'] .='<p style="font-size:18px;">Thank you. </p>';
Header("Location:Email.php");


?>