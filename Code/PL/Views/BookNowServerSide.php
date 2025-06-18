<?php
include('../../BLL/userManager.php');
session_start();

//Header("Location:BookNow.php");


if (isset($_POST['SubmitButton'])) {
    $FID = $_SESSION['idFlight'];
    $UID = $_SESSION['userId'];
    
    insertToBookedFlights($FID, $UID);

    $tickets = $_SESSION['tickets'];

    $isPassenger = false;
    $result = isPassenger();
    $ids = mysqli_fetch_all($result);
    foreach($ids as $id){
        if($id[0] == $UID){
            $isPassenger = true;
        }
    }

    if($isPassenger){
        
        $result = getPassengerByUserID($UID);
        $row = mysqli_fetch_array($result);

        $fname = $row['FirstName'];
        $lname = $row['LastName'];
        $age = $row['Age'];

        $fnames = [$fname];
        $lnames = [$lname];
        $ages = [$age];
        for($i=1; $i<$tickets; $i++){
            $fnames[$i] = $_POST["fname". $i];
            $lnames[$i] = $_POST["lname". $i];
            $ages[$i] = $_POST["age". $i];
        }
      
        $ticketsData = [$fnames, $lnames, $ages];
        $_SESSION['ticketsData'] = $ticketsData;

        $_SESSION['Fname'] = $fname;
        $_SESSION['message'] = '<p style="font-size:18px;">Thank you for your registration. </p>';
        echo "<script type='text/javascript'>
                    alert('Thank you for booking!');
                    window.location.replace('Email.php');
                    </script>";
    }else{

        $Fname = $_POST['fname'];
        $Lname = $_POST['lname'];
        $age = $_POST['age'];
        $phone = $_POST['phone'];
        $credit = $_POST['credit'];
        $tickets = $_POST['tickets'];


        $fnames = [$Fname];
        $lnames = [$Lname];
        $ages = [$age];
        for($i=1; $i<$tickets; $i++){
            $fnames[$i] = $_POST["fname". $i];
            $lnames[$i] = $_POST["lname". $i];
            $ages[$i] = $_POST["age". $i];
        }
        $ticketsData = [$fnames, $lnames, $ages];
        $_SESSION['ticketsData'] = $ticketsData;


     if (!ValidSignUp($Fname, $Lname, $age, $phone, $credit, $tickets,$UID, $FID)) {

        echo "<script type='text/javascript'>
                            alert('Please Check entered Values');
                            window.location.replace('BookNow.php');
                            </script>";
     } else {
        $result = Book($Fname, $Lname, $age, $phone, $credit, $tickets, $UID, $FID);
        $_SESSION['Fname'] = $Fname;
        $_SESSION['message'] = '<p style="font-size:18px;">Thank you for your registration. </p>';
        echo "<script type='text/javascript'>
                    alert('Thank you for booking!');
                    window.location.replace('Email.php');
                    </script>";
        
        } 
    }

    
}


function ValidSignUp($Fname, $Lname, $age, $phone, $credit)
{
    if ($age == null || $age == '' || $Fname == null || $Fname == '' || $Lname == null || $Lname == '' ||  $phone == null || $phone == '' || $credit == null || $credit == '' || strlen($credit) != 8 || strlen($phone) != 8) {
        return false;
    } else {
        return true;
    }
}
