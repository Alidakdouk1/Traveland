<?php
include('../../DAL/userRepository.php');
function Book($Fname, $Lname, $age, $phone, $credit, $tickets, $UID, $FID){
    return InsertPassenger($Fname, $Lname, $age, $phone, $credit, $tickets, $UID, $FID);
    
   }
function SearchDestination($destination){
	return SearchPlace($destination);
}
function Insertorder($id){
    return InsertIdflight($id);
}
function Check(){
    return CheckRegistration();
}
function Signin($username,$Email, $Pass){
    return SigninCheck($username,$Email, $Pass);
}
function SignUp($Username,$Email,$Pass){
    $result=CheckUserExists($Username);
       $row= mysqli_num_rows($result);
       if($row < 1){
           echo 11;
        register($Username,$Email,$Pass);
           return true;
       }
       else{
           return false;
       }
}
function ShowallFilght(){
    return allFlight();
}
function ShowFlightById($id){
    return ShowFlight($id);
}
function DeletFlight($id){
    return DeletFL($id);
}
function DeletRegistration($uid, $fid){
    return DeletRG($uid, $fid);
}
// Check city if exist in data base
function Checkdestination($destination){
    
    return Checkd($destination);
}
// Check Country if exist if data base
function CheckCountry($Country){
    return CheckCoun($Country);
}
// Insert Country if dosen't exist
function insertCountry($Country){
    return insertcoun($Country);
}
function insertFlight($DepartureDate,$ReturnDate,$Class,$Price,$capacity,$iddestination){
    return insertF($DepartureDate,$ReturnDate,$Class,$Price,$capacity,$iddestination);
}
function UpadteFlight($id,$DepartureDate, $ReturnDate,$Price){
    return UpdateF($id,$DepartureDate, $ReturnDate,$Price);
}
function searchonid($id){
    return searchid($id);
}
function insertcity($destination, $idCountry, $image){
    return newcity($destination, $idCountry, $image);
}

function changeEmail($email, $id){
     return emailChange($email, $id);
}

function changePass($pass, $id){
    return passChange($pass, $id);
}

function getUser($username, $email, $pass){
    return get_user($username, $email, $pass);

}

function updateFlight($DepartureDate, $ReturnDate, $Price, $capacity, $id){
    return FlightUpdate($DepartureDate, $ReturnDate, $Price, $capacity, $id);
}


function bookedFlights(){
    return flightsBooked();
}

function isPassenger(){
    return userIsPassenger();
}

function insertToBookedFlights($flight_id, $user_id){
    return insertIntoBookedFlights($flight_id, $user_id);
}

function cityNumOfPasseng(){
    return getNumOFPasseng();
}

function getPassengers(){
    return PassengersGet();
}
function DeletePassenger($id){
    return dltPassenger($id);
}

function getflightByID($id){
    return getflights($id);
}

function getCities(){
    return allCities();
}

function getPassenger($id){
    return getPassengerById($id);
}

function addTickets($fname, $lname, $age, $PID, $FID){
    insertTickets($fname, $lname, $age, $PID, $FID);
}

function  getPassengerByUserID($user_id){
    return  getIdOfPassenger($user_id);
}

function updateNumTickets($pid){
    return updateTickets($pid);
}

function updatePrice($pid){
    return updateTotalPrice($pid);
}
?>