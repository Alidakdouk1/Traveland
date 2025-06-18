<?php
include('../../BLL/userManager.php');
if(isset($_POST['submit'])){

	$Email=$_POST['email'];
    $currentPass = $_POST['current_pass'];
    $currentPass = md5($currentPass);
	$Pass=$_POST['password'];
    $userId = $_POST['userId'];
	if(!ValidPass($Email,$currentPass,$Pass)){
		echo"<script type='text/javascript'>
                    alert('Please Check entered Values');
                    </script>";           
        header("Location: profile.php");
		
		}
		else{
			$result= changeEmail($Email,$userId);
			if($result){
		echo "<script type='text/javascript'>
          alert('Email changed successfully ! Please login agin with the new one');
          </script>";
		  header("Location: logoutServerSide.php");
	}else{
		echo "<script type='text/javascript'>
          alert('User Does not exist !');
          </script>";
		 
	}
			
		}
		
	
	
}




 function ValidPass($Email,$currentPass,$Pass){
            if(!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i",$Email)  || $Email == null || $Email=='' || $currentPass != $Pass ||$currentPass==null || $currentPass==''  || $Pass==null || $Pass==''){
                return false;
            }else{
                return true;
            }
        }
?>