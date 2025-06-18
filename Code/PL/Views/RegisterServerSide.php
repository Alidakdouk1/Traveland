<?php
include('../../BLL/userManager.php');
    echo 111;
        if(isset($_POST['submit']))
        {

            $Username=$_POST['username'];
            $Email=$_POST['email'];
            $Pass=$_POST['password'];
            $ConPass=$_POST['cpassword'];

        if(!ValidSignUp($Username,$Email,$Pass,$ConPass))
            {
                echo"<script type='text/javascript'>
                    alert('Please Check entered Values');
                    window.location.replace('Register.php');
                    </script>";
            } 
else{
            $PasswordWithHash = md5($Pass);
             $result=SignUp($Username,$Email,$PasswordWithHash);
                if($result){
                    echo "<script type='text/javascript'>
                    alert('Username Added successfully!');
                    window.location.replace('Login1.php');
                    </script>";
                }else{
                    echo "<script type='text/javascript'>
                    alert('Username already in use');
					window.location.replace('Register.php');
                    </script>";
                }        
            }  
            
        }
         function ValidSignUp($Username,$Email,$Pass,$ConPass){
            if(!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i",$Email) || $ConPass == null || $ConPass=='' || $Pass != $ConPass || $Username==null || $Username=='' || $Email==null || $Email=='' || $Pass==null || $Pass=='' || strlen($Pass) < 3){
                return false;
            }else{
                return true;
            }
        }
?>