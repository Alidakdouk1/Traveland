<?php
session_start();
include('../../BLL/userManager.php');
$id = $_SESSION['id'];


// if(isset($_POST['SubmitUpdate'])){
    // $DepartureDate=$_POST['DepartureDate'];
    // $ReturnDate=$_POST['ReturnDate'];
    // $Price=$_POST['Price'];
    // $capacity=$_POST['capacity'];

//     $result=searchonid($id);
//     while($row = mysqli_fetch_array($result)) {
//         $oldDepartureDate = $row['DepartureDate'];
//         $oldReturnDate = $row['ReturnDate'];
//         $oldPrice = $row['Price'];
//     }
     
//     if(!empty($DepartureDate) && !empty($ReturnDate) && empty($Price)){
//     }

//     else if(!empty($DepartureDate) && empty($ReturnDate) && empty($Price)){
//         // UpadteDepartureDate($id,$DepartureDate);
//         //  Header("Location:AdminPage.php");
//         $ReturnDate=$oldReturnDate ;
//         $Price=$oldPrice ;
//     }
//     else if(!empty($DepartureDate) && !empty($ReturnDate) && empty($Price)){
//         $Price=$oldPrice ;
//     }
//     else if(!empty($DepartureDate) && empty($ReturnDate) && !empty($Price)){
//         $ReturnDate=$oldReturnDate ;
//     }
//     else if(empty($DepartureDate) && !empty($ReturnDate) && empty($Price)){
//         $DepartureDate= $oldDepartureDate;
//         $Price=$oldPrice ;
//     }
//     else if(empty($DepartureDate) && !empty($ReturnDate) && !empty($Price)){
//         $DepartureDate= $oldDepartureDate;
//     }
//     else if(empty($DepartureDate) && empty($ReturnDate) && !empty($Price)){
//         $DepartureDate= $oldDepartureDate;
//         $ReturnDate=$oldReturnDate ;
//     }
//     UpadteFlight($id,$DepartureDate, $ReturnDate,$Price);
//     Header("Location:AdminPage.php");

// }

if (
    isset($_POST["DepartureDate"])     &&
    isset($_POST["ReturnDate"])     &&
    isset($_POST["Price"]) &&
    isset($_POST["capacity"])) {

    $DepartureDate=$_POST['DepartureDate'];
    $ReturnDate=$_POST['ReturnDate'];
    $Price=$_POST['Price'];
    $capacity=$_POST['capacity'];

    $result = updateFlight($DepartureDate, $ReturnDate, $Price, $capacity, $id);
        
    if($result){
        echo "<script type='text/javascript'>
                    alert('Flight Updated successfully');
                    window.location.replace('Login1.php');
                    </script>";
        header("Location: ./AdminPage.php");            
    }else{
        echo "<script type='text/javascript'>
                    alert('An error occured');
                    window.location.replace('Login1.php');
                    </script>";
    }
               
} else {
    echo "<script type='text/javascript'>
                    alert('An error occured');
                    window.location.replace('Login1.php');
                    </script>";
}


?>