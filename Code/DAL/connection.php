


<?php
function OpenCon(){
    $dbhost="localhost";
    $dbuser="root";
    $dbpass="";
    $db="web2";
    $con=new mysqli($dbhost,$dbuser,$dbpass,$db) or die("Connection Failed:%s\n".$con -> error);
return $con;    
}
function CloseCon($con){
    $con->close();
}

?>

