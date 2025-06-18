<?php
session_start();
?>


<?php
include('../../BLL/userManager.php');
 if(isset($_POST['submit'])){
	 $Username=$_POST['username'];
     $Email = $_POST['email'];
	 $Pass=$_POST['password'];
     $row = getUser($Username, $Email, md5($Pass));
     $userId = $row['IDUser'];
    
     $type = $row['type'];
	 if(!ValidSignIn($Username,$Email,$Pass))
            {
                echo"<script type='text/javascript'>

                    </script>";
                    //window.location.replace('Login1.php');
            }
			
			else{
                $PasswordWithHash = md5($Pass);
				$result=SigninCheck($Username,$Email,$PasswordWithHash);
				if($result!= null){
                    $_SESSION['userId'] = $userId;
                    $_SESSION['username']= $Username;
                    $_SESSION['password']=$Pass; 
                    $_SESSION['email']=$Email; 
                    echo "<script type='text/javascript'>
                    alert('Successfully signed in!');
                    </script>"; 
                    if($type=='admin'){
                        Header("Location:AdminPage.php");
                    }
                    else{
                        
					    Header("Location:index.php");
                    }
					
                    
					 
				}
				
				
				else{
					echo "<script type='text/javascript'>
                    alert('No such user');
                    window.location.replace('Login1.php');
                    </script>";
				}
			}

 }
 
 
 
function ValidSignIn($Username,$Email, $Pass){
        if(!preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i",$Email) || $Username==null||$Username==''|| $Email==null || $Email=='' || $Pass==null|| $Pass==''){
            return false;
        }else{
            return true;
        }
    }



?>