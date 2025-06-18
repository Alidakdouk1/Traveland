<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../Scripts/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="../Styles/Style22.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign in</h3>
				
			</div>
			<div class="card-body">
				<form method="post" action="LoginServerSide.php">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span id="c1" class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" id="username" name="username" placeholder="Username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span  id="c7" class="input-group-text"><i class="fas fa-mail-bulk"></i></span>
						</div>
						<input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span id="c5" class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="password" id="password" placeholder="Password">
					</div>
					
					<div class="form-group">
						<input type="submit" value="Login" name="submit" id="submit" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="Register.php">Sign Up</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
 <script>
	$(document).ready(function(){
   
    $("#submit").click(function(e){
     var username=$("#username").val();
	 var Email = $("#email").val();
       var Password = $("#password").val();     
     if ($("#password").val().length>0) {
        $("#c5").css("background-color","green");
				 $("#password").css("border-color","green");
				
      } else {
     alert("must enter Password");
	  $("#c5").css("background-color","red");
				 $("#password").css("border-color","red");
    }
	
		if($("#username").val().length>0){
		$("#c1").css("background-color","green");
				 $("#username").css("border-color","green");
		}
		else{
			window.alert("must enter a value for username");
			$("#c1").css("background-color","red");
				 $("#username").css("border-color","red");
		}

		var EmailPatern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i;
	
           if(!EmailPatern.test(Email))
             {
                 alert("Not a valid email address");
				 $("#c7").css("background-color","red");
				 $("#email").css("border-color","red");
             }	
			 else{
				  $("#c7").css("background-color","green");
				 $("#email").css("border-color","green");
			 }
    });
});
	</script>

</html>