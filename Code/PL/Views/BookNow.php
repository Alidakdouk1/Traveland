<?php
session_start();

if(isset($_SESSION['idFlight']) && isset($_SESSION['userId'])){
	if(isset($_SESSION['tickets'])){
		$tickets = $_SESSION['tickets'];
		$user_id = $_SESSION['userId'];
?>
<script>let tickets = <?= $tickets ?> </script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="../Scripts/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Traveland - Book Now</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="../Styles/Style11.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card mt-4" style="height: 630px; overflow-y: scroll;">
			<div class="card-header">
				<h3>Book Now</h3>
			
			</div>
			<div class="card-body">
				<form method="post" action="BookNowServerSide.php">
				<?php 
				// Check if the user booked
				include('../../BLL/userManager.php');
                  $isPassenger = false;
                  $result = isPassenger();
                  $ids = mysqli_fetch_all($result);
                  foreach($ids as $id){

                    if($id[0] == $user_id){
                      $isPassenger = true;
                    }

                  }
				
				if(!$isPassenger){ ?>
					<h6 class="text-light">Ticket 1 Info</h6>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span id="c2" class="input-group-text"><i  class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required>
						
					</div>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span id="c3" class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required>
						
					 </div>
                                        <div class="input-group form-group">
						<div class="input-group-prepend">
							<span id="c4" class="input-group-text"><i  class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" id="age" name="age" placeholder="Age" required>
						
					</div>
                        <div class="input-group form-group">
						<div class="input-group-prepend">
							<span id="c5" class="input-group-text"><i   class="fa fa-phone "></i></span>
						</div>
						<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required>
						
					</div>

					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span id="c7" class="input-group-text"><i  class="fa fa-credit-card"></i></span>
						</div>
						<input type="number" class="form-control" id="credit" name="credit" placeholder="credit" required>
					</div>
					<input type="number" value="<?= $tickets?>" name="tickets" hidden>
					<?php }else{
						echo "<h6 class='text-light'>Ticket 1 Info Already stored</h6>";
					} ?>
					<br>
					<?php for($i=1; $i<$tickets ; $i++){?>
					<hr>	
					<h6 class="text-light">Ticket <?= $i+1 ?> Info</h6>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span id="cf<?= $i ?>" class="input-group-text"><i  class="fa fa-user"></i></span>
						</div>
						<input type="text" class="form-control" id="fname<?= $i ?>" name="fname<?= $i ?>" placeholder="First Name" required>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span id="cl<?= $i ?>" class="input-group-text"><i  class="fa fa-user"></i></span>
						</div>
						<input type="text" class="form-control" id="lname<?= $i ?>" name="lname<?= $i ?>" placeholder="Last Name" required>
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span id="ca<?= $i ?>" class="input-group-text"><i  class="fa fa-user"></i></span>
						</div>
						<input type="number" class="form-control" id="age<?= $i ?>" name="age<?= $i ?>" placeholder="Age" required>
					</div>
					<?php } ?>

					<div class="form-group">
						<input type="submit" value="Register" name="SubmitButton" id="submit" class="btn float-right login_btn">
						<a href="./Tickets.php"><div class="btn float-right btn-secondary mr-2">Back</div></a>
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
	 var firstname=$("#fname").val();
	 var lastname=$("#lname").val();
      var Email = $("#email").val();
	   var age=$("#age").val();
	   var phone=$("#phone").val();
	   var credit=$("#credit").val();
	   

		if($("#fname").val().length>0){
		$("#c2").css("background-color","green");
				 $("#fname").css("border-color","green");
		}
		else{
			window.alert("Must enter a value for First Name");
			$("#c2").css("background-color","red");
				 $("#fname").css("border-color","red");
		}

		
		if($("#lname").val().length>0){
		$("#c3").css("background-color","green");
				 $("#lname").css("border-color","green");
		}
		else{
			window.alert("Must enter a value for Last Name");
			$("#c3").css("background-color","red");
				 $("#lname").css("border-color","red");
		}
		if($("#age").val().length>0){
		$("#c4").css("background-color","green");
				 $("#age").css("border-color","green");
		}
		else{
			window.alert("Must enter a value for age");
			$("#c4").css("background-color","red");
				 $("#age").css("border-color","red");
		}
		if($("#phone").val().length>0){
		$("#c5").css("background-color","green");
				 $("#phone").css("border-color","green");
		}
		else{
			window.alert("Must enter a value for phone");
			$("#c5").css("background-color","red");
				 $("#phone").css("border-color","red");
		}
		if($("#credit").val().length>0){
		$("#c7").css("background-color","green");
				 $("#credit").css("border-color","green");
		}
		else{
			window.alert("Must enter a value for phone");
			$("#c7").css("background-color","red");
				 $("#credit").css("border-color","red");
		}

		for(let i=1; i<tickets; i++){
			if($(`#fname${i}`).val().length>0){
		         $(`#cf${i}`).css("background-color","green");
				 $(`#fname${i}`).css("border-color","green");
		     }
		    else{
				window.alert("Must enter a value for First Name");
				$(`#cf${i}`).css("background-color","red");
				$(`#fname${i}`).css("border-color","red");
			}
		
		
			if($(`#lname${i}`).val().length>0){
		         $(`#cl${i}`).css("background-color","green");
				 $(`#lname${i}`).css("border-color","green");
		     }
		    else{
				window.alert("Must enter a value for Last Name");
				$(`#cl${i}`).css("background-color","red");
				$(`#lname${i}`).css("border-color","red");
			}
		
		
			if($(`#age${i}`).val().length>0){
		         $(`#ca${i}`).css("background-color","green");
				 $(`#age${i}`).css("border-color","green");
		     }
		    else{
				window.alert("Must enter a value for Age");
				$(`#ca${i}`).css("background-color","red");
				$(`#age${i}`).css("border-color","red");
			}
		}

    });
}); 
	</script> 

</html>

<?php }else{
	header('Location: Tickets.php');
}
}else{
	header('Location: LogoutServerSide.php');
}?>