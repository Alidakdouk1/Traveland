<?php
include('../../BLL/userManager.php');
session_start();

//Header("Location:BookNow.php");


if (isset($_POST['SubmitButton'])) {
    $tickets = $_POST['tickets'];
    if (!ValidSignUp($tickets)) {

        echo "<script type='text/javascript'>
                            alert('Please Check entered Values');
                            window.location.replace('BookNow.php');
                            </script>";
    } else {
        $_SESSION['tickets'] = $tickets;
        header("Location: BookNow.php");
    }
}


function ValidSignUp($tickets)
{
    if ($tickets == null || $tickets == '') {
        return false;
    } else {
        return true;
    }
}
