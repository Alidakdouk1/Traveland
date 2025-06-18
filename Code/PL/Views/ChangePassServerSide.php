<?php
include('../../BLL/userManager.php');
if(isset($_POST['submit'])){

	$newPass = md5($_POST['newPass']);
	$ConPass = md5($_POST['conPass']);
	$currentPass = md5($_POST['current_pass']);
	$Pass=$_POST['password'];

	$userId = $_POST['userId'];
	if(!ValidPass($newPass,$currentPass,$Pass, $ConPass)){
		echo"<script type='text/javascript'>
                    alert('Please Check entered Values');
                    </script>";
		// header("Location: profile.php");
		
		}
		else{
			$result= changePass($newPass,$userId);
			if($result){
		echo "<script type='text/javascript'>
          alert('password changed successfully ! Please Login again');
          </script>";
		  header("Location: LogoutServerSide.php");
	}else{
		echo "<script type='text/javascript'>
          alert('User Does not exist !');
          </script>";
		 
	}
			
		}
		
	
	
}




 function ValidPass($newPass,$currentPass,$Pass, $ConPass){
            if(preg_match("/[0-9]{1}[!@#$%^&*?]{1}/", $newPass)  ||  $currentPass != $Pass ||$currentPass==null || $currentPass==''  || $Pass==null || $Pass=='' || $newPass==null || $newPass==''|| $ConPass == null || $ConPass=='' || $newPass != $ConPass ){
                return false;
            }else{
                return true;
            }
        }
?>