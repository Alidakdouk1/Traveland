<?php
session_start();

if(isset($_SESSION['idFlight']) && isset($_SESSION['userId'])){

?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../Scripts/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Traveland - Tickets</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/454fa8eb06.js" crossorigin="anonymous"></script>
	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="../Styles/Style11.css">
   
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card" style="height: 200px;">
			<div class="card-header">
				<h3>Book Tickets</h3>
			
			</div>
			<div class="card-body">
				<form method="post" action="TicketsServerSide.php" >
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span id="c2" class="input-group-text"><i class="fa-solid fa-ticket"></i></span>
						</div>
						<input type="number" class="form-control" id="tickets" name="tickets" placeholder="Tickets" required>
					</div>
					<div class="form-group">
						<input type="submit" value="Next" name="SubmitButton" id="submit" class="btn float-right login_btn">
						<a href="./destination.php"><div class="btn float-right btn-secondary mr-2">Back</div></a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>






    <script>
	$(document).ready(function(){
   
    $("#submit").click(function(e){
	 var tickets=$("#tickets").val();
	   

		if($("#tickets").val().length>0){
		$("#c2").css("background-color","green");
				 $("#tickets").css("border-color","green");
		}
		else{
			window.alert("Must enter a value for tickets");
			$("#c2").css("background-color","red");
				 $("#tickets").css("border-color","red");
		}

    });
}); 
	</script> 

</html>

<?php }else{
	header('Location: LogoutServerSide.php');
}?>