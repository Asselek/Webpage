<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="logRegStyle.css" rel="stylesheet" type="text/css">
</head>
<body style="overflow-x: hidden;">
	<header>
		<a href="/index.php">Go Home</a>
	</header>
<div class="container">
	<h2>Login Now / <a href="SignUp.php">Register Now</a></h2>
	<div class="toPlace">
		<form action = "bridge.php" method="POST">

			<input type="email" name="email" placeholder="Enter Your Email" class="writer"><br>
			<input type="password" name="pass" placeholder="*******" class="writer"><br>
			<input type="radio" name="isUserOrAdmin" value = "Admin">Admin
			<input type="radio" name="isUserOrAdmin" value = "User">User
			<input type="radio" name="isUserOrAdmin" value = "Staff">Staff<br>
			<input type="submit" name="login" value="Login" class="btn">
			<input type="reset" name="reset" value="Reset" class="btn">
		</form>
	</div>
</div>
    <footer><p class="bot">&copy; Designed by Darkhan</p></footer>
</body>
</html>




