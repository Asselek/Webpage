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
	<h2>Login Now / <a href="registration.php">Register Now</a></h2>
	<div class="toPlace">
		<form method="POST">
			<input type="email" name="email" placeholder="Enter Your Email" class="writer"><br>
			<input type="password" name="pass" placeholder="*******" class="writer"><br>
			<input type="submit" name="login" value="Login" class="btn">
			<input type="reset" name="reset" value="Reset" class="btn">
		</form>
	</div>
</div>
    <footer><p class="bot">&copy; Designed by Darkhan</p></footer>
</body>
</html>

<?php
session_start();
$con = mysqli_connect("localhost","root","","user");


if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['login'])){
		$v_email = mysqli_escape_string($con, $_POST['email']);
		$v_pass = mysqli_escape_string($con, $_POST['pass']);

		function validation($form_data){
			$form_data = trim( stripcslashes( htmlspecialchars( $form_data ) ) );
			return $form_data;
		}
		$email = validation($v_email);
		$pass = validation($v_pass);

		if(!empty($email) && !empty($pass)){
			$email_check = "SELECT * FROM 'user_detail' WHERE 'u_email'='$email'";
			$email_check_query = mysqli_query($con, $email_check);

			if(mysqli_num_rows($email_check_query) == 1){
				$fetch = mysqli_fetch_assoc($email_check_query);
				$h_pass = $fetch['u_pass'];

				if(password_verify($pass, $h_pass)){
					$_SESSION['name'] = $fetch['u_name'];
					$_SESSION['email'] = $fetch['u_email'];
					$_SESSION['pass'] = $fetch['u_pass'];

					if(isset($_POST['check'])){
						setcookie('email',$email,time()+(86400 * 30));
						setcookie('pass',$pass,time()+(86400 * 30));
					}
				}
				else{
					$msg = "Check your password or email";
				}
			}
			else{
				$msg = "Check your password or email";
			}
		}
		else{
			$msg = "Empty field";
		}
	}
}
?>
