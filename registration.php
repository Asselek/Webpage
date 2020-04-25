<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="logRegStyle.css" rel="stylesheet" type="text/css">
</head>
<body style="overflow-x: hidden;">
	<header>
		<a href="#">Go Home</a>
	</header>
<div class="container">
	<h2>Register Now / <a href="login.php">Login Now</a></h2>
	<div class="toPlace">
		<form method="POST">
			<input type="text" name="name" placeholder="Enter Your Name" class="writer"><br>
			<input type="email" name="email" placeholder="Enter Your Email" class="writer"><br>
			<input type="password" name="pass" placeholder="*******" class="writer"><br>
			<input type="submit" name="submit" value="Submit" class="btn">
			<input type="reset" name="reset" value="Reset" class="btn">
		</form>
	</div>
</div>
    <footer><p class="bot">&copy; Designed by Darkhan</p></footer>
</body>
</html>

<?php

$con = mysqli_connect("localhost","root","","user");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['submit'])){
		$v_name = mysqli_escape_string($con, $_POST['name']);
		$v_email = mysqli_escape_string($con, $_POST['email']);
		$v_pass = mysqli_escape_string($con, $_POST['pass']);

		function validation($form_data){
			$form_data = trim( stripcslashes( htmlspecialchars( $form_data ) ) );
			return $form_data;
		}

		$name = validation($v_name);
		$email = validation($v_email);
		$pass = validation($v_pass);

		if(!empty($name) && !empty($email) && !empty($pass)){
			$check = "SELECT 'u_email' FROM 'user_detail' WHERE 'u_email'='$email'";
			$check_query = mysqli_query($con, $check);

			if(mysqli_num_rows($check_query) > 0){
				$msg = "This Email is Already Registered";
			}
			else{
				$hash_pass = password_hash($pass, PASSWORD_BCRYPT);
				$insert = "INSERT INTO 'user_detail'('u_name','u_email','u_pass') VALUES('$name','$email','$hash_pass')";

				if(mysqli_query($con, $insert)){
					header("Refresh:0");
				}
				else{
					$msg = "You are not registered";
				}
			}
		}
		else{
			$msg = "Empty Field Found";
		}
	}
}
?>
