<?php
include('../../BLL/userManager.php');
if(isset($_POST['SubmitAdd']))
{
    $Country=$_POST['Country'];
    $City=$_POST['City'];
    $DepartureDate=$_POST['DepartureDate'];
    $ReturnDate=$_POST['ReturnDate'];
    $Class=$_POST['Class'];
    $Price=$_POST['Price'];
    $capacity=$_POST['capacity'];
    $Image="../Assets/";
    $Image .=$_POST['fileToUpload'];
    if(!ValidSignUp($City,$DepartureDate,$ReturnDate,$Class,$Price,$capacity,$Image)){

        echo"<script type='text/javascript'>
                    alert('Please Check entered Values');
                    </script>";
        Header("Location:AddFlight.php");

    }
    else{
    

        $result=Checkdestination($City);
        echo $result->num_rows;
        if($result->num_rows>0){
            while($row = mysqli_fetch_array($result)){
                $iddestination=$row['IDCity'];
                echo $iddestination;
                insertFlight($DepartureDate,$ReturnDate,$Class,$Price,$capacity,$Image,$iddestination);
                echo "<script type='text/javascript'>
                Flight Added
                </script>";
                Header("Location:AdminPage.php");
            }

            
                
        }
        else{
            echo $Country;
            $result2=CheckCountry($Country);
            if($result2->num_rows>0){
                while($row2 = mysqli_fetch_array($result2)){
                    $idCountry=$row2['IDCountry'];
                    }
                    insertcity($City, $idCountry, $Image);
                    $result3=Checkdestination($City);
                while($row3 = mysqli_fetch_array($result3)){
                    $iddestination=$row3['IDCity'];
                       echo $iddestination;
                }
                insertFlight($DepartureDate,$ReturnDate,$Class,$Price,$capacity,$iddestination);
                echo "<script type='text/javascript'>
                        Flight Added
                        </script>";
                        Header("Location:AdminPage.php");
            }
            else {
                insertCountry($Country);
                $result4=CheckCountry($Country);
                while($row4= mysqli_fetch_array($result4)){
                    $idCountry=$row4['IDCountry'];
                }
                insertcity($City, $idCountry, $Image);
                $result5=Checkdestination($City);
                while($row5 = mysqli_fetch_array($result5)){
                    $iddestination=$row5['IDCity'];
                       echo $iddestination;
                }
                insertFlight($DepartureDate,$ReturnDate,$Class,$Price,$capacity,$Image,$iddestination);
                echo "<script type='text/javascript'>
                        Flight Added
                        </script>";
                        Header("Location:AdminPage.php");

            }
        }    


    }
}





function ValidSignUp($City,$DepartureDate,$ReturnDate,$Class,$Price,$capacity,$Image){
    if( $City == null || $City=='' || $DepartureDate==null || $DepartureDate=='' || $ReturnDate==null || $ReturnDate=='' || $Class==null || $Class=='' ||  $Price == null || $Price==''||  $capacity == null || $capacity=='' || $Image == null || $Image=='' ){
        return false;
    }else{
        return true;
    }
}


?>
