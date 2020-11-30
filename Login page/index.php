<?php 
    include("config.php");
    session_start(); 
    $bool=false;
    if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $myusername = mysqli_real_escape_string($db,$_POST['email']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT userid FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql) ;
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      // $active = $row['userid'] ;
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
      
      if($count == 1) {
         $error="";
         $_SESSION['myusername'];
         $_SESSION['userid'] = $row['userid'];
         $_SESSION['login_user'] = $myusername;
         
         header("location: ../welcome/home.php");
      }else 
      {

        
         $bool=true;
         $error = "Your Login Name or Password is invalid";
      }
   }
     
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Page</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->




</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt style="border-radius: 50%;">
					<img src="img-01.png" alt="IMG" style="border: 5px solid #4A63E7;">
				</div>

				<form class="login100-form validate-form" action = "index.php" method = "POST">
					<span class="login100-form-title" style="color: #4A63E7;">
						Member Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
                    <center>
					<div style = "font-size:11px; color:#cc0000; margin-top:20px">
                    <?php 
                    if($bool) 
                        {echo $error;} 
                    ?>
                        
                    </div></center>
					<div class="container-login100-form-btn">

						<button class="login100-form-btn" type="submit" name="login">
							Login
						</button>
					</div>
                    
                        
                    
                    
                    

					<!-- <div class="text-center p-t-136">
						<a class="txt2" href="#">
							ARVY
						</a>
					</div> -->
				</form>
                 
                 
			</div>
		</div>
	</div>
	
	


<!--===============================================================================================-->	
	<script src="js/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="js/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>





</body>
</html>